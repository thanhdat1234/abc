<?php
	define('SITE_URL',base_url()); // define SITE URL
	define('UPLOAD_DIR','upload');
	function is_login(){
		$CI =& get_instance();
		$CI->load->library('session');
		if(!empty($CI->session->userdata('session_user_id'))){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function is_admin(){
		$CI =& get_instance();
		$CI->load->library('session');
		if(!empty($CI->session->userdata('session_user_id')) && $CI->session->userdata('session_user_id') == 1){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function is_uploader(){
		$CI =& get_instance();
		$CI->load->library('session');
		if(!empty($CI->session->userdata('session_user_id')) && $CI->session->userdata('session_user_id') == 2){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function is_member(){
		$CI =& get_instance();
		$CI->load->library('session');
		if(!empty($CI->session->userdata('session_user_id')) && $CI->session->userdata('session_user_id') == 3){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	function BEGIN_CACHE($file,$expire = '') {
		//$expire 			= 	CACHE_TIME;
		if($expire) {
			if (file_exists($file) && filemtime($file) > (time() - $expire)) {
				$html = file_get_contents($file);
				return $html;
			} else return false;
		}else {
			if (file_exists($file)) {
				$html = file_get_contents($file);
				return $html;
			} else return false;
		}
	}

	function END_CACHE($html,$file) {
		$html = SanitizeOutput($html);
		$fp = fopen($file,"w");
		$test = fputs($fp, $html);
		fclose($fp);
	}

	function SanitizeOutput($buffer) {
		$search = array(
			'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
			'/[^\S ]+\</s',  // strip whitespaces before tags, except space
			'/(\s)+/s'       // shorten multiple whitespace sequences
		);
		$replace = array(
			'>',
			'<',
			'\\1'
		);
		$buffer = preg_replace($search, $replace, $buffer);
		return $buffer;
	}

	if(!function_exists("front_lang"))
	{	
		function front_lang($line){
			$CI =& get_instance();
			$text =  $CI->lang->line($line);			
			echo $text;
		}
	}

	if(!function_exists("pagination")){
		function pagination($url = '',$per_page = NULL,$total = NULL,$uri_segment = NULL){
			$config                    = array();
			$config['base_url']        = $url;
			$config['total_rows']      = $total;
			$config['per_page']        = $per_page;
			$config['uri_segment']     = $uri_segment;
			$config['first_link']      = '<<';
			$config['last_link']       = '>>';
			$config['first_tag_open']  = '<li class="click">';
			$config['first_tag_close'] = '</li>';
			$config['last_tag_open']   = '<li class="click">';
			$config['last_tag_close']  = '</li>';
			$config['prev_tag_open']   = '<li class="click">';
			$config['prev_tag_close']  = '</li>';
			$config['next_tag_open']   = '<li class="click">';
			$config['next_tag_close']  = '</li>';
			$config['num_tag_open']    = '<li class="click">';
			$config['num_tag_close']   = '</li>';
			$config['next_link']       = 'Next';
			$config['prev_link']       = 'Prev';
			$config['cur_tag_open']    = '<li class="active"><a>';
			$config['cur_tag_close']   = '</a></li>';
			return $config;
		}
	}

	if(!function_exists("paging")){
		function paging($url = '',$per_page = NULL,$total = NULL,$uri_segment = 2){
			$config                     = array();
			$config['base_url']         = $url;
			$config['total_rows']       = $total;
			$config['per_page']         = $per_page;
			$config['uri_segment']      = 2;
			$config['use_page_numbers'] = TRUE;
			$config['first_link']       = '<<';
			$config['last_link']        = '>>';
			$config['first_tag_open']   = '<li >';
			$config['first_tag_close']  = '</li>';
			$config['last_tag_open']    = '<li >';
			$config['last_tag_close']   = '</li>';
			$config['prev_tag_open']    = '<li >';
			$config['prev_tag_close']   = '</li>';
			$config['next_tag_open']    = '<li >';
			$config['next_tag_close']   = '</li>';
			$config['num_tag_open']     = '<li>';
			$config['num_tag_close']    = '</li>';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['cur_tag_open']     = '<li class="active"><a>';
			$config['cur_tag_close']    = '</a></li>';
			return $config;
		}
	}


