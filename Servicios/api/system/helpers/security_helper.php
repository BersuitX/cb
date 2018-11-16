<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('xss_clean'))
{
	
	function xss_clean($Vssdjb5oqaky, $Vffcvptc3gee = FALSE)
	{
		return get_instance()->security->xss_clean($Vssdjb5oqaky, $Vffcvptc3gee);
	}
}



if ( ! function_exists('sanitize_filename'))
{
	
	function sanitize_filename($Vb13cwxhoi04)
	{
		return get_instance()->security->sanitize_filename($Vb13cwxhoi04);
	}
}



if ( ! function_exists('do_hash'))
{
	
	function do_hash($Vssdjb5oqaky, $V4wtbblc1wn4 = 'sha1')
	{
		if ( ! in_array(strtolower($V4wtbblc1wn4), hash_algos()))
		{
			$V4wtbblc1wn4 = 'md5';
		}

		return hash($V4wtbblc1wn4, $Vssdjb5oqaky);
	}
}



if ( ! function_exists('strip_image_tags'))
{
	
	function strip_image_tags($Vssdjb5oqaky)
	{
		return get_instance()->security->strip_image_tags($Vssdjb5oqaky);
	}
}



if ( ! function_exists('encode_php_tags'))
{
	
	function encode_php_tags($Vssdjb5oqaky)
	{
		return str_replace(array('<?', '?>'), array('&lt;?', '?&gt;'), $Vssdjb5oqaky);
	}
}
