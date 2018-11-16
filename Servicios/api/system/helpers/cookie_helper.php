<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('set_cookie'))
{
	
	function set_cookie($Vaclaigdbtoo, $Vcnwqsowvhom = '', $Vgoa5d5z2ckk = '', $Vlzscfbh40lv = '', $Vcmaitbcbmmk = '/', $Vapdd0fqkaxu = '', $Vminjnrogeju = FALSE, $Vfgixglqo00l = FALSE)
	{
		
		get_instance()->input->set_cookie($Vaclaigdbtoo, $Vcnwqsowvhom, $Vgoa5d5z2ckk, $Vlzscfbh40lv, $Vcmaitbcbmmk, $Vapdd0fqkaxu, $Vminjnrogeju, $Vfgixglqo00l);
	}
}



if ( ! function_exists('get_cookie'))
{
	
	function get_cookie($Vuglyh4gwddb, $Vgzlesc0sebt = NULL)
	{
		is_bool($Vgzlesc0sebt) OR $Vgzlesc0sebt = (config_item('global_xss_filtering') === TRUE);
		$Vapdd0fqkaxu = isset($_COOKIE[$Vuglyh4gwddb]) ? '' : config_item('cookie_prefix');
		return get_instance()->input->cookie($Vapdd0fqkaxu.$Vuglyh4gwddb, $Vgzlesc0sebt);
	}
}



if ( ! function_exists('delete_cookie'))
{
	
	function delete_cookie($Vaclaigdbtoo, $Vlzscfbh40lv = '', $Vcmaitbcbmmk = '/', $Vapdd0fqkaxu = '')
	{
		set_cookie($Vaclaigdbtoo, '', '', $Vlzscfbh40lv, $Vcmaitbcbmmk, $Vapdd0fqkaxu);
	}
}
