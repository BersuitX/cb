<?php

defined('BASEPATH') OR exit('No direct script access allowed');





if ( ! function_exists('now'))
{
	
	function now($Vvwslmtkbaql = NULL)
	{
		if (empty($Vvwslmtkbaql))
		{
			$Vvwslmtkbaql = config_item('time_reference');
		}

		if ($Vvwslmtkbaql === 'local' OR $Vvwslmtkbaql === date_default_timezone_get())
		{
			return time();
		}

		$Vsuvcvyfbhu0 = new DateTime('now', new DateTimeZone($Vvwslmtkbaql));
		sscanf($Vsuvcvyfbhu0->format('j-n-Y G:i:s'), '%d-%d-%d %d:%d:%d', $Voxw5rayrjck, $Vxdtkja5t2tf, $Vpbowwbjrkfv, $Vtjdvpmandtt, $Vfndyi0zwe0c, $Vxrtv1kocolz);

		return mktime($Vtjdvpmandtt, $Vfndyi0zwe0c, $Vxrtv1kocolz, $Vxdtkja5t2tf, $Voxw5rayrjck, $Vpbowwbjrkfv);
	}
}



if ( ! function_exists('mdate'))
{
	
	function mdate($Varbe5i2dgnv = '', $Vzfk1zisr4jl = '')
	{
		if ($Varbe5i2dgnv === '')
		{
			return '';
		}
		elseif (empty($Vzfk1zisr4jl))
		{
			$Vzfk1zisr4jl = now();
		}

		$Varbe5i2dgnv = str_replace(
			'%\\',
			'',
			preg_replace('/([a-z]+?){1}/i', '\\\\\\1', $Varbe5i2dgnv)
		);

		return date($Varbe5i2dgnv, $Vzfk1zisr4jl);
	}
}



if ( ! function_exists('standard_date'))
{
	
	function standard_date($Vy1btgni5uyd = 'DATE_RFC822', $Vzfk1zisr4jl = NULL)
	{
		if (empty($Vzfk1zisr4jl))
		{
			$Vzfk1zisr4jl = now();
		}

		
		if (strpos($Vy1btgni5uyd, 'DATE_') !== 0 OR defined($Vy1btgni5uyd) === FALSE)
		{
			return FALSE;
		}

		return date(constant($Vy1btgni5uyd), $Vzfk1zisr4jl);
	}
}



