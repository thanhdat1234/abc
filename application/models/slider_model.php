<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
class Slider_model extends MY_Model {
	public $table = 'banner';
	public $key   = 'id';
	public function __construct(){
		parent:: __construct();
		
	}

	public function get_slider($where = NULL,$limit = NULL,$offset= NULL,$order = NULL,$odder_by = NULL){
		$param           = array();
		$param['select'] = array('slide_title','slide_image','slide_link');
		$param['where']  = $where;
		$param['order']  = array($order,$odder_by);
		if($limit != NULL){
			if($offset){
				$param['limit']  = array($limit,$offset);
			}else{
				$param['limit']  = array($limit);
			}
		}
		
		return $this->get_list($param);
	}

}

/* End of file role_model.php */
/* Location: ./application/modules/admin/models/role_model.php */