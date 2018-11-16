<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use phpDocumentor\Reflection\FqsenResolver;
use Webmozart\Assert\Assert;


final class Covers extends BaseTag implements Factory\StaticMethod
{
    protected $Vgpjmw221p0b = 'covers';

    
    private $V4sc1hkpxmnp = null;

    
    public function __construct(Fqsen $V4sc1hkpxmnp, Description $Vg24o3v4hbzv = null)
    {
        $this->refers = $V4sc1hkpxmnp;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create(
        $V5brf34vsiqi,
        DescriptionFactory $Vg24o3v4hbzvFactory = null,
        FqsenResolver $Vc3lyjuvff1a = null,
        TypeContext $Vylnw34ljlp1 = null
    )
    {
        Assert::string($V5brf34vsiqi);
        Assert::notEmpty($V5brf34vsiqi);

        $Vbkdgagqgicd = preg_split('/\s+/Su', $V5brf34vsiqi, 2);

        return new static(
            $Vc3lyjuvff1a->resolve($Vbkdgagqgicd[0], $Vylnw34ljlp1),
            $Vg24o3v4hbzvFactory->create(isset($Vbkdgagqgicd[1]) ? $Vbkdgagqgicd[1] : '', $Vylnw34ljlp1)
        );
    }

    
    public function getReference()
    {
        return $this->refers;
    }

    
    public function __toString()
    {
        return $this->refers . ($this->description ? ' ' . $this->description->render() : '');
    }
}
