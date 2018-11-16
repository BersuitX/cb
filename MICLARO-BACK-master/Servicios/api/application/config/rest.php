<?php

defined('BASEPATH') OR exit('No direct script access allowed');


$Vnmcm15juye5['force_https'] = FALSE;


$Vnmcm15juye5['rest_default_format'] = 'json';


$Vnmcm15juye5['rest_supported_formats'] = [
    'json',
    'array',
    'csv',
    'html',
    'jsonp',
    'php',
    'serialized',
    'xml',
];


$Vnmcm15juye5['rest_status_field_name'] = 'status';


$Vnmcm15juye5['rest_message_field_name'] = 'error';


$Vnmcm15juye5['enable_emulate_request'] = TRUE;


$Vnmcm15juye5['rest_realm'] = 'REST API';


$Vnmcm15juye5['rest_auth'] = FALSE;


$Vnmcm15juye5['auth_source'] = 'ldap';


$Vnmcm15juye5['allow_auth_and_keys'] = TRUE;


$Vnmcm15juye5['auth_library_class'] = '';
$Vnmcm15juye5['auth_library_function'] = '';

















$Vnmcm15juye5['rest_valid_logins'] = ['admin' => '1234'];


$Vnmcm15juye5['rest_ip_whitelist_enabled'] = FALSE;


$Vnmcm15juye5['rest_ip_whitelist'] = '';


$Vnmcm15juye5['rest_ip_blacklist_enabled'] = FALSE;


$Vnmcm15juye5['rest_ip_blacklist'] = '';


$Vnmcm15juye5['rest_database_group'] = 'default';


$Vnmcm15juye5['rest_keys_table'] = 'keys';


$Vnmcm15juye5['rest_enable_keys'] = FALSE;


$Vnmcm15juye5['rest_key_column'] = 'key';


$Vnmcm15juye5['rest_limits_method'] = 'ROUTED_URL';


$Vnmcm15juye5['rest_key_length'] = 40;


$Vnmcm15juye5['rest_key_name'] = 'X-API-KEY';


$Vnmcm15juye5['rest_enable_logging'] = FALSE;


$Vnmcm15juye5['rest_logs_table'] = 'logs';


$Vnmcm15juye5['rest_enable_access'] = FALSE;


$Vnmcm15juye5['rest_access_table'] = 'access';


$Vnmcm15juye5['rest_logs_json_params'] = FALSE;


$Vnmcm15juye5['rest_enable_limits'] = FALSE;


$Vnmcm15juye5['rest_limits_table'] = 'limits';


$Vnmcm15juye5['rest_ignore_http_accept'] = FALSE;


$Vnmcm15juye5['rest_ajax_only'] = FALSE;


$Vnmcm15juye5['rest_language'] = 'english';


$Vnmcm15juye5['check_cors'] = FALSE;


$Vnmcm15juye5['allowed_cors_headers'] = [
  'Origin',
  'X-Requested-With',
  'Content-Type',
  'Accept',
  'Access-Control-Request-Method'
];


$Vnmcm15juye5['allowed_cors_methods'] = [
  'GET',
  'POST',
  'OPTIONS',
  'PUT',
  'PATCH',
  'DELETE'
];


$Vnmcm15juye5['allow_any_cors_domain'] = FALSE;


$Vnmcm15juye5['allowed_cors_origins'] = [];
