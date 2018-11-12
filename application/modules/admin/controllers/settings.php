<?php
if (!defined('BASEPATH'))
		exit ('No direct script access allowed');

class Settings extends MX_Controller {
		private $data = array();
		public $role;
		public $langdef;

		function __construct() {
				modules :: load('admin');
				 $seturl = $this->uri->segment(3);
		        if ($seturl != "settings") {
		            $chk = modules:: run('home/is_main_module_enabled', 'blog');
		            if (!$chk) {
		                redirect("admin");
		            }
		        }

				$chkadmin = modules :: run('admin/validadmin');
				$superAdmin = $this->session->userdata('pt_logged_super_admin');

				if (!$chkadmin || !$superAdmin) {
					$this->session->set_userdata('prevURL', current_url());
				

						redirect(base_url().'admin');
										
				}

				$this->data['userloggedin'] = $this->session->userdata('pt_logged_admin');
                $this->langdef = DEFLANG;
                $this->data['languages'] = pt_get_languages();
                $this->data['isadmin'] = $this->session->userdata('pt_logged_admin');
                $this->role = $this->session->userdata('pt_role');
				$this->data['role'] = $this->role;
				$this->data['isSuperAdmin'] = $superAdmin;
				

				
        }

		public function index() {
				$this->app_settings();
		}

		public function app_settings() {
		        $this->load->helper('themes');
				$this->load->model('admin/uploads_model');
				$this->load->model('admin/emails_model');
				$this->load->model('payments_model');
                $this->load->library('browser');
                $this->data['browserlib'] = $this->browser;
                $this->data['themes'] = directory_map('./themes/',2);
				$seosettings = $this->input->post('seosettings');
				$globalsettings = $this->input->post('globalsettings');
				$updatecurr = $this->input->post('updatecurr');
				$currlist = $this->input->post('default_currencies');
				$bhrs_update = $this->input->post('bhrs_update');
				$watermark_settings = $this->input->post('watermark_settings');
				$mailserver_settings = $this->input->post('mailserver_update');
				//$securitysettings = $this->input->post('securitysettings');
				//$mobilesettings = $this->input->post('mobilesettings');

				if (!empty ($updatecurr)) {
						$this->settings_model->update_currency_code();
						if (!empty ($currlist)) {
								foreach ($currlist as $cl) {
										$this->settings_model->udpate_currencies($cl);
								}
								$this->settings_model->change_currencies_status($currlist);
						}
						$this->data['successmsg'] = "Updated Successfully";
				}
				if (!empty ($globalsettings)) {
						$error = true;
						$this->settings_model->update_settings();
						$this->settings_model->update_seo_settings();
						$this->settings_model->update_js();
						$this->settings_model->update_contact_page_details();
						$this->settings_model->update_watermark_data();
                        $mails = $this->input->post('defmailer');
						if ($mails == 'smtp') {
								$this->form_validation->set_rules('smtppass', 'SMTP Password', 'required');
								$this->form_validation->set_rules('smtpuser', 'SMTP Username', 'trim|required');
								$this->form_validation->set_rules('smtphost', 'SMTP Hostname', 'trim|required');
								$this->form_validation->set_rules('smtpport', 'SMTP Port', 'trim|required');
								if ($this->form_validation->run() == FALSE) {
								}
								else {
										$this->emails_model->update_mailserver();
										$this->data['successmsg'] = "Updated Successfully";
								}
						}
						else {
								$this->emails_model->update_mailserver();
								$this->data['successmsg'] = "Updated Successfully";
						}
						$this->settings_model->update_facebook_settings();
						$error = false;
						if (!empty ($_FILES['hlogo']) && !empty ($_FILES['hlogo']['name'])) {
								$res = $this->uploads_model->__fav_and_logo("hlogo");
								if ($res == "success") {
										$error = false;
								}
								else {
									$this->session->set_flashdata('flashmsgs', $res);
										$error = true;
										$errortxt = $res;
								}
						}
						if (!empty ($_FILES['flogo']) && !empty ($_FILES['flogo']['name'])) {
								$ress = $this->uploads_model->__fav_and_logo("flogo");
								if ($ress == "success") {
										$error = false;
								}
								else {
									$this->session->set_flashdata('flashmsgs', $ress);
										$error = true;
										$errortxt = $ress;
								}
						}
						if (!empty ($_FILES['favimg']) && !empty ($_FILES['favimg']['name'])) {
								$resss = $this->uploads_model->__fav_and_logo("favimg");
								if ($resss == "success") {
										$error = false;
								}
								else {
									    $this->session->set_flashdata('flashmsgs', $resss);
										$error = true;
										$errortxt = $resss;
								}
						}

						if (!empty ($_FILES['wmimg']) && !empty ($_FILES['wmimg']['name'])) {
								$resWm = $this->uploads_model->__fav_and_logo("wmimg");
								if ($resWm == "success") {
										$error = false;
								}
								else {
									    $this->session->set_flashdata('flashmsgs', $resWm);
										$error = true;
										$errortxt = $resWm;
								}
						}

						if ($error == FALSE) {
								$this->data['successmsg'] = "Updated Successfully";
						}
						else {
								$this->data['errormsg'] = $errortxt;
						}

                       redirect(base_url().'admin/settings/','refresh');
                        
                        
				}
				
				/*if (!empty ($securitysettings)) {
						$this->settings_model->update_security();
						$this->data['successmsg'] = "Updated Successfully";
				}
			
				if (!empty ($mobilesettings)) {
						$this->settings_model->update_mobile_settings();
						$this->data['successmsg'] = "Updated Successfully";
				}*/
				$paymentdata = $this->payments_model->getAllPaymentsBack();
				$this->data['all_payments'] = $paymentdata;
				$this->data['contact_data'] = $this->settings_model->get_contact_page_details();
                                $this->data['tel'] = $this->settings_model->get_contact_page_details();
                                $this->data['fax'] = $this->settings_model->get_contact_page_details();
				$this->data['settings'] = $this->settings_model->get_settings_data();
				$this->data['wm_settings'] = $this->settings_model->get_watermark_data();
				$this->data['currencies'] = $this->settings_model->get_currencies();
				$this->data['mailserver'] = $this->emails_model->get_mailserver();
				$this->data['fbsettings'] = $this->settings_model->get_facebook_settings();
				$flashMsg = $this->session->flashdata('flashmsgs');
				if(!empty($flashMsg)){
				$this->data['errormsg'] = $flashMsg;	
				}

				$this->data['main_content'] = 'settings/application-settings';
				$this->data['page_title'] = 'Application Settings';
				$this->load->view('template', $this->data);
		}

