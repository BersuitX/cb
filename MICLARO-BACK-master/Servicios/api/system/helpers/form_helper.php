<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('form_open'))
{
	
	function form_open($Vb0dwcwa30b2 = '', $Vpkjdumwo4xn = array(), $Vrwee4zvnllp = array())
	{
		$Vgw3d0qe3dgd =& get_instance();

		
		if ( ! $Vb0dwcwa30b2)
		{
			$Vb0dwcwa30b2 = $Vgw3d0qe3dgd->config->site_url($Vgw3d0qe3dgd->uri->uri_string());
		}
		
		elseif (strpos($Vb0dwcwa30b2, '://') === FALSE)
		{
			$Vb0dwcwa30b2 = $Vgw3d0qe3dgd->config->site_url($Vb0dwcwa30b2);
		}

		$Vpkjdumwo4xn = _attributes_to_string($Vpkjdumwo4xn);

		if (stripos($Vpkjdumwo4xn, 'method=') === FALSE)
		{
			$Vpkjdumwo4xn .= ' method="post"';
		}

		if (stripos($Vpkjdumwo4xn, 'accept-charset=') === FALSE)
		{
			$Vpkjdumwo4xn .= ' accept-charset="'.strtolower(config_item('charset')).'"';
		}

		$Vnyjwmsoewc5 = '<form action="'.$Vb0dwcwa30b2.'"'.$Vpkjdumwo4xn.">\n";

		
		if ($Vgw3d0qe3dgd->config->item('csrf_protection') === TRUE && strpos($Vb0dwcwa30b2, $Vgw3d0qe3dgd->config->base_url()) !== FALSE && ! stripos($Vnyjwmsoewc5, 'method="get"'))
		{
			$Vrwee4zvnllp[$Vgw3d0qe3dgd->security->get_csrf_token_name()] = $Vgw3d0qe3dgd->security->get_csrf_hash();
		}

		if (is_array($Vrwee4zvnllp))
		{
			foreach ($Vrwee4zvnllp as $Vaclaigdbtoo => $Vcnwqsowvhom)
			{
				$Vnyjwmsoewc5 .= '<input type="hidden" name="'.$Vaclaigdbtoo.'" value="'.html_escape($Vcnwqsowvhom).'" style="display:none;" />'."\n";
			}
		}

		return $Vnyjwmsoewc5;
	}
}



if ( ! function_exists('form_open_multipart'))
{
	
	function form_open_multipart($Vb0dwcwa30b2 = '', $Vpkjdumwo4xn = array(), $Vrwee4zvnllp = array())
	{
		if (is_string($Vpkjdumwo4xn))
		{
			$Vpkjdumwo4xn .= ' enctype="multipart/form-data"';
		}
		else
		{
			$Vpkjdumwo4xn['enctype'] = 'multipart/form-data';
		}

		return form_open($Vb0dwcwa30b2, $Vpkjdumwo4xn, $Vrwee4zvnllp);
	}
}



if ( ! function_exists('form_hidden'))
{
	
	function form_hidden($Vaclaigdbtoo, $Vcnwqsowvhom = '', $Vmlb5ge2wpeb = FALSE)
	{
		static $Vnyjwmsoewc5;

		if ($Vmlb5ge2wpeb === FALSE)
		{
			$Vnyjwmsoewc5 = "\n";
		}

		if (is_array($Vaclaigdbtoo))
		{
			foreach ($Vaclaigdbtoo as $V2xim30qek4u => $Va4zo0rltynr)
			{
				form_hidden($V2xim30qek4u, $Va4zo0rltynr, TRUE);
			}

			return $Vnyjwmsoewc5;
		}

		if ( ! is_array($Vcnwqsowvhom))
		{
			$Vnyjwmsoewc5 .= '<input type="hidden" name="'.$Vaclaigdbtoo.'" value="'.html_escape($Vcnwqsowvhom)."\" />\n";
		}
		else
		{
			foreach ($Vcnwqsowvhom as $Vwyse0flpyxh => $Vxxtccqydhzn)
			{
				$Vwyse0flpyxh = is_int($Vwyse0flpyxh) ? '' : $Vwyse0flpyxh;
				form_hidden($Vaclaigdbtoo.'['.$Vwyse0flpyxh.']', $Vxxtccqydhzn, TRUE);
			}
		}

		return $Vnyjwmsoewc5;
	}
}



