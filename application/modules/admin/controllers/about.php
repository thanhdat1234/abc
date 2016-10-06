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
	class About extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->load->model('about_model');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->lang->load('admin','vietnamese');
			$this->lang->load('frontend','vietnamese');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function edit(){
			$data['title']    = "about management";
			$data['color']    = "#33925c";
			$data['template'] = 'about/edit_about';
			$var              = array();
			$id               = $this->uri->segment(4);
			$request          = $this->input->post();
			if(isset($id)){
				if(!empty($request)){
					$id = $this->uri->segment(4);
					$this->form_validation->set_rules('about_us',' about', 'required|trim|xss_clean');
					$this->form_validation->set_rules('contact_us',' contact', 'required|trim|xss_clean');
					if($this->form_validation->run() == FALSE){
						$data['title']    = "Sửa thông tin cấu hình trang";
						$data['color']    = "#33925c";
						$data['template'] = 'about/edit_about';
						$param            = array('id','about_us','contact_us');
						$data['result']   = $this->about_model ->get_info($id,$param);
						$this->load->view('layout',$data);
					}else{
						$about   = $this->input->post('about_us');
						$contact = $this->input->post('contact_us');
						$db = array(
							'about_us'   => $about,
							'contact_us' => $contact
						);
						$this->about_model ->save($id,$db);
						redirect(base_url("admin/about/edit/1"));
					}
				}else{
					if(!empty($id)){
						$param          = array('id','about_us','contact_us');
						$data['result'] = $this->about_model ->get_info($id,$param);
						$this->load->view('layout',$data);
					}
				}
			}else{
				redirect(base_url("admin/about/edit/1"));
			}
		}
	}