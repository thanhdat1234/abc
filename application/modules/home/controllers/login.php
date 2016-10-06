<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *
 * @package		Adminpro
 * @author		Tran Hoang Thien (thienhb12@gmail.com)
 * @copyright   PHP TEAM
 * @link		http://phpandmysql.net
 * @since		Version 1.0
 * @phone       0944418192
 *
 */
class Login extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->lang->load('frontend','vietnamese');
		$this->load->model('muser');
		$this->load->library('form_validation');
		$this->load->helper('url');
	}

	public function index(){
		$requets  = $this->input->post('login');
		$var      = array();
		$template = 'login/login';
		$data     = array();
		if(isset($requets)){
			$user     = fillter($this->input->post('users'));
			$password = fillter($this->input->post('password'));
			$this->form_validation->set_rules('users','Users name', 'required|trim|min_length[5]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('password', 'Password','required|trim|xss_clean|min_length[5]');
			$check    = $this->muser->check_login($user ,$password);
			if($this->form_validation->run() == FALSE){
				$data['error'] = '<p class="help-block rubberBand animated">Please Enter User and Password!</p>';
				$var['error']  = 1;
			}else if($check == false){
				$data['error'] = '<p class="help-block rubberBand animated">Account or password is incorrect!</p>';
				$var['error']  = 1;
			}else if($check == 'notactive'){
				$data['error'] = '<p class="help-block rubberBand animated">User not activated !</p>';
				$var['error']  = 1;
			}else if($check == 'notlogin'){
				$data['error'] = '<p class="help-block rubberBand animated">Account is logged!</p>';
				$var['error']  = 1;
			}else{
				$data['error'] = '';
				$var['error']  = 0;
				$session = array(
					'session_user'      => $check['username'],
					'session_user_id'   => $check['iduser'],
					'session_level'     => $check['usergroup'],
					'session_fullname'  => $check['user_fullname'],
					'session_avarta'    => $check['avatar'],
					'session_email'     => $check['user_email'],
					'session_logintime' => time(),
				);
				$this->muser->save($check['iduser'],array('status_login' => 1));
				$this->session->set_userdata($session);
			}
			$var['content'] = $this->load->view($template,$data,true);
			exit(json_encode($var));
		}else{
			$this->load->view($template,$data);
		}
	}

	public function logout(){
		$data = array('session_user'=>'','session_user_id' =>'','session_level'=>'','session_fullname'=>'','session_avarta'=>'');
		$id = $this->session->userdata('session_user_id');
		$this->muser->save($id,array('status_login' => 0));
		$this->session->unset_userdata($data);
		redirect(base_url());
	}

	
}

/* End of file index.php */
/* Location: ./application/modules/home/controllers/index.php */