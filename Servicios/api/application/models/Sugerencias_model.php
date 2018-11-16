<?php
class Sugerencias_model extends MY_Model {
    
    
    function __construct()
    {
        
        $this->table = 'repos_sugerencias';
        $this->primary_key = 'repos_sugerencias';
        $this->return_as = 'object' | 'array';
        $this->protected = array('repos_sugerencias');
        
		
		
        $this->delete_cache_on_save = TRUE;
        $this->timestamps = FALSE;
        parent::__construct();
    }

}
?>