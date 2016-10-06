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
class News_model extends MY_Model {
	public $table = 'news';
	public $key   = 'news_id';
	public function __construct(){
		parent:: __construct();
		
	}

	public function check_news($title,$id = ''){
		if($id != ''){			
			$this->db->where('id !=',$id);
		}
		$this->db->where('title',$title);
		$result = $this->db->get($this->table);
		return($result->num_rows() == 0) ? true : false;
	}


	public function get_news($where = NULL,$limit = NULL,$offset= NULL,$order = NULL,$odder_by = NULL){
		$param           = array();
		$param['select'] = array('title','author','id','rewrite_link','description','keyword','images','info','created','lastupdated','category','avarta');
		$param['where']  = $where;
		$param['order']  = array($order,$odder_by);
		if($offset){
			$param['limit']  = array($limit,$offset);
		}else{
			$param['limit']  = array($limit);
		}
		return $this->get_list($param);
	}

}

/* End of file role_model.php */
/* Location: ./application/modules/admin/models/role_model.php */