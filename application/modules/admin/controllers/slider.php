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
	class Slider extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->lang->load('admin','vietnamese');
			$this->load->model('slider_model');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function index(){
			$data['title']    = 'Quản lý slider';
			$data['color']    = '#5cb85c';
			$param            = array();
			$param['select']  = array('images','status','color','id');
			$data['template'] = 'slider/list_slider';
			$url              = base_url().'admin/slider/list_all';
			$config           = pagination($url,20,$this->slider_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start            = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param['limit']   = array(20,$start);	
			$data['result']   = $this->slider_model->get_list($param);
			$this->load->view("layout",$data);
		}

		public function list_all(){
			$data['title']    = 'Danh sách tin tức';
			$data['color']    = '#5cb85c';
			$data['template'] = 'slider/list_slider';
			$param            = array();
			$param['select']  = array('images','status','color','id');
			if($this->input->post('users_name') && $this->input->post('users_name') != ""){
				$users_name                     = $this->input->post('users_name');
				$param['like']['username']      =  $users_name;
			}
			if($this->input->post('email') && $this->input->post('email') != ""){
				$user_fullname                  = $this->input->post('fullname');
				$param['like']['user_fullname'] = $user_fullname;
			}
			if($this->input->post('email') && $this->input->post('email') != ""){
				$user_email                     = $this->input->post('email');
				$param['like']['user_email']    = $user_email;
			}
			$url    = base_url().'admin/slider/list_all';
			$config = pagination($url,20,$this->slider_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start                     = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param['limit']            = array(20 ,$start);
			$data['result']            = $this->slider_model->get_list($param);
			$this->load->view($data['template'],$data);
		}

		public function add(){
			$data['title'] = 'Thêm Mới slider';
			$data['color'] = '#5cb85c';
			$template      = 'slider/add_slider';
			$var           = array();
			$request       = $this->input->post();
			if(!empty($request)){
				$this->form_validation->set_rules('color','title ', 'required|trim|xss_clean');
				if($this->form_validation->run() == FALSE){
					$var['error']       = 1;
				}else{
					$db = array(
						'color'        => $this->input->post('color'),
						'images'       => fillter($this->input->post('images')),
						'status'       => $this->input->post('status'),
						'created'      => date("Y-m-d H:i:s", time()),
					);
					$this->slider_model->save($id = false,$db);
					$var['url']             = base_url('admin/slider/list_all');
					$var['error']           = 0;
				}
				$var['content'] = $this->load->view($template,$data,true);
				exit(json_encode($var));
			}else{
				$this->load->view($template,$data);	
			}
		}

		public function edit(){
			$data['title'] = "Sửa sản phẩm";
			$data['color'] = "#5cb85c";
			$template      = 'slider/edit_slider';
			$var           = array();
			$get_request   = $this->input->get();
			$id            = $this->uri->segment(4);
			$request       = $this->input->post();
			$page          = $this->uri->segment(5);
			if(isset($get_request)){
				if(!empty($request)){
					$id                            = $this->uri->segment(4);
					$page                          = $this->uri->segment(5);
					$data['result']['id']          = $id;
					$data['result']['color']       = $this->input->post('color');
					$data['result']['images']      = $this->input->post('images');
					$this->form_validation->set_rules('color','title ', 'required|trim|xss_clean');
					if($this->form_validation->run() == FALSE){
						$var['error'] = 1;
					}else{
						$db = array(
							'color'       => $this->input->post('color'),
							'status'      => $this->input->post('status'),
							'lastupdated' => date("Y-m-d H:i:s", time()),
						);
						if(!empty($this->input->post('new_images'))){
							//pre($this->input->post('images'));
							if(is_file(UPLOAD_DIR.'/slider/'.$this->input->post('images')) == TRUE){
								unlink(UPLOAD_DIR.'/slider/'.$this->input->post('images'));
							}
							$db['images'] = fillter($this->input->post('new_images'));
						}else
						{
							$db['images'] = fillter($this->input->post('images'));
						}
						$this->slider_model->save($id,$db);
						$var['url']     = base_url('admin/slider/list_all').'/'.$page;
						$var['content'] = $this->load->view($template,$data,true);
					}
					$var['content'] = $this->load->view($template,$data,true);
				}else{
					if(!empty($id)){
						$param                = array('images','id','status','color');
						$data['result']       = $this->slider_model->get_info($id,$param);
						$var['content']       = $this->load->view($template,$data,true);
						$var['error']         = 0;
					}else{
						$var['error']         = 1;
						$var['url']           = base_url('admin/slider/list_all').'/'.$page;
					}
				}
			}else{
				$var['error'] = 1;
				$var['url']   = base_url('admin/slider/list_all').'/'.$page;
			}
			exit(json_encode($var));
		}

		public function upload(){
			$output_dir = UPLOAD_DIR.'/slider/';
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
				$file   =   UPLOAD_DIR."/slider/".$this->input->post('url');
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
			$data    = $this->slider_model->get_info($id,array('images'));
			if(isset($id)){
				if($this->slider_model->delete($id)){
					$file   =   UPLOAD_DIR."/slider/".$data['images'];
                	$return =   unlink($file);
					$var['error'] = 0;
				}else{
					$var['error'] = 1;
				}
			}
			$var['url'] = base_url('admin/slider/list_all');
			exit(json_encode($var));
		}

		public function change_status(){
			if(!empty($this->input->post('action'))){
				$data = array();
				$id   = (int)$this->input->post('id');
				if($this->input->post('status') == 'publish'){
					$data['status'] = 1;
					$this->slider_model->save($id,$data);
				}elseif($this->input->post('status') == 'unpublish'){
					$data['status'] = 2;
					$this->slider_model->save($id,$data);
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
							$data['result'] = $this->slider_model->get_info($value,$data);
							$file           = UPLOAD_DIR."/slider/".$data['result']['images'];
							$return         = unlink($file);
							$this->slider_model->delete_rule($param);
						}
					}
					$var['action'] = 'delete';
				}elseif($type == 'publish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 1) ;
							$this->slider_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'publish';
				}elseif($type == 'unpublish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 2) ;
							$this->slider_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'unpublish';
				}
				$var['error'] = 0;
			}else{
				$var['error'] = 1;
			}
			$var['url'] = base_url('admin/slider/list_all');
			exit(json_encode($var));
		}
	}