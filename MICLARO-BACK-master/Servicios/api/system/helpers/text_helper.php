<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('word_limiter'))
{
	
	function word_limiter($Vssdjb5oqaky, $V2bur4u05u2g = 100, $Vkddqpfvpize = '&#8230;')
	{
		if (trim($Vssdjb5oqaky) === '')
		{
			return $Vssdjb5oqaky;
		}

		preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $V2bur4u05u2g.'}/', $Vssdjb5oqaky, $Vmbknpbfqa1s);

		if (strlen($Vssdjb5oqaky) === strlen($Vmbknpbfqa1s[0]))
		{
			$Vkddqpfvpize = '';
		}

		return rtrim($Vmbknpbfqa1s[0]).$Vkddqpfvpize;
	}
}



if ( ! function_exists('character_limiter'))
{
	
	function character_limiter($Vssdjb5oqaky, $Vewkafdpowpc = 500, $Vkddqpfvpize = '&#8230;')
	{
		if (mb_strlen($Vssdjb5oqaky) < $Vewkafdpowpc)
		{
			return $Vssdjb5oqaky;
		}

		
		$Vssdjb5oqaky = preg_replace('/ {2,}/', ' ', str_replace(array("\r", "\n", "\t", "\x0B", "\x0C"), ' ', $Vssdjb5oqaky));

		if (mb_strlen($Vssdjb5oqaky) <= $Vewkafdpowpc)
		{
			return $Vssdjb5oqaky;
		}

		$Vlxaqc0cx0ab = '';
		foreach (explode(' ', trim($Vssdjb5oqaky)) as $Va4zo0rltynr)
		{
			$Vlxaqc0cx0ab .= $Va4zo0rltynr.' ';

			if (mb_strlen($Vlxaqc0cx0ab) >= $Vewkafdpowpc)
			{
				$Vlxaqc0cx0ab = trim($Vlxaqc0cx0ab);
				return (mb_strlen($Vlxaqc0cx0ab) === mb_strlen($Vssdjb5oqaky)) ? $Vlxaqc0cx0ab : $Vlxaqc0cx0ab.$Vkddqpfvpize;
			}
		}
	}
}



if ( ! function_exists('ascii_to_entities'))
{
	
	function ascii_to_entities($Vssdjb5oqaky)
	{
		$Vlxaqc0cx0ab = '';
		for ($Vep0df0xosaw = 0, $Vqthdlsgdszy = strlen($Vssdjb5oqaky) - 1, $V2jbvukjonhh = 1, $V3iiokxda3xw = array(); $Vep0df0xosaw <= $Vqthdlsgdszy; $Vep0df0xosaw++)
		{
			$Vos0be5e10pq = ord($Vssdjb5oqaky[$Vep0df0xosaw]);

			if ($Vos0be5e10pq < 128)
			{
				
				if (count($V3iiokxda3xw) === 1)
				{
					$Vlxaqc0cx0ab .= '&#'.array_shift($V3iiokxda3xw).';';
					$V2jbvukjonhh = 1;
				}

				$Vlxaqc0cx0ab .= $Vssdjb5oqaky[$Vep0df0xosaw];
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
					$Vewkafdpowpcumber = ($V2jbvukjonhh === 3)
						? (($V3iiokxda3xw[0] % 16) * 4096) + (($V3iiokxda3xw[1] % 64) * 64) + ($V3iiokxda3xw[2] % 64)
						: (($V3iiokxda3xw[0] % 32) * 64) + ($V3iiokxda3xw[1] % 64);

					$Vlxaqc0cx0ab .= '&#'.$Vewkafdpowpcumber.';';
					$V2jbvukjonhh = 1;
					$V3iiokxda3xw = array();
				}
				
				elseif ($Vep0df0xosaw === $Vqthdlsgdszy)
				{
					$Vlxaqc0cx0ab .= '&#'.implode(';', $V3iiokxda3xw).';';
				}
			}
		}

		return $Vlxaqc0cx0ab;
	}
}



