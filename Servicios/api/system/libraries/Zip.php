<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Zip {

	
	public $Vlijd32nmetf = '';

	
	public $V1zlhujai52g = '';

	
	public $Vkn3ulbntzpw = 0;

	
	public $Vpbl2qd51gkx = 0;

	
	public $Vzawlyjaf5xg = 0;

	
	public $Vswcifil4f1s;

	
	public $Vxkfvqii1y5d = 2;

	
	public function __construct()
	{
		$this->now = time();
		log_message('info', 'Zip Compression Class Initialized');
	}

	

	
	public function add_dir($V1zlhujai52g)
	{
		foreach ((array) $V1zlhujai52g as $Vjjrg1uzzvor)
		{
			if ( ! preg_match('|.+/$|', $Vjjrg1uzzvor))
			{
				$Vjjrg1uzzvor .= '/';
			}

			$Vjjrg1uzzvor_time = $this->_get_mod_time($Vjjrg1uzzvor);
			$this->_add_dir($Vjjrg1uzzvor, $Vjjrg1uzzvor_time['file_mtime'], $Vjjrg1uzzvor_time['file_mdate']);
		}
	}

	

	
	protected function _get_mod_time($Vjjrg1uzzvor)
	{
		
		$V3ti2nsbfgt2 = file_exists($Vjjrg1uzzvor) ? getdate(filemtime($Vjjrg1uzzvor)) : getdate($this->now);

		return array(
			'file_mtime' => ($V3ti2nsbfgt2['hours'] << 11) + ($V3ti2nsbfgt2['minutes'] << 5) + $V3ti2nsbfgt2['seconds'] / 2,
			'file_mdate' => (($V3ti2nsbfgt2['year'] - 1980) << 9) + ($V3ti2nsbfgt2['mon'] << 5) + $V3ti2nsbfgt2['mday']
		);
	}

	

	
	protected function _add_dir($Vjjrg1uzzvor, $Vujpknjo52ga, $Vr1igsg5rnud)
	{
		$Vjjrg1uzzvor = str_replace('\\', '/', $Vjjrg1uzzvor);

		$this->zipdata .=
			"\x50\x4b\x03\x04\x0a\x00\x00\x00\x00\x00"
			.pack('v', $Vujpknjo52ga)
			.pack('v', $Vr1igsg5rnud)
			.pack('V', 0) 
			.pack('V', 0) 
			.pack('V', 0) 
			.pack('v', strlen($Vjjrg1uzzvor)) 
			.pack('v', 0) 
			.$Vjjrg1uzzvor
			
			.pack('V', 0) 
			.pack('V', 0) 
			.pack('V', 0); 

		$this->directory .=
			"\x50\x4b\x01\x02\x00\x00\x0a\x00\x00\x00\x00\x00"
			.pack('v', $Vujpknjo52ga)
			.pack('v', $Vr1igsg5rnud)
			.pack('V',0) 
			.pack('V',0) 
			.pack('V',0) 
			.pack('v', strlen($Vjjrg1uzzvor)) 
			.pack('v', 0) 
			.pack('v', 0) 
			.pack('v', 0) 
			.pack('v', 0) 
			.pack('V', 16) 
			.pack('V', $this->offset) 
			.$Vjjrg1uzzvor;

		$this->offset = strlen($this->zipdata);
		$this->entries++;
	}

	

	
	public function add_data($Vohaqukrowkd, $Vfeinw1hsfej = NULL)
	{
		if (is_array($Vohaqukrowkd))
		{
			foreach ($Vohaqukrowkd as $Vcmaitbcbmmk => $Vfeinw1hsfej)
			{
				$Vtqpjrpxmmwg = $this->_get_mod_time($Vcmaitbcbmmk);
				$this->_add_data($Vcmaitbcbmmk, $Vfeinw1hsfej, $Vtqpjrpxmmwg['file_mtime'], $Vtqpjrpxmmwg['file_mdate']);
			}
		}
		else
		{
			$Vtqpjrpxmmwg = $this->_get_mod_time($Vohaqukrowkd);
			$this->_add_data($Vohaqukrowkd, $Vfeinw1hsfej, $Vtqpjrpxmmwg['file_mtime'], $Vtqpjrpxmmwg['file_mdate']);
		}
	}

	

	
	protected function _add_data($Vohaqukrowkd, $Vfeinw1hsfej, $Vujpknjo52ga, $Vr1igsg5rnud)
	{
		$Vohaqukrowkd = str_replace('\\', '/', $Vohaqukrowkd);

		$V4tw2pbz0qn4 = strlen($Vfeinw1hsfej);
		$V25rezr2nkkm  = crc32($Vfeinw1hsfej);
		$Vwtanb2dfygt = substr(gzcompress($Vfeinw1hsfej, $this->compression_level), 2, -4);
		$Vvvvw3obfzwd = strlen($Vwtanb2dfygt);

		$this->zipdata .=
			"\x50\x4b\x03\x04\x14\x00\x00\x00\x08\x00"
			.pack('v', $Vujpknjo52ga)
			.pack('v', $Vr1igsg5rnud)
			.pack('V', $V25rezr2nkkm)
			.pack('V', $Vvvvw3obfzwd)
			.pack('V', $V4tw2pbz0qn4)
			.pack('v', strlen($Vohaqukrowkd)) 
			.pack('v', 0) 
			.$Vohaqukrowkd
			.$Vwtanb2dfygt; 

		$this->directory .=
			"\x50\x4b\x01\x02\x00\x00\x14\x00\x00\x00\x08\x00"
			.pack('v', $Vujpknjo52ga)
			.pack('v', $Vr1igsg5rnud)
			.pack('V', $V25rezr2nkkm)
			.pack('V', $Vvvvw3obfzwd)
			.pack('V', $V4tw2pbz0qn4)
			.pack('v', strlen($Vohaqukrowkd)) 
			.pack('v', 0) 
			.pack('v', 0) 
			.pack('v', 0) 
			.pack('v', 0) 
			.pack('V', 32) 
			.pack('V', $this->offset) 
			.$Vohaqukrowkd;

		$this->offset = strlen($this->zipdata);
		$this->entries++;
		$this->file_num++;
	}

	

	
	public function read_file($Vcmaitbcbmmk, $Vqd1y1atp12p = FALSE)
	{
		if (file_exists($Vcmaitbcbmmk) && FALSE !== ($Vfeinw1hsfej = file_get_contents($Vcmaitbcbmmk)))
		{
			if (is_string($Vqd1y1atp12p))
			{
				$Vaclaigdbtoo = str_replace('\\', '/', $Vqd1y1atp12p);
			}
			else
			{
				$Vaclaigdbtoo = str_replace('\\', '/', $Vcmaitbcbmmk);

				if ($Vqd1y1atp12p === FALSE)
				{
					$Vaclaigdbtoo = preg_replace('|.*/(.+)|', '\\1', $Vaclaigdbtoo);
				}
			}

			$this->add_data($Vaclaigdbtoo, $Vfeinw1hsfej);
			return TRUE;
		}

		return FALSE;
	}

	

	
	public function read_dir($Vcmaitbcbmmk, $Vvah3qtppq0f = TRUE, $Vdzfpimmodsa = NULL)
	{
		$Vcmaitbcbmmk = rtrim($Vcmaitbcbmmk, '/\\').DIRECTORY_SEPARATOR;
		if ( ! $Vzuexymrvrpz = @opendir($Vcmaitbcbmmk))
		{
			return FALSE;
		}

		
		if ($Vdzfpimmodsa === NULL)
		{
			$Vdzfpimmodsa = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, dirname($Vcmaitbcbmmk)).DIRECTORY_SEPARATOR;
		}

		while (FALSE !== ($Vligofq0fb34 = readdir($Vzuexymrvrpz)))
		{
			if ($Vligofq0fb34[0] === '.')
			{
				continue;
			}

			if (is_dir($Vcmaitbcbmmk.$Vligofq0fb34))
			{
				$this->read_dir($Vcmaitbcbmmk.$Vligofq0fb34.DIRECTORY_SEPARATOR, $Vvah3qtppq0f, $Vdzfpimmodsa);
			}
			elseif (FALSE !== ($Vfeinw1hsfej = file_get_contents($Vcmaitbcbmmk.$Vligofq0fb34)))
			{
				$Vaclaigdbtoo = str_replace(array('\\', '/'), DIRECTORY_SEPARATOR, $Vcmaitbcbmmk);
				if ($Vvah3qtppq0f === FALSE)
				{
					$Vaclaigdbtoo = str_replace($Vdzfpimmodsa, '', $Vaclaigdbtoo);
				}

				$this->add_data($Vaclaigdbtoo.$Vligofq0fb34, $Vfeinw1hsfej);
			}
		}

		closedir($Vzuexymrvrpz);
		return TRUE;
	}

	

	
	public function get_zip()
	{
		
		if ($this->entries === 0)
		{
			return FALSE;
		}

		return $this->zipdata
			.$this->directory."\x50\x4b\x05\x06\x00\x00\x00\x00"
			.pack('v', $this->entries) 
			.pack('v', $this->entries) 
			.pack('V', strlen($this->directory)) 
			.pack('V', strlen($this->zipdata)) 
			."\x00\x00"; 
	}

	

	
	public function archive($Vohaqukrowkd)
	{
		if ( ! ($Vzuexymrvrpz = @fopen($Vohaqukrowkd, 'w+b')))
		{
			return FALSE;
		}

		flock($Vzuexymrvrpz, LOCK_EX);

		for ($Voetc43kt2cr = $Vte3mlfnkhto = 0, $Vfeinw1hsfej = $this->get_zip(), $Vgdtiboyfq04 = strlen($Vfeinw1hsfej); $Vte3mlfnkhto < $Vgdtiboyfq04; $Vte3mlfnkhto += $Voetc43kt2cr)
		{
			if (($Voetc43kt2cr = fwrite($Vzuexymrvrpz, substr($Vfeinw1hsfej, $Vte3mlfnkhto))) === FALSE)
			{
				break;
			}
		}

		flock($Vzuexymrvrpz, LOCK_UN);
		fclose($Vzuexymrvrpz);

		return is_int($Voetc43kt2cr);
	}

	

	
	public function download($Vligofq0fb34name = 'backup.zip')
	{
		if ( ! preg_match('|.+?\.zip$|', $Vligofq0fb34name))
		{
			$Vligofq0fb34name .= '.zip';
		}

		get_instance()->load->helper('download');
		$V1r3uxkpvyka = $this->get_zip();
		$Vgnpt2noohfa =& $V1r3uxkpvyka;

		force_download($Vligofq0fb34name, $Vgnpt2noohfa);
	}

	

	
	public function clear_data()
	{
		$this->zipdata = '';
		$this->directory = '';
		$this->entries = 0;
		$this->file_num = 0;
		$this->offset = 0;
		return $this;
	}

}
