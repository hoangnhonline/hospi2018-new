<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Hotels extends MX_Controller

{
    private $data = array();
    private $validlang;

    function __construct()
    {
        parent::__construct();
        $chk = modules::run('home/is_main_module_enabled', 'hotels');
        if (!$chk) {
            Module_404();
        }

        modules::load('home');
        $this->load->library('hotels/hotels_lib');
        $this->load->model('hotels/hotels_model');
        $this->load->library('breadcrumbcomponent');
        $this->data['phone'] = $this->load->get_var('phone');
        $this->data['contactemail'] = $this->load->get_var('contactemail');
        $this->data['app_settings'] = $this->settings_model->get_settings_data();
        $this->data['usersession'] = $this->session->userdata('pt_logged_customer');
        $this->data['appModule'] = "hotels";
        $languageid = $this->uri->segment(2);
        $this->validlang = pt_isValid_language($languageid);
        if ($this->validlang) {
            $this->data['lang_set'] = $languageid;
        } else {
            $this->data['lang_set'] = $this->session->userdata('set_lang');
        }

        $defaultlang = pt_get_default_language();
        if (empty($this->data['lang_set'])) {
            $this->data['lang_set'] = $defaultlang;
        }

        $this->hotels_lib->set_lang($this->data['lang_set']);
        $this->data['locationsList'] = $this->hotels_lib->getLocationsList();
        $this->data['modulelib'] = $this->hotels_lib;

    }

    public function index($city_slug = null)
    {

        $this->load->library('hotels/hotels_calendar_lib');

        $this->data['calendar'] = $this->hotels_calendar_lib;
        $settings = $this->settings_model->get_front_settings('hotels');
        $this->data['minprice'] = $settings[0]->front_search_min_price;
        $this->data['maxprice'] = $settings[0]->front_search_max_price;
       
        // $countryName = $this->uri->segment(3);
        // $cityName = $this->uri->segment(4);

        $hotelname = $this->uri->segment(2);
    
        //var_dump($hotelname);die;
        $check = $this->hotels_model->hotel_exists($hotelname);
        if ($check && !empty($hotelname)) { // neu co ten khach san
            $this->hotels_lib->set_hotelid($hotelname);
            $this->data['module'] = $this->hotels_lib->hotel_details();
            $this->data['hasRooms'] = $this->hotels_lib->totalRooms($this->data['module']->id);
            $this->data['rooms'] = $this->hotels_lib->hotel_rooms($this->data['module']->id);            
            // Availability Calender settings variables

            $this->data['from1'] = date("F Y");
            $this->data['to1'] = date("F Y", strtotime('+5 months'));
            $this->data['from2'] = date("F Y", strtotime('+6 months'));
            $this->data['to2'] = date("F Y", strtotime('+11 months'));
            $this->data['from3'] = date("F Y", strtotime('+12 months'));
            $this->data['to3'] = date("F Y", strtotime('+17 months'));
            $this->data['from4'] = date("F Y", strtotime('+18 months'));
            $this->data['to4'] = date("F Y", strtotime('+23 months'));
            $this->data['first'] = date("m") . "," . date("Y");
            $this->data['second'] = date("m", strtotime('+6 months')) . "," . date("Y", strtotime('+6 months'));
            $this->data['third'] = date("m", strtotime('+12 months')) . "," . date("Y", strtotime('+12 months'));
            $this->data['fourth'] = date("m", strtotime('+18 months')) . "," . date("Y", strtotime('+18 months'));

            // End Availability Calender settings variables

            $this->data['tripadvisorinfo'] = $tripadvisorinfo = tripAdvisorInfo($this->data['module']->tripadvisorid);
            
            if (pt_is_module_enabled('reviews')) {
                $this->data['reviews'] = $this->hotels_lib->hotelReviews($this->data['module']->id);
                $this->data['avgReviews'] = $this->hotels_lib->hotelReviewsAvg($this->data['module']->id);
                $this->data['avgOverall'] = [
                    'veryhigh' => ['Tuyệt vời', '9+'],
                    'high' => ['Rất tốt', '8 - 9'],
                    'medium' => ['Tốt', '6 - 8'],
                    'normal' => ['Tạm được', '5 - 6'],
                    'low' => ['Kém', '3 - 5'],
                    'verylow' => ['Rất tệ', '1 - 3']
                ];
            }
            // Split date for new date desing on hotel single page

            $checkin = explode("/", $this->hotels_lib->checkin);
            $this->data['d1first'] = $checkin[0];
            $this->data['d1second'] = $checkin[1];
            $this->data['d1third'] = $checkin[2];
            $checkout = explode("/", $this->hotels_lib->checkout);
            $this->data['d2first'] = $checkout[0];
            $this->data['d2second'] = $checkout[1];
            $this->data['d2third'] = $checkout[2];

            // end Split date for new date desing on hotel single page

            $this->lang->load("front", $this->data['lang_set']);
            $this->data['currencySign'] = $this->hotels_lib->currencysign;
            $this->data['lowestPrice'] = $this->hotels_lib->bestPrice($this->data['module']->id);
            $this->data['allowreg'] = $this->data['app_settings'][0]->allow_registration;
            $this->data['page_title'] = $this->data['module']->title;
            $this->data['metakey'] = $this->data['module']->keywords;
            $this->data['metadesc'] = $this->data['module']->metadesc;
            $this->data['langurl'] = base_url() . "hotels/{langid}/" . $this->data['module']->slug;
            $recentlyViewed = $this->session->userdata('recentlyViewed');
            if (!is_array($recentlyViewed)) {
                $recentlyViewed = array();
            }

            // change this to 10

            if (sizeof($recentlyViewed) > 10) {
                array_shift($recentlyViewed);
            }

            // here set your id or page or whatever

            if (!in_array($this->data['module']->id, $recentlyViewed)) {
                array_push($recentlyViewed, $this->data['module']->id);
            }

            $this->session->set_userdata('recentlyViewed', $recentlyViewed);
            $recentlyViewed = array_reverse($recentlyViewed);
            $recentlyViewed = array_diff($recentlyViewed, array(
                $this->data['module']->id
            ));
            $recentlyViewed = array_filter($recentlyViewed);

            //get offer
            $this->load->library('offers_lib');

            $offers = $this->offers_lib->showOffers(null, null, $type = 1, 1, $this->data['module']->id);
            $combos = $this->offers_lib->showOffers(null, null, $type = 2, 100, $this->data['module']->id);            
            $honeymoons = $this->offers_lib->showOffers(null, null, $type = 3, 1, $this->data['module']->id);
            $this->data['offers'] = [];
            if ($offers['allOffers']['count'] > 0) {
                $this->data['offers'][] = $offers['allOffers']['offers'][0];
            }
            if ($combos['allOffers']['count'] > 0) {
                foreach($combos['allOffers']['offers'] as $offerCombo){
                    $this->data['offers'][] = $offerCombo;    
                }
                
            }
            if ($honeymoons['allOffers']['count'] > 0) {
                $this->data['offers'][] = $honeymoons['allOffers']['offers'][0];
            }

            //var_dump('<pre>',  $this->data['offers']);die;

            $this->data['recents'] = $recentlyViewed;
            /* Bread crum */
            $this->breadcrumbcomponent->add('Trang chủ', base_url());
            $this->breadcrumbcomponent->add('Khách sạn', base_url() . 'hotels');
            $this->breadcrumbcomponent->add($this->data['module']->location, base_url() . 'hotels/search/vietnam/' . $this->data['module']->cityName . '/' . $this->data['module']->hotel_city . '?txtSearch=' . $this->data['module']->location . '&searching=' . $this->data['module']->hotel_city . '&modType=location&checkin=&checkout=&adults=1&child=0');
            $this->breadcrumbcomponent->add($this->data['module']->title, base_url() . "hotels/" . $this->data['module']->slug);
            $this->data['breadcrumb'] = $this->breadcrumbcomponent->output();

            $this->theme->view('details', $this->data);

            // $this->output->cache(20) ; //hoangnhonline

        } else {            
            $this->listing();
        }
    }

    function listing($slug_hotel = null)
    {       
      
        $this->lang->load("front", $this->data['lang_set']);
        $this->data['sorturl'] = base_url() . 'hotels/listings?';
        $settings = $this->settings_model->get_front_settings('hotels');
        $this->data['minprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_min_price);
        $this->data['maxprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_max_price);

        // $this->data['popular_hotels'] = $this->hotels_model->popular_hotels_front();

        $page = $this->input->get('page');
        if (!$page) {
            $page = null;
        }
        $allhotels = $this->hotels_lib->show_hotels($page);     
        
        $this->data['moduleTypes'] = $this->hotels_lib->getHotelTypes();
        $this->data['amenities'] = $this->hotels_lib->getHotelAmenities();
        $this->data['checkin'] = @$_GET['checkin'];
        $this->data['checkout'] = @$_GET['checkout'];
        if (empty($checkin)) {
            $this->data['checkin'] = $this->hotels_lib->checkin;
        }

        if (empty($checkout)) {
            $this->data['checkout'] = $this->hotels_lib->checkout;
        }

        $chin = $this->hotels_lib->checkin;
        $chout = $this->hotels_lib->checkout;
        if (empty($chin) || empty($chout)) {
            $this->data['pricehead'] = trans('0396');
        } else {
            $this->data['pricehead'] = trans('0397') . " " . $this->hotels_lib->stay . " " . trans('0122');
        }

        $this->data['selectedLocation'] = $this->hotels_lib->selectedLocation;
        $this->data['module'] = $allhotels['all_hotels'];
        $this->data['info'] = $allhotels['paginationinfo'];
        $this->data['info']['base'] = base_url() . 'hotels/search';
        $this->data['currCode'] = $this->hotels_lib->currencycode;
        $this->data['currSign'] = $this->hotels_lib->currencysign;
        $this->data['page_title'] = $settings[0]->header_title;
        $this->data['metakey'] = $settings[0]->meta_keywords;
        $this->data['metadesc'] = $settings[0]->meta_description;
        $this->data['langurl'] = base_url() . "hotels/{langid}";
        $checkin = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKIN_SPAN . ' day', time()));
        $checkout = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKOUT_SPAN . ' day', time()));
        $this->data['hotelslocationsList'] = $this->hotels_lib->getLocationsList($checkin, $checkout);
        $this->data['ajaxurl'] = base_url() . $this->uri->uri_string() . "/searchajax";
        $this->theme->view('hotelslisting', $this->data);

        // $this->output->cache(20) ; //hoangnhonline tat cache

    }

    function honeymoon($page = null)
    {
      
        $this->lang->load("front", $this->data['lang_set']);
        $this->data['sorturl'] = base_url() . 'hotels/honeymoon/listings?';
        $settings = $this->settings_model->get_front_settings('hotels');
        $this->data['minprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_min_price);
        $this->data['maxprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_max_price);
        $this->data['moduleTypes'] = $this->hotels_lib->getHotelTypes();
        $this->data['amenities'] = $this->hotels_lib->getHotelAmenities();
        $this->data['checkin'] = @$_GET['checkin'];
        $this->data['checkout'] = @$_GET['checkout'];
        if (empty($checkin)) {
            $this->data['checkin'] = $this->hotels_lib->checkin;
        }

        if (empty($checkout)) {
            $this->data['checkout'] = $this->hotels_lib->checkout;
        }

        $chin = $this->hotels_lib->checkin;
        $chout = $this->hotels_lib->checkout;
        if (empty($chin) || empty($chout)) {
            $this->data['pricehead'] = trans('0396');
        } else {
            $this->data['pricehead'] = trans('0397') . " " . $this->hotels_lib->stay . " " . trans('0122');
        }

        $this->data['selectedLocation'] = $this->hotels_lib->selectedLocation;

        $this->load->library('offers_lib');
        $page = $this->input->get('page');
        if (!$page) {
            $page = null;
        }

        $alloffers = $this->offers_lib->showOffers($page, null, 3);
        $this->data['module'] = $alloffers['allOffers']['offers'];
        $this->data['info'] = $alloffers['paginationinfo'];
        $this->data['info']['base'] = base_url() . 'hotels/honeymoon';
        $this->data['currCode'] = $this->hotels_lib->currencycode;
        $this->data['currSign'] = $this->hotels_lib->currencysign;
        $this->data['page_title'] = $settings[0]->header_title;
        $this->data['metakey'] = $settings[0]->meta_keywords;
        $this->data['metadesc'] = $settings[0]->meta_description;
        $checkin = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKIN_SPAN . ' day', time()));
        $checkout = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKOUT_SPAN . ' day', time()));
        $this->data['hotelslocationsList'] = $this->hotels_lib->getLocationsList($checkin, $checkout);
        $this->data['langurl'] = base_url() . "hotels/honeymoon/{langid}";
        $this->theme->view('honeymoon', $this->data);

        // $this->output->cache(20) ; //hoangnhonline

    }

    function microtime_float()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    function searchajax($city = null, $checkin = null, $checkout=null, $adults = 0, $child = 0, $coupon_code = null)
    {
        $cityid= "";
        $country = 'vietnam';
        //var_dump($city, $citycode);
        $cityid = getCityId($city);
        if(!$cityid){
            $hotelname = $city;
            //var_dump($hotelname);die;
            $this->hotels_lib->set_hotelid($hotelname);
            $this->data['module'] = $this->hotels_lib->hotel_details();
            
            $this->data['hasRooms'] = $this->hotels_lib->totalRooms($this->data['module']->id);
            $this->data['rooms'] = $this->hotels_lib->hotel_rooms($this->data['module']->id);            
            // Availability Calender settings variables

            $this->data['from1'] = date("F Y");
            $this->data['to1'] = date("F Y", strtotime('+5 months'));
            $this->data['from2'] = date("F Y", strtotime('+6 months'));
            $this->data['to2'] = date("F Y", strtotime('+11 months'));
            $this->data['from3'] = date("F Y", strtotime('+12 months'));
            $this->data['to3'] = date("F Y", strtotime('+17 months'));
            $this->data['from4'] = date("F Y", strtotime('+18 months'));
            $this->data['to4'] = date("F Y", strtotime('+23 months'));
            $this->data['first'] = date("m") . "," . date("Y");
            $this->data['second'] = date("m", strtotime('+6 months')) . "," . date("Y", strtotime('+6 months'));
            $this->data['third'] = date("m", strtotime('+12 months')) . "," . date("Y", strtotime('+12 months'));
            $this->data['fourth'] = date("m", strtotime('+18 months')) . "," . date("Y", strtotime('+18 months'));

            // End Availability Calender settings variables

            $this->data['tripadvisorinfo'] = $tripadvisorinfo = tripAdvisorInfo($this->data['module']->tripadvisorid);
            
            if (pt_is_module_enabled('reviews')) {
                $this->data['reviews'] = $this->hotels_lib->hotelReviews($this->data['module']->id);
                $this->data['avgReviews'] = $this->hotels_lib->hotelReviewsAvg($this->data['module']->id);
                $this->data['avgOverall'] = [
                    'veryhigh' => ['Tuyệt vời', '9+'],
                    'high' => ['Rất tốt', '8 - 9'],
                    'medium' => ['Tốt', '6 - 8'],
                    'normal' => ['Tạm được', '5 - 6'],
                    'low' => ['Kém', '3 - 5'],
                    'verylow' => ['Rất tệ', '1 - 3']
                ];
            }
            // Split date for new date desing on hotel single page

            $checkin = explode("/", $this->hotels_lib->checkin);
            $this->data['d1first'] = $checkin[0];
            $this->data['d1second'] = $checkin[1];
            $this->data['d1third'] = $checkin[2];
            $checkout = explode("/", $this->hotels_lib->checkout);
            $this->data['d2first'] = $checkout[0];
            $this->data['d2second'] = $checkout[1];
            $this->data['d2third'] = $checkout[2];

            // end Split date for new date desing on hotel single page

            $this->lang->load("front", $this->data['lang_set']);
            $this->data['currencySign'] = $this->hotels_lib->currencysign;
            $this->data['lowestPrice'] = $this->hotels_lib->bestPrice($this->data['module']->id);
            $this->data['allowreg'] = $this->data['app_settings'][0]->allow_registration;
            $this->data['page_title'] = $this->data['module']->title;
            $this->data['metakey'] = $this->data['module']->keywords;
            $this->data['metadesc'] = $this->data['module']->metadesc;
            $this->data['langurl'] = base_url() . "hotels/{langid}/" . $this->data['module']->slug;
            $recentlyViewed = $this->session->userdata('recentlyViewed');
            if (!is_array($recentlyViewed)) {
                $recentlyViewed = array();
            }

            // change this to 10

            if (sizeof($recentlyViewed) > 10) {
                array_shift($recentlyViewed);
            }

            // here set your id or page or whatever

            if (!in_array($this->data['module']->id, $recentlyViewed)) {
                array_push($recentlyViewed, $this->data['module']->id);
            }

            $this->session->set_userdata('recentlyViewed', $recentlyViewed);
            $recentlyViewed = array_reverse($recentlyViewed);
            $recentlyViewed = array_diff($recentlyViewed, array(
                $this->data['module']->id
            ));
            $recentlyViewed = array_filter($recentlyViewed);

            //get offer
            $this->load->library('offers_lib');

            $offers = $this->offers_lib->showOffers(null, null, $type = 1, 1, $this->data['module']->id);
            $combos = $this->offers_lib->showOffers(null, null, $type = 2, 100, $this->data['module']->id);            
            $honeymoons = $this->offers_lib->showOffers(null, null, $type = 3, 1, $this->data['module']->id);
            $this->data['offers'] = [];
            if ($offers['allOffers']['count'] > 0) {
                $this->data['offers'][] = $offers['allOffers']['offers'][0];
            }
            if ($combos['allOffers']['count'] > 0) {
                foreach($combos['allOffers']['offers'] as $offerCombo){
                    $this->data['offers'][] = $offerCombo;    
                }
                
            }
            if ($honeymoons['allOffers']['count'] > 0) {
                $this->data['offers'][] = $honeymoons['allOffers']['offers'][0];
            }

            //var_dump('<pre>',  $this->data['offers']);die;

            $this->data['recents'] = $recentlyViewed;
            /* Bread crum */
            $this->breadcrumbcomponent->add('Trang chủ', base_url());
            $this->breadcrumbcomponent->add('Khách sạn', base_url() . 'hotels');
            $this->breadcrumbcomponent->add($this->data['module']->location, base_url() . 'hotels/search/vietnam/' . $this->data['module']->cityName . '/' . $this->data['module']->hotel_city . '?txtSearch=' . $this->data['module']->location . '&searching=' . $this->data['module']->hotel_city . '&modType=location&checkin=&checkout=&adults=1&child=0');
            $this->breadcrumbcomponent->add($this->data['module']->title, base_url() . "hotels/" . $this->data['module']->slug);
            $this->data['breadcrumb'] = $this->breadcrumbcomponent->output();

            $this->theme->view('details', $this->data);

        }else{
            $locationInfo = pt_LocationsInfo($cityid);
           // var_dump($cityid);
            //var_dump(base_url(uri_string()));die;
            $surl = http_build_query($_GET);
            $this->data['sorturl'] = base_url() . 'hotels/search' . $surl . '&';
            $checkin = str_replace("-", "/", $checkin);
            $checkout = str_replace("-", "/", $checkout);

            $modType = $this->input->get('modType') ? $this->input->get('modType') : 'location';
            $page = $this->input->get('page');
            if (!$page) {
                $page = null;
            }
            $country = 'vietnam';
            if (empty($country)) {
                $surl = http_build_query($_GET);
                $locationInfo = pt_LocationsInfo($cityid);
                $country = url_title($locationInfo->country, 'dash', true);
                $country = 'vietnam';         
                $city = url_title($locationInfo->city, 'dash', true);
                $cityid = $locationInfo->id;
                if (!empty($cityid) && $modType == "location") {
                    redirect(base_url() . 'hotels/search/' . $country . '/' . $city . '/' . $cityid . '?' . $surl);
                } else
                    if (!empty($cityid) && $modType == "hotel") {
                        $this->hotels_lib->set_id($cityid);
                        $this->hotels_lib->hotel_short_details();
                        $title = $this->hotels_lib->title;
                        $slug = $this->hotels_lib->slug;
                        if (!empty($title)) {
                            redirect(base_url() .'hotels/' . $slug);
                        }
                    }
            }               

            if (!empty($cityid) && $modType == "location") {
                
                $allhotels = $this->hotels_lib->search_hotels_by_text($cityid, $page, $checkin, $checkout);

            } else {
                $allhotels = $this->hotels_lib->search_hotels($page);
            }

            $tmpArr = [];
            if (!empty($allhotels['all'])) {
                foreach ($allhotels['all'] as $htl) {
                    $tmpArr[$htl->id] = $htl;
                }
            }

            $this->data['module'] = $tmpArr;
            $this->data['resultSort'] = $allhotels['resultSort'];
            $this->data['info'] = $allhotels['paginationinfo'];
            $this->data['info']['base'] = base_url() . 'hotels/search/' . $country . '/' . $city . '/' . $cityid;


            $this->data['checkin'] = @$checkin;
            $this->data['checkout'] = @$checkout;
            if (empty($checkin)) {
                $this->data['checkin'] = $this->hotels_lib->checkin;
            }

            if (empty($checkout)) {
                $this->data['checkout'] = $this->hotels_lib->checkout;
            }

            $chin = $this->hotels_lib->checkin;
            $chout = $this->hotels_lib->checkout;
            if (empty($chin) || empty($chout)) {
                $this->data['pricehead'] = trans('0396');
            } else {
                $this->data['pricehead'] = trans('0397') . " " . $this->hotels_lib->stay . " " . trans('0122');
            }
            //var_dump($locationInfo);die;
            $this->data['city'] = $cityid;
            $this->lang->load("front", $this->data['lang_set']);
            $this->data['selectedLocation'] = $cityid; //$this->hotels_lib->selectedLocation;
            $settings = $this->settings_model->get_front_settings('hotels');
            $this->data['nears'] = $this->hotels_model->select_nearby($cityid);
            $this->data['amenities'] = $this->hotels_lib->getHotelAmenities();
            $this->data['moduleTypes'] = $this->hotels_lib->getHotelTypes();
            $this->data['minprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_min_price);
            $this->data['maxprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_max_price);
            $this->data['currCode'] = $this->hotels_lib->currencycode;
            $this->data['currSign'] = $this->hotels_lib->currencysign;
            $this->data['page_title'] = 'Khách sạn tại '.$locationInfo->city;
            $this->data['metakey'] = @$country . " " . @$city;
            $this->data['metadesc'] = @$country . " " . @$city;
            $checkin = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKIN_SPAN . ' day', time()));
            $checkout = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKOUT_SPAN . ' day', time()));
            $this->data['hotelslocationsList'] = $this->hotels_lib->getLocationsList($checkin, $checkout);
            $this->data['langurl'] = base_url() . "hotels/{langid}";
            $this->data['ajaxurl'] = base_url() . str_replace('search', 'searchajax', $this->uri->uri_string());
            $this->data['cityid'] =  $cityid;
            $this->data['modType'] = $modType;
            $this->data['city'] = $cityid;
            $this->data['city_name'] = $locationInfo->city;
        }
        $this->theme->partial('hotelslistingajax', $this->data);
        // $this->output->cache(20) ; //hoangnhonline
    }

    function search($city = null, $checkin = null, $checkout=null, $adults = 0, $child = 0, $coupon_code = null)
    {

        $cityid= "";
        $country = 'vietnam';
        //var_dump($city, $citycode);
        $cityid = getCityId($city);
        if(!$cityid){
            $hotelname = $city;
            //var_dump($hotelname);die;
            $this->hotels_lib->set_hotelid($hotelname);
            $this->data['module'] = $this->hotels_lib->hotel_details();
            
            $this->data['hasRooms'] = $this->hotels_lib->totalRooms($this->data['module']->id);
            $this->data['rooms'] = $this->hotels_lib->hotel_rooms($this->data['module']->id);            
            // Availability Calender settings variables

            $this->data['from1'] = date("F Y");
            $this->data['to1'] = date("F Y", strtotime('+5 months'));
            $this->data['from2'] = date("F Y", strtotime('+6 months'));
            $this->data['to2'] = date("F Y", strtotime('+11 months'));
            $this->data['from3'] = date("F Y", strtotime('+12 months'));
            $this->data['to3'] = date("F Y", strtotime('+17 months'));
            $this->data['from4'] = date("F Y", strtotime('+18 months'));
            $this->data['to4'] = date("F Y", strtotime('+23 months'));
            $this->data['first'] = date("m") . "," . date("Y");
            $this->data['second'] = date("m", strtotime('+6 months')) . "," . date("Y", strtotime('+6 months'));
            $this->data['third'] = date("m", strtotime('+12 months')) . "," . date("Y", strtotime('+12 months'));
            $this->data['fourth'] = date("m", strtotime('+18 months')) . "," . date("Y", strtotime('+18 months'));

            // End Availability Calender settings variables

            $this->data['tripadvisorinfo'] = $tripadvisorinfo = tripAdvisorInfo($this->data['module']->tripadvisorid);
            
            if (pt_is_module_enabled('reviews')) {
                $this->data['reviews'] = $this->hotels_lib->hotelReviews($this->data['module']->id);
                $this->data['avgReviews'] = $this->hotels_lib->hotelReviewsAvg($this->data['module']->id);
                $this->data['avgOverall'] = [
                    'veryhigh' => ['Tuyệt vời', '9+'],
                    'high' => ['Rất tốt', '8 - 9'],
                    'medium' => ['Tốt', '6 - 8'],
                    'normal' => ['Tạm được', '5 - 6'],
                    'low' => ['Kém', '3 - 5'],
                    'verylow' => ['Rất tệ', '1 - 3']
                ];
            }
            // Split date for new date desing on hotel single page

            $checkin = explode("/", $this->hotels_lib->checkin);
            $this->data['d1first'] = $checkin[0];
            $this->data['d1second'] = $checkin[1];
            $this->data['d1third'] = $checkin[2];
            $checkout = explode("/", $this->hotels_lib->checkout);
            $this->data['d2first'] = $checkout[0];
            $this->data['d2second'] = $checkout[1];
            $this->data['d2third'] = $checkout[2];

            // end Split date for new date desing on hotel single page

            $this->lang->load("front", $this->data['lang_set']);
            $this->data['currencySign'] = $this->hotels_lib->currencysign;
            $this->data['lowestPrice'] = $this->hotels_lib->bestPrice($this->data['module']->id);
            $this->data['allowreg'] = $this->data['app_settings'][0]->allow_registration;
            $this->data['page_title'] = $this->data['module']->title;
            $this->data['metakey'] = $this->data['module']->keywords;
            $this->data['metadesc'] = $this->data['module']->metadesc;
            $this->data['langurl'] = base_url() . "hotels/{langid}/" . $this->data['module']->slug;
            $recentlyViewed = $this->session->userdata('recentlyViewed');
            if (!is_array($recentlyViewed)) {
                $recentlyViewed = array();
            }

            // change this to 10

            if (sizeof($recentlyViewed) > 10) {
                array_shift($recentlyViewed);
            }

            // here set your id or page or whatever

            if (!in_array($this->data['module']->id, $recentlyViewed)) {
                array_push($recentlyViewed, $this->data['module']->id);
            }

            $this->session->set_userdata('recentlyViewed', $recentlyViewed);
            $recentlyViewed = array_reverse($recentlyViewed);
            $recentlyViewed = array_diff($recentlyViewed, array(
                $this->data['module']->id
            ));
            $recentlyViewed = array_filter($recentlyViewed);

            //get offer
            $this->load->library('offers_lib');

            $offers = $this->offers_lib->showOffers(null, null, $type = 1, 1, $this->data['module']->id);
            $combos = $this->offers_lib->showOffers(null, null, $type = 2, 100, $this->data['module']->id);            
            $honeymoons = $this->offers_lib->showOffers(null, null, $type = 3, 1, $this->data['module']->id);
            $this->data['offers'] = [];
            if ($offers['allOffers']['count'] > 0) {
                $this->data['offers'][] = $offers['allOffers']['offers'][0];
            }
            if ($combos['allOffers']['count'] > 0) {
                foreach($combos['allOffers']['offers'] as $offerCombo){
                    $this->data['offers'][] = $offerCombo;    
                }
                
            }
            if ($honeymoons['allOffers']['count'] > 0) {
                $this->data['offers'][] = $honeymoons['allOffers']['offers'][0];
            }

            //var_dump('<pre>',  $this->data['offers']);die;

            $this->data['recents'] = $recentlyViewed;
            /* Bread crum */
            $this->breadcrumbcomponent->add('Trang chủ', base_url());
            $this->breadcrumbcomponent->add('Khách sạn', base_url() . 'hotels');
            $this->breadcrumbcomponent->add($this->data['module']->location, base_url() . 'hotels/search/vietnam/' . $this->data['module']->cityName . '/' . $this->data['module']->hotel_city . '?txtSearch=' . $this->data['module']->location . '&searching=' . $this->data['module']->hotel_city . '&modType=location&checkin=&checkout=&adults=1&child=0');
            $this->breadcrumbcomponent->add($this->data['module']->title, base_url() . "hotels/" . $this->data['module']->slug);
            $this->data['breadcrumb'] = $this->breadcrumbcomponent->output();

            $this->theme->view('details', $this->data);

        }else{
            $locationInfo = pt_LocationsInfo($cityid);
           // var_dump($cityid);
            //var_dump(base_url(uri_string()));die;
            $surl = http_build_query($_GET);
            $this->data['sorturl'] = base_url() . 'hotels/search' . $surl . '&';
            $checkin = str_replace("-", "/", $checkin);
            $checkout = str_replace("-", "/", $checkout);

            $modType = $this->input->get('modType') ? $this->input->get('modType') : 'location';
            $page = $this->input->get('page');
            if (!$page) {
                $page = null;
            }
            $country = 'vietnam';
            if (empty($country)) {
                $surl = http_build_query($_GET);
                $locationInfo = pt_LocationsInfo($cityid);
                $country = url_title($locationInfo->country, 'dash', true);
                $country = 'vietnam';         
                $city = url_title($locationInfo->city, 'dash', true);
                $cityid = $locationInfo->id;
                if (!empty($cityid) && $modType == "location") {
                    redirect(base_url() . 'hotels/search/' . $country . '/' . $city . '/' . $cityid . '?' . $surl);
                } else
                    if (!empty($cityid) && $modType == "hotel") {
                        $this->hotels_lib->set_id($cityid);
                        $this->hotels_lib->hotel_short_details();
                        $title = $this->hotels_lib->title;
                        $slug = $this->hotels_lib->slug;
                        if (!empty($title)) {
                            redirect(base_url() .'hotels/' . $slug);
                        }
                    }
            }   
            //var_dump($cityid);die;        
            

                if (!empty($cityid) && $modType == "location") {
                    
                    $allhotels = $this->hotels_lib->search_hotels_by_text($cityid, $page, $checkin, $checkout);

                } else {
                    $allhotels = $this->hotels_lib->search_hotels($page);
                }

                $tmpArr = [];
                if (!empty($allhotels['all'])) {
                    foreach ($allhotels['all'] as $htl) {
                        $tmpArr[$htl->id] = $htl;
                    }
                }

                $this->data['module'] = $tmpArr;
                $this->data['resultSort'] = $allhotels['resultSort'];
                $this->data['info'] = $allhotels['paginationinfo'];
                $this->data['info']['base'] = base_url() . 'hotels/search/' . $country . '/' . $city . '/' . $cityid;


            $this->data['checkin'] = @$checkin;
            $this->data['checkout'] = @$checkout;
            if (empty($checkin)) {
                $this->data['checkin'] = $this->hotels_lib->checkin;
            }

            if (empty($checkout)) {
                $this->data['checkout'] = $this->hotels_lib->checkout;
            }

            $chin = $this->hotels_lib->checkin;
            $chout = $this->hotels_lib->checkout;
            if (empty($chin) || empty($chout)) {
                $this->data['pricehead'] = trans('0396');
            } else {
                $this->data['pricehead'] = trans('0397') . " " . $this->hotels_lib->stay . " " . trans('0122');
            }
            //var_dump($locationInfo);die;
            $this->data['city'] = $cityid;
            $this->lang->load("front", $this->data['lang_set']);
            $this->data['selectedLocation'] = $cityid; //$this->hotels_lib->selectedLocation;
            $settings = $this->settings_model->get_front_settings('hotels');
            $this->data['nears'] = $this->hotels_model->select_nearby($cityid);
            $this->data['amenities'] = $this->hotels_lib->getHotelAmenities();
            $this->data['moduleTypes'] = $this->hotels_lib->getHotelTypes();
            $this->data['minprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_min_price);
            $this->data['maxprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_max_price);
            $this->data['currCode'] = $this->hotels_lib->currencycode;
            $this->data['currSign'] = $this->hotels_lib->currencysign;
            $this->data['page_title'] = 'Khách sạn tại '.$locationInfo->city;
            $this->data['metakey'] = @$country . " " . @$city;
            $this->data['metadesc'] = @$country . " " . @$city;
            $checkin = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKIN_SPAN . ' day', time()));
            $checkout = date($this->data['app_settings'][0]->date_f, strtotime('+' . CHECKOUT_SPAN . ' day', time()));
            $this->data['hotelslocationsList'] = $this->hotels_lib->getLocationsList($checkin, $checkout);
            $this->data['langurl'] = base_url() . "hotels/{langid}";
            $this->data['ajaxurl'] = base_url() . str_replace('search', 'searchajax', $this->uri->uri_string());
            $this->data['cityid'] =  $cityid;
            $this->data['modType'] = $modType;
            $this->data['city'] = $cityid;
            $this->data['city_name'] = $locationInfo->city;
            $this->theme->view('hotelslisting', $this->data);
        }
        

        // $this->output->cache(20) ; //hoangnhonline
    }

    function book($hotelname)
    {

        $this->load->model('admin/countries_model');
        $this->data['allcountries'] = $this->countries_model->get_all_countries();
        $check = $this->hotels_model->hotel_exists($hotelname);
        $this->load->library("paymentgateways");
        $this->data['hideHeader'] = "1";

        // echo "<pre>";
        // print_r($this->paymentgateways->getAllGateways());
        // echo "</pre>";

        $checkin = $this->input->get('checkin');
        $checkout = $this->input->get('checkout');
        $date1 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $checkin))));
        $date2 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $checkout))));

        // this calculates the diff between two dates, which is the number of nights
        $stay = $date2->diff($date1)->format("%a");
        $adults = (int)$this->input->get('adults');
        $child = (int)$this->input->get('child');
        $room_quantity = $this->input->get('room_quantity');
        $extra_beds = $this->input->get('extra_beds');
        $p = $this->input->get('p'); // price
        $pb = $this->input->get('pb'); // price extra beds
        $ptype = $this->input->get('ptype'); // 1 : normal 2 sale 3 uu dai

        $name_uudai = $this->input->get('name_uudai'); // 1 :  2 Gia khuyen mai 3 Ten uu dai
        $detail_id = $this->input->get('detail_id'); // price detail id
        
        $totalRooms = 0;
        if (!empty($room_quantity)) {
            foreach ($room_quantity as $tmp) {
                $totalRooms += $tmp;
            }
        }//echo  $this->hotels_lib->checkin;
        if ($check && !empty($hotelname)) {
            $this->load->model('admin/payments_model');
            $this->data['error'] = "";
            $this->hotels_lib->set_hotelid($hotelname);
            $hotelID = $this->hotels_lib->get_id();
            $detailHotel = $this->hotels_model->getDetail($hotelID);

            $roomIdArr = $this->input->get('room_id');
            $roomsCountArr = $this->input->get('room_quantity');
            $extrabeds = $this->input->get('extrabeds');
            foreach ($roomIdArr as $roomID) {
                $roomsCount = $roomsCountArr[$roomID];
                if ($roomsCount > 0) {
                    $bookInfo[$roomID] = $this->hotels_lib->getBookResultObject($hotelID, $roomID, $roomsCount, $extrabeds, '', '');
                }
            }
            /*echo "<pre>";
            print_r($roomIdArr);
            echo "</pre>";
            echo "<pre>";
            print_r($roomsCountArr);
            echo "</pre>";
            echo "<pre>";
            print_r($extrabeds);
            echo "</pre>";

             echo "<pre>";
            print_r($bookInfo);
            echo "</pre>";*/           
            $this->data['detail_id'] = $detail_id;
            $this->data['priceChoose'] = $p;
            $this->data['priceBedChoose'] = $pb;
            $this->data['typeChoose'] = $ptype;
            $this->data['name_uudai'] = $name_uudai;

            $this->data['module'] = $detailHotel;
            $this->data['stay'] = $stay;
            //var_dump("<pre>", $detailHotel);die;
            $this->data['extraChkUrl'] = $bookInfo['hotel']->extraChkUrl;
            $this->data['room'] = $bookInfo;
            if ($this->data['room']->price < 1 || $this->data['room']->stay < 1) {
                $this->data['error'] = "error";
            }

            // $this->data['paymentTypes'] = $this->payments_model->get_all_payments_front();

            $this->load->model('admin/accounts_model');
            $loggedin = $this->loggedin = $this->session->userdata('pt_logged_customer');
            $this->lang->load("front", $this->data['lang_set']);
            $this->load->helper('invoice');
            $this->load->model('payments_model');
            $paygateways = $this->payments_model->getAllPaymentsBack();
            $this->data['paymentGateways'] = $paygateways['activeGateways'];
            usort($this->data['paymentGateways'],
                function ($a, $b) {
                    return $a['order'] - $b['order'];
                });
            $this->data['profile'] = $this->accounts_model->get_profile_details($loggedin);
            $this->data['page_title'] = $this->data['module']->hotel_title;
            $this->data['metakey'] = $this->data['module']->keywords;
            $this->data['metadesc'] = $this->data['module']->metadesc;
            $this->data['checkin'] = $checkin;
            $this->data['checkout'] = $checkout;
            $this->data['adults'] = $adults;
            $this->data['child'] = $child;
            $this->data['totalRooms'] = $totalRooms;

            $this->data['room_id'] = json_encode(array_keys($bookInfo));
            $this->data['room_quantity'] = json_encode($room_quantity);
            $this->data['extra_beds'] = json_encode($extra_beds);
            $this->data['room_price'] = json_encode($price);

            // var_dump($detailHotel->hotel_title);die;

            $this->breadcrumbcomponent->add('Trang chủ', base_url());
            $this->breadcrumbcomponent->add($detailHotel->hotel_title, base_url() . "hotels/" . $detailHotel->hotel_slug);
            $this->breadcrumbcomponent->add('Thông tin thanh toán', '#');
            $this->data['breadcrumb'] = $this->breadcrumbcomponent->output();
            $this->theme->view('booking_hotel', $this->data);
        } else {
            redirect("hotels");
        }
    }

    function txtsearch()
    {
        echo $this->hotels_model->textsearch();
    }

    function roomcalendar()
    {
        $this->lang->load("front", $this->data['lang_set']);
        $this->load->library('hotels/hotels_calendar_lib');
        $this->data['calendar'] = $this->hotels_calendar_lib;
        $this->data['roomid'] = $this->input->post('roomid');
        $monthYear = explode(",", $this->input->post('monthyear'));
        $this->data['initialmonth'] = $monthYear[0];
        $this->data['year'] = $monthYear[1];
        $this->load->view('calendar', $this->data);
    }

    function _remap($method, $params = array())
    {

        $funcs = get_class_methods($this);
        if (in_array($method, $funcs)) {
            return call_user_func_array(array(
                $this,
                $method
            ), $params);
        } else {
            $result = checkUrlParams($method, $params, $this->validlang);
           
            $city_id = getCityId($result->countrySlug);
            if ($result->showIndex) {
                $this->index();
            } else {
                $this->search($result->countrySlug);

                // $this->lang->load("front", $this->data['lang_set']);
                // $this->data['sorturl'] = base_url() . 'hotels/listings?';
                // $settings = $this->settings_model->get_front_settings('hotels');
                // $this->data['minprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_min_price);
                // $this->data['maxprice'] = $this->hotels_lib->convertAmount($settings[0]->front_search_max_price);
                // $allhotels = $this->hotels_lib->showHotelsByLocation($city_id, $result->offset);
                // $this->data['moduleTypes'] = $this->hotels_lib->getHotelTypes();
                // $this->data['amenities'] = $this->hotels_lib->getHotelAmenities();
                // $this->data['checkin'] = @$_GET['checkin'];
                // $this->data['checkout'] = @$_GET['checkout'];
                // if (empty($checkin)) {
                //     $this->data['checkin'] = $this->hotels_lib->checkin;
                // }

                // if (empty($checkout)) {
                //     $this->data['checkout'] = $this->hotels_lib->checkout;
                // }

                // $chin = $this->hotels_lib->checkin;
                // $chout = $this->hotels_lib->checkout;
                // if (empty($chin) || empty($chout)) {
                //     $this->data['pricehead'] = trans('0396');
                // } else {
                //     $this->data['pricehead'] = trans('0397') . " " . $this->hotels_lib->stay . " " . trans('0122');
                // }

                // $this->data['selectedLocation'] = $this->hotels_lib->selectedLocation;
                // //var_dump( $this->data['selectedLocation']);die;
                
                // $this->data['module'] = $allhotels['all_hotels'];
                // $this->data['info'] = $allhotels['paginationinfo'];
                // $this->data['plinks2'] = $allhotels['plinks2'];
                // $this->data['currCode'] = $this->hotels_lib->currencycode;
                // $this->data['currSign'] = $this->hotels_lib->currencysign;
                // $this->data['page_title'] = $settings[0]->header_title;
                // $this->data['metakey'] = $settings[0]->meta_keywords;
                // $this->data['metadesc'] = $settings[0]->meta_description;
                // $this->data['langurl'] = base_url() . "hotels/{langid}";

                // $this->theme->view('listing', $this->data);
            }
        }
    }
    function load_price_ajax(){
         $this->load->model('admin/hotels_model');
        $city_id = (int) $_GET['id'];
        $checkin = $_GET['checkin'];
        $checkout = $_GET['checkout'];         
        $tmp = $this->hotels_model->load_min_price($city_id, $checkin, $checkout);   
        echo number_format($tmp->price);
    }
}