if ( ! function_exists('timespan'))
{
	
	function timespan($Vxrtv1kocolzs = 1, $Vzfk1zisr4jl = '', $Vgxubyyx5n2g = 7)
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->lang->load('date');

		is_numeric($Vxrtv1kocolzs) OR $Vxrtv1kocolzs = 1;
		is_numeric($Vzfk1zisr4jl) OR $Vzfk1zisr4jl = time();
		is_numeric($Vgxubyyx5n2g) OR $Vgxubyyx5n2g = 7;

		$Vxrtv1kocolzs = ($Vzfk1zisr4jl <= $Vxrtv1kocolzs) ? 1 : $Vzfk1zisr4jl - $Vxrtv1kocolzs;

		$Vssdjb5oqaky = array();
		$Vpbowwbjrkfvs = floor($Vxrtv1kocolzs / 31557600);

		if ($Vpbowwbjrkfvs > 0)
		{
			$Vssdjb5oqaky[] = $Vpbowwbjrkfvs.' '.$Vgw3d0qe3dgd->lang->line($Vpbowwbjrkfvs > 1 ? 'date_years' : 'date_year');
		}

		$Vxrtv1kocolzs -= $Vpbowwbjrkfvs * 31557600;
		$Vxdtkja5t2tfs = floor($Vxrtv1kocolzs / 2629743);

		if (count($Vssdjb5oqaky) < $Vgxubyyx5n2g && ($Vpbowwbjrkfvs > 0 OR $Vxdtkja5t2tfs > 0))
		{
			if ($Vxdtkja5t2tfs > 0)
			{
				$Vssdjb5oqaky[] = $Vxdtkja5t2tfs.' '.$Vgw3d0qe3dgd->lang->line($Vxdtkja5t2tfs > 1 ? 'date_months' : 'date_month');
			}

			$Vxrtv1kocolzs -= $Vxdtkja5t2tfs * 2629743;
		}

		$Vubs0ikjctsa = floor($Vxrtv1kocolzs / 604800);

		if (count($Vssdjb5oqaky) < $Vgxubyyx5n2g && ($Vpbowwbjrkfvs > 0 OR $Vxdtkja5t2tfs > 0 OR $Vubs0ikjctsa > 0))
		{
			if ($Vubs0ikjctsa > 0)
			{
				$Vssdjb5oqaky[] = $Vubs0ikjctsa.' '.$Vgw3d0qe3dgd->lang->line($Vubs0ikjctsa > 1 ? 'date_weeks' : 'date_week');
			}

			$Vxrtv1kocolzs -= $Vubs0ikjctsa * 604800;
		}

		$Voxw5rayrjcks = floor($Vxrtv1kocolzs / 86400);

		if (count($Vssdjb5oqaky) < $Vgxubyyx5n2g && ($Vxdtkja5t2tfs > 0 OR $Vubs0ikjctsa > 0 OR $Voxw5rayrjcks > 0))
		{
			if ($Voxw5rayrjcks > 0)
			{
				$Vssdjb5oqaky[] = $Voxw5rayrjcks.' '.$Vgw3d0qe3dgd->lang->line($Voxw5rayrjcks > 1 ? 'date_days' : 'date_day');
			}

			$Vxrtv1kocolzs -= $Voxw5rayrjcks * 86400;
		}

		$Vtjdvpmandtts = floor($Vxrtv1kocolzs / 3600);

		if (count($Vssdjb5oqaky) < $Vgxubyyx5n2g && ($Voxw5rayrjcks > 0 OR $Vtjdvpmandtts > 0))
		{
			if ($Vtjdvpmandtts > 0)
			{
				$Vssdjb5oqaky[] = $Vtjdvpmandtts.' '.$Vgw3d0qe3dgd->lang->line($Vtjdvpmandtts > 1 ? 'date_hours' : 'date_hour');
			}

			$Vxrtv1kocolzs -= $Vtjdvpmandtts * 3600;
		}

		$Vfndyi0zwe0cs = floor($Vxrtv1kocolzs / 60);

		if (count($Vssdjb5oqaky) < $Vgxubyyx5n2g && ($Voxw5rayrjcks > 0 OR $Vtjdvpmandtts > 0 OR $Vfndyi0zwe0cs > 0))
		{
			if ($Vfndyi0zwe0cs > 0)
			{
				$Vssdjb5oqaky[] = $Vfndyi0zwe0cs.' '.$Vgw3d0qe3dgd->lang->line($Vfndyi0zwe0cs > 1 ? 'date_minutes' : 'date_minute');
			}

			$Vxrtv1kocolzs -= $Vfndyi0zwe0cs * 60;
		}

		if (count($Vssdjb5oqaky) === 0)
		{
			$Vssdjb5oqaky[] = $Vxrtv1kocolzs.' '.$Vgw3d0qe3dgd->lang->line($Vxrtv1kocolzs > 1 ? 'date_seconds' : 'date_second');
		}

		return implode(', ', $Vssdjb5oqaky);
	}
}



