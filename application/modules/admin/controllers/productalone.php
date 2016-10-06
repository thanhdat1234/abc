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
	class Productalone extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->lang->load('admin','vietnamese');
			$this->load->model('productalone_model');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function index(){
			$data['title']    = 'Danh sách sản phẩm';
			$data['color']    = '#5cb85c';
			$param            = array();
			$param['select']  = array('*');
			$data['template'] = 'productalone/list';
			$url              = base_url().'admin/product/list_all';
			$config           = pagination($url,20,$this->productalone_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start            = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param['limit']   = array(20 ,$start);	
			$data['result']   = $this->productalone_model->get_product(array('id'=>1));
			if($data['result'] == NULL){
				$data['result']['name'] = '';
				$data['result']['images'] = '';
			}
			$data['pro_tabs'] = $this->productalone_model->get_category();
			// pre($data['pro_tabs']);
//			pre($data['result']);
			$this->load->view("layout",$data);
		}
//	intro product
		public function intro(){
			$data['title']    = 'Danh sách intro';
			$data['color']    = '#5cb85c';
			$param            = array();
			$param['select']  = array('*');
			$data['template'] = 'productalone/list_intro';
			$url              = base_url().'admin/product/list_all';
			$config           = pagination($url,20,$this->productalone_model->get_total($param),4);
			$this->pagination->initialize($config);
			$start            = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param['limit']   = array(20 ,$start);
			$data['result']   = $this->productalone_model->get_product(array('id'=>1));
			if($data['result'] == NULL){
				$data['result']['name'] = '';
				$data['result']['images'] = '';
			}
			$data['pro_intro'] = $this->productalone_model->get_intro();
//			 pre($data['pro_intro']);
//			pre($data['result']);
			$this->load->view("layout",$data);
		}
		public function edit_intro(){
			$data['title']    = 'Sửa intro';
			$data['color']    = '#5cb85c';
			$id            = $this->uri->segment(4)?$this->uri->segment(4):0;
			$param            = array();
			$param['select']  = array('*');
			$data['template'] = 'productalone/edit_intro';
			$where = array('id'=>$id);
			$data['result'] = $this->productalone_model->get_intro($where,0);
//			pre($data['pro_intro']);
			$request       = $this->input->post();
			if(isset($request)){
//				pre($request);
			}
			$this->load->view("layout",$data);
		}
//	end edit intro product
		public function info(){
			$id = 1;
			$template      = '/admin/productalone';
			$var           = array();
			$request       = $this->input->post();
			$avarta 		= "";
			$db = array();
			if(!empty($request)){
				// pre($this->input->post());
				$data['result']['name'] = $this->input->post('product_name');
				if($_FILES['images']['name'] != ''){
					$upload = $this->do_upload(UPLOAD_DIR.'/product/', 'images');
					$db['images'] = $upload['img'];
				}
				if(isset($upload['error'])){
					$data['erros'] = $upload['error'];
					echo '<script> alert("có lỗi sảy ra! vui lòng kiểm tra lại");location="'.$template.'"</script>';
				}else{
					$this->form_validation->set_rules('name','name', 'required|trim|xss_clean');
					$db['name']	= fillter($this->input->post('name'));
					// pre($db);
					$this->productalone_model->save($id,$db);
					redirect($template);
				}
			}else{
				redirect($template);
			}
		}
		public function change_status(){
			if(!empty($this->input->post('action'))){
				$data = array();
				$id   = (int)$this->input->post('id');
				$where = array('id'=>$id);
				$table = $this->input->post('table');
				if(!isset($table) || $table == '') {
					$table = "product_category";
				}
				if($this->input->post('status') == 'publish'){
						$data['status'] = 1;
				}elseif($this->input->post('status') == 'unpublish'){
						$data['status'] = 2;
				}
				$this->productalone_model->update_rule_table($where,$data,$table);
			}
		}
		public function edit(){
			if(!empty($this->input->post('act')) && $this->input->post('act') == 'edit'){
				$id = $this->input->post('id');
				$table = $this->input->post('tab');
				$param['where'] = array('id'=>$id);
				$param['select']= array('images','title','id','status');
				$data =  $this->productalone_model->get_data_row($param,$table);
				die(json_encode($data));
			}
		}
		public function update(){
			if(!empty($this->input->post('act')) && $this->input->post('act') == 'update'){
				$id = $this->input->post('id');
				$table = $this->input->post('tab');
				$where = array('id'=>$id);
				$status = $this->input->post('status');
				$url_img = $this->input->post('url_img');
				$title = $this->input->post('title');
				$data =  array();
				if(isset($status) || $status != ''){
					$data['status']  = $status;
				}
				if(isset($url_img) || $url_img != ''){
					$data['images']  = $url_img;
				}
				if(isset($title) || $title != ''){
					$data['title']  = $title;
				}
				$datas =  $this->productalone_model->update_rule_table($where,$data,$table);
				die($datas);
			}
		}
		public function add(){
			if(!empty($this->input->post('act')) && $this->input->post('act') == 'add'){
				$table = $this->input->post('tab');
				$status = $this->input->post('status');
				$url_img = $this->input->post('url_img');
				$title = $this->input->post('title');
				if(!isset($title) || $title == ''){
					die("Bạn chưa nhập tên menu");
				}
				$data = array('title'=>$title,'status'=>$status,'images'=>$url_img);
				$id = $this->productalone_model->insert_change_table($data,$table);
				if(isset($id) && $id != 0){
					die("1");
				}else{
					die("Bạn chưa nhập tên menu");
				}
			}
		}
		public function del(){
			if(!empty($this->input->post('act')) && $this->input->post('act') == 'del'){
				$id = $this->input->post('id');
				$table = $this->input->post('tab');
				$where = array('id'=>$id);
				$datas =  $this->productalone_model->delete_rule_id($where,$table);
				die($datas);
			}
		}
	}