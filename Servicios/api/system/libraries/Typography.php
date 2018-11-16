<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Typography {

	
	public $Vcc02z4paui0 = 'address|blockquote|div|dl|fieldset|form|h\d|hr|noscript|object|ol|p|pre|script|table|ul';

	
	public $Vj1wjtpai4xa	= 'p|pre|ol|ul|dl|object|table|h\d';

	
	public $Vfjqi2iidn2r = 'a|abbr|acronym|b|bdo|big|br|button|cite|code|del|dfn|em|i|img|ins|input|label|map|kbd|q|samp|select|small|span|strong|sub|sup|textarea|tt|var';

	
	public $V5l2yss0fxxz = array('blockquote');

	
	public $Vzsp1tdvxp2c = '';

	
	public $Vvw322eriq5f = FALSE;

	
	public function auto_typography($Vssdjb5oqaky, $Ve0qofhccrk2 = FALSE)
	{
		if ($Vssdjb5oqaky === '')
		{
			return '';
		}

		
		if (strpos($Vssdjb5oqaky, "\r") !== FALSE)
		{
			$Vssdjb5oqaky = str_replace(array("\r\n", "\r"), "\n", $Vssdjb5oqaky);
		}

		
		
		if ($Ve0qofhccrk2 === TRUE)
		{
			$Vssdjb5oqaky = preg_replace("/\n\n+/", "\n\n", $Vssdjb5oqaky);
		}

		
		$Vouktnn0uyky = array();
		if (strpos($Vssdjb5oqaky, '<!--') !== FALSE && preg_match_all('#(<!\-\-.*?\-\->)#s', $Vssdjb5oqaky, $Vmbknpbfqa1s))
		{
			for ($Vep0df0xosaw = 0, $V2vps4uaencl = count($Vmbknpbfqa1s[0]); $Vep0df0xosaw < $V2vps4uaencl; $Vep0df0xosaw++)
			{
				$Vouktnn0uyky[] = $Vmbknpbfqa1s[0][$Vep0df0xosaw];
				$Vssdjb5oqaky = str_replace($Vmbknpbfqa1s[0][$Vep0df0xosaw], '{@HC'.$Vep0df0xosaw.'}', $Vssdjb5oqaky);
			}
		}

		
		
		if (strpos($Vssdjb5oqaky, '<pre') !== FALSE)
		{
			$Vssdjb5oqaky = preg_replace_callback('#<pre.*?>.*?</pre>#si', array($this, '_protect_characters'), $Vssdjb5oqaky);
		}

		
		$Vssdjb5oqaky = preg_replace_callback('#<.+?>#si', array($this, '_protect_characters'), $Vssdjb5oqaky);

		
		if ($this->protect_braced_quotes === TRUE)
		{
			$Vssdjb5oqaky = preg_replace_callback('#\{.+?\}#si', array($this, '_protect_characters'), $Vssdjb5oqaky);
		}

		
		
		
		$Vssdjb5oqaky = preg_replace('#<(/*)('.$this->inline_elements.')([ >])#i', '{@TAG}\\1\\2\\3', $Vssdjb5oqaky);

		
		$V2wyfgt54adn = preg_split('/(<(?:[^<>]+(?:"[^"]*"|\'[^\']*\')?)+>)/', $Vssdjb5oqaky, -1, PREG_SPLIT_DELIM_CAPTURE|PREG_SPLIT_NO_EMPTY);

		
		$Vssdjb5oqaky = '';
		$Vyvuueklfmyc = TRUE;

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($V2wyfgt54adn) - 1; $Vep0df0xosaw <= $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			
			
			if (preg_match('#<(/*)('.$this->block_elements.').*?>#', $V2wyfgt54adn[$Vep0df0xosaw], $V4uvjtwtgjvp))
			{
				if (preg_match('#'.$this->skip_elements.'#', $V4uvjtwtgjvp[2]))
				{
					$Vyvuueklfmyc = ($V4uvjtwtgjvp[1] === '/');
				}

				if ($V4uvjtwtgjvp[1] === '')
				{
					$this->last_block_element = $V4uvjtwtgjvp[2];
				}

				$Vssdjb5oqaky .= $V2wyfgt54adn[$Vep0df0xosaw];
				continue;
			}

			if ($Vyvuueklfmyc === FALSE)
			{
				$Vssdjb5oqaky .= $V2wyfgt54adn[$Vep0df0xosaw];
				continue;
			}

			
			if ($Vep0df0xosaw === $Vn2ycfau434s)
			{
				$V2wyfgt54adn[$Vep0df0xosaw] .= "\n";
			}

			
			$Vssdjb5oqaky .= $this->_format_newlines($V2wyfgt54adn[$Vep0df0xosaw]);
		}

		
		if ( ! preg_match('/^\s*<(?:'.$this->block_elements.')/i', $Vssdjb5oqaky))
		{
			$Vssdjb5oqaky = preg_replace('/^(.*?)<('.$this->block_elements.')/i', '<p>$1</p><$2', $Vssdjb5oqaky);
		}

		
		$Vssdjb5oqaky = $this->format_characters($Vssdjb5oqaky);

		
		for ($Vep0df0xosaw = 0, $V2vps4uaencl = count($Vouktnn0uyky); $Vep0df0xosaw < $V2vps4uaencl; $Vep0df0xosaw++)
		{
			
			
			
			$Vssdjb5oqaky = preg_replace('#(?(?=<p>\{@HC'.$Vep0df0xosaw.'\})<p>\{@HC'.$Vep0df0xosaw.'\}(\s*</p>)|\{@HC'.$Vep0df0xosaw.'\})#s', $Vouktnn0uyky[$Vep0df0xosaw], $Vssdjb5oqaky);
		}

		
		$Vhyg2tjvah5t = array(

						
						
						'/(<p[^>*?]>)<p>/'	=> '$1', 

						
						'#(</p>)+#'			=> '</p>',
						'/(<p>\W*<p>)+/'	=> '<p>',

						
						'#<p></p><('.$this->block_elements.')#'	=> '<$1',

						
						'#(&nbsp;\s*)+<('.$this->block_elements.')#'	=> '  <$2',

						
						'/\{@TAG\}/'		=> '<',
						'/\{@DQ\}/'			=> '"',
						'/\{@SQ\}/'			=> "'",
						'/\{@DD\}/'			=> '--',
						'/\{@NBS\}/'		=> '  ',

						
						
						
						
						"/><p>\n/"			=> ">\n<p>",

						
						
						'#</p></#'			=> "</p>\n</"
						);

		
		if ($Ve0qofhccrk2 === TRUE)
		{
			$Vhyg2tjvah5t['#<p>\n*</p>#'] = '';
		}
		else
		{
			
			
			$Vhyg2tjvah5t['#<p></p>#'] = '<p>&nbsp;</p>';
		}

		return preg_replace(array_keys($Vhyg2tjvah5t), $Vhyg2tjvah5t, $Vssdjb5oqaky);

	}

	

	
	public function format_characters($Vssdjb5oqaky)
	{
		static $Vhyg2tjvah5t;

		if ( ! isset($Vhyg2tjvah5t))
		{
			$Vhyg2tjvah5t = array(
							
							
							
							
							
							
							
							'/\'"(\s|$)/'					=> '&#8217;&#8221;$1',
							'/(^|\s|<p>)\'"/'				=> '$1&#8216;&#8220;',
							'/\'"(\W)/'						=> '&#8217;&#8221;$1',
							'/(\W)\'"/'						=> '$1&#8216;&#8220;',
							'/"\'(\s|$)/'					=> '&#8221;&#8217;$1',
							'/(^|\s|<p>)"\'/'				=> '$1&#8220;&#8216;',
							'/"\'(\W)/'						=> '&#8221;&#8217;$1',
							'/(\W)"\'/'						=> '$1&#8220;&#8216;',

							
							'/\'(\s|$)/'					=> '&#8217;$1',
							'/(^|\s|<p>)\'/'				=> '$1&#8216;',
							'/\'(\W)/'						=> '&#8217;$1',
							'/(\W)\'/'						=> '$1&#8216;',

							
							'/"(\s|$)/'						=> '&#8221;$1',
							'/(^|\s|<p>)"/'					=> '$1&#8220;',
							'/"(\W)/'						=> '&#8221;$1',
							'/(\W)"/'						=> '$1&#8220;',

							
							"/(\w)'(\w)/"					=> '$1&#8217;$2',

							
							'/\s?\-\-\s?/'					=> '&#8212;',
							'/(\w)\.{3}/'					=> '$1&#8230;',

							
							'/(\W)  /'						=> '$1&nbsp; ',

							
							'/&(?!#?[a-zA-Z0-9]{2,};)/'		=> '&amp;'
						);
		}

		return preg_replace(array_keys($Vhyg2tjvah5t), $Vhyg2tjvah5t, $Vssdjb5oqaky);
	}

	

	
	protected function _format_newlines($Vssdjb5oqaky)
	{
		if ($Vssdjb5oqaky === '' OR (strpos($Vssdjb5oqaky, "\n") === FALSE && ! in_array($this->last_block_element, $this->inner_block_required)))
		{
			return $Vssdjb5oqaky;
		}

		
		$Vssdjb5oqaky = str_replace("\n\n", "</p>\n\n<p>", $Vssdjb5oqaky);

		
		$Vssdjb5oqaky = preg_replace("/([^\n])(\n)([^\n])/", '\\1<br />\\2\\3', $Vssdjb5oqaky);

		
		if ($Vssdjb5oqaky !== "\n")
		{
			
			
			
			$Vssdjb5oqaky =  '<p>'.rtrim($Vssdjb5oqaky).'</p>';
		}

		
		
		return preg_replace('/<p><\/p>(.*)/', '\\1', $Vssdjb5oqaky, 1);
	}

	

	
	protected function _protect_characters($V4uvjtwtgjvp)
	{
		return str_replace(array("'",'"','--','  '), array('{@SQ}', '{@DQ}', '{@DD}', '{@NBS}'), $V4uvjtwtgjvp[0]);
	}

	

	
	public function nl2br_except_pre($Vssdjb5oqaky)
	{
		$Vmzqx2s2rkfr = '';
		for ($Vpp2snfngqmy = explode('pre>', $Vssdjb5oqaky), $Vn2ycfau434st = count($Vpp2snfngqmy), $Vep0df0xosaw = 0; $Vep0df0xosaw < $Vn2ycfau434st; $Vep0df0xosaw++)
		{
			$Vmzqx2s2rkfr .= (($Vep0df0xosaw % 2) === 0) ? nl2br($Vpp2snfngqmy[$Vep0df0xosaw]) : $Vpp2snfngqmy[$Vep0df0xosaw];
			if ($Vn2ycfau434st - 1 !== $Vep0df0xosaw)
			{
				$Vmzqx2s2rkfr .= 'pre>';
			}
		}

		return $Vmzqx2s2rkfr;
	}

}
