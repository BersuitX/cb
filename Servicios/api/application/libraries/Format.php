<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Format {

    
    const ARRAY_FORMAT = 'array';

    
    const CSV_FORMAT = 'csv';

    
    const JSON_FORMAT = 'json';

    
    const HTML_FORMAT = 'html';

    
    const PHP_FORMAT = 'php';

    
    const SERIALIZED_FORMAT = 'serialized';

    
    const XML_FORMAT = 'xml';

    
    const DEFAULT_FORMAT = self::JSON_FORMAT; 

    
    private $Vt3dizb1blif;

    
    protected $Vu5wjodvknd4 = [];

    
    protected $Vckkf1hyjjes = NULL;

    

    public function __construct($Vfeinw1hsfej = NULL, $Vkefvxzm3eas = NULL)
    {
        
        $this->_CI = &get_instance();

        
        $this->_CI->load->helper('inflector');

        
        if ($Vkefvxzm3eas !== NULL)
        {
            if (method_exists($this, '_from_'.$Vkefvxzm3eas))
            {
                $Vfeinw1hsfej = call_user_func([$this, '_from_'.$Vkefvxzm3eas], $Vfeinw1hsfej);
            }
            else
            {
                throw new Exception('Format class does not support conversion from "'.$Vkefvxzm3eas.'".');
            }
        }

        
        $this->_data = $Vfeinw1hsfej;
    }

    
    public function factory($Vfeinw1hsfej, $Vkefvxzm3eas = NULL)
    {
        
        

        return new static($Vfeinw1hsfej, $Vkefvxzm3eas);
    }

    

    
    public function to_array($Vfeinw1hsfej = NULL)
    {
        
        
        if ($Vfeinw1hsfej === NULL && func_num_args() === 0)
        {
            $Vfeinw1hsfej = $this->_data;
        }

        
        if (is_array($Vfeinw1hsfej) === FALSE)
        {
            $Vfeinw1hsfej = (array) $Vfeinw1hsfej;
        }

        $V5adckfdzb1d = [];
        foreach ((array) $Vfeinw1hsfej as $V2xim30qek4u => $Vcnwqsowvhom)
        {
            if (is_object($Vcnwqsowvhom) === TRUE || is_array($Vcnwqsowvhom) === TRUE)
            {
                $V5adckfdzb1d[$V2xim30qek4u] = $this->to_array($Vcnwqsowvhom);
            }
            else
            {
                $V5adckfdzb1d[$V2xim30qek4u] = $Vcnwqsowvhom;
            }
        }

        return $V5adckfdzb1d;
    }

    
    public function to_xml($Vfeinw1hsfej = NULL, $Vjtab2cpgr0f = NULL, $Vnpewptkflwt = 'xml')
    {
        if ($Vfeinw1hsfej === NULL && func_num_args() === 0)
        {
            $Vfeinw1hsfej = $this->_data;
        }

        if ($Vjtab2cpgr0f === NULL)
        {
            $Vjtab2cpgr0f = simplexml_load_string("<?xml version='1.0' encoding='utf-8'?><$Vnpewptkflwt />");
        }

        
        if (is_array($Vfeinw1hsfej) === FALSE && is_object($Vfeinw1hsfej) === FALSE)
        {
            $Vfeinw1hsfej = (array) $Vfeinw1hsfej;
        }

        foreach ($Vfeinw1hsfej as $V2xim30qek4u => $Vcnwqsowvhom)
        {

            
            if (is_bool($Vcnwqsowvhom))
            {
                $Vcnwqsowvhom = (int) $Vcnwqsowvhom;
            }

            
            if (is_numeric($V2xim30qek4u))
            {
                
                $V2xim30qek4u = (singular($Vnpewptkflwt) != $Vnpewptkflwt) ? singular($Vnpewptkflwt) : 'item';
            }

            
            $V2xim30qek4u = preg_replace('/[^a-z_\-0-9]/i', '', $V2xim30qek4u);

            if ($V2xim30qek4u === '_attributes' && (is_array($Vcnwqsowvhom) || is_object($Vcnwqsowvhom)))
            {
                $Vpkjdumwo4xn = $Vcnwqsowvhom;
                if (is_object($Vpkjdumwo4xn))
                {
                    $Vpkjdumwo4xn = get_object_vars($Vpkjdumwo4xn);
                }

                foreach ($Vpkjdumwo4xn as $Vjxpxsxcnr2t => $Volo0kwksmni)
                {
                    $Vjtab2cpgr0f->addAttribute($Vjxpxsxcnr2t, $Volo0kwksmni);
                }
            }
            
            elseif (is_array($Vcnwqsowvhom) || is_object($Vcnwqsowvhom))
            {
                $Vusxuvcl20we = $Vjtab2cpgr0f->addChild($V2xim30qek4u);

                
                $this->to_xml($Vcnwqsowvhom, $Vusxuvcl20we, $V2xim30qek4u);
            }
            else
            {
                
                $Vcnwqsowvhom = htmlspecialchars(html_entity_decode($Vcnwqsowvhom, ENT_QUOTES, 'UTF-8'), ENT_QUOTES, 'UTF-8');

                $Vjtab2cpgr0f->addChild($V2xim30qek4u, $Vcnwqsowvhom);
            }
        }

        return $Vjtab2cpgr0f->asXML();
    }

    
    public function to_html($Vfeinw1hsfej = NULL)
    {
        
        
        if ($Vfeinw1hsfej === NULL && func_num_args() === 0)
        {
            $Vfeinw1hsfej = $this->_data;
        }

        
        if (is_array($Vfeinw1hsfej) === FALSE)
        {
            $Vfeinw1hsfej = (array) $Vfeinw1hsfej;
        }

        
        if (isset($Vfeinw1hsfej[0]) && count($Vfeinw1hsfej) !== count($Vfeinw1hsfej, COUNT_RECURSIVE))
        {
            
            $Vbvmapxwxrdj = array_keys($Vfeinw1hsfej[0]);
        }
        else
        {
            
            $Vbvmapxwxrdj = array_keys($Vfeinw1hsfej);
            $Vfeinw1hsfej = [$Vfeinw1hsfej];
        }

        
        $this->_CI->load->library('table');

        $this->_CI->table->set_heading($Vbvmapxwxrdj);

        foreach ($Vfeinw1hsfej as $Vf3jo4nkd2sr)
        {
            
            
            $Vf3jo4nkd2sr = @array_map('strval', $Vf3jo4nkd2sr);

            $this->_CI->table->add_row($Vf3jo4nkd2sr);
        }

        return $this->_CI->table->generate();
    }

    
    public function to_csv($Vfeinw1hsfej = NULL, $Vmgwe2xbw2be = ',', $Vzkpkpmadqo3 = '"')
    {
        
        $Vmidmivkg0nz = fopen('php://temp/maxmemory:1048576', 'w');
        if ($Vmidmivkg0nz === FALSE)
        {
            return NULL;
        }

        
        
        if ($Vfeinw1hsfej === NULL && func_num_args() === 0)
        {
            $Vfeinw1hsfej = $this->_data;
        }

        
        if ($Vmgwe2xbw2be === NULL)
        {
            $Vmgwe2xbw2be = ',';
        }

        
        if ($Vzkpkpmadqo3 === NULL)
        {
            $Vzkpkpmadqo3 = '"';
        }

        
        if (is_array($Vfeinw1hsfej) === FALSE)
        {
            $Vfeinw1hsfej = (array) $Vfeinw1hsfej;
        }

        
        if (isset($Vfeinw1hsfej[0]) && count($Vfeinw1hsfej) !== count($Vfeinw1hsfej, COUNT_RECURSIVE))
        {
            
            $Vbvmapxwxrdj = array_keys($Vfeinw1hsfej[0]);
        }
        else
        {
            
            $Vbvmapxwxrdj = array_keys($Vfeinw1hsfej);
            $Vfeinw1hsfej = [$Vfeinw1hsfej];
        }

        
        fputcsv($Vmidmivkg0nz, $Vbvmapxwxrdj, $Vmgwe2xbw2be, $Vzkpkpmadqo3);

        foreach ($Vfeinw1hsfej as $V4qfmnyoids4)
        {
            
            
            if (is_array($V4qfmnyoids4) === FALSE)
            {
                break;
            }

            
            
            $V4qfmnyoids4 = @ array_map('strval', $V4qfmnyoids4);

            
            fputcsv($Vmidmivkg0nz, $V4qfmnyoids4, $Vmgwe2xbw2be, $Vzkpkpmadqo3);
        }

        
        rewind($Vmidmivkg0nz);

        
        $V55ndb2usu0k = stream_get_contents($Vmidmivkg0nz);

        
        fclose($Vmidmivkg0nz);

        return $V55ndb2usu0k;
    }

    
    public function to_json($Vfeinw1hsfej = NULL)
    {
        
        
        if ($Vfeinw1hsfej === NULL && func_num_args() === 0)
        {
            $Vfeinw1hsfej = $this->_data;
        }

        
        $V5qfphxtzqv1 = $this->_CI->input->get('callback');

        if (empty($V5qfphxtzqv1) === TRUE)
        {
            return json_encode($Vfeinw1hsfej, JSON_NUMERIC_CHECK);
        }

        
        elseif (preg_match('/^[a-z_\$][a-z0-9\$Vnp5ulyprp0o]*(\.[a-z_\$][a-z0-9\$Vnp5ulyprp0o]*)*$/i', $V5qfphxtzqv1))
        {
            
            return $V5qfphxtzqv1.'('.json_encode($Vfeinw1hsfej, JSON_NUMERIC_CHECK).');';
        }

        
        
        $Vfeinw1hsfej['warning'] = 'INVALID JSONP CALLBACK: '.$V5qfphxtzqv1;

        return json_encode($Vfeinw1hsfej);
    }

    
    public function to_serialized($Vfeinw1hsfej = NULL)
    {
        
        
        if ($Vfeinw1hsfej === NULL && func_num_args() === 0)
        {
            $Vfeinw1hsfej = $this->_data;
        }

        return serialize($Vfeinw1hsfej);
    }

    
    public function to_php($Vfeinw1hsfej = NULL)
    {
        
        
        if ($Vfeinw1hsfej === NULL && func_num_args() === 0)
        {
            $Vfeinw1hsfej = $this->_data;
        }

        return var_export($Vfeinw1hsfej, TRUE);
    }

    

    
    protected function _from_xml($Vfeinw1hsfej)
    {
        return $Vfeinw1hsfej ? (array) simplexml_load_string($Vfeinw1hsfej, 'SimpleXMLElement', LIBXML_NOCDATA) : [];
    }

    
    protected function _from_csv($Vfeinw1hsfej, $Vmgwe2xbw2be = ',', $Vzkpkpmadqo3 = '"')
    {
        
        if ($Vmgwe2xbw2be === NULL)
        {
            $Vmgwe2xbw2be = ',';
        }

        
        if ($Vzkpkpmadqo3 === NULL)
        {
            $Vzkpkpmadqo3 = '"';
        }

        return str_getcsv($Vfeinw1hsfej, $Vmgwe2xbw2be, $Vzkpkpmadqo3);
    }

    
    protected function _from_json($Vfeinw1hsfej)
    {
        return json_decode(trim($Vfeinw1hsfej));
    }

    
    protected function _from_serialize($Vfeinw1hsfej)
    {
        return unserialize(trim($Vfeinw1hsfej));
    }

    
    protected function _from_php($Vfeinw1hsfej)
    {
        return trim($Vfeinw1hsfej);
    }

}
