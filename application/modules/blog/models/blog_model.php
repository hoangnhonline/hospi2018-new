<?php

class Blog_model extends CI_Model
{
    public $langdef;
    protected $ci = NULL; //codeigniter instance

    function __construct()
    {
// Call the Model constructor
        parent:: __construct();
        $this->langdef = DEFLANG;
        $this->ci = &get_instance();
    }

// blog category name
    function category_name($id)
    {
        $this->db->where('cat_id', $id);
        $this->db->or_where('cat_slug', $id);
        $res = $this->db->get('pt_blog_categories')->result();
        return $res[0]->cat_name;
    }

// blog category slug
    function category_slug($id)
    {
        $this->db->where('cat_id', $id);
        $this->db->or_where('cat_slug', $id);
        $res = $this->db->get('pt_blog_categories')->result();
        return $res[0]->cat_slug;
    }

// blog category parent
    function category_parent($id)
    {
        $this->db->where('cat_id', $id);
        $this->db->or_where('cat_slug', $id);
        $res = $this->db->get('pt_blog_categories')->result();
        return $res[0]->cat_parent;
    }

// Show posts according to category 
    function category_posts_front($perpage = null, $page = null, $orderby = null, $cate = null)
    {
        $data = array();
        if ($cate != null) {
            $catslug = $cate;
            $data['catslug'] = $cate;
        } else {
            $catslug = $this->ci->uri->segment(3);
        }

        $this->db->select('cat_id, cat_slug, cat_parent');
        $this->db->where('cat_slug', $catslug);
        $res = $this->db->get('pt_blog_categories')->result();
        $cat = $res[0]->cat_id;

        $offset = null;
        if (!empty($page)) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }
        $this->db->select('pt_blog.*');
        if ($orderby == "za") {
            $this->db->order_by('pt_blog.post_title', 'desc');
        } elseif ($orderby == "az") {
            $this->db->order_by('pt_blog.post_title', 'asc');
        } elseif ($orderby == "oldf") {
            $this->db->order_by('pt_blog.post_id', 'asc');
        } elseif ($orderby == "newf") {
            $this->db->order_by('pt_blog.post_id', 'desc');
        }
        $this->db->where('pt_blog.post_category', $cat);
        $this->db->group_by('pt_blog.post_id');
        $this->db->where('pt_blog.post_status', 'Yes');
        if ($cate != null) {
            if ($cate == 'cam-nang-du-lich') {
                $query = $this->db->get('pt_blog', 7);
            } else {
                $query = $this->db->get('pt_blog', 4);
            }
        } else {
            $query = $this->db->get('pt_blog', $perpage, $offset);
        }
        $data['all'] = $query->result();
        $data['rows'] = $query->num_rows();
        return $data;
    }

// Search posts from home page
    function search_posts_front($perpage = null, $page = null, $orderby = null, $cities = null)
    {
        $data = array();
        $text = $this->input->get('s');
//$days = pt_count_days($checkin,$checkout);
        $offset = null;
        if (!empty($page)) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }
        $this->db->select('pt_blog.*,pt_blog_translation.*');
        if ($orderby == "za") {
            $this->db->order_by('pt_blog.post_title', 'desc');
        } elseif ($orderby == "az") {
            $this->db->order_by('pt_blog.post_title', 'asc');
        } elseif ($orderby == "oldf") {
            $this->db->order_by('pt_blog.post_id', 'asc');
        } elseif ($orderby == "newf") {
            $this->db->order_by('pt_blog.post_id', 'desc');
        }
        $this->db->like('pt_blog.post_title', $text);
        $this->db->or_like('pt_blog.post_desc', $text);
        $this->db->or_like('pt_blog_translation.trans_title', $text);
        $this->db->or_like('pt_blog_translation.trans_desc', $text);
        $this->db->group_by('pt_blog.post_id');
        $this->db->join('pt_blog_translation', 'pt_blog.post_id = pt_blog_translation.item_id', 'left');
        $this->db->where('pt_blog.post_status', 'Yes');
        $query = $this->db->get('pt_blog', $perpage, $offset);
        $data['all'] = $query->result();
        $data['rows'] = $query->num_rows();
        return $data;
    }