if ( ! function_exists('form_input'))
{
	
	function form_input($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array(
			'type' => 'text',
			'name' => is_array($Vfeinw1hsfej) ? '' : $Vfeinw1hsfej,
			'value' => $Vcnwqsowvhom
		);

		return '<input '._parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)._attributes_to_string($Vfi5bo00ptdr)." />\n";
	}
}



if ( ! function_exists('form_password'))
{
	
	function form_password($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vfi5bo00ptdr = '')
	{
		is_array($Vfeinw1hsfej) OR $Vfeinw1hsfej = array('name' => $Vfeinw1hsfej);
		$Vfeinw1hsfej['type'] = 'password';
		return form_input($Vfeinw1hsfej, $Vcnwqsowvhom, $Vfi5bo00ptdr);
	}
}



if ( ! function_exists('form_upload'))
{
	
	function form_upload($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array('type' => 'file', 'name' => '');
		is_array($Vfeinw1hsfej) OR $Vfeinw1hsfej = array('name' => $Vfeinw1hsfej);
		$Vfeinw1hsfej['type'] = 'file';

		return '<input '._parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)._attributes_to_string($Vfi5bo00ptdr)." />\n";
	}
}



if ( ! function_exists('form_textarea'))
{
	
	function form_textarea($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array(
			'name' => is_array($Vfeinw1hsfej) ? '' : $Vfeinw1hsfej,
			'cols' => '40',
			'rows' => '10'
		);

		if ( ! is_array($Vfeinw1hsfej) OR ! isset($Vfeinw1hsfej['value']))
		{
			$Va4zo0rltynr = $Vcnwqsowvhom;
		}
		else
		{
			$Va4zo0rltynr = $Vfeinw1hsfej['value'];
			unset($Vfeinw1hsfej['value']); 
		}

		return '<textarea '._parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)._attributes_to_string($Vfi5bo00ptdr).'>'
			.html_escape($Va4zo0rltynr)
			."</textarea>\n";
	}
}



if ( ! function_exists('form_multiselect'))
{
	
	function form_multiselect($Vaclaigdbtoo = '', $V1flr55fnyyv = array(), $Volwuqtzdbnp = array(), $Vfi5bo00ptdr = '')
	{
		$Vfi5bo00ptdr = _attributes_to_string($Vfi5bo00ptdr);
		if (stripos($Vfi5bo00ptdr, 'multiple') === FALSE)
		{
			$Vfi5bo00ptdr .= ' multiple="multiple"';
		}

		return form_dropdown($Vaclaigdbtoo, $V1flr55fnyyv, $Volwuqtzdbnp, $Vfi5bo00ptdr);
	}
}



