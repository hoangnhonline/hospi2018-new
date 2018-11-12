<?php
if (!defined('BASEPATH'))
	exit ('No direct script access allowed');
if (!function_exists('is_empty_string')) {
	function is_empty_string($string){
		if (!isset ($string) || trim($string) === '') {
			return true;
		}
		return false;
	}
}
if (!function_exists('default_if_empty')) {
	function default_if_empty($var, $default = ''){
		return (!isset ($var) || is_null($var) || empty ($var)) ? $default : $var;
	}
}

if (!function_exists('merge_object')) {
	function merge_object(&$array_src, $obj_des){
		$vars = get_object_vars ( $obj_des );
		foreach($vars as $key=>$value) {
			$array_src[$key] =  $value;
		}
	}
}