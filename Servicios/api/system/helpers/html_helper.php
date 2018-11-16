<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('heading'))
{
	
	function heading($Vfeinw1hsfej = '', $Vyxp2dhcvnlx = '1', $Vpkjdumwo4xn = '')
	{
		return '<h'.$Vyxp2dhcvnlx._stringify_attributes($Vpkjdumwo4xn).'>'.$Vfeinw1hsfej.'</h'.$Vyxp2dhcvnlx.'>';
	}
}



if ( ! function_exists('ul'))
{
	
	function ul($V1q5xkbcnn5z, $Vpkjdumwo4xn = '')
	{
		return _list('ul', $V1q5xkbcnn5z, $Vpkjdumwo4xn);
	}
}



if ( ! function_exists('ol'))
{
	
	function ol($V1q5xkbcnn5z, $Vpkjdumwo4xn = '')
	{
		return _list('ol', $V1q5xkbcnn5z, $Vpkjdumwo4xn);
	}
}



if ( ! function_exists('_list'))
{
	
	function _list($V4wtbblc1wn4 = 'ul', $V1q5xkbcnn5z = array(), $Vpkjdumwo4xn = '', $Vp2zatnbwiip = 0)
	{
		
		if ( ! is_array($V1q5xkbcnn5z))
		{
			return $V1q5xkbcnn5z;
		}

		
		$Vlxaqc0cx0ab = str_repeat(' ', $Vp2zatnbwiip)
			
			.'<'.$V4wtbblc1wn4._stringify_attributes($Vpkjdumwo4xn).">\n";


		
		

		static $Vgwptqfztrjd = '';
		foreach ($V1q5xkbcnn5z as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vgwptqfztrjd = $V2xim30qek4u;

			$Vlxaqc0cx0ab .= str_repeat(' ', $Vp2zatnbwiip + 2).'<li>';

			if ( ! is_array($Va4zo0rltynr))
			{
				$Vlxaqc0cx0ab .= $Va4zo0rltynr;
			}
			else
			{
				$Vlxaqc0cx0ab .= $Vgwptqfztrjd."\n"._list($V4wtbblc1wn4, $Va4zo0rltynr, '', $Vp2zatnbwiip + 4).str_repeat(' ', $Vp2zatnbwiip + 2);
			}

			$Vlxaqc0cx0ab .= "</li>\n";
		}

		
		return $Vlxaqc0cx0ab.str_repeat(' ', $Vp2zatnbwiip).'</'.$V4wtbblc1wn4.">\n";
	}
}



if ( ! function_exists('img'))
{
	
	function img($Vfxvkffw4s0y = '', $Vjgvjtwsaeso = FALSE, $Vpkjdumwo4xn = '')
	{
		if ( ! is_array($Vfxvkffw4s0y) )
		{
			$Vfxvkffw4s0y = array('src' => $Vfxvkffw4s0y);
		}

		
		if ( ! isset($Vfxvkffw4s0y['alt']))
		{
			$Vfxvkffw4s0y['alt'] = '';
		}

		$Vqqmqfvq2pbp = '<img';

		foreach ($Vfxvkffw4s0y as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			if ($Vwyse0flpyxh === 'src' && ! preg_match('#^([a-z]+:)?//#i', $Vxxtccqydhzn))
			{
				if ($Vjgvjtwsaeso === TRUE)
				{
					$Vqqmqfvq2pbp .= ' src="'.get_instance()->config->site_url($Vxxtccqydhzn).'"';
				}
				else
				{
					$Vqqmqfvq2pbp .= ' src="'.get_instance()->config->slash_item('base_url').$Vxxtccqydhzn.'"';
				}
			}
			else
			{
				$Vqqmqfvq2pbp .= ' '.$Vwyse0flpyxh.'="'.$Vxxtccqydhzn.'"';
			}
		}

		return $Vqqmqfvq2pbp._stringify_attributes($Vpkjdumwo4xn).' />';
	}
}



if ( ! function_exists('doctype'))
{
	
	function doctype($V4wtbblc1wn4 = 'xhtml1-strict')
	{
		static $Veaxmpcqpoer;

		if ( ! is_array($Veaxmpcqpoer))
		{
			if (file_exists(APPPATH.'config/doctypes.php'))
			{
				include(APPPATH.'config/doctypes.php');
			}

			if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/doctypes.php'))
			{
				include(APPPATH.'config/'.ENVIRONMENT.'/doctypes.php');
			}

			if (empty($V3dv3nai4faz) OR ! is_array($V3dv3nai4faz))
			{
				$Veaxmpcqpoer = array();
				return FALSE;
			}

			$Veaxmpcqpoer = $V3dv3nai4faz;
		}

		return isset($Veaxmpcqpoer[$V4wtbblc1wn4]) ? $Veaxmpcqpoer[$V4wtbblc1wn4] : FALSE;
	}
}



