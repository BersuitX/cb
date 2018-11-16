<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_DB_pdo_mysql_driver extends CI_DB_pdo_driver {

	
	public $Vr4kabix5fal = 'mysql';

	
	public $V3h0ce0jcbph = FALSE;

	
	public $Vcdj14fjn3m1;

	

	
	protected $Vnm3z344krng = '`';

	

	
	public function __construct($Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (empty($this->dsn))
		{
			$this->dsn = 'mysql:host='.(empty($this->hostname) ? '127.0.0.1' : $this->hostname);

			empty($this->port) OR $this->dsn .= ';port='.$this->port;
			empty($this->database) OR $this->dsn .= ';dbname='.$this->database;
			empty($this->char_set) OR $this->dsn .= ';charset='.$this->char_set;
		}
		elseif ( ! empty($this->char_set) && strpos($this->dsn, 'charset=', 6) === FALSE && is_php('5.3.6'))
		{
			$this->dsn .= ';charset='.$this->char_set;
		}
	}

	

	
	public function db_connect($Vzrtmbotfake = FALSE)
	{
		
		if ( ! is_php('5.3.6') && ! empty($this->char_set))
		{
			$this->options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET NAMES '.$this->char_set
				.(empty($this->dbcollat) ? '' : ' COLLATE '.$this->dbcollat);
		}

		if (isset($this->stricton))
		{
			if ($this->stricton)
			{
				$Vcusg10hsxxg = 'CONCAT(@@sql_mode, ",", "STRICT_ALL_TABLES")';
			}
			else
			{
				$Vcusg10hsxxg = 'REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
                                        @@sql_mode,
                                        "STRICT_ALL_TABLES,", ""),
                                        ",STRICT_ALL_TABLES", ""),
                                        "STRICT_ALL_TABLES", ""),
                                        "STRICT_TRANS_TABLES,", ""),
                                        ",STRICT_TRANS_TABLES", ""),
                                        "STRICT_TRANS_TABLES", "")';
			}

			if ( ! empty($Vcusg10hsxxg))
			{
				if (empty($this->options[PDO::MYSQL_ATTR_INIT_COMMAND]))
				{
					$this->options[PDO::MYSQL_ATTR_INIT_COMMAND] = 'SET SESSION sql_mode = '.$Vcusg10hsxxg;
				}
				else
				{
					$this->options[PDO::MYSQL_ATTR_INIT_COMMAND] .= ', @@session.sql_mode = '.$Vcusg10hsxxg;
				}
			}
		}

		if ($this->compress === TRUE)
		{
			$this->options[PDO::MYSQL_ATTR_COMPRESS] = TRUE;
		}

		
		if (is_array($this->encrypt) && is_php('5.3.7'))
		{
			$Vqig043bz0um = array();
			empty($this->encrypt['ssl_key'])    OR $Vqig043bz0um[PDO::MYSQL_ATTR_SSL_KEY]    = $this->encrypt['ssl_key'];
			empty($this->encrypt['ssl_cert'])   OR $Vqig043bz0um[PDO::MYSQL_ATTR_SSL_CERT]   = $this->encrypt['ssl_cert'];
			empty($this->encrypt['ssl_ca'])     OR $Vqig043bz0um[PDO::MYSQL_ATTR_SSL_CA]     = $this->encrypt['ssl_ca'];
			empty($this->encrypt['ssl_capath']) OR $Vqig043bz0um[PDO::MYSQL_ATTR_SSL_CAPATH] = $this->encrypt['ssl_capath'];
			empty($this->encrypt['ssl_cipher']) OR $Vqig043bz0um[PDO::MYSQL_ATTR_SSL_CIPHER] = $this->encrypt['ssl_cipher'];

			
			
			empty($Vqig043bz0um) OR $this->options += $Vqig043bz0um;
		}

		
		if (
			($Vpeokazypbdg = parent::db_connect($Vzrtmbotfake)) !== FALSE
			&& ! empty($Vqig043bz0um)
			&& version_compare($Vpeokazypbdg->getAttribute(PDO::ATTR_CLIENT_VERSION), '5.7.3', '<=')
			&& empty($Vpeokazypbdg->query("SHOW STATUS LIKE 'ssl_cipher'")->fetchObject()->Value)
		)
		{
			$V15xvmvzbb0h = 'PDO_MYSQL was configured for an SSL connection, but got an unencrypted connection instead!';
			log_message('error', $V15xvmvzbb0h);
			return ($this->db->db_debug) ? $this->db->display_error($V15xvmvzbb0h, '', TRUE) : FALSE;
		}

		return $Vpeokazypbdg;
	}

	

	
	public function db_select($Vvfjs0vadwyn = '')
	{
		if ($Vvfjs0vadwyn === '')
		{
			$Vvfjs0vadwyn = $this->database;
		}

		if (FALSE !== $this->simple_query('USE '.$this->escape_identifiers($Vvfjs0vadwyn)))
		{
			$this->database = $Vvfjs0vadwyn;
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _list_tables($Voyorvgwidbq = FALSE)
	{
		$Vcusg10hsxxg = 'SHOW TABLES';

		if ($Voyorvgwidbq === TRUE && $this->dbprefix !== '')
		{
			return $Vcusg10hsxxg." LIKE '".$this->escape_like_str($this->dbprefix)."%'";
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _list_columns($Vhyg2tjvah5t = '')
	{
		return 'SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
	}

	

	
	public function field_data($Vhyg2tjvah5t)
	{
		if (($Vfvggg0pmnws = $this->query('SHOW COLUMNS FROM '.$this->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE))) === FALSE)
		{
			return FALSE;
		}
		$Vfvggg0pmnws = $Vfvggg0pmnws->result_object();

		$V1qi3fii2jjy = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$V1qi3fii2jjy[$Vep0df0xosaw]			= new stdClass();
			$V1qi3fii2jjy[$Vep0df0xosaw]->name		= $Vfvggg0pmnws[$Vep0df0xosaw]->Field;

			sscanf($Vfvggg0pmnws[$Vep0df0xosaw]->Type, '%[a-z](%d)',
				$V1qi3fii2jjy[$Vep0df0xosaw]->type,
				$V1qi3fii2jjy[$Vep0df0xosaw]->max_length
			);

			$V1qi3fii2jjy[$Vep0df0xosaw]->default		= $Vfvggg0pmnws[$Vep0df0xosaw]->Default;
			$V1qi3fii2jjy[$Vep0df0xosaw]->primary_key	= (int) ($Vfvggg0pmnws[$Vep0df0xosaw]->Key === 'PRI');
		}

		return $V1qi3fii2jjy;
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'TRUNCATE '.$Vhyg2tjvah5t;
	}

	

	
	protected function _from_tables()
	{
		if ( ! empty($this->qb_join) && count($this->qb_from) > 1)
		{
			return '('.implode(', ', $this->qb_from).')';
		}

		return implode(', ', $this->qb_from);
	}

}
