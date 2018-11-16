<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Driver_Library {

	
	protected $Vmnuleyeyn4g = array();

	
	protected $Vtyc1vh0voww;

	
	public function __get($Vsv3moufshkd)
	{
		
		return $this->load_driver($Vsv3moufshkd);
	}

	
	public function load_driver($Vsv3moufshkd)
	{
		
		$Vapdd0fqkaxu = config_item('subclass_prefix');

		if ( ! isset($this->lib_name))
		{
			
			$this->lib_name = str_replace(array('CI_', $Vapdd0fqkaxu), '', get_class($this));
		}

		
		$Vsv3moufshkd_name = $this->lib_name.'_'.$Vsv3moufshkd;

		
		if ( ! in_array($Vsv3moufshkd, $this->valid_drivers))
		{
			
			$Vv3gvm3x3hvm = 'Invalid driver requested: '.$Vsv3moufshkd_name;
			log_message('error', $Vv3gvm3x3hvm);
			show_error($Vv3gvm3x3hvm);
		}

		
		$Vgw3d0qe3dgd = get_instance();
		$Vng2102yhk0p = $Vgw3d0qe3dgd->load->get_package_paths(TRUE);

		
		$V0c5k5m205p1 = $Vapdd0fqkaxu.$Vsv3moufshkd_name;
		$Vxk5dnosyklz = class_exists($V0c5k5m205p1, FALSE);
		if ( ! $Vxk5dnosyklz)
		{
			
			foreach ($Vng2102yhk0p as $Vcmaitbcbmmk)
			{
				
				$Vligofq0fb34 = $Vcmaitbcbmmk.'libraries/'.$this->lib_name.'/drivers/'.$Vapdd0fqkaxu.$Vsv3moufshkd_name.'.php';
				if (file_exists($Vligofq0fb34))
				{
					
					$Vunqhxwf4ryy = BASEPATH.'libraries/'.$this->lib_name.'/drivers/'.$Vsv3moufshkd_name.'.php';
					if ( ! file_exists($Vunqhxwf4ryy))
					{
						$Vv3gvm3x3hvm = 'Unable to load the requested class: CI_'.$Vsv3moufshkd_name;
						log_message('error', $Vv3gvm3x3hvm);
						show_error($Vv3gvm3x3hvm);
					}

					
					include_once($Vunqhxwf4ryy);
					include_once($Vligofq0fb34);
					$Vxk5dnosyklz = TRUE;
					break;
				}
			}
		}

		
		if ( ! $Vxk5dnosyklz)
		{
			
			$V0c5k5m205p1 = 'CI_'.$Vsv3moufshkd_name;
			if ( ! class_exists($V0c5k5m205p1, FALSE))
			{
				
				foreach ($Vng2102yhk0p as $Vcmaitbcbmmk)
				{
					
					$Vligofq0fb34 = $Vcmaitbcbmmk.'libraries/'.$this->lib_name.'/drivers/'.$Vsv3moufshkd_name.'.php';
					if (file_exists($Vligofq0fb34))
					{
						
						include_once($Vligofq0fb34);
						break;
					}
				}
			}
		}

		
		if ( ! class_exists($V0c5k5m205p1, FALSE))
		{
			if (class_exists($Vsv3moufshkd_name, FALSE))
			{
				$V0c5k5m205p1 = $Vsv3moufshkd_name;
			}
			else
			{
				$Vv3gvm3x3hvm = 'Unable to load the requested driver: '.$V0c5k5m205p1;
				log_message('error', $Vv3gvm3x3hvm);
				show_error($Vv3gvm3x3hvm);
			}
		}

		
		$Vxc3fkadiyly = new $V0c5k5m205p1();
		$Vxc3fkadiyly->decorate($this);
		$this->$Vsv3moufshkd = $Vxc3fkadiyly;
		return $this->$Vsv3moufshkd;
	}

}




class CI_Driver {

	
	protected $Voyyv5y2rxnt;

	
	protected $V00rlxelptfy = array();

	
	protected $Vcpowtzggeg3 = array();

	
	protected static $V2itt4i23t2h = array();

	
	public function decorate($Vbvuthilojff)
	{
		$this->_parent = $Vbvuthilojff;

		
		

		$V0c5k5m205p1 = get_class($Vbvuthilojff);

		if ( ! isset(self::$V2itt4i23t2h[$V0c5k5m205p1]))
		{
			$Vyotgbgs03ci = new ReflectionObject($Vbvuthilojff);

			foreach ($Vyotgbgs03ci->getMethods() as $V5dsbozs5xhq)
			{
				if ($V5dsbozs5xhq->isPublic())
				{
					$this->_methods[] = $V5dsbozs5xhq->getName();
				}
			}

			foreach ($Vyotgbgs03ci->getProperties() as $Vxelxxx5uwdr)
			{
				if ($Vxelxxx5uwdr->isPublic())
				{
					$this->_properties[] = $Vxelxxx5uwdr->getName();
				}
			}

			self::$V2itt4i23t2h[$V0c5k5m205p1] = array($this->_methods, $this->_properties);
		}
		else
		{
			list($this->_methods, $this->_properties) = self::$V2itt4i23t2h[$V0c5k5m205p1];
		}
	}

	

	
	public function __call($V5dsbozs5xhq, $Vz3ndrbat24t = array())
	{
		if (in_array($V5dsbozs5xhq, $this->_methods))
		{
			return call_user_func_array(array($this->_parent, $V5dsbozs5xhq), $Vz3ndrbat24t);
		}

		throw new BadMethodCallException('No such method: '.$V5dsbozs5xhq.'()');
	}

	

	
	public function __get($Vdpwtnkqupxa)
	{
		if (in_array($Vdpwtnkqupxa, $this->_properties))
		{
			return $this->_parent->$Vdpwtnkqupxa;
		}
	}

	

	
	public function __set($Vdpwtnkqupxa, $Va4zo0rltynr)
	{
		if (in_array($Vdpwtnkqupxa, $this->_properties))
		{
			$this->_parent->$Vdpwtnkqupxa = $Va4zo0rltynr;
		}
	}

}
