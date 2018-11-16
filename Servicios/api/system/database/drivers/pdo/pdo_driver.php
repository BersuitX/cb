<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_driver extends CI_DB {

	
	public $V4toindljvfg = 'pdo';

	
	public $V1flr55fnyyv = array();

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (preg_match('/([^:]+):/', $this->dsn, $V4uvjtwtgjvp) && count($V4uvjtwtgjvp) === 2)
		{
			
			
			$this->subdriver = $V4uvjtwtgjvp[1];
			return;
		}
		
		elseif (preg_match('/([^:]+):/', $this->hostname, $V4uvjtwtgjvp) && count($V4uvjtwtgjvp) === 2)
		{
			$this->dsn = $this->hostname;
			$this->hostname = NULL;
			$this->subdriver = $V4uvjtwtgjvp[1];
			return;
		}
		elseif (in_array($this->subdriver, array('mssql', 'sybase'), TRUE))
		{
			$this->subdriver = 'dblib';
		}
		elseif ($this->subdriver === '4D')
		{
			$this->subdriver = '4d';
		}
		elseif ( ! in_array($this->subdriver, array('4d', 'cubrid', 'dblib', 'firebird', 'ibm', 'informix', 'mysql', 'oci', 'odbc', 'pgsql', 'sqlite', 'sqlsrv'), TRUE))
		{
			log_message('error', 'PDO: Invalid or non-existent subdriver');

			if ($this->db_debug)
			{
				show_error('Invalid or non-existent PDO subdriver');
			}
		}

		$this->dsn = NULL;
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		$this->options[PDO::ATTR_PERSISTENT] = $Vzrtmbotfake;

		try
		{
			return new PDO($this->dsn, $this->username, $this->password, $this->options);
		}
		catch (PDOException $Veengl4bqqud)
		{
			if ($this->db_debug && empty($this->failover))
			{
				$this->display_error($Veengl4bqqud->getMessage(), '', TRUE);
			}

			return FALSE;
		}
	}

	

	
	public function version()
	{
		if (isset($this->data_cache['version']))
		{
			return $this->data_cache['version'];
		}

		
		try
		{
			return $this->data_cache['version'] = $this->conn_id->getAttribute(PDO::ATTR_SERVER_VERSION);
		}
		catch (PDOException $Veengl4bqqud)
		{
			return parent::version();
		}
	}

	

	
	protected function _execute($Vcusg10hsxxg)
	{
		return $this->conn_id->query($Vcusg10hsxxg);
	}

	

	
	protected function _trans_begin()
	{
		return $this->conn_id->beginTransaction();
	}

	

	
	protected function _trans_commit()
	{
		return $this->conn_id->commit();
	}

	

	
	protected function _trans_rollback()
	{
		return $this->conn_id->rollBack();
	}

	

	
	protected function _escape_str($Vssdjb5oqaky)
	{
		
		$Vssdjb5oqaky = $this->conn_id->quote($Vssdjb5oqaky);

		
		return ($Vssdjb5oqaky[0] === "'")
			? substr($Vssdjb5oqaky, 1, -1)
			: $Vssdjb5oqaky;
	}

	

	
	public function affected_rows()
	{
		return is_object($this->result_id) ? $this->result_id->rowCount() : 0;
	}

	

	
	public function insert_id($Vaclaigdbtoo = NULL)
	{
		return $this->conn_id->lastInsertId($Vaclaigdbtoo);
	}

	

	
	protected function _field_data($Vhyg2tjvah5t)
	{
		return 'SELECT TOP 1 * FROM '.$this->protect_identifiers($Vhyg2tjvah5t);
	}

	

	
	public function error()
	{
		$Veengl4bqqudrror = array('code' => '00000', 'message' => '');
		$Vne2hrxgiml4 = $this->conn_id->errorInfo();

		if (empty($Vne2hrxgiml4[0]))
		{
			return $Veengl4bqqudrror;
		}

		$Veengl4bqqudrror['code'] = isset($Vne2hrxgiml4[1]) ? $Vne2hrxgiml4[0].'/'.$Vne2hrxgiml4[1] : $Vne2hrxgiml4[0];
		if (isset($Vne2hrxgiml4[2]))
		{
			 $Veengl4bqqudrror['message'] = $Vne2hrxgiml4[2];
		}

		return $Veengl4bqqudrror;
	}

	

	
	protected function _update_batch($Vhyg2tjvah5t, $V3jjxja3nkgt, $Vuglyh4gwddb)
	{
		$Vyps1ncplk5i = array();
		foreach ($V3jjxja3nkgt as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vyps1ncplk5i[] = $Va4zo0rltynr[$Vuglyh4gwddb];

			foreach (array_keys($Va4zo0rltynr) as $Vwji4rxkyw5j)
			{
				if ($Vwji4rxkyw5j !== $Vuglyh4gwddb)
				{
					$Vep4ncm02uco[$Vwji4rxkyw5j][] = 'WHEN '.$Vuglyh4gwddb.' = '.$Va4zo0rltynr[$Vuglyh4gwddb].' THEN '.$Va4zo0rltynr[$Vwji4rxkyw5j];
				}
			}
		}

		$Vvz3jotncsz1 = '';
		foreach ($Vep4ncm02uco as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vvz3jotncsz1 .= $Vwyse0flpyxh.' = CASE '."\n";

			foreach ($Vxxtccqydhzn as $Vf3jo4nkd2sr)
			{
				$Vvz3jotncsz1 .= $Vf3jo4nkd2sr."\n";
			}

			$Vvz3jotncsz1 .= 'ELSE '.$Vwyse0flpyxh.' END, ';
		}

		$this->where($Vuglyh4gwddb.' IN('.implode(',', $Vyps1ncplk5i).')', NULL, FALSE);

		return 'UPDATE '.$Vhyg2tjvah5t.' SET '.substr($Vvz3jotncsz1, 0, -2).$this->_compile_wh('qb_where');
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'TRUNCATE TABLE '.$Vhyg2tjvah5t;
	}

}