if ( ! function_exists('days_in_month'))
{
	
	function days_in_month($Vxdtkja5t2tf = 0, $Vpbowwbjrkfv = '')
	{
		if ($Vxdtkja5t2tf < 1 OR $Vxdtkja5t2tf > 12)
		{
			return 0;
		}
		elseif ( ! is_numeric($Vpbowwbjrkfv) OR strlen($Vpbowwbjrkfv) !== 4)
		{
			$Vpbowwbjrkfv = date('Y');
		}

		if (defined('CAL_GREGORIAN'))
		{
			return cal_days_in_month(CAL_GREGORIAN, $Vxdtkja5t2tf, $Vpbowwbjrkfv);
		}

		if ($Vpbowwbjrkfv >= 1970)
		{
			return (int) date('t', mktime(12, 0, 0, $Vxdtkja5t2tf, 1, $Vpbowwbjrkfv));
		}

		if ($Vxdtkja5t2tf == 2)
		{
			if ($Vpbowwbjrkfv % 400 === 0 OR ($Vpbowwbjrkfv % 4 === 0 && $Vpbowwbjrkfv % 100 !== 0))
			{
				return 29;
			}
		}

		$Voxw5rayrjcks_in_month	= array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
		return $Voxw5rayrjcks_in_month[$Vxdtkja5t2tf - 1];
	}
}



if ( ! function_exists('local_to_gmt'))
{
	
	function local_to_gmt($Vzfk1zisr4jl = '')
	{
		if ($Vzfk1zisr4jl === '')
		{
			$Vzfk1zisr4jl = time();
		}

		return mktime(
			gmdate('G', $Vzfk1zisr4jl),
			gmdate('i', $Vzfk1zisr4jl),
			gmdate('s', $Vzfk1zisr4jl),
			gmdate('n', $Vzfk1zisr4jl),
			gmdate('j', $Vzfk1zisr4jl),
			gmdate('Y', $Vzfk1zisr4jl)
		);
	}
}



if ( ! function_exists('gmt_to_local'))
{
	
	function gmt_to_local($Vzfk1zisr4jl = '', $Vvwslmtkbaql = 'UTC', $V55rx2rcrk0o = FALSE)
	{
		if ($Vzfk1zisr4jl === '')
		{
			return now();
		}

		$Vzfk1zisr4jl += timezones($Vvwslmtkbaql) * 3600;

		return ($V55rx2rcrk0o === TRUE) ? $Vzfk1zisr4jl + 3600 : $Vzfk1zisr4jl;
	}
}



if ( ! function_exists('mysql_to_unix'))
{
	
	function mysql_to_unix($Vzfk1zisr4jl = '')
	{
		
		
		

		$Vzfk1zisr4jl = str_replace(array('-', ':', ' '), '', $Vzfk1zisr4jl);

		
		return mktime(
			substr($Vzfk1zisr4jl, 8, 2),
			substr($Vzfk1zisr4jl, 10, 2),
			substr($Vzfk1zisr4jl, 12, 2),
			substr($Vzfk1zisr4jl, 4, 2),
			substr($Vzfk1zisr4jl, 6, 2),
			substr($Vzfk1zisr4jl, 0, 4)
		);
	}
}



if ( ! function_exists('unix_to_human'))
{
	
	function unix_to_human($Vzfk1zisr4jl = '', $Vxrtv1kocolzs = FALSE, $Vy1btgni5uyd = 'us')
	{
		$Vyotgbgs03ci = date('Y', $Vzfk1zisr4jl).'-'.date('m', $Vzfk1zisr4jl).'-'.date('d', $Vzfk1zisr4jl).' ';

		if ($Vy1btgni5uyd === 'us')
		{
			$Vyotgbgs03ci .= date('h', $Vzfk1zisr4jl).':'.date('i', $Vzfk1zisr4jl);
		}
		else
		{
			$Vyotgbgs03ci .= date('H', $Vzfk1zisr4jl).':'.date('i', $Vzfk1zisr4jl);
		}

		if ($Vxrtv1kocolzs)
		{
			$Vyotgbgs03ci .= ':'.date('s', $Vzfk1zisr4jl);
		}

		if ($Vy1btgni5uyd === 'us')
		{
			return $Vyotgbgs03ci.' '.date('A', $Vzfk1zisr4jl);
		}

		return $Vyotgbgs03ci;
	}
}



