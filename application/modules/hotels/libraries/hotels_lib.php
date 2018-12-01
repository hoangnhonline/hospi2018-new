<?php

class Hotels_lib
{
    /**
     * Protected variables
     */
    protected $ci = NULL; //codeigniter instance
    protected $db; //database instatnce instance
    public $hotelid;
    public $mapAddress;
    public $address;
    public $appSettings;
    public $tripadvisorid;
    public $title;
    public $slug;
    public $bookingSlug;
    public $stars;
    public $basicprice;
    public $discountprice;
    public $desc;
    public $location;
    public $country;
    public $policy;
    public $surcharge;
    public $roomid;
    public $roomtitle;
    public $roomdesc;
    public $roomprice;
    public $roompernight;
    public $thumbnail;
    public $isspecial;
    public $currencysign;
    public $currencycode;
    public $isfeatured;
    public $trusted;
    public $bestprice;
    public $refundable;
    public $arrivalpay;
    public $comm_type;
    public $comm_value;
    public $tax_type;
    public $tax_value;
    public $service_type;
    public $service_value;
    public $deposit = 0;
    public $taxamount = 0;
    public $serviceamount = 0;
    public $bookingtotal = 0;
    public $phone;
    public $email;
    public $taxvalue;
    public $servicevalue;
    public $website;
    public $checkin;
    public $checkout;
    public $defcheckin;
    public $defcheckout;
    public $adults;
    public $children;
    public $stay = 1;
    public $roomscount = 1;
    public $stayerror = "";
    public $roomscounterror = "";
    public $checkinout = "";
    public $langdef;
    public $lowestprice;
    public $roomsavailable = false;
    public $amenities;
    public $paymentOptions;
    public $sliderImages;
    public $latitude;
    public $logitude;
    public $relatedHotels;
    public $selectedLocation;
    public $keywords;
    public $metadesc;
    protected $lang;
    public $price;
    public $honeymoon;
    public $room_id;

    function __construct()
    {
       // echo base_url(uri_string());
        //get the CI instance
        $this->ci =& get_instance();
        $this->db = $this->ci->db;
        $this->appSettings = $this->ci->settings_model->get_settings_data();
        $this->ci->load->model('hotels/hotels_model');
        $this->currencysign = $this->appSettings[0]->currency_sign;
        $this->currencycode = $this->appSettings[0]->currency_code;
        $this->checkin = $this->ci->input->get('checkin');
        $this->checkout = $this->ci->input->get('checkout');
        $loc = $this->ci->input->get('searching');

        $this->children = 0;
        $adultss = $this->ci->input->get('adults');
        if (empty($adultss)) {
            $this->adults = 1;
        } else {
            $this->adults = $this->ci->input->get('adults');
        }
        $childd = $this->ci->input->get('child');
        if (empty($childd)) {
            $this->children = 0;
        } else {
            $this->children = $this->ci->input->get('child');
        }
        $rcc = $this->ci->input->get('roomscount');
        if (empty($rcc)) {
            $this->roomscount = 1;
        } else {
            $this->roomscount = $this->ci->input->get('roomscount');
        }

        $this->stay = pt_count_days($this->checkin, $this->checkout);
        if (empty($this->checkin) || empty($this->checkout)) {
            $this->stay = 1;
            $this->checkin = date($this->appSettings[0]->date_f, strtotime('+' . CHECKIN_SPAN . ' day', time()));
            $this->checkout = date($this->appSettings[0]->date_f, strtotime('+' . CHECKOUT_SPAN . ' day', time()));
        }
        $unixcheckin = convert_to_unix($this->checkin);
        $unixcheckout = convert_to_unix($this->checkout);
        $current = strtotime(date('m/d/Y'));

        if (empty($this->checkin) || empty($this->checkout)) {
            //    $this->showprice = false;
        } elseif ($unixcheckin < $current || $unixcheckout < $current || $unixcheckin > $unixcheckout) {
            $this->stayerror = "1";
        } else {
            $getVariables = $this->ci->input->get();
            if (!empty($getVariables)) {
                $this->checkinout = "?&checkin=" . $this->checkin . "&checkout=" . $this->checkout . "&adults=" . $this->adults . "&child=" . $this->children;
            }
        }
   
        if (!empty($loc)) {

            $this->selectedLocation = $loc;

        } else {

            $this->selectedLocation = "";
        }
        if (!empty($loc)) {

            $this->selectedLocation = $loc;

        } else {

            $this->selectedLocation = "";
        }

        $this->set_lang($this->ci->session->userdata('set_lang'));
        $this->langdef = DEFLANG;

    }

    function set_hotelid($hotelslug)
    {
        $this->db->select('hotel_id');
        $this->db->where('hotel_slug', $hotelslug);
        $r = $this->db->get('pt_hotels')->result();
        $this->hotelid = $r[0]->hotel_id;

    }

    function set_lang($lang)
    {
        if (empty($lang)) {
            $defaultlang = pt_get_default_language();
            $this->lang = $defaultlang;
        } else {
            $this->lang = $lang;
        }
    }

    //set hotel id by id
    function set_id($id)
    {
        $this->hotelid = $id;

    }


    function get_id()
    {
        return $this->hotelid;
    }

    function settings()
    {
        return $this->ci->settings_model->get_front_settings('hotels');
    }

    function wishListInfo($id)
    {
        $this->db->select('hotel_title,hotel_slug,thumbnail_image,hotel_city,hotel_stars');
        $this->db->where('hotel_id', $id);
        $result = $this->db->get('pt_hotels')->result();
        $title = $this->get_title($result[0]->hotel_title);
        $slug = "hotels/" . $result[0]->hotel_slug;
        $thumbnail = PT_HOTELS_SLIDER_THUMBS . $result[0]->thumbnail_image;

        $location = pt_LocationsInfo($result[0]->hotel_city, $this->lang);

        $stars = pt_create_stars($result[0]->hotel_stars);
        $res = array(
            "title" => $title,
            "slug" => $slug,
            "thumbnail" => $thumbnail,
            "location" => $location->city,
            "stars" => $stars

        );
        return $res;

    }

    function show_hotels($offset = null)
    {
        $this->ci->load->library('bootpagination');
        $data = array();
        $settings = $this->settings();
        $sortby = $this->ci->input->get('sortby');
        $perpage = $settings[0]->front_listings;
        if (!empty($sortby)) {
            $orderby = $sortby;
        } else {
            $orderby = $settings[0]->front_listings_order;
        }
        // $hotelslist = $this->hotelswithrooms();
        $rh = $this->ci->hotels_model->list_hotels_front();
        //    $data['all_hotels'] = $this->ci->hotels_model->list_hotels_front($perpage, $offset, $orderby);
        $hotels = $this->ci->hotels_model->list_hotels_front($perpage, $offset, $orderby);

        $tmp = $this->getResultObject($hotels['all']);

        $data['all_hotels'] = $tmp['result'];
        $data['paginationinfo'] = array(
            'base' => 'hotels/listing',
            'totalrows' => $rh['rows'],
            'perpage' => $perpage
        );

        $data['plinks2'] = $this->ci->bootpagination->dopagination2('hotels/listing', $rh['rows'], $perpage);
        return $data;
    }

    function show_honeymoons($offset = null, $honeymoon = null)
    {
        $this->ci->load->library('bootpagination');
        $data = array();
        $settings = $this->settings();
        $sortby = $this->ci->input->get('sortby');
        $perpage = $settings[0]->front_listings;
        if (!empty($sortby)) {
            $orderby = $sortby;
        } else {
            $orderby = $settings[0]->front_listings_order;
        }
        // $hotelslist = $this->hotelswithrooms();
        $rh = $this->ci->hotels_model->list_honeymoons_front();
        //    $data['all_hotels'] = $this->ci->hotels_model->list_hotels_front($perpage, $offset, $orderby);
        $hotels = $this->ci->hotels_model->list_honeymoons_front($perpage, $offset, $orderby);
        $data['all_hotels'] = $this->getHoneyObject($hotels['all']);

        //$data['room_id'] = $this->getResultObject($hotels['room_id']);
        $data['paginationinfo'] = array(
            'base' => 'hotels/honeymoonlisting',
            'totalrows' => $rh['rows'],
            'perpage' => $perpage
        );

        $data['plinks2'] = $this->ci->bootpagination->dopagination2('hotels/listing', $rh['rows'], $perpage);
        return $data;
    }


    function showHotelsByLocation($locs, $offset = null)
    {
        $this->ci->load->library('bootpagination');
        $data = array();
        $settings = $this->settings();
        $sortby = $this->ci->input->get('sortby');
        $perpage = $settings[0]->front_listings;
        if (!empty($sortby)) {
            $orderby = $sortby;
        } else {
            $orderby = $settings[0]->front_listings_order;
        }
        // $hotelslist = $this->hotelswithrooms();
        $rh = $this->ci->hotels_model->listHotelsByLocation($locs);
        //    $data['all_hotels'] = $this->ci->hotels_model->list_hotels_front($perpage, $offset, $orderby);
        $hotels = $this->ci->hotels_model->listHotelsByLocation($locs, $perpage, $offset, $orderby);
        $tmp = $this->getResultObject($hotels['all']);
        $data['all_hotels'] = $tmp['result'];
        $data['paginationinfo'] = array(
            'base' => 'hotels/' . $locs->urlBase,
            'totalrows' => $rh['rows'],
            'perpage' => $perpage,
            'urisegment' => $locs->uriSegment
        );

        return $data;
    }