		public function modules() {
				$this->data['modules'] = $this->modules_model->get_all_modules();
				$this->data['main_content'] = 'settings/modules';
				$this->data['page_title'] = 'Modules';
				$this->load->view('template', $this->data);
		}

		public function widgets($args = null, $widgetid = null) {

			$this->load->library('ckeditor');
			$this->data['ckconfig'] = array();
			$this->data['ckconfig']['toolbar'] = array(array('Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'Format', 'Styles'), array('NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote'), array('Image', 'Link', 'Unlink', 'Anchor', 'Table', 'HorizontalRule', 'SpecialChar', 'Maximize'), array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt'),);
			$this->data['ckconfig']['language'] = 'en';
			$this->data['ckconfig']['height'] = '350px';
			$this->data['ckconfig']['filebrowserUploadUrl'] =  base_url().'home/cmsupload';
			$this->load->model("admin/widgets_model");
                        $this->load->model('admin/locations_model');
                        $this->data['locations'] = $this->locations_model->getLocationsBackend();

	if ($args == 'add') {
						$action = $this->input->post('action');
						if ($action == "add") {
								$this->form_validation->set_rules('title', 'Widget Name', 'trim|required');
								$this->form_validation->set_rules('widgetbody', 'Widget Content', 'trim');
								if ($this->form_validation->run() == FALSE) {
								}
								else {
										$widgetid = $this->widgets_model->addWidget();
                                        $this->session->set_flashdata('flashmsgs', 'Widget added Successfully');
										redirect(base_url().'admin/settings/widgets');

								}
						}
						$this->data['action'] = 'add';
						$this->data['main_content'] = 'settings/manage_widgets_new';
						$this->data['page_title'] = 'Widgets - Add Widget';
						$this->load->view('template', $this->data);
				}
				elseif ($args == 'edit') {

						if (empty ($widgetid)) {
								redirect(base_url().'admin/settings/widgets');
						}
						else {
								$updatepage = $this->input->post('action');
								if ($updatepage == "update") {
								     	$pagetitle = $this->input->post('title');
										$this->form_validation->set_rules('title', 'Widget Name', 'trim|required');

										if ($this->form_validation->run() == FALSE) {
										}
										else {
											$this->widgets_model->updateWidget($widgetid); 
											redirect(base_url().'admin/settings/widgets');                                              

										}
								}
			
								$this->data['widgetid'] = $widgetid;
								$this->data['action'] = "update";
								$this->data['details'] = $this->widgets_model->getWidgetDetails($widgetid);
								$this->data['main_content'] = 'settings/manage_widgets_new';
								$this->data['page_title'] = 'Widgets - Edit Page';
								$this->load->view('template', $this->data);
						}
				}else{

				$this->load->helper('xcrud');
				$xcrud = xcrud_get_instance();
				$xcrud->table('pt_widgets');
				$xcrud->order_by('widget_id','desc');
				$xcrud->columns('widget_name,widget_id, widget_location');
				$xcrud->label('widget_id','Widget Code');
				$xcrud->column_callback('widget_id', 'widgetCode');
				$xcrud->search_columns('widget_name,widget_location');
				$xcrud->fields('widget_name,widget_location,widget_content');
				$xcrud->limit(50);

				$xcrud->unset_add();
				$xcrud->unset_view();
				$xcrud->unset_edit();

				$this->data['addpermission'] = true;

				$this->data['add_link'] = base_url().'admin/settings/widgets/add';

				$xcrud->button(base_url() .'admin/settings/widgets/edit/{widget_id}', 'Edit', 'fa fa-edit', 'btn btn-warning', array('target' => '_self'));
                

				$xcrud->multiDelUrl = base_url().'admin/ajaxcalls/delMultipleWidgets';
				$this->data['content'] = $xcrud->render();

			    $this->db->order_by('widget_id', 'desc');
			    $query = $this->db->get('pt_widgets');
			    $count = $query->num_rows();  
		        $page = $this->input->get('page') ? $this->input->get('page') : 1;
			    $limit = $this->input->get('limit') ? $this->input->get('limit') : 20;

                $offset = ($page == 1) ? 0 : ($page * $limit) - $limit;
        		$this->db->order_by('widget_id', 'desc');
       			$query = $this->db->get('pt_widgets', $limit, $offset);
                $datas =  $query->result();
		        $this->data['datas'] = $datas ;
		        $this->data['info'] = array('base' => base_url() . 'admin/settings/widgets', 'totalrows' => $count, 'perpage' => $limit);
		       //  echo $count .' '  .$limit ;die;
				//$this->data['dontload'] = "yes";
				$this->data['page_title'] = 'Widgets Management';
				$this->data['main_content'] = 'settings/manage_widgets_list';
				//$this->data['main_content'] = 'temp_view';
				$this->data['header_title'] = 'Widgets Management';
				$this->load->view('admin/template', $this->data);

				}	

				}


				
		public function editPaymentMethod(){
			//var_dump($_POST);die;
			 $data = array('value' => $_POST['payment_method_name'] );
			  $this->db->where('setting','name');
	      $this->db->where('gateway',$_GET['payment_type']);
	      $this->db->update('pt_paymentgateways',$data);

	     // $this->db->where('setting',$_POST['payment_method_name'] );
	      			// $data = array('value' => $_POST['payment_method_content'] );
	     
	       $data = array('value' => $_POST['payment_method_content'] );
		   $this->db->where('setting','instructions');
	      $this->db->where('gateway',$_GET['payment_type']);
	      $this->db->update('pt_paymentgateways',$data);
			redirect(base_url().'admin/settings/paymentgateways');

		}
			
