<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 *
 * @package		anime
 * @author		Tran Hoang Thien (thienhb12@gmail.com)
 * @copyright   PHP TEAM
 * @link		http://phpandmysql.net
 * @since		Version 1.0
 * @phone       0944418192
 *
 */
	class Cate extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->lang->load('admin','vietnamese');
			$this->load->model('cate_model');
			if(!$this->session->userdata("session_user") /*|| $this->session->userdata("session_level") != 1*/){
				redirect(base_url()."admin/login");
			}
		}

		public function index(){
			$data['title']    = 'Danh sách category';
			$data['content'] = 'cate/list';
			$data['modul']					=	$this->uri->segment(2);
			$param                     = array();
			$param['select']           = array('*');
			$list_cate = $this->cate_model->get_list($param);
			$json_cate = json_encode($list_cate,true);
			$dir = 'admin_xs123';
			if (!is_dir($dir)) {
				mkdir($dir);
				$fp = fopen("admin_xs123/cate.json","wb");
				fwrite($fp,$json_cate);
				fclose($fp);
			}else{
				$fp = fopen("admin_xs123/cate.json","wb");
				fwrite($fp,$json_cate);
				fclose($fp);
			}

			$pa['select']           = array('*');
			$pa['where']           = array('cate_status'=>1);
			$list_cate_active = $this->cate_model->get_list($param);
			$json_cate_active = json_encode($list_cate_active,true);
			$dir = 'admin_xs123';
			if (!is_dir($dir)) {
				mkdir($dir);
				$fp = fopen("admin_xs123/cate_active.json","wb");
				fwrite($fp,$json_cate_active);
				fclose($fp);
			}else{
				$fp = fopen("admin_xs123/cate_active.json","wb");
				fwrite($fp,$json_cate_active);
				fclose($fp);
			}
			$data['cate'] = return_array("admin_xs123/cate.json");
//			$Menu = showCategories($data['cate'],0);
//			pre($Menu);
			$this->load->view("layout",$data);
		}

		public function add(){
			$data['title'] = 'Thêm Mới category';
			$data['color'] = '#5cb85c';
			$template      = 'category/add';
			$var           = array();
			$request       = $this->input->post();
			$param                     	= array();
			$param['select']  = array('*');
			$param['where']  = array('status'=>1,'parent'=>0);
			$data['cate_parent']   = $this->cate_model->get_list($param);
			$icon = 0;
			if(!empty($request)){
				$this->form_validation->set_rules('title','title ', 'required|trim|xss_clean');
				$this->form_validation->set_rules('description','Description', 'required|trim|xss_clean');
				$this->form_validation->set_rules('keyword', 'keyword','required|trim|xss_clean');
				$this->form_validation->set_rules('info','Info');
				$this->form_validation->set_rules('avarta','avarta' ,'trim|xss_clean');
				$this->form_validation->set_rules('Order','Order' ,'trim|xss_clean|int');
				if($this->form_validation->run() == FALSE){
					$var['error']       = 1;
				}else if($this->cate_model->check_news($this->input->post('title')) == FALSE){
					$data['error_news'] = '<p class="help-block">Tiêu đề tin đã tồn tại!</p>';
					$var['error']       = 1;
				}
				else{
					if($this->input->post('avarta') != ""){
						$icon = 1;
					}
					$db = array(
						'title'        => fillter($this->input->post('title')),
						'rewrite_link' => str_replace(' ','-',VietChar($this->input->post('title'))),
						'keyword'      => $this->input->post('keyword'),
						'description'  => $this->input->post('description'),
						'avarta'       => $this->input->post('avarta'),
						'info'         => $this->input->post('info'),	
						'status'       => $this->input->post('status'),
						'author'       => $this->session->userdata('iduser'),
						'parent'     => $this->input->post('category'),
						'icon'     => $icon,
						'created'      => date("Y-m-d H:i:s", time()),
					);
					if(!empty($this->input->post('images'))){
						$db['images'] = UPLOAD_DIR.'/news/'.fillter($this->input->post('images'));
					}
					$this->cate_model->save($id = false,$db);
					$var['url']             = base_url('admin/cate/list_all');
					$var['error']           = 0;
				}
				$var['content'] = $this->load->view($template,$data,true);
				exit(json_encode($var));
			}else{
				$this->load->view($template,$data);	
			}
		}

		public function edit(){
			$data['title'] = "Sửa category";
			$data['color'] = "#5cb85c";
			$template      = 'category/edit';
			$var           = array();
			$get_request   = $this->input->get();
			$id            = $this->uri->segment(4);
			$request       = $this->input->post();
			$page          = $this->uri->segment(5);
			$param           = array();
			$params           = array();
			$params['select']  = array('id','title');
			$params['where']  = array('status'=>1,'parent'=>0);
			$data['cate_parent']   = $this->cate_model->get_list($params);
			$icon = 0;
			if(isset($get_request)){
				if(!empty($request)){
					$id                            = $this->uri->segment(4);
					$page                          = $this->uri->segment(5);
					$data['result']['id']          = $id;
					$data['result']['title']       = $this->input->post('title');
					$data['result']['description'] = $this->input->post('description');
					$data['result']['keyword']     = $this->input->post('keyword');
					$data['result']['status']      = $this->input->post('active');
					$data['result']['info']        = $this->input->post('info');
					$data['result']['images']      = $this->input->post('images');
					$data['result']['category']    = $this->input->post('category');
					$data['result']['avarta']      = $this->input->post('avarta');

					$this->form_validation->set_rules('title','title ', 'required|trim|xss_clean','required');
					$this->form_validation->set_rules('description','Description', 'required|trim|xss_clean');
					$this->form_validation->set_rules('keyword', 'keyword','required|trim|xss_clean');
					$this->form_validation->set_rules('info','Info');
					$this->form_validation->set_rules('avarta','avarta' ,'trim|xss_clean');

					if($this->form_validation->run() == FALSE){
						$var['error']       = 1;
					}else if($this->cate_model->check_news($this->input->post('title'),$id) == FALSE){
						$var['error']       = 1;
						$data['error_mail'] = '<p class="help-block">This email areaded exit!</p>';
					}else{
						if($this->input->post('avarta') != ""){
							$icon = 1;
						}

						$str = 
						$db = array(
							'title'        => $this->input->post('title'),
							'rewrite_link' => str_replace(' ','-',VietChar($this->input->post('title'))),
							'keyword'      => $this->input->post('keyword'),
							'description'  => $this->input->post('description'),
							'info'         => $this->input->post('info'),
							'author'       => $this->session->userdata('iduser'),	
							'status'       => $this->input->post('status'),
							'avarta'       => $this->input->post('avarta'),
							'parent'     => $this->input->post('category'),
							'icon'     => $icon,
							'lastupdated'  => date("Y-m-d H:i:s", time()),
						);
						if(!empty($this->input->post('images'))){
							die("ok");
							if(is_file(UPLOAD_DIR.'/news/'.$this->input->post('images')) == TRUE){
								unlink(UPLOAD_DIR.'/news/'.$this->input->post('images'));
							}
							$db['images'] = UPLOAD_DIR.'/news/'.fillter($this->input->post('new_images'));
						}else
						{
							if(!empty($this->input->post('images')) && empty($this->input->post('avarta'))){
								$db['images'] = $this->input->post('images');
							}								
						}

						$this->cate_model->save($id,$db);
						$var['url']     = base_url('admin/cate/list_all').'/'.$page;
						$var['content'] = $this->load->view($template,$data,true);
					}
					$var['content'] = $this->load->view($template,$data,true);
				}else{
					if(!empty($id)){
						$param          = array('description','info','keyword','images','status','parent','Order','avarta','id','title');
						$data['result'] = $this->cate_model->get_info($id,$param);
						$data['page']   = $page; 
						//pre($data['result']);
						$var['content'] = $this->load->view($template,$data,true);
						$var['error']   = 0;
					}else{
						$var['error']         = 1;
						$var['url']           = base_url('admin/cate/list_all').'/'.$page;
					}
				}
			}else{
				$arr['error'] = 1;
				$arr['url']   = base_url('admin/cate/list_all').'/'.$page;
			}
			 $arrayName = array('thien' => 'abc');
//			pre(json_encode($var));
			exit(json_encode($var));
		}

		public function upload(){
			$output_dir = UPLOAD_DIR.'/news/';
			if(isset($_FILES['file'])){
				if(!is_array($_FILES['file']['name'])){
                    $fileName       =   $_FILES["file"]["name"];
                    move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir.$fileName);	  
				}
				exit($fileName);
			}
		}

		public function deleteImage(){
			if(!empty($this->input->post('url'))){
				$file   =   UPLOAD_DIR."/news/".$this->input->post('url');
                $return =   unlink($file);
                if($return == 1){
                	exit($this->input->post('url'));
                }else{
                	exit('0');
                }
			}
		}

		public function delete(){
			$var     = array();
			$id      = $this->uri->segment(4);
			$data    = $this->cate_model->get_info($id,array('images'));
			if(isset($id)){
				if($this->cate_model->delete($id)){
					if(!empty($data['images'])){
						$file   =   $data['images'];
                		$return =   unlink($file);
					}
					$var['error'] = 0;
				}else{
					$var['error'] = 1;
				}
			}
			$var['url'] = base_url('admin/cate/list_all');
			exit(json_encode($var));
		}

		public function change_status(){
			if(!empty($this->input->post('action'))){
				$data = array();
				$id   = (int)$this->input->post('id');
				if($this->input->post('status') == 'publish'){
					$data['status'] = 1;
					$this->cate_model->save($id,$data);
				}elseif($this->input->post('status') == 'unpublish'){
					$data['status'] = 2;
					$this->cate_model->save($id,$data);
				}
			}
		}

		public function bulk_action(){
			$var      = array();
			$request  = $this->input->post();
			if(!empty($request)){
				$type = $this->uri->segment(4);
				$uid  = $this->input->post('id');
				if($type == 'delete'){
					if(!empty($uid)){
						foreach($uid as $value){
							$param          = array('id' => $value);
							$data           = array('images');
							$data['result'] = $this->news_model->get_info($value,$data);
							$file           = $data['result']['images'];
							$return         = unlink($file);
							$this->news_model->delete_rule($param);
						}
					}
					$var['action'] = 'delete';
				}elseif($type == 'publish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 1) ;
							$this->news_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'publish';
				}elseif($type == 'unpublish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 2) ;
							$this->news_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'unpublish';
				}
				$var['error'] = 0;
			}else{
				$var['error'] = 1;
			}
			$var['url'] = base_url('admin/news/list_all');
			exit(json_encode($var));
		}
	}