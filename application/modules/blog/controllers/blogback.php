<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Blogback extends MX_Controller
{
    private $data = array();
    public $accType = "";
    public $langdef;
    public $editpermission = true;
    public $deletepermission = true;
    public $role;

    function __construct()
    {
        $seturl = $this->uri->segment(3);
        if ($seturl != "settings") {
            $chk = modules:: run('home/is_main_module_enabled', 'blog');
            if (!$chk) {
                redirect("admin");
            }
        }
        $checkingadmin = $this->session->userdata('pt_logged_admin');
        $this->accType = $this->session->userdata('pt_accountType');
        $this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
        $this->data['isSuperAdmin'] = $this->session->userdata('pt_logged_super_admin');

        $this->role = $this->session->userdata('pt_role');
        $this->data['role'] = $this->role;

        if (!empty ($checkingadmin)) {
            $this->data['userloggedin'] = $this->session->userdata('pt_logged_admin');
        } else {
            $this->data['userloggedin'] = $this->session->userdata('pt_logged_supplier');
        }
        if (empty ($this->data['userloggedin'])) {
            redirect("admin");
        }
        if (!empty ($checkingadmin)) {
            $this->data['adminsegment'] = "admin";
        } else {
            $this->data['adminsegment'] = "supplier";
        }
        if (empty($this->data['isSuperAdmin'])) {

            redirect('admin');
        }


        $this->data['c_model'] = $this->countries_model;
        $this->data['addpermission'] = true;
        if ($this->accType == "supplier") {
            $this->editpermission = pt_permissions("editblog", $this->data['userloggedin']);
            $this->deletepermission = pt_permissions("deleteblog", $this->data['userloggedin']);
            $this->data['addpermission'] = pt_permissions("addblog", $this->data['userloggedin']);
        }
        $this->load->helper('settings');
        $this->load->helper('blog/blog_front');
        $this->load->model('blog/blog_model');
        $this->load->library('ckeditor');
        $this->data['ckconfig'] = array();
        $this->data['ckconfig']['toolbar'] = array(array('Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'Format', 'Styles'), array('NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote'), array('Image', 'Link', 'Unlink', 'Anchor', 'Table', 'HorizontalRule', 'SpecialChar', 'Maximize'), array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt'),);
        $this->data['ckconfig']['language'] = 'en';
        $this->data['ckconfig']['height'] = '350px';
        $this->data['ckconfig']['filebrowserUploadUrl'] = base_url() . 'home/cmsupload';
        $this->langdef = DEFLANG;
        $this->data['languages'] = pt_get_languages();
    }

    function index()
    {
        $this->load->library('blog/blog_lib');

       $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('pt_blog');
        $xcrud->join('post_category', 'pt_blog_categories', 'cat_id');
        $xcrud->change_type('post_category', 'select', 'email2@ex.com', 'email1@ex.com,email2@ex.com,email3@ex.com,email4@ex.com,email5@ex.com');
        $xcrud->order_by('post_id', 'desc');
        $xcrud->columns('post_img,post_title,pt_blog_categories.cat_name,post_created_at,post_order,post_status');
        $xcrud->label('post_title', 'Tiêu đề')->label('pt_blog_categories.cat_name', 'Danh mục')->label('post_created_at', 'Ngày tạo')->label('post_order', 'Thứ tự')->label('post_status', 'Trạng thái')->label('post_img', 'Ảnh đại diện');
        $xcrud->fields('post_img,post_title,pt_blog_categories.cat_name,post_desc,post_created_at,post_status');
        $xcrud->change_type('post_img', 'image', false, array(
            'width' => 200,
            'path' => '../../' . PT_BLOG_IMAGES_UPLOAD,
            'thumbs' => array(array(
                'crop' => true,
                'marker' => ''))));
        $xcrud->unset_add();
        $xcrud->unset_view();
        $xcrud->unset_edit();
        $xcrud->unset_remove();
        $this->data['add_link'] = base_url() . 'admin/blog/add';
        if ($this->editpermission) {
            $xcrud->button(base_url() . $this->data['adminsegment'] . '/blog/manage/{post_slug}', 'Edit', 'fa fa-edit', 'btn btn-warning', array('target' => '_self'));
            $xcrud->column_pattern('post_title', '<a href="' . base_url() . $this->data['adminsegment'] . '/blog/manage/{post_slug}' . '">{value}</a>');
        }

        if ($this->deletepermission) {
            $delurl = base_url() . 'admin/ajaxcalls/delBlog';
            $xcrud->button("javascript: delfunc('{post_id}','$delurl')", 'DELETE', 'fa fa-times', 'btn-danger', array('target' => '_self'));
        }
        $xcrud->search_columns('post_title,pt_blog_categories.cat_name,post_order,post_status');
        $xcrud->column_callback('post_order', 'orderInputPost');
        $xcrud->column_callback('post_created_at', 'fmtDate');
        $xcrud->column_class('post_img', 'zoom_img');

        $xcrud->multiDelUrl = base_url() . 'blog/blogajaxcalls/delMultiplePosts';

        $this->data['content'] = $xcrud->render();

      // echo "<pre>"; print_r( $this->data['categories']); echo "</pre>";die;
       $limit = $this->input->get('limit') ? $this->input->get('limit') : 20;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $count= $this->blog_lib->get_count_blogs();//var_dump( $count);
        $posts = $this->blog_lib->get_blogs_data_limit( $limit ,$page, null);
        $this->data['posts'] = $posts ;
        $this->data['info'] = array('base' => base_url() . 'admin/blog', 'totalrows' => $count, 'perpage' => $limit);
        //echo $count .' '  .$limit ;die;
       //var_dump($posts);die;
        //$this->data['main_content'] = 'temp_view';

         $this->data['main_content'] = 'blog_list_view';
        $this->data['page_title'] = 'Quản lý Blog';
        $this->data['header_title'] = 'Quản lý Blog';
        $this->load->view('template', $this->data);

    }

    function add()
    {

        $addpost = $this->input->post('action');
        if ($addpost == "add") {
            $this->form_validation->set_rules('title', 'Post Title', 'trim|required');
            $this->form_validation->set_rules('pageslug', 'Post Slug', 'trim');
            $this->form_validation->set_rules('keywords', 'Meta Keywords', 'trim');
            $this->form_validation->set_rules('metadesc', 'Meta Description', 'trim');
            $this->form_validation->set_rules('desc', 'Post Content', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                if (isset ($_FILES['defaultphoto']) && !empty ($_FILES['defaultphoto']['name'])) {
                    $result = $this->blog_model->blog_photo();
                    if ($result == "done") {
                        $this->session->set_flashdata('flashmsgs', 'Post added Successfully');
                        redirect('admin/blog');
                    } else {
                        $this->data['errormsg'] = $result;
                    }
                } else {
                    $postid = $this->blog_model->add_post();

                    $this->session->set_flashdata('flashmsgs', 'Post added Successfully');
                    redirect('admin/blog');
                }
            }
        }
        $this->data['action'] = "add";
        $this->data['all_posts'] = $this->blog_model->select_related_posts();
        $this->data['categories'] = $this->blog_model->get_enabled_categories();
        $this->data['main_content'] = 'blog/manage_new';
        $this->data['page_title'] = 'Add Blog';
        $this->load->model('admin/locations_model');
        $this->data['locations'] = $this->locations_model->getLocationsBackend();
        $this->load->view('admin/template', $this->data);
    }

    function settings()
    {
        $this->load->model('admin/settings_model');
        $updatesett = $this->input->post('updatesettings');
        if (!empty ($updatesett)) {
            $this->blog_model->update_front_settings();
            redirect('admin/blog/settings');
        }
        $this->data['settings'] = $this->settings_model->get_front_settings("blog");
        $this->data['main_content'] = 'blog/settings';
        $this->data['page_title'] = 'Blog Settings';
        $this->load->view('admin/template', $this->data);
    }

    function manage($slug)
    {
        if (empty ($slug)) {
            redirect('admin/blog');
        }
        $updatepost = $this->input->post('action');
        $postid = $this->input->post('postid');
        $this->data['action'] = "update";
        if ($updatepost == "update") {
            $this->form_validation->set_rules('title', 'Post Title', 'trim|required');
            $this->form_validation->set_rules('pageslug', 'Post Slug', 'trim');
            $this->form_validation->set_rules('keywords', 'Meta Keywords', 'trim');
            $this->form_validation->set_rules('metadesc', 'Meta Description', 'trim');
            $this->form_validation->set_rules('desc', 'Post Content', 'trim|required');
            if ($this->form_validation->run() == FALSE) {
            } else {
                if (isset ($_FILES['defaultphoto']) && !empty ($_FILES['defaultphoto']['name'])) {
                    $this->blog_model->blog_photo($postid);
                    $this->session->set_flashdata('flashmsgs', 'Post Updated Successfully');
                    redirect('admin/blog');
                } else {
                    $this->blog_model->update_post($postid);
                    $this->session->set_flashdata('flashmsgs', 'Post Updated Successfully');
                    redirect('admin/blog');
                }
            }
        } else {
            $this->data['pdata'] = $this->blog_model->get_post_data($slug);
            if (empty ($this->data['pdata'])) {
                redirect('admin/blog');
            }

            $this->data['related_selected'] = explode(",", $this->data['pdata'][0]->post_related);
            $this->data['all_posts'] = $this->blog_model->select_related_posts($this->data['pdata'][0]->post_id);
            $this->data['categories'] = $this->blog_model->get_enabled_categories();
            $this->data['main_content'] = 'blog/manage_new';
            $this->load->model('admin/locations_model');
            $this->data['locations'] = $this->locations_model->getLocationsBackend();
            $this->data['page_title'] = 'Manage Post';
            $this->load->view('admin/template', $this->data);
        }
    }

    function category()
    {  
        $this->load->helper('xcrud');
        $updatecat = $this->input->post('updatecat');
        if (!empty($updatecat)) {
            $this->blog_model->updatecategory();
            redirect(base_url('admin/blog/category'));
        }

        $addcat = $this->input->post('addcat');
        if (!empty($addcat)) {
            $this->blog_model->addcategory();
            redirect(base_url('admin/blog/category'));
        }
        $xcrud = xcrud_get_instance();

        $xcrud->table('pt_blog_categories');
        $xcrud->order_by('cat_id', 'desc');
        $xcrud->columns('cat_name,cat_slug,cat_status');
        $xcrud->label('cat_name', 'Tên danh mục')->label('cat_slug', 'Slug')->label('cat_status', 'Trạng thái');
        $xcrud->button('#cat{cat_id}', 'Chỉnh sửa', 'fa fa-edit', 'btn btn-warning', array('data-toggle' => 'modal'));
        $delurl = base_url() . 'admin/ajaxcalls/delBlogCat';
        $xcrud->button("javascript: delfunc('{cat_id}','$delurl')", 'DELETE', 'fa fa-times', 'btn-danger', array('target' => '_self'));


        $xcrud->unset_add();
        $xcrud->unset_edit();
        $xcrud->unset_remove();
        $xcrud->unset_view();
        $this->data['categories'] = $this->blog_model->get_all_categories_back();
      // echo "<pre>"; print_r( $this->data['categories']); echo "</pre>";die;
        $xcrud->multiDelUrl = base_url() . 'blog/blogajaxcalls/delMultipleCategories';
        $limit = $this->input->get('limit') ? $this->input->get('limit') : 20;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        $this->data['categories'] = $this->blog_model->get_all_categories_back();
        $this->data['info'] = array('base' => base_url() . 'admin/blog/category', 'totalrows' => $this->data['categories']['nums'], 'perpage' => $limit);

        $this->data['content'] = $xcrud->render();
        $this->data['page_title'] = 'Danh mục blog';
        $this->data['main_content'] = 'blog_categories_list_view';
        $this->data['header_title'] = 'Danh mục blog';
        $this->data['categoriesparent'] = $this->blog_model->get_all_categoriesparent_back();
        $this->load->view('template', $this->data);
    }


    function translate($blogslug, $lang = null)
    {
        $this->load->library('blog/blog_lib');
        $this->blog_lib->set_blogid($blogslug);
        $add = $this->input->post('add');
        $update = $this->input->post('update');
        if (empty ($lang)) {
            $lang = $this->langdef;
        } else {
            $lang = $lang;
        }
        if (empty ($blogslug)) {
            redirect('admin/blog/');
        }
        if (!empty ($add)) {
            $language = $this->input->post('langname');
            $postid = $this->input->post('postid');
            $this->blog_model->add_translation($language, $postid);
            redirect("admin/blog/translate/" . $blogslug . "/" . $language);
        }
        if (!empty ($update)) {
            $slug = $this->blog_model->update_translation($lang, $blogslug);
            redirect("admin/blog/translate/" . $slug . "/" . $lang);
        }
        $cdata = $this->blog_lib->post_details();
        if ($lang == $this->langdef) {
            $blogdata = $this->blog_lib->post_short_details();
            $this->data['blogdata'] = $blogdata;
            $this->data['transdesc'] = $blogdata[0]->post_desc;
            $this->data['transtitle'] = $blogdata[0]->post_title;
        } else {
            $blogdata = $this->blog_lib->translated_data($lang);
            $this->data['blogdata'] = $blogdata;
            $this->data['transid'] = $blogdata[0]->trans_id;
            $this->data['transdesc'] = $blogdata[0]->trans_desc;
            $this->data['transtitle'] = $blogdata[0]->trans_title;
        }
        $this->data['postid'] = $this->blog_lib->get_id();
        $this->data['lang'] = $lang;
        $this->data['slug'] = $blogslug;
        $this->data['language_list'] = pt_get_languages();
        $this->data['main_content'] = 'blog/translate';
        $this->data['page_title'] = 'Translate Post';
        $this->load->view('admin/template', $this->data);
    }

}