		public function editAtm(){
			//var_dump($_POST);die;
			 $data = array('value' => $_POST['atm_content'] );
	      $this->db->where('setting',$_POST['atm_name'] );
	      $this->db->where('gateway',"banktransfer");
	      $this->db->update('pt_paymentgateways',$data);

			redirect(base_url().'admin/settings/paymentgateways');

		}
		public function addAtm(){
			//var_dump($_POST);die;
			 $data = array('value' => $_POST['atm_content'] ,'setting'=>$_POST['atm_name'],'gateway'=>"banktransfer"  );//var_dump($data);die
	      $this->db->insert('pt_paymentgateways',$data);
			redirect(base_url().'admin/settings/paymentgateways');

		}
		public function removeAtm(){
	      $this->db->where('setting',$_GET['bankname'] );
	      //$this->db->where('gateway',"banktransfer");
	      $this->db->delete('pt_paymentgateways',$data);
			redirect(base_url().'admin/settings/paymentgateways');

		}
		public function paymentgateways() {
				$this->load->model('payments_model');
				$action = $this->input->post('action');
				if ($action == "activate") {

					$gateway = $this->input->post('gateway');
					$gatewayconfig = $this->payments_model->getGatewayConfigData($gateway);
					$this->payments_model->activateGateway($gatewayconfig);
					redirect(base_url().'admin/settings/paymentgateways');
				}
				if ($action == "save") {

					//print_r($this->input->post()); exit;
					$this->payments_model->updateGateway();
					redirect(base_url().'admin/settings/paymentgateways');
				}
				if ($action == "deactivate") {

					$this->payments_model->deActivateGateway();
					redirect(base_url().'admin/settings/paymentgateways');
				}
				$this->data['all_payments'] = $this->payments_model->getAllPaymentsBack();

				//sort on basic of order
				usort($this->data['all_payments']['activeGateways'], function($a, $b) {
					return $a['order'] - $b['order'];
					});
				//end sort on basis of order
				$atmList= $this->data['all_payments']['activeGateways'][0]['gatewayValues']['banktransfer'] ;
				unset($atmList['name']);
								unset($atmList['order']);
				unset($atmList['instructions']);
				unset($atmList['visible']);
				unset($atmList['type']);

				//echo "<pre>";print_r($this->data['all_payments']);echo "</pre>";die;

				//echo "<pre>";print_r($atmList);echo "</pre>";die;
				$this->data['atmList'] = $atmList;

				$this->data['main_content'] = 'settings/payment-gateways_new';
				$this->data['page_title'] = 'Payment Gateways';
				$this->load->view('template_new', $this->data);
		}

