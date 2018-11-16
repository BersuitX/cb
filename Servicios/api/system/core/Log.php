<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Log {

	
	protected $Vyakmwajp4kx;

	
	protected $Voxqtm4jvfh5 = 0644;

	
	protected $Vnzhw0oqqmzz = 1;

	
	protected $Vnzhw0oqqmzz_array = array();

	
	protected $Vz1qszrsvztp = 'Y-m-d H:i:s';

	
	protected $V14lyyxuznqi;

	
	protected $Vggfqad4abhe = TRUE;

	
	protected $Vo5v4gl1x4nl = array('ERROR' => 1, 'DEBUG' => 2, 'INFO' => 3, 'ALL' => 4);

	

	
	public function __construct()
	{
		$Vnmcm15juye5 =& get_config();

		$this->_log_path = ($Vnmcm15juye5['log_path'] !== '') ? $Vnmcm15juye5['log_path'] : APPPATH.'logs/';
		$this->_file_ext = (isset($Vnmcm15juye5['log_file_extension']) && $Vnmcm15juye5['log_file_extension'] !== '')
			? ltrim($Vnmcm15juye5['log_file_extension'], '.') : 'php';

		

		if ( ! is_dir($this->_log_path) OR ! is_really_writable($this->_log_path))
		{
			$this->_enabled = FALSE;
		}

		if (is_numeric($Vnmcm15juye5['log_threshold']))
		{
			$this->_threshold = (int) $Vnmcm15juye5['log_threshold'];
		}
		elseif (is_array($Vnmcm15juye5['log_threshold']))
		{
			$this->_threshold = 0;
			$this->_threshold_array = array_flip($Vnmcm15juye5['log_threshold']);
		}

		if ( ! empty($Vnmcm15juye5['log_date_format']))
		{
			$this->_date_fmt = $Vnmcm15juye5['log_date_format'];
		}

		if ( ! empty($Vnmcm15juye5['log_file_permissions']) && is_int($Vnmcm15juye5['log_file_permissions']))
		{
			$this->_file_permissions = $Vnmcm15juye5['log_file_permissions'];
		}
	}

	

	
	public function write_log($Vfy3tdxkf42p, $Vv3gvm3x3hvm)
	{
		if ($this->_enabled === FALSE)
		{
			return FALSE;
		}

		$Vfy3tdxkf42p = strtoupper($Vfy3tdxkf42p);

		if (( ! isset($this->_levels[$Vfy3tdxkf42p]) OR ($this->_levels[$Vfy3tdxkf42p] > $this->_threshold))
			&& ! isset($this->_threshold_array[$this->_levels[$Vfy3tdxkf42p]]))
		{
			return FALSE;
		}

		$Vohaqukrowkd = $this->_log_path.'log-'.date('Y-m-d').'.'.$this->_file_ext;
		$V15xvmvzbb0h = '';

		if ( ! file_exists($Vohaqukrowkd))
		{
			$Vbfqhbvq3y1l = TRUE;
			
			if ($this->_file_ext === 'php')
			{
				$V15xvmvzbb0h .= "<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>\n\n";
			}
		}

		if ( ! $Vzuexymrvrpz = @fopen($Vohaqukrowkd, 'ab'))
		{
			return FALSE;
		}

		flock($Vzuexymrvrpz, LOCK_EX);

		
		if (strpos($this->_date_fmt, 'u') !== FALSE)
		{
			$Vy1k3se4mo4j = microtime(TRUE);
			$Vinp3abq1nl1 = sprintf("%06d", ($Vy1k3se4mo4j - floor($Vy1k3se4mo4j)) * 1000000);
			$V3ti2nsbfgt2 = new DateTime(date('Y-m-d H:i:s.'.$Vinp3abq1nl1, $Vy1k3se4mo4j));
			$V3ti2nsbfgt2 = $V3ti2nsbfgt2->format($this->_date_fmt);
		}
		else
		{
			$V3ti2nsbfgt2 = date($this->_date_fmt);
		}

		$V15xvmvzbb0h .= $this->_format_line($Vfy3tdxkf42p, $V3ti2nsbfgt2, $Vv3gvm3x3hvm);

		for ($Vte3mlfnkhto = 0, $Vgdtiboyfq04 = strlen($V15xvmvzbb0h); $Vte3mlfnkhto < $Vgdtiboyfq04; $Vte3mlfnkhto += $Voetc43kt2cr)
		{
			if (($Voetc43kt2cr = fwrite($Vzuexymrvrpz, substr($V15xvmvzbb0h, $Vte3mlfnkhto))) === FALSE)
			{
				break;
			}
		}

		flock($Vzuexymrvrpz, LOCK_UN);
		fclose($Vzuexymrvrpz);

		if (isset($Vbfqhbvq3y1l) && $Vbfqhbvq3y1l === TRUE)
		{
			chmod($Vohaqukrowkd, $this->_file_permissions);
		}

		return is_int($Voetc43kt2cr);
	}

	

	
	protected function _format_line($Vfy3tdxkf42p, $V3ti2nsbfgt2, $V15xvmvzbb0h)
	{
		return $Vfy3tdxkf42p.' - '.$V3ti2nsbfgt2.' --> '.$V15xvmvzbb0h."\n";
	}
}
