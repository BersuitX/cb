<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cache_apc extends CI_Driver {

	
	public function __construct()
	{
		if ( ! $this->is_supported())
		{
			log_message('error', 'Cache: Failed to initialize APC; extension not loaded/enabled?');
		}
	}

	

	
	public function get($Vdrzyozqxvbr)
	{
		$Vkix4taqxijy = FALSE;
		$Vfeinw1hsfej = apc_fetch($Vdrzyozqxvbr, $Vkix4taqxijy);

		if ($Vkix4taqxijy === TRUE)
		{
			return is_array($Vfeinw1hsfej)
				? unserialize($Vfeinw1hsfej[0])
				: $Vfeinw1hsfej;
		}

		return FALSE;
	}

	

	
	public function save($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob = 60, $Vokmm2ln0ovw = FALSE)
	{
		$V1nvdczefjob = (int) $V1nvdczefjob;

		return apc_store(
			$Vdrzyozqxvbr,
			($Vokmm2ln0ovw === TRUE ? $Vfeinw1hsfej : array(serialize($Vfeinw1hsfej), time(), $V1nvdczefjob)),
			$V1nvdczefjob
		);
	}

	

	
	public function delete($Vdrzyozqxvbr)
	{
		return apc_delete($Vdrzyozqxvbr);
	}

	

	
	public function increment($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return apc_inc($Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return apc_dec($Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function clean()
	{
		return apc_clear_cache('user');
	}

	

	
	 public function cache_info($V4wtbblc1wn4 = NULL)
	 {
		 return apc_cache_info($V4wtbblc1wn4);
	 }

	

	
	public function get_metadata($Vdrzyozqxvbr)
	{
		$Vkix4taqxijy = FALSE;
		$Vd0ztm0e4gk5 = apc_fetch($Vdrzyozqxvbr, $Vkix4taqxijy);

		if ($Vkix4taqxijy === FALSE OR count($Vd0ztm0e4gk5) !== 3)
		{
			return FALSE;
		}

		list($Vfeinw1hsfej, $Vzfk1zisr4jl, $V1nvdczefjob) = $Vd0ztm0e4gk5;

		return array(
			'expire'	=> $Vzfk1zisr4jl + $V1nvdczefjob,
			'mtime'		=> $Vzfk1zisr4jl,
			'data'		=> unserialize($Vfeinw1hsfej)
		);
	}

	

	
	public function is_supported()
	{
		return (extension_loaded('apc') && ini_get('apc.enabled'));
	}
}
