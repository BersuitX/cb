<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cache extends CI_Driver_Library {

	
	protected $Vmnuleyeyn4g = array(
		'apc',
		'dummy',
		'file',
		'memcached',
		'redis',
		'wincache'
	);

	
	protected $Vgeafdfwapjf = NULL;

	
	protected $Vnbjtmlnydwn = 'dummy';

	
	protected $Vqiaijrppmvv = 'dummy';

	
	public $V0hrk4z5g3rn = '';

	
	public function __construct($Vnmcm15juye5 = array())
	{
		isset($Vnmcm15juye5['adapter']) && $this->_adapter = $Vnmcm15juye5['adapter'];
		isset($Vnmcm15juye5['backup']) && $this->_backup_driver = $Vnmcm15juye5['backup'];
		isset($Vnmcm15juye5['key_prefix']) && $this->key_prefix = $Vnmcm15juye5['key_prefix'];

		
		if ( ! $this->is_supported($this->_adapter))
		{
			if ( ! $this->is_supported($this->_backup_driver))
			{
				
				log_message('error', 'Cache adapter "'.$this->_adapter.'" and backup "'.$this->_backup_driver.'" are both unavailable. Cache is now using "Dummy" adapter.');
				$this->_adapter = 'dummy';
			}
			else
			{
				
				log_message('debug', 'Cache adapter "'.$this->_adapter.'" is unavailable. Falling back to "'.$this->_backup_driver.'" backup adapter.');
				$this->_adapter = $this->_backup_driver;
			}
		}
	}

	

	
	public function get($Vdrzyozqxvbr)
	{
		return $this->{$this->_adapter}->get($this->key_prefix.$Vdrzyozqxvbr);
	}

	

	
	public function save($Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob = 60, $Vokmm2ln0ovw = FALSE)
	{
		return $this->{$this->_adapter}->save($this->key_prefix.$Vdrzyozqxvbr, $Vfeinw1hsfej, $V1nvdczefjob, $Vokmm2ln0ovw);
	}

	

	
	public function delete($Vdrzyozqxvbr)
	{
		return $this->{$this->_adapter}->delete($this->key_prefix.$Vdrzyozqxvbr);
	}

	

	
	public function increment($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return $this->{$this->_adapter}->increment($this->key_prefix.$Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function decrement($Vdrzyozqxvbr, $Vzawlyjaf5xg = 1)
	{
		return $this->{$this->_adapter}->decrement($this->key_prefix.$Vdrzyozqxvbr, $Vzawlyjaf5xg);
	}

	

	
	public function clean()
	{
		return $this->{$this->_adapter}->clean();
	}

	

	
	public function cache_info($V4wtbblc1wn4 = 'user')
	{
		return $this->{$this->_adapter}->cache_info($V4wtbblc1wn4);
	}

	

	
	public function get_metadata($Vdrzyozqxvbr)
	{
		return $this->{$this->_adapter}->get_metadata($this->key_prefix.$Vdrzyozqxvbr);
	}

	

	
	public function is_supported($Vxanpyuscvfx)
	{
		static $Vxabhqd4oq13;

		if ( ! isset($Vxabhqd4oq13, $Vxabhqd4oq13[$Vxanpyuscvfx]))
		{
			$Vxabhqd4oq13[$Vxanpyuscvfx] = $this->{$Vxanpyuscvfx}->is_supported();
		}

		return $Vxabhqd4oq13[$Vxanpyuscvfx];
	}
}
