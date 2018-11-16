<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Encrypt {

	
	public $Vynmqs2ft5jm		= '';

	
	protected $Vne3goydr0ut		= 'sha1';

	
	protected $Vgygqgnu3vzc	= FALSE;

	
	protected $Virmu4uv0naf;

	
	protected $Vg20g5n2c4zv;

	
	public function __construct()
	{
		if (($this->_mcrypt_exists = function_exists('mcrypt_encrypt')) === FALSE)
		{
			show_error('The Encrypt library requires the Mcrypt extension.');
		}

		log_message('info', 'Encrypt Class Initialized');
	}

	

	
	public function get_key($V2xim30qek4u = '')
	{
		if ($V2xim30qek4u === '')
		{
			if ($this->encryption_key !== '')
			{
				return $this->encryption_key;
			}

			$V2xim30qek4u = config_item('encryption_key');

			if ( ! strlen($V2xim30qek4u))
			{
				show_error('In order to use the encryption class requires that you set an encryption key in your config file.');
			}
		}

		return md5($V2xim30qek4u);
	}

	

	
	public function set_key($V2xim30qek4u = '')
	{
		$this->encryption_key = $V2xim30qek4u;
		return $this;
	}

	

	
	public function encode($Vxgpowef4o2f, $V2xim30qek4u = '')
	{
		return base64_encode($this->mcrypt_encode($Vxgpowef4o2f, $this->get_key($V2xim30qek4u)));
	}

	

	
	public function decode($Vxgpowef4o2f, $V2xim30qek4u = '')
	{
		if (preg_match('/[^a-zA-Z0-9\/\+=]/', $Vxgpowef4o2f) OR base64_encode(base64_decode($Vxgpowef4o2f)) !== $Vxgpowef4o2f)
		{
			return FALSE;
		}

		return $this->mcrypt_decode(base64_decode($Vxgpowef4o2f), $this->get_key($V2xim30qek4u));
	}

	

	
	public function encode_from_legacy($Vxgpowef4o2f, $V2ocsh2az5ri = MCRYPT_MODE_ECB, $V2xim30qek4u = '')
	{
		if (preg_match('/[^a-zA-Z0-9\/\+=]/', $Vxgpowef4o2f))
		{
			return FALSE;
		}

		
		
		
		$Vgas3w3pgiha = $this->_get_mode();
		$this->set_mode($V2ocsh2az5ri);

		$V2xim30qek4u = $this->get_key($V2xim30qek4u);
		$Vlyx5hiyyavq = base64_decode($Vxgpowef4o2f);
		if (($Vlyx5hiyyavq = $this->mcrypt_decode($Vlyx5hiyyavq, $V2xim30qek4u)) === FALSE)
		{
			$this->set_mode($Vgas3w3pgiha);
			return FALSE;
		}

		$Vlyx5hiyyavq = $this->_xor_decode($Vlyx5hiyyavq, $V2xim30qek4u);

		
		$this->set_mode($Vgas3w3pgiha);

		
		return base64_encode($this->mcrypt_encode($Vlyx5hiyyavq, $V2xim30qek4u));
	}

	

	
	protected function _xor_decode($Vxgpowef4o2f, $V2xim30qek4u)
	{
		$Vxgpowef4o2f = $this->_xor_merge($Vxgpowef4o2f, $V2xim30qek4u);

		$Vlyx5hiyyavq = '';
		for ($Vep0df0xosaw = 0, $V4stf05kgafy = strlen($Vxgpowef4o2f); $Vep0df0xosaw < $V4stf05kgafy; $Vep0df0xosaw++)
		{
			$Vlyx5hiyyavq .= ($Vxgpowef4o2f[$Vep0df0xosaw++] ^ $Vxgpowef4o2f[$Vep0df0xosaw]);
		}

		return $Vlyx5hiyyavq;
	}

	

	
	protected function _xor_merge($Vxgpowef4o2f, $V2xim30qek4u)
	{
		$V4tefnlwskas = $this->hash($V2xim30qek4u);
		$Vssdjb5oqaky = '';
		for ($Vep0df0xosaw = 0, $V4stf05kgafys = strlen($Vxgpowef4o2f), $V4stf05kgafyh = strlen($V4tefnlwskas); $Vep0df0xosaw < $V4stf05kgafys; $Vep0df0xosaw++)
		{
			$Vssdjb5oqaky .= $Vxgpowef4o2f[$Vep0df0xosaw] ^ $V4tefnlwskas[($Vep0df0xosaw % $V4stf05kgafyh)];
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function mcrypt_encode($Vfeinw1hsfej, $V2xim30qek4u)
	{
		$Vep0df0xosawnit_size = mcrypt_get_iv_size($this->_get_cipher(), $this->_get_mode());
		$Vep0df0xosawnit_vect = mcrypt_create_iv($Vep0df0xosawnit_size, MCRYPT_RAND);
		return $this->_add_cipher_noise($Vep0df0xosawnit_vect.mcrypt_encrypt($this->_get_cipher(), $V2xim30qek4u, $Vfeinw1hsfej, $this->_get_mode(), $Vep0df0xosawnit_vect), $V2xim30qek4u);
	}

	

	
	public function mcrypt_decode($Vfeinw1hsfej, $V2xim30qek4u)
	{
		$Vfeinw1hsfej = $this->_remove_cipher_noise($Vfeinw1hsfej, $V2xim30qek4u);
		$Vep0df0xosawnit_size = mcrypt_get_iv_size($this->_get_cipher(), $this->_get_mode());

		if ($Vep0df0xosawnit_size > strlen($Vfeinw1hsfej))
		{
			return FALSE;
		}

		$Vep0df0xosawnit_vect = substr($Vfeinw1hsfej, 0, $Vep0df0xosawnit_size);
		$Vfeinw1hsfej = substr($Vfeinw1hsfej, $Vep0df0xosawnit_size);
		return rtrim(mcrypt_decrypt($this->_get_cipher(), $V2xim30qek4u, $Vfeinw1hsfej, $this->_get_mode(), $Vep0df0xosawnit_vect), "\0");
	}

	

	
	protected function _add_cipher_noise($Vfeinw1hsfej, $V2xim30qek4u)
	{
		$V2xim30qek4u = $this->hash($V2xim30qek4u);
		$Vssdjb5oqaky = '';

		for ($Vep0df0xosaw = 0, $Vv3o4gn4ugio = 0, $V4stf05kgafyd = strlen($Vfeinw1hsfej), $V4stf05kgafyk = strlen($V2xim30qek4u); $Vep0df0xosaw < $V4stf05kgafyd; ++$Vep0df0xosaw, ++$Vv3o4gn4ugio)
		{
			if ($Vv3o4gn4ugio >= $V4stf05kgafyk)
			{
				$Vv3o4gn4ugio = 0;
			}

			$Vssdjb5oqaky .= chr((ord($Vfeinw1hsfej[$Vep0df0xosaw]) + ord($V2xim30qek4u[$Vv3o4gn4ugio])) % 256);
		}

		return $Vssdjb5oqaky;
	}

	

	
	protected function _remove_cipher_noise($Vfeinw1hsfej, $V2xim30qek4u)
	{
		$V2xim30qek4u = $this->hash($V2xim30qek4u);
		$Vssdjb5oqaky = '';

		for ($Vep0df0xosaw = 0, $Vv3o4gn4ugio = 0, $V4stf05kgafyd = strlen($Vfeinw1hsfej), $V4stf05kgafyk = strlen($V2xim30qek4u); $Vep0df0xosaw < $V4stf05kgafyd; ++$Vep0df0xosaw, ++$Vv3o4gn4ugio)
		{
			if ($Vv3o4gn4ugio >= $V4stf05kgafyk)
			{
				$Vv3o4gn4ugio = 0;
			}

			$V3iiokxda3xw = ord($Vfeinw1hsfej[$Vep0df0xosaw]) - ord($V2xim30qek4u[$Vv3o4gn4ugio]);

			if ($V3iiokxda3xw < 0)
			{
				$V3iiokxda3xw += 256;
			}

			$Vssdjb5oqaky .= chr($V3iiokxda3xw);
		}

		return $Vssdjb5oqaky;
	}

	

	
	public function set_cipher($V5f4pn2v3x4r)
	{
		$this->_mcrypt_cipher = $V5f4pn2v3x4r;
		return $this;
	}

	

	
	public function set_mode($V4wgu3onvlab)
	{
		$this->_mcrypt_mode = $V4wgu3onvlab;
		return $this;
	}

	

	
	protected function _get_cipher()
	{
		if ($this->_mcrypt_cipher === NULL)
		{
			return $this->_mcrypt_cipher = MCRYPT_RIJNDAEL_256;
		}

		return $this->_mcrypt_cipher;
	}

	

	
	protected function _get_mode()
	{
		if ($this->_mcrypt_mode === NULL)
		{
			return $this->_mcrypt_mode = MCRYPT_MODE_CBC;
		}

		return $this->_mcrypt_mode;
	}

	

	
	public function set_hash($V4wtbblc1wn4 = 'sha1')
	{
		$this->_hash_type = in_array($V4wtbblc1wn4, hash_algos()) ? $V4wtbblc1wn4 : 'sha1';
	}

	

	
	public function hash($Vssdjb5oqaky)
	{
		return hash($this->_hash_type, $Vssdjb5oqaky);
	}

}
