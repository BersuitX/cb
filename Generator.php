<?php


use Doctrine\Instantiator\Instantiator;
use Doctrine\Instantiator\Exception\InvalidArgumentException as InstantiatorInvalidArgumentException;
use Doctrine\Instantiator\Exception\UnexpectedValueException as InstantiatorUnexpectedValueException;

if (!function_exists('trait_exists')) {
    function trait_exists($Vt0hgvwnxauq, $Vbzbu05r0wfv = true)
    {
        return false;
    }
}


class PHPUnit_Framework_MockObject_Generator
{
    
    private static $Vzwp15rts0pz = array();

    
    protected $V5e2uuw24rsn = array(
      '__CLASS__'       => true,
      '__DIR__'         => true,
      '__FILE__'        => true,
      '__FUNCTION__'    => true,
      '__LINE__'        => true,
      '__METHOD__'      => true,
      '__NAMESPACE__'   => true,
      '__TRAIT__'       => true,
      '__clone'         => true,
      '__halt_compiler' => true,
      'abstract'        => true,
      'and'             => true,
      'array'           => true,
      'as'              => true,
      'break'           => true,
      'callable'        => true,
      'case'            => true,
      'catch'           => true,
      'class'           => true,
      'clone'           => true,
      'const'           => true,
      'continue'        => true,
      'declare'         => true,
      'default'         => true,
      'die'             => true,
      'do'              => true,
      'echo'            => true,
      'else'            => true,
      'elseif'          => true,
      'empty'           => true,
      'enddeclare'      => true,
      'endfor'          => true,
      'endforeach'      => true,
      'endif'           => true,
      'endswitch'       => true,
      'endwhile'        => true,
      'eval'            => true,
      'exit'            => true,
      'expects'         => true,
      'extends'         => true,
      'final'           => true,
      'for'             => true,
      'foreach'         => true,
      'function'        => true,
      'global'          => true,
      'goto'            => true,
      'if'              => true,
      'implements'      => true,
      'include'         => true,
      'include_once'    => true,
      'instanceof'      => true,
      'insteadof'       => true,
      'interface'       => true,
      'isset'           => true,
      'list'            => true,
      'namespace'       => true,
      'new'             => true,
      'or'              => true,
      'print'           => true,
      'private'         => true,
      'protected'       => true,
      'public'          => true,
      'require'         => true,
      'require_once'    => true,
      'return'          => true,
      'static'          => true,
      'switch'          => true,
      'throw'           => true,
      'trait'           => true,
      'try'             => true,
      'unset'           => true,
      'use'             => true,
      'var'             => true,
      'while'           => true,
      'xor'             => true
    );

    
    public function getMock($V31qrja1w0r2, $V0yfl5ulns0o = array(), array $Vj23lbel2xn0 = array(), $Vc3zs2kevdk4 = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $V3h3xe1o2lav = true, $Vzbcxnhqeuh5 = false, $Vp0lqmwkx3ds = null)
    {
        if (!is_array($V31qrja1w0r2) && !is_string($V31qrja1w0r2)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'array or string');
        }

        if (!is_string($Vc3zs2kevdk4)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(4, 'string');
        }

        if (!is_array($V0yfl5ulns0o) && !is_null($V0yfl5ulns0o)) {
            throw new InvalidArgumentException;
        }

        if ($V31qrja1w0r2 === 'Traversable' || $V31qrja1w0r2 === '\\Traversable') {
            $V31qrja1w0r2 = 'Iterator';
        }

        if (is_array($V31qrja1w0r2)) {
            $V31qrja1w0r2 = array_unique(array_map(
                function ($V31qrja1w0r2) {
                    if ($V31qrja1w0r2 === 'Traversable' ||
                      $V31qrja1w0r2 === '\\Traversable' ||
                      $V31qrja1w0r2 === '\\Iterator') {
                        return 'Iterator';
                    }

                    return $V31qrja1w0r2;
                },
                $V31qrja1w0r2
            ));
        }

        if (null !== $V0yfl5ulns0o) {
            foreach ($V0yfl5ulns0o as $Vtlfvdwskdge) {
                if (!preg_match('~[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*~', $Vtlfvdwskdge)) {
                    throw new PHPUnit_Framework_Exception(
                        sprintf(
                            'Cannot stub or mock method with invalid name "%s"',
                            $Vtlfvdwskdge
                        )
                    );
                }
            }

            if ($V0yfl5ulns0o != array_unique($V0yfl5ulns0o)) {
                throw new PHPUnit_Framework_MockObject_RuntimeException(
                    sprintf(
                        'Cannot stub or mock using a method list that contains duplicates: "%s"',
                        implode(', ', $V0yfl5ulns0o)
                    )
                );
            }
        }

