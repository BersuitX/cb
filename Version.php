<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\Types\Context as TypeContext;
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use Webmozart\Assert\Assert;


final class Version extends BaseTag implements Factory\StaticMethod
{
    protected $Vgpjmw221p0b = 'version';

    
    const REGEX_VECTOR = '(?:
        # Normal release vectors.
        \d\S*
        |
        # VCS version vectors. Per PHPCS, they are expected to
        # follow the form of the VCS name, followed by ":", followed
        # by the version vector itself.
        # By convention, popular VCSes like CVS, SVN and GIT use "$"
        # around the actual version vector.
        [^\s\:]+\:\s*\$[^\$]+\$
    )';

    
    private $Vzqixmthnyoe = '';

    public function __construct($Vzqixmthnyoe = null, Description $Vg24o3v4hbzv = null)
    {
        Assert::nullOrStringNotEmpty($Vzqixmthnyoe);

        $this->version = $Vzqixmthnyoe;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create($V5brf34vsiqi, DescriptionFactory $Vg24o3v4hbzvFactory = null, TypeContext $Vylnw34ljlp1 = null)
    {
        Assert::nullOrString($V5brf34vsiqi);
        if (empty($V5brf34vsiqi)) {
            return new static();
        }

        $Virbphhh55ue = [];
        if (!preg_match('/^(' . self::REGEX_VECTOR . ')\s*(.+)?$/sux', $V5brf34vsiqi, $Virbphhh55ue)) {
            return null;
        }

        return new static(
            $Virbphhh55ue[1],
            $Vg24o3v4hbzvFactory->create(isset($Virbphhh55ue[2]) ? $Virbphhh55ue[2] : '', $Vylnw34ljlp1)
        );
    }

    
    public function getVersion()
    {
        return $this->version;
    }

    
    public function __toString()
    {
        return $this->version . ($this->description ? ' ' . $this->description->render() : '');
    }
}
