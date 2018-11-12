<?php
if (!defined('BASEPATH'))
		exit ('No direct script access allowed');

class request extends MX_Controller {
		private $data = array();
		function __construct() {
				
		}
		public function index() {
			$this->load->view('admin/template', $this->data);
		}

		public function fastbook() {
                $this->data['main_content'] = 'request/fastbook';
				$this->load->view('admin/template_new', $this->data);
		}

		public function flightbook() {
                $this->data['main_content'] = 'request/flightbook';
				$this->load->view('admin/template_new', $this->data);
		}

		public function all() {
                $this->data['main_content'] = 'request/list';
				$this->load->view('admin/template_new', $this->data);
		}	
		public function room_info() {
                $this->data['main_content'] = 'request/room_info';
				$this->load->view('admin/template_new', $this->data);
		}
		public function flight_info() {
                $this->data['main_content'] = 'request/flight_info';
				$this->load->view('admin/template_new', $this->data);
		}	
}