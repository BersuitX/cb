<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cache_memcached extends CI_Driver {

	
	protected $Vdua3izioxz3;

	
	protected $Vxqclttgjl02 = array(
		'default' => array(
			'host'		=> '127.0.0.1',
			'port'		=> 11211,
			'weight'	=> 1
		)
	);

	

	
	public function __construct()
	{
		
		$Vgw3d0qe3dgd =& get_instance();
		$Vpoj1s2hpsj1 = $this->_config['default'];

		if ($Vgw3d0qe3dgd->config->load('memcached', TRUE, TRUE))
		{
			$this->_config = $Vgw3d0qe3dgd->config->config['memcached'];
		}

		if (class_exists('Memcached', FALSE))
		{
			$this->_memcached = new Memcached();
		}
		elseif (class_exists('Memcache', FALSE))
		{
			$this->_memcached = new Memcache();
		}
		else
		{
			log_message('error', 'Cache: Failed to create Memcache(d) object; extension not loaded?');
			return;
		}

		foreach ($this->_config as $Vo0p3abeaxjd)
		{
			isset($Vo0p3abeaxjd['hostname']) OR $Vo0p3abeaxjd['hostname'] = $Vpoj1s2hpsj1['host'];
			isset($Vo0p3abeaxjd['port']) OR $Vo0p3abeaxjd['port'] = $Vpoj1s2hpsj1['port'];
			isset($Vo0p3abeaxjd['weight']) OR $Vo0p3abeaxjd['weight'] = $Vpoj1s2hpsj1['weight'];

			if ($this->_memcached instanceof Memcache)
			{
				
				$this->_memcached->addServer(
					$Vo0p3abeaxjd['hostname'],
					$Vo0p3abeaxjd['port'],
					TRUE,
					$Vo0p3abeaxjd['weight']
				);
			}
			elseif ($this->_memcached instanceof Memcached)
			{
				$this->_memcached->addServer(
					$Vo0p3abeaxjd['hostname'],
					$Vo0p3abeaxjd['port'],
					$Vo0p3abeaxjd['weight']
				);
			}
		}
	}

	

	
	public function get($Vdrzyozqxvbr)
	{
		$Vfeinw1hsfej = $this->_memcached->get($Vdrzyozqxvbr);

		return is_array($Vfeinw1hsfej) ? $Vfeinw1hsfej[0] : $Vfeinw1hsfej;
	}

	

	
	public function save($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob = 60, $Vokmm2ln0ovw = FALSE)
	{
		if ($Vokmm2ln0ovw !== TRUE)
		{
			$Vfeinw1hsfej = array($Vfeinw1hsfej, time(), $V1nvdczefjob);
		}

		if ($this->_memcached instanceof Memcached)
		{
			return $this->_memcached->set($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob);
		}
		elseif ($this->_memcached instanceof Memcache)
		{
			return $this->_memcached->set($Vdrzyozqxvbr, $Vfeinw1hsfej, 0, $V1nvdczefjob);
		}

		return FALSE;
	}

	

	
	public function delete($Vdrzyozqxvbr)
	{
		return $this->_memcached->delete($Vdrzyozqxvbr);
	}

	

	
	public function increment($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return $this->_memcached->increment($Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return $this->_memcached->decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function clean()
	{
		return $this->_memcached->flush();
	}

	

	
	public function cache_info()
	{
		return $this->_memcached->getStats();
	}

	

	
	public function get_metadata($Vdrzyozqxvbr)
	{
		$Vd0ztm0e4gk5 = $this->_memcached->get($Vdrzyozqxvbr);

		if (count($Vd0ztm0e4gk5) !== 3)
		{
			return FALSE;
		}

		list($Vfeinw1hsfej, $Vzfk1zisr4jl, $V1nvdczefjob) = $Vd0ztm0e4gk5;

		return array(
			'expire'	=> $Vzfk1zisr4jl + $V1nvdczefjob,
			'mtime'		=> $Vzfk1zisr4jl,
			'data'		=> $Vfeinw1hsfej
		);
	}

	

	
	public function is_supported()
	{
		return (extension_loaded('memcached') OR extension_loaded('memcache'));
	}

	

	
	public function __destruct()
	{
		if ($this->_memcached instanceof Memcache)
		{
			$this->_memcached->close();
		}
		elseif ($this->_memcached instanceof Memcached)
		{
			$this->_memcached->quit();
		}
	}
}
