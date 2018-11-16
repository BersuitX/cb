<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('set_realpath'))
{
	
	function set_realpath($Vcmaitbcbmmk, $Vz5yjxhlgvb4 = FALSE)
	{
		
		if (preg_match('#^(http:\/\/|https:\/\/|www\.|ftp)#i', $Vcmaitbcbmmk) OR filter_var($Vcmaitbcbmmk, FILTER_VALIDATE_IP) === $Vcmaitbcbmmk )
		{
			show_error('The path you submitted must be a local server path, not a URL');
		}

		
		if (realpath($Vcmaitbcbmmk) !== FALSE)
		{
			$Vcmaitbcbmmk = realpath($Vcmaitbcbmmk);
		}
		elseif ($Vz5yjxhlgvb4 && ! is_dir($Vcmaitbcbmmk) && ! is_file($Vcmaitbcbmmk))
		{
			show_error('Not a valid path: '.$Vcmaitbcbmmk);
		}

		
		return is_dir($Vcmaitbcbmmk) ? rtrim($Vcmaitbcbmmk, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR : $Vcmaitbcbmmk;
	}
}