if ( ! function_exists('form_dropdown'))
{
	
	function form_dropdown($Vfeinw1hsfej = '', $V1flr55fnyyv = array(), $Volwuqtzdbnp = array(), $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array();

		if (is_array($Vfeinw1hsfej))
		{
			if (isset($Vfeinw1hsfej['selected']))
			{
				$Volwuqtzdbnp = $Vfeinw1hsfej['selected'];
				unset($Vfeinw1hsfej['selected']); 
			}

			if (isset($Vfeinw1hsfej['options']))
			{
				$V1flr55fnyyv = $Vfeinw1hsfej['options'];
				unset($Vfeinw1hsfej['options']); 
			}
		}
		else
		{
			$Vpoj1s2hpsj1 = array('name' => $Vfeinw1hsfej);
		}

		is_array($Volwuqtzdbnp) OR $Volwuqtzdbnp = array($Volwuqtzdbnp);
		is_array($V1flr55fnyyv) OR $V1flr55fnyyv = array($V1flr55fnyyv);

		
		if (empty($Volwuqtzdbnp))
		{
			if (is_array($Vfeinw1hsfej))
			{
				if (isset($Vfeinw1hsfej['name'], $_POST[$Vfeinw1hsfej['name']]))
				{
					$Volwuqtzdbnp = array($_POST[$Vfeinw1hsfej['name']]);
				}
			}
			elseif (isset($_POST[$Vfeinw1hsfej]))
			{
				$Volwuqtzdbnp = array($_POST[$Vfeinw1hsfej]);
			}
		}

		$Vfi5bo00ptdr = _attributes_to_string($Vfi5bo00ptdr);

		$V3hyc2i2xyko = (count($Volwuqtzdbnp) > 1 && stripos($Vfi5bo00ptdr, 'multiple') === FALSE) ? ' multiple="multiple"' : '';

		$Vnyjwmsoewc5 = '<select '.rtrim(_parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)).$Vfi5bo00ptdr.$V3hyc2i2xyko.">\n";

		foreach ($V1flr55fnyyv as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$V2xim30qek4u = (string) $V2xim30qek4u;

			if (is_array($Va4zo0rltynr))
			{
				if (empty($Va4zo0rltynr))
				{
					continue;
				}

				$Vnyjwmsoewc5 .= '<optgroup label="'.$V2xim30qek4u."\">\n";

				foreach ($Va4zo0rltynr as $V33sohwuuw4j => $Vqqnowalf2uf)
				{
					$V4jku0e50s12 = in_array($V33sohwuuw4j, $Volwuqtzdbnp) ? ' selected="selected"' : '';
					$Vnyjwmsoewc5 .= '<option value="'.html_escape($V33sohwuuw4j).'"'.$V4jku0e50s12.'>'
						.(string) $Vqqnowalf2uf."</option>\n";
				}

				$Vnyjwmsoewc5 .= "</optgroup>\n";
			}
			else
			{
				$Vnyjwmsoewc5 .= '<option value="'.html_escape($V2xim30qek4u).'"'
					.(in_array($V2xim30qek4u, $Volwuqtzdbnp) ? ' selected="selected"' : '').'>'
					.(string) $Va4zo0rltynr."</option>\n";
			}
		}

		return $Vnyjwmsoewc5."</select>\n";
	}
}



if ( ! function_exists('form_checkbox'))
{
	
	function form_checkbox($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vc5n5gwkfqw2 = FALSE, $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array('type' => 'checkbox', 'name' => ( ! is_array($Vfeinw1hsfej) ? $Vfeinw1hsfej : ''), 'value' => $Vcnwqsowvhom);

		if (is_array($Vfeinw1hsfej) && array_key_exists('checked', $Vfeinw1hsfej))
		{
			$Vc5n5gwkfqw2 = $Vfeinw1hsfej['checked'];

			if ($Vc5n5gwkfqw2 == FALSE)
			{
				unset($Vfeinw1hsfej['checked']);
			}
			else
			{
				$Vfeinw1hsfej['checked'] = 'checked';
			}
		}

		if ($Vc5n5gwkfqw2 == TRUE)
		{
			$Vpoj1s2hpsj1['checked'] = 'checked';
		}
		else
		{
			unset($Vpoj1s2hpsj1['checked']);
		}

		return '<input '._parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)._attributes_to_string($Vfi5bo00ptdr)." />\n";
	}
}



if ( ! function_exists('form_radio'))
{
	
	function form_radio($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vc5n5gwkfqw2 = FALSE, $Vfi5bo00ptdr = '')
	{
		is_array($Vfeinw1hsfej) OR $Vfeinw1hsfej = array('name' => $Vfeinw1hsfej);
		$Vfeinw1hsfej['type'] = 'radio';

		return form_checkbox($Vfeinw1hsfej, $Vcnwqsowvhom, $Vc5n5gwkfqw2, $Vfi5bo00ptdr);
	}
}



if ( ! function_exists('form_submit'))
{
	
	function form_submit($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array(
			'type' => 'submit',
			'name' => is_array($Vfeinw1hsfej) ? '' : $Vfeinw1hsfej,
			'value' => $Vcnwqsowvhom
		);

		return '<input '._parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)._attributes_to_string($Vfi5bo00ptdr)." />\n";
	}
}



