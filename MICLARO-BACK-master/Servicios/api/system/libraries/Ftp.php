<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_FTP {

	
	public $Vetnqbj4ssyj = '';

	
	public $Vlukz41rasa4 = '';

	
	public $Vpkw0q5n2gpv = '';

	
	public $Vi23rpcbpupy = 21;

	
	public $Vhcttxdzsxag = TRUE;

	
	public $Vfxdussqn32e = FALSE;

	

	
	protected $Viv0fs0wvdfd;

	

	
	public function __construct($Vnmcm15juye5 = array())
	{
		empty($Vnmcm15juye5) OR $this->initialize($Vnmcm15juye5);
		log_message('info', 'FTP Class Initialized');
	}

	

	
	public function initialize($Vnmcm15juye5 = array())
	{
		foreach ($Vnmcm15juye5 as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if (isset($this->$V2xim30qek4u))
			{
				$this->$V2xim30qek4u = $Va4zo0rltynr;
			}
		}

		
		$this->hostname = preg_replace('|.+?://|', '', $this->hostname);
	}

	

	
	public function connect($Vnmcm15juye5 = array())
	{
		if (count($Vnmcm15juye5) > 0)
		{
			$this->initialize($Vnmcm15juye5);
		}

		if (FALSE === ($this->conn_id = @ftp_connect($this->hostname, $this->port)))
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_connect');
			}

			return FALSE;
		}

		if ( ! $this->_login())
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_login');
			}

			return FALSE;
		}

		
		if ($this->passive === TRUE)
		{
			ftp_pasv($this->conn_id, TRUE);
		}

		return TRUE;
	}

	

	
	protected function _login()
	{
		return @ftp_login($this->conn_id, $this->username, $this->password);
	}

	

	
	protected function _is_conn()
	{
		if ( ! is_resource($this->conn_id))
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_no_connection');
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function changedir($Vcmaitbcbmmk, $Vxbfv2ngdo5p = FALSE)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$Voetc43kt2cr = @ftp_chdir($this->conn_id, $Vcmaitbcbmmk);

		if ($Voetc43kt2cr === FALSE)
		{
			if ($this->debug === TRUE && $Vxbfv2ngdo5p === FALSE)
			{
				$this->_error('ftp_unable_to_changedir');
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function mkdir($Vcmaitbcbmmk, $Vkosht4ropae = NULL)
	{
		if ($Vcmaitbcbmmk === '' OR ! $this->_is_conn())
		{
			return FALSE;
		}

		$Voetc43kt2cr = @ftp_mkdir($this->conn_id, $Vcmaitbcbmmk);

		if ($Voetc43kt2cr === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_mkdir');
			}

			return FALSE;
		}

		
		if ($Vkosht4ropae !== NULL)
		{
			$this->chmod($Vcmaitbcbmmk, (int) $Vkosht4ropae);
		}

		return TRUE;
	}

	

	
	public function upload($Vf2qo0h0d4ls, $Vzq4qlpwnsow, $V4wgu3onvlab = 'auto', $Vkosht4ropae = NULL)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		if ( ! file_exists($Vf2qo0h0d4ls))
		{
			$this->_error('ftp_no_source_file');
			return FALSE;
		}

		
		if ($V4wgu3onvlab === 'auto')
		{
			
			$Vifxhafjqvbp = $this->_getext($Vf2qo0h0d4ls);
			$V4wgu3onvlab = $this->_settype($Vifxhafjqvbp);
		}

		$V4wgu3onvlab = ($V4wgu3onvlab === 'ascii') ? FTP_ASCII : FTP_BINARY;

		$Voetc43kt2cr = @ftp_put($this->conn_id, $Vzq4qlpwnsow, $Vf2qo0h0d4ls, $V4wgu3onvlab);

		if ($Voetc43kt2cr === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_upload');
			}

			return FALSE;
		}

		
		if ($Vkosht4ropae !== NULL)
		{
			$this->chmod($Vzq4qlpwnsow, (int) $Vkosht4ropae);
		}

		return TRUE;
	}

	

	
	public function download($Vzq4qlpwnsow, $Vf2qo0h0d4ls, $V4wgu3onvlab = 'auto')
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		
		if ($V4wgu3onvlab === 'auto')
		{
			
			$Vifxhafjqvbp = $this->_getext($Vzq4qlpwnsow);
			$V4wgu3onvlab = $this->_settype($Vifxhafjqvbp);
		}

		$V4wgu3onvlab = ($V4wgu3onvlab === 'ascii') ? FTP_ASCII : FTP_BINARY;

		$Voetc43kt2cr = @ftp_get($this->conn_id, $Vf2qo0h0d4ls, $Vzq4qlpwnsow, $V4wgu3onvlab);

		if ($Voetc43kt2cr === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_download');
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function rename($V3vlvunnzlrd, $Vmkkb542fejp, $Vzamjwcrbn5e = FALSE)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$Voetc43kt2cr = @ftp_rename($this->conn_id, $V3vlvunnzlrd, $Vmkkb542fejp);

		if ($Voetc43kt2cr === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_'.($Vzamjwcrbn5e === FALSE ? 'rename' : 'move'));
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function move($V3vlvunnzlrd, $Vmkkb542fejp)
	{
		return $this->rename($V3vlvunnzlrd, $Vmkkb542fejp, TRUE);
	}

	

	
	public function delete_file($Vohaqukrowkd)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		$Voetc43kt2cr = @ftp_delete($this->conn_id, $Vohaqukrowkd);

		if ($Voetc43kt2cr === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_delete');
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function delete_dir($Vohaqukrowkd)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		
		$Vohaqukrowkd = preg_replace('/(.+?)\/*$/', '\\1/', $Vohaqukrowkd);

		$V1q5xkbcnn5z = $this->list_files($Vohaqukrowkd);
		if ( ! empty($V1q5xkbcnn5z))
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($V1q5xkbcnn5z); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				
				
				if ( ! preg_match('#/\.\.?$#', $V1q5xkbcnn5z[$Vep0df0xosaw]) && ! @ftp_delete($this->conn_id, $V1q5xkbcnn5z[$Vep0df0xosaw]))
				{
					$this->delete_dir($Vohaqukrowkd.$V1q5xkbcnn5z[$Vep0df0xosaw]);
				}
			}
		}

		if (@ftp_rmdir($this->conn_id, $Vohaqukrowkd) === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_delete');
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function chmod($Vcmaitbcbmmk, $V1qqvm31fkvb)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		if (@ftp_chmod($this->conn_id, $V1qqvm31fkvb, $Vcmaitbcbmmk) === FALSE)
		{
			if ($this->debug === TRUE)
			{
				$this->_error('ftp_unable_to_chmod');
			}

			return FALSE;
		}

		return TRUE;
	}

	

	
	public function list_files($Vcmaitbcbmmk = '.')
	{
		return $this->_is_conn()
			? ftp_nlist($this->conn_id, $Vcmaitbcbmmk)
			: FALSE;
	}

	

	
	public function mirror($Vf2qo0h0d4ls, $Vzq4qlpwnsow)
	{
		if ( ! $this->_is_conn())
		{
			return FALSE;
		}

		
		if ($Vzuexymrvrpz = @opendir($Vf2qo0h0d4ls))
		{
			
			if ( ! $this->changedir($Vzq4qlpwnsow, TRUE) && ( ! $this->mkdir($Vzq4qlpwnsow) OR ! $this->changedir($Vzq4qlpwnsow)))
			{
				return FALSE;
			}

			
			while (FALSE !== ($Vligofq0fb34 = readdir($Vzuexymrvrpz)))
			{
				if (is_dir($Vf2qo0h0d4ls.$Vligofq0fb34) && $Vligofq0fb34[0] !== '.')
				{
					$this->mirror($Vf2qo0h0d4ls.$Vligofq0fb34.'/', $Vzq4qlpwnsow.$Vligofq0fb34.'/');
				}
				elseif ($Vligofq0fb34[0] !== '.')
				{
					
					$Vifxhafjqvbp = $this->_getext($Vligofq0fb34);
					$V4wgu3onvlab = $this->_settype($Vifxhafjqvbp);

					$this->upload($Vf2qo0h0d4ls.$Vligofq0fb34, $Vzq4qlpwnsow.$Vligofq0fb34, $V4wgu3onvlab);
				}
			}

			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _getext($Vligofq0fb34name)
	{
		return (($Vwq1pik53kwr = strrpos($Vligofq0fb34name, '.')) === FALSE)
			? 'txt'
			: substr($Vligofq0fb34name, $Vwq1pik53kwr + 1);
	}

	

	
	protected function _settype($Vifxhafjqvbp)
	{
		return in_array($Vifxhafjqvbp, array('txt', 'text', 'php', 'phps', 'php4', 'js', 'css', 'htm', 'html', 'phtml', 'shtml', 'log', 'xml'), TRUE)
			? 'ascii'
			: 'binary';
	}

	

	
	public function close()
	{
		return $this->_is_conn()
			? @ftp_close($this->conn_id)
			: FALSE;
	}

	

	
	protected function _error($Vcfdirgq3swa)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->lang->load('ftp');
		show_error($Vgw3d0qe3dgd->lang->line($Vcfdirgq3swa));
	}

}
