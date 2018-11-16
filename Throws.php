<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;


final class Throws extends BaseTag implements Factory\StaticMethod
{
    protected $Vgpjmw221p0b = 'throws';

    
    private $V31qrja1w0r2;

    public function __construct(Type $V31qrja1w0r2, Description $Vg24o3v4hbzv = null)
    {
        $this->type        = $V31qrja1w0r2;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create(
        $V5brf34vsiqi,
        TypeResolver $V31qrja1w0r2Resolver = null,
        DescriptionFactory $Vg24o3v4hbzvFactory = null,
        TypeContext $Vylnw34ljlp1 = null
    ) {
        Assert::string($V5brf34vsiqi);
        Assert::allNotNull([$V31qrja1w0r2Resolver, $Vg24o3v4hbzvFactory]);

        $Vbkdgagqgicd = preg_split('/\s+/Su', $V5brf34vsiqi, 2);

        $V31qrja1w0r2        = $V31qrja1w0r2Resolver->resolve(isset($Vbkdgagqgicd[0]) ? $Vbkdgagqgicd[0] : '', $Vylnw34ljlp1);
        $Vg24o3v4hbzv = $Vg24o3v4hbzvFactory->create(isset($Vbkdgagqgicd[1]) ? $Vbkdgagqgicd[1] : '', $Vylnw34ljlp1);

        return new static($V31qrja1w0r2, $Vg24o3v4hbzv);
    }

    
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->type . ' ' . $this->description;
    }
}
