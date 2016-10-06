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
	class Config extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->load->model('config_model');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->lang->load('admin','vietnamese');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function edit(){
			$data['title']    = "Website configuration";
			$data['color']    = "#33925c";
			$data['template'] = 'config/edit_config';
			$var              = array();
			$id               = $this->uri->segment(4);
			$request          = $this->input->post();
			if(isset($id)){
				if(!empty($request)){
					$id = $this->uri->segment(4);
					$this->form_validation->set_rules('cf_title','Title', 'required|trim|xss_clean');
					$this->form_validation->set_rules('cf_address','Address', 'required|trim|xss_clean');
					$this->form_validation->set_rules('cf_numrecord','Number record','required|trim|xss_clean');
					$this->form_validation->set_rules('cf_seo', 'Seo','required|trim|xss_clean');
					$this->form_validation->set_rules('cf_description', 'Desciption','required|trim|xss_clean');
					$this->form_validation->set_rules('cf_email', 'Email','required|trim|email|xss_clean');
					$this->form_validation->set_rules('cf_phone', 'Phone','required|trim|xss_clean');
					$this->form_validation->set_rules('cf_hotline', 'Phone','required|trim');
					$this->form_validation->set_rules('cf_fanpage', 'Fanpage','required|trim|xss_clean');
					$this->form_validation->set_rules('map', 'map','required|trim');
					if($this->form_validation->run() == FALSE){
						$data['title']    = "Sửa thông tin cấu hình trang";
						$data['color']    = "#33925c";
						$data['template'] = 'config/edit_config';
						$param            = array('id','title','keyword','description','per_page_product','phone','address','email','fan_page','map');
						$data['result']   = $this->config_model->get_info($id,$param);
						$this->load->view('layout',$data);
						
					}else{
							$title      = fillter($this->input->post('cf_title'));
							$link       = fillter($this->input->post('cf_address'));
							$num        = fillter($this->input->post('cf_numrecord'));
							$seo        = fillter($this->input->post('cf_seo'));
							$meta       = fillter($this->input->post('cf_meta'));
							$desciption = $this->input->post('cf_description');
							$email      = fillter($this->input->post('cf_email'));
							$phone      = fillter($this->input->post('cf_phone'));
							$hotline    = fillter($this->input->post('cf_hotline'));
							$fanpage    = fillter($this->input->post('cf_fanpage'));
							$map        = $this->input->post('map');	
							$db = array(
								'title'            => $title,
								'address'          => $link,
								'per_page_product' => $num,
								'keyword'          => $seo,
								'description'      => $desciption,
								'email'            => $email,
								'phone'            => $phone,
								'hotline'          => $hotline,
								'fan_page'         => $fanpage,
								'map'              => htmlspecialchars($map),
							);

						$this->config_model->save($id,$db);
						redirect(base_url("admin/config/edit/1"));
					}
				}else{
					if(!empty($id)){
						$param          = array('id','title','keyword','description','per_page_product','phone','address','email','fan_page','hotline','map');
						$data['result'] = $this->config_model->get_info($id,$param);
						$this->load->view('layout',$data);
					}
				}
			}else{
				redirect(base_url("admin/config/edit/1"));
			}
		}

		public function delete_cache(){
			$this->cache->clean();
			redirect(base_url("admin/config/edit/1"));
		}

	}