<?php
class Pedidos_model extends MY_Model {
    
    
    function __construct()
    {
        
        $this->table = 'repos_pedidoProducto_v1';
        $this->primary_key = 'pedidoProductoID';
        $this->return_as = 'object' | 'array';
        $this->protected = array('pedidoProductoID');
        
		
		
        $this->delete_cache_on_save = TRUE;
        $this->timestamps = FALSE;
        parent::__construct();
    }

}
?>