<?php
class Categoriaswifi_model extends MY_Model {
    
    
    function __construct()
    {
        
        $this->table = 'ZonaWifi_Categorias';
        $this->primary_key = 'idCategoria';
        $this->return_as = 'object' | 'array';
        $this->protected = array('idCategoria');
        
        $this->delete_cache_on_save = TRUE;
        $this->timestamps = FALSE;
        parent::__construct();
    }

}
?>