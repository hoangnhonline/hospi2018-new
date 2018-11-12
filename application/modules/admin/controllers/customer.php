<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends MX_Controller
{
    public $role;
    private $data = array();

    function __construct()
    {
        parent:: __construct();
        modules :: load('admin');
        $this->load->module("admin");
        /*   $chkadmin = modules::run('admin/validadmin');
        
        if(!$chkadmin){
        
        redirect(base_url().'admin');
        
        }*/
        $seturl = $this->uri->segment(3);
        if ($seturl != "settings") {
            $chk = modules::run('home/is_module_enabled', 'offers');
            if (!$chk) {
                redirect(base_url() . 'admin');
            }
        }
        $this->data['app_settings'] = $this->settings_model->get_settings_data();
        
        $this->load->model('admin/accounts_model');
        $this->load->model('admin/uploads_model');
        $this->load->model('admin/modules_model');
        $this->data['c_model'] = $this->countries_model;
        $this->data['countries'] = $this->data['c_model']->get_all_countries();
        $this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
        $this->data['userid'] = $this->session->userdata('pt_logged_id');
        $this->data['modules'] = $this->modules_model->get_all_modules();
        $this->data['userloggedin'] = $this->session->userdata('pt_logged_admin');
        $this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
        $this->data['isSuperAdmin'] = $this->session->userdata('pt_logged_super_admin');
        $this->role = $this->session->userdata('pt_role');
        $this->data['role'] = $this->role;
        
        $this->data['mainmodules'] = $this->ptmodules->modules_permissions($this->data['modules']);
        
    }

    function index()
    {

        $rs= $this->accounts_model->get_accounts_data('customers');
        $total_records =$rs['nums'];
        $limit = $this->input->get('limit') ? $this->input->get('limit') : 20;
        $page = $this->input->get('page') ? $this->input->get('page') : 1;
        //$offset = ($page == 1) ? 0 : ($page * $limit) - $limit;
        
        $this->data['info'] = array('base' => base_url() . 'admin/customer', 'totalrows' => $total_records, 'perpage' => $limit);
        $data = $this->accounts_model->get_accounts_data_limit('customers', $limit, $page);
        $this->data['content'] = $data['all'];
        
    	$this->data['main_content'] = 'customer/index';
		$this->load->view('admin/template_new', $this->data);
    }
    function add($args = null, $id = null)
    {

        if ($this->admin->role != "webadmin") {
            redirect(base_url() . 'admin');
        }
        $this->data['type'] = "customers";
        $userdata = $this->accounts_model->get_profile_details($id);
        if (!empty($userdata)) {
            $this->data['profile'] = $userdata;
            $this->data['isSubscribed'] = $this->newsletter_model->is_subscribed($this->data['profile'][0]->accounts_email);
            $this->data['permitted'] = explode(",", $this->data['profile'][0]->accounts_permissions);
            
        } else {
            $this->data['profile'] = "";
            $this->data['permitted'] = array();
        }
        
        $this->data['viewtype'] = "addaccount";
        
        $subscribe = $this->input->post('newssub');
        $addaccount = $this->input->post('addaccount');
        if (!empty ($addaccount)) {
            
            if ($this->form_validation->run('addcustomer') == FALSE) {//echo validation_errors(); die;

            } else {
                if (!empty ($subscribe)) {
                    $this->newsletter_model->add_subscriber($this->input->post('email'), $this->input->post('type'));
                }
                if (isset ($_FILES['photo']) && !empty ($_FILES['photo']['name'])) {
                    $result = $this->uploads_model->__profileimg();
                    if ($result == '1') {
                        $this->data['errormsg'] = "Invalid file type kindly select only jpg/jpeg, png, gif file types";
                    } elseif ($result == '2') {
                        $this->data['errormsg'] = "Only upto 2MB size photos allowed";
                    } elseif ($result == '3') {
                        $this->session->set_flashdata('flashmsgs', "Admin Account Added Successfully");
                        redirect(base_url() . 'admin/customer/index');
                    }
                } else {
                    $this->accounts_model->add_account($filename_db);
                    $this->session->set_flashdata('flashmsgs', "Admin Account Added Successfully");
                    redirect(base_url() . 'admin/customer');
                }
            }
        }
        
    	$this->data['main_content'] = 'customer/add';
		$this->load->view('admin/template_new', $this->data);
    }
}