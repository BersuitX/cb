<?php

defined('BASEPATH') OR exit('No direct script access allowed');

if ( ! function_exists('xml_parser_create'))
{
	show_error('Your PHP installation does not support XML');
}




class CI_Xmlrpc {

	
	public $Vfxdussqn32e		= FALSE;

	
	public $Vjaxld1rfiwc	= 'i4';

	
	public $Vpp52wwilrkq	= 'int';

	
	public $Vdf5mkwjnlbo	= 'boolean';

	
	public $Vpogiirwtk44	= 'double';

	
	public $Vyxuakqhmv5r	= 'string';

	
	public $V1cdaku21h55	= 'dateTime.iso8601';

	
	public $Vb45l0gztkre	= 'base64';

	
	public $Vqwyneenma33	= 'array';

	
	public $V0if3r1t41rf	= 'struct';

	
	public $Vb1hjtp5xqda	= array();

	
	public $Vjsdwuwqm42g	= array();

	
	public $Vfx00buy4sbv		= array();

	
	public $Va5vsqroyrzm		= array();

	
	public $V1fhamn1qogg	= 'UTF-8';

	
	public $Vgebag0btu3s		= 'XML-RPC for CodeIgniter';

	
	public $Vnwdgw2g1caa		= '1.1';

	
	public $Vfx00buy4sbvuser		= 800;

	
	public $Vfx00buy4sbvxml		= 100;

	
	public $Vmxnmorajp54	= '';

	
	public $Vk2biegccuf4;

	
	public $V5dsbozs5xhq;

	
	public $Vfeinw1hsfej;

	
	public $V15xvmvzbb0h			= '';

	
	public $Veqekzxyjyqy			= '';

	
	public $Voetc43kt2cr;

	
	public $Vpa2qbhtxuyd		= array(); 

	
	public $Vgzlesc0sebt		= TRUE;

	

	
	public function __construct($Vnmcm15juye5 = array())
	{
		$Vek3kicoh5l4his->xmlrpc_backslash = chr(92).chr(92);

		
		$Vek3kicoh5l4his->xmlrpcTypes = array(
			$Vek3kicoh5l4his->xmlrpcI4	 		=> '1',
			$Vek3kicoh5l4his->xmlrpcInt		=> '1',
			$Vek3kicoh5l4his->xmlrpcBoolean	=> '1',
			$Vek3kicoh5l4his->xmlrpcString		=> '1',
			$Vek3kicoh5l4his->xmlrpcDouble		=> '1',
			$Vek3kicoh5l4his->xmlrpcDateTime	=> '1',
			$Vek3kicoh5l4his->xmlrpcBase64		=> '1',
			$Vek3kicoh5l4his->xmlrpcArray		=> '2',
			$Vek3kicoh5l4his->xmlrpcStruct		=> '3'
		);

		
		$Vek3kicoh5l4his->valid_parents = array('BOOLEAN' => array('VALUE'),
			'I4'				=> array('VALUE'),
			'INT'				=> array('VALUE'),
			'STRING'			=> array('VALUE'),
			'DOUBLE'			=> array('VALUE'),
			'DATETIME.ISO8601'	=> array('VALUE'),
			'BASE64'			=> array('VALUE'),
			'ARRAY'			=> array('VALUE'),
			'STRUCT'			=> array('VALUE'),
			'PARAM'			=> array('PARAMS'),
			'METHODNAME'		=> array('METHODCALL'),
			'PARAMS'			=> array('METHODCALL', 'METHODRESPONSE'),
			'MEMBER'			=> array('STRUCT'),
			'NAME'				=> array('MEMBER'),
			'DATA'				=> array('ARRAY'),
			'FAULT'			=> array('METHODRESPONSE'),
			'VALUE'			=> array('MEMBER', 'DATA', 'PARAM', 'FAULT')
		);

		
		$Vek3kicoh5l4his->xmlrpcerr['unknown_method'] = '1';
		$Vek3kicoh5l4his->xmlrpcstr['unknown_method'] = 'This is not a known method for this XML-RPC Server';
		$Vek3kicoh5l4his->xmlrpcerr['invalid_return'] = '2';
		$Vek3kicoh5l4his->xmlrpcstr['invalid_return'] = 'The XML data received was either invalid or not in the correct form for XML-RPC. Turn on debugging to examine the XML data further.';
		$Vek3kicoh5l4his->xmlrpcerr['incorrect_params'] = '3';
		$Vek3kicoh5l4his->xmlrpcstr['incorrect_params'] = 'Incorrect parameters were passed to method';
		$Vek3kicoh5l4his->xmlrpcerr['introspect_unknown'] = '4';
		$Vek3kicoh5l4his->xmlrpcstr['introspect_unknown'] = 'Cannot inspect signature for request: method unknown';
		$Vek3kicoh5l4his->xmlrpcerr['http_error'] = '5';
		$Vek3kicoh5l4his->xmlrpcstr['http_error'] = "Did not receive a '200 OK' response from remote server.";
		$Vek3kicoh5l4his->xmlrpcerr['no_data'] = '6';
		$Vek3kicoh5l4his->xmlrpcstr['no_data'] = 'No data received from server.';

		$Vek3kicoh5l4his->initialize($Vnmcm15juye5);

		log_message('info', 'XML-RPC Class Initialized');
	}

	

	
	public function initialize($Vnmcm15juye5 = array())
	{
		if (count($Vnmcm15juye5) > 0)
		{
			foreach ($Vnmcm15juye5 as $V2xim30qek4u => $Va4zo0rltynr)
			{
				if (isset($Vek3kicoh5l4his->$V2xim30qek4u))
				{
					$Vek3kicoh5l4his->$V2xim30qek4u = $Va4zo0rltynr;
				}
			}
		}
	}

	

	
	public function server($V2oecyt4aea4, $Vi23rpcbpupy = 80, $Vsexm0tw0gpz = FALSE, $Vsexm0tw0gpz_port = 8080)
	{
		if (strpos($V2oecyt4aea4, 'http') !== 0)
		{
			$V2oecyt4aea4 = 'http://'.$V2oecyt4aea4;
		}

		$Vxfb02ptgyna = parse_url($V2oecyt4aea4);

		if (isset($Vxfb02ptgyna['user'], $Vxfb02ptgyna['pass']))
		{
			$Vxfb02ptgyna['host'] = $Vxfb02ptgyna['user'].':'.$Vxfb02ptgyna['pass'].'@'.$Vxfb02ptgyna['host'];
		}

		$Vcmaitbcbmmk = isset($Vxfb02ptgyna['path']) ? $Vxfb02ptgyna['path'] : '/';

		if ( ! empty($Vxfb02ptgyna['query']))
		{
			$Vcmaitbcbmmk .= '?'.$Vxfb02ptgyna['query'];
		}

		$Vek3kicoh5l4his->client = new XML_RPC_Client($Vcmaitbcbmmk, $Vxfb02ptgyna['host'], $Vi23rpcbpupy, $Vsexm0tw0gpz, $Vsexm0tw0gpz_port);
	}

	

	
	public function timeout($Vbx4wlmdf5pl = 5)
	{
		if ($Vek3kicoh5l4his->client !== NULL && is_int($Vbx4wlmdf5pl))
		{
			$Vek3kicoh5l4his->client->timeout = $Vbx4wlmdf5pl;
		}
	}

	

	
	public function method($V5mhcgfyfeif)
	{
		$Vek3kicoh5l4his->method = $V5mhcgfyfeif;
	}

	

	
	public function request($V4fmeqrlx45e)
	{
		if ( ! is_array($V4fmeqrlx45e))
		{
			
			return;
		}

		$Vek3kicoh5l4his->data = array();

		foreach ($V4fmeqrlx45e as $V2xim30qek4u => $Va4zo0rltynrue)
		{
			$Vek3kicoh5l4his->data[$V2xim30qek4u] = $Vek3kicoh5l4his->values_parsing($Va4zo0rltynrue);
		}
	}

	

	
	public function set_debug($Vj4pefvvndny = TRUE)
	{
		$Vek3kicoh5l4his->debug = ($Vj4pefvvndny === TRUE);
	}

	

	
	public function values_parsing($Va4zo0rltynrue)
	{
		if (is_array($Va4zo0rltynrue) && array_key_exists(0, $Va4zo0rltynrue))
		{
			if ( ! isset($Va4zo0rltynrue[1], $Vek3kicoh5l4his->xmlrpcTypes[$Va4zo0rltynrue[1]]))
			{
				$V3iiokxda3xw = new XML_RPC_Values($Va4zo0rltynrue[0], (is_array($Va4zo0rltynrue[0]) ? 'array' : 'string'));
			}
			else
			{
				if (is_array($Va4zo0rltynrue[0]) && ($Va4zo0rltynrue[1] === 'struct' OR $Va4zo0rltynrue[1] === 'array'))
				{
					while (list($Vwyse0flpyxh) = each($Va4zo0rltynrue[0]))
					{
						$Va4zo0rltynrue[0][$Vwyse0flpyxh] = $Vek3kicoh5l4his->values_parsing($Va4zo0rltynrue[0][$Vwyse0flpyxh]);
					}
				}

				$V3iiokxda3xw = new XML_RPC_Values($Va4zo0rltynrue[0], $Va4zo0rltynrue[1]);
			}
		}
		else
		{
			$V3iiokxda3xw = new XML_RPC_Values($Va4zo0rltynrue, 'string');
		}

		return $V3iiokxda3xw;
	}

	

	
	public function send_request()
	{
		$Vek3kicoh5l4his->message = new XML_RPC_Message($Vek3kicoh5l4his->method, $Vek3kicoh5l4his->data);
		$Vek3kicoh5l4his->message->debug = $Vek3kicoh5l4his->debug;

		if ( ! $Vek3kicoh5l4his->result = $Vek3kicoh5l4his->client->send($Vek3kicoh5l4his->message) OR ! is_object($Vek3kicoh5l4his->result->val))
		{
			$Vek3kicoh5l4his->error = $Vek3kicoh5l4his->result->errstr;
			return FALSE;
		}

		$Vek3kicoh5l4his->response = $Vek3kicoh5l4his->result->decode();
		return TRUE;
	}

	

	
	public function display_error()
	{
		return $Vek3kicoh5l4his->error;
	}

	

	
	public function display_response()
	{
		return $Vek3kicoh5l4his->response;
	}

	

	
	public function send_error_message($Vvl2owq3ojca, $V15xvmvzbb0h)
	{
		return new XML_RPC_Response(0, $Vvl2owq3ojca, $V15xvmvzbb0h);
	}

	

	
	public function send_response($Vpa2qbhtxuyd)
	{
		
		
		return new XML_RPC_Response($Vek3kicoh5l4his->values_parsing($Vpa2qbhtxuyd));
	}

} 


