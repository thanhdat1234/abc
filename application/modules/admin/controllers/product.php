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
			$this->load->model('product_model');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function index(){
			$data['title']    = 'List product';
			$data['modul']    = 'product';
			$param            = array();
			$param['select']  = array('*');
			$data['content'] = 'product/list';
			$list_pro   = $this->product_model->get_list($param);
			$json_pro = json_encode($list_pro,true);
			$dir = 'admin_xs123';
			return_array_creat_file($dir,"product.json",$json_pro);
			$data['product'] = return_array("admin_xs123/product.json");
//			pre($data['product']);
			$this->load->view("layout",$data);
		}
		public function update_info(){
			if(isset($_POST)){
				$id=$_POST['id'];
				$value=$_POST['val'];
				$type=$_POST['types'];
				$data=array($type=>$value);
				$dk = $this->product_model->update($id,$data);

			}
		}
		public function update_qty(){
			if(isset($_POST)){
				$id=$_POST['id'];
				$value=$_POST['val'];
				$data=array("pro_qty"=>$value);
				$dk = $this->product_model->update($id,$data);

			}
		}

		public function del(){
			$data['title']    = 'List product';
			$id = $this->uri->segment(4);
			$this->product_model->delete($id);
			redirect('/admin/product', 'refresh');
		}

		public function edit(){
			$data['title']    = 'Edit product';
			$data['modul'] = "product";
			$data['content'] = "product/edit";
			$id = $this->uri->segment(4);
			$product = return_array("admin_xs123/product.json");
			$data['item'] = return_item_product($id,$product);
			$data['cate'] = return_array("admin_xs123/cate_active.json");
            if($this->input->post()){
                $reques = $this->input->post();
                pre($reques);
                $pro_name = $this->input->post();
                $pro_code = $this->input->post();
                $pro_name = $this->input->post();
                $pro_name = $this->input->post();
            }
			$this->load->view("layout",$data);
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
				$this->form_validation->set_rules('info','Info' ,'required');
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
						'rewrite_link'    => str_replace(' ','-',VietChar($this->input->post('product_name'))),
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
					if($this->input->post('sale') == 1){
						$sale_price    = $this->input->post('sale_price');
						$price         = $this->input->post('price');
						$pecent        = ($price - $sale_price)*100/$price;
						$db['pecent'] = $pecent;  
					}
					if(!empty($images)){
						$db['images']       = json_encode(array_values($new_arr_img));
						if(!empty($avarta)){
							$db['avarta']   = $avarta;
						}
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
				$var       = array();
				$id        = $this->input->post("id");
				if(!empty($id)){
					$data      = $this->product_model->get_info($id,'images,images_color,avarta');
					$arr_img   = json_decode($data['images']);
					$arr_color = json_decode($data['images_color']);
					$key       = array_search($this->input->post('url'),$arr_img);
					$key_cl    = array_search($this->input->post('url'),$arr_color);
					$db        = array();
					if(!is_null($key_cl) && is_int($key_cl)){
						unset($arr_color[$key_cl]);
						$db['images_color'] = json_encode(array_values($arr_color));
					}
					if($data['avarta'] == $this->input->post('url')){
						$db['avarta']       = '';
					}
					unset($arr_img[$key]);
					$db['images'] = json_encode(array_values($arr_img));
					$data         = $this->product_model->save($id,$db);
				}
				$file         = UPLOAD_DIR."/product/".$this->input->post('url');
				if(is_file($file ) == TRUE){
					$return       = unlink($file);
				}else{
					$return = 0; 
				}
                if($return == 1){
                	$var['error'] = 0;
                }else{
                	$var['error'] = 1;
                }
                exit(json_encode($var));
			}
		}

		public function delete(){
			$var = array();
			$id = $this->uri->segment(4);
			$data = $this->product_model->get_info($id,'images');
			$arr_img = json_decode($data['images']);
			if(isset($id)){
				if($this->product_model->delete($id)){
					if(!empty($arr_img)){
						foreach($arr_img as $value){
							if(is_file(UPLOAD_DIR.'/product/'.$value) == TRUE){
								unlink(UPLOAD_DIR.'/product/'.$value);
							}
						}
					}
					$var['error'] = 0;
				}else{
					$var['error'] = 1;
				}
			}
			$var['url'] = base_url('admin/product/index');
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
							$param          = array('id' => $value);
							$data           = array('images');
							$data['result'] = $this->product_model->get_info($value,$data);
							$images         = json_decode($data['result']['images']);
							if(!empty($images)){
								foreach($images as $value){
									$file           = UPLOAD_DIR."/product/".$value;
									$return         = unlink($file);
								}
							}
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
				$id        = $this->input->post('id_pro');
				$data      = $this->product_model->get_info($id,array('avarta'));
				$var       = array();
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
						if($data['avarta'] == $old_file){
							$this->product_model->save($id,array('avarta' => $name_file));
						}
						$var['id']      = $type_file[0];
						$var['warning'] = 'Đổi tên file thành công';
						$var['error']   = 0; 
					}
				}
				exit(json_encode($var));
			}
		}
	}