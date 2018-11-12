<?php

class Hotel_booking_model extends Bookings_model {

    function __construct() {
        parent :: __construct();
    }

    function add_hotel_booking($data_post) {
	    $result_valid_data_model = $this->validate_hotel_insert($data_post);
	    if($result_valid_data_model){
		    $this->bookings_model->insertHotelBooking($data_post);
            return true;
	    }else{
            return false;
        }
    }

    function edit_hotel_booking($data_post) {
        $result_valid_data_model = $this->validate_hotel_edit($data_post);
        if($result_valid_data_model){
            $this->bookings_model->editHotelBooking($data_post);
            return true;
        }else{
            return false;
        }
    }

    // TODO: HOANGPH
    private function validate_hotel_insert(array $data_post){
		return true;
    }
    private function validate_hotel_edit(array $data_post){
        return true;
    }

}