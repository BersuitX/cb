<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('valid_email'))
{
	
	function valid_email($Vi2s52urac1m)
	{
		return (bool) filter_var($Vi2s52urac1m, FILTER_VALIDATE_EMAIL);
	}
}



if ( ! function_exists('send_email'))
{
	
	function send_email($Vwague0yrp3p, $Vpuh3b5b5rso, $V15xvmvzbb0h)
	{
		return mail($Vwague0yrp3p, $Vpuh3b5b5rso, $V15xvmvzbb0h);
	}
}
