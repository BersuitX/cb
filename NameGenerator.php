<?php



namespace Prophecy\Doubler;

use ReflectionClass;


class NameGenerator
{
    private static $V5z5eo2hgjpk = 1;

    
    public function name(ReflectionClass $Vqmu1sajhgfn = null, array $Voahpkaubtr3)
    {
        $Vbkdgagqgicd = array();

        if (null !== $Vqmu1sajhgfn) {
            $Vbkdgagqgicd[] = $Vqmu1sajhgfn->getName();
        } else {
            foreach ($Voahpkaubtr3 as $Vblpzgjj4s3y) {
                $Vbkdgagqgicd[] = $Vblpzgjj4s3y->getShortName();
            }
        }

        if (!count($Vbkdgagqgicd)) {
            $Vbkdgagqgicd[] = 'stdClass';
        }

        return sprintf('Double\%s\P%d', implode('\\', $Vbkdgagqgicd), self::$V5z5eo2hgjpk++);
    }
}
