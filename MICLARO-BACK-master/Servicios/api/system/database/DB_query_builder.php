<?php

defined('BASEPATH') OR exit('No direct script access allowed');



abstract class CI_DB_query_builder extends CI_DB_driver {

	
	protected $V002k55ew2xj		= FALSE;

	
	protected $Vl2c4vwet4cl		= FALSE;

	
	protected $Vh1wi0cqmvus			= array();

	
	protected $Vgw5fevoi3mw			= FALSE;

	
	protected $Vzuqjl1shbzk			= array();

	
	protected $Vqw0whjcgzo2			= array();

	
	protected $Vri5ekmubydz			= array();

	
	protected $Vfjzltl2dabe			= array();

	
	protected $Vu5hrjfabe4e			= array();

	
	protected $V3mxgjd4o5tf			= array();

	
	protected $Vbnt2dsczwfo			= FALSE;

	
	protected $Vbl1boanl1zq			= FALSE;

	
	protected $Vvswqqvy3squ			= array();

	
	protected $Vteittwsfa5u			= array();

	
	protected $Vjb3tqomy0rb		= array();

	
	protected $Vri5ekmubydz_group_started	= FALSE;

	
	protected $Vri5ekmubydz_group_count		= 0;

	

	
	protected $V1aqjktkmnn4				= FALSE;

	
	protected $V43pbtkclbro			= array();

	
	protected $Vfyihsm4kp2y			= array();

	
	protected $Vsk3yy5p5cp5			= array();

	
	protected $V43agccwlpav			= array();

	
	protected $Vegogmdnb033			= array();

	
	protected $V1uey3oaswvv			= array();

	
	protected $Vm4iz1bigcgd			= array();

	
	protected $V3ff4w2bvxtq			= array();

	
	protected $V43jlfrh2d0z				= array();

	
	protected $Vcmghpfg1spq 			= array();

	
	protected $Var5mezyvltx			= array();

	

	
	public function select($Vjsggk5v2fqw = '*', $Vo3ncbt2kr35 = NULL)
	{
		if (is_string($Vjsggk5v2fqw))
		{
			$Vjsggk5v2fqw = explode(',', $Vjsggk5v2fqw);
		}

		
		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		foreach ($Vjsggk5v2fqw as $Va4zo0rltynr)
		{
			$Va4zo0rltynr = trim($Va4zo0rltynr);

			if ($Va4zo0rltynr !== '')
			{
				$Vek3kicoh5l4his->qb_select[] = $Va4zo0rltynr;
				$Vek3kicoh5l4his->qb_no_escape[] = $Vo3ncbt2kr35;

				if ($Vek3kicoh5l4his->qb_caching === TRUE)
				{
					$Vek3kicoh5l4his->qb_cache_select[] = $Va4zo0rltynr;
					$Vek3kicoh5l4his->qb_cache_exists[] = 'select';
					$Vek3kicoh5l4his->qb_cache_no_escape[] = $Vo3ncbt2kr35;
				}
			}
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function select_max($Vjsggk5v2fqw = '', $V4skvbrggqat = '')
	{
		return $Vek3kicoh5l4his->_max_min_avg_sum($Vjsggk5v2fqw, $V4skvbrggqat, 'MAX');
	}

	

	
	public function select_min($Vjsggk5v2fqw = '', $V4skvbrggqat = '')
	{
		return $Vek3kicoh5l4his->_max_min_avg_sum($Vjsggk5v2fqw, $V4skvbrggqat, 'MIN');
	}

	

	
	public function select_avg($Vjsggk5v2fqw = '', $V4skvbrggqat = '')
	{
		return $Vek3kicoh5l4his->_max_min_avg_sum($Vjsggk5v2fqw, $V4skvbrggqat, 'AVG');
	}

	

	
	public function select_sum($Vjsggk5v2fqw = '', $V4skvbrggqat = '')
	{
		return $Vek3kicoh5l4his->_max_min_avg_sum($Vjsggk5v2fqw, $V4skvbrggqat, 'SUM');
	}

	

	
	protected function _max_min_avg_sum($Vjsggk5v2fqw = '', $V4skvbrggqat = '', $V4wtbblc1wn4 = 'MAX')
	{
		if ( ! is_string($Vjsggk5v2fqw) OR $Vjsggk5v2fqw === '')
		{
			$Vek3kicoh5l4his->display_error('db_invalid_query');
		}

		$V4wtbblc1wn4 = strtoupper($V4wtbblc1wn4);

		if ( ! in_array($V4wtbblc1wn4, array('MAX', 'MIN', 'AVG', 'SUM')))
		{
			show_error('Invalid function type: '.$V4wtbblc1wn4);
		}

		if ($V4skvbrggqat === '')
		{
			$V4skvbrggqat = $Vek3kicoh5l4his->_create_alias_from_table(trim($Vjsggk5v2fqw));
		}

		$Vcusg10hsxxg = $V4wtbblc1wn4.'('.$Vek3kicoh5l4his->protect_identifiers(trim($Vjsggk5v2fqw)).') AS '.$Vek3kicoh5l4his->escape_identifiers(trim($V4skvbrggqat));

		$Vek3kicoh5l4his->qb_select[] = $Vcusg10hsxxg;
		$Vek3kicoh5l4his->qb_no_escape[] = NULL;

		if ($Vek3kicoh5l4his->qb_caching === TRUE)
		{
			$Vek3kicoh5l4his->qb_cache_select[] = $Vcusg10hsxxg;
			$Vek3kicoh5l4his->qb_cache_exists[] = 'select';
		}

		return $Vek3kicoh5l4his;
	}

	

	
	protected function _create_alias_from_table($Vutaiebycwbq)
	{
		if (strpos($Vutaiebycwbq, '.') !== FALSE)
		{
			$Vutaiebycwbq = explode('.', $Vutaiebycwbq);
			return end($Vutaiebycwbq);
		}

		return $Vutaiebycwbq;
	}

	

	
	public function distinct($Va4zo0rltynr = TRUE)
	{
		$Vek3kicoh5l4his->qb_distinct = is_bool($Va4zo0rltynr) ? $Va4zo0rltynr : TRUE;
		return $Vek3kicoh5l4his;
	}

	

	
	public function from($Vjpucafbphra)
	{
		foreach ((array) $Vjpucafbphra as $Va4zo0rltynr)
		{
			if (strpos($Va4zo0rltynr, ',') !== FALSE)
			{
				foreach (explode(',', $Va4zo0rltynr) as $Vxxtccqydhzn)
				{
					$Vxxtccqydhzn = trim($Vxxtccqydhzn);
					$Vek3kicoh5l4his->_track_aliases($Vxxtccqydhzn);

					$Vek3kicoh5l4his->qb_from[] = $Vxxtccqydhzn = $Vek3kicoh5l4his->protect_identifiers($Vxxtccqydhzn, TRUE, NULL, FALSE);

					if ($Vek3kicoh5l4his->qb_caching === TRUE)
					{
						$Vek3kicoh5l4his->qb_cache_from[] = $Vxxtccqydhzn;
						$Vek3kicoh5l4his->qb_cache_exists[] = 'from';
					}
				}
			}
			else
			{
				$Va4zo0rltynr = trim($Va4zo0rltynr);

				
				
				$Vek3kicoh5l4his->_track_aliases($Va4zo0rltynr);

				$Vek3kicoh5l4his->qb_from[] = $Va4zo0rltynr = $Vek3kicoh5l4his->protect_identifiers($Va4zo0rltynr, TRUE, NULL, FALSE);

				if ($Vek3kicoh5l4his->qb_caching === TRUE)
				{
					$Vek3kicoh5l4his->qb_cache_from[] = $Va4zo0rltynr;
					$Vek3kicoh5l4his->qb_cache_exists[] = 'from';
				}
			}
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function join($Vhyg2tjvah5t, $Vayaf3ucin4t, $V4wtbblc1wn4 = '', $Vo3ncbt2kr35 = NULL)
	{
		if ($V4wtbblc1wn4 !== '')
		{
			$V4wtbblc1wn4 = strtoupper(trim($V4wtbblc1wn4));

			if ( ! in_array($V4wtbblc1wn4, array('LEFT', 'RIGHT', 'OUTER', 'INNER', 'LEFT OUTER', 'RIGHT OUTER'), TRUE))
			{
				$V4wtbblc1wn4 = '';
			}
			else
			{
				$V4wtbblc1wn4 .= ' ';
			}
		}

		
		
		$Vek3kicoh5l4his->_track_aliases($Vhyg2tjvah5t);

		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		if ( ! $Vek3kicoh5l4his->_has_operator($Vayaf3ucin4t))
		{
			$Vayaf3ucin4t = ' USING ('.($Vo3ncbt2kr35 ? $Vek3kicoh5l4his->escape_identifiers($Vayaf3ucin4t) : $Vayaf3ucin4t).')';
		}
		elseif ($Vo3ncbt2kr35 === FALSE)
		{
			$Vayaf3ucin4t = ' ON '.$Vayaf3ucin4t;
		}
		else
		{
			
			if (preg_match_all('/\sAND\s|\sOR\s/i', $Vayaf3ucin4t, $Vvf3rjtc4rrx, PREG_OFFSET_CAPTURE))
			{
				$Vayaf3ucin4titions = array();
				$Vvf3rjtc4rrx = $Vvf3rjtc4rrx[0];
				array_unshift($Vvf3rjtc4rrx, array('', 0));

				for ($Vep0df0xosaw = count($Vvf3rjtc4rrx) - 1, $Vdiwoulmijgo = strlen($Vayaf3ucin4t); $Vep0df0xosaw >= 0; $Vep0df0xosaw--)
				{
					$Vvf3rjtc4rrx[$Vep0df0xosaw][1] += strlen($Vvf3rjtc4rrx[$Vep0df0xosaw][0]); 
					$Vayaf3ucin4titions[$Vep0df0xosaw] = substr($Vayaf3ucin4t, $Vvf3rjtc4rrx[$Vep0df0xosaw][1], $Vdiwoulmijgo - $Vvf3rjtc4rrx[$Vep0df0xosaw][1]);
					$Vdiwoulmijgo = $Vvf3rjtc4rrx[$Vep0df0xosaw][1] - strlen($Vvf3rjtc4rrx[$Vep0df0xosaw][0]);
					$Vvf3rjtc4rrx[$Vep0df0xosaw] = $Vvf3rjtc4rrx[$Vep0df0xosaw][0];
				}
			}
			else
			{
				$Vayaf3ucin4titions = array($Vayaf3ucin4t);
				$Vvf3rjtc4rrx = array('');
			}

			$Vayaf3ucin4t = ' ON ';
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vayaf3ucin4titions); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$Vwlizxiigw2q = $Vek3kicoh5l4his->_get_operator($Vayaf3ucin4titions[$Vep0df0xosaw]);
				$Vayaf3ucin4t .= $Vvf3rjtc4rrx[$Vep0df0xosaw];
				$Vayaf3ucin4t .= preg_match("/(\(*)?([\[\]\w\.'-]+)".preg_quote($Vwlizxiigw2q)."(.*)/i", $Vayaf3ucin4titions[$Vep0df0xosaw], $V4uvjtwtgjvp)
					? $V4uvjtwtgjvp[1].$Vek3kicoh5l4his->protect_identifiers($V4uvjtwtgjvp[2]).$Vwlizxiigw2q.$Vek3kicoh5l4his->protect_identifiers($V4uvjtwtgjvp[3])
					: $Vayaf3ucin4titions[$Vep0df0xosaw];
			}
		}

		
		if ($Vo3ncbt2kr35 === TRUE)
		{
			$Vhyg2tjvah5t = $Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
		}

		
		$Vek3kicoh5l4his->qb_join[] = $Vwv5i4lvvpud = $V4wtbblc1wn4.'JOIN '.$Vhyg2tjvah5t.$Vayaf3ucin4t;

		if ($Vek3kicoh5l4his->qb_caching === TRUE)
		{
			$Vek3kicoh5l4his->qb_cache_join[] = $Vwv5i4lvvpud;
			$Vek3kicoh5l4his->qb_cache_exists[] = 'join';
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function where($V2xim30qek4u, $Va4zo0rltynrue = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_wh('qb_where', $V2xim30qek4u, $Va4zo0rltynrue, 'AND ', $Vo3ncbt2kr35);
	}

	

	
	public function or_where($V2xim30qek4u, $Va4zo0rltynrue = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_wh('qb_where', $V2xim30qek4u, $Va4zo0rltynrue, 'OR ', $Vo3ncbt2kr35);
	}

	

	
	protected function _wh($V2ssg3ct0cnm, $V2xim30qek4u, $Va4zo0rltynrue = NULL, $V4wtbblc1wn4 = 'AND ', $Vo3ncbt2kr35 = NULL)
	{
		$Vglobilzfpkw = ($V2ssg3ct0cnm === 'qb_having') ? 'qb_cache_having' : 'qb_cache_where';

		if ( ! is_array($V2xim30qek4u))
		{
			$V2xim30qek4u = array($V2xim30qek4u => $Va4zo0rltynrue);
		}

		
		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		foreach ($V2xim30qek4u as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vapdd0fqkaxu = (count($Vek3kicoh5l4his->$V2ssg3ct0cnm) === 0 && count($Vek3kicoh5l4his->$Vglobilzfpkw) === 0)
				? $Vek3kicoh5l4his->_group_get_type('')
				: $Vek3kicoh5l4his->_group_get_type($V4wtbblc1wn4);

			if ($Vxxtccqydhzn !== NULL)
			{
				if ($Vo3ncbt2kr35 === TRUE)
				{
					$Vxxtccqydhzn = ' '.$Vek3kicoh5l4his->escape($Vxxtccqydhzn);
				}

				if ( ! $Vek3kicoh5l4his->_has_operator($Vwyse0flpyxh))
				{
					$Vwyse0flpyxh .= ' = ';
				}
			}
			elseif ( ! $Vek3kicoh5l4his->_has_operator($Vwyse0flpyxh))
			{
				
				$Vwyse0flpyxh .= ' IS NULL';
			}
			elseif (preg_match('/\s*(!?=|<>|IS(?:\s+NOT)?)\s*$/i', $Vwyse0flpyxh, $V4uvjtwtgjvp, PREG_OFFSET_CAPTURE))
			{
				$Vwyse0flpyxh = substr($Vwyse0flpyxh, 0, $V4uvjtwtgjvp[0][1]).($V4uvjtwtgjvp[1][0] === '=' ? ' IS NULL' : ' IS NOT NULL');
			}

			$Vek3kicoh5l4his->{$V2ssg3ct0cnm}[] = array('condition' => $Vapdd0fqkaxu.$Vwyse0flpyxh.$Vxxtccqydhzn, 'escape' => $Vo3ncbt2kr35);
			if ($Vek3kicoh5l4his->qb_caching === TRUE)
			{
				$Vek3kicoh5l4his->{$Vglobilzfpkw}[] = array('condition' => $Vapdd0fqkaxu.$Vwyse0flpyxh.$Vxxtccqydhzn, 'escape' => $Vo3ncbt2kr35);
				$Vek3kicoh5l4his->qb_cache_exists[] = substr($V2ssg3ct0cnm, 3);
			}

		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function where_in($V2xim30qek4u = NULL, $Va4zo0rltynrues = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_where_in($V2xim30qek4u, $Va4zo0rltynrues, FALSE, 'AND ', $Vo3ncbt2kr35);
	}

	

	
	public function or_where_in($V2xim30qek4u = NULL, $Va4zo0rltynrues = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_where_in($V2xim30qek4u, $Va4zo0rltynrues, FALSE, 'OR ', $Vo3ncbt2kr35);
	}

	

	
	public function where_not_in($V2xim30qek4u = NULL, $Va4zo0rltynrues = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_where_in($V2xim30qek4u, $Va4zo0rltynrues, TRUE, 'AND ', $Vo3ncbt2kr35);
	}

	

	
	public function or_where_not_in($V2xim30qek4u = NULL, $Va4zo0rltynrues = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_where_in($V2xim30qek4u, $Va4zo0rltynrues, TRUE, 'OR ', $Vo3ncbt2kr35);
	}

	

	
	protected function _where_in($V2xim30qek4u = NULL, $Va4zo0rltynrues = NULL, $Vcghg2bfi1c3 = FALSE, $V4wtbblc1wn4 = 'AND ', $Vo3ncbt2kr35 = NULL)
	{
		if ($V2xim30qek4u === NULL OR $Va4zo0rltynrues === NULL)
		{
			return $Vek3kicoh5l4his;
		}

		if ( ! is_array($Va4zo0rltynrues))
		{
			$Va4zo0rltynrues = array($Va4zo0rltynrues);
		}

		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		$Vcghg2bfi1c3 = ($Vcghg2bfi1c3) ? ' NOT' : '';

		if ($Vo3ncbt2kr35 === TRUE)
		{
			$V2yqf2htnt0v = array();
			foreach ($Va4zo0rltynrues as $Va4zo0rltynrue)
			{
				$V2yqf2htnt0v[] = $Vek3kicoh5l4his->escape($Va4zo0rltynrue);
			}
		}
		else
		{
			$V2yqf2htnt0v = array_values($Va4zo0rltynrues);
		}

		$Vapdd0fqkaxu = (count($Vek3kicoh5l4his->qb_where) === 0 && count($Vek3kicoh5l4his->qb_cache_where) === 0)
			? $Vek3kicoh5l4his->_group_get_type('')
			: $Vek3kicoh5l4his->_group_get_type($V4wtbblc1wn4);

		$V2yqf2htnt0v = array(
			'condition' => $Vapdd0fqkaxu.$V2xim30qek4u.$Vcghg2bfi1c3.' IN('.implode(', ', $V2yqf2htnt0v).')',
			'escape' => $Vo3ncbt2kr35
		);

		$Vek3kicoh5l4his->qb_where[] = $V2yqf2htnt0v;
		if ($Vek3kicoh5l4his->qb_caching === TRUE)
		{
			$Vek3kicoh5l4his->qb_cache_where[] = $V2yqf2htnt0v;
			$Vek3kicoh5l4his->qb_cache_exists[] = 'where';
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function like($Vwji4rxkyw5j, $V4uvjtwtgjvp = '', $Vxwayrphrcmu = 'both', $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_like($Vwji4rxkyw5j, $V4uvjtwtgjvp, 'AND ', $Vxwayrphrcmu, '', $Vo3ncbt2kr35);
	}

	

	
	public function not_like($Vwji4rxkyw5j, $V4uvjtwtgjvp = '', $Vxwayrphrcmu = 'both', $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_like($Vwji4rxkyw5j, $V4uvjtwtgjvp, 'AND ', $Vxwayrphrcmu, 'NOT', $Vo3ncbt2kr35);
	}

	

	
	public function or_like($Vwji4rxkyw5j, $V4uvjtwtgjvp = '', $Vxwayrphrcmu = 'both', $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_like($Vwji4rxkyw5j, $V4uvjtwtgjvp, 'OR ', $Vxwayrphrcmu, '', $Vo3ncbt2kr35);
	}

	

	
	public function or_not_like($Vwji4rxkyw5j, $V4uvjtwtgjvp = '', $Vxwayrphrcmu = 'both', $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_like($Vwji4rxkyw5j, $V4uvjtwtgjvp, 'OR ', $Vxwayrphrcmu, 'NOT', $Vo3ncbt2kr35);
	}

	

	
	protected function _like($Vwji4rxkyw5j, $V4uvjtwtgjvp = '', $V4wtbblc1wn4 = 'AND ', $Vxwayrphrcmu = 'both', $Vcghg2bfi1c3 = '', $Vo3ncbt2kr35 = NULL)
	{
		if ( ! is_array($Vwji4rxkyw5j))
		{
			$Vwji4rxkyw5j = array($Vwji4rxkyw5j => $V4uvjtwtgjvp);
		}

		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;
		
		$Vxwayrphrcmu = strtolower($Vxwayrphrcmu);

		foreach ($Vwji4rxkyw5j as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vapdd0fqkaxu = (count($Vek3kicoh5l4his->qb_where) === 0 && count($Vek3kicoh5l4his->qb_cache_where) === 0)
				? $Vek3kicoh5l4his->_group_get_type('') : $Vek3kicoh5l4his->_group_get_type($V4wtbblc1wn4);

			if ($Vo3ncbt2kr35 === TRUE)
			{
				$Vxxtccqydhzn = $Vek3kicoh5l4his->escape_like_str($Vxxtccqydhzn);
			}

			if ($Vxwayrphrcmu === 'none')
			{
				$V50nxrjteybs = "{$Vapdd0fqkaxu} {$Vwyse0flpyxh} {$Vcghg2bfi1c3} LIKE '{$Vxxtccqydhzn}'";
			}
			elseif ($Vxwayrphrcmu === 'before')
			{
				$V50nxrjteybs = "{$Vapdd0fqkaxu} {$Vwyse0flpyxh} {$Vcghg2bfi1c3} LIKE '%{$Vxxtccqydhzn}'";
			}
			elseif ($Vxwayrphrcmu === 'after')
			{
				$V50nxrjteybs = "{$Vapdd0fqkaxu} {$Vwyse0flpyxh} {$Vcghg2bfi1c3} LIKE '{$Vxxtccqydhzn}%'";
			}
			else
			{
				$V50nxrjteybs = "{$Vapdd0fqkaxu} {$Vwyse0flpyxh} {$Vcghg2bfi1c3} LIKE '%{$Vxxtccqydhzn}%'";
			}

			
			if ($Vo3ncbt2kr35 === TRUE && $Vek3kicoh5l4his->_like_escape_str !== '')
			{
				$V50nxrjteybs .= sprintf($Vek3kicoh5l4his->_like_escape_str, $Vek3kicoh5l4his->_like_escape_chr);
			}

			$Vek3kicoh5l4his->qb_where[] = array('condition' => $V50nxrjteybs, 'escape' => $Vo3ncbt2kr35);
			if ($Vek3kicoh5l4his->qb_caching === TRUE)
			{
				$Vek3kicoh5l4his->qb_cache_where[] = array('condition' => $V50nxrjteybs, 'escape' => $Vo3ncbt2kr35);
				$Vek3kicoh5l4his->qb_cache_exists[] = 'where';
			}
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function group_start($Vcghg2bfi1c3 = '', $V4wtbblc1wn4 = 'AND ')
	{
		$V4wtbblc1wn4 = $Vek3kicoh5l4his->_group_get_type($V4wtbblc1wn4);

		$Vek3kicoh5l4his->qb_where_group_started = TRUE;
		$Vapdd0fqkaxu = (count($Vek3kicoh5l4his->qb_where) === 0 && count($Vek3kicoh5l4his->qb_cache_where) === 0) ? '' : $V4wtbblc1wn4;
		$Vutq5hwyqsvw = array(
			'condition' => $Vapdd0fqkaxu.$Vcghg2bfi1c3.str_repeat(' ', ++$Vek3kicoh5l4his->qb_where_group_count).' (',
			'escape' => FALSE
		);

		$Vek3kicoh5l4his->qb_where[] = $Vutq5hwyqsvw;
		if ($Vek3kicoh5l4his->qb_caching)
		{
			$Vek3kicoh5l4his->qb_cache_where[] = $Vutq5hwyqsvw;
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function or_group_start()
	{
		return $Vek3kicoh5l4his->group_start('', 'OR ');
	}

	

	
	public function not_group_start()
	{
		return $Vek3kicoh5l4his->group_start('NOT ', 'AND ');
	}

	

	
	public function or_not_group_start()
	{
		return $Vek3kicoh5l4his->group_start('NOT ', 'OR ');
	}

	

	
	public function group_end()
	{
		$Vek3kicoh5l4his->qb_where_group_started = FALSE;
		$Vutq5hwyqsvw = array(
			'condition' => str_repeat(' ', $Vek3kicoh5l4his->qb_where_group_count--).')',
			'escape' => FALSE
		);

		$Vek3kicoh5l4his->qb_where[] = $Vutq5hwyqsvw;
		if ($Vek3kicoh5l4his->qb_caching)
		{
			$Vek3kicoh5l4his->qb_cache_where[] = $Vutq5hwyqsvw;
		}

		return $Vek3kicoh5l4his;
	}

	

	
	protected function _group_get_type($V4wtbblc1wn4)
	{
		if ($Vek3kicoh5l4his->qb_where_group_started)
		{
			$V4wtbblc1wn4 = '';
			$Vek3kicoh5l4his->qb_where_group_started = FALSE;
		}

		return $V4wtbblc1wn4;
	}

	

	
	public function group_by($V5ns3kckrmbg, $Vo3ncbt2kr35 = NULL)
	{
		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		if (is_string($V5ns3kckrmbg))
		{
			$V5ns3kckrmbg = ($Vo3ncbt2kr35 === TRUE)
				? explode(',', $V5ns3kckrmbg)
				: array($V5ns3kckrmbg);
		}

		foreach ($V5ns3kckrmbg as $Va4zo0rltynr)
		{
			$Va4zo0rltynr = trim($Va4zo0rltynr);

			if ($Va4zo0rltynr !== '')
			{
				$Va4zo0rltynr = array('field' => $Va4zo0rltynr, 'escape' => $Vo3ncbt2kr35);

				$Vek3kicoh5l4his->qb_groupby[] = $Va4zo0rltynr;
				if ($Vek3kicoh5l4his->qb_caching === TRUE)
				{
					$Vek3kicoh5l4his->qb_cache_groupby[] = $Va4zo0rltynr;
					$Vek3kicoh5l4his->qb_cache_exists[] = 'groupby';
				}
			}
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function having($V2xim30qek4u, $Va4zo0rltynrue = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_wh('qb_having', $V2xim30qek4u, $Va4zo0rltynrue, 'AND ', $Vo3ncbt2kr35);
	}

	

	
	public function or_having($V2xim30qek4u, $Va4zo0rltynrue = NULL, $Vo3ncbt2kr35 = NULL)
	{
		return $Vek3kicoh5l4his->_wh('qb_having', $V2xim30qek4u, $Va4zo0rltynrue, 'OR ', $Vo3ncbt2kr35);
	}

	

	
	public function order_by($V4q5sybdhm4l, $Vun3ala4ao2z = '', $Vo3ncbt2kr35 = NULL)
	{
		$Vun3ala4ao2z = strtoupper(trim($Vun3ala4ao2z));

		if ($Vun3ala4ao2z === 'RANDOM')
		{
			$Vun3ala4ao2z = '';

			
			$V4q5sybdhm4l = ctype_digit((string) $V4q5sybdhm4l)
				? sprintf($Vek3kicoh5l4his->_random_keyword[1], $V4q5sybdhm4l)
				: $Vek3kicoh5l4his->_random_keyword[0];
		}
		elseif (empty($V4q5sybdhm4l))
		{
			return $Vek3kicoh5l4his;
		}
		elseif ($Vun3ala4ao2z !== '')
		{
			$Vun3ala4ao2z = in_array($Vun3ala4ao2z, array('ASC', 'DESC'), TRUE) ? ' '.$Vun3ala4ao2z : '';
		}

		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		if ($Vo3ncbt2kr35 === FALSE)
		{
			$Vvswqqvy3squ[] = array('field' => $V4q5sybdhm4l, 'direction' => $Vun3ala4ao2z, 'escape' => FALSE);
		}
		else
		{
			$Vvswqqvy3squ = array();
			foreach (explode(',', $V4q5sybdhm4l) as $Vwji4rxkyw5j)
			{
				$Vvswqqvy3squ[] = ($Vun3ala4ao2z === '' && preg_match('/\s+(ASC|DESC)$/i', rtrim($Vwji4rxkyw5j), $V4uvjtwtgjvp, PREG_OFFSET_CAPTURE))
					? array('field' => ltrim(substr($Vwji4rxkyw5j, 0, $V4uvjtwtgjvp[0][1])), 'direction' => ' '.$V4uvjtwtgjvp[1][0], 'escape' => TRUE)
					: array('field' => trim($Vwji4rxkyw5j), 'direction' => $Vun3ala4ao2z, 'escape' => TRUE);
			}
		}

		$Vek3kicoh5l4his->qb_orderby = array_merge($Vek3kicoh5l4his->qb_orderby, $Vvswqqvy3squ);
		if ($Vek3kicoh5l4his->qb_caching === TRUE)
		{
			$Vek3kicoh5l4his->qb_cache_orderby = array_merge($Vek3kicoh5l4his->qb_cache_orderby, $Vvswqqvy3squ);
			$Vek3kicoh5l4his->qb_cache_exists[] = 'orderby';
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function limit($Va4zo0rltynrue, $Vzawlyjaf5xg = 0)
	{
		is_null($Va4zo0rltynrue) OR $Vek3kicoh5l4his->qb_limit = (int) $Va4zo0rltynrue;
		empty($Vzawlyjaf5xg) OR $Vek3kicoh5l4his->qb_offset = (int) $Vzawlyjaf5xg;

		return $Vek3kicoh5l4his;
	}

	

	
	public function offset($Vzawlyjaf5xg)
	{
		empty($Vzawlyjaf5xg) OR $Vek3kicoh5l4his->qb_offset = (int) $Vzawlyjaf5xg;
		return $Vek3kicoh5l4his;
	}

	

	
	protected function _limit($Vcusg10hsxxg)
	{
		return $Vcusg10hsxxg.' LIMIT '.($Vek3kicoh5l4his->qb_offset ? $Vek3kicoh5l4his->qb_offset.', ' : '').$Vek3kicoh5l4his->qb_limit;
	}

	

	
	public function set($V2xim30qek4u, $Va4zo0rltynrue = '', $Vo3ncbt2kr35 = NULL)
	{
		$V2xim30qek4u = $Vek3kicoh5l4his->_object_to_array($V2xim30qek4u);

		if ( ! is_array($V2xim30qek4u))
		{
			$V2xim30qek4u = array($V2xim30qek4u => $Va4zo0rltynrue);
		}

		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		foreach ($V2xim30qek4u as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vek3kicoh5l4his->qb_set[$Vek3kicoh5l4his->protect_identifiers($Vwyse0flpyxh, FALSE, $Vo3ncbt2kr35)] = ($Vo3ncbt2kr35)
				? $Vek3kicoh5l4his->escape($Vxxtccqydhzn) : $Vxxtccqydhzn;
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function get_compiled_select($Vhyg2tjvah5t = '', $Vnb0ac0fxcgz = TRUE)
	{
		if ($Vhyg2tjvah5t !== '')
		{
			$Vek3kicoh5l4his->_track_aliases($Vhyg2tjvah5t);
			$Vek3kicoh5l4his->from($Vhyg2tjvah5t);
		}

		$Vjsggk5v2fqw = $Vek3kicoh5l4his->_compile_select();

		if ($Vnb0ac0fxcgz === TRUE)
		{
			$Vek3kicoh5l4his->_reset_select();
		}

		return $Vjsggk5v2fqw;
	}

	

	
	public function get($Vhyg2tjvah5t = '', $V2bur4u05u2g = NULL, $Vzawlyjaf5xg = NULL)
	{
		if ($Vhyg2tjvah5t !== '')
		{
			$Vek3kicoh5l4his->_track_aliases($Vhyg2tjvah5t);
			$Vek3kicoh5l4his->from($Vhyg2tjvah5t);
		}

		if ( ! empty($V2bur4u05u2g))
		{
			$Vek3kicoh5l4his->limit($V2bur4u05u2g, $Vzawlyjaf5xg);
		}

		$Voetc43kt2cr = $Vek3kicoh5l4his->query($Vek3kicoh5l4his->_compile_select());
		$Vek3kicoh5l4his->_reset_select();
		return $Voetc43kt2cr;
	}

	

	
	public function count_all_results($Vhyg2tjvah5t = '', $Vnb0ac0fxcgz = TRUE)
	{
		if ($Vhyg2tjvah5t !== '')
		{
			$Vek3kicoh5l4his->_track_aliases($Vhyg2tjvah5t);
			$Vek3kicoh5l4his->from($Vhyg2tjvah5t);
		}

		
		
		
		if ( ! empty($Vek3kicoh5l4his->qb_orderby))
		{
			$V4q5sybdhm4l = $Vek3kicoh5l4his->qb_orderby;
			$Vek3kicoh5l4his->qb_orderby = NULL;
		}

		$Voetc43kt2cr = ($Vek3kicoh5l4his->qb_distinct === TRUE)
			? $Vek3kicoh5l4his->query($Vek3kicoh5l4his->_count_string.$Vek3kicoh5l4his->protect_identifiers('numrows')."\nFROM (\n".$Vek3kicoh5l4his->_compile_select()."\n) CI_count_all_results")
			: $Vek3kicoh5l4his->query($Vek3kicoh5l4his->_compile_select($Vek3kicoh5l4his->_count_string.$Vek3kicoh5l4his->protect_identifiers('numrows')));

		if ($Vnb0ac0fxcgz === TRUE)
		{
			$Vek3kicoh5l4his->_reset_select();
		}
		
		elseif ( ! isset($Vek3kicoh5l4his->qb_orderby))
		{
			$Vek3kicoh5l4his->qb_orderby = $V4q5sybdhm4l;
		}

		if ($Voetc43kt2cr->num_rows() === 0)
		{
			return 0;
		}

		$Vf3jo4nkd2sr = $Voetc43kt2cr->row();
		return (int) $Vf3jo4nkd2sr->numrows;
	}

	

	
	public function get_where($Vhyg2tjvah5t = '', $Vutq5hwyqsvw = NULL, $V2bur4u05u2g = NULL, $Vzawlyjaf5xg = NULL)
	{
		if ($Vhyg2tjvah5t !== '')
		{
			$Vek3kicoh5l4his->from($Vhyg2tjvah5t);
		}

		if ($Vutq5hwyqsvw !== NULL)
		{
			$Vek3kicoh5l4his->where($Vutq5hwyqsvw);
		}

		if ( ! empty($V2bur4u05u2g))
		{
			$Vek3kicoh5l4his->limit($V2bur4u05u2g, $Vzawlyjaf5xg);
		}

		$Voetc43kt2cr = $Vek3kicoh5l4his->query($Vek3kicoh5l4his->_compile_select());
		$Vek3kicoh5l4his->_reset_select();
		return $Voetc43kt2cr;
	}

	

	
	public function insert_batch($Vhyg2tjvah5t, $Vkhqd4bdisjs = NULL, $Vo3ncbt2kr35 = NULL, $V154fw1qfgx0 = 100)
	{
		if ($Vkhqd4bdisjs === NULL)
		{
			if (empty($Vek3kicoh5l4his->qb_set))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_use_set') : FALSE;
			}
		}
		else
		{
			if (empty($Vkhqd4bdisjs))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('insert_batch() called with no data') : FALSE;
			}

			$Vek3kicoh5l4his->set_insert_batch($Vkhqd4bdisjs, '', $Vo3ncbt2kr35);
		}

		if (strlen($Vhyg2tjvah5t) === 0)
		{
			if ( ! isset($Vek3kicoh5l4his->qb_from[0]))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
			}

			$Vhyg2tjvah5t = $Vek3kicoh5l4his->qb_from[0];
		}

		
		$Vpwf2m2sohn4 = 0;
		for ($Vep0df0xosaw = 0, $V2vps4uaencl = count($Vek3kicoh5l4his->qb_set); $Vep0df0xosaw < $V2vps4uaencl; $Vep0df0xosaw += $V154fw1qfgx0)
		{
			$Vek3kicoh5l4his->query($Vek3kicoh5l4his->_insert_batch($Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, $Vo3ncbt2kr35, FALSE), $Vek3kicoh5l4his->qb_keys, array_slice($Vek3kicoh5l4his->qb_set, $Vep0df0xosaw, $V154fw1qfgx0)));
			$Vpwf2m2sohn4 += $Vek3kicoh5l4his->affected_rows();
		}

		$Vek3kicoh5l4his->_reset_write();
		return $Vpwf2m2sohn4;
	}

	

	
	protected function _insert_batch($Vhyg2tjvah5t, $V2xim30qek4us, $Va4zo0rltynrues)
	{
		return 'INSERT INTO '.$Vhyg2tjvah5t.' ('.implode(', ', $V2xim30qek4us).') VALUES '.implode(', ', $Va4zo0rltynrues);
	}

	

	
	public function set_insert_batch($V2xim30qek4u, $Va4zo0rltynrue = '', $Vo3ncbt2kr35 = NULL)
	{
		$V2xim30qek4u = $Vek3kicoh5l4his->_object_to_array_batch($V2xim30qek4u);

		if ( ! is_array($V2xim30qek4u))
		{
			$V2xim30qek4u = array($V2xim30qek4u => $Va4zo0rltynrue);
		}

		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		$V2xim30qek4us = array_keys($Vek3kicoh5l4his->_object_to_array(current($V2xim30qek4u)));
		sort($V2xim30qek4us);

		foreach ($V2xim30qek4u as $Vf3jo4nkd2sr)
		{
			$Vf3jo4nkd2sr = $Vek3kicoh5l4his->_object_to_array($Vf3jo4nkd2sr);
			if (count(array_diff($V2xim30qek4us, array_keys($Vf3jo4nkd2sr))) > 0 OR count(array_diff(array_keys($Vf3jo4nkd2sr), $V2xim30qek4us)) > 0)
			{
				
				$Vek3kicoh5l4his->qb_set[] = array();
				return;
			}

			ksort($Vf3jo4nkd2sr); 

			if ($Vo3ncbt2kr35 !== FALSE)
			{
				$Vn2ycfau434slean = array();
				foreach ($Vf3jo4nkd2sr as $Va4zo0rltynrue)
				{
					$Vn2ycfau434slean[] = $Vek3kicoh5l4his->escape($Va4zo0rltynrue);
				}

				$Vf3jo4nkd2sr = $Vn2ycfau434slean;
			}

			$Vek3kicoh5l4his->qb_set[] = '('.implode(',', $Vf3jo4nkd2sr).')';
		}

		foreach ($V2xim30qek4us as $Vwyse0flpyxh)
		{
			$Vek3kicoh5l4his->qb_keys[] = $Vek3kicoh5l4his->protect_identifiers($Vwyse0flpyxh, FALSE, $Vo3ncbt2kr35);
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function get_compiled_insert($Vhyg2tjvah5t = '', $Vnb0ac0fxcgz = TRUE)
	{
		if ($Vek3kicoh5l4his->_validate_insert($Vhyg2tjvah5t) === FALSE)
		{
			return FALSE;
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_insert(
			$Vek3kicoh5l4his->protect_identifiers(
				$Vek3kicoh5l4his->qb_from[0], TRUE, NULL, FALSE
			),
			array_keys($Vek3kicoh5l4his->qb_set),
			array_values($Vek3kicoh5l4his->qb_set)
		);

		if ($Vnb0ac0fxcgz === TRUE)
		{
			$Vek3kicoh5l4his->_reset_write();
		}

		return $Vcusg10hsxxg;
	}

	

	
	public function insert($Vhyg2tjvah5t = '', $Vkhqd4bdisjs = NULL, $Vo3ncbt2kr35 = NULL)
	{
		if ($Vkhqd4bdisjs !== NULL)
		{
			$Vek3kicoh5l4his->set($Vkhqd4bdisjs, '', $Vo3ncbt2kr35);
		}

		if ($Vek3kicoh5l4his->_validate_insert($Vhyg2tjvah5t) === FALSE)
		{
			return FALSE;
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_insert(
			$Vek3kicoh5l4his->protect_identifiers(
				$Vek3kicoh5l4his->qb_from[0], TRUE, $Vo3ncbt2kr35, FALSE
			),
			array_keys($Vek3kicoh5l4his->qb_set),
			array_values($Vek3kicoh5l4his->qb_set)
		);

		$Vek3kicoh5l4his->_reset_write();
		return $Vek3kicoh5l4his->query($Vcusg10hsxxg);
	}

	

	
	protected function _validate_insert($Vhyg2tjvah5t = '')
	{
		if (count($Vek3kicoh5l4his->qb_set) === 0)
		{
			return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_use_set') : FALSE;
		}

		if ($Vhyg2tjvah5t !== '')
		{
			$Vek3kicoh5l4his->qb_from[0] = $Vhyg2tjvah5t;
		}
		elseif ( ! isset($Vek3kicoh5l4his->qb_from[0]))
		{
			return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
		}

		return TRUE;
	}

	

	
	public function replace($Vhyg2tjvah5t = '', $Vkhqd4bdisjs = NULL)
	{
		if ($Vkhqd4bdisjs !== NULL)
		{
			$Vek3kicoh5l4his->set($Vkhqd4bdisjs);
		}

		if (count($Vek3kicoh5l4his->qb_set) === 0)
		{
			return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_use_set') : FALSE;
		}

		if ($Vhyg2tjvah5t === '')
		{
			if ( ! isset($Vek3kicoh5l4his->qb_from[0]))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
			}

			$Vhyg2tjvah5t = $Vek3kicoh5l4his->qb_from[0];
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_replace($Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE), array_keys($Vek3kicoh5l4his->qb_set), array_values($Vek3kicoh5l4his->qb_set));

		$Vek3kicoh5l4his->_reset_write();
		return $Vek3kicoh5l4his->query($Vcusg10hsxxg);
	}

	

	
	protected function _replace($Vhyg2tjvah5t, $V2xim30qek4us, $Va4zo0rltynrues)
	{
		return 'REPLACE INTO '.$Vhyg2tjvah5t.' ('.implode(', ', $V2xim30qek4us).') VALUES ('.implode(', ', $Va4zo0rltynrues).')';
	}

	

	
	protected function _from_tables()
	{
		return implode(', ', $Vek3kicoh5l4his->qb_from);
	}

	

	
	public function get_compiled_update($Vhyg2tjvah5t = '', $Vnb0ac0fxcgz = TRUE)
	{
		
		$Vek3kicoh5l4his->_merge_cache();

		if ($Vek3kicoh5l4his->_validate_update($Vhyg2tjvah5t) === FALSE)
		{
			return FALSE;
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_update($Vek3kicoh5l4his->qb_from[0], $Vek3kicoh5l4his->qb_set);

		if ($Vnb0ac0fxcgz === TRUE)
		{
			$Vek3kicoh5l4his->_reset_write();
		}

		return $Vcusg10hsxxg;
	}

	

	
	public function update($Vhyg2tjvah5t = '', $Vkhqd4bdisjs = NULL, $Vutq5hwyqsvw = NULL, $V2bur4u05u2g = NULL)
	{
		
		$Vek3kicoh5l4his->_merge_cache();

		if ($Vkhqd4bdisjs !== NULL)
		{
			$Vek3kicoh5l4his->set($Vkhqd4bdisjs);
		}

		if ($Vek3kicoh5l4his->_validate_update($Vhyg2tjvah5t) === FALSE)
		{
			return FALSE;
		}

		if ($Vutq5hwyqsvw !== NULL)
		{
			$Vek3kicoh5l4his->where($Vutq5hwyqsvw);
		}

		if ( ! empty($V2bur4u05u2g))
		{
			$Vek3kicoh5l4his->limit($V2bur4u05u2g);
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_update($Vek3kicoh5l4his->qb_from[0], $Vek3kicoh5l4his->qb_set);
		$Vek3kicoh5l4his->_reset_write();
		return $Vek3kicoh5l4his->query($Vcusg10hsxxg);
	}

	

	
	protected function _validate_update($Vhyg2tjvah5t)
	{
		if (count($Vek3kicoh5l4his->qb_set) === 0)
		{
			return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_use_set') : FALSE;
		}

		if ($Vhyg2tjvah5t !== '')
		{
			$Vek3kicoh5l4his->qb_from = array($Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE));
		}
		elseif ( ! isset($Vek3kicoh5l4his->qb_from[0]))
		{
			return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
		}

		return TRUE;
	}

	

	
	public function update_batch($Vhyg2tjvah5t, $Vkhqd4bdisjs = NULL, $Vep0df0xosawndex = NULL, $V154fw1qfgx0 = 100)
	{
		
		$Vek3kicoh5l4his->_merge_cache();

		if ($Vep0df0xosawndex === NULL)
		{
			return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_use_index') : FALSE;
		}

		if ($Vkhqd4bdisjs === NULL)
		{
			if (empty($Vek3kicoh5l4his->qb_set))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_use_set') : FALSE;
			}
		}
		else
		{
			if (empty($Vkhqd4bdisjs))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('update_batch() called with no data') : FALSE;
			}

			$Vek3kicoh5l4his->set_update_batch($Vkhqd4bdisjs, $Vep0df0xosawndex);
		}

		if (strlen($Vhyg2tjvah5t) === 0)
		{
			if ( ! isset($Vek3kicoh5l4his->qb_from[0]))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
			}

			$Vhyg2tjvah5t = $Vek3kicoh5l4his->qb_from[0];
		}

		
		$Vpwf2m2sohn4 = 0;
		for ($Vep0df0xosaw = 0, $V2vps4uaencl = count($Vek3kicoh5l4his->qb_set); $Vep0df0xosaw < $V2vps4uaencl; $Vep0df0xosaw += $V154fw1qfgx0)
		{
			$Vek3kicoh5l4his->query($Vek3kicoh5l4his->_update_batch($Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE), array_slice($Vek3kicoh5l4his->qb_set, $Vep0df0xosaw, $V154fw1qfgx0), $Vek3kicoh5l4his->protect_identifiers($Vep0df0xosawndex)));
			$Vpwf2m2sohn4 += $Vek3kicoh5l4his->affected_rows();
			$Vek3kicoh5l4his->qb_where = array();
		}

		$Vek3kicoh5l4his->_reset_write();
		return $Vpwf2m2sohn4;
	}

	

	
	protected function _update_batch($Vhyg2tjvah5t, $Va4zo0rltynrues, $Vep0df0xosawndex)
	{
		$Vep0df0xosawds = array();
		foreach ($Va4zo0rltynrues as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Vep0df0xosawds[] = $Va4zo0rltynr[$Vep0df0xosawndex];

			foreach (array_keys($Va4zo0rltynr) as $Vwji4rxkyw5j)
			{
				if ($Vwji4rxkyw5j !== $Vep0df0xosawndex)
				{
					$Vep4ncm02uco[$Vwji4rxkyw5j][] = 'WHEN '.$Vep0df0xosawndex.' = '.$Va4zo0rltynr[$Vep0df0xosawndex].' THEN '.$Va4zo0rltynr[$Vwji4rxkyw5j];
				}
			}
		}

		$Vn2ycfau434sases = '';
		foreach ($Vep4ncm02uco as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vn2ycfau434sases .= $Vwyse0flpyxh." = CASE \n"
				.implode("\n", $Vxxtccqydhzn)."\n"
				.'ELSE '.$Vwyse0flpyxh.' END, ';
		}

		$Vek3kicoh5l4his->where($Vep0df0xosawndex.' IN('.implode(',', $Vep0df0xosawds).')', NULL, FALSE);

		return 'UPDATE '.$Vhyg2tjvah5t.' SET '.substr($Vn2ycfau434sases, 0, -2).$Vek3kicoh5l4his->_compile_wh('qb_where');
	}

	

	
	public function set_update_batch($V2xim30qek4u, $Vep0df0xosawndex = '', $Vo3ncbt2kr35 = NULL)
	{
		$V2xim30qek4u = $Vek3kicoh5l4his->_object_to_array_batch($V2xim30qek4u);

		if ( ! is_array($V2xim30qek4u))
		{
			
		}

		is_bool($Vo3ncbt2kr35) OR $Vo3ncbt2kr35 = $Vek3kicoh5l4his->_protect_identifiers;

		foreach ($V2xim30qek4u as $Vwyse0flpyxh => $Vxxtccqydhzn)
		{
			$Vep0df0xosawndex_set = FALSE;
			$Vn2ycfau434slean = array();
			foreach ($Vxxtccqydhzn as $Vwyse0flpyxh2 => $Vxxtccqydhzn2)
			{
				if ($Vwyse0flpyxh2 === $Vep0df0xosawndex)
				{
					$Vep0df0xosawndex_set = TRUE;
				}

				$Vn2ycfau434slean[$Vek3kicoh5l4his->protect_identifiers($Vwyse0flpyxh2, FALSE, $Vo3ncbt2kr35)] = ($Vo3ncbt2kr35 === FALSE) ? $Vxxtccqydhzn2 : $Vek3kicoh5l4his->escape($Vxxtccqydhzn2);
			}

			if ($Vep0df0xosawndex_set === FALSE)
			{
				return $Vek3kicoh5l4his->display_error('db_batch_missing_index');
			}

			$Vek3kicoh5l4his->qb_set[] = $Vn2ycfau434slean;
		}

		return $Vek3kicoh5l4his;
	}

	

	
	public function empty_table($Vhyg2tjvah5t = '')
	{
		if ($Vhyg2tjvah5t === '')
		{
			if ( ! isset($Vek3kicoh5l4his->qb_from[0]))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
			}

			$Vhyg2tjvah5t = $Vek3kicoh5l4his->qb_from[0];
		}
		else
		{
			$Vhyg2tjvah5t = $Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_delete($Vhyg2tjvah5t);
		$Vek3kicoh5l4his->_reset_write();
		return $Vek3kicoh5l4his->query($Vcusg10hsxxg);
	}

	

	
	public function truncate($Vhyg2tjvah5t = '')
	{
		if ($Vhyg2tjvah5t === '')
		{
			if ( ! isset($Vek3kicoh5l4his->qb_from[0]))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
			}

			$Vhyg2tjvah5t = $Vek3kicoh5l4his->qb_from[0];
		}
		else
		{
			$Vhyg2tjvah5t = $Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_truncate($Vhyg2tjvah5t);
		$Vek3kicoh5l4his->_reset_write();
		return $Vek3kicoh5l4his->query($Vcusg10hsxxg);
	}

	

	
	protected function _truncate($Vhyg2tjvah5t)
	{
		return 'TRUNCATE '.$Vhyg2tjvah5t;
	}

	

	
	public function get_compiled_delete($Vhyg2tjvah5t = '', $Vnb0ac0fxcgz = TRUE)
	{
		$Vek3kicoh5l4his->return_delete_sql = TRUE;
		$Vcusg10hsxxg = $Vek3kicoh5l4his->delete($Vhyg2tjvah5t, '', NULL, $Vnb0ac0fxcgz);
		$Vek3kicoh5l4his->return_delete_sql = FALSE;
		return $Vcusg10hsxxg;
	}

	

	
	public function delete($Vhyg2tjvah5t = '', $Vutq5hwyqsvw = '', $V2bur4u05u2g = NULL, $Vnb0ac0fxcgz_data = TRUE)
	{
		
		$Vek3kicoh5l4his->_merge_cache();

		if ($Vhyg2tjvah5t === '')
		{
			if ( ! isset($Vek3kicoh5l4his->qb_from[0]))
			{
				return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_must_set_table') : FALSE;
			}

			$Vhyg2tjvah5t = $Vek3kicoh5l4his->qb_from[0];
		}
		elseif (is_array($Vhyg2tjvah5t))
		{
			empty($Vutq5hwyqsvw) && $Vnb0ac0fxcgz_data = FALSE;

			foreach ($Vhyg2tjvah5t as $Vkafeomqa3ma)
			{
				$Vek3kicoh5l4his->delete($Vkafeomqa3ma, $Vutq5hwyqsvw, $V2bur4u05u2g, $Vnb0ac0fxcgz_data);
			}

			return;
		}
		else
		{
			$Vhyg2tjvah5t = $Vek3kicoh5l4his->protect_identifiers($Vhyg2tjvah5t, TRUE, NULL, FALSE);
		}

		if ($Vutq5hwyqsvw !== '')
		{
			$Vek3kicoh5l4his->where($Vutq5hwyqsvw);
		}

		if ( ! empty($V2bur4u05u2g))
		{
			$Vek3kicoh5l4his->limit($V2bur4u05u2g);
		}

		if (count($Vek3kicoh5l4his->qb_where) === 0)
		{
			return ($Vek3kicoh5l4his->db_debug) ? $Vek3kicoh5l4his->display_error('db_del_must_use_where') : FALSE;
		}

		$Vcusg10hsxxg = $Vek3kicoh5l4his->_delete($Vhyg2tjvah5t);
		if ($Vnb0ac0fxcgz_data)
		{
			$Vek3kicoh5l4his->_reset_write();
		}

		return ($Vek3kicoh5l4his->return_delete_sql === TRUE) ? $Vcusg10hsxxg : $Vek3kicoh5l4his->query($Vcusg10hsxxg);
	}

	

	
	protected function _delete($Vhyg2tjvah5t)
	{
		return 'DELETE FROM '.$Vhyg2tjvah5t.$Vek3kicoh5l4his->_compile_wh('qb_where')
			.($Vek3kicoh5l4his->qb_limit ? ' LIMIT '.$Vek3kicoh5l4his->qb_limit : '');
	}

	

	
	public function dbprefix($Vhyg2tjvah5t = '')
	{
		if ($Vhyg2tjvah5t === '')
		{
			$Vek3kicoh5l4his->display_error('db_table_name_required');
		}

		return $Vek3kicoh5l4his->dbprefix.$Vhyg2tjvah5t;
	}

	

	
	public function set_dbprefix($Vapdd0fqkaxu = '')
	{
		return $Vek3kicoh5l4his->dbprefix = $Vapdd0fqkaxu;
	}

	

	
	protected function _track_aliases($Vhyg2tjvah5t)
	{
		if (is_array($Vhyg2tjvah5t))
		{
			foreach ($Vhyg2tjvah5t as $Vek3kicoh5l4)
			{
				$Vek3kicoh5l4his->_track_aliases($Vek3kicoh5l4);
			}
			return;
		}

		
		
		if (strpos($Vhyg2tjvah5t, ',') !== FALSE)
		{
			return $Vek3kicoh5l4his->_track_aliases(explode(',', $Vhyg2tjvah5t));
		}

		
		if (strpos($Vhyg2tjvah5t, ' ') !== FALSE)
		{
			
			$Vhyg2tjvah5t = preg_replace('/\s+AS\s+/i', ' ', $Vhyg2tjvah5t);

			
			$Vhyg2tjvah5t = trim(strrchr($Vhyg2tjvah5t, ' '));

			
			if ( ! in_array($Vhyg2tjvah5t, $Vek3kicoh5l4his->qb_aliased_tables))
			{
				$Vek3kicoh5l4his->qb_aliased_tables[] = $Vhyg2tjvah5t;
			}
		}
	}

	

	
	protected function _compile_select($Vjsggk5v2fqw_override = FALSE)
	{
		
		$Vek3kicoh5l4his->_merge_cache();

		
		if ($Vjsggk5v2fqw_override !== FALSE)
		{
			$Vcusg10hsxxg = $Vjsggk5v2fqw_override;
		}
		else
		{
			$Vcusg10hsxxg = ( ! $Vek3kicoh5l4his->qb_distinct) ? 'SELECT ' : 'SELECT DISTINCT ';

			if (count($Vek3kicoh5l4his->qb_select) === 0)
			{
				$Vcusg10hsxxg .= '*';
			}
			else
			{
				
				
				
				foreach ($Vek3kicoh5l4his->qb_select as $V2xim30qek4u => $Va4zo0rltynr)
				{
					$Vqcqqmpuil2x = isset($Vek3kicoh5l4his->qb_no_escape[$V2xim30qek4u]) ? $Vek3kicoh5l4his->qb_no_escape[$V2xim30qek4u] : NULL;
					$Vek3kicoh5l4his->qb_select[$V2xim30qek4u] = $Vek3kicoh5l4his->protect_identifiers($Va4zo0rltynr, FALSE, $Vqcqqmpuil2x);
				}

				$Vcusg10hsxxg .= implode(', ', $Vek3kicoh5l4his->qb_select);
			}
		}

		
		if (count($Vek3kicoh5l4his->qb_from) > 0)
		{
			$Vcusg10hsxxg .= "\nFROM ".$Vek3kicoh5l4his->_from_tables();
		}

		
		if (count($Vek3kicoh5l4his->qb_join) > 0)
		{
			$Vcusg10hsxxg .= "\n".implode("\n", $Vek3kicoh5l4his->qb_join);
		}

		$Vcusg10hsxxg .= $Vek3kicoh5l4his->_compile_wh('qb_where')
			.$Vek3kicoh5l4his->_compile_group_by()
			.$Vek3kicoh5l4his->_compile_wh('qb_having')
			.$Vek3kicoh5l4his->_compile_order_by(); 

		
		if ($Vek3kicoh5l4his->qb_limit)
		{
			return $Vek3kicoh5l4his->_limit($Vcusg10hsxxg."\n");
		}

		return $Vcusg10hsxxg;
	}

	

	
	protected function _compile_wh($V2ssg3ct0cnm)
	{
		if (count($Vek3kicoh5l4his->$V2ssg3ct0cnm) > 0)
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vek3kicoh5l4his->$V2ssg3ct0cnm); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				
				if (is_string($Vek3kicoh5l4his->{$V2ssg3ct0cnm}[$Vep0df0xosaw]))
				{
					continue;
				}
				elseif ($Vek3kicoh5l4his->{$V2ssg3ct0cnm}[$Vep0df0xosaw]['escape'] === FALSE)
				{
					$Vek3kicoh5l4his->{$V2ssg3ct0cnm}[$Vep0df0xosaw] = $Vek3kicoh5l4his->{$V2ssg3ct0cnm}[$Vep0df0xosaw]['condition'];
					continue;
				}

				
				$Vayaf3ucin4titions = preg_split(
					'/((?:^|\s+)AND\s+|(?:^|\s+)OR\s+)/i',
					$Vek3kicoh5l4his->{$V2ssg3ct0cnm}[$Vep0df0xosaw]['condition'],
					-1,
					PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY
				);

				for ($Vn2ycfau434si = 0, $Vn2ycfau434sc = count($Vayaf3ucin4titions); $Vn2ycfau434si < $Vn2ycfau434sc; $Vn2ycfau434si++)
				{
					if (($Vgawsgswxfno = $Vek3kicoh5l4his->_get_operator($Vayaf3ucin4titions[$Vn2ycfau434si])) === FALSE
						OR ! preg_match('/^(\(?)(.*)('.preg_quote($Vgawsgswxfno, '/').')\s*(.*(?<!\)))?(\)?)$/i', $Vayaf3ucin4titions[$Vn2ycfau434si], $V4uvjtwtgjvpes))
					{
						continue;
					}

					
					
					
					
					
					
					
					

					if ( ! empty($V4uvjtwtgjvpes[4]))
					{
						$Vek3kicoh5l4his->_is_literal($V4uvjtwtgjvpes[4]) OR $V4uvjtwtgjvpes[4] = $Vek3kicoh5l4his->protect_identifiers(trim($V4uvjtwtgjvpes[4]));
						$V4uvjtwtgjvpes[4] = ' '.$V4uvjtwtgjvpes[4];
					}

					$Vayaf3ucin4titions[$Vn2ycfau434si] = $V4uvjtwtgjvpes[1].$Vek3kicoh5l4his->protect_identifiers(trim($V4uvjtwtgjvpes[2]))
						.' '.trim($V4uvjtwtgjvpes[3]).$V4uvjtwtgjvpes[4].$V4uvjtwtgjvpes[5];
				}

				$Vek3kicoh5l4his->{$V2ssg3ct0cnm}[$Vep0df0xosaw] = implode('', $Vayaf3ucin4titions);
			}

			return ($V2ssg3ct0cnm === 'qb_having' ? "\nHAVING " : "\nWHERE ")
				.implode("\n", $Vek3kicoh5l4his->$V2ssg3ct0cnm);
		}

		return '';
	}

	

	
	protected function _compile_group_by()
	{
		if (count($Vek3kicoh5l4his->qb_groupby) > 0)
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vek3kicoh5l4his->qb_groupby); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				
				if (is_string($Vek3kicoh5l4his->qb_groupby[$Vep0df0xosaw]))
				{
					continue;
				}

				$Vek3kicoh5l4his->qb_groupby[$Vep0df0xosaw] = ($Vek3kicoh5l4his->qb_groupby[$Vep0df0xosaw]['escape'] === FALSE OR $Vek3kicoh5l4his->_is_literal($Vek3kicoh5l4his->qb_groupby[$Vep0df0xosaw]['field']))
					? $Vek3kicoh5l4his->qb_groupby[$Vep0df0xosaw]['field']
					: $Vek3kicoh5l4his->protect_identifiers($Vek3kicoh5l4his->qb_groupby[$Vep0df0xosaw]['field']);
			}

			return "\nGROUP BY ".implode(', ', $Vek3kicoh5l4his->qb_groupby);
		}

		return '';
	}

	

	
	protected function _compile_order_by()
	{
		if (is_array($Vek3kicoh5l4his->qb_orderby) && count($Vek3kicoh5l4his->qb_orderby) > 0)
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vek3kicoh5l4his->qb_orderby); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				if ($Vek3kicoh5l4his->qb_orderby[$Vep0df0xosaw]['escape'] !== FALSE && ! $Vek3kicoh5l4his->_is_literal($Vek3kicoh5l4his->qb_orderby[$Vep0df0xosaw]['field']))
				{
					$Vek3kicoh5l4his->qb_orderby[$Vep0df0xosaw]['field'] = $Vek3kicoh5l4his->protect_identifiers($Vek3kicoh5l4his->qb_orderby[$Vep0df0xosaw]['field']);
				}

				$Vek3kicoh5l4his->qb_orderby[$Vep0df0xosaw] = $Vek3kicoh5l4his->qb_orderby[$Vep0df0xosaw]['field'].$Vek3kicoh5l4his->qb_orderby[$Vep0df0xosaw]['direction'];
			}

			return $Vek3kicoh5l4his->qb_orderby = "\nORDER BY ".implode(', ', $Vek3kicoh5l4his->qb_orderby);
		}
		elseif (is_string($Vek3kicoh5l4his->qb_orderby))
		{
			return $Vek3kicoh5l4his->qb_orderby;
		}

		return '';
	}

	

	
	protected function _object_to_array($V1v3xsp031u0)
	{
		if ( ! is_object($V1v3xsp031u0))
		{
			return $V1v3xsp031u0;
		}

		$V5adckfdzb1d = array();
		foreach (get_object_vars($V1v3xsp031u0) as $V2xim30qek4u => $Va4zo0rltynr)
		{
			
			if ( ! is_object($Va4zo0rltynr) && ! is_array($Va4zo0rltynr) && $V2xim30qek4u !== '_parent_name')
			{
				$V5adckfdzb1d[$V2xim30qek4u] = $Va4zo0rltynr;
			}
		}

		return $V5adckfdzb1d;
	}

	

	
	protected function _object_to_array_batch($V1v3xsp031u0)
	{
		if ( ! is_object($V1v3xsp031u0))
		{
			return $V1v3xsp031u0;
		}

		$V5adckfdzb1d = array();
		$Vlxaqc0cx0ab = get_object_vars($V1v3xsp031u0);
		$Vwji4rxkyw5js = array_keys($Vlxaqc0cx0ab);

		foreach ($Vwji4rxkyw5js as $Va4zo0rltynr)
		{
			
			if ($Va4zo0rltynr !== '_parent_name')
			{
				$Vep0df0xosaw = 0;
				foreach ($Vlxaqc0cx0ab[$Va4zo0rltynr] as $Vfeinw1hsfej)
				{
					$V5adckfdzb1d[$Vep0df0xosaw++][$Va4zo0rltynr] = $Vfeinw1hsfej;
				}
			}
		}

		return $V5adckfdzb1d;
	}

	

	
	public function start_cache()
	{
		$Vek3kicoh5l4his->qb_caching = TRUE;
		return $Vek3kicoh5l4his;
	}

	

	
	public function stop_cache()
	{
		$Vek3kicoh5l4his->qb_caching = FALSE;
		return $Vek3kicoh5l4his;
	}

	

	
	public function flush_cache()
	{
		$Vek3kicoh5l4his->_reset_run(array(
			'qb_cache_select'		=> array(),
			'qb_cache_from'			=> array(),
			'qb_cache_join'			=> array(),
			'qb_cache_where'		=> array(),
			'qb_cache_groupby'		=> array(),
			'qb_cache_having'		=> array(),
			'qb_cache_orderby'		=> array(),
			'qb_cache_set'			=> array(),
			'qb_cache_exists'		=> array(),
			'qb_cache_no_escape'	=> array()
		));

		return $Vek3kicoh5l4his;
	}

	

	
	protected function _merge_cache()
	{
		if (count($Vek3kicoh5l4his->qb_cache_exists) === 0)
		{
			return;
		}
		elseif (in_array('select', $Vek3kicoh5l4his->qb_cache_exists, TRUE))
		{
			$Vcmghpfg1spq = $Vek3kicoh5l4his->qb_cache_no_escape;
		}

		foreach (array_unique($Vek3kicoh5l4his->qb_cache_exists) as $Va4zo0rltynr) 
		{
			$V5ql2unoo1gx	= 'qb_'.$Va4zo0rltynr;
			$V4re4b2dcgaq	= 'qb_cache_'.$Va4zo0rltynr;
			$Vdwi0sctzzoa 	= $Vek3kicoh5l4his->$V4re4b2dcgaq;

			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vek3kicoh5l4his->$V5ql2unoo1gx); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				if ( ! in_array($Vek3kicoh5l4his->{$V5ql2unoo1gx}[$Vep0df0xosaw], $Vdwi0sctzzoa, TRUE))
				{
					$Vdwi0sctzzoa[] = $Vek3kicoh5l4his->{$V5ql2unoo1gx}[$Vep0df0xosaw];
					if ($Va4zo0rltynr === 'select')
					{
						$Vcmghpfg1spq[] = $Vek3kicoh5l4his->qb_no_escape[$Vep0df0xosaw];
					}
				}
			}

			$Vek3kicoh5l4his->$V5ql2unoo1gx = $Vdwi0sctzzoa;
			if ($Va4zo0rltynr === 'select')
			{
				$Vek3kicoh5l4his->qb_no_escape = $Vcmghpfg1spq;
			}
		}

		
		
		if ($Vek3kicoh5l4his->_protect_identifiers === TRUE && count($Vek3kicoh5l4his->qb_cache_from) > 0)
		{
			$Vek3kicoh5l4his->_track_aliases($Vek3kicoh5l4his->qb_from);
		}
	}

	

	
	protected function _is_literal($Vssdjb5oqaky)
	{
		$Vssdjb5oqaky = trim($Vssdjb5oqaky);

		if (empty($Vssdjb5oqaky) OR ctype_digit($Vssdjb5oqaky) OR (string) (float) $Vssdjb5oqaky === $Vssdjb5oqaky OR in_array(strtoupper($Vssdjb5oqaky), array('TRUE', 'FALSE'), TRUE))
		{
			return TRUE;
		}

		static $V3l45m0wx1vy;

		if (empty($V3l45m0wx1vy))
		{
			$V3l45m0wx1vy = ($Vek3kicoh5l4his->_escape_char !== '"')
				? array('"', "'") : array("'");
		}

		return in_array($Vssdjb5oqaky[0], $V3l45m0wx1vy, TRUE);
	}

	

	
	public function reset_query()
	{
		$Vek3kicoh5l4his->_reset_select();
		$Vek3kicoh5l4his->_reset_write();
		return $Vek3kicoh5l4his;
	}

	

	
	protected function _reset_run($Vblrcugky1nx)
	{
		foreach ($Vblrcugky1nx as $Vutaiebycwbq => $Vskrzvyp3u0c)
		{
			$Vek3kicoh5l4his->$Vutaiebycwbq = $Vskrzvyp3u0c;
		}
	}

	

	
	protected function _reset_select()
	{
		$Vek3kicoh5l4his->_reset_run(array(
			'qb_select'		=> array(),
			'qb_from'		=> array(),
			'qb_join'		=> array(),
			'qb_where'		=> array(),
			'qb_groupby'		=> array(),
			'qb_having'		=> array(),
			'qb_orderby'		=> array(),
			'qb_aliased_tables'	=> array(),
			'qb_no_escape'		=> array(),
			'qb_distinct'		=> FALSE,
			'qb_limit'		=> FALSE,
			'qb_offset'		=> FALSE
		));
	}

	

	
	protected function _reset_write()
	{
		$Vek3kicoh5l4his->_reset_run(array(
			'qb_set'	=> array(),
			'qb_from'	=> array(),
			'qb_join'	=> array(),
			'qb_where'	=> array(),
			'qb_orderby'	=> array(),
			'qb_keys'	=> array(),
			'qb_limit'	=> FALSE
		));
	}

}
