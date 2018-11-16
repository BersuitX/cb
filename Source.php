<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;


final class Source extends BaseTag implements Factory\StaticMethod
{
    
    protected $Vgpjmw221p0b = 'source';

    
    private $Vdnkuvqgrzur = 1;

    
    private $V5ch20ovzidr = null;

    public function __construct($Vdnkuvqgrzur, $V5ch20ovzidr = null, Description $Vg24o3v4hbzv = null)
    {
        Assert::integerish($Vdnkuvqgrzur);
        Assert::nullOrIntegerish($V5ch20ovzidr);

        $this->startingLine = (int)$Vdnkuvqgrzur;
        $this->lineCount    = $V5ch20ovzidr !== null ? (int)$V5ch20ovzidr : null;
        $this->description  = $Vg24o3v4hbzv;
    }

    
    public static function create($V5brf34vsiqi, DescriptionFactory $Vg24o3v4hbzvFactory = null, TypeContext $Vylnw34ljlp1 = null)
    {
        Assert::stringNotEmpty($V5brf34vsiqi);
        Assert::notNull($Vg24o3v4hbzvFactory);

        $Vdnkuvqgrzur = 1;
        $V5ch20ovzidr    = null;
        $Vg24o3v4hbzv  = null;

        
        if (preg_match('/^([1-9]\d*)\s*(?:((?1))\s+)?(.*)$/sux', $V5brf34vsiqi, $Virbphhh55ue)) {
            $Vdnkuvqgrzur = (int)$Virbphhh55ue[1];
            if (isset($Virbphhh55ue[2]) && $Virbphhh55ue[2] !== '') {
                $V5ch20ovzidr = (int)$Virbphhh55ue[2];
            }
            $Vg24o3v4hbzv = $Virbphhh55ue[3];
        }

        return new static($Vdnkuvqgrzur, $V5ch20ovzidr, $Vg24o3v4hbzvFactory->create($Vg24o3v4hbzv, $Vylnw34ljlp1));
    }

    
    public function getStartingLine()
    {
        return $this->startingLine;
    }

    
    public function getLineCount()
    {
        return $this->lineCount;
    }

    public function __toString()
    {
        return $this->startingLine
        . ($this->lineCount !== null ? ' ' . $this->lineCount : '')
        . ($this->description ? ' ' . $this->description->render() : '');
    }
}
