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
class Support extends MY_Controller {

	public function __construct(){
		parent:: __construct();	
		$this->lang->load('frontend','vietnamese');
		$this->load->model('support_model');
	}

	public function index(){
		$data            = array();
		$data['menu']    = 'menu_home';
		$data['breadcrumb'] = 'Xu hướng thời trang';
		$data['config']     = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']   = $this->cache_site->get_info_cache('top_view', 900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$data['result']  = $this->cache_site->get_info_cache($key = 'support',900,$this->support_model->get_info(1,array('zalo','yahoo','viber','facebook','skyper')));
		$data['content'] = 'support/support';
		$data['breadcrumb'] = 'Hỗ trợ';
		$data['class']   = 'category-page';
		$this->load->view("layout",$data);
	}
}