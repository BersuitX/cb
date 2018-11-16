<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('site_url'))
{
	
	function site_url($V1naxfrpd12s = '', $Vibnldchwanv = NULL)
	{
		return get_instance()->config->site_url($V1naxfrpd12s, $Vibnldchwanv);
	}
}



if ( ! function_exists('base_url'))
{
	
	function base_url($V1naxfrpd12s = '', $Vibnldchwanv = NULL)
	{
		return get_instance()->config->base_url($V1naxfrpd12s, $Vibnldchwanv);
	}
}



if ( ! function_exists('current_url'))
{
	
	function current_url()
	{
		$Vgw3d0qe3dgd =& get_instance();
		return $Vgw3d0qe3dgd->config->site_url($Vgw3d0qe3dgd->uri->uri_string());
	}
}



if ( ! function_exists('uri_string'))
{
	
	function uri_string()
	{
		return get_instance()->uri->uri_string();
	}
}



if ( ! function_exists('index_page'))
{
	
	function index_page()
	{
		return get_instance()->config->item('index_page');
	}
}



if ( ! function_exists('anchor'))
{
	
	function anchor($V1naxfrpd12s = '', $Vqihmib4sqvm = '', $Vpkjdumwo4xn = '')
	{
		$Vqihmib4sqvm = (string) $Vqihmib4sqvm;

		$Vp3mwu0d4ffy = is_array($V1naxfrpd12s)
			? site_url($V1naxfrpd12s)
			: (preg_match('#^(\w+:)?//#i', $V1naxfrpd12s) ? $V1naxfrpd12s : site_url($V1naxfrpd12s));

		if ($Vqihmib4sqvm === '')
		{
			$Vqihmib4sqvm = $Vp3mwu0d4ffy;
		}

		if ($Vpkjdumwo4xn !== '')
		{
			$Vpkjdumwo4xn = _stringify_attributes($Vpkjdumwo4xn);
		}

		return '<a href="'.$Vp3mwu0d4ffy.'"'.$Vpkjdumwo4xn.'>'.$Vqihmib4sqvm.'</a>';
	}
}



