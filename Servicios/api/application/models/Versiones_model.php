<?php
class Versiones_model extends MY_Model {
    
    
    function __construct()
    {
        
        $this->table = 'versiones';
        $this->primary_key = 'id_version';
        $this->return_as = 'object' | 'array';
        $this->protected = array('id_version');
        
		
		
        $this->delete_cache_on_save = TRUE;
        $this->timestamps = FALSE;
        parent::__construct();
    }

}
?>