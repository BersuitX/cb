<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Security {

	
	public $Vznkuwmylhi4 =	array(
		'../', '<!--', '-->', '<', '>',
		"'", '"', '&', '$', '#',
		'{', '}', '[', ']', '=',
		';', '?', '%20', '%22',
		'%3c',		
		'%253c',	
		'%3e',		
		'%0e',		
		'%28',		
		'%29',		
		'%2528',	
		'%26',		
		'%24',		
		'%3f',		
		'%3b',		
		'%3d'		
	);

	
	public $Vwxuqfbo3r2c = 'UTF-8';

	
	protected $Vte0oq1t4hnh;

	
	protected $V1ybphp4obl0;

	
	protected $Vb2hgmstamgt =	7200;

	
	protected $Vxka2bjprytl =	'ci_csrf_token';

	
	protected $Vy0x4pz3fnco =	'ci_csrf_token';

	
	protected $Vcnhmfgzip21 =	array(
		'document.cookie'	=> '[removed]',
		'document.write'	=> '[removed]',
		'.parentNode'		=> '[removed]',
		'.innerHTML'		=> '[removed]',
		'-moz-binding'		=> '[removed]',
		'<!--'				=> '&lt;!--',
		'-->'				=> '--&gt;',
		'<![CDATA['			=> '&lt;![CDATA[',
		'<comment>'			=> '&lt;comment&gt;'
	);

	
	protected $Ve1nryyn5sc3 = array(
		'javascript\s*:',
		'(document|(document\.)?window)\.(location|on\w*)',
		'expression\s*(\(|&\#40;)', 
		'vbscript\s*:', 
		'wscript\s*:', 
		'jscript\s*:', 
		'vbs\s*:', 
		'Redirect\s+30\d',
		"([\"'])?data\s*:[^\\1]*?base64[^\\1]*?,[^\\1]*?\\1?"
	);

	
	public function __construct()
	{
		
		if (config_item('csrf_protection'))
		{
			
			foreach (array('csrf_expire', 'csrf_token_name', 'csrf_cookie_name') as $V2xim30qek4u)
			{
				if (NULL !== ($Va4zo0rltynr = config_item($V2xim30qek4u)))
				{
					$this->{'_'.$V2xim30qek4u} = $Va4zo0rltynr;
				}
			}

			
			if ($V2w5wtx303yg = config_item('cookie_prefix'))
			{
				$this->_csrf_cookie_name = $V2w5wtx303yg.$this->_csrf_cookie_name;
			}

			
			$this->_csrf_set_hash();
		}

		$this->charset = strtoupper(config_item('charset'));

		log_message('info', 'Security Class Initialized');
	}

	

	
	public function csrf_verify()
	{
		
		if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST')
		{
			return $this->csrf_set_cookie();
		}

		
		if ($Vvtw42ieffpu = config_item('csrf_exclude_uris'))
		{
			$V1naxfrpd12s = load_class('URI', 'core');
			foreach ($Vvtw42ieffpu as $Vnwvrh4tnli4)
			{
				if (preg_match('#^'.$Vnwvrh4tnli4.'$#i'.(UTF8_ENABLED ? 'u' : ''), $V1naxfrpd12s->uri_string()))
				{
					return $this;
				}
			}
		}

		
		if ( ! isset($_POST[$this->_csrf_token_name], $_COOKIE[$this->_csrf_cookie_name])
			OR $_POST[$this->_csrf_token_name] !== $_COOKIE[$this->_csrf_cookie_name]) 
		{
			$this->csrf_show_error();
		}

		
		unset($_POST[$this->_csrf_token_name]);

		
		if (config_item('csrf_regenerate'))
		{
			
			unset($_COOKIE[$this->_csrf_cookie_name]);
			$this->_csrf_hash = NULL;
		}

		$this->_csrf_set_hash();
		$this->csrf_set_cookie();

		log_message('info', 'CSRF token verified');
		return $this;
	}

	

	
	public function csrf_set_cookie()
	{
		$Vgoa5d5z2ckk = time() + $this->_csrf_expire;
		$Vqtykcj3qsju = (bool) config_item('cookie_secure');

		if ($Vqtykcj3qsju && ! is_https())
		{
			return FALSE;
		}

		setcookie(
			$this->_csrf_cookie_name,
			$this->_csrf_hash,
			$Vgoa5d5z2ckk,
			config_item('cookie_path'),
			config_item('cookie_domain'),
			$Vqtykcj3qsju,
			config_item('cookie_httponly')
		);
		log_message('info', 'CSRF cookie sent');

		return $this;
	}

	

	
	public function csrf_show_error()
	{
		show_error('The action you have requested is not allowed.', 403);
	}

	

	
	public function get_csrf_hash()
	{
		return $this->_csrf_hash;
	}

	

	
	public function get_csrf_token_name()
	{
		return $this->_csrf_token_name;
	}

	

	
	public function xss_clean($Vssdjb5oqaky, $Vffcvptc3gee = FALSE)
	{
		
		if (is_array($Vssdjb5oqaky))
		{
			while (list($V2xim30qek4u) = each($Vssdjb5oqaky))
			{
				$Vssdjb5oqaky[$V2xim30qek4u] = $this->xss_clean($Vssdjb5oqaky[$V2xim30qek4u]);
			}

			return $Vssdjb5oqaky;
		}

		
		$Vssdjb5oqaky = remove_invisible_characters($Vssdjb5oqaky);

		
		do
		{
			$Vssdjb5oqaky = rawurldecode($Vssdjb5oqaky);
		}
		while (preg_match('/%[0-9a-f]{2,}/i', $Vssdjb5oqaky));

		
		$Vssdjb5oqaky = preg_replace_callback("/[^a-z0-9>]+[a-z0-9]+=([\'\"]).*?\\1/si", array($this, '_convert_attribute'), $Vssdjb5oqaky);
		$Vssdjb5oqaky = preg_replace_callback('/<\w+.*/si', array($this, '_decode_entity'), $Vssdjb5oqaky);

		
		$Vssdjb5oqaky = remove_invisible_characters($Vssdjb5oqaky);

		
		$Vssdjb5oqaky = str_replace("\t", ' ', $Vssdjb5oqaky);

		
		$Vh04pywxcy3l = $Vssdjb5oqaky;

		
		$Vssdjb5oqaky = $this->_do_never_allowed($Vssdjb5oqaky);

		
		if ($Vffcvptc3gee === TRUE)
		{
			
			
			
			$Vssdjb5oqaky = preg_replace('/<\?(php)/i', '&lt;?\\1', $Vssdjb5oqaky);
		}
		else
		{
			$Vssdjb5oqaky = str_replace(array('<?', '?'.'>'), array('&lt;?', '?&gt;'), $Vssdjb5oqaky);
		}

		
		$Vcf0rjgwdx52 = array(
			'javascript', 'expression', 'vbscript', 'jscript', 'wscript',
			'vbs', 'script', 'base64', 'applet', 'alert', 'document',
			'write', 'cookie', 'window', 'confirm', 'prompt', 'eval'
		);

		foreach ($Vcf0rjgwdx52 as $Vrmlj3m5ia3r)
		{
			$Vrmlj3m5ia3r = implode('\s*', str_split($Vrmlj3m5ia3r)).'\s*';

			
			
			$Vssdjb5oqaky = preg_replace_callback('#('.substr($Vrmlj3m5ia3r, 0, -3).')(\W)#is', array($this, '_compact_exploded_words'), $Vssdjb5oqaky);
		}

		
		do
		{
			$Vxcioy5ysrxg = $Vssdjb5oqaky;

			if (preg_match('/<a/i', $Vssdjb5oqaky))
			{
				$Vssdjb5oqaky = preg_replace_callback('#<a[^a-z0-9>]+([^>]*?)(?:>|$)#si', array($this, '_js_link_removal'), $Vssdjb5oqaky);
			}

			if (preg_match('/<img/i', $Vssdjb5oqaky))
			{
				$Vssdjb5oqaky = preg_replace_callback('#<img[^a-z0-9]+([^>]*?)(?:\s?/?>|$)#si', array($this, '_js_img_removal'), $Vssdjb5oqaky);
			}

			if (preg_match('/script|xss/i', $Vssdjb5oqaky))
			{
				$Vssdjb5oqaky = preg_replace('#</*(?:script|xss).*?>#si', '[removed]', $Vssdjb5oqaky);
			}
		}
		while ($Vxcioy5ysrxg !== $Vssdjb5oqaky);
		unset($Vxcioy5ysrxg);

		
		$Vgq2p33sysyd = '#'
			.'<((?<slash>/*\s*)(?<tagName>[a-z0-9]+)(?=[^a-z0-9]|$)' 
			.'[^\s\042\047a-z0-9>/=]*' 
			
			.'(?<attributes>(?:[\s\042\047/=]*' 
			.'[^\s\042\047>/=]+' 
			
				.'(?:\s*=' 
					.'(?:[^\s\042\047=><`]+|\s*\042[^\042]*\042|\s*\047[^\047]*\047|\s*(?U:[^\s\042\047=><`]*))' 
				.')?' 
			.')*)' 
			.'[^>]*)(?<closeTag>\>)?#isS';

		
		
		
		do
		{
			$Vgbj0rci2cbw = $Vssdjb5oqaky;
			$Vssdjb5oqaky = preg_replace_callback($Vgq2p33sysyd, array($this, '_sanitize_naughty_html'), $Vssdjb5oqaky);
		}
		while ($Vgbj0rci2cbw !== $Vssdjb5oqaky);
		unset($Vgbj0rci2cbw);

		
		$Vssdjb5oqaky = preg_replace(
			'#(alert|prompt|confirm|cmd|passthru|eval|exec|expression|system|fopen|fsockopen|file|file_get_contents|readfile|unlink)(\s*)\((.*?)\)#si',
			'\\1\\2&#40;\\3&#41;',
			$Vssdjb5oqaky
		);

		
		
		
		$Vssdjb5oqaky = $this->_do_never_allowed($Vssdjb5oqaky);

		
		if ($Vffcvptc3gee === TRUE)
		{
			return ($Vssdjb5oqaky === $Vh04pywxcy3l);
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function xss_hash()
	{
		if ($this->_xss_hash === NULL)
		{
			$Vz4kdvu0bofr = $this->get_random_bytes(16);
			$this->_xss_hash = ($Vz4kdvu0bofr === FALSE)
				? md5(uniqid(mt_rand(), TRUE))
				: bin2hex($Vz4kdvu0bofr);
		}

		return $this->_xss_hash;
	}

	

	
	public function get_random_bytes($Vgdtiboyfq04)
	{
		if (empty($Vgdtiboyfq04) OR ! ctype_digit((string) $Vgdtiboyfq04))
		{
			return FALSE;
		}

		if (function_exists('random_bytes'))
		{
			try
			{
				
				return random_bytes((int) $Vgdtiboyfq04);
			}
			catch (Exception $Veengl4bqqud)
			{
				
				
				log_message('error', $Veengl4bqqud->getMessage());
				return FALSE;
			}
		}

		
		if (defined('MCRYPT_DEV_URANDOM') && ($Vzxix2pqoztx = mcrypt_create_iv($Vgdtiboyfq04, MCRYPT_DEV_URANDOM)) !== FALSE)
		{
			return $Vzxix2pqoztx;
		}


		if (is_readable('/dev/urandom') && ($Vzuexymrvrpz = fopen('/dev/urandom', 'rb')) !== FALSE)
		{
			
			is_php('5.4') && stream_set_chunk_size($Vzuexymrvrpz, $Vgdtiboyfq04);
			$Vzxix2pqoztx = fread($Vzuexymrvrpz, $Vgdtiboyfq04);
			fclose($Vzuexymrvrpz);
			if ($Vzxix2pqoztx !== FALSE)
			{
				return $Vzxix2pqoztx;
			}
		}

		if (function_exists('openssl_random_pseudo_bytes'))
		{
			return openssl_random_pseudo_bytes($Vgdtiboyfq04);
		}

		return FALSE;
	}

	

	
	public function entity_decode($Vssdjb5oqaky, $Vwxuqfbo3r2c = NULL)
	{
		if (strpos($Vssdjb5oqaky, '&') === FALSE)
		{
			return $Vssdjb5oqaky;
		}

		static $Vl1ymi5jimiq;

		isset($Vwxuqfbo3r2c) OR $Vwxuqfbo3r2c = $this->charset;
		$Vj4pefvvndny = is_php('5.4')
			? ENT_COMPAT | ENT_HTML5
			: ENT_COMPAT;

		do
		{
			$Vssdjb5oqaky_compare = $Vssdjb5oqaky;

			
			if (preg_match_all('/&[a-z]{2,}(?![a-z;])/i', $Vssdjb5oqaky, $Vmbknpbfqa1s))
			{
				if ( ! isset($Vl1ymi5jimiq))
				{
					$Vl1ymi5jimiq = array_map(
						'strtolower',
						is_php('5.3.4')
							? get_html_translation_table(HTML_ENTITIES, $Vj4pefvvndny, $Vwxuqfbo3r2c)
							: get_html_translation_table(HTML_ENTITIES, $Vj4pefvvndny)
					);

					
					
					if ($Vj4pefvvndny === ENT_COMPAT)
					{
						$Vl1ymi5jimiq[':'] = '&colon;';
						$Vl1ymi5jimiq['('] = '&lpar;';
						$Vl1ymi5jimiq[')'] = '&rpar;';
						$Vl1ymi5jimiq["\n"] = '&newline;';
						$Vl1ymi5jimiq["\t"] = '&tab;';
					}
				}

				$Vfx40ovsdrwf = array();
				$Vmbknpbfqa1s = array_unique(array_map('strtolower', $Vmbknpbfqa1s[0]));
				foreach ($Vmbknpbfqa1s as &$V4uvjtwtgjvp)
				{
					if (($Vsvbbffnkiqb = array_search($V4uvjtwtgjvp.';', $Vl1ymi5jimiq, TRUE)) !== FALSE)
					{
						$Vfx40ovsdrwf[$V4uvjtwtgjvp] = $Vsvbbffnkiqb;
					}
				}

				$Vssdjb5oqaky = str_ireplace(array_keys($Vfx40ovsdrwf), array_values($Vfx40ovsdrwf), $Vssdjb5oqaky);
			}

			
			$Vssdjb5oqaky = html_entity_decode(
				preg_replace('/(&#(?:x0*[0-9a-f]{2,5}(?![0-9a-f;])|(?:0*\d{2,4}(?![0-9;]))))/iS', '$1;', $Vssdjb5oqaky),
				$Vj4pefvvndny,
				$Vwxuqfbo3r2c
			);
		}
		while ($Vssdjb5oqaky_compare !== $Vssdjb5oqaky);
		return $Vssdjb5oqaky;
	}

	

	
	public function sanitize_filename($Vssdjb5oqaky, $Vn3twm0zgvuu = FALSE)
	{
		$Vl3yycgwkgdw = $this->filename_bad_chars;

		if ( ! $Vn3twm0zgvuu)
		{
			$Vl3yycgwkgdw[] = './';
			$Vl3yycgwkgdw[] = '/';
		}

		$Vssdjb5oqaky = remove_invisible_characters($Vssdjb5oqaky, FALSE);

		do
		{
			$V4hjmwtiqhsj = $Vssdjb5oqaky;
			$Vssdjb5oqaky = str_replace($Vl3yycgwkgdw, '', $Vssdjb5oqaky);
		}
		while ($V4hjmwtiqhsj !== $Vssdjb5oqaky);

		return stripslashes($Vssdjb5oqaky);
	}

	

	
	public function strip_image_tags($Vssdjb5oqaky)
	{
		return preg_replace(
			array(
				'#<img[\s/]+.*?src\s*=\s*(["\'])([^\\1]+?)\\1.*?\>#i',
				'#<img[\s/]+.*?src\s*=\s*?(([^\s"\'=<>`]+)).*?\>#i'
			),
			'\\2',
			$Vssdjb5oqaky
		);
	}

	

	
	protected function _compact_exploded_words($Vmbknpbfqa1s)
	{
		return preg_replace('/\s+/s', '', $Vmbknpbfqa1s[1]).$Vmbknpbfqa1s[2];
	}

	

	
	protected function _sanitize_naughty_html($Vmbknpbfqa1s)
	{
		static $Vkozejs4xlcu    = array(
			'alert', 'prompt', 'confirm', 'applet', 'audio', 'basefont', 'base', 'behavior', 'bgsound',
			'blink', 'body', 'embed', 'expression', 'form', 'frameset', 'frame', 'head', 'html', 'ilayer',
			'iframe', 'input', 'button', 'select', 'isindex', 'layer', 'link', 'meta', 'keygen', 'object',
			'plaintext', 'style', 'script', 'textarea', 'title', 'math', 'video', 'svg', 'xml', 'xss'
		);

		static $Veengl4bqqudvil_attributes = array(
			'on\w+', 'style', 'xmlns', 'formaction', 'form', 'xlink:href', 'FSCommand', 'seekSegmentTime'
		);

		
		if (empty($Vmbknpbfqa1s['closeTag']))
		{
			return '&lt;'.$Vmbknpbfqa1s[1];
		}
		
		elseif (in_array(strtolower($Vmbknpbfqa1s['tagName']), $Vkozejs4xlcu, TRUE))
		{
			return '&lt;'.$Vmbknpbfqa1s[1].'&gt;';
		}
		
		elseif (isset($Vmbknpbfqa1s['attributes']))
		{
			
			$Vpkjdumwo4xn = array();

			
			$Vpkjdumwo4xn_pattern = '#'
				.'(?<name>[^\s\042\047>/=]+)' 
				
				.'(?:\s*=(?<value>[^\s\042\047=><`]+|\s*\042[^\042]*\042|\s*\047[^\047]*\047|\s*(?U:[^\s\042\047=><`]*)))' 
				.'#i';

			
			$V4ug4bmt0ozk = '#^('.implode('|', $Veengl4bqqudvil_attributes).')$#i';

			
			do
			{
				
				
				
				$Vmbknpbfqa1s['attributes'] = preg_replace('#^[^a-z]+#i', '', $Vmbknpbfqa1s['attributes']);

				if ( ! preg_match($Vpkjdumwo4xn_pattern, $Vmbknpbfqa1s['attributes'], $Vdxrjzycpxvx, PREG_OFFSET_CAPTURE))
				{
					
					break;
				}

				if (
					
					preg_match($V4ug4bmt0ozk, $Vdxrjzycpxvx['name'][0])
					
					OR (trim($Vdxrjzycpxvx['value'][0]) === '')
				)
				{
					$Vpkjdumwo4xn[] = 'xss=removed';
				}
				else
				{
					$Vpkjdumwo4xn[] = $Vdxrjzycpxvx[0][0];
				}

				$Vmbknpbfqa1s['attributes'] = substr($Vmbknpbfqa1s['attributes'], $Vdxrjzycpxvx[0][1] + strlen($Vdxrjzycpxvx[0][0]));
			}
			while ($Vmbknpbfqa1s['attributes'] !== '');

			$Vpkjdumwo4xn = empty($Vpkjdumwo4xn)
				? ''
				: ' '.implode(' ', $Vpkjdumwo4xn);
			return '<'.$Vmbknpbfqa1s['slash'].$Vmbknpbfqa1s['tagName'].$Vpkjdumwo4xn.'>';
		}

		return $Vmbknpbfqa1s[0];
	}

	

	
	protected function _js_link_removal($V4uvjtwtgjvp)
	{
		return str_replace(
			$V4uvjtwtgjvp[1],
			preg_replace(
				'#href=.*?(?:(?:alert|prompt|confirm)(?:\(|&\#40;)|javascript:|livescript:|mocha:|charset=|window\.|document\.|\.cookie|<script|<xss|data\s*:)#si',
				'',
				$this->_filter_attributes($V4uvjtwtgjvp[1])
			),
			$V4uvjtwtgjvp[0]
		);
	}

	

	
	protected function _js_img_removal($V4uvjtwtgjvp)
	{
		return str_replace(
			$V4uvjtwtgjvp[1],
			preg_replace(
				'#src=.*?(?:(?:alert|prompt|confirm|eval)(?:\(|&\#40;)|javascript:|livescript:|mocha:|charset=|window\.|document\.|\.cookie|<script|<xss|base64\s*,)#si',
				'',
				$this->_filter_attributes($V4uvjtwtgjvp[1])
			),
			$V4uvjtwtgjvp[0]
		);
	}

	

	
	protected function _convert_attribute($V4uvjtwtgjvp)
	{
		return str_replace(array('>', '<', '\\'), array('&gt;', '&lt;', '\\\\'), $V4uvjtwtgjvp[0]);
	}

	

	
	protected function _filter_attributes($Vssdjb5oqaky)
	{
		$Vlxaqc0cx0ab = '';
		if (preg_match_all('#\s*[a-z\-]+\s*=\s*(\042|\047)([^\\1]*?)\\1#is', $Vssdjb5oqaky, $Vmbknpbfqa1s))
		{
			foreach ($Vmbknpbfqa1s[0] as $V4uvjtwtgjvp)
			{
				$Vlxaqc0cx0ab .= preg_replace('#/\*.*?\*/#s', '', $V4uvjtwtgjvp);
			}
		}

		return $Vlxaqc0cx0ab;
	}

	

	
	protected function _decode_entity($V4uvjtwtgjvp)
	{
		
		
		$V4uvjtwtgjvp = preg_replace('|\&([a-z\_0-9\-]+)\=([a-z\_0-9\-/]+)|i', $this->xss_hash().'\\1=\\2', $V4uvjtwtgjvp[0]);

		
		return str_replace(
			$this->xss_hash(),
			'&',
			$this->entity_decode($V4uvjtwtgjvp, $this->charset)
		);
	}

	

	
	protected function _do_never_allowed($Vssdjb5oqaky)
	{
		$Vssdjb5oqaky = str_replace(array_keys($this->_never_allowed_str), $this->_never_allowed_str, $Vssdjb5oqaky);

		foreach ($this->_never_allowed_regex as $Vwyoe0versv3)
		{
			$Vssdjb5oqaky = preg_replace('#'.$Vwyoe0versv3.'#is', '[removed]', $Vssdjb5oqaky);
		}

		return $Vssdjb5oqaky;
	}

	

	
	protected function _csrf_set_hash()
	{
		if ($this->_csrf_hash === NULL)
		{
			
			
			
			
			if (isset($_COOKIE[$this->_csrf_cookie_name]) && is_string($_COOKIE[$this->_csrf_cookie_name])
				&& preg_match('#^[0-9a-f]{32}$#iS', $_COOKIE[$this->_csrf_cookie_name]) === 1)
			{
				return $this->_csrf_hash = $_COOKIE[$this->_csrf_cookie_name];
			}

			$Vz4kdvu0bofr = $this->get_random_bytes(16);
			$this->_csrf_hash = ($Vz4kdvu0bofr === FALSE)
				? md5(uniqid(mt_rand(), TRUE))
				: bin2hex($Vz4kdvu0bofr);
		}

		return $this->_csrf_hash;
	}

}