		public function themesettings() {
				$this->load->helper('directory');
				$this->load->helper('themes');
				$uploadtheme = $this->input->post('uploadtheme');
				if (!empty ($uploadtheme)) {
//  $this->data['msg'] =  $this->settings_model->pt_install_theme();
				}
				$this->data['currtheme'] = $this->settings_model->get_theme();
				$this->data['main_content'] = 'settings/themesettings';
				$this->data['page_title'] = 'Theme Settings';
				$this->load->view('template', $this->data);
		}

		public function sliders($trans = null, $id = null, $lang = null) {

        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('pt_sliders');

        if (!empty ($trans) && !empty ($id)) {
						$this->load->library('sliders_lib');
                        $this->data['sliderlib'] = $this->sliders_lib;
						$this->sliders_lib->set_id($id);

						$update = $this->input->post('update');

						if (empty ($id)) {
								redirect(base_url().'admin/sliders/');
						}

						if (!empty ($update)) {
						  $this->sliders_lib->update_translation($this->input->post('translated'),$id);
                      	  redirect("admin/settings/sliders/translate/" . $id);
						}

						$this->data['slideid'] = $this->sliders_lib->get_id();
						$this->data['lang'] = $lang;
 						$this->data['main_content'] = 'settings/slidertranslate';
						$this->data['page_title'] = 'Translate Slide';
						$this->load->view('template', $this->data);
				}else{
                        $xcrud->change_type('slide_image', 'image', false, array(              
                        'path' => '../../'.PT_SLIDER_IMAGES_UPLOAD
                        ));
                        $xcrud->columns('slide_image,slide_link,slide_link_name,slide_title_text,slide_desc_text,slide_optional_text,slide_status,slide_order');
                        $xcrud->fields('slide_image,slide_link,slide_link_name,slide_title_text,slide_desc_text,slide_optional_text, slide_status'); // fields in details
                        $xcrud->column_callback('slide_order', 'orderInputSlider');
                        //$xcrud->column_callback('slide_link', 'translateSlider');
                        $xcrud->column_class('slide_image','zoom_img');
                        $xcrud->label('slide_link','Link');
                        $xcrud->label('slide_link_name','Tên slide');
                        $xcrud->label('slide_image','Hình ảnh');
                        $xcrud->label('slide_title_text','Tiêu đề');
                        $xcrud->label('slide_desc_text','Mô tả');
                        $xcrud->label('slide_optional_text','Tùy chọn');
                        $xcrud->label('slide_status','Tình trạng');
                        $xcrud->label('slide_order','Vị trí');

                        $xcrud->multiDelUrl = base_url().'admin/ajaxcalls/delMultipleSlides';
                        

                        $this->data['content'] = $xcrud->render();
                        $this->data['page_title'] = 'Quản lý Slider ';
                        $this->data['main_content'] = 'temp_view';
                        $this->data['header_title'] = 'Quản lý Slider ';
                        $this->load->view('template', $this->data);


				}






		}

