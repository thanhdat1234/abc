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
class Policy extends MY_Controller {

	public function __construct(){
		parent:: __construct();	
		$this->lang->load('frontend','vietnamese');
		$this->load->model('policy_model');	
	}

	public function index(){
		$data               = array();
		$data['menu']       = 'menu_home';
		$data['config']     = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']   = $this->cache_site->get_info_cache('top_view', 900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$data['result']     = $this->cache_site->get_info_cache('policy',$time = 900,$this->policy_model->get_info(1,array('sales_policy','warranty_policy','support_online','freeship','secure_transactions','purchase')));
		$data['info']       = $data['result']['freeship'];
		$data['breadcrumb'] = 'Vận chuyển';
		$data['content']    = 'policy/policy';
		$data['class']      = 'category-page';
		$this->load->view("layout",$data);
	}

	public function pay(){
		$data               = array();
		$data['menu']       = 'menu_home';
		$data['config']     = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']   = $this->cache_site->get_info_cache('top_view', 900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$data['result']     = $this->cache_site->get_info_cache('policy',$time = 900,$this->policy_model->get_info(1,array('sales_policy','warranty_policy','support_online','freeship','secure_transactions','purchase')));
		$data['info']       = $data['result']['sales_policy'];
		$data['content']    = 'policy/policy';
		$data['breadcrumb'] = 'Thanh toán';
		$data['class']      = 'category-page';
		$this->load->view("layout",$data);
	}

	public function lie(){
		$data               = array();
		$data['menu']       = 'menu_home';
		$data['config']     = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']   = $this->cache_site->get_info_cache('top_view', 900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$data['result']     = $this->cache_site->get_info_cache('policy',$time = 900,$this->policy_model->get_info(1,array('sales_policy','warranty_policy','support_online','freeship','secure_transactions','purchase')));
		$data['info']       = $data['result']['warranty_policy'];
		$data['content']    = 'policy/policy';
		$data['breadcrumb'] = 'Đổi trả';
		$data['class']      = 'category-page';
		$this->load->view("layout",$data);
	}

	public function support(){
		$data               = array();
		$data['menu']       = 'menu_home';
		$data['config']     = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']   = $this->cache_site->get_info_cache('top_view', 900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$data['result']     = $this->cache_site->get_info_cache('policy',$time = 900,$this->policy_model->get_info(1,array('sales_policy','warranty_policy','support_online','freeship','secure_transactions','purchase')));
		$data['info']       = $data['result']['support_online'];
		$data['content']    = 'policy/policy';
		$data['breadcrumb'] = 'Hỗ trợ';
		$data['class']      = 'category-page';
		$this->load->view("layout",$data);
	}

	public function purchase(){
		$data               = array();
		$data['menu']       = 'menu_home';
		$data['config']     = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']   = $this->cache_site->get_info_cache('top_view', 900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$data['result']     = $this->cache_site->get_info_cache('policy',$time = 900,$this->policy_model->get_info(1,array('sales_policy','warranty_policy','support_online','freeship','secure_transactions','purchase')));
		$data['info']       = $data['result']['purchase'];
		$data['content']    = 'policy/policy';
		$data['breadcrumb'] = 'Mua số lượng lớn';
		$data['class']      = 'category-page';
		$this->load->view("layout",$data);
	}

}