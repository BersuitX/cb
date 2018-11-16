<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_Cache {

	
	public $Vgw3d0qe3dgd;

	
	public $Vwensv4j4idw;

	

	
	public function __construct(&$Vwensv4j4idw)
	{
		
		$this->CI =& get_instance();
		$this->db =& $Vwensv4j4idw;
		$this->CI->load->helper('file');

		$this->check_path();
	}

	

	
	public function check_path($Vcmaitbcbmmk = '')
	{
		if ($Vcmaitbcbmmk === '')
		{
			if ($this->db->cachedir === '')
			{
				return $this->db->cache_off();
			}

			$Vcmaitbcbmmk = $this->db->cachedir;
		}

		
		$Vcmaitbcbmmk = realpath($Vcmaitbcbmmk)
			? rtrim(realpath($Vcmaitbcbmmk), DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR
			: rtrim($Vcmaitbcbmmk, '/').'/';

		if ( ! is_dir($Vcmaitbcbmmk))
		{
			log_message('debug', 'DB cache path error: '.$Vcmaitbcbmmk);

			
			return $this->db->cache_off();
		}

		if ( ! is_really_writable($Vcmaitbcbmmk))
		{
			log_message('debug', 'DB cache dir not writable: '.$Vcmaitbcbmmk);

			
			return $this->db->cache_off();
		}

		$this->db->cachedir = $Vcmaitbcbmmk;
		return TRUE;
	}

	

	
	public function read($Vcusg10hsxxg)
	{
		$Vit55keurckf = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);
		$Vx2lmbkdlusv = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);
		$Vohaqukrowkd = $this->db->cachedir.$Vit55keurckf.'+'.$Vx2lmbkdlusv.'/'.md5($Vcusg10hsxxg);

		if (FALSE === ($Vgxh44dtboaz = @file_get_contents($Vohaqukrowkd)))
		{
			return FALSE;
		}

		return unserialize($Vgxh44dtboaz);
	}

	

	
	public function write($Vcusg10hsxxg, $V1v3xsp031u0)
	{
		$Vit55keurckf = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);
		$Vx2lmbkdlusv = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);
		$Vtllkl4ae1ck = $this->db->cachedir.$Vit55keurckf.'+'.$Vx2lmbkdlusv.'/';
		$Vb13cwxhoi04 = md5($Vcusg10hsxxg);

		if ( ! is_dir($Vtllkl4ae1ck) && ! @mkdir($Vtllkl4ae1ck, 0750))
		{
			return FALSE;
		}

		if (write_file($Vtllkl4ae1ck.$Vb13cwxhoi04, serialize($V1v3xsp031u0)) === FALSE)
		{
			return FALSE;
		}

		chmod($Vtllkl4ae1ck.$Vb13cwxhoi04, 0640);
		return TRUE;
	}

	

	
	public function delete($Vit55keurckf = '', $Vx2lmbkdlusv = '')
	{
		if ($Vit55keurckf === '')
		{
			$Vit55keurckf  = ($this->CI->uri->segment(1) == FALSE) ? 'default' : $this->CI->uri->segment(1);
		}

		if ($Vx2lmbkdlusv === '')
		{
			$Vx2lmbkdlusv = ($this->CI->uri->segment(2) == FALSE) ? 'index' : $this->CI->uri->segment(2);
		}

		$Vtllkl4ae1ck = $this->db->cachedir.$Vit55keurckf.'+'.$Vx2lmbkdlusv.'/';
		delete_files($Vtllkl4ae1ck, TRUE);
	}

	

	
	public function delete_all()
	{
		delete_files($this->db->cachedir, TRUE, TRUE);
	}

}
