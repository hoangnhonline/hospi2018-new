<?php
header('Access-Control-Allow-Origin: *');

class Invoice extends MX_Controller {
		private $data = array();

		function __construct() {
				parent :: __construct();
				modules :: load('home');
				$this->data['phone'] = $this->load->get_var('phone');
				$this->data['app_settings'] = $this->settings_model->get_settings_data();
				$this->data['errormsg'] = $this->session->flashdata("invoiceerror");
				$this->data['lang_set'] = $this->session->userdata('set_lang');
				$defaultlang = pt_get_default_language();
				if (empty ($this->data['lang_set'])) {
						$this->data['lang_set'] = $defaultlang;
				}
				//$this->lang->load("front", $this->data['lang_set']);
//$this->data['geo'] = $this->load->get_var('geolib');
		}

		public function index() {
				$this->data['appModule'] = 'invoice';
				$this->load->helper('invoice');
				$this->data['hideLang'] = "hide";
				$this->data['hideCurr'] = "hide";
				$this->data['hidden'] = "hidden-sm hidden-xs";
				$bookingid = $this->input->get('id');
				$bookingref = $this->input->get('sessid');
                                if(empty($bookingid)) {
                                    $this->load->model("admin/bookings_model");
                                    $bookingid = $this->bookings_model->getBookingIdNo($bookingref);
                                }
				$ebookingid = $this->input->get('eid');
				$payerID = $this->input->get('PayerID');
				$token = $this->input->get('token');

				$this->data['hideHeader'] = "1";
			
				if (!empty ($ebookingid)) {
						$this->data['invoice'] = pt_get_einvoice_details($ebookingid, $bookingref);
						$this->data['response'] = json_decode($this->data['invoice'][0]->book_response);
						if (empty ($this->data['invoice'])) {
								redirect(base_url());
						}
						else {
							 $this->lang->load("front", $this->data['lang_set']);
/* $this->session->set_userdata('checkout_amount', $this->data['invoice'][0]->booking_deposit);
$this->session->set_userdata('checkout_total', $this->data['invoice'][0]->booking_total);*/
								$contact = $this->settings_model->get_contact_page_details();
								$this->data['contactphone'] = $contact[0]->contact_phone;
                                                                $this->data['tel'] = $contact[0]->tel;
                                                                $this->data['fax'] = $contact[0]->fax;
								$this->data['contactemail'] = $contact[0]->contact_email;
								$this->data['contactaddress'] = $contact[0]->contact_address;
								$this->data['page_title'] = 'Invoice';
//   $this->theme->partial('invoice',$this->data);
								$this->load->view('admin/modules/global/einvoice', $this->data);
						}
				}
				else {

						if (empty ($bookingref) || empty ($bookingid)) {
								$bookingid = $this->session->userdata("BOOKING_ID");
								$bookingref = $this->session->userdata("REF_NO");
						}
						$this->data['invoice'] = invoiceDetails($bookingid, $bookingref);
						if (empty ($this->data['invoice']->id)) {
								redirect(base_url());
						}
						else {
							//for paypal express


							if(!empty($token) && !empty($payerID)){
								$this->load->model("admin/bookings_model");
								$gateway = "paypalexpress";
								require_once "./application/modules/gateways/" . $gateway . ".php";
								$this->load->model('admin/payments_model');
								$extraFields  = array('token' => $token, 'payerid' => $payerID);
								$params = $this->payments_model->getGatewayParams($gateway);
								$params['invoiceid'] = $bookingid;
								if (function_exists($gateway . "_verifypayment")) {
								$payResult = call_user_func($gateway . "_verifypayment",$params,$extraFields);
								}

								if($payResult['status'] == "success"){
								$shortInfo = $this->bookings_model->bookingShortInfo($payResult['invoiceid']);

								if($shortInfo[0]->booking_deposit == $payResult['paid']){

								updateInvoiceStatus($payResult['invoiceid'],$payResult['paid'],$payResult['transactionid'],$gateway,"paid", $shortInfo[0]->booking_type,$shortInfo[0]->booking_total);
								$invoicedetails = invoiceDetails($payResult['invoiceid'],$shortInfo[0]->booking_ref_no);

								$this->load->model('admin/emails_model');

								$this->emails_model->paid_sendEmail_customer($invoicedetails);
								$this->emails_model->paid_sendEmail_admin($invoicedetails);
								//$this->emails_model->paid_sendEmail_supplier($invoicedetails);
								//$this->emails_model->paid_sendEmail_owner($invoicedetails);
								redirect(base_url().'invoice?id='.$bookingid.'&sessid='.$bookingref,'refresh');



								}else{

									echo "Amount is invalid";
									exit;

								}

								}else{

									print_r($payResult);
									exit;

								}
								


							}else{

							    $this->lang->load("front", $this->data['lang_set']);

								$this->session->set_userdata('checkout_amount', $this->data['invoice']->checkoutAmount);
								$this->session->set_userdata('checkout_total', $this->data['invoice']->checkoutTotal);
								$contact = $this->settings_model->get_contact_page_details();
								$this->load->model('admin/payments_model');
								$paygateways = $this->payments_model->getAllPaymentsBack();
								if($this->data['invoice'] != "paid"){
								$this->data['msg'] = json_decode($this->payments_model->getGatewayMsg($this->data['invoice']->paymethod,$this->data['invoice']));
								}
								

								$this->data['paymentGateways'] = $paygateways['activeGateways'];
								$this->data['payOnArrival'] = $this->payments_model->payOnArrivalIsActive($paygateways['activeGateways']);
								$singleGateway = $this->payments_model->onlySinglePaymentGatewayActive($paygateways['activeGateways']);
								if($singleGateway['status'] == "yes"){
									
									$this->data['singleGateway'] = $singleGateway['name'];
								
								}else{

									$this->data['singleGateway'] = "";
								}
								//sort on basic of order
								usort($this->data['paymentGateways'], function($a, $b) {
								return $a['order'] - $b['order'];
								});

								$this->data['contactphone'] = $contact[0]->contact_phone;
								$this->data['contactemail'] = $contact[0]->contact_email;
								$this->data['contactaddress'] = $contact[0]->contact_address;
								$this->data['page_title'] = 'Invoice';

								//echo "<pre>";print_r($this->data['invoice']);echo "</pre>";//die;
								$invoice = $this->data['invoice'] ;
								$this->data['booking_subitem']  = json_decode(json_encode($invoice->booking_subitem),true);
								// $this->data['booking_subitem']  = $x;
	//echo "<pre>";print_r(  $this->data['booking_subitem']);echo "</pre>";die;
								if (isset($invoice->couponCode) && !empty($invoice->couponCode)) {
									$this->load->model('admin/coupons_model');
									$couponVo = $this->coupons_model->get_coupon_by_code($invoice->couponCode);//var_dump($couponVo);die;
									if(isset($couponVo)){
										$this->data['has_coupon'] = true;
										$this->data['coupon'] = array('code' => $couponVo->code,
											'value' => $couponVo->value,
											'type' => $couponVo->type,
											'couponId' => $couponVo->id,
											'isVaild' => true,
										);

										if ($couponVo->type == '%') {
											$discountValue = $couponVo->value * $invoice->remainingAmount / 100;
										} else {
											$discountValue = $couponVo->value;
										}
									}else{
										$this->data['has_coupon'] = false;
									}
									$this->data['discountValue'] = $discountValue ;
								}


								if($invoice->module == 'combo'){
									  $surchargeInfo = [];
					            $this->db->where('offer_id', $invoice->itemid);
					            $result = $this->db->get('phuthucombo')->result();//	echo "<pre>";print_r($result);echo "</pre>";
					            $surchargeInfo = array();
					            foreach ($result as $item) {
					                $surchargeInfo[] = (object)[
					                    'id' => $item->id,
					                    'name' => $item->name,
					                    'price' => $item->price ,//$curr->convertPrice($item->price, 0),
					                    'show_price' => $item->show_price
					                ];
					            }
					            $this->data['surchargeInfo'] = $surchargeInfo;
									$this->theme->view('admin/modules/global/invoice_combo', $this->data);
								}else{
									  $this->db->where('booked_booking_id', $invoice->id);
					            $result = $this->db->get('pt_booked_rooms')->result();//
					           /* $checkin =  strtotime($invoice->checkin);
					            $checkin = date("d/m/Y",  strtotime($invoice->checkin) );
					            $checkout = date("d/m/Y",  strtotime($invoice->checkout) );*/

					            	$bookInfo = array();
					            	$hotelID = $invoice->itemid;
					            	$total_extra_bed = 0;
					            	$total_room = 0;

					            	foreach ($result as $k =>$v ) {
					            		$roomID = $v->booked_room_id;
			                             $roomsCount = $v->booked_room_count;
			                             $extrabeds = $v->booked_extra_bed;
			                             $total_room +=  $v->booked_room_count;
			                            // echo $v->booked_checkin ;
			                             $checkin  = date("d/m/Y",  strtotime( $v->booked_checkin) ); 			                          

			                             $checkout =  date("d/m/Y",  strtotime( $v->booked_checkout) ); 
			                             if ($roomsCount > 0) {
			                                  $bookInfo[$roomID] = $this->hotels_lib->getBookResultObject($hotelID, $roomID, $roomsCount, $extrabeds, $invoice->checkin,  $invoice->checkout);
			                                 // echo "<pre>";print_r($bookInfo[$roomID]);echo "</pre>";//die;
			                                  $nights =  count($bookInfo[$roomID]->Info['detail'] ) ;
			                                $total_extra_bed += $bookInfo[$roomID]->extraBedsCount;

			                             }
			                       }
			                           $this->data['bookInfo'] = $bookInfo;
			                           	$this->data['total_extra_bed'] = $total_extra_bed;
			                           	$this->data['total_room'] = $total_room;

					         //echo "<pre>";print_r($bookInfo);echo "</pre>";die;
			                        /* $date1 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $invoice->checkin))));
			                          $date2 = new \DateTime(date('Y-m-d', strtotime(str_replace("/", "-", $invoice->checkout))));*/
			                           // this calculates the diff between two dates, which is the number of nights
			                        /* $start_date = date_create( $invoice->checkin);
									$end_date = date_create( $invoice->checkout);
									$nights = date_diff($start_date, $end_date);*///echo $nights ;die;
			                         $this->data['nights'] = $nights ; //$date2->diff($date1)->format("%a");
									$this->theme->view('admin/modules/global/invoice_hotel', $this->data);
								}
								//$this->theme->view('admin/modules/global/invoice', $this->data);
								//echo print_r($this->data['invoice']); exit;
							}
						}
				}
		}