		public function social() {

        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('pt_socials');
        $xcrud->change_type('social_icon', 'image', false, array(
        'width' => 450,
        'path' => '../../'.PT_SOCIAL_IMAGES_UPLOAD));
        
        $xcrud->columns('social_icon,social_name,social_link,social_order,social_status');
        $xcrud->fields('social_icon,social_name,social_link,social_status,social_position'); // fields in details
        $xcrud->change_type('social_position','hidden','footer');
        $xcrud->column_class('social_icon','zoom_img');
        $xcrud->column_callback('social_order', 'orderInputSocial');

        $xcrud->multiDelUrl = base_url().'admin/ajaxcalls/delMultipleSocials';

        $this->data['content'] = $xcrud->render();
        $this->data['page_title'] = 'Quản lý mạng xã hội';
        $this->data['main_content'] = 'temp_view';
        $this->data['header_title'] = 'Quản lý mạng xã hội';
        $this->load->view('template', $this->data);

           		}

		public function cscm($args = null) {
				
		}

		public function dummy() {
				$this->data['main_content'] = 'modules/hotels/dummy';
				$this->data['page_title'] = 'Social Connections';
				$this->load->view('template', $this->data);
		}

		function integrations() {
			redirect(base_url().'admin/settings');
				/*$hasintegration = $this->ptmodules->has_integration();
				if ($hasintegration) {
						$this->data['modules'] = $this->ptmodules->integratedmodules;
						$this->data['main_content'] = 'settings/integrations';
						$this->data['page_title'] = 'Modules';
						$this->load->view('template', $this->data);
				}
				else {
						redirect(base_url().'admin/settings');
				}*/
		}

        function api(){
        	redirect(base_url().'admin');
             /* $submit = $this->input->post('mobilesettings');
              if(!empty($submit)){
                $data = array(
                'default_gateway' => $this->input->post('defaultgateway')
                );
                $this->db->where('user','webadmin');
                $this->db->update('pt_app_settings',$data);
                $this->session->set_flashdata('flashmsgs', 'Updated Successfully');
                redirect(base_url().'admin/settings/mobile');

              }
              $this->data['settings'] = $this->settings_model->get_settings_data();
              $this->load->model('payments_model');
              $this->data['all_payments'] = $this->payments_model->get_all_payments_back();
              $this->data['main_content'] = 'settings/api';
              $this->data['page_title'] = 'API Settings';
              $this->load->view('template', $this->data);*/
        }

