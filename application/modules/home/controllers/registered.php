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
class Registered extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('muser');
		$this->load->helper('url');
		$this->load->library('form_validation');
	}

	public function index(){
		$request      = $this->input->post('registered');
		$var          = array();
		$data         = array();
		$template	  = 'member/registered';  
		if(isset($request)){
			$this->form_validation->set_rules('user_name','Users name', 'required|trim|min_length[5]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('user_password', 'Password','required|trim|xss_clean|min_length[5]');
			$this->form_validation->set_rules('user_repass', 'Re-enter password','required|trim|xss_clean|min_length[5]');
			$this->form_validation->set_rules('user_email','Email' ,'required|valid_email|xss_clean');
			$email    = fillter($this->input->post('user_email'));
			$password = fillter($this->input->post('user_password'));
			$user     = fillter($this->input->post('user_name'));
			if($this->form_validation->run() == FALSE){
				$var['error']  = 1;
			}else if($this->muser->check_user($user) == FALSE){
				$var['error']  = 1;
				$data['error'] = '<p class="help-block rubberBand animated">This user areaded exit!</p>';
			}
			else if($this->muser->check_email($email) == FALSE){
				$var['error']  = 1;
				$data['error'] = '<p class="help-block rubberBand animated">This email areaded exit!</p>';
			}else if($this->input->post('user_password') != $this->input->post('user_repass')){
				$var['error']  = 1;
				$data['error'] = '<p class="help-block rubberBand animated">Confirm the password wrong !</p>';
			}
			else{
				$var['error'] = 0;
				$db = array(
					'username'   => $user,
					'user_email' => $email,
					'password'   => md5($password)
				);
				$this->muser->save($id = false,$db);
			}
			$var['content'] = $this->load->view($template,$data,true);
			exit(json_encode($var));
		}
	}

}

/* End of file index.php */
/* Location: ./application/modules/home/controllers/index.php */