class XML_RPC_Client extends CI_Xmlrpc
{
	
	public $Vcmaitbcbmmk			= '';

	
	public $Vtecpthjhoh2			= '';

	
	public $Vi23rpcbpupy			= 80;

	
	public $Vlukz41rasa4;

	
	public $Vpkw0q5n2gpv;

	
	public $Vsexm0tw0gpz			= FALSE;

	
	public $Vsexm0tw0gpz_port		= 8080;

	
	public $Vh3etbycchqa			= '';

	
	public $Voip1bkvfsi3		= '';

	
	public $Vmsmvzp2bkcr		= 5;

	
	public $Vggpalkepeje	= FALSE;

	

	
	public function __construct($Vcmaitbcbmmk, $Vtecpthjhoh2, $Vi23rpcbpupy = 80, $Vsexm0tw0gpz = FALSE, $Vsexm0tw0gpz_port = 8080)
	{
		parent::__construct();

		$V2oecyt4aea4 = parse_url('http://'.$Vtecpthjhoh2);

		if (isset($V2oecyt4aea4['user'], $V2oecyt4aea4['pass']))
		{
			$Vek3kicoh5l4his->username = $V2oecyt4aea4['user'];
			$Vek3kicoh5l4his->password = $V2oecyt4aea4['pass'];
		}

		$Vek3kicoh5l4his->port = $Vi23rpcbpupy;
		$Vek3kicoh5l4his->server = $V2oecyt4aea4['host'];
		$Vek3kicoh5l4his->path = $Vcmaitbcbmmk;
		$Vek3kicoh5l4his->proxy = $Vsexm0tw0gpz;
		$Vek3kicoh5l4his->proxy_port = $Vsexm0tw0gpz_port;
	}

	

	
	public function send($Vv3gvm3x3hvm)
	{
		if (is_array($Vv3gvm3x3hvm))
		{
			
			return new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['multicall_recursion'], $Vek3kicoh5l4his->xmlrpcstr['multicall_recursion']);
		}

