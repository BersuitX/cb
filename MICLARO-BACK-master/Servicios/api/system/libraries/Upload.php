<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Upload {

	
	public $Vgf11gqkhjno = 0;

	
	public $Vmu4upk5wzlh = 0;

	
	public $Vh4riq5gi3fv = 0;

	
	public $Vj2moixbx5pq = 0;

	
	public $Vbayfrggzsfe = 0;

	
	public $Vyftyvck3ujb = 0;

	
	public $Vyftyvck3ujb_increment = 100;

	
	public $Vhetshtsw21p = '';

	
	public $Vglzpdycu4yx = '';

	
	public $Vvld3p0ipwno = '';

	
	public $Vmij00r4nico = '';

	
	public $Vxn2vo41sbom = '';

	
	public $Vynhgql1s5em = NULL;

	
	public $Vix5xgo1jg1h = '';

	
	public $Vix5xgo1jg1h_tolower = FALSE;

	
	public $Vpma4vsyn4zz = '';

	
	public $Vttnkx42as1g = FALSE;

	
	public $Vl1rd3j4ad0a = FALSE;

	
	public $Vffcvptc3gee = FALSE;

	
	public $Vewmdbfd1d2s = NULL;

	
	public $Vawbomata0gd = NULL;

	
	public $Vyjydpsgslf5 = '';

	
	public $Vjigrdb2jykr = '';

	
	public $V11dpqpkcbtz = array();

	
	public $Viniecvojnz1 = TRUE;

	
	public $Vdoy33krja4k = TRUE;

	
	public $Vgzlesc0sebt = FALSE;

	
	public $Vqm1j2k41spg = TRUE;

	
	public $Vzufq4stzvmg = 'temp_file_';

	
	public $V4ewew5y4igp = '';

	

	
	protected $Vzmi3uauuq1d = '';

	
	protected $Vylhpfeahhws = array();

	
	protected $Vt3dizb1blif;

	

	
	public function __construct($Vnmcm15juye5 = array())
	{
		empty($Vnmcm15juye5) OR $this->initialize($Vnmcm15juye5, FALSE);

		$this->_mimes =& get_mimes();
		$this->_CI =& get_instance();

		log_message('info', 'Upload Class Initialized');
	}

	

	
	public function initialize(array $Vnmcm15juye5 = array(), $Vnb0ac0fxcgz = TRUE)
	{
		$Vdwfdlvtezms = new ReflectionClass($this);

		if ($Vnb0ac0fxcgz === TRUE)
		{
			$Vpoj1s2hpsj1 = $Vdwfdlvtezms->getDefaultProperties();
			foreach (array_keys($Vpoj1s2hpsj1) as $V2xim30qek4u)
			{
				if ($V2xim30qek4u[0] === '_')
				{
					continue;
				}

				if (isset($Vnmcm15juye5[$V2xim30qek4u]))
				{
					if ($Vdwfdlvtezms->hasMethod('set_'.$V2xim30qek4u))
					{
						$this->{'set_'.$V2xim30qek4u}($Vnmcm15juye5[$V2xim30qek4u]);
					}
					else
					{
						$this->$V2xim30qek4u = $Vnmcm15juye5[$V2xim30qek4u];
					}
				}
				else
				{
					$this->$V2xim30qek4u = $Vpoj1s2hpsj1[$V2xim30qek4u];
				}
			}
		}
		else
		{
			foreach ($Vnmcm15juye5 as $V2xim30qek4u => &$Vcnwqsowvhom)
			{
				if ($V2xim30qek4u[0] !== '_' && $Vdwfdlvtezms->hasProperty($V2xim30qek4u))
				{
					if ($Vdwfdlvtezms->hasMethod('set_'.$V2xim30qek4u))
					{
						$this->{'set_'.$V2xim30qek4u}($Vcnwqsowvhom);
					}
					else
					{
						$this->$V2xim30qek4u = $Vcnwqsowvhom;
					}
				}
			}
		}

		
		
		$this->_file_name_override = $this->file_name;
		return $this;
	}

	

	
	public function do_upload($Vwji4rxkyw5j = 'userfile')
	{
		
		if (isset($_FILES[$Vwji4rxkyw5j]))
		{
			$V2gaowxqa2tw = $_FILES[$Vwji4rxkyw5j];
		}
		
		elseif (($Vn2ycfau434s = preg_match_all('/(?:^[^\[]+)|\[[^]]*\]/', $Vwji4rxkyw5j, $Vmbknpbfqa1s)) > 1)
		{
			$V2gaowxqa2tw = $_FILES;
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				
				if (($Vwji4rxkyw5j = trim($Vmbknpbfqa1s[0][$Vep0df0xosaw], '[]')) === '' OR ! isset($V2gaowxqa2tw[$Vwji4rxkyw5j]))
				{
					$V2gaowxqa2tw = NULL;
					break;
				}

				$V2gaowxqa2tw = $V2gaowxqa2tw[$Vwji4rxkyw5j];
			}
		}

		if ( ! isset($V2gaowxqa2tw))
		{
			$this->set_error('upload_no_file_selected', 'debug');
			return FALSE;
		}

		
		if ( ! $this->validate_upload_path())
		{
			
			return FALSE;
		}

		
		if ( ! is_uploaded_file($V2gaowxqa2tw['tmp_name']))
		{
			$Veqekzxyjyqy = isset($V2gaowxqa2tw['error']) ? $V2gaowxqa2tw['error'] : 4;

			switch ($Veqekzxyjyqy)
			{
				case UPLOAD_ERR_INI_SIZE:
					$this->set_error('upload_file_exceeds_limit', 'info');
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$this->set_error('upload_file_exceeds_form_limit', 'info');
					break;
				case UPLOAD_ERR_PARTIAL:
					$this->set_error('upload_file_partial', 'debug');
					break;
				case UPLOAD_ERR_NO_FILE:
					$this->set_error('upload_no_file_selected', 'debug');
					break;
				case UPLOAD_ERR_NO_TMP_DIR:
					$this->set_error('upload_no_temp_directory', 'error');
					break;
				case UPLOAD_ERR_CANT_WRITE:
					$this->set_error('upload_unable_to_write_file', 'error');
					break;
				case UPLOAD_ERR_EXTENSION:
					$this->set_error('upload_stopped_by_extension', 'debug');
					break;
				default:
					$this->set_error('upload_no_file_selected', 'debug');
					break;
			}

			return FALSE;
		}

		
		$this->file_temp = $V2gaowxqa2tw['tmp_name'];
		$this->file_size = $V2gaowxqa2tw['size'];

		
		if ($this->detect_mime !== FALSE)
		{
			$this->_file_mime_type($V2gaowxqa2tw);
		}

		$this->file_type = preg_replace('/^(.+?);.*$/', '\\1', $this->file_type);
		$this->file_type = strtolower(trim(stripslashes($this->file_type), '"'));
		$this->file_name = $this->_prep_filename($V2gaowxqa2tw['name']);
		$this->file_ext	 = $this->get_extension($this->file_name);
		$this->client_name = $this->file_name;

		
		if ( ! $this->is_allowed_filetype())
		{
			$this->set_error('upload_invalid_filetype', 'debug');
			return FALSE;
		}

		
		if ($this->_file_name_override !== '')
		{
			$this->file_name = $this->_prep_filename($this->_file_name_override);

			
			if (strpos($this->_file_name_override, '.') === FALSE)
			{
				$this->file_name .= $this->file_ext;
			}
			else
			{
				
				$this->file_ext	= $this->get_extension($this->_file_name_override);
			}

			if ( ! $this->is_allowed_filetype(TRUE))
			{
				$this->set_error('upload_invalid_filetype', 'debug');
				return FALSE;
			}
		}

		
		if ($this->file_size > 0)
		{
			$this->file_size = round($this->file_size/1024, 2);
		}

		
		if ( ! $this->is_allowed_filesize())
		{
			$this->set_error('upload_invalid_filesize', 'info');
			return FALSE;
		}

		
		
		if ( ! $this->is_allowed_dimensions())
		{
			$this->set_error('upload_invalid_dimensions', 'info');
			return FALSE;
		}

		
		$this->file_name = $this->_CI->security->sanitize_filename($this->file_name);

		
		if ($this->max_filename > 0)
		{
			$this->file_name = $this->limit_filename_length($this->file_name, $this->max_filename);
		}

		
		if ($this->remove_spaces === TRUE)
		{
			$this->file_name = preg_replace('/\s+/', '_', $this->file_name);
		}

		if ($this->file_ext_tolower && ($Vjza0zv1bs0y = strlen($this->file_ext)))
		{
			
			$this->file_name = substr($this->file_name, 0, -$Vjza0zv1bs0y).$this->file_ext;
		}

		
		$this->orig_name = $this->file_name;
		if (FALSE === ($this->file_name = $this->set_filename($this->upload_path, $this->file_name)))
		{
			return FALSE;
		}

		
		if ($this->xss_clean && $this->do_xss_clean() === FALSE)
		{
			$this->set_error('upload_unable_to_write_file', 'error');
			return FALSE;
		}

		
		if ( ! @copy($this->file_temp, $this->upload_path.$this->file_name))
		{
			if ( ! @move_uploaded_file($this->file_temp, $this->upload_path.$this->file_name))
			{
				$this->set_error('upload_destination_error', 'error');
				return FALSE;
			}
		}

		
		$this->set_image_properties($this->upload_path.$this->file_name);

		return TRUE;
	}

	

	
	public function data($Vep0df0xosawndex = NULL)
	{
		$Vfeinw1hsfej = array(
				'file_name'		=> $this->file_name,
				'file_type'		=> $this->file_type,
				'file_path'		=> $this->upload_path,
				'full_path'		=> $this->upload_path.$this->file_name,
				'raw_name'		=> str_replace($this->file_ext, '', $this->file_name),
				'orig_name'		=> $this->orig_name,
				'client_name'		=> $this->client_name,
				'file_ext'		=> $this->file_ext,
				'file_size'		=> $this->file_size,
				'is_image'		=> $this->is_image(),
				'image_width'		=> $this->image_width,
				'image_height'		=> $this->image_height,
				'image_type'		=> $this->image_type,
				'image_size_str'	=> $this->image_size_str,
			);

		if ( ! empty($Vep0df0xosawndex))
		{
			return isset($Vfeinw1hsfej[$Vep0df0xosawndex]) ? $Vfeinw1hsfej[$Vep0df0xosawndex] : NULL;
		}

		return $Vfeinw1hsfej;
	}

	

	
	public function set_upload_path($Vcmaitbcbmmk)
	{
		
		$this->upload_path = rtrim($Vcmaitbcbmmk, '/').'/';
		return $this;
	}

	

	
	public function set_filename($Vcmaitbcbmmk, $Vb13cwxhoi04)
	{
		if ($this->encrypt_name === TRUE)
		{
			$Vb13cwxhoi04 = md5(uniqid(mt_rand())).$this->file_ext;
		}

		if ($this->overwrite === TRUE OR ! file_exists($Vcmaitbcbmmk.$Vb13cwxhoi04))
		{
			return $Vb13cwxhoi04;
		}

		$Vb13cwxhoi04 = str_replace($this->file_ext, '', $Vb13cwxhoi04);

		$V1ny1apkytft = '';
		for ($Vep0df0xosaw = 1; $Vep0df0xosaw < $this->max_filename_increment; $Vep0df0xosaw++)
		{
			if ( ! file_exists($Vcmaitbcbmmk.$Vb13cwxhoi04.$Vep0df0xosaw.$this->file_ext))
			{
				$V1ny1apkytft = $Vb13cwxhoi04.$Vep0df0xosaw.$this->file_ext;
				break;
			}
		}

		if ($V1ny1apkytft === '')
		{
			$this->set_error('upload_bad_filename', 'debug');
			return FALSE;
		}
		else
		{
			return $V1ny1apkytft;
		}
	}

	

	
	public function set_max_filesize($Vewkafdpowpc)
	{
		$this->max_size = ($Vewkafdpowpc < 0) ? 0 : (int) $Vewkafdpowpc;
		return $this;
	}

	

	
	protected function set_max_size($Vewkafdpowpc)
	{
		return $this->set_max_filesize($Vewkafdpowpc);
	}

	

	
	public function set_max_filename($Vewkafdpowpc)
	{
		$this->max_filename = ($Vewkafdpowpc < 0) ? 0 : (int) $Vewkafdpowpc;
		return $this;
	}

	

	
	public function set_max_width($Vewkafdpowpc)
	{
		$this->max_width = ($Vewkafdpowpc < 0) ? 0 : (int) $Vewkafdpowpc;
		return $this;
	}

	

	
	public function set_max_height($Vewkafdpowpc)
	{
		$this->max_height = ($Vewkafdpowpc < 0) ? 0 : (int) $Vewkafdpowpc;
		return $this;
	}

	

	
	public function set_min_width($Vewkafdpowpc)
	{
		$this->min_width = ($Vewkafdpowpc < 0) ? 0 : (int) $Vewkafdpowpc;
		return $this;
	}

	

	
	public function set_min_height($Vewkafdpowpc)
	{
		$this->min_height = ($Vewkafdpowpc < 0) ? 0 : (int) $Vewkafdpowpc;
		return $this;
	}

	

	
	public function set_allowed_types($V5s2s1qvve0f)
	{
		$this->allowed_types = (is_array($V5s2s1qvve0f) OR $V5s2s1qvve0f === '*')
			? $V5s2s1qvve0f
			: explode('|', $V5s2s1qvve0f);
		return $this;
	}

	

	
	public function set_image_properties($Vcmaitbcbmmk = '')
	{
		if ($this->is_image() && function_exists('getimagesize'))
		{
			if (FALSE !== ($Vaxswcbizyqk = @getimagesize($Vcmaitbcbmmk)))
			{
				$V5s2s1qvve0f = array(1 => 'gif', 2 => 'jpeg', 3 => 'png');

				$this->image_width	= $Vaxswcbizyqk[0];
				$this->image_height	= $Vaxswcbizyqk[1];
				$this->image_type	= isset($V5s2s1qvve0f[$Vaxswcbizyqk[2]]) ? $V5s2s1qvve0f[$Vaxswcbizyqk[2]] : 'unknown';
				$this->image_size_str	= $Vaxswcbizyqk[3]; 
			}
		}

		return $this;
	}

	

	
	public function set_xss_clean($Vj4pefvvndny = FALSE)
	{
		$this->xss_clean = ($Vj4pefvvndny === TRUE);
		return $this;
	}

	

	
	public function is_image()
	{
		
		

		$Vje1cposxfjt  = array('image/x-png');
		$Vxiozf0hj2oo = array('image/jpg', 'image/jpe', 'image/jpeg', 'image/pjpeg');

		if (in_array($this->file_type, $Vje1cposxfjt))
		{
			$this->file_type = 'image/png';
		}
		elseif (in_array($this->file_type, $Vxiozf0hj2oo))
		{
			$this->file_type = 'image/jpeg';
		}

		$Vep0df0xosawmg_mimes = array('image/gif',	'image/jpeg', 'image/png');

		return in_array($this->file_type, $Vep0df0xosawmg_mimes, TRUE);
	}

	

	
	public function is_allowed_filetype($Vep0df0xosawgnore_mime = FALSE)
	{
		if ($this->allowed_types === '*')
		{
			return TRUE;
		}

		if (empty($this->allowed_types) OR ! is_array($this->allowed_types))
		{
			$this->set_error('upload_no_file_types', 'debug');
			return FALSE;
		}

		$Vifxhafjqvbp = strtolower(ltrim($this->file_ext, '.'));

		if ( ! in_array($Vifxhafjqvbp, $this->allowed_types, TRUE))
		{
			return FALSE;
		}

		
		if (in_array($Vifxhafjqvbp, array('gif', 'jpg', 'jpeg', 'jpe', 'png'), TRUE) && @getimagesize($this->file_temp) === FALSE)
		{
			return FALSE;
		}

		if ($Vep0df0xosawgnore_mime === TRUE)
		{
			return TRUE;
		}

		if (isset($this->_mimes[$Vifxhafjqvbp]))
		{
			return is_array($this->_mimes[$Vifxhafjqvbp])
				? in_array($this->file_type, $this->_mimes[$Vifxhafjqvbp], TRUE)
				: ($this->_mimes[$Vifxhafjqvbp] === $this->file_type);
		}

		return FALSE;
	}

	

	
	public function is_allowed_filesize()
	{
		return ($this->max_size === 0 OR $this->max_size > $this->file_size);
	}

	

	
	public function is_allowed_dimensions()
	{
		if ( ! $this->is_image())
		{
			return TRUE;
		}

		if (function_exists('getimagesize'))
		{
			$Vaxswcbizyqk = @getimagesize($this->file_temp);

			if ($this->max_width > 0 && $Vaxswcbizyqk[0] > $this->max_width)
			{
				return FALSE;
			}

			if ($this->max_height > 0 && $Vaxswcbizyqk[1] > $this->max_height)
			{
				return FALSE;
			}

			if ($this->min_width > 0 && $Vaxswcbizyqk[0] < $this->min_width)
			{
				return FALSE;
			}

			if ($this->min_height > 0 && $Vaxswcbizyqk[1] < $this->min_height)
			{
				return FALSE;
			}
		}

		return TRUE;
	}

	

	
	public function validate_upload_path()
	{
		if ($this->upload_path === '')
		{
			$this->set_error('upload_no_filepath', 'error');
			return FALSE;
		}

		if (realpath($this->upload_path) !== FALSE)
		{
			$this->upload_path = str_replace('\\', '/', realpath($this->upload_path));
		}

		if ( ! is_dir($this->upload_path))
		{
			$this->set_error('upload_no_filepath', 'error');
			return FALSE;
		}

		if ( ! is_really_writable($this->upload_path))
		{
			$this->set_error('upload_not_writable', 'error');
			return FALSE;
		}

		$this->upload_path = preg_replace('/(.+?)\/*$/', '\\1/',  $this->upload_path);
		return TRUE;
	}

	

	
	public function get_extension($Vb13cwxhoi04)
	{
		$V5ozzo11urso = explode('.', $Vb13cwxhoi04);

		if (count($V5ozzo11urso) === 1)
		{
			return '';
		}

		$Vifxhafjqvbp = ($this->file_ext_tolower) ? strtolower(end($V5ozzo11urso)) : end($V5ozzo11urso);
		return '.'.$Vifxhafjqvbp;
	}

	

	
	public function limit_filename_length($Vb13cwxhoi04, $Vgdtiboyfq04)
	{
		if (strlen($Vb13cwxhoi04) < $Vgdtiboyfq04)
		{
			return $Vb13cwxhoi04;
		}

		$Vifxhafjqvbp = '';
		if (strpos($Vb13cwxhoi04, '.') !== FALSE)
		{
			$Vxfb02ptgyna		= explode('.', $Vb13cwxhoi04);
			$Vifxhafjqvbp		= '.'.array_pop($Vxfb02ptgyna);
			$Vb13cwxhoi04	= implode('.', $Vxfb02ptgyna);
		}

		return substr($Vb13cwxhoi04, 0, ($Vgdtiboyfq04 - strlen($Vifxhafjqvbp))).$Vifxhafjqvbp;
	}

	

	
	public function do_xss_clean()
	{
		$Vligofq0fb34 = $this->file_temp;

		if (filesize($Vligofq0fb34) == 0)
		{
			return FALSE;
		}

		if (memory_get_usage() && ($Vmo0gcpfkafx = ini_get('memory_limit')))
		{
			$Vmo0gcpfkafx *= 1024 * 1024;

			
			
			

			$Vmo0gcpfkafx = number_format(ceil(filesize($Vligofq0fb34) + $Vmo0gcpfkafx), 0, '.', '');

			ini_set('memory_limit', $Vmo0gcpfkafx); 
		}

		
		
		
		
		
		

		if (function_exists('getimagesize') && @getimagesize($Vligofq0fb34) !== FALSE)
		{
			if (($Vligofq0fb34 = @fopen($Vligofq0fb34, 'rb')) === FALSE) 
			{
				return FALSE; 
			}

			$V0ljziripe0d = fread($Vligofq0fb34, 256);
			fclose($Vligofq0fb34);

			
			
			

			
			return ! preg_match('/<(a|body|head|html|img|plaintext|pre|script|table|title)[\s>]/i', $V0ljziripe0d);
		}

		if (($Vfeinw1hsfej = @file_get_contents($Vligofq0fb34)) === FALSE)
		{
			return FALSE;
		}

		return $this->_CI->security->xss_clean($Vfeinw1hsfej, TRUE);
	}

	

	
	public function set_error($Vv3gvm3x3hvm, $Vs5udgijupib = 'error')
	{
		$this->_CI->lang->load('upload');

		is_array($Vv3gvm3x3hvm) OR $Vv3gvm3x3hvm = array($Vv3gvm3x3hvm);
		foreach ($Vv3gvm3x3hvm as $Va4zo0rltynr)
		{
			$Vv3gvm3x3hvm = ($this->_CI->lang->line($Va4zo0rltynr) === FALSE) ? $Va4zo0rltynr : $this->_CI->lang->line($Va4zo0rltynr);
			$this->error_msg[] = $Vv3gvm3x3hvm;
			log_message($Vs5udgijupib, $Vv3gvm3x3hvm);
		}

		return $this;
	}

	

	
	public function display_errors($Vtgs3loifva1 = '<p>', $Vn2ycfau434slose = '</p>')
	{
		return (count($this->error_msg) > 0) ? $Vtgs3loifva1.implode($Vn2ycfau434slose.$Vtgs3loifva1, $this->error_msg).$Vn2ycfau434slose : '';
	}

	

	
	protected function _prep_filename($Vb13cwxhoi04)
	{
		if ($this->mod_mime_fix === FALSE OR $this->allowed_types === '*' OR ($Vifxhafjqvbp_pos = strrpos($Vb13cwxhoi04, '.')) === FALSE)
		{
			return $Vb13cwxhoi04;
		}

		$Vifxhafjqvbp = substr($Vb13cwxhoi04, $Vifxhafjqvbp_pos);
		$Vb13cwxhoi04 = substr($Vb13cwxhoi04, 0, $Vifxhafjqvbp_pos);
		return str_replace('.', '_', $Vb13cwxhoi04).$Vifxhafjqvbp;
	}

	

	
	protected function _file_mime_type($Vligofq0fb34)
	{
		
		$V2ntvdv0oalk = '/^([a-z\-]+\/[a-z0-9\-\.\+]+)(;\s.+)?$/';

		
		if (function_exists('finfo_file'))
		{
			$Vau1sz5brgnh = @finfo_open(FILEINFO_MIME);
			if (is_resource($Vau1sz5brgnh)) 
			{
				$Vf4dlektv1ba = @finfo_file($Vau1sz5brgnh, $Vligofq0fb34['tmp_name']);
				finfo_close($Vau1sz5brgnh);

				
				if (is_string($Vf4dlektv1ba) && preg_match($V2ntvdv0oalk, $Vf4dlektv1ba, $Vmbknpbfqa1s))
				{
					$this->file_type = $Vmbknpbfqa1s[1];
					return;
				}
			}
		}

		
		if (DIRECTORY_SEPARATOR !== '\\')
		{
			$Vn2ycfau434smd = function_exists('escapeshellarg')
				? 'file --brief --mime '.escapeshellarg($Vligofq0fb34['tmp_name']).' 2>&1'
				: 'file --brief --mime '.$Vligofq0fb34['tmp_name'].' 2>&1';

			if (function_usable('exec'))
			{
				
				$Vf4dlektv1ba = @exec($Vn2ycfau434smd, $Vf4dlektv1ba, $V43weikltpfl);
				if ($V43weikltpfl === 0 && is_string($Vf4dlektv1ba) && preg_match($V2ntvdv0oalk, $Vf4dlektv1ba, $Vmbknpbfqa1s))
				{
					$this->file_type = $Vmbknpbfqa1s[1];
					return;
				}
			}

			if ( ! ini_get('safe_mode') && function_usable('shell_exec'))
			{
				$Vf4dlektv1ba = @shell_exec($Vn2ycfau434smd);
				if (strlen($Vf4dlektv1ba) > 0)
				{
					$Vf4dlektv1ba = explode("\n", trim($Vf4dlektv1ba));
					if (preg_match($V2ntvdv0oalk, $Vf4dlektv1ba[(count($Vf4dlektv1ba) - 1)], $Vmbknpbfqa1s))
					{
						$this->file_type = $Vmbknpbfqa1s[1];
						return;
					}
				}
			}

			if (function_usable('popen'))
			{
				$Vue0v1bcgipw = @popen($Vn2ycfau434smd, 'r');
				if (is_resource($Vue0v1bcgipw))
				{
					$Vf4dlektv1ba = @fread($Vue0v1bcgipw, 512);
					@pclose($Vue0v1bcgipw);
					if ($Vf4dlektv1ba !== FALSE)
					{
						$Vf4dlektv1ba = explode("\n", trim($Vf4dlektv1ba));
						if (preg_match($V2ntvdv0oalk, $Vf4dlektv1ba[(count($Vf4dlektv1ba) - 1)], $Vmbknpbfqa1s))
						{
							$this->file_type = $Vmbknpbfqa1s[1];
							return;
						}
					}
				}
			}
		}

		
		if (function_exists('mime_content_type'))
		{
			$this->file_type = @mime_content_type($Vligofq0fb34['tmp_name']);
			if (strlen($this->file_type) > 0) 
			{
				return;
			}
		}

		$this->file_type = $Vligofq0fb34['type'];
	}

}
