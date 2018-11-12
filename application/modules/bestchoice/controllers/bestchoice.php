<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class Bestchoice extends MX_Controller{
	private $data = array();
	private $validlang;

	function __construct(){
		parent:: __construct();

		$chk = modules:: run('home/is_module_enabled', 'offers');
		if (!$chk) {
			Module_404();
		}
		modules:: load('home');
		$this->load->library('offers_lib');
		$this->load->library('breadcrumbcomponent');
		$this->data['app_settings'] = $this->settings_model->get_settings_data();
		$this->data['lang_set'] = $this->session->userdata('set_lang');
		$this->data['usersession'] = $this->session->userdata('pt_logged_customer');
		$this->load->model('admin/special_offers_model');
		$this->data['phone'] = $this->load->get_var('phone');
		$this->data['contactemail'] = $this->load->get_var('contactemail');
		$this->data['appModule'] = "offers";

		$languageid = $this->uri->segment(2);
		$this->validlang = pt_isValid_language($languageid);

		if ($this->validlang) {
			$this->data['lang_set'] = $languageid;
		} else {
			$this->data['lang_set'] = $this->session->userdata('set_lang');
		}

		$defaultlang = pt_get_default_language();
		if (empty ($this->data['lang_set'])) {
			$this->data['lang_set'] = $defaultlang;
		}

		$this->lang->load("front", $this->data['lang_set']);
		$this->offers_lib->set_lang($this->data['lang_set']);
	}

	function index(){ //bestchoice
		$page = $this->input->get('page');
		if (!$page) {
			$page = null;
		}

		$this->data['sorturl'] = base_url() . 'bestchoice?';
		$settings = $this->settings_model->get_front_settings('offers');
		$loc = $this->input->get('location');

		$this->load->library('hotels/hotels_lib');
		$this->data['salesoffHotels'] = $this->hotels_lib->getSalesoffHotels($loc);
		$this->data['page_title'] = $settings[0]->header_title;
		$this->data['langurl'] = base_url() . "bestchoice/{langid}";
		$this->theme->view('sales', $this->data);
		//$this->output->cache(20) ;
	}

}
