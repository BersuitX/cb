<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Session_redis_driver extends CI_Session_driver implements SessionHandlerInterface {

	
	protected $V3okfuhellbq;

	
	protected $Vkx5oe15w34a = 'ci_session:';

	
	protected $Viiet5jissp1;

	
	protected $Vqp4mkssy5se = FALSE;

	

	
	public function __construct(&$Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->_config['save_path']))
		{
			log_message('error', 'Session: No Redis save path configured.');
		}
		elseif (preg_match('#(?:tcp://)?([^:?]+)(?:\:(\d+))?(\?.+)?#', $this->_config['save_path'], $Vmbknpbfqa1s))
		{
			isset($Vmbknpbfqa1s[3]) OR $Vmbknpbfqa1s[3] = ''; 
			$this->_config['save_path'] = array(
				'host' => $Vmbknpbfqa1s[1],
				'port' => empty($Vmbknpbfqa1s[2]) ? NULL : $Vmbknpbfqa1s[2],
				'password' => preg_match('#auth=([^\s&]+)#', $Vmbknpbfqa1s[3], $V4uvjtwtgjvp) ? $V4uvjtwtgjvp[1] : NULL,
				'database' => preg_match('#database=(\d+)#', $Vmbknpbfqa1s[3], $V4uvjtwtgjvp) ? (int) $V4uvjtwtgjvp[1] : NULL,
				'timeout' => preg_match('#timeout=(\d+\.\d+)#', $Vmbknpbfqa1s[3], $V4uvjtwtgjvp) ? (float) $V4uvjtwtgjvp[1] : NULL
			);

			preg_match('#prefix=([^\s&]+)#', $Vmbknpbfqa1s[3], $V4uvjtwtgjvp) && $this->_key_prefix = $V4uvjtwtgjvp[1];
		}
		else
		{
			log_message('error', 'Session: Invalid Redis save path format: '.$this->_config['save_path']);
		}

		if ($this->_config['match_ip'] === TRUE)
		{
			$this->_key_prefix .= $_SERVER['REMOTE_ADDR'].':';
		}
	}

	

	
	public function open($V4rudmfad51y, $Vaclaigdbtoo)
	{
		if (empty($this->_config['save_path']))
		{
			return $this->_fail();
		}

		$Vmgwlcsbe4qa = new Redis();
		if ( ! $Vmgwlcsbe4qa->connect($this->_config['save_path']['host'], $this->_config['save_path']['port'], $this->_config['save_path']['timeout']))
		{
			log_message('error', 'Session: Unable to connect to Redis with the configured settings.');
		}
		elseif (isset($this->_config['save_path']['password']) && ! $Vmgwlcsbe4qa->auth($this->_config['save_path']['password']))
		{
			log_message('error', 'Session: Unable to authenticate to Redis instance.');
		}
		elseif (isset($this->_config['save_path']['database']) && ! $Vmgwlcsbe4qa->select($this->_config['save_path']['database']))
		{
			log_message('error', 'Session: Unable to select Redis database with index '.$this->_config['save_path']['database']);
		}
		else
		{
			$this->_redis = $Vmgwlcsbe4qa;
			return $this->_success;
		}

		return $this->_fail();
	}

	

	
	public function read($Vh3ontjxlhd5)
	{
		if (isset($this->_redis) && $this->_get_lock($Vh3ontjxlhd5))
		{
			
			$this->_session_id = $Vh3ontjxlhd5;

			$Vyzxnjw21ipn = $this->_redis->get($this->_key_prefix.$Vh3ontjxlhd5);

			is_string($Vyzxnjw21ipn)
				? $this->_key_exists = TRUE
				: $Vyzxnjw21ipn = '';

			$this->_fingerprint = md5($Vyzxnjw21ipn);
			return $Vyzxnjw21ipn;
		}

		return $this->_fail();
	}

	

	
	public function write($Vh3ontjxlhd5, $Vyzxnjw21ipn)
	{
		if ( ! isset($this->_redis))
		{
			return $this->_fail();
		}
		
		elseif ($Vh3ontjxlhd5 !== $this->_session_id)
		{
			if ( ! $this->_release_lock() OR ! $this->_get_lock($Vh3ontjxlhd5))
			{
				return $this->_fail();
			}

			$this->_key_exists = FALSE;
			$this->_session_id = $Vh3ontjxlhd5;
		}

		if (isset($this->_lock_key))
		{
			$this->_redis->setTimeout($this->_lock_key, 300);
			if ($this->_fingerprint !== ($Vf3lttgchqpk = md5($Vyzxnjw21ipn)) OR $this->_key_exists === FALSE)
			{
				if ($this->_redis->set($this->_key_prefix.$Vh3ontjxlhd5, $Vyzxnjw21ipn, $this->_config['expiration']))
				{
					$this->_fingerprint = $Vf3lttgchqpk;
					$this->_key_exists = TRUE;
					return $this->_success;
				}

				return $this->_fail();
			}

			return ($this->_redis->setTimeout($this->_key_prefix.$Vh3ontjxlhd5, $this->_config['expiration']))
				? $this->_success
				: $this->_fail();
		}

		return $this->_fail();
	}

	

	
	public function close()
	{
		if (isset($this->_redis))
		{
			try {
				if ($this->_redis->ping() === '+PONG')
				{
					$this->_release_lock();
					if ($this->_redis->close() === $this->_failure)
					{
						return $this->_fail();
					}
				}
			}
			catch (RedisException $Veengl4bqqud)
			{
				log_message('error', 'Session: Got RedisException on close(): '.$Veengl4bqqud->getMessage());
			}

			$this->_redis = NULL;
			return $this->_success;
		}

		return $this->_success;
	}

	

	
	public function destroy($Vh3ontjxlhd5)
	{
		if (isset($this->_redis, $this->_lock_key))
		{
			if (($Voetc43kt2cr = $this->_redis->delete($this->_key_prefix.$Vh3ontjxlhd5)) !== 1)
			{
				log_message('debug', 'Session: Redis::delete() expected to return 1, got '.var_export($Voetc43kt2cr, TRUE).' instead.');
			}

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
			return $this->_redis->setTimeout($this->_lock_key, 300);
		}

		
		$Vv1wlxw550b4 = $this->_key_prefix.$Vh3ontjxlhd5.':lock';
		$Vygsezqztitl = 0;
		do
		{
			if (($V1nvdczefjob = $this->_redis->ttl($Vv1wlxw550b4)) > 0)
			{
				sleep(1);
				continue;
			}

			if ( ! $this->_redis->setex($Vv1wlxw550b4, 300, time()))
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
		elseif ($V1nvdczefjob === -1)
		{
			log_message('debug', 'Session: Lock for '.$this->_key_prefix.$Vh3ontjxlhd5.' had no TTL, overriding.');
		}

		$this->_lock = TRUE;
		return TRUE;
	}

	

	
	protected function _release_lock()
	{
		if (isset($this->_redis, $this->_lock_key) && $this->_lock)
		{
			if ( ! $this->_redis->delete($this->_lock_key))
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