if ( ! function_exists('form_reset'))
{
	
	function form_reset($Vfeinw1hsfej = '', $Vcnwqsowvhom = '', $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array(
			'type' => 'reset',
			'name' => is_array($Vfeinw1hsfej) ? '' : $Vfeinw1hsfej,
			'value' => $Vcnwqsowvhom
		);

		return '<input '._parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)._attributes_to_string($Vfi5bo00ptdr)." />\n";
	}
}



if ( ! function_exists('form_button'))
{
	
	function form_button($Vfeinw1hsfej = '', $V3d4hantjd1y = '', $Vfi5bo00ptdr = '')
	{
		$Vpoj1s2hpsj1 = array(
			'name' => is_array($Vfeinw1hsfej) ? '' : $Vfeinw1hsfej,
			'type' => 'button'
		);

		if (is_array($Vfeinw1hsfej) && isset($Vfeinw1hsfej['content']))
		{
			$V3d4hantjd1y = $Vfeinw1hsfej['content'];
			unset($Vfeinw1hsfej['content']); 
		}

		return '<button '._parse_form_attributes($Vfeinw1hsfej, $Vpoj1s2hpsj1)._attributes_to_string($Vfi5bo00ptdr).'>'
			.$V3d4hantjd1y
			."</button>\n";
	}
}



if ( ! function_exists('form_label'))
{
	
	function form_label($Vcvylfvdpy0g = '', $Vdrzyozqxvbr = '', $Vpkjdumwo4xn = array())
	{

		$Vl024rj3h4hx = '<label';

		if ($Vdrzyozqxvbr !== '')
		{
			$Vl024rj3h4hx .= ' for="'.$Vdrzyozqxvbr.'"';
		}

		if (is_array($Vpkjdumwo4xn) && count($Vpkjdumwo4xn) > 0)
		{
			foreach ($Vpkjdumwo4xn as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vl024rj3h4hx .= ' '.$V2xim30qek4u.'="'.$Va4zo0rltynr.'"';
			}
		}

		return $Vl024rj3h4hx.'>'.$Vcvylfvdpy0g.'</label>';
	}
}



if ( ! function_exists('form_fieldset'))
{
	
	function form_fieldset($Vea3mw01kod4 = '', $Vpkjdumwo4xn = array())
	{
		$Vw2orv43j0xk = '<fieldset'._attributes_to_string($Vpkjdumwo4xn).">\n";
		if ($Vea3mw01kod4 !== '')
		{
			return $Vw2orv43j0xk.'<legend>'.$Vea3mw01kod4."</legend>\n";
		}

		return $Vw2orv43j0xk;
	}
}



if ( ! function_exists('form_fieldset_close'))
{
	
	function form_fieldset_close($Vfi5bo00ptdr = '')
	{
		return '</fieldset>'.$Vfi5bo00ptdr;
	}
}



if ( ! function_exists('form_close'))
{
	
	function form_close($Vfi5bo00ptdr = '')
	{
		return '</form>'.$Vfi5bo00ptdr;
	}
}



if ( ! function_exists('form_prep'))
{
	
	function form_prep($Vssdjb5oqaky)
	{
		return html_escape($Vssdjb5oqaky, TRUE);
	}
}



if ( ! function_exists('set_value'))
{
	
	function set_value($Vwji4rxkyw5j, $Vexts11gu2nb = '', $V15dzrlqokwp = TRUE)
	{
		$Vgw3d0qe3dgd =& get_instance();

		$Vcnwqsowvhom = (isset($Vgw3d0qe3dgd->form_validation) && is_object($Vgw3d0qe3dgd->form_validation) && $Vgw3d0qe3dgd->form_validation->has_rule($Vwji4rxkyw5j))
			? $Vgw3d0qe3dgd->form_validation->set_value($Vwji4rxkyw5j, $Vexts11gu2nb)
			: $Vgw3d0qe3dgd->input->post($Vwji4rxkyw5j, FALSE);

		isset($Vcnwqsowvhom) OR $Vcnwqsowvhom = $Vexts11gu2nb;
		return ($V15dzrlqokwp) ? html_escape($Vcnwqsowvhom) : $Vcnwqsowvhom;
	}
}



