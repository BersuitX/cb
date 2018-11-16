<?php



class PHP_CodeCoverage_Report_Node_Directory extends PHP_CodeCoverage_Report_Node implements IteratorAggregate
{
    
    protected $V5hspz0jhl40 = array();

    
    protected $Vyzstc3ohmps = array();

    
    protected $V5s0rodgwwbv = array();

    
    protected $Vcoznk2huoff;

    
    protected $Vml1s3yuysul;

    
    protected $V1smq0dxjwv1;

    
    protected $Vandnyyo3klq = null;

    
    protected $V3nvf5xw1jgi = -1;

    
    protected $Vzuy5chseadz = -1;

    
    protected $Vpld0k3vaxvw = -1;

    
    protected $V4z5gx4xelcl = -1;

    
    protected $Vom2z0wj2d1v = -1;

    
    protected $V5gfsl0dgi4s = -1;

    
    protected $Vzhzpzvaxv25 = -1;

    
    protected $Vvt54wtopojd = -1;

    
    protected $Vjd4caseyb3f = -1;

    
    protected $V5gdx1rylsmd = -1;

    
    protected $V4wggtoib31n = -1;

    
    public function count()
    {
        if ($this->numFiles == -1) {
            $this->numFiles = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numFiles += count($Vypmkgldf3eu);
            }
        }

        return $this->numFiles;
    }

    
    public function getIterator()
    {
        return new RecursiveIteratorIterator(
            new PHP_CodeCoverage_Report_Node_Iterator($this),
            RecursiveIteratorIterator::SELF_FIRST
        );
    }

    
    public function addDirectory($Vgpjmw221p0b)
    {
        $Vghfube41qyl = new self($Vgpjmw221p0b, $this);

        $this->children[]    = $Vghfube41qyl;
        $this->directories[] = &$this->children[count($this->children) - 1];

        return $Vghfube41qyl;
    }

    
    public function addFile($Vgpjmw221p0b, array $Vquvjmjj3pih, array $Vkjxtxkqa4lw, $Vlbjlgfocnro)
    {
        $Vpu3xl4uhgg5 = new PHP_CodeCoverage_Report_Node_File(
            $Vgpjmw221p0b,
            $this,
            $Vquvjmjj3pih,
            $Vkjxtxkqa4lw,
            $Vlbjlgfocnro
        );

        $this->children[] = $Vpu3xl4uhgg5;
        $this->files[]    = &$this->children[count($this->children) - 1];

        $this->numExecutableLines = -1;
        $this->numExecutedLines   = -1;

        return $Vpu3xl4uhgg5;
    }

    
    public function getDirectories()
    {
        return $this->directories;
    }

    
    public function getFiles()
    {
        return $this->files;
    }

    
    public function getChildNodes()
    {
        return $this->children;
    }

    
    public function getClasses()
    {
        if ($this->classes === null) {
            $this->classes = array();

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->classes = array_merge(
                    $this->classes,
                    $Vypmkgldf3eu->getClasses()
                );
            }
        }

        return $this->classes;
    }

    
    public function getTraits()
    {
        if ($this->traits === null) {
            $this->traits = array();

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->traits = array_merge(
                    $this->traits,
                    $Vypmkgldf3eu->getTraits()
                );
            }
        }

        return $this->traits;
    }

    
    public function getFunctions()
    {
        if ($this->functions === null) {
            $this->functions = array();

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->functions = array_merge(
                    $this->functions,
                    $Vypmkgldf3eu->getFunctions()
                );
            }
        }

        return $this->functions;
    }

    
    public function getLinesOfCode()
    {
        if ($this->linesOfCode === null) {
            $this->linesOfCode = array('loc' => 0, 'cloc' => 0, 'ncloc' => 0);

            foreach ($this->children as $Vypmkgldf3eu) {
                $Vandnyyo3klq = $Vypmkgldf3eu->getLinesOfCode();

                $this->linesOfCode['loc']   += $Vandnyyo3klq['loc'];
                $this->linesOfCode['cloc']  += $Vandnyyo3klq['cloc'];
                $this->linesOfCode['ncloc'] += $Vandnyyo3klq['ncloc'];
            }
        }

        return $this->linesOfCode;
    }

    
    public function getNumExecutableLines()
    {
        if ($this->numExecutableLines == -1) {
            $this->numExecutableLines = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numExecutableLines += $Vypmkgldf3eu->getNumExecutableLines();
            }
        }

        return $this->numExecutableLines;
    }

    
    public function getNumExecutedLines()
    {
        if ($this->numExecutedLines == -1) {
            $this->numExecutedLines = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numExecutedLines += $Vypmkgldf3eu->getNumExecutedLines();
            }
        }

        return $this->numExecutedLines;
    }

    
    public function getNumClasses()
    {
        if ($this->numClasses == -1) {
            $this->numClasses = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numClasses += $Vypmkgldf3eu->getNumClasses();
            }
        }

        return $this->numClasses;
    }

    
    public function getNumTestedClasses()
    {
        if ($this->numTestedClasses == -1) {
            $this->numTestedClasses = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numTestedClasses += $Vypmkgldf3eu->getNumTestedClasses();
            }
        }

        return $this->numTestedClasses;
    }

    
    public function getNumTraits()
    {
        if ($this->numTraits == -1) {
            $this->numTraits = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numTraits += $Vypmkgldf3eu->getNumTraits();
            }
        }

        return $this->numTraits;
    }

    
    public function getNumTestedTraits()
    {
        if ($this->numTestedTraits == -1) {
            $this->numTestedTraits = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numTestedTraits += $Vypmkgldf3eu->getNumTestedTraits();
            }
        }

        return $this->numTestedTraits;
    }

    
    public function getNumMethods()
    {
        if ($this->numMethods == -1) {
            $this->numMethods = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numMethods += $Vypmkgldf3eu->getNumMethods();
            }
        }

        return $this->numMethods;
    }

    
    public function getNumTestedMethods()
    {
        if ($this->numTestedMethods == -1) {
            $this->numTestedMethods = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numTestedMethods += $Vypmkgldf3eu->getNumTestedMethods();
            }
        }

        return $this->numTestedMethods;
    }

    
    public function getNumFunctions()
    {
        if ($this->numFunctions == -1) {
            $this->numFunctions = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numFunctions += $Vypmkgldf3eu->getNumFunctions();
            }
        }

        return $this->numFunctions;
    }

    
    public function getNumTestedFunctions()
    {
        if ($this->numTestedFunctions == -1) {
            $this->numTestedFunctions = 0;

            foreach ($this->children as $Vypmkgldf3eu) {
                $this->numTestedFunctions += $Vypmkgldf3eu->getNumTestedFunctions();
            }
        }

        return $this->numTestedFunctions;
    }
}
