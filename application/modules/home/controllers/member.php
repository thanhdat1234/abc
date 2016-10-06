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
class Member extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('muser');
		$this->load->library('form_validation');
		$this->lang->load('frontend','vietnamese');
		$this->load->model('config_model');
	}

	public function index(){
		$this->lang->load('frontend');	 
		$data                  = array();
		$data['menu_template'] = 'member/myprofile';
		$data['template']      = 'member/member';
		$this->load->view("layout",$data);
	}

	public function login(){
		$this->lang->load('frontend');
		$data            = array();
		$data['menu']    = 'menu_home';
		$data['content'] = 'member/login';
		$data['class']   = 'category-page';
		$this->load->view("layout",$data);
	}
}

/* End of file index.php */
/* Location: ./application/modules/home/controllers/index.php */