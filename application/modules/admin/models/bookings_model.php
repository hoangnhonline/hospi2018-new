<?php

class Bookings_model extends CI_Model
{
    private $data = array();

    function __construct()
    {
        // Call the Model constructor
        parent:: __construct();
        $this->load->model('admin/accounts_model');
        $this->load->model('admin/emails_model');
        $this->data['app_settings'] = $this->settings_model->get_settings_data();
        $this->load->helper('invoice');
    }

    function admin_get_all_bookings($type = null)
    {
        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
            pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
            booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        if (!empty ($type)) {
            $this->db->where('pt_bookings.booking_type', $type);
        }
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        return $this->db->get('pt_bookings')->result();
    }

    // get all bookings
    function get_all_bookings_back_admin()
    {
        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
            pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
            booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings');
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    // get all bookings with limit
    function get_all_bookings_back_limit_admin($perpage = null, $page = null, $orderby = null)
    {
        $offset = null;
        if ($page != null) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }

        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
          pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
          booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings', $perpage, $offset);
        $data['all'] = $query->result();
        // $data['nums'] = $query->num_rows();
        return $data;
    }

    // get all bookings info  by search for admin
    function search_all_bookings_back_limit_admin($term, $perpage = null, $page = null, $orderby = null)
    {
        $offset = null;
        if ($page != null) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }

        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
          pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
          booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        $this->db->like('pt_bookings.booking_type', $term);
        $this->db->or_like('pt_bookings.booking_id', $term);
        $this->db->or_like('pt_accounts.ai_first_name', $term);
        $this->db->or_like('pt_accounts.ai_last_name', $term);
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    // get all bookings info  by advance search for admin
    function adv_search_all_bookings_back_limit_admin($data, $perpage = null, $page = null, $orderby = null)
    {
        $offset = null;
        if ($page != null) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }

