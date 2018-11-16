<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('singular'))
{
	
	function singular($Vssdjb5oqaky)
	{
		$Voetc43kt2cr = strval($Vssdjb5oqaky);

		if ( ! is_countable($Voetc43kt2cr))
		{
			return $Voetc43kt2cr;
		}

		$Vxrydz4eurhv = array(
			'/(matr)ices$/'		=> '\1ix',
			'/(vert|ind)ices$/'	=> '\1ex',
			'/^(ox)en/'		=> '\1',
			'/(alias)es$/'		=> '\1',
			'/([octop|vir])i$/'	=> '\1us',
			'/(cris|ax|test)es$/'	=> '\1is',
			'/(shoe)s$/'		=> '\1',
			'/(o)es$/'		=> '\1',
			'/(bus|campus)es$/'	=> '\1',
			'/([m|l])ice$/'		=> '\1ouse',
			'/(x|ch|ss|sh)es$/'	=> '\1',
			'/(m)ovies$/'		=> '\1\2ovie',
			'/(s)eries$/'		=> '\1\2eries',
			'/([^aeiouy]|qu)ies$/'	=> '\1y',
			'/([lr])ves$/'		=> '\1f',
			'/(tive)s$/'		=> '\1',
			'/(hive)s$/'		=> '\1',
			'/([^f])ves$/'		=> '\1fe',
			'/(^analy)ses$/'	=> '\1sis',
			'/((a)naly|(b)a|(d)iagno|(p)arenthe|(p)rogno|(s)ynop|(t)he)ses$/' => '\1\2sis',
			'/([ti])a$/'		=> '\1um',
			'/(p)eople$/'		=> '\1\2erson',
			'/(m)en$/'		=> '\1an',
			'/(s)tatuses$/'		=> '\1\2tatus',
			'/(c)hildren$/'		=> '\1\2hild',
			'/(n)ews$/'		=> '\1\2ews',
			'/([^us])s$/'		=> '\1'
		);

		foreach ($Vxrydz4eurhv as $Vuq0dlpvhwju => $Vozuajjv2oda)
		{
			if (preg_match($Vuq0dlpvhwju, $Voetc43kt2cr))
			{
				$Voetc43kt2cr = preg_replace($Vuq0dlpvhwju, $Vozuajjv2oda, $Voetc43kt2cr);
				break;
			}
		}

		return $Voetc43kt2cr;
	}
}



if ( ! function_exists('plural'))
{
	
	function plural($Vssdjb5oqaky)
	{
		$Voetc43kt2cr = strval($Vssdjb5oqaky);

		if ( ! is_countable($Voetc43kt2cr))
		{
			return $Voetc43kt2cr;
		}

		$Veeawsh3rgt3 = array(
			'/(quiz)$/'                => '\1zes',      
			'/^(ox)$/'                 => '\1\2en',     
			'/([m|l])ouse$/'           => '\1ice',      
			'/(matr|vert|ind)ix|ex$/'  => '\1ices',     
			'/(x|ch|ss|sh)$/'          => '\1es',       
			'/([^aeiouy]|qu)y$/'       => '\1ies',      
			'/(hive)$/'                => '\1s',        
			'/(?:([^f])fe|([lr])f)$/'  => '\1\2ves',    
			'/sis$/'                   => 'ses',        
			'/([ti])um$/'              => '\1a',        
			'/(p)erson$/'              => '\1eople',    
			'/(m)an$/'                 => '\1en',       
			'/(c)hild$/'               => '\1hildren',  
			'/(buffal|tomat)o$/'       => '\1\2oes',    
			'/(bu|campu)s$/'           => '\1\2ses',    
			'/(alias|status|virus)$/'  => '\1es',       
			'/(octop)us$/'             => '\1i',        
			'/(ax|cris|test)is$/'      => '\1es',       
			'/s$/'                     => 's',          
			'/$/'                      => 's',
		);

		foreach ($Veeawsh3rgt3 as $Vuq0dlpvhwju => $Vozuajjv2oda)
		{
			if (preg_match($Vuq0dlpvhwju, $Voetc43kt2cr))
			{
				$Voetc43kt2cr = preg_replace($Vuq0dlpvhwju, $Vozuajjv2oda, $Voetc43kt2cr);
				break;
			}
		}

		return $Voetc43kt2cr;
	}
}



if ( ! function_exists('camelize'))
{
	
	function camelize($Vssdjb5oqaky)
	{
		return strtolower($Vssdjb5oqaky[0]).substr(str_replace(' ', '', ucwords(preg_replace('/[\s_]+/', ' ', $Vssdjb5oqaky))), 1);
	}
}



if ( ! function_exists('underscore'))
{
	
	function underscore($Vssdjb5oqaky)
	{
		return preg_replace('/[\s]+/', '_', trim(MB_ENABLED ? mb_strtolower($Vssdjb5oqaky) : strtolower($Vssdjb5oqaky)));
	}
}



if ( ! function_exists('humanize'))
{
	
	function humanize($Vssdjb5oqaky, $V424xxy2eh3t = '_')
	{
		return ucwords(preg_replace('/['.preg_quote($V424xxy2eh3t).']+/', ' ', trim(MB_ENABLED ? mb_strtolower($Vssdjb5oqaky) : strtolower($Vssdjb5oqaky))));
	}
}



if ( ! function_exists('is_countable'))
{
	
	function is_countable($Vrmlj3m5ia3r)
	{
		return ! in_array(
			strtolower($Vrmlj3m5ia3r),
			array(
				'equipment', 'information', 'rice', 'money',
				'species', 'series', 'fish', 'meta'
			)
		);
	}
}
