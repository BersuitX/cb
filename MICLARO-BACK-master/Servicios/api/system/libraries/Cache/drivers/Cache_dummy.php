<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cache_dummy extends CI_Driver {

	
	public function get($Vdrzyozqxvbr)
	{
		return FALSE;
	}

	

	
	public function save($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob = 60, $Vokmm2ln0ovw = FALSE)
	{
		return TRUE;
	}

	

	
	public function delete($Vdrzyozqxvbr)
	{
		return TRUE;
	}

	

	
	public function increment($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return TRUE;
	}

	

	
	public function decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return TRUE;
	}

	

	
	public function clean()
	{
		return TRUE;
	}

	

	
	 public function cache_info($V4wtbblc1wn4 = NULL)
	 {
		 return FALSE;
	 }

	

	
	public function get_metadata($Vdrzyozqxvbr)
	{
		return FALSE;
	}

	

	
	public function is_supported()
	{
		return TRUE;
	}

}