        if ($Vc3zs2kevdk4 != '' && class_exists($Vc3zs2kevdk4, false)) {
            $Vwap0ldzbcft = new ReflectionClass($Vc3zs2kevdk4);

            if (!$Vwap0ldzbcft->implementsInterface('PHPUnit_Framework_MockObject_MockObject')) {
                throw new PHPUnit_Framework_MockObject_RuntimeException(
                    sprintf(
                        'Class "%s" already exists.',
                        $Vc3zs2kevdk4
                    )
                );
            }
        }

        $Va4elnpuniwh = $this->generate(
            $V31qrja1w0r2,
            $V0yfl5ulns0o,
            $Vc3zs2kevdk4,
            $V44zsh1gr23n,
            $Vv0pgf0zb1b3,
            $V3h3xe1o2lav,
            $Vzbcxnhqeuh5
        );

        return $this->getObject(
            $Va4elnpuniwh['code'],
            $Va4elnpuniwh['mockClassName'],
            $V31qrja1w0r2,
            $Vzphkx44dq2t,
            $Vv0pgf0zb1b3,
            $Vj23lbel2xn0,
            $Vzbcxnhqeuh5,
            $Vp0lqmwkx3ds
        );
    }

    
    protected function getObject($V5kll1klco0v, $Vh0iae5cev4i, $V31qrja1w0r2 = '', $Vzphkx44dq2t = false, $Vv0pgf0zb1b3 = false, array $Vj23lbel2xn0 = array(), $Vzbcxnhqeuh5 = false, $Vp0lqmwkx3ds = null)
    {
        $this->evalClass($V5kll1klco0v, $Vh0iae5cev4i);

        if ($Vzphkx44dq2t &&
            is_string($V31qrja1w0r2) &&
            !interface_exists($V31qrja1w0r2, $Vv0pgf0zb1b3)) {
            if (count($Vj23lbel2xn0) == 0) {
                $Vbj3pw2f5egf = new $Vh0iae5cev4i;
            } else {
                $Vqmu1sajhgfn  = new ReflectionClass($Vh0iae5cev4i);
                $Vbj3pw2f5egf = $Vqmu1sajhgfn->newInstanceArgs($Vj23lbel2xn0);
            }
        } else {
            try {
                $Vy3pdqdzoqga = new Instantiator;
                $Vbj3pw2f5egf       = $Vy3pdqdzoqga->instantiate($Vh0iae5cev4i);
            } catch (InstantiatorUnexpectedValueException $Vzzme31ixifp) {
                if ($Vzzme31ixifp->getPrevious()) {
                    $Vzzme31ixifp = $Vzzme31ixifp->getPrevious();
                }

                throw new PHPUnit_Framework_MockObject_RuntimeException(
                    $Vzzme31ixifp->getMessage()
                );
            } catch (InstantiatorInvalidArgumentException $Vzzme31ixifp) {
                throw new PHPUnit_Framework_MockObject_RuntimeException(
                    $Vzzme31ixifp->getMessage()
                );
            }
        }

        if ($Vzbcxnhqeuh5) {
            if (!is_object($Vp0lqmwkx3ds)) {
                if (count($Vj23lbel2xn0) == 0) {
                    $Vp0lqmwkx3ds = new $V31qrja1w0r2;
                } else {
                    $Vqmu1sajhgfn       = new ReflectionClass($V31qrja1w0r2);
                    $Vp0lqmwkx3ds = $Vqmu1sajhgfn->newInstanceArgs($Vj23lbel2xn0);
                }
            }

            $Vbj3pw2f5egf->__phpunit_setOriginalObject($Vp0lqmwkx3ds);
        }

        return $Vbj3pw2f5egf;
    }

    
    protected function evalClass($V5kll1klco0v, $Vh0iae5cev4i)
    {
        if (!class_exists($Vh0iae5cev4i, false)) {
            eval($V5kll1klco0v);
        }
    }

    
    public function getMockForAbstractClass($Vyvlub3tsdnu, array $Vj23lbel2xn0 = array(), $Vc3zs2kevdk4 = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $Va4elnpuniwhedMethods = array(), $V3h3xe1o2lav = true)
    {
        if (!is_string($Vyvlub3tsdnu)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Vc3zs2kevdk4)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'string');
        }

        if (class_exists($Vyvlub3tsdnu, $Vv0pgf0zb1b3) ||
            interface_exists($Vyvlub3tsdnu, $Vv0pgf0zb1b3)) {
            $Vwap0ldzbcftor = new ReflectionClass($Vyvlub3tsdnu);
            $V0yfl5ulns0o   = $Va4elnpuniwhedMethods;

            foreach ($Vwap0ldzbcftor->getMethods() as $Vtlfvdwskdge) {
                if ($Vtlfvdwskdge->isAbstract() && !in_array($Vtlfvdwskdge->getName(), $V0yfl5ulns0o)) {
                    $V0yfl5ulns0o[] = $Vtlfvdwskdge->getName();
                }
            }

            if (empty($V0yfl5ulns0o)) {
                $V0yfl5ulns0o = null;
            }

            return $this->getMock(
                $Vyvlub3tsdnu,
                $V0yfl5ulns0o,
                $Vj23lbel2xn0,
                $Vc3zs2kevdk4,
                $Vzphkx44dq2t,
                $V44zsh1gr23n,
                $Vv0pgf0zb1b3,
                $V3h3xe1o2lav
            );
        } else {
            throw new PHPUnit_Framework_MockObject_RuntimeException(
                sprintf('Class "%s" does not exist.', $Vyvlub3tsdnu)
            );
        }
    }

    
    public function getMockForTrait($V2anblfzdukl, array $Vj23lbel2xn0 = array(), $Vc3zs2kevdk4 = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $Va4elnpuniwhedMethods = array(), $V3h3xe1o2lav = true)
    {
        if (!is_string($V2anblfzdukl)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Vc3zs2kevdk4)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'string');
        }

        if (!trait_exists($V2anblfzdukl, $Vv0pgf0zb1b3)) {
            throw new PHPUnit_Framework_MockObject_RuntimeException(
                sprintf(
                    'Trait "%s" does not exist.',
                    $V2anblfzdukl
                )
            );
        }

        $Vh0iae5cev4i = $this->generateClassName(
            $V2anblfzdukl,
            '',
            'Trait_'
        );

        $V0ktacg0xvt2   = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Generator' .
                         DIRECTORY_SEPARATOR;
        $Vqmu1sajhgfnTemplate = new Text_Template(
            $V0ktacg0xvt2 . 'trait_class.tpl'
        );

        $Vqmu1sajhgfnTemplate->setVar(
            array(
            'prologue'   => 'abstract ',
            'class_name' => $Vh0iae5cev4i['className'],
            'trait_name' => $V2anblfzdukl
            )
        );

        $this->evalClass(
            $Vqmu1sajhgfnTemplate->render(),
            $Vh0iae5cev4i['className']
        );

        return $this->getMockForAbstractClass($Vh0iae5cev4i['className'], $Vj23lbel2xn0, $Vc3zs2kevdk4, $Vzphkx44dq2t, $V44zsh1gr23n, $Vv0pgf0zb1b3, $Va4elnpuniwhedMethods, $V3h3xe1o2lav);
    }

    
    public function getObjectForTrait($V2anblfzdukl, array $Vj23lbel2xn0 = array(), $Vxn4rwifjdkf = '', $Vzphkx44dq2t = true, $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true)
    {
        if (!is_string($V2anblfzdukl)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Vxn4rwifjdkf)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'string');
        }

        if (!trait_exists($V2anblfzdukl, $Vv0pgf0zb1b3)) {
            throw new PHPUnit_Framework_MockObject_RuntimeException(
                sprintf(
                    'Trait "%s" does not exist.',
                    $V2anblfzdukl
                )
            );
        }

        $Vh0iae5cev4i = $this->generateClassName(
            $V2anblfzdukl,
            $Vxn4rwifjdkf,
            'Trait_'
        );

        $V0ktacg0xvt2   = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Generator' .
                         DIRECTORY_SEPARATOR;
        $Vqmu1sajhgfnTemplate = new Text_Template(
            $V0ktacg0xvt2 . 'trait_class.tpl'
        );

        $Vqmu1sajhgfnTemplate->setVar(
            array(
            'prologue'   => '',
            'class_name' => $Vh0iae5cev4i['className'],
            'trait_name' => $V2anblfzdukl
            )
        );

        return $this->getObject(
            $Vqmu1sajhgfnTemplate->render(),
            $Vh0iae5cev4i['className']
        );
    }

    
    public function generate($V31qrja1w0r2, array $V0yfl5ulns0o = null, $Vc3zs2kevdk4 = '', $V44zsh1gr23n = true, $Vv0pgf0zb1b3 = true, $V3h3xe1o2lav = true, $Vzbcxnhqeuh5 = false)
    {
        if (is_array($V31qrja1w0r2)) {
            sort($V31qrja1w0r2);
        }

        if ($Vc3zs2kevdk4 == '') {
            $Vlpbz5aloxqt = md5(
                is_array($V31qrja1w0r2) ? implode('_', $V31qrja1w0r2) : $V31qrja1w0r2 .
                serialize($V0yfl5ulns0o) .
                serialize($V44zsh1gr23n) .
                serialize($V3h3xe1o2lav) .
                serialize($Vzbcxnhqeuh5)
            );

            if (isset(self::$Vzwp15rts0pz[$Vlpbz5aloxqt])) {
                return self::$Vzwp15rts0pz[$Vlpbz5aloxqt];
            }
        }

        $Va4elnpuniwh = $this->generateMock(
            $V31qrja1w0r2,
            $V0yfl5ulns0o,
            $Vc3zs2kevdk4,
            $V44zsh1gr23n,
            $Vv0pgf0zb1b3,
            $V3h3xe1o2lav,
            $Vzbcxnhqeuh5
        );

        if (isset($Vlpbz5aloxqt)) {
            self::$Vzwp15rts0pz[$Vlpbz5aloxqt] = $Va4elnpuniwh;
        }

        return $Va4elnpuniwh;
    }

    
    public function generateClassFromWsdl($Vghoqgxwvz33, $Vh0iae5cev4i, array $V0yfl5ulns0o = array(), array $V4a4guv4okog = array())
    {
        if (!extension_loaded('soap')) {
            throw new PHPUnit_Framework_MockObject_RuntimeException(
                'The SOAP extension is required to generate a mock object from WSDL.'
            );
        }

        $V4a4guv4okog  = array_merge($V4a4guv4okog, array('cache_wsdl' => WSDL_CACHE_NONE));
        $Vd2bsv5dubct   = new SoapClient($Vghoqgxwvz33, $V4a4guv4okog);
        $Vieqx3ly0ih5 = array_unique($Vd2bsv5dubct->__getFunctions());
        unset($Vd2bsv5dubct);

        sort($Vieqx3ly0ih5);

        $V0ktacg0xvt2    = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Generator' . DIRECTORY_SEPARATOR;
        $VtlfvdwskdgeTemplate = new Text_Template($V0ktacg0xvt2 . 'wsdl_method.tpl');
        $V0yfl5ulns0oBuffer  = '';

        foreach ($Vieqx3ly0ih5 as $Vtlfvdwskdge) {
            $Vp4p0ig5h5pm = strpos($Vtlfvdwskdge, ' ') + 1;
            $Vpwqan5doiho   = strpos($Vtlfvdwskdge, '(');
            $Vgpjmw221p0b      = substr($Vtlfvdwskdge, $Vp4p0ig5h5pm, $Vpwqan5doiho - $Vp4p0ig5h5pm);

            if (empty($V0yfl5ulns0o) || in_array($Vgpjmw221p0b, $V0yfl5ulns0o)) {
                $Veox3iprl5oz    = explode(
                    ',',
                    substr(
                        $Vtlfvdwskdge,
                        $Vpwqan5doiho + 1,
                        strpos($Vtlfvdwskdge, ')') - $Vpwqan5doiho - 1
                    )
                );
                $Vt1q44x3b3fv = count($Veox3iprl5oz);

                for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vt1q44x3b3fv; $Vxja1abp34yq++) {
                    $Veox3iprl5oz[$Vxja1abp34yq] = substr($Veox3iprl5oz[$Vxja1abp34yq], strpos($Veox3iprl5oz[$Vxja1abp34yq], '$'));
                }

                $VtlfvdwskdgeTemplate->setVar(
                    array(
                        'method_name' => $Vgpjmw221p0b,
                        'arguments'   => implode(', ', $Veox3iprl5oz)
                    )
                );

                $V0yfl5ulns0oBuffer .= $VtlfvdwskdgeTemplate->render();
            }
        }

        $V4a4guv4okogBuffer = 'array(';

        foreach ($V4a4guv4okog as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
            $V4a4guv4okogBuffer .= $Vlpbz5aloxqt . ' => ' . $Vcptarsq5qe4;
        }

        $V4a4guv4okogBuffer .= ')';

        $Vqmu1sajhgfnTemplate = new Text_Template($V0ktacg0xvt2 . 'wsdl_class.tpl');
        $Vgpjmw221p0bspace     = '';

        if (strpos($Vh0iae5cev4i, '\\') !== false) {
            $Vbkdgagqgicd     = explode('\\', $Vh0iae5cev4i);
            $Vh0iae5cev4i = array_pop($Vbkdgagqgicd);
            $Vgpjmw221p0bspace = 'namespace ' . implode('\\', $Vbkdgagqgicd) . ';' . "\n\n";
        }

        $Vqmu1sajhgfnTemplate->setVar(
            array(
                'namespace'  => $Vgpjmw221p0bspace,
                'class_name' => $Vh0iae5cev4i,
                'wsdl'       => $Vghoqgxwvz33,
                'options'    => $V4a4guv4okogBuffer,
                'methods'    => $V0yfl5ulns0oBuffer
            )
        );

        return $Vqmu1sajhgfnTemplate->render();
    }

    
    protected function generateMock($V31qrja1w0r2, $V0yfl5ulns0o, $Vc3zs2kevdk4, $V44zsh1gr23n, $Vv0pgf0zb1b3, $V3h3xe1o2lav, $Vzbcxnhqeuh5)
    {
        $V0ktacg0xvt2   = dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Generator' .
                         DIRECTORY_SEPARATOR;
        $Vqmu1sajhgfnTemplate = new Text_Template(
            $V0ktacg0xvt2 . 'mocked_class.tpl'
        );

        $Vdbkaohpz130 = array();
        $Vurcsaq22piy        = '';
        $Vxja1abp34yqsClass              = false;
        $Vxja1abp34yqsInterface          = false;

        $Vc3zs2kevdk4 = $this->generateClassName(
            $V31qrja1w0r2,
            $Vc3zs2kevdk4,
            'Mock_'
        );

        if (is_array($V31qrja1w0r2)) {
            foreach ($V31qrja1w0r2 as $Vrphanvyixqy) {
                if (!interface_exists($Vrphanvyixqy, $Vv0pgf0zb1b3)) {
                    throw new PHPUnit_Framework_Exception(
                        sprintf(
                            'Interface "%s" does not exist.',
                            $Vrphanvyixqy
                        )
                    );
                }

                $Vdbkaohpz130[] = $Vrphanvyixqy;

                foreach ($this->getClassMethods($Vrphanvyixqy) as $Vtlfvdwskdge) {
                    if (in_array($Vtlfvdwskdge, $V0yfl5ulns0o)) {
                        throw new PHPUnit_Framework_Exception(
                            sprintf(
                                'Duplicate method "%s" not allowed.',
                                $Vtlfvdwskdge
                            )
                        );
                    }

                    $V0yfl5ulns0o[] = $Vtlfvdwskdge;
                }
            }
        }

        if (class_exists($Vc3zs2kevdk4['fullClassName'], $Vv0pgf0zb1b3)) {
            $Vxja1abp34yqsClass = true;
        } else {
            if (interface_exists($Vc3zs2kevdk4['fullClassName'], $Vv0pgf0zb1b3)) {
                $Vxja1abp34yqsInterface = true;
            }
        }

        if (!class_exists($Vc3zs2kevdk4['fullClassName'], $Vv0pgf0zb1b3) &&
            !interface_exists($Vc3zs2kevdk4['fullClassName'], $Vv0pgf0zb1b3)) {
            $Vmzgpgmibptx = 'class ' . $Vc3zs2kevdk4['originalClassName'] . "\n{\n}\n\n";

            if (!empty($Vc3zs2kevdk4['namespaceName'])) {
                $Vmzgpgmibptx = 'namespace ' . $Vc3zs2kevdk4['namespaceName'] .
                            " {\n\n" . $Vmzgpgmibptx . "}\n\n" .
                            "namespace {\n\n";

                $Vq5nnletpc5q = "\n\n}";
            }

            $Vurcsaq22piy = new Text_Template(
                $V0ktacg0xvt2 . 'mocked_clone.tpl'
            );
        } else {
            $Vqmu1sajhgfn = new ReflectionClass($Vc3zs2kevdk4['fullClassName']);

            if ($Vqmu1sajhgfn->isFinal()) {
                throw new PHPUnit_Framework_Exception(
                    sprintf(
                        'Class "%s" is declared "final" and cannot be mocked.',
                        $Vc3zs2kevdk4['fullClassName']
                    )
                );
            }

            if ($Vqmu1sajhgfn->hasMethod('__clone')) {
                $Vcs4nkkhxkev = $Vqmu1sajhgfn->getMethod('__clone');

                if (!$Vcs4nkkhxkev->isFinal()) {
                    if ($V44zsh1gr23n && !$Vxja1abp34yqsInterface) {
                        $Vurcsaq22piy = new Text_Template(
                            $V0ktacg0xvt2 . 'unmocked_clone.tpl'
                        );
                    } else {
                        $Vurcsaq22piy = new Text_Template(
                            $V0ktacg0xvt2 . 'mocked_clone.tpl'
                        );
                    }
                }
            } else {
                $Vurcsaq22piy = new Text_Template(
                    $V0ktacg0xvt2 . 'mocked_clone.tpl'
                );
            }
        }

        if (is_object($Vurcsaq22piy)) {
            $Vurcsaq22piy = $Vurcsaq22piy->render();
        }

        if (is_array($V0yfl5ulns0o) && empty($V0yfl5ulns0o) &&
            ($Vxja1abp34yqsClass || $Vxja1abp34yqsInterface)) {
            $V0yfl5ulns0o = $this->getClassMethods($Vc3zs2kevdk4['fullClassName']);
        }

        if (!is_array($V0yfl5ulns0o)) {
            $V0yfl5ulns0o = array();
        }

        $Va4elnpuniwhedMethods = '';

        if (isset($Vqmu1sajhgfn)) {
            
            if ($Vxja1abp34yqsInterface && $Vqmu1sajhgfn->implementsInterface('Traversable') &&
                !$Vqmu1sajhgfn->implementsInterface('Iterator') &&
                !$Vqmu1sajhgfn->implementsInterface('IteratorAggregate')) {
                $Vdbkaohpz130[] = 'Iterator';
                $V0yfl5ulns0o                = array_merge($V0yfl5ulns0o, $this->getClassMethods('Iterator'));
            }

            foreach ($V0yfl5ulns0o as $VtlfvdwskdgeName) {
                try {
                    $Vtlfvdwskdge = $Vqmu1sajhgfn->getMethod($VtlfvdwskdgeName);

                    if ($this->canMockMethod($Vtlfvdwskdge)) {
                        $Va4elnpuniwhedMethods .= $this->generateMockedMethodDefinitionFromExisting(
                            $V0ktacg0xvt2,
                            $Vtlfvdwskdge,
                            $V3h3xe1o2lav,
                            $Vzbcxnhqeuh5
                        );
                    }
                } catch (ReflectionException $Vpt32vvhspnv) {
                    $Va4elnpuniwhedMethods .= $this->generateMockedMethodDefinition(
                        $V0ktacg0xvt2,
                        $Vc3zs2kevdk4['fullClassName'],
                        $VtlfvdwskdgeName,
                        $V3h3xe1o2lav
                    );
                }
            }
        } else {
            foreach ($V0yfl5ulns0o as $VtlfvdwskdgeName) {
                $Va4elnpuniwhedMethods .= $this->generateMockedMethodDefinition(
                    $V0ktacg0xvt2,
                    $Vc3zs2kevdk4['fullClassName'],
                    $VtlfvdwskdgeName,
                    $V3h3xe1o2lav
                );
            }
        }

        $Vtlfvdwskdge = '';

        if (!in_array('method', $V0yfl5ulns0o)) {
            $VtlfvdwskdgeTemplate = new Text_Template(
                $V0ktacg0xvt2 . 'mocked_class_method.tpl'
            );

            $Vtlfvdwskdge = $VtlfvdwskdgeTemplate->render();
        }

        $Vqmu1sajhgfnTemplate->setVar(
            array(
            'prologue'          => isset($Vmzgpgmibptx) ? $Vmzgpgmibptx : '',
            'epilogue'          => isset($Vq5nnletpc5q) ? $Vq5nnletpc5q : '',
            'class_declaration' => $this->generateMockClassDeclaration(
                $Vc3zs2kevdk4,
                $Vxja1abp34yqsInterface,
                $Vdbkaohpz130
            ),
            'clone'             => $Vurcsaq22piy,
            'mock_class_name'   => $Vc3zs2kevdk4['className'],
            'mocked_methods'    => $Va4elnpuniwhedMethods,
            'method'            => $Vtlfvdwskdge
            )
        );

        return array(
          'code'          => $Vqmu1sajhgfnTemplate->render(),
          'mockClassName' => $Vc3zs2kevdk4['className']
        );
    }

    
    protected function generateClassName($V31qrja1w0r2, $Vh0iae5cev4i, $V2hf2uebv5m0)
    {
        if (is_array($V31qrja1w0r2)) {
            $V31qrja1w0r2 = implode('_', $V31qrja1w0r2);
        }

        if ($V31qrja1w0r2[0] == '\\') {
            $V31qrja1w0r2 = substr($V31qrja1w0r2, 1);
        }

        $Vh0iae5cev4iParts = explode('\\', $V31qrja1w0r2);

        if (count($Vh0iae5cev4iParts) > 1) {
            $V31qrja1w0r2          = array_pop($Vh0iae5cev4iParts);
            $Vgpjmw221p0bspaceName = implode('\\', $Vh0iae5cev4iParts);
            $Vzu4zakktkck = $Vgpjmw221p0bspaceName . '\\' . $V31qrja1w0r2;
        } else {
            $Vgpjmw221p0bspaceName = '';
            $Vzu4zakktkck = $V31qrja1w0r2;
        }

        if ($Vh0iae5cev4i == '') {
            do {
                $Vh0iae5cev4i = $V2hf2uebv5m0 . $V31qrja1w0r2 . '_' .
                             substr(md5(microtime()), 0, 8);
            } while (class_exists($Vh0iae5cev4i, false));
        }

        return array(
          'className'         => $Vh0iae5cev4i,
          'originalClassName' => $V31qrja1w0r2,
          'fullClassName'     => $Vzu4zakktkck,
          'namespaceName'     => $Vgpjmw221p0bspaceName
        );
    }

    
    protected function generateMockClassDeclaration(array $Vc3zs2kevdk4, $Vxja1abp34yqsInterface, array $Vdbkaohpz130 = array())
    {
        $Vd3322ljwbqh = 'class ';

        $Vdbkaohpz130[] = 'PHPUnit_Framework_MockObject_MockObject';
        $Vxja1abp34yqnterfaces             = implode(', ', $Vdbkaohpz130);

        if ($Vxja1abp34yqsInterface) {
            $Vd3322ljwbqh .= sprintf(
                '%s implements %s',
                $Vc3zs2kevdk4['className'],
                $Vxja1abp34yqnterfaces
            );

            if (!in_array($Vc3zs2kevdk4['originalClassName'], $Vdbkaohpz130)) {
                $Vd3322ljwbqh .= ', ';

                if (!empty($Vc3zs2kevdk4['namespaceName'])) {
                    $Vd3322ljwbqh .= $Vc3zs2kevdk4['namespaceName'] . '\\';
                }

                $Vd3322ljwbqh .= $Vc3zs2kevdk4['originalClassName'];
            }
        } else {
            $Vd3322ljwbqh .= sprintf(
                '%s extends %s%s implements %s',
                $Vc3zs2kevdk4['className'],
                !empty($Vc3zs2kevdk4['namespaceName']) ? $Vc3zs2kevdk4['namespaceName'] . '\\' : '',
                $Vc3zs2kevdk4['originalClassName'],
                $Vxja1abp34yqnterfaces
            );
        }

        return $Vd3322ljwbqh;
    }

    
    protected function generateMockedMethodDefinitionFromExisting($V0ktacg0xvt2, ReflectionMethod $Vtlfvdwskdge, $V3h3xe1o2lav, $Vzbcxnhqeuh5)
    {
        if ($Vtlfvdwskdge->isPrivate()) {
            $Vts2qrffldvs = 'private';
        } elseif ($Vtlfvdwskdge->isProtected()) {
            $Vts2qrffldvs = 'protected';
        } else {
            $Vts2qrffldvs = 'public';
        }

        if ($Vtlfvdwskdge->isStatic()) {
            $Vts2qrffldvs .= ' static';
        }

        if ($Vtlfvdwskdge->returnsReference()) {
            $Vea0tc0mxkzg = '&';
        } else {
            $Vea0tc0mxkzg = '';
        }

        return $this->generateMockedMethodDefinition(
            $V0ktacg0xvt2,
            $Vtlfvdwskdge->getDeclaringClass()->getName(),
            $Vtlfvdwskdge->getName(),
            $V3h3xe1o2lav,
            $Vts2qrffldvs,
            $this->getMethodParameters($Vtlfvdwskdge),
            $this->getMethodParameters($Vtlfvdwskdge, true),
            $Vea0tc0mxkzg,
            $Vzbcxnhqeuh5,
            $Vtlfvdwskdge->isStatic()
        );
    }

    
    protected function generateMockedMethodDefinition($V0ktacg0xvt2, $Vh0iae5cev4i, $VtlfvdwskdgeName, $V3h3xe1o2lav = true, $Vts2qrffldvs = 'public', $Vj23lbel2xn0_decl = '', $Vj23lbel2xn0_call = '', $Vea0tc0mxkzg = '', $Vzbcxnhqeuh5 = false, $Voyfr0hmk3rl = false)
    {
        if ($Voyfr0hmk3rl) {
            $V4sdpviifs2u = 'mocked_static_method.tpl';
        } else {
            $V4sdpviifs2u = sprintf(
                '%s_method.tpl',
                $Vzbcxnhqeuh5 ? 'proxied' : 'mocked'
            );
        }

        $Vlqygqxkgo25 = new Text_Template($V0ktacg0xvt2 . $V4sdpviifs2u);

        $Vlqygqxkgo25->setVar(
            array(
            'arguments_decl'  => $Vj23lbel2xn0_decl,
            'arguments_call'  => $Vj23lbel2xn0_call,
            'arguments_count' => !empty($Vj23lbel2xn0_call) ? count(explode(',', $Vj23lbel2xn0_call)) : 0,
            'class_name'      => $Vh0iae5cev4i,
            'method_name'     => $VtlfvdwskdgeName,
            'modifier'        => $Vts2qrffldvs,
            'reference'       => $Vea0tc0mxkzg,
            'clone_arguments' => $V3h3xe1o2lav ? 'TRUE' : 'FALSE'
            )
        );

        return $Vlqygqxkgo25->render();
    }

    
    protected function canMockMethod(ReflectionMethod $Vtlfvdwskdge)
    {
        if ($Vtlfvdwskdge->isConstructor() ||
            $Vtlfvdwskdge->isFinal() ||
            $Vtlfvdwskdge->isPrivate() ||
            isset($this->blacklistedMethodNames[$Vtlfvdwskdge->getName()])) {
            return false;
        }

        return true;
    }

    
    protected function getMethodParameters(ReflectionMethod $Vtlfvdwskdge, $Vqrjjhcsl0xs = false)
    {
        $Vsazp03zrvte = array();

        foreach ($Vtlfvdwskdge->getParameters() as $Vxja1abp34yq => $Vd51rl30yovf) {
            $Vgpjmw221p0b = '$' . $Vd51rl30yovf->getName();

            
            if ($Vgpjmw221p0b === '$' || $Vgpjmw221p0b === '$...') {
                $Vgpjmw221p0b = '$V5mddzgxir3y' . $Vxja1abp34yq;
            }

            if ($this->isVariadic($Vd51rl30yovf)) {
                if ($Vqrjjhcsl0xs) {
                    continue;
                } else {
                    $Vgpjmw221p0b = '...' . $Vgpjmw221p0b;
                }
            }

            $V0ekusmibtbl         = '';
            $Vea0tc0mxkzg       = '';
            $V31qrja1w0r2Declaration = '';

            if (!$Vqrjjhcsl0xs) {
                if ($this->hasType($Vd51rl30yovf)) {
                    $V31qrja1w0r2Declaration = (string) $Vd51rl30yovf->getType() . ' ';
                } elseif ($Vd51rl30yovf->isArray()) {
                    $V31qrja1w0r2Declaration = 'array ';
                } elseif ((defined('HHVM_VERSION') || version_compare(PHP_VERSION, '5.4.0', '>='))
                          && $Vd51rl30yovf->isCallable()) {
                    $V31qrja1w0r2Declaration = 'callable ';
                } else {
                    try {
                        $Vqmu1sajhgfn = $Vd51rl30yovf->getClass();
                    } catch (ReflectionException $Vpt32vvhspnv) {
                        throw new PHPUnit_Framework_MockObject_RuntimeException(
                            sprintf(
                                'Cannot mock %s::%s() because a class or ' .
                                'interface used in the signature is not loaded',
                                $Vtlfvdwskdge->getDeclaringClass()->getName(),
                                $Vtlfvdwskdge->getName()
                            ),
                            0,
                            $Vpt32vvhspnv
                        );
                    }

                    if ($Vqmu1sajhgfn !== null) {
                        $V31qrja1w0r2Declaration = $Vqmu1sajhgfn->getName() . ' ';
                    }
                }

                if (!$this->isVariadic($Vd51rl30yovf)) {
                    if ($Vd51rl30yovf->isDefaultValueAvailable()) {
                        $Vcptarsq5qe4   = $Vd51rl30yovf->getDefaultValue();
                        $V0ekusmibtbl = ' = ' . var_export($Vcptarsq5qe4, true);
                    } elseif ($Vd51rl30yovf->isOptional()) {
                        $V0ekusmibtbl = ' = null';
                    }
                }
            }

            if ($Vd51rl30yovf->isPassedByReference()) {
                $Vea0tc0mxkzg = '&';
            }

            $Vsazp03zrvte[] = $V31qrja1w0r2Declaration . $Vea0tc0mxkzg . $Vgpjmw221p0b . $V0ekusmibtbl;
        }

        return implode(', ', $Vsazp03zrvte);
    }

    
    private function isVariadic(ReflectionParameter $Vd51rl30yovf)
    {
        return method_exists('ReflectionParameter', 'isVariadic') && $Vd51rl30yovf->isVariadic();
    }

    
    private function hasType(ReflectionParameter $Vd51rl30yovf)
    {
        return method_exists('ReflectionParameter', 'hasType') && $Vd51rl30yovf->hasType();
    }

    
    private function getClassMethods($Vh0iae5cev4i)
    {
        $Vqmu1sajhgfn   = new ReflectionClass($Vh0iae5cev4i);
        $V0yfl5ulns0o = array();

        foreach ($Vqmu1sajhgfn->getMethods() as $Vtlfvdwskdge) {
            if (($Vtlfvdwskdge->isPublic() || $Vtlfvdwskdge->isAbstract()) && !in_array($Vtlfvdwskdge->getName(), $V0yfl5ulns0o)) {
                $V0yfl5ulns0o[] = $Vtlfvdwskdge->getName();
            }
        }

        return $V0yfl5ulns0o;
    }
}
