<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Pagination {

	
	protected $Vbyw4pefezev		= '';

	
	protected $Vapdd0fqkaxu = '';

	
	protected $Vth1qrkbbg4y = '';

	
	protected $V0zmfldzhwtt = 0;

	
	protected $V3bmhkioaf1p = 2;

	
	public $V1bxbmctfst3 = 10;

	
	public $Vppga0bmfyea = 0;

	
	protected $Vjjczjoh5k2x = FALSE;

	
	protected $Vqxbgn3tk2nd = '&lsaquo; First';

	
	protected $Vznecz3mjs5s = '&gt;';

	
	protected $Vveivroshgri = '&lt;';

	
	protected $Vfxeyq5cfdsi = 'Last &rsaquo;';

	
	protected $Va4a4mdtqlog = 0;

	
	protected $Vrfrmydvsjxs = '';

	
	protected $Vw30m4uizqhy = '';

	
	protected $V5i1vi2kmwvc = '';

	
	protected $Vt3c1b1oasaj = '';

	
	protected $Vhhzknlnlkjg = '';

	
	protected $Vqmet0nua1sd = '';

	
	protected $Vifskrj4bm3x = '';

	
	protected $Vyuohq2k2vxw = '<strong>';

	
	protected $Ve44imxhfrcx = '</strong>';

	
	protected $Vgewgahyfnas = '';

	
	protected $Vq22ryq53q3f = '';

	
	protected $Vu4ft1oncghr = '';

	
	protected $Vvwi5wlr3awe = '';

	
	protected $Vmo4iuzmkdup = '';

	
	protected $Vyf4j41utcxx = '';

	
	protected $V11jz1mkq3y4 = FALSE;

	
	protected $Vzq4xs2dljdl = 'per_page';

	
	protected $Vn0jxjivapnc = TRUE;

	
	protected $Vmtuxedlyf4d = '';

	
	protected $Vpsesx0dp3xw = array();

	
	protected $Vrvau3i3fffe = FALSE;

	
	protected $Vamdm1qikzdr = FALSE;

	
	protected $Vwhtmdz2mv0o = 'data-ci-pagination-page';

	
	protected $Vgw3d0qe3dgd;

	

	
	public function __construct($Vpz5i5lfmwft = array())
	{
		$this->CI =& get_instance();
		$this->CI->load->language('pagination');
		foreach (array('first_link', 'next_link', 'prev_link', 'last_link') as $V2xim30qek4u)
		{
			if (($Va4zo0rltynr = $this->CI->lang->line('pagination_'.$V2xim30qek4u)) !== FALSE)
			{
				$this->$V2xim30qek4u = $Va4zo0rltynr;
			}
		}

		$this->initialize($Vpz5i5lfmwft);
		log_message('info', 'Pagination Class Initialized');
	}

	

	
	public function initialize(array $Vpz5i5lfmwft = array())
	{
		isset($Vpz5i5lfmwft['attributes']) OR $Vpz5i5lfmwft['attributes'] = array();
		if (is_array($Vpz5i5lfmwft['attributes']))
		{
			$this->_parse_attributes($Vpz5i5lfmwft['attributes']);
			unset($Vpz5i5lfmwft['attributes']);
		}

		
		
		if (isset($Vpz5i5lfmwft['anchor_class']))
		{
			empty($Vpz5i5lfmwft['anchor_class']) OR $Vpkjdumwo4xn['class'] = $Vpz5i5lfmwft['anchor_class'];
			unset($Vpz5i5lfmwft['anchor_class']);
		}

		foreach ($Vpz5i5lfmwft as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if (property_exists($this, $V2xim30qek4u))
			{
				$this->$V2xim30qek4u = $Va4zo0rltynr;
			}
		}

		if ($this->CI->config->item('enable_query_strings') === TRUE)
		{
			$this->page_query_string = TRUE;
		}

		if ($this->use_global_url_suffix === TRUE)
		{
			$this->suffix = $this->CI->config->item('url_suffix');
		}

		return $this;
	}

	

	
	public function create_links()
	{
		
		
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		
		$V3f5dystknhz = (int) ceil($this->total_rows / $this->per_page);

		
		if ($V3f5dystknhz === 1)
		{
			return '';
		}

		
		$this->num_links = (int) $this->num_links;

		if ($this->num_links < 0)
		{
			show_error('Your number of links must be a non-negative number.');
		}

		
		
		if ($this->reuse_query_string === TRUE)
		{
			$Vxmdyg3ikftp = $this->CI->input->get();

			
			unset($Vxmdyg3ikftp['c'], $Vxmdyg3ikftp['m'], $Vxmdyg3ikftp[$this->query_string_segment]);
		}
		else
		{
			$Vxmdyg3ikftp = array();
		}

		
		
		$Vbyw4pefezev = trim($this->base_url);
		$Vifskrj4bm3x = $this->first_url;

		$Vsh01c1z21oh = '';
		$Vsh01c1z21oh_sep = (strpos($Vbyw4pefezev, '?') === FALSE) ? '?' : '&amp;';

		
		if ($this->page_query_string === TRUE)
		{
			
			
			if ($Vifskrj4bm3x === '')
			{
				$Vifskrj4bm3x = $Vbyw4pefezev;

				
				if ( ! empty($Vxmdyg3ikftp))
				{
					$Vifskrj4bm3x .= $Vsh01c1z21oh_sep.http_build_query($Vxmdyg3ikftp);
				}
			}

			
			
			$Vbyw4pefezev .= $Vsh01c1z21oh_sep.http_build_query(array_merge($Vxmdyg3ikftp, array($this->query_string_segment => '')));
		}
		else
		{
			
			
			if ( ! empty($Vxmdyg3ikftp))
			{
				$Vsh01c1z21oh = $Vsh01c1z21oh_sep.http_build_query($Vxmdyg3ikftp);
				$this->suffix .= $Vsh01c1z21oh;
			}

			
			
			if ($this->reuse_query_string === TRUE && ($Vm33icyo3vfv = strpos($Vbyw4pefezev, '?')) !== FALSE)
			{
				$Vbyw4pefezev = substr($Vbyw4pefezev, 0, $Vm33icyo3vfv);
			}

			if ($Vifskrj4bm3x === '')
			{
				$Vifskrj4bm3x = $Vbyw4pefezev.$Vsh01c1z21oh;
			}

			$Vbyw4pefezev = rtrim($Vbyw4pefezev, '/').'/';
		}

		
		$Vq403aqjlztu = ($this->use_page_numbers) ? 1 : 0;

		
		if ($this->page_query_string === TRUE)
		{
			$this->cur_page = $this->CI->input->get($this->query_string_segment);
		}
		elseif (empty($this->cur_page))
		{
			
			if ($this->uri_segment === 0)
			{
				$this->uri_segment = count($this->CI->uri->segment_array());
			}

			$this->cur_page = $this->CI->uri->segment($this->uri_segment);

			
			if ($this->prefix !== '' OR $this->suffix !== '')
			{
				$this->cur_page = str_replace(array($this->prefix, $this->suffix), '', $this->cur_page);
			}
		}
		else
		{
			$this->cur_page = (string) $this->cur_page;
		}

		
		if ( ! ctype_digit($this->cur_page) OR ($this->use_page_numbers && (int) $this->cur_page === 0))
		{
			$this->cur_page = $Vq403aqjlztu;
		}
		else
		{
			
			$this->cur_page = (int) $this->cur_page;
		}

		
		
		if ($this->use_page_numbers)
		{
			if ($this->cur_page > $V3f5dystknhz)
			{
				$this->cur_page = $V3f5dystknhz;
			}
		}
		elseif ($this->cur_page > $this->total_rows)
		{
			$this->cur_page = ($V3f5dystknhz - 1) * $this->per_page;
		}

		$V1byxzezgt3j = $this->cur_page;

		
		
		if ( ! $this->use_page_numbers)
		{
			$this->cur_page = (int) floor(($this->cur_page/$this->per_page) + 1);
		}

		
		
		$Vojpgbidgjzg	= (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$Vnl5uy4xrkc1	= (($this->cur_page + $this->num_links) < $V3f5dystknhz) ? $this->cur_page + $this->num_links : $V3f5dystknhz;

		
		$Vzxix2pqoztx = '';

		
		if ($this->first_link !== FALSE && $this->cur_page > ($this->num_links + 1 + ! $this->num_links))
		{
			
			$Vpkjdumwo4xn = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, 1);

			$Vzxix2pqoztx .= $this->first_tag_open.'<a href="'.$Vifskrj4bm3x.'"'.$Vpkjdumwo4xn.$this->_attr_rel('start').'>'
				.$this->first_link.'</a>'.$this->first_tag_close;
		}

		
		if ($this->prev_link !== FALSE && $this->cur_page !== 1)
		{
			$Vep0df0xosaw = ($this->use_page_numbers) ? $V1byxzezgt3j - 1 : $V1byxzezgt3j - $this->per_page;

			$Vpkjdumwo4xn = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, ($this->cur_page - 1));

			if ($Vep0df0xosaw === $Vq403aqjlztu)
			{
				
				$Vzxix2pqoztx .= $this->prev_tag_open.'<a href="'.$Vifskrj4bm3x.'"'.$Vpkjdumwo4xn.$this->_attr_rel('prev').'>'
					.$this->prev_link.'</a>'.$this->prev_tag_close;
			}
			else
			{
				$Vzvgdhpel1hc = $this->prefix.$Vep0df0xosaw.$this->suffix;
				$Vzxix2pqoztx .= $this->prev_tag_open.'<a href="'.$Vbyw4pefezev.$Vzvgdhpel1hc.'"'.$Vpkjdumwo4xn.$this->_attr_rel('prev').'>'
					.$this->prev_link.'</a>'.$this->prev_tag_close;
			}

		}

		
		if ($this->display_pages !== FALSE)
		{
			
			for ($Vaqvwysqwzls = $Vojpgbidgjzg - 1; $Vaqvwysqwzls <= $Vnl5uy4xrkc1; $Vaqvwysqwzls++)
			{
				$Vep0df0xosaw = ($this->use_page_numbers) ? $Vaqvwysqwzls : ($Vaqvwysqwzls * $this->per_page) - $this->per_page;

				$Vpkjdumwo4xn = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $Vaqvwysqwzls);

				if ($Vep0df0xosaw >= $Vq403aqjlztu)
				{
					if ($this->cur_page === $Vaqvwysqwzls)
					{
						
						$Vzxix2pqoztx .= $this->cur_tag_open.$Vaqvwysqwzls.$this->cur_tag_close;
					}
					elseif ($Vep0df0xosaw === $Vq403aqjlztu)
					{
						
						$Vzxix2pqoztx .= $this->num_tag_open.'<a href="'.$Vifskrj4bm3x.'"'.$Vpkjdumwo4xn.$this->_attr_rel('start').'>'
							.$Vaqvwysqwzls.'</a>'.$this->num_tag_close;
					}
					else
					{
						$Vzvgdhpel1hc = $this->prefix.$Vep0df0xosaw.$this->suffix;
						$Vzxix2pqoztx .= $this->num_tag_open.'<a href="'.$Vbyw4pefezev.$Vzvgdhpel1hc.'"'.$Vpkjdumwo4xn.'>'
							.$Vaqvwysqwzls.'</a>'.$this->num_tag_close;
					}
				}
			}
		}

		
		if ($this->next_link !== FALSE && $this->cur_page < $V3f5dystknhz)
		{
			$Vep0df0xosaw = ($this->use_page_numbers) ? $this->cur_page + 1 : $this->cur_page * $this->per_page;

			$Vpkjdumwo4xn = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $this->cur_page + 1);

			$Vzxix2pqoztx .= $this->next_tag_open.'<a href="'.$Vbyw4pefezev.$this->prefix.$Vep0df0xosaw.$this->suffix.'"'.$Vpkjdumwo4xn
				.$this->_attr_rel('next').'>'.$this->next_link.'</a>'.$this->next_tag_close;
		}

		
		if ($this->last_link !== FALSE && ($this->cur_page + $this->num_links + ! $this->num_links) < $V3f5dystknhz)
		{
			$Vep0df0xosaw = ($this->use_page_numbers) ? $V3f5dystknhz : ($V3f5dystknhz * $this->per_page) - $this->per_page;

			$Vpkjdumwo4xn = sprintf('%s %s="%d"', $this->_attributes, $this->data_page_attr, $V3f5dystknhz);

			$Vzxix2pqoztx .= $this->last_tag_open.'<a href="'.$Vbyw4pefezev.$this->prefix.$Vep0df0xosaw.$this->suffix.'"'.$Vpkjdumwo4xn.'>'
				.$this->last_link.'</a>'.$this->last_tag_close;
		}

		
		
		$Vzxix2pqoztx = preg_replace('#([^:"])//+#', '\\1/', $Vzxix2pqoztx);

		
		return $this->full_tag_open.$Vzxix2pqoztx.$this->full_tag_close;
	}

	

	
	protected function _parse_attributes($Vpkjdumwo4xn)
	{
		isset($Vpkjdumwo4xn['rel']) OR $Vpkjdumwo4xn['rel'] = TRUE;
		$this->_link_types = ($Vpkjdumwo4xn['rel'])
			? array('start' => 'start', 'prev' => 'prev', 'next' => 'next')
			: array();
		unset($Vpkjdumwo4xn['rel']);

		$this->_attributes = '';
		foreach ($Vpkjdumwo4xn as $V2xim30qek4u => $Va4zo0rltynrue)
		{
			$this->_attributes .= ' '.$V2xim30qek4u.'="'.$Va4zo0rltynrue.'"';
		}
	}

	

	
	protected function _attr_rel($V4wtbblc1wn4)
	{
		if (isset($this->_link_types[$V4wtbblc1wn4]))
		{
			unset($this->_link_types[$V4wtbblc1wn4]);
			return ' rel="'.$V4wtbblc1wn4.'"';
		}

		return '';
	}

}
