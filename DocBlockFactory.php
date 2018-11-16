<?php


namespace phpDocumentor\Reflection;

use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\DocBlock\StandardTagFactory;
use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\TagFactory;
use Webmozart\Assert\Assert;

final class DocBlockFactory implements DocBlockFactoryInterface
{
    
    private $Vz2ht5wn4ahx;

    
    private $Vi3ehu4kwpnc;

    
    public function __construct(DescriptionFactory $Vz2ht5wn4ahx, TagFactory $Vi3ehu4kwpnc)
    {
        $this->descriptionFactory = $Vz2ht5wn4ahx;
        $this->tagFactory = $Vi3ehu4kwpnc;
    }

    
    public static function createInstance(array $Vbhvqs0z4zws = [])
    {
        $Vg23ilkp2ixo = new FqsenResolver();
        $Vi3ehu4kwpnc = new StandardTagFactory($Vg23ilkp2ixo);
        $Vz2ht5wn4ahx = new DescriptionFactory($Vi3ehu4kwpnc);

        $Vi3ehu4kwpnc->addService($Vz2ht5wn4ahx);
        $Vi3ehu4kwpnc->addService(new TypeResolver($Vg23ilkp2ixo));

        $Vpj1a2cv5y2d = new self($Vz2ht5wn4ahx, $Vi3ehu4kwpnc);
        foreach ($Vbhvqs0z4zws as $Vmjfipxuy55p => $Vypisngosnym) {
            $Vpj1a2cv5y2d->registerTagHandler($Vmjfipxuy55p, $Vypisngosnym);
        }

        return $Vpj1a2cv5y2d;
    }

    
    public function create($Vbr0pcbogll4, Types\Context $Vylnw34ljlp1 = null, Location $Vh4ebtit0a3l = null)
    {
        if (is_object($Vbr0pcbogll4)) {
            if (!method_exists($Vbr0pcbogll4, 'getDocComment')) {
                $V41pdegllkbg = 'Invalid object passed; the given object must support the getDocComment method';
                throw new \InvalidArgumentException($V41pdegllkbg);
            }

            $Vbr0pcbogll4 = $Vbr0pcbogll4->getDocComment();
        }

        Assert::stringNotEmpty($Vbr0pcbogll4);

        if ($Vylnw34ljlp1 === null) {
            $Vylnw34ljlp1 = new Types\Context('');
        }

        $Vbkdgagqgicd = $this->splitDocBlock($this->stripDocComment($Vbr0pcbogll4));
        list($Vrrs2n0bluta, $Vyojblqfce2p, $Vg24o3v4hbzv, $Vi1vla5oesiw) = $Vbkdgagqgicd;

        return new DocBlock(
            $Vyojblqfce2p,
            $Vg24o3v4hbzv ? $this->descriptionFactory->create($Vg24o3v4hbzv, $Vylnw34ljlp1) : null,
            array_filter($this->parseTagBlock($Vi1vla5oesiw, $Vylnw34ljlp1), function($Vl2ijnnhdtam) {
                return $Vl2ijnnhdtam instanceof Tag;
            }),
            $Vylnw34ljlp1,
            $Vh4ebtit0a3l,
            $Vrrs2n0bluta === '#@+',
            $Vrrs2n0bluta === '#@-'
        );
    }

    public function registerTagHandler($Vmjfipxuy55p, $Voc34ggbfvw5)
    {
        $this->tagFactory->registerTagHandler($Vmjfipxuy55p, $Voc34ggbfvw5);
    }

    
    private function stripDocComment($Va1khwntce20)
    {
        $Va1khwntce20 = trim(preg_replace('#[ \t]*(?:\/\*\*|\*\/|\*)?[ \t]{0,1}(.*)?#u', '$1', $Va1khwntce20));

        
        if (substr($Va1khwntce20, -2) == '*/') {
            $Va1khwntce20 = trim(substr($Va1khwntce20, 0, -2));
        }

        return str_replace(array("\r\n", "\r"), "\n", $Va1khwntce20);
    }

    
    private function splitDocBlock($Va1khwntce20)
    {
        
        
        
        if (strpos($Va1khwntce20, '@') === 0) {
            return array('', '', '', $Va1khwntce20);
        }

        
        $Va1khwntce20 = preg_replace('/\h*$/Sum', '', $Va1khwntce20);

        
        preg_match(
            '/
            \A
            # 1. Extract the template marker
            (?:(\#\@\+|\#\@\-)\n?)?

            # 2. Extract the summary
            (?:
              (?! @\pL ) # The summary may not start with an @
              (
                [^\n.]+
                (?:
                  (?! \. \n | \n{2} )     # End summary upon a dot followed by newline or two newlines
                  [\n.] (?! [ \t]* @\pL ) # End summary when an @ is found as first character on a new line
                  [^\n.]+                 # Include anything else
                )*
                \.?
              )?
            )

            # 3. Extract the description
            (?:
              \s*        # Some form of whitespace _must_ precede a description because a summary must be there
              (?! @\pL ) # The description may not start with an @
              (
                [^\n]+
                (?: \n+
                  (?! [ \t]* @\pL ) # End description when an @ is found as first character on a new line
                  [^\n]+            # Include anything else
                )*
              )
            )?

            # 4. Extract the tags (anything that follows)
            (\s+ [\s\S]*)? # everything that follows
            /ux',
            $Va1khwntce20,
            $Virbphhh55ue
        );
        array_shift($Virbphhh55ue);

        while (count($Virbphhh55ue) < 4) {
            $Virbphhh55ue[] = '';
        }

        return $Virbphhh55ue;
    }

    
    private function parseTagBlock($Vi1vla5oesiw, Types\Context $Vylnw34ljlp1)
    {
        $Vi1vla5oesiw = $this->filterTagBlock($Vi1vla5oesiw);
        if (!$Vi1vla5oesiw) {
            return [];
        }

        $Vv0hyvhlkjqr = $this->splitTagBlockIntoTagLines($Vi1vla5oesiw);
        foreach ($Vv0hyvhlkjqr as $Vlpbz5aloxqt => $Vl2ijnnhdtamLine) {
            $Vv0hyvhlkjqr[$Vlpbz5aloxqt] = $this->tagFactory->create(trim($Vl2ijnnhdtamLine), $Vylnw34ljlp1);
        }

        return $Vv0hyvhlkjqr;
    }

    
    private function splitTagBlockIntoTagLines($Vi1vla5oesiw)
    {
        $Vv0hyvhlkjqr = array();
        foreach (explode("\n", $Vi1vla5oesiw) as $Vl2ijnnhdtam_line) {
            if (isset($Vl2ijnnhdtam_line[0]) && ($Vl2ijnnhdtam_line[0] === '@')) {
                $Vv0hyvhlkjqr[] = $Vl2ijnnhdtam_line;
            } else {
                $Vv0hyvhlkjqr[count($Vv0hyvhlkjqr) - 1] .= "\n" . $Vl2ijnnhdtam_line;
            }
        }

        return $Vv0hyvhlkjqr;
    }

    
    private function filterTagBlock($Vi1vla5oesiw)
    {
        $Vi1vla5oesiw = trim($Vi1vla5oesiw);
        if (!$Vi1vla5oesiw) {
            return null;
        }

        if ('@' !== $Vi1vla5oesiw[0]) {
            
            
            
            throw new \LogicException('A tag block started with text instead of an at-sign(@): ' . $Vi1vla5oesiw);
            
        }

        return $Vi1vla5oesiw;
    }
}