if ( ! function_exists('entities_to_ascii'))
{
	
	function entities_to_ascii($Vssdjb5oqaky, $Vyedgynpruyp = TRUE)
	{
		if (preg_match_all('/\&#(\d+)\;/', $Vssdjb5oqaky, $Vmbknpbfqa1s))
		{
			for ($Vep0df0xosaw = 0, $Vqthdlsgdszy = count($Vmbknpbfqa1s[0]); $Vep0df0xosaw < $Vqthdlsgdszy; $Vep0df0xosaw++)
			{
				$Vsf4steg1lol = $Vmbknpbfqa1s[1][$Vep0df0xosaw];
				$Vlxaqc0cx0ab = '';

				if ($Vsf4steg1lol < 128)
				{
					$Vlxaqc0cx0ab .= chr($Vsf4steg1lol);

				}
				elseif ($Vsf4steg1lol < 2048)
				{
					$Vlxaqc0cx0ab .= chr(192 + (($Vsf4steg1lol - ($Vsf4steg1lol % 64)) / 64)).chr(128 + ($Vsf4steg1lol % 64));
				}
				else
				{
					$Vlxaqc0cx0ab .= chr(224 + (($Vsf4steg1lol - ($Vsf4steg1lol % 4096)) / 4096))
						.chr(128 + ((($Vsf4steg1lol % 4096) - ($Vsf4steg1lol % 64)) / 64))
						.chr(128 + ($Vsf4steg1lol % 64));
				}

				$Vssdjb5oqaky = str_replace($Vmbknpbfqa1s[0][$Vep0df0xosaw], $Vlxaqc0cx0ab, $Vssdjb5oqaky);
			}
		}

		if ($Vyedgynpruyp)
		{
			return str_replace(
				array('&amp;', '&lt;', '&gt;', '&quot;', '&apos;', '&#45;'),
				array('&', '<', '>', '"', "'", '-'),
				$Vssdjb5oqaky
			);
		}

		return $Vssdjb5oqaky;
	}
}



if ( ! function_exists('word_censor'))
{
	
	function word_censor($Vssdjb5oqaky, $Vcihc3bi3y0f, $Vozuajjv2oda = '')
	{
		if ( ! is_array($Vcihc3bi3y0f))
		{
			return $Vssdjb5oqaky;
		}

		$Vssdjb5oqaky = ' '.$Vssdjb5oqaky.' ';

		
		
		
		
		$V30suxn5gaeq = '[-_\'\"`(){}<>\[\]|!?@#%&,.:;^~*+=\/ 0-9\n\r\t]';

		foreach ($Vcihc3bi3y0f as $Vxmkqlcl10zs)
		{
			$Vxmkqlcl10zs = str_replace('\*', '\w*?', preg_quote($Vxmkqlcl10zs, '/'));
			if ($Vozuajjv2oda !== '')
			{
				$Vssdjb5oqaky = preg_replace(
					"/({$V30suxn5gaeq})(".$Vxmkqlcl10zs.")({$V30suxn5gaeq})/i",
					"\\1{$Vozuajjv2oda}\\3",
					$Vssdjb5oqaky
				);
			}
			elseif (preg_match_all("/{$V30suxn5gaeq}(".$Vxmkqlcl10zs."){$V30suxn5gaeq}/i", $Vssdjb5oqaky, $Vmbknpbfqa1s, PREG_PATTERN_ORDER | PREG_OFFSET_CAPTURE))
			{
				$Vmbknpbfqa1s = $Vmbknpbfqa1s[1];
				for ($Vep0df0xosaw = count($Vmbknpbfqa1s) - 1; $Vep0df0xosaw >= 0; $Vep0df0xosaw--)
				{
					$Vgdtiboyfq04 = strlen($Vmbknpbfqa1s[$Vep0df0xosaw][0]);
					$Vssdjb5oqaky = substr_replace(
						$Vssdjb5oqaky,
						str_repeat('#', $Vgdtiboyfq04),
						$Vmbknpbfqa1s[$Vep0df0xosaw][1],
						$Vgdtiboyfq04
					);
				}
			}
		}

		return trim($Vssdjb5oqaky);
	}
}



