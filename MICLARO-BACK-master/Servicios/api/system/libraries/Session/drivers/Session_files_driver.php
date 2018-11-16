<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Session_files_driver extends CI_Session_driver implements SessionHandlerInterface {

	
	protected $Vd3k34xfqa5q;

	
	protected $V3j0wqswrdrt;

	
	protected $Vzm31s0wg0xv;

	
	protected $Vbeflotzmctp;

	

	
	public function __construct(&$Vpz5i5lfmwft)
	{
		parent::__construct($Vpz5i5lfmwft);

		if (isset($this->_config['save_path']))
		{
			$this->_config['save_path'] = rtrim($this->_config['save_path'], '/\\');
			ini_set('session.save_path', $this->_config['save_path']);
		}
		else
		{
			$this->_config['save_path'] = rtrim(ini_get('session.save_path'), '/\\');
		}
	}

	

	
	public function open($V4rudmfad51y, $Vaclaigdbtoo)
	{
		if ( ! is_dir($V4rudmfad51y))
		{
			if ( ! mkdir($V4rudmfad51y, 0700, TRUE))
			{
				throw new Exception("Session: Configured save path '".$this->_config['save_path']."' is not a directory, doesn't exist or cannot be created.");
			}
		}
		elseif ( ! is_writable($V4rudmfad51y))
		{
			throw new Exception("Session: Configured save path '".$this->_config['save_path']."' is not writable by the PHP process.");
		}

		$this->_config['save_path'] = $V4rudmfad51y;
		$this->_file_path = $this->_config['save_path'].DIRECTORY_SEPARATOR
			.$Vaclaigdbtoo 
			.($this->_config['match_ip'] ? md5($_SERVER['REMOTE_ADDR']) : '');

		return $this->_success;
	}

	

	
	public function read($Vh3ontjxlhd5)
	{
		
		
		if ($this->_file_handle === NULL)
		{
			
			
			
			if (($this->_file_new = ! file_exists($this->_file_path.$Vh3ontjxlhd5)) === TRUE)
			{
				if (($this->_file_handle = fopen($this->_file_path.$Vh3ontjxlhd5, 'w+b')) === FALSE)
				{
					log_message('error', "Session: File '".$this->_file_path.$Vh3ontjxlhd5."' doesn't exist and cannot be created.");
					return $this->_failure;
				}
			}
			elseif (($this->_file_handle = fopen($this->_file_path.$Vh3ontjxlhd5, 'r+b')) === FALSE)
			{
				log_message('error', "Session: Unable to open file '".$this->_file_path.$Vh3ontjxlhd5."'.");
				return $this->_failure;
			}

			if (flock($this->_file_handle, LOCK_EX) === FALSE)
			{
				log_message('error', "Session: Unable to obtain lock for file '".$this->_file_path.$Vh3ontjxlhd5."'.");
				fclose($this->_file_handle);
				$this->_file_handle = NULL;
				return $this->_failure;
			}

			
			$this->_session_id = $Vh3ontjxlhd5;

			if ($this->_file_new)
			{
				chmod($this->_file_path.$Vh3ontjxlhd5, 0600);
				$this->_fingerprint = md5('');
				return '';
			}
		}
		
		
		elseif ($this->_file_handle === FALSE)
		{
			return $this->_failure;
		}
		else
		{
			rewind($this->_file_handle);
		}

		$Vyzxnjw21ipn = '';
		for ($Vg4dzkdbpvut = 0, $Vgdtiboyfq04 = filesize($this->_file_path.$Vh3ontjxlhd5); $Vg4dzkdbpvut < $Vgdtiboyfq04; $Vg4dzkdbpvut += strlen($Vkfvai0yofrh))
		{
			if (($Vkfvai0yofrh = fread($this->_file_handle, $Vgdtiboyfq04 - $Vg4dzkdbpvut)) === FALSE)
			{
				break;
			}

			$Vyzxnjw21ipn .= $Vkfvai0yofrh;
		}

		$this->_fingerprint = md5($Vyzxnjw21ipn);
		return $Vyzxnjw21ipn;
	}

	

	
	public function write($Vh3ontjxlhd5, $Vyzxnjw21ipn)
	{
		
		
		if ($Vh3ontjxlhd5 !== $this->_session_id && ($this->close() === $this->_failure OR $this->read($Vh3ontjxlhd5) === $this->_failure))
		{
			return $this->_failure;
		}

		if ( ! is_resource($this->_file_handle))
		{
			return $this->_failure;
		}
		elseif ($this->_fingerprint === md5($Vyzxnjw21ipn))
		{
			return ( ! $this->_file_new && ! touch($this->_file_path.$Vh3ontjxlhd5))
				? $this->_failure
				: $this->_success;
		}

		if ( ! $this->_file_new)
		{
			ftruncate($this->_file_handle, 0);
			rewind($this->_file_handle);
		}

		if (($Vgdtiboyfq04 = strlen($Vyzxnjw21ipn)) > 0)
		{
			for ($Vte3mlfnkhto = 0; $Vte3mlfnkhto < $Vgdtiboyfq04; $Vte3mlfnkhto += $Voetc43kt2cr)
			{
				if (($Voetc43kt2cr = fwrite($this->_file_handle, substr($Vyzxnjw21ipn, $Vte3mlfnkhto))) === FALSE)
				{
					break;
				}
			}

			if ( ! is_int($Voetc43kt2cr))
			{
				$this->_fingerprint = md5(substr($Vyzxnjw21ipn, 0, $Vte3mlfnkhto));
				log_message('error', 'Session: Unable to write data.');
				return $this->_failure;
			}
		}

		$this->_fingerprint = md5($Vyzxnjw21ipn);
		return $this->_success;
	}

	

	
	public function close()
	{
		if (is_resource($this->_file_handle))
		{
			flock($this->_file_handle, LOCK_UN);
			fclose($this->_file_handle);

			$this->_file_handle = $this->_file_new = $this->_session_id = NULL;
		}

		return $this->_success;
	}

	

	
	public function destroy($Vh3ontjxlhd5)
	{
		if ($this->close() === $this->_success)
		{
			if (file_exists($this->_file_path.$Vh3ontjxlhd5))
			{
				$this->_cookie_destroy();
				return unlink($this->_file_path.$Vh3ontjxlhd5)
					? $this->_success
					: $this->_failure;
			}

			return $this->_success;
		}
		elseif ($this->_file_path !== NULL)
		{
			clearstatcache();
			if (file_exists($this->_file_path.$Vh3ontjxlhd5))
			{
				$this->_cookie_destroy();
				return unlink($this->_file_path.$Vh3ontjxlhd5)
					? $this->_success
					: $this->_failure;
			}

			return $this->_success;
		}

		return $this->_failure;
	}

	

	
	public function gc($Vq25j5ef3kyx)
	{
		if ( ! is_dir($this->_config['save_path']) OR ($V1zlhujai52g = opendir($this->_config['save_path'])) === FALSE)
		{
			log_message('debug', "Session: Garbage collector couldn't list files under directory '".$this->_config['save_path']."'.");
			return $this->_failure;
		}

		$Vy2bjk1gkpi1 = time() - $Vq25j5ef3kyx;

		$Vgq2p33sysyd = sprintf(
			'/^%s[0-9a-f]{%d}$/',
			preg_quote($this->_config['cookie_name'], '/'),
			($this->_config['match_ip'] === TRUE ? 72 : 40)
		);

		while (($Vligofq0fb34 = readdir($V1zlhujai52g)) !== FALSE)
		{
			
			if ( ! preg_match($Vgq2p33sysyd, $Vligofq0fb34)
				OR ! is_file($this->_config['save_path'].DIRECTORY_SEPARATOR.$Vligofq0fb34)
				OR ($Vjei4q50xa4c = filemtime($this->_config['save_path'].DIRECTORY_SEPARATOR.$Vligofq0fb34)) === FALSE
				OR $Vjei4q50xa4c > $Vy2bjk1gkpi1)
			{
				continue;
			}

			unlink($this->_config['save_path'].DIRECTORY_SEPARATOR.$Vligofq0fb34);
		}

		closedir($V1zlhujai52g);

		return $this->_success;
	}

}