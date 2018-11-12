<?php

class Combo_booking_model extends Bookings_model {

    function __construct() {
        parent :: __construct();
    }

    function add_combo_booking($data_post) {
	    $result_valid_data_model = $this->validate_combo_insert($data_post);
	    if($result_valid_data_model){
		    $this->bookings_model->insertComboBooking($data_post);
            return true;
	    }else{
            return false;
        }
    }

    function edit_combo_booking($data_post) {
        $result_valid_data_model = $this->validate_combo_edit($data_post);
        if($result_valid_data_model){
            $this->bookings_model->editComboBooking($data_post);
            return true;
        }else{
            return false;
        }
    }

    

    // TODO: HOANGPH
    private function validate_combo_insert(array $data_post){
		return true;
    }
    private function validate_combo_edit(array $data_post){
        return true;
    }
}