		function validate_coupon() {
				$code = $this->input->post('code');
				$bookingid = $this->input->post('bookingid');
				$this->load->model('admin/coupons_model');
				$resp = $this->coupons_model->validatecoupon($code);
				if ($resp > 0) {
						$amount = $this->session->userdata('checkout_amount');
						$totalpay = $this->session->userdata('checkout_total');
						$alteredamount = $amount * $resp / 100;
						$alteredtotal = $totalpay * $resp / 100;
						$amount = $amount - round($alteredamount, 2);
						$totalpay = $totalpay - round($alteredtotal, 2);
						$data = array('coupon_used' => '1');
						$this->db->where('coupon_code', $code);
						$this->db->update('pt_coupons', $data);
						$data2 = array('booking_deposit' => $amount, 'booking_total' => $totalpay, 'booking_remaining' => $totalpay, 'booking_coupon' => $code, 'booking_coupon_rate' => $resp);
						$this->db->where('booking_id', $bookingid);
						$this->db->update('pt_bookings', $data2);
						echo $resp;
				}
				else {
						echo $resp;
				}
		}

		
		function updatePayOnArrival(){
			
			if ($this->input->is_ajax_request()){
			if(!empty($_POST)){
				$id = $this->input->post('id');
				$module = $this->input->post('module');
				$data = array(
					'booking_status' => 'reserved',
					'booking_payment_type' => 'payonarrival'
					);

				$this->db->where('booking_id',$id);
				$this->db->update('pt_bookings',$data);
				if($module == "hotels"){
					$data2 = array(
					'booked_booking_status' => 'reserved'
					);
				
				$this->db->where('booked_booking_id',$id);
				$this->db->update('pt_booked_rooms',$data2);
					
				}
				
			}
				
			}
			
		}

