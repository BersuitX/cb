<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cache_redis extends CI_Driver
{
	
	protected static $Vdluis1gumen = array(
		'socket_type' => 'tcp',
		'host' => '127.0.0.1',
		'password' => NULL,
		'port' => 6379,
		'timeout' => 0
	);

	
	protected $V3okfuhellbq;

	
	protected $Vmg23tg3p2js = array();

	

	
	public function __construct()
	{
		if ( ! $this->is_supported())
		{
			log_message('error', 'Cache: Failed to create Redis object; extension not loaded?');
			return;
		}

		$Vgw3d0qe3dgd =& get_instance();

		if ($Vgw3d0qe3dgd->config->load('redis', TRUE, TRUE))
		{
			$Vnmcm15juye5 = array_merge(self::$Vdluis1gumen, $Vgw3d0qe3dgd->config->item('redis'));
		}
		else
		{
			$Vnmcm15juye5 = self::$Vdluis1gumen;
		}

		$this->_redis = new Redis();

		try
		{
			if ($Vnmcm15juye5['socket_type'] === 'unix')
			{
				$Vkix4taqxijy = $this->_redis->connect($Vnmcm15juye5['socket']);
			}
			else 
			{
				$Vkix4taqxijy = $this->_redis->connect($Vnmcm15juye5['host'], $Vnmcm15juye5['port'], $Vnmcm15juye5['timeout']);
			}

			if ( ! $Vkix4taqxijy)
			{
				log_message('error', 'Cache: Redis connection failed. Check your configuration.');
			}

			if (isset($Vnmcm15juye5['password']) && ! $this->_redis->auth($Vnmcm15juye5['password']))
			{
				log_message('error', 'Cache: Redis authentication failed.');
			}
		}
		catch (RedisException $Veengl4bqqud)
		{
			log_message('error', 'Cache: Redis connection refused ('.$Veengl4bqqud->getMessage().')');
		}

		
		$Vm2hdhv5dfzt = $this->_redis->sMembers('_ci_redis_serialized');
		empty($Vm2hdhv5dfzt) OR $this->_serialized = array_flip($Vm2hdhv5dfzt);
	}

	

	
	public function get($V2xim30qek4u)
	{
		$Vcnwqsowvhom = $this->_redis->get($V2xim30qek4u);

		if ($Vcnwqsowvhom !== FALSE && isset($this->_serialized[$V2xim30qek4u]))
		{
			return unserialize($Vcnwqsowvhom);
		}

		return $Vcnwqsowvhom;
	}

	

	
	public function save($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob = 60, $Vokmm2ln0ovw = FALSE)
	{
		if (is_array($Vfeinw1hsfej) OR is_object($Vfeinw1hsfej))
		{
			if ( ! $this->_redis->sIsMember('_ci_redis_serialized', $Vdrzyozqxvbr) && ! $this->_redis->sAdd('_ci_redis_serialized', $Vdrzyozqxvbr))
			{
				return FALSE;
			}

			isset($this->_serialized[$Vdrzyozqxvbr]) OR $this->_serialized[$Vdrzyozqxvbr] = TRUE;
			$Vfeinw1hsfej = serialize($Vfeinw1hsfej);
		}
		elseif (isset($this->_serialized[$Vdrzyozqxvbr]))
		{
			$this->_serialized[$Vdrzyozqxvbr] = NULL;
			$this->_redis->sRemove('_ci_redis_serialized', $Vdrzyozqxvbr);
		}

		return $this->_redis->set($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob);
	}

	

	
	public function delete($V2xim30qek4u)
	{
		if ($this->_redis->delete($V2xim30qek4u) !== 1)
		{
			return FALSE;
		}

		if (isset($this->_serialized[$V2xim30qek4u]))
		{
			$this->_serialized[$V2xim30qek4u] = NULL;
			$this->_redis->sRemove('_ci_redis_serialized', $V2xim30qek4u);
		}

		return TRUE;
	}

	

	
	public function increment($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return $this->_redis->incr($Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return $this->_redis->decr($Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function clean()
	{
		return $this->_redis->flushDB();
	}

	

	
	public function cache_info($V4wtbblc1wn4 = NULL)
	{
		return $this->_redis->info();
	}

	

	
	public function get_metadata($V2xim30qek4u)
	{
		$Vcnwqsowvhom = $this->get($V2xim30qek4u);

		if ($Vcnwqsowvhom !== FALSE)
		{
			return array(
				'expire' => time() + $this->_redis->ttl($V2xim30qek4u),
				'data' => $Vcnwqsowvhom
			);
		}

		return FALSE;
	}

	

	
	public function is_supported()
	{
		return extension_loaded('redis');
	}

	

	
	public function __destruct()
	{
		if ($this->_redis)
		{
			$this->_redis->close();
		}
	}
}