		return $Vek3kicoh5l4his->sendPayload($Vv3gvm3x3hvm);
	}

	

	
	public function sendPayload($Vv3gvm3x3hvm)
	{
		if ($Vek3kicoh5l4his->proxy === FALSE)
		{
			$Vtecpthjhoh2 = $Vek3kicoh5l4his->server;
			$Vi23rpcbpupy = $Vek3kicoh5l4his->port;
		}
		else
		{
			$Vtecpthjhoh2 = $Vek3kicoh5l4his->proxy;
			$Vi23rpcbpupy = $Vek3kicoh5l4his->proxy_port;
		}

		$Vzuexymrvrpz = @fsockopen($Vtecpthjhoh2, $Vi23rpcbpupy, $Vek3kicoh5l4his->errno, $Vek3kicoh5l4his->errstring, $Vek3kicoh5l4his->timeout);

		if ( ! is_resource($Vzuexymrvrpz))
		{
			error_log($Vek3kicoh5l4his->xmlrpcstr['http_error']);
			return new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['http_error'], $Vek3kicoh5l4his->xmlrpcstr['http_error']);
		}

		if (empty($Vv3gvm3x3hvm->payload))
		{
			
			$Vv3gvm3x3hvm->createPayload();
		}

		$Vyotgbgs03ci = "\r\n";
		$Vgawsgswxfno = 'POST '.$Vek3kicoh5l4his->path.' HTTP/1.0'.$Vyotgbgs03ci
			.'Host: '.$Vek3kicoh5l4his->server.$Vyotgbgs03ci
			.'Content-Type: text/xml'.$Vyotgbgs03ci
			.(isset($Vek3kicoh5l4his->username, $Vek3kicoh5l4his->password) ? 'Authorization: Basic '.base64_encode($Vek3kicoh5l4his->username.':'.$Vek3kicoh5l4his->password).$Vyotgbgs03ci : '')
			.'User-Agent: '.$Vek3kicoh5l4his->xmlrpcName.$Vyotgbgs03ci
			.'Content-Length: '.strlen($Vv3gvm3x3hvm->payload).$Vyotgbgs03ci.$Vyotgbgs03ci
			.$Vv3gvm3x3hvm->payload;

		for ($Vte3mlfnkhto = $Voqn4yo0hu0w = 0, $Vgdtiboyfq04 = strlen($Vgawsgswxfno); $Vte3mlfnkhto < $Vgdtiboyfq04; $Vte3mlfnkhto += $Voetc43kt2cr)
		{
			if (($Voetc43kt2cr = fwrite($Vzuexymrvrpz, substr($Vgawsgswxfno, $Vte3mlfnkhto))) === FALSE)
			{
				break;
			}
			
			elseif ($Voetc43kt2cr === 0)
			{
				if ($Voqn4yo0hu0w === 0)
				{
					$Voqn4yo0hu0w = time();
				}
				elseif ($Voqn4yo0hu0w < (time() - $Vek3kicoh5l4his->timeout))
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
			error_log($Vek3kicoh5l4his->xmlrpcstr['http_error']);
			return new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['http_error'], $Vek3kicoh5l4his->xmlrpcstr['http_error']);
		}

		$Vyotgbgs03ciesp = $Vv3gvm3x3hvm->parseResponse($Vzuexymrvrpz);
		fclose($Vzuexymrvrpz);
		return $Vyotgbgs03ciesp;
	}

} 


