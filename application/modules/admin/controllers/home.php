<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
	class Home extends My_Controller{
		public function __construct(){
			parent:: __construct();
			$this->lang->load('admin','vietnamese');
			$this->load->model('muser');
			if(!$this->session->userdata("session_user") /*|| $this->session->userdata("session_level") != 1*/){
				redirect(base_url()."admin/login");
			}
		}
		
		public function index()
		{
			$data['title']      = "Home";
			$data['breadcrumb'] = "Home";
			$data['oder']       = "";
			$data['content']   = 'home';
			$data['icon']       = "glyphicon glyphicon-info-sign";
			$data['intro']      = "Introduction";
			$this->load->view("layout",$data);
		}
	}