<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');

class Voucher extends MX_Controller{
	private $data = array();
	public $role;
	public $editpermission = true;
	public $deletepermission = true;
	private $config;

	function __construct(){

		parent:: __construct();
		modules:: load('admin');
		$chkadmin = modules:: run('admin/validadmin');
		if (!$chkadmin) {
			$this->session->set_userdata('prevURL', current_url());
			redirect(base_url() . 'admin');
		}
		$chk = modules:: run('home/is_module_enabled', 'coupons');
		if (!$chk) {
			redirect(base_url() . 'admin');
		}
		$this->data['userloggedin'] = $this->session->userdata('pt_logged_admin');
		$this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
		$this->data['isSuperAdmin'] = $this->session->userdata('pt_logged_super_admin');
		$this->role = $this->session->userdata('pt_role');
		$this->data['role'] = $this->role;

		if (!pt_permissions('voucher', $this->data['userloggedin'])) {
			redirect(base_url() . 'admin');
		}
		$this->load->model('voucher_model');
		$this->load->model('hotels/hotels_model');
		$this->load->helper('voucher');
		$this->load->model('special_offers_model');
		$this->config =& get_instance()->config;
	}

	public function index(){
		if (!$this->data['addpermission'] && !$this->editpermission && !$this->deletepermission) {
			backError_404($this->data);
		} else {
			$params = [];
			$params['code'] = default_if_empty($this->input->get('code'), null);
			$params['v_phone'] = default_if_empty($this->input->get('v_phone'), null);
			$params['type'] = default_if_empty($this->input->get('type'), null);
			$params['v_email'] = default_if_empty($this->input->get('v_email'), null);
			$limit = default_if_empty($this->input->get('limit'), $this->config->item('page_size'));
			$page = default_if_empty($this->input->get('page'), $this->config->item('page_default'));
			$total_records = $this->voucher_model->search($params);
			$this->data['info'] = array('base' => base_url() . 'admin/voucher', 'totalrows' => $total_records, 'perpage' => $limit);
			$data = $this->voucher_model->search($params, $limit, $page);
			$this->data['content'] = $data;
			$this->data['page_title'] = 'Voucher Codes Management';
			$this->data['main_content'] = 'modules/voucher/index';
			$this->data['header_title'] = 'Voucher Codes Management';
			$this->data['list_type'] = get_list_voucher_type();
			$this->data['params'] = $params;
			$this->data['deletepermission'] = $this->deletepermission;
			$this->data['add_view_link'] = base_url() . $this->data['adminsegment'] . 'admin/voucher/add_view';
			$this->data['detail_link'] = base_url() . $this->data['adminsegment'] . 'voucher/detail';
			$this->data['edit_view_link'] = base_url() . $this->data['adminsegment'] . 'admin/voucher/edit_view';
			$this->data['del_view_link'] = base_url() . $this->data['adminsegment'] . 'admin/voucher/delete_view';
			$this->data['del_link'] = base_url() . $this->data['adminsegment'] . 'admin/voucher/delete';
			$this->load->view('template_new', $this->data);
		}
	}


	public function add_view(){
		$this->prepare_data_add();
		$this->load->view('template_new', $this->data);
	}