if ( ! function_exists('anchor_popup'))
{
	
	function anchor_popup($V1naxfrpd12s = '', $Vqihmib4sqvm = '', $Vpkjdumwo4xn = FALSE)
	{
		$Vqihmib4sqvm = (string) $Vqihmib4sqvm;
		$Vp3mwu0d4ffy = preg_match('#^(\w+:)?//#i', $V1naxfrpd12s) ? $V1naxfrpd12s : site_url($V1naxfrpd12s);

		if ($Vqihmib4sqvm === '')
		{
			$Vqihmib4sqvm = $Vp3mwu0d4ffy;
		}

		if ($Vpkjdumwo4xn === FALSE)
		{
			return '<a href="'.$Vp3mwu0d4ffy.'" onclick="window.open(\''.$Vp3mwu0d4ffy."', '_blank'); return false;\">".$Vqihmib4sqvm.'</a>';
		}

		if ( ! is_array($Vpkjdumwo4xn))
		{
			$Vpkjdumwo4xn = array($Vpkjdumwo4xn);

			
			$Vlr5g2rgpuku = '_blank';
		}
		elseif ( ! empty($Vpkjdumwo4xn['window_name']))
		{
			$Vlr5g2rgpuku = $Vpkjdumwo4xn['window_name'];
			unset($Vpkjdumwo4xn['window_name']);
		}
		else
		{
			$Vlr5g2rgpuku = '_blank';
		}

		foreach (array('width' => '800', 'height' => '600', 'scrollbars' => 'yes', 'menubar' => 'no', 'status' => 'yes', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0') as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vbauiprnmvgf[$V2xim30qek4u] = isset($Vpkjdumwo4xn[$V2xim30qek4u]) ? $Vpkjdumwo4xn[$V2xim30qek4u] : $Va4zo0rltynr;
			unset($Vpkjdumwo4xn[$V2xim30qek4u]);
		}

		$Vpkjdumwo4xn = _stringify_attributes($Vpkjdumwo4xn);

		return '<a href="'.$Vp3mwu0d4ffy
			.'" onclick="window.open(\''.$Vp3mwu0d4ffy."', '".$Vlr5g2rgpuku."', '"._stringify_attributes($Vbauiprnmvgf, TRUE)."'); return false;\""
			.$Vpkjdumwo4xn.'>'.$Vqihmib4sqvm.'</a>';
	}
}



if ( ! function_exists('mailto'))
{
	
	function mailto($Vi2s52urac1m, $Vqihmib4sqvm = '', $Vpkjdumwo4xn = '')
	{
		$Vqihmib4sqvm = (string) $Vqihmib4sqvm;

		if ($Vqihmib4sqvm === '')
		{
			$Vqihmib4sqvm = $Vi2s52urac1m;
		}

		return '<a href="mailto:'.$Vi2s52urac1m.'"'._stringify_attributes($Vpkjdumwo4xn).'>'.$Vqihmib4sqvm.'</a>';
	}
}



if ( ! function_exists('safe_mailto'))
{
	
	function safe_mailto($Vi2s52urac1m, $Vqihmib4sqvm = '', $Vpkjdumwo4xn = '')
	{
		$Vqihmib4sqvm = (string) $Vqihmib4sqvm;

		if ($Vqihmib4sqvm === '')
		{
			$Vqihmib4sqvm = $Vi2s52urac1m;
		}

		$V5ozzo11urso = str_split('<a href="mailto:', 1);

		for ($Vep0df0xosaw = 0, $V4stf05kgafy = strlen($Vi2s52urac1m); $Vep0df0xosaw < $V4stf05kgafy; $Vep0df0xosaw++)
		{
			$V5ozzo11urso[] = '|'.ord($Vi2s52urac1m[$Vep0df0xosaw]);
		}

		$V5ozzo11urso[] = '"';

		if ($Vpkjdumwo4xn !== '')
		{
			if (is_array($Vpkjdumwo4xn))
			{
				foreach ($Vpkjdumwo4xn as $V2xim30qek4u => $Va4zo0rltynr)
				{
					$V5ozzo11urso[] = ' '.$V2xim30qek4u.'="';
					for ($Vep0df0xosaw = 0, $V4stf05kgafy = strlen($Va4zo0rltynr); $Vep0df0xosaw < $V4stf05kgafy; $Vep0df0xosaw++)
					{
						$V5ozzo11urso[] = '|'.ord($Va4zo0rltynr[$Vep0df0xosaw]);
					}
					$V5ozzo11urso[] = '"';
				}
			}
			else
			{
				for ($Vep0df0xosaw = 0, $V4stf05kgafy = strlen($Vpkjdumwo4xn); $Vep0df0xosaw < $V4stf05kgafy; $Vep0df0xosaw++)
				{
					$V5ozzo11urso[] = $Vpkjdumwo4xn[$Vep0df0xosaw];
				}
			}
		}

		$V5ozzo11urso[] = '>';

		$V3iiokxda3xw = array();
		for ($Vep0df0xosaw = 0, $V4stf05kgafy = strlen($Vqihmib4sqvm); $Vep0df0xosaw < $V4stf05kgafy; $Vep0df0xosaw++)
		{
			$Vos0be5e10pq = ord($Vqihmib4sqvm[$Vep0df0xosaw]);

			if ($Vos0be5e10pq < 128)
			{
				$V5ozzo11urso[] = '|'.$Vos0be5e10pq;
			}
			else
			{
				if (count($V3iiokxda3xw) === 0)
				{
					$V2jbvukjonhh = ($Vos0be5e10pq < 224) ? 2 : 3;
				}

				$V3iiokxda3xw[] = $Vos0be5e10pq;
				if (count($V3iiokxda3xw) === $V2jbvukjonhh)
				{
					$Vvl2owq3ojca = ($V2jbvukjonhh === 3)
							? (($V3iiokxda3xw[0] % 16) * 4096) + (($V3iiokxda3xw[1] % 64) * 64) + ($V3iiokxda3xw[2] % 64)
							: (($V3iiokxda3xw[0] % 32) * 64) + ($V3iiokxda3xw[1] % 64);
					$V5ozzo11urso[] = '|'.$Vvl2owq3ojca;
					$V2jbvukjonhh = 1;
					$V3iiokxda3xw = array();
				}
			}
		}

		$V5ozzo11urso[] = '<'; $V5ozzo11urso[] = '/'; $V5ozzo11urso[] = 'a'; $V5ozzo11urso[] = '>';

		$V5ozzo11urso = array_reverse($V5ozzo11urso);

		$Vzxix2pqoztx = "<script type=\"text/javascript\">\n"
			."\t//<![CDATA[\n"
			."\tvar l=new Array();\n";

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($V5ozzo11urso); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vzxix2pqoztx .= "\tl[".$Vep0df0xosaw."] = '".$V5ozzo11urso[$Vep0df0xosaw]."';\n";
		}

		$Vzxix2pqoztx .= "\n\tfor (var i = l.length-1; i >= 0; i=i-1) {\n"
			."\t\tif (l[i].substring(0, 1) === '|') document.write(\"&#\"+unescape(l[i].substring(1))+\";\");\n"
			."\t\telse document.write(unescape(l[i]));\n"
			."\t}\n"
			."\t//]]>\n"
			.'</script>';

		return $Vzxix2pqoztx;
	}
}



