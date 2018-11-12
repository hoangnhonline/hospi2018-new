<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MX_Controller
{
    private $data = array();

    function __construct()
    {
    }

    function index()
    {
    	$this->data['main_content'] = 'role/index';
		$this->load->view('admin/template_new', $this->data);
    }
     function add()
    {
    	$this->data['main_content'] = 'role/add';
		$this->load->view('admin/template_new', $this->data);
    }
}