    function search_hotels($page = null, $honeymoon = null)
    {

        $this->ci->load->library('bootpagination');
        $data = array();
        $settings = $this->settings();
        $sortby = $this->ci->input->get('sortby');
        $perpage = $settings[0]->front_search;
        if (!empty($sortby)) {
            $orderby = $sortby;
        } else {
            $orderby = $settings[0]->front_search_order;
        }
        // $hotelslist = $this->hotelswithrooms();

        $rh = $this->ci->hotels_model->search_hotels_front('', '', '', '', '', '');
        $hotels = $this->ci->hotels_model->search_hotels_front($perpage, $page, $orderby);
        $tmp = $this->getResultObject($hotels['all'], null, $orderby);
        $data['all'] = $tmp['result'];
        $resultSort = $tmp['resultSort'];

        if ($honeymoon != null) {
            $data['all'] = $this->getHoneyObject($hotels['all']);
        }
        /*if($honeymoon=="yes") {
        $data['paginationinfo'] = array('base' => 'hotels/honeylist/search', 'totalrows' => $rh['rows'], 'perpage' => $perpage,'urisegment' => 3);
        
        $data['plinks'] = $this->ci->bootpagination->dopagination('hotels/honeylist/search', $hotels['rows'], $perpage);
        } else {*/
        $data['paginationinfo'] = array(
            'base' => 'hotels/search',
            'totalrows' => $rh['rows'],
            'perpage' => $perpage,
            'urisegment' => 3
        );
        //}
        $data['resultSort'] = $resultSort;
        return $data;
    }

    function search_hotels_by_text($cityid, $page = null, $checkin = null, $checkout = null, $honeymoon = null)
    {
        $this->ci->load->library('bootpagination');
        $data = array();
        $settings = $this->settings();
        $sortby = $this->ci->input->get('sortby');
        $perpage = $settings[0]->front_search;
        if (!empty($sortby)) {
            $orderby = $sortby;
        } else {
            $orderby = $settings[0]->front_search_order;
        }
        
        // $hotelslist = $this->hotelswithrooms();
        $rh = $this->ci->hotels_model->search_hotels_by_text($cityid);
        $hotels = $this->ci->hotels_model->search_hotels_by_text($cityid, $perpage, $page, $orderby, '', '', $checkin, $checkout);
        
        $tmp = $this->getResultObject($hotels['all'], null, $orderby, $checkin, $checkout);

        $resultSort = $tmp['resultSort'];
        $data['all'] = $tmp['result'];

        if ($honeymoon != null) {
            $data['all'] = $this->getHoneyObject($hotels['all']);
        }
        $segments = '/' . $this->ci->uri->segment(3) . '/' . $this->ci->uri->segment(4) . '/' . $this->ci->uri->segment(5);

        /*if($honeymoon=="yes") {
        $data['paginationinfo'] = array('base' => 'hotels/honeylist/search'.$segments, 'totalrows' => $rh['rows'], 'perpage' => $perpage, 'urisegment' => 6);
        $data['plinks'] = $this->ci->bootpagination->dopagination('hotels/honeylist/search', $rh['rows'], $perpage);
        } else {*/
        $data['paginationinfo'] = array(
            'base' => 'hotels/search' . $segments,
            'totalrows' => $rh['rows'],
            'perpage' => $perpage,
            'urisegment' => 6
        );
        $data['resultSort'] = $resultSort;
        //}
        return $data;
    }

    // get hotel images
    function hotelImages($hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        $this->db->where('himg_hotel_id', $hotelid);
        $this->db->where('himg_approved', '1');
        $this->db->order_by('himg_order', 'asc');
        $res = $this->db->get('pt_hotel_images')->result();
        if (empty($res)) {

            $result[] = array(
                "fullImage" => PT_HOTELS_SLIDER_THUMBS . PT_BLANK_IMG,
                "thumbImage" => PT_HOTELS_SLIDER_THUMBS . PT_BLANK_IMG
            );

        } else {

            foreach ($res as $r) {
                $result[] = array(
                    "fullImage" => PT_HOTELS_SLIDER . $r->himg_image,
                    "thumbImage" => PT_HOTELS_SLIDER_THUMBS . $r->himg_image
                );
            }

        }

        return $result;
    }

    // get hotel rooms
    function hotel_rooms($hotelid = null, $checkin = null, $checkout = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        $this->db->select('room_id as id');
        $this->db->where('room_hotel', $hotelid);
        $this->db->where('room_status', 'Yes');
        //$this->db->where('room_min_stay <=', $this->stay);
        $this->db->order_by('room_order', 'asc');
        $q = $this->db->get('pt_rooms');
        $data = $q->result();
        return $this->getRoomsResultObject($data, $checkin, $checkout);

    }

    function totalRooms($hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        $this->db->select('room_id');
        $this->db->where('room_hotel', $hotelid);
        $this->db->where('room_status', 'Yes');
        return $this->db->get('pt_rooms')->num_rows();

    }

    // get Room images
    function roomImages($id, $count = null)
    {
        $result = array();
        $this->db->where('rimg_room_id', $id);
        $this->db->where('rimg_approved', '1');
        $this->db->order_by('rimg_order', 'asc');
        if (!empty($count)) {
            $this->db->limit($count);
        }
        $res = $this->db->get('pt_room_images')->result();
        if (!empty($res)) {
            foreach ($res as $r) {
                $result[] = array(
                    "fullImage" => PT_ROOMS_IMAGES . $r->rimg_image,
                    "thumbImage" => PT_ROOMS_THUMBS . $r->rimg_image
                );
            }
        }
        return $result;
    }

    // get hotel rooms with limited details
    function rooms_id_title_only($hotelid = null)
    {
        $this->db->select('pt_rooms.room_id,pt_rooms.room_title,room_quantity,room_adults,room_children,room_min_stay');
        if (empty($hotelid)) {
            $this->db->where('pt_rooms.room_hotel', $this->hotelid);
        } else {
            $this->db->where('pt_rooms.room_hotel', $hotelid);
        }

        $this->db->where('pt_rooms.room_status', 'Yes');
        $this->db->order_by('pt_rooms.room_order', 'asc');
        $q = $this->db->get('pt_rooms');
        $data = $q->result();
        return $data;
    }

    // Room Price
    function room_price($roomid, $currsign = null, $currcode = null)
    {
        $this->ci->load->helper('check');
        $price = array();

        $this->roomid = $roomid;
        $advprice = room_booking_adv_price($roomid, $this->checkin, $this->checkout);
        $mulcur = "";

        $taxval = $this->tax_value;
        $taxtype = $this->tax_type;

        $commtype = $this->comm_type;
        $commval = $this->comm_value;

        $servicetype = $this->service_type;
        $serviceval = $this->service_value;

        if (empty($mulcur)) {

            $this->roompernight = $advprice;
            $this->roomprice = $advprice * $this->stay * $this->roomscount;

        } else {
            $mbasic = $this->ci->hotels_model->convert_price($advprice);
            $this->roompernight = $mbasic['price'];
            $this->roomprice = $mbasic['price'] * $this->stay * $this->roomscount;
            $this->currencycode = $mbasic['code'];
            $this->currencysign = $mbasic['sign'];
        }


        if ($this->tax_type == "fixed") {
            $this->taxamount = $this->tax_value;

        } else {

            $this->taxamount = ($this->roomprice * $this->tax_value) / 100;
        }

        if ($this->service_type == "fixed") {
            $this->serviceamount = $this->service_value;
        } else {

            $this->serviceamount = ($this->roomprice * $this->service_value) / 100;
        }

        $this->bookingtotal = $this->roomprice + $this->taxamount + $this->serviceamount;

        $this->setDeposit($this->bookingtotal);


    }

    function hotel_details($hotelid = null)
    {
        if ($hotelid != null) {
            $this->db->where('hotel_id', $hotelid);
        } else
            $this->db->where('hotel_id', $this->hotelid);
        $details = $this->db->get('pt_hotels')->result();
        $tripadvisorid = $details[0]->tripadvisor_id;
        $hotelsurcharge = $details[0]->hotel_surcharge; 
        $hotel_policy = $details[0]->hotel_policy; 
        $title = $this->get_title($details[0]->hotel_title, $details[0]->hotel_id);
        $stars = $details[0]->hotel_stars;
        $near = $details[0]->near;
        $desc = $this->get_description($details[0]->hotel_desc, $details[0]->hotel_id);
        $policy = $this->get_policy($details[0]->hotel_policy, $details[0]->hotel_id);
        $surcharge = $details[0]->hotel_surcharge;
        $keywords = $this->get_keywords($details[0]->hotel_meta_keywords, $details[0]->hotel_id);
        $metadesc = $this->get_metaDesc($details[0]->hotel_meta_desc, $details[0]->hotel_id);

        $locationInfoUrl = pt_LocationsInfo($details[0]->hotel_city);

        $countryName = url_title($locationInfoUrl->country, 'dash', true);
        $cityName = url_title($locationInfoUrl->city, 'dash', true);

        $slug = $countryName . '/' . $cityName . '/' . $details[0]->hotel_slug . $this->checkinout;
        $bookingSlug = $details[0]->hotel_slug . $this->checkinout;


        if (!empty($details[0]->hotel_amenities)) {

            $hotelAmenities = explode(",", $details[0]->hotel_amenities);
            foreach ($hotelAmenities as $hm) {
                $amts[] = $this->amenitiesTranslation($hm);
            }

        } else {
            $amts = array();
        }


        $amenities = $amts;

        if (!empty($details[0]->hotel_payment_opt)) {
            $hotelPaymentOpts = explode(",", $details[0]->hotel_payment_opt);
            foreach ($hotelPaymentOpts as $p) {
                $payopts[] = $this->amenitiesTranslation($p);
            }
        } else {
            $payopts = array();
        }

        $paymentOptions = $payopts;
        if (!empty($details[0]->hotel_related)) {
            $rhotels = explode(",", $details[0]->hotel_related);
        } else {
            $rhotels = "";
        }

        $relatedHotels = $this->getRelatedHotels($rhotels);

        $thumbnail = PT_HOTELS_SLIDER_THUMBS . $details[0]->thumbnail_image;
        $city = pt_LocationsInfo($details[0]->hotel_city, $this->lang);
        //    $this->isfeatured = $this->is_featured();
        $website = $details[0]->hotel_website;
        $phone = $details[0]->hotel_phone;
        $email = $details[0]->hotel_email;
        $taxcom = $this->hotel_tax_commision();
        $comm_type = $taxcom['commtype'];
        $comm_value = $taxcom['commval'];
        $tax_type = $taxcom['taxtype'];
        $tax_value = $taxcom['taxval'];
        $service_type = $taxcom['servicetype'];
        $service_value = $taxcom['serviceval'];
        $latitude = $details[0]->hotel_latitude;
        $longitude = $details[0]->hotel_longitude;

        $defcheckin = $details[0]->hotel_check_in;
        $defcheckout = $details[0]->hotel_check_out;

        $taxvalue = $details[0]->hotel_tax_fixed ? $details[0]->hotel_tax_fixed : $details[0]->hotel_tax_percentage;
        $servicevalue = $details[0]->hotel_service_fixed ? $details[0]->hotel_service_fixed : $details[0]->hotel_service_percentage;

        $sliderImages = $this->hotelImages($details[0]->hotel_id);
        $detailResults = (object)array(
            'id' => $details[0]->hotel_id,
            'title' => $title,
            'slug' => $slug,
            'bookingSlug' => $bookingSlug,
            'thumbnail' => $thumbnail,
            'locationInfoUrl' => $locationInfoUrl,
            'cityName' => $cityName,
            'stars' => pt_create_stars($stars),
            'starsCount' => $stars,
            'location' => $city->city,
            'desc' => $desc,
            'amenities' => $amenities,
            'vatvalue' => $taxvalue,
            'servicevalue' => $servicevalue,
            'price_status' => $details[0]->price_status,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'sliderImages' => $sliderImages,
            'relatedItems' => $relatedHotels,
            'paymentOptions' => $paymentOptions,
            'hotel_city' => $details[0]->hotel_city,
            'near' => $near,
            'defcheckin' => $defcheckin,
            'defcheckout' => $defcheckout,
            'metadesc' => $metadesc,
            'keywords' => $keywords,
            'policy' => $policy,
            'tripadvisorid' => $tripadvisorid,
            'mapAddress' => $details[0]->hotel_map_city,
            'diem_noi_bat' => $details[0]->diem_noi_bat,
            'hotelsurcharge' => $hotelsurcharge,
            'hotel_policy' => $hotel_policy,
            'hotel_slug'=>$detail[0]->hotel_slug
        );

        return $detailResults;
    }

