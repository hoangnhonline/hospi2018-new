<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eanback extends MX_Controller {


    private $data = array();


	function __construct(){
    $seturl =  $this->uri->segment(3);

      if($seturl != "settings"){
        $chk = modules::run('home/is_main_module_enabled','ean');
   if(!$chk){
       backError_404($this->data);

   }
      }
     $checkingadmin = $this->session->userdata('pt_logged_admin');
    if(!empty($checkingadmin)){

      $this->data['userloggedin'] = $this->session->userdata('pt_logged_admin');

    }else{
      redirect(base_url());
    }

    $this->load->helper('settings');
    $this->load->model('ean/ean_model');
    $this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
    $this->data['isSuperAdmin'] = $this->session->userdata('pt_logged_super_admin');


    }

    function index(){

    }


    function settings(){

    $updatesett = $this->input->post('updatesettings');

    if(!empty($updatesett)){

    $this->ean_model->update_front_settings();
    redirect('admin/ean/settings');

    }

    $this->data['languages'] = $this->ean_model->languagesList();
    $this->data['settings'] = $this->settings_model->get_front_settings("ean");
    $homePageTopCities = json_decode($this->data['settings'][0]->front_top_cities); 
    $this->data['popularCity'] = $homePageTopCities->p;
    $this->data['featuredCity'] = $homePageTopCities->f;

    $this->data['main_content'] = 'ean/settings';
	$this->data['page_title'] = 'Ean Settings';

	$this->load->view('admin/template',$this->data);

    }

     function bookings(){



        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('pt_ean_booking');
        $xcrud->join('book_user', 'pt_accounts', 'accounts_id');
        $xcrud->order_by('book_id', 'desc');
        $xcrud->columns('book_id,pt_accounts.ai_first_name,book_hotel,book_date,book_total,book_itineraryid,book_confirmation');
        $xcrud->label('book_id', 'ID')->label('pt_accounts.ai_first_name', 'Customer')->label('book_hotel', 'Hotel Name')->label('book_date', 'Date')->label('book_total', 'Total')->label('book_itineraryid', 'Itinerary ID')->label('book_confirmation', 'Confirmation No.');
        $xcrud->column_callback('book_date', 'fmtDate');
        $xcrud->search_columns('book_id,pt_accounts.ai_first_name,book_itineraryid');
        $xcrud->button(base_url() . 'invoice/?eid={book_id}&sessid={book_itineraryid}', 'View Invoice', 'fa fa-search-plus', 'btn btn-primary', array('target' => '_blank'));
 /*        if($this->editpermission){
        $xcrud->button(base_url() . $this->data['adminsegment'] . '/bookings/edit/{booking_type}/{booking_id}', 'Edit', 'fa fa-edit', 'btn btn-warning', array('target' => '_self'));
        }*/

       /*  if($this->deletepermission){
        $delurl = base_url() . 'admin/bookings/delBooking';

        $xcrud->button("javascript: delfunc('{booking_id}','$delurl')",'DELETE','fa fa-times','btn-danger',array('target'=>'_self','id' => '{booking_id}'));
        }*/

        $delurl = base_url() . 'ean/eanback/delBooking';

        $xcrud->multiDelUrl = base_url().'ean/eanback/delMultipleBookings';

        $xcrud->button("javascript: delfunc('{book_id}','$delurl')",'DELETE','fa fa-times','btn-danger',array('target'=>'_self','id' => '{book_id}'));
       

        $this->data['add_link'] = '';
        $xcrud->unset_add();
        $xcrud->unset_view();
        $xcrud->unset_remove();
        $xcrud->unset_edit();
        $this->data['content'] = $xcrud->render();
        $this->data['page_title'] = 'Expedia Booking Management';
        $this->data['main_content'] = 'temp_view';
        $this->data['header_title'] = 'Expedia Booking Management';
        $this->load->view('template', $this->data);


    }




    function dashboardBookings(){

        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('pt_ean_booking');
        $xcrud->join('book_user', 'pt_accounts', 'accounts_id');
        $xcrud->order_by('book_id', 'desc');
        $xcrud->columns('book_id,pt_accounts.ai_first_name,book_hotel,book_date,book_total,book_itineraryid,book_confirmation');
        $xcrud->label('book_id', 'ID')->label('pt_accounts.ai_first_name', 'Customer')->label('book_hotel', 'Hotel Name')->label('book_date', 'Date')->label('book_total', 'Total')->label('book_itineraryid', 'Itinerary ID')->label('book_confirmation', 'Confirmation No.');
        $xcrud->column_callback('book_date', 'fmtDate');
        $xcrud->search_columns('book_id,pt_accounts.ai_first_name,book_itineraryid');
        $xcrud->button(base_url() . 'invoice/?eid={book_id}&sessid={book_itineraryid}', 'View Invoice', 'fa fa-search-plus', 'btn btn-primary', array('target' => '_blank'));

         $delurl = base_url() . 'ean/eanback/delBooking';
         $xcrud->multiDelUrl = base_url().'ean/eanback/delMultipleBookings';

        $xcrud->button("javascript: delfunc('{book_id}','$delurl')",'DELETE','fa fa-times','btn-danger',array('target'=>'_self','id' => '{book_id}'));
       
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
        $this->data['header_title'] = 'Expedia Bookings gần đây';
        


        $this->load->view('temp_view', $this->data);    
       
        

    }


    // delete single booking
    function delBooking() {

        if (!$this->input->is_ajax_request()) {
            redirect('admin');
        }
        else {
            $id = $this->input->post('id');
            $this->ean_model->delete_booking($id);
            $this->session->set_flashdata('flashmsgs', "Deleted Successfully");
        }
    }

    // delete multiple booking
    function delMultipleBookings() {

        if (!$this->input->is_ajax_request()) {
            redirect('admin');
        }
        else {
            $items = $this->input->post('items');
            foreach($items as $item){
                $this->ean_model->delete_booking($item);
            
            }

            }
    }

}