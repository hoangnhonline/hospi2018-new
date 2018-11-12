<?php
header('Access-Control-Allow-Origin: *');
class voucher extends MX_Controller{
	private $data = array();
	private $config;
	function __construct(){
		parent:: __construct();
		modules:: load('home');
		$this->load->model('admin/voucher_model');
		$this->load->model('hotels/hotels_model');
		$this->load->helper('voucher');
		$this->load->helper('themes');
		$this->load->model('admin/special_offers_model');
		$this->config =& get_instance()->config;
	}

	public function detail(){
		$this->prepare_data_detail();
		$this->load->view('admin/modules/global/template_pdf', $this->data);
	}

	private function prepare_data_detail(){
		$this->data['page_title'] = 'Detail Voucher';
		$this->data['main_content'] = 'admin/modules/voucher/detail_pdf';
		$this->data['header_title'] = 'Detail Voucher';
		$this->data['list_type'] = get_list_voucher_type();
		$this->data['list_payment_status'] = get_list_voucher_payment();
		$this->data['theme_url'] = base_url() . "themes/" . pt_defaultTheme() . "/";
		$params = [];
		$params['code'] = default_if_empty($this->input->get('id'), '');
		$list_voucher = $this->voucher_model->search($params, 1, 1);
		if (!is_null($list_voucher) && count($list_voucher) === 1) {
			merge_object($this->data, $list_voucher[0]);
			$list_room = $this->voucher_model->get_room_by_voucher_id($list_voucher[0]->id);
			$this->data["list_room"] = $list_room;
			$hotel_default = default_if_empty($this->input->post('hotel_id'), $list_voucher[0]->hotel_id);
			$this->data['rooms'] = $this->get_room_by_id($hotel_default);
			$this->data['hotel_detail'] = $this->get_hotel_detail($hotel_default)[0];
		} else {
			$this->addActionError("Lỗi dữ liệu voucher");
			$this->data[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionMessages());
			$hotel_default = default_if_empty($this->input->post('hotel_id'), array_keys($this->data['hotels'])[0]);
			$this->data['rooms'] = $this->get_room_by_id($hotel_default);
			$this->data['hotel_detail'] = $this->get_hotel_detail($hotel_default)[0];
		}
		$city_id = $this->data['hotel_detail']->hotel_city;
		$this->data['combos'] = $this->get_list_combo_by_city_id($city_id);
	}

	private function get_list_hotel(){
		$hotel_array = array();
		$params = [];
		$params['hotel_status'] = default_if_empty($this->input->get('hotel_status'), 'Yes');
		$params['hotel_title'] = default_if_empty($this->input->get('hotel_title'), null);
		$limit = default_if_empty($this->input->get('limit'), 100);
		$page = default_if_empty($this->input->get('page'), 1);
		$list_hotel = $this->hotels_model->search($params, $limit, $page);

		foreach ($list_hotel as $hotel) {
			$hotel_array[$hotel->hotel_id] = $hotel->hotel_title;
		}
		return $hotel_array;
	}

	public function get_room_by_id($hotel_id){
		$room_array = array();
		$list_room = $this->hotels_model->get_room_by_id($hotel_id);
		foreach ($list_room as $room) {
			$room_array[$room->room_id] = $room->room_title;
		}
		return $room_array;
	}

	private function get_hotel_detail($hotel_id){
		$detail = $this->hotels_model->get_detail($hotel_id);
		return $detail;
	}

	protected function get_list_combo_by_city_id($city_id){
		$this->load->model('admin/special_offers_model');
		return $this->special_offers_model->get_list_combo_by_city_id($city_id);
	}
}