<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
class Services extends MY_Controller {

	public function __construct(){
		parent:: __construct();	
		$this->lang->load('frontend','vietnamese');
		$this->load->model('config_model');
	}

	public function index(){
		$data            = array();
		$data['menu']    = 'menu_home';
		$data['content'] = 'about/about';
		$data['class']   = 'category-page';
		$this->load->view("layout",$data);
	}
}