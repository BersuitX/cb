<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Output {

	
	public $Ve5xzftwx1le;

	
	public $Vpeiwdcxjnyb = 0;

	
	public $V3zljh1vyslw = array();

	
	public $Vsdvtzrs5faf =	array();

	
	protected $Vjzlxu3wa02g = 'text/html';

	
	public $V40e4n0q0mze = FALSE;

	
	protected $Vaxb1hdcteui = FALSE;

	
	protected $Vcav0yasp5nj = FALSE;

	
	protected $Vn4zs0bylyjb =	array();

	
	public $Vv2vibpilkch = TRUE;

	
	public function __construct()
	{
		$this->_zlib_oc = (bool) ini_get('zlib.output_compression');
		$this->_compress_output = (
			$this->_zlib_oc === FALSE
			&& config_item('compress_output') === TRUE
			&& extension_loaded('zlib')
		);

		
		$this->mimes =& get_mimes();

		log_message('info', 'Output Class Initialized');
	}

	

	
	public function get_output()
	{
		return $this->final_output;
	}

	

	
	public function set_output($Vzxix2pqoztx)
	{
		$this->final_output = $Vzxix2pqoztx;
		return $this;
	}

	

	
	public function append_output($Vzxix2pqoztx)
	{
		$this->final_output .= $Vzxix2pqoztx;
		return $this;
	}

	

	
	public function set_header($V3lefstrzfrx, $Vfx40ovsdrwf = TRUE)
	{
		
		
		
		
		if ($this->_zlib_oc && strncasecmp($V3lefstrzfrx, 'content-length', 14) === 0)
		{
			return $this;
		}

		$this->headers[] = array($V3lefstrzfrx, $Vfx40ovsdrwf);
		return $this;
	}

	

	
	public function set_content_type($Vjzlxu3wa02g, $Vwxuqfbo3r2c = NULL)
	{
		if (strpos($Vjzlxu3wa02g, '/') === FALSE)
		{
			$V4ixvjm4swlr = ltrim($Vjzlxu3wa02g, '.');

			
			if (isset($this->mimes[$V4ixvjm4swlr]))
			{
				$Vjzlxu3wa02g =& $this->mimes[$V4ixvjm4swlr];

				if (is_array($Vjzlxu3wa02g))
				{
					$Vjzlxu3wa02g = current($Vjzlxu3wa02g);
				}
			}
		}

		$this->mime_type = $Vjzlxu3wa02g;

		if (empty($Vwxuqfbo3r2c))
		{
			$Vwxuqfbo3r2c = config_item('charset');
		}

		$V3lefstrzfrx = 'Content-Type: '.$Vjzlxu3wa02g
			.(empty($Vwxuqfbo3r2c) ? '' : '; charset='.$Vwxuqfbo3r2c);

		$this->headers[] = array($V3lefstrzfrx, TRUE);
		return $this;
	}

	

	
	public function get_content_type()
	{
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($this->headers); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if (sscanf($this->headers[$Vep0df0xosaw][0], 'Content-Type: %[^;]', $Vn2ycfau434sontent_type) === 1)
			{
				return $Vn2ycfau434sontent_type;
			}
		}

		return 'text/html';
	}

	

	
	public function get_header($V3lefstrzfrx)
	{
		
		$V3zljh1vyslw = array_merge(
			
			array_map('array_shift', $this->headers),
			headers_list()
		);

		if (empty($V3zljh1vyslw) OR empty($V3lefstrzfrx))
		{
			return NULL;
		}

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($V3zljh1vyslw); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if (strncasecmp($V3lefstrzfrx, $V3zljh1vyslw[$Vep0df0xosaw], $V4stf05kgafy = strlen($V3lefstrzfrx)) === 0)
			{
				return trim(substr($V3zljh1vyslw[$Vep0df0xosaw], $V4stf05kgafy+1));
			}
		}

		return NULL;
	}

	

	
	public function set_status_header($Vn2ycfau434sode = 200, $Vfh2utbqjg5e = '')
	{
		set_status_header($Vn2ycfau434sode, $Vfh2utbqjg5e);
		return $this;
	}

	

	
	public function enable_profiler($Va4zo0rltynr = TRUE)
	{
		$this->enable_profiler = is_bool($Va4zo0rltynr) ? $Va4zo0rltynr : TRUE;
		return $this;
	}

	

	
	public function set_profiler_sections($Voxsl3wdiwjg)
	{
		if (isset($Voxsl3wdiwjg['query_toggle_count']))
		{
			$this->_profiler_sections['query_toggle_count'] = (int) $Voxsl3wdiwjg['query_toggle_count'];
			unset($Voxsl3wdiwjg['query_toggle_count']);
		}

		foreach ($Voxsl3wdiwjg as $Vrmtbsqo0kd5 => $Vgbm4eqld3ta)
		{
			$this->_profiler_sections[$Vrmtbsqo0kd5] = ($Vgbm4eqld3ta !== FALSE);
		}

		return $this;
	}

	

	
	public function cache($Vzfk1zisr4jl)
	{
		$this->cache_expiration = is_numeric($Vzfk1zisr4jl) ? $Vzfk1zisr4jl : 0;
		return $this;
	}

	

	
	public function _display($Vzxix2pqoztx = '')
	{
		
		
		
		$Vucell23unzf =& load_class('Benchmark', 'core');
		$Vricwegt05y3 =& load_class('Config', 'core');

		
		if (class_exists('CI_Controller', FALSE))
		{
			$Vgw3d0qe3dgd =& get_instance();
		}

		

		
		if ($Vzxix2pqoztx === '')
		{
			$Vzxix2pqoztx =& $this->final_output;
		}

		

		
		
		
		if ($this->cache_expiration > 0 && isset($Vgw3d0qe3dgd) && ! method_exists($Vgw3d0qe3dgd, '_output'))
		{
			$this->_write_cache($Vzxix2pqoztx);
		}

		

		
		

		$Viqfyvnjsef1 = $Vucell23unzf->elapsed_time('total_execution_time_start', 'total_execution_time_end');

		if ($this->parse_exec_vars === TRUE)
		{
			$V1iv1ykk0zuu	= round(memory_get_usage() / 1024 / 1024, 2).'MB';
			$Vzxix2pqoztx = str_replace(array('{elapsed_time}', '{memory_usage}'), array($Viqfyvnjsef1, $V1iv1ykk0zuu), $Vzxix2pqoztx);
		}

		

		
		if (isset($Vgw3d0qe3dgd) 
			&& $this->_compress_output === TRUE
			&& isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
		{
			ob_start('ob_gzhandler');
		}

		

		
		if (count($this->headers) > 0)
		{
			foreach ($this->headers as $V3lefstrzfrx)
			{
				@header($V3lefstrzfrx[0], $V3lefstrzfrx[1]);
			}
		}

		

		
		
		
		if ( ! isset($Vgw3d0qe3dgd))
		{
			if ($this->_compress_output === TRUE)
			{
				if (isset($_SERVER['HTTP_ACCEPT_ENCODING']) && strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE)
				{
					header('Content-Encoding: gzip');
					header('Content-Length: '.strlen($Vzxix2pqoztx));
				}
				else
				{
					
					
					$Vzxix2pqoztx = gzinflate(substr($Vzxix2pqoztx, 10, -8));
				}
			}

			echo $Vzxix2pqoztx;
			log_message('info', 'Final output sent to browser');
			log_message('debug', 'Total execution time: '.$Viqfyvnjsef1);
			return;
		}

		

		
		
		if ($this->enable_profiler === TRUE)
		{
			$Vgw3d0qe3dgd->load->library('profiler');
			if ( ! empty($this->_profiler_sections))
			{
				$Vgw3d0qe3dgd->profiler->set_sections($this->_profiler_sections);
			}

			
			
			$Vzxix2pqoztx = preg_replace('|</body>.*?</html>|is', '', $Vzxix2pqoztx, -1, $Vn2ycfau434sount).$Vgw3d0qe3dgd->profiler->run();
			if ($Vn2ycfau434sount > 0)
			{
				$Vzxix2pqoztx .= '</body></html>';
			}
		}

		
		
		if (method_exists($Vgw3d0qe3dgd, '_output'))
		{
			$Vgw3d0qe3dgd->_output($Vzxix2pqoztx);
		}
		else
		{
			echo $Vzxix2pqoztx; 
		}

		log_message('info', 'Final output sent to browser');
		log_message('debug', 'Total execution time: '.$Viqfyvnjsef1);
	}

	

	
	public function _write_cache($Vzxix2pqoztx)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vcmaitbcbmmk = $Vgw3d0qe3dgd->config->item('cache_path');
		$Vn2ycfau434sache_path = ($Vcmaitbcbmmk === '') ? APPPATH.'cache/' : $Vcmaitbcbmmk;

		if ( ! is_dir($Vn2ycfau434sache_path) OR ! is_really_writable($Vn2ycfau434sache_path))
		{
			log_message('error', 'Unable to write cache file: '.$Vn2ycfau434sache_path);
			return;
		}

		$V1naxfrpd12s = $Vgw3d0qe3dgd->config->item('base_url')
			.$Vgw3d0qe3dgd->config->item('index_page')
			.$Vgw3d0qe3dgd->uri->uri_string();

		if (($Vn2ycfau434sache_query_string = $Vgw3d0qe3dgd->config->item('cache_query_string')) && ! empty($_SERVER['QUERY_STRING']))
		{
			if (is_array($Vn2ycfau434sache_query_string))
			{
				$V1naxfrpd12s .= '?'.http_build_query(array_intersect_key($_GET, array_flip($Vn2ycfau434sache_query_string)));
			}
			else
			{
				$V1naxfrpd12s .= '?'.$_SERVER['QUERY_STRING'];
			}
		}

		$Vn2ycfau434sache_path .= md5($V1naxfrpd12s);

		if ( ! $Vzuexymrvrpz = @fopen($Vn2ycfau434sache_path, 'w+b'))
		{
			log_message('error', 'Unable to write cache file: '.$Vn2ycfau434sache_path);
			return;
		}

		if (flock($Vzuexymrvrpz, LOCK_EX))
		{
			
			
			
			if ($this->_compress_output === TRUE)
			{
				$Vzxix2pqoztx = gzencode($Vzxix2pqoztx);

				if ($this->get_header('content-type') === NULL)
				{
					$this->set_content_type($this->mime_type);
				}
			}

			$Vgoa5d5z2ckk = time() + ($this->cache_expiration * 60);

			
			$Vn2ycfau434sache_info = serialize(array(
				'expire'	=> $Vgoa5d5z2ckk,
				'headers'	=> $this->headers
			));

			$Vzxix2pqoztx = $Vn2ycfau434sache_info.'ENDCI--->'.$Vzxix2pqoztx;

			for ($Vte3mlfnkhto = 0, $V4stf05kgafyength = strlen($Vzxix2pqoztx); $Vte3mlfnkhto < $V4stf05kgafyength; $Vte3mlfnkhto += $Voetc43kt2cr)
			{
				if (($Voetc43kt2cr = fwrite($Vzuexymrvrpz, substr($Vzxix2pqoztx, $Vte3mlfnkhto))) === FALSE)
				{
					break;
				}
			}

			flock($Vzuexymrvrpz, LOCK_UN);
		}
		else
		{
			log_message('error', 'Unable to secure a file lock for file at: '.$Vn2ycfau434sache_path);
			return;
		}

		fclose($Vzuexymrvrpz);

		if (is_int($Voetc43kt2cr))
		{
			chmod($Vn2ycfau434sache_path, 0640);
			log_message('debug', 'Cache file written: '.$Vn2ycfau434sache_path);

			
			$this->set_cache_header($_SERVER['REQUEST_TIME'], $Vgoa5d5z2ckk);
		}
		else
		{
			@unlink($Vn2ycfau434sache_path);
			log_message('error', 'Unable to write the complete cache content at: '.$Vn2ycfau434sache_path);
		}
	}

	

	
	public function _display_cache(&$Vricwegt05y3, &$Vgmnw5wpjfr1)
	{
		$Vn2ycfau434sache_path = ($Vricwegt05y3->item('cache_path') === '') ? APPPATH.'cache/' : $Vricwegt05y3->item('cache_path');

		
		$V1naxfrpd12s = $Vricwegt05y3->item('base_url').$Vricwegt05y3->item('index_page').$Vgmnw5wpjfr1->uri_string;

		if (($Vn2ycfau434sache_query_string = $Vricwegt05y3->item('cache_query_string')) && ! empty($_SERVER['QUERY_STRING']))
		{
			if (is_array($Vn2ycfau434sache_query_string))
			{
				$V1naxfrpd12s .= '?'.http_build_query(array_intersect_key($_GET, array_flip($Vn2ycfau434sache_query_string)));
			}
			else
			{
				$V1naxfrpd12s .= '?'.$_SERVER['QUERY_STRING'];
			}
		}

		$Vohaqukrowkd = $Vn2ycfau434sache_path.md5($V1naxfrpd12s);

		if ( ! file_exists($Vohaqukrowkd) OR ! $Vzuexymrvrpz = @fopen($Vohaqukrowkd, 'rb'))
		{
			return FALSE;
		}

		flock($Vzuexymrvrpz, LOCK_SH);

		$Vn2ycfau434sache = (filesize($Vohaqukrowkd) > 0) ? fread($Vzuexymrvrpz, filesize($Vohaqukrowkd)) : '';

		flock($Vzuexymrvrpz, LOCK_UN);
		fclose($Vzuexymrvrpz);

		
		if ( ! preg_match('/^(.*)ENDCI--->/', $Vn2ycfau434sache, $V4uvjtwtgjvp))
		{
			return FALSE;
		}

		$Vn2ycfau434sache_info = unserialize($V4uvjtwtgjvp[1]);
		$Vgoa5d5z2ckk = $Vn2ycfau434sache_info['expire'];

		$V4stf05kgafyast_modified = filemtime($Vohaqukrowkd);

		
		if ($_SERVER['REQUEST_TIME'] >= $Vgoa5d5z2ckk && is_really_writable($Vn2ycfau434sache_path))
		{
			
			@unlink($Vohaqukrowkd);
			log_message('debug', 'Cache file has expired. File deleted.');
			return FALSE;
		}
		else
		{
			
			$this->set_cache_header($V4stf05kgafyast_modified, $Vgoa5d5z2ckk);
		}

		
		foreach ($Vn2ycfau434sache_info['headers'] as $V3lefstrzfrx)
		{
			$this->set_header($V3lefstrzfrx[0], $V3lefstrzfrx[1]);
		}

		
		$this->_display(substr($Vn2ycfau434sache, strlen($V4uvjtwtgjvp[0])));
		log_message('debug', 'Cache file is current. Sending it to browser.');
		return TRUE;
	}

	

	
	public function delete_cache($V1naxfrpd12s = '')
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vn2ycfau434sache_path = $Vgw3d0qe3dgd->config->item('cache_path');
		if ($Vn2ycfau434sache_path === '')
		{
			$Vn2ycfau434sache_path = APPPATH.'cache/';
		}

		if ( ! is_dir($Vn2ycfau434sache_path))
		{
			log_message('error', 'Unable to find cache path: '.$Vn2ycfau434sache_path);
			return FALSE;
		}

		if (empty($V1naxfrpd12s))
		{
			$V1naxfrpd12s = $Vgw3d0qe3dgd->uri->uri_string();

			if (($Vn2ycfau434sache_query_string = $Vgw3d0qe3dgd->config->item('cache_query_string')) && ! empty($_SERVER['QUERY_STRING']))
			{
				if (is_array($Vn2ycfau434sache_query_string))
				{
					$V1naxfrpd12s .= '?'.http_build_query(array_intersect_key($_GET, array_flip($Vn2ycfau434sache_query_string)));
				}
				else
				{
					$V1naxfrpd12s .= '?'.$_SERVER['QUERY_STRING'];
				}
			}
		}

		$Vn2ycfau434sache_path .= md5($Vgw3d0qe3dgd->config->item('base_url').$Vgw3d0qe3dgd->config->item('index_page').ltrim($V1naxfrpd12s, '/'));

		if ( ! @unlink($Vn2ycfau434sache_path))
		{
			log_message('error', 'Unable to delete cache file for '.$V1naxfrpd12s);
			return FALSE;
		}

		return TRUE;
	}

	

	
	public function set_cache_header($V4stf05kgafyast_modified, $Vw0rqc1cqgza)
	{
		$V23grpmagzhc = $Vw0rqc1cqgza - $_SERVER['REQUEST_TIME'];

		if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) && $V4stf05kgafyast_modified <= strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']))
		{
			$this->set_status_header(304);
			exit;
		}
		else
		{
			header('Pragma: public');
			header('Cache-Control: max-age='.$V23grpmagzhc.', public');
			header('Expires: '.gmdate('D, d M Y H:i:s', $Vw0rqc1cqgza).' GMT');
			header('Last-modified: '.gmdate('D, d M Y H:i:s', $V4stf05kgafyast_modified).' GMT');
		}
	}

}