	public function add(){
		$error_code = SUCCESS;
		$this->data = $this->input->post();
		$this->prepare_data_add();
		$list_room = $this->prepare_rooms($this->input->post('room_id'), $this->input->post('quantity'));
		$this->data['list_room'] = $list_room;
		$this->valid_form_add();
		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionErrors());
		$response["index_link"] = base_url() . $this->data['adminsegment'] . 'admin/voucher';
		if ($this->hasFieldErrors()) {
			$error_code = FIELD_ERROR;
			$this->data[ERROR_MESSAGE] = $this->getFieldErrorData();
			$response[CONTENT] = $this->load->view('modules/voucher/add_data', $this->data, true);
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$error_code = ERROR;
			$this->data[ERROR_MESSAGE] = $this->getFieldErrorData();
			$response[CONTENT] = $this->load->view('modules/voucher/add_data', $this->data, true);
		} else {
			$voucher_id = $this->voucher_model->add_voucher($list_room);
		}
		$response[ERROR_CODE] = $error_code;
		return $this->output->out_json($response);
	}


	public function get_info(){
		$params = [];
		$params['v_name'] = default_if_empty($this->input->post('info_customer'), null);
		$data = $this->voucher_model->search($params,1,1);
		$error_code = SUCCESS;
		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionErrors());
		if ($this->hasFieldErrors()) {
			$error_code = FIELD_ERROR;
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$error_code = ERROR;
		} else {
			$response[CONTENT] = $data;
		}
		$response[ERROR_CODE] = $error_code;
		return $this->output->out_json($response);
	}


	public function edit_view(){
		$this->prepare_data_edit();
		$this->load->view('template_new', $this->data);
	}

	public function detail(){
		$this->prepare_data_detail();
		$this->load->view('template_pdf', $this->data);
	}

	public function edit(){
		$error_code = SUCCESS;
		$this->data = $this->input->post();
		$list_room = $this->prepare_rooms($this->input->post('room_id'), $this->input->post('quantity'));
		$this->data['list_room'] = $list_room;
		$this->valid_form_add();
		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionMessages());
		$response["index_link"] = base_url() . $this->data['adminsegment'] . 'admin/voucher';
		if ($this->hasFieldErrors()) {
			$error_code = FIELD_ERROR;
			$this->data[ERROR_MESSAGE] = $this->getFieldErrorData();
			$response[CONTENT] = $this->load->view('modules/voucher/edit_data', $this->data, true);
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$error_code = ERROR;
			$this->data[ERROR_MESSAGE] = $this->getFieldErrorData();
			$response[CONTENT] = $this->load->view('modules/voucher/edit_data', $this->data, true);
		} else {
			$voucher_id = $this->voucher_model->edit_voucher($list_room);
		}
		$response[ERROR_CODE] = $error_code;
		$this->prepare_data_edit();
		return $this->output->out_json($response);
	}


	private function prepare_data_add(){
		$this->data['page_title'] = 'Add Voucher ';
		$this->data['main_content'] = 'modules/voucher/add_view';
		$this->data['header_title'] = 'Add Voucher ';
		$this->data['list_type'] = get_list_voucher_type();
		$this->data['list_payment_status'] = get_list_voucher_payment();
		$this->data['hotels'] = $this->get_list_hotel();
		$hotel_default = default_if_empty($this->input->post('hotel_id'), array_keys($this->data['hotels'])[0]);
		$this->data['rooms'] = $this->get_room_by_id($hotel_default);
		$this->data['hotel_detail'] = $this->get_hotel_detail($hotel_default)[0];
		$this->data['admin_name'] = $this->session->userdata('fullName');
		$city_id = $this->data['hotel_detail']->hotel_city;
		$this->data['combos'] = $this->get_list_combo_by_city_id($city_id);
	}

	protected function get_list_combo_by_city_id($city_id){
		$this->load->model('admin/special_offers_model');
		return $this->special_offers_model->get_list_combo_by_city_id($city_id);
	}

	private function prepare_data_edit(){

		$this->data['page_title'] = 'Edit Voucher';
		$this->data['main_content'] = 'modules/voucher/edit_view';
		$this->data['header_title'] = 'Edit Voucher';
		$this->data['list_type'] = get_list_voucher_type();
		$this->data['list_payment_status'] = get_list_voucher_payment();
		$this->data['hotels'] = $this->get_list_hotel();
		$this->data['admin_name'] = $this->session->userdata('fullName');
		$params = [];
		$params['id'] = default_if_empty($this->input->get('hotel_status'), '');
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

	private function prepare_data_detail(){
		$this->data['page_title'] = 'Detail Voucher';
		$this->data['admin_name'] = $this->session->userdata('fullName');
		$this->data['main_content'] = 'modules/voucher/detail_pdf';
		$this->data['header_title'] = 'Detail Voucher';
		$this->data['list_type'] = get_list_voucher_type();
		$this->data['list_payment_status'] = get_list_voucher_payment();
		$this->data['hotels'] = $this->get_list_hotel();
		$this->data['theme_url'] = base_url() . "themes/".pt_defaultTheme() . "/";
		$params = [];
		$params['id'] = default_if_empty($this->input->get('id'), '');
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

	private function prepare_rooms($listId, $quantities){
		$arrayResult = array();
		foreach ($listId as $key => $id) {
			$arrayResult[$id] = $quantities[$key];
		}
		return $arrayResult;
	}

	private function valid_form_add(){
		if (is_empty_string($this->input->post('type'))) {
			$this->addFieldError("type", "Vui lòng chọn loại voucher để tạo mới!");
		}
		if (is_empty_string($this->input->post('code'))) {
			$this->addFieldError("code", "Vui lòng nhập mã voucher!");
		}
		if (is_empty_string($this->input->post('start_date'))) {
			$this->addFieldError("start_date", "Vui lòng chọn ngày nhận phòng!");
		}
		if (is_empty_string($this->input->post('end_date'))) {
			$this->addFieldError("end_date", "Vui lòng chọn ngày trả phòng!");
		}

		if (is_empty_string($this->input->post('v_name'))) {
			$this->addFieldError("v_name", "Vui lòng nhập họ tên");
		}

		if (is_empty_string($this->input->post('v_phone'))) {
			$this->addFieldError("v_phone", "Vui lòng nhập số điện thoại!");
		}
	}


	public function calculate_dem(){
		$start_date = date_create($this->input->post('start_date'));
		$end_date = date_create($this->input->post('end_date'));
		$diff = date_diff($start_date, $end_date);
		echo $diff;
	}

	public function get_room_by_hotel_id(){
		$room_array = array();
		$hotel_id = default_if_empty($this->input->post('hotel_id'));
		$list_room = $this->hotels_model->get_room_by_id($hotel_id);
		foreach ($list_room as $room) {
			$room_array[$room->room_id] = $room->room_title;
		}
		$this->data['rooms'] = $room_array;

		$hotel_detail = $this->get_hotel_detail($hotel_id)[0];
		$combos = $this->get_list_combo_by_city_id($hotel_detail->hotel_city);
		$error_code = SUCCESS;
		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionErrors());
		if ($this->hasFieldErrors()) {
			$error_code = FIELD_ERROR;
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$error_code = ERROR;
		} else {
			$response[CONTENT] = $this->load->view('modules/voucher/includes/room_data', $this->data, true);
			$response['hotel_detail'] = $hotel_detail;
			$data_combo['combos'] = $combos;
			$response['combos'] = $this->load->view('modules/voucher/includes/combo_data', $data_combo, true);
		}
		$response[ERROR_CODE] = $error_code;
		return $this->output->out_json($response);

	}

	public function delete_view(){
		$id = $this->input->get('id');
		if (count($id) == 0) {
			$this->hasActionMessages('Please select a voucher to delete');
		}

		$this->data['model_header'] = "Delete voucher";
		$this->data['id'] = $id;
		$error_code = SUCCESS;

		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionErrors());
		if ($this->hasFieldErrors()) {
			$error_code = FIELD_ERROR;
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$error_code = ERROR;
		} else {
			$response[CONTENT] = $this->load->view('modules/voucher/delete_dialog_modal_view', $this->data, true);
		}
		$response[ERROR_CODE] = $error_code;
		return $this->output->out_json($response);
	}


	public function delete(){
		$id = $this->input->post('id');
		if (count($id) == 0) {
			$this->hasActionMessages('Please select a voucher to delete');
		}

		$error_code = SUCCESS;

		try {
			$this->voucher_model->delete($id);
		} catch (Exception $exception) {
			$this->addActionError("Delete false, please contact administrator");
		}

		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionErrors());
		if ($this->hasFieldErrors()) {
			$error_code = FIELD_ERROR;
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$error_code = ERROR;
		} else {
			$response[CONTENT] = $this->load->view('modules/voucher/delete_dialog_modal_view', $this->data, true);
		}
		$response[ERROR_CODE] = $error_code;
		return $this->output->out_json($response);
	}

	public function generate_voucher_code(){
		$settings = $this->settings_model->get_settings_data();
		$len = $settings[0]->coupon_code_length;
		$type = $settings[0]->coupon_code_type;
		echo random_string('numeric', $len);

	}


	public function disable_multiple_codes(){
		$codelist = $this->input->post('codelist');
		foreach ($codelist as $id) {
			$this->coupons_model->disable_coupon($id);
		}
		$this->session->set_flashdata('flashmsgs', "Disabled Successfully");
	}

