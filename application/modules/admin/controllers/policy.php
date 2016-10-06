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
	class Policy extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->load->model('policy_model');
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->lang->load('admin','vietnamese');
			$this->lang->load('frontend','vietnamese');
			if(!$this->session->userdata("session_user") || $this->session->userdata("session_level") != 1){
				redirect(base_url()."admin/login");
			}
		}

		public function edit(){
			$data['title']    = "Policy management";
			$data['color']    = "#33925c";
			$data['template'] = 'policy/edit_policy';
			$var              = array();
			$id               = $this->uri->segment(4);
			$request          = $this->input->post();
			if(isset($id)){
				if(!empty($request)){
					$id = $this->uri->segment(4);
					$this->form_validation->set_rules('sales_policy','Sales policy', 'required');
					$this->form_validation->set_rules('warranty_policy','Warranty_policy', 'required');
					$this->form_validation->set_rules('freeship','freeship','required');
					$this->form_validation->set_rules('secure_transactions', 'secure transactions','required');
					if($this->form_validation->run() == FALSE){	
						$data['title']    = "Sửa thông tin cấu hình trang";
						$data['color']    = "#33925c";
						$data['template'] = 'policy/edit_policy';
						$param            = array('id','sales_policy','warranty_policy','freeship','secure_transactions');
						$data['result']   = $this->policy_model ->get_info($id,$param);
						$this->load->view('layout',$data);
					}else{
						$sales_policy        = $this->input->post('sales_policy');
						$warranty_policy     = $this->input->post('warranty_policy');
						$freeship            = $this->input->post('freeship');
						$secure_transactions = $this->input->post('secure_transactions');
						$purchase            = $this->input->post('purchase');
						$db = array(
							'sales_policy'        => $sales_policy,
							'warranty_policy'     => $warranty_policy,
							'freeship'            => $freeship,
							'secure_transactions' => $secure_transactions,
							'purchase' 			  => $purchase
						);
						$this->policy_model ->save($id,$db);
						redirect(base_url("admin/policy/edit/1"));
					}
				}else{
					if(!empty($id)){
						$param          = array('id','sales_policy','warranty_policy','freeship','secure_transactions','purchase');
						$data['result'] = $this->policy_model ->get_info($id,$param);
						$this->load->view('layout',$data);
					}
				}
			}else{
				redirect(base_url("admin/policy/edit/1"));
			}
		}
	}