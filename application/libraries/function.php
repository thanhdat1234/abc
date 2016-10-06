<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
 *
 * @package		Adminpro
 * @author		Tran Hoang Thien (thienhb12@gmail.com)
 * @copyright   PHP TEAM
 * @link		http://phpandmysql.net
 * @since		Version 1.0
 * @phone       0944418192
 *
 */
/*
	* This is function debug 
*/


define('STATIC_BACKEND', 'assets/admin');
define('STATIC_FRONTEND', 'assets/home');

if(!function_exists("pre"))
{
    function pre($var)
    {   
        echo "<pre>";
        if(is_array($var) || is_object($var)){
            print_r($var);
        }else{
            echo $var;
        }
        echo "</pre>";
        die();
    }
}
/*
	* This is function replace
*/
if(!function_exists("replace"))
{
	function replace($str) {
		if(!$str) return false;
		        $unicode = array(
				'a'=>array('á','à','ả','ã','ạ','ă','ắ','ặ','ằ','ẳ','ẵ','â','ấ','ầ','ẩ','ẫ','ậ'),
		            'A'=>array('Á','À','Ả','Ã','Ạ','Ă','Ắ','Ặ','Ằ','Ẳ','Ẵ','Â','Ấ','Ầ','Ẩ','Ẫ','Ậ'),
		            'd'=>array('đ'),
				'-'=>array('-'),
		            'D'=>array('Đ'),
		            'e'=>array('é','è','ẻ','ẽ','ẹ','ê','ế','ề','ể','ễ','ệ'),
		            'E'=>array('É','È','Ẻ','Ẽ','Ẹ','Ê','Ế','Ề','Ể','Ễ','Ệ'),
		            'i'=>array('í','ì','ỉ','ĩ','ị'),
		            'I'=>array('Í','Ì','Ỉ','Ĩ','Ị'),
		            'o'=>array('ó','ò','ỏ','õ','ọ','ô','ố','ồ','ổ','ỗ','ộ','ơ','ớ','ờ','ở','ỡ','ợ'),
		            '0'=>array('Ó','Ò','Ỏ','Õ','Ọ','Ô','Ố','Ồ','Ổ','Ỗ','Ộ','Ơ','Ớ','Ờ','Ở','Ỡ','Ợ'),
		            'u'=>array('ú','ù','ủ','ũ','ụ','ư','ứ','ừ','ử','ữ','ự'),
		            'U'=>array('Ú','Ù','Ủ','Ũ','Ụ','Ư','Ứ','Ừ','Ử','Ữ','Ự'),
		            'y'=>array('ý','ỳ','ỷ','ỹ','ỵ'),
		            'Y'=>array('Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
				'-'=>array(', ','. '),
				'' =>array(',','.'),					
				'-'=>array(' .',' ;','; ',' :',': '),
		            '-'=>array(';',':'),
				'-'=>array(' - '),	
		        );
				
		        foreach($unicode as $nonUnicode=>$uni){
		        	foreach($uni as $value)
		    	$str = str_replace($value,$nonUnicode,$str);
		        }
		return $str;	
	}
}
# Chuyển đổi ký tự tiếng việt sang dạng ascii
function VietChar($str) {
	$arr_fillter = array('--','---',);
	$arr_fillter[] = html_entity_decode('&ndash;');
	$str = str_replace('   ',' ',str_replace($arr_fillter,' ',$str));	
    $vietChar    = 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ|é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|ó|ò|ỏ|õ|ọ|ơ|ớ|ờ|ở|ỡ|ợ|ô|ố|ồ|ổ|ỗ|ộ|ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|í|ì|ỉ|ĩ|ị|ý|ỳ|ỷ|ỹ|ỵ|đ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ|Ó|Ò|Ỏ|Õ|Ọ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự|Í|Ì|Ỉ|Ĩ|Ị|Ý|Ỳ|Ỷ|Ỹ|Ỵ|Đ';
    $engChar     = 'a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|a|e|e|e|e|e|e|e|e|e|e|e|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|o|u|u|u|u|u|u|u|u|u|u|u|i|i|i|i|i|y|y|y|y|y|d|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|A|E|E|E|E|E|E|E|E|E|E|E|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|O|U|U|U|U|U|U|U|U|U|U|U|I|I|I|I|I|Y|Y|Y|Y|Y|D';
    $arrVietChar = explode("|", $vietChar);
    $arrEngChar  = explode("|", $engChar);
    return str_replace($arrVietChar, $arrEngChar, $str);
}	
//Clean XSS
function fillter($str){
	$str = str_replace("<", "&lt;", $str);
	$str = str_replace(">", "&gt;", $str);
	$str = str_replace("&", "&amp;", $str);			
	$str = str_replace("|", "&brvbar;", $str);
	$str = str_replace("~", "&tilde;", $str);
	$str = str_replace("`", "&lsquo;", $str);
	$str = str_replace("#", "&curren;", $str);
	$str = str_replace("%", "&permil;", $str);
	$str = str_replace("'", "&rsquo;", $str);
	$str = str_replace("\"", "&quot;", $str);
	$str = str_replace("\\", "&frasl;", $str);
	$str = str_replace("--", "&ndash;&ndash;", $str);
	$str = str_replace("ar(", "ar&Ccedil;", $str);
	$str = str_replace("Ar(", "Ar&Ccedil;", $str);
	$str = str_replace("aR(", "aR&Ccedil;", $str);
	$str = str_replace("AR(", "AR&Ccedil;", $str);
	return htmlspecialchars($str);
}
//reusult Clean XSS
function e($str){
	$str = str_replace("<", "&lt;", $str);
	$str = str_replace(">", "&gt;", $str);
	$str = str_replace("&", "&amp;", $str);			
	$str = str_replace("|", "&brvbar;", $str);
	$str = str_replace("~", "&tilde;", $str);
	$str = str_replace("`", "&lsquo;", $str);
	$str = str_replace("#", "&curren;", $str);
	$str = str_replace("%", "&permil;", $str);
	$str = str_replace("'", "&rsquo;", $str);
	$str = str_replace("\"", "&quot;", $str);
	$str = str_replace("\\", "&frasl;", $str);
	$str = str_replace("--", "&ndash;&ndash;", $str);
	$str = str_replace("ar(", "ar&Ccedil;", $str);
	$str = str_replace("Ar(", "Ar&Ccedil;", $str);
	$str = str_replace("aR(", "aR&Ccedil;", $str);
	$str = str_replace("AR(", "AR&Ccedil;", $str);
	return htmlspecialchars($str);
}
/*
	* This is function get_ip
*/
function get_ip() {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if($_SERVER['HTTP_X_FORWARDED_FOR'] != NULL){
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
//this is function cut string description
function cut( $str, $limit, $more=" ..."){
	if ($str=="" || $str == NULL || is_array($str) || strlen($str)==0)
	  return $str;
	$str = trim($str);

	if (strlen($str) <= $limit) return $str;
	$str = substr($str,0,$limit);

	if (!substr_count($str," ")){
	  if ($more) $str .= " ...";
	  return $str;
	}
	while(strlen($str) && ($str[strlen($str)-1] != " ")){
	  $str = substr($str,0,-1);
	}
	$str = substr($str,0,-1);
	if ($more) $str .= " ...";
	return $str;
}

function RemoveHtml($document) {//# Loại bỏ html
    $search = array(
        '@<script[^>]*?>.*?</script>@si', // Chứa javascript
        '@<[\/\!]*?[^<>]*?>@si', // Chứa các thẻ HTML
        '@<style[^>]*?>.*?</style>@siU', // Chứa các thẻ style
        '@<![\s\S]*?--[ \t\n\r]*>@' // Xóa toàn bộ dữ liệu bên trong các dấu ngoặc "<" và ">"
    );
    $text   = preg_replace($search, '', $document);
    $text   = strip_tags($text);
	$text   = trim($text);
    return $text;
}
# Chống hành động xấu khi nhập dữ liệu
function RemoveHack($str) {
	$str = htmlchars(stripslashes(trim(urldecode($str))));
	return $str;
}

# Chuyển đổi chars sang html
function UnHtmlChars($str) {
    $data = str_replace(array('&lt;','&gt;','&quot;','&amp;','&#92;','&#39','&#039;'), array('<','>','"','&',chr(92),"'",chr(39)), $str);
	return $data;
}
# Chuyển đổi html sang chars
function HtmlChars($str) {
    $data = str_replace(array('&','<','>','"',chr(92),chr(39)), array('&amp;','&lt;','&gt;','&quot;','&#92;','&#39'), $str);
	return $data;
}
# Cắt chữ
function CutName($str, $len) {
    $str = trim($str);
    if (strlen($str) <= $len)
        return $str;
    $str = substr($str, 0, $len);
    if ($str != "") {
        if (!substr_count($str, " "))
            return $str . " ...";
        while (strlen($str) && ($str[strlen($str) - 1] != " "))
            $str = substr($str, 0, -1);
        $str = substr($str, 0, -1) . " ...";
    }
    return $str;
}
//hàm trả đọc file json về mảng
if(!function_exists("return_array"))
{
	function return_array($url_file)
	{
		if(file_exists($url_file)){
			$data	= file_get_contents($url_file);
			return json_decode($data,true);
		}else{
			return false;
		}
	}
}
//hàm trả kiểm tra xem có file k nếu có thì tạo file và ghi dữ liệu
if(!function_exists("return_array_creat_file"))
{
	function return_array_creat_file($folder,$file,$data = '')
	{
		if (!is_dir($folder)) {
			mkdir($folder);
			$fp = fopen($folder."/".$file,"wb");
			fwrite($fp,$data);
			fclose($fp);
		}else{
			$fp = fopen($folder."/".$file,"wb");
			fwrite($fp,$data);
			fclose($fp);
		}
	}
}
function return_item_product($key,$arr)
{
//		pre($arr);
	foreach($arr as $value){
		if($key == $value['pro_id']){
			return $user = $value;
		}else{
			continue;
		}
	}
}

function return_item_news($key,$arr)
{
//		pre($arr);
	foreach($arr as $value){
		if($key == $value['news_id']){
			return $user = $value;
		}else{
			continue;
		}
	}
}
function ckeditor($name, $value = ''){
	$string = '';
	$string .= '<script>
        tinymce.init({
            selector: \'#'.$name.'\',
            theme: \'modern\',
            width: 800,
            height: 300,
            plugins: [
        \'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker\',
        \'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking\',
        \'save table contextmenu directionality emoticons template paste textcolor qrcode youtube responsivefilemanager\'
    ],
            toolbar: \'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons qrcode youtube responsivefilemanager\',
            external_filemanager_path:"/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "/filemanager/plugin.min.js"}
        });
</script>';
	$string .= "<textarea id=\"{$name}\" name=\"{$name}\">{$value}</textarea>";
	return $string;
}
function removeTitleFileName($string,$keyReplace){
	$string		= html_entity_decode($string, ENT_COMPAT, 'UTF-8');
	$string		= strtolower($string);
	$string		= removeAccent($string);
	$string 	= trim(preg_replace("/[^A-Za-z0-9.]/i"," ",$string)); // khong dau
	$string 	= str_replace(" ","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace($keyReplace,"-",$string);
	return $string;

}
