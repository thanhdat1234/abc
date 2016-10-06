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
	class banner extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->lang->load('admin','vietnamese');
			$this->load->model('banner_model');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function index(){
			$data['title']    = 'Quản lý banner';
			$data['type']     = $this->uri->segment(4);
			$data['color']    = '#5cb85c';
			$param            = array();
			$param['select']  = array('images','status','type','id','link','colum');
			$param['where']   = array('type' => $data['type'] );
			$data['template'] = 'banner/list_banner';
			$url              = base_url().'admin/banner/list_all';
			$config           = pagination($url,20,$this->banner_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start            = $this->uri->segment(5)?$this->uri->segment(5):0;
			$param['limit']   = array(20,$start);	
			$data['result']   = $this->banner_model->get_list($param);
			$this->load->view("layout",$data);
		}

		public function list_all(){
			$data['title']    = 'Danh sách banners';
			$data['color']    = '#5cb85c';
			$data['template'] = 'banner/list_banner';
			$param            = array();
			$data['type']     = $this->uri->segment(4);
			$param['select']  = array('images','status','link','id','colum');
			$param['where']   = array('type' => $data['type']);
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
			$url            = base_url().'admin/banner/list_all';
			$config         = pagination($url,20,$this->banner_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start          = $this->uri->segment(5)?$this->uri->segment(5):0;
			$param['limit'] = array(20 ,$start);
			$data['result'] = $this->banner_model->get_list($param);
			$this->load->view($data['template'],$data);
		}

		public function add(){
			$data['title'] = 'Thêm Mới banner';
			$data['color'] = '#5cb85c';
			$template      = 'banner/add_banner';
			$var           = array();
			$request       = $this->input->post();
			$data['type']  = $this->uri->segment(4);
			if(!empty($request)){
				$this->form_validation->set_rules('link','link','required|trim|xss_clean');
				if($this->form_validation->run() == FALSE){
					$var['error']       = 1;
				}else{
					$db = array(
						'link'   => $this->input->post('link'),
						'images' => fillter($this->input->post('images')),
						'status' => $this->input->post('status'),
						'type'   => $data['type']
					);
					if($this->input->post('colum')){
						$db['colum'] = $this->input->post('colum');
					}
					$this->banner_model->save($id = false,$db);
					$var['url']             = base_url('admin/banner/list_all').'/'.$data['type'];
					$var['error']           = 0;
				}
				$var['content'] = $this->load->view($template,$data,true);
				exit(json_encode($var));
			}else{
				$this->load->view($template,$data);	
			}
		}

		public function edit(){
			$data['title'] = "Sửa banner";
			$data['color'] = "#5cb85c";
			$template      = 'banner/edit_banner';
			$var           = array();
			$get_request   = $this->input->get();
			$id            = $this->uri->segment(4);
			$request       = $this->input->post();
			$data['page']  = $this->uri->segment(5);
			if(isset($get_request)){
				if(!empty($request)){
					$id                            = $this->uri->segment(4);
					$page                          = $this->uri->segment(5);
					$data['result']['id']          = $id;
					$data['result']['color']       = $this->input->post('color');
					$data['result']['images']      = $this->input->post('images');
					$data['result']['type']        = $this->input->post('type');
					$data['result']['colum']       = $this->input->post('colum');
					$this->form_validation->set_rules('link','link ', 'required|trim|xss_clean');
					if($this->form_validation->run() == FALSE){
						$var['error'] = 1;
					}else{
						$type = $this->input->post('type');
						$db = array(
							'link'   => $this->input->post('link'),
							'images' => fillter($this->input->post('images')),
							'status' => $this->input->post('status')
						);
						if(!empty($this->input->post('new_images'))){
							if(is_file(UPLOAD_DIR.'/banner/'.$this->input->post('images')) == TRUE){
								unlink(UPLOAD_DIR.'/banner/'.$this->input->post('images'));
							}
							$db['images'] = fillter($this->input->post('new_images'));
						}else
						{
							$db['images'] = fillter($this->input->post('images'));
						}
						if($this->input->post('colum')){
							$db['colum'] = $this->input->post('colum');
						}
						$this->banner_model->save($id,$db);
						$var['url']     = base_url('admin/banner/list_all').'/'.$type.'/'.$page;
						$var['content'] = $this->load->view($template,$data,true);
					}
					$var['content'] = $this->load->view($template,$data,true);
				}else{
					if(!empty($id)){
						$param                = array('images','id','status','link','type','colum');
						$data['result']       = $this->banner_model->get_info($id,$param);
						$var['content']       = $this->load->view($template,$data,true);
						$var['error']         = 0;
					}else{
						$var['error']         = 1;
						$var['url']           = base_url('admin/banner/list_all').'/'.$type.'/'.$page;
					}
				}
			}else{
				$var['error'] = 1;
				$var['url']   = base_url('admin/banner/list_all').'/'.$page;
			}
			exit(json_encode($var));
		}

		public function upload(){
			$output_dir = UPLOAD_DIR.'/banner/';
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
				$file   =   UPLOAD_DIR."/banner/".$this->input->post('url');
                if(is_file($file)){
                	$return =   unlink($file);
            	}
                if($return == 1){
                	exit($this->input->post('url'));
                }else{
                	exit('0');
                }
			}
		}

		public function delete(){
			$var     = array();
			$id      = $this->uri->segment(5);
			$type    = $this->uri->segment(4);
			$data    = $this->banner_model->get_info($id,array('images'));
			if(isset($id)){
				if($this->banner_model->delete($id)){
					$file   =   UPLOAD_DIR."/banner/".$data['images'];
                	if(is_file($file)){
                		$return =   unlink($file);
                	}
					$var['error'] = 0;
				}else{
					$var['error'] = 1;
				}
			}
			$var['url'] = base_url('admin/banner/list_all').'/'.$type;
			exit(json_encode($var));
		}

		public function change_status(){
			if(!empty($this->input->post('action'))){
				$data = array();
				$id   = (int)$this->input->post('id');
				if($this->input->post('status') == 'publish'){
					$data['status'] = 1;
					$this->banner_model->save($id,$data);
				}elseif($this->input->post('status') == 'unpublish'){
					$data['status'] = 2;
					$this->banner_model->save($id,$data);
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
							$data['result'] = $this->banner_model->get_info($value,$data);
							$file           = UPLOAD_DIR."/banner/".$data['result']['images'];
							if(is_file($file)){
								$return         = unlink($file);
							}
							$this->banner_model->delete_rule($param);
						}
					}
					$var['action'] = 'delete';
				}elseif($type == 'publish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 1) ;
							$this->banner_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'publish';
				}elseif($type == 'unpublish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 2) ;
							$this->banner_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'unpublish';
				}
				$var['error'] = 0;
			}else{
				$var['error'] = 1;
			}
			$var['url'] = base_url('admin/banner/list_all');
			exit(json_encode($var));
		}
	}