if ( ! function_exists('auto_link'))
{
	
	function auto_link($Vssdjb5oqaky, $V4wtbblc1wn4 = 'both', $Vq1dlkp4f3sv = FALSE)
	{
		
		if ($V4wtbblc1wn4 !== 'email' && preg_match_all('#(\w*://|www\.)[^\s()<>;]+\w#i', $Vssdjb5oqaky, $Vmbknpbfqa1s, PREG_OFFSET_CAPTURE | PREG_SET_ORDER))
		{
			
			$Va4s3mwrneh1 = ($Vq1dlkp4f3sv) ? ' target="_blank"' : '';

			
			
			
			foreach (array_reverse($Vmbknpbfqa1s) as $V4uvjtwtgjvp)
			{
				
				
				
				
				
				$Vqtrwdgbny00 = '<a href="'.(strpos($V4uvjtwtgjvp[1][0], '/') ? '' : 'http://').$V4uvjtwtgjvp[0][0].'"'.$Va4s3mwrneh1.'>'.$V4uvjtwtgjvp[0][0].'</a>';
				$Vssdjb5oqaky = substr_replace($Vssdjb5oqaky, $Vqtrwdgbny00, $V4uvjtwtgjvp[0][1], strlen($V4uvjtwtgjvp[0][0]));
			}
		}

		
		if ($V4wtbblc1wn4 !== 'url' && preg_match_all('#([\w\.\-\+]+@[a-z0-9\-]+\.[a-z0-9\-\.]+[^[:punct:]\s])#i', $Vssdjb5oqaky, $Vmbknpbfqa1s, PREG_OFFSET_CAPTURE))
		{
			foreach (array_reverse($Vmbknpbfqa1s[0]) as $V4uvjtwtgjvp)
			{
				if (filter_var($V4uvjtwtgjvp[0], FILTER_VALIDATE_EMAIL) !== FALSE)
				{
					$Vssdjb5oqaky = substr_replace($Vssdjb5oqaky, safe_mailto($V4uvjtwtgjvp[0]), $V4uvjtwtgjvp[1], strlen($V4uvjtwtgjvp[0]));
				}
			}
		}

		return $Vssdjb5oqaky;
	}
}



if ( ! function_exists('prep_url'))
{
	
	function prep_url($Vssdjb5oqaky = '')
	{
		if ($Vssdjb5oqaky === 'http://' OR $Vssdjb5oqaky === '')
		{
			return '';
		}

		$V2oecyt4aea4 = parse_url($Vssdjb5oqaky);

		if ( ! $V2oecyt4aea4 OR ! isset($V2oecyt4aea4['scheme']))
		{
			return 'http://'.$Vssdjb5oqaky;
		}

		return $Vssdjb5oqaky;
	}
}



if ( ! function_exists('url_title'))
{
	
	function url_title($Vssdjb5oqaky, $V424xxy2eh3t = '-', $V4stf05kgafyowercase = FALSE)
	{
		if ($V424xxy2eh3t === 'dash')
		{
			$V424xxy2eh3t = '-';
		}
		elseif ($V424xxy2eh3t === 'underscore')
		{
			$V424xxy2eh3t = '_';
		}

		$Vmdgdxm4knhc = preg_quote($V424xxy2eh3t, '#');

		$V0fxdkzvzjui = array(
			'&.+?;'			=> '',
			'[^\w\d _-]'		=> '',
			'\s+'			=> $V424xxy2eh3t,
			'('.$Vmdgdxm4knhc.')+'	=> $V424xxy2eh3t
		);

		$Vssdjb5oqaky = strip_tags($Vssdjb5oqaky);
		foreach ($V0fxdkzvzjui as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vssdjb5oqaky = preg_replace('#'.$V2xim30qek4u.'#i'.(UTF8_ENABLED ? 'u' : ''), $Va4zo0rltynr, $Vssdjb5oqaky);
		}

		if ($V4stf05kgafyowercase === TRUE)
		{
			$Vssdjb5oqaky = strtolower($Vssdjb5oqaky);
		}

		return trim(trim($Vssdjb5oqaky, $V424xxy2eh3t));
	}
}



if ( ! function_exists('redirect'))
{
	
	function redirect($V1naxfrpd12s = '', $V5dsbozs5xhq = 'auto', $Vn2ycfau434sode = NULL)
	{
		if ( ! preg_match('#^(\w+:)?//#i', $V1naxfrpd12s))
		{
			$V1naxfrpd12s = site_url($V1naxfrpd12s);
		}

		
		if ($V5dsbozs5xhq === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE)
		{
			$V5dsbozs5xhq = 'refresh';
		}
		elseif ($V5dsbozs5xhq !== 'refresh' && (empty($Vn2ycfau434sode) OR ! is_numeric($Vn2ycfau434sode)))
		{
			if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
			{
				$Vn2ycfau434sode = ($_SERVER['REQUEST_METHOD'] !== 'GET')
					? 303	
					: 307;
			}
			else
			{
				$Vn2ycfau434sode = 302;
			}
		}

		switch ($V5dsbozs5xhq)
		{
			case 'refresh':
				header('Refresh:0;url='.$V1naxfrpd12s);
				break;
			default:
				header('Location: '.$V1naxfrpd12s, TRUE, $Vn2ycfau434sode);
				break;
		}
		exit;
	}
}
