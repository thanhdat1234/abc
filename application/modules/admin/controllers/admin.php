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
	class Admin extends My_Controller{
		
		public function __construct(){
			parent:: __construct();
			$this->lang->load('admin','vietnamese');
			$this->load->model('madmin');
			$this->load->model('role_model');
			if(!$this->session->userdata("session_user") /*|| $this->session->userdata("session_level") != 1*/){
				redirect(base_url()."admin/login");
			}
		}

		public function index(){
			$data['title']             = 'Danh sách tài khoản';
			$param                     = array();
			$param['select']           = array('*');
			$list_admin = $this->madmin->get_list($param);
			$json_admin = json_encode($list_admin);
			$dir = 'admin_xs123';
			if (!is_dir($dir)) {
				mkdir($dir);
				$fp = fopen("admin_xs123/user.txt","wb");
				fwrite($fp,$json_admin);
				fclose($fp);
			}else{
				$fp = fopen("admin_xs123/user.txt","wb");
				fwrite($fp,$json_admin);
				fclose($fp);
			}
			if(file_exists("admin_xs123/user.txt")){
				$dbaz =file_get_contents("admin_xs123/user.txt");
				$daz = json_decode($dbaz,true);
				foreach($daz as $item){
					echo $item['user_id']."<br>";
				}

			}
			$data['content']          = 'ad/list';
			$this->load->view("layout",$data);
		}

		public function add(){
			$data['title'] = 'Thêm tài khoản';
			$data['color'] = '#e07901';
			$template      = 'user/add_user';
			$var           = array();
			$data['role']  = $this->role_model->get_role();
			$request       = $this->input->post(); 
			if(!empty($request)){
				$this->form_validation->set_rules('user_name','Users name', 'required|trim|min_length[5]|max_length[12]|xss_clean');
				$this->form_validation->set_rules('user_fullname','Fullname', 'trim|xss_clean');
				$this->form_validation->set_rules('user_password', 'Password','required|trim|xss_clean|min_length[5]');
				$this->form_validation->set_rules('user_repass', 'Re-enter password','required|trim|xss_clean|min_length[5]');
				$this->form_validation->set_rules('user_email','Email' ,'required|trim|valid_email|xss_clean');
				if($this->form_validation->run() == FALSE){
					$var['error']       = 1;
				}else if($this->muser->check_user($this->input->post('user_name')) == FALSE){
					$data['error_user'] = '<p class="help-block">This user areaded exit!</p>';
					$var['error']       = 1;
				}
				else if($this->muser->check_email($this->input->post('user_email')) == FALSE){
					$data['error_mail'] = '<p class="help-block">This email areaded exit!</p>';
					$var['error']       = 1;
				}else if($this->input->post('user_password') != $this->input->post('user_repass')){
					$var['error']       = 1;
					$data['error_re']   = '<p class="help-block">Confirm the password wrong !</p>';
				}
				else{
					$db = array(
						'username'        => fillter($this->input->post('user_name')),
						'user_fullname'   => fillter($this->input->post('user_fullname')),
						'password'        => md5(fillter($this->input->post('user_password'))),
						'user_email'      => fillter($this->input->post('user_email')),
						'user_activation' => $this->input->post('active'),
						'usergroup'       => $this->input->post('role'),
						'regdate'         => date("Y-m-d H:i:s", time()),
					);
					$this->muser->save($id = false,$db);
					$var['url']            = base_url('admin/users/list_all');
					$var['error']          = 0;
				}
				$var['content'] = $this->load->view($template,$data,true);
				exit(json_encode($var));
			}else{
				$this->load->view($template,$data);
			}
		}

		public function edit(){
			$data['title'] = "Sửa tài khoản";
			$data['color'] = "#e07901";
			$data['role']  = $this->role_model->get_role();
			$template      = 'user/edit_user';
			$var           = array();
			$get_request   = $this->input->get();
			$id            = $this->uri->segment(4);
			$request       = $this->input->post();
			$page          = $this->uri->segment(5);
			if(isset($get_request)){
				if(!empty($request)){
					$id                                = $this->uri->segment(4);
					$page                              = $this->uri->segment(5);
					$data['result']['iduser']          = $id;
					$data['result']['username']        = $this->input->post('user_name');
					$data['result']['user_fullname']   = $this->input->post('user_fullname');
					$data['result']['user_email']      = $this->input->post('user_email');
					$data['result']['usergroup']       = $this->input->post('role');
					$data['result']['user_activation'] = $this->input->post('active');
					$data['page']                      = $page; 
					$this->form_validation->set_rules('user_name','Users name', 'required|trim|min_length[5]|max_length[12]|xss_clean');
					$this->form_validation->set_rules('user_fullname','Fullname', 'trim|xss_clean');
					$this->form_validation->set_rules('user_email','Email' ,'required|trim|valid_email|xss_clean');
					if(!empty($this->input->post('user_password'))){
						$this->form_validation->set_rules('user_password', 'Password','required|trim|xss_clean|min_length[5]');
						$this->form_validation->set_rules('user_repass', 'Re-enter password','required|trim|xss_clean|min_length[5]');
					}
					if($this->form_validation->run() == FALSE){
						$var['error']       = 1;
					}else if($this->muser->check_email($this->input->post('user_email'),$id) == FALSE){
						$var['error']       = 1;
						$data['error_mail'] = '<p class="help-block">This email areaded exit!</p>';
					}else if($this->muser->check_user($this->input->post('user_name'),$id) == FALSE){
						$var['error']       = 1;
						$data['error_user'] = '<p class="help-block">This user areaded exit!</p>';
					}else{
						$user_name     = fillter($this->input->post('user_name'));
						$user_fullname = fillter($this->input->post('user_fullname'));
						$user_email    = fillter($this->input->post('user_email'));
						$active        = fillter($this->input->post('active'));
						$role          = fillter($this->input->post('role'));
						
						$db = array(
							'username'        => $user_name,
							'user_fullname'   => $user_fullname,
							'user_email'      => $user_email,
							'user_activation' => $active,
							'usergroup'       => $role,
							'regdate'         => date("Y-m-d H:i:s", time()),
						);
						if(!empty($this->input->post('user_password'))){
							if($this->input->post('user_password') != $this->input->post('user_password')){
								$var['error']         = 1;
								$data['error_re']     = '<p class="help-block">Confirm the password wrong !</p>';
							}else{
								$user_password        = md5(fillter($this->input->post('user_password')));
								$db['user_password' ] = $user_password;
							}	
						}
						$this->muser->save($id,$db);
						$var['url']   = base_url('admin/users/list_all').'/'.$page;
						$var['content'] = $this->load->view($template,$data,true);
					}
					$var['content'] = $this->load->view($template,$data,true);
				}else{
					if(!empty($id)){
						$param          = array('username','user_fullname','user_email','usergroup','user_activation','iduser');
						$data['result'] = $this->muser->get_info($id,$param);
						$data['page']   = $page; 
						$var['content'] = $this->load->view($template,$data,true);
						$var['error']   = 0;
					}else{
						$var['error']   = 1;
						$var['url']   = base_url('admin/users/list_all').'/'.$page;
					}
				}
			}else{
				$var['error'] = 1;
				$var['url']   = base_url('admin/users/list_all').'/'.$page;
			}
			pre($var);
			exit(json_encode($var));
		}

		function delete(){
			$var = array();
			$id = $this->uri->segment(4);
			if(isset($id)){
				if($this->muser->delete($id)){
					$var['error'] = 0;
				}else{
					$var['error'] = 1;
				}
			}
			$var['url'] = base_url('admin/users/list_all');
			exit(json_encode($var));
		}

		public function change_status(){
			if(!empty($this->input->post('action'))){
				$data = array();
				$id   = (int)$this->input->post('id');
				if($this->input->post('status') == 'publish'){
					$data['user_activation'] = 1;
					$this->muser->save($id,$data);
				}elseif($this->input->post('status') == 'unpublish'){
					$data['user_activation'] = 2;
					$this->muser->save($id,$data);
				}
			}
		}

		public function bulk_action(){
			$var      = array();
			$request  = $this->input->post();
			if(!empty($request)){
				$type = $this->uri->segment(4);
				$uid  = $this->input->post('id');
				$id   = $this->session->userdata('session_user_id'); 
				if($type == 'delete'){
					if(!empty($uid)){
						foreach($uid as $value){
							$param = array('iduser' => $value,'iduser !=' => $id);
							$this->muser->delete_rule($param);
						}
					}
					$var['action'] = 'delete';
				}elseif($type == 'publish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('iduser'=> $value,'iduser !=' => $id);
							$data  = array('user_activation' => 1) ;
							$this->muser->update_rule($where,$data);
						}
					}
					$var['action'] = 'publish';
				}elseif($type == 'unpublish'){
					if(!empty($uid)){
						foreach($uid as $value){
							$where = array('iduser'=> $value,'iduser !=' => $id);
							$data  = array('user_activation' => 2) ;
							$this->muser->update_rule($where,$data);
						}
					}
					$var['action'] = 'unpublish';
				}
				$var['error'] = 0;
			}else{
				$var['error'] = 1;
			}
			$var['url'] = base_url('admin/users/list_all');
			exit(json_encode($var));
		}
	}