        $invoice = $data["invoiceno"];
        $invoicefromdate = $data["invoicefromdate"];
        $invoicetodate = $data["invoicetodate"];
        $status = $data["status"];
        $customername = $data["customername"];
        $module = $data["module"];
        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
          pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
          booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        if (!empty ($invoice)) {
            $this->db->where('pt_bookings.booking_id', $invoice);
        }
        if (!empty ($module)) {
            $this->db->where('pt_bookings.booking_type', $module);
        }
        if (!empty ($status)) {
            $this->db->where('pt_bookings.booking_status', $status);
        }
        if (!empty ($customername)) {
            $this->db->like('pt_accounts.ai_first_name', $customername);
            $this->db->or_like('pt_accounts.ai_last_name', $customername);
        }
        if (!empty ($invoicefromdate)) {
            $this->db->where('pt_bookings.booking_date >=', $invoicefromdate);
            $this->db->where('pt_bookings.booking_date <=', $invoicetodate);
        }
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    // Get supplier's bookings
    function supplier_get_all_bookings($myitems)
    {
        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
          pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
          booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        if (!empty ($myitems)) {
            $this->db->where_in('pt_bookings.booking_item', $myitems);
        } else {
            $this->db->where('pt_bookings.booking_item', 0);
        }
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings');
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    // Get supplier's bookings in limit
    function supplier_get_all_bookings_limit($myitems, $perpage = null, $page = null, $orderby = null)
    {
        $offset = null;
        if ($page != null) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }

        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
        pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
        booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        if (!empty ($myitems)) {
            $this->db->where_in('pt_bookings.booking_item', $myitems);
        } else {
            $this->db->where('pt_bookings.booking_item', 0);
        }
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    // get all bookings info  by search for admin
    function search_all_bookings_back_limit_supplier($term, $myitems, $perpage = null, $page = null, $orderby = null)
    {
        $offset = null;
        if ($page != null) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }

        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
        pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
        booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        $this->db->like('pt_bookings.booking_type', $term);
        $this->db->or_like('pt_bookings.booking_id', $term);
        $this->db->or_like('pt_accounts.ai_first_name', $term);
        $this->db->or_like('pt_accounts.ai_last_name', $term);
        if (!empty ($myitems)) {
            $this->db->where_in('pt_bookings.booking_item', $myitems);
        } else {
            $this->db->where('pt_bookings.booking_item', 0);
        }
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    // get all bookings info  by advance search for admin
    function adv_search_all_bookings_back_limit_supplier($data, $myitems, $perpage = null, $page = null, $orderby = null)
    {
        $offset = null;
        if ($page != null) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }

        $invoice = $data["invoiceno"];
        $invoicefromdate = $data["invoicefromdate"];
        $invoicetodate = $data["invoicetodate"];
        $status = $data["status"];
        $customername = $data["customername"];
        $module = $data["module"];
        $this->db->select('pt_bookings.booking_user,pt_bookings.booking_cancellation_request,pt_bookings.booking_id,pt_bookings.booking_type,pt_bookings.booking_expiry,pt_bookings.booking_ref_no,
        pt_bookings.booking_status,pt_bookings.booking_item,pt_bookings.booking_item_title,
        booking_total,pt_bookings.booking_deposit,pt_bookings.booking_date,pt_accounts.ai_first_name,pt_accounts.ai_last_name,pt_accounts.accounts_email');
        if (!empty ($invoice)) {
            $this->db->where('pt_bookings.booking_id', $invoice);
        }
        if (!empty ($module)) {
            $this->db->where('pt_bookings.booking_type', $module);
        }
        if (!empty ($status)) {
            $this->db->where('pt_bookings.booking_status', $status);
        }
        if (!empty ($customername)) {
            $this->db->like('pt_accounts.ai_first_name', $customername);
            $this->db->or_like('pt_accounts.ai_last_name', $customername);
        }
        if (!empty ($invoicefromdate)) {
            $this->db->where('pt_bookings.booking_date >=', $invoicefromdate);
            $this->db->where('pt_bookings.booking_date <=', $invoicetodate);
        }
        if (!empty ($myitems)) {
            $this->db->where_in('pt_bookings.booking_item', $myitems);
        } else {
            $this->db->where('pt_bookings.booking_item', 0);
        }
        $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
        $this->db->order_by('pt_bookings.booking_id', 'desc');
        $query = $this->db->get('pt_bookings', $perpage, $offset);
        $data['all'] = $query->result();
        $data['nums'] = $query->num_rows();
        return $data;
    }

    function do_login_booking($username, $password)
    {
        $login = $this->accounts_model->login_customer($username, $password);
        if ($login) {
            $userid = $this->session->userdata('pt_logged_customer');
            return $this->do_booking($userid);
        } else {
            $bookingResult = array("error" => "yes", 'msg' => 'Invalid Email or Password');
            return $bookingResult;
        }
    }

    function do_customer_booking()
    {
        $userid = $this->accounts_model->signup_account('customers', '1');
        return $this->do_booking($userid);
    }

    // Search hotels from home page
    function search($params, $perpage = null, $page = null)
    {
        $offset = null;
        if ($page != null) {
            $offset = ($page == 1) ? 0 : ($page * $perpage) - $perpage;
        }

        $this->db->join('pt_accounts', 'pt_accounts.accounts_id = pt_bookings.booking_user');
        foreach ($params as $key => $value) {
            if ($key == 'ai_last_name' && $value) {
                $this->db->like('pt_accounts.ai_last_name', $value);
            } else {
                if ($value) {
                    $this->db->where('pt_bookings.' . $key, $value);
                }
            }

        }
        if (!empty($perpage)) {
            $this->db->order_by('booking_id', 'desc');
            $this->db->limit($perpage, $offset);

            $query = $this->db->get('pt_bookings');
            $data = $query->result();
        } else {
            $query = $this->db->get('pt_bookings');
            $data = $query->num_rows();
        }//echo $this->db->last_query();die;

        return $data;
    }

    function doGuestBooking($bookquick = null)
    {
        $userid = $this->accounts_model->signup_account('guest', '0');
        //die($bookquick);
        if (empty($bookquick)) {
            return $this->do_booking($userid);
        } else {
            return $this->doQuickBooking($userid);
        }

    }

    function do_booking($userid)
    {   
        $this->load->library('currconverter');
        $cancel_condition = "";
        $use_condition =  "";
        $paymethod = $this->input->post('checkout-type');
        $bookingtype = $this->input->post('btype');
        $sent_invoice = $this->input->post('sent_invoice');
        $nguoikhac = $this->input->post('nguoikhac');
        $guest = $this->input->post('guest');
        $sentto = $this->input->post('sentto');
        $company = $this->input->post('company');
        $mst = $this->input->post('mst');
        $companyadd = $this->input->post('companyadd');
        $itemid = $this->input->post('itemid');
       // echo 'do_booking'.$itemid;die;
        if ($paymethod == "cod") {
            $payinfo = $this->input->post('txtAddress');
        } elseif ($paymethod == "banktransfer") {
            $bank = $this->input->post('bank');
            $payinfo = $this->input->post($bank);
        } else {
            $payinfo = "Địa chỉ: Lầu 1, Số 124 Khánh Hội, P.6, Quận 4, Tp. Hồ Chí Minh - Tel: 028 3826 8797 - Fax: (08) 3826 8798";
        }
        $passportInfo = "";
        $refno = random_string('numeric', 7);
        if ($bookingtype == "hotels") {
            $refno = "HP" . random_string('numeric', 5);
            $this->load->library('hotels/hotels_lib');
        } // add code desktop

        $coupon = $this->input->post('couponid');
        $coupon_code = "";
        if ($coupon > 0) {
            $this->updateCoupon($coupon);
            $coupon_code = $this->input->post('coupon_code');
        }

        $expiry = $this->data['app_settings'][0]->booking_expiry * 86400;

        try {
            if ($bookingtype != 'offers') {
                $subitemid = $this->input->post('subitemid');
                $checkin = $this->input->post('checkin');
                $checkout = $this->input->post('checkout');
                $roomscount = $this->input->post('roomscount');
                $extrabeds = $this->input->post('so_giuong_phu');
                $extrabedscharges = $this->input->post('phi_giuong_phu');
                $honeymoon = $this->input->post('honeymoon');
                $phi_dich_vu = $this->input->post('phi_dich_vu');
                $phi_vat = $this->input->post('phi_vat');

                $checkin = databaseDate($checkin);
                $checkout = databaseDate($checkout);

                $data = array(
                    'booking_ref_no' => $refno,
                    'booking_type' => $bookingtype,
                    'booking_item' => $itemid,
                    'booking_subitem' => $subitemid,
                    'booking_date' => time(),
                    'booking_expiry' => time() + $expiry,
                    'booking_user' => $userid,
                    'booking_status' => 'unpaid',
                    'booking_additional_notes' => $this->input->post('additionalnotes'),
                    'customer_request' => $this->input->post('additionalnotes'),
                    'booking_total' => $this->input->post('tong_thanh_toan'),
                    'booking_remaining' => $this->input->post('tong_chua_giam'),
                    'booking_checkin' => $checkin,
                    'booking_checkout' => $checkout,
                    'booking_nights' => $this->input->post('nights'),
                    'booking_adults' => $this->input->post('adults'),
                    'booking_child' => $this->input->post('child'),
                    'booking_payment_type' => $paymethod,
                    'booking_payment_info' => $payinfo,
                    'honeymoon' => $honeymoon,
                    'nguoikhac' => $nguoikhac,
                    'sent_invoice' => $sent_invoice,
                    'company' => $company,
                    'mst' => $mst,
                    'companyadd' => $companyadd,
                    'guest' => $guest,
                    'sentto' => $sentto,
                    'booking_extra_beds' => $extrabeds,
                    'booking_extra_beds_charges' => $extrabedscharges,
                    'booking_deposit' => 0,
                    'booking_tax' => empty($phi_vat) ? 0 : $phi_vat,
                    'booking_paymethod_tax' => empty($phi_dich_vu) ? 0 : $phi_dich_vu,
                    'booking_curr_code' => 'VND',
                    'booking_curr_symbol' => 'vnd',
                    'booking_coupon_rate' => 0,
                    'booking_coupon' => $coupon_code,
                    'booking_guest_info' => $passportInfo
                );
                $this->db->insert('pt_bookings', $data);
                $book_id = $this->db->insert_id();
                $this->session->set_userdata("BOOKING_ID", $book_id);
                $this->session->set_userdata("REF_NO", $refno);

                if ($bookingtype == "hotels") {
                    $room_ids = json_decode($subitemid, true);
                    $roomscounts = json_decode($roomscount, true);

                    foreach ($room_ids as $room_id) {
                        $rdata = array(
                            'booked_booking_id' => $book_id,
                            'booked_room_id' => $room_id,
                            'booked_room_count' => $roomscounts[$room_id],
                            'booked_checkin' => $checkin,
                            'booked_checkout' => $checkout,
                            'booked_booking_status' => 'unpaid'
                        );

                        $this->db->insert('pt_booked_rooms', $rdata);
                    }
                } elseif ($bookingtype == "cars") {
                    /*$cdata = array(
                        'booked_booking_id' => $bookid,
                        'booked_car_id' => $itemid,
                        'booked_pickupdate' => $checkin,
                        'booked_pickuptime' => $pickuptime,
                        'booked_pickuplocation' => $pickup,
                        'booked_dropofflocation' => $drop,
                        'booked_dropoffDate' => databaseDate($dropdate),
                        'booked_dropoffTime' => $droptime,
                        'booked_booking_status' => 'unpaid'
                    );
                    $this->db->insert('pt_booked_cars', $cdata);*/
                }
            } else {
                $checkin = $this->input->post('checkin');
                $surcharge = $this->input->post('surcharge');
                $quantity = $this->input->post('quantity');
                $checkin = databaseDate($checkin);

                $this->load->library('offers_lib');
                $offerDetail = $this->offers_lib->offer_details($itemid);
                $cancel_condition = $offerDetail->cancel_condition ;
                $use_condition =  $offerDetail->use_condition ;
                $data = array(
                    'booking_ref_no' => $refno,
                    'booking_type' => $offerDetail->type == 2 ? 'combo' : 'honeymoon',
                    'booking_item' => $itemid,
                    'booking_subitem' => $surcharge,
                    'booking_quantity' => $quantity,
                    'booking_date' => time(),
                    'booking_expiry' => time() + $expiry,
                    'booking_user' => $userid,
                    'booking_status' => 'unpaid',
                    'booking_additional_notes' => $this->input->post('additionalnotes'),
                    'customer_request' => $this->input->post('additionalnotes'),
                    'booking_total' => $this->input->post('tong_thanh_toan'),
                    'booking_remaining' => $this->input->post('tong_chua_giam'),
                    'booking_checkin' => $checkin,
                    'booking_checkout' => $checkin,
                    'booking_nights' => $this->input->post('nights'),
                    'booking_payment_type' => $paymethod,
                    'booking_payment_info' => $payinfo,
                    'nguoikhac' => $nguoikhac,
                    'sent_invoice' => $sent_invoice,
                    'company' => $company,
                    'mst' => $mst,
                    'companyadd' => $companyadd,
                    'guest' => $guest,
                    'sentto' => $sentto,
                    'booking_deposit' => 0,
                    'booking_tax' => 0,
                    'booking_paymethod_tax' => 0,
                    'booking_curr_code' => 'VND',
                    'booking_curr_symbol' => 'vnd',
                    'booking_coupon_rate' => 0,
                    'booking_coupon' => $coupon_code,
                    'booking_guest_info' => $passportInfo,
                    'cancel_condition' => $cancel_condition,
                    'use_condition' => $use_condition,
                    'is_unknown_date' => $this->input->post('is_unknown_date'), 
                );
                $this->db->insert('pt_bookings', $data);
                $book_id = $this->db->insert_id();
                $this->session->set_userdata("BOOKING_ID", $book_id);
                $this->session->set_userdata("REF_NO", $refno);

                $surcharge_info = json_decode($surcharge, true);

                foreach ($surcharge_info as $id => $value) {
                    $rdata = array(
                        'booked_booking_id' => $book_id,
                        'booked_room_id' => $id,
                        'booked_room_count' => $value,
                        'booked_checkin' => $checkin,
                        'booking_checkout' => $checkin,
                        'booked_booking_status' => 'unpaid'
                    );

                    $this->db->insert('pt_booked_rooms', $rdata);
                }
            }

            $url = base_url() . 'invoice?id=' . $book_id . '&sessid=' . $refno;
            $bookingResult = array("error" => "no", 'msg' => '', 'url' => $url);
            $invoicedetails = invoiceDetails($book_id, $refno);

            $this->emails_model->sendEmail_customer($invoicedetails, $this->data['app_settings'][0]->site_title);
            $this->emails_model->sendEmail_admin($invoicedetails, $this->data['app_settings'][0]->site_title);
            //$this->emails_model->sendEmail_owner($invoicedetails,$this->data['app_settings'][0]->site_title);
            //$this->emails_model->sendEmail_supplier($invoicedetails,$this->data['app_settings'][0]->site_title);
        } catch (Exception $e) {
            $bookingResult = array("error" => "yes", 'msg' => $e->getMessage());
        }

        return $bookingResult;
    }


    //Do quick booking by admin
    function doQuickBooking($userid)
    {
        $this->load->library('currconverter');
        $itemid = $this->input->post('itemid');       
        $subitemid = $this->input->post('subitemid');
        $roomscount = $this->input->post('roomscount');
        $bookingtype = $this->input->post('btype');
        $quickDeposit = $this->input->post('quickDeposit');
        $extras = $this->input->post('extras');
        $perNight = $this->input->post('perNight');
        $grandtotal = $this->input->post('grandtotal');
        $stay = $this->input->post('stay');
        $paymethod = $this->input->post('checkout-type');
        $honeymoon = $this->input->post('honeymoon');
        $sent_invoice = $this->input->post('sent_invoice');
        $nguoikhac = $this->input->post('nguoikhac');
        $guest = $this->input->post('guest');
        $sentto = $this->input->post('sentto');
        $company = $this->input->post('company');
        $mst = $this->input->post('mst');
        $companyadd = $this->input->post('companyadd');
        if ($paymethod == "cod") {
            $payinfo = $this->input->post('txtAddress');
        } elseif ($paymethod == "banktransfer") {
            $bank = $this->input->post('bank');
            $payinfo = $this->input->post($bank);
        } else {
            $payinfo = "";
        }
        $passportInfo = "";

        $expiry = $this->data['app_settings'][0]->booking_expiry * 86400;
        $paymethodfee = 0;


        $extrabeds = 0;//$this->input->post('bedscount');

        if ($bookingtype == "hotels") {
            $this->load->library('hotels/hotels_lib');
            $extrasInfo = $this->hotels_lib->extrasFee($extras);
            $extrasData = json_encode($extrasInfo['extrasIndividualFee']);
            $subitemData = json_encode(array("id" => $subitemid, "price" => $perNight, "count" => $roomscount));

        } elseif ($bookingtype == "tours") {
            $adults = $this->input->post('adults');
            $child = $this->input->post('children');
            $infant = $this->input->post('infants');


            /* $checkin = $this->input->post('checkin');
             $checkout = $this->input->post('checkin');
                  */


            $this->load->library('tours/tours_lib');
            $extrasInfo = $this->tours_lib->extrasFee($extras);
            $extrasData = json_encode($extrasInfo['extrasIndividualFee']);
            $bookingData = json_decode($this->tours_lib->getUpdatedDataBookResultObject($itemid, $adults, $child, $infant, $extras));
            $subitemData = json_encode($bookingData->subitem);
        } elseif ($bookingtype == "cars") {


            $this->load->library('cars/cars_lib');
            $extrasInfo = $this->cars_lib->extrasFee($extras);
            $extrasData = json_encode($extrasInfo['extrasIndividualFee']);
            $bookingData = json_decode($this->cars_lib->getUpdatedDataBookResultObject($itemid, $extras));
            $subitemData = json_encode($bookingData->subitem);
        }

        $checkin = databaseDate($this->input->post('checkin'));
        $checkout = databaseDate($this->input->post('checkout'));
        $tax = $this->input->post('taxamount');

        $extrasTotalFee = $this->input->post('totalsupamount');

        $currCode = $this->input->post('currencycode');
        $currSymbol = $this->input->post('currencysign');

        $extrabedscharges = 0;//$this->currconverter->convertPriceFloat($bookingData->extraBedCharges);
        $refno = random_string('numeric', 4);

        $data = array('booking_ref_no' => $refno, 'booking_type' => $bookingtype,
            'booking_item' => $itemid,
            'booking_subitem' => $subitemData,
            'booking_extras' => $extrasData, 'booking_date' => time(),
            'booking_expiry' => time() + $expiry, 'booking_user' => $userid,
            'booking_status' => 'unpaid',
            'booking_additional_notes' => "",
            'customer_request' => $this->input->post('additionalnotes'),
            'booking_total' => $grandtotal,
            'booking_remaining' => $grandtotal,
            'booking_checkin' => $checkin,
            'booking_checkout' => $checkout,
            'booking_nights' => $stay,
            'booking_adults' => '1',
            'booking_child' => '0',
            'booking_payment_type' => $this->input->post('paymethod'),
            'booking_deposit' => $quickDeposit,
            'booking_tax' => $tax,
            'booking_paymethod_tax' => $paymethodfee,
            'booking_extras_total_fee' => $extrasTotalFee,
            'booking_curr_code' => $currCode,
            'booking_curr_symbol' => $currSymbol,
            'booking_extra_beds' => $extrabeds,
            'booking_extra_beds_charges' => $extrabedscharges,
            'booking_payment_type' => $paymethod, 'booking_payment_info' => $payinfo, 'honeymoon' => $honeymoon,
            'nguoikhac' => $nguoikhac, 'sent_invoice' => $sent_invoice, 'company' => $company, 'mst' => $mst, 'companyadd' => $companyadd, 'guest' => $guest, 'sentto' => $sentto,
        );

        $this->db->insert('pt_bookings', $data);
        $bookid = $this->db->insert_id();


        if ($bookingtype == "hotels") {
            $rdata = array('booked_booking_id' => $bookid, 'booked_room_id' => $subitemid, 'booked_room_count' => $roomscount, 'booked_checkin' => $checkin, 'booked_checkout' => $checkout, 'booked_booking_status' => 'unpaid');
            $this->db->insert('pt_booked_rooms', $rdata);
        } elseif ($bookingtype == "cars") {
            $cdata = array('booked_booking_id' => $bookid, 'booked_car_id' => $this->input->post('itemid'), 'booked_checkin' => convert_to_unix($checkin), 'booked_checkout' => convert_to_unix($checkout), 'booked_booking_status' => 'unpaid');
            $this->db->insert('pt_booked_cars', $cdata);
        }

        $invoicedetails = invoiceDetails($bookid, $refno);

        $this->emails_model->sendEmail_customer($invoicedetails, $this->data['app_settings'][0]->site_title);
        //$this->emails_model->sendEmail_supplier($invoicedetails,$this->data['app_settings'][0]->site_title);
        $this->emails_model->sendEmail_admin($invoicedetails, $this->data['app_settings'][0]->site_title);
        //$this->emails_model->sendEmail_owner($invoicedetails,$this->data['app_settings'][0]->site_title);
    }

    //Update booking details
    function update_booking($id)
    {
        $status = $this->input->post('status');
        $deposit = $this->input->post('totaltopay');
        $total = $this->input->post('grandtotal');
        $bookingtype = $this->input->post('btype');
        $bookid = $this->input->post('bookingid');
        if ($status == "paid") {
            $remaining = $total - $deposit;
            $paid = $deposit;
            $paytime = time();
        } else {
            $remaining = $total;
            $paid = 0;
        }

        $data = array(
            'booking_status' => $status,
            'booking_deposit' => $deposit,
            'booking_payment_type' => $this->input->post('paymethod'),
            'booking_remaining' => $remaining,
            'booking_amount_paid' => $paid,
            'booking_payment_date' => $paytime
        );
        $this->db->where('booking_id', $bookid);
        $this->db->update('pt_bookings', $data);

        if ($bookingtype == "hotels") {

            $rdata = array('booked_booking_status' => $status);
            $this->db->where('booked_booking_id', $bookid);
            $this->db->update('pt_booked_rooms', $rdata);

        } elseif ($bookingtype == "cars") {
            $cdata = array('booked_booking_status' => $status);
            $this->db->where('booked_booking_id', $bookid);
            $this->db->update('pt_booked_cars', $cdata);
        }

        if ($status == "paid") {
            $refno = $this->input->post('refcode');

            $invoicedetails = invoiceDetails($bookid, $refno);

            $this->emails_model->paid_sendEmail_customer($invoicedetails, $this->data['app_settings'][0]->site_title);
            //$this->emails_model->paid_sendEmail_supplier($invoicedetails,$this->data['app_settings'][0]->site_title);
            $this->emails_model->paid_sendEmail_admin($invoicedetails, $this->data['app_settings'][0]->site_title);
            //$this->emails_model->paid_sendEmail_owner($invoicedetails,$this->data['app_settings'][0]->site_title);
        }

    }

    function delete_booking($id)
    {
        $this->db->where('booking_id', $id);
        $this->db->delete('pt_bookings');
        $this->db->where('booked_booking_id', $id);
        $this->db->delete('pt_booked_rooms');
        $this->db->where('review_booking_id', $id);
        $this->db->delete('pt_reviews');
        $this->db->where('booked_booking_id', $id);
        $this->db->delete('pt_booked_cars');
        $this->db->where('book_id', $id);
        $this->db->delete('billing_charge');
    }

    function cancel_booking($id)
    {
        $updata = array('booking_status' => 'cancelled');
        $this->db->where('booking_id', $id);
        $this->db->update('pt_bookings', $updata);
        $this->db->where('booked_booking_id', $id);
        $this->db->delete('pt_booked_rooms');
        $this->db->where('booked_booking_id', $id);
        $this->db->delete('pt_booked_cars');
        $this->db->where('review_booking_id', $id);
        $this->db->delete('pt_reviews');
    }

    // change booking status to paid
    function booking_status_paid($id)
    {
        $this->db->select('booking_total,booking_deposit,booking_type');
        $this->db->where('booking_id', $id);
        $bk = $this->db->get('pt_bookings')->result();
        $btotal = $bk[0]->booking_total;
        $bdep = $bk[0]->booking_deposit;
        $btype = $bk[0]->booking_type;
        $data1 = array('booking_status' => 'paid', 'booking_amount_paid' => $bdep, 'booking_remaining' => $btotal - $bdep, 'booking_payment_date' => time());
        $this->db->where('booking_id', $id);
        $this->db->update('pt_bookings', $data1);
        if ($btype == "hotels") {
            $data2 = array('booked_booking_status' => 'paid');
            $this->db->where('booked_booking_id', $id);
            $this->db->update('pt_booked_rooms', $data2);
        } elseif ($btype == "cruises") {
            $data2 = array('booked_booking_status' => 'paid');
            $this->db->where('booked_booking_id', $id);
            $this->db->update('pt_booked_cruise_rooms', $data2);
        } elseif ($btype == "cars") {
            $data3 = array('booked_booking_status' => 'paid');
            $this->db->where('booked_booking_id', $id);
            $this->db->update('pt_booked_cars', $data3);
        }
    }

    // change booking status to unpaid
    function booking_status_unpaid($id)
    {
        $this->db->select('booking_total,booking_deposit,booking_type');
        $this->db->where('booking_id', $id);
        $bk = $this->db->get('pt_bookings')->result();
        $btotal = $bk[0]->booking_total;
        $bdep = $bk[0]->booking_deposit;
        $btype = $bk[0]->booking_type;
        $data1 = array('booking_status' => 'unpaid', 'booking_amount_paid' => 0, 'booking_remaining' => $btotal,);
        $this->db->where('booking_id', $id);
        $this->db->update('pt_bookings', $data1);
        if ($btype == "hotels") {
            $data2 = array('booked_booking_status' => 'unpaid');
            $this->db->where('booked_booking_id', $id);
            $this->db->update('pt_booked_rooms', $data2);
        } elseif ($btype == "cruises") {
            $data2 = array('booked_booking_status' => 'unpaid');
            $this->db->where('booked_booking_id', $id);
            $this->db->update('pt_booked_cruise_rooms', $data2);
        } elseif ($btype == "cars") {
            $data3 = array('booked_booking_status' => 'unpaid');
            $this->db->where('booked_booking_id', $id);
            $this->db->update('pt_booked_cars', $data3);
        }
    }

    function cancel_booking_approve($id)
    {
        // delete booking and send email
        $useremail = $this->userinfo_by_bookingid($id);
        $this->emails_model->booking_approve_cancellation_email($useremail);
        $this->cancel_booking($id);
        //  $this->delete_booking($id);
    }

    function cancel_booking_reject($id)
    {
        $data = array('booking_cancellation_request' => '2');
        $this->db->where('booking_id', $id);
        $this->db->update('pt_bookings', $data);
        $useremail = $this->userinfo_by_bookingid($id);
        $this->emails_model->booking_reject_cancellation_email($useremail, $id);
    }

    function userinfo_by_bookingid($id)
    {
        $this->db->select('booking_user');
        $this->db->where('booking_id', $id);
        $res = $this->db->get('pt_bookings')->result();
        $user = $res[0]->booking_user;
        $uemail = $this->accounts_model->get_user_email($user);
        return $uemail;
    }

    function get_booking_details_by_id($id)
    {
        $this->db->where('booking_id', $id);
        return $this->db->get('pt_bookings')->result();
    }

    function getBookingRefNo($id)
    {
        $this->db->select('booking_ref_no');
        $this->db->where('booking_id', $id);
        $res = $this->db->get('pt_bookings')->result();
        return $res[0]->booking_ref_no;
    }

    function bookingShortInfo($id)
    {
        $this->db->select('booking_ref_no,booking_deposit,booking_type,booking_total,booking_deposit');
        $this->db->where('booking_id', $id);
        return $this->db->get('pt_bookings')->result();
    }

    function updateCoupon($couponid)
    {

        $this->db->where('id', $couponid);
        $res = $this->db->get('pt_coupons')->result();
        $uses = $res[0]->uses + 1;

        $data = array(
            'uses' => $uses
        );
        $this->db->where('id', $couponid);

        $this->db->update('pt_coupons', $data);

    }

    public function getBookingIdNo($bookingref)
    {
        $this->db->select('booking_id');
        $this->db->where('booking_ref_no', $bookingref);
        $res = $this->db->get('pt_bookings')->result();
        return $res[0]->booking_id;
    }

    public function getBookinginfo($bookingref)
    {

        $this->load->library('form_validation');
        $validation_status = 1; // by default validation is ok
        $fields_failed = array();

        // EMAIL
        if (!$this->form_validation->valid_email($bookingref)) { //if email is not valid
            $validation_status = 0;
            array_push($fields_failed, "email");
        }

        if ($validation_status) {//no error in data, continue
            $this->db->select('booking_user, booking_nights, booking_checkin, ai_first_name, ai_last_name, accounts_email');
            $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
            $this->db->where('accounts_email', $bookingref);
            $this->db->order_by('pt_bookings.booking_id', 'desc');
        } else {
            $this->db->select('booking_user, booking_nights, booking_checkin, ai_first_name, ai_last_name, accounts_email');
            $this->db->join('pt_accounts', 'pt_bookings.booking_user = pt_accounts.accounts_id', 'left');
            $this->db->where('booking_ref_no', $bookingref);
            $this->db->order_by('pt_bookings.booking_id', 'desc');
        }

        $res = $this->db->get('pt_bookings')->result();
        if ($res[0]->booking_user > 0) {
            $originalDate = $res[0]->booking_checkin;
            $newDate = date("d/m/Y", strtotime($originalDate));

            $result[] = (object)[
                'booking_user' => $res[0]->booking_user,
                'ai_first_name' => $res[0]->ai_first_name,
                'ai_last_name' => $res[0]->ai_last_name,
                'accounts_email' => $res[0]->accounts_email,
                'booking_nights' => $res[0]->booking_nights,
                'booking_checkin' => $newDate
            ];
        } else {
            $result = "";
        }
        return $result;
    }

    public function insertComboBooking($post_data){ 
        $this->load->model('admin/locations_model');
        $this->load->model('admin/special_offers_model');
        $this->load->model('admin/coupons_model');


        //payment 
        $checkout_type = $this->input->post('checkout-type');
        if ($checkout_type == 3) { //cod
            $paymethod = "cod";
            $payinfo = $this->input->post('txtAddress');
        } elseif ($checkout_type == 1) {  //bank
            $paymethod = "banktransfer";
            //$bank = $this->input->post('bank');
            $payinfo = $this->input->post('bank');
        } else {
            $paymethod = "payatoffice";
            $payinfo = "Địa chỉ: Lầu 1, Số 124 Khánh Hội, P.6, Quận 4, Tp. Hồ Chí Minh - Tel: 028 3826 8797 - Fax: (08) 3826 8798";
        }
        //end payment
        if($post_data['is_send']=='on'){
            $is_send =1;
        }else{
            $is_send =0;
        }
        $booking_payment_date ="" ;
        $date= trim($post_data['booking_payment_date']);
        $d = DateTime::createFromFormat('d/m/Y', $date);
        $booking_payment_date =  $d->getTimestamp();
         $app_settings = $this->settings_model->get_settings_data();
         $expiry = $app_settings [0]->booking_expiry * 86400;
        $userId = $this->insetCustomer($post_data) ;  //$this->session->userdata('pt_logged_customer');
        if(isset($post_data['combo_code'])){
            $refno = $post_data['combo_code'];
        }else{
            $refno = random_string('numeric', 7);
        }
        $coupon_code = "";
        if(isset($post_data['coupon_code'])){
            $coupon_code = $post_data['coupon_code'];
            $this->db->where('code', $coupon_code);
            $res = $this->db->get('pt_coupons')->result();
            $coupon_row = $res[0];//var_dump($coupon_row);
            //$this->updateCoupon('pt_coupons', $coupon_row->id);
        }
        //calculate total
       
        $combo_id = $post_data['combo_id'];
        $combo = $this->special_offers_model->get_combo_by_id( $combo_id);//var_dump($combo);
        $city = $this->locations_model->get_city_by_id($post_data['city_id']);
        $base_charge_total = $combo->offer_price * $post_data['basecharge_quantity'];
        $sub_total = $base_charge_total;
        if (isset($model['surChargeList'])) {
            foreach ($model['surChargeList'] as $key => $surcharge) {
                $sub_total += $surcharge['price'] * $surcharge['quantity'];
            }
        }

        $vat_charge = 0;
        $extra_total  = $post_data['booking_extras_fee'] * $post_data['booking_extras_quantity'];
        $pre_discount_total = $sub_total + $vat_charge + $extra_total;
        $booking_total = $pre_discount_total;
        $discount_value = 0;
        if(isset($post_data['coupon_code'])){
            if ($coupon_row->type == '%') {
                $discount_value = $coupon_row->value * $pre_discount_total / 100;
            } else {
                $discount_value = $coupon_row->value;
            }

            $booking_total = $pre_discount_total - $discount_value;
        }
        $booking_remaining =  $booking_total;
        $booking_amount_paid = 0;
        if (isset($post_data['booking_amount_paid'])) {
            $booking_amount_paid = $post_data['booking_amount_paid'];
            $booking_remaining = $booking_total - $booking_amount_paid ;
        }

        $surcharge_list = array() ;
        /*  echo "<pre>";
        print_r($post_data['surcharge_list']); echo "</pre>";*/
        foreach ($post_data['surcharge_list'] as $key => $value) {
            $thuphuId = $value['id'];
            $surcharge_list[$thuphuId] = $value['quantity'];
        }
        /*echo "<pre>";
        print_r($surcharge_list); echo "</pre>";die;*/
         $checkin= $post_data['checkin'] ;
        $checkin = databaseDate($checkin);
         $checkout= $post_data['checkout'] ;
        $checkout = databaseDate($checkout);
       // var_dump($post_data);die;
        $data = array(
            'is_send' => $is_send,
            'is_unknown_date' => $post_data['is_unknown_date'],
            'booking_ref_no' => $refno,
            'booking_type' =>  'combo' ,
            'booking_item' =>  $combo_id,
            'booking_subitem' => json_encode($surcharge_list),
            'booking_quantity' => $post_data['basecharge_quantity'],
            'booking_date' => time(),
            'booking_expiry' => time() + $expiry,
            'booking_user' => $userId,
            'booking_status' =>  $post_data['booking_status'],
            'booking_additional_notes' => $post_data['booking_additional_notes'],
            'booking_total' =>   $post_data['booking_total'],
            'booking_remaining' =>  $post_data['booking_remaining'],
            'booking_amount_paid' => $booking_amount_paid,
            'booking_checkin' => $checkin,
            'booking_checkout' => $checkout,
            'booking_nights' => $post_data['days'],
            'booking_child' => $post_data['booking_child'],
            'booking_adults' => $post_data['booking_adults'],
            'booking_extra_beds_request' => $post_data['booking_extra_beds_request'],
            'cancel_condition' => $post_data['cancel_condition'],
            'use_condition' => $post_data['use_condition'],
            'booking_payment_date' => $booking_payment_date,
            'booking_extras_fee' => $post_data['booking_extras_fee'],
            'booking_extras_quantity' => $post_data['booking_extras_quantity'],
            'note' => $post_data['note'],
            'booking_payment_type' => $paymethod,
            //'booking_payment_info' => $payinfo,
            //'nguoikhac' => $nguoikhac,
            //'sent_invoice' => $sent_invoice,
            'company' => $post_data['company'],
            'companyadd' => $post_data['companyadd'],
            'mst' =>  $post_data['mst'],
            //'companyadd' => $companyadd,
            //'guest' => $guest,
            'sentto' => $post_data['sentto'],
            'booking_deposit' => 0,
            'booking_tax' => 0,
            'booking_paymethod_tax' => 0,
            'booking_curr_code' => 'VND',
            'booking_curr_symbol' => 'vnd',
            'booking_coupon_rate' => 0,
            'booking_coupon' => $coupon_code,
            'booking_payment_info' => $payinfo, 
            //'booking_guest_info' => $passportInfo
        );
          /* echo "<pre>";
        print_r($data); echo "</pre>";*/
        $this->db->insert('pt_bookings', $data);
        $book_id = $this->db->insert_id();echo   $book_id ;
        $this->session->set_userdata("BOOKING_ID", $book_id);
        $this->session->set_userdata("REF_NO", $refno);

        //insert basecharge
         $rdata = array(
                'book_id' => $book_id,
                'type' => 0,
                'quantity' =>  $post_data['basecharge_quantity'],
                'name' => $combo->offer_title,  
                'price' =>$combo->offer_price,
                'offer_id' =>  $combo_id,
            );
        $this->db->insert('billing_charge', $rdata);

        //insert surcharge 
        $surcharge_info = $post_data['surcharge_list'];

        foreach ($surcharge_info as $key => $surcharge) {
            $rdata = array(
                'book_id' => $book_id,
                'type' => 1,
                'quantity' => $surcharge['quantity'],
                'name' => $surcharge['name'],
                'price' => $surcharge['price'],
                'offer_id' => $surcharge['id'],
            );

            $this->db->insert('billing_charge', $rdata);
        }
        return true;
    }

    public function editComboBooking($post_data){
        $this->load->model('admin/locations_model');
        $this->load->model('admin/special_offers_model');
        $this->load->model('admin/coupons_model');
       
        //payment 
        $checkout_type = $this->input->post('checkout-type');
        if ($checkout_type == 3) { //cod
            $paymethod = "cod";
            $payinfo = $this->input->post('txtAddress');
        } elseif ($checkout_type == 1) {  //bank
            $paymethod = "banktransfer";
            //$bank = $this->input->post('bank');
            $payinfo = $this->input->post('bank');
        } else {
            $paymethod = "payatoffice";
            $payinfo = "Địa chỉ: Lầu 1, Số 124 Khánh Hội, P.6, Quận 4, Tp. Hồ Chí Minh - Tel: 028 3826 8797 - Fax: (08) 3826 8798";
        }
        //end payment

        if($post_data['is_send']=='on'){
            $is_send =1;
        }else{
            $is_send =0;
        }
        $booking_payment_date = "";
        $date= trim($post_data['booking_payment_date']);
        $d = DateTime::createFromFormat('d/m/Y', $date);
        $booking_payment_date =  $d->getTimestamp();

        /*echo $booking_payment_date;
        die;*/
         $app_settings = $this->settings_model->get_settings_data();
         $expiry = $app_settings [0]->booking_expiry * 86400;

         //edit customer
         $this->editCustomer($post_data) ;  //$this->session->userdata('pt_logged_customer');

        $coupon_code = "";
        if(isset($post_data['coupon_code'])){
            $coupon_code = $post_data['coupon_code'];
            $this->db->where('code', $coupon_code);
            $res = $this->db->get('pt_coupons')->result();
            $coupon_row = $res[0];//var_dump($coupon_row);
            //$this->updateCoupon('pt_coupons', $coupon_row->id);
        }
        //calculate total
       
        $combo_id = $post_data['combo_id'];
        $combo = $this->special_offers_model->get_combo_by_id( $combo_id);//var_dump($combo);
        $city = $this->locations_model->get_city_by_id($post_data['city_id']);
        $base_charge_total = $combo->offer_price * $post_data['basecharge_quantity'];
        $sub_total = $base_charge_total;
        if (isset($model['surChargeList'])) {
            foreach ($model['surChargeList'] as $key => $surcharge) {
                $sub_total += $surcharge['price'] * $surcharge['quantity'];
            }
        }

        $vat_charge = 0;
        $extra_total  = $post_data['booking_extras_fee'] * $post_data['booking_extras_quantity'];
        $pre_discount_total = $sub_total + $vat_charge + $extra_total;
        $booking_total = $pre_discount_total;
        $discount_value = 0;
        if(isset($post_data['coupon_code'])){
            if ($coupon_row->type == '%') {
                $discount_value = $coupon_row->value * $pre_discount_total / 100;
            } else {
                $discount_value = $coupon_row->value;
            }

            $booking_total = $pre_discount_total - $discount_value;
        }
        $booking_remaining =  $booking_total;
        $booking_amount_paid = 0;
        if (isset($post_data['booking_amount_paid'])) {
            $booking_amount_paid = $post_data['booking_amount_paid'];
            $booking_remaining = $booking_total - $booking_amount_paid ;
        }

        $surcharge_list = array() ;
        /*  echo "<pre>";
        print_r($post_data['surcharge_list']); echo "</pre>";*/
        foreach ($post_data['surcharge_list'] as $key => $value) {
            $thuphuId = $value['id'];
            $surcharge_list[$thuphuId] = $value['quantity'];
        }
        /*echo "<pre>";
        print_r($surcharge_list); echo "</pre>";die;*/
      //  echo $post_data['checkin'] ;
        $checkin= $post_data['checkin'] ;
        $checkin = databaseDate($checkin);
        $checkout= $post_data['checkout'] ;
        $checkout = databaseDate($checkout);
/*echo $checkin;
die;*/
        $data = array(
            'is_send' => $is_send,
            'is_unknown_date' => $post_data['is_unknown_date'],
            'booking_type' =>  'combo' ,
            'booking_item' =>  $combo_id,
            'booking_subitem' => json_encode($surcharge_list),
            'booking_quantity' => $post_data['basecharge_quantity'],
            'booking_date' => time(),
            'booking_expiry' => time() + $expiry,
            'booking_status' =>  $post_data['booking_status'],
            'booking_additional_notes' => $post_data['booking_additional_notes'],
            'booking_total' =>   $post_data['booking_total'],
            'booking_remaining' =>  $post_data['booking_remaining'],
            'booking_amount_paid' => $booking_amount_paid,
            'booking_checkin' => $checkin,
            'booking_checkout' => $checkout,
            'booking_nights' => $post_data['days'],
            //'booking_payment_type' => $paymethod,
            //'booking_payment_info' => $payinfo,
            //'nguoikhac' => $nguoikhac,
            //'sent_invoice' => $sent_invoice,
            //'company' => $company,
            //'mst' => $mst,
            //'companyadd' => $companyadd,
            //'guest' => $guest,
            //'sentto' => $sentto,
            'booking_payment_type' => $paymethod,
            'company' => $post_data['company'],
            'mst' =>  $post_data['mst'],
            'sentto' => $post_data['sentto'],
            'booking_payment_info' => $payinfo, 

            'companyadd' => $post_data['companyadd'],

            'note' => $post_data['note'],
            'cancel_condition' => $post_data['cancel_condition'],
            'use_condition' => $post_data['use_condition'],
            'booking_payment_date' => $booking_payment_date,
            'booking_extras_fee' => $post_data['booking_extras_fee'],
            'booking_extras_quantity' => $post_data['booking_extras_quantity'],
            'booking_child' => $post_data['booking_child'],
            'booking_adults' => $post_data['booking_adults'],
            'booking_extra_beds_request' => $post_data['booking_extra_beds_request'],
            'booking_deposit' => 0,
            'booking_tax' => 0,
            'booking_paymethod_tax' => 0,
            'booking_curr_code' => 'VND',
            'booking_curr_symbol' => 'vnd',
            'booking_coupon_rate' => 0,
            'booking_coupon' => $coupon_code,
            //'booking_guest_info' => $passportInfo
        );
       // echo $timestamp = strptime($post_data['booking_payment_date'],'d/m/Y');
        //die;
       /* echo "<pre>";
        print_r($data); echo "</pre>";die;*/
        $book_id = $post_data['booking_id'];
        $this->db->where('booking_id', $book_id);
        $this->db->update('pt_bookings', $data);
       
        //delete all charge 
        $this->db->where('book_id', $book_id);
        $this->db->delete('billing_charge');

        //insert basecharge
         $rdata = array(
                'book_id' => $book_id,
                'type' => 0,
                'quantity' =>  $post_data['basecharge_quantity'],
                'name' => $combo->offer_title,  
                'price' =>$combo->offer_price,
                'offer_id' =>  $combo_id,
            );
        $this->db->insert('billing_charge', $rdata);

        //insert surcharge 
        $surcharge_info = $post_data['surcharge_list'];

        foreach ($surcharge_info as $key => $surcharge) {
            $rdata = array(
                'book_id' => $book_id,
                'type' => 1,
                'quantity' => $surcharge['quantity'],
                'name' => $surcharge['name'],
                'price' => $surcharge['price'],
                'offer_id' => $surcharge['id'],
            );

            $this->db->insert('billing_charge', $rdata);
        }
        return true;
    }

    

    private function insetCustomer($post_data){
        $now = date('Y-m-d H:i:s');
        $insertdata = array('accounts_email' => $post_data['customer_email'], 
             'ai_first_name' => '',
              'ai_last_name' =>  $post_data['customer_name'],
              'ai_address_1' =>  $post_data['customer_address'],
              'ai_mobile' =>  $post_data['customer_phone'],
              'accounts_type' => 'customers',
               'accounts_status' => 'yes',
              'accounts_verified' => '1',
                'accounts_created_at' => $now, 
               'accounts_updated_at' => $now,
              );
        $this->db->insert('pt_accounts', $insertdata);
        $cusomter_id = $this->db->insert_id();
        return  $cusomter_id;
    }

    private function editCustomer($post_data){
        $now = date('Y-m-d H:i:s');
        $updateData = array('accounts_email' => $post_data['customer_email'], 
                          'ai_last_name' =>  $post_data['customer_name'],
                          'ai_address_1' =>  $post_data['customer_address'],
                          'ai_mobile' =>  $post_data['customer_phone'],
                          'accounts_updated_at' => $now,
              );
        $this->db->where('accounts_id', $post_data['customer_id']);
        $this->db->update('pt_accounts', $updateData);
        return true;
    }


     public function insertHotelBooking($post_data){
       $this->load->model('admin/coupons_model');
     
        $date= trim($post_data['booking_payment_date']);//echo $post_data['booking_payment_date'];die;
        $d = DateTime::createFromFormat('d/m/Y', $date);

        $booking_payment_date =  $d->getTimestamp();//echo $booking_payment_date ;die;
        //payment 
        $checkout_type = $this->input->post('checkout-type');
        if ($checkout_type == 3) { //cod
            $paymethod = "cod";
            $payinfo = $this->input->post('txtAddress');
        } elseif ($checkout_type == 1) {  //bank
            $paymethod = "banktransfer";
          //$bank = $this->input->post('bank');
            $payinfo = $this->input->post('bank');
        } else {
            $paymethod = "payatoffice";
            $payinfo = "Địa chỉ: Lầu 1, Số 124 Khánh Hội, P.6, Quận 4, Tp. Hồ Chí Minh - Tel: 028 3826 8797 - Fax: (08) 3826 8798";
        }
        //end payment
        if($post_data['is_send']!=1){
            $is_send =0;
        }else{
            $is_send =1;
        }

        if($post_data['is_other_company']!=1){
            $is_other_company = 0;
        }else{
            $is_other_company = 1;
        }//echo 5;die;

        $checkin= $post_data['checkin'] ;
        $checkout = $post_data['checkout'] ;
        $checkin = databaseDate($checkin);
        $checkout = databaseDate($checkout);
         $app_settings = $this->settings_model->get_settings_data();
         $expiry = $app_settings [0]->booking_expiry * 86400;
        $userId = $this->insetCustomer($post_data) ; 
        if(isset($post_data['hotel_code'])){
            $refno = $post_data['hotel_code'];
        }else{
            $refno = random_string('numeric', 7);
        }
        $coupon_code = "";
        if(isset($post_data['coupon_code'])){
            $coupon_code = $post_data['coupon_code'];
            $this->db->where('code', $coupon_code);
            $res = $this->db->get('pt_coupons')->result();
            $coupon_row = $res[0];
            //$this->updateCoupon('pt_coupons', $coupon_row->id);
        }
        //calculate total
       
        $hotel_id = $post_data['hotel_id'];
        $booking_status=  $post_data['booking_status'];
        $coupon_code= $post_data['coupon_code'];
        $pre_discount_total= $post_data['preDiscountTotal'];
        $discount_value= $post_data['discountValue'];
        $booking_total= $post_data['booking_total'];
        $booking_amount_paid= $post_data['booking_amount_paid'];
        $booking_remaining= $post_data['booking_remaining'];

        //var_dump($post_data['room_list']);
        $rooms_id_array = array();
        foreach ($post_data['room_list'] as $key => $room) {
            $rooms_id_array[] =  $room['room_id'];
        }
        //var_dump($rooms_id_array );die;

        $data = array(
            'is_send' => $is_send,
            'booking_ref_no' => $refno,
            'booking_type' =>  'hotels' ,
            'booking_item' =>  $hotel_id,
            'booking_subitem' => json_encode($rooms_id_array),
            'booking_quantity' => '',
            'booking_date' => time(),
            'booking_expiry' => time() + $expiry,
            'booking_user' => $userId,
            'booking_status' =>  $booking_status,
            'booking_additional_notes' => $post_data['booking_additional_notes'],
            'booking_total' =>   $post_data['booking_total'],
            'booking_remaining' =>  $post_data['booking_remaining'],
            'booking_amount_paid' => $booking_amount_paid,
            
            'booking_child' => $post_data['booking_child'],
            'booking_adults' => $post_data['booking_adults'],
            'booking_extra_beds_request' => $post_data['booking_extra_beds_request'],
           'booking_checkin' => $checkin,
            'booking_checkout' => $checkout,
           // 'booking_nights' => $this->input->post('nights'),
            //'booking_payment_type' => $paymethod,
            //'booking_payment_info' => $payinfo,
            //'nguoikhac' => $nguoikhac,
            //'sent_invoice' => $sent_invoice,
            //'company' => $company,
            //'mst' => $mst,
            //'companyadd' => $companyadd,
            //'guest' => $guest,
            //'sentto' => $sentto,
             'booking_payment_type' => $paymethod,
            'company' => $post_data['company'],
            'companyadd' => $post_data['companyadd'],
            'mst' =>  $post_data['mst'],
            'sentto' => $post_data['sentto'],
            'booking_payment_info' => $payinfo, 

            'note' => $post_data['note'],
            'booking_payment_date' => $booking_payment_date,
            'cancel_condition' => $post_data['cancel_condition'],
            'booking_extras_fee' => $post_data['booking_extras_fee'],
            'booking_extras_quantity' => $post_data['booking_extras_quantity'],
            'booking_deposit' => 0,
            'booking_tax' => 0,
            'booking_paymethod_tax' => 0,
            'booking_curr_code' => 'VND',
            'booking_curr_symbol' => 'vnd',
            'booking_coupon_rate' => 0,
            'booking_coupon' => $coupon_code,
            //'booking_guest_info' => $passportInfo
            'is_other_company' => $is_other_company,
        );
          
         $this->db->insert('pt_bookings', $data);
        $book_id = $this->db->insert_id();echo   $book_id ;
        $this->session->set_userdata("BOOKING_ID", $book_id);
        $this->session->set_userdata("REF_NO", $refno);
        //insert surcharge 

        foreach ($post_data['room_list'] as $k =>$room) {
            $rdata = array(
                'booked_booking_id' => $book_id,
                'booked_room_id' =>  $room['room_id'] ,
                'booked_room_count' => $room['room_total'],
                'booked_extra_bed' => $room['extra_bed'],
                'booked_checkin' => $checkin,
                'booked_checkout' => $checkout,
                'booked_booking_status' => $booking_status
            );
           /* echo  "<pre>";
        print_r($rdata); 
        echo "</pre>";*/
            $this->db->insert('pt_booked_rooms', $rdata);
        }
        return true;
    }


    function getBookById($id)
    {
        $sql = 'select * from pt_bookings where booking_id =' . $id;
        $query = $this->db->query($sql);
        $rs = $query->result();
        return $rs[0];
    }

    function getCustomerById($id)
    {
        $sql = 'select * from pt_accounts where accounts_id =' . $id;
        $query = $this->db->query($sql);
        $rs = $query->result();
        return $rs[0];
    }

     public function editHotelBooking($post_data){
        $this->load->model('admin/locations_model');
        $this->load->model('admin/special_offers_model');
        $this->load->model('admin/coupons_model');
      
        $checkout_type = $this->input->post('checkout-type');
        if ($checkout_type == 3) { //cod
            $paymethod = "cod";
            $payinfo = $this->input->post('txtAddress');
        } elseif ($checkout_type == 1) {  //bank
            $paymethod = "banktransfer";
           //$bank = $this->input->post('bank');
            $payinfo = $this->input->post('bank');
        } else {
            $paymethod = "payatoffice";
            $payinfo = "Địa chỉ: Lầu 1, Số 124 Khánh Hội, P.6, Quận 4, Tp. Hồ Chí Minh - Tel: 028 3826 8797 - Fax: (08) 3826 8798";
        }
       /* echo "<pre>";
        print_r($post_data); echo "</pre>";die;*/
        if($post_data['is_send']!=1){
            $is_send =0;
        }else{
            $is_send =1;
        }

        if($post_data['is_other_company']!=1){
            $is_other_company = 0;
        }else{
            $is_other_company = 1;
        }

        $booking_payment_date = "";
        $date= trim($post_data['booking_payment_date']);
        $d = DateTime::createFromFormat('d/m/Y', $date);
        $booking_payment_date =  $d->getTimestamp();
          $checkin= $post_data['checkin'] ;
        $checkout = $post_data['checkout'] ;
        $checkin = databaseDate($checkin);
        $checkout = databaseDate($checkout);
         $app_settings = $this->settings_model->get_settings_data();
         $expiry = $app_settings [0]->booking_expiry * 86400;
        $coupon_code = "";
        if(isset($post_data['coupon_code'])){
            $coupon_code = $post_data['coupon_code'];
            $this->db->where('code', $coupon_code);
            $res = $this->db->get('pt_coupons')->result();
            $coupon_row = $res[0];
            //$this->updateCoupon('pt_coupons', $coupon_row->id);
        }
        //calculate total
        $this->editCustomer($post_data) ;  
    
        $hotel_id = $post_data['hotel_id'];
        $booking_status=  $post_data['booking_status'];
        $coupon_code= $post_data['coupon_code'];
        $pre_discount_total= $post_data['preDiscountTotal'];
        $discount_value= $post_data['discountValue'];
        $booking_total= $post_data['booking_total'];
        $booking_amount_paid= $post_data['booking_amount_paid'];
        $booking_remaining= $post_data['booking_remaining'];

        //var_dump($post_data['room_list']);
        $rooms_id_array = array();
        foreach ($post_data['room_list'] as $key => $room) {
            $rooms_id_array[] =  $room['room_id'];
        }
        //var_dump($rooms_id_array );die;

        $data = array(
            'is_send' => $is_send ,
            'booking_type' =>  'hotels' ,
            'booking_item' =>  $hotel_id,
            'booking_subitem' => json_encode($rooms_id_array),
            'booking_quantity' => '',
            'booking_date' => time(),
            'booking_expiry' => time() + $expiry,
            'booking_status' =>  $booking_status,
            'booking_additional_notes' => $post_data['booking_additional_notes'],
            'booking_total' =>   $post_data['booking_total'],
            'booking_remaining' =>  $post_data['booking_remaining'],
            'booking_amount_paid' => $booking_amount_paid,
            'cancel_condition' => $post_data['cancel_condition'],
            'booking_child' => $post_data['booking_child'],
            'booking_adults' => $post_data['booking_adults'],
            'booking_extra_beds_request' => $post_data['booking_extra_beds_request'],
            'booking_checkin' => $checkin,
            'booking_checkout' => $checkout,
            'booking_deposit' => 0,
            'booking_tax' => 0,
            'booking_paymethod_tax' => 0,
            'booking_curr_code' => 'VND',
            'booking_curr_symbol' => 'vnd',
            'booking_coupon_rate' => 0,
            'booking_coupon' => $coupon_code,
            'booking_payment_date' => $booking_payment_date,
             'booking_extras_fee' => $post_data['booking_extras_fee'],
            'booking_extras_quantity' => $post_data['booking_extras_quantity'],
              'note' => $post_data['note'],

             'booking_payment_type' => $paymethod,
            'company' => $post_data['company'],
            'companyadd' => $post_data['companyadd'],
            'mst' =>  $post_data['mst'],
            'sentto' => $post_data['sentto'],
            'booking_payment_info' => $payinfo, 
            'is_other_company' => $is_other_company,

        );
          
       /* echo "<pre>";
        print_r($data); echo "</pre>";die;*/
        $book_id = $post_data['booking_id'];
        $this->db->where('booking_id', $book_id);
        $this->db->update('pt_bookings', $data);
       
        //delete all charge 
        $this->db->where('booked_booking_id', $book_id);
        $this->db->delete('pt_booked_rooms');

        //insert pt_booked_rooms
        foreach ($post_data['room_list'] as $k =>$room) {
            $rdata = array(
                'booked_booking_id' => $book_id,
                'booked_room_id' =>  $room['room_id'] ,
                'booked_room_count' => $room['room_total'],
                'booked_extra_bed' => $room['extra_bed'],
                'booked_checkin' => $checkin,
                'booked_checkout' => $checkout,
                'booked_booking_status' => $booking_status
            );
            $this->db->insert('pt_booked_rooms', $rdata);
        }    
        return true;
    }

}
