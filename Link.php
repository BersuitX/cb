<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;


final class Link extends BaseTag implements Factory\StaticMethod
{
    protected $Vgpjmw221p0b = 'link';

    
    private $Vwczhh2w44hn = '';

    
    public function __construct($Vwczhh2w44hn, Description $Vg24o3v4hbzv = null)
    {
        Assert::string($Vwczhh2w44hn);

        $this->link = $Vwczhh2w44hn;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create($V5brf34vsiqi, DescriptionFactory $Vg24o3v4hbzvFactory = null, TypeContext $Vylnw34ljlp1 = null)
    {
        Assert::string($V5brf34vsiqi);
        Assert::notNull($Vg24o3v4hbzvFactory);

        $Vbkdgagqgicd = preg_split('/\s+/Su', $V5brf34vsiqi, 2);
        $Vg24o3v4hbzv = isset($Vbkdgagqgicd[1]) ? $Vg24o3v4hbzvFactory->create($Vbkdgagqgicd[1], $Vylnw34ljlp1) : null;

        return new static($Vbkdgagqgicd[0], $Vg24o3v4hbzv);
    }

    
    public function getLink()
    {
        return $this->link;
    }

    
    public function __toString()
    {
        return $this->link . ($this->description ? ' ' . $this->description->render() : '');
    }
}
