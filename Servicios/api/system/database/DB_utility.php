<?php

defined('BASEPATH') OR exit('No direct script access allowed');


abstract class CI_DB_utility {

	
	protected $Vwensv4j4idw;

	

	
	protected $Vx21j431t0ux		= FALSE;

	
	protected $Vpjjq031rqsw	= FALSE;

	
	protected $Vtt4oafzhief	= FALSE;

	

	
	public function __construct(&$Vwensv4j4idw)
	{
		$this->db =& $Vwensv4j4idw;
		log_message('info', 'Database Utility Class Initialized');
	}

	

	
	public function list_databases()
	{
		
		if (isset($this->db->data_cache['db_names']))
		{
			return $this->db->data_cache['db_names'];
		}
		elseif ($this->_list_databases === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		$this->db->data_cache['db_names'] = array();

		$Vfvggg0pmnws = $this->db->query($this->_list_databases);
		if ($Vfvggg0pmnws === FALSE)
		{
			return $this->db->data_cache['db_names'];
		}

		for ($Vep0df0xosaw = 0, $Vfvggg0pmnws = $Vfvggg0pmnws->result_array(), $Vn2ycfau434s = count($Vfvggg0pmnws); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$this->db->data_cache['db_names'][] = current($Vfvggg0pmnws[$Vep0df0xosaw]);
		}

		return $this->db->data_cache['db_names'];
	}

	

	
	public function database_exists($Vrqzzqqpuazf)
	{
		return in_array($Vrqzzqqpuazf, $this->list_databases());
	}

	

	
	public function optimize_table($Vzetxgkmrrzz)
	{
		if ($this->_optimize_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		$Vfvggg0pmnws = $this->db->query(sprintf($this->_optimize_table, $this->db->escape_identifiers($Vzetxgkmrrzz)));
		if ($Vfvggg0pmnws !== FALSE)
		{
			$Vfvggg0pmnws = $Vfvggg0pmnws->result_array();
			return current($Vfvggg0pmnws);
		}

		return FALSE;
	}

	

	
	public function optimize_database()
	{
		if ($this->_optimize_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		$Voetc43kt2cr = array();
		foreach ($this->db->list_tables() as $Vzetxgkmrrzz)
		{
			$Vnb2hggtfonp = $this->db->query(sprintf($this->_optimize_table, $this->db->escape_identifiers($Vzetxgkmrrzz)));
			if (is_bool($Vnb2hggtfonp))
			{
				return $Vnb2hggtfonp;
			}

			
			$Vnb2hggtfonp = $Vnb2hggtfonp->result_array();
			$Vnb2hggtfonp = current($Vnb2hggtfonp);
			$V2xim30qek4u = str_replace($this->db->database.'.', '', current($Vnb2hggtfonp));
			$V2xim30qek4us = array_keys($Vnb2hggtfonp);
			unset($Vnb2hggtfonp[$V2xim30qek4us[0]]);

			$Voetc43kt2cr[$V2xim30qek4u] = $Vnb2hggtfonp;
		}

		return $Voetc43kt2cr;
	}

	

	
	public function repair_table($Vzetxgkmrrzz)
	{
		if ($this->_repair_table === FALSE)
		{
			return ($this->db->db_debug) ? $this->db->display_error('db_unsupported_feature') : FALSE;
		}

		$Vfvggg0pmnws = $this->db->query(sprintf($this->_repair_table, $this->db->escape_identifiers($Vzetxgkmrrzz)));
		if (is_bool($Vfvggg0pmnws))
		{
			return $Vfvggg0pmnws;
		}

		$Vfvggg0pmnws = $Vfvggg0pmnws->result_array();
		return current($Vfvggg0pmnws);
	}

	

	
	public function csv_from_result($Vfvggg0pmnws, $V30suxn5gaeq = ',', $Vkq5rgcyqdq1 = "\n", $Vzkpkpmadqo3 = '"')
	{
		if ( ! is_object($Vfvggg0pmnws) OR ! method_exists($Vfvggg0pmnws, 'list_fields'))
		{
			show_error('You must submit a valid result object');
		}

		$Vlxaqc0cx0ab = '';
		
		foreach ($Vfvggg0pmnws->list_fields() as $Vaclaigdbtoo)
		{
			$Vlxaqc0cx0ab .= $Vzkpkpmadqo3.str_replace($Vzkpkpmadqo3, $Vzkpkpmadqo3.$Vzkpkpmadqo3, $Vaclaigdbtoo).$Vzkpkpmadqo3.$V30suxn5gaeq;
		}

		$Vlxaqc0cx0ab = substr($Vlxaqc0cx0ab, 0, -strlen($V30suxn5gaeq)).$Vkq5rgcyqdq1;

		
		while ($Vf3jo4nkd2sr = $Vfvggg0pmnws->unbuffered_row('array'))
		{
			$Vcfdirgq3swa = array();
			foreach ($Vf3jo4nkd2sr as $Vep0df0xosawtem)
			{
				$Vcfdirgq3swa[] = $Vzkpkpmadqo3.str_replace($Vzkpkpmadqo3, $Vzkpkpmadqo3.$Vzkpkpmadqo3, $Vep0df0xosawtem).$Vzkpkpmadqo3;
			}
			$Vlxaqc0cx0ab .= implode($V30suxn5gaeq, $Vcfdirgq3swa).$Vkq5rgcyqdq1;
		}

		return $Vlxaqc0cx0ab;
	}

	

	
	public function xml_from_result($Vfvggg0pmnws, $Vpz5i5lfmwft = array())
	{
		if ( ! is_object($Vfvggg0pmnws) OR ! method_exists($Vfvggg0pmnws, 'list_fields'))
		{
			show_error('You must submit a valid result object');
		}

		
		foreach (array('root' => 'root', 'element' => 'element', 'newline' => "\n", 'tab' => "\t") as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if ( ! isset($Vpz5i5lfmwft[$V2xim30qek4u]))
			{
				$Vpz5i5lfmwft[$V2xim30qek4u] = $Va4zo0rltynr;
			}
		}

		
		extract($Vpz5i5lfmwft);

		
		get_instance()->load->helper('xml');

		
		$Vj4ztobx3d14 = '<'.$Vv2racxuqe3w.'>'.$Vkq5rgcyqdq1;
		while ($Vf3jo4nkd2sr = $Vfvggg0pmnws->unbuffered_row())
		{
			$Vj4ztobx3d14 .= $Vkpumbzgjysd.'<'.$V4sohn3vk0eg.'>'.$Vkq5rgcyqdq1;
			foreach ($Vf3jo4nkd2sr as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vj4ztobx3d14 .= $Vkpumbzgjysd.$Vkpumbzgjysd.'<'.$V2xim30qek4u.'>'.xml_convert($Va4zo0rltynr).'</'.$V2xim30qek4u.'>'.$Vkq5rgcyqdq1;
			}
			$Vj4ztobx3d14 .= $Vkpumbzgjysd.'</'.$V4sohn3vk0eg.'>'.$Vkq5rgcyqdq1;
		}

		return $Vj4ztobx3d14.'</'.$Vv2racxuqe3w.'>'.$Vkq5rgcyqdq1;
	}

	

	
	public function backup($Vpz5i5lfmwft = array())
	{
		
		
		
		if (is_string($Vpz5i5lfmwft))
		{
			$Vpz5i5lfmwft = array('tables' => $Vpz5i5lfmwft);
		}

		
		$Vqz2yx0xis1q = array(
			'tables'		=> array(),
			'ignore'		=> array(),
			'filename'		=> '',
			'format'		=> 'gzip', 
			'add_drop'		=> TRUE,
			'add_insert'		=> TRUE,
			'newline'		=> "\n",
			'foreign_key_checks'	=> TRUE
		);

		
		if (count($Vpz5i5lfmwft) > 0)
		{
			foreach ($Vqz2yx0xis1q as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (isset($Vpz5i5lfmwft[$V2xim30qek4u]))
				{
					$Vqz2yx0xis1q[$V2xim30qek4u] = $Vpz5i5lfmwft[$V2xim30qek4u];
				}
			}
		}

		
		
		if (count($Vqz2yx0xis1q['tables']) === 0)
		{
			$Vqz2yx0xis1q['tables'] = $this->db->list_tables();
		}

		
		if ( ! in_array($Vqz2yx0xis1q['format'], array('gzip', 'zip', 'txt'), TRUE))
		{
			$Vqz2yx0xis1q['format'] = 'txt';
		}

		
		
		if (($Vqz2yx0xis1q['format'] === 'gzip' && ! function_exists('gzencode'))
			OR ($Vqz2yx0xis1q['format'] === 'zip' && ! function_exists('gzcompress')))
		{
			if ($this->db->db_debug)
			{
				return $this->db->display_error('db_unsupported_compression');
			}

			$Vqz2yx0xis1q['format'] = 'txt';
		}

		
		if ($Vqz2yx0xis1q['format'] === 'zip')
		{
			
			if ($Vqz2yx0xis1q['filename'] === '')
			{
				$Vqz2yx0xis1q['filename'] = (count($Vqz2yx0xis1q['tables']) === 1 ? $Vqz2yx0xis1q['tables'] : $this->db->database)
							.date('Y-m-d_H-i', time()).'.sql';
			}
			else
			{
				
				if (preg_match('|.+?\.zip$|', $Vqz2yx0xis1q['filename']))
				{
					$Vqz2yx0xis1q['filename'] = str_replace('.zip', '', $Vqz2yx0xis1q['filename']);
				}

				
				if ( ! preg_match('|.+?\.sql$|', $Vqz2yx0xis1q['filename']))
				{
					$Vqz2yx0xis1q['filename'] .= '.sql';
				}
			}

			
			$Vgw3d0qe3dgd =& get_instance();
			$Vgw3d0qe3dgd->load->library('zip');
			$Vgw3d0qe3dgd->zip->add_data($Vqz2yx0xis1q['filename'], $this->_backup($Vqz2yx0xis1q));
			return $Vgw3d0qe3dgd->zip->get_zip();
		}
		elseif ($Vqz2yx0xis1q['format'] === 'txt') 
		{
			return $this->_backup($Vqz2yx0xis1q);
		}
		elseif ($Vqz2yx0xis1q['format'] === 'gzip') 
		{
			return gzencode($this->_backup($Vqz2yx0xis1q));
		}

		return;
	}

}
