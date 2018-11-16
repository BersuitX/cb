<?php


namespace phpDocumentor\Reflection\DocBlock;

use phpDocumentor\Reflection\DocBlock\Tags\Factory\StaticMethod;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;
use phpDocumentor\Reflection\FqsenResolver;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;


final class StandardTagFactory implements TagFactory
{
    
    const REGEX_TAGNAME = '[\w\-\_\\\\]+';

    
    private $Vz5csfybyx2h = [
        'author'         => '\phpDocumentor\Reflection\DocBlock\Tags\Author',
        'covers'         => '\phpDocumentor\Reflection\DocBlock\Tags\Covers',
        'deprecated'     => '\phpDocumentor\Reflection\DocBlock\Tags\Deprecated',
        
        'link'           => '\phpDocumentor\Reflection\DocBlock\Tags\Link',
        'method'         => '\phpDocumentor\Reflection\DocBlock\Tags\Method',
        'param'          => '\phpDocumentor\Reflection\DocBlock\Tags\Param',
        'property-read'  => '\phpDocumentor\Reflection\DocBlock\Tags\PropertyRead',
        'property'       => '\phpDocumentor\Reflection\DocBlock\Tags\Property',
        'property-write' => '\phpDocumentor\Reflection\DocBlock\Tags\PropertyWrite',
        'return'         => '\phpDocumentor\Reflection\DocBlock\Tags\Return_',
        'see'            => '\phpDocumentor\Reflection\DocBlock\Tags\See',
        'since'          => '\phpDocumentor\Reflection\DocBlock\Tags\Since',
        'source'         => '\phpDocumentor\Reflection\DocBlock\Tags\Source',
        'throw'          => '\phpDocumentor\Reflection\DocBlock\Tags\Throws',
        'throws'         => '\phpDocumentor\Reflection\DocBlock\Tags\Throws',
        'uses'           => '\phpDocumentor\Reflection\DocBlock\Tags\Uses',
        'var'            => '\phpDocumentor\Reflection\DocBlock\Tags\Var_',
        'version'        => '\phpDocumentor\Reflection\DocBlock\Tags\Version'
    ];

    
    private $Viqhukvrn3nx = [];

    
    private $Vg23ilkp2ixo;

    
    private $Vj4czieykqo2 = [];

    
    public function __construct(FqsenResolver $Vg23ilkp2ixo, array $Vvwdrml0rwhe = null)
    {
        $this->fqsenResolver = $Vg23ilkp2ixo;
        if ($Vvwdrml0rwhe !== null) {
            $this->tagHandlerMappings = $Vvwdrml0rwhe;
        }

        $this->addService($Vg23ilkp2ixo, FqsenResolver::class);
    }

    
    public function create($Vpjj3ifd3hve, TypeContext $Vylnw34ljlp1 = null)
    {
        if (! $Vylnw34ljlp1) {
            $Vylnw34ljlp1 = new TypeContext('');
        }

        list($Vmjfipxuy55p, $Vy50oxqneamc) = $this->extractTagParts($Vpjj3ifd3hve);

        if ($Vy50oxqneamc !== '' && $Vy50oxqneamc[0] === '[') {
            throw new \InvalidArgumentException(
                'The tag "' . $Vpjj3ifd3hve . '" does not seem to be wellformed, please check it for errors'
            );
        }

        return $this->createTag($Vy50oxqneamc, $Vmjfipxuy55p, $Vylnw34ljlp1);
    }

    
    public function addParameter($Vgpjmw221p0b, $Vcptarsq5qe4)
    {
        $this->serviceLocator[$Vgpjmw221p0b] = $Vcptarsq5qe4;
    }

    
    public function addService($Vsdtsk3ofza3, $V3wv5avvipt3 = null)
    {
        $this->serviceLocator[$V3wv5avvipt3 ?: get_class($Vsdtsk3ofza3)] = $Vsdtsk3ofza3;
    }

    
    public function registerTagHandler($Vmjfipxuy55p, $Voc34ggbfvw5)
    {
        Assert::stringNotEmpty($Vmjfipxuy55p);
        Assert::stringNotEmpty($Voc34ggbfvw5);
        Assert::classExists($Voc34ggbfvw5);
        Assert::implementsInterface($Voc34ggbfvw5, StaticMethod::class);

        if (strpos($Vmjfipxuy55p, '\\') && $Vmjfipxuy55p[0] !== '\\') {
            throw new \InvalidArgumentException(
                'A namespaced tag must have a leading backslash as it must be fully qualified'
            );
        }

        $this->tagHandlerMappings[$Vmjfipxuy55p] = $Voc34ggbfvw5;
    }

    
    private function extractTagParts($Vpjj3ifd3hve)
    {
        $Virbphhh55ue = array();
        if (! preg_match('/^@(' . self::REGEX_TAGNAME . ')(?:\s*([^\s].*)|$)/us', $Vpjj3ifd3hve, $Virbphhh55ue)) {
            throw new \InvalidArgumentException(
                'The tag "' . $Vpjj3ifd3hve . '" does not seem to be wellformed, please check it for errors'
            );
        }

        if (count($Virbphhh55ue) < 3) {
            $Virbphhh55ue[] = '';
        }

        return array_slice($Virbphhh55ue, 1);
    }

    
    private function createTag($V5brf34vsiqi, $Vgpjmw221p0b, TypeContext $Vylnw34ljlp1)
    {
        $Voc34ggbfvw5ClassName = $this->findHandlerClassName($Vgpjmw221p0b, $Vylnw34ljlp1);
        $Vj23lbel2xn0        = $this->getArgumentsForParametersFromWiring(
            $this->fetchParametersForHandlerFactoryMethod($Voc34ggbfvw5ClassName),
            $this->getServiceLocatorWithDynamicParameters($Vylnw34ljlp1, $Vgpjmw221p0b, $V5brf34vsiqi)
        )
        ;

        return call_user_func_array([$Voc34ggbfvw5ClassName, 'create'], $Vj23lbel2xn0);
    }

    
    private function findHandlerClassName($Vmjfipxuy55p, TypeContext $Vylnw34ljlp1)
    {
        $Voc34ggbfvw5ClassName = Generic::class;
        if (isset($this->tagHandlerMappings[$Vmjfipxuy55p])) {
            $Voc34ggbfvw5ClassName = $this->tagHandlerMappings[$Vmjfipxuy55p];
        } elseif ($this->isAnnotation($Vmjfipxuy55p)) {
            
            
            
            
            
        }

        return $Voc34ggbfvw5ClassName;
    }

    
    private function getArgumentsForParametersFromWiring($Vsazp03zrvte, $Vcxkut5dcpqu)
    {
        $Vj23lbel2xn0 = [];
        foreach ($Vsazp03zrvte as $Vojnsu0ourck => $Vd51rl30yovf) {
            $Vx1vtvnslwrz = $Vd51rl30yovf->getClass() ? $Vd51rl30yovf->getClass()->getName() : null;
            if (isset($Vcxkut5dcpqu[$Vx1vtvnslwrz])) {
                $Vj23lbel2xn0[] = $Vcxkut5dcpqu[$Vx1vtvnslwrz];
                continue;
            }

            $Vd51rl30yovfName = $Vd51rl30yovf->getName();
            if (isset($Vcxkut5dcpqu[$Vd51rl30yovfName])) {
                $Vj23lbel2xn0[] = $Vcxkut5dcpqu[$Vd51rl30yovfName];
                continue;
            }

            $Vj23lbel2xn0[] = null;
        }

        return $Vj23lbel2xn0;
    }

    
    private function fetchParametersForHandlerFactoryMethod($Voc34ggbfvw5ClassName)
    {
        if (! isset($this->tagHandlerParameterCache[$Voc34ggbfvw5ClassName])) {
            $Vocr2holg5cz                                  = new \ReflectionMethod($Voc34ggbfvw5ClassName, 'create');
            $this->tagHandlerParameterCache[$Voc34ggbfvw5ClassName] = $Vocr2holg5cz->getParameters();
        }

        return $this->tagHandlerParameterCache[$Voc34ggbfvw5ClassName];
    }

    
    private function getServiceLocatorWithDynamicParameters(TypeContext $Vylnw34ljlp1, $Vmjfipxuy55p, $Vy50oxqneamc)
    {
        $Vcxkut5dcpqu = array_merge(
            $this->serviceLocator,
            [
                'name'             => $Vmjfipxuy55p,
                'body'             => $Vy50oxqneamc,
                TypeContext::class => $Vylnw34ljlp1
            ]
        );

        return $Vcxkut5dcpqu;
    }

    
    private function isAnnotation($Vcocjpjunw3e)
    {
        
        
        
        

        return false;
    }
}
