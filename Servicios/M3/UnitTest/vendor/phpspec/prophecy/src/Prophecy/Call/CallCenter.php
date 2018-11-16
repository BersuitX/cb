<?php



namespace Prophecy\Call;

use Prophecy\Exception\Prophecy\MethodProphecyException;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Argument\ArgumentsWildcard;
use Prophecy\Util\StringUtil;
use Prophecy\Exception\Call\UnexpectedCallException;


class CallCenter
{
    private $V54ioytbirq2;

    
    private $Vbgewjwb1ag0 = array();

    
    public function __construct(StringUtil $V54ioytbirq2 = null)
    {
        $this->util = $V54ioytbirq2 ?: new StringUtil;
    }

    
    public function makeCall(ObjectProphecy $V2fq5eyaztqt, $Vc1exo5hbki5, array $Vj23lbel2xn0)
    {
        
        if (PHP_VERSION_ID >= 50400) {
            
            
            $V5x4ehxd4ln3 = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 3);
        } elseif (defined('DEBUG_BACKTRACE_IGNORE_ARGS')) {
            
            $V5x4ehxd4ln3 = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
        } else {
            $V5x4ehxd4ln3 = debug_backtrace();
        }

        $Vpu3xl4uhgg5 = $Vrwsmtja4f2j = null;
        if (isset($V5x4ehxd4ln3[2]) && isset($V5x4ehxd4ln3[2]['file'])) {
            $Vpu3xl4uhgg5 = $V5x4ehxd4ln3[2]['file'];
            $Vrwsmtja4f2j = $V5x4ehxd4ln3[2]['line'];
        }

        
        if ('__destruct' === $Vc1exo5hbki5 || 0 == count($V2fq5eyaztqt->getMethodProphecies())) {
            $this->recordedCalls[] = new Call($Vc1exo5hbki5, $Vj23lbel2xn0, null, null, $Vpu3xl4uhgg5, $Vrwsmtja4f2j);

            return null;
        }

        
        $Virbphhh55ue = array();
        foreach ($V2fq5eyaztqt->getMethodProphecies($Vc1exo5hbki5) as $Vl4x0cix3k15) {
            if (0 < $Vyxvr2mto3df = $Vl4x0cix3k15->getArgumentsWildcard()->scoreArguments($Vj23lbel2xn0)) {
                $Virbphhh55ue[] = array($Vyxvr2mto3df, $Vl4x0cix3k15);
            }
        }

        
        if (!count($Virbphhh55ue)) {
            throw $this->createUnexpectedCallException($V2fq5eyaztqt, $Vc1exo5hbki5, $Vj23lbel2xn0);
        }

        
        @usort($Virbphhh55ue, function ($Vlgx4kdjoujv, $Vanjbso0m4t3) { return $Vanjbso0m4t3[0] - $Vlgx4kdjoujv[0]; });

        
        $Vl4x0cix3k15 = $Virbphhh55ue[0][1];
        $Vvsvqhpcr3ye = null;
        $Vzzme31ixifp   = null;
        if ($Vcbqbslxtnd4 = $Vl4x0cix3k15->getPromise()) {
            try {
                $Vvsvqhpcr3ye = $Vcbqbslxtnd4->execute($Vj23lbel2xn0, $V2fq5eyaztqt, $Vl4x0cix3k15);
            } catch (\Exception $Vpt32vvhspnv) {
                $Vzzme31ixifp = $Vpt32vvhspnv;
            }
        }

        if ($Vl4x0cix3k15->hasReturnVoid() && $Vvsvqhpcr3ye !== null) {
            throw new MethodProphecyException(
                "The method \"$Vc1exo5hbki5\" has a void return type, but the promise returned a value",
                $Vl4x0cix3k15
            );
        }

        $this->recordedCalls[] = new Call(
            $Vc1exo5hbki5, $Vj23lbel2xn0, $Vvsvqhpcr3ye, $Vzzme31ixifp, $Vpu3xl4uhgg5, $Vrwsmtja4f2j
        );

        if (null !== $Vzzme31ixifp) {
            throw $Vzzme31ixifp;
        }

        return $Vvsvqhpcr3ye;
    }

    
    public function findCalls($Vc1exo5hbki5, ArgumentsWildcard $Vzsfgwc03ssr)
    {
        return array_values(
            array_filter($this->recordedCalls, function (Call $V2if5e0ncexa) use ($Vc1exo5hbki5, $Vzsfgwc03ssr) {
                return $Vc1exo5hbki5 === $V2if5e0ncexa->getMethodName()
                    && 0 < $Vzsfgwc03ssr->scoreArguments($V2if5e0ncexa->getArguments())
                ;
            })
        );
    }

    private function createUnexpectedCallException(ObjectProphecy $V2fq5eyaztqt, $Vc1exo5hbki5,
                                                   array $Vj23lbel2xn0)
    {
        $V3ngkdmbo02c = get_class($V2fq5eyaztqt->reveal());
        $Vunm4wslc2xy = implode(', ', array_map(array($this->util, 'stringify'), $Vj23lbel2xn0));
        $Vpt32vvhspnvxpected  = implode("\n", array_map(function (MethodProphecy $Vl4x0cix3k15) {
            return sprintf('  - %s(%s)',
                $Vl4x0cix3k15->getMethodName(),
                $Vl4x0cix3k15->getArgumentsWildcard()
            );
        }, call_user_func_array('array_merge', $V2fq5eyaztqt->getMethodProphecies())));

        return new UnexpectedCallException(
            sprintf(
                "Method call:\n".
                "  - %s(%s)\n".
                "on %s was not expected, expected calls were:\n%s",

                $Vc1exo5hbki5, $Vunm4wslc2xy, $V3ngkdmbo02c, $Vpt32vvhspnvxpected
            ),
            $V2fq5eyaztqt, $Vc1exo5hbki5, $Vj23lbel2xn0
        );
    }
}
