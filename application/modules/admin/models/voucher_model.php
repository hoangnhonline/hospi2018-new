<?php

class Voucher_model extends CI_Model{

	function __construct(){
// Call the Model constructor
		parent:: __construct();
	}

	function getAll(){
		return $this->db->get('pt_voucher')->result();
	}

// add coupon
	function add_voucher($list_room = null){
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$data = array(
			'code' => $this->input->post('code'),
			'v_name' => $this->input->post('v_name'),
			'v_phone' => $this->input->post('v_phone'),
			'attentive' => $this->input->post('attentive'),
			'count_night' => $this->input->post('count_night'),
			'v_address' => $this->input->post('v_address'),
			'adults' => $this->input->post('adults'),
			'beds' => $this->input->post('beds'),
			'cancel_condition' => $this->input->post('cancel_condition'),
			'childs' => $this->input->post('childs'),
			'v_email' => $this->input->post('v_email'),
			'create_date' => date("Y-m-d "),
			'extra_beds' => $this->input->post('extra_beds'),
			'hotel_id' => $this->input->post('hotel_id'),
			'info' => $this->input->post('info'),
			'extra_info' => $this->input->post('extra_info'),
			'notes' => $this->input->post('notes'),
			'payment_status' => $this->input->post('payment_status'),
			'type' => $this->input->post('type'),
			'start_date' => str_replace("/", "-", $start_date),
			'end_date' => str_replace("/", "-", $end_date)
		);
		$this->db->insert('pt_voucher', $data);
		$id = $this->db->insert_id();


		$this->db->insert('pt_voucher', $data);
		$id = $this->db->insert_id();
		if ($id != null && $id != "" && $list_room != null) {
			foreach ($list_room as $room_id=>$quantity) {
				$data_room = array(
					'voucher_id' => $id,
					'room_id' => $room_id,
					'quantity' => $quantity
				);
				$this->db->insert('pt_voucher_room', $data_room);
				$id_result = $this->db->insert_id();
			}
		}
		return $id;
	}


	function edit_voucher($list_room = null){
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$id = $this->input->post("id");
		$data = array(
			'code' => $this->input->post('code'),
			'v_name' => $this->input->post('v_name'),
			'v_phone' => $this->input->post('v_phone'),
			'attentive' => $this->input->post('attentive'),
			'count_night' => $this->input->post('count_night'),
			'v_address' => $this->input->post('v_address'),
			'adults' => $this->input->post('adults'),
			'beds' => $this->input->post('beds'),
			'cancel_condition' => $this->input->post('cancel_condition'),
			'childs' => $this->input->post('childs'),
			'v_email' => $this->input->post('v_email'),
			'create_date' => date("Y-m-d "),
			'extra_beds' => $this->input->post('extra_beds'),
			'hotel_id' => $this->input->post('hotel_id'),
			'info' => $this->input->post('info'),
			'extra_info' => $this->input->post('extra_info'),
			'notes' => $this->input->post('notes'),
			'payment_status' => $this->input->post('payment_status'),
			'type' => $this->input->post('type'),
			'start_date' => str_replace("/", "-", $start_date),
			'end_date' => str_replace("/", "-", $end_date)
		);
		$this->db->where('id', $id);
		$this->db->update('pt_voucher', $data);
		if ($id != null && $id != "" && $list_room != null) {
			$this->db->where('voucher_id', $id);
			$this->db->delete('pt_voucher_room');
			foreach ($list_room as $room_id=>$quantity) {
				$data_room = array(
					'voucher_id' => $id,
					'room_id' => $room_id,
					'quantity' => $quantity
				);
				$this->db->insert('pt_voucher_room', $data_room);
				$id_result = $this->db->insert_id();
			}
		}
		return $id;
	}

//udpate coupon
	function updateCoupon($couponid){

		$startdate = $this->input->post('startdate');
		$expdate = $this->input->post('expdate');

		if (empty($startdate) || empty($expdate)) {
			$forever = 'Yes';
		} else {

			$forever = 'No';
		}
		$maxuses = $this->input->post('max');

		$data = array(
			'value' => $this->input->post('rate'),
			'type' => $this->input->post('type'),
			'startdate' => convert_to_unix($startdate),
			'expirationdate' => convert_to_unix($expdate),
			'maxuses' => $maxuses,
			'forever' => $forever,
			'status' => $this->input->post('status')
		);

		$this->db->where('id', $couponid);
		$this->db->update('pt_coupons', $data);
	}


	function delete_coupon($id){
		$this->db->where('id', $id);
		$this->db->delete('pt_coupons');

		$this->db->where('couponid', $id);
		$this->db->delete('pt_coupons_assign');

	}

	function validatecoupon($coupon){
		$this->db->where('coupon_code', $coupon);
		$this->db->where('coupon_status', '1');
		$res = $this->db->get('pt_coupons')->result();
		return $res[0]->coupon_rate;
	}

	function assignCoupon($couponid, $items){


		if (!empty($items)) {
			$this->db->where('couponid', $couponid);
			$this->db->delete('pt_coupons_assign');
			foreach ($items as $item => $val) {

				foreach ($val as $v) {

					$result[] = array("module" => $item, "item" => $v);
				}
			}
			foreach ($result as $r) {
				$data = array(
					'couponid' => $couponid,
					'module' => $r['module'],
					'item' => $r['item']
				);
				$this->db->insert('pt_coupons_assign', $data);
			}
		}
	}


	function search($params, $perpage = null, $page = null){
		$offset = null;
		if ($page != null) {
			$offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
		}

		foreach ($params as $key => $value) {
			if ($key == 'v_name') {
				$this->db->like('pt_voucher.v_name', $value);
			} else {
				if ($value) {
					$this->db->where('pt_voucher.' . $key, $value);
				}
			}
		}
		if (!is_null($perpage)) {
			/*$this->db->join('pt_accounts', 'pt_accounts.accounts_id = pt_voucher.hotel_owned_by');*/
			$this->db->limit($perpage, $offset);
			$query = $this->db->get('pt_voucher');
			$data = $query->result();
		} else {
			$query = $this->db->get('pt_voucher');
			$data = $query->num_rows();
		}

		return $data;
	}

	function delete($id){
		if (is_array($id)) {
			foreach ($id as $item) {
				$this->db->where('id', $item);
				$this->db->delete('pt_voucher');

				$this->db->where('voucher_id', $item);
				$this->db->delete('pt_voucher_room');
			}
		} else {
			$this->db->where('id', $id);
			$this->db->delete('pt_voucher');

			$this->db->where('voucher_id', $id);
			$this->db->delete('pt_voucher_room');
		}

	}

	function get_coupon_by_code($coupon_code){
		$sql = "select * from pt_coupons where code ='" . $coupon_code . "'";//  echo  $sql;die;
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs[0];
	}

	function get_room_by_voucher_id($id){
		$sql = "select * from pt_voucher_room where voucher_id =" . $id;
		$query = $this->db->query($sql);
		$rs = $query->result();
		return $rs;
	}
}