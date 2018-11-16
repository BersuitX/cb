<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cache_wincache extends CI_Driver {

	
	public function __construct()
	{
		if ( ! $this->is_supported())
		{
			log_message('error', 'Cache: Failed to initialize Wincache; extension not loaded/enabled?');
		}
	}

	

	
	public function get($Vdrzyozqxvbr)
	{
		$Vkix4taqxijy = FALSE;
		$Vfeinw1hsfej = wincache_ucache_get($Vdrzyozqxvbr, $Vkix4taqxijy);

		
		return ($Vkix4taqxijy) ? $Vfeinw1hsfej : FALSE;
	}

	

	
	public function save($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob = 60, $Vokmm2ln0ovw = FALSE)
	{
		return wincache_ucache_set($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob);
	}

	

	
	public function delete($Vdrzyozqxvbr)
	{
		return wincache_ucache_delete($Vdrzyozqxvbr);
	}

	

	
	public function increment($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		$Vkix4taqxijy = FALSE;
		$Vcnwqsowvhom = wincache_ucache_inc($Vdrzyozqxvbr, $Vzawlyjaf5xg, $Vkix4taqxijy);

		return ($Vkix4taqxijy === TRUE) ? $Vcnwqsowvhom : FALSE;
	}

	

	
	public function decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		$Vkix4taqxijy = FALSE;
		$Vcnwqsowvhom = wincache_ucache_dec($Vdrzyozqxvbr, $Vzawlyjaf5xg, $Vkix4taqxijy);

		return ($Vkix4taqxijy === TRUE) ? $Vcnwqsowvhom : FALSE;
	}

	

	
	public function clean()
	{
		return wincache_ucache_clear();
	}

	

	
	 public function cache_info()
	 {
		 return wincache_ucache_info(TRUE);
	 }

	

	
	public function get_metadata($Vdrzyozqxvbr)
	{
		if ($Vd0ztm0e4gk5 = wincache_ucache_info(FALSE, $Vdrzyozqxvbr))
		{
			$V51mkyiatueq = $Vd0ztm0e4gk5['ucache_entries'][1]['age_seconds'];
			$V1nvdczefjob = $Vd0ztm0e4gk5['ucache_entries'][1]['ttl_seconds'];
			$Vxusi01uthyn = $Vd0ztm0e4gk5['ucache_entries'][1]['hitcount'];

			return array(
				'expire'	=> $V1nvdczefjob - $V51mkyiatueq,
				'hitcount'	=> $Vxusi01uthyn,
				'age'		=> $V51mkyiatueq,
				'ttl'		=> $V1nvdczefjob
			);
		}

		return FALSE;
	}

	

	
	public function is_supported()
	{
		return (extension_loaded('wincache') && ini_get('wincache.ucenabled'));
	}
}
