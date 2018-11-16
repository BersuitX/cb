<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('nl2br_except_pre'))
{
	
	function nl2br_except_pre($Vssdjb5oqaky)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->load->library('typography');
		return $Vgw3d0qe3dgd->typography->nl2br_except_pre($Vssdjb5oqaky);
	}
}



if ( ! function_exists('auto_typography'))
{
	
	function auto_typography($Vssdjb5oqaky, $Ve0qofhccrk2 = FALSE)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->load->library('typography');
		return $Vgw3d0qe3dgd->typography->auto_typography($Vssdjb5oqaky, $Ve0qofhccrk2);
	}
}



if ( ! function_exists('entity_decode'))
{
	
	function entity_decode($Vssdjb5oqaky, $Vwxuqfbo3r2c = NULL)
	{
		return get_instance()->security->entity_decode($Vssdjb5oqaky, $Vwxuqfbo3r2c);
	}
}