// get count of posts per category
    function category_posts_count($id)
    {
        $this->db->where('post_category', $id);
        $this->db->where('post_status', 'Yes');
        return $this->db->get('pt_blog')->num_rows();
    }

// get popular posts for front-end on number of visits
    function get_popular_posts($limit)
    {
        $this->db->select('pt_blog.post_title,pt_blog.post_slug,pt_blog.post_id');
        $this->db->where('post_visits >', '0');
        $this->db->order_by('post_visits', 'desc');
        $this->db->limit($limit);
        return $this->db->get('pt_blog')->result();
    }

// get featured posts for front-end
    function get_featured_posts($limit)
    {
        $this->db->select('pt_blog.post_title,pt_blog.post_slug,pt_blog.post_id');
        $this->db->where('post_feature', 'Yes');
      //  $this->db->order_by('rand()');
        $this->db->limit($limit);
        return $this->db->get('pt_blog')->result();
    }

//update blog visits count
    function update_visits($id, $hits)
    {
        $data = array('post_visits' => $hits);
        $this->db->where('post_id', $id);
        $this->db->update('pt_blog', $data);
    }

// get related posts for front-end
    function get_related_posts($posts, $limit)
    {
        $id = explode(",", $posts);
        $this->db->select('pt_blog.post_title,pt_blog.post_slug,pt_blog.post_id');
        $this->db->where_in('pt_blog.post_id', $id);
        $this->db->limit($limit);
        return $this->db->get('pt_blog')->result();
    }

// get default image of post
    function post_thumbnail($id)
    {
        $this->db->where('post_id', $id);
        $res = $this->db->get('pt_blog')->result();
        if (!empty ($res)) {
            return $res[0]->post_img;
        } else {
            return '';
        }
    }

// List all posts on front listings page
    function list_posts_front($perpage = null, $page = null, $orderby = null)
    {
        $data = array();

        $catslug = $this->ci->uri->segment(3);
        $offset = null;
        if (!empty($page)) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }
        $this->db->select('pt_blog.*,pt_blog_categories.cat_name');
        if ($orderby == "za") {
            $this->db->order_by('pt_blog.post_title', 'desc');
        } elseif ($orderby == "az") {
            $this->db->order_by('pt_blog.post_title', 'asc');
        } elseif ($orderby == "oldf") {
            $this->db->order_by('pt_blog.post_id', 'asc');
        } elseif ($orderby == "newf") {
            $this->db->order_by('pt_blog.post_id', 'desc');
        } elseif ($orderby == "ol") {
            $this->db->order_by('pt_blog.post_order', 'asc');
        }
        $this->db->group_by('pt_blog.post_id');
        $this->db->join('pt_blog_categories', 'pt_blog.post_category = pt_blog_categories.cat_id', 'left');
        $this->db->where('pt_blog.post_status', 'Yes');

        if ($catslug == '') {
            $query = $this->db->get('pt_blog', 4);
        } else {
            $query = $this->db->get('pt_blog', $perpage, $offset);
        }

        $data['all'] = $query->result();
        $data['rows'] = $query->num_rows();

        return $data;
    }

// List all latest posts
    function latest_posts($limit, $orderby = null)
    {
        $this->db->select('pt_blog.post_id,pt_blog.post_category,pt_blog.post_order,pt_blog.post_title,pt_blog.post_slug,pt_blog.post_desc,pt_blog.post_status,pt_blog_categories.cat_name, pt_blog.post_created_at, pt_blog.post_img');
        if ($orderby == "za") {
            $this->db->order_by('pt_blog.post_title', 'desc');
        } elseif ($orderby == "az") {
            $this->db->order_by('pt_blog.post_title', 'asc');
        } elseif ($orderby == "oldf") {
            $this->db->order_by('pt_blog.post_id', 'asc');
        } elseif ($orderby == "newf") {
            $this->db->order_by('pt_blog.post_id', 'desc');
        } elseif ($orderby == "ol") {
            $this->db->order_by('pt_blog.post_order', 'asc');
        }
        $this->db->group_by('pt_blog.post_id');
        $this->db->join('pt_blog_categories', 'pt_blog.post_category = pt_blog_categories.cat_id', 'left');
        $this->db->where('pt_blog.post_status', 'Yes');
        $this->db->limit($limit);
        $res = $this->db->get('pt_blog')->result();
        return $res;
    }

