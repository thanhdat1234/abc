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
class Search extends MY_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('film_model');
		$this->load->model('category_model');
		$this->load->model('page_model');
		$this->load->model('config_model');
	}

	public function index(){
		
	}

}

/* End of file index.php */
/* Location: ./application/modules/home/controllers/index.php */