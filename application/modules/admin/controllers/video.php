<?php
if (!defined('BASEPATH'))
		exit ('No direct script access allowed');

class video extends MX_Controller {
		private $data = array();
		function __construct() {
				
		}
		public function index() {
			$this->data['main_content'] = 'modules/video/index';
			$this->load->view('admin/template_new', $this->data);

		}

		public function add() {
    	$this->data['main_content'] = 'modules/video/add';
				$this->load->view('admin/template_new', $this->data);
		}

		
}