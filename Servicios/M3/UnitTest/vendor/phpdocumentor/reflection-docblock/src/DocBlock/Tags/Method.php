<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Type;
use phpDocumentor\Reflection\TypeResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use phpDocumentor\Reflection\Types\Void_;
use Webmozart\Assert\Assert;


final class Method extends BaseTag implements Factory\StaticMethod
{
    protected $Vgpjmw221p0b = 'method';

    
    private $Vc1exo5hbki5 = '';

    
    private $Vj23lbel2xn0 = [];

    
    private $V5eohepsmy5j = false;

    
    private $Vyqhyew5tiwd;

    public function __construct(
        $Vc1exo5hbki5,
        array $Vj23lbel2xn0 = [],
        Type $Vyqhyew5tiwd = null,
        $Voyfr0hmk3rl = false,
        Description $Vg24o3v4hbzv = null
    ) {
        Assert::stringNotEmpty($Vc1exo5hbki5);
        Assert::boolean($Voyfr0hmk3rl);

        if ($Vyqhyew5tiwd === null) {
            $Vyqhyew5tiwd = new Void_();
        }

        $this->methodName  = $Vc1exo5hbki5;
        $this->arguments   = $this->filterArguments($Vj23lbel2xn0);
        $this->returnType  = $Vyqhyew5tiwd;
        $this->isStatic    = $Voyfr0hmk3rl;
        $this->description = $Vg24o3v4hbzv;
    }

    
    public static function create(
        $V5brf34vsiqi,
        TypeResolver $Vdeltmmutwp5 = null,
        DescriptionFactory $Vg24o3v4hbzvFactory = null,
        TypeContext $Vylnw34ljlp1 = null
    ) {
        Assert::stringNotEmpty($V5brf34vsiqi);
        Assert::allNotNull([ $Vdeltmmutwp5, $Vg24o3v4hbzvFactory ]);

        
        
        
        
        
        
        
        
        
        if (!preg_match(
            '/^
                # Static keyword
                # Declares a static method ONLY if type is also present
                (?:
                    (static)
                    \s+
                )?
                # Return type
                (?:
                    (   
                        (?:[\w\|_\\\\]*\$this[\w\|_\\\\]*)
                        |
                        (?:
                            (?:[\w\|_\\\\]+)
                            # array notation           
                            (?:\[\])*
                        )*
                    )
                    \s+
                )?
                # Legacy method name (not captured)
                (?:
                    [\w_]+\(\)\s+
                )?
                # Method name
                ([\w\|_\\\\]+)
                # Arguments
                (?:
                    \(([^\)]*)\)
                )?
                \s*
                # Description
                (.*)
            $/sux',
            $V5brf34vsiqi,
            $Virbphhh55ue
        )) {
            return null;
        }

        list(, $Voyfr0hmk3rl, $Vyqhyew5tiwd, $Vc1exo5hbki5, $Vj23lbel2xn0, $Vg24o3v4hbzv) = $Virbphhh55ue;

        $Voyfr0hmk3rl      = $Voyfr0hmk3rl === 'static';

        if ($Vyqhyew5tiwd === '') {
            $Vyqhyew5tiwd = 'void';
        }

        $Vyqhyew5tiwd  = $Vdeltmmutwp5->resolve($Vyqhyew5tiwd, $Vylnw34ljlp1);
        $Vg24o3v4hbzv = $Vg24o3v4hbzvFactory->create($Vg24o3v4hbzv, $Vylnw34ljlp1);

        if (is_string($Vj23lbel2xn0) && strlen($Vj23lbel2xn0) > 0) {
            $Vj23lbel2xn0 = explode(',', $Vj23lbel2xn0);
            foreach($Vj23lbel2xn0 as &$Vlf5kwra10uk) {
                $Vlf5kwra10uk = explode(' ', self::stripRestArg(trim($Vlf5kwra10uk)), 2);
                if ($Vlf5kwra10uk[0][0] === '$') {
                    $Vlf5kwra10ukName = substr($Vlf5kwra10uk[0], 1);
                    $Vlf5kwra10ukType = new Void_();
                } else {
                    $Vlf5kwra10ukType = $Vdeltmmutwp5->resolve($Vlf5kwra10uk[0], $Vylnw34ljlp1);
                    $Vlf5kwra10ukName = '';
                    if (isset($Vlf5kwra10uk[1])) {
                        $Vlf5kwra10uk[1] = self::stripRestArg($Vlf5kwra10uk[1]);
                        $Vlf5kwra10ukName = substr($Vlf5kwra10uk[1], 1);
                    }
                }

                $Vlf5kwra10uk = [ 'name' => $Vlf5kwra10ukName, 'type' => $Vlf5kwra10ukType];
            }
        } else {
            $Vj23lbel2xn0 = [];
        }

        return new static($Vc1exo5hbki5, $Vj23lbel2xn0, $Vyqhyew5tiwd, $Voyfr0hmk3rl, $Vg24o3v4hbzv);
    }

    
    public function getMethodName()
    {
        return $this->methodName;
    }

    
    public function getArguments()
    {
        return $this->arguments;
    }

    
    public function isStatic()
    {
        return $this->isStatic;
    }

    
    public function getReturnType()
    {
        return $this->returnType;
    }

    public function __toString()
    {
        $Vj23lbel2xn0 = [];
        foreach ($this->arguments as $Vlf5kwra10uk) {
            $Vj23lbel2xn0[] = $Vlf5kwra10uk['type'] . ' $' . $Vlf5kwra10uk['name'];
        }

        return trim(($this->isStatic() ? 'static ' : '')
            . (string)$this->returnType . ' '
            . $this->methodName
            . '(' . implode(', ', $Vj23lbel2xn0) . ')'
            . ($this->description ? ' ' . $this->description->render() : ''));
    }

    private function filterArguments($Vj23lbel2xn0)
    {
        foreach ($Vj23lbel2xn0 as &$Vlf5kwra10uk) {
            if (is_string($Vlf5kwra10uk)) {
                $Vlf5kwra10uk = [ 'name' => $Vlf5kwra10uk ];
            }
            if (! isset($Vlf5kwra10uk['type'])) {
                $Vlf5kwra10uk['type'] = new Void_();
            }
            $Vbtcg1ckvort = array_keys($Vlf5kwra10uk);
            if ($Vbtcg1ckvort !== [ 'name', 'type' ]) {
                throw new \InvalidArgumentException(
                    'Arguments can only have the "name" and "type" fields, found: ' . var_export($Vbtcg1ckvort, true)
                );
            }
        }

        return $Vj23lbel2xn0;
    }

    private static function stripRestArg($Vlf5kwra10uk)
    {
        if (strpos($Vlf5kwra10uk, '...') === 0) {
            $Vlf5kwra10uk = trim(substr($Vlf5kwra10uk, 3));
        }

        return $Vlf5kwra10uk;
    }
}