		function getGatewaylink($bookingid,$bookingref){
			$this->load->helper('invoice');

			//if ($this->input->is_ajax_request()){
				//var_dump($_REQUEST);die;
				$invoicdata = invoiceDetails($bookingid,$bookingref);
				$this->load->model('admin/payments_model');
				$gateway = $this->input->get('gateway');				
				echo $this->payments_model->getGatewayMsg($gateway,$invoicdata);

			

			//}
			
		}

		function notifyUrl($gateway){

			$invoiceRedirect = array('ccavenue','faturah');

			$this->load->helper('invoice');
			$payResult = array();
			$postdata = $this->input->post();
			$getdata = $this->input->get();
			
			if(!empty($postdata) || !empty($getdata)){

			require_once "./application/modules/gateways/" . $gateway . ".php";
			$this->load->model('admin/payments_model');
			$params = $this->payments_model->getGatewayParams($gateway);
			if (function_exists($gateway . "_verifypayment")) {
			$payResult = call_user_func($gateway . "_verifypayment",$params);
			}
			$this->load->model("admin/bookings_model");

		/*	$fileData = (object)$payResult;
			$filename = $fileData->file.".json";

			file_put_contents("application/".$filename, json_encode($fileData,JSON_PRETTY_PRINT));*/

		$shortInfo = $this->bookings_model->bookingShortInfo($payResult['invoiceid']);
		$payResultObj = (object)$payResult;
		if($payResult['status'] == "success"){
		

			if($shortInfo[0]->booking_deposit == $payResult['paid']){

				updateInvoiceStatus($payResult['invoiceid'],$payResult['paid'],$payResult['transactionid'],$gateway,"paid", $shortInfo[0]->booking_type,$shortInfo[0]->booking_total);
				updateInvoiceLogs($payResultObj->invoiceid,$payResultObj->logs);
				$invoicedetails = invoiceDetails($payResult['invoiceid'],$shortInfo[0]->booking_ref_no);

				$this->load->model('admin/emails_model');

				$this->emails_model->paid_sendEmail_customer($invoicedetails);
				$this->emails_model->paid_sendEmail_admin($invoicedetails);
				//$this->emails_model->paid_sendEmail_supplier($invoicedetails);
				//$this->emails_model->paid_sendEmail_owner($invoicedetails);



			}
			
		}else{

			    updateInvoiceLogs($payResultObj->invoiceid,$payResultObj->logs);
		}

		if(in_array($gateway,$invoiceRedirect)){
			redirect(base_url().'invoice?id='.$payResult['invoiceid'].'&sessid='.$shortInfo[0]->booking_ref_no);
		}
		
		}

			
		}

		function callGatewayFunc($gateway,$function){

		$postdata = $this->input->post();
			
		if(!empty($postdata)){

			require_once "./application/modules/gateways/" . $gateway . ".php";
			$this->load->model('admin/payments_model');
			$params = $this->payments_model->getGatewayParams($gateway);
			if (function_exists($gateway . "_".$function)) {
			call_user_func($gateway . "_".$function,$params);
			}else{
			
			redirect(base_url());
			
			}

		
				
		}else{

			redirect(base_url());
		}

			
		}

}