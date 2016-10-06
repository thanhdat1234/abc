<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cache_site { 
    
    private $CI;
	
	public function __construct(){
		$this->CI =& get_instance();
		$this->CI->load->driver('cache', array('adapter' => 'file'));		
	}
	
	/* $key nanme cache
	   $variable cache
	*/
	public function get_info_cache($key = '',$time='',$data ='')
	{		
		if(!$this->CI->cache->get($key)){
			$variable = $data;
			$this->CI->cache->save($key,$variable,$time);
			return $this->CI->cache->get($key);
		}else{
			return $this->CI->cache->get($key);
		}
		
	}

}

/* End of file cache_site.php */
/* Location: ./application/libraries/cache_site.php */