class XML_RPC_Response
{

	
	public $Va4zo0rltynr		= 0;

	
	public $Vh3etbycchqa		= 0;

	
	public $Vdons2drriyj		= '';

	
	public $V3zljh1vyslw		= array();

	
	public $Vgzlesc0sebt	= TRUE;

	

	
	public function __construct($Va4zo0rltynr, $V1fd2lg1unl2 = 0, $Vmjizqh4z53e = '')
	{
		if ($V1fd2lg1unl2 !== 0)
		{
			
			$Vek3kicoh5l4his->errno = $V1fd2lg1unl2;
			$Vek3kicoh5l4his->errstr = htmlspecialchars($Vmjizqh4z53e,
							(is_php('5.4') ? ENT_XML1 | ENT_NOQUOTES : ENT_NOQUOTES),
							'UTF-8');
		}
		elseif ( ! is_object($Va4zo0rltynr))
		{
			
			error_log("Invalid type '".gettype($Va4zo0rltynr)."' (value: ".$Va4zo0rltynr.') passed to XML_RPC_Response. Defaulting to empty value.');
			$Vek3kicoh5l4his->val = new XML_RPC_Values();
		}
		else
		{
			$Vek3kicoh5l4his->val = $Va4zo0rltynr;
		}
	}

	

	
	public function faultCode()
	{
		return $Vek3kicoh5l4his->errno;
	}

	

	
	public function faultString()
	{
		return $Vek3kicoh5l4his->errstr;
	}

	

	
	public function value()
	{
		return $Vek3kicoh5l4his->val;
	}

	

	
	public function prepare_response()
	{
		return "<methodResponse>\n"
			.($Vek3kicoh5l4his->errno
				? '<fault>
	<value>
		<struct>
			<member>
				<name>faultCode</name>
				<value><int>'.$Vek3kicoh5l4his->errno.'</int></value>
			</member>
			<member>
				<name>faultString</name>
				<value><string>'.$Vek3kicoh5l4his->errstr.'</string></value>
			</member>
		</struct>
	</value>
</fault>'
				: "<params>\n<param>\n".$Vek3kicoh5l4his->val->serialize_class()."</param>\n</params>")
			."\n</methodResponse>";
	}

	

	
	public function decode($V5adckfdzb1d = NULL)
	{
		$Vgw3d0qe3dgd =& get_instance();

		if (is_array($V5adckfdzb1d))
		{
			while (list($V2xim30qek4u) = each($V5adckfdzb1d))
			{
				if (is_array($V5adckfdzb1d[$V2xim30qek4u]))
				{
					$V5adckfdzb1d[$V2xim30qek4u] = $Vek3kicoh5l4his->decode($V5adckfdzb1d[$V2xim30qek4u]);
				}
				elseif ($Vek3kicoh5l4his->xss_clean)
				{
					$V5adckfdzb1d[$V2xim30qek4u] = $Vgw3d0qe3dgd->security->xss_clean($V5adckfdzb1d[$V2xim30qek4u]);
				}
			}

			return $V5adckfdzb1d;
		}

		$Voetc43kt2cr = $Vek3kicoh5l4his->xmlrpc_decoder($Vek3kicoh5l4his->val);

		if (is_array($Voetc43kt2cr))
		{
			$Voetc43kt2cr = $Vek3kicoh5l4his->decode($Voetc43kt2cr);
		}
		elseif ($Vek3kicoh5l4his->xss_clean)
		{
			$Voetc43kt2cr = $Vgw3d0qe3dgd->security->xss_clean($Voetc43kt2cr);
		}

		return $Voetc43kt2cr;
	}

	

	
	public function xmlrpc_decoder($Vecpjrqmqxd4)
	{
		$Vwyse0flpyxhind = $Vecpjrqmqxd4->kindOf();

		if ($Vwyse0flpyxhind === 'scalar')
		{
			return $Vecpjrqmqxd4->scalarval();
		}
		elseif ($Vwyse0flpyxhind === 'array')
		{
			reset($Vecpjrqmqxd4->me);
			$Vwkzrpaksezs = current($Vecpjrqmqxd4->me);
			$Vxspxkugwklm = array();

			for ($Vep0df0xosaw = 0, $Vjlh0ebpcw5x = count($Vwkzrpaksezs); $Vep0df0xosaw < $Vjlh0ebpcw5x; $Vep0df0xosaw++)
			{
				$Vxspxkugwklm[] = $Vek3kicoh5l4his->xmlrpc_decoder($Vecpjrqmqxd4->me['array'][$Vep0df0xosaw]);
			}
			return $Vxspxkugwklm;
		}
		elseif ($Vwyse0flpyxhind === 'struct')
		{
			reset($Vecpjrqmqxd4->me['struct']);
			$Vxspxkugwklm = array();

			while (list($V2xim30qek4u,$Va4zo0rltynrue) = each($Vecpjrqmqxd4->me['struct']))
			{
				$Vxspxkugwklm[$V2xim30qek4u] = $Vek3kicoh5l4his->xmlrpc_decoder($Va4zo0rltynrue);
			}
			return $Vxspxkugwklm;
		}
	}

	

	
	public function iso8601_decode($Vzfk1zisr4jl, $Vyzv0hnliwqi = FALSE)
	{
		
		$Vek3kicoh5l4 = 0;
		if (preg_match('/([0-9]{4})([0-9]{2})([0-9]{2})T([0-9]{2}):([0-9]{2}):([0-9]{2})/', $Vzfk1zisr4jl, $Vyotgbgs03ciegs))
		{
			$Vsmi3kmzf4ra = ($Vyzv0hnliwqi === TRUE) ? 'gmmktime' : 'mktime';
			$Vek3kicoh5l4 = $Vsmi3kmzf4ra($Vyotgbgs03ciegs[4], $Vyotgbgs03ciegs[5], $Vyotgbgs03ciegs[6], $Vyotgbgs03ciegs[2], $Vyotgbgs03ciegs[3], $Vyotgbgs03ciegs[1]);
		}
		return $Vek3kicoh5l4;
	}

} 