       public function currencies(){
        $this->load->helper('xcrud');
        $xcrud = xcrud_get_instance();
        $xcrud->table('pt_currencies');
        $xcrud->columns('name,symbol,code,rate,is_active,is_default');
        $xcrud->column_callback('is_default', 'MakeDefault');
        $xcrud->search_columns('name,symbol,code,rate,is_active');
        $xcrud->label('is_active','Active')->label('is_default','Default');
        $xcrud->fields('name,symbol,code,rate,is_active');

        $xcrud->multiDelUrl = base_url().'admin/ajaxcalls/delMultipleCurrencies';
        
        $this->data['content'] = $xcrud->render();
        $this->data['page_title'] = 'Currencies Management';
        $this->data['main_content'] = 'temp_view';
        $this->data['header_title'] = 'Currencies Management';
        $this->load->view('template', $this->data);

       }

      
       function redirectSettings($param = null){
      redirect(base_url().'admin/settings/'.$param,'refresh');
   }
   public function addwidgets($args = null, $widgetid = null) {
   		$this->load->library('ckeditor');
			$this->data['ckconfig'] = array();
			$this->data['ckconfig']['toolbar'] = array(array('Source', '-', 'Bold', 'Italic', 'Underline', 'Strike', 'Format', 'Styles'), array('NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote'), array('Image', 'Link', 'Unlink', 'Anchor', 'Table', 'HorizontalRule', 'SpecialChar', 'Maximize'), array('Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo', 'Find', 'Replace', '-', 'SelectAll', '-', 'SpellChecker', 'Scayt'),);
			$this->data['ckconfig']['language'] = 'en';
			$this->data['ckconfig']['height'] = '350px';
			$this->data['ckconfig']['filebrowserUploadUrl'] =  base_url().'home/cmsupload';
			$this->load->model("admin/widgets_model");
            $this->load->model('admin/locations_model');
            $this->data['locations'] = $this->locations_model->getLocationsBackend();
		$action = $this->input->post('action');
		if ($action == "add") {
				$this->form_validation->set_rules('title', 'Widget Name', 'trim|required');
				$this->form_validation->set_rules('widgetbody', 'Widget Content', 'trim');
				if ($this->form_validation->run() == FALSE) {
				}
				else {
						$widgetid = $this->widgets_model->addWidget();
                        $this->session->set_flashdata('flashmsgs', 'Widget added Successfully');
						redirect(base_url().'admin/settings/widgets');

				}
		}
		$this->data['action'] = 'add';
		$this->data['main_content'] = 'modules/tool/add';
		$this->data['page_title'] = 'Widgets - Add Widget';
		$this->load->view('template_new', $this->data);
				
	}

	public function listwidgets($args = null, $widgetid = null) {

				$this->load->helper('xcrud');
				$xcrud = xcrud_get_instance();
				$xcrud->table('pt_widgets');
				$xcrud->order_by('widget_id','desc');
				$xcrud->columns('widget_name,widget_id, widget_location');
				$xcrud->label('widget_id','Widget Code');
				$xcrud->column_callback('widget_id', 'widgetCode');
				$xcrud->search_columns('widget_name,widget_location');
				$xcrud->fields('widget_name,widget_location,widget_content');
				$xcrud->limit(50);

				$xcrud->unset_add();
				$xcrud->unset_view();
				$xcrud->unset_edit();

				$this->data['addpermission'] = true;

				$this->data['add_link'] = base_url().'admin/settings/widgets/add';

				$xcrud->button(base_url() .'admin/settings/widgets/edit/{widget_id}', 'Edit', 'fa fa-edit', 'btn btn-warning', array('target' => '_self'));
                

				$xcrud->multiDelUrl = base_url().'admin/ajaxcalls/delMultipleWidgets';

				$this->data['content'] = $xcrud->render();
				//$this->data['dontload'] = "yes";
				$this->data['page_title'] = 'Widgets Management';
				$this->data['main_content'] = 'modules/tool/index';
				$this->data['header_title'] = 'Widgets Management';
				$this->load->view('admin/template_new', $this->data);

	}

}