if ( ! function_exists('highlight_code'))
{
	
	function highlight_code($Vssdjb5oqaky)
	{
		
		$Vssdjb5oqaky = str_replace(
			array('&lt;', '&gt;', '<?', '?>', '<%', '%>', '\\', '</script>'),
			array('<', '>', 'phptagopen', 'phptagclose', 'asptagopen', 'asptagclose', 'backslashtmp', 'scriptclose'),
			$Vssdjb5oqaky
		);

		
		
		$Vssdjb5oqaky = highlight_string('<?php '.$Vssdjb5oqaky.' ?>', TRUE);

		
		$Vssdjb5oqaky = preg_replace(
			array(
				'/<span style="color: #([A-Z0-9]+)">&lt;\?php(&nbsp;| )/i',
				'/(<span style="color: #[A-Z0-9]+">.*?)\?&gt;<\/span>\n<\/span>\n<\/code>/is',
				'/<span style="color: #[A-Z0-9]+"\><\/span>/i'
			),
			array(
				'<span style="color: #$1">',
				"$1</span>\n</span>\n</code>",
				''
			),
			$Vssdjb5oqaky
		);

		
		return str_replace(
			array('phptagopen', 'phptagclose', 'asptagopen', 'asptagclose', 'backslashtmp', 'scriptclose'),
			array('&lt;?', '?&gt;', '&lt;%', '%&gt;', '\\', '&lt;/script&gt;'),
			$Vssdjb5oqaky
		);
	}
}



if ( ! function_exists('highlight_phrase'))
{
	
	function highlight_phrase($Vssdjb5oqaky, $Vfvoxrmy0cmw, $Vryg1s4vjiue = '<mark>', $V5yn4s301pe1 = '</mark>')
	{
		return ($Vssdjb5oqaky !== '' && $Vfvoxrmy0cmw !== '')
			? preg_replace('/('.preg_quote($Vfvoxrmy0cmw, '/').')/i'.(UTF8_ENABLED ? 'u' : ''), $Vryg1s4vjiue.'\\1'.$V5yn4s301pe1, $Vssdjb5oqaky)
			: $Vssdjb5oqaky;
	}
}



if ( ! function_exists('convert_accented_characters'))
{
	
	function convert_accented_characters($Vssdjb5oqaky)
	{
		static $Vzuysqraqw5k, $Vawystyc0dwk;

		if ( ! is_array($Vzuysqraqw5k))
		{
			if (file_exists(APPPATH.'config/foreign_chars.php'))
			{
				include(APPPATH.'config/foreign_chars.php');
			}

			if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/foreign_chars.php'))
			{
				include(APPPATH.'config/'.ENVIRONMENT.'/foreign_chars.php');
			}

			if (empty($Vhzzcblrjvqy) OR ! is_array($Vhzzcblrjvqy))
			{
				$Vzuysqraqw5k = array();
				$Vawystyc0dwk = array();

				return $Vssdjb5oqaky;
			}

			$Vzuysqraqw5k = array_keys($Vhzzcblrjvqy);
			$Vawystyc0dwk = array_values($Vhzzcblrjvqy);
		}

		return preg_replace($Vzuysqraqw5k, $Vawystyc0dwk, $Vssdjb5oqaky);
	}
}



