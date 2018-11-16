<?php



namespace Prophecy\Doubler;

use ReflectionClass;


class CachedDoubler extends Doubler
{
    private $Vcoznk2huoff = array();

    
    public function registerClassPatch(ClassPatch\ClassPatchInterface $Vpp1jxnnbz1f)
    {
        $this->classes[] = array();

        parent::registerClassPatch($Vpp1jxnnbz1f);
    }

    
    protected function createDoubleClass(ReflectionClass $Vqmu1sajhgfn = null, array $Voahpkaubtr3)
    {
        $Vqmu1sajhgfnId = $this->generateClassId($Vqmu1sajhgfn, $Voahpkaubtr3);
        if (isset($this->classes[$Vqmu1sajhgfnId])) {
            return $this->classes[$Vqmu1sajhgfnId];
        }

        return $this->classes[$Vqmu1sajhgfnId] = parent::createDoubleClass($Vqmu1sajhgfn, $Voahpkaubtr3);
    }

    
    private function generateClassId(ReflectionClass $Vqmu1sajhgfn = null, array $Voahpkaubtr3)
    {
        $Vbkdgagqgicd = array();
        if (null !== $Vqmu1sajhgfn) {
            $Vbkdgagqgicd[] = $Vqmu1sajhgfn->getName();
        }
        foreach ($Voahpkaubtr3 as $Vblpzgjj4s3y) {
            $Vbkdgagqgicd[] = $Vblpzgjj4s3y->getName();
        }
        sort($Vbkdgagqgicd);

        return md5(implode('', $Vbkdgagqgicd));
    }
}
