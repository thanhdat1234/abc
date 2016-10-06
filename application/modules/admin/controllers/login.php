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

class Login extends MY_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->model('muser');
		$this->load->library('session');
	}

	public function index(){

		if($this->input->post()){
			$user  = fillter($this->input->post('user_name'));
			$pass  = fillter($this->input->post('user_pass'));
			$arr = array();
			if(file_exists("admin_xs123/user.txt")){
				$ar = file_get_contents("admin_xs123/user.txt");
				$arr = json_decode($ar,true);
			}else{
				return false;
			}
			if(!is_array($arr) || $arr == NULL){
				return false;
			}else {
				$key['user'] = $user;
				$key['pass'] = $pass;
				$check = $this->find_array($key, $arr);
				if ($check == FALSE) {
					echo 'false';
				} elseif ($check === 'notactive') {
					echo 'notactive';
				} elseif ($check === 'notlogin') {
					echo 'notlogin';
				} else {
					echo 'true';
					$session = array(
						'session_user' => $check['user_name'],
						'session_user_id' => $check['user_id'],
					'session_level'     => $check['user_level'],
					'session_fullname'  => $check['user_fullname'],
					'session_logintime' => time(),
					);
					$login_file = "admin_xs123/login.txt";
					$login_file_content = "";
					if(file_exists($login_file)){
						$dbaz =file_get_contents($login_file);
						$data_test = json_decode($dbaz,true);
						array_push($data_test,$session);
						$login_file_content = json_encode($data_test);
						$fp = fopen($login_file,"wb");
						fwrite($fp,$login_file_content);
						fclose($fp);
					}else{
						$data_user = array(0=>$session);
						$login_file_content = json_encode($data_user);
						mkdir("admin_xs123");
						$fp = fopen($login_file,"wb");
						fwrite($fp,$login_file_content);
						fclose($fp);
					}
					$this->session->set_userdata($session);
//				redirect(echo base_url("admin/home"));
					header("location:" . base_url("admin/home"));
				}
			}
		}else{
			$data['error'] = '';
			$this->load->view('login',$data);
		}
	}

	public function logout(){
		$data = array('session_user'=>'','session_user_id' =>'','session_level'=>'','session_fullname'=>'','session_avarta'=>'');
		$id = $this->session->userdata('session_user_id');
		$this->session->unset_userdata($data);
		redirect(base_url().'admin/login');
	}
}
