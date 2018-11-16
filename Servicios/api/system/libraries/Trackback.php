<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Trackback {

	
	public $Vwxuqfbo3r2c = 'UTF-8';

	
	public $Vfeinw1hsfej = array(
		'url' => '',
		'title' => '',
		'excerpt' => '',
		'blog_name' => '',
		'charset' => ''
	);

	
	public $Vr0tktfsrnnz = TRUE;

	
	public $Vpa2qbhtxuyd = '';

	
	public $V11dpqpkcbtz = array();

	

	
	public function __construct()
	{
		log_message('info', 'Trackback Class Initialized');
	}

	

	
	public function send($Vxhhgxmvthjb)
	{
		if ( ! is_array($Vxhhgxmvthjb))
		{
			$this->set_error('The send() method must be passed an array');
			return FALSE;
		}

		
		foreach (array('url', 'title', 'excerpt', 'blog_name', 'ping_url') as $Vutaiebycwbq)
		{
			if ( ! isset($Vxhhgxmvthjb[$Vutaiebycwbq]))
			{
				$this->set_error('Required item missing: '.$Vutaiebycwbq);
				return FALSE;
			}

			switch ($Vutaiebycwbq)
			{
				case 'ping_url':
					$$Vutaiebycwbq = $this->extract_urls($Vxhhgxmvthjb[$Vutaiebycwbq]);
					break;
				case 'excerpt':
					$$Vutaiebycwbq = $this->limit_characters($this->convert_xml(strip_tags(stripslashes($Vxhhgxmvthjb[$Vutaiebycwbq]))));
					break;
				case 'url':
					$$Vutaiebycwbq = str_replace('&#45;', '-', $this->convert_xml(strip_tags(stripslashes($Vxhhgxmvthjb[$Vutaiebycwbq]))));
					break;
				default:
					$$Vutaiebycwbq = $this->convert_xml(strip_tags(stripslashes($Vxhhgxmvthjb[$Vutaiebycwbq])));
					break;
			}

			
			if ($this->convert_ascii === TRUE && in_array($Vutaiebycwbq, array('excerpt', 'title', 'blog_name'), TRUE))
			{
				$$Vutaiebycwbq = $this->convert_ascii($$Vutaiebycwbq);
			}
		}

		
		$Vwxuqfbo3r2c = isset($Vxhhgxmvthjb['charset']) ? $Vxhhgxmvthjb['charset'] : $this->charset;

		$Vfeinw1hsfej = 'url='.rawurlencode($V2oecyt4aea4).'&title='.rawurlencode($Vqihmib4sqvm).'&blog_name='.rawurlencode($Vvcscoqvg5yy)
			.'&excerpt='.rawurlencode($Vii2rlfg3g0x).'&charset='.rawurlencode($Vwxuqfbo3r2c);

		
		$Vb5hjbk2mbwk = TRUE;
		if (count($V4hqg2ex1meh) > 0)
		{
			foreach ($V4hqg2ex1meh as $V2oecyt4aea4)
			{
				if ($this->process($V2oecyt4aea4, $Vfeinw1hsfej) === FALSE)
				{
					$Vb5hjbk2mbwk = FALSE;
				}
			}
		}

		return $Vb5hjbk2mbwk;
	}

	

	
	public function receive()
	{
		foreach (array('url', 'title', 'blog_name', 'excerpt') as $Va4zo0rltynr)
		{
			if (empty($_POST[$Va4zo0rltynr]))
			{
				$this->set_error('The following required POST variable is missing: '.$Va4zo0rltynr);
				return FALSE;
			}

			$this->data['charset'] = isset($_POST['charset']) ? strtoupper(trim($_POST['charset'])) : 'auto';

			if ($Va4zo0rltynr !== 'url' && MB_ENABLED === TRUE)
			{
				if (MB_ENABLED === TRUE)
				{
					$_POST[$Va4zo0rltynr] = mb_convert_encoding($_POST[$Va4zo0rltynr], $this->charset, $this->data['charset']);
				}
				elseif (ICONV_ENABLED === TRUE)
				{
					$_POST[$Va4zo0rltynr] = @iconv($this->data['charset'], $this->charset.'//IGNORE', $_POST[$Va4zo0rltynr]);
				}
			}

			$_POST[$Va4zo0rltynr] = ($Va4zo0rltynr !== 'url') ? $this->convert_xml(strip_tags($_POST[$Va4zo0rltynr])) : strip_tags($_POST[$Va4zo0rltynr]);

			if ($Va4zo0rltynr === 'excerpt')
			{
				$_POST['excerpt'] = $this->limit_characters($_POST['excerpt']);
			}

			$this->data[$Va4zo0rltynr] = $_POST[$Va4zo0rltynr];
		}

		return TRUE;
	}

	

	
	public function send_error($V15xvmvzbb0h = 'Incomplete Information')
	{
		exit('<?xml version="1.0" encoding="utf-8"?'.">\n<response>\n<error>1</error>\n<message>".$V15xvmvzbb0h."</message>\n</response>");
	}

	

	
	public function send_success()
	{
		exit('<?xml version="1.0" encoding="utf-8"?'.">\n<response>\n<error>0</error>\n</response>");
	}

	

	
	public function data($Vutaiebycwbq)
	{
		return isset($this->data[$Vutaiebycwbq]) ? $this->data[$Vutaiebycwbq] : '';
	}

	

	
	public function process($V2oecyt4aea4, $Vfeinw1hsfej)
	{
		$Va4s3mwrneh1 = parse_url($V2oecyt4aea4);

		
		if ( ! $Vzuexymrvrpz = @fsockopen($Va4s3mwrneh1['host'], 80))
		{
			$this->set_error('Invalid Connection: '.$V2oecyt4aea4);
			return FALSE;
		}

		
		$Vcmaitbcbmmk = isset($Va4s3mwrneh1['path']) ? $Va4s3mwrneh1['path'] : $V2oecyt4aea4;
		empty($Va4s3mwrneh1['query']) OR $Vcmaitbcbmmk .= '?'.$Va4s3mwrneh1['query'];

		
		if ($Vdrzyozqxvbr = $this->get_id($V2oecyt4aea4))
		{
			$Vfeinw1hsfej = 'tb_id='.$Vdrzyozqxvbr.'&'.$Vfeinw1hsfej;
		}

		
		fputs($Vzuexymrvrpz, 'POST '.$Vcmaitbcbmmk." HTTP/1.0\r\n");
		fputs($Vzuexymrvrpz, 'Host: '.$Va4s3mwrneh1['host']."\r\n");
		fputs($Vzuexymrvrpz, "Content-type: application/x-www-form-urlencoded\r\n");
		fputs($Vzuexymrvrpz, 'Content-length: '.strlen($Vfeinw1hsfej)."\r\n");
		fputs($Vzuexymrvrpz, "Connection: close\r\n\r\n");
		fputs($Vzuexymrvrpz, $Vfeinw1hsfej);

		

		$this->response = '';
		while ( ! feof($Vzuexymrvrpz))
		{
			$this->response .= fgets($Vzuexymrvrpz, 128);
		}
		@fclose($Vzuexymrvrpz);

		if (stripos($this->response, '<error>0</error>') === FALSE)
		{
			$V15xvmvzbb0h = preg_match('/<message>(.*?)<\/message>/is', $this->response, $V4uvjtwtgjvp)
				? trim($V4uvjtwtgjvp[1])
				: 'An unknown error was encountered';
			$this->set_error($V15xvmvzbb0h);
			return FALSE;
		}

		return TRUE;
	}

	

	
	public function extract_urls($V2oecyt4aea4s)
	{
		
		$V2oecyt4aea4s = str_replace(',,', ',', preg_replace('/\s*(\S+)\s*/', '\\1,', $V2oecyt4aea4s));

		
		$V2oecyt4aea4s = array_unique(preg_split('/[,]/', rtrim($V2oecyt4aea4s, ',')));

		array_walk($V2oecyt4aea4s, array($this, 'validate_url'));
		return $V2oecyt4aea4s;
	}

	

	
	public function validate_url(&$V2oecyt4aea4)
	{
		$V2oecyt4aea4 = trim($V2oecyt4aea4);

		if (strpos($V2oecyt4aea4, 'http') !== 0)
		{
			$V2oecyt4aea4 = 'http://'.$V2oecyt4aea4;
		}
	}

	

	
	public function get_id($V2oecyt4aea4)
	{
		$Vrn3w2udvg3c = '';

		if (strpos($V2oecyt4aea4, '?') !== FALSE)
		{
			$Vw2gifczintt = explode('/', $V2oecyt4aea4);
			$Vrtx1fgrpoho   = $Vw2gifczintt[count($Vw2gifczintt)-1];

			if ( ! is_numeric($Vrtx1fgrpoho))
			{
				$Vrtx1fgrpoho  = $Vw2gifczintt[count($Vw2gifczintt)-2];
			}

			$Vw2gifczintt = explode('=', $Vrtx1fgrpoho);
			$Vrn3w2udvg3c	= $Vw2gifczintt[count($Vw2gifczintt)-1];
		}
		else
		{
			$V2oecyt4aea4 = rtrim($V2oecyt4aea4, '/');

			$Vw2gifczintt = explode('/', $V2oecyt4aea4);
			$Vrn3w2udvg3c	= $Vw2gifczintt[count($Vw2gifczintt)-1];

			if ( ! is_numeric($Vrn3w2udvg3c))
			{
				$Vrn3w2udvg3c = $Vw2gifczintt[count($Vw2gifczintt)-2];
			}
		}

		return ctype_digit((string) $Vrn3w2udvg3c) ? $Vrn3w2udvg3c : FALSE;
	}

	

	
	public function convert_xml($Vssdjb5oqaky)
	{
		$V3iiokxda3xw = '__TEMP_AMPERSANDS__';

		$Vssdjb5oqaky = preg_replace(array('/&#(\d+);/', '/&(\w+);/'), $V3iiokxda3xw.'\\1;', $Vssdjb5oqaky);

		$Vssdjb5oqaky = str_replace(array('&', '<', '>', '"', "'", '-'),
					array('&amp;', '&lt;', '&gt;', '&quot;', '&#39;', '&#45;'),
					$Vssdjb5oqaky);

		return preg_replace(array('/'.$V3iiokxda3xw.'(\d+);/', '/'.$V3iiokxda3xw.'(\w+);/'), array('&#\\1;', '&\\1;'), $Vssdjb5oqaky);
	}

	

	
	public function limit_characters($Vssdjb5oqaky, $Vewkafdpowpc = 500, $Vkddqpfvpize = '&#8230;')
	{
		if (strlen($Vssdjb5oqaky) < $Vewkafdpowpc)
		{
			return $Vssdjb5oqaky;
		}

		$Vssdjb5oqaky = preg_replace('/\s+/', ' ', str_replace(array("\r\n", "\r", "\n"), ' ', $Vssdjb5oqaky));

		if (strlen($Vssdjb5oqaky) <= $Vewkafdpowpc)
		{
			return $Vssdjb5oqaky;
		}

		$Vlxaqc0cx0ab = '';
		foreach (explode(' ', trim($Vssdjb5oqaky)) as $Va4zo0rltynr)
		{
			$Vlxaqc0cx0ab .= $Va4zo0rltynr.' ';
			if (strlen($Vlxaqc0cx0ab) >= $Vewkafdpowpc)
			{
				return rtrim($Vlxaqc0cx0ab).$Vkddqpfvpize;
			}
		}
	}

	

	
	public function convert_ascii($Vssdjb5oqaky)
	{
		$V2jbvukjonhh	= 1;
		$Vlxaqc0cx0ab	= '';
		$V3iiokxda3xw	= array();

		for ($Vep0df0xosaw = 0, $Vqthdlsgdszy = strlen($Vssdjb5oqaky); $Vep0df0xosaw < $Vqthdlsgdszy; $Vep0df0xosaw++)
		{
			$Vos0be5e10pq = ord($Vssdjb5oqaky[$Vep0df0xosaw]);

			if ($Vos0be5e10pq < 128)
			{
				$Vlxaqc0cx0ab .= $Vssdjb5oqaky[$Vep0df0xosaw];
			}
			else
			{
				if (count($V3iiokxda3xw) === 0)
				{
					$V2jbvukjonhh = ($Vos0be5e10pq < 224) ? 2 : 3;
				}

				$V3iiokxda3xw[] = $Vos0be5e10pq;

				if (count($V3iiokxda3xw) === $V2jbvukjonhh)
				{
					$Vewkafdpowpcumber = ($V2jbvukjonhh === 3)
						? (($V3iiokxda3xw[0] % 16) * 4096) + (($V3iiokxda3xw[1] % 64) * 64) + ($V3iiokxda3xw[2] % 64)
						: (($V3iiokxda3xw[0] % 32) * 64) + ($V3iiokxda3xw[1] % 64);

					$Vlxaqc0cx0ab .= '&#'.$Vewkafdpowpcumber.';';
					$V2jbvukjonhh = 1;
					$V3iiokxda3xw = array();
				}
			}
		}

		return $Vlxaqc0cx0ab;
	}

	

	
	public function set_error($Vv3gvm3x3hvm)
	{
		log_message('error', $Vv3gvm3x3hvm);
		$this->error_msg[] = $Vv3gvm3x3hvm;
	}

	

	
	public function display_errors($Vtgs3loifva1 = '<p>', $Vcjnmovluifh = '</p>')
	{
		return (count($this->error_msg) > 0) ? $Vtgs3loifva1.implode($Vcjnmovluifh.$Vtgs3loifva1, $this->error_msg).$Vcjnmovluifh : '';
	}

}