if ( ! function_exists('human_to_unix'))
{
	
	function human_to_unix($Varbe5i2dgnv = '')
	{
		if ($Varbe5i2dgnv === '')
		{
			return FALSE;
		}

		$Varbe5i2dgnv = preg_replace('/\040+/', ' ', trim($Varbe5i2dgnv));

		if ( ! preg_match('/^(\d{2}|\d{4})\-[0-9]{1,2}\-[0-9]{1,2}\s[0-9]{1,2}:[0-9]{1,2}(?::[0-9]{1,2})?(?:\s[AP]M)?$/i', $Varbe5i2dgnv))
		{
			return FALSE;
		}

		sscanf($Varbe5i2dgnv, '%d-%d-%d %s %s', $Vpbowwbjrkfv, $Vxdtkja5t2tf, $Voxw5rayrjck, $Vzfk1zisr4jl, $Vym3bcatd5a5);
		sscanf($Vzfk1zisr4jl, '%d:%d:%d', $Vtjdvpmandtt, $Vs22d354gql3, $Vspi1bqfrhmf);
		isset($Vspi1bqfrhmf) OR $Vspi1bqfrhmf = 0;

		if (isset($Vym3bcatd5a5))
		{
			$Vym3bcatd5a5 = strtolower($Vym3bcatd5a5);

			if ($Vym3bcatd5a5[0] === 'p' && $Vtjdvpmandtt < 12)
			{
				$Vtjdvpmandtt += 12;
			}
			elseif ($Vym3bcatd5a5[0] === 'a' && $Vtjdvpmandtt === 12)
			{
				$Vtjdvpmandtt = 0;
			}
		}

		return mktime($Vtjdvpmandtt, $Vs22d354gql3, $Vspi1bqfrhmf, $Vxdtkja5t2tf, $Voxw5rayrjck, $Vpbowwbjrkfv);
	}
}



if ( ! function_exists('nice_date'))
{
	
	function nice_date($V0nvk2umffaf = '', $V2st5jsptpir = FALSE)
	{
		if (empty($V0nvk2umffaf))
		{
			return 'Unknown';
		}
		elseif (empty($V2st5jsptpir))
		{
			$V2st5jsptpir = 'U';
		}

		
		if (preg_match('/^\d{6}$/i', $V0nvk2umffaf))
		{
			if (in_array(substr($V0nvk2umffaf, 0, 2), array('19', '20')))
			{
				$Vpbowwbjrkfv  = substr($V0nvk2umffaf, 0, 4);
				$Vxdtkja5t2tf = substr($V0nvk2umffaf, 4, 2);
			}
			else
			{
				$Vxdtkja5t2tf  = substr($V0nvk2umffaf, 0, 2);
				$Vpbowwbjrkfv   = substr($V0nvk2umffaf, 2, 4);
			}

			return date($V2st5jsptpir, strtotime($Vpbowwbjrkfv.'-'.$Vxdtkja5t2tf.'-01'));
		}

		
		if (preg_match('/^(\d{2})\d{2}(\d{4})$/i', $V0nvk2umffaf, $Vmbknpbfqa1s))
		{
			return date($V2st5jsptpir, strtotime($Vmbknpbfqa1s[1].'/01/'.$Vmbknpbfqa1s[2]));
		}

		
		if (preg_match('/^(\d{1,2})-(\d{1,2})-(\d{4})$/i', $V0nvk2umffaf, $Vmbknpbfqa1s))
		{
			return date($V2st5jsptpir, strtotime($Vmbknpbfqa1s[3].'-'.$Vmbknpbfqa1s[1].'-'.$Vmbknpbfqa1s[2]));
		}

		
		
		
		if (date('U', strtotime($V0nvk2umffaf)) === '0')
		{
			return 'Invalid Date';
		}

		
		return date($V2st5jsptpir, strtotime($V0nvk2umffaf));
	}
}



