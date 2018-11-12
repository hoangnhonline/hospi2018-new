<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Bookings extends MX_Controller{
	private $data = array();
	public $role;
	public $editpermission = true;
	public $deletepermission = true;

	function __construct(){
		modules::load('admin');
		$chkadmin = modules::run('admin/validadmin');
		if (!$chkadmin) {
			$this->session->set_userdata('prevURL', current_url());
			redirect(base_url() . 'admin');
		}
		$seturl = $this->uri->segment(3);
		if ($seturl != "settings") {
		    $chk = modules::run('home/is_module_enabled', 'offers');
		    if (!$chk) {
		        redirect(base_url() . 'admin');
		    }
		}
		$this->data['app_settings'] = $this->settings_model->get_settings_data();
		$checkingadmin = $this->session->userdata('pt_logged_admin');
		if (!empty($checkingadmin)) {
			$this->data['userloggedin'] = $this->session->userdata('pt_logged_admin');
		} else {
			$this->data['userloggedin'] = $this->session->userdata('pt_logged_supplier');
		}
		$this->data['admin_name'] = $this->session->userdata('fullName'); 
		if (!empty($checkingadmin)) {
			$this->data['adminsegment'] = "admin";
		} else {
			$this->data['adminsegment'] = "supplier";
		}

		$this->load->model('admin/bookings_model');
		$this->load->model('admin/locations_model');
		$this->load->model('admin/special_offers_model');
		$this->load->model('admin/coupons_model');
		$this->load->model('admin/bookings/combo_booking_model');
		$this->load->library('hotels/hotels_lib');
		$this->data['userloggedin'] = $this->session->userdata('pt_logged_admin');
		$this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
		$this->data['isSuperAdmin'] = $this->session->userdata('pt_logged_super_admin');
		$this->role = $this->session->userdata('pt_role');
		$this->load->model('locations_model');
		$this->data['role'] = $this->role;
		$this->data['addpermission'] = true;
		if ($this->role == "admin") {
			$this->editpermission = pt_permissions("editbooking", $this->data['userloggedin']);
			$this->deletepermission = pt_permissions("deletebooking", $this->data['userloggedin']);
			$this->data['addpermission'] = pt_permissions("addbooking", $this->data['userloggedin']);
		}

		$this->lang->load("back", "vi");
		$this->load->helper('app');
	}

	function index(){
		if (!$this->data['addpermission'] && !$this->editpermission && !$this->deletepermission) {
			backError_404($this->data);
		} else {
			$params = [];
			$params['booking_type'] = $this->input->get('booking_type') ? $this->input->get('booking_type') : null;
			$params['booking_status'] = $this->input->get('booking_status') ? $this->input->get('booking_status') : null;
			$params['ai_last_name'] = $this->input->get('ai_last_name') ? $this->input->get('ai_last_name') : null;
			$params['booking_ref_no'] = $this->input->get('booking_ref_no') ? $this->input->get('booking_ref_no') : null;
			$limit = $this->input->get('limit') ? $this->input->get('limit') : 50;
			$page = $this->input->get('page') ? $this->input->get('page') : 1;
			$total_records = $this->bookings_model->search($params);
			$this->data['info'] = array('base' => base_url() . 'admin/bookings', 'totalrows' => $total_records, 'perpage' => $limit);
			$data = $this->bookings_model->search($params, $limit, $page);
			$isadmin = $this->session->userdata('pt_logged_admin');
			$userid = '';
			if (empty($isadmin)) {
				$userid = $this->session->userdata('pt_logged_supplier');
			}
			$this->data['hotels'] = $this->hotels_model->all_hotels_names($userid);
			$this->data['content'] = $data;
			$this->data['params'] = $params;
			$this->data['page_title'] = 'Quản lý booking';
			$this->data['main_content'] = 'modules/bookings/index_new';
			$this->data['header_title'] = 'Quản lý booking';
			$this->data['deletepermission'] = $this->deletepermission;
			$this->data['add_combo'] = base_url() . 'admin/bookings/addcombo';
			$this->data['add_hotel'] = base_url() . 'admin/bookings/addhotel';

			$this->load->view('admin/template_new', $this->data);
		}
	}

	function index2(){
		if (!$this->data['addpermission'] && !$this->editpermission && !$this->deletepermission) {
			backError_404($this->data);
		} else {
			$this->load->helper('xcrud');
			$xcrud = xcrud_get_instance();
			$xcrud->table('pt_bookings');
			$xcrud->join('booking_user', 'pt_accounts', 'accounts_id');
			$xcrud->order_by('booking_id', 'desc');
			$xcrud->columns('booking_id,booking_ref_no,pt_accounts.ai_first_name,booking_type,booking_date,booking_total,booking_amount_paid,booking_remaining,booking_status');
			$xcrud->label('booking_id', 'ID')->label('booking_ref_no', 'Ref No.')->label('pt_accounts.ai_first_name', 'Customer')->label('booking_type', 'Module')->label('booking_date', 'Date')->label('booking_total', 'Total')->label('booking_amount_paid', 'Paid')->label('booking_remaining', 'Remaining')->label('booking_status', 'Status');
			$xcrud->column_callback('booking_date', 'fmtDate');
			$xcrud->column_callback('booking_status', 'bookingStatusBtns');
			$xcrud->search_columns('booking_id,booking_ref_no,pt_accounts.ai_first_name,booking_type,booking_status');
			$xcrud->button(base_url() . 'invoice/?id={booking_id}&sessid={booking_ref_no}', 'View Invoice', 'fa fa-search-plus', 'btn btn-primary', array(
				'target' => '_blank'
			));
			if ($this->editpermission) {
				$xcrud->button(base_url() . $this->data['adminsegment'] . '/bookings/edit/{booking_type}/{booking_id}', 'Edit', 'fa fa-edit', 'btn btn-warning', array(
					'target' => '_self'
				));
			}

			if ($this->deletepermission) {
				$delurl = base_url() . 'admin/bookings/delBooking';
				$xcrud->multiDelUrl = base_url() . 'admin/bookings/delMultipleBookings';
				$xcrud->button("javascript: delfunc('{booking_id}','$delurl')", 'DELETE', 'fa fa-times', 'btn-danger', array(
					'target' => '_self',
					'id' => '{booking_id}'
				));
			}

			$this->data['add_link'] = '';
			$xcrud->limit(50);
			$xcrud->unset_add();
			$xcrud->unset_view();
			$xcrud->unset_remove();
			$xcrud->unset_edit();
			$this->data['content'] = $xcrud->render();
			$this->data['page_title'] = 'Booking Management';
			$this->data['main_content'] = 'temp_view';
			$this->data['header_title'] = 'Booking Management';
			$this->load->view('template', $this->data);
		}
	}

	// delete single booking

	function delBooking(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url() . 'admin');
		} else {
			$id = $this->input->post('id');
			$this->bookings_model->delete_booking($id);
			$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		}
	}

	// Delete Multiple Bookings

	function delMultipleBookings(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url() . 'admin');
		} else {
			$items = $this->input->post('items');
			foreach ($items as $item) {
				$this->bookings_model->delete_booking($item);
			}
		}
	}

	// change booking status to paid

	function booking_status_paid(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url() . 'admin');
		} else {
			$bookinglist = $this->input->post('booklist');
			foreach ($bookinglist as $id) {
				$this->bookings_model->booking_status_paid($id);
			}

			$this->session->set_flashdata('flashmsgs', "Status Changed to Paid Successfully");
		}
	}

	// change booking status to unpaid

	function booking_status_unpaid(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url() . 'admin');
		} else {
			$bookinglist = $this->input->post('booklist');
			foreach ($bookinglist as $id) {
				$this->bookings_model->booking_status_unpaid($id);
			}

			$this->session->set_flashdata('flashmsgs', "Status Changed to Unpaid Successfully");
		}
	}

	// change single bookin status to paid

	function single_booking_status_paid(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url() . 'admin');
		} else {
			$id = $this->input->post('id');
			$this->bookings_model->booking_status_paid($id);
		}
	}

	// change single bookin status to unpaid

	function single_booking_status_unpaid(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url() . 'admin');
		} else {
			$id = $this->input->post('id');
			$this->bookings_model->booking_status_unpaid($id);
		}
	}

	// cancellation request

	function cancelrequest($action){
		$id = $this->input->post('id');
		if ($action == 'approve') {
			$this->bookings_model->cancel_booking_approve($id);
		} else {
			$this->bookings_model->cancel_booking_reject($id);
		}
	}

	// resend invoice

	function resendinvoice(){
		$invoiceid = $this->input->post('id');
		$refno = $this->input->post('refno');
		$this->load->helper('invoice');
		$invoicedetails = invoiceDetails($invoiceid, $refno);
		$this->load->model('emails_model');
		$this->emails_model->resend_invoice($invoicedetails);
	}

	function edit($module, $id){
		if (!$this->editpermission) {
			echo "<center><h1>Access Denied</h1></center>";
			backError_404($this->data);
		} else {
			$this->load->helper('invoice');
			$this->load->model('payments_model');
			$this->data['paygateways'] = $this->payments_model->getAllPaymentsBack();
			$this->data['supptotal'] = 0;
			$updatebooking = $this->input->post('updatebooking');
			if (!empty($updatebooking)) {
				$this->bookings_model->update_booking($id);
				redirect(base_url() . "admin/bookings");
			}

			if (!empty($module) && !empty($id)) {
				$this->data['chklib'] = $this->ptmodules;
				$refNo = $this->bookings_model->getBookingRefNo($id);
				$this->data['bdetails'] = invoiceDetails($id, $refNo);
				$this->data['service'] = $this->data['bdetails']->module;
				$this->data['applytax'] = "yes";
				foreach ($this->data['bdetails']->bookingExtras as $extras) {
					$bookedextras[] = $extras->id;
					$extrasprices[] = $extras->price;
				}

				$this->data['bookedsups'] = $bookedextras;
				$this->data['supptotal'] = array_sum($extrasprices);

				// hotels module

				if ($module == "hotels") {
					$this->load->library('hotels/hotels_lib');
					$this->hotels_lib->set_id($this->data['bdetails']->itemid);
					$this->hotels_lib->hotel_short_details();
					$this->data['tax_type'] = $this->hotels_lib->tax_type;
					$this->data['tax_val'] = $this->hotels_lib->tax_value;
					$this->data['commtype'] = $this->hotels_lib->comm_type;
					$this->data['commvalue'] = $this->hotels_lib->comm_value;
					$this->data['selectedroom'] = $this->data['bdetails']->subItem->id;
					$this->data['subitemprice'] = $this->data['bdetails']->subItem->price;
					$this->data['rquantity'] = $this->data['bdetails']->subItem->quantity;
					$this->data['rtotal'] = $this->data['bdetails']->subItem->price * $this->data['bdetails']->subItem->quantity * $this->data['bdetails']->nights;
					$this->data['hrooms'] = $this->hotels_lib->rooms_id_title_only();
					$this->data['sups'] = $this->hotels_lib->hotelExtras();
					$this->data['totalrooms'] = $this->hotels_lib->room_total_quantity($this->data['bdetails']->subItem->id);
					$this->data['checkinlabel'] = "Check-In";
					$this->data['checkoutlabel'] = "Check-Out";
				}

				$this->data['main_content'] = 'modules/bookings/edit';
				$this->data['page_title'] = 'Edit Booking';
				$this->load->view('template', $this->data);
			} else {
				redirect(base_url() . 'admin/bookings');
			}
		}
	}

	function add(){
		$this->load->helper('invoice');
		$this->load->model('payments_model');
		$this->data['paygateways'] = $this->payments_model->getAllPaymentsBack();
		$this->data['chklib'] = $this->ptmodules;
		$this->load->library('hotels/hotels_lib');
		$this->data['checkinlabel'] = "Check-In";
		$this->data['checkoutlabel'] = "Check-Out";
		$this->data['main_content'] = 'modules/bookings/add';
		$this->data['page_title'] = 'Tạo Booking';
		$this->data['locations'] = $this->locations_model->getLocationsBackend();
		$this->load->view('template', $this->data);
	}

	private function prepareAddHotelInitData(){
		$this->load->model('admin/locations_model');
		$this->data['hotels'] = $this->locations_model->getRelatedhotels();
		$this->data['room_list'] =array();
		$model = $this->session->userdata('addhotel');
		if (isset($model['hotel_id']) && $model['checkin'] && $model['checkout']) {
			$this->data['room_list'] = $this->getListRoomByHotelId($model['hotel_id'], $model['checkin'], $model['checkout']);
		}//echo $model['hotel_id']. $model['checkin'].$model['checkout']; 
		//var_dump($this->data['room_list']);;die;
		if (isset($model['hotel_id'])) {
			$model['hotel_detail'] = $this->getHotelById($model['hotel_id']);
			$this->data['model'] = $model;
			$this->session->set_userdata('addhotel', $model);
		}
		//var_dump($model['hotel_detail']);die;
	}

	private function getHotelById($hotelID){
		$this->load->model('hotels/hotels_model');
		return $this->hotels_model->getDetail($hotelID);
	}

	function listRoom(){
		$this->loadListRoom('list');

		$this->data['main_content'] = 'modules/bookings/includes/addhotel/room_list';
		$this->load->view('template_ajax', $this->data);
	}

	private function recalculateAddHotel(){
		$this->load->library('hotels/hotels_lib');
		$model = $this->session->userdata('addhotel');	//	echo "<pre>";print_r($model);echo "</pre>";
		$model['cancel_condition']="";
		$model['booking_amount_paid'] = str_replace(",", "", $model['booking_amount_paid']);

		if(isset($model['hotel_id'])&& $model['hotel_id']!=0){
			$hotelDetail = $this->getHotelById($model['hotel_id']);
			$model['cancel_condition']=$hotelDetail->hotel_policy;
		}else{
			return $model;
		}
		if( ($model['is_send'] === "on") || ($model['is_send'] == 1) ){
			$model['is_send'] = 1;
		}else{
			$model['is_send'] = 0;
		}
//echo $model['checkin'] .'----'.$model['checkout'];die;

		$room_list = $model['room_list'];
		$total_room = 0;
		$hotel_id = $model['hotel_id'];
		$checkin = $model['checkin'];
		//$checkin =  date("d/m/Y",  strtotime( $checkin) );  
		$checkout = $model['checkout'];
		//$checkout =  date("d/m/Y",  strtotime( $checkout) );  
//echo $checkin .'----'.$checkout;die;
		$date1 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $checkin))));
		$date2 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $checkout))));
		// this calculates the diff between two dates, which is the number of nights
		$model['stay'] = $date2->diff($date1)->format("%a");
		$bookInfo = array();
		$subTotal = 0;//var_dump($room_list);die;
		$total_number_extra_bed = 0;
		foreach ($room_list as $key => $room) {//var_dump($room);
			$total_room += $room['room_total'];
			$roomID = $room['room_id'];
			$extrabeds = $room['extra_bed'];
			if (!empty($roomID)) {
				//echo $hotel_id .','. $roomID.','.  $room['room_total'].','.  $extrabeds.','. $checkin.','.  $checkout;
				$rDetail = $this->hotels_lib->getBookResultObject($hotel_id, $roomID, $room['room_total'], $extrabeds, $checkin, $checkout);
				$tmpPriceRoomTotal = 0;
				$tmpPriceBedTotal = 0;
				foreach ($rDetail->Info['detail'] as $tmp) {
					$tmpPriceRoomTotal += $tmp->total;
					$tmpPriceBedTotal += $tmp->bed_total;
				}
				// chia trung binh
				$nights = count($rDetail->Info['detail']);
				$priceRoomAvr = $tmpPriceRoomTotal / $nights;
				$priceBedAvr = $tmpPriceBedTotal / $nights;
				$totalRoomPrice = $tmpPriceRoomTotal * $room['room_total'];
				$totalBedPrice = $tmpPriceBedTotal * $room['extra_bed'];
				$subTotal += $totalRoomPrice;
				$subTotal += $totalBedPrice;
				$total_number_extra_bed += $room['extra_bed'] ;
				$bookInfo[$roomID] = array('priceRoomAvr' => number_format($priceRoomAvr),
					'priceBedAvr' => number_format($priceBedAvr),
					'totalRoomPrice' => number_format($totalRoomPrice),
					'totalBedPrice' => number_format($totalBedPrice),
					'nights' => $nights,
					'room_total' => $room['room_total'],
					'bed_total' => $room['extra_bed'],
					'room_title'=> $this->hotels_lib->getRoomTitle($roomID),
				);

			}
		}
