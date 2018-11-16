<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class CI_Cart {

	
	public $Vcs2clduuuxw = '\.a-z0-9_-';

	
	public $Vgh5zqunhjpl = '\w \-\.\:';

	
	public $Vcz1pw51nab0 = TRUE;

	

	
	protected $Vgw3d0qe3dgd;

	
	protected $Vx5jlf05uppw = array();

	
	public function __construct($Vpz5i5lfmwft = array())
	{
		
		$this->CI =& get_instance();

		
		$Vnmcm15juye5 = is_array($Vpz5i5lfmwft) ? $Vpz5i5lfmwft : array();

		
		$this->CI->load->driver('session', $Vnmcm15juye5);

		
		$this->_cart_contents = $this->CI->session->userdata('cart_contents');
		if ($this->_cart_contents === NULL)
		{
			
			$this->_cart_contents = array('cart_total' => 0, 'total_items' => 0);
		}

		log_message('info', 'Cart Class Initialized');
	}

	

	
	public function insert($Vschrm24dzkm = array())
	{
		
		if ( ! is_array($Vschrm24dzkm) OR count($Vschrm24dzkm) === 0)
		{
			log_message('error', 'The insert method must be passed an array containing data.');
			return FALSE;
		}

		
		
		
		

		$Vvbfys5m4xrn = FALSE;
		if (isset($Vschrm24dzkm['id']))
		{
			if (($Vhzaujmtb0it = $this->_insert($Vschrm24dzkm)))
			{
				$Vvbfys5m4xrn = TRUE;
			}
		}
		else
		{
			foreach ($Vschrm24dzkm as $Va4zo0rltynr)
			{
				if (is_array($Va4zo0rltynr) && isset($Va4zo0rltynr['id']))
				{
					if ($this->_insert($Va4zo0rltynr))
					{
						$Vvbfys5m4xrn = TRUE;
					}
				}
			}
		}

		
		if ($Vvbfys5m4xrn === TRUE)
		{
			$this->_save_cart();
			return isset($Vhzaujmtb0it) ? $Vhzaujmtb0it : TRUE;
		}

		return FALSE;
	}

	

	
	protected function _insert($Vschrm24dzkm = array())
	{
		
		if ( ! is_array($Vschrm24dzkm) OR count($Vschrm24dzkm) === 0)
		{
			log_message('error', 'The insert method must be passed an array containing data.');
			return FALSE;
		}

		

		
		if ( ! isset($Vschrm24dzkm['id'], $Vschrm24dzkm['qty'], $Vschrm24dzkm['price'], $Vschrm24dzkm['name']))
		{
			log_message('error', 'The cart array must contain a product ID, quantity, price, and name.');
			return FALSE;
		}

		

		
		$Vschrm24dzkm['qty'] = (float) $Vschrm24dzkm['qty'];

		
		if ($Vschrm24dzkm['qty'] == 0)
		{
			return FALSE;
		}

		

		
		
		
		if ( ! preg_match('/^['.$this->product_id_rules.']+$/i', $Vschrm24dzkm['id']))
		{
			log_message('error', 'Invalid product ID.  The product ID can only contain alpha-numeric characters, dashes, and underscores');
			return FALSE;
		}

		

		
		
		if ($this->product_name_safe && ! preg_match('/^['.$this->product_name_rules.']+$/i'.(UTF8_ENABLED ? 'u' : ''), $Vschrm24dzkm['name']))
		{
			log_message('error', 'An invalid name was submitted as the product name: '.$Vschrm24dzkm['name'].' The name can only contain alpha-numeric characters, dashes, underscores, colons, and spaces');
			return FALSE;
		}

		

		
		$Vschrm24dzkm['price'] = (float) $Vschrm24dzkm['price'];

		
		
		
		
		
		
		
		
		
		
		if (isset($Vschrm24dzkm['options']) && count($Vschrm24dzkm['options']) > 0)
		{
			$Vhzaujmtb0it = md5($Vschrm24dzkm['id'].serialize($Vschrm24dzkm['options']));
		}
		else
		{
			
			
			
			$Vhzaujmtb0it = md5($Vschrm24dzkm['id']);
		}

		

		
		
		$Vxtvlm4eqou1 = isset($this->_cart_contents[$Vhzaujmtb0it]['qty']) ? (int) $this->_cart_contents[$Vhzaujmtb0it]['qty'] : 0;

		
		$Vschrm24dzkm['rowid'] = $Vhzaujmtb0it;
		$Vschrm24dzkm['qty'] += $Vxtvlm4eqou1;
		$this->_cart_contents[$Vhzaujmtb0it] = $Vschrm24dzkm;

		return $Vhzaujmtb0it;
	}

	

	
	public function update($Vschrm24dzkm = array())
	{
		
		if ( ! is_array($Vschrm24dzkm) OR count($Vschrm24dzkm) === 0)
		{
			return FALSE;
		}

		
		
		
		
		$Vvbfys5m4xrn = FALSE;
		if (isset($Vschrm24dzkm['rowid']))
		{
			if ($this->_update($Vschrm24dzkm) === TRUE)
			{
				$Vvbfys5m4xrn = TRUE;
			}
		}
		else
		{
			foreach ($Vschrm24dzkm as $Va4zo0rltynr)
			{
				if (is_array($Va4zo0rltynr) && isset($Va4zo0rltynr['rowid']))
				{
					if ($this->_update($Va4zo0rltynr) === TRUE)
					{
						$Vvbfys5m4xrn = TRUE;
					}
				}
			}
		}

		
		if ($Vvbfys5m4xrn === TRUE)
		{
			$this->_save_cart();
			return TRUE;
		}

		return FALSE;
	}

	

	
	protected function _update($Vschrm24dzkm = array())
	{
		
		if ( ! isset($Vschrm24dzkm['rowid'], $this->_cart_contents[$Vschrm24dzkm['rowid']]))
		{
			return FALSE;
		}

		
		if (isset($Vschrm24dzkm['qty']))
		{
			$Vschrm24dzkm['qty'] = (float) $Vschrm24dzkm['qty'];
			
			
			if ($Vschrm24dzkm['qty'] == 0)
			{
				unset($this->_cart_contents[$Vschrm24dzkm['rowid']]);
				return TRUE;
			}
		}

		
		$Vpgpnbxy5p5e = array_intersect(array_keys($this->_cart_contents[$Vschrm24dzkm['rowid']]), array_keys($Vschrm24dzkm));
		
		if (isset($Vschrm24dzkm['price']))
		{
			$Vschrm24dzkm['price'] = (float) $Vschrm24dzkm['price'];
		}

		
		foreach (array_diff($Vpgpnbxy5p5e, array('id', 'name')) as $V2xim30qek4u)
		{
			$this->_cart_contents[$Vschrm24dzkm['rowid']][$V2xim30qek4u] = $Vschrm24dzkm[$V2xim30qek4u];
		}

		return TRUE;
	}

	

	
	protected function _save_cart()
	{
		
		$this->_cart_contents['total_items'] = $this->_cart_contents['cart_total'] = 0;
		foreach ($this->_cart_contents as $V2xim30qek4u => $Va4zo0rltynr)
		{
			
			if ( ! is_array($Va4zo0rltynr) OR ! isset($Va4zo0rltynr['price'], $Va4zo0rltynr['qty']))
			{
				continue;
			}

			$this->_cart_contents['cart_total'] += ($Va4zo0rltynr['price'] * $Va4zo0rltynr['qty']);
			$this->_cart_contents['total_items'] += $Va4zo0rltynr['qty'];
			$this->_cart_contents[$V2xim30qek4u]['subtotal'] = ($this->_cart_contents[$V2xim30qek4u]['price'] * $this->_cart_contents[$V2xim30qek4u]['qty']);
		}

		
		if (count($this->_cart_contents) <= 2)
		{
			$this->CI->session->unset_userdata('cart_contents');

			
			return FALSE;
		}

		
		
		$this->CI->session->set_userdata(array('cart_contents' => $this->_cart_contents));

		
		return TRUE;
	}

	

	
	public function total()
	{
		return $this->_cart_contents['cart_total'];
	}

	

	
	 public function remove($Vhzaujmtb0it)
	 {
		
		unset($this->_cart_contents[$Vhzaujmtb0it]);
		$this->_save_cart();
		return TRUE;
	 }

	

	
	public function total_items()
	{
		return $this->_cart_contents['total_items'];
	}

	

	
	public function contents($V5zizxcx54c1 = FALSE)
	{
		
		$Viqsvbafvsjk = ($V5zizxcx54c1) ? array_reverse($this->_cart_contents) : $this->_cart_contents;

		
		unset($Viqsvbafvsjk['total_items']);
		unset($Viqsvbafvsjk['cart_total']);

		return $Viqsvbafvsjk;
	}

	

	
	public function get_item($Vglmp2rmevst)
	{
		return (in_array($Vglmp2rmevst, array('total_items', 'cart_total'), TRUE) OR ! isset($this->_cart_contents[$Vglmp2rmevst]))
			? FALSE
			: $this->_cart_contents[$Vglmp2rmevst];
	}

	

	
	public function has_options($Vglmp2rmevst = '')
	{
		return (isset($this->_cart_contents[$Vglmp2rmevst]['options']) && count($this->_cart_contents[$Vglmp2rmevst]['options']) !== 0);
	}

	

	
	public function product_options($Vglmp2rmevst = '')
	{
		return isset($this->_cart_contents[$Vglmp2rmevst]['options']) ? $this->_cart_contents[$Vglmp2rmevst]['options'] : array();
	}

	

	
	public function format_number($Vewkafdpowpc = '')
	{
		return ($Vewkafdpowpc === '') ? '' : number_format( (float) $Vewkafdpowpc, 2, '.', ',');
	}

	

	
	public function destroy()
	{
		$this->_cart_contents = array('cart_total' => 0, 'total_items' => 0);
		$this->CI->session->unset_userdata('cart_contents');
	}

}
