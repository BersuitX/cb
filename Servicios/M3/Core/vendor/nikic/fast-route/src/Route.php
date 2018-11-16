<?php

namespace FastRoute;

class Route
{
    
    public $V5ea5ghz5clu;

    
    public $Vkkdxriwdugo;

    
    public $Vjmsfzk0x0dh;

    
    public $Voc34ggbfvw5;

    
    public function __construct($V5ea5ghz5clu, $Voc34ggbfvw5, $Vkkdxriwdugo, $Vjmsfzk0x0dh)
    {
        $this->httpMethod = $V5ea5ghz5clu;
        $this->handler = $Voc34ggbfvw5;
        $this->regex = $Vkkdxriwdugo;
        $this->variables = $Vjmsfzk0x0dh;
    }

    
    public function matches($Vsmyfjixp1oz)
    {
        $Vkkdxriwdugo = '~^' . $this->regex . '$~';
        return (bool) preg_match($Vkkdxriwdugo, $Vsmyfjixp1oz);
    }
}