    function hotel_short_details()
    {
        $this->db->select('hotel_id,hotel_phone,hotel_email,hotel_website,hotel_map_city,hotel_title,hotel_desc,hotel_policy,hotel_surcharge,tripadvisor_id,hotel_city,hotel_basic_price,hotel_basic_discount,hotel_is_featured,price_status,

   hotel_trusted,hotel_best_price,hotel_stars,hotel_slug,hotel_refundable,hotel_ratings,hotel_arrivalpay,thumbnail_image,hotel_amenities,hotel_latitude,hotel_longitude,hotel_meta_keywords,hotel_meta_desc,hotel_tax_fixed,hotel_tax_percentage,hotel_service_fixed,hotel_service_percentage');

        $this->db->where('hotel_id', $this->hotelid);
        $details = $this->db->get('pt_hotels')->result();
        $this->tripadvisorid = $details[0]->tripadvisor_id;
        $this->title = $this->get_title($details[0]->hotel_title);
        $this->stars = $details[0]->hotel_stars;
        $this->desc = $this->get_description($details[0]->hotel_desc);
        $this->policy = $this->get_policy($details[0]->hotel_policy);
        $this->surcharge = $details[0]->hotel_surcharge;
        $this->keywords = $this->get_keywords($details[0]->hotel_meta_keywords, $details[0]->hotel_id);
        $this->metadesc = $this->get_metaDesc($details[0]->hotel_meta_desc, $details[0]->hotel_id);
        $hotelAmenities = explode(",", $details[0]->hotel_amenities);

        foreach ($hotelAmenities as $hm) {
            $amenities[] = $this->amenitiesTranslation($hm);
        }
        $this->amenities = $amenities;


        $this->thumbnail = PT_HOTELS_SLIDER_THUMBS . $details[0]->thumbnail_image;
        $this->isspecial = pt_is_special('hotels', $this->hotelid);
        //get country and city name for url slug

        $locationInfoUrl = pt_LocationsInfo($details[0]->hotel_city);

        $countryName = url_title($locationInfoUrl->country, 'dash', true);
        $cityName = url_title($locationInfoUrl->city, 'dash', true);

        $this->slug = $countryName . '/' . $cityName . '/' . $details[0]->hotel_slug . $this->checkinout;
        $this->bookingSlug = $details[0]->hotel_slug . $this->checkinout;


        //        $pricing = $this->hotel_price($details[0]->hotel_basic_price, $details[0]->hotel_basic_discount);
        //            $this->basicprice = $pricing['basic'];
        //            $this->discountprice = $pricing['discount'];
        $city = pt_LocationsInfo($details[0]->hotel_city, $this->lang);
        //$featured =

        $this->location = $city->city;
        //    $this->country = $location[0]->short_name;
        $this->isfeatured = $this->is_featured();

        $this->trusted = $details[0]->hotel_trusted;
        //    $this->bestprice = $details[0]->hotel_best_price;
        $this->refundable = $details[0]->hotel_refundable;
        $this->arrivalpay = $details[0]->hotel_arrivalpay;
        $this->website = $details[0]->hotel_website;
        $this->mapAddress = $details[0]->hotel_map_city;
        $this->phone = $details[0]->hotel_phone;
        $this->email = $details[0]->hotel_email;
        $this->taxvalue = $details[0]->hotel_tax_fixed > 0 ? $details[0]->hotel_tax_fixed : $details[0]->hotel_tax_percentage;
        $this->servicevalue = $details[0]->hotel_service_fixed > 0 ? $details[0]->hotel_service_fixed : $details[0]->hotel_service_percentage;
        $taxcom = $this->hotel_tax_commision();
        $this->comm_type = $taxcom['commtype'];
        $this->comm_value = $taxcom['commval'];

        $this->tax_type = $taxcom['taxtype'];
        $this->tax_value = $taxcom['taxval'];
        $this->service_type = $taxcom['servicetype'];
        $this->service_value = $taxcom['serviceval'];
        $this->latitude = $details[0]->hotel_latitude;
        $this->longitude = $details[0]->hotel_longitude;
        $this->price_status = $details[0]->price_status;
        $this->hotel_policy = $details[0]->hotel_policy;


        $this->sliderImages = $this->hotelImages();
        return $details;
    }

    function get_title($deftitle, $hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        if ($this->lang == $this->langdef) {
            $title = $deftitle;
        } else {
            $this->db->where('item_id', $hotelid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_hotels_translation')->result();
            $title = $res[0]->trans_title;
            if (empty($title)) {
                $title = $deftitle;
            }
        }
        return $title;
    }

    function get_description($defdesc, $hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        if ($this->lang == $this->langdef) {
            $desc = $defdesc;
        } else {
            $this->db->where('item_id', $hotelid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_hotels_translation')->result();
            $desc = $res[0]->trans_desc;
            if (empty($desc)) {
                $desc = $defdesc;
            }
        }
        return $desc;
    }


    function get_policy($defpolicy, $hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        if ($this->lang == $this->langdef) {
            $policy = $defpolicy;
        } else {
            $this->db->where('item_id', $hotelid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_hotels_translation')->result();
            $policy = $res[0]->trans_policy;
            if (empty($policy)) {
                $policy = $defpolicy;
            }
        }
        return $policy;
    }

    function get_keywords($defkeywords, $hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        if ($this->lang == $this->langdef) {
            $keywords = $defkeywords;
        } else {
            $this->db->where('item_id', $hotelid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_hotels_translation')->result();
            $keywords = $res[0]->metakeywords;
            if (empty($keywords)) {
                $keywords = $defkeywords;
            }
        }
        return $keywords;
    }

    function get_metaDesc($defmeta, $hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        if ($this->lang == $this->langdef) {
            $meta = $defmeta;
        } else {
            $this->db->where('item_id', $hotelid);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_hotels_translation')->result();
            $meta = $res[0]->metadesc;
            if (empty($meta)) {
                $meta = $defmeta;
            }
        }
        return $meta;
    }


    function hotelExtras($hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        $today = time();
        $result = array();
        //    $this->db->where('extras_from  <=', $today);
        //    $this->db->where('extras_to >=', $today);
        $this->db->where('extras_module', 'hotels');
        //  $this->db->or_where('extras_forever','forever');
        $this->db->order_by('extras_id', 'desc');
        $this->db->like('extras_for', $hotelid, 'both');
        $this->db->having('extras_status', 'Yes');
        $ext = $this->db->get('pt_extras')->result();
        $this->ci->load->library('currconverter');
        $curr = $this->ci->currconverter;
        if (!empty($ext)) {
            foreach ($ext as $e) {
                $trans = $this->extrasTranslation($e->extras_id, $e->extras_title, $e->extras_desc);
                $price = $curr->convertPrice($e->extras_basic_price, 0);
                $result[] = (object)array(
                    "id" => $e->extras_id,
                    "extraTitle" => $trans['title'],
                    "extraDesc" => $trans['desc'],
                    'extraPrice' => $price,
                    'thumbnail' => PT_EXTRAS_IMAGES . $e->extras_image
                );
            }

        }

        return $result;

    }

    function getHotelTypes()
    {
        $htypes = pt_get_hsettings_data("htypes");
        $result = array();
        foreach ($htypes as $htype) {
            $trans = $this->amenitiesTranslation($htype->sett_id);
            $result[] = (object)array(
                "id" => $htype->sett_id,
                "name" => $trans->name
            );
        }
        return $result;
    }

    function getHotelAmenities()
    {
        $amts = pt_get_hsettings_data("hamenities");
        $result = array();
        foreach ($amts as $amt) {
            $trans = $this->amenitiesTranslation($amt->sett_id);
            $result[] = (object)array(
                "id" => $amt->sett_id,
                'icon' => PT_HOTELS_ICONS . $amt->sett_img,
                "name" => $trans->name
            );
        }
        return $result;
    }

    // Hotel Amenities translation
    function amenitiesTranslation($id)
    {
        $language = $this->lang;
        $result = new stdClass;
        $this->db->select('sett_name,sett_img');
        $this->db->where('sett_id', $id);
        $this->db->where('sett_status', 'Yes');
        $re = $this->db->get('pt_hotels_types_settings')->result();
        if(isset($re[0])){
            $result->icon = PT_HOTELS_ICONS . $re[0]->sett_img;
        }
        if ($language == $this->langdef) {
            if(isset($re[0])){
                $result->name = $re[0]->sett_name;
            }
        } else {
            $this->db->select('trans_name');
            $this->db->where('sett_id', $id);
            $this->db->where('trans_lang', $language);
            $r = $this->db->get('pt_hotels_types_settings_translation')->result();
            if (empty($r[0]->trans_name)) {
                if(isset($re[0])){
                    $result->name = $re[0]->sett_name;
                }
            } else {
                $result->name = $r[0]->trans_name;
            }

        }
        return $result;
    }


    function extrasTranslation($id, $title, $desc)
    {
        $language = $this->lang;
        $this->db->select('trans_title,trans_desc');
        $this->db->where('trans_extras_id', $id);
        $this->db->where('trans_lang', $language);
        $r = $this->db->get('pt_extras_translation')->result();
        if (empty($r[0]->trans_title)) {
            $result['title'] = $title;

        } else {
            $result['title'] = $r[0]->trans_title;
        }
        if (empty($r[0]->trans_desc)) {
            $result['desc'] = $desc;
        } else {
            $result['desc'] = $r[0]->trans_desc;
        }

        return $result;
    }

    // hotel Price
    function hotel_price($basic, $discount)
    {
        $price = array();
        $price['code'] = $this->currencycode;
        $price['sign'] = $this->currencysign;

        $mulcur = "";

        return $price;
    }

    // hotel Reviews
    function hotelReviews($hotelid = null)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        $this->db->where('review_status', 'Yes');
        $this->db->where('review_module', 'hotels');
        $this->db->where('review_itemid', $hotelid);
        $this->db->order_by('review_id', 'desc');
        return $this->db->get('pt_reviews')->result();
    }

    // hotel Reviews for API
    function hotel_reviews_for_api($hotelid)
    {
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }
        $result = array();
        $this->db->select('review_overall as rating,review_name as review_by,review_comment,review_date');
        $this->db->where('review_status', 'Yes');
        $this->db->where('review_module', 'hotels');
        $this->db->where('review_itemid', $hotelid);
        $this->db->order_by('review_id', 'desc');
        $rs = $this->db->get('pt_reviews')->result();
        foreach ($rs as $r) {
            $result[] = array(
                "rating" => $r->rating,
                "review_by" => $r->review_by,
                "review_comment" => $r->review_comment,
                "review_date" => pt_show_date_php($r->review_date)
            );
        }
        return $result;
    }

    // hotel Reviews Averages
    function hotelReviewsAvg($hotelid = null)
    {
        //var_dump('<pre>', $hotelid);die;
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }

        $this->db->select("COUNT(*) AS totalreviews");
        $this->db->select_avg('review_overall', 'overall');
        $this->db->select_avg('review_clean', 'clean');
        $this->db->select_avg('review_facilities', 'facilities');
        $this->db->select_avg('review_staff', 'staff');
        $this->db->select_avg('review_comfort', 'comfort');
        $this->db->select_avg('review_location', 'location');
        $this->db->select_avg('review_anuong', 'an_uong');
        $this->db->where('review_status', 'Yes');
        $this->db->where('review_module', 'hotels');
        $this->db->where('review_itemid', $hotelid);
        $res = $this->db->get('pt_reviews')->result();
        $clean = round($res[0]->clean, 1);
        $comfort = round($res[0]->comfort, 1);
        $location = round($res[0]->location, 1);
        $facilities = round($res[0]->facilities, 1);
        $staff = round($res[0]->staff, 1);
        $an_uong = round($res[0]->an_uong, 1);
        $totalreviews = $res[0]->totalreviews;
        $overall = round($res[0]->overall, 1);

        $arrPoint = [
            [9.1, 10, 'veryhigh'],
            [8.1, 9, 'high'],
            [6.1, 8, 'medium'],
            [5.1, 6, 'normal'],
            [3.1, 5, 'low'],
            [1, 3, 'verylow']
        ];
        $arrAvgMark = [];
        foreach ($arrPoint as $point) {
            $this->db->select("COUNT(*) AS total");
            $this->db->where('review_status', 'Yes');
            $this->db->where('review_module', 'hotels');
            $this->db->where('review_itemid', $hotelid);
            $this->db->where('review_overall >= ', $point[0]);
            $this->db->where('review_overall <= ', $point[1]);
            $res = $this->db->get('pt_reviews')->result();

            $arrAvgMark[$point[2]] = $res[0]->total;
        }

        $result = (object)array(
            'clean' => $clean,
            'comfort' => $comfort,
            'location' => $location,
            'facilities' => $facilities,
            'staff' => $staff,
            'anuong' => $an_uong,
            'totalReviews' => $totalreviews,
            'overall' => $overall,
            'avgMark' => $arrAvgMark
        );

        return $result;
    }

    function getLocationsList($checkin = null, $checkout = null)
    {

        $resultLocations = array();
        $this->db->select('hotel_city,COUNT(hotel_city) as total,country');
        $this->db->from('pt_hotels');
        $this->db->join('pt_locations', 'pt_hotels.hotel_city = pt_locations.id');
        $this->db->group_by('hotel_city');
        $this->db->order_by('total', 'desc');
        $this->db->limit(8);
        $locations = $this->db->get()->result();

        $this->ci->load->library('currconverter');
        $curr = $this->ci->currconverter;

        foreach ($locations as $loc) {
            $price = array();
            $locInfo = pt_LocationsInfo($loc->hotel_city, $this->lang);
            $this->db->select('hotel_id');
            $this->db->where('hotel_city', $locInfo->id);
            $hotels = $this->db->get('pt_hotels')->result();
            //hoangnhonline cmt
            /*foreach($hotels as $hotel) {
            $bestprice = $this->bestPrice($hotel->hotel_id,$checkin,$checkout,'yes');
            $price[] = $bestprice;
            }
            $bestprices_full = min(array_filter($price));
            $bestprices = $curr->convertPrice($bestprices_full);
            if($bestprices=="") $bestprices = "...";
            */

            if (!empty($locInfo->city)) {

                $resultLocations[] = (object)array(
                    'id' => $locInfo->id,
                    'name' => $locInfo->city,
                    'total' => $loc->total,
                    'bestprices' => $curr->convertPrice($locInfo->best_price),
                    'country' => $loc->country,
                    'currSymbol' => $curr->symbol
                );

            }

        }
        return $resultLocations;

    }


    function translated_data($lang)
    {
        $this->db->where('item_id', $this->hotelid);
        $this->db->where('trans_lang', $lang);
        return $this->db->get('pt_hotels_translation')->result();
    }

    function room_short_details($id)
    {
        $this->db->select('room_id,room_quantity,room_type,room_title,room_desc,room_adults,room_children,room_amenities,thumbnail_image,extra_bed,extra_bed_charges,honey_moon,honey_moon_from,honey_moon_to,breakfast,room_is_sale_type,room_is_sale_val,room_sale_from,room_sale_to');
        $this->db->where('room_id', $id);
        $details = $this->db->get('pt_rooms')->result();
        //$this->roomtitle = $this->get_room_title($details[0]->room_title, $id);
        $this->roomtitle = $details[0]->room_title;
        $this->roomdesc = $this->get_room_description($details[0]->room_desc, $id);
        $roomAmenities = explode(",", $details[0]->room_amenities);

        foreach ($roomAmenities as $rm) {
            $amtsRoom[] = $this->amenitiesTranslation($rm);
        }
        $details['amenities'] = $amtsRoom;
        // $this->room_price($id,$currsign,$currcode);
        return $details;
    }

    function getRoomTitleOnly($id)
    {
        $this->db->select('room_title,room_type');
        $this->db->where('room_id', $id);
        $details = $this->db->get('pt_rooms')->result();
        //$roomTitle = $this->get_room_title($details[0]->room_title, $id);
        $roomTitle = $this->getRoomType($details[0]->room_type);
        return $roomTitle;
    }

     function getRoomTitle($id)
    {
        $this->db->select('room_title,room_type');
        $this->db->where('room_id', $id);
        $details = $this->db->get('pt_rooms')->result();
        $roomTitle = $this->get_room_title($details[0]->room_title, $id);
       // $roomTitle = $this->getRoomType($details[0]->room_type);
        return $roomTitle;
    }

    function get_room_title($deftitle, $id)
    {
        if ($this->lang == $this->langdef) {
            $title = $deftitle;
        } else {
            $this->db->where('item_id', $id);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_rooms_translation')->result();
            $title = $res[0]->trans_title;
            if (empty($title)) {
                $title = $deftitle;
            }
        }
        return $title;
    }

    function available_rooms()
    {
        $this->ci->load->helper('check');
        $result = array();
        $rooms = $this->rooms_id_title_only();
        foreach ($rooms as $room) {
            $unavail = pt_is_room_unvailable($room->room_id, $this->checkin, $this->checkout);
            $bookedrooms = pt_is_room_booked($room->room_id, $this->checkin, $this->checkout);
            $maxadults = true;
            $maxchild = true;
            $minstay = $room->room_min_stay;
            if ($this->adults > $room->room_adults) {
                $maxadults = false;
            } else {
                $maxadults = true;
            }

            if ($this->children > $room->room_children) {
                $maxchild = false;
            } else {
                $maxchild = true;
            }

            $totalroomscount = $room->room_quantity;
            $availablerooms = $totalroomscount - $bookedrooms;
            if (!$unavail && $availablerooms > 0 && $maxadults && $maxchild && $minstay <= $this->stay) {
                $roomdetails = $this->room_short_details($room->room_id);

                $result[] = array(
                    'hotelid' => $this->hotelid,
                    'id' => $room->room_id,
                    'roomlargethumb' => $this->roomlargethumb,
                    'roomsmallthumb' => $this->roomsmallthumb,
                    'roomtitle' => $this->roomtitle,
                    'desc' => $this->roomdesc,
                    'roomprice' => $this->roomprice,
                    'available_quantity' => $availablerooms,
                    'totalquantity' => $room->room_quantity,
                    'room_children' => $roomdetails[0]->room_children,
                    'room_adults' => $roomdetails[0]->room_adults,
                    'room_size' => $roomdetails[0]->room_size,
                    'room_bed_size' => $roomdetails[0]->room_bed_size,
                    'roomspecials' => $this->roomspecials,
                    'roomadditional' => $this->roomadditional,
                    'room_amenities' => $roomdetails[0]->room_amenities
                );


            }
        }
        if (!empty($result)) {
            $this->roomsavailable = true;
        } else {
            $this->roomsavailable = false;
        }

        return $result;

    }

    function validroomscount($shortdetails)
    {
        $this->roomscounterror = "";
        // $unavail =  pt_is_room_unvailable($shortdetails[0]->room_id,$this->checkin,$this->checkout);
        $bookedrooms = pt_is_room_booked($shortdetails[0]->room_id, $this->checkin, $this->checkout);
        $availablerooms = $shortdetails[0]->room_quantity - $bookedrooms;
        if ($this->children > $shortdetails[0]->room_children) {
            $this->roomscounterror = "Maximum children exceeded.";
        }

        if ($this->adults > $shortdetails[0]->room_adults) {
            $this->roomscounterror = "Maximum Adults exceeded.";
        }

        if ($availablerooms < $this->roomscount) {
            $this->roomscounterror = "Room Not available for booking.";
        }

    }

    function get_room_description($defdesc, $id)
    {
        if ($this->lang == $this->langdef) {
            $desc = $defdesc;
        } else {
            $this->db->where('item_id', $id);
            $this->db->where('trans_lang', $this->lang);
            $res = $this->db->get('pt_rooms_translation')->result();
            $desc = $res[0]->trans_desc;
            if (empty($desc)) {
                $desc = $defdesc;
            }
        }
        return $desc;
    }


    function rooms_translated_data($lang, $id)
    {
        $this->db->where('item_id', $id);
        $this->db->where('trans_lang', $lang);
        return $this->db->get('pt_rooms_translation')->result();
    }

    function room_total_quantity($id)
    {
        $this->db->select('room_quantity');
        $this->db->where('room_id', $id);
        $res = $this->db->get('pt_rooms')->result();
        if (!empty($res)) {
            return $res[0]->room_quantity;
        } else {
            return '0';
        }
    }


    function hotel_tax_commision()
    {
        $res = array();
        $this->db->select('hotel_comm_fixed,hotel_comm_percentage,hotel_tax_fixed,hotel_tax_percentage,hotel_service_fixed,hotel_service_percentage');
        $this->db->where('hotel_id', $this->hotelid);
        $result = $this->db->get('pt_hotels')->result();
        $commfixed = $result[0]->hotel_comm_fixed;
        $commper = $result[0]->hotel_comm_percentage;
        $taxfixed = $result[0]->hotel_tax_fixed;
        $taxper = $result[0]->hotel_tax_percentage;
        $servicefixed = $result[0]->hotel_service_fixed;
        $serviceper = $result[0]->hotel_service_percentage;
        $res['commtype'] = "percentage";
        $res['commval'] = $commper;
        $res['taxtype'] = "percentage";
        $res['taxval'] = $taxper;
        $res['servicetype'] = "percentage";
        $res['serviceval'] = $serviceper;
        if ($commfixed > 0) {
            $res['commtype'] = "fixed";
            $res['commval'] = $commfixed;
        }
        if ($taxfixed > 0) {
            $res['taxtype'] = "fixed";
            $res['taxval'] = $taxfixed;
        }
        if ($servicefixed > 0) {
            $res['servicetype'] = "fixed";
            $res['serviceval'] = $servicefixed;
        }
        return $res;
    }

    function is_featured()
    {
        $this->db->select('hotel_id');
        $this->db->where('hotel_is_featured', 'yes');
        $this->db->where('hotel_featured_from <', time());
        $this->db->where('hotel_featured_to >', time());
        $this->db->where('hotel_id', $this->hotelid);
        return $this->db->get('pt_hotels')->num_rows();
    }

    function specialofferslist($limit = 0)
    {
        $this->db->select('offer_item');
        $this->db->where('pt_special_offers.offer_from <=', time());
        $this->db->where('pt_special_offers.offer_to >=', time());
        $this->db->where_in('pt_special_offers.offer_module', 'hotels');
        $this->db->where('pt_special_offers.offer_status', '1');
        $this->db->order_by('pt_special_offers.offer_item', 'desc');
        $this->db->limit($limit);
        return $this->db->get('pt_special_offers')->result();
    }

    function sales_off_hotels_list($location = null)
    {
        $settings = $this->settings();
        //$limit = $settings[0]->front_homepage;
        $orderby = $settings[0]->front_homepage_order;
        $this->db->select('hotel_id,hotel_order,hotel_title,hotel_status,hotel_sale_from,hotel_sale_to,hotel_is_sale_percent,hotel_featured_from,hotel_featured_to,hotel_city');
        $this->db->where('hotel_is_sale', 'yes');
        $where = "((hotel_sale_from < " . time() . " AND hotel_sale_to > " . time() . ") OR hotel_sale_forever = 'forever')";
        //$this->db->where('hotel_sale_from <', time());
        //$this->db->where('hotel_sale_to >', time());
        //$this->db->or_where('hotel_sale_forever', 'forever');
        if ($location != null) {
            $this->db->where('hotel_city', $location);
        }
        $this->db->where($where);
        $this->db->having('hotel_status', 'Yes');
        //$this->db->limit($limit);
        if ($orderby == "za") {
            $this->db->order_by('pt_hotels.hotel_title', 'desc');
        } elseif ($orderby == "az") {
            $this->db->order_by('pt_hotels.hotel_title', 'asc');
        } elseif ($orderby == "oldf") {
            $this->db->order_by('pt_hotels.hotel_id', 'asc');
        } elseif ($orderby == "newf") {
            $this->db->order_by('pt_hotels.hotel_id', 'desc');
        } elseif ($orderby == "ol") {
            $this->db->order_by('pt_hotels.hotel_order', 'asc');
        }
        return $this->db->get('pt_hotels')->result();
    }

    function featured_hotels_list($location = null, $lim = null)
    {
        $settings = $this->settings();
        if ($lim != null)
            $limit = $lim;
        else
            $limit = $settings[0]->front_homepage;
        $orderby = $settings[0]->front_homepage_order;
        $this->db->select('hotel_id,hotel_order,hotel_title,hotel_status,hotel_featured_from,hotel_featured_to,hotel_sale_from,hotel_sale_to,hotel_is_sale_percent,hotel_city,price_status');
        $this->db->where('hotel_is_featured', 'yes');
        $where = "((hotel_featured_from < " . time() . " AND hotel_featured_to > " . time() . ") OR hotel_featured_forever = 'forever')";
        //$this->db->where('hotel_featured_from < ', time());
        //$this->db->where('hotel_featured_to >', time());
        //$this->db->or_where('hotel_featured_forever', 'forever');
        if ($location != null) {
            $this->db->where('hotel_city', $location);
        }
        $this->db->where($where);
        $this->db->having('hotel_status', 'Yes');
        $this->db->limit($limit);
        if ($orderby == "za") {
            $this->db->order_by('pt_hotels.hotel_title', 'desc');
        } elseif ($orderby == "az") {
            $this->db->order_by('pt_hotels.hotel_title', 'asc');
        } elseif ($orderby == "oldf") {
            $this->db->order_by('pt_hotels.hotel_id', 'asc');
        } elseif ($orderby == "newf") {
            $this->db->order_by('pt_hotels.hotel_id', 'desc');
        } elseif ($orderby == "ol") {
            $this->db->order_by('pt_hotels.hotel_order', 'asc');
        }
        return $this->db->get('pt_hotels')->result();
    }

    function getFeaturedHotels($location = null, $limit = null)
    {
        $hotels = $this->featured_hotels_list($location, $limit);
        if (!$hotels)
            return null;
        $tmp = $this->getResultObject($hotels);
        $result = $tmp['result'];
        return $result;
    }

    function getSalesoffHotels($location = null)
    {
        $hotels = $this->sales_off_hotels_list($location);
        $tmp = $this->getResultObject($hotels);
        $result = $tmp['result'];
        return $result;
    }

    function getTopRatedHotels($location = null)
    {
        $hotels = $this->ci->hotels_model->popular_hotels_front($location);
        $tmp = $this->getResultObject($hotels);
        $result = $tmp['result'];
        return $result;
    }

    function getRelatedHotels($hotels)
    {
        $resulthotels = array();
        $result = array();
        if (!empty($hotels)) {
            foreach ($hotels as $h) {
                $resulthotels[] = (object)array(
                    'hotel_id' => $h
                );
            }

        }
        $result = $this->getLimitedResultObject($resulthotels);


        return $result;
    }


    function hero_hotels_list()
    {
        $this->db->select('front_homepage_hero');
        $rslt = $this->db->get('pt_front_settings')->result();
        $hotels = $rslt[0]->front_homepage_hero;
        if (!empty($hotels)) {
            $herohotels = explode(",", $hotels);
        } else {
            $herohotels = "";
        }
        return $herohotels;
    }

    function mini_hero_hotels_list()
    {
        $this->db->select('front_homepage_small_hero');
        $rslt = $this->db->get('pt_front_settings')->result();
        $minihotels = $rslt[0]->front_homepage_small_hero;
        if (!empty($minihotels)) {
            $miniherohotels = explode(",", $minihotels);
        } else {
            $miniherohotels = "";
        }
        return $miniherohotels;
    }

    // List 2 top rated hotels from each city passed to to this function
    function top_rated_hotels($city)
    {
        $this->db->select('pt_hotels.hotel_id');
        $this->db->select_avg('pt_reviews.review_overall', 'overall');
        $this->db->where('pt_hotels.hotel_city', $city);
        $this->db->group_by('pt_hotels.hotel_id');
        $this->db->join('pt_reviews', 'pt_hotels.hotel_id = pt_reviews.review_itemid', 'left');
        $this->db->where('pt_hotels.hotel_status', '1');
        $this->db->order_by('pt_reviews.review_overall', 'desc');
        $this->db->limit(2);
        return $this->db->get('pt_hotels')->result();
    }

    function bestPrice($hotelid = null, $checkin = null, $checkout = null, $list = null)
    {
        $this->ci->load->library('currconverter');
        $curr = $this->ci->currconverter;
        if (empty($hotelid)) {
            $hotelid = $this->hotelid;
        }

        $result = array();
        //$this->ci->load->model('hotels/rooms_model');
        $this->db->select('min(total) as price');
        $this->db->where('hotel_id', $hotelid);
        if (!empty($checkin)) {
            $checkin = explode('/', $checkin);
            $this->db->where('date_use >= ', $checkin[2] . '-' . $checkin[1] . '-' . $checkin[0]);
        }
        if (!empty($checkout)) {
            $checkout = explode('/', $checkout);
            $this->db->where('date_use <= ', $checkout[2] . '-' . $checkout[1] . '-' . $checkout[0]);
        }
        $this->db->limit(1);
        $res = $this->db->get('pt_room_prices_detail')->result();

        if (!empty($res)) {
            return $res[0]->price;
        }

        return 0;
    }

    function hotelswithrooms()
    {
        $this->ci->load->helper('check');
        $result = array();
        $this->db->select('hotel_id');
        $this->db->where('hotel_status', 'Yes');
        $hotels = $this->db->get('pt_hotels')->result();
        foreach ($hotels as $hotel) {
            $rooms = $this->rooms_id_title_only($hotel->hotel_id);

            foreach ($rooms as $room) {
                $unavail = pt_is_room_unvailable($room->room_id, $this->checkin, $this->checkout);
                $bookedrooms = pt_is_room_booked($room->room_id, $this->checkin, $this->checkout);

                $totalroomscount = $room->room_quantity;
                $availablerooms = $totalroomscount - $bookedrooms;
                if (!$unavail && $availablerooms > 0) {
                    if (!in_array($hotel->hotel_id, $result['hotels'])) {
                        $result['hotels'][] = $hotel->hotel_id;
                    }

                    $result['rooms'][] = $room->room_id;

                }
            }

        }

        return $result;

    }

    function paymethodFee($id, $total)
    {
        $result = 0;
        $this->db->select('payment_percentage');
        $this->db->where('payment_id', $id);
        $res = $this->db->get('pt_payment_gateways')->result();
        if (!empty($res) && $total > 0) {

            $result = round($total * $res[0]->payment_percentage / 100, 2);

        }

        return $result;

    }

    function extrasFee($exts)
    {
        $extFee = 0;
        $this->ci->load->library('currconverter');
        $curr = $this->ci->currconverter;
        foreach ($exts as $ext) {
            $this->db->select('extras_title,extras_desc,extras_discount,extras_basic_price');
            $this->db->where('extras_id', $ext);
            $rs = $this->db->get('pt_extras')->result();
            $amount = $rs[0]->extras_basic_price;
            $price = $curr->convertPriceFloat($amount, 2);
            $extFee += $amount;
            $info = $this->extrasTranslation($ext, $rs[0]->extras_title, $rs[0]->extras_desc);

            $result['extrasIndividualFee'][] = array(
                "id" => $ext,
                "price" => $price
            );
            $result['extrasInfo'][] = array(
                "title" => $info['title'],
                "price" => $price
            );
        }
        $result['extrasTotalFee'] = $extFee;

        return $result;

    }


    function setDeposit($total)
    {
        if ($this->comm_type == "fixed") {
            $this->deposit = round($this->comm_value, 2);
        } else {
            $this->deposit = round(($total * $this->comm_value) / 100, 2);
        }
    }

    function setTax($amount)
    {
        if ($this->tax_type == "fixed") {
            $this->taxamount = round($this->tax_value, 2);
        } else {
            $this->taxamount = round(($amount * $this->tax_value) / 100, 2);
        }
    }

    function setServicefee($amount)
    {
        if ($this->service_type == "fixed") {
            $this->serviceamount = round($this->service_value, 2);
        } else {
            $this->serviceamount = round(($amount * $this->service_value) / 100, 2);
        }
    }

    //get honeymoon room price
    function honeymoon_room_price($hotelid)
    {
        $this->db->select('room_basic_price');
        $this->db->where('room_hotel', $hotelid);
        $this->db->where('honey_moon', 'Yes');
        $query = $this->db->get('pt_rooms');
        $row = $query->row();
        return $row->room_basic_price;
    }

    //make a result object all data of hotels array
    function getResultObject($hotels, $honeymoon = null, $orderby = null, $checkin = null, $checkout = null)
    {
        $this->ci->load->library('currconverter');
        $result = $arrPriceSort = array();
        $curr = $this->ci->currconverter;

        foreach ($hotels as $h) {
            $this->set_id($h->hotel_id);
            $this->hotel_short_details();

            $avgReviews = $this->hotelReviewsAvg();

            $arrPriceSort[$this->hotelid] = str_replace(",", "", $h->price);
            $roomId=""; if(isset($h->room_id)){ $roomId = $h->room_id ;}
            $price_status=""; if(isset($h->price_status)){ $price_status = $h->price_status ;}

            $hotel_featured_from=""; if(isset($h->hotel_featured_from)){ $hotel_featured_from = $h->hotel_featured_from ;}
            $hotel_featured_to=""; if(isset($h->hotel_featured_to)){ $hotel_featured_to = $h->hotel_featured_to ;}
            $hotel_sale_to=""; if(isset($h->hotel_sale_to)){ $hotel_sale_to = $h->hotel_sale_to ;}
            $hotel_is_sale_percent=""; if(isset($h->hotel_is_sale_percent)){ $hotel_is_sale_percent = $h->hotel_is_sale_percent ;}
            $offer_title=""; if(isset($h->offer_title)){ $offer_title = $h->offer_title ;}
            $honeymoon=""; if(isset($h->honeymoon)){ $honeymoon = $h->honeymoon ;}
            $price_status=""; if(isset($h->price_status)){ $price_status = $h->price_status ;}

            $result[] = (object)array(
                'id' => $this->hotelid,
                'title' => $this->title,
                'slug' => base_url() . 'hotels/' . $this->slug,
                'thumbnail' => $this->thumbnail,
                'roomid' => $roomId,
                'stars' => pt_create_stars($this->stars),
                'starsCount' => $this->stars,
                'location' => $this->location,
                'mapAddress' => $this->mapAddress,
                'desc' => strip_tags($this->desc),
                'price' => $curr->convertPrice($h->price, 0),
                'currCode' => $curr->code,
                'currSymbol' => $curr->symbol,
                'price_status' => $price_status,
                'amenities' => $this->amenities,
                'vatvalue' => $this->taxvalue,
                'servicevalue' => $this->servicevalue,
                'avgReviews' => $avgReviews,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'featuredfrom' => $hotel_featured_from,
                'featuredto' => $hotel_featured_to,
                'salefrom' => $hotel_featured_from,
                'saleto' => $hotel_sale_to,
                'salepercent' => $hotel_is_sale_percent,
                'honeymoon' => $honeymoon,
                'offer_title' => $offer_title,
                'hotel_is_featured' => $h->hotel_is_featured,
                'diem_noi_bat' => $h->diem_noi_bat,
                'hotel_slug' => $h->hotel_slug

            );
        }

        $this->currencycode = $curr->code;
        $this->currencysign = $curr->symbol;
        return ['result' => $result, 'resultSort' => $arrPriceSort];
    }

    //make a result object all data of hotels array
    function getHoneyObject($hotels)
    {
        $this->ci->load->library('currconverter');
        $result = array();
        $curr = $this->ci->currconverter;

        foreach ($hotels as $h) {
            $this->set_id($h->hotel_id);
            $this->hotel_short_details();

            $price = $curr->convertPrice($this->honeymoon_room_price($this->get_id()), 0);
            $avgReviews = $this->hotelReviewsAvg();

            $result[] = (object)array(
                'id' => $this->hotelid,
                'title' => $this->title,
                'slug' => base_url() . 'hotels/' . $this->slug,
                'thumbnail' => $this->thumbnail,
                'roomid' => $h->room_id,
                'stars' => pt_create_stars($this->stars),
                'starsCount' => $this->stars,
                'location' => $this->location,
                'mapAddress' => $this->mapAddress,
                'desc' => strip_tags($this->desc),
                'price' => $price,
                'currCode' => $curr->code,
                'currSymbol' => $curr->symbol,
                'price_status' => $h->price_status,
                'amenities' => $this->amenities,
                'vatvalue' => $this->taxvalue,
                'servicevalue' => $this->servicevalue,
                'avgReviews' => $avgReviews,
                'latitude' => $this->latitude,
                'longitude' => $this->longitude,
                'featuredfrom' => $h->hotel_featured_from,
                'featuredto' => $h->hotel_featured_to,
                'salefrom' => $h->hotel_sale_from,
                'saleto' => $h->hotel_sale_to,
                'salepercent' => $h->hotel_is_sale_percent
            );

        }
        $this->currencycode = $curr->code;
        $this->currencysign = $curr->symbol;
        return $result;
    }

    //make a result object limited data of hotels array
    function getLimitedResultObject($hotels)
    {
        
        $this->ci->load->library('currconverter');
        $result = array();
        $curr = $this->ci->currconverter;
        if (!empty($hotels)) {
            foreach ($hotels as $h) {
                $this->set_id($h->hotel_id);
                $this->hotel_short_details();
                $bestprice = $this->bestPrice();
                $price = $bestprice;
                $avgReviews = $this->hotelReviewsAvg();
                if (!empty($this->title)) {

                    $result[] = (object)array(
                        'id' => $this->hotelid,
                        'title' => $this->title,
                        'desc' => $this->desc,
                        'slug' => base_url() . 'hotels/' . $this->slug,
                        'thumbnail' => $this->thumbnail,
                        'stars' => pt_create_stars($this->stars),
                        'location' => $this->location,
                        'price' => $price,
                        'currCode' => $curr->code,
                        'currSymbol' => $curr->symbol,
                        'avgReviews' => $avgReviews,
                        'latitude' => $this->latitude,
                        'longitude' => $this->longitude
                    );

                }

            }
        }
        $this->currencycode = $curr->code;
        $this->currencysign = $curr->symbol;

        return $result;
    }


    //make a result object of Rooms Array
    function getRoomsResultObject($rooms, $checkin = null, $checkout = null)
    {
        if (empty($checkin)) {
            $checkin = $this->checkin;
        }

        if (empty($checkout)) {
            $checkout = $this->checkout;
        }
        $this->ci->load->library('currconverter');
        $this->ci->load->helper('check');
        $Roomresult = array();
        $curr = $this->ci->currconverter;
        $this->ci->load->model('hotels/rooms_model');

        foreach ($rooms as $room) {
            $details = $this->room_short_details($room->id);
            //var_dump("<pre>", $details);die;           

            $images = $this->roomImages($room->id, 4);
            $roomprice = $this->ci->rooms_model->getRoomPriceNew($room->id, $checkin, $checkout);
            $breakfast = $details[0]->breakfast;
            $bedcharges = 0 ;
            if(isset($roomprice['extrabed'])){
                $bedcharges = $curr->convertPriceFloat($roomprice['extrabed'], 0);
            }
            $price = 0 ;
            if(isset($roomprice['originaltotalPrice'])){
                $price = $curr->convertPrice($roomprice['originaltotalPrice'], 0);
            }
            $basicprice = 0 ;
            if(isset($roomprice['basicprice'])){
                $basicprice = $curr->convertPrice($roomprice['basicprice'], 0);
            }
            $salefrom = $details[0]->room_sale_from;
            $saleto = $details[0]->room_sale_to;
            $issale = $details[0]->room_is_sale_val;
            $saletype = $details[0]->room_is_sale_type;
            $onsale = false;
            if ($issale > 0) {
                $saleprice=0;
                if ((convert_to_unix($this->checkin) >= $salefrom && convert_to_unix($this->checkin) <= $saleto) && (convert_to_unix($this->checkout) >= $salefrom && convert_to_unix($this->checkout) <= $saleto)) {
                    if ($saletype == 'fixed') {
                        $saleprice = $roomprice['originaltotalPrice'] - $issale;
                    } else {
                        $saleprice = $roomprice['originaltotalPrice'] - ($roomprice['originaltotalPrice'] * $issale) / 100;
                    }
                    $onsale = true;
                }
                $saleprice = $curr->convertPrice($saleprice, 0);
            }
            //if($roomprice['maxAdults'] >= $this->adults && $roomprice['maxChild'] >= $this->children){
            $Roomresult[] = (object)array(
                'id' => $room->id,
                'title' => $details[0]->room_title,
                'desc' => $this->roomdesc,
                'maxAdults' => $details[0]->room_adults,
                'maxChild' => $details[0]->room_children,
                'breakfast' => $breakfast,
                'onsale' => $onsale,
                'maxQuantity' => $details[0]->room_quantity,
                'thumbnail' => PT_ROOMS_THUMBS . $details[0]->thumbnail_image,
                'fullimage' => PT_ROOMS_IMAGES . $details[0]->thumbnail_image,
                'Images' => $images,
                'basicprice' => $basicprice,
                'salefrom' => $salefrom,
                'saleto' => $saleto,
                'issale' => $issale,
                'saletype' => $saletype,
                'saleprice' => $saleprice,
                'Amenities' => $details['amenities'],
                'price' => $price,
                'currCode' => $curr->code,
                'currSymbol' => $curr->symbol,
                'Info' => $roomprice,
                'extraBeds' => $details[0]->extra_bed,
                'extrabedCharges' => $bedcharges,
                'room_title' => $details[0]->room_title,
                'room_adults' => $details[0]->room_adults,
                'room_children' => $details[0]->room_children,
                'price' => $roomprice
            );
            // }

        }
        return $Roomresult;
    }

    //make a result object of Rooms Array
    function getBookResultObject($hotelid, $roomid, $roomscount, $extrabeds = 0, $checkin = null, $checkout = null)
    {   //format date to calculate is d/M/Y
        if (empty($checkin)) {
            $checkin = $this->checkin;
        }

        if (empty($checkout)) {
            $checkout = $this->checkout;
        }
        //  echo $hotelid. '- '.$roomid. '- '.$roomscount. '- '. $extrabeds.  '- '.$checkin . '- '. $checkout .'<br>' ;

        $extrasCheckUrl = base_url() . 'admin/hotelajaxcalls/hotelExtrasBooking';
        $this->ci->load->library('currconverter');
        $result = array();
        $curr = $this->ci->currconverter;
        $this->ci->load->model('hotels/rooms_model');
        //room details for booking page
        $details = $this->room_short_details($roomid);
        $roomprice = $this->ci->rooms_model->getRoomPriceNew($roomid, $checkin, $checkout);

       // echo "<pre>";   print_r($roomprice );     echo "</pre>";

        //hotel details for booking page
        //$this->set_id($hotelid);
        //$this->hotel_short_details();
        if(!isset($roomprice['extrabed'])){$roomprice['extrabed'] = 0;}
        if(!isset($roomprice['totalPrice'])){$roomprice['totalPrice'] = 0;}

        $extras = $this->hotelExtras();
        $extrabedcharges = $roomprice['extrabed'] * $extrabeds;


        $totalSum = ($roomprice['totalPrice'] * $roomscount) + $extrabedcharges;

        $this->setTax($totalSum);
        $this->setServicefee($totalSum);
        $taxAmount = $curr->convertPrice($this->taxamount);
        $serviceAmount = $curr->convertPrice($this->serviceamount);
        $totalPrice = $totalSum + $this->taxamount + $this->serviceamount;

        $bedcharges = $curr->convertPrice($extrabedcharges);

        $price = $curr->convertPrice($totalPrice);

        $this->setDeposit($totalPrice);

        $depositAmount = $curr->convertPrice($this->deposit);

        $result = (object)array(
            'id' => $roomid,
            'title' => $this->roomtitle,
            'desc' => $this->roomdesc,
            'maxAdults' => $details[0]->room_adults,
            'maxChild' => $details[0]->room_children,
            'maxQuantity' => $details[0]->room_quantity,
            'thumbnail' => PT_ROOMS_THUMBS . $details[0]->thumbnail_image,
            //'Images' => $images,
            'Amenities' => $details['amenities'],
            'price' => $price,
            'currCode' => $curr->code,
            'currSymbol' => $curr->symbol,
            //'perNight' => $perNight,
            'Info' => $roomprice,
            //'stay' => $roomprice['stay'],
            'roomscount' => $roomscount,
            'extraBedCharges' => $bedcharges,
            'extraBedsCount' => $extrabeds
        );
        //end room details for booking page
        /*

        $result["hotel"] = (object)array(
            'id' => $this->hotelid,
            'title' => $this->title,
            'slug' => base_url() . 'hotels/' . $this->slug,
            'bookingSlug' => $this->bookingSlug,
            'thumbnail' => $this->thumbnail,
            'stars' => pt_create_stars($this->stars),
            'starsCount' => $this->stars,
            'location' => $this->location,
            'checkin' => $checkin,
            'checkout' => $checkout,
            'mapAddress' => $this->mapAddress,
            'metadesc' => $this->metadesc,
            'keywords' => $this->keywords,
            'extras' => $extras,
            'taxAmount' => $taxAmount,
            'depositAmount' => $depositAmount,
            'serviceAmount' => $serviceAmount,
            'policy' => $this->policy,
            'surcharge' => $this->surcharge,
            'extraChkUrl' => $extrasCheckUrl,
            'adults' => $this->adults,
            'children' => $this->children,
            'price_status' => $this->price_status,
            'hotel_policy' => $this->hotel_policy
        );
*/
        //end hotel details for booking page
        return $result;

    }


    //get updated values of booking data after extras and payment method updates
    function getUpdatedDataBookResultObject($hotelid, $roomid, $checkin, $checkout, $roomscount, $extras, $extrabeds = 0)
    {
        $this->ci->load->library('currconverter');
        $result = array();
        $curr = $this->ci->currconverter;
        $this->ci->load->model('hotels/rooms_model');
        //room details for booking page
        $details = $this->room_short_details($roomid);
        $extratotal = $this->extrasFee($extras);
        $roomprice = $this->ci->rooms_model->getRoomPrice($roomid, $checkin, $checkout);
        $extrabedcharges = $roomprice['extrabed'] * $extrabeds;
        $total = ($roomprice['totalPrice'] * $roomscount) + $extratotal['extrasTotalFee'] + $extrabedcharges;
        $paymethodTotal = 0; //$this->paymethodFee($this->ci->input->post('paymethod'),$total);

        $this->set_id($hotelid);
        $this->hotel_short_details();
        $this->setTax($total);
        $this->setServicefee($total);


        $taxAmount = $curr->convertPrice($this->taxamount);
        $serviceAmount = $curr->convertPrice($this->serviceamount);
        $grandTotal = $total + $paymethodTotal + $this->taxamount;
        $this->setDeposit($grandTotal);

        $depositAmount = $curr->convertPrice($this->deposit);
        $bedcharges = $curr->convertPrice($extrabedcharges);


        $price = $curr->convertPrice($grandTotal);
        $perNight = $curr->convertPriceFloat($roomprice['perNight'], 2);
        $extrasHtml = "";
        foreach ($extratotal['extrasInfo'] as $einfo) {
            $extrasHtml .= "<tr class='allextras'><td>" . $einfo['title'] . "</td>
                              <td class='text-right'>" . $curr->code . " " . $curr->symbol . $einfo['price'] . "</td></tr>";
        }

        $subitem = array(
            "id" => $roomid,
            "price" => $perNight,
            "count" => $roomscount
        );

        $result = (object)array(
            'grandTotal' => $price,
            'taxAmount' => $taxAmount,
            'depositAmount' => $depositAmount,
            'extrashtml' => $extrasHtml,
            'bookingType' => "hotels",
            'currCode' => $curr->code,
            'currSymbol' => $curr->symbol,
            'subitem' => $subitem,
            'stay' => $roomprice['stay'],
            'extrasInfo' => $extratotal,
            'extraBedCharges' => $bedcharges
        );

        //end hotel details for booking page
        return json_encode($result);

    }

    //convert price
    public function convertAmount($price)
    {

        $this->ci->load->library('currconverter');
        $curr = $this->ci->currconverter;
        return $curr->convertPriceFloat($price, 0);

    }

    public function convertPriceRange($price)
    {

        $this->ci->load->library('currconverter');
        $curr = $this->ci->currconverter;
        return $curr->convertPriceRange($price, 0);

    }

    public function priceRange($sprice)
    {
        $sprice = str_replace(";", ",", $sprice);
        $sprice = explode(",", $sprice);
        $result = new stdClass;
        $result->minprice = $sprice[0];
        $result->maxprice = $sprice[1];

        return $result;
    }

    public function siteMapData()
    {
        $hotelsData = array();
        $this->db->select('hotel_id');
        $this->db->where('hotel_status', 'Yes');
        $result = $this->db->get('pt_hotels');
        $hotels = $result->result();
        if (!empty($hotels)) {
            $hotelsData = $this->getLimitedResultObject($hotels);

        }

        return $hotelsData;
    }


    // Get Room Type to show instead of title
    function getRoomType($id)
    {
        $language = $this->lang;
        $result = new stdClass;
        $this->db->select('sett_name,sett_img');
        $this->db->where('sett_id', $id);
        $this->db->where('sett_type', "rtypes");
        $re = $this->db->get('pt_hotels_types_settings')->result();
        if ($language == $this->langdef) {
            $result = $re[0]->sett_name;
        } else {
            $this->db->select('trans_name');
            $this->db->where('sett_id', $id);
            $this->db->where('trans_lang', $language);
            $r = $this->db->get('pt_hotels_types_settings_translation')->result();
            if (empty($r[0]->trans_name)) {
                $result = $re[0]->sett_name;
            } else {
                $result = $r[0]->trans_name;
            }

        }

        return $result;
    }

    public function suggestionResults($query)
    {
        $response = array();
        $this->db->select('pt_hotels_translation.trans_title as title,pt_hotels.hotel_id as id,pt_hotels.hotel_title as title');
        $this->db->like('pt_hotels.hotel_title', $query);
        $this->db->or_like('pt_hotels_translation.trans_title', $query);
        $this->db->join('pt_hotels_translation', 'pt_hotels.hotel_id = pt_hotels_translation.item_id', 'left');
        $this->db->group_by('pt_hotels.hotel_id');
        $this->db->limit('25');
        $res = $this->db->get('pt_hotels')->result();
        $hotels = array();
        $locations = array();

        $this->db->select('id,location');
        $this->db->like('location', $query);
        //$this->db->or_like('country',$query);
        $this->db->limit('25');
        $locres = $this->db->get('pt_locations')->result();

        if (!empty($locres)) {

            foreach ($locres as $l) {

                $locInfo = pt_LocationsInfo($l->id, $this->lang);
                $locations[] = (object)array(
                    'id' => $l->id,
                    'name' => trim($locInfo->city),
                    'module' => 'location'
                );
            }

        }


        if (!empty($res)) {
            foreach ($res as $r) {
                $title = $this->get_title($r->title, $r->id);
                //$hotels[] =  (object)array('id' => array('dataType' => 'hotels', 'id' => $r->id), 'name' => trim($title), 'module' => 'hotels');
                $hotels[] = (object)array(
                    'id' => $r->id,
                    'name' => trim($title),
                    'module' => 'hotel'
                );
            }

        }


        $response = array_merge($hotels, $locations);
        $dataResponse = array(
            "items" => $response
        );
        return $dataResponse;

    }

    public function honeymoonByLocations($totalnums = 6)
    {
        $locData = new stdClass;

        $this->db->select('hotel_id,hotel_slug,pt_rooms.thumbnail_image as image,hotel_city,country, honey_moon, pt_locations.best as bestdesc');
        $this->db->from('pt_hotels');
        $this->db->join('pt_rooms', 'pt_rooms.room_hotel = pt_hotels.hotel_id');
        $this->db->join('pt_locations', 'pt_locations.id = pt_hotels.hotel_city');
        $this->db->where('honey_moon', 'Yes');

        $this->db->group_by('pt_hotels.hotel_city');
        $this->db->order_by('pt_hotels.hotel_id', 'RAND');
        $this->db->limit($totalnums);
        $qhotels = $this->db->get();
        $hotels = $qhotels->result();
        //$images = array();
        foreach ($hotels as $hotel) {
            $locationInfo = pt_LocationsInfo($hotel->hotel_city, $this->lang);
            //array_push($images, $hotel->thumbnail_image);
            //$thumbnail_image = $images[array_rand($images)];
            $locData->locations[] = (object)array(
                'id' => $hotel->hotel_city,
                'name' => $locationInfo->city,
                'country' => $hotel->country,
                'thumbnail_image' => $hotel->image,
                'hotel_slug' => $hotel->hotel_slug,
                'best' => $hotel->bestdesc
            );
            //unset($images);
            //$images = array();
        }


        //usort($locData->locations, array($this, "cmp"));
        //$locData->locations = array_slice($locData->locations, 0, $totalnums);


        return $locData;
    }

    // TripAdvisor Reviews Averages
    function tripAdvisorData($id, $tripInfo = null)
    {
        if (!empty($tripInfo)) {

            $info = $tripInfo;
        } else {
            $info = tripAdvisorInfo($id);
        }

        $reviews = $info->reviews;
        $reviewsData = array();
        foreach ($reviews as $rev) {
            $date = explode("T", $rev->published_date);
            $reviewsData[] = (object)array(
                'id' => $rev->id,
                'review_comment' => $rev->text,
                'review_name' => $rev->user->username,
                'review_overall' => $rev->rating,
                'maxRating' => 5,
                'reviewUrl' => $rev->url,
                'review_date' => strtotime($date[0])
            );
        }

        $result = (object)array(
            'totalReviews' => $info->num_reviews,
            'overall' => $info->rating,
            'imgUrl' => $info->rating_image_url,
            'reviews' => $reviewsData
        );
        return $result;
    }

    function tripAdvisorStatus()
    {
        $tripmodule = $this->ci->ptmodules->is_mod_available_enabled("tripadvisor");
        return $tripmodule;
    }

    // check honeymoon rooms is avalaible at this time
    public function honeymoonBythisTime($roomid)
    {

        $this->db->select('room_id as id');
        $this->db->where('room_id', $roomid);
        $this->db->where('room_status', 'Yes');
        $this->db->where('honey_moon', 'Yes');
        $this->db->where('honey_moon_from <=', time());
        $this->db->where('honey_moon_to >', time());
        $query = $this->db->get('pt_rooms');
        $row = $query->row();
        return $row->id;


    }

    // check honeymoon rooms is avalaible at this time
    public function loadmoreHotels($locid)
    {

        $this->db->select('location, country');
        $this->db->where('id', $locid);
        $query = $this->db->get('pt_locations');
        $row = $query->row();
        $result = (object)array(
            'location' => $row->location,
            'country' => $row->country
        );
        return $result;

    }


    // location listings
    public function hotelbyLocations()
    {
        $this->db->select('location,feature,id,country');
        $this->db->where('status', 'Yes');
        $result = $this->db->get('pt_locations')->result();
        return $result;

    }

    // location listings
    public function hotelListings()
    {
        $locData = new stdClass;
        $this->db->select('hotel_id,hotel_title,hotel_map_city,near,hotel_city');
        $this->db->where('hotel_status', 'Yes');
        $hotels = $this->db->get('pt_hotels')->result();
        //return $result;
        foreach ($hotels as $hotel) {
            $locationInfo = pt_LocationsInfo($hotel->hotel_city, $this->lang);
            //array_push($images, $hotel->thumbnail_image);
            //$thumbnail_image = $images[array_rand($images)];
            $locData->locations[] = (object)array(
                'hotel_id' => $hotel->hotel_id,
                'address' => $hotel->hotel_map_city,
                'city' => $locationInfo->city,
                'near' => $hotel->near,
                'hotel_title' => $hotel->hotel_title
            );
            //unset($images);
            //$images = array();
        }


        usort($locData->locations, array(
            $this,
            "cmp"
        ));
        //$locData->locations = array_slice($locData->locations, 0, $totalnums);


        return $locData;


    }

    // location listings
    public function roombyHotel($hotel_id)
    {
        $this->db->select('room_id as id');
        $this->db->where('room_hotel', $hotel_id);
        $this->db->where('honey_moon', 'Yes');
        $query = $this->db->get('pt_rooms');
        $row = $query->row();
        return $row->id;

    }

    //check if hotel is sale off
    public function sales_off_hotel($hotel_id)
    {
        $this->db->select('hotel_is_sale_percent as percent');
        $this->db->where('hotel_is_sale', 'yes');
        $this->db->where('hotel_id', $hotel_id);
        $where = "((hotel_sale_from < " . time() . " AND hotel_sale_to > " . time() . ") OR hotel_sale_forever = 'forever')";
        $this->db->where($where);
        $query = $this->db->get('pt_hotels');
        $row = $query->row();//echo $this->db->last_query(); var_dump($row);
        return $row->percent;
    }

    //list of recently viewed
    public function recentlyViewed($hotel_id)
    {
        $this->db->where('hotel_id', $hotel_id);
        $result = $this->db->get('pt_hotels')->result();
        return $result;
    }
     public function getComboByHotel($hotel_id)
    {
        $this->db->like('hotel_related', $hotel_id, 'both');
        $this->db->where('hotel_id', $hotel_id);
        $result = $this->db->get('pt_special_offers')->result();
        return $result;
    }  

     public function is_deal_hotel($hotel_id)
    {
        $this->db->select('*');
        $this->db->where('hotel_id', $hotel_id);
         $this->db->where('type',1);
        $query = $this->db->get('hotel_offers');
        return  $query->num_rows();
    }
      public function is_combo_hotel($hotel_id)
    {
        $this->db->select('*');
        $this->db->where('hotel_id', $hotel_id);
         $this->db->where('type',2);
        $query = $this->db->get('hotel_offers');
        return  $query->num_rows();
    }
   
}