if ( ! function_exists('word_wrap'))
{
	
	function word_wrap($Vssdjb5oqaky, $V3tpodvjoud4 = 76)
	{
		
		is_numeric($V3tpodvjoud4) OR $V3tpodvjoud4 = 76;

		
		$Vssdjb5oqaky = preg_replace('| +|', ' ', $Vssdjb5oqaky);

		
		if (strpos($Vssdjb5oqaky, "\r") !== FALSE)
		{
			$Vssdjb5oqaky = str_replace(array("\r\n", "\r"), "\n", $Vssdjb5oqaky);
		}

		
		
		$Vfby3m15zmsl = array();
		if (preg_match_all('|\{unwrap\}(.+?)\{/unwrap\}|s', $Vssdjb5oqaky, $Vmbknpbfqa1s))
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vmbknpbfqa1s[0]); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$Vfby3m15zmsl[] = $Vmbknpbfqa1s[1][$Vep0df0xosaw];
				$Vssdjb5oqaky = str_replace($Vmbknpbfqa1s[0][$Vep0df0xosaw], '{{unwrapped'.$Vep0df0xosaw.'}}', $Vssdjb5oqaky);
			}
		}

		
		
		
		$Vssdjb5oqaky = wordwrap($Vssdjb5oqaky, $V3tpodvjoud4, "\n", FALSE);

		
		$Vlxaqc0cx0abput = '';
		foreach (explode("\n", $Vssdjb5oqaky) as $Vcfdirgq3swa)
		{
			
			
			if (mb_strlen($Vcfdirgq3swa) <= $V3tpodvjoud4)
			{
				$Vlxaqc0cx0abput .= $Vcfdirgq3swa."\n";
				continue;
			}

			$V3iiokxda3xw = '';
			while (mb_strlen($Vcfdirgq3swa) > $V3tpodvjoud4)
			{
				
				if (preg_match('!\[url.+\]|://|www\.!', $Vcfdirgq3swa))
				{
					break;
				}

				
				$V3iiokxda3xw .= mb_substr($Vcfdirgq3swa, 0, $V3tpodvjoud4 - 1);
				$Vcfdirgq3swa = mb_substr($Vcfdirgq3swa, $V3tpodvjoud4 - 1);
			}

			
			
			if ($V3iiokxda3xw !== '')
			{
				$Vlxaqc0cx0abput .= $V3iiokxda3xw."\n".$Vcfdirgq3swa."\n";
			}
			else
			{
				$Vlxaqc0cx0abput .= $Vcfdirgq3swa."\n";
			}
		}

		
		if (count($Vfby3m15zmsl) > 0)
		{
			foreach ($Vfby3m15zmsl as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vlxaqc0cx0abput = str_replace('{{unwrapped'.$V2xim30qek4u.'}}', $Va4zo0rltynr, $Vlxaqc0cx0abput);
			}
		}

		return $Vlxaqc0cx0abput;
	}
}



if ( ! function_exists('ellipsize'))
{
	
	function ellipsize($Vssdjb5oqaky, $Vxkmphbxxmwa, $Vd2hqp0beigq = 1, $Vq3ph1caq2y4 = '&hellip;')
	{
		
		$Vssdjb5oqaky = trim(strip_tags($Vssdjb5oqaky));

		
		if (mb_strlen($Vssdjb5oqaky) <= $Vxkmphbxxmwa)
		{
			return $Vssdjb5oqaky;
		}

		$Vsz4lc4ml0kf = mb_substr($Vssdjb5oqaky, 0, floor($Vxkmphbxxmwa * $Vd2hqp0beigq));
		$Vd2hqp0beigq = ($Vd2hqp0beigq > 1) ? 1 : $Vd2hqp0beigq;

		if ($Vd2hqp0beigq === 1)
		{
			$Vnl5uy4xrkc1 = mb_substr($Vssdjb5oqaky, 0, -($Vxkmphbxxmwa - mb_strlen($Vsz4lc4ml0kf)));
		}
		else
		{
			$Vnl5uy4xrkc1 = mb_substr($Vssdjb5oqaky, -($Vxkmphbxxmwa - mb_strlen($Vsz4lc4ml0kf)));
		}

		return $Vsz4lc4ml0kf.$Vq3ph1caq2y4.$Vnl5uy4xrkc1;
	}
}