// List all posts for API
    function api_list_posts()
    {
        $this->db->select('pt_blog.*,pt_blog_categories.cat_name');
        $this->db->group_by('pt_blog.post_id');
        $this->db->join('pt_blog_categories', 'pt_blog.post_category = pt_blog_categories.cat_id', 'left');
        $this->db->order_by('pt_blog.post_id', 'desc');
        $this->db->where('pt_blog.post_status', 'Yes');
        return $this->db->get('pt_blog')->result();
    }

// update front settings
    function update_front_settings()
    {
        $ufor = $this->input->post('updatefor');
        $data = array('front_icon' => $this->input->post('page_icon'), 'front_popular' => $this->input->post('popular'), 'front_homepage' => $this->input->post('home'), 'front_homepage_order' => $this->input->post('order'), 'front_latest' => $this->input->post('latest'), 'front_listings' => $this->input->post('listings'), 'front_listings_order' => $this->input->post('listingsorder'), 'front_search' => $this->input->post('searchresult'), 'front_search_order' => $this->input->post('searchorder'), 'front_related' => $this->input->post('related'), 'testing_mode' => $this->input->post('relatedstatus'), 'linktarget' => $this->input->post('target'), 'header_title' => $this->input->post('headertitle'));
        $this->db->where('front_for', $ufor);
        $this->db->update('pt_front_settings', $data);
        $this->session->set_flashdata('flashmsgs', "Updated Successfully");
    }

