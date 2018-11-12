<?php

class Blog_lib
{
    /**
     * Protected variables
     */
    protected $ci = NULL; //codeigniter instance
    protected $db; //database instatnce instance
    protected $blogid;
    public $title;
    public $slug;
    public $desc;
    public $date;
    public $thumbnail;
    public $hits;
    public $catid;
    public $langdef;
    protected $lang;

    function __construct()
    {
//get the CI instance
        $this->ci = &get_instance();
        $this->db = $this->ci->db;
        $this->ci->load->model('blog/blog_model');
        $this->ci->load->library('bootpagination');
        $lang = $this->ci->session->userdata('set_lang');
        $defaultlang = pt_get_default_language();

        $this->set_lang($this->ci->session->userdata('set_lang'));
        $this->langdef = DEFLANG;
    }

    function set_lang($lang)
    {
        if (empty ($lang)) {
            $defaultlang = pt_get_default_language();
            $this->lang = $defaultlang;
        } else {
            $this->lang = $lang;
        }
    }

    function set_blogid($slug)
    {
        $this->db->select('post_id');
        $this->db->where('post_slug', $slug);
        $r = $this->db->get('pt_blog')->result();
        $this->blogid = $r[0]->post_id;
    }

//set car id by id
    function set_id($id)
    {
        $this->blogid = $id;
    }

    function get_id()
    {
        return $this->blogid;
    }

    function settings()
    {
        return $this->ci->settings_model->get_front_settings('blog');
    }

    function show_posts($page = null, $perpage = null)
    {
        $data = array();
        $settings = $this->settings();
        if (empty($perpage)) {
            $perpage = $settings[0]->front_listings;
        }

        $sortby = $this->ci->input->get('sortby');
        if (!empty ($sortby)) {
            $orderby = $sortby;
        } else {
            $orderby = $settings[0]->front_listings_order;
        }
        $rh = $this->ci->blog_model->list_posts_front();
        $data['all_posts'] = $this->ci->blog_model->list_posts_front($perpage, $page, $orderby);
        $data['paginationinfo'] = array('base' => 'blog/listing', 'totalrows' => $rh['rows'], 'perpage' => $perpage);

        return $data;
    }

    function post_details()
    {
        $this->db->select('pt_blog.*,pt_blog_categories.cat_name');
        $this->db->where('pt_blog.post_id', $this->blogid);
        $this->db->join('pt_blog_categories', 'pt_blog.post_category = pt_blog_categories.cat_id', 'left');
        $details = $this->db->get('pt_blog')->result();
        $this->slug = $details[0]->post_slug;
        $this->title = $this->get_title($details[0]->post_title);
        $this->desc = $this->get_description($details[0]->post_desc);
        $this->thumbnail = $this->post_thumbnail($details[0]->post_id);
        $this->date = pt_show_date_php($details[0]->post_created_at);
        $this->hits = $details[0]->post_visits;
        $this->catid = $details[0]->post_category;
        return $details;
    }

    function post_short_details()
    {
        $this->db->select('post_title,post_desc,post_created_at,post_slug,post_category');
        $this->db->where('pt_blog.post_id', $this->blogid);
        $details = $this->db->get('pt_blog')->result();
        $this->slug = $details[0]->post_slug;
        $this->title = $this->get_title($details[0]->post_title);
        $this->desc = $this->get_description($details[0]->post_desc);
        $this->date = pt_show_date_php($details[0]->post_created_at);
        $this->thumbnail = $this->post_thumbnail($this->blogid);
        $this->catid = $details[0]->post_category;
        return $details;
    }

    function post_thumbnail($id)
    {
        $res = $this->ci->blog_model->post_thumbnail($id);
        if (!empty ($res)) {
            return PT_BLOG_IMAGES . $res;
        } else {
            return PT_BLANK;
        }
    }