if ( ! function_exists('set_select'))
{
	
	function set_select($Vwji4rxkyw5j, $Vcnwqsowvhom = '', $Vexts11gu2nb = FALSE)
	{
		$Vgw3d0qe3dgd =& get_instance();

		if (isset($Vgw3d0qe3dgd->form_validation) && is_object($Vgw3d0qe3dgd->form_validation) && $Vgw3d0qe3dgd->form_validation->has_rule($Vwji4rxkyw5j))
		{
			return $Vgw3d0qe3dgd->form_validation->set_select($Vwji4rxkyw5j, $Vcnwqsowvhom, $Vexts11gu2nb);
		}
		elseif (($Vh35lztyst3d = $Vgw3d0qe3dgd->input->post($Vwji4rxkyw5j, FALSE)) === NULL)
		{
			return ($Vexts11gu2nb === TRUE) ? ' selected="selected"' : '';
		}

		$Vcnwqsowvhom = (string) $Vcnwqsowvhom;
		if (is_array($Vh35lztyst3d))
		{
			
			foreach ($Vh35lztyst3d as &$Vxxtccqydhzn)
			{
				if ($Vcnwqsowvhom === $Vxxtccqydhzn)
				{
					return ' selected="selected"';
				}
			}

			return '';
		}

		return ($Vh35lztyst3d === $Vcnwqsowvhom) ? ' selected="selected"' : '';
	}
}



if ( ! function_exists('set_checkbox'))
{
	
	function set_checkbox($Vwji4rxkyw5j, $Vcnwqsowvhom = '', $Vexts11gu2nb = FALSE)
	{
		$Vgw3d0qe3dgd =& get_instance();

		if (isset($Vgw3d0qe3dgd->form_validation) && is_object($Vgw3d0qe3dgd->form_validation) && $Vgw3d0qe3dgd->form_validation->has_rule($Vwji4rxkyw5j))
		{
			return $Vgw3d0qe3dgd->form_validation->set_checkbox($Vwji4rxkyw5j, $Vcnwqsowvhom, $Vexts11gu2nb);
		}

		
		$Vcnwqsowvhom = (string) $Vcnwqsowvhom;
		$Vh35lztyst3d = $Vgw3d0qe3dgd->input->post($Vwji4rxkyw5j, FALSE);

		if (is_array($Vh35lztyst3d))
		{
			
			foreach ($Vh35lztyst3d as &$Vxxtccqydhzn)
			{
				if ($Vcnwqsowvhom === $Vxxtccqydhzn)
				{
					return ' checked="checked"';
				}
			}

			return '';
		}

		
		if ($Vgw3d0qe3dgd->input->method() === 'post')
		{
			return ($Vh35lztyst3d === $Vcnwqsowvhom) ? ' checked="checked"' : '';
		}

		return ($Vexts11gu2nb === TRUE) ? ' checked="checked"' : '';
	}
}



if ( ! function_exists('set_radio'))
{
	
	function set_radio($Vwji4rxkyw5j, $Vcnwqsowvhom = '', $Vexts11gu2nb = FALSE)
	{
		$Vgw3d0qe3dgd =& get_instance();

		if (isset($Vgw3d0qe3dgd->form_validation) && is_object($Vgw3d0qe3dgd->form_validation) && $Vgw3d0qe3dgd->form_validation->has_rule($Vwji4rxkyw5j))
		{
			return $Vgw3d0qe3dgd->form_validation->set_radio($Vwji4rxkyw5j, $Vcnwqsowvhom, $Vexts11gu2nb);
		}

		
		$Vcnwqsowvhom = (string) $Vcnwqsowvhom;
		$Vh35lztyst3d = $Vgw3d0qe3dgd->input->post($Vwji4rxkyw5j, FALSE);

		if (is_array($Vh35lztyst3d))
		{
			
			foreach ($Vh35lztyst3d as &$Vxxtccqydhzn)
			{
				if ($Vcnwqsowvhom === $Vxxtccqydhzn)
				{
					return ' checked="checked"';
				}
			}

			return '';
		}

		
		if ($Vgw3d0qe3dgd->input->method() === 'post')
		{
			return ($Vh35lztyst3d === $Vcnwqsowvhom) ? ' checked="checked"' : '';
		}

		return ($Vexts11gu2nb === TRUE) ? ' checked="checked"' : '';
	}
}



