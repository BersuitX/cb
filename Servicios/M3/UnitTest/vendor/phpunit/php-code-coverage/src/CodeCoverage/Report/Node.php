<?php



abstract class PHP_CodeCoverage_Report_Node implements Countable
{
    
    protected $Vgpjmw221p0b;

    
    protected $V2bpoh5hagzp;

    
    protected $V2bpoh5hagzpArray;

    
    protected $Vz4c1zo3dvrb;

    
    protected $V4mdxaz2cfcr;

    
    public function __construct($Vgpjmw221p0b, PHP_CodeCoverage_Report_Node $Vz4c1zo3dvrb = null)
    {
        if (substr($Vgpjmw221p0b, -1) == '/') {
            $Vgpjmw221p0b = substr($Vgpjmw221p0b, 0, -1);
        }

        $this->name   = $Vgpjmw221p0b;
        $this->parent = $Vz4c1zo3dvrb;
    }

    
    public function getName()
    {
        return $this->name;
    }

    
    public function getId()
    {
        if ($this->id === null) {
            $Vz4c1zo3dvrb = $this->getParent();

            if ($Vz4c1zo3dvrb === null) {
                $this->id = 'index';
            } else {
                $Vz4c1zo3dvrbId = $Vz4c1zo3dvrb->getId();

                if ($Vz4c1zo3dvrbId == 'index') {
                    $this->id = str_replace(':', '_', $this->name);
                } else {
                    $this->id = $Vz4c1zo3dvrbId . '/' . $this->name;
                }
            }
        }

        return $this->id;
    }

    
    public function getPath()
    {
        if ($this->path === null) {
            if ($this->parent === null || $this->parent->getPath() === null || $this->parent->getPath() === false) {
                $this->path = $this->name;
            } else {
                $this->path = $this->parent->getPath() . '/' . $this->name;
            }
        }

        return $this->path;
    }

    
    public function getPathAsArray()
    {
        if ($this->pathArray === null) {
            if ($this->parent === null) {
                $this->pathArray = array();
            } else {
                $this->pathArray = $this->parent->getPathAsArray();
            }

            $this->pathArray[] = $this;
        }

        return $this->pathArray;
    }

    
    public function getParent()
    {
        return $this->parent;
    }

    
    public function getTestedClassesPercent($Vmlbtxzqe4g3 = true)
    {
        return PHP_CodeCoverage_Util::percent(
            $this->getNumTestedClasses(),
            $this->getNumClasses(),
            $Vmlbtxzqe4g3
        );
    }

    
    public function getTestedTraitsPercent($Vmlbtxzqe4g3 = true)
    {
        return PHP_CodeCoverage_Util::percent(
            $this->getNumTestedTraits(),
            $this->getNumTraits(),
            $Vmlbtxzqe4g3
        );
    }

    
    public function getTestedClassesAndTraitsPercent($Vmlbtxzqe4g3 = true)
    {
        return PHP_CodeCoverage_Util::percent(
            $this->getNumTestedClassesAndTraits(),
            $this->getNumClassesAndTraits(),
            $Vmlbtxzqe4g3
        );
    }

    
    public function getTestedMethodsPercent($Vmlbtxzqe4g3 = true)
    {
        return PHP_CodeCoverage_Util::percent(
            $this->getNumTestedMethods(),
            $this->getNumMethods(),
            $Vmlbtxzqe4g3
        );
    }

    
    public function getLineExecutedPercent($Vmlbtxzqe4g3 = true)
    {
        return PHP_CodeCoverage_Util::percent(
            $this->getNumExecutedLines(),
            $this->getNumExecutableLines(),
            $Vmlbtxzqe4g3
        );
    }

    
    public function getNumClassesAndTraits()
    {
        return $this->getNumClasses() + $this->getNumTraits();
    }

    
    public function getNumTestedClassesAndTraits()
    {
        return $this->getNumTestedClasses() + $this->getNumTestedTraits();
    }

    
    public function getClassesAndTraits()
    {
        return array_merge($this->getClasses(), $this->getTraits());
    }

    
    abstract public function getClasses();

    
    abstract public function getTraits();

    
    abstract public function getFunctions();

    
    abstract public function getLinesOfCode();

    
    abstract public function getNumExecutableLines();

    
    abstract public function getNumExecutedLines();

    
    abstract public function getNumClasses();

    
    abstract public function getNumTestedClasses();

    
    abstract public function getNumTraits();

    
    abstract public function getNumTestedTraits();

    
    abstract public function getNumMethods();

    
    abstract public function getNumTestedMethods();

    
    abstract public function getNumFunctions();

    
    abstract public function getNumTestedFunctions();
}
