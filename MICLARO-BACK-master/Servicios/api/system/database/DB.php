<?php

defined('BASEPATH') OR exit('No direct script access allowed');


function &DB($Vpz5i5lfmwft = '', $V3xhgktr0ny4 = NULL)
{
	
	if (is_string($Vpz5i5lfmwft) && strpos($Vpz5i5lfmwft, '://') === FALSE)
	{
		
		if ( ! file_exists($V3emdg0kb1po = APPPATH.'config/'.ENVIRONMENT.'/database.php')
			&& ! file_exists($V3emdg0kb1po = APPPATH.'config/database.php'))
		{
			show_error('The configuration file database.php does not exist.');
		}

		include($V3emdg0kb1po);

		
		
		if (class_exists('CI_Controller', FALSE))
		{
			foreach (get_instance()->load->get_package_paths() as $Vcmaitbcbmmk)
			{
				if ($Vcmaitbcbmmk !== APPPATH)
				{
					if (file_exists($V3emdg0kb1po = $Vcmaitbcbmmk.'config/'.ENVIRONMENT.'/database.php'))
					{
						include($V3emdg0kb1po);
					}
					elseif (file_exists($V3emdg0kb1po = $Vcmaitbcbmmk.'config/database.php'))
					{
						include($V3emdg0kb1po);
					}
				}
			}
		}

		if ( ! isset($Vwensv4j4idw) OR count($Vwensv4j4idw) === 0)
		{
			show_error('No database connection settings were found in the database config file.');
		}

		if ($Vpz5i5lfmwft !== '')
		{
			$Vkx33zo3ur1f = $Vpz5i5lfmwft;
		}

		if ( ! isset($Vkx33zo3ur1f))
		{
			show_error('You have not specified a database connection group via $Vkx33zo3ur1f in your config/database.php file.');
		}
		elseif ( ! isset($Vwensv4j4idw[$Vkx33zo3ur1f]))
		{
			show_error('You have specified an invalid database connection group ('.$Vkx33zo3ur1f.') in your config/database.php file.');
		}

		$Vpz5i5lfmwft = $Vwensv4j4idw[$Vkx33zo3ur1f];
	}
	elseif (is_string($Vpz5i5lfmwft))
	{
		
		if (($Vcuebtfasl53 = @parse_url($Vpz5i5lfmwft)) === FALSE)
		{
			show_error('Invalid DB Connection String');
		}

		$Vpz5i5lfmwft = array(
			'dbdriver'	=> $Vcuebtfasl53['scheme'],
			'hostname'	=> isset($Vcuebtfasl53['host']) ? rawurldecode($Vcuebtfasl53['host']) : '',
			'port'		=> isset($Vcuebtfasl53['port']) ? rawurldecode($Vcuebtfasl53['port']) : '',
			'username'	=> isset($Vcuebtfasl53['user']) ? rawurldecode($Vcuebtfasl53['user']) : '',
			'password'	=> isset($Vcuebtfasl53['pass']) ? rawurldecode($Vcuebtfasl53['pass']) : '',
			'database'	=> isset($Vcuebtfasl53['path']) ? rawurldecode(substr($Vcuebtfasl53['path'], 1)) : ''
		);

		
		if (isset($Vcuebtfasl53['query']))
		{
			parse_str($Vcuebtfasl53['query'], $Vfi5bo00ptdr);

			foreach ($Vfi5bo00ptdr as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (is_string($Va4zo0rltynr) && in_array(strtoupper($Va4zo0rltynr), array('TRUE', 'FALSE', 'NULL')))
				{
					$Va4zo0rltynr = var_export($Va4zo0rltynr, TRUE);
				}

				$Vpz5i5lfmwft[$V2xim30qek4u] = $Va4zo0rltynr;
			}
		}
	}

	
	if (empty($Vpz5i5lfmwft['dbdriver']))
	{
		show_error('You have not selected a database type to connect to.');
	}

	
	
	
	if ($V3xhgktr0ny4 !== NULL)
	{
		$V3nsnc1svxek = $V3xhgktr0ny4;
	}
	
	
	
	elseif ( ! isset($V3nsnc1svxek) && isset($Vnxkcdqophye))
	{
		$V3nsnc1svxek = $Vnxkcdqophye;
	}

	require_once(BASEPATH.'database/DB_driver.php');

	if ( ! isset($V3nsnc1svxek) OR $V3nsnc1svxek === TRUE)
	{
		require_once(BASEPATH.'database/DB_query_builder.php');
		if ( ! class_exists('CI_DB', FALSE))
		{
			
			class CI_DB extends CI_DB_query_builder { }
		}
	}
	elseif ( ! class_exists('CI_DB', FALSE))
	{
		
		class CI_DB extends CI_DB_driver { }
	}

	
	$Vlz1c1ee2m0c = BASEPATH.'database/drivers/'.$Vpz5i5lfmwft['dbdriver'].'/'.$Vpz5i5lfmwft['dbdriver'].'_driver.php';

	file_exists($Vlz1c1ee2m0c) OR show_error('Invalid DB driver');
	require_once($Vlz1c1ee2m0c);

	
	$Vxanpyuscvfx = 'CI_DB_'.$Vpz5i5lfmwft['dbdriver'].'_driver';
	$Vdb1vjtaj3iv = new $Vxanpyuscvfx($Vpz5i5lfmwft);

	
	if ( ! empty($Vdb1vjtaj3iv->subdriver))
	{
		$Vlz1c1ee2m0c = BASEPATH.'database/drivers/'.$Vdb1vjtaj3iv->dbdriver.'/subdrivers/'.$Vdb1vjtaj3iv->dbdriver.'_'.$Vdb1vjtaj3iv->subdriver.'_driver.php';

		if (file_exists($Vlz1c1ee2m0c))
		{
			require_once($Vlz1c1ee2m0c);
			$Vxanpyuscvfx = 'CI_DB_'.$Vdb1vjtaj3iv->dbdriver.'_'.$Vdb1vjtaj3iv->subdriver.'_driver';
			$Vdb1vjtaj3iv = new $Vxanpyuscvfx($Vpz5i5lfmwft);
		}
	}

	$Vdb1vjtaj3iv->initialize();
	return $Vdb1vjtaj3iv;
}
