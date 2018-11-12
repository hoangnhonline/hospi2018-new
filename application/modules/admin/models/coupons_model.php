<?php

class Coupons_model extends CI_Model {

		function __construct() {
// Call the Model constructor
				parent :: __construct();
		}

		function getAllCoupons(){

			return $this->db->get('pt_coupons')->result();
		}

// add coupon
		function addCoupon() {
			


			$startdate = $this->input->post('startdate');//echo $startdate ;
			$expdate = $this->input->post('expdate');//echo $expdate ;

				if(empty($startdate) || empty($expdate)){

				$forever = 'Yes';

				}else{

				$forever = 'No';

				}

			    $maxuses = $this->input->post('max');

				$data = array(
					'code' => $this->input->post('code'), 
					'value' => str_replace(",", "", $this->input->post('rate')) ,
                    'type' => $this->input->post('type'),
					'startdate' => convert_to_unix($startdate), 
					'expirationdate' => convert_to_unix($expdate), 
					'maxuses' => $maxuses,
					'forever' => $forever,
					'status' => $this->input->post('status'),
					'condition' => $this->input->post('condition'), 
					'condition_value' => str_replace(",", "", $this->input->post('condition_value')),

					);
				//var_dump($data);
				$this->db->insert('pt_coupons', $data);

				$couponid = $this->db->insert_id();//echo $couponid ;die;
				return $couponid;
		}

//udpate coupon
		function updateCoupon($couponid) {
				
			$startdate = $this->input->post('startdate');
			$expdate = $this->input->post('expdate');

				if(empty($startdate) || empty($expdate)){

				$forever = 'Yes';

				}else{

				$forever = 'No';

				}

			    $maxuses = $this->input->post('max');

				$data = array(
					'value' => str_replace(",", "", $this->input->post('rate')) ,
                     'type' => $this->input->post('type'),
					'startdate' => convert_to_unix($startdate), 
					'expirationdate' => convert_to_unix($expdate), 
					'maxuses' => $maxuses,
					'forever' => $forever,
					'status' => $this->input->post('status'),
					'condition' => $this->input->post('condition'), 
					'condition_value' => str_replace(",", "", $this->input->post('condition_value')),

					);

				$this->db->where('id', $couponid);
				$this->db->update('pt_coupons', $data);
		}


		function delete_coupon($id) {
				$this->db->where('id', $id);
				$this->db->delete('pt_coupons');

				$this->db->where('couponid',$id);
				$this->db->delete('pt_coupons_assign');

		}

		function validatecoupon($coupon) {
				$this->db->where('coupon_code', $coupon);
				$this->db->where('coupon_status', '1');
				$res = $this->db->get('pt_coupons')->result();
				return $res[0]->coupon_rate;
		}

		function assignCoupon($couponid, $items){
			

			if(!empty($items)){
			$this->db->where('couponid',$couponid);
			$this->db->delete('pt_coupons_assign');
			foreach($items as $item => $val){

			foreach($val as $v){

				$result[] = array("module" => $item, "item" => $v);
			}	
			

			}


			foreach($result as $r){
				$data = array(
					'couponid' => $couponid,
					'module' => $r['module'],
					'item' => $r['item']
					);
				$this->db->insert('pt_coupons_assign',$data);
			}
			
			

			}


		}

		

		function assignCouponToAllModules($couponid, $modules, $items){	

		if(!empty($items)){
			
			$this->assignCoupon($couponid,$items);
		}		

			if(!empty($modules)){
			$this->db->where('couponid',$couponid);
			$this->db->where('item','all');
			$this->db->delete('pt_coupons_assign');

			foreach($modules as $module){
			
				$data = array(
				'couponid' => $couponid,
				'module' => $module,
				'item' => 'all'

				);

				$this->db->insert('pt_coupons_assign',$data);


				$result[] = array("module" => $item, "item" => $v);
			

			}
			
			}

		}
		function get_coupon_by_code($coupon_code) {
		    $sql = "select * from pt_coupons where code ='" . $coupon_code ."'";//  echo  $sql;die;
		    $query = $this->db->query($sql);
		    $rs = $query->result();
		    if(isset($rs[0])) return $rs[0];
		    else return null;
		}

		function count() {
	        $query = $this->db->get('pt_coupons');
	        return $query->num_rows();
    	}

	// get all bookings with limit
	    function get_by_filter( $perpage = null, $offset = null, $orderby = null) {
	        if ($offset != null) {
	            $offset = ($offset == 1) ? 0 : ($offset * $perpage) - $perpage;
	        }
	        $this->db->order_by('id', 'desc'); //echo $perpage.'-'. $offset;die;
	        $query = $this->db->get('pt_coupons', $perpage, $offset);
	        $data = $query->result();
	        return $data;
	    }
	    function get_coupon_by_id($id) {
		    $sql = "select * from pt_coupons where id ='" . $id ."'";//  echo  $sql;die;
		    $query = $this->db->query($sql);
		    $rs = $query->result();
		    if(isset($rs[0])) return $rs[0];
		    else return null;
		}

}