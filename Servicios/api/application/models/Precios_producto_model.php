<?php
class Precios_producto_model extends MY_Model {
    function __construct()
    {
        
        $this->table = 'repos_ProductoPrecios';
        $this->primary_key = 'productoProgramacionPrecioID';
        $this->return_as = 'object' | 'array';
        $this->protected = array('productoProgramacionPrecioID');
		
        $this->delete_cache_on_save = TRUE;
        $this->timestamps = FALSE;
        parent::__construct();
    }
}
?>