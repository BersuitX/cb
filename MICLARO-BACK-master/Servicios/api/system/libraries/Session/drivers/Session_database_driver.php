<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Session_database_driver extends CI_Session_driver implements SessionHandlerInterface {

	
	protected $Vasm1wvpd2az;

	
	protected $Vy5lvjwus5ot = FALSE;

	
	protected $Vh0syrzxpepm;

	

	
	public function __construct(&$Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		$Vgw3d0qe3dgd =& get_instance();
		isset($Vgw3d0qe3dgd->db) OR $Vgw3d0qe3dgd->load->database();
		$this->_db = $Vgw3d0qe3dgd->db;

		if ( ! $this->_db instanceof CI_DB_query_builder)
		{
			throw new Exception('Query Builder not enabled for the configured database. Aborting.');
		}
		elseif ($this->_db->pconnect)
		{
			throw new Exception('Configured database connection is persistent. Aborting.');
		}
		elseif ($this->_db->cache_on)
		{
			throw new Exception('Configured database connection has cache enabled. Aborting.');
		}

		$V015bcjv5m5m = $this->_db->dbdriver.(empty($this->_db->subdriver) ? '' : '_'.$this->_db->subdriver);
		if (strpos($V015bcjv5m5m, 'mysql') !== FALSE)
		{
			$this->_platform = 'mysql';
		}
		elseif (in_array($V015bcjv5m5m, array('postgre', 'pdo_pgsql'), TRUE))
		{
			$this->_platform = 'postgre';
		}

		
		isset($this->_config['save_path']) OR $this->_config['save_path'] = config_item('sess_table_name');
	}

	

	
	public function open($V4rudmfad51y, $Vaclaigdbtoo)
	{
		if (empty($this->_db->conn_id) && ! $this->_db->db_connect())
		{
			return $this->_fail();
		}

		return $this->_success;
	}

	

	
	public function read($Vh3ontjxlhd5)
	{
		if ($this->_get_lock($Vh3ontjxlhd5) !== FALSE)
		{
			
			$this->_db->reset_query();

			
			$this->_session_id = $Vh3ontjxlhd5;

			$this->_db
				->select('data')
				->from($this->_config['save_path'])
				->where('id', $Vh3ontjxlhd5);

			if ($this->_config['match_ip'])
			{
				$this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);
			}

			if ( ! ($Voetc43kt2cr = $this->_db->get()) OR ($Voetc43kt2cr = $Voetc43kt2cr->row()) === NULL)
			{
				
				
				
				$this->_row_exists = FALSE;
				$this->_fingerprint = md5('');
				return '';
			}

			
			
			
			$Voetc43kt2cr = ($this->_platform === 'postgre')
				? base64_decode(rtrim($Voetc43kt2cr->data))
				: $Voetc43kt2cr->data;

			$this->_fingerprint = md5($Voetc43kt2cr);
			$this->_row_exists = TRUE;
			return $Voetc43kt2cr;
		}

		$this->_fingerprint = md5('');
		return '';
	}

	

	
	public function write($Vh3ontjxlhd5, $Vyzxnjw21ipn)
	{
		
		$this->_db->reset_query();

		
		if ($Vh3ontjxlhd5 !== $this->_session_id)
		{
			if ( ! $this->_release_lock() OR ! $this->_get_lock($Vh3ontjxlhd5))
			{
				return $this->_fail();
			}

			$this->_row_exists = FALSE;
			$this->_session_id = $Vh3ontjxlhd5;
		}
		elseif ($this->_lock === FALSE)
		{
			return $this->_fail();
		}

		if ($this->_row_exists === FALSE)
		{
			$Vblq1byomf51 = array(
				'id' => $Vh3ontjxlhd5,
				'ip_address' => $_SERVER['REMOTE_ADDR'],
				'timestamp' => time(),
				'data' => ($this->_platform === 'postgre' ? base64_encode($Vyzxnjw21ipn) : $Vyzxnjw21ipn)
			);

			if ($this->_db->insert($this->_config['save_path'], $Vblq1byomf51))
			{
				$this->_fingerprint = md5($Vyzxnjw21ipn);
				$this->_row_exists = TRUE;
				return $this->_success;
			}

			return $this->_fail();
		}

		$this->_db->where('id', $Vh3ontjxlhd5);
		if ($this->_config['match_ip'])
		{
			$this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);
		}

		$Vrvdehzlimmt = array('timestamp' => time());
		if ($this->_fingerprint !== md5($Vyzxnjw21ipn))
		{
			$Vrvdehzlimmt['data'] = ($this->_platform === 'postgre')
				? base64_encode($Vyzxnjw21ipn)
				: $Vyzxnjw21ipn;
		}

		if ($this->_db->update($this->_config['save_path'], $Vrvdehzlimmt))
		{
			$this->_fingerprint = md5($Vyzxnjw21ipn);
			return $this->_success;
		}

		return $this->_fail();
	}

	

	
	public function close()
	{
		return ($this->_lock && ! $this->_release_lock())
			? $this->_fail()
			: $this->_success;
	}

	

	
	public function destroy($Vh3ontjxlhd5)
	{
		if ($this->_lock)
		{
			
			$this->_db->reset_query();

			$this->_db->where('id', $Vh3ontjxlhd5);
			if ($this->_config['match_ip'])
			{
				$this->_db->where('ip_address', $_SERVER['REMOTE_ADDR']);
			}

			if ( ! $this->_db->delete($this->_config['save_path']))
			{
				return $this->_fail();
			}
		}

		if ($this->close() === $this->_success)
		{
			$this->_cookie_destroy();
			return $this->_success;
		}

		return $this->_fail();
	}

	

	
	public function gc($Vq25j5ef3kyx)
	{
		
		$this->_db->reset_query();

		return ($this->_db->delete($this->_config['save_path'], 'timestamp < '.(time() - $Vq25j5ef3kyx)))
			? $this->_success
			: $this->_fail();
	}

	

	
	protected function _get_lock($Vh3ontjxlhd5)
	{
		if ($this->_platform === 'mysql')
		{
			$Ve1coo2vcs1p = $Vh3ontjxlhd5.($this->_config['match_ip'] ? '_'.$_SERVER['REMOTE_ADDR'] : '');
			if ($this->_db->query("SELECT GET_LOCK('".$Ve1coo2vcs1p."', 300) AS ci_session_lock")->row()->ci_session_lock)
			{
				$this->_lock = $Ve1coo2vcs1p;
				return TRUE;
			}

			return FALSE;
		}
		elseif ($this->_platform === 'postgre')
		{
			$Ve1coo2vcs1p = "hashtext('".$Vh3ontjxlhd5."')".($this->_config['match_ip'] ? ", hashtext('".$_SERVER['REMOTE_ADDR']."')" : '');
			if ($this->_db->simple_query('SELECT pg_advisory_lock('.$Ve1coo2vcs1p.')'))
			{
				$this->_lock = $Ve1coo2vcs1p;
				return TRUE;
			}

			return FALSE;
		}

		return parent::_get_lock($Vh3ontjxlhd5);
	}

	

	
	protected function _release_lock()
	{
		if ( ! $this->_lock)
		{
			return TRUE;
		}

		if ($this->_platform === 'mysql')
		{
			if ($this->_db->query("SELECT RELEASE_LOCK('".$this->_lock."') AS ci_session_lock")->row()->ci_session_lock)
			{
				$this->_lock = FALSE;
				return TRUE;
			}

			return FALSE;
		}
		elseif ($this->_platform === 'postgre')
		{
			if ($this->_db->simple_query('SELECT pg_advisory_unlock('.$this->_lock.')'))
			{
				$this->_lock = FALSE;
				return TRUE;
			}

			return FALSE;
		}

		return parent::_release_lock();
	}
}