// Enable coupons

	public function enable_multiple_codes(){
		$codelist = $this->input->post('codelist');
		foreach ($codelist as $id) {
			$this->coupons_model->enable_coupon($id);
		}
		$this->session->set_flashdata('flashmsgs', "Enabled Successfully");
	}

// Delete Single Coupon

	public function delete_single_coupon(){
		$id = $this->input->post('codeid');
		$this->coupons_model->delete_coupon($id);
		$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
	}

// Delete Multiple coupons

	public function deleteMultipleCoupons(){
		$items = $this->input->post('items');
		foreach ($items as $item) {
			$this->coupons_model->delete_coupon($item);
		}

	}

// add coupon

	public function addcoupon(){
		$this->form_validation->set_message('is_unique', 'Code Already Exists.');
		$this->form_validation->set_rules('rate', 'Percentage', 'trim|required|is_numeric|greater_than[0]');
		$this->form_validation->set_rules('code', 'Coupon Code', 'trim|required|is_unique[pt_coupons.code]');
		if ($this->form_validation->run() == FALSE) {
			$response = array('status' => 'fail', 'msg' => '<div class="alert alert-danger">' . validation_errors() . '</div>');

		} else {
			$allmods = $this->input->post('allmodules');
			$items = $this->input->post('items');


			$couponid = $this->coupons_model->addCoupon();
			if (!empty($allmods)) {
				$this->coupons_model->assignCouponToAllModules($couponid, $allmods, $items);
			} else {
				$this->coupons_model->assignCoupon($couponid, $items);
			}


			$response = array('status' => 'success', 'msg' => 'Coupon Added Successfully');

		}

		echo json_encode($response);
	}


