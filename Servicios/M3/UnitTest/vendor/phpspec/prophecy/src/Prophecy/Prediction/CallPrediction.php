<?php



namespace Prophecy\Prediction;

use Prophecy\Call\Call;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Argument\ArgumentsWildcard;
use Prophecy\Argument\Token\AnyValuesToken;
use Prophecy\Util\StringUtil;
use Prophecy\Exception\Prediction\NoCallsException;


class CallPrediction implements PredictionInterface
{
    private $V54ioytbirq2;

    
    public function __construct(StringUtil $V54ioytbirq2 = null)
    {
        $this->util = $V54ioytbirq2 ?: new StringUtil;
    }

    
    public function check(array $Vqk0kzw04abh, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        if (count($Vqk0kzw04abh)) {
            return;
        }

        $VtlfvdwskdgeCalls = $Vbj3pw2f5egf->findProphecyMethodCalls(
            $Vtlfvdwskdge->getMethodName(),
            new ArgumentsWildcard(array(new AnyValuesToken))
        );

        if (count($VtlfvdwskdgeCalls)) {
            throw new NoCallsException(sprintf(
                "No calls have been made that match:\n".
                "  %s->%s(%s)\n".
                "but expected at least one.\n".
                "Recorded `%s(...)` calls:\n%s",

                get_class($Vbj3pw2f5egf->reveal()),
                $Vtlfvdwskdge->getMethodName(),
                $Vtlfvdwskdge->getArgumentsWildcard(),
                $Vtlfvdwskdge->getMethodName(),
                $this->util->stringifyCalls($VtlfvdwskdgeCalls)
            ), $Vtlfvdwskdge);
        }

        throw new NoCallsException(sprintf(
            "No calls have been made that match:\n".
            "  %s->%s(%s)\n".
            "but expected at least one.",

            get_class($Vbj3pw2f5egf->reveal()),
            $Vtlfvdwskdge->getMethodName(),
            $Vtlfvdwskdge->getArgumentsWildcard()
        ), $Vtlfvdwskdge);
    }
}