class XML_RPC_Message extends CI_Xmlrpc
{

	
	public $Vslgp0k341xf;

	
	public $V5dsbozs5xhq_name;

	
	public $Vpz5i5lfmwft		= array();

	
	public $Vcktce5oyl4t		= array();

	

	
	public function __construct($V5dsbozs5xhq, $Vz0ykfc45gsl = FALSE)
	{
		parent::__construct();

		$Vek3kicoh5l4his->method_name = $V5dsbozs5xhq;
		if (is_array($Vz0ykfc45gsl) && count($Vz0ykfc45gsl) > 0)
		{
			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vz0ykfc45gsl); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				
				$Vek3kicoh5l4his->params[] = $Vz0ykfc45gsl[$Vep0df0xosaw];
			}
		}
	}

	

	
	public function createPayload()
	{
		$Vek3kicoh5l4his->payload = '<?xml version="1.0"?'.">\r\n<methodCall>\r\n"
				.'<methodName>'.$Vek3kicoh5l4his->method_name."</methodName>\r\n"
				."<params>\r\n";

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vek3kicoh5l4his->params); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			
			$Varkxlurwgur = $Vek3kicoh5l4his->params[$Vep0df0xosaw];
			$Vek3kicoh5l4his->payload .= "<param>\r\n".$Varkxlurwgur->serialize_class()."</param>\r\n";
		}

		$Vek3kicoh5l4his->payload .= "</params>\r\n</methodCall>\r\n";
	}

	

	
	public function parseResponse($Vzuexymrvrpz)
	{
		$Vfeinw1hsfej = '';

		while ($Vyxygtkqy3zl = fread($Vzuexymrvrpz, 4096))
		{
			$Vfeinw1hsfej .= $Vyxygtkqy3zl;
		}

		
		if ($Vek3kicoh5l4his->debug === TRUE)
		{
			echo "<pre>---DATA---\n".htmlspecialchars($Vfeinw1hsfej)."\n---END DATA---\n\n</pre>";
		}

		
		if ($Vfeinw1hsfej === '')
		{
			error_log($Vek3kicoh5l4his->xmlrpcstr['no_data']);
			return new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['no_data'], $Vek3kicoh5l4his->xmlrpcstr['no_data']);
		}

		
		if (strpos($Vfeinw1hsfej, 'HTTP') === 0 && ! preg_match('/^HTTP\/[0-9\.]+ 200 /', $Vfeinw1hsfej))
		{
			$Vdons2drriyj = substr($Vfeinw1hsfej, 0, strpos($Vfeinw1hsfej, "\n")-1);
			return new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['http_error'], $Vek3kicoh5l4his->xmlrpcstr['http_error'].' ('.$Vdons2drriyj.')');
		}

		
		
		

		$Vz0ykfc45gsler = xml_parser_create($Vek3kicoh5l4his->xmlrpc_defencoding);
		$Varkxlurwgurname = (string) $Vz0ykfc45gsler;
		$Vek3kicoh5l4his->xh[$Varkxlurwgurname] = array(
			'isf'		=> 0,
			'ac'		=> '',
			'headers'	=> array(),
			'stack'		=> array(),
			'valuestack'	=> array(),
			'isf_reason'	=> 0
		);

		xml_set_object($Vz0ykfc45gsler, $Vek3kicoh5l4his);
		xml_parser_set_option($Vz0ykfc45gsler, XML_OPTION_CASE_FOLDING, TRUE);
		xml_set_element_handler($Vz0ykfc45gsler, 'open_tag', 'closing_tag');
		xml_set_character_data_handler($Vz0ykfc45gsler, 'character_data');
		

		
		$Vht53znmq1xx = explode("\r\n", $Vfeinw1hsfej);
		while (($Vcfdirgq3swa = array_shift($Vht53znmq1xx)))
		{
			if (strlen($Vcfdirgq3swa) < 1)
			{
				break;
			}
			$Vek3kicoh5l4his->xh[$Varkxlurwgurname]['headers'][] = $Vcfdirgq3swa;
		}
		$Vfeinw1hsfej = implode("\r\n", $Vht53znmq1xx);

		
		if ( ! xml_parse($Vz0ykfc45gsler, $Vfeinw1hsfej, count($Vfeinw1hsfej)))
		{
			$Vdons2drriyj = sprintf('XML error: %s at line %d',
						xml_error_string(xml_get_error_code($Vz0ykfc45gsler)),
						xml_get_current_line_number($Vz0ykfc45gsler));

			$Vyotgbgs03ci = new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['invalid_return'], $Vek3kicoh5l4his->xmlrpcstr['invalid_return']);
			xml_parser_free($Vz0ykfc45gsler);
			return $Vyotgbgs03ci;
		}
		xml_parser_free($Vz0ykfc45gsler);

		
		if ($Vek3kicoh5l4his->xh[$Varkxlurwgurname]['isf'] > 1)
		{
			if ($Vek3kicoh5l4his->debug === TRUE)
			{
				echo "---Invalid Return---\n".$Vek3kicoh5l4his->xh[$Varkxlurwgurname]['isf_reason']."---Invalid Return---\n\n";
			}

			return new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['invalid_return'], $Vek3kicoh5l4his->xmlrpcstr['invalid_return'].' '.$Vek3kicoh5l4his->xh[$Varkxlurwgurname]['isf_reason']);
		}
		elseif ( ! is_object($Vek3kicoh5l4his->xh[$Varkxlurwgurname]['value']))
		{
			return new XML_RPC_Response(0, $Vek3kicoh5l4his->xmlrpcerr['invalid_return'], $Vek3kicoh5l4his->xmlrpcstr['invalid_return'].' '.$Vek3kicoh5l4his->xh[$Varkxlurwgurname]['isf_reason']);
		}

		
		if ($Vek3kicoh5l4his->debug === TRUE)
		{
			echo '<pre>';

			if (count($Vek3kicoh5l4his->xh[$Varkxlurwgurname]['headers'] > 0))
			{
				echo "---HEADERS---\n";
				foreach ($Vek3kicoh5l4his->xh[$Varkxlurwgurname]['headers'] as $V3lefstrzfrx)
				{
					echo $V3lefstrzfrx."\n";
				}
				echo "---END HEADERS---\n\n";
			}

			echo "---DATA---\n".htmlspecialchars($Vfeinw1hsfej)."\n---END DATA---\n\n---PARSED---\n";
			var_dump($Vek3kicoh5l4his->xh[$Varkxlurwgurname]['value']);
			echo "\n---END PARSED---</pre>";
		}

		
		$Vxxtccqydhzn = $Vek3kicoh5l4his->xh[$Varkxlurwgurname]['value'];
		if ($Vek3kicoh5l4his->xh[$Varkxlurwgurname]['isf'])
		{
			$Vh3etbycchqa_v = $Vxxtccqydhzn->me['struct']['faultCode'];
			$Vdons2drriyj_v = $Vxxtccqydhzn->me['struct']['faultString'];
			$Vh3etbycchqa = $Vh3etbycchqa_v->scalarval();

			if ($Vh3etbycchqa === 0)
			{
				
				$Vh3etbycchqa = -1;
			}

			$Vyotgbgs03ci = new XML_RPC_Response($Vxxtccqydhzn, $Vh3etbycchqa, $Vdons2drriyj_v->scalarval());
		}
		else
		{
			$Vyotgbgs03ci = new XML_RPC_Response($Vxxtccqydhzn);
		}

		$Vyotgbgs03ci->headers = $Vek3kicoh5l4his->xh[$Varkxlurwgurname]['headers'];
		return $Vyotgbgs03ci;
	}

	

	
	
	

	
	
	
	
	
	
	
	
	

	

	
	public function open_tag($Vek3kicoh5l4he_parser, $Vaclaigdbtoo)
	{
		$Vek3kicoh5l4he_parser = (string) $Vek3kicoh5l4he_parser;

		
		if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] > 1) return;

		
		if (count($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['stack']) === 0)
		{
			if ($Vaclaigdbtoo !== 'METHODRESPONSE' && $Vaclaigdbtoo !== 'METHODCALL')
			{
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] = 2;
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf_reason'] = 'Top level XML-RPC element is missing';
				return;
			}
		}
		
		elseif ( ! in_array($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['stack'][0], $Vek3kicoh5l4his->valid_parents[$Vaclaigdbtoo], TRUE))
		{
			$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] = 2;
			$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf_reason'] = 'XML-RPC element '.$Vaclaigdbtoo.' cannot be child of '.$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['stack'][0];
			return;
		}

		switch ($Vaclaigdbtoo)
		{
			case 'STRUCT':
			case 'ARRAY':
				
				$Vn2ycfau434sur_val = array('value' => array(), 'type' => $Vaclaigdbtoo);
				array_unshift($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack'], $Vn2ycfau434sur_val);
				break;
			case 'METHODNAME':
			case 'NAME':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] = '';
				break;
			case 'FAULT':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] = 1;
				break;
			case 'PARAM':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = NULL;
				break;
			case 'VALUE':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt'] = 'value';
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] = '';
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['lv'] = 1;
				break;
			case 'I4':
			case 'INT':
			case 'STRING':
			case 'BOOLEAN':
			case 'DOUBLE':
			case 'DATETIME.ISO8601':
			case 'BASE64':
				if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt'] !== 'value')
				{
					
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] = 2;
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf_reason'] = 'There is a '.$Vaclaigdbtoo.' element following a '
										.$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt'].' element inside a single value';
					return;
				}

				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] = '';
				break;
			case 'MEMBER':
				
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack'][0]['name'] = '';

				
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = NULL;
				break;
			case 'DATA':
			case 'METHODCALL':
			case 'METHODRESPONSE':
			case 'PARAMS':
				
				break;
			default:
				
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] = 2;
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf_reason'] = 'Invalid XML-RPC element found: '.$Vaclaigdbtoo;
				break;
		}

		
		array_unshift($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['stack'], $Vaclaigdbtoo);

		$Vaclaigdbtoo === 'VALUE' OR $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['lv'] = 0;
	}

	

	
	public function closing_tag($Vek3kicoh5l4he_parser, $Vaclaigdbtoo)
	{
		$Vek3kicoh5l4he_parser = (string) $Vek3kicoh5l4he_parser;

		if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] > 1) return;

		
		
		
		

		$Vn2ycfau434surr_elem = array_shift($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['stack']);

		switch ($Vaclaigdbtoo)
		{
			case 'STRUCT':
			case 'ARRAY':
				$Vn2ycfau434sur_val = array_shift($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack']);
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = isset($Vn2ycfau434sur_val['values']) ? $Vn2ycfau434sur_val['values'] : array();
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt']	= strtolower($Vaclaigdbtoo);
				break;
			case 'NAME':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack'][0]['name'] = $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'];
				break;
			case 'BOOLEAN':
			case 'I4':
			case 'INT':
			case 'STRING':
			case 'DOUBLE':
			case 'DATETIME.ISO8601':
			case 'BASE64':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt'] = strtolower($Vaclaigdbtoo);

				if ($Vaclaigdbtoo === 'STRING')
				{
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'];
				}
				elseif ($Vaclaigdbtoo === 'DATETIME.ISO8601')
				{
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt']	= $Vek3kicoh5l4his->xmlrpcDateTime;
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'];
				}
				elseif ($Vaclaigdbtoo === 'BASE64')
				{
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = base64_decode($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac']);
				}
				elseif ($Vaclaigdbtoo === 'BOOLEAN')
				{
					
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = (bool) $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'];
				}
				elseif ($Vaclaigdbtoo=='DOUBLE')
				{
					
					
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = preg_match('/^[+-]?[eE0-9\t \.]+$/', $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'])
										? (float) $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac']
										: 'ERROR_NON_NUMERIC_FOUND';
				}
				else
				{
					
					
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = preg_match('/^[+-]?[0-9\t ]+$/', $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'])
										? (int) $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac']
										: 'ERROR_NON_NUMERIC_FOUND';
				}
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] = '';
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['lv'] = 3; 
				break;
			case 'VALUE':
				
				if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt'] == 'value')
				{
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value']	= $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'];
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt']	= $Vek3kicoh5l4his->xmlrpcString;
				}

				
				$V3iiokxda3xw = new XML_RPC_Values($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'], $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['vt']);

				if (count($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack']) && $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack'][0]['type'] === 'ARRAY')
				{
					
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack'][0]['values'][] = $V3iiokxda3xw;
				}
				else
				{
					
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'] = $V3iiokxda3xw;
				}
				break;
			case 'MEMBER':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] = '';

				
				if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'])
				{
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack'][0]['values'][$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['valuestack'][0]['name']] = $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'];
				}
				break;
			case 'DATA':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] = '';
				break;
			case 'PARAM':
				if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'])
				{
					$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['params'][] = $Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['value'];
				}
				break;
			case 'METHODNAME':
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['method'] = ltrim($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac']);
				break;
			case 'PARAMS':
			case 'FAULT':
			case 'METHODCALL':
			case 'METHORESPONSE':
				
				break;
			default:
				
				break;
		}
	}

	

	
	public function character_data($Vek3kicoh5l4he_parser, $Vfeinw1hsfej)
	{
		$Vek3kicoh5l4he_parser = (string) $Vek3kicoh5l4he_parser;

		if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['isf'] > 1) return; 

		
		if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['lv'] !== 3)
		{
			if ($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['lv'] === 1)
			{
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['lv'] = 2; 
			}

			if ( ! isset($Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac']))
			{
				$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] = '';
			}

			$Vek3kicoh5l4his->xh[$Vek3kicoh5l4he_parser]['ac'] .= $Vfeinw1hsfej;
		}
	}

	

	
	public function addParam($Varkxlurwgurar)
	{
		$Vek3kicoh5l4his->params[] = $Varkxlurwgurar;
	}

	

	
	public function output_parameters(array $V5adckfdzb1d = array())
	{
		$Vgw3d0qe3dgd =& get_instance();

		if ( ! empty($V5adckfdzb1d))
		{
			while (list($V2xim30qek4u) = each($V5adckfdzb1d))
			{
				if (is_array($V5adckfdzb1d[$V2xim30qek4u]))
				{
					$V5adckfdzb1d[$V2xim30qek4u] = $Vek3kicoh5l4his->output_parameters($V5adckfdzb1d[$V2xim30qek4u]);
				}
				elseif ($V2xim30qek4u !== 'bits' && $Vek3kicoh5l4his->xss_clean)
				{
					
					
					$V5adckfdzb1d[$V2xim30qek4u] = $Vgw3d0qe3dgd->security->xss_clean($V5adckfdzb1d[$V2xim30qek4u]);
				}
			}

			return $V5adckfdzb1d;
		}

		$Varkxlurwgurarameters = array();

		for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vek3kicoh5l4his->params); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
		{
			$Vdsyrkanu3ur = $Vek3kicoh5l4his->decode_message($Vek3kicoh5l4his->params[$Vep0df0xosaw]);

			if (is_array($Vdsyrkanu3ur))
			{
				$Varkxlurwgurarameters[] = $Vek3kicoh5l4his->output_parameters($Vdsyrkanu3ur);
			}
			else
			{
				$Varkxlurwgurarameters[] = ($Vek3kicoh5l4his->xss_clean) ? $Vgw3d0qe3dgd->security->xss_clean($Vdsyrkanu3ur) : $Vdsyrkanu3ur;
			}
		}

		return $Varkxlurwgurarameters;
	}

	

	
	public function decode_message($Varkxlurwguraram)
	{
		$Vwyse0flpyxhind = $Varkxlurwguraram->kindOf();

		if ($Vwyse0flpyxhind === 'scalar')
		{
			return $Varkxlurwguraram->scalarval();
		}
		elseif ($Vwyse0flpyxhind === 'array')
		{
			reset($Varkxlurwguraram->me);
			$Vwkzrpaksezs = current($Varkxlurwguraram->me);
			$Vxspxkugwklm = array();

			for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Vwkzrpaksezs); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
			{
				$Vxspxkugwklm[] = $Vek3kicoh5l4his->decode_message($Varkxlurwguraram->me['array'][$Vep0df0xosaw]);
			}

			return $Vxspxkugwklm;
		}
		elseif ($Vwyse0flpyxhind === 'struct')
		{
			reset($Varkxlurwguraram->me['struct']);
			$Vxspxkugwklm = array();

			while (list($V2xim30qek4u,$Va4zo0rltynrue) = each($Varkxlurwguraram->me['struct']))
			{
				$Vxspxkugwklm[$V2xim30qek4u] = $Vek3kicoh5l4his->decode_message($Va4zo0rltynrue);
			}

			return $Vxspxkugwklm;
		}
	}

} 