if ( ! function_exists('form_error'))
{
	
	function form_error($Vwji4rxkyw5j = '', $Vapdd0fqkaxu = '', $Vth1qrkbbg4y = '')
	{
		if (FALSE === ($Vfgav5llq23g =& _get_validation_object()))
		{
			return '';
		}

		return $Vfgav5llq23g->error($Vwji4rxkyw5j, $Vapdd0fqkaxu, $Vth1qrkbbg4y);
	}
}



if ( ! function_exists('validation_errors'))
{
	
	function validation_errors($Vapdd0fqkaxu = '', $Vth1qrkbbg4y = '')
	{
		if (FALSE === ($Vfgav5llq23g =& _get_validation_object()))
		{
			return '';
		}

		return $Vfgav5llq23g->error_string($Vapdd0fqkaxu, $Vth1qrkbbg4y);
	}
}



if ( ! function_exists('_parse_form_attributes'))
{
	
	function _parse_form_attributes($Vpkjdumwo4xn, $Vexts11gu2nb)
	{
		if (is_array($Vpkjdumwo4xn))
		{
			foreach ($Vexts11gu2nb as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (isset($Vpkjdumwo4xn[$V2xim30qek4u]))
				{
					$Vexts11gu2nb[$V2xim30qek4u] = $Vpkjdumwo4xn[$V2xim30qek4u];
					unset($Vpkjdumwo4xn[$V2xim30qek4u]);
				}
			}

			if (count($Vpkjdumwo4xn) > 0)
			{
				$Vexts11gu2nb = array_merge($Vexts11gu2nb, $Vpkjdumwo4xn);
			}
		}

		$Vjtqyladxndz = '';

		foreach ($Vexts11gu2nb as $V2xim30qek4u => $Va4zo0rltynr)
		{
			if ($V2xim30qek4u === 'value')
			{
				$Va4zo0rltynr = html_escape($Va4zo0rltynr);
			}
			elseif ($V2xim30qek4u === 'name' && ! strlen($Vexts11gu2nb['name']))
			{
				continue;
			}

			$Vjtqyladxndz .= $V2xim30qek4u.'="'.$Va4zo0rltynr.'" ';
		}

		return $Vjtqyladxndz;
	}
}



if ( ! function_exists('_attributes_to_string'))
{
	
	function _attributes_to_string($Vpkjdumwo4xn)
	{
		if (empty($Vpkjdumwo4xn))
		{
			return '';
		}

		if (is_object($Vpkjdumwo4xn))
		{
			$Vpkjdumwo4xn = (array) $Vpkjdumwo4xn;
		}

		if (is_array($Vpkjdumwo4xn))
		{
			$Vjtqyladxndzs = '';

			foreach ($Vpkjdumwo4xn as $V2xim30qek4u => $Va4zo0rltynr)
			{
				$Vjtqyladxndzs .= ' '.$V2xim30qek4u.'="'.$Va4zo0rltynr.'"';
			}

			return $Vjtqyladxndzs;
		}

		if (is_string($Vpkjdumwo4xn))
		{
			return ' '.$Vpkjdumwo4xn;
		}

		return FALSE;
	}
}



if ( ! function_exists('_get_validation_object'))
{
	
	function &_get_validation_object()
	{
		$Vgw3d0qe3dgd =& get_instance();

		
		$Vb5hjbk2mbwk = FALSE;

		if (FALSE !== ($V1v3xsp031u0 = $Vgw3d0qe3dgd->load->is_loaded('Form_validation')))
		{
			if ( ! isset($Vgw3d0qe3dgd->$V1v3xsp031u0) OR ! is_object($Vgw3d0qe3dgd->$V1v3xsp031u0))
			{
				return $Vb5hjbk2mbwk;
			}

			return $Vgw3d0qe3dgd->$V1v3xsp031u0;
		}

		return $Vb5hjbk2mbwk;
	}
}
