<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Image_lib {

	
	public $Vrfl5wy5fh0h		= 'gd2';

	
	public $Vppfouqmrnys		= '';

	
	public $Vshqayjdqgs2		= FALSE;

	
	public $V4s1rzsxzdb4		= '';

	
	public $Veqi4ixzneil		= '';

	
	public $Vsafw0khxdxk			= '';

	
	public $Vpa5gd3d5pqp			= '';

	
	public $Vxxo1otfu2kr			= 90;

	
	public $V44ugj3intf0		= FALSE;

	
	public $Vcqnrvjgkoqg		= '_thumb';

	
	public $Vkchihafxixc		= TRUE;

	
	public $Vqnnhgrwceb3		= 'auto';

	
	public $Vulzzdy41wkf		= '';

	
	public $V4b1k5n5isa5			= '';

	
	public $V3atavcyahb1			= '';

	
	
	

	
	public $Vdnrowr1bn04			= '';

	
	public $Vv3iud4eoq4m			= 'text';

	
	public $Vh5rkkdzgao2		= 4;

	
	public $Vhzhyx2u0fcx		= 4;

	
	public $Vpjvoyruglxi		= '';

	
	public $Vqyiwvlsrhxu		= '';

	
	public $Vwyiadkrxkdk		= 17;

	
	public $Vqvzipvaftte	= 'B';

	
	public $Vxsbrhdoq0wi	= 'C';

	
	public $Vvxnayyzkrgr			= 0;

	
	public $Vfdttbvn1vdx		= 0;

	
	public $Vjaen4jw2duz		= 0;

	
	protected $Vqpzsllsxeod	= '#ffffff';

	
	protected $Vzfgbsf24igs	= '';

	
	public $Vkln1dvll00w	= 2;

	
	public $Vwrps0d1zgrp		= 50;

	
	
	

	
	public $V1gemk3jkdcn		= '';

	
	public $Vovjxh0550ge		= '';

	
	public $Vjzlxu3wa02g		= '';

	
	public $Vuzzae42ergg		= '';

	
	public $Vihw0a3wpe0p		= '';

	
	public $Vyjydpsgslf5		= '';

	
	public $Vtitpnwn5r1c		= '';

	
	public $Vnmnljppz2qd		= '';

	
	public $V2jojjys1eek		= '';

	
	public $Vuzhrsuxo2ch = 0644;

	
	public $Vwdx20iqhcut		= 'imagecreatetruecolor';

	
	public $Vs1ryovvy3tf		= 'imagecopyresampled';

	
	public $V11dpqpkcbtz		= array();

	
	protected $Vu30hj2quac1	= FALSE;

	
	public $V0njsqrxbq2l	= FALSE;

	
	public function __construct($V5rypn5zkbva = array())
	{
		if (count($V5rypn5zkbva) > 0)
		{
			$this->initialize($V5rypn5zkbva);
		}

		log_message('info', 'Image Lib Class Initialized');
	}

	

	
	public function clear()
	{
		$V5rypn5zkbva = array('thumb_marker', 'library_path', 'source_image', 'new_image', 'width', 'height', 'rotation_angle', 'x_axis', 'y_axis', 'wm_text', 'wm_overlay_path', 'wm_font_path', 'wm_shadow_color', 'source_folder', 'dest_folder', 'mime_type', 'orig_width', 'orig_height', 'image_type', 'size_str', 'full_src_path', 'full_dst_path');

		foreach ($V5rypn5zkbva as $Va4zo0rltynr)
		{
			$this->$Va4zo0rltynr = '';
		}

		$this->image_library 		= 'gd2';
		$this->dynamic_output 		= FALSE;
		$this->quality 				= 90;
		$this->create_thumb 		= FALSE;
		$this->thumb_marker 		= '_thumb';
		$this->maintain_ratio 		= TRUE;
		$this->master_dim 			= 'auto';
		$this->wm_type 				= 'text';
		$this->wm_x_transp 			= 4;
		$this->wm_y_transp 			= 4;
		$this->wm_font_size 		= 17;
		$this->wm_vrt_alignment 	= 'B';
		$this->wm_hor_alignment 	= 'C';
		$this->wm_padding 			= 0;
		$this->wm_hor_offset 		= 0;
		$this->wm_vrt_offset 		= 0;
		$this->wm_font_color		= '#ffffff';
		$this->wm_shadow_distance 	= 2;
		$this->wm_opacity 			= 50;
		$this->create_fnc 			= 'imagecreatetruecolor';
		$this->copy_fnc 			= 'imagecopyresampled';
		$this->error_msg 			= array();
		$this->wm_use_drop_shadow 	= FALSE;
		$this->wm_use_truetype 		= FALSE;
	}

	

	
	public function initialize($V5rypn5zkbva = array())
	{
		
		if (count($V5rypn5zkbva) > 0)
		{
			foreach ($V5rypn5zkbva as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (property_exists($this, $V2xim30qek4u))
				{
					if (in_array($V2xim30qek4u, array('wm_font_color', 'wm_shadow_color')))
					{
						if (preg_match('/^#?([0-9a-f]{3}|[0-9a-f]{6})$/i', $Va4zo0rltynr, $Vmbknpbfqa1s))
						{
							
							$Va4zo0rltynr = (strlen($Vmbknpbfqa1s[1]) === 6)
								? '#'.$Vmbknpbfqa1s[1]
								: '#'.$Vmbknpbfqa1s[1][0].$Vmbknpbfqa1s[1][0].$Vmbknpbfqa1s[1][1].$Vmbknpbfqa1s[1][1].$Vmbknpbfqa1s[1][2].$Vmbknpbfqa1s[1][2];
						}
						else
						{
							continue;
						}
					}

					$this->$V2xim30qek4u = $Va4zo0rltynr;
				}
			}
		}

		
		if ($this->source_image === '')
		{
			$this->set_error('imglib_source_image_required');
			return FALSE;
		}

		
		if ( ! function_exists('getimagesize'))
		{
			$this->set_error('imglib_gd_required_for_props');
			return FALSE;
		}

		$this->image_library = strtolower($this->image_library);

		
		if (($V5rwiyiriulv = realpath($this->source_image)) !== FALSE)
		{
			$V5rwiyiriulv = str_replace('\\', '/', $V5rwiyiriulv);
		}
		else
		{
			$V5rwiyiriulv = $this->source_image;
		}

		$V5ozzo11urso = explode('/', $V5rwiyiriulv);
		$this->source_image = end($V5ozzo11urso);
		$this->source_folder = str_replace($this->source_image, '', $V5rwiyiriulv);

		
		if ( ! $this->get_image_properties($this->source_folder.$this->source_image))
		{
			return FALSE;
		}

		
		if ($this->new_image === '')
		{
			$this->dest_image = $this->source_image;
			$this->dest_folder = $this->source_folder;
		}
		elseif (strpos($this->new_image, '/') === FALSE)
		{
			$this->dest_folder = $this->source_folder;
			$this->dest_image = $this->new_image;
		}
		else
		{
			if (strpos($this->new_image, '/') === FALSE && strpos($this->new_image, '\\') === FALSE)
			{
				$Vw412bza11x0 = str_replace('\\', '/', realpath($this->new_image));
			}
			else
			{
				$Vw412bza11x0 = $this->new_image;
			}

			
			if ( ! preg_match('#\.(jpg|jpeg|gif|png)$#i', $Vw412bza11x0))
			{
				$this->dest_folder = $Vw412bza11x0.'/';
				$this->dest_image = $this->source_image;
			}
			else
			{
				$V5ozzo11urso = explode('/', $Vw412bza11x0);
				$this->dest_image = end($V5ozzo11urso);
				$this->dest_folder = str_replace($this->dest_image, '', $Vw412bza11x0);
			}
		}

		
		if ($this->create_thumb === FALSE OR $this->thumb_marker === '')
		{
			$this->thumb_marker = '';
		}

		$V5ozzo11ursop = $this->explode_name($this->dest_image);

		$Vb13cwxhoi04 = $V5ozzo11ursop['name'];
		$Vix5xgo1jg1h = $V5ozzo11ursop['ext'];

		$this->full_src_path = $this->source_folder.$this->source_image;
		$this->full_dst_path = $this->dest_folder.$Vb13cwxhoi04.$this->thumb_marker.$Vix5xgo1jg1h;

		
		if ($this->maintain_ratio === TRUE && ($this->width !== 0 OR $this->height !== 0))
		{
			$this->image_reproportion();
		}

		
		if ($this->width === '')
		{
			$this->width = $this->orig_width;
		}

		if ($this->height === '')
		{
			$this->height = $this->orig_height;
		}

		
		$this->quality = trim(str_replace('%', '', $this->quality));

		if ($this->quality === '' OR $this->quality === 0 OR ! ctype_digit($this->quality))
		{
			$this->quality = 90;
		}

		
		is_numeric($this->x_axis) OR $this->x_axis = 0;
		is_numeric($this->y_axis) OR $this->y_axis = 0;

		
		if ($this->wm_overlay_path !== '')
		{
			$this->wm_overlay_path = str_replace('\\', '/', realpath($this->wm_overlay_path));
		}

		if ($this->wm_shadow_color !== '')
		{
			$this->wm_use_drop_shadow = TRUE;
		}
		elseif ($this->wm_use_drop_shadow === TRUE && $this->wm_shadow_color === '')
		{
			$this->wm_use_drop_shadow = FALSE;
		}

		if ($this->wm_font_path !== '')
		{
			$this->wm_use_truetype = TRUE;
		}

		return TRUE;
	}

	

	
	public function resize()
	{
		$Vibnldchwanv = ($this->image_library === 'gd2') ? 'image_process_gd' : 'image_process_'.$this->image_library;
		return $this->$Vibnldchwanv('resize');
	}

	

	
	public function crop()
	{
		$Vibnldchwanv = ($this->image_library === 'gd2') ? 'image_process_gd' : 'image_process_'.$this->image_library;
		return $this->$Vibnldchwanv('crop');
	}

	

	
	public function rotate()
	{
		
		$V1l4owmqmc5a = array(90, 180, 270, 'vrt', 'hor');

		if ($this->rotation_angle === '' OR ! in_array($this->rotation_angle, $V1l4owmqmc5a))
		{
			$this->set_error('imglib_rotation_angle_required');
			return FALSE;
		}

		
		if ($this->rotation_angle === 90 OR $this->rotation_angle === 270)
		{
			$this->width	= $this->orig_height;
			$this->height	= $this->orig_width;
		}
		else
		{
			$this->width	= $this->orig_width;
			$this->height	= $this->orig_height;
		}

		
		if ($this->image_library === 'imagemagick' OR $this->image_library === 'netpbm')
		{
			$Vibnldchwanv = 'image_process_'.$this->image_library;
			return $this->$Vibnldchwanv('rotate');
		}

		return ($this->rotation_angle === 'hor' OR $this->rotation_angle === 'vrt')
			? $this->image_mirror_gd()
			: $this->image_rotate_gd();
	}

	

	
	public function image_process_gd($Vb0dwcwa30b2 = 'resize')
	{
		$Vwpkhmvfh5hk = FALSE;

		
		
		if ($this->dynamic_output === FALSE && $this->orig_width === $this->width && $this->orig_height === $this->height)
		{
			if ($this->source_image !== $this->new_image && @copy($this->full_src_path, $this->full_dst_path))
			{
				chmod($this->full_dst_path, $this->file_permissions);
			}

			return TRUE;
		}

		
		if ($Vb0dwcwa30b2 === 'crop')
		{
			
			$this->orig_width  = $this->width;
			$this->orig_height = $this->height;

			
			if ($this->gd_version() !== FALSE)
			{
				$Vwuc1h3s02xf = str_replace('0', '', $this->gd_version());
				$Vwpkhmvfh5hk = ($Vwuc1h3s02xf == 2);
			}
		}
		else
		{
			
			$this->x_axis = 0;
			$this->y_axis = 0;
		}

		
		if ( ! ($Vjldsf50ihfl = $this->image_create_gd()))
		{
			return FALSE;
		}

		
		if ($this->image_library === 'gd2' && function_exists('imagecreatetruecolor'))
		{
			$V54p0j2zl4g5	= 'imagecreatetruecolor';
			$V3ou52dzzlct	= 'imagecopyresampled';
		}
		else
		{
			$V54p0j2zl4g5	= 'imagecreate';
			$V3ou52dzzlct	= 'imagecopyresized';
		}

		$V5qcktuxoqx4 = $V54p0j2zl4g5($this->width, $this->height);

		if ($this->image_type === 3) 
		{
			imagealphablending($V5qcktuxoqx4, FALSE);
			imagesavealpha($V5qcktuxoqx4, TRUE);
		}

		$V3ou52dzzlct($V5qcktuxoqx4, $Vjldsf50ihfl, 0, 0, $this->x_axis, $this->y_axis, $this->width, $this->height, $this->orig_width, $this->orig_height);

		
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($V5qcktuxoqx4);
		}
		elseif ( ! $this->image_save_gd($V5qcktuxoqx4)) 
		{
			return FALSE;
		}

		
		imagedestroy($V5qcktuxoqx4);
		imagedestroy($Vjldsf50ihfl);

		chmod($this->full_dst_path, $this->file_permissions);

		return TRUE;
	}

	

	
	public function image_process_imagemagick($Vb0dwcwa30b2 = 'resize')
	{
		
		if ($this->library_path === '')
		{
			$this->set_error('imglib_libpath_invalid');
			return FALSE;
		}

		if ( ! preg_match('/convert$/i', $this->library_path))
		{
			$this->library_path = rtrim($this->library_path, '/').'/convert';
		}

		
		$V0uvplnbjqq0 = $this->library_path.' -quality '.$this->quality;

		if ($Vb0dwcwa30b2 === 'crop')
		{
			$V0uvplnbjqq0 .= ' -crop '.$this->width.'x'.$this->height.'+'.$this->x_axis.'+'.$this->y_axis.' "'.$this->full_src_path.'" "'.$this->full_dst_path .'" 2>&1';
		}
		elseif ($Vb0dwcwa30b2 === 'rotate')
		{
			$Vxaqoszf2h3l = ($this->rotation_angle === 'hor' OR $this->rotation_angle === 'vrt')
					? '-flop' : '-rotate '.$this->rotation_angle;

			$V0uvplnbjqq0 .= ' '.$Vxaqoszf2h3l.' "'.$this->full_src_path.'" "'.$this->full_dst_path.'" 2>&1';
		}
		else 
		{
			if($this->maintain_ratio === TRUE)
			{
				$V0uvplnbjqq0 .= ' -resize '.$this->width.'x'.$this->height.' "'.$this->full_src_path.'" "'.$this->full_dst_path.'" 2>&1';
			}
			else
			{
				$V0uvplnbjqq0 .= ' -resize '.$this->width.'x'.$this->height.'\! "'.$this->full_src_path.'" "'.$this->full_dst_path.'" 2>&1';
			}
		}

		$V1qi3fii2jjy = 1;
		
		if (function_usable('exec'))
		{
			@exec($V0uvplnbjqq0, $Vzxix2pqoztx, $V1qi3fii2jjy);
		}

		
		if ($V1qi3fii2jjy > 0)
		{
			$this->set_error('imglib_image_process_failed');
			return FALSE;
		}

		chmod($this->full_dst_path, $this->file_permissions);

		return TRUE;
	}

	

	
	public function image_process_netpbm($Vb0dwcwa30b2 = 'resize')
	{
		if ($this->library_path === '')
		{
			$this->set_error('imglib_libpath_invalid');
			return FALSE;
		}

		
		switch ($this->image_type)
		{
			case 1 :
				$V0uvplnbjqq0_in		= 'giftopnm';
				$V0uvplnbjqq0_out	= 'ppmtogif';
				break;
			case 2 :
				$V0uvplnbjqq0_in		= 'jpegtopnm';
				$V0uvplnbjqq0_out	= 'ppmtojpeg';
				break;
			case 3 :
				$V0uvplnbjqq0_in		= 'pngtopnm';
				$V0uvplnbjqq0_out	= 'ppmtopng';
				break;
		}

		if ($Vb0dwcwa30b2 === 'crop')
		{
			$V0uvplnbjqq0_inner = 'pnmcut -left '.$this->x_axis.' -top '.$this->y_axis.' -width '.$this->width.' -height '.$this->height;
		}
		elseif ($Vb0dwcwa30b2 === 'rotate')
		{
			switch ($this->rotation_angle)
			{
				case 90:	$Vxaqoszf2h3l = 'r270';
					break;
				case 180:	$Vxaqoszf2h3l = 'r180';
					break;
				case 270:	$Vxaqoszf2h3l = 'r90';
					break;
				case 'vrt':	$Vxaqoszf2h3l = 'tb';
					break;
				case 'hor':	$Vxaqoszf2h3l = 'lr';
					break;
			}

			$V0uvplnbjqq0_inner = 'pnmflip -'.$Vxaqoszf2h3l.' ';
		}
		else 
		{
			$V0uvplnbjqq0_inner = 'pnmscale -xysize '.$this->width.' '.$this->height;
		}

		$V0uvplnbjqq0 = $this->library_path.$V0uvplnbjqq0_in.' '.$this->full_src_path.' | '.$V0uvplnbjqq0_inner.' | '.$V0uvplnbjqq0_out.' > '.$this->dest_folder.'netpbm.tmp';

		$V1qi3fii2jjy = 1;
		
		if (function_usable('exec'))
		{
			@exec($V0uvplnbjqq0, $Vzxix2pqoztx, $V1qi3fii2jjy);
		}

		
		if ($V1qi3fii2jjy > 0)
		{
			$this->set_error('imglib_image_process_failed');
			return FALSE;
		}

		
		
		
		copy($this->dest_folder.'netpbm.tmp', $this->full_dst_path);
		unlink($this->dest_folder.'netpbm.tmp');
		chmod($this->full_dst_path, $this->file_permissions);

		return TRUE;
	}

	

	
	public function image_rotate_gd()
	{
		
		if ( ! ($Vjldsf50ihfl = $this->image_create_gd()))
		{
			return FALSE;
		}

		
		
		
		

		$Vxudvgdh1l10 = imagecolorallocate($Vjldsf50ihfl, 255, 255, 255);

		
		$V5qcktuxoqx4 = imagerotate($Vjldsf50ihfl, $this->rotation_angle, $Vxudvgdh1l10);

		
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($V5qcktuxoqx4);
		}
		elseif ( ! $this->image_save_gd($V5qcktuxoqx4)) 
		{
			return FALSE;
		}

		
		imagedestroy($V5qcktuxoqx4);
		imagedestroy($Vjldsf50ihfl);

		chmod($this->full_dst_path, $this->file_permissions);

		return TRUE;
	}

	

	
	public function image_mirror_gd()
	{
		if ( ! $Vjldsf50ihfl = $this->image_create_gd())
		{
			return FALSE;
		}

		$Vsafw0khxdxk  = $this->orig_width;
		$Vpa5gd3d5pqp = $this->orig_height;

		if ($this->rotation_angle === 'hor')
		{
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vpa5gd3d5pqp; $Vep0df0xosaw++)
			{
				$Vqfdutxlofpl = 0;
				$V3kdwretkro0 = $Vsafw0khxdxk - 1;

				while ($Vqfdutxlofpl < $V3kdwretkro0)
				{
					$Vk3t0mjklisa = imagecolorat($Vjldsf50ihfl, $Vqfdutxlofpl, $Vep0df0xosaw);
					$Vmurzy5sldms = imagecolorat($Vjldsf50ihfl, $V3kdwretkro0, $Vep0df0xosaw);

					imagesetpixel($Vjldsf50ihfl, $Vqfdutxlofpl, $Vep0df0xosaw, $Vmurzy5sldms);
					imagesetpixel($Vjldsf50ihfl, $V3kdwretkro0, $Vep0df0xosaw, $Vk3t0mjklisa);

					$Vqfdutxlofpl++;
					$V3kdwretkro0--;
				}
			}
		}
		else
		{
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vsafw0khxdxk; $Vep0df0xosaw++)
			{
				$Vh4vcu3vp5xc = 0;
				$Veme0zomcxhm = $Vpa5gd3d5pqp - 1;

				while ($Vh4vcu3vp5xc < $Veme0zomcxhm)
				{
					$V2ax2xl5z00j = imagecolorat($Vjldsf50ihfl, $Vep0df0xosaw, $Vh4vcu3vp5xc);
					$V2qsu5lpkr3r = imagecolorat($Vjldsf50ihfl, $Vep0df0xosaw, $Veme0zomcxhm);

					imagesetpixel($Vjldsf50ihfl, $Vep0df0xosaw, $Vh4vcu3vp5xc, $V2qsu5lpkr3r);
					imagesetpixel($Vjldsf50ihfl, $Vep0df0xosaw, $Veme0zomcxhm, $V2ax2xl5z00j);

					$Vh4vcu3vp5xc++;
					$Veme0zomcxhm--;
				}
			}
		}

		
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($Vjldsf50ihfl);
		}
		elseif ( ! $this->image_save_gd($Vjldsf50ihfl)) 
		{
			return FALSE;
		}

		
		imagedestroy($Vjldsf50ihfl);

		chmod($this->full_dst_path, $this->file_permissions);

		return TRUE;
	}

	

	
	public function watermark()
	{
		return ($this->wm_type === 'overlay') ? $this->overlay_watermark() : $this->text_watermark();
	}

	

	
	public function overlay_watermark()
	{
		if ( ! function_exists('imagecolortransparent'))
		{
			$this->set_error('imglib_gd_required');
			return FALSE;
		}

		
		$this->get_image_properties();

		
		$V5rypn5zkbva		= $this->get_image_properties($this->wm_overlay_path, TRUE);
		$Vnkudu4dtem3	= $V5rypn5zkbva['image_type'];
		$Vmmvjob4ypey	= $V5rypn5zkbva['width'];
		$Vwylqelcoatm	= $V5rypn5zkbva['height'];

		
		$Vhyzjb5lstzq  = $this->image_create_gd($this->wm_overlay_path, $Vnkudu4dtem3);
		$Vjldsf50ihfl = $this->image_create_gd($this->full_src_path);

		
		
		
		
		
		

		$this->wm_vrt_alignment = strtoupper($this->wm_vrt_alignment[0]);
		$this->wm_hor_alignment = strtoupper($this->wm_hor_alignment[0]);

		if ($this->wm_vrt_alignment === 'B')
			$this->wm_vrt_offset = $this->wm_vrt_offset * -1;

		if ($this->wm_hor_alignment === 'R')
			$this->wm_hor_offset = $this->wm_hor_offset * -1;

		
		$V4b1k5n5isa5 = $this->wm_hor_offset + $this->wm_padding;
		$V3atavcyahb1 = $this->wm_vrt_offset + $this->wm_padding;

		
		if ($this->wm_vrt_alignment === 'M')
		{
			$V3atavcyahb1 += ($this->orig_height / 2) - ($Vwylqelcoatm / 2);
		}
		elseif ($this->wm_vrt_alignment === 'B')
		{
			$V3atavcyahb1 += $this->orig_height - $Vwylqelcoatm;
		}

		
		if ($this->wm_hor_alignment === 'C')
		{
			$V4b1k5n5isa5 += ($this->orig_width / 2) - ($Vmmvjob4ypey / 2);
		}
		elseif ($this->wm_hor_alignment === 'R')
		{
			$V4b1k5n5isa5 += $this->orig_width - $Vmmvjob4ypey;
		}

		
		if ($Vnkudu4dtem3 === 3 && function_exists('imagealphablending'))
		{
			@imagealphablending($Vjldsf50ihfl, TRUE);
		}

		
		$Vzmvgvlt0jvy = imagecolorat($Vhyzjb5lstzq, $this->wm_x_transp, $this->wm_y_transp);
		$V1vxid1jtgzj = ($Vzmvgvlt0jvy & 0x7F000000) >> 24;

		
		if ($V1vxid1jtgzj > 0)
		{
			
			imagecopy($Vjldsf50ihfl, $Vhyzjb5lstzq, $V4b1k5n5isa5, $V3atavcyahb1, 0, 0, $Vmmvjob4ypey, $Vwylqelcoatm);
		}
		else
		{
			
			imagecolortransparent($Vhyzjb5lstzq, imagecolorat($Vhyzjb5lstzq, $this->wm_x_transp, $this->wm_y_transp));
			imagecopymerge($Vjldsf50ihfl, $Vhyzjb5lstzq, $V4b1k5n5isa5, $V3atavcyahb1, 0, 0, $Vmmvjob4ypey, $Vwylqelcoatm, $this->wm_opacity);
		}

		
		if ($this->image_type === 3)
		{
			imagealphablending($Vjldsf50ihfl, FALSE);
			imagesavealpha($Vjldsf50ihfl, TRUE);
		}

		
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($Vjldsf50ihfl);
		}
		elseif ( ! $this->image_save_gd($Vjldsf50ihfl)) 
		{
			return FALSE;
		}

		imagedestroy($Vjldsf50ihfl);
		imagedestroy($Vhyzjb5lstzq);

		return TRUE;
	}

	

	
	public function text_watermark()
	{
		if ( ! ($Vjldsf50ihfl = $this->image_create_gd()))
		{
			return FALSE;
		}

		if ($this->wm_use_truetype === TRUE && ! file_exists($this->wm_font_path))
		{
			$this->set_error('imglib_missing_font');
			return FALSE;
		}

		
		$this->get_image_properties();

		
		
		
		
		
		

		if ($this->wm_vrt_alignment === 'B')
		{
			$this->wm_vrt_offset = $this->wm_vrt_offset * -1;
		}

		if ($this->wm_hor_alignment === 'R')
		{
			$this->wm_hor_offset = $this->wm_hor_offset * -1;
		}

		
		
		
		if ($this->wm_use_truetype === TRUE)
		{
			if (empty($this->wm_font_size))
			{
				$this->wm_font_size = 17;
			}

			if (function_exists('imagettfbbox'))
			{
				$V3iiokxda3xw = imagettfbbox($this->wm_font_size, 0, $this->wm_font_path, $this->wm_text);
				$V3iiokxda3xw = $V3iiokxda3xw[2] - $V3iiokxda3xw[0];

				$Vvo5gi151fwe = $V3iiokxda3xw / strlen($this->wm_text);
			}
			else
			{
				$Vvo5gi151fwe = $this->wm_font_size - ($this->wm_font_size / 4);
			}

			$V1pcliwvozt0 = $this->wm_font_size;
			$this->wm_vrt_offset += $this->wm_font_size;
		}
		else
		{
			$Vvo5gi151fwe  = imagefontwidth($this->wm_font_size);
			$V1pcliwvozt0 = imagefontheight($this->wm_font_size);
		}

		
		$V4b1k5n5isa5 = $this->wm_hor_offset + $this->wm_padding;
		$V3atavcyahb1 = $this->wm_vrt_offset + $this->wm_padding;

		if ($this->wm_use_drop_shadow === FALSE)
		{
			$this->wm_shadow_distance = 0;
		}

		$this->wm_vrt_alignment = strtoupper($this->wm_vrt_alignment[0]);
		$this->wm_hor_alignment = strtoupper($this->wm_hor_alignment[0]);

		
		if ($this->wm_vrt_alignment === 'M')
		{
			$V3atavcyahb1 += ($this->orig_height / 2) + ($V1pcliwvozt0 / 2);
		}
		elseif ($this->wm_vrt_alignment === 'B')
		{
			$V3atavcyahb1 += $this->orig_height - $V1pcliwvozt0 - $this->wm_shadow_distance - ($V1pcliwvozt0 / 2);
		}

		
		if ($this->wm_hor_alignment === 'R')
		{
			$V4b1k5n5isa5 += $this->orig_width - ($Vvo5gi151fwe * strlen($this->wm_text)) - $this->wm_shadow_distance;
		}
		elseif ($this->wm_hor_alignment === 'C')
		{
			$V4b1k5n5isa5 += floor(($this->orig_width - ($Vvo5gi151fwe * strlen($this->wm_text))) / 2);
		}

		if ($this->wm_use_drop_shadow)
		{
			
			$V5ozzo11urso_shad = $V4b1k5n5isa5 + $this->wm_shadow_distance;
			$Vif3lpjsvfln = $V3atavcyahb1 + $this->wm_shadow_distance;

			
			$Vopm0ubdki24 = str_split(substr($this->wm_shadow_color, 1, 6), 2);
			$Vopm0ubdki24 = imagecolorclosest($Vjldsf50ihfl, hexdec($Vopm0ubdki24[0]), hexdec($Vopm0ubdki24[1]), hexdec($Vopm0ubdki24[2]));

			
			if ($this->wm_use_truetype)
			{
				imagettftext($Vjldsf50ihfl, $this->wm_font_size, 0, $V5ozzo11urso_shad, $Vif3lpjsvfln, $Vopm0ubdki24, $this->wm_font_path, $this->wm_text);
			}
			else
			{
				imagestring($Vjldsf50ihfl, $this->wm_font_size, $V5ozzo11urso_shad, $Vif3lpjsvfln, $this->wm_text, $Vopm0ubdki24);
			}
		}

		
		$Vrel4mwl34cn = str_split(substr($this->wm_font_color, 1, 6), 2);
		$Vrel4mwl34cn = imagecolorclosest($Vjldsf50ihfl, hexdec($Vrel4mwl34cn[0]), hexdec($Vrel4mwl34cn[1]), hexdec($Vrel4mwl34cn[2]));

		
		if ($this->wm_use_truetype)
		{
			imagettftext($Vjldsf50ihfl, $this->wm_font_size, 0, $V4b1k5n5isa5, $V3atavcyahb1, $Vrel4mwl34cn, $this->wm_font_path, $this->wm_text);
		}
		else
		{
			imagestring($Vjldsf50ihfl, $this->wm_font_size, $V4b1k5n5isa5, $V3atavcyahb1, $this->wm_text, $Vrel4mwl34cn);
		}

		
		if ($this->image_type === 3)
		{
			imagealphablending($Vjldsf50ihfl, FALSE);
			imagesavealpha($Vjldsf50ihfl, TRUE);
		}

		
		if ($this->dynamic_output === TRUE)
		{
			$this->image_display_gd($Vjldsf50ihfl);
		}
		else
		{
			$this->image_save_gd($Vjldsf50ihfl);
		}

		imagedestroy($Vjldsf50ihfl);

		return TRUE;
	}

	

	
	public function image_create_gd($Vcmaitbcbmmk = '', $Vyjydpsgslf5 = '')
	{
		if ($Vcmaitbcbmmk === '')
		{
			$Vcmaitbcbmmk = $this->full_src_path;
		}

		if ($Vyjydpsgslf5 === '')
		{
			$Vyjydpsgslf5 = $this->image_type;
		}

		switch ($Vyjydpsgslf5)
		{
			case 1:
				if ( ! function_exists('imagecreatefromgif'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_gif_not_supported'));
					return FALSE;
				}

				return imagecreatefromgif($Vcmaitbcbmmk);
			case 2:
				if ( ! function_exists('imagecreatefromjpeg'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_jpg_not_supported'));
					return FALSE;
				}

				return imagecreatefromjpeg($Vcmaitbcbmmk);
			case 3:
				if ( ! function_exists('imagecreatefrompng'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_png_not_supported'));
					return FALSE;
				}

				return imagecreatefrompng($Vcmaitbcbmmk);
			default:
				$this->set_error(array('imglib_unsupported_imagecreate'));
				return FALSE;
		}
	}

	

	
	public function image_save_gd($Vmwq5vdnzef0)
	{
		switch ($this->image_type)
		{
			case 1:
				if ( ! function_exists('imagegif'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_gif_not_supported'));
					return FALSE;
				}

				if ( ! @imagegif($Vmwq5vdnzef0, $this->full_dst_path))
				{
					$this->set_error('imglib_save_failed');
					return FALSE;
				}
			break;
			case 2:
				if ( ! function_exists('imagejpeg'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_jpg_not_supported'));
					return FALSE;
				}

				if ( ! @imagejpeg($Vmwq5vdnzef0, $this->full_dst_path, $this->quality))
				{
					$this->set_error('imglib_save_failed');
					return FALSE;
				}
			break;
			case 3:
				if ( ! function_exists('imagepng'))
				{
					$this->set_error(array('imglib_unsupported_imagecreate', 'imglib_png_not_supported'));
					return FALSE;
				}

				if ( ! @imagepng($Vmwq5vdnzef0, $this->full_dst_path))
				{
					$this->set_error('imglib_save_failed');
					return FALSE;
				}
			break;
			default:
				$this->set_error(array('imglib_unsupported_imagecreate'));
				return FALSE;
			break;
		}

		return TRUE;
	}

	

	
	public function image_display_gd($Vmwq5vdnzef0)
	{
		header('Content-Disposition: filename='.$this->source_image.';');
		header('Content-Type: '.$this->mime_type);
		header('Content-Transfer-Encoding: binary');
		header('Last-Modified: '.gmdate('D, d M Y H:i:s', time()).' GMT');

		switch ($this->image_type)
		{
			case 1	:	imagegif($Vmwq5vdnzef0);
				break;
			case 2	:	imagejpeg($Vmwq5vdnzef0, NULL, $this->quality);
				break;
			case 3	:	imagepng($Vmwq5vdnzef0);
				break;
			default:	echo 'Unable to display the image';
				break;
		}
	}

	

	
	public function image_reproportion()
	{
		if (($this->width === 0 && $this->height === 0) OR $this->orig_width === 0 OR $this->orig_height === 0
			OR ( ! ctype_digit((string) $this->width) && ! ctype_digit((string) $this->height))
			OR ! ctype_digit((string) $this->orig_width) OR ! ctype_digit((string) $this->orig_height))
		{
			return;
		}

		
		$this->width = (int) $this->width;
		$this->height = (int) $this->height;

		if ($this->master_dim !== 'width' && $this->master_dim !== 'height')
		{
			if ($this->width > 0 && $this->height > 0)
			{
				$this->master_dim = ((($this->orig_height/$this->orig_width) - ($this->height/$this->width)) < 0)
							? 'width' : 'height';
			}
			else
			{
				$this->master_dim = ($this->height === 0) ? 'width' : 'height';
			}
		}
		elseif (($this->master_dim === 'width' && $this->width === 0)
			OR ($this->master_dim === 'height' && $this->height === 0))
		{
			return;
		}

		if ($this->master_dim === 'width')
		{
			$this->height = (int) ceil($this->width*$this->orig_height/$this->orig_width);
		}
		else
		{
			$this->width = (int) ceil($this->orig_width*$this->height/$this->orig_height);
		}
	}

	

	
	public function get_image_properties($Vcmaitbcbmmk = '', $Vb5hjbk2mbwk = FALSE)
	{
		
		

		if ($Vcmaitbcbmmk === '')
		{
			$Vcmaitbcbmmk = $this->full_src_path;
		}

		if ( ! file_exists($Vcmaitbcbmmk))
		{
			$this->set_error('imglib_invalid_path');
			return FALSE;
		}

		$Va4zo0rltynrs = getimagesize($Vcmaitbcbmmk);
		$V5s2s1qvve0f = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');
		$Vf4dlektv1ba = (isset($V5s2s1qvve0f[$Va4zo0rltynrs[2]])) ? 'image/'.$V5s2s1qvve0f[$Va4zo0rltynrs[2]] : 'image/jpg';

		if ($Vb5hjbk2mbwk === TRUE)
		{
			return array(
					'width' =>	$Va4zo0rltynrs[0],
					'height' =>	$Va4zo0rltynrs[1],
					'image_type' =>	$Va4zo0rltynrs[2],
					'size_str' =>	$Va4zo0rltynrs[3],
					'mime_type' =>	$Vf4dlektv1ba
				);
		}

		$this->orig_width	= $Va4zo0rltynrs[0];
		$this->orig_height	= $Va4zo0rltynrs[1];
		$this->image_type	= $Va4zo0rltynrs[2];
		$this->size_str		= $Va4zo0rltynrs[3];
		$this->mime_type	= $Vf4dlektv1ba;

		return TRUE;
	}

	

	
	public function size_calculator($Va4zo0rltynrs)
	{
		if ( ! is_array($Va4zo0rltynrs))
		{
			return;
		}

		$Vzon2pwinhp2 = array('new_width', 'new_height', 'width', 'height');

		foreach ($Vzon2pwinhp2 as $Vep0df0xosawtem)
		{
			if (empty($Va4zo0rltynrs[$Vep0df0xosawtem]))
			{
				$Va4zo0rltynrs[$Vep0df0xosawtem] = 0;
			}
		}

		if ($Va4zo0rltynrs['width'] === 0 OR $Va4zo0rltynrs['height'] === 0)
		{
			return $Va4zo0rltynrs;
		}

		if ($Va4zo0rltynrs['new_width'] === 0)
		{
			$Va4zo0rltynrs['new_width'] = ceil($Va4zo0rltynrs['width']*$Va4zo0rltynrs['new_height']/$Va4zo0rltynrs['height']);
		}
		elseif ($Va4zo0rltynrs['new_height'] === 0)
		{
			$Va4zo0rltynrs['new_height'] = ceil($Va4zo0rltynrs['new_width']*$Va4zo0rltynrs['height']/$Va4zo0rltynrs['width']);
		}

		return $Va4zo0rltynrs;
	}

	

	
	public function explode_name($V4s1rzsxzdb4)
	{
		$Vifxhafjqvbp = strrchr($V4s1rzsxzdb4, '.');
		$Vaclaigdbtoo = ($Vifxhafjqvbp === FALSE) ? $V4s1rzsxzdb4 : substr($V4s1rzsxzdb4, 0, -strlen($Vifxhafjqvbp));

		return array('ext' => $Vifxhafjqvbp, 'name' => $Vaclaigdbtoo);
	}

	

	
	public function gd_loaded()
	{
		if ( ! extension_loaded('gd'))
		{
			
			return (function_exists('dl') && @dl('gd.so'));
		}

		return TRUE;
	}

	

	
	public function gd_version()
	{
		if (function_exists('gd_info'))
		{
			$Vwuc1h3s02xf = @gd_info();
			return preg_replace('/\D/', '', $Vwuc1h3s02xf['GD Version']);
		}

		return FALSE;
	}

	

	
	public function set_error($Vv3gvm3x3hvm)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->lang->load('imglib');

		if (is_array($Vv3gvm3x3hvm))
		{
			foreach ($Vv3gvm3x3hvm as $Va4zo0rltynr)
			{
				$Vv3gvm3x3hvm = ($Vgw3d0qe3dgd->lang->line($Va4zo0rltynr) === FALSE) ? $Va4zo0rltynr : $Vgw3d0qe3dgd->lang->line($Va4zo0rltynr);
				$this->error_msg[] = $Vv3gvm3x3hvm;
				log_message('error', $Vv3gvm3x3hvm);
			}
		}
		else
		{
			$Vv3gvm3x3hvm = ($Vgw3d0qe3dgd->lang->line($Vv3gvm3x3hvm) === FALSE) ? $Vv3gvm3x3hvm : $Vgw3d0qe3dgd->lang->line($Vv3gvm3x3hvm);
			$this->error_msg[] = $Vv3gvm3x3hvm;
			log_message('error', $Vv3gvm3x3hvm);
		}
	}

	

	
	public function display_errors($Vtgs3loifva1 = '<p>', $Vk3t0mjklisaose = '</p>')
	{
		return (count($this->error_msg) > 0) ? $Vtgs3loifva1.implode($Vk3t0mjklisaose.$Vtgs3loifva1, $this->error_msg).$Vk3t0mjklisaose : '';
	}

}
