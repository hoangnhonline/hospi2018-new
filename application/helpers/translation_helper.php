<?php
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');
if (!function_exists('pt_translate_it')) {

    function pt_translate_it($word)
    {
        $CI = get_instance();
        $CI->load->model('translation_model');
        $res = $CI->translation_model->translate_word($word);
        return $res;
    }

}
if (!function_exists('trans')) {

    function trans($code)
    {
        return lang($code);
    }

}
if (!function_exists('pt_language_name')) {

    function pt_language_name($id)
    {

        $languagename = file_get_contents("application/language/$id/name.txt", true);
        $name = explode(",", $languagename);
        return $name[0];
    }

}
/*
if ( ! function_exists('pt_get_languages'))
{
function pt_get_languages()
{
$CI = get_instance();

$CI->load->model('translation_model');

$result = $CI->translation_model->get_all_languages();
return $result;
}
}*/
if (!function_exists('pt_get_languages')) {

    function pt_get_languages()
    {
        $CI = get_instance();
        $CI->load->helper('directory');
        $languages = directory_map('./application/language/', 1);
        $array = array();
        foreach ($languages as $l) {
            $file = file_get_contents("application/language/$l/name.txt", true);
            $name = explode(",", $file);
            $array [$l] = array("name" => $name[0], "rtl" => $name[1]);
        }
        return $array;
    }

}
if (!function_exists('pt_isValid_language')) {

    function pt_isValid_language($id = "vi")
    {
        if (!is_string($id)) {
            return false;
        }

        $lset = pt_get_languages();
        if (array_key_exists($id, $lset)) {
            set_language($id);
            return true;
        } else {
            return false;
        }
    }

}
if (!function_exists('set_language')) {

    function set_language($langid)
    {
        $CI = get_instance();
        $CI->load->helper('directory');
        $languages = directory_map('./application/language/', 1);
        $array = array();
        $file = file_get_contents("application/language/$langid/name.txt", true);
        $name = explode(",", $file);
        $CI->session->set_userdata('set_lang', $langid);
        $CI->session->set_userdata('lang_name', $name[0]);
        $CI->session->set_userdata('isRtl', $name[1]);
    }

}
if (!function_exists('pt_get_translation_languages')) {

    function pt_get_translation_languages()
    {
        $CI = get_instance();
        $CI->load->model('translation_model');
        $result = $CI->translation_model->get_translation_languages();
        return $result;
    }

}
if (!function_exists('pt_get_default_language')) {

    function pt_get_default_language()
    {
        $CI = get_instance();
        $CI->load->model('translation_model');
        $result = $CI->translation_model->get_default_lang();
        return $result;
    }

}