<?php


namespace SebastianBergmann\GlobalState;

use ReflectionClass;
use Serializable;


class Snapshot
{
    
    private $Vn54eydon0cr;

    
    private $Vyfqsmk1cf1s = array();

    
    private $Vegehlmzhwsn = array();

    
    private $Vpksvlby2q1c = array();

    
    private $V5g41w4jzcol = array();

    
    private $Vkvhbademoiu = array();

    
    private $Vzlgrojmlgeo = array();

    
    private $Vcabzt4suk2c = array();

    
    private $V1smq0dxjwv1 = array();

    
    private $Voahpkaubtr3 = array();

    
    private $Vcoznk2huoff = array();

    
    private $Vml1s3yuysul = array();

    
    public function __construct(Blacklist $Vn54eydon0cr = null, $Vdvcd3n3z2nt = true, $Vhqguln4dp33 = true, $Vgcehmthcff2 = true, $Vjvsyfdffg3l = true, $V1zlcbtmfs2l = true, $Vnxsiiteumuf = true, $Vbsimgx4dtju = true, $Vqcvjaj45u30 = true, $Vfnnrvdpgema = true)
    {
        if ($Vn54eydon0cr === null) {
            $Vn54eydon0cr = new Blacklist;
        }

        $this->blacklist = $Vn54eydon0cr;

        if ($Vgcehmthcff2) {
            $this->snapshotConstants();
        }

        if ($Vjvsyfdffg3l) {
            $this->snapshotFunctions();
        }

        if ($V1zlcbtmfs2l || $Vhqguln4dp33) {
            $this->snapshotClasses();
        }

        if ($Vnxsiiteumuf) {
            $this->snapshotInterfaces();
        }

        if ($Vdvcd3n3z2nt) {
            $this->setupSuperGlobalArrays();
            $this->snapshotGlobals();
        }

        if ($Vhqguln4dp33) {
            $this->snapshotStaticAttributes();
        }

        if ($Vqcvjaj45u30) {
            $this->iniSettings = ini_get_all(null, false);
        }

        if ($Vfnnrvdpgema) {
            $this->includedFiles = get_included_files();
        }

        if (function_exists('get_declared_traits')) {
            $this->traits = get_declared_traits();
        }
    }

    
    public function blacklist()
    {
        return $this->blacklist;
    }

    
    public function globalVariables()
    {
        return $this->globalVariables;
    }

    
    public function superGlobalVariables()
    {
        return $this->superGlobalVariables;
    }

    
    public function superGlobalArrays()
    {
        return $this->superGlobalArrays;
    }

    
    public function staticAttributes()
    {
        return $this->staticAttributes;
    }

    
    public function iniSettings()
    {
        return $this->iniSettings;
    }

    
    public function includedFiles()
    {
        return $this->includedFiles;
    }

    
    public function constants()
    {
        return $this->constants;
    }

    
    public function functions()
    {
        return $this->functions;
    }

    
    public function interfaces()
    {
        return $this->interfaces;
    }

    
    public function classes()
    {
        return $this->classes;
    }

    
    public function traits()
    {
        return $this->traits;
    }

    
    private function snapshotConstants()
    {
        $Vcabzt4suk2c = get_defined_constants(true);

        if (isset($Vcabzt4suk2c['user'])) {
            $this->constants = $Vcabzt4suk2c['user'];
        }
    }

    
    private function snapshotFunctions()
    {
        $V1smq0dxjwv1 = get_defined_functions();

        $this->functions = $V1smq0dxjwv1['user'];
    }

    
    private function snapshotClasses()
    {
        foreach (array_reverse(get_declared_classes()) as $Vh0iae5cev4i) {
            $Vqmu1sajhgfn = new ReflectionClass($Vh0iae5cev4i);

            if (!$Vqmu1sajhgfn->isUserDefined()) {
                break;
            }

            $this->classes[] = $Vh0iae5cev4i;
        }

        $this->classes = array_reverse($this->classes);
    }

    
    private function snapshotInterfaces()
    {
        foreach (array_reverse(get_declared_interfaces()) as $Vwvks4chiweg) {
            $Vqmu1sajhgfn = new ReflectionClass($Vwvks4chiweg);

            if (!$Vqmu1sajhgfn->isUserDefined()) {
                break;
            }

            $this->interfaces[] = $Vwvks4chiweg;
        }

        $this->interfaces = array_reverse($this->interfaces);
    }

    
    private function snapshotGlobals()
    {
        $Vegehlmzhwsn = $this->superGlobalArrays();

        foreach ($Vegehlmzhwsn as $Vpl2mc1wl5wt) {
            $this->snapshotSuperGlobalArray($Vpl2mc1wl5wt);
        }

        foreach (array_keys($GLOBALS) as $Vlpbz5aloxqt) {
            if ($Vlpbz5aloxqt != 'GLOBALS' &&
                !in_array($Vlpbz5aloxqt, $Vegehlmzhwsn) &&
                $this->canBeSerialized($GLOBALS[$Vlpbz5aloxqt]) &&
                !$this->blacklist->isGlobalVariableBlacklisted($Vlpbz5aloxqt)) {
                $this->globalVariables[$Vlpbz5aloxqt] = unserialize(serialize($GLOBALS[$Vlpbz5aloxqt]));
            }
        }
    }

    
    private function snapshotSuperGlobalArray($Vpl2mc1wl5wt)
    {
        $this->superGlobalVariables[$Vpl2mc1wl5wt] = array();

        if (isset($GLOBALS[$Vpl2mc1wl5wt]) && is_array($GLOBALS[$Vpl2mc1wl5wt])) {
            foreach ($GLOBALS[$Vpl2mc1wl5wt] as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
                $this->superGlobalVariables[$Vpl2mc1wl5wt][$Vlpbz5aloxqt] = unserialize(serialize($Vcptarsq5qe4));
            }
        }
    }

    
    private function snapshotStaticAttributes()
    {
        foreach ($this->classes as $Vh0iae5cev4i) {
            $Vqmu1sajhgfn    = new ReflectionClass($Vh0iae5cev4i);
            $V5idjdtohxgf = array();

            foreach ($Vqmu1sajhgfn->getProperties() as $Vxw4jdz2m4w0) {
                if ($Vxw4jdz2m4w0->isStatic()) {
                    $Vgpjmw221p0b = $Vxw4jdz2m4w0->getName();

                    if ($this->blacklist->isStaticAttributeBlacklisted($Vh0iae5cev4i, $Vgpjmw221p0b)) {
                        continue;
                    }

                    $Vxw4jdz2m4w0->setAccessible(true);
                    $Vcptarsq5qe4 = $Vxw4jdz2m4w0->getValue();

                    if ($this->canBeSerialized($Vcptarsq5qe4)) {
                        $V5idjdtohxgf[$Vgpjmw221p0b] = unserialize(serialize($Vcptarsq5qe4));
                    }
                }
            }

            if (!empty($V5idjdtohxgf)) {
                $this->staticAttributes[$Vh0iae5cev4i] = $V5idjdtohxgf;
            }
        }
    }

    
    private function setupSuperGlobalArrays()
    {
        $this->superGlobalArrays = array(
            '_ENV',
            '_POST',
            '_GET',
            '_COOKIE',
            '_SERVER',
            '_FILES',
            '_REQUEST'
        );

        if (ini_get('register_long_arrays') == '1') {
            $this->superGlobalArrays = array_merge(
                $this->superGlobalArrays,
                array(
                    'HTTP_ENV_VARS',
                    'HTTP_POST_VARS',
                    'HTTP_GET_VARS',
                    'HTTP_COOKIE_VARS',
                    'HTTP_SERVER_VARS',
                    'HTTP_POST_FILES'
                )
            );
        }
    }

    
    private function canBeSerialized($Vxjof1iqtr44)
    {
        if (!is_object($Vxjof1iqtr44)) {
            return !is_resource($Vxjof1iqtr44);
        }

        if ($Vxjof1iqtr44 instanceof \stdClass) {
            return true;
        }

        $Vqmu1sajhgfn = new ReflectionClass($Vxjof1iqtr44);

        do {
            if ($Vqmu1sajhgfn->isInternal()) {
                return $Vxjof1iqtr44 instanceof Serializable;
            }
        } while ($Vqmu1sajhgfn = $Vqmu1sajhgfn->getParentClass());

        return true;
    }
}