if ( ! function_exists('link_tag'))
{
	
	function link_tag($Vyxp2dhcvnlxref = '', $Vr5dpm3sd4az = 'stylesheet', $V4wtbblc1wn4 = 'text/css', $Vqihmib4sqvm = '', $Vnfokpcd5zo5 = '', $Vjgvjtwsaeso = FALSE)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vrkjtc14ui0c = '<link ';

		if (is_array($Vyxp2dhcvnlxref))
		{
			foreach ($Vyxp2dhcvnlxref as $Vwyse0flpyxh => $Vxxtccqydhzn)
			{
				if ($Vwyse0flpyxh === 'href' && ! preg_match('#^([a-z]+:)?//#i', $Vxxtccqydhzn))
				{
					if ($Vjgvjtwsaeso === TRUE)
					{
						$Vrkjtc14ui0c .= 'href="'.$Vgw3d0qe3dgd->config->site_url($Vxxtccqydhzn).'" ';
					}
					else
					{
						$Vrkjtc14ui0c .= 'href="'.$Vgw3d0qe3dgd->config->slash_item('base_url').$Vxxtccqydhzn.'" ';
					}
				}
				else
				{
					$Vrkjtc14ui0c .= $Vwyse0flpyxh.'="'.$Vxxtccqydhzn.'" ';
				}
			}
		}
		else
		{
			if (preg_match('#^([a-z]+:)?//#i', $Vyxp2dhcvnlxref))
			{
				$Vrkjtc14ui0c .= 'href="'.$Vyxp2dhcvnlxref.'" ';
			}
			elseif ($Vjgvjtwsaeso === TRUE)
			{
				$Vrkjtc14ui0c .= 'href="'.$Vgw3d0qe3dgd->config->site_url($Vyxp2dhcvnlxref).'" ';
			}
			else
			{
				$Vrkjtc14ui0c .= 'href="'.$Vgw3d0qe3dgd->config->slash_item('base_url').$Vyxp2dhcvnlxref.'" ';
			}

			$Vrkjtc14ui0c .= 'rel="'.$Vr5dpm3sd4az.'" type="'.$V4wtbblc1wn4.'" ';

			if ($Vnfokpcd5zo5 !== '')
			{
				$Vrkjtc14ui0c .= 'media="'.$Vnfokpcd5zo5.'" ';
			}

			if ($Vqihmib4sqvm !== '')
			{
				$Vrkjtc14ui0c .= 'title="'.$Vqihmib4sqvm.'" ';
			}
		}

		return $Vrkjtc14ui0c."/>\n";
	}
}



if ( ! function_exists('meta'))
{
	
	function meta($Vaclaigdbtoo = '', $V3d4hantjd1y = '', $V4wtbblc1wn4 = 'name', $Vkq5rgcyqdq1 = "\n")
	{
		
		
		if ( ! is_array($Vaclaigdbtoo))
		{
			$Vaclaigdbtoo = array(array('name' => $Vaclaigdbtoo, 'content' => $V3d4hantjd1y, 'type' => $V4wtbblc1wn4, 'newline' => $Vkq5rgcyqdq1));
		}
		elseif (isset($Vaclaigdbtoo['name']))
		{
			
			$Vaclaigdbtoo = array($Vaclaigdbtoo);
		}

		$Vssdjb5oqaky = '';
		foreach ($Vaclaigdbtoo as $Vo5yd54xlq3s)
		{
			$V4wtbblc1wn4		= (isset($Vo5yd54xlq3s['type']) && $Vo5yd54xlq3s['type'] !== 'name')	? 'http-equiv' : 'name';
			$Vaclaigdbtoo		= isset($Vo5yd54xlq3s['name'])					? $Vo5yd54xlq3s['name'] : '';
			$V3d4hantjd1y	= isset($Vo5yd54xlq3s['content'])				? $Vo5yd54xlq3s['content'] : '';
			$Vkq5rgcyqdq1	= isset($Vo5yd54xlq3s['newline'])				? $Vo5yd54xlq3s['newline'] : "\n";

			$Vssdjb5oqaky .= '<meta '.$V4wtbblc1wn4.'="'.$Vaclaigdbtoo.'" content="'.$V3d4hantjd1y.'" />'.$Vkq5rgcyqdq1;
		}

		return $Vssdjb5oqaky;
	}
}



if ( ! function_exists('br'))
{
	
	function br($V2jbvukjonhh = 1)
	{
		return str_repeat('<br />', $V2jbvukjonhh);
	}
}



if ( ! function_exists('nbs'))
{
	
	function nbs($Vkl41m51eom1 = 1)
	{
		return str_repeat('&nbsp;', $Vkl41m51eom1);
	}
}
