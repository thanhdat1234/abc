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
class News extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->lang->load('frontend','vietnamese');
	}

	public function index(){
		$data['menu']        = 'menu_home';
		$data['content']     = 'news/list_news';
		$data['title']       = $this->lang->line('fashion_trends');
		$data['keywords']    = $this->lang->line('fashion_trends');
		$data['description'] = $this->lang->line('fashion_trends');
		$data['config']      = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']    = $this->cache_site->get_info_cache('top_view', 900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$url                 = SITE_URL.'xu-huong-thoi-trang';
		$data['seo_url']     = $url;
		$data['breadcrumb']  = $this->lang->line('fashion_trends');
		$segment             = $this->uri->segment(2);
		$total               = $this->news_model->get_total();
		if($segment == NULL){
			$offset = 0;
		}else{
			$offset = ($segment - 1) * 1;
		}
		$config            = paging($url,7,$total);
		$this->pagination->initialize($config);
		$data['list_post'] = $this->news_model->get_news(array('status' => 1,'category' => 0),7,$offset,'id','DESC');
		$data['class']     = 'category-page';
		$this->load->view("layout",$data);

	}

	public function detail(){
		$id                  = str_replace('n',' ',end(explode('-',$this->uri->segment(2))));
		$data['result']      = $this->news_model->get_info($id,array('title','author','info','keyword','description','created','images','category','avarta'));
		$data['title']       = $data['result']['title'];
		$data['keywords']    = $data['result']['keyword'];
		$data['description'] = $data['result']['description'];
		$data['top_view']    = $this->cache_site->get_info_cache('top_view',900,$this->news_model->get_news(array('status' => 1),10,NULL,'view','DESC')); 
		$data['random_news'] = array_chunk($this->cache_site->get_info_cache('random_news',900,$this->news_model->get_news(array('status' => 1,'id !=' => $id),30,NULL,'id','random')),10); 
		$data['config']      = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		if($data['result']['category'] == 0){
			$data['breadcrumb']  = 'Xu hướng thời trang';
		}else{
			$data['breadcrumb']  = 'Khuyến mại';
		}
		$data['menu']        = 'menu_home';
		$data['content']     = 'news/detail';
		$data['class']       = 'category-page';
		$this->load->view("layout",$data);
	}

	public function promotion(){
		$data['menu']       = 'menu_home';
		$data['content']    = 'news/list_news';
		$data['breadcrumb'] = 'Khuyến mại';
		$data['config']     = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('title','keyword','description','phone','per_page_product','phone','address','email','fan_page','hotline','map')));
		$data['top_view']   = $this->cache_site->get_info_cache('top_view',900,$this->news_model->get_news(array('status' => 1),10,$offset = NULL,'view','DESC')); 
		$url                = SITE_URL.'khuyen-mai';
		$data['seo_url']    = $url;
		$segment            = $this->uri->segment(2);
		if($segment == NULL){
			$offset = 0;
		}else{
			$offset = ($segment - 1) * 1;
		}		
		$data['list_post']  = $this->news_model->get_news(array('status' => 1,'category' => 1),7,$offset,'id','DESC');
		$total              = count($data['list_post']);
		$config             = paging($url,7,$total);
		$this->pagination->initialize($config);
		$data['class']      = 'category-page';
		$this->load->view("layout",$data);
	}
}

/* End of file index.php */
/* Location: ./application/modules/home/controllers/index.php */