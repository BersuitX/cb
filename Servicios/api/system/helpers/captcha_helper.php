<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('create_captcha'))
{
	
	function create_captcha($Vfeinw1hsfej = '', $V25uhurqg0i4 = '', $Vgje0233k3gs = '', $Vfl0wh0hn5wj = '')
	{
		$Vpoj1s2hpsj1 = array(
			'word'		=> '',
			'img_path'	=> '',
			'img_url'	=> '',
			'img_width'	=> '150',
			'img_height'	=> '30',
			'font_path'	=> '',
			'expiration'	=> 7200,
			'word_length'	=> 8,
			'font_size'	=> 16,
			'img_id'	=> '',
			'pool'		=> '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
			'colors'	=> array(
				'background'	=> array(255,255,255),
				'border'	=> array(153,102,102),
				'text'		=> array(204,153,153),
				'grid'		=> array(255,182,182)
			)
		);

		foreach ($Vpoj1s2hpsj1 as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if ( ! is_array($Vfeinw1hsfej) && empty($$V2xim30qek4u))
			{
				$$V2xim30qek4u = $Va4zo0rltynr;
			}
			else
			{
				$$V2xim30qek4u = isset($Vfeinw1hsfej[$V2xim30qek4u]) ? $Vfeinw1hsfej[$V2xim30qek4u] : $Va4zo0rltynr;
			}
		}

		if ($V25uhurqg0i4 === '' OR $Vgje0233k3gs === ''
			OR ! is_dir($V25uhurqg0i4) OR ! is_really_writable($V25uhurqg0i4)
			OR ! extension_loaded('gd'))
		{
			return FALSE;
		}

		
		
		

		$Vswcifil4f1s = microtime(TRUE);

		$Vz3xqs2vapv0 = @opendir($V25uhurqg0i4);
		while ($Vb13cwxhoi04 = @readdir($Vz3xqs2vapv0))
		{
			if (substr($Vb13cwxhoi04, -4) === '.jpg' && (str_replace('.jpg', '', $Vb13cwxhoi04) + $Vw0rqc1cqgza) < $Vswcifil4f1s)
			{
				@unlink($V25uhurqg0i4.$Vb13cwxhoi04);
			}
		}

		@closedir($Vz3xqs2vapv0);

		
		
		

		if (empty($Vrmlj3m5ia3r))
		{
			$Vrmlj3m5ia3r = '';
			$Vq5u2i0kmrfl = strlen($Vjellald43li);
			$Vpesmgsrgshv = $Vq5u2i0kmrfl - 1;

			
			if (function_exists('random_int'))
			{
				try
				{
					for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vrmlj3m5ia3r_length; $Vep0df0xosaw++)
					{
						$Vrmlj3m5ia3r .= $Vjellald43li[random_int(0, $Vpesmgsrgshv)];
					}
				}
				catch (Exception $Veengl4bqqud)
				{
					
					
					$Vrmlj3m5ia3r = '';
				}
			}
		}

		if (empty($Vrmlj3m5ia3r))
		{
			
			
			
			
			
			
			if ($Vq5u2i0kmrfl > 256)
			{
				return FALSE;
			}

			
			
			$V0hmlbglzaic = get_instance()->security;

			
			
			if (($Vu1w30s4sdef = $V0hmlbglzaic->get_random_bytes($Vq5u2i0kmrfl)) !== FALSE)
			{
				$V31xspzut2la = $Vrmlj3m5ia3r_index = 0;
				while ($Vrmlj3m5ia3r_index < $Vrmlj3m5ia3r_length)
				{
					
					
					
					if ($V31xspzut2la === $Vq5u2i0kmrfl)
					{
						
						
						
						for ($Vep0df0xosaw = 0; $Vep0df0xosaw < 5; $Vep0df0xosaw++)
						{
							if (($Vu1w30s4sdef = $V0hmlbglzaic->get_random_bytes($Vq5u2i0kmrfl)) === FALSE)
							{
								continue;
							}

							$V31xspzut2la = 0;
							break;
						}

						if ($Vu1w30s4sdef === FALSE)
						{
							
							$Vrmlj3m5ia3r = '';
							break;
						}
					}

					list(, $Vrmng3yl023u) = unpack('C', $Vu1w30s4sdef[$V31xspzut2la++]);
					if ($Vrmng3yl023u > $Vpesmgsrgshv)
					{
						continue;
					}

					$Vrmlj3m5ia3r .= $Vjellald43li[$Vrmng3yl023u];
					$Vrmlj3m5ia3r_index++;
				}
			}
		}

		if (empty($Vrmlj3m5ia3r))
		{
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vrmlj3m5ia3r_length; $Vep0df0xosaw++)
			{
				$Vrmlj3m5ia3r .= $Vjellald43li[mt_rand(0, $Vpesmgsrgshv)];
			}
		}
		elseif ( ! is_string($Vrmlj3m5ia3r))
		{
			$Vrmlj3m5ia3r = (string) $Vrmlj3m5ia3r;
		}

		
		
		
		$Vgdtiboyfq04	= strlen($Vrmlj3m5ia3r);
		$Vxaqoszf2h3l	= ($Vgdtiboyfq04 >= 6) ? mt_rand(-($Vgdtiboyfq04-6), ($Vgdtiboyfq04-6)) : 0;
		$V4b1k5n5isa5	= mt_rand(6, (360/$Vgdtiboyfq04)-16);
		$V3atavcyahb1 = ($Vxaqoszf2h3l >= 0) ? mt_rand($Vep0df0xosawmg_height, $Vep0df0xosawmg_width) : mt_rand(6, $Vep0df0xosawmg_height);

		
		
		$Vep0df0xosawm = function_exists('imagecreatetruecolor')
			? imagecreatetruecolor($Vep0df0xosawmg_width, $Vep0df0xosawmg_height)
			: imagecreate($Vep0df0xosawmg_width, $Vep0df0xosawmg_height);

		
		
		

		is_array($Vn1250g0gsqj) OR $Vn1250g0gsqj = $Vpoj1s2hpsj1['colors'];

		foreach (array_keys($Vpoj1s2hpsj1['colors']) as $V2xim30qek4u)
		{
			
			is_array($Vn1250g0gsqj[$V2xim30qek4u]) OR $Vn1250g0gsqj[$V2xim30qek4u] = $Vpoj1s2hpsj1['colors'][$V2xim30qek4u];
			$Vn1250g0gsqj[$V2xim30qek4u] = imagecolorallocate($Vep0df0xosawm, $Vn1250g0gsqj[$V2xim30qek4u][0], $Vn1250g0gsqj[$V2xim30qek4u][1], $Vn1250g0gsqj[$V2xim30qek4u][2]);
		}

		
		ImageFilledRectangle($Vep0df0xosawm, 0, 0, $Vep0df0xosawmg_width, $Vep0df0xosawmg_height, $Vn1250g0gsqj['background']);

		
		
		
		$Vd0vdk4wkcxk		= 1;
		$Vd0vdk4wkcxkc		= 7;
		$Vxmg53rbssvc		= 16;
		$Vn2fwher1une	= 20;
		$Vcrs5ubnov3p		= 32;

		for ($Vep0df0xosaw = 0, $Vs0w3qj4ppp1 = ($Vn2fwher1une * $Vcrs5ubnov3p) - 1; $Vep0df0xosaw < $Vs0w3qj4ppp1; $Vep0df0xosaw++)
		{
			$Vd0vdk4wkcxk += $Vd0vdk4wkcxkc;
			$Veegh0vnvksg = $Vxmg53rbssvc * ($Vep0df0xosaw / $Vcrs5ubnov3p);
			$V5ozzo11urso = ($Veegh0vnvksg * cos($Vd0vdk4wkcxk)) + $V4b1k5n5isa5;
			$Vud13bcbbxbv = ($Veegh0vnvksg * sin($Vd0vdk4wkcxk)) + $V3atavcyahb1;
			$Vd0vdk4wkcxk += $Vd0vdk4wkcxkc;
			$Veegh0vnvksg1 = $Vxmg53rbssvc * (($Vep0df0xosaw + 1) / $Vcrs5ubnov3p);
			$V5ozzo11urso1 = ($Veegh0vnvksg1 * cos($Vd0vdk4wkcxk)) + $V4b1k5n5isa5;
			$Vud13bcbbxbv1 = ($Veegh0vnvksg1 * sin($Vd0vdk4wkcxk)) + $V3atavcyahb1;
			imageline($Vep0df0xosawm, $V5ozzo11urso, $Vud13bcbbxbv, $V5ozzo11urso1, $Vud13bcbbxbv1, $Vn1250g0gsqj['grid']);
			$Vd0vdk4wkcxk -= $Vd0vdk4wkcxkc;
		}

		
		
		

		$Vz4bp0dgx2un = ($Vfl0wh0hn5wj !== '' && file_exists($Vfl0wh0hn5wj) && function_exists('imagettftext'));
		if ($Vz4bp0dgx2un === FALSE)
		{
			($Vvbwwmxw5k0c > 5) && $Vvbwwmxw5k0c = 5;
			$V5ozzo11urso = mt_rand(0, $Vep0df0xosawmg_width / ($Vgdtiboyfq04 / 3));
			$Vud13bcbbxbv = 0;
		}
		else
		{
			($Vvbwwmxw5k0c > 30) && $Vvbwwmxw5k0c = 30;
			$V5ozzo11urso = mt_rand(0, $Vep0df0xosawmg_width / ($Vgdtiboyfq04 / 1.5));
			$Vud13bcbbxbv = $Vvbwwmxw5k0c + 2;
		}

		for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vgdtiboyfq04; $Vep0df0xosaw++)
		{
			if ($Vz4bp0dgx2un === FALSE)
			{
				$Vud13bcbbxbv = mt_rand(0 , $Vep0df0xosawmg_height / 2);
				imagestring($Vep0df0xosawm, $Vvbwwmxw5k0c, $V5ozzo11urso, $Vud13bcbbxbv, $Vrmlj3m5ia3r[$Vep0df0xosaw], $Vn1250g0gsqj['text']);
				$V5ozzo11urso += ($Vvbwwmxw5k0c * 2);
			}
			else
			{
				$Vud13bcbbxbv = mt_rand($Vep0df0xosawmg_height / 2, $Vep0df0xosawmg_height - 3);
				imagettftext($Vep0df0xosawm, $Vvbwwmxw5k0c, $Vxaqoszf2h3l, $V5ozzo11urso, $Vud13bcbbxbv, $Vn1250g0gsqj['text'], $Vfl0wh0hn5wj, $Vrmlj3m5ia3r[$Vep0df0xosaw]);
				$V5ozzo11urso += $Vvbwwmxw5k0c;
			}
		}

		
		imagerectangle($Vep0df0xosawm, 0, 0, $Vep0df0xosawmg_width - 1, $Vep0df0xosawmg_height - 1, $Vn1250g0gsqj['border']);

		
		
		
		$Vgje0233k3gs = rtrim($Vgje0233k3gs, '/').'/';

		if (function_exists('imagejpeg'))
		{
			$Vep0df0xosawmg_filename = $Vswcifil4f1s.'.jpg';
			imagejpeg($Vep0df0xosawm, $V25uhurqg0i4.$Vep0df0xosawmg_filename);
		}
		elseif (function_exists('imagepng'))
		{
			$Vep0df0xosawmg_filename = $Vswcifil4f1s.'.png';
			imagepng($Vep0df0xosawm, $V25uhurqg0i4.$Vep0df0xosawmg_filename);
		}
		else
		{
			return FALSE;
		}

		$Vep0df0xosawmg = '<img '.($Vep0df0xosawmg_id === '' ? '' : 'id="'.$Vep0df0xosawmg_id.'"').' src="'.$Vgje0233k3gs.$Vep0df0xosawmg_filename.'" style="width: '.$Vep0df0xosawmg_width.'; height: '.$Vep0df0xosawmg_height .'; border: 0;" alt=" " />';
		ImageDestroy($Vep0df0xosawm);

		return array('word' => $Vrmlj3m5ia3r, 'time' => $Vswcifil4f1s, 'image' => $Vep0df0xosawmg, 'filename' => $Vep0df0xosawmg_filename);
	}
}