// get all posts info
    function get_all_posts_back()
    {
        $this->db->select('pt_blog.*,pt_blog_categories.cat_name');
        $this->db->order_by('pt_blog.post_id', 'desc');
        $this->db->join('pt_blog_categories', 'pt_blog.post_category = pt_blog_categories.cat_id', 'left');
        $query = $this->db->get('pt_blog');
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

// get all posts info with limit
    function get_all_posts_back_limit($perpage = null, $offset = null, $orderby = null)
    {
        if ($offset != null) {
            $offset = ($offset == 1) ? 0 : ($offset * $perpage) - $perpage;
        }
        $this->db->select('pt_blog.*,pt_blog_categories.cat_name');
        $this->db->order_by('pt_blog.post_id', 'desc');
        $this->db->join('pt_blog_categories', 'pt_blog.post_category = pt_blog_categories.cat_id', 'left');
        $query = $this->db->get('pt_blog', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

// get all posts info  by advance search
    function adv_search_all_posts_back_limit($data, $perpage = null, $offset = null, $orderby = null)
    {
        $status = $data["status"];
        $posttitle = $data["posttitle"];
        $category = $data["category"];
        if ($offset != null) {
            $offset = ($offset == 1) ? 0 : ($offset * $perpage) - $perpage;
        }
        $this->db->select('pt_blog.*,pt_blog_categories.cat_name');
        if (!empty ($posttitle)) {
            $this->db->like('pt_blog.post_title', $posttitle);
        }
        if (!empty ($category)) {
            $this->db->where('pt_blog.post_category', $category);
        }
        $this->db->where('pt_blog.post_status', $status);
        $this->db->order_by('pt_blog.post_id', 'desc');
        $this->db->join('pt_blog_categories', 'pt_blog.post_category = pt_blog_categories.cat_id', 'left');
        $query = $this->db->get('pt_blog', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

// add Post data
    function add_post($filename_db = null)
    {
        if (empty ($filename_db)) {
            $filename_db = "";
        }
        $this->db->select("post_id");
        $this->db->order_by("post_id", "desc");
        $query = $this->db->get('pt_blog');
        $lastid = $query->result();
        if (empty ($lastid)) {
            $postlastid = 1;
        } else {
            $postlastid = $lastid[0]->post_id + 1;
        }

        $postslug = $this->input->post('slug');
        if (empty($postslug)) {
            $postslug = $this->makeSlug($this->input->post('title'), $postlastid);
        } else {
            $postslug = $this->makeSlug($postslug, $postlastid);
        }


        $postcount = $query->num_rows();
        $postorder = $postcount + 1;

        $relatedposts = @ implode(",", $this->input->post('relatedposts'));
        $data = array('post_title' => $this->input->post('title'),
            'post_slug' => $postslug,
            'post_desc' => $this->input->post('desc'),
            'post_category' => $this->input->post('category'),
            'post_meta_keywords' => $this->input->post('keywords'),
            'post_meta_desc' => $this->input->post('metadesc'),
            'post_status' => $this->input->post('status'),
            'post_feature' => $this->input->post('featured'),
            'location' => $this->input->post('location'),
            'post_related' => $relatedposts,
            'post_order' => $postorder,
            'post_img' => $filename_db,
            'post_created_at' => time(),
            'post_updated_at' => time());
        $this->db->insert('pt_blog', $data);
        $postid = $this->db->insert_id();
        $this->add_translation($this->input->post('translated'), $postid);
    }

// update Post data
    function update_post($id, $filename_db = null)
    {
        if (empty ($filename_db)) {
            $filename_db = $this->input->post('defimg');
        }
        $this->db->select("post_id");
        $this->db->order_by("post_id", "desc");
        $query = $this->db->get('pt_blog');
        $lastid = $query->result();
        if (empty ($lastid)) {
            $postlastid = 1;
        } else {
            $postlastid = $lastid[0]->post_id + 1;
        }
        $postcount = $query->num_rows();
        $postorder = $postcount + 1;
        $slug = $this->input->post('slug');
        if (empty ($slug)) {
            $this->db->select("post_id");
            $this->db->where("post_id !=", $id);
            $this->db->where("post_title", $this->input->post('title'));
            $queryc = $this->db->get('pt_blog')->num_rows();
            if ($queryc > 0) {
                $postslug = create_url_slug($this->input->post('title')) . "-" . $postlastid;
            } else {
                $postslug = create_url_slug($this->input->post('title'));
            }
        } else {
            $this->db->select("post_id");
            $this->db->where("post_id !=", $id);
            $this->db->where("post_slug", $this->input->post('slug'));
            $queryc = $this->db->get('pt_blog')->num_rows();
            if ($queryc > 0) {
                $postslug = create_url_slug($this->input->post('slug')) . "-" . $postlastid;
            } else {
                $postslug = create_url_slug($this->input->post('slug'));
            }
        }
        $relatedposts = @ implode(",", $this->input->post('relatedposts'));
        $data = array('post_title' => $this->input->post('title'), 'post_slug' => $postslug, 'post_desc' => $this->input->post('desc'), 'post_category' => $this->input->post('category'), 'post_meta_keywords' => $this->input->post('keywords'), 'post_meta_desc' => $this->input->post('metadesc'), 'post_status' => $this->input->post('status'), 'post_feature' => $this->input->post('featured'), 'post_related' => $relatedposts, 'post_img' => $filename_db, 'post_updated_at' => time(), 'location' => $this->input->post('location'));
        $this->db->where('post_id', $id);
        $this->db->update('pt_blog', $data);
        $this->update_translation($this->input->post('translated'), $id);
    }

// get all categories back all count records
    function get_all_categories_back()
    {
        $this->db->order_by('cat_id', 'desc');
        $query = $this->db->get('pt_blog_categories');
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    // get all parent categories back all count records
    function get_all_categoriesparent_back()
    {
        $this->db->where('cat_parent IS NULL', null, false);
        $this->db->order_by('cat_id', 'desc');
        $query = $this->db->get('pt_blog_categories');
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

// get all categories back limit
    function get_all_categories_back_limit($perpage = null, $offset = null, $orderby = null)
    {
        if ($offset != null) {
            $offset = ($offset == 1) ? 0 : ($offset * $perpage) - $perpage;
        }
        $this->db->order_by('cat_id', 'desc');
        $query = $this->db->get('pt_blog_categories', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

// get all categories info  by advance search
    function adv_search_all_categories_back_limit($data, $perpage = null, $offset = null, $orderby = null)
    {
        $status = $data["status"];
        $cattitle = $data["cattitle"];
        if ($offset != null) {
            $offset = ($offset == 1) ? 0 : ($offset * $perpage) - $perpage;
        }
        if (!empty ($cattitle)) {
            $this->db->like('cat_name', $cattitle);
        }
        $this->db->where('cat_status', $status);
        $this->db->order_by('cat_id', 'desc');
        $query = $this->db->get('pt_blog_categories', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

// Get all enalbed categores only
    function get_enabled_categories($parent = null)
    {
        $this->db->where('cat_status', 'Yes');
       $this->db->order_by('order', 'desc');
        return $this->db->get('pt_blog_categories')->result();
    }

// add category
    function addcategory()
    {
        $this->db->select("cat_id");
        $this->db->order_by("cat_id", "desc");
        $query = $this->db->get('pt_blog_categories');
        $lastid = $query->result();
        if (empty ($lastid)) {
            $catlastid = 1;
        } else {
            $catlastid = $lastid[0]->cat_id + 1;
        }
        $this->db->select("cat_id");
        $this->db->where("cat_name", $this->input->post('name'));
        $queryc = $this->db->get('pt_blog_categories')->num_rows();
        if ($queryc > 0) {
            $slug = create_url_slug($this->input->post('name')) . "-" . $catlastid;
        } else {
            $slug = create_url_slug($this->input->post('name'));
        }
        $data = array('cat_name' => $this->input->post('name'), 'cat_slug' => $slug, 'cat_status' => $this->input->post('status'), 'cat_parent' => $this->input->post('parent'), 'cat_layout' => $this->input->post('layout'), 'cat_classname' => $this->input->post('classname'));
        $this->db->insert('pt_blog_categories', $data);
        $catid = $this->db->insert_id();
        $this->updateBlogCategoryTranslation($this->input->post('translated'), $catid);
    }

    function updatecategory()
    {
        $id = $this->input->post('categoryid');
        $this->db->select("cat_id");
        $this->db->order_by("cat_id", "desc");
        $query = $this->db->get('pt_blog_categories');
        $lastid = $query->result();
        if (empty ($lastid)) {
            $catlastid = 1;
        } else {
            $catlastid = $lastid[0]->cat_id + 1;
        }
        $this->db->select("cat_id");
        $this->db->where("cat_id !=", $id);
        $this->db->where("cat_slug", $this->input->post('slug'));
        $queryc = $this->db->get('pt_blog_categories')->num_rows();
        if ($queryc > 0) {
            $slug = create_url_slug($this->input->post('name')) . "-" . $catlastid;
        } else {
            $slug = create_url_slug($this->input->post('name'));
        }
        $data = array('cat_name' => $this->input->post('name'), 'cat_slug' => $slug, 'cat_status' => $this->input->post('status'), 'cat_parent' => $this->input->post('parent'), 'cat_layout' => $this->input->post('layout'), 'cat_classname' => $this->input->post('classname'));
        $this->db->where('cat_id', $id);
        $this->db->update('pt_blog_categories', $data);
        $this->updateBlogCategoryTranslation($this->input->post('translated'), $id);
    }

// Delete category
    function delete_cat($catid)
    {
        $this->db->where('cat_id', $catid);
        $this->db->delete('pt_blog_categories');

        $this->db->where('cat_id', $catid);
        $this->db->delete('pt_blog_categories_translation');
    }

// Disable category

    public function disable_cat($id)
    {
        $data = array('cat_status' => '0');
        $this->db->where('cat_id', $id);
        $this->db->update('pt_blog_categories', $data);
    }

// Disable post

    public function disable_post($id)
    {
        $data = array('post_status' => 'No');
        $this->db->where('post_id', $id);
        $this->db->update('pt_blog', $data);
    }

// Enable category

    public function enable_cat($id)
    {
        $data = array('cat_status' => '1');
        $this->db->where('cat_id', $id);
        $this->db->update('pt_blog_categories', $data);
    }

// Enable post

    public function enable_post($id)
    {
        $data = array('post_status' => 'Yes');
        $this->db->where('post_id', $id);
        $this->db->update('pt_blog', $data);
    }

// get all posts for related selection for backend
    function select_related_posts($id = null)
    {
        $this->db->select('post_title,post_id');
        if (!empty ($id)) {
            $this->db->where('post_id !=', $id);
        }
        return $this->db->get('pt_blog')->result();
    }

    function blog_photo($id = null)
    {
        $this->load->library('image_lib');
        $tempFile = $_FILES['defaultphoto']['tmp_name'];
        $fileName = $_FILES['defaultphoto']['name'];
        $fileName = str_replace(" ", "-", $_FILES['defaultphoto']['name']);
        $fig = rand(1, 999999);

        if (strpos($fileName, 'php') !== false) {

        } else {

            $saveFile = $fig . '_' . $fileName;

            $targetPath = PT_BLOG_IMAGES_UPLOAD;

            $targetFile = $targetPath . $saveFile;
            move_uploaded_file($tempFile, $targetFile);

            $config['image_library'] = 'gd2';
            $config['source_image'] = $targetFile;

            $config['new_image'] = PT_BLOG_THUMBS_UPLOAD;

            $config['thumb_marker'] = '';
            $config['create_thumb'] = TRUE;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = HOTEL_THUMB_WIDTH;
            $config['height'] = HOTEL_THUMB_HEIGHT;
            $this->image_lib->clear();
            $this->image_lib->initialize($config);
            $this->image_lib->resize();

            $medium['image_library'] = 'gd2';
            $medium['source_image'] = $targetFile;

            $medium['new_image'] = PT_BLOG_MEDIUM_UPLOAD;

            $medium['thumb_marker'] = '';
            $medium['create_thumb'] = TRUE;
            $medium['maintain_ratio'] = TRUE;
            $medium['width'] = HOTEL_MEDIUM_WIDTH;
            $medium['height'] = HOTEL_MEDIUM_HEIGHT;
            $this->image_lib->clear();
            $this->image_lib->initialize($medium);
            $this->image_lib->resize();

            if (!empty ($id)) {
                $this->update_post($id, $saveFile);
                $oldimg = $this->input->post('defimg');
                if (!empty ($oldimg)) {
                    @ unlink(PT_BLOG_IMAGES_UPLOAD . $oldimg);
                    @ unlink(PT_BLOG_THUMBS_UPLOAD . $oldimg);
                    @ unlink(PT_BLOG_MEDIUM_UPLOAD . $oldimg);
                }

            } else {
                $this->add_post($saveFile);

            }

        }


    }

// get file extension
    function __getExtension($str)
    {
        $i = strrpos($str, ".");
        if (!$i) {
            return "";
        }
        $l = strlen($str) - $i;
        $ext = substr($str, $i + 1, $l);
        return $ext;
    }

// update post order
    function update_post_order($id, $order)
    {
        $data = array('post_order' => $order);
        $this->db->where('post_id', $id);
        $this->db->update('pt_blog', $data);
    }

// get all data of single post by slug
    function get_post_data($slug)
    {
        $this->db->where('post_slug', $slug);
        return $this->db->get('pt_blog')->result();
    }

    function delete_post($id)
    {
        $this->delete_image($id);
        $this->db->where('post_id', $id);
        $this->db->delete('pt_blog');

        $this->db->where('item_id', $id);
        $this->db->delete('pt_blog_translation');
    }

// Delete Post Images
    function delete_image($id)
    {
        $this->db->where('post_id', $id);
        $res = $this->db->get('pt_blog')->result();
        $img = $res[0]->post_img;
        if (!empty ($img)) {
            @ unlink(PT_BLOG_IMAGES_UPLOAD . $img);
        }
    }

// update translated data os some fields in english
    function update_english($id)
    {
        $cslug = create_url_slug($this->input->post('title'));
        $this->db->where('post_slug', $cslug);
        $this->db->where('post_id !=', $id);
        $nums = $this->db->get('pt_blog')->num_rows();
        if ($nums > 0) {
            $cslug = $cslug . "-" . $id;
        } else {
            $cslug = $cslug;
        }
        $data = array('post_title' => $this->input->post('title'), 'post_slug' => $cslug, 'post_desc' => $this->input->post('desc'));
        $this->db->where('post_id', $id);
        $this->db->update('pt_blog', $data);
        return $cslug;
    }


    // Adds translation of some fields data
    function add_translation($postdata, $id)
    {
        foreach ($postdata as $lang => $val) {
            if (array_filter($val)) {
                $title = $val['title'];
                $desc = $val['desc'];
                $metadesc = $val['metadesc'];
                $kewords = $val['keywords'];

                $data = array(
                    'trans_title' => $title,
                    'trans_desc' => $desc,
                    'trans_meta_desc' => $metadesc,
                    'trans_keywords' => $kewords,
                    'item_id' => $id,
                    'trans_lang' => $lang
                );
                $this->db->insert('pt_blog_translation', $data);

            }

        }


    }

    // Update translation of some fields data
    function update_translation($postdata, $id)
    {

        foreach ($postdata as $lang => $val) {
            if (array_filter($val)) {
                $title = $val['title'];
                $desc = $val['desc'];
                $metadesc = $val['metadesc'];
                $kewords = $val['keywords'];
                $transAvailable = $this->getBackBlogTranslation($lang, $id);

                if (empty($transAvailable)) {
                    $data = array(
                        'trans_title' => $title,
                        'trans_desc' => $desc,
                        'trans_meta_desc' => $metadesc,
                        'trans_keywords' => $kewords,
                        'item_id' => $id,
                        'trans_lang' => $lang
                    );
                    $this->db->insert('pt_blog_translation', $data);

                } else {
                    $data = array(
                        'content_page_title' => $title,
                        'content_body' => $desc,
                        'content_meta_desc' => $metadesc,
                        'content_meta_keywords' => $kewords,
                    );
                    $this->db->where('content_page_id', $id);
                    $this->db->where('content_lang_id', $lang);
                    $this->db->update('pt_cms_content', $data);

                    $data = array(
                        'trans_title' => $title,
                        'trans_desc' => $desc,
                        'trans_meta_desc' => $metadesc,
                        'trans_keywords' => $kewords,
                    );
                    $this->db->where('item_id', $id);
                    $this->db->where('trans_lang', $lang);
                    $this->db->update('pt_blog_translation', $data);

                }


            }

        }
    }

    function getBackBlogTranslation($lang, $id)
    {
        $this->db->where('trans_lang', $lang);
        $this->db->where('item_id', $id);
        return $this->db->get('pt_blog_translation')->result();
    }

    function makeSlug($title, $postlastid = null)
    {
        $slug = create_url_slug($title);
        $this->db->select("post_id");
        $this->db->where("post_slug", $slug);
        if (!empty($postlastid)) {
            $this->db->where('post_id !=', $postlastid);
        }
        $queryc = $this->db->get('pt_blog')->num_rows();
        if ($queryc > 0) {
            $slug = $slug . "-" . $postlastid;
        }
        return $slug;
    }


    function updateBlogCategoryTranslation($postdata, $id)
    {

        foreach ($postdata as $lang => $val) {
            if (array_filter($val)) {
                $name = $val['name'];

                $transAvailable = $this->getBlogCatsTranslation($lang, $id);

                if (empty($transAvailable)) {
                    $data = array(
                        'cat_name' => $name,
                        'cat_id' => $id,
                        'trans_lang' => $lang
                    );
                    $this->db->insert('pt_blog_categories_translation', $data);

                } else {

                    $data = array(
                        'cat_name' => $name
                    );
                    $this->db->where('cat_id', $id);
                    $this->db->where('trans_lang', $lang);
                    $this->db->update('pt_blog_categories_translation', $data);

                }


            }

        }
    }


    function getBlogCatsTranslation($lang, $id)
    {

        $this->db->where('trans_lang', $lang);
        $this->db->where('cat_id', $id);
        return $this->db->get('pt_blog_categories_translation')->result();

    }

    function get_by_key($id)
    {
        $this->db->where('cat_id', $id);
        $rs = $this->db->get('pt_blog_categories')->result();
        return $rs[0];
    }

     function get_by_slug($slug)
    {
        $this->db->where('cat_slug', $slug);
        $rs = $this->db->get('pt_blog_categories')->result();
        return $rs[0];
    }

     function get_post_by_key($cate_id ,$limit)
    {
        $this->db->where('post_category', $cate_id);
        $this->db->order_by('post_created_at', 'desc');
        $this->db->limit($limit);
        $rs = $this->db->get('pt_blog')->result();
        return $rs;
    }
       function get_child_category($parent_id,$limit)
    {
        $this->db->where('cat_parent', $parent_id);
        $this->db->limit($limit);
        $rs = $this->db->get('pt_blog_categories')->result();
        return $rs;
    }

}