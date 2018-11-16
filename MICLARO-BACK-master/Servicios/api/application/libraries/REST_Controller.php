<?php

defined('BASEPATH') OR exit('No direct script access allowed');


abstract class REST_Controller extends CI_Controller {

    

    

    const HTTP_CONTINUE = 100;
    const HTTP_SWITCHING_PROTOCOLS = 101;
    const HTTP_PROCESSING = 102;            

    

    
    const HTTP_OK = 200;

    
    const HTTP_CREATED = 201;
    const HTTP_ACCEPTED = 202;
    const HTTP_NON_AUTHORITATIVE_INFORMATION = 203;

    
    const HTTP_NO_CONTENT = 204;
    const HTTP_RESET_CONTENT = 205;
    const HTTP_PARTIAL_CONTENT = 206;
    const HTTP_MULTI_STATUS = 207;          
    const HTTP_ALREADY_REPORTED = 208;      
    const HTTP_IM_USED = 226;               

    

    const HTTP_MULTIPLE_CHOICES = 300;
    const HTTP_MOVED_PERMANENTLY = 301;
    const HTTP_FOUND = 302;
    const HTTP_SEE_OTHER = 303;

    
    const HTTP_NOT_MODIFIED = 304;
    const HTTP_USE_PROXY = 305;
    const HTTP_RESERVED = 306;
    const HTTP_TEMPORARY_REDIRECT = 307;
    const HTTP_PERMANENTLY_REDIRECT = 308;  

    

    
    const HTTP_BAD_REQUEST = 400;

    
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_PAYMENT_REQUIRED = 402;

    
    const HTTP_FORBIDDEN = 403;

    
    const HTTP_NOT_FOUND = 404;

    
    const HTTP_METHOD_NOT_ALLOWED = 405;

    
    const HTTP_NOT_ACCEPTABLE = 406;
    const HTTP_PROXY_AUTHENTICATION_REQUIRED = 407;
    const HTTP_REQUEST_TIMEOUT = 408;

    
    const HTTP_CONFLICT = 409;
    const HTTP_GONE = 410;
    const HTTP_LENGTH_REQUIRED = 411;
    const HTTP_PRECONDITION_FAILED = 412;
    const HTTP_REQUEST_ENTITY_TOO_LARGE = 413;
    const HTTP_REQUEST_URI_TOO_LONG = 414;
    const HTTP_UNSUPPORTED_MEDIA_TYPE = 415;
    const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE = 416;
    const HTTP_EXPECTATION_FAILED = 417;
    const HTTP_I_AM_A_TEAPOT = 418;                                               
    const HTTP_UNPROCESSABLE_ENTITY = 422;                                        
    const HTTP_LOCKED = 423;                                                      
    const HTTP_FAILED_DEPENDENCY = 424;                                           
    const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425;   
    const HTTP_UPGRADE_REQUIRED = 426;                                            
    const HTTP_PRECONDITION_REQUIRED = 428;                                       
    const HTTP_TOO_MANY_REQUESTS = 429;                                           
    const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE = 431;                             

    

    
    const HTTP_INTERNAL_SERVER_ERROR = 500;

    
    const HTTP_NOT_IMPLEMENTED = 501;
    const HTTP_BAD_GATEWAY = 502;
    const HTTP_SERVICE_UNAVAILABLE = 503;
    const HTTP_GATEWAY_TIMEOUT = 504;
    const HTTP_VERSION_NOT_SUPPORTED = 505;
    const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL = 506;                        
    const HTTP_INSUFFICIENT_STORAGE = 507;                                        
    const HTTP_LOOP_DETECTED = 508;                                               
    const HTTP_NOT_EXTENDED = 510;                                                
    const HTTP_NETWORK_AUTHENTICATION_REQUIRED = 511;

    
    protected $Vnmjveds032j = NULL;

    
    protected $Vqjdbxwow5vq = [];

    
    protected $V2pn5kxe3a2l = ['get', 'delete', 'post', 'put', 'options', 'patch', 'head'];

    
    protected $Vntg4bz5sdqr = NULL;

    
    protected $Vpa2qbhtxuyd = NULL;

    
    protected $Vqh4z00g5xm4 = NULL;

    
    protected $Vz2ziqtsz5qh = [];

    
    protected $V2uts4gvjej1 = [];

    
    protected $Vcxyzatanlfo = [];

    
    protected $Vngb4vkod2h2 = [];

    
    protected $V2no3wey242p = [];

    
    protected $V2mt2g05sff1 = [];

    
    protected $V30jggtpqhld = [];

    
    protected $Vrrrsd0bzuta = [];

    
    protected $Vpyjn0i3wcgy = [];

    
    protected $Vd4wxgg02rzs = '';

    
    protected $Vbmk3lp22hhm = TRUE;

    
    protected $Vpdl1apg2dct = '';

    
    protected $Vk3zzjeqbvgr = '';

    
    protected $V5114pjec2r5 = '';

    
    protected $Vboyhzodexdz = [
            'json' => 'application/json',
            'array' => 'application/json',
            'csv' => 'application/csv',
            'html' => 'text/html',
            'jsonp' => 'application/javascript',
            'php' => 'text/plain',
            'serialized' => 'application/vnd.php.serialized',
            'xml' => 'application/xml'
        ];

    
    protected $Vcfcxh3uoqz1;

    
    protected $Vpzyojklccmh = NULL;

    
    protected $V3yczjyyes4f = FALSE;

    
    protected $Vid1yjtz0cm3 = [
        self::HTTP_OK => 'OK',
        self::HTTP_CREATED => 'CREATED',
        self::HTTP_NO_CONTENT => 'NO CONTENT',
        self::HTTP_NOT_MODIFIED => 'NOT MODIFIED',
        self::HTTP_BAD_REQUEST => 'BAD REQUEST',
        self::HTTP_UNAUTHORIZED => 'UNAUTHORIZED',
        self::HTTP_FORBIDDEN => 'FORBIDDEN',
        self::HTTP_NOT_FOUND => 'NOT FOUND',
        self::HTTP_METHOD_NOT_ALLOWED => 'METHOD NOT ALLOWED',
        self::HTTP_NOT_ACCEPTABLE => 'NOT ACCEPTABLE',
        self::HTTP_CONFLICT => 'CONFLICT',
        self::HTTP_INTERNAL_SERVER_ERROR => 'INTERNAL SERVER ERROR',
        self::HTTP_NOT_IMPLEMENTED => 'NOT IMPLEMENTED'
    ];

    
    protected function early_checks()
    {
    }

    
    public function __construct($Vnmcm15juye5 = 'rest')
    {
        parent::__construct();

        $this->preflight_checks();

        
        $this->_enable_xss = ($this->config->item('global_xss_filtering') === TRUE);

        
        
        $this->output->parse_exec_vars = FALSE;

        
        $this->_start_rtime = microtime(TRUE);

        
        $this->load->config($Vnmcm15juye5);

        
        $this->load->library('format');

        
        $Vjrc0aoq5t0k = $this->config->item('rest_supported_formats');

        
        if (empty($Vjrc0aoq5t0k))
        {
            $Vjrc0aoq5t0k = [];
        }

        if ( ! is_array($Vjrc0aoq5t0k))
        {
            $Vjrc0aoq5t0k = [$Vjrc0aoq5t0k];
        }

        
        $Vitnaadzhrfb = $this->_get_default_output_format();
        if (!in_array($Vitnaadzhrfb, $Vjrc0aoq5t0k))
        {
            $Vjrc0aoq5t0k[] = $Vitnaadzhrfb;
        }

        
        $this->_supported_formats = array_intersect_key($this->_supported_formats, array_flip($Vjrc0aoq5t0k));

        
        $V2rlwdemuhq5 = $this->config->item('rest_language');
        if ($V2rlwdemuhq5 === NULL)
        {
            $V2rlwdemuhq5 = 'english';
        }

        
        $this->lang->load('rest_controller', $V2rlwdemuhq5);

        
        $this->request = new stdClass();
        $this->response = new stdClass();
        $this->rest = new stdClass();

        
        if ($this->config->item('rest_ip_blacklist_enabled') === TRUE)
        {
            $this->_check_blacklist_auth();
        }

        
        $this->request->ssl = is_https();

        
        $this->request->method = $this->_detect_method();

        
        $Vpzyojklccmh = $this->config->item('check_cors');
        if ($Vpzyojklccmh === TRUE)
        {
            $this->_check_cors();
        }

        
        if (isset($this->{'_'.$this->request->method.'_args'}) === FALSE)
        {
            $this->{'_'.$this->request->method.'_args'} = [];
        }

        
        $this->_parse_query();

        
        $this->_get_args = array_merge($this->_get_args, $this->uri->ruri_to_assoc());

        
        $this->request->format = $this->_detect_input_format();

        
        $this->request->body = NULL;

        $this->{'_parse_' . $this->request->method}();

        
        if ($this->request->format && $this->request->body)
        {
            $this->request->body = $this->format->factory($this->request->body, $this->request->format)->to_array();
            
            $this->{'_'.$this->request->method.'_args'} = $this->request->body;
        }

        
        $this->_head_args = $this->input->request_headers();

        
        $this->_args = array_merge(
            $this->_get_args,
            $this->_options_args,
            $this->_patch_args,
            $this->_head_args,
            $this->_put_args,
            $this->_post_args,
            $this->_delete_args,
            $this->{'_'.$this->request->method.'_args'}
        );

        
        $this->response->format = $this->_detect_output_format();

        
        $this->response->lang = $this->_detect_lang();

        
        $this->early_checks();

        
        if ($this->config->item('rest_database_group') && ($this->config->item('rest_enable_keys') || $this->config->item('rest_enable_logging')))
        {
            $this->rest->db = $this->load->database($this->config->item('rest_database_group'), TRUE);
        }

        
        elseif (property_exists($this, 'db'))
        {
            $this->rest->db = $this->db;
        }

        
        
        $this->auth_override = $this->_auth_override_check();

        
        
        if ($this->config->item('rest_enable_keys') && $this->auth_override !== TRUE)
        {
            $this->_allow = $this->_detect_api_key();
        }

        
        if ($this->input->is_ajax_request() === FALSE && $this->config->item('rest_ajax_only'))
        {
            
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_ajax_only')
                ], self::HTTP_NOT_ACCEPTABLE);
        }

        
        if ($this->auth_override === FALSE &&
            (! ($this->config->item('rest_enable_keys') && $this->_allow === TRUE) ||
            ($this->config->item('allow_auth_and_keys') === TRUE && $this->_allow === TRUE)))
        {
            $Vqh4z00g5xm4_auth = strtolower($this->config->item('rest_auth'));
            switch ($Vqh4z00g5xm4_auth)
            {
                case 'basic':
                    $this->_prepare_basic_auth();
                    break;
                case 'digest':
                    $this->_prepare_digest_auth();
                    break;
                case 'session':
                    $this->_check_php_session();
                    break;
            }
            if ($this->config->item('rest_ip_whitelist_enabled') === TRUE)
            {
                $this->_check_whitelist_auth();
            }
        }
    }

    
    public function __destruct()
    {
        
        $this->_end_rtime = microtime(TRUE);

        
        if ($this->config->item('rest_enable_logging') === TRUE)
        {
            $this->_log_access_time();
        }
    }

    
    protected function preflight_checks()
    {
        
        if (is_php('5.4') === FALSE)
        {
            
            throw new Exception('Using PHP v'.PHP_VERSION.', though PHP v5.4 or greater is required');
        }

        
        if (explode('.', CI_VERSION, 2)[0] < 3)
        {
            throw new Exception('REST Server requires CodeIgniter 3.x');
        }
    }

    
    public function _remap($Vo3ceptz0yk4, $Vg44epnxeiog = [])
    {
        
        if ($this->config->item('force_https') && $this->request->ssl === FALSE)
        {
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unsupported')
                ], self::HTTP_FORBIDDEN);
        }

        
        $Vo3ceptz0yk4 = preg_replace('/^(.*)\.(?:'.implode('|', array_keys($this->_supported_formats)).')$/', '$1', $Vo3ceptz0yk4);

        $Vlsssm30lksr = $Vo3ceptz0yk4.'_'.$this->request->method;

        
        $Vputnieksy1a = ! (isset($this->methods[$Vlsssm30lksr]['log']) && $this->methods[$Vlsssm30lksr]['log'] === FALSE);

        
        $Vuane5rd1rfq = ! (isset($this->methods[$Vlsssm30lksr]['key']) && $this->methods[$Vlsssm30lksr]['key'] === FALSE);

        
        if ($this->config->item('rest_enable_keys') && $Vuane5rd1rfq && $this->_allow === FALSE)
        {
            if ($this->config->item('rest_enable_logging') && $Vputnieksy1a)
            {
                $this->_log_request();
            }

            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => sprintf($this->lang->line('text_rest_invalid_api_key'), $this->rest->key)
                ], self::HTTP_FORBIDDEN);
        }

        
        if ($this->config->item('rest_enable_keys') && $Vuane5rd1rfq && empty($this->rest->key) === FALSE && $this->_check_access() === FALSE)
        {
            if ($this->config->item('rest_enable_logging') && $Vputnieksy1a)
            {
                $this->_log_request();
            }

            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_unauthorized')
                ], self::HTTP_UNAUTHORIZED);
        }

        
        if (!method_exists($this, $Vlsssm30lksr))
        {
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unknown_method')
                ], self::HTTP_METHOD_NOT_ALLOWED);
        }

        
        if ($this->config->item('rest_enable_keys') && empty($this->rest->key) === FALSE)
        {
            
            if ($this->config->item('rest_enable_limits') && $this->_check_limit($Vlsssm30lksr) === FALSE)
            {
                $Vpa2qbhtxuyd = [$this->config->item('rest_status_field_name') => FALSE, $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_time_limit')];
                $this->response($Vpa2qbhtxuyd, self::HTTP_UNAUTHORIZED);
            }

            
            $Vfy3tdxkf42p = isset($this->methods[$Vlsssm30lksr]['level']) ? $this->methods[$Vlsssm30lksr]['level'] : 0;

            
            $Vlequcjrv535 = $Vfy3tdxkf42p <= $this->rest->level;
            
            if ($this->config->item('rest_enable_logging') && $Vputnieksy1a)
            {
                $this->_log_request($Vlequcjrv535);
            }
            if($Vlequcjrv535 === FALSE)
            {
                
                $Vpa2qbhtxuyd = [$this->config->item('rest_status_field_name') => FALSE, $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_api_key_permissions')];
                $this->response($Vpa2qbhtxuyd, self::HTTP_UNAUTHORIZED);
            }
        }

        
        elseif ($this->config->item('rest_enable_logging') && $Vputnieksy1a)
        {
            $this->_log_request($Vlequcjrv535 = TRUE);
        }

        
        try
        {
            call_user_func_array([$this, $Vlsssm30lksr], $Vg44epnxeiog);
        }
        catch (Exception $Vpp2snfngqmy)
        {
            
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => [
                        'classname' => get_class($Vpp2snfngqmy),
                        'message' => $Vpp2snfngqmy->getMessage()
                    ]
                ], self::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    
    public function response($Vfeinw1hsfej = NULL, $Vdqkcsbrbd3i = NULL, $Vdeekuyk5us1 = FALSE)
    {
        
        if ($Vdqkcsbrbd3i !== NULL)
        {
            
            $Vdqkcsbrbd3i = (int) $Vdqkcsbrbd3i;
        }

        
        $Vzxix2pqoztx = NULL;

        
        if ($Vfeinw1hsfej === NULL && $Vdqkcsbrbd3i === NULL)
        {
            $Vdqkcsbrbd3i = self::HTTP_NOT_FOUND;
        }

        
        elseif ($Vfeinw1hsfej !== NULL)
        {
            
            if (method_exists($this->format, 'to_' . $this->response->format))
            {
                
                $this->output->set_content_type($this->_supported_formats[$this->response->format], strtolower($this->config->item('charset')));
                $Vzxix2pqoztx = $this->format->factory($Vfeinw1hsfej)->{'to_' . $this->response->format}();

                
                
                if ($this->response->format === 'array')
                {
                    $Vzxix2pqoztx = $this->format->factory($Vzxix2pqoztx)->{'to_json'}();
                }
            }
            else
            {
                
                if (is_array($Vfeinw1hsfej) || is_object($Vfeinw1hsfej))
                {
                    $Vfeinw1hsfej = $this->format->factory($Vfeinw1hsfej)->{'to_json'}();
                }

                
                $Vzxix2pqoztx = $Vfeinw1hsfej;
            }
        }

        
        
        
        $Vdqkcsbrbd3i > 0 || $Vdqkcsbrbd3i = self::HTTP_OK;

        $this->output->set_status_header($Vdqkcsbrbd3i);

        
        if ($this->config->item('rest_enable_logging') === TRUE)
        {
            $this->_log_response_code($Vdqkcsbrbd3i);
        }

        
        $this->output->set_output($Vzxix2pqoztx);

        if ($Vdeekuyk5us1 === FALSE)
        {
            
            $this->output->_display();
            exit;
        }

        
    }

    
    public function set_response($Vfeinw1hsfej = NULL, $Vdqkcsbrbd3i = NULL)
    {
        $this->response($Vfeinw1hsfej, $Vdqkcsbrbd3i, TRUE);
    }

    
    protected function _detect_input_format()
    {
        
        $Vufdwaydwcen = $this->input->server('CONTENT_TYPE');

        if (empty($Vufdwaydwcen) === FALSE)
        {
            
            
            $Vufdwaydwcen = (strpos($Vufdwaydwcen, ';') !== FALSE ? current(explode(';', $Vufdwaydwcen)) : $Vufdwaydwcen);

            
            foreach ($this->_supported_formats as $V4wtbblc1wn4 => $Vf4dlektv1ba)
            {
                
                

                
                if ($Vufdwaydwcen === $Vf4dlektv1ba)
                {
                    return $V4wtbblc1wn4;
                }
            }
        }

        return NULL;
    }

    
    protected function _get_default_output_format()
    {
        $Vitnaadzhrfb = (string) $this->config->item('rest_default_format');
        return $Vitnaadzhrfb === '' ? 'json' : $Vitnaadzhrfb;
    }

    
    protected function _detect_output_format()
    {
        
        $Vgq2p33sysyd = '/\.('.implode('|', array_keys($this->_supported_formats)).')($|\/)/';
        $Vmbknpbfqa1s = [];

        
        if (preg_match($Vgq2p33sysyd, $this->uri->uri_string(), $Vmbknpbfqa1s))
        {
            return $Vmbknpbfqa1s[1];
        }

        
        if (isset($this->_get_args['format']))
        {
            $V2st5jsptpir = strtolower($this->_get_args['format']);

            if (isset($this->_supported_formats[$V2st5jsptpir]) === TRUE)
            {
                return $V2st5jsptpir;
            }
        }

        
        $Vtk4pvfy4evq = $this->input->server('HTTP_ACCEPT');

        
        if ($this->config->item('rest_ignore_http_accept') === FALSE && $Vtk4pvfy4evq !== NULL)
        {
            
            foreach (array_keys($this->_supported_formats) as $V2st5jsptpir)
            {
                
                if (strpos($Vtk4pvfy4evq, $V2st5jsptpir) !== FALSE)
                {
                    if ($V2st5jsptpir !== 'html' && $V2st5jsptpir !== 'xml')
                    {
                        
                        return $V2st5jsptpir;
                    }
                    elseif ($V2st5jsptpir === 'html' && strpos($Vtk4pvfy4evq, 'xml') === FALSE)
                    {
                        
                        
                        return $V2st5jsptpir;
                    }
                    else if ($V2st5jsptpir === 'xml' && strpos($Vtk4pvfy4evq, 'html') === FALSE)
                    {
                        
                        return $V2st5jsptpir;
                    }
                }
            }
        }

        
        if (empty($this->rest_format) === FALSE)
        {
            return $this->rest_format;
        }

        
        return $this->_get_default_output_format();
    }

    
    protected function _detect_method()
    {
        
        $V5dsbozs5xhq = NULL;

        
        if ($this->config->item('enable_emulate_request') === TRUE)
        {
            $V5dsbozs5xhq = $this->input->post('_method');
            if ($V5dsbozs5xhq === NULL)
            {
                $V5dsbozs5xhq = $this->input->server('HTTP_X_HTTP_METHOD_OVERRIDE');
            }

            $V5dsbozs5xhq = strtolower($V5dsbozs5xhq);
        }

        if (empty($V5dsbozs5xhq))
        {
            
            $V5dsbozs5xhq = $this->input->method();
        }

        return in_array($V5dsbozs5xhq, $this->allowed_http_methods) && method_exists($this, '_parse_' . $V5dsbozs5xhq) ? $V5dsbozs5xhq : 'get';
    }

    
    protected function _detect_api_key()
    {
        
        $V5efcddcskt4 = $this->config->item('rest_key_name');

        
        $Vfh5zvm1ldfo = 'HTTP_' . strtoupper(str_replace('-', '_', $V5efcddcskt4));

        $this->rest->key = NULL;
        $this->rest->level = NULL;
        $this->rest->user_id = NULL;
        $this->rest->ignore_limits = FALSE;

        
        if (($V2xim30qek4u = isset($this->_args[$V5efcddcskt4]) ? $this->_args[$V5efcddcskt4] : $this->input->server($Vfh5zvm1ldfo)))
        {
            if ( ! ($Vf3jo4nkd2sr = $this->rest->db->where($this->config->item('rest_key_column'), $V2xim30qek4u)->get($this->config->item('rest_keys_table'))->row()))
            {
                return FALSE;
            }

            $this->rest->key = $Vf3jo4nkd2sr->{$this->config->item('rest_key_column')};

            isset($Vf3jo4nkd2sr->user_id) && $this->rest->user_id = $Vf3jo4nkd2sr->user_id;
            isset($Vf3jo4nkd2sr->level) && $this->rest->level = $Vf3jo4nkd2sr->level;
            isset($Vf3jo4nkd2sr->ignore_limits) && $this->rest->ignore_limits = $Vf3jo4nkd2sr->ignore_limits;

            $this->_apiuser = $Vf3jo4nkd2sr;

            
            if (empty($Vf3jo4nkd2sr->is_private_key) === FALSE)
            {
                
                if (isset($Vf3jo4nkd2sr->ip_addresses))
                {
                    
                    $Vlawhqmcnc4d = explode(',', $Vf3jo4nkd2sr->ip_addresses);
                    $Vvjlbtfhaci4 = FALSE;

                    foreach ($Vlawhqmcnc4d as $Vcnuiqtjibnj)
                    {
                        if ($this->input->ip_address() === trim($Vcnuiqtjibnj))
                        {
                            
                            $Vvjlbtfhaci4 = TRUE;
                            break;
                        }
                    }

                    return $Vvjlbtfhaci4;
                }
                else
                {
                    
                    return FALSE;
                }
            }

            return TRUE;
        }

        
        return FALSE;
    }

    
    protected function _detect_lang()
    {
        $V0epxtzjncyc = $this->input->server('HTTP_ACCEPT_LANGUAGE');
        if ($V0epxtzjncyc === NULL)
        {
            return NULL;
        }

        
        if (strpos($V0epxtzjncyc, ',') !== FALSE)
        {
            $V0epxtzjncycs = explode(',', $V0epxtzjncyc);

            $Vwh1u1ekwpab = [];
            foreach ($V0epxtzjncycs as $V0epxtzjncyc)
            {
                
                list($V0epxtzjncyc) = explode(';', $V0epxtzjncyc);
                $Vwh1u1ekwpab[] = trim($V0epxtzjncyc);
            }

            return $Vwh1u1ekwpab;
        }

        
        return $V0epxtzjncyc;
    }

    
    protected function _log_request($Vlequcjrv535 = FALSE)
    {
        
        $Vl5widjcf0ex = $this->rest->db
            ->insert(
                $this->config->item('rest_logs_table'), [
                'uri' => $this->uri->uri_string(),
                'method' => $this->request->method,
                'params' => $this->_args ? ($this->config->item('rest_logs_json_params') === TRUE ? json_encode($this->_args) : serialize($this->_args)) : NULL,
                'api_key' => isset($this->rest->key) ? $this->rest->key : '',
                'ip_address' => $this->input->ip_address(),
                'time' => time(),
                'authorized' => $Vlequcjrv535
            ]);

        
        $this->_insert_id = $this->rest->db->insert_id();

        return $Vl5widjcf0ex;
    }

    
    protected function _check_limit($Vlsssm30lksr)
    {
        
        if (empty($this->rest->ignore_limits) === FALSE)
        {
            
            return TRUE;
        }

        switch ($this->config->item('rest_limits_method'))
        {
          case 'API_KEY':
            $Vstjkg4tihku = 'api-key:' . (isset($this->rest->key) ? $this->rest->key : '');
            $Vbkj3iuqdhon = isset($this->rest->key) ? $this->rest->key : '';
            break;

          case 'METHOD_NAME':
            $Vstjkg4tihku = 'method-name:' . $Vlsssm30lksr;
            $Vbkj3iuqdhon =  $Vlsssm30lksr;
            break;

          case 'ROUTED_URL':
          default:
            $Vstjkg4tihku = $this->uri->ruri_string();
            if (strpos(strrev($Vstjkg4tihku), strrev($this->response->format)) === 0)
            {
                $Vstjkg4tihku = substr($Vstjkg4tihku,0, -strlen($this->response->format) - 1);
            }
            $Vstjkg4tihku = 'uri:'.$Vstjkg4tihku.':'.$this->request->method; 
            $Vbkj3iuqdhon = $Vlsssm30lksr;
            break;
        }

        if (isset($this->methods[$Vbkj3iuqdhon]['limit']) === FALSE )
        {
            
            return TRUE;
        }

        
        $V2bur4u05u2g = $this->methods[$Vbkj3iuqdhon]['limit'];

        $Vw0s1ft3fni3 = (isset($this->methods[$Vbkj3iuqdhon]['time']) ? $this->methods[$Vbkj3iuqdhon]['time'] : 3600); 

        
        $Voetc43kt2cr = $this->rest->db
            ->where('uri', $Vstjkg4tihku)
            ->where('api_key', $this->rest->key)
            ->get($this->config->item('rest_limits_table'))
            ->row();

        
        if ($Voetc43kt2cr === NULL)
        {
            
            $this->rest->db->insert($this->config->item('rest_limits_table'), [
                'uri' => $Vstjkg4tihku,
                'api_key' => isset($this->rest->key) ? $this->rest->key : '',
                'count' => 1,
                'hour_started' => time()
            ]);
        }

        
        elseif ($Voetc43kt2cr->hour_started < (time() - $Vw0s1ft3fni3))
        {
            
            $this->rest->db
                ->where('uri', $Vstjkg4tihku)
                ->where('api_key', isset($this->rest->key) ? $this->rest->key : '')
                ->set('hour_started', time())
                ->set('count', 1)
                ->update($this->config->item('rest_limits_table'));
        }

        
        else
        {
            
            if ($Voetc43kt2cr->count >= $V2bur4u05u2g)
            {
                return FALSE;
            }

            
            $this->rest->db
                ->where('uri', $Vstjkg4tihku)
                ->where('api_key', $this->rest->key)
                ->set('count', 'count + 1', FALSE)
                ->update($this->config->item('rest_limits_table'));
        }

        return TRUE;
    }

    
    protected function _auth_override_check()
    {
        
        $Vxi4og1dpltg = $this->config->item('auth_override_class_method');

        
        if ( ! empty($Vxi4og1dpltg))
        {
            
            if ( ! empty($Vxi4og1dpltg[$this->router->class]['*'])) 
            {
                
                if ($Vxi4og1dpltg[$this->router->class]['*'] === 'none')
                {
                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class]['*'] === 'basic')
                {
                    $this->_prepare_basic_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class]['*'] === 'digest')
                {
                    $this->_prepare_digest_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class]['*'] === 'session')
                {
                    $this->_check_php_session();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class]['*'] === 'whitelist')
                {
                    $this->_check_whitelist_auth();

                    return TRUE;
                }
            }

            
            if ( ! empty($Vxi4og1dpltg[$this->router->class][$this->router->method]))
            {
                
                if ($Vxi4og1dpltg[$this->router->class][$this->router->method] === 'none')
                {
                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class][$this->router->method] === 'basic')
                {
                    $this->_prepare_basic_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class][$this->router->method] === 'digest')
                {
                    $this->_prepare_digest_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class][$this->router->method] === 'session')
                {
                    $this->_check_php_session();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg[$this->router->class][$this->router->method] === 'whitelist')
                {
                    $this->_check_whitelist_auth();

                    return TRUE;
                }
            }
        }

        
        $Vxi4og1dpltg_http = $this->config->item('auth_override_class_method_http');

        
        if ( ! empty($Vxi4og1dpltg_http))
        {
            
            if ( ! empty($Vxi4og1dpltg_http[$this->router->class]['*'][$this->request->method]))
            {
                
                if ($Vxi4og1dpltg_http[$this->router->class]['*'][$this->request->method] === 'none')
                {
                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class]['*'][$this->request->method] === 'basic')
                {
                    $this->_prepare_basic_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class]['*'][$this->request->method] === 'digest')
                {
                    $this->_prepare_digest_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class]['*'][$this->request->method] === 'session')
                {
                    $this->_check_php_session();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class]['*'][$this->request->method] === 'whitelist')
                {
                    $this->_check_whitelist_auth();

                    return TRUE;
                }
            }

            
            if ( ! empty($Vxi4og1dpltg_http[$this->router->class][$this->router->method][$this->request->method]))
            {
                
                if ($Vxi4og1dpltg_http[$this->router->class][$this->router->method][$this->request->method] === 'none')
                {
                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class][$this->router->method][$this->request->method] === 'basic')
                {
                    $this->_prepare_basic_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class][$this->router->method][$this->request->method] === 'digest')
                {
                    $this->_prepare_digest_auth();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class][$this->router->method][$this->request->method] === 'session')
                {
                    $this->_check_php_session();

                    return TRUE;
                }

                
                if ($Vxi4og1dpltg_http[$this->router->class][$this->router->method][$this->request->method] === 'whitelist')
                {
                    $this->_check_whitelist_auth();

                    return TRUE;
                }
            }
        }
        return FALSE;
    }

    
    protected function _parse_get()
    {
        
        $this->_get_args = array_merge($this->_get_args, $this->_query_args);
    }

    
    protected function _parse_post()
    {
        $this->_post_args = $_POST;

        if ($this->request->format)
        {
            $this->request->body = $this->input->raw_input_stream;
        }
    }

    
    protected function _parse_put()
    {
        if ($this->request->format)
        {
            $this->request->body = $this->input->raw_input_stream;
            if ($this->request->format === 'json')
            {
                $this->_put_args = json_decode($this->input->raw_input_stream);
            }
        }
        else if ($this->input->method() === 'put')
        {
           
           $this->_put_args = $this->input->input_stream();
        }
    }

    
    protected function _parse_head()
    {
        
        parse_str(parse_url($this->input->server('REQUEST_URI'), PHP_URL_QUERY), $V1rrtlq2tqnc);

        
        $this->_head_args = array_merge($this->_head_args, $V1rrtlq2tqnc);
    }

    
    protected function _parse_options()
    {
        
        parse_str(parse_url($this->input->server('REQUEST_URI'), PHP_URL_QUERY), $V1flr55fnyyv);

        
        $this->_options_args = array_merge($this->_options_args, $V1flr55fnyyv);
    }

    
    protected function _parse_patch()
    {
        
        if ($this->request->format)
        {
            $this->request->body = $this->input->raw_input_stream;
        }
        else if ($this->input->method() === 'patch')
        {
            
            $this->_patch_args = $this->input->input_stream();
        }
    }

    
    protected function _parse_delete()
    {
        
        if ($this->input->method() === 'delete')
        {
            $this->_delete_args = $this->input->input_stream();
        }
    }

    
    protected function _parse_query()
    {
        $this->_query_args = $this->input->get();
    }

    

    
    public function get($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_get_args;
        }

        return isset($this->_get_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_get_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    public function options($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_options_args;
        }

        return isset($this->_options_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_options_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    public function head($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_head_args;
        }

        return isset($this->_head_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_head_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    public function post($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_post_args;
        }

        return isset($this->_post_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_post_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    public function put($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_put_args;
        }

        return isset($this->_put_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_put_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    public function delete($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_delete_args;
        }

        return isset($this->_delete_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_delete_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    public function patch($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_patch_args;
        }

        return isset($this->_patch_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_patch_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    public function query($V2xim30qek4u = NULL, $Vgzlesc0sebt = NULL)
    {
        if ($V2xim30qek4u === NULL)
        {
            return $this->_query_args;
        }

        return isset($this->_query_args[$V2xim30qek4u]) ? $this->_xss_clean($this->_query_args[$V2xim30qek4u], $Vgzlesc0sebt) : NULL;
    }

    
    protected function _xss_clean($Vcnwqsowvhom, $Vgzlesc0sebt)
    {
        is_bool($Vgzlesc0sebt) || $Vgzlesc0sebt = $this->_enable_xss;

        return $Vgzlesc0sebt === TRUE ? $this->security->xss_clean($Vcnwqsowvhom) : $Vcnwqsowvhom;
    }

    
    public function validation_errors()
    {
        $Vxgpowef4o2f = strip_tags($this->form_validation->error_string());

        return explode(PHP_EOL, trim($Vxgpowef4o2f, PHP_EOL));
    }

    

    
    protected function _perform_ldap_auth($Vlukz41rasa4 = '', $Vpkw0q5n2gpv = NULL)
    {
        if (empty($Vlukz41rasa4))
        {
            log_message('debug', 'LDAP Auth: failure, empty username');
            return FALSE;
        }

        log_message('debug', 'LDAP Auth: Loading configuration');

        $this->config->load('ldap.php', TRUE);

        $Vbvqbvybx0s0 = [
            'timeout' => $this->config->item('timeout', 'ldap'),
            'host' => $this->config->item('server', 'ldap'),
            'port' => $this->config->item('port', 'ldap'),
            'rdn' => $this->config->item('binduser', 'ldap'),
            'pass' => $this->config->item('bindpw', 'ldap'),
            'basedn' => $this->config->item('basedn', 'ldap'),
        ];

        log_message('debug', 'LDAP Auth: Connect to ' . (isset($Vbvqbvybx0s0host) ? $Vbvqbvybx0s0host : '[ldap not configured]'));

        
        $Vbvqbvybx0s0conn = ldap_connect($Vbvqbvybx0s0['host'], $Vbvqbvybx0s0['port']);
        if ($Vbvqbvybx0s0conn)
        {
            log_message('debug', 'Setting timeout to '.$Vbvqbvybx0s0['timeout'].' seconds');

            ldap_set_option($Vbvqbvybx0s0conn, LDAP_OPT_NETWORK_TIMEOUT, $Vbvqbvybx0s0['timeout']);

            log_message('debug', 'LDAP Auth: Binding to '.$Vbvqbvybx0s0['host'].' with dn '.$Vbvqbvybx0s0['rdn']);

            
            $Vbvqbvybx0s0bind = ldap_bind($Vbvqbvybx0s0conn, $Vbvqbvybx0s0['rdn'], $Vbvqbvybx0s0['pass']);

            
            if ($Vbvqbvybx0s0bind === FALSE)
            {
                log_message('error', 'LDAP Auth: bind was unsuccessful');
                return FALSE;
            }

            log_message('debug', 'LDAP Auth: bind successful');
        }

        
        if (($Voaxfzl5holv = ldap_search($Vbvqbvybx0s0conn, $Vbvqbvybx0s0['basedn'], "uid=$Vlukz41rasa4")) === FALSE)
        {
            log_message('error', 'LDAP Auth: User '.$Vlukz41rasa4.' not found in search');
            return FALSE;
        }

        if (ldap_count_entries($Vbvqbvybx0s0conn, $Voaxfzl5holv) !== 1)
        {
            log_message('error', 'LDAP Auth: Failure, username '.$Vlukz41rasa4.'found more than once');
            return FALSE;
        }

        if (($Vwcmkmaqnhyx = ldap_first_entry($Vbvqbvybx0s0conn, $Voaxfzl5holv)) === FALSE)
        {
            log_message('error', 'LDAP Auth: Failure, entry of search result could not be fetched');
            return FALSE;
        }

        if (($Vfxojvkhr2kc = ldap_get_dn($Vbvqbvybx0s0conn, $Vwcmkmaqnhyx)) === FALSE)
        {
            log_message('error', 'LDAP Auth: Failure, user-dn could not be fetched');
            return FALSE;
        }

        
        if (($Vmmb2fy31jnm = ldap_bind($Vbvqbvybx0s0conn, $Vfxojvkhr2kc, $Vpkw0q5n2gpv)) === FALSE)
        {
            log_message('error', 'LDAP Auth: Failure, username/password did not match: ' . $Vfxojvkhr2kc);
            return FALSE;
        }

        log_message('debug', 'LDAP Auth: Success '.$Vfxojvkhr2kc.' authenticated successfully');

        $this->_user_ldap_dn = $Vfxojvkhr2kc;

        ldap_close($Vbvqbvybx0s0conn);

        return TRUE;
    }

    
    protected function _perform_library_auth($Vlukz41rasa4 = '', $Vpkw0q5n2gpv = NULL)
    {
        if (empty($Vlukz41rasa4))
        {
            log_message('error', 'Library Auth: Failure, empty username');
            return FALSE;
        }

        $Vz0rcxqfuhin = strtolower($this->config->item('auth_library_class'));
        $Vcljl2fwtqc1 = strtolower($this->config->item('auth_library_function'));

        if (empty($Vz0rcxqfuhin))
        {
            log_message('debug', 'Library Auth: Failure, empty auth_library_class');
            return FALSE;
        }

        if (empty($Vcljl2fwtqc1))
        {
            log_message('debug', 'Library Auth: Failure, empty auth_library_function');
            return FALSE;
        }

        if (is_callable([$Vz0rcxqfuhin, $Vcljl2fwtqc1]) === FALSE)
        {
            $this->load->library($Vz0rcxqfuhin);
        }

        return $this->{$Vz0rcxqfuhin}->$Vcljl2fwtqc1($Vlukz41rasa4, $Vpkw0q5n2gpv);
    }

    
    protected function _check_login($Vlukz41rasa4 = NULL, $Vpkw0q5n2gpv = FALSE)
    {
        if (empty($Vlukz41rasa4))
        {
            return FALSE;
        }

        $Voodvg52pe4i = strtolower($this->config->item('auth_source'));
        $Vqh4z00g5xm4_auth = strtolower($this->config->item('rest_auth'));
        $Vy1u5s1kycrk = $this->config->item('rest_valid_logins');

        if ( ! $this->config->item('auth_source') && $Vqh4z00g5xm4_auth === 'digest')
        {
            
            return md5($Vlukz41rasa4.':'.$this->config->item('rest_realm').':'.(isset($Vy1u5s1kycrk[$Vlukz41rasa4]) ? $Vy1u5s1kycrk[$Vlukz41rasa4] : ''));
        }

        if ($Vpkw0q5n2gpv === FALSE)
        {
            return FALSE;
        }

        if ($Voodvg52pe4i === 'ldap')
        {
            log_message('debug', "Performing LDAP authentication for $Vlukz41rasa4");

            return $this->_perform_ldap_auth($Vlukz41rasa4, $Vpkw0q5n2gpv);
        }

        if ($Voodvg52pe4i === 'library')
        {
            log_message('debug', "Performing Library authentication for $Vlukz41rasa4");

            return $this->_perform_library_auth($Vlukz41rasa4, $Vpkw0q5n2gpv);
        }

        if (array_key_exists($Vlukz41rasa4, $Vy1u5s1kycrk) === FALSE)
        {
            return FALSE;
        }

        if ($Vy1u5s1kycrk[$Vlukz41rasa4] !== $Vpkw0q5n2gpv)
        {
            return FALSE;
        }

        return TRUE;
    }

    
    protected function _check_php_session()
    {
        
        $V2xim30qek4u = $this->config->item('auth_source');

        
        if ( ! $this->session->userdata($V2xim30qek4u))
        {
            
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unauthorized')
                ], self::HTTP_UNAUTHORIZED);
        }
    }

    
    protected function _prepare_basic_auth()
    {
        
        if ($this->config->item('rest_ip_whitelist_enabled'))
        {
            $this->_check_whitelist_auth();
        }

        
        $Vlukz41rasa4 = $this->input->server('PHP_AUTH_USER');
        $Vrzfuwuy22ui = $this->input->server('HTTP_AUTHENTICATION');

        $Vpkw0q5n2gpv = NULL;
        if ($Vlukz41rasa4 !== NULL)
        {
            $Vpkw0q5n2gpv = $this->input->server('PHP_AUTH_PW');
        }
        elseif ($Vrzfuwuy22ui !== NULL)
        {
            
            
            if (strpos(strtolower($Vrzfuwuy22ui), 'basic') === 0)
            {
                
                list($Vlukz41rasa4, $Vpkw0q5n2gpv) = explode(':', base64_decode(substr($this->input->server('HTTP_AUTHORIZATION'), 6)));
            }
        }

        
        if ($this->_check_login($Vlukz41rasa4, $Vpkw0q5n2gpv) === FALSE)
        {
            $this->_force_login();
        }
    }

    
    protected function _prepare_digest_auth()
    {
        
        if ($this->config->item('rest_ip_whitelist_enabled'))
        {
            $this->_check_whitelist_auth();
        }

        
        
        $Vwqpcn2rohcs = $this->input->server('PHP_AUTH_DIGEST');
        if ($Vwqpcn2rohcs === NULL)
        {
            $Vwqpcn2rohcs = $this->input->server('HTTP_AUTHORIZATION');
        }

        $V4i3spre5tyu = uniqid();

        
        
        if (empty($Vwqpcn2rohcs))
        {
            $this->_force_login($V4i3spre5tyu);
        }

        
        $Vmbknpbfqa1s = [];
        preg_match_all('@(username|nonce|uri|nc|cnonce|qop|response)=[\'"]?([^\'",]+)@', $Vwqpcn2rohcs, $Vmbknpbfqa1s);
        $Vlvt4n0v3abq = (empty($Vmbknpbfqa1s[1]) || empty($Vmbknpbfqa1s[2])) ? [] : array_combine($Vmbknpbfqa1s[1], $Vmbknpbfqa1s[2]);

        
        $Vlukz41rasa4 = $this->_check_login($Vlvt4n0v3abq['username'], TRUE);
        if (array_key_exists('username', $Vlvt4n0v3abq) === FALSE || $Vlukz41rasa4 === FALSE)
        {
            $this->_force_login($V4i3spre5tyu);
        }

        $Vl3tpibhfsmr = md5(strtoupper($this->request->method).':'.$Vlvt4n0v3abq['uri']);
        $Vmvzvd0th0e1 = md5($Vlukz41rasa4.':'.$Vlvt4n0v3abq['nonce'].':'.$Vlvt4n0v3abq['nc'].':'.$Vlvt4n0v3abq['cnonce'].':'.$Vlvt4n0v3abq['qop'].':'.$Vl3tpibhfsmr);

        
        if (strcasecmp($Vlvt4n0v3abq['response'], $Vmvzvd0th0e1) !== 0)
        {
            
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_invalid_credentials')
                ], self::HTTP_UNAUTHORIZED);
        }
    }

    
    protected function _check_blacklist_auth()
    {
        
        $Vgq2p33sysyd = sprintf('/(?:,\s*|^)\Q%s\E(?=,\s*|$)/m', $this->input->ip_address());

        
        if (preg_match($Vgq2p33sysyd, $this->config->item('rest_ip_blacklist')))
        {
            
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_ip_denied')
                ], self::HTTP_UNAUTHORIZED);
        }
    }

    
    protected function _check_whitelist_auth()
    {
        $Vpbggv5rpmis = explode(',', $this->config->item('rest_ip_whitelist'));

        array_push($Vpbggv5rpmis, '127.0.0.1', '0.0.0.0');

        foreach ($Vpbggv5rpmis as &$V3wsvtbbxvei)
        {
            
            
            $V3wsvtbbxvei = trim($V3wsvtbbxvei);
        }

        if (in_array($this->input->ip_address(), $Vpbggv5rpmis) === FALSE)
        {
            $this->response([
                    $this->config->item('rest_status_field_name') => FALSE,
                    $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_ip_unauthorized')
                ], self::HTTP_UNAUTHORIZED);
        }
    }

    
    protected function _force_login($Vk43fvujbw4m = '')
    {
        $Vqh4z00g5xm4_auth = $this->config->item('rest_auth');
        $Vqh4z00g5xm4_realm = $this->config->item('rest_realm');
        if (strtolower($Vqh4z00g5xm4_auth) === 'basic')
        {
            
            header('WWW-Authenticate: Basic realm="'.$Vqh4z00g5xm4_realm.'"');
        }
        elseif (strtolower($Vqh4z00g5xm4_auth) === 'digest')
        {
            
            header(
                'WWW-Authenticate: Digest realm="'.$Vqh4z00g5xm4_realm
                .'", qop="auth", nonce="'.$Vk43fvujbw4m
                .'", opaque="' . md5($Vqh4z00g5xm4_realm).'"');
        }

        
        $this->response([
                $this->config->item('rest_status_field_name') => FALSE,
                $this->config->item('rest_message_field_name') => $this->lang->line('text_rest_unauthorized')
            ], self::HTTP_UNAUTHORIZED);
    }

    
    protected function _log_access_time()
    {
        $Vslgp0k341xf['rtime'] = $this->_end_rtime - $this->_start_rtime;

        return $this->rest->db->update(
                $this->config->item('rest_logs_table'), $Vslgp0k341xf, [
                'id' => $this->_insert_id
            ]);
    }

    
    protected function _log_response_code($Vdqkcsbrbd3i)
    {
        $Vslgp0k341xf['response_code'] = $Vdqkcsbrbd3i;

        return $this->rest->db->update(
            $this->config->item('rest_logs_table'), $Vslgp0k341xf, [
            'id' => $this->_insert_id
        ]);
    }

    
    protected function _check_access()
    {
        
        if ($this->config->item('rest_enable_access') === FALSE)
        {
            return TRUE;
        }
        
        
        $Vvyrcbfrvbua = $this->rest->db
            ->where('key', $this->rest->key)
            ->get($this->config->item('rest_access_table'))->row_array();
        
        if (!empty($Vvyrcbfrvbua) && !empty($Vvyrcbfrvbua['all_access']))
        {
        	return TRUE;
        }

        
        $Vhu2a2k1d152 = implode(
            '/', [
            $this->router->directory,
            $this->router->class
        ]);

        
        $Vhu2a2k1d152 = str_replace('//', '/', $Vhu2a2k1d152);

        
        return $this->rest->db
            ->where('key', $this->rest->key)
            ->where('controller', $Vhu2a2k1d152)
            ->get($this->config->item('rest_access_table'))
            ->num_rows() > 0;
    }

    
    protected function _check_cors()
    {
        
        $Vhvmzcrbubwb = implode(' ,', $this->config->item('allowed_cors_headers'));
        $Vdhiij1e2hav = implode(' ,', $this->config->item('allowed_cors_methods'));

        
        if ($this->config->item('allow_any_cors_domain') === TRUE)
        {
            header('Access-Control-Allow-Origin: *');
            header('Access-Control-Allow-Headers: '.$Vhvmzcrbubwb);
            header('Access-Control-Allow-Methods: '.$Vdhiij1e2hav);
        }
        else
        {
            
            
            $V2apx12xeiot = $this->input->server('HTTP_ORIGIN');
            if ($V2apx12xeiot === NULL)
            {
                $V2apx12xeiot = '';
            }

            
            if (in_array($V2apx12xeiot, $this->config->item('allowed_cors_origins')))
            {
                header('Access-Control-Allow-Origin: '.$V2apx12xeiot);
                header('Access-Control-Allow-Headers: '.$Vhvmzcrbubwb);
                header('Access-Control-Allow-Methods: '.$Vdhiij1e2hav);
            }
        }

        
        if ($this->input->method() === 'options')
        {
            exit;
        }
    }

}
