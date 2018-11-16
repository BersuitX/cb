<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('smiley_js'))
{
	
	function smiley_js($V4skvbrggqat = '', $Vqxqkvquwweu = '', $Vihkge5zykmb = TRUE)
	{
		static $Vsrfedoluqsv = TRUE;
		$Vyotgbgs03ci = '';

		if ($V4skvbrggqat !== '' && ! is_array($V4skvbrggqat))
		{
			$V4skvbrggqat = array($V4skvbrggqat => $Vqxqkvquwweu);
		}

		if ($Vsrfedoluqsv === TRUE)
		{
			$Vsrfedoluqsv = FALSE;
			$Vlnkcet4wpd0 = array();

			if (is_array($V4skvbrggqat))
			{
				foreach ($V4skvbrggqat as $Vaclaigdbtoo => $Vdrzyozqxvbr)
				{
					$Vlnkcet4wpd0[] = '"'.$Vaclaigdbtoo.'" : "'.$Vdrzyozqxvbr.'"';
				}
			}

			$Vlnkcet4wpd0 = '{'.implode(',', $Vlnkcet4wpd0).'}';

			$Vyotgbgs03ci .= <<<EOF
			var smiley_map = {$Vlnkcet4wpd0};

			function insert_smiley(smiley, field_id) {
				var el = document.getElementById(field_id), newStart;

				if ( ! el && smiley_map[field_id]) {
					el = document.getElementById(smiley_map[field_id]);

					if ( ! el)
						return false;
				}

				el.focus();
				smiley = " " + smiley;

				if ('selectionStart' in el) {
					newStart = el.selectionStart + smiley.length;

					el.value = el.value.substr(0, el.selectionStart) +
									smiley +
									el.value.substr(el.selectionEnd, el.value.length);
					el.setSelectionRange(newStart, newStart);
				}
				else if (document.selection) {
					document.selection.createRange().text = smiley;
				}
			}
EOF;
		}
		elseif (is_array($V4skvbrggqat))
		{
			foreach ($V4skvbrggqat as $Vaclaigdbtoo => $Vdrzyozqxvbr)
			{
				$Vyotgbgs03ci .= 'smiley_map["'.$Vaclaigdbtoo.'"] = "'.$Vdrzyozqxvbr."\";\n";
			}
		}

		return ($Vihkge5zykmb)
			? '<script type="text/javascript" charset="utf-8">/*<![CDATA[ */'.$Vyotgbgs03ci.'// ]]></script>'
			: $Vyotgbgs03ci;
	}
}



if ( ! function_exists('get_clickable_smileys'))
{
	
	function get_clickable_smileys($Vmxyst5v52mx, $V4skvbrggqat = '')
	{
		
		if (is_array($V4skvbrggqat))
		{
			$Vkypoxrikl3w = $V4skvbrggqat;
		}
		elseif (FALSE === ($Vkypoxrikl3w = _get_smiley_array()))
		{
			return FALSE;
		}

		
		$Vmxyst5v52mx = rtrim($Vmxyst5v52mx, '/').'/';

		$Vycwy1ct0rgb = array();
		foreach ($Vkypoxrikl3w as $V2xim30qek4u => $Va4zo0rltynr)
		{
			
			
			
			
			if (isset($Vycwy1ct0rgb[$Vkypoxrikl3w[$V2xim30qek4u][0]]))
			{
				continue;
			}

			$Vrkjtc14ui0c[] = '<a href="javascript:void(0);" onclick="insert_smiley(\''.$V2xim30qek4u.'\', \''.$V4skvbrggqat.'\')"><img src="'.$Vmxyst5v52mx.$Vkypoxrikl3w[$V2xim30qek4u][0].'" alt="'.$Vkypoxrikl3w[$V2xim30qek4u][3].'" style="width: '.$Vkypoxrikl3w[$V2xim30qek4u][1].'; height: '.$Vkypoxrikl3w[$V2xim30qek4u][2].'; border: 0;" /></a>';
			$Vycwy1ct0rgb[$Vkypoxrikl3w[$V2xim30qek4u][0]] = TRUE;
		}

		return $Vrkjtc14ui0c;
	}
}



if ( ! function_exists('parse_smileys'))
{
	
	function parse_smileys($Vssdjb5oqaky = '', $Vmxyst5v52mx = '', $Vkypoxrikl3w = NULL)
	{
		if ($Vmxyst5v52mx === '' OR ( ! is_array($Vkypoxrikl3w) && FALSE === ($Vkypoxrikl3w = _get_smiley_array())))
		{
			return $Vssdjb5oqaky;
		}

		
		$Vmxyst5v52mx = rtrim($Vmxyst5v52mx, '/').'/';

		foreach ($Vkypoxrikl3w as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vssdjb5oqaky = str_replace($V2xim30qek4u, '<img src="'.$Vmxyst5v52mx.$Vkypoxrikl3w[$V2xim30qek4u][0].'" alt="'.$Vkypoxrikl3w[$V2xim30qek4u][3].'" style="width: '.$Vkypoxrikl3w[$V2xim30qek4u][1].'; height: '.$Vkypoxrikl3w[$V2xim30qek4u][2].'; border: 0;" />', $Vssdjb5oqaky);
		}

		return $Vssdjb5oqaky;
	}
}



if ( ! function_exists('_get_smiley_array'))
{
	
	function _get_smiley_array()
	{
		static $Vktzpny5xt1m;

		if ( ! is_array($Vktzpny5xt1m))
		{
			if (file_exists(APPPATH.'config/smileys.php'))
			{
				include(APPPATH.'config/smileys.php');
			}

			if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/smileys.php'))
			{
				include(APPPATH.'config/'.ENVIRONMENT.'/smileys.php');
			}

			if (empty($Vkypoxrikl3w) OR ! is_array($Vkypoxrikl3w))
			{
				$Vktzpny5xt1m = array();
				return FALSE;
			}

			$Vktzpny5xt1m = $Vkypoxrikl3w;
		}

		return $Vktzpny5xt1m;
	}
}