/*echo "<pre>";print_r(	$bookInfo);echo "</pre>" ; 
die;*/
		$model['booking_extra_beds'] = $total_number_extra_bed;
		$model['sub_total'] = number_format($subTotal);
		$preDiscountTotal = $subTotal;
		$phi_vat = $phi_dich_vu = 0;
		if(isset($model['hotel_id'])&& $model['hotel_id']!=0){
			if ($hotelDetail->hotel_tax_fixed > 0) {
				$phi_vat = $hotelDetail->hotel_tax_fixed;
			} elseif ($hotelDetail->hotel_tax_percentage > 0) {
				$phi_vat = $preDiscountTotal * ($hotelDetail->hotel_tax_percentage / 100);
			}
			if ($hotelDetail->hotel_service_fixed > 0) {
			$phi_dich_vu = $hotelDetail->hotel_service_fixed;
			} elseif ($hotelDetail->hotel_service_percentage > 0) {
				$phi_dich_vu = $preDiscountTotal * ($hotelDetail->hotel_service_percentage / 100);
			}
		}
		if(isset( $model['booking_extras_fee']) && (isset( $model['booking_extras_quantity'])) ) {
			$other_fee = $model['booking_extras_fee'] * $model['booking_extras_quantity'] ;
			$preDiscountTotal += $other_fee;
		}

		
		$model['book_info'] = $bookInfo;
		$model['preDiscountTotal'] = number_format($preDiscountTotal);
		$model['vat_cost'] = number_format($phi_vat);
		$model['service_cost'] = number_format($phi_dich_vu);

		$discountValue = 0;
		$booking_total = $preDiscountTotal;//echo 1111.$model['coupon_code'];
		if (isset($model['coupon_code']) && !empty($model['coupon_code'])) {
			$this->load->model('admin/coupons_model');
			$couponVo = $this->coupons_model->get_coupon_by_code($model['coupon_code']);//var_dump($couponVo);die;
			if(isset($couponVo)){
				if($this->checkCouponCondition($couponVo , $preDiscountTotal) == 1 ){
					$model['has_coupon'] = true;
					$model['coupon'] = array('code' => $couponVo->code,
						'value' => $couponVo->value,
						'type' => $couponVo->type,
						'couponId' => $couponVo->id,
						'isVaild' => true,
					);

					if ($couponVo->type == '%') {
						$discountValue = $couponVo->value * $preDiscountTotal / 100;
					} else {
						$discountValue = $couponVo->value;
					}
				}else{
					$model['has_coupon'] = false;
				}
			}else{
				$model['has_coupon'] = false;
			}		
			$booking_total = $preDiscountTotal - $discountValue;
		}
		$model['discountValue'] = $discountValue;
		$model['booking_total'] = $booking_total;

		$booking_remaining = $booking_total;
		$booking_amount_paid = 0;
		if (isset($model['booking_amount_paid'])) {
			$booking_amount_paid = $model['booking_amount_paid'];
		}
		$booking_remaining = $booking_total - $booking_amount_paid;
		$model['booking_remaining'] = $booking_remaining;
		$model['booking_amount_paid'] = $booking_amount_paid;

		/*foreach ( $bookInfo  as $rDetail) {
		   $priceOne = 0;
		   $priceExtraBed = 0;
		   foreach ($rDetail->Info['detail'] as $tmp) {
			   $priceOne += $tmp->total;
			   $priceExtraBed += $tmp->bed_total;
		   }
		   $priceOne = $priceOne / count($rDetail->Info['detail']);
		   $priceExtraBedTotal += $priceExtraBed * $rDetail['extraBedsCount'];
		   $so_giuong_phu += $extra_beds[$roomId];


						 $quantity = $room_quantity[$roomId];

						 $priceTotal += $rDetail->Info['total'] * $quantity;

	   }*/
		//echo "<pre>";print_r(	 $hotelDetail);echo "</pre>" ;die;
		$model['room_total'] = $total_room;
		//var_dump($model['hotel_detail'] );die;
		$date1 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $model['checkin']))));
        $date2 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $model['checkout']))));

        // this calculates the diff between two dates, which is the number of nights
        $model['nights'] = $date2->diff($date1)->format("%a");
		$this->session->set_userdata('addhotel', $model);
		$this->data['model'] = $model;
		return $model;
	}
	private function checkCouponCondition($couponVo , $preDiscountTotal ){
		if( $couponVo->condtion == 1){
			if(  $preDiscountTotal < $couponVo->condition_value ){
				$apply = 0 ; 
			}else{
				$apply = 1 ; 
			}
		}else{
			$apply = 1 ; 
		}
		return $apply ;
	}
	private function loadListRoom($action){
		$this->load->model('hotels/rooms_model');

		$checkout = $_GET['checkout'];
		$checkin = $_GET['checkin'];
		$hotel_id = (int)$_GET['hotel_id'];
		$model = $this->session->userdata('addhotel');
		$model['checkin'] = $checkin;
		$model['checkout'] = $checkout;
		$model['hotel_id'] = $hotel_id;
		// echo $_GET['city_id'];die;
		$this->data['room_list'] = $this->getListRoomByHotelId($hotel_id, $checkin, $checkout);
//var_dump($this->data['room_list']);
		$room_list = array();
		if (isset($_GET['room_list'])) {
			$room_list = $_GET['room_list'];
		}
		if ($action == 'list') {
			$room_list = array();
		}
		if ($action == 'del') {
			foreach ($room_list as $key => $room) {
				if ($room['room_id'] == $_GET['room_id']) {
					unset($room_list[$key]);
				}
			}
		}
		/*echo "<pre>";
		print_r($room_list);
				echo "</pre>";*/

		//$model['room_list'] =array();
		//load old rooms

		//add  new room 
		/*foreach ($this->data['room_list'] as $key => $room) {
			
		}*/
		if ($action != 'del') {
			$new_room_id = $this->data['room_list'][0]->id;
			$room_info = $this->rooms_model->getRoomBasicInfo($new_room_id);
			$room_list[] = array('room_id' => $new_room_id, 'room_total' => 0, 'extra_bed' => 0 ,'extra_bed_price'=>$room_info['extrabed']);
		}

		$model['room_list'] = $room_list;

		/*echo "<pre>";
		print_r($model['room_list']);
				echo "</pre>";

		echo "<pre>";
		print_r($room_list);
				echo "</pre>";die;*/

		$this->session->set_userdata('addhotel', $model);
		/*
				echo "<pre>";
				print_r($model['room_list']);
						echo "</pre>";*/
		$this->recalculateAddHotel();
	}

	function addRoom(){
		$this->loadListRoom('add');
		$this->data['main_content'] = 'modules/bookings/includes/addhotel/room_list';
		$this->load->view('template_ajax', $this->data);
	}

	function delRoom(){
		//$hotel_id =  (int)$_GET['hotel_id'];

		$this->loadListRoom('del');
		$this->data['main_content'] = 'modules/bookings/includes/addhotel/room_list';
		$this->load->view('template_ajax', $this->data);
	}

	private function getListRoomByHotelId($hotel_id, $checkin, $checkout){
		$this->load->library('hotels/hotels_lib');
		$rs = $this->hotels_lib->hotel_rooms($hotel_id, $checkin, $checkout);
		return $rs;
	}

	function addhotel(){
		
		$this->load->model('admin/locations_model');
		$this->load->model('admin/special_offers_model');
		$this->load->model('admin/coupons_model');
		$this->load->model('admin/bookings/hotel_booking_model');
		$this->prepareAddHotelInitData();
		$model = $this->session->userdata('addhotel');
		
		if ($_POST) {
			$data_post = $this->input->post();
			if($data_post['is_send'] != 'on' && $data_post['is_send'] != 1 ){
				$data_post['is_send'] = 0;
			}else{
				$data_post['is_send'] = 1;
			}
			$model = array_merge($model, $data_post);
			$this->session->set_userdata('addhotel', $model);
			$model = $this->recalculateAddHotel();
			if ($this->hotel_booking_model->add_hotel_booking($model)) {
				$this->session->set_userdata('addhotel' , null);
				redirect(base_url() . "admin/bookings?booking_type=hotels");
			} else {

			}
		} else {$this->session->set_userdata('addhotel' , null);
			if ($model == null) {$this->session->set_userdata('addhotel' , null);
				$model = array();
				$model['booking_extra_beds'] = 0;
				$model['cancel_condition'] = "";
				$model['has_coupon'] = false;
				$model['booking_child'] = 0;
				$model['booking_extras_quantity'] = 0;
				$model['booking_adults'] = 0;
				$model['booking_extras_fee'] = 0;
				$model['booking_extra_beds'] = 0;
				$model['booking_extra_beds_request'] = "";
				$model['room_total'] = 0;
				$model['room_total'] = 0;
				$model['booking_additional_notes'] = '';
				$model['subTotal'] = 0;
				$model['vat'] = 0;
				$model['extraTotal'] = 0;
				$model['preDiscountTotal'] = 0;
				$model['booking_total'] = 0;
				$model['discountValue'] = 0;
				$model['booking_amount_paid'] = 0;
				$model['booking_remaining'] = 0;
				$model['note'] = '';
				$model['coupon_code'] = '';
				$model['checkin'] = date("d/m/Y", strtotime('+' . CHECKIN_SPAN . ' day', time()));
				$model['checkout'] = date("d/m/Y", strtotime('+' . CHECKOUT_SPAN . ' day', time()));
				$model['stay']=1;
				$model['customer_name'] = '';$model['customer_email'] = '';$model['customer_address'] = '';$model['customer_phone'] = '';$model['customer_request'] = '';
				$model['room_list'] =array();
				$model['sub_total'] = 0;
				$model['service_cost'] = 0;
				$model['vat_cost'] = 0;
				$model['hotel_id'] = 0;
				$model['booking_payment_date'] = "";
				$model['booking_status'] = "";
       			$model['is_send'] = 0;
       			$model['is_other_company'] = 0;

				$this->session->set_userdata('addhotel', $model);
				$this->data['model'] = $model;

			} else {
				if (!isset($model['booking_child'])) {
					$model['booking_child'] = 0;
				}
				if (!isset($model['booking_extras_quantity'])) {
					$model['booking_extras_quantity'] = 0;
				}
				if (!isset($model['booking_adults'])) {
					$model['booking_adults'] = 0;
				}
				if (!isset($model['booking_extras_fee'])) {
					$model['booking_extras_fee'] = 0;
				}
				if (!isset($model['booking_extra_beds_request'])) {
					$model['booking_extra_beds_request'] = "";
				}
				if (!isset($model['booking_additional_notes'])) {
					$model['booking_additional_notes'] = '';
				}
			}
			$this->data['model'] = $model;
		}//echo "<pre>";print_r($this->data['model']['hotel_detail']);echo "</pre>";die;
		$this->recalculateAddHotel();//die;
		$this->data['main_content'] = 'modules/bookings/addhotel';
		$this->data['page_title'] = 'Tạo Booking';
		$this->load->view('template_new', $this->data);
	}


	function addcombo(){
		//$this->session->set_userdata('addCombo' , null);
		
		$model = $this->session->userdata('addCombo');
		if ($_POST) {
			$data_post = $this->input->post();
			$model = array_merge($model, $data_post);
			if(!isset($_POST['is_unknown_date'])){ 
				$model['is_unknown_date'] =0;
			}else{ 
				$model['is_unknown_date'] =1;
			}
			$this->session->set_userdata('addCombo', $model);
			$model = $this->recalculate($model);
			 if($this->combo_booking_model->add_combo_booking($model)){
				$this->session->set_userdata('addCombo' , null);
				redirect(base_url() . "admin/bookings?booking_type=combo");
			}else{//validate false

			}  
		} else {
			$this->session->set_userdata('addCombo' , null);
			$model = $this->session->userdata('addCombo');
			if ($model == null) {
				$model = array();
				$model['has_coupon'] = false;
				$model['booking_child'] = 0;
				$model['booking_extras_quantity'] = 0;
				$model['booking_adults'] = 0;
				$model['booking_extras_fee'] = 0;
				$model['booking_extra_beds'] = 0;
				$model['booking_extra_beds_request'] = "";
				$model['booking_additional_notes'] = '';
				$model['subTotal'] = 0;
				$model['vat'] = 0;
				$model['extraTotal'] = 0;
				$model['preDiscountTotal'] = 0;
				$model['booking_total'] = 0;
				$model['discountValue'] = 0;
				$model['booking_amount_paid'] = 0;
				$model['booking_remaining'] = 0;
				$model['note'] = '';
				$model['coupon_code'] = '';
				$model['customer_name'] = '';$model['customer_email'] = '';$model['customer_address'] = '';$model['customer_phone'] = '';$model['customer_request'] = '';
				$model['combo_code'] = '';
				$model['checkin'] = date('d/m/Y', strtotime('+' . CHECKIN_SPAN . ' day', time()));
				$model['days'] = 0;
				$checkout = date('d/m/Y', strtotime('+ '.$model['days'].' days', time() ));
				$model['checkout'] = $checkout ;
				$model['sent_invoice'] = 0;
				$model['booking_payment_date'] = date("m/d/Y",  time());
				$model['booking_status'] = "";
				$model['is_unknown_date'] = 0;

				$this->session->set_userdata('addCombo', $model);
			} else {
				if (!isset($model['booking_child'])) {
					$model['booking_child'] = 0;
				}
				if (!isset($model['booking_extras_quantity'])) {
					$model['booking_extras_quantity'] = 0;
				}
				if (!isset($model['booking_adults'])) {
					$model['booking_adults'] = 0;
				}
				if (!isset($model['booking_extras_fee'])) {
					$model['booking_extras_fee'] = 0;
				}
				if (!isset($model['booking_extra_beds_request'])) {
					$model['booking_extra_beds_request'] = "";
				}
				if (!isset($model['booking_additional_notes'])) {
					$model['booking_additional_notes'] = '';
				}
			}
		}
		//neu co combo roi thi lay ten de hien thi ,lay lai cho chac, da set trong session roi
		$this->data['model'] = $this->recalculate($model);//var_dump($model);//die;
		$this->prepareInitData();
		$this->data['main_content'] = 'modules/bookings/addcombo';
		$this->data['total_price_content'] = 'modules/bookings/includes/addcombo/total_price';
		$this->data['page_title'] = 'Tạo Booking';
		$this->load->view('template_new', $this->data);
	}

	protected function prepareInitData(){
		$this->load->helper('invoice');
		$this->load->model('payments_model');
		$this->data['paygateways'] = $this->payments_model->getAllPaymentsBack();
		$this->data['chklib'] = $this->ptmodules;
		$this->load->library('hotels/hotels_lib');
		$this->data['checkinlabel'] = "Check-In";
		$this->data['checkoutlabel'] = "Check-Out";
		$this->data['locations'] = $this->locations_model->getLocationsBackend();

		$model = $this->data['model'];

		if (isset($model['city_id']) && !empty($model['city_id'])) {
			$this->data['combos'] = $this->getListComboByCityId($model['city_id']);
		}
		if (isset($model['combo_id']) && !empty($model['combo_id'])) {
			$comboVo = $this->get_combo_by_id($model['combo_id']);//var_dump($comboVo);die;
			$model['use_condition'] = $comboVo->use_condition;
			$model['cancel_condition'] = $comboVo->cancel_condition;
		}

		$this->data['model'] = $model;
		return $this->data;
	}

	protected function recalculate(array $model){
		$this->load->model('admin/coupons_model');
		$model['booking_amount_paid'] = str_replace(",", "", $model['booking_amount_paid']);
		if (isset($model['combo_id'])) {
			$combo = $this->get_combo_by_id($model['combo_id']);
			$model['baseCharge']['name'] = $combo->offer_title;
			//$model['use_condition'] = $combo->use_condition;
			//$model['cancel_condition'] = $combo->cancel_condition;
			$model['combo_img'] = PT_OFFERS_IMAGES.$combo->offer_thumb;
			$model['baseCharge']['price'] = $combo->offer_price;
			$model['city_id'] = $combo->offer_city;
			$model['days'] = $combo->min_nights;
			//$checkin_timestamp = strtotime($model['checkin']);
			//$checkin_timestamp = strptime($model['checkin'], '%d/%m/%Y');
			$dt = DateTime::createFromFormat('d/m/Y', $model['checkin']);
			$checkin_timestamp =  $dt->getTimestamp(); # or $dt->format('U');
			$checkout = date('d/m/Y', strtotime('+ '.$model['days'].' days',$checkin_timestamp));
			$model['checkout'] = $checkout ;
		}
		if (isset($model['city_id'])) {
			$city = $this->locations_model->get_city_by_id($model['city_id']);
			$model['city_name'] = $city->location;
		}

		if($model['is_send'] != 1 && $model['is_send'] != 'on'){
			$model['is_send'] = 0;
		}else{
			$model['is_send'] = 1;
		}//echo $model['is_unknown_date'];die;
	/*	if($model['is_unknown_date'] != 1 && $model['is_unknown_date'] != 'on' ){
			$model['is_unknown_date'] = 0;
		}else{
			$model['is_unknown_date'] = 1;
		}*/

		$model['baseChargeTotal'] = 0;
		if (isset($model['baseCharge'])) {
			$model['baseChargeTotal'] = $model['baseCharge']['price'] * $model['basecharge_quantity'];
		}

		$subTotal = $model['baseChargeTotal'];
		if (isset($model['surcharge_list'])) {
			foreach ($model['surcharge_list'] as $key => $surcharge) {
				$subTotal += $surcharge['price'] * $surcharge['quantity'];
			}
		}

		$model['subTotal'] = $subTotal;

		$model['vat'] = 0;
		$model['extraTotal'] = $model['booking_extras_fee'] * $model['booking_extras_quantity'];
		$model['preDiscountTotal'] = $model['subTotal'] + $model['vat'] + $model['extraTotal'];
		$model['booking_total'] = $model['preDiscountTotal'];
		$model['discountValue'] = 0;
		if (isset($model['coupon_code']) && !empty($model['coupon_code'])) {
			$couponVo = $this->coupons_model->get_coupon_by_code($model['coupon_code']);
			if(isset($couponVo)){
				if($this->checkCouponCondition($couponVo , $model['preDiscountTotal'] ) == 1 ){
					$model['has_coupon'] = true;
					$model['coupon'] = array('code' => $couponVo->code,
											'value' => $couponVo->value,
											'type' => $couponVo->type,
											'couponId' => $couponVo->id,
										);
					if ($couponVo->type == '%') {
						$model['discountValue'] = $couponVo->value * $model['preDiscountTotal'] / 100;
					} else {
						$model['discountValue'] = $couponVo->value;
					}
				}else{
					$model['has_coupon'] = false;
				}
			}else{
				$model['has_coupon'] = false;
			}
			$model['booking_total'] = $model['preDiscountTotal'] - $model['discountValue'];
		}

		if (isset($model['booking_amount_paid'])) {
			$model['booking_remaining'] = $model['booking_total'] - $model['booking_amount_paid'];
		}
		$this->session->set_userdata('addCombo', $model);//var_dump($model['use_condition']);die;
		return $model;
	}

	public function generate_booking__code(){
		$settings = $this->settings_model->get_settings_data();
		$len = $settings[0]->coupon_code_length;
		$type = $settings[0]->coupon_code_type;
		$combo_code = random_string('numeric', 7); // random_string($type, $len);
		echo $combo_code;

		/*$this->data['main_content'] = 'modules/bookings/generate_coupon_result';
		$this->data['combo_code'] = $combo_code;
		$this->load->view('template_ajax', $this->data);*/
	}

	protected function getListComboByCityId($city_id){
		$this->load->model('admin/special_offers_model');
		return $this->special_offers_model->get_list_combo_by_city_id($city_id);
	}

	protected function get_surcharge_by_combo_id($combo_id){
		$this->load->model('admin/phuthucombo_model');
		return $this->phuthucombo_model->get_surcharge_by_combo_id($combo_id);
	}

	protected function get_combo_by_id($combo_id){
		$this->load->model('admin/special_offers_model');
		return $this->special_offers_model->get_combo_by_id($combo_id);
	}

	public function checkCoupon(){
		$model = $this->session->userdata('addCombo');
		$couponCode = $this->input->post('coupon_code');
		if($couponCode !=""){
		$rs = $this->getCoupon($couponCode);
			if ($rs['status'] == true) {
				$couponVo = $rs['data'];
				$model['coupon_code'] = $couponCode;

				$model['coupon'] = array('code' => $couponVo->code,
					'value' => $couponVo->value,
					'type' => $couponVo->type,
					'couponId' => $couponVo->id,
				);
				
				//$model['coupon'] = $couponVo;
				$this->session->set_userdata('addCombo', $model);
				$this->hasActionMessages('Coupon code hợp lệ');
			} else {
				$this->addFieldError("coupon_code", 'Coupon code không hợp lệ');
			}
		}
		$data_post = $this->input->post();
		$model = array_merge($model, $data_post);
		//var_dump($model);
		$error_code = SUCCESS;

		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionErrors());

		if ($this->hasFieldErrors()) {
			$response['validate_coupon'] = false;
			$error_code = FIELD_ERROR;
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$error_code = ERROR;
			$response['validate_coupon'] = false;
		}else{
			$response['validate_coupon'] = true;
		}
		if(empty($couponCode )){$response['validate_coupon'] = true;}
		$this->data["model"] = $this->recalculate($model);
		$this->prepareInitData();
		$response['content'] = $this->load->view('modules/bookings/includes/addcombo/quote', $this->data, true);
		//$model = $this->session->userdata('addCombo');

		$response[ERROR_CODE] = $error_code;

		return $this->output->out_json($response);
	}



	public function checkHotelCoupon(){
		$model = $this->session->userdata('addhotel');
		$couponCode = $this->input->post('coupon_code');
		$rs = $this->getCoupon($couponCode);
		if($couponCode !=""){
			if ($rs['status'] == true) {
				$couponVo = $rs['data'];
				$model['coupon_code'] = $couponCode;
				//$model['coupon'] = $couponVo;

				$model['coupon'] = array('code' => $couponVo->code,
					'value' => $couponVo->value,
					'type' => $couponVo->type,
					'couponId' => $couponVo->id,
				);
				
				$this->hasActionMessages('Coupon code hợp lệ');
			} else {
				$this->addActionError('Coupon code không hợp lệ');
			}
		}
		$data_post = $this->input->post();
			$model = array_merge($model, $data_post);
			$this->session->set_userdata('addhotel', $model);

		$error_code = "success";
		if ($this->hasFieldErrors()) {
			$response['validate_coupon'] = false;
			$error_code = FIELD_ERROR;
			$response[ERROR_MESSAGE] = $this->getFieldErrorData();
		} elseif ($this->hasErrors()) {
			$response['validate_coupon'] = false;
			$error_code = ERROR;
		}else{
			$response['validate_coupon'] = true;
		}
		if(empty($couponCode )){$response['validate_coupon'] = true;}
		$this->data["model"] = $this->recalculateAddHotel($model);
		$this->prepareAddHotelInitData();
		$response['content'] = $this->load->view('modules/bookings/includes/addhotel/quote', $this->data, true);
		$model = $this->session->userdata('addhotel');
		$response[ERROR_CODE] = $error_code;
		$response[ERROR_MESSAGE] = default_if_empty($this->getActionErrors(), $this->getActionErrors());

		//$this->prepareInitData();
		return $this->output->out_json($response);
	}


	protected function getCoupon($code){
		$current_time_stamp = time();
		$sql = "select * from pt_coupons where status = 'Yes' and uses < maxuses and code ='" . $code . "' and  startdate <= " . $current_time_stamp . " and  expirationdate >=" . $current_time_stamp;// echo  $sql;
		$query = $this->db->query($sql);
		$rs = $query->result();
		if (count($rs) > 0) {
			return array('status' => true, 'data' => $rs[0]);
		} else {
			return array('status' => false);
		}
	}

	function listCombo(){
		$model = $this->session->userdata('addCombo');//var_dump(  $addCombo);die;
		$city_id = (int)$_GET['city_id'];
		$model['city_id'] = $city_id;
		//var_dump($model);
		$this->session->set_userdata('addCombo', $model);
		$model = $this->session->userdata('addCombo');//var_dump(  $addCombo);die;
		//var_dump($model);


		// echo $_GET['city_id'];die;
		$this->data['combos'] = $this->getListComboByCityId($city_id);
		$this->data['main_content'] = 'modules/bookings/combo_list';

		$this->load->view('template_ajax', $this->data);
	}

	function listCharge(){
		$this->load->model('admin/special_offers_model');
		$model = $this->session->userdata('addCombo');
		$combo_id = (int)$_GET['combo_id'];
		$model['combo_id'] = $combo_id;
		$comboVo = $this->get_combo_by_id($combo_id);
		$model['baseCharge'] = array('price' => $comboVo->offer_price, 'quantity' => 0, 'name' => $comboVo->offer_title);
		$this->data['surcharge_list'] = $this->get_surcharge_by_combo_id($_GET['combo_id']);
		//var_dump($this->data['surcharge_list']);die;
		$surcharge_list = array();
		foreach ($this->data['surcharge_list'] as $key => $surCharge) {
			$surcharge_list[] = array('name' => $surCharge->name,
				'price' => $surCharge->price,
				'id' => $surCharge->id,   //id cua table phuthu
				'quantity' => 0,
			);
		}
		$model['surcharge_list'] = $surcharge_list;
		$this->session->set_userdata('addCombo', $model);
		$this->data['model'] = $model;
		$this->data['main_content'] = 'modules/bookings/charge_list';

		$this->load->view('template_ajax', $this->data);
	}


	function dashboardBookings(){
		if (!$this->data['addpermission'] && !$this->editpermission && !$this->deletepermission) {
			backError_404($this->data);
		} else {
			$this->load->helper('xcrud');
			$xcrud = xcrud_get_instance();
			$xcrud->table('pt_bookings');
			$xcrud->join('booking_user', 'pt_accounts', 'accounts_id');
			$xcrud->order_by('booking_id', 'desc');
			$xcrud->columns('booking_id,booking_ref_no,pt_accounts.ai_first_name,booking_type,booking_date,booking_total,booking_amount_paid,booking_remaining,booking_status');
			$xcrud->label('booking_id', 'ID')->label('booking_ref_no', 'Mã booking')->label('pt_accounts.ai_first_name', 'Họ tên')->label('booking_type', 'E-booking')->label('booking_date', 'Ngày đặt')->label('booking_total', 'Tổng')->label('booking_amount_paid', 'Đã thanh toán')->label('booking_remaining', 'Còn lại')->label('booking_status', 'Tình trạng');
			$xcrud->column_callback('booking_date', 'fmtDate');
			$xcrud->column_callback('booking_status', 'bookingStatusBtns');
			$xcrud->search_columns('booking_id,booking_ref_no,pt_accounts.ai_first_name,booking_type,booking_status');
			$xcrud->button(base_url() . 'invoice/?id={booking_id}&sessid={booking_ref_no}', 'View Invoice', 'fa fa-search-plus', 'btn btn-primary', array(
				'target' => '_blank'
			));
			if ($this->editpermission) {
				$xcrud->button(base_url() . $this->data['adminsegment'] . '/bookings/edit/{booking_type}/{booking_id}', 'Edit', 'fa fa-edit', 'btn btn-warning', array(
					'target' => '_self'
				));
			}

			if ($this->deletepermission) {
				$delurl = base_url() . 'admin/bookings/delBooking';
				$xcrud->multiDelUrl = base_url() . 'admin/bookings/delMultipleBookings';
				$xcrud->button("javascript: delfunc('{booking_id}','$delurl')", 'DELETE', 'fa fa-times', 'btn-danger', array(
					'target' => '_self',
					'id' => '{booking_id}'
				));
			}

			$this->data['add_link'] = '';
			$xcrud->unset_add();
			$xcrud->unset_view();
			$xcrud->unset_remove();
			$xcrud->unset_edit();
			$xcrud->unset_print();
			$xcrud->unset_csv();
			$this->data['content'] = $xcrud->render();
			$this->data['page_title'] = 'Bookings gần đây';
			$this->data['main_content'] = 'temp_view';
			$this->data['header_title'] = 'Bookings gần đây';
			$this->load->view('temp_view', $this->data);
		}
	}

	function split_subitem($string){
		return explode("_", $string);
	}

	function editcombo(){
		$model = $this->session->userdata('addCombo');
		if ($_POST) {
			$data_post = $this->input->post();
			$model = array_merge($model, $data_post);
			if(!isset($_POST['is_unknown_date'])){ 
				$model['is_unknown_date'] =0;
			}else{ 
				$model['is_unknown_date'] =1;
			}
			$this->session->set_userdata('addCombo', $model);
			$model = $this->recalculate($model);//echo "<pre>";print_r($model);echo "</pre>";die;
			 if($this->combo_booking_model->edit_combo_booking($model)){
				$this->session->set_userdata('addCombo' , null);
				redirect(base_url() . "admin/bookings?booking_type=combo");
			}else{//validate false

			}  
		}else{//load view first time
			$model =$this->initDataEditCombo();
		}
		
		
		$this->session->set_userdata('addCombo', $model);
		$this->data['model'] = $this->recalculate($model);//var_dump($model);//die;

		//	echo "<pre>";print_r($this->data['model']);echo "</pre>";die;

		$this->prepareInitData();
		$this->data['main_content'] = 'modules/bookings/editcombo';
		$this->data['total_price_content'] = 'modules/bookings/includes/addcombo/total_price';
		$this->data['page_title'] = 'Sửa Booking';
		$this->load->view('template_new', $this->data);
	
	}

	function edithotel(){
		$this->load->model('admin/bookings/hotel_booking_model');
		$model = $this->session->userdata('addhotel');
		if ($_POST) {
			$data_post = $this->input->post();
			if($data_post['is_send'] != 'on' && $data_post['is_send'] != 1 ){
				$data_post['is_send'] = 0;
			}else{
				$data_post['is_send'] = 1;
			}
			$model = array_merge($model, $data_post);echo "<pre>";
			$this->session->set_userdata('addhotel', $model);
			$model = $this->recalculateAddHotel();
			
			 if($this->hotel_booking_model->edit_hotel_booking($model)){
				$this->session->set_userdata('addhotel' , null);
				redirect(base_url() . "admin/bookings?booking_type=hotels");
			}else{//validate false

			}  
		}else{//load view first time
			$model =$this->initDataEditHotel();
		}
		
		$this->session->set_userdata('addhotel', $model);
		$this->data['model'] = $this->recalculateAddHotel($model);//var_dump($model);//die;
			//echo "<pre>";print_r($this->data['model']);echo "</pre>";die;

		$this->prepareAddHotelInitData();
		$this->data['main_content'] = 'modules/bookings/edithotel';
		//$this->data['total_price_content'] = 'modules/bookings/includes/addcombo/total_price';
		$this->data['page_title'] = 'Sửa Booking';
		$this->load->view('template_new', $this->data);
	
	}

	private function initDataEditCombo(){
		$bookingId = $_GET['id'];
		$bookVo = $this->bookings_model->getBookById($bookingId);
		$customerVo = $this->bookings_model->getCustomerById($bookVo->booking_user);

		$model = array();
		$model['booking_id'] = $bookingId;
		if(isset($model['coupon_code'])&& !empty($model['coupon_code'])){
			$model['has_coupon'] = true;
		}else{
			$model['has_coupon'] = false;
		}
		$model['booking_child'] = $bookVo->booking_child;
		$model['booking_extras_quantity'] =  $bookVo->booking_extras_quantity;
		$model['booking_adults'] = $bookVo->booking_adults;;
		$model['booking_extras_fee'] = $bookVo->booking_extras_fee;	
		$model['booking_extra_beds_request'] = $bookVo->booking_extra_beds_request;
		$model['combo_id'] = $bookVo->booking_item;
		$model['booking_additional_notes'] = $bookVo->booking_additional_notes;
		$model['subTotal'] = 0;
		$model['vat'] = 0;
		$model['extraTotal'] = 0;
		$model['preDiscountTotal'] = 0;
		$model['booking_total'] =  $bookVo->booking_total;
		$model['discountValue'] = 0;
		$model['booking_amount_paid'] =  $bookVo->booking_amount_paid  ;
		$model['booking_remaining'] =  $bookVo->booking_remaining;
		$model['note'] =  $bookVo->note;;
		$model['coupon_code'] = $bookVo->booking_coupon;

		$model['customer_name'] = $customerVo->ai_last_name;
		$model['customer_email'] =  $customerVo->accounts_email;
		$model['customer_address'] =  $customerVo->ai_address_1;
		$model['customer_phone'] =  $customerVo->ai_mobile;
		$model['customer_request'] =  $bookVo->customer_request;
		$model['customer_id'] = $customerVo->accounts_id;

		$model['combo_code'] =$bookVo->booking_ref_no;
		$model['checkin'] =  date("d/m/Y",  strtotime( $bookVo->booking_checkin) );  

		$model['sent_invoice'] = 0;
		$model['basecharge_quantity'] = $bookVo->booking_quantity;
		$model['booking_status'] = $bookVo->booking_status;
		//$model['booking_payment_date'] =  date('d/m/Y ',$bookVo->booking_payment_date ); //booking_date
		$model['booking_payment_date'] = date("m/d/Y",  time());
		$model['mst'] =$bookVo->mst;
		$model['company'] =$bookVo->company;
		$model['companyadd'] =$bookVo->companyadd;
		$model['payment_type'] = $bookVo->booking_payment_type;
		$model['sentto'] =$bookVo->sentto;
        $model['is_unknown_date']  = $bookVo->is_unknown_date;
        $model['is_send']  = $bookVo->is_send;
		$model['cancel_condition'] = $bookVo->cancel_condition;
		$model['use_condition'] = $bookVo->use_condition;

		if($model['payment_type']=='banktransfer'){
			$model['bank'] = $bookVo->booking_payment_info;
			$model['txtAddress'] = "" ;
			$model['checkout-type']  = 1;
		}elseif($model['payment_type']=='payatoffice'){
			$model['txtAddress'] = "" ;
			$model['bank'] = "";
			$model['checkout-type']  = 2;
		}else{ 
			$model['checkout-type']  = 3;
			$model['bank'] = "";
			$model['txtAddress'] =  $bookVo->booking_payment_info ; //echo $model['txtAddress'];die;
		}
		$model['payment_info'] = $bookVo->booking_payment_info;

		$booking_subitem  = json_decode($bookVo->booking_subitem,true);
		//echo "<pre>";print_r($model);echo "</pre>";die;
		//		echo "<pre>";print_r($booking_subitem);echo "</pre>";

		$surchargeInfo = [];
        $this->db->where('offer_id', $bookVo->booking_item);
        $result = $this->db->get('phuthucombo')->result();//	echo "<pre>";print_r($result);echo "</pre>";
        $surchargeInfo = array();
        foreach ($result as $item) {
            $surchargeInfo[] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price ,
                'quantity' =>$booking_subitem[$item->id],
            ];
        }

		$model['surcharge_list'] = $surchargeInfo;
		return $model;
	}

	private function initDataEditHotel(){
		$this->load->model('hotels/rooms_model');
		$bookingId = $_GET['id'];
		$bookVo = $this->bookings_model->getBookById($bookingId);
		$customerVo = $this->bookings_model->getCustomerById($bookVo->booking_user);

		$model = array();
		if(isset($model['coupon_code'])&& !empty($model['coupon_code'])){
			$model['has_coupon'] = true;
		}else{
			$model['has_coupon'] = false;
		}
		$model['booking_id'] = $bookingId;
		$model['booking_child'] = $bookVo->booking_child;
		$model['booking_extras_quantity'] =  $bookVo->booking_extras_quantity;
		$model['booking_adults'] = $bookVo->booking_adults;;
		$model['booking_extras_fee'] = $bookVo->booking_extras_fee;
		$model['booking_extra_beds_request'] = $bookVo->booking_extra_beds_request;
		$model['hotel_id'] = $bookVo->booking_item;
		$model['booking_additional_notes'] = $bookVo->booking_additional_notes;
		$model['subTotal'] = 0;
		$model['vat'] = 0;
		$model['extraTotal'] = 0;
		$model['preDiscountTotal'] = 0;
		$model['booking_total'] =  $bookVo->booking_total;
		$model['discountValue'] = 0;
		$model['booking_amount_paid'] =  $bookVo->booking_amount_paid  ;
		$model['booking_remaining'] =  $bookVo->booking_remaining;
		$model['note'] =  $bookVo->note;;
		$model['coupon_code'] = $bookVo->booking_coupon;
		$model['cancel_condition'] = $bookVo->cancel_condition;
		$model['customer_name'] = $customerVo->ai_last_name;
		$model['customer_email'] =  $customerVo->accounts_email;
		$model['customer_address'] =  $customerVo->ai_address_1;
		$model['customer_phone'] =  $customerVo->ai_mobile;
		$model['customer_request'] =  $bookVo->customer_request;
		$model['customer_id'] = $customerVo->accounts_id;

		$model['combo_code'] =$bookVo->booking_ref_no;
		$model['checkin'] =  date("d/m/Y",  strtotime( $bookVo->booking_checkin) );  
		$model['checkout'] =  date("d/m/Y",  strtotime( $bookVo->booking_checkout) );  

		$model['sent_invoice'] = 0;
		$model['basecharge_quantity'] = $bookVo->booking_quantity;
		$model['booking_status'] = $bookVo->booking_status;
		//$model['booking_payment_date'] =  date('d/m/Y ',$bookVo->booking_payment_date ); //booking_date
		$model['booking_payment_date'] = date("m/d/Y",  time());
		//xuat hoa don
		$model['mst'] =$bookVo->mst;
		$model['company'] =$bookVo->company;
		$model['companyadd'] =$bookVo->companyadd;
		$model['payment_type'] = $bookVo->booking_payment_type;
		$model['sentto'] =$bookVo->sentto;

		//payment

		if($model['payment_type']=='banktransfer'){
			$model['bank'] = $bookVo->booking_payment_info;
			$model['txtAddress'] = "" ;
			$model['checkout-type']  = 1;
		}elseif($model['payment_type']=='payatoffice'){
			$model['txtAddress'] = "" ;
			$model['bank'] = "";
			$model['checkout-type']  = 2;
		}else{ 
			$model['checkout-type']  = 3;
			$model['bank'] = "";
			$model['txtAddress'] =  $bookVo->booking_payment_info ;
		} 
		$model['payment_info'] = $bookVo->booking_payment_info;

		$model['is_other_company']  = $bookVo->is_other_company;
		$model['is_send']  = $bookVo->is_send;

		//end payment

		//echo $model['booking_payment_date'];die;
		/*$this->session->set_userdata('addhotel', $model);
        $this->prepareAddHotelInitData();*/

		//get list rooms
		$this->db->where('booked_booking_id', $bookingId);
        $result = $this->db->get('pt_booked_rooms')->result();
           
    	$bookInfo = array();
    	$hotelID = $model['hotel_id'];
    	$room_list = array();
    				//	echo "<pre>";print_r($result);echo "</pre>";

    	foreach ($result as $k =>$v ) {
    		$room_info = $this->rooms_model->getRoomBasicInfo($v->booked_room_id);
    		$room_list[] = array('room_id' => $v->booked_room_id, 'room_total' => $v->booked_room_count, 'extra_bed' =>$v->booked_extra_bed , 'extra_bed_price' =>  $room_info['extrabed']);
			
    		/*$roomID = $v->booked_room_id;
             $roomsCount = $v->booked_room_count;
             $extrabeds = $v->booked_extra_bed;
            // echo $v->booked_checkin ;
             $checkin  = date("d/m/Y",  strtotime( $bookVo->booking_checkin) ); 			                          
             $checkout =  date("d/m/Y",  strtotime( $bookVo->booking_checkout) ); 
             if ($roomsCount > 0) {
                  $bookInfo[$roomID] = $this->hotels_lib->getBookResultObject($hotelID, $roomID, $roomsCount, $extrabeds,$checkin, $checkout);
             }*/
       }

        $model['room_list'] = $room_list ;
        $this->data['bookInfo'] = $bookInfo;


		$booking_subitem  = json_decode($bookVo->booking_subitem,true);
		//echo "<pre>";print_r($bookInfo);echo "</pre>";die;
				//echo "<pre>";print_r($room_list);echo "</pre>";
/*
		$surchargeInfo = [];
        $this->db->where('offer_id', $bookVo->booking_item);
        $result = $this->db->get('phuthucombo')->result();//	echo "<pre>";print_r($result);echo "</pre>";
        $surchargeInfo = array();
        foreach ($result as $item) {
            $surchargeInfo[] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price ,
                'quantity' =>$booking_subitem[$item->id],
            ];
        }

		$model['surcharge_list'] = $surchargeInfo;*/

		return $model;
	}
	function deleteBooking(){
		$id = $this->input->get('id');
		$this->bookings_model->delete_booking($id);
		$this->session->set_flashdata('flashmsgs', "Deleted Successfully");
		redirect(base_url() . 'admin/bookings');
	}

	function changeRoom(){
		$this->load->model('hotels/rooms_model');
		$room_id = $this->input->get('room_id');
		$room_info = $this->rooms_model->getRoomBasicInfo($room_id);
		$response['price'] = $room_info['extrabed'];
		$response['price_format'] = number_format( $room_info['extrabed']);
		return $this->output->out_json($response);	
		//echo $room_info['extrabed'] ;die;
	}

	// Delete Multiple Bookings

	/*function delMultipleBookings(){
		if (!$this->input->is_ajax_request()) {
			redirect(base_url() . 'admin');
		} else {
			$items = $this->input->post('items');
			foreach ($items as $item) {
				$this->bookings_model->delete_booking($item);
			}
		}
	}*/
}
