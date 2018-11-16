<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Curl {

	protected $Vgzeqqbn0b4n;                 
	protected $Vpa2qbhtxuyd = '';       
	protected $Vs4bxwlydcbr;             
	protected $V2oecyt4aea4;                 
	protected $V1flr55fnyyv = array();   
	protected $V3zljh1vyslw = array();   
	public $V2aluydoaxch;             
	public $Vp51pmiak25a;           
	public $V2fu10swij5z;                   

	function __construct($V2oecyt4aea4 = '')
	{
		$this->_ci = & get_instance();
		log_message('debug', 'cURL Class Initialized');

		if ( ! $this->is_enabled())
		{
			log_message('error', 'cURL Class - PHP was not built with cURL enabled. Rebuild PHP with --with-curl to use cURL.');
		}

		$V2oecyt4aea4 AND $this->create($V2oecyt4aea4);
	}

	public function __call($V5dsbozs5xhq, $Vg44epnxeiog)
	{
		if (in_array($V5dsbozs5xhq, array('simple_get', 'simple_post', 'simple_put', 'simple_delete', 'simple_patch')))
		{
			
			$Vhgeujmxtpti = str_replace('simple_', '', $V5dsbozs5xhq);
			array_unshift($Vg44epnxeiog, $Vhgeujmxtpti);
			return call_user_func_array(array($this, '_simple_call'), $Vg44epnxeiog);
		}
	}

	

	public function _simple_call($V5dsbozs5xhq, $V2oecyt4aea4, $Vpz5i5lfmwft = array(), $V1flr55fnyyv = array())
	{
		
		if ($V5dsbozs5xhq === 'get')
		{
			
			$this->create($V2oecyt4aea4.($Vpz5i5lfmwft ? '?'.http_build_query($Vpz5i5lfmwft, NULL, '&') : ''));
		}

		else
		{
			
			$this->create($V2oecyt4aea4);

			$this->{$V5dsbozs5xhq}($Vpz5i5lfmwft);
		}

		
		$this->options($V1flr55fnyyv);

		return $this->execute();
	}

	public function simple_ftp_get($V2oecyt4aea4, $V3emdg0kb1po, $Vlukz41rasa4 = '', $Vpkw0q5n2gpv = '')
	{
		
		if ( ! preg_match('!^(ftp|sftp)://! i', $V2oecyt4aea4))
		{
			$V2oecyt4aea4 = 'ftp://' . $V2oecyt4aea4;
		}

		
		if ($Vlukz41rasa4 != '')
		{
			$Vt3ykt0oiaa2 = $Vlukz41rasa4;

			if ($Vpkw0q5n2gpv != '')
			{
				$Vt3ykt0oiaa2 .= ':' . $Vpkw0q5n2gpv;
			}

			
			$V2oecyt4aea4 = str_replace('://', '://' . $Vt3ykt0oiaa2 . '@', $V2oecyt4aea4);
		}

		
		$V2oecyt4aea4 .= $V3emdg0kb1po;

		$this->option(CURLOPT_BINARYTRANSFER, TRUE);
		$this->option(CURLOPT_VERBOSE, TRUE);

		return $this->execute();
	}

	

	public function post($Vpz5i5lfmwft = array(), $V1flr55fnyyv = array())
	{
		
		if (is_array($Vpz5i5lfmwft))
		{
			$Vpz5i5lfmwft = http_build_query($Vpz5i5lfmwft, NULL, '&');
		}

		
		$this->options($V1flr55fnyyv);

		$this->http_method('post');

		$this->option(CURLOPT_POST, TRUE);
		$this->option(CURLOPT_POSTFIELDS, $Vpz5i5lfmwft);
	}

	public function put($Vpz5i5lfmwft = array(), $V1flr55fnyyv = array())
	{
		
		if (is_array($Vpz5i5lfmwft))
		{
			$Vpz5i5lfmwft = http_build_query($Vpz5i5lfmwft, NULL, '&');
		}

		
		$this->options($V1flr55fnyyv);

		$this->http_method('put');
		$this->option(CURLOPT_POSTFIELDS, $Vpz5i5lfmwft);

		
		$this->option(CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PUT'));
	}

	public function patch($Vpz5i5lfmwft = array(), $V1flr55fnyyv = array())
	{
		
		if (is_array($Vpz5i5lfmwft))
		{
			$Vpz5i5lfmwft = http_build_query($Vpz5i5lfmwft, NULL, '&');
		}

		
		$this->options($V1flr55fnyyv);

		$this->http_method('patch');
		$this->option(CURLOPT_POSTFIELDS, $Vpz5i5lfmwft);

		
		$this->option(CURLOPT_HTTPHEADER, array('X-HTTP-Method-Override: PATCH'));
	}

	public function delete($Vpz5i5lfmwft, $V1flr55fnyyv = array())
	{
		
		if (is_array($Vpz5i5lfmwft))
		{
			$Vpz5i5lfmwft = http_build_query($Vpz5i5lfmwft, NULL, '&');
		}

		
		$this->options($V1flr55fnyyv);

		$this->http_method('delete');

		$this->option(CURLOPT_POSTFIELDS, $Vpz5i5lfmwft);
	}

	public function set_cookies($Vpz5i5lfmwft = array())
	{
		if (is_array($Vpz5i5lfmwft))
		{
			$Vpz5i5lfmwft = http_build_query($Vpz5i5lfmwft, NULL, '&');
		}

		$this->option(CURLOPT_COOKIE, $Vpz5i5lfmwft);
		return $this;
	}

	public function http_header($V3lefstrzfrx, $V3d4hantjd1y = NULL)
	{
		$this->headers[] = $V3d4hantjd1y ? $V3lefstrzfrx . ': ' . $V3d4hantjd1y : $V3lefstrzfrx;
		return $this;
	}

	public function http_method($V5dsbozs5xhq)
	{
		$this->options[CURLOPT_CUSTOMREQUEST] = strtoupper($V5dsbozs5xhq);
		return $this;
	}

	public function http_login($Vlukz41rasa4 = '', $Vpkw0q5n2gpv = '', $V4wtbblc1wn4 = 'any')
	{
		$this->option(CURLOPT_HTTPAUTH, constant('CURLAUTH_' . strtoupper($V4wtbblc1wn4)));
		$this->option(CURLOPT_USERPWD, $Vlukz41rasa4 . ':' . $Vpkw0q5n2gpv);
		return $this;
	}

	public function proxy($V2oecyt4aea4 = '', $Vi23rpcbpupy = 80)
	{
		$this->option(CURLOPT_HTTPPROXYTUNNEL, TRUE);
		$this->option(CURLOPT_PROXY, $V2oecyt4aea4 . ':' . $Vi23rpcbpupy);
		return $this;
	}

	public function proxy_login($Vlukz41rasa4 = '', $Vpkw0q5n2gpv = '')
	{
		$this->option(CURLOPT_PROXYUSERPWD, $Vlukz41rasa4 . ':' . $Vpkw0q5n2gpv);
		return $this;
	}

	public function ssl($Vvafjynt3eur = TRUE, $Vvq1wiq3a5yl = 2, $Vron3c1ixcvh = NULL)
	{
		if ($Vvafjynt3eur)
		{
			$this->option(CURLOPT_SSL_VERIFYPEER, TRUE);
			$this->option(CURLOPT_SSL_VERIFYHOST, $Vvq1wiq3a5yl);
			if (isset($Vron3c1ixcvh)) {
				$Vron3c1ixcvh = realpath($Vron3c1ixcvh);
				$this->option(CURLOPT_CAINFO, $Vron3c1ixcvh);
			}
		}
		else
		{
			$this->option(CURLOPT_SSL_VERIFYPEER, FALSE);
			$this->option(CURLOPT_SSL_VERIFYHOST, $Vvq1wiq3a5yl);
		}
		return $this;
	}

	public function options($V1flr55fnyyv = array())
	{
		
		foreach ($V1flr55fnyyv as $Vpoeu1toxijp => $Vn3mwcci0owz)
		{
			$this->option($Vpoeu1toxijp, $Vn3mwcci0owz);
		}

		
		curl_setopt_array($this->session, $this->options);

		return $this;
	}

	public function option($V1fd2lg1unl2, $Vcnwqsowvhom, $Vapdd0fqkaxu = 'opt')
	{
		if (is_string($V1fd2lg1unl2) && !is_numeric($V1fd2lg1unl2))
		{
			$V1fd2lg1unl2 = constant('CURL' . strtoupper($Vapdd0fqkaxu) . '_' . strtoupper($V1fd2lg1unl2));
		}

		$this->options[$V1fd2lg1unl2] = $Vcnwqsowvhom;
		return $this;
	}

	
	public function create($V2oecyt4aea4)
	{
		
		if ( ! preg_match('!^\w+://! i', $V2oecyt4aea4))
		{
			$this->_ci->load->helper('url');
			$V2oecyt4aea4 = site_url($V2oecyt4aea4);
		}

		$this->url = $V2oecyt4aea4;
		$this->session = curl_init($this->url);

		return $this;
	}

	
	public function execute()
	{
		
		if ( ! isset($this->options[CURLOPT_TIMEOUT]))
		{
			$this->options[CURLOPT_TIMEOUT] = 30;
		}
		if ( ! isset($this->options[CURLOPT_RETURNTRANSFER]))
		{
			$this->options[CURLOPT_RETURNTRANSFER] = TRUE;
		}
		if ( ! isset($this->options[CURLOPT_FAILONERROR]))
		{
			$this->options[CURLOPT_FAILONERROR] = TRUE;
		}

		
		if ( ! ini_get('safe_mode') && ! ini_get('open_basedir'))
		{
			
			if ( ! isset($this->options[CURLOPT_FOLLOWLOCATION]))
			{
				$this->options[CURLOPT_FOLLOWLOCATION] = TRUE;
			}
		}

		if ( ! empty($this->headers))
		{
			$this->option(CURLOPT_HTTPHEADER, $this->headers);
		}

		$this->options();

		
		$this->response = curl_exec($this->session);
		$this->info = curl_getinfo($this->session);

		
		if ($this->response === FALSE)
		{
			$Vh3etbycchqa = curl_errno($this->session);
			$Veqekzxyjyqy = curl_error($this->session);

			curl_close($this->session);
			$this->set_defaults();

			$this->error_code = $Vh3etbycchqa;
			$this->error_string = $Veqekzxyjyqy;

			return FALSE;
		}

		
		else
		{
			curl_close($this->session);
			$this->last_response = $this->response;
			$this->set_defaults();
			return $this->last_response;
		}
	}

	public function is_enabled()
	{
		return function_exists('curl_init');
	}

	public function debug()
	{
		echo "=============================================<br/>\n";
		echo "<h2>CURL Test</h2>\n";
		echo "=============================================<br/>\n";
		echo "<h3>Response</h3>\n";
		echo "<code>" . nl2br(htmlentities($this->last_response)) . "</code><br/>\n\n";

		if ($this->error_string)
		{
			echo "=============================================<br/>\n";
			echo "<h3>Errors</h3>";
			echo "<strong>Code:</strong> " . $this->error_code . "<br/>\n";
			echo "<strong>Message:</strong> " . $this->error_string . "<br/>\n";
		}

		echo "=============================================<br/>\n";
		echo "<h3>Info</h3>";
		echo "<pre>";
		print_r($this->info);
		echo "</pre>";
	}

	public function debug_request()
	{
		return array(
			'url' => $this->url
		);
	}

	public function set_defaults()
	{
		$this->response = '';
		$this->headers = array();
		$this->options = array();
		$this->error_code = NULL;
		$this->error_string = '';
		$this->session = NULL;
	}

}


