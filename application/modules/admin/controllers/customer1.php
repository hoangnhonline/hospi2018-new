<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer1 extends MX_Controller
{
    private $data = array();

    function __construct()
    {
    }

    function index()
    {
    	$this->data['main_content'] = 'customer1/index';
		$this->load->view('admin/template_new', $this->data);
    }
     function add()
    {
    	$this->data['main_content'] = 'customer1/add';
		$this->load->view('admin/template_new', $this->data);
    }
}