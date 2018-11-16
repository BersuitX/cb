<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\DocBlock\StandardTagFactory;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;


class Generic extends BaseTag implements Factory\StaticMethod
{
    
    public function __construct($Vgpjmw221p0b, Description $Vg24o3v4hbzv = null)
    {
        $this->validateTagName($Vgpjmw221p0b);

        $this->name = $Vgpjmw221p0b;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create(
        $V5brf34vsiqi,
        $Vgpjmw221p0b = '',
        DescriptionFactory $Vg24o3v4hbzvFactory = null,
        TypeContext $Vylnw34ljlp1 = null
    ) {
        Assert::string($V5brf34vsiqi);
        Assert::stringNotEmpty($Vgpjmw221p0b);
        Assert::notNull($Vg24o3v4hbzvFactory);

        $Vg24o3v4hbzv = $Vg24o3v4hbzvFactory && $V5brf34vsiqi ? $Vg24o3v4hbzvFactory->create($V5brf34vsiqi, $Vylnw34ljlp1) : null;

        return new static($Vgpjmw221p0b, $Vg24o3v4hbzv);
    }

    
    public function __toString()
    {
        return ($this->description ? $this->description->render() : '');
    }

    
    private function validateTagName($Vgpjmw221p0b)
    {
        if (! preg_match('/^' . StandardTagFactory::REGEX_TAGNAME . '$/u', $Vgpjmw221p0b)) {
            throw new \InvalidArgumentException(
                'The tag name "' . $Vgpjmw221p0b . '" is not wellformed. Tags may only consist of letters, underscores, '
                . 'hyphens and backslashes.'
            );
        }
    }
}
