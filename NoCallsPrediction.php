<?php



namespace Prophecy\Prediction;

use Prophecy\Call\Call;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Util\StringUtil;
use Prophecy\Exception\Prediction\UnexpectedCallsException;


class NoCallsPrediction implements PredictionInterface
{
    private $V54ioytbirq2;

    
    public function __construct(StringUtil $V54ioytbirq2 = null)
    {
        $this->util = $V54ioytbirq2 ?: new StringUtil;
    }

    
    public function check(array $Vqk0kzw04abh, ObjectProphecy $Vbj3pw2f5egf, MethodProphecy $Vtlfvdwskdge)
    {
        if (!count($Vqk0kzw04abh)) {
            return;
        }

        $Von0mpw1eqjn = count($Vqk0kzw04abh) === 1 ? 'was' : 'were';

        throw new UnexpectedCallsException(sprintf(
            "No calls expected that match:\n".
            "  %s->%s(%s)\n".
            "but %d %s made:\n%s",
            get_class($Vbj3pw2f5egf->reveal()),
            $Vtlfvdwskdge->getMethodName(),
            $Vtlfvdwskdge->getArgumentsWildcard(),
            count($Vqk0kzw04abh),
            $Von0mpw1eqjn,
            $this->util->stringifyCalls($Vqk0kzw04abh)
        ), $Vtlfvdwskdge, $Vqk0kzw04abh);
    }
}
