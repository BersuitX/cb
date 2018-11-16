<?php


namespace phpDocumentor\Reflection\DocBlock\Tags\Formatter;

use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

class AlignFormatter implements Formatter
{
    
    protected $Vvlfbibgfn0r = 0;

    
    public function __construct(array $Vi1vla5oesiw)
    {
        foreach ($Vi1vla5oesiw as $Vl2ijnnhdtam) {
            $this->maxLen = max($this->maxLen, strlen($Vl2ijnnhdtam->getName()));
        }
    }

    
    public function format(Tag $Vl2ijnnhdtam)
    {
        return '@' . $Vl2ijnnhdtam->getName() . str_repeat(' ', $this->maxLen - strlen($Vl2ijnnhdtam->getName()) + 1) . (string)$Vl2ijnnhdtam;
    }
}
