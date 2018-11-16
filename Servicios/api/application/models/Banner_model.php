<?php
class Banner_model extends MY_Model {
    
    
    function __construct()
    {
        
        $this->table = 'Banners';
        $this->primary_key = 'id';
        $this->return_as = 'object' | 'array';
        $this->protected = array('id');
        
        $this->delete_cache_on_save = TRUE;
        $this->timestamps = FALSE;
        parent::__construct();
    }

}
?>