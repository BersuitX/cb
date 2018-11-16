<?php


namespace phpDocumentor\Reflection\DocBlock;

use phpDocumentor\Reflection\DocBlock\Tags\Formatter;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter\PassthroughFormatter;
use Webmozart\Assert\Assert;


class Description
{
    
    private $Vgplzr1dncy2;

    
    private $Vi1vla5oesiw;

    
    public function __construct($Vgplzr1dncy2, array $Vi1vla5oesiw = [])
    {
        Assert::string($Vgplzr1dncy2);

        $this->bodyTemplate = $Vgplzr1dncy2;
        $this->tags = $Vi1vla5oesiw;
    }

    
    public function render(Formatter $Vwqyvsy3onct = null)
    {
        if ($Vwqyvsy3onct === null) {
            $Vwqyvsy3onct = new PassthroughFormatter();
        }

        $Vi1vla5oesiw = [];
        foreach ($this->tags as $Vl2ijnnhdtam) {
            $Vi1vla5oesiw[] = '{' . $Vwqyvsy3onct->format($Vl2ijnnhdtam) . '}';
        }
        return vsprintf($this->bodyTemplate, $Vi1vla5oesiw);
    }

    
    public function __toString()
    {
        return $this->render();
    }
}
