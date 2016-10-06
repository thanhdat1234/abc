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
class Index extends MY_Controller {
	public function __construct(){
		parent:: __construct();
		$this->lang->load('frontend','vietnamese');
		$this->load->model('cate_model');
	}

	public function index(){
		$data                   = array();
		$data['config']         = $this->cache_site->get_info_cache('config',900,$this->config_model->get_info(1,array('config_title','config_key','config_des')));
		$data['title']          = $data['config']['config_title'];
		$data['key']        	= $data['config']['config_key'];
		$data['des']     	 	= $data['config']['config_des'];
		$data['slide']			= $this->cache_site->get_info_cache('slide',900,return_array("cache-site/slide.json"));
		$data['pro_sale'] = $this->cache_site->get_info_cache('pro_sale',900,return_array("cache-site/product/pro_sale.json"));
		unset($data['config']);
//		pre($data['pro_sale']);
		$this->load->view("layout",$data);
	}

	public function cachesearch(){
		$search = PATH.'/assets/home/js/search.js';
		$expire = 86400;
		if(!file_exists($search)){
			$param           = array();
			$param['select'] = array('idphim','name','thumb','rewrite');
			$param['where']  = array('status' => 1);
			$arr             =  $this->film_model->get_list($param);
			if(!empty($arr)){
				foreach ($arr as $value) {
					$search_html[] = array('title' => $value['name'],'rewrite' => $value['rewrite'],'thumb' => $value['thumb'],'id'=> $value['idphim']);
				}
				$search_html = json_encode($search_html);
				$search_html = str_replace(array('[',']'),'',$search_html);
				END_CACHE('var ins_search = Array('.$search_html.')',$search);
			}
		}else{
			if(filemtime($search) < (time() - $expire)){
				$param           = array();
				$param['select'] = array('idphim','name','thumb','rewrite');
				$param['where']  = array('status' => 1);
				$arr             =  $this->film_model->get_list($param);
				if(!empty($arr)){
					foreach ($arr as $value) {
						$search_html[] = array('title' => $value['name'],'rewrite' => $value['rewrite'],'thumb' => $value['thumb'],'id'=> $value['idphim']);
					}
					$search_html = json_encode($search_html);
					$search_html = str_replace(array('[',']'),'',$search_html);
					END_CACHE('var ins_search = Array('.$search_html.')',$search);
				}
			}
		}
	}
	
	
}

/* End of file index.php */
/* Location: ./application/modules/home/controllers/index.php */