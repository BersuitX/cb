<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Loader {

	
	
	protected $Vpdzf1rr5vxd;

	
	protected $Vbuapfwxebms =	array(VIEWPATH	=> TRUE);

	
	protected $Vzwighvv3ukb =	array(APPPATH, BASEPATH);

	
	protected $Vrrpxzusroq4 =	array(APPPATH);

	
	protected $Vbp1delapsqy =	array(APPPATH, BASEPATH);

	
	protected $Vtvvlf24prmn =	array();

	
	protected $Vzgk54bzteq4 =	array();

	
	protected $Vocfzogmkbem =	array();

	
	protected $Vuowf2yoytgh =	array();

	
	protected $Vddr2bwn1ffu =	array(
		'unit_test' => 'unit',
		'user_agent' => 'agent'
	);

	

	
	public function __construct()
	{
		$this->_ci_ob_level = ob_get_level();
		$this->_ci_classes =& is_loaded();

		log_message('info', 'Loader Class Initialized');
	}

	

	
	public function initialize()
	{
		$this->_ci_autoloader();
	}

	

	
	public function is_loaded($Va3nq5n3hqmx)
	{
		return array_search(ucfirst($Va3nq5n3hqmx), $this->_ci_classes, TRUE);
	}

	

	
	public function library($Vs4vdun35kz4, $Vpz5i5lfmwft = NULL, $Vuqnnjkxeesj = NULL)
	{
		if (empty($Vs4vdun35kz4))
		{
			return $this;
		}
		elseif (is_array($Vs4vdun35kz4))
		{
			foreach ($Vs4vdun35kz4 as $V2xim30qek4u => $Vcnwqsowvhom)
			{
				if (is_int($V2xim30qek4u))
				{
					$this->library($Vcnwqsowvhom, $Vpz5i5lfmwft);
				}
				else
				{
					$this->library($V2xim30qek4u, $Vpz5i5lfmwft, $Vcnwqsowvhom);
				}
			}

			return $this;
		}

		if ($Vpz5i5lfmwft !== NULL && ! is_array($Vpz5i5lfmwft))
		{
			$Vpz5i5lfmwft = NULL;
		}

		$this->_ci_load_library($Vs4vdun35kz4, $Vpz5i5lfmwft, $Vuqnnjkxeesj);
		return $this;
	}

	

	
	public function model($Vadzjolgeeux, $Vaclaigdbtoo = '', $Vrqysn3kky51 = FALSE)
	{
		if (empty($Vadzjolgeeux))
		{
			return $this;
		}
		elseif (is_array($Vadzjolgeeux))
		{
			foreach ($Vadzjolgeeux as $V2xim30qek4u => $Vcnwqsowvhom)
			{
				is_int($V2xim30qek4u) ? $this->model($Vcnwqsowvhom, '', $Vrqysn3kky51) : $this->model($V2xim30qek4u, $Vcnwqsowvhom, $Vrqysn3kky51);
			}

			return $this;
		}

		$Vcmaitbcbmmk = '';

		
		if (($Vctl0zrdbllu = strrpos($Vadzjolgeeux, '/')) !== FALSE)
		{
			
			$Vcmaitbcbmmk = substr($Vadzjolgeeux, 0, ++$Vctl0zrdbllu);

			
			$Vadzjolgeeux = substr($Vadzjolgeeux, $Vctl0zrdbllu);
		}

		if (empty($Vaclaigdbtoo))
		{
			$Vaclaigdbtoo = $Vadzjolgeeux;
		}

		if (in_array($Vaclaigdbtoo, $this->_ci_models, TRUE))
		{
			return $this;
		}

		$Vgw3d0qe3dgd =& get_instance();
		if (isset($Vgw3d0qe3dgd->$Vaclaigdbtoo))
		{
			throw new RuntimeException('The model name you are loading is the name of a resource that is already being used: '.$Vaclaigdbtoo);
		}

		if ($Vrqysn3kky51 !== FALSE && ! class_exists('CI_DB', FALSE))
		{
			if ($Vrqysn3kky51 === TRUE)
			{
				$Vrqysn3kky51 = '';
			}

			$this->database($Vrqysn3kky51, FALSE, TRUE);
		}

		
		
		
		
		
		
		
		
		if ( ! class_exists('CI_Model', FALSE))
		{
			$Vooamgqh5g2k = APPPATH.'core'.DIRECTORY_SEPARATOR;
			if (file_exists($Vooamgqh5g2k.'Model.php'))
			{
				require_once($Vooamgqh5g2k.'Model.php');
				if ( ! class_exists('CI_Model', FALSE))
				{
					throw new RuntimeException($Vooamgqh5g2k."Model.php exists, but doesn't declare class CI_Model");
				}
			}
			elseif ( ! class_exists('CI_Model', FALSE))
			{
				require_once(BASEPATH.'core'.DIRECTORY_SEPARATOR.'Model.php');
			}

			$Va3nq5n3hqmx = config_item('subclass_prefix').'Model';
			if (file_exists($Vooamgqh5g2k.$Va3nq5n3hqmx.'.php'))
			{
				require_once($Vooamgqh5g2k.$Va3nq5n3hqmx.'.php');
				if ( ! class_exists($Va3nq5n3hqmx, FALSE))
				{
					throw new RuntimeException($Vooamgqh5g2k.$Va3nq5n3hqmx.".php exists, but doesn't declare class ".$Va3nq5n3hqmx);
				}
			}
		}

		$Vadzjolgeeux = ucfirst($Vadzjolgeeux);
		if ( ! class_exists($Vadzjolgeeux, FALSE))
		{
			foreach ($this->_ci_model_paths as $Vlcne44zg4ur)
			{
				if ( ! file_exists($Vlcne44zg4ur.'models/'.$Vcmaitbcbmmk.$Vadzjolgeeux.'.php'))
				{
					continue;
				}

				require_once($Vlcne44zg4ur.'models/'.$Vcmaitbcbmmk.$Vadzjolgeeux.'.php');
				if ( ! class_exists($Vadzjolgeeux, FALSE))
				{
					throw new RuntimeException($Vlcne44zg4ur."models/".$Vcmaitbcbmmk.$Vadzjolgeeux.".php exists, but doesn't declare class ".$Vadzjolgeeux);
				}

				break;
			}

			if ( ! class_exists($Vadzjolgeeux, FALSE))
			{
				throw new RuntimeException('Unable to locate the model you have specified: '.$Vadzjolgeeux);
			}
		}
		elseif ( ! is_subclass_of($Vadzjolgeeux, 'CI_Model'))
		{
			throw new RuntimeException("Class ".$Vadzjolgeeux." already exists and doesn't extend CI_Model");
		}

		$this->_ci_models[] = $Vaclaigdbtoo;
		$Vgw3d0qe3dgd->$Vaclaigdbtoo = new $Vadzjolgeeux();
		return $this;
	}

	

	
	public function database($Vpz5i5lfmwft = '', $Vb5hjbk2mbwk = FALSE, $V3nsnc1svxek = NULL)
	{
		
		$Vgw3d0qe3dgd =& get_instance();

		
		if ($Vb5hjbk2mbwk === FALSE && $V3nsnc1svxek === NULL && isset($Vgw3d0qe3dgd->db) && is_object($Vgw3d0qe3dgd->db) && ! empty($Vgw3d0qe3dgd->db->conn_id))
		{
			return FALSE;
		}

		require_once(BASEPATH.'database/DB.php');

		if ($Vb5hjbk2mbwk === TRUE)
		{
			return DB($Vpz5i5lfmwft, $V3nsnc1svxek);
		}

		
		
		$Vgw3d0qe3dgd->db = '';

		
		$Vgw3d0qe3dgd->db =& DB($Vpz5i5lfmwft, $V3nsnc1svxek);
		return $this;
	}

	

	
	public function dbutil($Vwensv4j4idw = NULL, $Vb5hjbk2mbwk = FALSE)
	{
		$Vgw3d0qe3dgd =& get_instance();

		if ( ! is_object($Vwensv4j4idw) OR ! ($Vwensv4j4idw instanceof CI_DB))
		{
			class_exists('CI_DB', FALSE) OR $this->database();
			$Vwensv4j4idw =& $Vgw3d0qe3dgd->db;
		}

		require_once(BASEPATH.'database/DB_utility.php');
		require_once(BASEPATH.'database/drivers/'.$Vwensv4j4idw->dbdriver.'/'.$Vwensv4j4idw->dbdriver.'_utility.php');
		$Va3nq5n3hqmx = 'CI_DB_'.$Vwensv4j4idw->dbdriver.'_utility';

		if ($Vb5hjbk2mbwk === TRUE)
		{
			return new $Va3nq5n3hqmx($Vwensv4j4idw);
		}

		$Vgw3d0qe3dgd->dbutil = new $Va3nq5n3hqmx($Vwensv4j4idw);
		return $this;
	}

	

	
	public function dbforge($Vwensv4j4idw = NULL, $Vb5hjbk2mbwk = FALSE)
	{
		$Vgw3d0qe3dgd =& get_instance();
		if ( ! is_object($Vwensv4j4idw) OR ! ($Vwensv4j4idw instanceof CI_DB))
		{
			class_exists('CI_DB', FALSE) OR $this->database();
			$Vwensv4j4idw =& $Vgw3d0qe3dgd->db;
		}

		require_once(BASEPATH.'database/DB_forge.php');
		require_once(BASEPATH.'database/drivers/'.$Vwensv4j4idw->dbdriver.'/'.$Vwensv4j4idw->dbdriver.'_forge.php');

		if ( ! empty($Vwensv4j4idw->subdriver))
		{
			$Vy1gi0c4x4p2 = BASEPATH.'database/drivers/'.$Vwensv4j4idw->dbdriver.'/subdrivers/'.$Vwensv4j4idw->dbdriver.'_'.$Vwensv4j4idw->subdriver.'_forge.php';
			if (file_exists($Vy1gi0c4x4p2))
			{
				require_once($Vy1gi0c4x4p2);
				$Va3nq5n3hqmx = 'CI_DB_'.$Vwensv4j4idw->dbdriver.'_'.$Vwensv4j4idw->subdriver.'_forge';
			}
		}
		else
		{
			$Va3nq5n3hqmx = 'CI_DB_'.$Vwensv4j4idw->dbdriver.'_forge';
		}

		if ($Vb5hjbk2mbwk === TRUE)
		{
			return new $Va3nq5n3hqmx($Vwensv4j4idw);
		}

		$Vgw3d0qe3dgd->dbforge = new $Va3nq5n3hqmx($Vwensv4j4idw);
		return $this;
	}

	

	
	public function view($Vfqs0erifirb, $Vdu3eo4quflk = array(), $Vb5hjbk2mbwk = FALSE)
	{
		return $this->_ci_load(array('_ci_view' => $Vfqs0erifirb, '_ci_vars' => $this->_ci_object_to_array($Vdu3eo4quflk), '_ci_return' => $Vb5hjbk2mbwk));
	}

	

	
	public function file($Vcmaitbcbmmk, $Vb5hjbk2mbwk = FALSE)
	{
		return $this->_ci_load(array('_ci_path' => $Vcmaitbcbmmk, '_ci_return' => $Vb5hjbk2mbwk));
	}

	

	
	public function vars($Vdu3eo4quflk, $Va4zo0rltynr = '')
	{
		if (is_string($Vdu3eo4quflk))
		{
			$Vdu3eo4quflk = array($Vdu3eo4quflk => $Va4zo0rltynr);
		}

		$Vdu3eo4quflk = $this->_ci_object_to_array($Vdu3eo4quflk);

		if (is_array($Vdu3eo4quflk) && count($Vdu3eo4quflk) > 0)
		{
			foreach ($Vdu3eo4quflk as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$this->_ci_cached_vars[$V2xim30qek4u] = $Va4zo0rltynr;
			}
		}

		return $this;
	}

	

	
	public function clear_vars()
	{
		$this->_ci_cached_vars = array();
		return $this;
	}

	

	
	public function get_var($V2xim30qek4u)
	{
		return isset($this->_ci_cached_vars[$V2xim30qek4u]) ? $this->_ci_cached_vars[$V2xim30qek4u] : NULL;
	}

	

	
	public function get_vars()
	{
		return $this->_ci_cached_vars;
	}

	

	
	public function helper($Vi2pwtb1ydcj = array())
	{
		foreach ($this->_ci_prep_filename($Vi2pwtb1ydcj, '_helper') as $Vkw5y2vce1o3)
		{
			if (isset($this->_ci_helpers[$Vkw5y2vce1o3]))
			{
				continue;
			}

			
			$Vuwv5udwdwzs = config_item('subclass_prefix').$Vkw5y2vce1o3;
			$Vubicysls2kk = FALSE;
			foreach ($this->_ci_helper_paths as $Vcmaitbcbmmk)
			{
				if (file_exists($Vcmaitbcbmmk.'helpers/'.$Vuwv5udwdwzs.'.php'))
				{
					include_once($Vcmaitbcbmmk.'helpers/'.$Vuwv5udwdwzs.'.php');
					$Vubicysls2kk = TRUE;
				}
			}

			
			if ($Vubicysls2kk === TRUE)
			{
				$Vrhsw2wypuwz = BASEPATH.'helpers/'.$Vkw5y2vce1o3.'.php';
				if ( ! file_exists($Vrhsw2wypuwz))
				{
					show_error('Unable to load the requested file: helpers/'.$Vkw5y2vce1o3.'.php');
				}

				include_once($Vrhsw2wypuwz);
				$this->_ci_helpers[$Vkw5y2vce1o3] = TRUE;
				log_message('info', 'Helper loaded: '.$Vkw5y2vce1o3);
				continue;
			}

			
			foreach ($this->_ci_helper_paths as $Vcmaitbcbmmk)
			{
				if (file_exists($Vcmaitbcbmmk.'helpers/'.$Vkw5y2vce1o3.'.php'))
				{
					include_once($Vcmaitbcbmmk.'helpers/'.$Vkw5y2vce1o3.'.php');

					$this->_ci_helpers[$Vkw5y2vce1o3] = TRUE;
					log_message('info', 'Helper loaded: '.$Vkw5y2vce1o3);
					break;
				}
			}

			
			if ( ! isset($this->_ci_helpers[$Vkw5y2vce1o3]))
			{
				show_error('Unable to load the requested file: helpers/'.$Vkw5y2vce1o3.'.php');
			}
		}

		return $this;
	}

	

	
	public function helpers($Vi2pwtb1ydcj = array())
	{
		return $this->helper($Vi2pwtb1ydcj);
	}

	

	
	public function language($V22l3ub11oll, $V0epxtzjncyc = '')
	{
		get_instance()->lang->load($V22l3ub11oll, $V0epxtzjncyc);
		return $this;
	}

	

	
	public function config($Vligofq0fb34, $Vjwurk1sjs1c = FALSE, $Vt4pj4rhqzjl = FALSE)
	{
		return get_instance()->config->load($Vligofq0fb34, $Vjwurk1sjs1c, $Vt4pj4rhqzjl);
	}

	

	
	public function driver($Vs4vdun35kz4, $Vpz5i5lfmwft = NULL, $Vuqnnjkxeesj = NULL)
	{
		if (is_array($Vs4vdun35kz4))
		{
			foreach ($Vs4vdun35kz4 as $V2xim30qek4u => $Vcnwqsowvhom)
			{
				if (is_int($V2xim30qek4u))
				{
					$this->driver($Vcnwqsowvhom, $Vpz5i5lfmwft);
				}
				else
				{
					$this->driver($V2xim30qek4u, $Vpz5i5lfmwft, $Vcnwqsowvhom);
				}
			}

			return $this;
		}
		elseif (empty($Vs4vdun35kz4))
		{
			return FALSE;
		}

		if ( ! class_exists('CI_Driver_Library', FALSE))
		{
			
			require BASEPATH.'libraries/Driver.php';
		}

		
		
		if ( ! strpos($Vs4vdun35kz4, '/'))
		{
			$Vs4vdun35kz4 = ucfirst($Vs4vdun35kz4).'/'.$Vs4vdun35kz4;
		}

		return $this->library($Vs4vdun35kz4, $Vpz5i5lfmwft, $Vuqnnjkxeesj);
	}

	

	
	public function add_package_path($Vcmaitbcbmmk, $Vfqs0erifirb_cascade = TRUE)
	{
		$Vcmaitbcbmmk = rtrim($Vcmaitbcbmmk, '/').'/';

		array_unshift($this->_ci_library_paths, $Vcmaitbcbmmk);
		array_unshift($this->_ci_model_paths, $Vcmaitbcbmmk);
		array_unshift($this->_ci_helper_paths, $Vcmaitbcbmmk);

		$this->_ci_view_paths = array($Vcmaitbcbmmk.'views/' => $Vfqs0erifirb_cascade) + $this->_ci_view_paths;

		
		$Vnmcm15juye5 =& $this->_ci_get_component('config');
		$Vnmcm15juye5->_config_paths[] = $Vcmaitbcbmmk;

		return $this;
	}

	

	
	public function get_package_paths($Vwurvdzl01r5 = FALSE)
	{
		return ($Vwurvdzl01r5 === TRUE) ? $this->_ci_library_paths : $this->_ci_model_paths;
	}

	

	
	public function remove_package_path($Vcmaitbcbmmk = '')
	{
		$Vnmcm15juye5 =& $this->_ci_get_component('config');

		if ($Vcmaitbcbmmk === '')
		{
			array_shift($this->_ci_library_paths);
			array_shift($this->_ci_model_paths);
			array_shift($this->_ci_helper_paths);
			array_shift($this->_ci_view_paths);
			array_pop($Vnmcm15juye5->_config_paths);
		}
		else
		{
			$Vcmaitbcbmmk = rtrim($Vcmaitbcbmmk, '/').'/';
			foreach (array('_ci_library_paths', '_ci_model_paths', '_ci_helper_paths') as $Vdpwtnkqupxa)
			{
				if (($V2xim30qek4u = array_search($Vcmaitbcbmmk, $this->{$Vdpwtnkqupxa})) !== FALSE)
				{
					unset($this->{$Vdpwtnkqupxa}[$V2xim30qek4u]);
				}
			}

			if (isset($this->_ci_view_paths[$Vcmaitbcbmmk.'views/']))
			{
				unset($this->_ci_view_paths[$Vcmaitbcbmmk.'views/']);
			}

			if (($V2xim30qek4u = array_search($Vcmaitbcbmmk, $Vnmcm15juye5->_config_paths)) !== FALSE)
			{
				unset($Vnmcm15juye5->_config_paths[$V2xim30qek4u]);
			}
		}

		
		$this->_ci_library_paths = array_unique(array_merge($this->_ci_library_paths, array(APPPATH, BASEPATH)));
		$this->_ci_helper_paths = array_unique(array_merge($this->_ci_helper_paths, array(APPPATH, BASEPATH)));
		$this->_ci_model_paths = array_unique(array_merge($this->_ci_model_paths, array(APPPATH)));
		$this->_ci_view_paths = array_merge($this->_ci_view_paths, array(APPPATH.'views/' => TRUE));
		$Vnmcm15juye5->_config_paths = array_unique(array_merge($Vnmcm15juye5->_config_paths, array(APPPATH)));

		return $this;
	}

	

	
	protected function _ci_load($Varexrfpr0v2)
	{
		
		foreach (array('_ci_view', '_ci_vars', '_ci_path', '_ci_return') as $Vqwu211jyte1)
		{
			$$Vqwu211jyte1 = isset($Varexrfpr0v2[$Vqwu211jyte1]) ? $Varexrfpr0v2[$Vqwu211jyte1] : FALSE;
		}

		$Vligofq0fb34_exists = FALSE;

		
		if (is_string($Vkvgbng1gf33) && $Vkvgbng1gf33 !== '')
		{
			$Vlrrettgw3wc = explode('/', $Vkvgbng1gf33);
			$Vgmdkgbngkbk = end($Vlrrettgw3wc);
		}
		else
		{
			$Vupkyxx5mzag = pathinfo($Vty4wgaqkmn3, PATHINFO_EXTENSION);
			$Vgmdkgbngkbk = ($Vupkyxx5mzag === '') ? $Vty4wgaqkmn3.'.php' : $Vty4wgaqkmn3;

			foreach ($this->_ci_view_paths as $Vty4wgaqkmn3_file => $Vvyajvgoqm2r)
			{
				if (file_exists($Vty4wgaqkmn3_file.$Vgmdkgbngkbk))
				{
					$Vkvgbng1gf33 = $Vty4wgaqkmn3_file.$Vgmdkgbngkbk;
					$Vligofq0fb34_exists = TRUE;
					break;
				}

				if ( ! $Vvyajvgoqm2r)
				{
					break;
				}
			}
		}

		if ( ! $Vligofq0fb34_exists && ! file_exists($Vkvgbng1gf33))
		{
			show_error('Unable to load the requested file: '.$Vgmdkgbngkbk);
		}

		
		
		$Voaahifgtnbr =& get_instance();
		foreach (get_object_vars($Voaahifgtnbr) as $Vstmud1ehnwy => $V4ua3mi1mdab)
		{
			if ( ! isset($this->$Vstmud1ehnwy))
			{
				$this->$Vstmud1ehnwy =& $Voaahifgtnbr->$Vstmud1ehnwy;
			}
		}

		
		if (is_array($V4ua3mi1mdabs))
		{
			foreach (array_keys($V4ua3mi1mdabs) as $V2xim30qek4u)
			{
				if (strncmp($V2xim30qek4u, '_ci_', 4) === 0)
				{
					unset($V4ua3mi1mdabs[$V2xim30qek4u]);
				}
			}

			$this->_ci_cached_vars = array_merge($this->_ci_cached_vars, $V4ua3mi1mdabs);
		}
		extract($this->_ci_cached_vars);

		
		ob_start();

		
		
		
		if ( ! is_php('5.4') && ! ini_get('short_open_tag') && config_item('rewrite_short_tags') === TRUE)
		{
			echo eval('?>'.preg_replace('/;*\s*\?>/', '; ?>', str_replace('<?=', '<?php echo ', file_get_contents($Vkvgbng1gf33))));
		}
		else
		{
			include($Vkvgbng1gf33); 
		}

		log_message('info', 'File loaded: '.$Vkvgbng1gf33);

		
		if ($Vgvmiu0zf5px === TRUE)
		{
			$Vkfvai0yofrh = ob_get_contents();
			@ob_end_clean();
			return $Vkfvai0yofrh;
		}

		
		if (ob_get_level() > $this->_ci_ob_level + 1)
		{
			ob_end_flush();
		}
		else
		{
			$Voaahifgtnbr->output->append_output(ob_get_contents());
			@ob_end_clean();
		}

		return $this;
	}

	

	
	protected function _ci_load_library($Va3nq5n3hqmx, $Vpz5i5lfmwft = NULL, $Vuqnnjkxeesj = NULL)
	{
		
		
		
		$Va3nq5n3hqmx = str_replace('.php', '', trim($Va3nq5n3hqmx, '/'));

		
		
		if (($Vctl0zrdbllu = strrpos($Va3nq5n3hqmx, '/')) !== FALSE)
		{
			
			$Vvnlreqa1pxl = substr($Va3nq5n3hqmx, 0, ++$Vctl0zrdbllu);

			
			$Va3nq5n3hqmx = substr($Va3nq5n3hqmx, $Vctl0zrdbllu);
		}
		else
		{
			$Vvnlreqa1pxl = '';
		}

		$Va3nq5n3hqmx = ucfirst($Va3nq5n3hqmx);

		
		if (file_exists(BASEPATH.'libraries/'.$Vvnlreqa1pxl.$Va3nq5n3hqmx.'.php'))
		{
			return $this->_ci_load_stock_library($Va3nq5n3hqmx, $Vvnlreqa1pxl, $Vpz5i5lfmwft, $Vuqnnjkxeesj);
		}

		
		foreach ($this->_ci_library_paths as $Vcmaitbcbmmk)
		{
			
			if ($Vcmaitbcbmmk === BASEPATH)
			{
				continue;
			}

			$Vligofq0fb34path = $Vcmaitbcbmmk.'libraries/'.$Vvnlreqa1pxl.$Va3nq5n3hqmx.'.php';

			
			if (class_exists($Va3nq5n3hqmx, FALSE))
			{
				
				
				
				if ($Vuqnnjkxeesj !== NULL)
				{
					$Vgw3d0qe3dgd =& get_instance();
					if ( ! isset($Vgw3d0qe3dgd->$Vuqnnjkxeesj))
					{
						return $this->_ci_init_library($Va3nq5n3hqmx, '', $Vpz5i5lfmwft, $Vuqnnjkxeesj);
					}
				}

				log_message('debug', $Va3nq5n3hqmx.' class already loaded. Second attempt ignored.');
				return;
			}
			
			elseif ( ! file_exists($Vligofq0fb34path))
			{
				continue;
			}

			include_once($Vligofq0fb34path);
			return $this->_ci_init_library($Va3nq5n3hqmx, '', $Vpz5i5lfmwft, $Vuqnnjkxeesj);
		}

		
		if ($Vvnlreqa1pxl === '')
		{
			return $this->_ci_load_library($Va3nq5n3hqmx.'/'.$Va3nq5n3hqmx, $Vpz5i5lfmwft, $Vuqnnjkxeesj);
		}

		
		log_message('error', 'Unable to load the requested class: '.$Va3nq5n3hqmx);
		show_error('Unable to load the requested class: '.$Va3nq5n3hqmx);
	}

	

	
	protected function _ci_load_stock_library($Vs4vdun35kz4_name, $Vligofq0fb34_path, $Vpz5i5lfmwft, $Vuqnnjkxeesj)
	{
		$Vapdd0fqkaxu = 'CI_';

		if (class_exists($Vapdd0fqkaxu.$Vs4vdun35kz4_name, FALSE))
		{
			if (class_exists(config_item('subclass_prefix').$Vs4vdun35kz4_name, FALSE))
			{
				$Vapdd0fqkaxu = config_item('subclass_prefix');
			}

			
			
			
			if ($Vuqnnjkxeesj !== NULL)
			{
				$Vgw3d0qe3dgd =& get_instance();
				if ( ! isset($Vgw3d0qe3dgd->$Vuqnnjkxeesj))
				{
					return $this->_ci_init_library($Vs4vdun35kz4_name, $Vapdd0fqkaxu, $Vpz5i5lfmwft, $Vuqnnjkxeesj);
				}
			}

			log_message('debug', $Vs4vdun35kz4_name.' class already loaded. Second attempt ignored.');
			return;
		}

		$Vcmaitbcbmmks = $this->_ci_library_paths;
		array_pop($Vcmaitbcbmmks); 
		array_pop($Vcmaitbcbmmks); 
		array_unshift($Vcmaitbcbmmks, APPPATH);

		foreach ($Vcmaitbcbmmks as $Vcmaitbcbmmk)
		{
			if (file_exists($Vcmaitbcbmmk = $Vcmaitbcbmmk.'libraries/'.$Vligofq0fb34_path.$Vs4vdun35kz4_name.'.php'))
			{
				
				include_once($Vcmaitbcbmmk);
				if (class_exists($Vapdd0fqkaxu.$Vs4vdun35kz4_name, FALSE))
				{
					return $this->_ci_init_library($Vs4vdun35kz4_name, $Vapdd0fqkaxu, $Vpz5i5lfmwft, $Vuqnnjkxeesj);
				}
				else
				{
					log_message('debug', $Vcmaitbcbmmk.' exists, but does not declare '.$Vapdd0fqkaxu.$Vs4vdun35kz4_name);
				}
			}
		}

		include_once(BASEPATH.'libraries/'.$Vligofq0fb34_path.$Vs4vdun35kz4_name.'.php');

		
		$Vr4u5dew05j3 = config_item('subclass_prefix').$Vs4vdun35kz4_name;
		foreach ($Vcmaitbcbmmks as $Vcmaitbcbmmk)
		{
			if (file_exists($Vcmaitbcbmmk = $Vcmaitbcbmmk.'libraries/'.$Vligofq0fb34_path.$Vr4u5dew05j3.'.php'))
			{
				include_once($Vcmaitbcbmmk);
				if (class_exists($Vr4u5dew05j3, FALSE))
				{
					$Vapdd0fqkaxu = config_item('subclass_prefix');
					break;
				}
				else
				{
					log_message('debug', $Vcmaitbcbmmk.' exists, but does not declare '.$Vr4u5dew05j3);
				}
			}
		}

		return $this->_ci_init_library($Vs4vdun35kz4_name, $Vapdd0fqkaxu, $Vpz5i5lfmwft, $Vuqnnjkxeesj);
	}

	

	
	protected function _ci_init_library($Va3nq5n3hqmx, $Vapdd0fqkaxu, $Vnmcm15juye5 = FALSE, $Vuqnnjkxeesj = NULL)
	{
		
		if ($Vnmcm15juye5 === NULL)
		{
			
			$Vnmcm15juye5_component = $this->_ci_get_component('config');

			if (is_array($Vnmcm15juye5_component->_config_paths))
			{
				$Vxk5dnosyklz = FALSE;
				foreach ($Vnmcm15juye5_component->_config_paths as $Vcmaitbcbmmk)
				{
					
					
					
					if (file_exists($Vcmaitbcbmmk.'config/'.strtolower($Va3nq5n3hqmx).'.php'))
					{
						include($Vcmaitbcbmmk.'config/'.strtolower($Va3nq5n3hqmx).'.php');
						$Vxk5dnosyklz = TRUE;
					}
					elseif (file_exists($Vcmaitbcbmmk.'config/'.ucfirst(strtolower($Va3nq5n3hqmx)).'.php'))
					{
						include($Vcmaitbcbmmk.'config/'.ucfirst(strtolower($Va3nq5n3hqmx)).'.php');
						$Vxk5dnosyklz = TRUE;
					}

					if (file_exists($Vcmaitbcbmmk.'config/'.ENVIRONMENT.'/'.strtolower($Va3nq5n3hqmx).'.php'))
					{
						include($Vcmaitbcbmmk.'config/'.ENVIRONMENT.'/'.strtolower($Va3nq5n3hqmx).'.php');
						$Vxk5dnosyklz = TRUE;
					}
					elseif (file_exists($Vcmaitbcbmmk.'config/'.ENVIRONMENT.'/'.ucfirst(strtolower($Va3nq5n3hqmx)).'.php'))
					{
						include($Vcmaitbcbmmk.'config/'.ENVIRONMENT.'/'.ucfirst(strtolower($Va3nq5n3hqmx)).'.php');
						$Vxk5dnosyklz = TRUE;
					}

					
					
					if ($Vxk5dnosyklz === TRUE)
					{
						break;
					}
				}
			}
		}

		$Va3nq5n3hqmx_name = $Vapdd0fqkaxu.$Va3nq5n3hqmx;

		
		if ( ! class_exists($Va3nq5n3hqmx_name, FALSE))
		{
			log_message('error', 'Non-existent class: '.$Va3nq5n3hqmx_name);
			show_error('Non-existent class: '.$Va3nq5n3hqmx_name);
		}

		
		
		if (empty($Vuqnnjkxeesj))
		{
			$Vuqnnjkxeesj = strtolower($Va3nq5n3hqmx);
			if (isset($this->_ci_varmap[$Vuqnnjkxeesj]))
			{
				$Vuqnnjkxeesj = $this->_ci_varmap[$Vuqnnjkxeesj];
			}
		}

		
		$Vgw3d0qe3dgd =& get_instance();
		if (isset($Vgw3d0qe3dgd->$Vuqnnjkxeesj))
		{
			if ($Vgw3d0qe3dgd->$Vuqnnjkxeesj instanceof $Va3nq5n3hqmx_name)
			{
				log_message('debug', $Va3nq5n3hqmx_name." has already been instantiated as '".$Vuqnnjkxeesj."'. Second attempt aborted.");
				return;
			}

			show_error("Resource '".$Vuqnnjkxeesj."' already exists and is not a ".$Va3nq5n3hqmx_name." instance.");
		}

		
		$this->_ci_classes[$Vuqnnjkxeesj] = $Va3nq5n3hqmx;

		
		$Vgw3d0qe3dgd->$Vuqnnjkxeesj = isset($Vnmcm15juye5)
			? new $Va3nq5n3hqmx_name($Vnmcm15juye5)
			: new $Va3nq5n3hqmx_name();
	}

	

	
	protected function _ci_autoloader()
	{
		if (file_exists(APPPATH.'config/autoload.php'))
		{
			include(APPPATH.'config/autoload.php');
		}

		if (file_exists(APPPATH.'config/'.ENVIRONMENT.'/autoload.php'))
		{
			include(APPPATH.'config/'.ENVIRONMENT.'/autoload.php');
		}

		if ( ! isset($Vpjdan4sxhq4))
		{
			return;
		}

		
		if (isset($Vpjdan4sxhq4['packages']))
		{
			foreach ($Vpjdan4sxhq4['packages'] as $Vtrusxprkqvs)
			{
				$this->add_package_path($Vtrusxprkqvs);
			}
		}

		
		if (count($Vpjdan4sxhq4['config']) > 0)
		{
			foreach ($Vpjdan4sxhq4['config'] as $Va4zo0rltynr)
			{
				$this->config($Va4zo0rltynr);
			}
		}

		
		foreach (array('helper', 'language') as $V4wtbblc1wn4)
		{
			if (isset($Vpjdan4sxhq4[$V4wtbblc1wn4]) && count($Vpjdan4sxhq4[$V4wtbblc1wn4]) > 0)
			{
				$this->$V4wtbblc1wn4($Vpjdan4sxhq4[$V4wtbblc1wn4]);
			}
		}

		
		if (isset($Vpjdan4sxhq4['drivers']))
		{
			$this->driver($Vpjdan4sxhq4['drivers']);
		}

		
		if (isset($Vpjdan4sxhq4['libraries']) && count($Vpjdan4sxhq4['libraries']) > 0)
		{
			
			if (in_array('database', $Vpjdan4sxhq4['libraries']))
			{
				$this->database();
				$Vpjdan4sxhq4['libraries'] = array_diff($Vpjdan4sxhq4['libraries'], array('database'));
			}

			
			$this->library($Vpjdan4sxhq4['libraries']);
		}

		
		if (isset($Vpjdan4sxhq4['model']))
		{
			$this->model($Vpjdan4sxhq4['model']);
		}
	}

	

	
	protected function _ci_object_to_array($V1v3xsp031u0)
	{
		return is_object($V1v3xsp031u0) ? get_object_vars($V1v3xsp031u0) : $V1v3xsp031u0;
	}

	

	
	protected function &_ci_get_component($Vpw53k0t1ka5)
	{
		$Vgw3d0qe3dgd =& get_instance();
		return $Vgw3d0qe3dgd->$Vpw53k0t1ka5;
	}

	

	
	protected function _ci_prep_filename($Vligofq0fb34name, $V4ixvjm4swlr)
	{
		if ( ! is_array($Vligofq0fb34name))
		{
			return array(strtolower(str_replace(array($V4ixvjm4swlr, '.php'), '', $Vligofq0fb34name).$V4ixvjm4swlr));
		}
		else
		{
			foreach ($Vligofq0fb34name as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vligofq0fb34name[$V2xim30qek4u] = strtolower(str_replace(array($V4ixvjm4swlr, '.php'), '', $Va4zo0rltynr).$V4ixvjm4swlr);
			}

			return $Vligofq0fb34name;
		}
	}

}