    function search_posts($page = null)
    {
        $data = array();
        $settings = $this->settings();
        $perpage = $settings[0]->front_search;
        $orderby = $settings[0]->front_search_order;
        $rh = $this->ci->blog_model->search_posts_front();
        $data['all_posts'] = $this->ci->blog_model->search_posts_front($perpage, $page, $orderby);
        $data['paginationinfo'] = array('base' => 'blog/search', 'totalrows' => $rh['rows'], 'perpage' => $perpage);
        //$data['plinks'] = $this->ci->bootpagination->dopagination('blog/search', $rh['rows'], $perpage);
        return $data;
    }

    function latest_posts_homepage()
    {
        $settings = $this->settings();
        $perpage = $settings[0]->front_homepage;
        $orderby = $settings[0]->front_homepage_order;
        return $this->ci->blog_model->latest_posts($perpage, $orderby);
    }

    function category_slug($id)
    {
        $slug = $this->ci->blog_model->category_slug($id);
        return $slug;
    }

    function category_posts($page = null, $cat = null)
    {
        $data = array();
        $settings = $this->settings();
        $perpage = $settings[0]->front_listings;
        $orderby = $settings[0]->front_listings_order;
        $rh = $this->ci->blog_model->category_posts_front(null, null, null, $cat);
        $data['all_posts'] = $this->ci->blog_model->category_posts_front($perpage, $page, $orderby, $cat);
        $data['paginationinfo'] = array('base' => 'blog/category', 'totalrows' => $rh['rows'], 'perpage' => $perpage);

        return $data;
    }

    function get_title($deftitle)
    {
        if ($this->lang == $this->langdef) {
            $title = $deftitle;
        } else {
            $this->db->where('item_id', $this->blogid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_blog_translation')->result();
            $title = $res[0]->trans_title;
            if (empty ($title)) {
                $title = $deftitle;
            }
        }
        return $title;
    }

    function get_description($defdesc)
    {
        if ($this->lang == $this->langdef) {
            $desc = $defdesc;
        } else {
            $this->db->where('item_id', $this->blogid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_blog_translation')->result();
            $desc = $res[0]->trans_desc;
            if (empty ($desc)) {
                $desc = $defdesc;
            }
        }
        return $desc;
    }

    function getCategories()
    {
        $result = $this->ci->blog_model->get_enabled_categories();
        foreach ($result as $rs) {
            $title = $this->getCategoryTitle($rs->cat_name, $rs->cat_id);

            $cats[$rs->cat_id] = (object)[
                'id' => $rs->cat_id,
                'name' => $title,
                'slug' => $rs->cat_slug,
                'class' => $rs->cat_classname,
                'layout' => $rs->cat_layout,
                'parent' => empty($rs->cat_parent) ? 0 : $rs->cat_parent
            ];

        }

        return $cats;
    }

    function getCategoryTitle($deftitle, $catid)
    {
        if ($this->lang == $this->langdef) {
            $title = $deftitle;
        } else {
            $this->db->where('cat_id', $catid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_blog_categories_translation')->result();
            $title = $res[0]->cat_name;
            if (empty ($title)) {
                $title = $deftitle;
            }
        }
        return $title;
    }

    function translated_data($lang)
    {
        $this->db->where('item_id', $this->blogid);
        $this->db->where('trans_lang', $lang);
        return $this->db->get('pt_blog_translation')->result();
    }

    function getCategoriesByParent($parent)
    {
        $result = $this->getCategories();
        $cats = [];

        foreach ($result as $rs) {
            if ($rs->parent == $parent) {
                $cats[$rs->id] = $rs;
            }
        }

        return $cats;
    }

    function get_count_blogs() {
        $this->db->order_by('post_id', 'desc');
        $query = $this->db->get('pt_blog');
        //$data['all'] = $query->result();
        $data = $query->num_rows();
        return $data;
    }

// get all bookings with limit
    function get_blogs_data_limit($perpage = null, $offset = null, $orderby = null) {
        if ($offset != null) {
            $offset = ($offset == 1) ? 0 : ($offset * $perpage) - $perpage;
        }
        $this->db->order_by('post_id', 'desc');
        $query = $this->db->get('pt_blog', $perpage, $offset);
      //  $data['all'] = $query->result();
// $data['nums'] = $query->num_rows();
//$query->result();
        //var_dump( $query->result());      
         // echo $this->db->last_query();die;

        return $query->result();
    }
}