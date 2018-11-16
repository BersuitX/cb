<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Email {

	
	public $Vd1uji21fwbg	= 'CodeIgniter';

	
	public $Vm11ppdehsry	= '/usr/sbin/sendmail';	

	
	public $Vibnldchwanv	= 'mail';		

	
	public $Vgww5b2blv1g	= '';

	
	public $Vub02zhiak1j	= '';

	
	public $Vvfy1wxlt5hd	= '';

	
	public $V5ufwbudapyq	= 25;

	
	public $Vpjccy1sixj2	= 5;

	
	public $Vd0dkocl3lyl	= FALSE;

	
	public $Vgxjliyuriqj	= '';

	
	public $Vsgy1ntrrxc1	= TRUE;

	
	public $V220salmmkyz	= 76;

	
	public $Vulnndx4czpk	= 'text';

	
	public $Vwxuqfbo3r2c		= 'utf-8';

	
	public $Vu4ls0ewy02c	= 'mixed';		

	
	public $V4kwhjbjujvh	= '';

	
	public $Vgiiz30hd442	= FALSE;

	
	public $Vhhhiovpojls	= 3;			

	
	public $Vkq5rgcyqdq1		= "\n";			

	
	public $Vq1hqkrreqcd		= "\n";

	
	public $Vcuebtfasl53		= FALSE;

	
	public $Vnkqdolltprt	= TRUE;

	
	public $V5tf2lthxpki	= FALSE;

	
	public $Vypg242n51ht	= 200;

	

	
	protected $Vhfjh3cxsrub		= FALSE;

	
	protected $Vwwifmjlw1aj		= '';

	
	protected $V4mzpsyushok		= '';

	
	protected $Vcta14v2hmmt		= '';

	
	protected $V4rtl5454jq4	= '';

	
	protected $Vwhnir25s0d2	= '';

	
	protected $V1jxopo1fzj2		= '';

	
	protected $V1yfa2tqjo1o	= '';

	
	protected $V22muunhf1mx		= '8bit';

	
	protected $Vi0sw3kwc4bb		= FALSE;

	
	protected $V5td22djb12s	= FALSE;

	
	protected $Vkvuzpajt4fm		= array();

	
	protected $Vwx4z5phxlpv		= array();

	
	protected $Vhzek1swr3qr		= array();

	
	protected $Vkbns335twzx		= array();

	
	protected $Vxplnwaoapdf		= array();

	
	protected $Vacgzjwsa2e4		= array();

	
	protected $Vbupmfx3eoi4		= array('mail', 'sendmail', 'smtp');

	
	protected $V3hq3qulvyyg	= array('us-ascii', 'iso-2022-');

	
	protected $Vwrq4simfpdj		= array('7bit', '8bit');

	
	protected $Vvrayl0zyz51 = array(
		1 => '1 (Highest)',
		2 => '2 (High)',
		3 => '3 (Normal)',
		4 => '4 (Low)',
		5 => '5 (Lowest)'
	);

	

	
	public function __construct(array $Vnmcm15juye5 = array())
	{
		$this->charset = config_item('charset');

		if (count($Vnmcm15juye5) > 0)
		{
			$this->initialize($Vnmcm15juye5);
		}
		else
		{
			$this->_smtp_auth = ! ($this->smtp_user === '' && $this->smtp_pass === '');
		}

		$this->_safe_mode = ( ! is_php('5.4') && ini_get('safe_mode'));
		$this->charset = strtoupper($this->charset);

		log_message('info', 'Email Class Initialized');
	}

	

	
	public function __destruct()
	{
		if (is_resource($this->_smtp_connect))
		{
			$this->_send_command('quit');
		}
	}

	

	
	public function initialize($Vnmcm15juye5 = array())
	{
		foreach ($Vnmcm15juye5 as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if (isset($this->$V2xim30qek4u))
			{
				$V5dsbozs5xhq = 'set_'.$V2xim30qek4u;

				if (method_exists($this, $V5dsbozs5xhq))
				{
					$this->$V5dsbozs5xhq($Va4zo0rltynr);
				}
				else
				{
					$this->$V2xim30qek4u = $Va4zo0rltynr;
				}
			}
		}
		$this->clear();

		$this->_smtp_auth = ! ($this->smtp_user === '' && $this->smtp_pass === '');

		return $this;
	}

	

	
	public function clear($Vhmo3weeo3lr = FALSE)
	{
		$this->_subject		= '';
		$this->_body		= '';
		$this->_finalbody	= '';
		$this->_header_str	= '';
		$this->_replyto_flag	= FALSE;
		$this->_recipients	= array();
		$this->_cc_array	= array();
		$this->_bcc_array	= array();
		$this->_headers		= array();
		$this->_debug_msg	= array();

		$this->set_header('User-Agent', $this->useragent);
		$this->set_header('Date', $this->_set_date());

		if ($Vhmo3weeo3lr !== FALSE)
		{
			$this->_attachments = array();
		}

		return $this;
	}

	

	
	public function from($Vjpucafbphra, $Vaclaigdbtoo = '', $Vdr2dbeqnkau = NULL)
	{
		if (preg_match('/\<(.*)\>/', $Vjpucafbphra, $V4uvjtwtgjvp))
		{
			$Vjpucafbphra = $V4uvjtwtgjvp[1];
		}

		if ($this->validate)
		{
			$this->validate_email($this->_str_to_array($Vjpucafbphra));
			if ($Vdr2dbeqnkau)
			{
				$this->validate_email($this->_str_to_array($Vdr2dbeqnkau));
			}
		}

		
		if ($Vaclaigdbtoo !== '')
		{
			
			if ( ! preg_match('/[\200-\377]/', $Vaclaigdbtoo))
			{
				
				$Vaclaigdbtoo = '"'.addcslashes($Vaclaigdbtoo, "\0..\37\177'\"\\").'"';
			}
			else
			{
				$Vaclaigdbtoo = $this->_prep_q_encoding($Vaclaigdbtoo);
			}
		}

		$this->set_header('From', $Vaclaigdbtoo.' <'.$Vjpucafbphra.'>');

		isset($Vdr2dbeqnkau) OR $Vdr2dbeqnkau = $Vjpucafbphra;
		$this->set_header('Return-Path', '<'.$Vdr2dbeqnkau.'>');

		return $this;
	}

	

	
	public function reply_to($Vrukwfjo0fug, $Vaclaigdbtoo = '')
	{
		if (preg_match('/\<(.*)\>/', $Vrukwfjo0fug, $V4uvjtwtgjvp))
		{
			$Vrukwfjo0fug = $V4uvjtwtgjvp[1];
		}

		if ($this->validate)
		{
			$this->validate_email($this->_str_to_array($Vrukwfjo0fug));
		}

		if ($Vaclaigdbtoo !== '')
		{
			
			if ( ! preg_match('/[\200-\377]/', $Vaclaigdbtoo))
			{
				
				$Vaclaigdbtoo = '"'.addcslashes($Vaclaigdbtoo, "\0..\37\177'\"\\").'"';
			}
			else
			{
				$Vaclaigdbtoo = $this->_prep_q_encoding($Vaclaigdbtoo);
			}
		}

		$this->set_header('Reply-To', $Vaclaigdbtoo.' <'.$Vrukwfjo0fug.'>');
		$this->_replyto_flag = TRUE;

		return $this;
	}

	

	
	public function to($Vp01kupa53xf)
	{
		$Vp01kupa53xf = $this->_str_to_array($Vp01kupa53xf);
		$Vp01kupa53xf = $this->clean_email($Vp01kupa53xf);

		if ($this->validate)
		{
			$this->validate_email($Vp01kupa53xf);
		}

		if ($this->_get_protocol() !== 'mail')
		{
			$this->set_header('To', implode(', ', $Vp01kupa53xf));
		}

		$this->_recipients = $Vp01kupa53xf;

		return $this;
	}

	

	
	public function cc($Vbhpy0j0aajc)
	{
		$Vbhpy0j0aajc = $this->clean_email($this->_str_to_array($Vbhpy0j0aajc));

		if ($this->validate)
		{
			$this->validate_email($Vbhpy0j0aajc);
		}

		$this->set_header('Cc', implode(', ', $Vbhpy0j0aajc));

		if ($this->_get_protocol() === 'smtp')
		{
			$this->_cc_array = $Vbhpy0j0aajc;
		}

		return $this;
	}

	

	
	public function bcc($Va0sv2akblms, $V2bur4u05u2g = '')
	{
		if ($V2bur4u05u2g !== '' && is_numeric($V2bur4u05u2g))
		{
			$this->bcc_batch_mode = TRUE;
			$this->bcc_batch_size = $V2bur4u05u2g;
		}

		$Va0sv2akblms = $this->clean_email($this->_str_to_array($Va0sv2akblms));

		if ($this->validate)
		{
			$this->validate_email($Va0sv2akblms);
		}

		if ($this->_get_protocol() === 'smtp' OR ($this->bcc_batch_mode && count($Va0sv2akblms) > $this->bcc_batch_size))
		{
			$this->_bcc_array = $Va0sv2akblms;
		}
		else
		{
			$this->set_header('Bcc', implode(', ', $Va0sv2akblms));
		}

		return $this;
	}

	

	
	public function subject($Vpuh3b5b5rso)
	{
		$Vpuh3b5b5rso = $this->_prep_q_encoding($Vpuh3b5b5rso);
		$this->set_header('Subject', $Vpuh3b5b5rso);
		return $this;
	}

	

	
	public function message($Vbreljhx2gqz)
	{
		$this->_body = rtrim(str_replace("\r", '', $Vbreljhx2gqz));

		
		if ( ! is_php('5.4') && get_magic_quotes_gpc())
		{
			$this->_body = stripslashes($this->_body);
		}

		return $this;
	}

	

	
	public function attach($Vligofq0fb34, $Vow5aquk4ayg = '', $Vd3ikamvacdl = NULL, $Vf4dlektv1ba = '')
	{
		if ($Vf4dlektv1ba === '')
		{
			if (strpos($Vligofq0fb34, '://') === FALSE && ! file_exists($Vligofq0fb34))
			{
				$this->_set_error_message('lang:email_attachment_missing', $Vligofq0fb34);
				return FALSE;
			}

			if ( ! $Vzuexymrvrpz = @fopen($Vligofq0fb34, 'rb'))
			{
				$this->_set_error_message('lang:email_attachment_unreadable', $Vligofq0fb34);
				return FALSE;
			}

			$Vligofq0fb34_content = stream_get_contents($Vzuexymrvrpz);
			$Vf4dlektv1ba = $this->_mime_types(pathinfo($Vligofq0fb34, PATHINFO_EXTENSION));
			fclose($Vzuexymrvrpz);
		}
		else
		{
			$Vligofq0fb34_content =& $Vligofq0fb34; 
		}

		$this->_attachments[] = array(
			'name'		=> array($Vligofq0fb34, $Vd3ikamvacdl),
			'disposition'	=> empty($Vow5aquk4ayg) ? 'attachment' : $Vow5aquk4ayg,  
			'type'		=> $Vf4dlektv1ba,
			'content'	=> chunk_split(base64_encode($Vligofq0fb34_content))
		);

		return $this;
	}

	

	
	public function attachment_cid($Vligofq0fb34name)
	{
		if ($this->multipart !== 'related')
		{
			$this->multipart = 'related'; 
		}

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($this->_attachments); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if ($this->_attachments[$Vep0df0xosaw]['name'][0] === $Vligofq0fb34name)
			{
				$this->_attachments[$Vep0df0xosaw]['cid'] = uniqid(basename($this->_attachments[$Vep0df0xosaw]['name'][0]).'@');
				return $this->_attachments[$Vep0df0xosaw]['cid'];
			}
		}

		return FALSE;
	}

	

	
	public function set_header($V3lefstrzfrx, $Va4zo0rltynrue)
	{
		$this->_headers[$V3lefstrzfrx] = str_replace(array("\n", "\r"), '', $Va4zo0rltynrue);
		return $this;
	}

	

	
	protected function _str_to_array($Vi2s52urac1m)
	{
		if ( ! is_array($Vi2s52urac1m))
		{
			return (strpos($Vi2s52urac1m, ',') !== FALSE)
				? preg_split('/[\s,]/', $Vi2s52urac1m, -1, PREG_SPLIT_NO_EMPTY)
				: (array) trim($Vi2s52urac1m);
		}

		return $Vi2s52urac1m;
	}

	

	
	public function set_alt_message($Vssdjb5oqaky)
	{
		$this->alt_message = (string) $Vssdjb5oqaky;
		return $this;
	}

	

	
	public function set_mailtype($V4wtbblc1wn4 = 'text')
	{
		$this->mailtype = ($V4wtbblc1wn4 === 'html') ? 'html' : 'text';
		return $this;
	}

	

	
	public function set_wordwrap($Vsgy1ntrrxc1 = TRUE)
	{
		$this->wordwrap = (bool) $Vsgy1ntrrxc1;
		return $this;
	}

	

	
	public function set_protocol($Vibnldchwanv = 'mail')
	{
		$this->protocol = in_array($Vibnldchwanv, $this->_protocols, TRUE) ? strtolower($Vibnldchwanv) : 'mail';
		return $this;
	}

	

	
	public function set_priority($Vewkafdpowpc = 3)
	{
		$this->priority = preg_match('/^[1-5]$/', $Vewkafdpowpc) ? (int) $Vewkafdpowpc : 3;
		return $this;
	}

	

	
	public function set_newline($Vkq5rgcyqdq1 = "\n")
	{
		$this->newline = in_array($Vkq5rgcyqdq1, array("\n", "\r\n", "\r")) ? $Vkq5rgcyqdq1 : "\n";
		return $this;
	}

	

	
	public function set_crlf($Vq1hqkrreqcd = "\n")
	{
		$this->crlf = ($Vq1hqkrreqcd !== "\n" && $Vq1hqkrreqcd !== "\r\n" && $Vq1hqkrreqcd !== "\r") ? "\n" : $Vq1hqkrreqcd;
		return $this;
	}

	

	
	protected function _set_boundaries()
	{
		$this->_alt_boundary = 'B_ALT_'.uniqid(''); 
		$this->_atc_boundary = 'B_ATC_'.uniqid(''); 
	}

	

	
	protected function _get_message_id()
	{
		$Vjpucafbphra = str_replace(array('>', '<'), '', $this->_headers['Return-Path']);
		return '<'.uniqid('').strstr($Vjpucafbphra, '@').'>';
	}

	

	
	protected function _get_protocol($Vb5hjbk2mbwk = TRUE)
	{
		$this->protocol = strtolower($this->protocol);
		in_array($this->protocol, $this->_protocols, TRUE) OR $this->protocol = 'mail';

		if ($Vb5hjbk2mbwk === TRUE)
		{
			return $this->protocol;
		}
	}

	

	
	protected function _get_encoding($Vb5hjbk2mbwk = TRUE)
	{
		in_array($this->_encoding, $this->_bit_depths) OR $this->_encoding = '8bit';

		foreach ($this->_base_charsets as $Vwxuqfbo3r2c)
		{
			if (strpos($Vwxuqfbo3r2c, $this->charset) === 0)
			{
				$this->_encoding = '7bit';
			}
		}

		if ($Vb5hjbk2mbwk === TRUE)
		{
			return $this->_encoding;
		}
	}

	

	
	protected function _get_content_type()
	{
		if ($this->mailtype === 'html')
		{
			return (count($this->_attachments) === 0) ? 'html' : 'html-attach';
		}
		elseif	($this->mailtype === 'text' && count($this->_attachments) > 0)
		{
			return 'plain-attach';
		}
		else
		{
			return 'plain';
		}
	}

	

	
	protected function _set_date()
	{
		$Vvwslmtkbaql = date('Z');
		$Vwlizxiigw2q = ($Vvwslmtkbaql[0] === '-') ? '-' : '+';
		$Vvwslmtkbaql = abs($Vvwslmtkbaql);
		$Vvwslmtkbaql = floor($Vvwslmtkbaql/3600) * 100 + ($Vvwslmtkbaql % 3600) / 60;

		return sprintf('%s %s%04d', date('D, j M Y H:i:s'), $Vwlizxiigw2q, $Vvwslmtkbaql);
	}

	

	
	protected function _get_mime_message()
	{
		return 'This is a multi-part message in MIME format.'.$this->newline.'Your email application may not support this format.';
	}

	

	
	public function validate_email($Vi2s52urac1m)
	{
		if ( ! is_array($Vi2s52urac1m))
		{
			$this->_set_error_message('lang:email_must_be_array');
			return FALSE;
		}

		foreach ($Vi2s52urac1m as $Va4zo0rltynr)
		{
			if ( ! $this->valid_email($Va4zo0rltynr))
			{
				$this->_set_error_message('lang:email_invalid_address', $Va4zo0rltynr);
				return FALSE;
			}
		}

		return TRUE;
	}

	

	
	public function valid_email($Vi2s52urac1m)
	{
		if (function_exists('idn_to_ascii') && $Vya2qxacr13k = strpos($Vi2s52urac1m, '@'))
		{
			$Vi2s52urac1m = substr($Vi2s52urac1m, 0, ++$Vya2qxacr13k).idn_to_ascii(substr($Vi2s52urac1m, $Vya2qxacr13k));
		}

		return (bool) filter_var($Vi2s52urac1m, FILTER_VALIDATE_EMAIL);
	}

	

	
	public function clean_email($Vi2s52urac1m)
	{
		if ( ! is_array($Vi2s52urac1m))
		{
			return preg_match('/\<(.*)\>/', $Vi2s52urac1m, $V4uvjtwtgjvp) ? $V4uvjtwtgjvp[1] : $Vi2s52urac1m;
		}

		$Vn2ycfau434slean_email = array();

		foreach ($Vi2s52urac1m as $Vwbm0ioxqvpz)
		{
			$Vn2ycfau434slean_email[] = preg_match('/\<(.*)\>/', $Vwbm0ioxqvpz, $V4uvjtwtgjvp) ? $V4uvjtwtgjvp[1] : $Vwbm0ioxqvpz;
		}

		return $Vn2ycfau434slean_email;
	}

	

	
	protected function _get_alt_message()
	{
		if ( ! empty($this->alt_message))
		{
			return ($this->wordwrap)
				? $this->word_wrap($this->alt_message, 76)
				: $this->alt_message;
		}

		$Vbreljhx2gqz = preg_match('/\<body.*?\>(.*)\<\/body\>/si', $this->_body, $V4uvjtwtgjvp) ? $V4uvjtwtgjvp[1] : $this->_body;
		$Vbreljhx2gqz = str_replace("\t", '', preg_replace('#<!--(.*)--\>#', '', trim(strip_tags($Vbreljhx2gqz))));

		for ($Vep0df0xosaw = 20; $Vep0df0xosaw >= 3; $Vep0df0xosaw--)
		{
			$Vbreljhx2gqz = str_replace(str_repeat("\n", $Vep0df0xosaw), "\n\n", $Vbreljhx2gqz);
		}

		
		$Vbreljhx2gqz = preg_replace('| +|', ' ', $Vbreljhx2gqz);

		return ($this->wordwrap)
			? $this->word_wrap($Vbreljhx2gqz, 76)
			: $Vbreljhx2gqz;
	}

	

	
	public function word_wrap($Vssdjb5oqaky, $Vn2ycfau434sharlim = NULL)
	{
		
		if (empty($Vn2ycfau434sharlim))
		{
			$Vn2ycfau434sharlim = empty($this->wrapchars) ? 76 : $this->wrapchars;
		}

		
		if (strpos($Vssdjb5oqaky, "\r") !== FALSE)
		{
			$Vssdjb5oqaky = str_replace(array("\r\n", "\r"), "\n", $Vssdjb5oqaky);
		}

		
		$Vssdjb5oqaky = preg_replace('| +\n|', "\n", $Vssdjb5oqaky);

		
		
		$Vfby3m15zmsl = array();
		if (preg_match_all('|\{unwrap\}(.+?)\{/unwrap\}|s', $Vssdjb5oqaky, $V4uvjtwtgjvpes))
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($V4uvjtwtgjvpes[0]); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$Vfby3m15zmsl[] = $V4uvjtwtgjvpes[1][$Vep0df0xosaw];
				$Vssdjb5oqaky = str_replace($V4uvjtwtgjvpes[0][$Vep0df0xosaw], '{{unwrapped'.$Vep0df0xosaw.'}}', $Vssdjb5oqaky);
			}
		}

		
		
		
		$Vssdjb5oqaky = wordwrap($Vssdjb5oqaky, $Vn2ycfau434sharlim, "\n", FALSE);

		
		$Vzxix2pqoztx = '';
		foreach (explode("\n", $Vssdjb5oqaky) as $Vcfdirgq3swa)
		{
			
			
			if (mb_strlen($Vcfdirgq3swa) <= $Vn2ycfau434sharlim)
			{
				$Vzxix2pqoztx .= $Vcfdirgq3swa.$this->newline;
				continue;
			}

			$V3iiokxda3xw = '';
			do
			{
				
				if (preg_match('!\[url.+\]|://|www\.!', $Vcfdirgq3swa))
				{
					break;
				}

				
				$V3iiokxda3xw .= mb_substr($Vcfdirgq3swa, 0, $Vn2ycfau434sharlim - 1);
				$Vcfdirgq3swa = mb_substr($Vcfdirgq3swa, $Vn2ycfau434sharlim - 1);
			}
			while (mb_strlen($Vcfdirgq3swa) > $Vn2ycfau434sharlim);

			
			
			if ($V3iiokxda3xw !== '')
			{
				$Vzxix2pqoztx .= $V3iiokxda3xw.$this->newline;
			}

			$Vzxix2pqoztx .= $Vcfdirgq3swa.$this->newline;
		}

		
		if (count($Vfby3m15zmsl) > 0)
		{
			foreach ($Vfby3m15zmsl as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vzxix2pqoztx = str_replace('{{unwrapped'.$V2xim30qek4u.'}}', $Va4zo0rltynr, $Vzxix2pqoztx);
			}
		}

		return $Vzxix2pqoztx;
	}

	

	
	protected function _build_headers()
	{
		$this->set_header('X-Sender', $this->clean_email($this->_headers['From']));
		$this->set_header('X-Mailer', $this->useragent);
		$this->set_header('X-Priority', $this->_priorities[$this->priority]);
		$this->set_header('Message-ID', $this->_get_message_id());
		$this->set_header('Mime-Version', '1.0');
	}

	

	
	protected function _write_headers()
	{
		if ($this->protocol === 'mail')
		{
			if (isset($this->_headers['Subject']))
			{
				$this->_subject = $this->_headers['Subject'];
				unset($this->_headers['Subject']);
			}
		}

		reset($this->_headers);
		$this->_header_str = '';

		foreach ($this->_headers as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Va4zo0rltynr = trim($Va4zo0rltynr);

			if ($Va4zo0rltynr !== '')
			{
				$this->_header_str .= $V2xim30qek4u.': '.$Va4zo0rltynr.$this->newline;
			}
		}

		if ($this->_get_protocol() === 'mail')
		{
			$this->_header_str = rtrim($this->_header_str);
		}
	}

	

	
	protected function _build_message()
	{
		if ($this->wordwrap === TRUE && $this->mailtype !== 'html')
		{
			$this->_body = $this->word_wrap($this->_body);
		}

		$this->_set_boundaries();
		$this->_write_headers();

		$Vtij404u0njo = ($this->_get_protocol() === 'mail') ? $this->newline : '';
		$Vbreljhx2gqz = '';

		switch ($this->_get_content_type())
		{
			case 'plain' :

				$Vtij404u0njo .= 'Content-Type: text/plain; charset='.$this->charset.$this->newline
					.'Content-Transfer-Encoding: '.$this->_get_encoding();

				if ($this->_get_protocol() === 'mail')
				{
					$this->_header_str .= $Vtij404u0njo;
					$this->_finalbody = $this->_body;
				}
				else
				{
					$this->_finalbody = $Vtij404u0njo.$this->newline.$this->newline.$this->_body;
				}

				return;

			case 'html' :

				if ($this->send_multipart === FALSE)
				{
					$Vtij404u0njo .= 'Content-Type: text/html; charset='.$this->charset.$this->newline
						.'Content-Transfer-Encoding: quoted-printable';
				}
				else
				{
					$Vtij404u0njo .= 'Content-Type: multipart/alternative; boundary="'.$this->_alt_boundary.'"';

					$Vbreljhx2gqz .= $this->_get_mime_message().$this->newline.$this->newline
						.'--'.$this->_alt_boundary.$this->newline

						.'Content-Type: text/plain; charset='.$this->charset.$this->newline
						.'Content-Transfer-Encoding: '.$this->_get_encoding().$this->newline.$this->newline
						.$this->_get_alt_message().$this->newline.$this->newline.'--'.$this->_alt_boundary.$this->newline

						.'Content-Type: text/html; charset='.$this->charset.$this->newline
						.'Content-Transfer-Encoding: quoted-printable'.$this->newline.$this->newline;
				}

				$this->_finalbody = $Vbreljhx2gqz.$this->_prep_quoted_printable($this->_body).$this->newline.$this->newline;

				if ($this->_get_protocol() === 'mail')
				{
					$this->_header_str .= $Vtij404u0njo;
				}
				else
				{
					$this->_finalbody = $Vtij404u0njo.$this->newline.$this->newline.$this->_finalbody;
				}

				if ($this->send_multipart !== FALSE)
				{
					$this->_finalbody .= '--'.$this->_alt_boundary.'--';
				}

				return;

			case 'plain-attach' :

				$Vtij404u0njo .= 'Content-Type: multipart/'.$this->multipart.'; boundary="'.$this->_atc_boundary.'"';

				if ($this->_get_protocol() === 'mail')
				{
					$this->_header_str .= $Vtij404u0njo;
				}

				$Vbreljhx2gqz .= $this->_get_mime_message().$this->newline
					.$this->newline
					.'--'.$this->_atc_boundary.$this->newline
					.'Content-Type: text/plain; charset='.$this->charset.$this->newline
					.'Content-Transfer-Encoding: '.$this->_get_encoding().$this->newline
					.$this->newline
					.$this->_body.$this->newline.$this->newline;

			break;
			case 'html-attach' :

				$Vtij404u0njo .= 'Content-Type: multipart/'.$this->multipart.'; boundary="'.$this->_atc_boundary.'"';

				if ($this->_get_protocol() === 'mail')
				{
					$this->_header_str .= $Vtij404u0njo;
				}

				$Vbreljhx2gqz .= $this->_get_mime_message().$this->newline.$this->newline
					.'--'.$this->_atc_boundary.$this->newline

					.'Content-Type: multipart/alternative; boundary="'.$this->_alt_boundary.'"'.$this->newline.$this->newline
					.'--'.$this->_alt_boundary.$this->newline

					.'Content-Type: text/plain; charset='.$this->charset.$this->newline
					.'Content-Transfer-Encoding: '.$this->_get_encoding().$this->newline.$this->newline
					.$this->_get_alt_message().$this->newline.$this->newline.'--'.$this->_alt_boundary.$this->newline

					.'Content-Type: text/html; charset='.$this->charset.$this->newline
					.'Content-Transfer-Encoding: quoted-printable'.$this->newline.$this->newline

					.$this->_prep_quoted_printable($this->_body).$this->newline.$this->newline
					.'--'.$this->_alt_boundary.'--'.$this->newline.$this->newline;

			break;
		}

		$Vg1pstufindg = array();
		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($this->_attachments), $Vzmb2ye2mqed = 0; $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vligofq0fb34name = $this->_attachments[$Vep0df0xosaw]['name'][0];
			$Vprpxmeagfmh = ($this->_attachments[$Vep0df0xosaw]['name'][1] === NULL)
				? basename($Vligofq0fb34name) : $this->_attachments[$Vep0df0xosaw]['name'][1];

			$Vg1pstufindg[$Vzmb2ye2mqed++] = '--'.$this->_atc_boundary.$this->newline
				.'Content-type: '.$this->_attachments[$Vep0df0xosaw]['type'].'; '
				.'name="'.$Vprpxmeagfmh.'"'.$this->newline
				.'Content-Disposition: '.$this->_attachments[$Vep0df0xosaw]['disposition'].';'.$this->newline
				.'Content-Transfer-Encoding: base64'.$this->newline
				.(empty($this->_attachments[$Vep0df0xosaw]['cid']) ? '' : 'Content-ID: <'.$this->_attachments[$Vep0df0xosaw]['cid'].'>'.$this->newline);

			$Vg1pstufindg[$Vzmb2ye2mqed++] = $this->_attachments[$Vep0df0xosaw]['content'];
		}

		$Vbreljhx2gqz .= implode($this->newline, $Vg1pstufindg).$this->newline.'--'.$this->_atc_boundary.'--';
		$this->_finalbody = ($this->_get_protocol() === 'mail')
			? $Vbreljhx2gqz
			: $Vtij404u0njo.$this->newline.$this->newline.$Vbreljhx2gqz;

		return TRUE;
	}

	

	
	protected function _prep_quoted_printable($Vssdjb5oqaky)
	{
		
		
		
		static $V2ewdm2wkhhj = array(
			
			39, 40, 41, 43, 44, 45, 46, 47, 58, 61, 63,
			
			48, 49, 50, 51, 52, 53, 54, 55, 56, 57,
			
			65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90,
			
			97, 98, 99, 100, 101, 102, 103, 104, 105, 106, 107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122
		);

		
		
		$Vssdjb5oqaky = str_replace(array('{unwrap}', '{/unwrap}'), '', $Vssdjb5oqaky);

		
		
		
		
		if ($this->crlf === "\r\n")
		{
			if (is_php('5.3'))
			{
				return quoted_printable_encode($Vssdjb5oqaky);
			}
			elseif (function_exists('imap_8bit'))
			{
				return imap_8bit($Vssdjb5oqaky);
			}
		}

		
		$Vssdjb5oqaky = preg_replace(array('| +|', '/\x00+/'), array(' ', ''), $Vssdjb5oqaky);

		
		if (strpos($Vssdjb5oqaky, "\r") !== FALSE)
		{
			$Vssdjb5oqaky = str_replace(array("\r\n", "\r"), "\n", $Vssdjb5oqaky);
		}

		$Vo3ncbt2kr35 = '=';
		$Vzxix2pqoztx = '';

		foreach (explode("\n", $Vssdjb5oqaky) as $Vcfdirgq3swa)
		{
			$Vgdtiboyfq04 = strlen($Vcfdirgq3swa);
			$V3iiokxda3xw = '';

			
			
			
			for ($Vep0df0xosaw = 0; $Vep0df0xosaw < $Vgdtiboyfq04; $Vep0df0xosaw++)
			{
				
				$Vn2ycfau434shar = $Vcfdirgq3swa[$Vep0df0xosaw];
				$Vgex5ke2ujxu = ord($Vn2ycfau434shar);

				
				if ($Vgex5ke2ujxu === 32 OR $Vgex5ke2ujxu === 9)
				{
					if ($Vep0df0xosaw === ($Vgdtiboyfq04 - 1))
					{
						$Vn2ycfau434shar = $Vo3ncbt2kr35.sprintf('%02s', dechex($Vgex5ke2ujxu));
					}
				}
				
				
				
				
				elseif ($Vgex5ke2ujxu === 61)
				{
					$Vn2ycfau434shar = $Vo3ncbt2kr35.strtoupper(sprintf('%02s', dechex($Vgex5ke2ujxu)));  
				}
				elseif ( ! in_array($Vgex5ke2ujxu, $V2ewdm2wkhhj, TRUE))
				{
					$Vn2ycfau434shar = $Vo3ncbt2kr35.strtoupper(sprintf('%02s', dechex($Vgex5ke2ujxu)));
				}

				
				
				if ((strlen($V3iiokxda3xw) + strlen($Vn2ycfau434shar)) >= 76)
				{
					$Vzxix2pqoztx .= $V3iiokxda3xw.$Vo3ncbt2kr35.$this->crlf;
					$V3iiokxda3xw = '';
				}

				
				$V3iiokxda3xw .= $Vn2ycfau434shar;
			}

			
			$Vzxix2pqoztx .= $V3iiokxda3xw.$this->crlf;
		}

		
		return substr($Vzxix2pqoztx, 0, strlen($this->crlf) * -1);
	}

	

	
	protected function _prep_q_encoding($Vssdjb5oqaky)
	{
		$Vssdjb5oqaky = str_replace(array("\r", "\n"), '', $Vssdjb5oqaky);

		if ($this->charset === 'UTF-8')
		{
			
			
			
			if (ICONV_ENABLED === TRUE)
			{
				$Vzxix2pqoztx = @iconv_mime_encode('', $Vssdjb5oqaky,
					array(
						'scheme' => 'Q',
						'line-length' => 76,
						'input-charset' => $this->charset,
						'output-charset' => $this->charset,
						'line-break-chars' => $this->crlf
					)
				);

				
				if ($Vzxix2pqoztx !== FALSE)
				{
					
					
					
					return substr($Vzxix2pqoztx, 2);
				}

				$Vn2ycfau434shars = iconv_strlen($Vssdjb5oqaky, 'UTF-8');
			}
			elseif (MB_ENABLED === TRUE)
			{
				$Vn2ycfau434shars = mb_strlen($Vssdjb5oqaky, 'UTF-8');
			}
		}

		
		isset($Vn2ycfau434shars) OR $Vn2ycfau434shars = strlen($Vssdjb5oqaky);

		$Vzxix2pqoztx = '=?'.$this->charset.'?Q?';
		for ($Vep0df0xosaw = 0, $Vgdtiboyfq04 = strlen($Vzxix2pqoztx); $Vep0df0xosaw < $Vn2ycfau434shars; $Vep0df0xosaw++)
		{
			$Vn2ycfau434shr = ($this->charset === 'UTF-8' && ICONV_ENABLED === TRUE)
				? '='.implode('=', str_split(strtoupper(bin2hex(iconv_substr($Vssdjb5oqaky, $Vep0df0xosaw, 1, $this->charset))), 2))
				: '='.strtoupper(bin2hex($Vssdjb5oqaky[$Vep0df0xosaw]));

			
			
			if ($Vgdtiboyfq04 + ($V4stf05kgafy = strlen($Vn2ycfau434shr)) > 74)
			{
				$Vzxix2pqoztx .= '?='.$this->crlf 
					.' =?'.$this->charset.'?Q?'.$Vn2ycfau434shr; 
				$Vgdtiboyfq04 = 6 + strlen($this->charset) + $V4stf05kgafy; 
			}
			else
			{
				$Vzxix2pqoztx .= $Vn2ycfau434shr;
				$Vgdtiboyfq04 += $V4stf05kgafy;
			}
		}

		
		return $Vzxix2pqoztx.'?=';
	}

	

	
	public function send($Vk0dcsirzfmm = TRUE)
	{
		if ( ! isset($this->_headers['From']))
		{
			$this->_set_error_message('lang:email_no_from');
			return FALSE;
		}

		if ($this->_replyto_flag === FALSE)
		{
			$this->reply_to($this->_headers['From']);
		}

		if ( ! isset($this->_recipients) && ! isset($this->_headers['To'])
			&& ! isset($this->_bcc_array) && ! isset($this->_headers['Bcc'])
			&& ! isset($this->_headers['Cc']))
		{
			$this->_set_error_message('lang:email_no_recipients');
			return FALSE;
		}

		$this->_build_headers();

		if ($this->bcc_batch_mode && count($this->_bcc_array) > $this->bcc_batch_size)
		{
			$Voetc43kt2cr = $this->batch_bcc_send();

			if ($Voetc43kt2cr && $Vk0dcsirzfmm)
			{
				$this->clear();
			}

			return $Voetc43kt2cr;
		}

		if ($this->_build_message() === FALSE)
		{
			return FALSE;
		}

		$Voetc43kt2cr = $this->_spool_email();

		if ($Voetc43kt2cr && $Vk0dcsirzfmm)
		{
			$this->clear();
		}

		return $Voetc43kt2cr;
	}

	

	
	public function batch_bcc_send()
	{
		$V02zca5z5fu1 = $this->bcc_batch_size - 1;
		$Vkhqd4bdisjs = '';
		$Vn2ycfau434shunk = array();

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($this->_bcc_array); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			if (isset($this->_bcc_array[$Vep0df0xosaw]))
			{
				$Vkhqd4bdisjs .= ', '.$this->_bcc_array[$Vep0df0xosaw];
			}

			if ($Vep0df0xosaw === $V02zca5z5fu1)
			{
				$Vn2ycfau434shunk[] = substr($Vkhqd4bdisjs, 1);
				$V02zca5z5fu1 += $this->bcc_batch_size;
				$Vkhqd4bdisjs = '';
			}

			if ($Vep0df0xosaw === $Vn2ycfau434s-1)
			{
				$Vn2ycfau434shunk[] = substr($Vkhqd4bdisjs, 1);
			}
		}

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vn2ycfau434shunk); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			unset($this->_headers['Bcc']);

			$Va0sv2akblms = $this->clean_email($this->_str_to_array($Vn2ycfau434shunk[$Vep0df0xosaw]));

			if ($this->protocol !== 'smtp')
			{
				$this->set_header('Bcc', implode(', ', $Va0sv2akblms));
			}
			else
			{
				$this->_bcc_array = $Va0sv2akblms;
			}

			if ($this->_build_message() === FALSE)
			{
				return FALSE;
			}

			$this->_spool_email();
		}
	}

	

	
	protected function _unwrap_specials()
	{
		$this->_finalbody = preg_replace_callback('/\{unwrap\}(.*?)\{\/unwrap\}/si', array($this, '_remove_nl_callback'), $this->_finalbody);
	}

	

	
	protected function _remove_nl_callback($V4uvjtwtgjvpes)
	{
		if (strpos($V4uvjtwtgjvpes[1], "\r") !== FALSE OR strpos($V4uvjtwtgjvpes[1], "\n") !== FALSE)
		{
			$V4uvjtwtgjvpes[1] = str_replace(array("\r\n", "\r", "\n"), '', $V4uvjtwtgjvpes[1]);
		}

		return $V4uvjtwtgjvpes[1];
	}

	

	
	protected function _spool_email()
	{
		$this->_unwrap_specials();

		$V5dsbozs5xhq = '_send_with_'.$this->_get_protocol();
		if ( ! $this->$V5dsbozs5xhq())
		{
			$this->_set_error_message('lang:email_send_failure_'.($this->_get_protocol() === 'mail' ? 'phpmail' : $this->_get_protocol()));
			return FALSE;
		}

		$this->_set_error_message('lang:email_sent', $this->_get_protocol());
		return TRUE;
	}

	

	
	protected function _send_with_mail()
	{
		if (is_array($this->_recipients))
		{
			$this->_recipients = implode(', ', $this->_recipients);
		}

		if ($this->_safe_mode === TRUE)
		{
			return mail($this->_recipients, $this->_subject, $this->_finalbody, $this->_header_str);
		}
		else
		{
			
			
			return mail($this->_recipients, $this->_subject, $this->_finalbody, $this->_header_str, '-f '.$this->clean_email($this->_headers['Return-Path']));
		}
	}

	

	
	protected function _send_with_sendmail()
	{
		
		if ( ! function_usable('popen')
			OR FALSE === ($Vzuexymrvrpz = @popen(
						$this->mailpath.' -oi -f '.$this->clean_email($this->_headers['From']).' -t'
						, 'w'))
		) 
		{
			return FALSE;
		}

		fputs($Vzuexymrvrpz, $this->_header_str);
		fputs($Vzuexymrvrpz, $this->_finalbody);

		$Vwa00m3pezrc = pclose($Vzuexymrvrpz);

		if ($Vwa00m3pezrc !== 0)
		{
			$this->_set_error_message('lang:email_exit_status', $Vwa00m3pezrc);
			$this->_set_error_message('lang:email_no_socket');
			return FALSE;
		}

		return TRUE;
	}

	

	
	protected function _send_with_smtp()
	{
		if ($this->smtp_host === '')
		{
			$this->_set_error_message('lang:email_no_hostname');
			return FALSE;
		}

		if ( ! $this->_smtp_connect() OR ! $this->_smtp_authenticate())
		{
			return FALSE;
		}

		if ( ! $this->_send_command('from', $this->clean_email($this->_headers['From'])))
		{
			return FALSE;
		}

		foreach ($this->_recipients as $Va4zo0rltynr)
		{
			if ( ! $this->_send_command('to', $Va4zo0rltynr))
			{
				return FALSE;
			}
		}

		if (count($this->_cc_array) > 0)
		{
			foreach ($this->_cc_array as $Va4zo0rltynr)
			{
				if ($Va4zo0rltynr !== '' && ! $this->_send_command('to', $Va4zo0rltynr))
				{
					return FALSE;
				}
			}
		}

		if (count($this->_bcc_array) > 0)
		{
			foreach ($this->_bcc_array as $Va4zo0rltynr)
			{
				if ($Va4zo0rltynr !== '' && ! $this->_send_command('to', $Va4zo0rltynr))
				{
					return FALSE;
				}
			}
		}

		if ( ! $this->_send_command('data'))
		{
			return FALSE;
		}

		
		$this->_send_data($this->_header_str.preg_replace('/^\./m', '..$1', $this->_finalbody));

		$this->_send_data('.');

		$Voamq4gelqxu = $this->_get_smtp_data();

		$this->_set_error_message($Voamq4gelqxu);

		if (strpos($Voamq4gelqxu, '250') !== 0)
		{
			$this->_set_error_message('lang:email_smtp_error', $Voamq4gelqxu);
			return FALSE;
		}

		if ($this->smtp_keepalive)
		{
			$this->_send_command('reset');
		}
		else
		{
			$this->_send_command('quit');
		}

		return TRUE;
	}

	

	
	protected function _smtp_connect()
	{
		if (is_resource($this->_smtp_connect))
		{
			return TRUE;
		}

		$Vqig043bz0um = ($this->smtp_crypto === 'ssl') ? 'ssl://' : '';

		$this->_smtp_connect = fsockopen($Vqig043bz0um.$this->smtp_host,
							$this->smtp_port,
							$Vh3etbycchqa,
							$Vdons2drriyj,
							$this->smtp_timeout);

		if ( ! is_resource($this->_smtp_connect))
		{
			$this->_set_error_message('lang:email_smtp_error', $Vh3etbycchqa.' '.$Vdons2drriyj);
			return FALSE;
		}

		stream_set_timeout($this->_smtp_connect, $this->smtp_timeout);
		$this->_set_error_message($this->_get_smtp_data());

		if ($this->smtp_crypto === 'tls')
		{
			$this->_send_command('hello');
			$this->_send_command('starttls');

			$Vn2ycfau434srypto = stream_socket_enable_crypto($this->_smtp_connect, TRUE, STREAM_CRYPTO_METHOD_TLS_CLIENT);

			if ($Vn2ycfau434srypto !== TRUE)
			{
				$this->_set_error_message('lang:email_smtp_error', $this->_get_smtp_data());
				return FALSE;
			}
		}

		return $this->_send_command('hello');
	}

	

	
	protected function _send_command($Vn2ycfau434smd, $Vfeinw1hsfej = '')
	{
		switch ($Vn2ycfau434smd)
		{
			case 'hello' :

						if ($this->_smtp_auth OR $this->_get_encoding() === '8bit')
						{
							$this->_send_data('EHLO '.$this->_get_hostname());
						}
						else
						{
							$this->_send_data('HELO '.$this->_get_hostname());
						}

						$Vonnn0nfpbux = 250;
			break;
			case 'starttls'	:

						$this->_send_data('STARTTLS');
						$Vonnn0nfpbux = 220;
			break;
			case 'from' :

						$this->_send_data('MAIL FROM:<'.$Vfeinw1hsfej.'>');
						$Vonnn0nfpbux = 250;
			break;
			case 'to' :

						if ($this->dsn)
						{
							$this->_send_data('RCPT TO:<'.$Vfeinw1hsfej.'> NOTIFY=SUCCESS,DELAY,FAILURE ORCPT=rfc822;'.$Vfeinw1hsfej);
						}
						else
						{
							$this->_send_data('RCPT TO:<'.$Vfeinw1hsfej.'>');
						}

						$Vonnn0nfpbux = 250;
			break;
			case 'data'	:

						$this->_send_data('DATA');
						$Vonnn0nfpbux = 354;
			break;
			case 'reset':

						$this->_send_data('RSET');
						$Vonnn0nfpbux = 250;
			break;
			case 'quit'	:

						$this->_send_data('QUIT');
						$Vonnn0nfpbux = 221;
			break;
		}

		$Voamq4gelqxu = $this->_get_smtp_data();

		$this->_debug_msg[] = '<pre>'.$Vn2ycfau434smd.': '.$Voamq4gelqxu.'</pre>';

		if ((int) substr($Voamq4gelqxu, 0, 3) !== $Vonnn0nfpbux)
		{
			$this->_set_error_message('lang:email_smtp_error', $Voamq4gelqxu);
			return FALSE;
		}

		if ($Vn2ycfau434smd === 'quit')
		{
			fclose($this->_smtp_connect);
		}

		return TRUE;
	}

	

	
	protected function _smtp_authenticate()
	{
		if ( ! $this->_smtp_auth)
		{
			return TRUE;
		}

		if ($this->smtp_user === '' && $this->smtp_pass === '')
		{
			$this->_set_error_message('lang:email_no_smtp_unpw');
			return FALSE;
		}

		$this->_send_data('AUTH LOGIN');

		$Voamq4gelqxu = $this->_get_smtp_data();

		if (strpos($Voamq4gelqxu, '503') === 0)	
		{
			return TRUE;
		}
		elseif (strpos($Voamq4gelqxu, '334') !== 0)
		{
			$this->_set_error_message('lang:email_failed_smtp_login', $Voamq4gelqxu);
			return FALSE;
		}

		$this->_send_data(base64_encode($this->smtp_user));

		$Voamq4gelqxu = $this->_get_smtp_data();

		if (strpos($Voamq4gelqxu, '334') !== 0)
		{
			$this->_set_error_message('lang:email_smtp_auth_un', $Voamq4gelqxu);
			return FALSE;
		}

		$this->_send_data(base64_encode($this->smtp_pass));

		$Voamq4gelqxu = $this->_get_smtp_data();

		if (strpos($Voamq4gelqxu, '235') !== 0)
		{
			$this->_set_error_message('lang:email_smtp_auth_pw', $Voamq4gelqxu);
			return FALSE;
		}

		return TRUE;
	}

	

	
	protected function _send_data($Vfeinw1hsfej)
	{
		$Vfeinw1hsfej .= $this->newline;
		for ($Vte3mlfnkhto = $Voqn4yo0hu0w = 0, $Vgdtiboyfq04 = strlen($Vfeinw1hsfej); $Vte3mlfnkhto < $Vgdtiboyfq04; $Vte3mlfnkhto += $Voetc43kt2cr)
		{
			if (($Voetc43kt2cr = fwrite($this->_smtp_connect, substr($Vfeinw1hsfej, $Vte3mlfnkhto))) === FALSE)
			{
				break;
			}
			
			elseif ($Voetc43kt2cr === 0)
			{
				if ($Voqn4yo0hu0w === 0)
				{
					$Voqn4yo0hu0w = time();
				}
				elseif ($Voqn4yo0hu0w < (time() - $this->smtp_timeout))
				{
					$Voetc43kt2cr = FALSE;
					break;
				}

				usleep(250000);
				continue;
			}
			else
			{
				$Voqn4yo0hu0w = 0;
			}
		}

		if ($Voetc43kt2cr === FALSE)
		{
			$this->_set_error_message('lang:email_smtp_data_failure', $Vfeinw1hsfej);
			return FALSE;
		}

		return TRUE;
	}

	

	
	protected function _get_smtp_data()
	{
		$Vfeinw1hsfej = '';

		while ($Vssdjb5oqaky = fgets($this->_smtp_connect, 512))
		{
			$Vfeinw1hsfej .= $Vssdjb5oqaky;

			if ($Vssdjb5oqaky[3] === ' ')
			{
				break;
			}
		}

		return $Vfeinw1hsfej;
	}

	

	
	protected function _get_hostname()
	{
		if (isset($_SERVER['SERVER_NAME']))
		{
			return $_SERVER['SERVER_NAME'];
		}

		return isset($_SERVER['SERVER_ADDR']) ? '['.$_SERVER['SERVER_ADDR'].']' : '[127.0.0.1]';
	}

	

	
	public function print_debugger($Vep0df0xosawnclude = array('headers', 'subject', 'body'))
	{
		$Vv3gvm3x3hvm = '';

		if (count($this->_debug_msg) > 0)
		{
			foreach ($this->_debug_msg as $Va4zo0rltynr)
			{
				$Vv3gvm3x3hvm .= $Va4zo0rltynr;
			}
		}

		
		$Vrp33svm4ydd = '';
		is_array($Vep0df0xosawnclude) OR $Vep0df0xosawnclude = array($Vep0df0xosawnclude);

		if (in_array('headers', $Vep0df0xosawnclude, TRUE))
		{
			$Vrp33svm4ydd = htmlspecialchars($this->_header_str)."\n";
		}

		if (in_array('subject', $Vep0df0xosawnclude, TRUE))
		{
			$Vrp33svm4ydd .= htmlspecialchars($this->_subject)."\n";
		}

		if (in_array('body', $Vep0df0xosawnclude, TRUE))
		{
			$Vrp33svm4ydd .= htmlspecialchars($this->_finalbody);
		}

		return $Vv3gvm3x3hvm.($Vrp33svm4ydd === '' ? '' : '<pre>'.$Vrp33svm4ydd.'</pre>');
	}

	

	
	protected function _set_error_message($Vv3gvm3x3hvm, $Va4zo0rltynr = '')
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->lang->load('email');

		if (sscanf($Vv3gvm3x3hvm, 'lang:%s', $Vcfdirgq3swa) !== 1 OR FALSE === ($Vcfdirgq3swa = $Vgw3d0qe3dgd->lang->line($Vcfdirgq3swa)))
		{
			$this->_debug_msg[] = str_replace('%s', $Va4zo0rltynr, $Vv3gvm3x3hvm).'<br />';
		}
		else
		{
			$this->_debug_msg[] = str_replace('%s', $Va4zo0rltynr, $Vcfdirgq3swa).'<br />';
		}
	}

	

	
	protected function _mime_types($Vifxhafjqvbp = '')
	{
		$Vifxhafjqvbp = strtolower($Vifxhafjqvbp);

		$Vf4dlektv1bas =& get_mimes();

		if (isset($Vf4dlektv1bas[$Vifxhafjqvbp]))
		{
			return is_array($Vf4dlektv1bas[$Vifxhafjqvbp])
				? current($Vf4dlektv1bas[$Vifxhafjqvbp])
				: $Vf4dlektv1bas[$Vifxhafjqvbp];
		}

		return 'application/x-unknown-content-type';
	}

}
