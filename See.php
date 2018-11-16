<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Fqsen;
use phpDocumentor\Reflection\FqsenResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use phpDocumentor\Reflection\DocBlock\Description;
use Webmozart\Assert\Assert;


class See extends BaseTag implements Factory\StaticMethod
{
    protected $Vgpjmw221p0b = 'see';

    
    protected $V4sc1hkpxmnp = null;

    
    public function __construct(Fqsen $V4sc1hkpxmnp, Description $Vg24o3v4hbzv = null)
    {
        $this->refers = $V4sc1hkpxmnp;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create(
        $V5brf34vsiqi,
        FqsenResolver $Vc3lyjuvff1a = null,
        DescriptionFactory $Vg24o3v4hbzvFactory = null,
        TypeContext $Vylnw34ljlp1 = null
    ) {
        Assert::string($V5brf34vsiqi);
        Assert::allNotNull([$Vc3lyjuvff1a, $Vg24o3v4hbzvFactory]);

        $Vbkdgagqgicd       = preg_split('/\s+/Su', $V5brf34vsiqi, 2);
        $Vg24o3v4hbzv = isset($Vbkdgagqgicd[1]) ? $Vg24o3v4hbzvFactory->create($Vbkdgagqgicd[1], $Vylnw34ljlp1) : null;

        return new static($Vc3lyjuvff1a->resolve($Vbkdgagqgicd[0], $Vylnw34ljlp1), $Vg24o3v4hbzv);
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
