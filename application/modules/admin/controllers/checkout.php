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
	class Product extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->lang->load('admin','vietnamese');
			$this->load->model('checkout_model');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function index(){
			$data['title']    = 'Danh sách đơn hàng';
			$data['color']    = '#5cb85c';
			$param            = array();
			$param['select']  = array('product_name','avarta','status','price','id','description','view');
			$data['template'] = 'product/list_product';
			$url              = base_url().'admin/product/list_all';
			$config           = pagination($url,20,$this->product_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start            = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param['limit']   = array($config['per_page'] ,$start);	
			$data['result']   = $this->product_model->get_list($param);
			$this->load->view("layout",$data);
		}

		public function list_all(){
			$data['title']             = 'Danh sách đơn hàng';
			$data['color']             = '#5cb85c';
			$data['template']          = 'product/list_product';
			$param                     = array();
			$param['select']           = array('product_name','avarta','status','price','id','description','view');
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
			$url    = base_url().'admin/product/list_all';
			$config = pagination($url,20,$this->product_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start                     = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param['limit']            = array($config['per_page'] ,$start);
			$data['result']            = $this->product_model->get_list($param);
			$this->load->view($data['template'],$data);
		}

		public function add(){
			$data['title'] = 'Thêm Mới sản phẩm';
			$data['color'] = '#5cb85c';
			$template      = 'product/add_product';
			$var           = array();
			$request       = $this->input->post();
			if(!empty($request)){
				$this->form_validation->set_rules('product_name','Product name', 'required|trim|xss_clean');
				$this->form_validation->set_rules('description','Description', 'required|trim|xss_clean');
				$this->form_validation->set_rules('price', 'price','required|trim|xss_clean|numeric');
				$this->form_validation->set_rules('sale_price', 'sale price','trim|xss_clean|numeric');
				$this->form_validation->set_rules('keyword', 'keyword','required|trim|xss_clean');
				$this->form_validation->set_rules('info','Info' ,'trim|xss_clean|');
				if(!empty($this->input->post('images'))){
					$new_arr_img  = array();
					$images       = $this->input->post('images'); 
					$images_color = $this->input->post('images_color');
					foreach($images as $key => $value){
						$key_type          = explode('.', $key);
						$new_arr_img[$key] = $value.'.'.$key_type[1];
						if($value  == $this->input->post('avarta'))
						{
				 			$avarta =  $value.'.'.$key_type[1];
						}
					}
				}
				if($this->form_validation->run() == FALSE){
					if(!empty($images)){
						foreach($images  as  $key => $value){
							if(is_file(UPLOAD_DIR.'/product/'.$key) == TRUE){
								unlink(UPLOAD_DIR.'/product/'.$key);
							}
						}
					}
					$var['error']       = 1;
				}else if($this->product_model->check_product($this->input->post('product_name')) == FALSE){
					if(!empty($images)){
						if(is_file(UPLOAD_DIR.'/product/'.$key) == TRUE){
							unlink(UPLOAD_DIR.'/product/'.$key);
						}
					}
					$data['error_product'] = '<p class="help-block">Tên sản phẩm đã tồn tại!</p>';
					$var['error']          = 1;
				}
				else{
					$db = array(
						'product_name'    => fillter($this->input->post('product_name')),
						'keyword'         => fillter($this->input->post('keyword')),
						'price'           => fillter($this->input->post('price')),
						'description'     => fillter($this->input->post('description')),
						'info'            => $this->input->post('info'),	
						'hot'             => $this->input->post('hot'),
						'sale_price'      => $this->input->post('sale_price'),
						'sale'            => $this->input->post('sale'),
						'type'            => $this->input->post('type'),
						'status'          => $this->input->post('status'),
						'created'         => date("Y-m-d H:i:s", time()),
					);
					if(!empty($images)){
						$db['images']       = json_encode(array_values($new_arr_img));
						$db['avarta']       = $avarta;
					}
					if(!empty($images_color)){
						$new_color_images   = array_intersect_key($new_arr_img,$images_color);
						$db['images_color'] = json_encode(array_values($new_color_images));
					}
					$this->product_model->save($id = false,$db);
					$var['url']             = base_url('admin/product/list_all');
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
			$template      = 'product/edit_product';
			$var           = array();
			$get_request   = $this->input->get();
			$id            = $this->uri->segment(4);
			$request       = $this->input->post();
			if(isset($get_request)){
				if(!empty($request)){
					$id                             = $this->uri->segment(4);
					$data['result']['id']           = $id;
					$data['result']['product_name'] = $this->input->post('product_name');
					$data['result']['description']  = $this->input->post('description');
					$data['result']['price']        = $this->input->post('price');
					$data['result']['sale_price']   = $this->input->post('sale_price');
					$data['result']['status']       = $this->input->post('active');
					$this->form_validation->set_rules('product_name','Product name', 'required|trim|xss_clean');
					$this->form_validation->set_rules('description','Description', 'required|trim|xss_clean');
					$this->form_validation->set_rules('price', 'price','required|trim|xss_clean|numeric');
					$this->form_validation->set_rules('sale_price', 'sale price','trim|xss_clean|numeric');
					$this->form_validation->set_rules('keyword', 'keyword','required|trim|xss_clean');
					$this->form_validation->set_rules('info','Info' ,'trim|xss_clean|');
					if($this->form_validation->run() == FALSE){
						if(!empty($images)){
							foreach($images  as  $key => $value){
								if(is_file(UPLOAD_DIR.'/product/'.$key) == TRUE){
									unlink(UPLOAD_DIR.'/product/'.$key);
								}
							}
						}
						$var['error']       = 1;
					}else if($this->product_model->check_product($this->input->post('product_name'),$id) == FALSE){
						if(!empty($images)){
							if(is_file(UPLOAD_DIR.'/product/'.$key) == TRUE){
								unlink(UPLOAD_DIR.'/product/'.$key);
							}
						}
						$var['error']       = 1;
						$data['error_mail'] = '<p class="help-block">This email areaded exit!</p>';
					}else{
						$db = array(
							'product_name'    => fillter($this->input->post('product_name')),
							'keyword'         => fillter($this->input->post('keyword')),
							'price'           => fillter($this->input->post('price')),
							'description'     => fillter($this->input->post('description')),
							'info'            => $this->input->post('info'),	
							'hot'             => $this->input->post('hot'),
							'sale_price'      => fillter($this->input->post('sale_price')),
							'sale'            => $this->input->post('sale'),
							'type'            => $this->input->post('type'),
							'status'          => $this->input->post('status'),
							'lastupdated'     => date("Y-m-d H:i:s", time()),
						);
						$this->product_model->save($id,$db);
						$var['url']   = base_url('admin/product/list_all').'/'.$page;
						$var['content'] = $this->load->view($template,$data,true);
					}
					$var['content'] = $this->load->view($template,$data,true);
				}else{
					if(!empty($id)){
						$param                = array('product_name','id','price','sale_price','status','images','images_color','avarta','type','description','keyword','info','hot','sale');
						$data['result']       = $this->product_model->get_info($id,$param);
						$data_images          = json_decode($data['result']['images']);
						$data_color_img       = json_decode($data['result']['images_color']);
						$data['images']       = array();
					    $data['images_color'] = array();
						foreach($data_images as $value){
							$name_img                     = explode('.',$value);
							$data['images'][$name_img[0]] = $name_img[1];  
						}
						foreach($data_color_img as $value){
							$data['images_color'][$value] = 'checked=""';
						}
						$var['content']       = $this->load->view($template,$data,true);
						$var['error']         = 0;
					}else{
						$var['error']         = 1;
						$var['url']           = base_url('admin/product/list_all').'/'.$page;
					}
				}
			}else{
				$var['error'] = 1;
				$var['url']   = base_url('admin/product/list_all').'/'.$page;
			}
			exit(json_encode($var));
		}

		public function upload(){
			$output_dir = UPLOAD_DIR.'/product/';
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
				$file   =   UPLOAD_DIR."/product/".$this->input->post('url');
                $return =   unlink($file);
                if($return == 1){
                	exit($this->input->post('url'));
                }else{
                	exit('0');
                }
			}
		}

		public function delete(){
			$var = array();
			$id = $this->uri->segment(4);
			$data = $this->product_model->get_info($id,'images');
			$arr_img = json_decode($data['images']);
			if(isset($id)){
				if($this->product_model->delete($id)){
					foreach($arr_img as $value){
						if(is_file(UPLOAD_DIR.'/product/'.$value) == TRUE){
							unlink(UPLOAD_DIR.'/product/'.$value);
						}
					}
					$var['error'] = 0;
				}else{
					$var['error'] = 1;
				}
			}
			$var['url'] = base_url('admin/product/list_all');
			exit(json_encode($var));
		}

		public function change_status(){
			if(!empty($this->input->post('action'))){
				$data = array();
				$id   = (int)$this->input->post('id');
				if($this->input->post('status') == 'publish'){
					$data['status'] = 1;
					$this->product_model->save($id,$data);
				}elseif($this->input->post('status') == 'unpublish'){
					$data['status'] = 2;
					$this->product_model->save($id,$data);
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
							$param = array('id' => $value);
							$this->product_model->delete_rule($param);
						}
					}
					$var['action'] = 'delete';
				}elseif($type == 'publish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 1) ;
							$this->product_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'publish';
				}elseif($type == 'unpublish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('id'=> $value);
							$data  = array('status' => 2) ;
							$this->product_model->update_rule($where,$data);
						}
					}
					$var['action'] = 'unpublish';
				}
				$var['error'] = 0;
			}else{
				$var['error'] = 1;
			}
			$var['url'] = base_url('admin/product/list_all');
			exit(json_encode($var));
		}

		public function check_file(){
			if($this->input->post('namefile'))
			{
				$var = array();
				$old_file  = $this->input->post('old_file');
				$type_file = explode('.', $old_file);	
				$name_file = $this->input->post('namefile').'.'.$type_file[1];
				if($old_file != $name_file){
					if(is_file(UPLOAD_DIR.'/product/'.$name_file) == TRUE)
					{
						$var['id']      = $type_file[0];
						$var['warning'] = 'file ảnh trùng tên vui lòng chọn tên khác';
						$var['error']   = 1; 
					}else{
						rename(UPLOAD_DIR.'/product/'.$old_file, UPLOAD_DIR.'/product/'.$name_file);
						$var['id']      = $type_file[0];
						$var['warning'] = 'Đổi tên file thành công';
						$var['error']   = 0; 
					}
				}
				exit(json_encode($var));
			}
		}
	}