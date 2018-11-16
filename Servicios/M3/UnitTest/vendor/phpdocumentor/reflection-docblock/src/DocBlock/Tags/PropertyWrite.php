<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;


class PropertyWrite extends BaseTag implements Factory\StaticMethod
{
    
    protected $Vgpjmw221p0b = 'property-write';

    
    private $V31qrja1w0r2;

    
    protected $Vksf0mqerbxo = '';

    
    public function __construct($Vksf0mqerbxo, Type $V31qrja1w0r2 = null, Description $Vg24o3v4hbzv = null)
    {
        Assert::string($Vksf0mqerbxo);

        $this->variableName = $Vksf0mqerbxo;
        $this->type = $V31qrja1w0r2;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create(
        $V5brf34vsiqi,
        TypeResolver $V31qrja1w0r2Resolver = null,
        DescriptionFactory $Vg24o3v4hbzvFactory = null,
        TypeContext $Vylnw34ljlp1 = null
    ) {
        Assert::stringNotEmpty($V5brf34vsiqi);
        Assert::allNotNull([$V31qrja1w0r2Resolver, $Vg24o3v4hbzvFactory]);

        $Vbkdgagqgicd = preg_split('/(\s+)/Su', $V5brf34vsiqi, 3, PREG_SPLIT_DELIM_CAPTURE);
        $V31qrja1w0r2 = null;
        $Vksf0mqerbxo = '';

        
        if (isset($Vbkdgagqgicd[0]) && (strlen($Vbkdgagqgicd[0]) > 0) && ($Vbkdgagqgicd[0][0] !== '$')) {
            $V31qrja1w0r2 = $V31qrja1w0r2Resolver->resolve(array_shift($Vbkdgagqgicd), $Vylnw34ljlp1);
            array_shift($Vbkdgagqgicd);
        }

        
        if (isset($Vbkdgagqgicd[0]) && (strlen($Vbkdgagqgicd[0]) > 0) && ($Vbkdgagqgicd[0][0] == '$')) {
            $Vksf0mqerbxo = array_shift($Vbkdgagqgicd);
            array_shift($Vbkdgagqgicd);

            if (substr($Vksf0mqerbxo, 0, 1) === '$') {
                $Vksf0mqerbxo = substr($Vksf0mqerbxo, 1);
            }
        }

        $Vg24o3v4hbzv = $Vg24o3v4hbzvFactory->create(implode('', $Vbkdgagqgicd), $Vylnw34ljlp1);

        return new static($Vksf0mqerbxo, $V31qrja1w0r2, $Vg24o3v4hbzv);
    }

    
    public function getVariableName()
    {
        return $this->variableName;
    }

    
    public function getType()
    {
        return $this->type;
    }

    
    public function __toString()
    {
        return ($this->type ? $this->type . ' ' : '')
        . '$' . $this->variableName
        . ($this->description ? ' ' . $this->description : '');
    }
}