// update coupon

	public function updatecoupon(){
		$this->form_validation->set_rules('rate', 'Percentage', 'trim|required|is_numeric|greater_than[0]');
		if ($this->form_validation->run() == FALSE) {
			$response = array('status' => 'fail', 'msg' => '<div class="alert alert-danger">' . validation_errors() . '</div>');

		} else {

			$couponid = $this->input->post('couponid');

			$this->coupons_model->updateCoupon($couponid);
			$allmods = $this->input->post('allmodules');
			$items = $this->input->post('items');


			if (!empty($allmods)) {

				$this->coupons_model->assignCouponToAllModules($couponid, $allmods, $items);

			} else {


				$this->coupons_model->assignCoupon($couponid, $items);

			}


			$response = array('status' => 'success', 'msg' => 'Coupon Updated Successfully');

		}

		echo json_encode($response);
	}

// generate coupon

	public function generate_coupon(){
		$settings = $this->settings_model->get_settings_data();
		$len = $settings[0]->coupon_code_length;
		$type = $settings[0]->coupon_code_type;
		echo random_string($type, $len);
	}

	public function disableExpired(){
		$data = array(
			'status' => 'No'
		);
		$this->db->where('expirationdate <', time());
		$this->db->where('forever', 'No');
		$this->db->update('pt_coupons', $data);
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
}