<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cache_file extends CI_Driver {

	
	protected $Vgeafdfwapjf;

	
	public function __construct()
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->load->helper('file');
		$Vcmaitbcbmmk = $Vgw3d0qe3dgd->config->item('cache_path');
		$this->_cache_path = ($Vcmaitbcbmmk === '') ? APPPATH.'cache/' : $Vcmaitbcbmmk;
	}

	

	
	public function get($Vdrzyozqxvbr)
	{
		$Vfeinw1hsfej = $this->_get($Vdrzyozqxvbr);
		return is_array($Vfeinw1hsfej) ? $Vfeinw1hsfej['data'] : FALSE;
	}

	

	
	public function save($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob = 60, $Vokmm2ln0ovw = FALSE)
	{
		$V0ewhpe0jlgc = array(
			'time'		=> time(),
			'ttl'		=> $V1nvdczefjob,
			'data'		=> $Vfeinw1hsfej
		);

		if (write_file($this->_cache_path.$Vdrzyozqxvbr, serialize($V0ewhpe0jlgc)))
		{
			chmod($this->_cache_path.$Vdrzyozqxvbr, 0640);
			return TRUE;
		}

		return FALSE;
	}

	

	
	public function delete($Vdrzyozqxvbr)
	{
		return file_exists($this->_cache_path.$Vdrzyozqxvbr) ? unlink($this->_cache_path.$Vdrzyozqxvbr) : FALSE;
	}

	

	
	public function increment($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		$Vfeinw1hsfej = $this->_get($Vdrzyozqxvbr);

		if ($Vfeinw1hsfej === FALSE)
		{
			$Vfeinw1hsfej = array('data' => 0, 'ttl' => 60);
		}
		elseif ( ! is_int($Vfeinw1hsfej['data']))
		{
			return FALSE;
		}

		$Vc1s1ekq3z2y = $Vfeinw1hsfej['data'] + $Vzawlyjaf5xg;
		return $this->save($Vdrzyozqxvbr, $Vc1s1ekq3z2y, $Vfeinw1hsfej['ttl'])
			? $Vc1s1ekq3z2y
			: FALSE;
	}

	

	
	public function decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		$Vfeinw1hsfej = $this->_get($Vdrzyozqxvbr);

		if ($Vfeinw1hsfej === FALSE)
		{
			$Vfeinw1hsfej = array('data' => 0, 'ttl' => 60);
		}
		elseif ( ! is_int($Vfeinw1hsfej['data']))
		{
			return FALSE;
		}

		$Vc1s1ekq3z2y = $Vfeinw1hsfej['data'] - $Vzawlyjaf5xg;
		return $this->save($Vdrzyozqxvbr, $Vc1s1ekq3z2y, $Vfeinw1hsfej['ttl'])
			? $Vc1s1ekq3z2y
			: FALSE;
	}

	

	
	public function clean()
	{
		return delete_files($this->_cache_path, FALSE, TRUE);
	}

	

	
	public function cache_info($V4wtbblc1wn4 = NULL)
	{
		return get_dir_file_info($this->_cache_path);
	}

	

	
	public function get_metadata($Vdrzyozqxvbr)
	{
		if ( ! file_exists($this->_cache_path.$Vdrzyozqxvbr))
		{
			return FALSE;
		}

		$Vfeinw1hsfej = unserialize(file_get_contents($this->_cache_path.$Vdrzyozqxvbr));

		if (is_array($Vfeinw1hsfej))
		{
			$Vjei4q50xa4c = filemtime($this->_cache_path.$Vdrzyozqxvbr);

			if ( ! isset($Vfeinw1hsfej['ttl']))
			{
				return FALSE;
			}

			return array(
				'expire' => $Vjei4q50xa4c + $Vfeinw1hsfej['ttl'],
				'mtime'	 => $Vjei4q50xa4c
			);
		}

		return FALSE;
	}

	

	
	public function is_supported()
	{
		return is_really_writable($this->_cache_path);
	}

	

	
	protected function _get($Vdrzyozqxvbr)
	{
		if ( ! is_file($this->_cache_path.$Vdrzyozqxvbr))
		{
			return FALSE;
		}

		$Vfeinw1hsfej = unserialize(file_get_contents($this->_cache_path.$Vdrzyozqxvbr));

		if ($Vfeinw1hsfej['ttl'] > 0 && time() > $Vfeinw1hsfej['time'] + $Vfeinw1hsfej['ttl'])
		{
			unlink($this->_cache_path.$Vdrzyozqxvbr);
			return FALSE;
		}

		return $Vfeinw1hsfej;
	}

}
