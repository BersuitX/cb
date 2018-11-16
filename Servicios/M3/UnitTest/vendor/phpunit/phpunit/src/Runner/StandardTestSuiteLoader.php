<?php



class PHPUnit_Runner_StandardTestSuiteLoader implements PHPUnit_Runner_TestSuiteLoader
{
    
    public function load($Vxve5jyfmhzo, $Vtcfwf2f1luj = '')
    {
        $Vxve5jyfmhzo = str_replace('.php', '', $Vxve5jyfmhzo);

        if (empty($Vtcfwf2f1luj)) {
            $Vtcfwf2f1luj = PHPUnit_Util_Filesystem::classNameToFilename(
                $Vxve5jyfmhzo
            );
        }

        if (!class_exists($Vxve5jyfmhzo, false)) {
            $Vt2ybjziqqq3 = get_declared_classes();

            $Va3qqb0vgkhy = PHPUnit_Util_Fileloader::checkAndLoad($Vtcfwf2f1luj);

            $Vt2ybjziqqq3 = array_values(
                array_diff(get_declared_classes(), $Vt2ybjziqqq3)
            );
        }

        if (!class_exists($Vxve5jyfmhzo, false) && !empty($Vt2ybjziqqq3)) {
            $V5peram4ncbv = 0 - strlen($Vxve5jyfmhzo);

            foreach ($Vt2ybjziqqq3 as $Vm2wlluo0dcz) {
                $Vqmu1sajhgfn = new ReflectionClass($Vm2wlluo0dcz);
                if (substr($Vm2wlluo0dcz, $V5peram4ncbv) === $Vxve5jyfmhzo &&
                    $Vqmu1sajhgfn->getFileName() == $Va3qqb0vgkhy) {
                    $Vxve5jyfmhzo = $Vm2wlluo0dcz;
                    break;
                }
            }
        }

        if (!class_exists($Vxve5jyfmhzo, false) && !empty($Vt2ybjziqqq3)) {
            $Vzxm552tpvvp = 'PHPUnit_Framework_TestCase';

            foreach ($Vt2ybjziqqq3 as $Vm2wlluo0dcz) {
                $Vqmu1sajhgfn     = new ReflectionClass($Vm2wlluo0dcz);
                $Vqmu1sajhgfnFile = $Vqmu1sajhgfn->getFileName();

                if ($Vqmu1sajhgfn->isSubclassOf($Vzxm552tpvvp) &&
                    !$Vqmu1sajhgfn->isAbstract()) {
                    $Vxve5jyfmhzo = $Vm2wlluo0dcz;
                    $Vzxm552tpvvp  = $Vm2wlluo0dcz;

                    if ($Vqmu1sajhgfnFile == realpath($Vtcfwf2f1luj)) {
                        break;
                    }
                }

                if ($Vqmu1sajhgfn->hasMethod('suite')) {
                    $Vtlfvdwskdge = $Vqmu1sajhgfn->getMethod('suite');

                    if (!$Vtlfvdwskdge->isAbstract() &&
                        $Vtlfvdwskdge->isPublic() &&
                        $Vtlfvdwskdge->isStatic()) {
                        $Vxve5jyfmhzo = $Vm2wlluo0dcz;

                        if ($Vqmu1sajhgfnFile == realpath($Vtcfwf2f1luj)) {
                            break;
                        }
                    }
                }
            }
        }

        if (class_exists($Vxve5jyfmhzo, false)) {
            $Vqmu1sajhgfn = new ReflectionClass($Vxve5jyfmhzo);

            if ($Vqmu1sajhgfn->getFileName() == realpath($Vtcfwf2f1luj)) {
                return $Vqmu1sajhgfn;
            }
        }

        throw new PHPUnit_Framework_Exception(
            sprintf(
                "Class '%s' could not be found in '%s'.",
                $Vxve5jyfmhzo,
                $Vtcfwf2f1luj
            )
        );
    }

    
    public function reload(ReflectionClass $V1nfumobnrgg)
    {
        return $V1nfumobnrgg;
    }
}
