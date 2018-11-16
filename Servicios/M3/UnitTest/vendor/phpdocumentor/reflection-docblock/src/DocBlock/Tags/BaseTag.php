<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\DocBlock\Description;


abstract class BaseTag implements DocBlock\Tag
{
    
    protected $Vgpjmw221p0b = '';

    
    protected $Vg24o3v4hbzv;

    
    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function render(Formatter $Vwqyvsy3onct = null)
    {
        if ($Vwqyvsy3onct === null) {
            $Vwqyvsy3onct = new Formatter\PassthroughFormatter();
        }

        return $Vwqyvsy3onct->format($this);
    }
}
