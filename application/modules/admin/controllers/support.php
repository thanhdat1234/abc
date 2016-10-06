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
	class Support extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->load->model('support_model');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->lang->load('admin','vietnamese');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function edit(){
			$data['title']    = "support management";
			$data['color']    = "#33925c";
			$data['template'] = 'support/edit_support';
			$var              = array();
			$id               = $this->uri->segment(4);
			$request          = $this->input->post();
			if(isset($id)){
				if(!empty($request)){

					$id = $this->uri->segment(4);
					$this->form_validation->set_rules('zalo','zalo support', 'required|trim|xss_clean');
					$this->form_validation->set_rules('yahoo','yahoo support', 'required|trim|xss_clean');
					$this->form_validation->set_rules('viber','viber online','required');
					$this->form_validation->set_rules('facebook','facebook','required|trim|xss_clean');
					$this->form_validation->set_rules('skyper', 'skyper','required|trim|xss_clean');
					if($this->form_validation->run() == FALSE){
						pre("ok");
						$data['title']    = "Hỗ trợ";
						$data['color']    = "#33925c";
						$data['template'] = 'support/edit_support';
						$param            = array('id','zalo','yahoo','viber','facebook','skyper');
						$data['result']   = $this->support_model ->get_info($id,$param);
						$this->load->view('layout',$data);
					}else{

						$zalo     = $this->input->post('zalo');
						$yahoo    = $this->input->post('yahoo');
						$viber    = $this->input->post('viber');
						$facebook = $this->input->post('facebook');
						$skyper   = $this->input->post('skyper');
						$db = array(
							'zalo'     => $zalo,
							'yahoo'    => $yahoo,
							'viber'    => $viber,
							'facebook' => $facebook,
							'skyper'   => $skyper
						);

						$this->support_model->save($id,$db);
						redirect(base_url("admin/support/edit/1"));
					}
				}else{
					if(!empty($id)){
						$param          = array('id','zalo','yahoo','viber','facebook','skyper');
						$data['result'] = $this->support_model ->get_info($id,$param);
						$this->load->view('layout',$data);
					}
				}
			}else{
				redirect(base_url("admin/support/edit/1"));
			}
		}
	}