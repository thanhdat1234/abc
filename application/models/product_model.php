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
class Product_model extends MY_Model {
	public $table = 'products';
	public $key   = 'pro_id';
	public function __construct(){
		parent:: __construct();
		
	}

	public function check_product($product_name,$id = ''){
		if($id != ''){			
			$this->db->where('id !=',$id);
		}
		$this->db->where('product_name',$product_name);
		$result = $this->db->get($this->table);
		return($result->num_rows() == 0) ? true : false;
	}

	public function get_product($where = NULL,$limit = NULL,$offset= NULL,$order = NULL,$odder_by = NULL,$total = NULL){
		$param           = array();
		$param['select'] = array('*');
		$param['where']  = $where;
		$param['order']  = array($order,$odder_by);
		if($limit){
			if($offset){
				$param['limit']  = array($limit,$offset);
			}else{
				$param['limit']  = array($limit);
			}
		}
		if($total == TRUE){
			return $this->get_total($param);
		}
		return $this->get_list($param);
	}

}

/* End of file role_model.php */
/* Location: ./application/modules/admin/models/role_model.php */