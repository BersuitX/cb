<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Encryption {

	
	protected $V2huppp4pshr = 'aes-128';

	
	protected $Vdig4egm3lja = 'cbc';

	
	protected $Vofkxpwsv4ag;

	
	protected $Vyomyprcxlnn;

	
	protected $Vnjstfz3xmu1;

	
	protected $Vnjstfz3xmu1s = array();

	
	protected $Vdig4egm3ljas = array(
		'mcrypt' => array(
			'cbc' => 'cbc',
			'ecb' => 'ecb',
			'ofb' => 'nofb',
			'ofb8' => 'ofb',
			'cfb' => 'ncfb',
			'cfb8' => 'cfb',
			'ctr' => 'ctr',
			'stream' => 'stream'
		),
		'openssl' => array(
			'cbc' => 'cbc',
			'ecb' => 'ecb',
			'ofb' => 'ofb',
			'cfb' => 'cfb',
			'cfb8' => 'cfb8',
			'ctr' => 'ctr',
			'stream' => '',
			'xts' => 'xts'
		)
	);

	
	protected $V0n4jia3jx2z = array(
		'sha224' => 28,
		'sha256' => 32,
		'sha384' => 48,
		'sha512' => 64
	);

	
	protected static $Vcb0v3ffmryv;

	

	
	public function __construct(array $Vpz5i5lfmwft = array())
	{
		$this->_drivers = array(
			'mcrypt' => defined('MCRYPT_DEV_URANDOM'),
			
			
			'openssl' => (is_php('5.3.3') && extension_loaded('openssl'))
		);

		if ( ! $this->_drivers['mcrypt'] && ! $this->_drivers['openssl'])
		{
			show_error('Encryption: Unable to find an available encryption driver.');
		}

		isset(self::$Vcb0v3ffmryv) OR self::$Vcb0v3ffmryv = (extension_loaded('mbstring') && ini_get('mbstring.func_override'));
		$this->initialize($Vpz5i5lfmwft);

		if ( ! isset($this->_key) && self::strlen($V2xim30qek4u = config_item('encryption_key')) > 0)
		{
			$this->_key = $V2xim30qek4u;
		}

		log_message('info', 'Encryption Class Initialized');
	}

	

	
	public function initialize(array $Vpz5i5lfmwft)
	{
		if ( ! empty($Vpz5i5lfmwft['driver']))
		{
			if (isset($this->_drivers[$Vpz5i5lfmwft['driver']]))
			{
				if ($this->_drivers[$Vpz5i5lfmwft['driver']])
				{
					$this->_driver = $Vpz5i5lfmwft['driver'];
				}
				else
				{
					log_message('error', "Encryption: Driver '".$Vpz5i5lfmwft['driver']."' is not available.");
				}
			}
			else
			{
				log_message('error', "Encryption: Unknown driver '".$Vpz5i5lfmwft['driver']."' cannot be configured.");
			}
		}

		if (empty($this->_driver))
		{
			$this->_driver = ($this->_drivers['openssl'] === TRUE)
				? 'openssl'
				: 'mcrypt';

			log_message('debug', "Encryption: Auto-configured driver '".$this->_driver."'.");
		}

		empty($Vpz5i5lfmwft['cipher']) && $Vpz5i5lfmwft['cipher'] = $this->_cipher;
		empty($Vpz5i5lfmwft['key']) OR $this->_key = $Vpz5i5lfmwft['key'];
		$this->{'_'.$this->_driver.'_initialize'}($Vpz5i5lfmwft);
		return $this;
	}

	

	
	protected function _mcrypt_initialize($Vpz5i5lfmwft)
	{
		if ( ! empty($Vpz5i5lfmwft['cipher']))
		{
			$Vpz5i5lfmwft['cipher'] = strtolower($Vpz5i5lfmwft['cipher']);
			$this->_cipher_alias($Vpz5i5lfmwft['cipher']);

			if ( ! in_array($Vpz5i5lfmwft['cipher'], mcrypt_list_algorithms(), TRUE))
			{
				log_message('error', 'Encryption: MCrypt cipher '.strtoupper($Vpz5i5lfmwft['cipher']).' is not available.');
			}
			else
			{
				$this->_cipher = $Vpz5i5lfmwft['cipher'];
			}
		}

		if ( ! empty($Vpz5i5lfmwft['mode']))
		{
			$Vpz5i5lfmwft['mode'] = strtolower($Vpz5i5lfmwft['mode']);
			if ( ! isset($this->_modes['mcrypt'][$Vpz5i5lfmwft['mode']]))
			{
				log_message('error', 'Encryption: MCrypt mode '.strtoupper($Vpz5i5lfmwft['mode']).' is not available.');
			}
			else
			{
				$this->_mode = $this->_modes['mcrypt'][$Vpz5i5lfmwft['mode']];
			}
		}

		if (isset($this->_cipher, $this->_mode))
		{
			if (is_resource($this->_handle)
				&& (strtolower(mcrypt_enc_get_algorithms_name($this->_handle)) !== $this->_cipher
					OR strtolower(mcrypt_enc_get_modes_name($this->_handle)) !== $this->_mode)
			)
			{
				mcrypt_module_close($this->_handle);
			}

			if ($this->_handle = mcrypt_module_open($this->_cipher, '', $this->_mode, ''))
			{
				log_message('info', 'Encryption: MCrypt cipher '.strtoupper($this->_cipher).' initialized in '.strtoupper($this->_mode).' mode.');
			}
			else
			{
				log_message('error', 'Encryption: Unable to initialize MCrypt with cipher '.strtoupper($this->_cipher).' in '.strtoupper($this->_mode).' mode.');
			}
		}
	}

	

	
	protected function _openssl_initialize($Vpz5i5lfmwft)
	{
		if ( ! empty($Vpz5i5lfmwft['cipher']))
		{
			$Vpz5i5lfmwft['cipher'] = strtolower($Vpz5i5lfmwft['cipher']);
			$this->_cipher_alias($Vpz5i5lfmwft['cipher']);
			$this->_cipher = $Vpz5i5lfmwft['cipher'];
		}

		if ( ! empty($Vpz5i5lfmwft['mode']))
		{
			$Vpz5i5lfmwft['mode'] = strtolower($Vpz5i5lfmwft['mode']);
			if ( ! isset($this->_modes['openssl'][$Vpz5i5lfmwft['mode']]))
			{
				log_message('error', 'Encryption: OpenSSL mode '.strtoupper($Vpz5i5lfmwft['mode']).' is not available.');
			}
			else
			{
				$this->_mode = $this->_modes['openssl'][$Vpz5i5lfmwft['mode']];
			}
		}

		if (isset($this->_cipher, $this->_mode))
		{
			
			$Vmidmivkg0nz = empty($this->_mode)
				? $this->_cipher
				: $this->_cipher.'-'.$this->_mode;

			if ( ! in_array($Vmidmivkg0nz, openssl_get_cipher_methods(), TRUE))
			{
				$this->_handle = NULL;
				log_message('error', 'Encryption: Unable to initialize OpenSSL with method '.strtoupper($Vmidmivkg0nz).'.');
			}
			else
			{
				$this->_handle = $Vmidmivkg0nz;
				log_message('info', 'Encryption: OpenSSL initialized with method '.strtoupper($Vmidmivkg0nz).'.');
			}
		}
	}

	

	
	public function create_key($Vgdtiboyfq04)
	{
		if (function_exists('random_bytes'))
		{
			return random_bytes((int) $Vgdtiboyfq04);
		}

		return ($this->_driver === 'mcrypt')
			? mcrypt_create_iv($Vgdtiboyfq04, MCRYPT_DEV_URANDOM)
			: openssl_random_pseudo_bytes($Vgdtiboyfq04);
	}

	

	
	public function encrypt($Vfeinw1hsfej, array $Vpz5i5lfmwft = NULL)
	{
		if (($Vpz5i5lfmwft = $this->_get_params($Vpz5i5lfmwft)) === FALSE)
		{
			return FALSE;
		}

		isset($Vpz5i5lfmwft['key']) OR $Vpz5i5lfmwft['key'] = $this->hkdf($this->_key, 'sha512', NULL, self::strlen($this->_key), 'encryption');

		if (($Vfeinw1hsfej = $this->{'_'.$this->_driver.'_encrypt'}($Vfeinw1hsfej, $Vpz5i5lfmwft)) === FALSE)
		{
			return FALSE;
		}

		$Vpz5i5lfmwft['base64'] && $Vfeinw1hsfej = base64_encode($Vfeinw1hsfej);

		if (isset($Vpz5i5lfmwft['hmac_digest']))
		{
			isset($Vpz5i5lfmwft['hmac_key']) OR $Vpz5i5lfmwft['hmac_key'] = $this->hkdf($this->_key, 'sha512', NULL, NULL, 'authentication');
			return hash_hmac($Vpz5i5lfmwft['hmac_digest'], $Vfeinw1hsfej, $Vpz5i5lfmwft['hmac_key'], ! $Vpz5i5lfmwft['base64']).$Vfeinw1hsfej;
		}

		return $Vfeinw1hsfej;
	}

	

	
	protected function _mcrypt_encrypt($Vfeinw1hsfej, $Vpz5i5lfmwft)
	{
		if ( ! is_resource($Vpz5i5lfmwft['handle']))
		{
			return FALSE;
		}

		
		
		$Vhocrmt3naax = (($Vhocrmt3naax_size = mcrypt_enc_get_iv_size($Vpz5i5lfmwft['handle'])) > 1)
			? mcrypt_create_iv($Vhocrmt3naax_size, MCRYPT_DEV_URANDOM)
			: NULL;

		if (mcrypt_generic_init($Vpz5i5lfmwft['handle'], $Vpz5i5lfmwft['key'], $Vhocrmt3naax) < 0)
		{
			if ($Vpz5i5lfmwft['handle'] !== $this->_handle)
			{
				mcrypt_module_close($Vpz5i5lfmwft['handle']);
			}

			return FALSE;
		}

		
		
		if (in_array(strtolower(mcrypt_enc_get_modes_name($Vpz5i5lfmwft['handle'])), array('cbc', 'ecb'), TRUE))
		{
			$V0ymud1psflj = mcrypt_enc_get_block_size($Vpz5i5lfmwft['handle']);
			$Vbqimp3k3ljw = $V0ymud1psflj - (self::strlen($Vfeinw1hsfej) % $V0ymud1psflj);
			$Vfeinw1hsfej .= str_repeat(chr($Vbqimp3k3ljw), $Vbqimp3k3ljw);
		}

		
		
		
		
		
		
		
		
		
		
		
		$Vfeinw1hsfej = (mcrypt_enc_get_modes_name($Vpz5i5lfmwft['handle']) !== 'ECB')
			? $Vhocrmt3naax.mcrypt_generic($Vpz5i5lfmwft['handle'], $Vfeinw1hsfej)
			: mcrypt_generic($Vpz5i5lfmwft['handle'], $Vfeinw1hsfej);

		mcrypt_generic_deinit($Vpz5i5lfmwft['handle']);
		if ($Vpz5i5lfmwft['handle'] !== $this->_handle)
		{
			mcrypt_module_close($Vpz5i5lfmwft['handle']);
		}

		return $Vfeinw1hsfej;
	}

	

	
	protected function _openssl_encrypt($Vfeinw1hsfej, $Vpz5i5lfmwft)
	{
		if (empty($Vpz5i5lfmwft['handle']))
		{
			return FALSE;
		}

		$Vhocrmt3naax = ($Vhocrmt3naax_size = openssl_cipher_iv_length($Vpz5i5lfmwft['handle']))
			? openssl_random_pseudo_bytes($Vhocrmt3naax_size)
			: NULL;

		$Vfeinw1hsfej = openssl_encrypt(
			$Vfeinw1hsfej,
			$Vpz5i5lfmwft['handle'],
			$Vpz5i5lfmwft['key'],
			1, 
			$Vhocrmt3naax
		);

		if ($Vfeinw1hsfej === FALSE)
		{
			return FALSE;
		}

		return $Vhocrmt3naax.$Vfeinw1hsfej;
	}

	

	
	public function decrypt($Vfeinw1hsfej, array $Vpz5i5lfmwft = NULL)
	{
		if (($Vpz5i5lfmwft = $this->_get_params($Vpz5i5lfmwft)) === FALSE)
		{
			return FALSE;
		}

		if (isset($Vpz5i5lfmwft['hmac_digest']))
		{
			
			
			$V51cwfmuqxea = ($Vpz5i5lfmwft['base64'])
				? $this->_digests[$Vpz5i5lfmwft['hmac_digest']] * 2
				: $this->_digests[$Vpz5i5lfmwft['hmac_digest']];

			if (self::strlen($Vfeinw1hsfej) <= $V51cwfmuqxea)
			{
				return FALSE;
			}

			$Vwzmbiwf0lei = self::substr($Vfeinw1hsfej, 0, $V51cwfmuqxea);
			$Vfeinw1hsfej = self::substr($Vfeinw1hsfej, $V51cwfmuqxea);

			isset($Vpz5i5lfmwft['hmac_key']) OR $Vpz5i5lfmwft['hmac_key'] = $this->hkdf($this->_key, 'sha512', NULL, NULL, 'authentication');
			$Vasbedjjascb = hash_hmac($Vpz5i5lfmwft['hmac_digest'], $Vfeinw1hsfej, $Vpz5i5lfmwft['hmac_key'], ! $Vpz5i5lfmwft['base64']);

			
			$V0wdm0aemnf1 = 0;
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $V51cwfmuqxea; $Vep0df0xosaw++)
			{
				$V0wdm0aemnf1 |= ord($Vwzmbiwf0lei[$Vep0df0xosaw]) ^ ord($Vasbedjjascb[$Vep0df0xosaw]);
			}

			if ($V0wdm0aemnf1 !== 0)
			{
				return FALSE;
			}
		}

		if ($Vpz5i5lfmwft['base64'])
		{
			$Vfeinw1hsfej = base64_decode($Vfeinw1hsfej);
		}

		isset($Vpz5i5lfmwft['key']) OR $Vpz5i5lfmwft['key'] = $this->hkdf($this->_key, 'sha512', NULL, self::strlen($this->_key), 'encryption');

		return $this->{'_'.$this->_driver.'_decrypt'}($Vfeinw1hsfej, $Vpz5i5lfmwft);
	}

	

	
	protected function _mcrypt_decrypt($Vfeinw1hsfej, $Vpz5i5lfmwft)
	{
		if ( ! is_resource($Vpz5i5lfmwft['handle']))
		{
			return FALSE;
		}

		
		
		if (($Vhocrmt3naax_size = mcrypt_enc_get_iv_size($Vpz5i5lfmwft['handle'])) > 1)
		{
			if (mcrypt_enc_get_modes_name($Vpz5i5lfmwft['handle']) !== 'ECB')
			{
				$Vhocrmt3naax = self::substr($Vfeinw1hsfej, 0, $Vhocrmt3naax_size);
				$Vfeinw1hsfej = self::substr($Vfeinw1hsfej, $Vhocrmt3naax_size);
			}
			else
			{
				
				$Vhocrmt3naax = str_repeat("\x0", $Vhocrmt3naax_size);
			}
		}
		else
		{
			$Vhocrmt3naax = NULL;
		}

		if (mcrypt_generic_init($Vpz5i5lfmwft['handle'], $Vpz5i5lfmwft['key'], $Vhocrmt3naax) < 0)
		{
			if ($Vpz5i5lfmwft['handle'] !== $this->_handle)
			{
				mcrypt_module_close($Vpz5i5lfmwft['handle']);
			}

			return FALSE;
		}

		$Vfeinw1hsfej = mdecrypt_generic($Vpz5i5lfmwft['handle'], $Vfeinw1hsfej);
		
		if (in_array(strtolower(mcrypt_enc_get_modes_name($Vpz5i5lfmwft['handle'])), array('cbc', 'ecb'), TRUE))
		{
			$Vfeinw1hsfej = self::substr($Vfeinw1hsfej, 0, -ord($Vfeinw1hsfej[self::strlen($Vfeinw1hsfej)-1]));
		}

		mcrypt_generic_deinit($Vpz5i5lfmwft['handle']);
		if ($Vpz5i5lfmwft['handle'] !== $this->_handle)
		{
			mcrypt_module_close($Vpz5i5lfmwft['handle']);
		}

		return $Vfeinw1hsfej;
	}

	

	
	protected function _openssl_decrypt($Vfeinw1hsfej, $Vpz5i5lfmwft)
	{
		if ($Vhocrmt3naax_size = openssl_cipher_iv_length($Vpz5i5lfmwft['handle']))
		{
			$Vhocrmt3naax = self::substr($Vfeinw1hsfej, 0, $Vhocrmt3naax_size);
			$Vfeinw1hsfej = self::substr($Vfeinw1hsfej, $Vhocrmt3naax_size);
		}
		else
		{
			$Vhocrmt3naax = NULL;
		}

		return empty($Vpz5i5lfmwft['handle'])
			? FALSE
			: openssl_decrypt(
				$Vfeinw1hsfej,
				$Vpz5i5lfmwft['handle'],
				$Vpz5i5lfmwft['key'],
				1, 
				$Vhocrmt3naax
			);
	}

	

	
	protected function _get_params($Vpz5i5lfmwft)
	{
		if (empty($Vpz5i5lfmwft))
		{
			return isset($this->_cipher, $this->_mode, $this->_key, $this->_handle)
				? array(
					'handle' => $this->_handle,
					'cipher' => $this->_cipher,
					'mode' => $this->_mode,
					'key' => NULL,
					'base64' => TRUE,
					'hmac_digest' => 'sha512',
					'hmac_key' => NULL
				)
				: FALSE;
		}
		elseif ( ! isset($Vpz5i5lfmwft['cipher'], $Vpz5i5lfmwft['mode'], $Vpz5i5lfmwft['key']))
		{
			return FALSE;
		}

		if (isset($Vpz5i5lfmwft['mode']))
		{
			$Vpz5i5lfmwft['mode'] = strtolower($Vpz5i5lfmwft['mode']);
			if ( ! isset($this->_modes[$this->_driver][$Vpz5i5lfmwft['mode']]))
			{
				return FALSE;
			}
			else
			{
				$Vpz5i5lfmwft['mode'] = $this->_modes[$this->_driver][$Vpz5i5lfmwft['mode']];
			}
		}

		if (isset($Vpz5i5lfmwft['hmac']) && $Vpz5i5lfmwft['hmac'] === FALSE)
		{
			$Vpz5i5lfmwft['hmac_digest'] = $Vpz5i5lfmwft['hmac_key'] = NULL;
		}
		else
		{
			if ( ! isset($Vpz5i5lfmwft['hmac_key']))
			{
				return FALSE;
			}
			elseif (isset($Vpz5i5lfmwft['hmac_digest']))
			{
				$Vpz5i5lfmwft['hmac_digest'] = strtolower($Vpz5i5lfmwft['hmac_digest']);
				if ( ! isset($this->_digests[$Vpz5i5lfmwft['hmac_digest']]))
				{
					return FALSE;
				}
			}
			else
			{
				$Vpz5i5lfmwft['hmac_digest'] = 'sha512';
			}
		}

		$Vpz5i5lfmwft = array(
			'handle' => NULL,
			'cipher' => $Vpz5i5lfmwft['cipher'],
			'mode' => $Vpz5i5lfmwft['mode'],
			'key' => $Vpz5i5lfmwft['key'],
			'base64' => isset($Vpz5i5lfmwft['raw_data']) ? ! $Vpz5i5lfmwft['raw_data'] : FALSE,
			'hmac_digest' => $Vpz5i5lfmwft['hmac_digest'],
			'hmac_key' => $Vpz5i5lfmwft['hmac_key']
		);

		$this->_cipher_alias($Vpz5i5lfmwft['cipher']);
		$Vpz5i5lfmwft['handle'] = ($Vpz5i5lfmwft['cipher'] !== $this->_cipher OR $Vpz5i5lfmwft['mode'] !== $this->_mode)
			? $this->{'_'.$this->_driver.'_get_handle'}($Vpz5i5lfmwft['cipher'], $Vpz5i5lfmwft['mode'])
			: $this->_handle;

		return $Vpz5i5lfmwft;
	}

	

	
	protected function _mcrypt_get_handle($V5f4pn2v3x4r, $V4wgu3onvlab)
	{
		return mcrypt_module_open($V5f4pn2v3x4r, '', $V4wgu3onvlab, '');
	}

	

	
	protected function _openssl_get_handle($V5f4pn2v3x4r, $V4wgu3onvlab)
	{
		
		return ($V4wgu3onvlab === 'stream')
			? $V5f4pn2v3x4r
			: $V5f4pn2v3x4r.'-'.$V4wgu3onvlab;
	}

	

	
	protected function _cipher_alias(&$V5f4pn2v3x4r)
	{
		static $Vqhgp0n2x1sm;

		if (empty($Vqhgp0n2x1sm))
		{
			$Vqhgp0n2x1sm = array(
				'mcrypt' => array(
					'aes-128' => 'rijndael-128',
					'aes-192' => 'rijndael-128',
					'aes-256' => 'rijndael-128',
					'des3-ede3' => 'tripledes',
					'bf' => 'blowfish',
					'cast5' => 'cast-128',
					'rc4' => 'arcfour',
					'rc4-40' => 'arcfour'
				),
				'openssl' => array(
					'rijndael-128' => 'aes-128',
					'tripledes' => 'des-ede3',
					'blowfish' => 'bf',
					'cast-128' => 'cast5',
					'arcfour' => 'rc4-40',
					'rc4' => 'rc4-40'
				)
			);

			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		}

		if (isset($Vqhgp0n2x1sm[$this->_driver][$V5f4pn2v3x4r]))
		{
			$V5f4pn2v3x4r = $Vqhgp0n2x1sm[$this->_driver][$V5f4pn2v3x4r];
		}
	}

	

	
	public function hkdf($V2xim30qek4u, $Vlvt4n0v3abq = 'sha512', $Vvihvkacmria = NULL, $Vgdtiboyfq04 = NULL, $Vep0df0xosawnfo = '')
	{
		if ( ! isset($this->_digests[$Vlvt4n0v3abq]))
		{
			return FALSE;
		}

		if (empty($Vgdtiboyfq04) OR ! is_int($Vgdtiboyfq04))
		{
			$Vgdtiboyfq04 = $this->_digests[$Vlvt4n0v3abq];
		}
		elseif ($Vgdtiboyfq04 > (255 * $this->_digests[$Vlvt4n0v3abq]))
		{
			return FALSE;
		}

		self::strlen($Vvihvkacmria) OR $Vvihvkacmria = str_repeat("\0", $this->_digests[$Vlvt4n0v3abq]);

		$Vrjm3nrhmcii = hash_hmac($Vlvt4n0v3abq, $V2xim30qek4u, $Vvihvkacmria, TRUE);
		$V2xim30qek4u = '';
		for ($V2xim30qek4u_block = '', $V2grlfekboc5 = 1; self::strlen($V2xim30qek4u) < $Vgdtiboyfq04; $V2grlfekboc5++)
		{
			$V2xim30qek4u_block = hash_hmac($Vlvt4n0v3abq, $V2xim30qek4u_block.$Vep0df0xosawnfo.chr($V2grlfekboc5), $Vrjm3nrhmcii, TRUE);
			$V2xim30qek4u .= $V2xim30qek4u_block;
		}

		return self::substr($V2xim30qek4u, 0, $Vgdtiboyfq04);
	}

	

	
	public function __get($V2xim30qek4u)
	{
		
		if ($V2xim30qek4u === 'mode')
		{
			return array_search($this->_mode, $this->_modes[$this->_driver], TRUE);
		}
		elseif (in_array($V2xim30qek4u, array('cipher', 'driver', 'drivers', 'digests'), TRUE))
		{
			return $this->{'_'.$V2xim30qek4u};
		}

		return NULL;
	}

	

	
	protected static function strlen($Vssdjb5oqaky)
	{
		return (self::$Vcb0v3ffmryv)
			? mb_strlen($Vssdjb5oqaky, '8bit')
			: strlen($Vssdjb5oqaky);
	}

	

	
	protected static function substr($Vssdjb5oqaky, $Vojpgbidgjzg, $Vgdtiboyfq04 = NULL)
	{
		if (self::$Vcb0v3ffmryv)
		{
			
			
			isset($Vgdtiboyfq04) OR $Vgdtiboyfq04 = ($Vojpgbidgjzg >= 0 ? self::strlen($Vssdjb5oqaky) - $Vojpgbidgjzg : -$Vojpgbidgjzg);
			return mb_substr($Vssdjb5oqaky, $Vojpgbidgjzg, $Vgdtiboyfq04, '8bit');
		}

		return isset($Vgdtiboyfq04)
			? substr($Vssdjb5oqaky, $Vojpgbidgjzg, $Vgdtiboyfq04)
			: substr($Vssdjb5oqaky, $Vojpgbidgjzg);
	}
}
