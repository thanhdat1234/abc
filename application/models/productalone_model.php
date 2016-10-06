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
class Productalone_model extends MY_Model {
	public $table = 'product_item';
        public $intro = 'product_intro';
        public $category = 'product_category';
	public $key   = 'id';
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
		$param['select'] = array('id','name','images');
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
		return $this->get_list_select_table_id($param,$this->table);
	}
		//get category product
	public function get_category($where = NULL,$limit = NULL,$offset= NULL,$order = NULL,$odder_by = NULL,$total = NULL){
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
		return $this->get_list_select_table($param,$this->category);
	}
        //get intro product
	public function get_intro($where = NULL,$listarr= 1 ,$limit = NULL,$offset= NULL,$order = NULL,$odder_by = NULL,$total = NULL){
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
		return $this->get_list_select_table($param,$this->intro,$listarr);
	}
//        public update(){
//            $this->update_rule_table($table,$where);
//        }

}

/* End of file role_model.php */
/* Location: ./application/modules/admin/models/role_model.php */