if ( ! function_exists('timezone_menu'))
{
	
	function timezone_menu($Vexts11gu2nb = 'UTC', $Va3nq5n3hqmx = '', $Vaclaigdbtoo = 'timezones', $Vpkjdumwo4xn = '')
	{
		$Vgw3d0qe3dgd =& get_instance();
		$Vgw3d0qe3dgd->lang->load('date');

		$Vexts11gu2nb = ($Vexts11gu2nb === 'GMT') ? 'UTC' : $Vexts11gu2nb;

		$Vq1szs1wn52y = '<select name="'.$Vaclaigdbtoo.'"';

		if ($Va3nq5n3hqmx !== '')
		{
			$Vq1szs1wn52y .= ' class="'.$Va3nq5n3hqmx.'"';
		}

		$Vq1szs1wn52y .= _stringify_attributes($Vpkjdumwo4xn).">\n";

		foreach (timezones() as $V2xim30qek4u => $Va4zo0rltynr)
		{
			$Volwuqtzdbnp = ($Vexts11gu2nb === $V2xim30qek4u) ? ' selected="selected"' : '';
			$Vq1szs1wn52y .= '<option value="'.$V2xim30qek4u.'"'.$Volwuqtzdbnp.'>'.$Vgw3d0qe3dgd->lang->line($V2xim30qek4u)."</option>\n";
		}

		return $Vq1szs1wn52y.'</select>';
	}
}



if ( ! function_exists('timezones'))
{
	
	function timezones($Vj0vuk1bdpeq = '')
	{
		
		

		$Vj2thrcxkkad = array(
			'UM12'		=> -12,
			'UM11'		=> -11,
			'UM10'		=> -10,
			'UM95'		=> -9.5,
			'UM9'		=> -9,
			'UM8'		=> -8,
			'UM7'		=> -7,
			'UM6'		=> -6,
			'UM5'		=> -5,
			'UM45'		=> -4.5,
			'UM4'		=> -4,
			'UM35'		=> -3.5,
			'UM3'		=> -3,
			'UM2'		=> -2,
			'UM1'		=> -1,
			'UTC'		=> 0,
			'UP1'		=> +1,
			'UP2'		=> +2,
			'UP3'		=> +3,
			'UP35'		=> +3.5,
			'UP4'		=> +4,
			'UP45'		=> +4.5,
			'UP5'		=> +5,
			'UP55'		=> +5.5,
			'UP575'		=> +5.75,
			'UP6'		=> +6,
			'UP65'		=> +6.5,
			'UP7'		=> +7,
			'UP8'		=> +8,
			'UP875'		=> +8.75,
			'UP9'		=> +9,
			'UP95'		=> +9.5,
			'UP10'		=> +10,
			'UP105'		=> +10.5,
			'UP11'		=> +11,
			'UP115'		=> +11.5,
			'UP12'		=> +12,
			'UP1275'	=> +12.75,
			'UP13'		=> +13,
			'UP14'		=> +14
		);

		if ($Vj0vuk1bdpeq === '')
		{
			return $Vj2thrcxkkad;
		}

		return isset($Vj2thrcxkkad[$Vj0vuk1bdpeq]) ? $Vj2thrcxkkad[$Vj0vuk1bdpeq] : 0;
	}
}



