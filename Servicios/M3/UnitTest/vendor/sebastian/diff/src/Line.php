<?php


namespace SebastianBergmann\Diff;

class Line
{
    const ADDED     = 1;
    const REMOVED   = 2;
    const UNCHANGED = 3;

    
    private $V31qrja1w0r2;

    
    private $Vjdkyvjsoqdn;

    
    public function __construct($V31qrja1w0r2 = self::UNCHANGED, $Vjdkyvjsoqdn = '')
    {
        $this->type    = $V31qrja1w0r2;
        $this->content = $Vjdkyvjsoqdn;
    }

    
    public function getContent()
    {
        return $this->content;
    }

    
    public function getType()
    {
        return $this->type;
    }
}
