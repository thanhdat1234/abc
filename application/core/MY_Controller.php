<?php
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
class My_controller extends CI_Controller{
	public function __construct(){
		parent:: __construct();
	}
	public function find_array($key,$arr)
	{
//		pre($key);
		foreach($arr as $value){
			if($key['user'] == $value['user_name'] && md5($key['pass']) == $value['user_password']){
				return $user = $value;
			}else{
				return false;
			}
		}
	}
}