if ( ! function_exists('date_range'))
{
	
	function date_range($Vgdziwzj0uoa = '', $Vevb4mqitstu = '', $Vext0dq02jtl = TRUE, $V2st5jsptpir = 'Y-m-d')
	{
		if ($Vgdziwzj0uoa == '' OR $Vevb4mqitstu == '' OR $V2st5jsptpir == '')
		{
			return FALSE;
		}

		$Vext0dq02jtl = ! ( ! $Vext0dq02jtl OR $Vext0dq02jtl === 'days');

		
		if ( ( ! ctype_digit((string) $Vgdziwzj0uoa) && ($Vgdziwzj0uoa = @strtotime($Vgdziwzj0uoa)) === FALSE)
			OR ( ! ctype_digit((string) $Vevb4mqitstu) && ($Vext0dq02jtl === FALSE OR ($Vevb4mqitstu = @strtotime($Vevb4mqitstu)) === FALSE))
			OR ($Vext0dq02jtl === TRUE && $Vevb4mqitstu < $Vgdziwzj0uoa))
		{
			return FALSE;
		}

		if ($Vext0dq02jtl && ($Vgdziwzj0uoa == $Vevb4mqitstu OR date($V2st5jsptpir, $Vgdziwzj0uoa) === date($V2st5jsptpir, $Vevb4mqitstu)))
		{
			return array(date($V2st5jsptpir, $Vgdziwzj0uoa));
		}

		$Vyotgbgs03ciange = array();

		
		$Vjpucafbphra = new DateTime();

		if (is_php('5.3'))
		{
			$Vjpucafbphra->setTimestamp($Vgdziwzj0uoa);
			if ($Vext0dq02jtl)
			{
				$Ve1coo2vcs1p = new DateTime();
				$Ve1coo2vcs1p->setTimestamp($Vevb4mqitstu);
			}
			else
			{
				$Ve1coo2vcs1p = (int) $Vevb4mqitstu;
			}

			$V5q1jdd5cv3o = new DatePeriod($Vjpucafbphra, new DateInterval('P1D'), $Ve1coo2vcs1p);
			foreach ($V5q1jdd5cv3o as $V3ti2nsbfgt2)
			{
				$Vyotgbgs03ciange[] = $V3ti2nsbfgt2->format($V2st5jsptpir);
			}

			
			if ( ! is_int($Ve1coo2vcs1p) && $Vyotgbgs03ciange[count($Vyotgbgs03ciange) - 1] !== $Ve1coo2vcs1p->format($V2st5jsptpir))
			{
				$Vyotgbgs03ciange[] = $Ve1coo2vcs1p->format($V2st5jsptpir);
			}

			return $Vyotgbgs03ciange;
		}

		$Vjpucafbphra->setDate(date('Y', $Vgdziwzj0uoa), date('n', $Vgdziwzj0uoa), date('j', $Vgdziwzj0uoa));
		$Vjpucafbphra->setTime(date('G', $Vgdziwzj0uoa), date('i', $Vgdziwzj0uoa), date('s', $Vgdziwzj0uoa));
		if ($Vext0dq02jtl)
		{
			$Ve1coo2vcs1p = new DateTime();
			$Ve1coo2vcs1p->setDate(date('Y', $Vevb4mqitstu), date('n', $Vevb4mqitstu), date('j', $Vevb4mqitstu));
			$Ve1coo2vcs1p->setTime(date('G', $Vevb4mqitstu), date('i', $Vevb4mqitstu), date('s', $Vevb4mqitstu));
		}
		else
		{
			$Ve1coo2vcs1p = (int) $Vevb4mqitstu;
		}
		$Vyotgbgs03ciange[] = $Vjpucafbphra->format($V2st5jsptpir);

		if (is_int($Ve1coo2vcs1p)) 
		{
			do
			{
				$Vjpucafbphra->modify('+1 day');
				$Vyotgbgs03ciange[] = $Vjpucafbphra->format($V2st5jsptpir);
			}
			while (--$Ve1coo2vcs1p > 0);
		}
		else 
		{
			for ($Vjpucafbphra->modify('+1 day'), $V0nqgepv2f3d = $Ve1coo2vcs1p->format('Ymd'); $Vjpucafbphra->format('Ymd') < $V0nqgepv2f3d; $Vjpucafbphra->modify('+1 day'))
			{
				$Vyotgbgs03ciange[] = $Vjpucafbphra->format($V2st5jsptpir);
			}

			
			$Vyotgbgs03ciange[] = $Ve1coo2vcs1p->format($V2st5jsptpir);
		}

		return $Vyotgbgs03ciange;
	}
}