class XML_RPC_Values extends CI_Xmlrpc
{
	
	public $V2wdz4zdikv1	= array();

	
	public $Venbvi2flmlz	= 0;

	

	
	public function __construct($Va4zo0rltynr = -1, $Vek3kicoh5l4ype = '')
	{
		parent::__construct();

		if ($Va4zo0rltynr !== -1 OR $Vek3kicoh5l4ype !== '')
		{
			$Vek3kicoh5l4ype = $Vek3kicoh5l4ype === '' ? 'string' : $Vek3kicoh5l4ype;

			if ($Vek3kicoh5l4his->xmlrpcTypes[$Vek3kicoh5l4ype] == 1)
			{
				$Vek3kicoh5l4his->addScalar($Va4zo0rltynr, $Vek3kicoh5l4ype);
			}
			elseif ($Vek3kicoh5l4his->xmlrpcTypes[$Vek3kicoh5l4ype] == 2)
			{
				$Vek3kicoh5l4his->addArray($Va4zo0rltynr);
			}
			elseif ($Vek3kicoh5l4his->xmlrpcTypes[$Vek3kicoh5l4ype] == 3)
			{
				$Vek3kicoh5l4his->addStruct($Va4zo0rltynr);
			}
		}
	}

	

	
	public function addScalar($Va4zo0rltynr, $Vek3kicoh5l4ype = 'string')
	{
		$Vek3kicoh5l4ypeof = $Vek3kicoh5l4his->xmlrpcTypes[$Vek3kicoh5l4ype];

		if ($Vek3kicoh5l4his->mytype === 1)
		{
			echo '<strong>XML_RPC_Values</strong>: scalar can have only one value<br />';
			return 0;
		}

		if ($Vek3kicoh5l4ypeof != 1)
		{
			echo '<strong>XML_RPC_Values</strong>: not a scalar type (${typeof})<br />';
			return 0;
		}

		if ($Vek3kicoh5l4ype === $Vek3kicoh5l4his->xmlrpcBoolean)
		{
			$Va4zo0rltynr = (int) (strcasecmp($Va4zo0rltynr, 'true') === 0 OR $Va4zo0rltynr === 1 OR ($Va4zo0rltynr === TRUE && strcasecmp($Va4zo0rltynr, 'false')));
		}

		if ($Vek3kicoh5l4his->mytype === 2)
		{
			
			$Ve01lqso0kpl = $Vek3kicoh5l4his->me['array'];
			$Ve01lqso0kpl[] = new XML_RPC_Values($Va4zo0rltynr, $Vek3kicoh5l4ype);
			$Vek3kicoh5l4his->me['array'] = $Ve01lqso0kpl;
		}
		else
		{
			
			$Vek3kicoh5l4his->me[$Vek3kicoh5l4ype] = $Va4zo0rltynr;
			$Vek3kicoh5l4his->mytype = $Vek3kicoh5l4ypeof;
		}

		return 1;
	}

	

	
	public function addArray($Va4zo0rltynrs)
	{
		if ($Vek3kicoh5l4his->mytype !== 0)
		{
			echo '<strong>XML_RPC_Values</strong>: already initialized as a ['.$Vek3kicoh5l4his->kindOf().']<br />';
			return 0;
		}

		$Vek3kicoh5l4his->mytype = $Vek3kicoh5l4his->xmlrpcTypes['array'];
		$Vek3kicoh5l4his->me['array'] = $Va4zo0rltynrs;
		return 1;
	}

	

	
	public function addStruct($Va4zo0rltynrs)
	{
		if ($Vek3kicoh5l4his->mytype !== 0)
		{
			echo '<strong>XML_RPC_Values</strong>: already initialized as a ['.$Vek3kicoh5l4his->kindOf().']<br />';
			return 0;
		}
		$Vek3kicoh5l4his->mytype = $Vek3kicoh5l4his->xmlrpcTypes['struct'];
		$Vek3kicoh5l4his->me['struct'] = $Va4zo0rltynrs;
		return 1;
	}

	

	
	public function kindOf()
	{
		switch ($Vek3kicoh5l4his->mytype)
		{
			case 3: return 'struct';
			case 2: return 'array';
			case 1: return 'scalar';
			default: return 'undef';
		}
	}

	

	
	public function serializedata($Vek3kicoh5l4yp, $Va4zo0rltynr)
	{
		$Vyotgbgs03cis = '';

		switch ($Vek3kicoh5l4his->xmlrpcTypes[$Vek3kicoh5l4yp])
		{
			case 3:
				
				$Vyotgbgs03cis .= "<struct>\n";
				reset($Va4zo0rltynr);
				while (list($V2xim30qek4u2, $Va4zo0rltynr2) = each($Va4zo0rltynr))
				{
					$Vyotgbgs03cis .= "<member>\n<name>{$V2xim30qek4u2}</name>\n".$Vek3kicoh5l4his->serializeval($Va4zo0rltynr2)."</member>\n";
				}
				$Vyotgbgs03cis .= '</struct>';
				break;
			case 2:
				
				$Vyotgbgs03cis .= "<array>\n<data>\n";
				for ($Vep0df0xosaw = 0, $Vn2ycfau434s = count($Va4zo0rltynr); $Vep0df0xosaw < $Vn2ycfau434s; $Vep0df0xosaw++)
				{
					$Vyotgbgs03cis .= $Vek3kicoh5l4his->serializeval($Va4zo0rltynr[$Vep0df0xosaw]);
				}
				$Vyotgbgs03cis .= "</data>\n</array>\n";
				break;
			case 1:
				
				switch ($Vek3kicoh5l4yp)
				{
					case $Vek3kicoh5l4his->xmlrpcBase64:
						$Vyotgbgs03cis .= '<'.$Vek3kicoh5l4yp.'>'.base64_encode( (string) $Va4zo0rltynr).'</'.$Vek3kicoh5l4yp.">\n";
						break;
					case $Vek3kicoh5l4his->xmlrpcBoolean:
						$Vyotgbgs03cis .= '<'.$Vek3kicoh5l4yp.'>'.( (bool) $Va4zo0rltynr ? '1' : '0').'</'.$Vek3kicoh5l4yp.">\n";
						break;
					case $Vek3kicoh5l4his->xmlrpcString:
						$Vyotgbgs03cis .= '<'.$Vek3kicoh5l4yp.'>'.htmlspecialchars( (string) $Va4zo0rltynr).'</'.$Vek3kicoh5l4yp.">\n";
						break;
					default:
						$Vyotgbgs03cis .= '<'.$Vek3kicoh5l4yp.'>'.$Va4zo0rltynr.'</'.$Vek3kicoh5l4yp.">\n";
						break;
				}
			default:
				break;
		}

		return $Vyotgbgs03cis;
	}

	

	
	public function serialize_class()
	{
		return $Vek3kicoh5l4his->serializeval($Vek3kicoh5l4his);
	}

	

	
	public function serializeval($Vx4l3ymxdmcj)
	{
		$Ve01lqso0kpl = $Vx4l3ymxdmcj->me;
		reset($Ve01lqso0kpl);

		list($Vek3kicoh5l4yp, $Va4zo0rltynr) = each($Ve01lqso0kpl);
		return "<value>\n".$Vek3kicoh5l4his->serializedata($Vek3kicoh5l4yp, $Va4zo0rltynr)."</value>\n";
	}

	

	
	public function scalarval()
	{
		reset($Vek3kicoh5l4his->me);
		return current($Vek3kicoh5l4his->me);
	}

	

	
	public function iso8601_encode($Vzfk1zisr4jl, $Vyzv0hnliwqi = FALSE)
	{
		return ($Vyzv0hnliwqi) ? strftime('%Y%m%dT%H:%i:%s', $Vzfk1zisr4jl) : gmstrftime('%Y%m%dT%H:%i:%s', $Vzfk1zisr4jl);
	}

} 
