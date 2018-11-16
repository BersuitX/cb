<?php
class Leidos_model extends MY_Model {
    
    
    function __construct()
    {
        
        $this->table = 'leidos';
        $this->primary_key = 'id_leidos';
        $this->return_as = 'object' | 'array';
        $this->protected = array('id_leidos');
        
		
		
        $this->delete_cache_on_save = TRUE;
        $this->timestamps = FALSE;
        parent::__construct();
    }

}
?>