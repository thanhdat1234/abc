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
class Product extends MY_Controller {

	public function __construct(){
		parent:: __construct();	
		$this->lang->load('frontend','vietnamese');
		$this->load->model('product_model');
		$this->load->model('banner_model');
	}

	public function index(){
		$data['menu']            = 'menu_home';
		$data['breadcrumb']      = $this->lang->line('new_product');
		$data['title']           = $this->lang->line('new_product');
		$data['keywords']        = $this->lang->line('new_product');
		$data['description']     = $this->lang->line('new_product_Fordstore');
		$url                     = SITE_URL.'san-pham-moi';
		$data['config']          = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['selling_product'] = array_slice($this->cache_site->get_info_cache('selling_product',7200,$this->product_model->get_product(array('status' => 1),10,NULL,'checkout','DESC')),0,1);
		$data['new_product']     = array_slice($this->cache_site->get_info_cache('new_product', 7200,$this->product_model->get_product(array('status' => 1),10,NULL,'id','DESC')),0,4);
		$data['banner_detail']  = $this->banner_model->get_banner(array('status' => 1,'type'=> 4),10,NULL,'id','DESC');
		$data['seo_url']         = $url;
		$segment                 = $this->uri->segment(2);
		$total                   = $this->product_model->get_total();
		if($segment == NULL){
			$offset = 0;
		}else{
			$offset = ($segment - 1) * 1;
		}
		$config          = paging($url,12,$total);
		$data['result']  = $this->product_model->get_product(array('status' => 1),12,$offset,'id','DESC');
		$this->pagination->initialize($config);
		$data['content'] = 'product/list_product';
		$data['class']   = 'category-page';
		$this->load->view("layout",$data);
	}

	public function sell_product(){
		$data['menu']            = 'menu_home';
		$data['breadcrumb']      = $this->lang->line('selling_product');
		$url                     = SITE_URL.'san-pham-ban-chay';
		$data['title']           = $this->lang->line('selling_product');
		$data['keywords']        = $this->lang->line('selling_product');
		$data['description']     = $this->lang->line('selling_product');
		$data['config']          = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['selling_product'] = array_slice($this->cache_site->get_info_cache('selling_product',7200,$this->product_model->get_product(array('status' => 1),10,NULL,'checkout','DESC')),0,1);
		$data['new_product']     = array_slice($this->cache_site->get_info_cache('new_product', 7200,$this->product_model->get_product(array('status' => 1),10,NULL,'id','DESC')),0,4);
		$data['banner_detail']  = $this->banner_model->get_banner(array('status' => 1,'type'=> 4),10,NULL,'id','DESC');
		$data['seo_url']         = $url;
		$segment                 = $this->uri->segment(2);
		$total                   = $this->product_model->get_total();
		if($segment == NULL){
			$offset = 0;
		}else{
			$offset = ($segment - 1) * 1;
		}
		$config          = paging($url,12,$total);
		$data['result']  = $this->product_model->get_product(array('status' => 1),12,$offset,'checkout','DESC');
		$this->pagination->initialize($config);
		$data['content'] = 'product/list_product';
		$data['class']   = 'category-page';
		$this->load->view("layout",$data);
	}

	public function detail(){
		$id                      = str_replace('p',' ',end(explode('-',$this->uri->segment(1))));
		$data['result']          = $this->product_model->get_info($id,array('product_name','view','images','keyword','description','info','price','sale','avarta','pecent','images_color','sale_price','hot','rewrite_link'))	;
		$data['title']           = $data['result']['product_name'];
		$data['keywords']        = $data['result']['keyword'] ;
		$data['description']     = $data['result']['description'] ;
		$data['config']          = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['images']          = json_decode($data['result']['images']);
		$data['images_color']    = json_decode($data['result']['images_color']);
		$data['new_product']     = array_slice($this->cache_site->get_info_cache('new_product', 7200,$this->product_model->get_product(array('status' => 1),10,NULL,'id','DESC')),0,4);
		$data['related_product'] = array_chunk($this->cache_site->get_info_cache('related_product', 7200,$this->product_model->get_product(array('status' => 1,'id !='=>$id),10,NULL,'id','DESC')),3);
		$data['selling_product'] = array_slice($this->cache_site->get_info_cache('selling_product',7200,$this->product_model->get_product(array('status' => 1),10,NULL,'checkout','DESC')),0,1);
		$data['banner_detail']   = $this->banner_model->get_banner(array('status' => 1,'type'=> 4),10,NULL,'id','DESC');
		$data['breadcrumb']      = $data['result']['product_name'];
		$data['curent']			 = SITE_URL.$this->uri->segment(1).'.html';
		$data['menu']            = 'menu_home';
		$data['content']         = 'product/detail';
		$data['class']           = 'product-page left-sidebar category-page';
		$this->load->view("layout",$data);
	}
}