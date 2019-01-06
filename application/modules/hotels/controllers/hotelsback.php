<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class hotelsback extends MX_Controller
{
    private $data = array();
    public $accType = "";

    public $role = "";

    public $editpermission = true;

    public $deletepermission = true;

    function __construct()
    {
        $seturl = $this->uri->segment(3);
        if ($seturl != "settings") {
            $chk = modules::run('home/is_main_module_enabled', 'hotels');
            if (!$chk) {
                backError_404($this->data);
            }
        }

        $checkingadmin = $this->session->userdata('pt_logged_admin');
        $this->accType = $this->session->userdata('pt_accountType');
        $this->role = $this->session->userdata('pt_role');
        $this->load->library('hotels/hotels_lib');
        $this->load->model('hotels/hotels_model');
        $this->load->model('locations_model');
        $this->load->model('accounts_model');
        $this->data['userloggedin'] = $this->session->userdata('pt_logged_id');
        if (empty($this->data['userloggedin'])) {
            $urisegment = $this->uri->segment(1);
            $this->session->set_userdata('prevURL', current_url());
            redirect($urisegment);
        }

        if (!empty($checkingadmin)) {
            $this->data['adminsegment'] = "admin";
        } else {
            $this->data['adminsegment'] = "supplier";
        }

        if ($this->data['adminsegment'] == "admin") {
            $chkadmin = modules::run('admin/validadmin');
            if (!$chkadmin) {
                redirect('admin');
            }
        } else {
            $chksupplier = modules::run('supplier/validsupplier');
            if (!$chksupplier) {
                redirect('supplier');
            }
        }

        $this->data['appSettings'] = modules::run('admin/appSettings');
        $this->load->library('ckeditor');
        $this->data['ckconfig'] = array();
        $this->data['ckconfig']['toolbar'] = array(
            array(
                'Source',
                '-',
                'Bold',
                'Italic',
                'Underline',
                'Strike',
                'Format',
                'Styles'
            ),
            array(
                'NumberedList',
                'BulletedList',
                'Outdent',
                'Indent',
                'Blockquote'
            ),
            array(
                'Image',
                'Link',
                'Unlink',
                'Anchor',
                'Table',
                'HorizontalRule',
                'SpecialChar',
                'Maximize'
            ),
            array(
                'Cut',
                'Copy',
                'Paste',
                'PasteText',
                'PasteFromWord',
                '-',
                'Undo',
                'Redo',
                'Find',
                'Replace',
                '-',
                'SelectAll',
                '-',
                'SpellChecker',
                'Scayt'
            ),
        );
        $this->data['ckconfig']['language'] = 'en';

        $this->load->helper('hotels/hotels');
        $this->data['languages'] = pt_get_languages();
        $this->load->helper('xcrud');
        $this->data['c_model'] = $this->countries_model;
        $this->data['tripadvisor'] = $this->ptmodules->is_mod_available_enabled("tripadvisor");
        $this->data['addpermission'] = true;
        if ($this->role == "supplier" || $this->role == "admin") {
            $this->editpermission = pt_permissions("edithotels", $this->data['userloggedin']);
            $this->deletepermission = pt_permissions("deletehotels", $this->data['userloggedin']);
            $this->data['addpermission'] = pt_permissions("addhotels", $this->data['userloggedin']);
        }

        $this->data['all_countries'] = $this->countries_model->get_all_countries();
        $this->load->helper('settings');
        $this->load->model('admin/accounts_model');
        $this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
        $this->data['isSuperAdmin'] = $this->session->userdata('pt_logged_super_admin');
    }

    function index2()
    {
        if (!$this->data['addpermission'] && !$this->editpermission && !$this->deletepermission) {
            backError_404($this->data);
        } else {
            $xcrud = xcrud_get_instance();
            $xcrud->table('pt_hotels');
            if ($this->role == "supplier") {
                $xcrud->where('hotel_owned_by', $this->data['userloggedin']);
            }

            $xcrud->join('hotel_owned_by', 'pt_accounts', 'accounts_id');

            $xcrud->order_by('pt_hotels.hotel_id', 'desc');
            $xcrud->subselect('Owned By', 'SELECT CONCAT(ai_first_name, " ", ai_last_name) FROM pt_accounts WHERE accounts_id = {hotel_owned_by}');
            $xcrud->label('hotel_title', 'Name')->label('hotel_stars', 'Stars')->label('hotel_is_featured', '')->label('hotel_order', 'Order');
            if ($this->editpermission) {
                $xcrud->button(base_url() . $this->data['adminsegment'] . '/hotels/manage/{hotel_slug}', 'Edit', 'fa fa-edit', 'btn btn-warning', array(
                    'target' => '_self'
                ));
                $xcrud->column_pattern('hotel_title', '<a href="' . base_url() . $this->data['adminsegment'] . '/hotels/manage/{hotel_slug}' . '">{value}</a>');
            }

            if ($this->deletepermission) {
                $delurl = base_url() . 'admin/hotelajaxcalls/delHotel';
                $xcrud->multiDelUrl = base_url() . 'admin/hotelajaxcalls/delMultipleHotels';
                $xcrud->button("javascript: delfunc('{hotel_id}','$delurl')", 'DELETE', 'fa fa-times', 'btn-danger', array(
                    'target' => '_self',
                    'id' => '{hotel_id}'
                ));
            }

            $xcrud->limit(50);
            $xcrud->unset_add();
            $xcrud->unset_edit();
            $xcrud->unset_remove();
            $xcrud->unset_view();
            $xcrud->column_width('hotel_order', '7%');
            $xcrud->columns('hotel_is_featured,thumbnail_image,hotel_title,hotel_stars,Owned By,hotel_city,hotel_slug,hotel_order,hotel_status');
            $xcrud->search_columns('hotel_is_featured,hotel_title,hotel_stars,Owned By,hotel_city,hotel_order,hotel_status');
            $xcrud->label('pt_hotels.hotel_city', 'Location');
            $xcrud->label('thumbnail_image', 'Image');
            $xcrud->label('hotel_slug', 'Gallery');
            $xcrud->label('hotel_status', 'Status');

            $xcrud->column_callback('pt_hotels.hotel_order', 'orderInputHotels');
            $xcrud->column_callback('pt_hotels.hotel_is_featured', 'feature_stars');
            $xcrud->column_callback('hotel_slug', 'hotelGallery');
            $xcrud->column_callback('hotel_status', 'create_status_icon');
            $xcrud->column_callback('hotel_city', 'locationsInfo');
            $xcrud->column_class('thumbnail_image', 'zoom_img');
            $xcrud->change_type('thumbnail_image', 'image', false, array(
                'width' => 200,
                'path' => '../../' . PT_HOTELS_SLIDER_THUMBS_UPLOAD,
                'thumbs' => array(
                    array(
                        'height' => 150,
                        'width' => 120,
                        'crop' => true,
                        'marker' => ''
                    )
                )
            ));
            $this->data['content'] = $xcrud->render();
            $this->data['page_title'] = 'Hotels Management';
            $this->data['main_content'] = 'temp_view';
            $this->data['header_title'] = 'Hotels Management';
            $this->data['add_link'] = base_url() . $this->data['adminsegment'] . '/hotels/add';
            $this->load->helper('pt_LocationsInfo');
            $this->load->view('admin/template', $this->data);
        }
    }

    function index()
    {
        if (!$this->data['addpermission'] && !$this->editpermission && !$this->deletepermission) {
            backError_404($this->data);
        } else {
            $params = [];
            $params['hotel_city'] = $this->input->get('hotel_city') ? $this->input->get('hotel_city') : 56;
            $params['hotel_status'] = $this->input->get('hotel_status') ? $this->input->get('hotel_status') : null;
            $params['hotel_stars'] = $this->input->get('hotel_stars') ? $this->input->get('hotel_stars') : null;
            $params['hotel_status'] = $this->input->get('hotel_status') ? $this->input->get('hotel_status') : null;
            $params['hotel_title'] = $this->input->get('hotel_title') ? $this->input->get('hotel_title') : null;
            $params['hotel_is_featured'] = $this->input->get('hotel_is_featured') ? $this->input->get('hotel_is_featured') : null;
            $limit = $this->input->get('limit') ? $this->input->get('limit') : 50;
            $page = $this->input->get('page') ? $this->input->get('page') : 1;
            $total_records = $this->hotels_model->search($params);
            $this->data['info'] = array('base' => base_url() . 'admin/hotels', 'totalrows' => $total_records, 'perpage' => $limit);
            $data = $this->hotels_model->search($params, $limit, $page);
            $locationArr = $photoArr = [];
            if (!empty($data)) {
                foreach ($data as $item) {
                    $locationArr[$item->hotel_city] = pt_LocationsInfo($item->hotel_city)->city;
                    $photoArr[$item->hotel_id] = pt_HotelPhotosCount($item->hotel_id);
                }
            }
            $this->data['content'] = $data;
            $this->data['locationArr'] = $locationArr;
            $this->data['photoArr'] = $photoArr;
            $this->data['page_title'] = 'Hotels Management';
            $this->data['main_content'] = 'temp_view';
            $this->data['main_content'] = 'hotels/index';
            $this->data['header_title'] = 'Hotels Management';
            $this->data['params'] = $params;
            $this->data['deletepermission'] = $this->deletepermission;
            $this->data['add_link'] = base_url() . $this->data['adminsegment'] . '/hotels/add';
            $this->data['locations'] = $this->locations_model->getLocationsBackend();
            $this->load->view('admin/template', $this->data);
        }
    }

    function settings()
    {
        $isadmin = $this->session->userdata('pt_logged_admin');
        if (empty($isadmin)) {
            redirect($this->data['adminsegment'] . '/hotels/');
        }

        $this->data['all_countries'] = $this->countries_model->get_all_countries();
        $updatesett = $this->input->post('updatesettings');
        $addsettings = $this->input->post('add');
        $updatetypesett = $this->input->post('updatetype');
        if (!empty($updatesett)) {
            $this->hotels_model->updateHotelSettings();
            redirect('admin/hotels/settings');
        }

        if (!empty($addsettings)) {
            $id = $this->hotels_model->addSettingsData();
            $this->hotels_model->updateSettingsTypeTranslation($this->input->post('translated'), $id);
            redirect('admin/hotels/settings');
        }

        if (!empty($updatetypesett)) {
            $this->hotels_model->updateSettingsData();
            $this->hotels_model->updateSettingsTypeTranslation($this->input->post('translated'), $this->input->post('settid'));
            redirect('admin/hotels/settings');
        }

        $this->LoadXcrudHotelSettings("hamenities");
        $this->LoadXcrudHotelSettings("htypes");
        $this->LoadXcrudHotelSettings("hpayments");
        $this->LoadXcrudHotelSettings("ramenities");
        $this->LoadXcrudHotelSettings("rtypes");
        $this->data['typeSettings'] = $this->hotels_model->get_hotel_settings_data();
        $this->data['all_hotels'] = $this->hotels_model->all_hotels_names();
        @$this->data['settings'] = $this->settings_model->get_front_settings("hotels");
        $this->data['main_content'] = 'hotels/settings';
        $this->data['page_title'] = 'Hotels Settings';
        $this->load->view('admin/template', $this->data);
    }

    // Add Hotels
    public function add()
    {

        if (!$this->data['addpermission']) {

            backError_404($this->data);
        } else {
            $this->load->model('admin/uploads_model');
            $addhotel = $this->input->post('submittype');
            $this->data['submittype'] = "add";
            if (!empty($addhotel)) {
                $this->form_validation->set_rules('hotelname', 'Hotel Name', 'trim|required');
                $this->form_validation->set_rules('hoteldesc', 'Description', 'trim|required');
                $this->form_validation->set_rules('hotelcity', 'Location', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                  
                    echo '<div class="alert alert-danger">' . validation_errors() . '</div><br />';
                } else {
                    
                    $hotelid = $this->hotels_model->add_hotel($this->data['userloggedin']);
                   
                    $this->hotels_model->add_translation($this->input->post('translated'), $hotelid);
                    $this->session->set_flashdata('flashmsgs', 'Hotel added Successfully');
                    echo "done";
                }
            } else {
            
                $this->data['main_content'] = 'hotels/manage';
                $this->data['page_title'] = 'Thêm khách sạn';
                $this->data['headingText'] = 'Thêm khách sạn';
                $this->data['default_checkin_out'] = $this->settings_model->get_default_checkin_out();
                $this->data['checkin'] = $this->data['default_checkin_out'][0]->front_checkin_time;
                $this->data['checkout'] = $this->data['default_checkin_out'][0]->front_checkout_time;
                $this->data['htypes'] = pt_get_hsettings_data("htypes");
                $this->data['hamts'] = pt_get_hsettings_data("hamenities");
                $this->data['hpayments'] = pt_get_hsettings_data("hpayments");
                $this->data['all_hotels'] = $this->hotels_model->select_related_hotels($this->data['userloggedin']);                
                $this->data['nears'] = $this->hotels_model->select_nearby();
                $this->load->model('admin/locations_model');
                $this->data['locations'] = $this->locations_model->getLocationsBackend();
                $this->load->view('admin/template', $this->data);
            }
        }
    }

    function manage($hotelslug)
    {
        if (empty($hotelslug)) {
            redirect($this->data['adminsegment'] . '/hotels/');
        }

        if (!$this->editpermission) {
            echo "<center><h1>Access Denied</h1></center>";
            backError_404($this->data);
        } else {
            $updatehotel = $this->input->post('submittype');
            $this->data['submittype'] = "update";
            $hotelid = $this->input->post('hotelid');
            if (!empty($updatehotel)) {
                $this->form_validation->set_rules('hotelname', 'Hotel Name', 'trim|required');
                $this->form_validation->set_rules('hoteldesc', 'Description', 'trim|required');
                $this->form_validation->set_rules('hotelcity', 'Location', 'trim|required');
                if ($this->form_validation->run() == FALSE) {
                    echo '<div class="alert alert-danger">' . validation_errors() . '</div><br />';
                } else {
                    $this->hotels_model->update_hotel($hotelid);
                    $this->hotels_model->update_translation($this->input->post('translated'), $hotelid);
                    $this->session->set_flashdata('flashmsgs', 'Hotel Updated Successfully');
                    echo "done";
                }
            } else {
                @$this->data['hdata'] = $this->hotels_model->get_hotel_data($hotelslug);
                $hg_detail_hotel = $this->data['hdata'][0];                
                $comfixed = @$this->data['hdata'][0]->hotel_comm_fixed;
                $comper = $this->data['hdata'][0]->hotel_comm_percentage;
                if ($comfixed > 0) {
                    $this->data['hoteldepositval'] = $comfixed;
                    $this->data['hoteldeposittype'] = "fixed";
                } else {
                    $this->data['hoteldepositval'] = $comper;
                    $this->data['hoteldeposittype'] = "percentage";
                }

                $taxfixed = $this->data['hdata'][0]->hotel_tax_fixed;
                $taxper = $this->data['hdata'][0]->hotel_tax_percentage;
                $salefixed = $this->data['hdata'][0]->hotel_is_sale_fixed;
                $saleper = $this->data['hdata'][0]->salefrom_percent;
                $servicefixed = $this->data['hdata'][0]->hotel_service_fixed;
                $serviceper = $this->data['hdata'][0]->hotel_service_percentage;
                $this->data['percent'] = $percent;
                if ($taxfixed > 0) {
                    $this->data['hoteltaxval'] = $taxfixed;
                    $this->data['hoteltaxtype'] = "fixed";
                } else {
                    $this->data['hoteltaxval'] = $taxper;
                    $this->data['hoteltaxtype'] = "percentage";
                }

                if ($salefixed > 0) {
                    $this->data['saleval'] = $salefixed;
                    $this->data['hotelsaletype'] = "fixed";
                } else {
                    $this->data['saleval'] = $saleper;
                    $this->data['hotelsaletype'] = "percentage";
                }

                if ($servicefixed > 0) {
                    $this->data['hotelserviceval'] = $servicefixed;
                    $this->data['hotelservicetype'] = "fixed";
                } else {
                    $this->data['hotelserviceval'] = $serviceper;
                    $this->data['hotelservicetype'] = "percentage";
                }

                if ($this->data['adminsegment'] == "supplier") {
                    if ($this->data['userloggedin'] != $this->data['hdata'][0]->hotel_owned_by) {
                        redirect($this->data['adminsegment'] . '/hotels/');
                    }
                }

                $this->data['main_content'] = 'hotels/manage';
                $this->data['page_title'] = 'Quản lý khách sạn';
                $this->data['headingText'] = 'Cập nhật: ' . $this->data['hdata'][0]->hotel_title;
                $this->data['checkin'] = $this->data['hdata'][0]->hotel_check_in;
                $this->data['checkout'] = $this->data['hdata'][0]->hotel_check_out;
                $this->data['hrelated'] = explode(",", $this->data['hdata'][0]->hotel_related);
                $this->data['hnear'] = explode(",", $this->data['hdata'][0]->near);
                $this->data['featuredfrom'] = pt_show_date_php($this->data['hdata'][0]->hotel_featured_from);
                $this->data['featuredto'] = pt_show_date_php($this->data['hdata'][0]->hotel_featured_to);
                $this->data['salefrom'] = pt_show_date_php($this->data['hdata'][0]->hotel_sale_from);
                $this->data['saleto'] = pt_show_date_php($this->data['hdata'][0]->hotel_sale_to);
                $this->data['htypes'] = pt_get_hsettings_data("htypes");
                $this->data['hamts'] = pt_get_hsettings_data("hamenities");
                $this->data['hotelamt'] = explode(",", $this->data['hdata'][0]->hotel_amenities);
                $this->data['hpayments'] = pt_get_hsettings_data("hpayments");
                $this->data['hotelpaytypes'] = explode(",", $this->data['hdata'][0]->hotel_payment_opt);
                
                
                if($hg_detail_hotel->hotel_city > 0){
                    $this->data['nears'] = $this->hotels_model->select_nearby($hg_detail_hotel->hotel_city);
                    
                    $this->data['all_hotels'] = $this->hotels_model->search(['hotel_city' => $hg_detail_hotel->hotel_city], 500, 0);
                                        
                }else{
                    $this->data['nears'] = $this->hotels_model->select_nearby();    
                    $this->data['all_hotels'] = $this->hotels_model->select_related_hotels($this->data['userloggedin']);
                }
                
                $this->load->model('admin/locations_model');
                $this->data['locations'] = $this->locations_model->getLocationsBackend();
                $this->data['hotelid'] = $this->data['hdata'][0]->hotel_id;
                $this->load->view('admin/template', $this->data);
            }
        }
    }

    // Rooms functions
    public function rooms($args = null, $editroom = null)
    {
        $isadmin = $this->session->userdata('pt_logged_admin');
        $userid = '';
        if (empty($isadmin)) {
            $userid = $this->session->userdata('pt_logged_supplier');
        }

        if (!$this->data['addpermission'] && !$this->editpermission && !$this->deletepermission) {
            backError_404($this->data);
        } else {

            $this->load->model('admin/uploads_model');
            if ($args == "updateorder") {
                $room_orderArr = $this->input->post('room_order');
                if (!empty($room_orderArr)) {
                    foreach ($room_orderArr as $room_id => $room_order) {
                        $this->rooms_model->update_room_order_new($room_id, $room_order, $this->data['userloggedin']);
                    }
                }
                redirect(base_url() . 'admin/hotels/rooms?room_hotel=' . $this->input->post('room_hotel'));
            }
            if ($args == 'add') {
                $this->data['submittype'] = "add";
                $addroom = $this->input->post('submittype');

                if (!empty($addroom)) {
                    $this->form_validation->set_rules('hotelid', 'Tên khách sạn', 'trim|required');

                    if ($this->form_validation->run() == FALSE) {
                        echo '<div class="alert alert-danger"><i class="fa fa-times-circle"></i> ' . validation_errors() . '</div><br />';
                    } else {
                        if (isset($_FILES['defaultphoto']) && !empty($_FILES['defaultphoto']['name'])) {
                            echo $this->uploads_model->__room_default();
                            $this->session->set_flashdata('flashmsgs', 'Thêm loại phòng thành công');
                        } else {
                            $roomid = $this->rooms_model->add_room($this->data['userloggedin']);
                            $this->rooms_model->add_translation($this->input->post('translated'), $roomid);
                            echo "done";
                            $this->session->set_flashdata('flashmsgs', 'Thêm loại phòng thành công');
                        }
                    }
                } else {
                    $room_hotel = $this->input->get('room_hotel') ? $this->input->get('room_hotel') : 0;
                    $isadmin = $this->session->userdata('pt_logged_admin');
                    $userid = '';
                    if (empty($isadmin)) {
                        $userid = $this->session->userdata('pt_logged_supplier');
                    }

                    $this->data['hotels'] = $this->hotels_model->all_hotels_names($userid);
                    $this->data['hotelid'] = $this->input->post('hotelid');
                    $this->data['main_content'] = 'hotels/rooms/manage';
                    $this->data['page_title'] = 'Thêm loại phòng';
                    $this->data['headingText'] = 'Thêm loại phòng';
                    $this->data['room_hotel'] = $room_hotel;
                    $this->load->view('admin/template', $this->data);
                }
            } elseif ($args == "manage" && !empty($editroom)) {
                $this->data['submittype'] = "update";
                $updateroom = $this->input->post('submittype');
                if (!empty($updateroom)) {
                    $room_id = $this->input->post('roomid');

                    if ($this->form_validation->run() == FALSE && validation_errors()) {
                        echo '<div class="alert alert-danger">' . validation_errors() . '</div><br />';
                    } else {
                        $this->rooms_model->update_room($room_id, $this->data['userloggedin']);
                        $this->rooms_model->update_translation($this->input->post('translated'), $room_id);
                        $this->session->set_flashdata('flashmsgs', 'Room Updated Successfully');
                        echo "done";
                    }
                } else {
                    $this->data['rdata'] = $this->rooms_model->getRoomData($editroom);
                    if (empty($this->data['rdata'])) {
                        redirect('admin/hotels/rooms/');
                    }

                    $isadmin = $this->session->userdata('pt_logged_admin');
                    $userid = '';
                    if (empty($isadmin)) {
                        $userid = $this->session->userdata('pt_logged_supplier');
                        $myrooms = pt_my_rooms($userid);
                        if (!in_array($editroom, $myrooms)) {
                            redirect('supplier/hotels');
                        }
                    }

                    $this->data['hotels'] = $this->hotels_model->all_hotels_names($userid);
                    $this->data['room_images'] = $this->rooms_model->room_images($editroom);
                    $selectedyear = $this->input->get("year");
                    $this->data['curryear'] = date("Y");
                    if ($selectedyear > date("Y") + 3 || $selectedyear < date("Y")) {
                        $selectedyear = date("Y");
                    }

                    if (empty($selectedyear)) {
                        $this->data['year'] = date("Y");
                    } else {
                        $this->data['year'] = $selectedyear;
                    }

                    $this->load->library('hotels/hotels_calendar_lib');
                    $this->data['calendar'] = $this->hotels_calendar_lib;
                    $this->data['main_content'] = 'hotels/rooms/manage';
                    $this->data['page_title'] = 'Cập nhật phòng';
                    $this->data['headingText'] = 'Cập nhật: ' . $this->data['rdata'][0]->room_title;
                    $saletype = $this->data['rdata'][0]->room_is_sale_type;
                    $saleval = $this->data['rdata'][0]->room_is_sale_val;
                    if ($saletype == 'fixed') {
                        $this->data['saleval'] = $saleval;
                        $this->data['rsaletype'] = "fixed";
                        $this->data['salefrom'] = pt_show_date_php($this->data['rdata'][0]->room_sale_from);
                        $this->data['saleto'] = pt_show_date_php($this->data['rdata'][0]->room_sale_to);
                    } else {
                        $this->data['saleval'] = $saleval;
                        $this->data['rsaletype'] = "percentage";
                        $this->data['salefrom'] = pt_show_date_php($this->data['rdata'][0]->room_sale_from);
                        $this->data['saleto'] = pt_show_date_php($this->data['rdata'][0]->room_sale_to);
                    }

                    $this->load->view('admin/template', $this->data);
                }
            } elseif ($args == "availability" && !empty($editroom)) {
                $room_count = GetRoomQuantity($editroom);
                $this->data['room_count'] = $room_count;

                $updateavail = $this->input->post('updateavail');
                if (!empty($updateavail)) {
                    $ids_list = $this->input->post('ids_list');
                    $ids_list_array = explode(',', $ids_list);
                    foreach ($ids_list_array as $key) {
                        $sql = 'UPDATE pt_rooms_availabilities SET ';
                        for ($day = 1; $day <= 31; $day++) {
                            $aval_day = isset($_POST['aval_' . $key . '_' . $day]) ? $_POST['aval_' . $key . '_' . $day] : '0';
                            if ($day > 1) $sql .= ', ';
                            $sql .= 'd' . $day . ' = ' . (int)$aval_day;
                        }

                        $sql .= ' WHERE id = ' . $key . ' AND room_id = ' . $editroom;
                        $this->db->query($sql);
                    }

                    $this->session->set_flashdata('flashmsgs', "Availability Updated Successfully");
                    redirect(current_url());
                }

                // end update availability

                $weeks = array(
                    'Su',
                    'Mo',
                    'Tu',
                    'We',
                    'Th',
                    'Fr',
                    'Sa'
                );
                $months = array(
                    '',
                    'January',
                    'February',
                    'March',
                    'April',
                    'May',
                    'June',
                    'July',
                    'August',
                    'September',
                    'October',
                    'November',
                    'December'
                );

                $year = isset($_REQUEST['year']) ? $_REQUEST['year'] : 'current';
                $ids_list = '';
                $output = '';
                $output_week_days = '';
                $current_month = date('m');
                $current_year = date('Y');
                $selected_year = ($year == 'next') ? $current_year + 1 : $current_year;
                $output .= '<input type="hidden" name="rid" value="' . $editroom . '">';
                $output .= '<input type="hidden" name="year" value="' . $year . '">';
                $output .= '<table cellpadding="0" cellspacing="0" border="0" width="100%">';
                $output .= '<tr><td colspan="39">&nbsp;</td></tr>';
                $count = 0;
                $week_day = date('w', mktime('0', '0', '0', '1', '1', $selected_year));

                // fill empty cells from the beginning of month line

                while ($count < $week_day) {
                    $td_class = (($count == 0 || $count == 6) ? 'day_td_w' : ''); // 0 - 'Sun', 6 - 'Sat'
                    $output_week_days .= '<td class="' . $td_class . '">' . $weeks[$count] . '</td>';
                    $count++;
                }

                // fill cells at the middle

                for ($day = 1; $day <= 31; $day++) {
                    $week_day = date('w', mktime('0', '0', '0', '1', $day, $selected_year));
                    $td_class = (($week_day == 0 || $week_day == 6) ? 'day_td_w' : ''); // 0 - 'Sun', 6 - 'Sat'
                    $output_week_days .= '<td class="' . $td_class . '">' . $weeks[$week_day] . '</td>';
                }

                $max_days = $count + 31;

                // fill empty cells at the end of month line

                if ($max_days < 37) {
                    $count = 0;
                    while ($count < (37 - $max_days)) {
                        $week_day++;
                        $count++;
                        $week_day_mod = $week_day % 7;
                        $td_class = (($week_day_mod == 0 || $week_day_mod == 6) ? 'day_td_w' : ''); // 0 - 'Sun', 6 - 'Sat'
                        $output_week_days .= '<td class="' . $td_class . '">' . $weeks[$week_day_mod] . '</td>';
                    }

                    $max_days += $count;
                }

                // draw week days

                $output .= '<tr style="text-align:center;background-color:#cccccc;">';
                $output .= '<td style="text-align:left;background-color:#ffffff;">';
                $output .= '<select name="selYear" class="changeyear" id="' . current_url() . '">';
                $output .= '<option value="current" ' . (($year == 'current') ? 'selected="selected"' : '') . '>' . $current_year . '</option>';
                $output .= '<option value="next" ' . (($year == 'next') ? 'selected="selected"' : '') . '>' . ($current_year + 1) . '</option>';
                $output .= '</select>';
                $output .= '</td>';
                $output .= '<td align="center" style="padding:0px 4px;background-color:#ffffff;">&nbsp;</td>';
                $output .= $output_week_days;
                $output .= '</tr>';
                $sql = 'SELECT * FROM pt_rooms_availabilities WHERE room_id = ' . $editroom . ' AND y = ' . (($selected_year == $current_year) ? '0' : '1') . ' ORDER BY m ASC';
                $room = $this->db->query($sql);
                foreach ($room->result() as $res) {
                    $selected_month = $res->m;
                    if ($selected_month == $current_month) $tr_class = 'm_current';
                    else $tr_class = (($i % 2 == 0) ? 'm_odd' : 'm_even');
                    $output .= '<tr align="center" class="' . $tr_class . '">';
                    $output .= '<td align="left"><br />&nbsp;<b>' . $months[$selected_month] . '</b></td>';
                    $output .= '<td><br /><span class="btn btn-default btn-xs pointer" id="' . $res->id . '" ><i class="fa fa-angle-double-right"></i></span></td>';
                    $max_day = GetMonthMaxDay($selected_year, $selected_month);

                    // fill empty cells from the beginning of month line

                    $count = date('w', mktime('0', '0', '0', $selected_month, 1, $selected_year));
                    $max_days -= $count; /* subtract days that were missed from the beginning of the month */
                    while ($count--) $output .= '<td></td>';

                    // fill cells at the middle

                    for ($day = 1; $day <= $max_day; $day++) {
                        $dd = 'd' . $day;
                        if ($res->$dd >= $room_count) {
                            $day_color = 'dc_all';
                        } else
                            if ($res->$dd > 0 && $res->$dd < $room_count) {
                                $day_color = 'dc_part';
                            } else {
                                $day_color = 'dc_none';
                            }

                        $week_day = date('w', mktime('0', '0', '0', $selected_month, $day, $selected_year));
                        $td_class = (($week_day == 0 || $week_day == 6) ? 'day_td_w' : 'day_td'); // 0 - 'Sun', 6 - 'Sat'
                        $output .= '<td class="' . $td_class . '"><label class="l_day">' . $day . '</label><br /><input class="txtval day_a ' . $day_color . '" maxlength="3" name="aval_' . $res->id . '_' . $day . '" id="aval_' . $res->id . '_' . $day . '" value="' . $res->$dd . '" data-current="' . $res->$dd . '"  data-max="' . $room_count . '" /></td>';
                    }

                    // fill empty cells at the end of the month line

                    while ($day <= $max_days) {
                        $output .= '<td></td>';
                        $day++;
                    }

                    $output .= '</tr>';
                    if ($ids_list != '') $ids_list .= ',' . $res->id;
                    else $ids_list = $res->id;
                }

                $output .= '<tr><td colspan="39">&nbsp;</td></tr>';
                $output .= '<tr><td colspan="39" nowrap="nowrap" height="5px"></td></tr>';
                $output .= '<tr><td colspan="39"><div class="dc_all" style="width:16px;height:15px;float: left;margin:1px;"></div> &nbsp;- Available</td></tr>';
                $output .= '<tr><td colspan="39"><div class="dc_part" style="width:16px;height:15px;float:left;margin:1px;"></div> &nbsp;- Partially Available </td></tr>';
                $output .= '<tr><td colspan="39"><div class="dc_none" style="width:16px;height:15px;float:left;margin:1px;"></div> &nbsp;- Not Available</td></tr>';
                $output .= '</table>';
                $output .= '<input type="hidden" name="ids_list" value="' . $ids_list . '">';
                $this->data['calendar'] = $output;
                $this->data['room'] = $this->rooms_model->getRoomData($editroom);
                $this->data['main_content'] = 'hotels/rooms/availability';
                $this->data['page_title'] = 'Room Availability';
                $this->load->view('admin/template', $this->data);
            } elseif ($args == "prices" && !empty($editroom)) {

                $this->data['delurl'] = base_url() . 'admin/hotelajaxcalls/deleteRoomPrice';
                $action = $this->input->post('action');
              
                $tab_active = $this->input->get('tab') ? $this->input->get('tab') : "main";
                $this->data['errormsg'] = '';
                
                //$listRoomPrices = $this->rooms_model->getListRoomPricesByRoom($editroom);
                //var_dump($listRoomPrices);die;
                if ($action == "add") { //them-gia-phong
                    $this->form_validation->set_rules('fromdate', 'From Date', 'trim|required');
                    $this->form_validation->set_rules('todate', 'To Date', 'trim|required');
                    if ($this->form_validation->run() == FALSE) {
                        $this->data['errormsg'] = '<div class="alert alert-danger">' . validation_errors() . '</div><br />';
                    } else {
                        $roomid = $this->input->post('roomid');                        
                        $this->rooms_model->addRoomPrices($roomid);
                        $typePost = $this->input->post('type');
                        if($typePost == 1){
                            $addUrl = "?tab=main#p_main";
                        }elseif($typePost == 2){
                            $addUrl = "?tab=km#p_km";
                        }elseif($typePost == 3){
                            $addUrl = "?tab=phuthu#p_extra";
                        }elseif($typePost == 4){
                            $addUrl = "?tab=uudai#p_uudai";
                        }
                        
                        redirect(base_url() . $this->data['adminsegment'] . '/hotels/rooms/prices/' . $roomid.$addUrl);
                    }
                } elseif ($action == "update") { //cap-nhat-gia-phong
                    $this->rooms_model->updateRoomPrices();
                    $typePost = $this->input->post('type');
                    if($typePost == 1){
                        $addUrl = "?tab=main#p_main";
                    }elseif($typePost == 2){
                        $addUrl = "?tab=km#p_km";
                    }elseif($typePost == 3){
                        $addUrl = "?tab=phuthu#p_extra";
                    }elseif($typePost == 4){
                        $addUrl = "?tab=uudai#p_uudai";
                    }
        
                    redirect(base_url() . $this->data['adminsegment'] . '/hotels/rooms/prices/' . $editroom.$addUrl);
                }
                $price_id = isset($_GET['price_id']) ? (int)$_GET['price_id'] : 0;
                $detailPrice = array();                            
                if ($price_id > 0) {
                    $detailPrice = $this->rooms_model->getDetailPrice($price_id);                    
                    $loiNhuanArr = $detailPrice[0]->profit != '' ? json_decode($detailPrice[0]->profit, true) : array(0,0,0,0,0,0,0,0,0); 
                    $loiNhuanMoneyArr = $detailPrice[0]->profit_money != '' ? json_decode($detailPrice[0]->profit_money, true) : array( '1' => 0, '2' => 0, '3' => 0,'4' => 0, '5' => 0, '6' => 0, '7' => 0, '8' => 0);                    
                }
                
                $this->data['prices'] = $this->rooms_model->getRoomPrices($editroom);
                $this->data['room'] = $this->rooms_model->getRoomData($editroom);
                $this->data['detailPrice'] = $detailPrice;
                $this->data['loiNhuanArr'] = $loiNhuanArr;
                $this->data['loiNhuanMoneyArr'] = $loiNhuanMoneyArr;                
                $this->data['roomid'] = $editroom;
                $this->data['main_content'] = 'hotels/rooms/prices';
                $this->data['page_title'] = 'Gía phòng';
                $this->data['tab_active'] = $tab_active;
                $this->load->view('admin/template', $this->data);
            } else {
                $params = [];
                $params['room_hotel'] = $this->input->get('room_hotel') ? $this->input->get('room_hotel') : null;
                $params['room_status'] = $this->input->get('room_status') ? $this->input->get('room_status') : null;
                $params['room_title'] = $this->input->get('room_title') ? $this->input->get('room_title') : null;
                $limit = $this->input->get('limit') ? $this->input->get('limit') : 50;
                $page = $this->input->get('page') ? $this->input->get('page') : 1;
                $total_records = $this->rooms_model->search($params);
                $this->data['info'] = array('base' => base_url() . 'admin/hotels/rooms', 'totalrows' => $total_records, 'perpage' => $limit);
                $data = $this->rooms_model->search($params, $limit, $page);
                $photoArr = [];
                if (!empty($data)) {
                    foreach ($data as $ro) {
                        $photoArr[$ro->room_id] = pt_RoomPhotosCount($ro->room_id);
                    }
                }

                $isadmin = $this->session->userdata('pt_logged_admin');
                $userid = '';
                if (empty($isadmin)) {
                    $userid = $this->session->userdata('pt_logged_supplier');
                    $myrooms = pt_my_rooms($userid);
                    if (!in_array($editroom, $myrooms)) {
                        redirect('supplier/hotels');
                    }
                }

                $this->data['hotels'] = $this->hotels_model->all_hotels_names($userid);
                $this->data['content'] = $data;
                $this->data['photoArr'] = $photoArr;
                $this->data['params'] = $params;
                $this->data['page_title'] = 'Quản lý loại phòng';
                $this->data['main_content'] = 'hotels/rooms/index';
                $this->data['header_title'] = 'Quản lý loại phòng';
                $this->data['deletepermission'] = $this->deletepermission;
                $this->data['add_link'] = base_url() . 'admin/hotels/rooms/add';
                $this->load->view('admin/template', $this->data);
            }
        }
    }

    function translate($hotelslug, $lang = null)
    {
        $this->load->library('hotels/hotels_lib');
        $this->hotels_lib->set_hotelid($hotelslug);
        $add = $this->input->post('add');
        $update = $this->input->post('update');
        if (empty($lang)) {
            $lang = $this->langdef;
        } else {
            $lang = $lang;
        }

        $this->data['lang'] = $lang;
        if (empty($hotelslug)) {
            redirect($this->data['adminsegment'] . '/hotels/');
        }

        if (!empty($add)) {
            $language = $this->input->post('langname');
            $hotelid = $this->input->post('hotelid');
            $this->hotels_model->add_translation($language, $hotelid);
            redirect($this->data['adminsegment'] . "/hotels/translate/" . $hotelslug . "/" . $language);
        }

        if (!empty($update)) {
            $slug = $this->hotels_model->update_translation($lang, $hotelslug);
            redirect($this->data['adminsegment'] . "/hotels/translate/" . $slug . "/" . $lang);
        }

        $hdata = $this->hotels_lib->hotel_details();
        if ($lang == $this->langdef) {
            $hotelsdata = $this->hotels_lib->hotel_short_details();
            $this->data['hotelsdata'] = $hotelsdata;
            $this->data['transpolicy'] = $hotelsdata[0]->hotel_policy;
            $this->data['transadditional'] = $hotelsdata[0]->hotel_additional_facilities;
            $this->data['transdesc'] = $hotelsdata[0]->hotel_desc;
            $this->data['transtitle'] = $hotelsdata[0]->hotel_title;
        } else {
            $hotelsdata = $this->hotels_lib->translated_data($lang);
            $this->data['hotelsdata'] = $hotelsdata;
            $this->data['transid'] = $hotelsdata[0]->trans_id;
            $this->data['transpolicy'] = $hotelsdata[0]->trans_policy;
            $this->data['transadditional'] = $hotelsdata[0]->trans_additional;
            $this->data['transdesc'] = $hotelsdata[0]->trans_desc;
            $this->data['transtitle'] = $hotelsdata[0]->trans_title;
        }

        $this->data['hotelid'] = $this->hotels_lib->get_id();
        $this->data['lang'] = $lang;
        $this->data['slug'] = $hotelslug;
        $this->data['language_list'] = pt_get_languages();
        if ($this->data['adminsegment'] == "supplier") {
            if ($this->data['userloggedin'] != $hdata[0]->hotel_owned_by) {
                redirect($this->data['adminsegment'] . '/hotels/');
            }
        }

        $this->data['main_content'] = 'hotels/translate';
        $this->data['page_title'] = 'Translate Hotel';
        $this->load->view('admin/template', $this->data);
    }

    function gallery($id)
    {
        $this->load->library('hotels/hotels_lib');
        $this->hotels_lib->set_hotelid($id);
        $this->data['itemid'] = $this->hotels_lib->get_id();
        $this->data['images'] = $this->hotels_model->hotelGallery($id);
        $this->data['imgorderUrl'] = base_url() . 'admin/hotelajaxcalls/update_image_order';
        $this->data['uploadUrl'] = base_url() . 'hotels/hotelsback/galleryUpload/hotels/';
        $this->data['delimgUrl'] = base_url() . 'admin/hotelajaxcalls/delete_image';
        $this->data['appRejUrl'] = base_url() . 'admin/hotelajaxcalls/app_rej_himages';
        $this->data['makeThumbUrl'] = base_url() . 'admin/hotelajaxcalls/makethumb';
        $this->data['delMultipleImgsUrl'] = base_url() . 'admin/hotelajaxcalls/deleteMultipleHotelImages';
        $this->data['fullImgDir'] = PT_HOTELS_SLIDER;
        $this->data['thumbsDir'] = PT_HOTELS_SLIDER_THUMBS;
        $this->data['main_content'] = 'hotels/gallery';
        $this->data['page_title'] = 'Hình khách sạn';
        $this->data['detailHotel'] = $this->hotels_lib->hotel_details();
        $this->load->view('admin/template', $this->data);
    }

    function roomgallery($id)
    {
        $this->data['images'] = $this->rooms_model->roomGallery($id);
        $this->data['imgorderUrl'] = base_url() . 'admin/hotelajaxcalls/update_room_image_order';
        $this->data['uploadUrl'] = base_url() . 'hotels/hotelsback/galleryUpload/rooms/';
        $this->data['delimgUrl'] = base_url() . 'admin/hotelajaxcalls/delete_room_image';
        $this->data['appRejUrl'] = base_url() . 'admin/hotelajaxcalls/app_rej_rimages';
        $this->data['makeThumbUrl'] = base_url() . 'admin/hotelajaxcalls/room_makethumb';
        $this->data['delMultipleImgsUrl'] = base_url() . 'admin/hotelajaxcalls/deleteMultipleRoomImages';
        $this->data['fullImgDir'] = PT_ROOMS_IMAGES;
        $this->data['thumbsDir'] = PT_ROOMS_THUMBS;
        $this->data['itemid'] = $id;
        $this->data['room'] = $this->rooms_model->getRoomData($id);
        $this->data['main_content'] = 'hotels/gallery';
        $this->data['page_title'] = 'Hình ảnh phòng';
        $this->load->view('admin/template', $this->data);
    }

    function galleryUpload($type, $id)
    {
        $this->load->library('image_lib');
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $fileName = $_FILES['file']['name'];
            $fileName = str_replace(" ", "-", $_FILES['file']['name']);
            $fig = rand(1, 999999);
            $saveFile = $fig . '_' . $fileName;
            if (strpos($fileName, 'php') !== false) {
            } else {
                if ($type == "hotels") {
                    $targetPath = PT_HOTELS_SLIDER_UPLOAD;
                } elseif ($type == "rooms") {
                    $targetPath = PT_ROOMS_IMAGES_UPLOAD;
                }

                $targetFile = $targetPath . $saveFile;
                move_uploaded_file($tempFile, $targetFile);
                $config['image_library'] = 'gd2';
                $config['source_image'] = $targetFile;
                if ($type == "hotels") {
                    $config['new_image'] = PT_HOTELS_SLIDER_THUMBS_UPLOAD;
                } elseif ($type == "rooms") {
                    $config['new_image'] = PT_ROOMS_THUMBS_UPLOAD;
                }

                $config['thumb_marker'] = '';
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = HOTEL_THUMB_WIDTH;
                $config['height'] = HOTEL_THUMB_HEIGHT;
                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
                modules::run('admin/watermark/apply', $targetFile);
                if ($type == "hotels") {
                    /* Add images name to database with respective hotel id */
                    $this->hotels_model->addPhotos($id, $saveFile);
                } elseif ($type == "rooms") {
                    /* Add images name to database with respective room id */
                    $this->rooms_model->addPhotos($id, $saveFile);
                }
            }
        }
    }

    function LoadXcrudHotelSettings($type)
    {
        $xc = xcrud_get_instance();
        $xc->table('pt_hotels_types_settings');
        $xc->where('sett_type', $type);
        $xc->order_by('sett_id', 'desc');
        $xc->button('#sett{sett_id}', 'Edit', 'fa fa-edit', 'btn btn-warning', array(
            'data-toggle' => 'modal'
        ));
        $delurl = base_url() . 'admin/hotelajaxcalls/delTypeSettings';
        $xc->button("javascript: delfunc('{sett_id}','$delurl')", 'DELETE', 'fa fa-times', 'btn-danger', array(
            'target' => '_self',
            'id' => '{sett_id}'
        ));
        if ($type == "rtypes" || $type == "htypes") {
            $xc->columns('sett_name,sett_status');
        } else {
            if ($type == "hamenities") {
                $xc->columns('sett_img,sett_name,sett_selected,sett_status');
                $xc->column_class('sett_img', 'zoom_img');
                $xc->change_type('sett_img', 'image', false, array(
                    'width' => 200,
                    'path' => '../../' . PT_HOTELS_ICONS_UPLOAD,
                    'thumbs' => array(
                        array(
                            'height' => 150,
                            'width' => 120,
                            'crop' => true,
                            'marker' => ''
                        )
                    )
                ));
            } else {
                $xc->columns('sett_name,sett_selected,sett_status');
            }
        }

        $xc->search_columns('sett_name,sett_selected,sett_status');
        $xc->label('sett_name', 'Name')->label('sett_selected', 'Selected')->label('sett_status', 'Status')->label('sett_img', 'Icon');
        $xc->unset_add();
        $xc->unset_edit();
        $xc->unset_remove();
        $xc->unset_view();
        $xc->multiDelUrl = base_url() . 'admin/hotelajaxcalls/delMultiTypeSettings/' . $type;
        $this->data['content' . $type] = $xc->render();
    }

    function extras()
    {
        if ($this->data['adminsegment'] == "supplier") {
            $supplierHotels = $this->hotels_model->all_hotels($this->data['userloggedin']);
            $allhotels = $this->hotels_model->all_hotels();
            echo modules::run('admin/extras/listings', 'hotels', $allhotels, $supplierHotels);
        } else {
            $hotels = $this->hotels_model->all_hotels();
            echo modules::run('admin/extras/listings', 'hotels', $hotels);
        }
    }

    function reviews()
    {
        echo modules::run('admin/reviews/listings', 'hotels');
    }

    function nearby_ajax()
    {       
        $this->load->model('admin/hotels_model');
        $city_id = (int)$_GET['city_id'];         
        $this->data['nears'] = $nears = $this->hotels_model->select_nearby($city_id);           
        foreach($nears as $near){ 
                    
            $eachnear = explode(',', $near->near); 
            foreach($eachnear as $item){
                echo '<option value="'.trim($item).'">'.$item.'</option>';
            }
        }
    }
    function hotel_by_city()
    {
        $hotel_city = $this->input->get('hotel_city');

        $data = $this->hotels_model->search(['hotel_city' => $hotel_city], 500, 0);
        echo '<option value="">--Chọn--</option>';
        if (!empty($data)) {
            foreach ($data as $hotel) {
                echo '<option value="' . $hotel->hotel_id . '">' . $hotel->hotel_title . '</option>';
            }
        }
    }
}