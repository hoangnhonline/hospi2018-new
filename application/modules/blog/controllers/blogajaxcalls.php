<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Blogajaxcalls extends MX_Controller
{
    private $data = array();

    function __construct()
    {
        $this->load->model('blog/blog_model');

    }

    // delete multiple categories
    public function delMultipleCategories()
    {
        $catlist = $this->input->post('catlist');

        $items = $this->input->post('items');
        foreach ($items as $item) {
            $this->blog_model->delete_cat($item);
        }
    }

    // delete multiple posts
    public function delMultiplePosts()
    {

        $items = $this->input->post('items');
        foreach ($items as $item) {
            $this->blog_model->delete_post($item);
        }
    }

    // Delete Single category
    public function delete_single_category()
    {
        $catid = $this->input->post('catid');
        $this->blog_model->delete_cat($catid);
        $this->session->set_flashdata('flashmsgs', "Deleted Successfully");

    }

    // Delete Single Post
    public function delete_single_post()
    {
        $postid = $this->input->post('postid');
        $this->blog_model->delete_post($postid);
        $this->session->set_flashdata('flashmsgs', "Deleted Successfully");
    }

    // update post order
    public function update_post_order()
    {
        $postid = $this->input->post('id');
        $order = $this->input->post('order');

        $this->blog_model->update_post_order($postid, $order);
    }

    // Disable multiple categories
    public function disable_multiple_categories()
    {
        $catlist = $this->input->post('catlist');

        foreach ($catlist as $catid) {
            $this->blog_model->disable_cat($catid);
        }
        $this->session->set_flashdata('flashmsgs', "Disabled Successfully");
    }

    // Disable multiple posts
    public function disable_multiple_posts()
    {
        $postlist = $this->input->post('postlist');

        foreach ($postlist as $postid) {
            $this->blog_model->disable_post($postid);
        }
        $this->session->set_flashdata('flashmsgs', "Disabled Successfully");
    }

    // Enable multiple categories
    public function enable_multiple_categories()
    {
        $catlist = $this->input->post('catlist');

        foreach ($catlist as $catid) {
            $this->blog_model->enable_cat($catid);
        }
        $this->session->set_flashdata('flashmsgs', "Enabled Successfully");
    }

    // Enable multiple posts
    public function enable_multiple_posts()
    {
        $postlist = $this->input->post('postlist');

        foreach ($postlist as $postid) {
            $this->blog_model->enable_post($postid);
        }
        $this->session->set_flashdata('flashmsgs', "Enabled Successfully");
    }


    // Enable multiple posts
    public function cate_front()
    {
        $slug = $this->input->get('slug');
       $categoryVo = $this->blog_model->get_by_slug($slug);     

        $category_parent_id =  $categoryVo->cat_parent;
        if(isset(  $category_parent_id)){//is child
            $parentCateVo = $this->blog_model->get_by_key($category_parent_id);
            $layout_id = $parentCateVo->cat_layout;
        }else{
            $layout_id =  $categoryVo->cat_layout;
        }//echo $categoryVo->cat_id;die;
        $posts = $this->blog_model->get_post_by_key( $categoryVo->cat_id ,4);
      //  $layout = 'blog/layout_'.$layout_id ; 
        $str =  '<div class="list-news list-news2\">
            <ul>'; 
        foreach ($posts as $index => $post) {
            if ($index % 2 == 0) {
                $str .=  ' <li class=\"news-style news-style-orgrance news-style-list clearfix\">
                    <div class=\"image\">
                        <a href=\"' .base_url('blog/' . $post->post_slug).'\" title=\"'.$post->post_title.'\"><img src=\"'.PT_BLOG_IMAGES . $post->post_img.' alt=\"'. $post->post_title.' class=\"img-responsive\"></a>
                    </div>
                    <div class=\"info\">
                        <a href=\"'. base_url('blog/' . $post->post_slug).' title=\"'. $post->post_title.'>
                            <h2>'. $post->post_title.'</h2>
                        </a>
                        <div>
                            <p class=\"RTL\">'. strip_tags($post->post_desc).'</p>
                            <div class=\"post-left go-right\">
                                <ul class=\"go-right\">
                                    <li><span>'. date('d/m/Y', $post->post_created_at).'</span></li>
                                    <li><span class="fb-like fb_iframe_widget" data-href="'. base_url('blog/' . $post->post_slug).' data-layout=\"button_count\" data-action=\"like\" data-size=\"small\" data-show-faces=\"true\" data-share=\"true\"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>';
            } else {
               $str .=  ' <li class="news-style news-style-orgrance news-style-list clearfix">
                    <div class="info">
                        <a href="'. base_url('blog/' . $post->post_slug).' title="'. $post->post_title.'>
                            <h2>'. $post->post_title.'</h2>
                        </a>
                        <div>
                            <p class="RTL">'. strip_tags($post->post_desc).'</p>
                            <div class="post-left go-right">
                                <ul class="go-right">
                                    <li class="date-create"><span>'. date('d/m/Y', $post->post_created_at).'</span></li>
                                    <li><span class="fb-like fb_iframe_widget" data-href="'. base_url('blog/' . $post->post_slug).' data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="image">
                        <a href="'. base_url('blog/' . $post->post_slug).' title="'. $post->post_title.'><img src="'.PT_BLOG_IMAGES . $post->post_img.' alt="'. $post->post_title.' class="img-responsive"></a>
                    </div>
                </li>';
            }
        }
    $str .=  '</ul></div>';
    echo $str;
       // var_dump($posts) ;die;

    }
}
