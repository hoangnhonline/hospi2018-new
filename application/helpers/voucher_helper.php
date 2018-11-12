<?php
if (!defined('BASEPATH')) {
	exit ('No direct script access allowed');
}
if (!function_exists('get_list_voucher_type')) {
	function get_list_voucher_type(){
		$array_result = array();
		$array_result[""] = "Loại E-Voucher";
		$array_result["hotel"] = "Voucher Hotel";
		$array_result["combo"] = "Voucher Combo";
		return $array_result;
	}

}

if (!function_exists('get_list_voucher_payment')) {
	function get_list_voucher_payment(){
		$array_result = array();
		$array_result["1"] = "Chưa thanh toán";
		$array_result["2"] = "Đã thanh toán";
		$array_result["3"] = "Đã cọc";
		$array_result["4"] = "Đã hủy";
		return $array_result;
	}

}