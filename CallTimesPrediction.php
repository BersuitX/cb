<?php



namespace Prophecy\Prediction;

use Prophecy\Call\Call;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Argument\ArgumentsWildcard;
use Prophecy\Argument\Token\AnyValuesToken;
use Prophecy\Util\StringUtil;
use Prophecy\Exception\Prediction\UnexpectedCallsCountException;


class CallTimesPrediction implements PredictionInterface
{
    private $Vp511fyx2cos;
    private $V54ioytbirq2;

    
    public function __construct($Vp511fyx2cos, StringUtil $V54ioytbirq2 = null)
    {
        $this->times = intval($Vp511fyx2cos);
        $this->util  = $V54ioytbirq2 ?: new StringUtil;
    }

    
    public function check(array $Vqk0kzw04abh, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        if ($this->times == count($Vqk0kzw04abh)) {
            return;
        }

        $VtlfvdwskdgeCalls = $Vbj3pw2f5egf->findProphecyMethodCalls(
            $Vtlfvdwskdge->getMethodName(),
            new ArgumentsWildcard(array(new AnyValuesToken))
        );

        if (count($Vqk0kzw04abh)) {
            $Vbl4yrmdan1y = sprintf(
                "Expected exactly %d calls that match:\n".
                "  %s->%s(%s)\n".
                "but %d were made:\n%s",

                $this->times,
                get_class($Vbj3pw2f5egf->reveal()),
                $Vtlfvdwskdge->getMethodName(),
                $Vtlfvdwskdge->getArgumentsWildcard(),
                count($Vqk0kzw04abh),
                $this->util->stringifyCalls($Vqk0kzw04abh)
            );
        } elseif (count($VtlfvdwskdgeCalls)) {
            $Vbl4yrmdan1y = sprintf(
                "Expected exactly %d calls that match:\n".
                "  %s->%s(%s)\n".
                "but none were made.\n".
                "Recorded `%s(...)` calls:\n%s",

                $this->times,
                get_class($Vbj3pw2f5egf->reveal()),
                $Vtlfvdwskdge->getMethodName(),
                $Vtlfvdwskdge->getArgumentsWildcard(),
                $Vtlfvdwskdge->getMethodName(),
                $this->util->stringifyCalls($VtlfvdwskdgeCalls)
            );
        } else {
            $Vbl4yrmdan1y = sprintf(
                "Expected exactly %d calls that match:\n".
                "  %s->%s(%s)\n".
                "but none were made.",

                $this->times,
                get_class($Vbj3pw2f5egf->reveal()),
                $Vtlfvdwskdge->getMethodName(),
                $Vtlfvdwskdge->getArgumentsWildcard()
            );
        }

        throw new UnexpectedCallsCountException($Vbl4yrmdan1y, $Vtlfvdwskdge, $this->times, $Vqk0kzw04abh);
    }
}
