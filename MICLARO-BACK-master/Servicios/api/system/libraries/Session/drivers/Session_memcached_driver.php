<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Session_memcached_driver extends CI_Session_driver implements SessionHandlerInterface {

	
	protected $Vdua3izioxz3;

	
	protected $Vkx5oe15w34a = 'ci_session:';

	
	protected $Viiet5jissp1;

	

	
	public function __construct(&$Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->_config['save_path']))
		{
			log_message('error', 'Session: No Memcached save path configured.');
		}

		if ($this->_config['match_ip'] === TRUE)
		{
			$this->_key_prefix .= $_SERVER['REMOTE_ADDR'].':';
		}
	}

	

	
	public function open($V4rudmfad51y, $Vaclaigdbtoo)
	{
		$this->_memcached = new Memcached();
		$this->_memcached->setOption(Memcached::OPT_BINARY_PROTOCOL, TRUE); 
		$Vflzp4epj4xw = array();
		foreach ($this->_memcached->getServerList() as $Vtecpthjhoh2)
		{
			$Vflzp4epj4xw[] = $Vtecpthjhoh2['host'].':'.$Vtecpthjhoh2['port'];
		}

		if ( ! preg_match_all('#,?([^,:]+)\:(\d{1,5})(?:\:(\d+))?#', $this->_config['save_path'], $Vmbknpbfqa1s, PREG_SET_ORDER))
		{
			$this->_memcached = NULL;
			log_message('error', 'Session: Invalid Memcached save path format: '.$this->_config['save_path']);
			return $this->_fail();
		}

		foreach ($Vmbknpbfqa1s as $V4uvjtwtgjvp)
		{
			
			if (in_array($V4uvjtwtgjvp[1].':'.$V4uvjtwtgjvp[2], $Vflzp4epj4xw, TRUE))
			{
				log_message('debug', 'Session: Memcached server pool already has '.$V4uvjtwtgjvp[1].':'.$V4uvjtwtgjvp[2]);
				continue;
			}

			if ( ! $this->_memcached->addServer($V4uvjtwtgjvp[1], $V4uvjtwtgjvp[2], isset($V4uvjtwtgjvp[3]) ? $V4uvjtwtgjvp[3] : 0))
			{
				log_message('error', 'Could not add '.$V4uvjtwtgjvp[1].':'.$V4uvjtwtgjvp[2].' to Memcached server pool.');
			}
			else
			{
				$Vflzp4epj4xw[] = $V4uvjtwtgjvp[1].':'.$V4uvjtwtgjvp[2];
			}
		}

		if (empty($Vflzp4epj4xw))
		{
			log_message('error', 'Session: Memcached server pool is empty.');
			return $this->_fail();
		}

		return $this->_success;
	}

	

	
	public function read($Vh3ontjxlhd5)
	{
		if (isset($this->_memcached) && $this->_get_lock($Vh3ontjxlhd5))
		{
			
			$this->_session_id = $Vh3ontjxlhd5;

			$Vyzxnjw21ipn = (string) $this->_memcached->get($this->_key_prefix.$Vh3ontjxlhd5);
			$this->_fingerprint = md5($Vyzxnjw21ipn);
			return $Vyzxnjw21ipn;
		}

		return $this->_fail();
	}

	

	
	public function write($Vh3ontjxlhd5, $Vyzxnjw21ipn)
	{
		if ( ! isset($this->_memcached))
		{
			return $this->_fail();
		}
		
		elseif ($Vh3ontjxlhd5 !== $this->_session_id)
		{
			if ( ! $this->_release_lock() OR ! $this->_get_lock($Vh3ontjxlhd5))
			{
				return $this->_fail();
			}

			$this->_fingerprint = md5('');
			$this->_session_id = $Vh3ontjxlhd5;
		}

		if (isset($this->_lock_key))
		{
			$V2xim30qek4u = $this->_key_prefix.$Vh3ontjxlhd5;

			$this->_memcached->replace($this->_lock_key, time(), 300);
			if ($this->_fingerprint !== ($Vf3lttgchqpk = md5($Vyzxnjw21ipn)))
			{
				if (
					$this->_memcached->replace($V2xim30qek4u, $Vyzxnjw21ipn, $this->_config['expiration'])
					OR ($this->_memcached->getResultCode() === Memcached::RES_NOTFOUND && $this->_memcached->set($V2xim30qek4u, $Vyzxnjw21ipn, $this->_config['expiration']))
				)
				{
					$this->_fingerprint = $Vf3lttgchqpk;
					return $this->_success;
				}

				return $this->_fail();
			}

			if (
				$this->_memcached->touch($V2xim30qek4u, $this->_config['expiration'])
				OR ($this->_memcached->getResultCode() === Memcached::RES_NOTFOUND && $this->_memcached->set($V2xim30qek4u, $Vyzxnjw21ipn, $this->_config['expiration']))
			)
			{
				return $this->_success;
			}
		}

		return $this->_fail();
	}

	

	
	public function close()
	{
		if (isset($this->_memcached))
		{
			$this->_release_lock();
			if ( ! $this->_memcached->quit())
			{
				return $this->_fail();
			}

			$this->_memcached = NULL;
			return $this->_success;
		}

		return $this->_fail();
	}

	

	
	public function destroy($Vh3ontjxlhd5)
	{
		if (isset($this->_memcached, $this->_lock_key))
		{
			$this->_memcached->delete($this->_key_prefix.$Vh3ontjxlhd5);
			$this->_cookie_destroy();
			return $this->_success;
		}

		return $this->_fail();
	}

	

	
	public function gc($Vq25j5ef3kyx)
	{
		
		return $this->_success;
	}

	

	
	protected function _get_lock($Vh3ontjxlhd5)
	{
		
		
		
		if ($this->_lock_key === $this->_key_prefix.$Vh3ontjxlhd5.':lock')
		{
			if ( ! $this->_memcached->replace($this->_lock_key, time(), 300))
			{
				return ($this->_memcached->getResultCode() === Memcached::RES_NOTFOUND)
					? $this->_memcached->set($this->_lock_key, time(), 300)
					: FALSE;
			}
		}

		
		$Vv1wlxw550b4 = $this->_key_prefix.$Vh3ontjxlhd5.':lock';
		$Vygsezqztitl = 0;
		do
		{
			if ($this->_memcached->get($Vv1wlxw550b4))
			{
				sleep(1);
				continue;
			}

			if ( ! $this->_memcached->set($Vv1wlxw550b4, time(), 300))
			{
				log_message('error', 'Session: Error while trying to obtain lock for '.$this->_key_prefix.$Vh3ontjxlhd5);
				return FALSE;
			}

			$this->_lock_key = $Vv1wlxw550b4;
			break;
		}
		while (++$Vygsezqztitl < 30);

		if ($Vygsezqztitl === 30)
		{
			log_message('error', 'Session: Unable to obtain lock for '.$this->_key_prefix.$Vh3ontjxlhd5.' after 30 attempts, aborting.');
			return FALSE;
		}

		$this->_lock = TRUE;
		return TRUE;
	}

	

	
	protected function _release_lock()
	{
		if (isset($this->_memcached, $this->_lock_key) && $this->_lock)
		{
			if ( ! $this->_memcached->delete($this->_lock_key) && $this->_memcached->getResultCode() !== Memcached::RES_NOTFOUND)
			{
				log_message('error', 'Session: Error while trying to free lock for '.$this->_lock_key);
				return FALSE;
			}

			$this->_lock_key = NULL;
			$this->_lock = FALSE;
		}

		return TRUE;
	}
}