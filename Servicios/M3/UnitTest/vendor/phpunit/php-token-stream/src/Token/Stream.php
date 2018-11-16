<?php



class PHP_Token_Stream implements ArrayAccess, Countable, SeekableIterator
{
    
    protected static $V2msbtivgv3l = array(
        '(' => 'PHP_Token_OPEN_BRACKET',
        ')' => 'PHP_Token_CLOSE_BRACKET',
        '[' => 'PHP_Token_OPEN_SQUARE',
        ']' => 'PHP_Token_CLOSE_SQUARE',
        '{' => 'PHP_Token_OPEN_CURLY',
        '}' => 'PHP_Token_CLOSE_CURLY',
        ';' => 'PHP_Token_SEMICOLON',
        '.' => 'PHP_Token_DOT',
        ',' => 'PHP_Token_COMMA',
        '=' => 'PHP_Token_EQUAL',
        '<' => 'PHP_Token_LT',
        '>' => 'PHP_Token_GT',
        '+' => 'PHP_Token_PLUS',
        '-' => 'PHP_Token_MINUS',
        '*' => 'PHP_Token_MULT',
        '/' => 'PHP_Token_DIV',
        '?' => 'PHP_Token_QUESTION_MARK',
        '!' => 'PHP_Token_EXCLAMATION_MARK',
        ':' => 'PHP_Token_COLON',
        '"' => 'PHP_Token_DOUBLE_QUOTES',
        '@' => 'PHP_Token_AT',
        '&' => 'PHP_Token_AMPERSAND',
        '%' => 'PHP_Token_PERCENT',
        '|' => 'PHP_Token_PIPE',
        '$' => 'PHP_Token_DOLLAR',
        '^' => 'PHP_Token_CARET',
        '~' => 'PHP_Token_TILDE',
        '`' => 'PHP_Token_BACKTICK'
    );

    
    protected $Va3qqb0vgkhy;

    
    protected $Vthon1suqmsr = array();

    
    protected $Vuqcfsch4lw0 = 0;

    
    protected $Vandnyyo3klq = array('loc' => 0, 'cloc' => 0, 'ncloc' => 0);

    
    protected $Vcoznk2huoff;

    
    protected $V1smq0dxjwv1;

    
    protected $V4hdecrcumvr;

    
    protected $Voahpkaubtr3;

    
    protected $Vml1s3yuysul;

    
    protected $V0dg2xvc0cuu = array();

    
    public function __construct($Vkawmztuevf5)
    {
        if (is_file($Vkawmztuevf5)) {
            $this->filename = $Vkawmztuevf5;
            $Vkawmztuevf5     = file_get_contents($Vkawmztuevf5);
        }

        $this->scan($Vkawmztuevf5);
    }

    
    public function __destruct()
    {
        $this->tokens = array();
    }

    
    public function __toString()
    {
        $Vd3322ljwbqh = '';

        foreach ($this as $Vx5bl5ubgnhj) {
            $Vd3322ljwbqh .= $Vx5bl5ubgnhj;
        }

        return $Vd3322ljwbqh;
    }

    
    public function getFilename()
    {
        return $this->filename;
    }

    
    protected function scan($Vkawmztuevf5)
    {
        $V4mdxaz2cfcr        = 0;
        $Vrwsmtja4f2j      = 1;
        $Vthon1suqmsr    = token_get_all($Vkawmztuevf5);
        $V0cizj5ovvkj = count($Vthon1suqmsr);

        $Vzxtr2njvjf4 = false;

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $V0cizj5ovvkj; ++$Vxja1abp34yq) {
            $Vx5bl5ubgnhj = $Vthon1suqmsr[$Vxja1abp34yq];
            $Vaw1q5kfrk3y  = 0;

            if (is_array($Vx5bl5ubgnhj)) {
                $Vgpjmw221p0b = substr(token_name($Vx5bl5ubgnhj[0]), 2);
                $Vlakcyq2pqgp = $Vx5bl5ubgnhj[1];

                if ($Vzxtr2njvjf4 && $Vgpjmw221p0b == 'CLASS') {
                    $Vgpjmw221p0b = 'CLASS_NAME_CONSTANT';
                } elseif ($Vgpjmw221p0b == 'USE' && isset($Vthon1suqmsr[$Vxja1abp34yq+2][0]) && $Vthon1suqmsr[$Vxja1abp34yq+2][0] == T_FUNCTION) {
                    $Vgpjmw221p0b = 'USE_FUNCTION';
                    $Vlakcyq2pqgp .= $Vthon1suqmsr[$Vxja1abp34yq+1][1] . $Vthon1suqmsr[$Vxja1abp34yq+2][1];
                    $Vaw1q5kfrk3y = 2;
                }

                $Vx5bl5ubgnhjClass = 'PHP_Token_' . $Vgpjmw221p0b;
            } else {
                $Vlakcyq2pqgp       = $Vx5bl5ubgnhj;
                $Vx5bl5ubgnhjClass = self::$V2msbtivgv3l[$Vx5bl5ubgnhj];
            }

            $this->tokens[] = new $Vx5bl5ubgnhjClass($Vlakcyq2pqgp, $Vrwsmtja4f2j, $this, $V4mdxaz2cfcr++);
            $Vrwsmtja4f2js          = substr_count($Vlakcyq2pqgp, "\n");
            $Vrwsmtja4f2j          += $Vrwsmtja4f2js;

            if ($Vx5bl5ubgnhjClass == 'PHP_Token_HALT_COMPILER') {
                break;
            } elseif ($Vx5bl5ubgnhjClass == 'PHP_Token_COMMENT' ||
                $Vx5bl5ubgnhjClass == 'PHP_Token_DOC_COMMENT') {
                $this->linesOfCode['cloc'] += $Vrwsmtja4f2js + 1;
            }

            if ($Vgpjmw221p0b == 'DOUBLE_COLON') {
                $Vzxtr2njvjf4 = true;
            } elseif ($Vgpjmw221p0b != 'WHITESPACE') {
                $Vzxtr2njvjf4 = false;
            }

            $Vxja1abp34yq += $Vaw1q5kfrk3y;
        }

        $this->linesOfCode['loc']   = substr_count($Vkawmztuevf5, "\n");
        $this->linesOfCode['ncloc'] = $this->linesOfCode['loc'] -
                                      $this->linesOfCode['cloc'];
    }

    
    public function count()
    {
        return count($this->tokens);
    }

    
    public function tokens()
    {
        return $this->tokens;
    }

    
    public function getClasses()
    {
        if ($this->classes !== null) {
            return $this->classes;
        }

        $this->parse();

        return $this->classes;
    }

    
    public function getFunctions()
    {
        if ($this->functions !== null) {
            return $this->functions;
        }

        $this->parse();

        return $this->functions;
    }

    
    public function getInterfaces()
    {
        if ($this->interfaces !== null) {
            return $this->interfaces;
        }

        $this->parse();

        return $this->interfaces;
    }

    
    public function getTraits()
    {
        if ($this->traits !== null) {
            return $this->traits;
        }

        $this->parse();

        return $this->traits;
    }

    
    public function getIncludes($Vsxj1ugemhwn = false, $Vya5mg3c0osr = null)
    {
        if ($this->includes === null) {
            $this->includes = array(
              'require_once' => array(),
              'require'      => array(),
              'include_once' => array(),
              'include'      => array()
            );

            foreach ($this->tokens as $Vx5bl5ubgnhj) {
                switch (get_class($Vx5bl5ubgnhj)) {
                    case 'PHP_Token_REQUIRE_ONCE':
                    case 'PHP_Token_REQUIRE':
                    case 'PHP_Token_INCLUDE_ONCE':
                    case 'PHP_Token_INCLUDE':
                        $this->includes[$Vx5bl5ubgnhj->getType()][] = $Vx5bl5ubgnhj->getName();
                        break;
                }
            }
        }

        if (isset($this->includes[$Vya5mg3c0osr])) {
            $V4hdecrcumvr = $this->includes[$Vya5mg3c0osr];
        } elseif ($Vsxj1ugemhwn === false) {
            $V4hdecrcumvr = array_merge(
                $this->includes['require_once'],
                $this->includes['require'],
                $this->includes['include_once'],
                $this->includes['include']
            );
        } else {
            $V4hdecrcumvr = $this->includes;
        }

        return $V4hdecrcumvr;
    }

    
    public function getFunctionForLine($Vrwsmtja4f2j)
    {
        $this->parse();

        if (isset($this->lineToFunctionMap[$Vrwsmtja4f2j])) {
            return $this->lineToFunctionMap[$Vrwsmtja4f2j];
        }
    }

    protected function parse()
    {
        $this->interfaces = array();
        $this->classes    = array();
        $this->traits     = array();
        $this->functions  = array();
        $Vqmu1sajhgfn            = array();
        $Vqmu1sajhgfnEndLine     = array();
        $V1nnncjv3xfc            = false;
        $V1nnncjv3xfcEndLine     = false;
        $Vxja1abp34yqnterface        = false;
        $Vxja1abp34yqnterfaceEndLine = false;

        foreach ($this->tokens as $Vx5bl5ubgnhj) {
            switch (get_class($Vx5bl5ubgnhj)) {
                case 'PHP_Token_HALT_COMPILER':
                    return;

                case 'PHP_Token_INTERFACE':
                    $Vxja1abp34yqnterface        = $Vx5bl5ubgnhj->getName();
                    $Vxja1abp34yqnterfaceEndLine = $Vx5bl5ubgnhj->getEndLine();

                    $this->interfaces[$Vxja1abp34yqnterface] = array(
                      'methods'   => array(),
                      'parent'    => $Vx5bl5ubgnhj->getParent(),
                      'keywords'  => $Vx5bl5ubgnhj->getKeywords(),
                      'docblock'  => $Vx5bl5ubgnhj->getDocblock(),
                      'startLine' => $Vx5bl5ubgnhj->getLine(),
                      'endLine'   => $Vxja1abp34yqnterfaceEndLine,
                      'package'   => $Vx5bl5ubgnhj->getPackage(),
                      'file'      => $this->filename
                    );
                    break;

                case 'PHP_Token_CLASS':
                case 'PHP_Token_TRAIT':
                    $Vvurliuircct = array(
                      'methods'   => array(),
                      'parent'    => $Vx5bl5ubgnhj->getParent(),
                      'interfaces'=> $Vx5bl5ubgnhj->getInterfaces(),
                      'keywords'  => $Vx5bl5ubgnhj->getKeywords(),
                      'docblock'  => $Vx5bl5ubgnhj->getDocblock(),
                      'startLine' => $Vx5bl5ubgnhj->getLine(),
                      'endLine'   => $Vx5bl5ubgnhj->getEndLine(),
                      'package'   => $Vx5bl5ubgnhj->getPackage(),
                      'file'      => $this->filename
                    );

                    if ($Vx5bl5ubgnhj instanceof PHP_Token_CLASS) {
                        $Vqmu1sajhgfn[]        = $Vx5bl5ubgnhj->getName();
                        $Vqmu1sajhgfnEndLine[] = $Vx5bl5ubgnhj->getEndLine();

                        if ($Vqmu1sajhgfn[count($Vqmu1sajhgfn)-1] != 'anonymous class') {
                            $this->classes[$Vqmu1sajhgfn[count($Vqmu1sajhgfn)-1]] = $Vvurliuircct;
                        }
                    } else {
                        $V1nnncjv3xfc                = $Vx5bl5ubgnhj->getName();
                        $V1nnncjv3xfcEndLine         = $Vx5bl5ubgnhj->getEndLine();
                        $this->traits[$V1nnncjv3xfc] = $Vvurliuircct;
                    }
                    break;

                case 'PHP_Token_FUNCTION':
                    $Vgpjmw221p0b = $Vx5bl5ubgnhj->getName();
                    $Vvurliuircct  = array(
                      'docblock'  => $Vx5bl5ubgnhj->getDocblock(),
                      'keywords'  => $Vx5bl5ubgnhj->getKeywords(),
                      'visibility'=> $Vx5bl5ubgnhj->getVisibility(),
                      'signature' => $Vx5bl5ubgnhj->getSignature(),
                      'startLine' => $Vx5bl5ubgnhj->getLine(),
                      'endLine'   => $Vx5bl5ubgnhj->getEndLine(),
                      'ccn'       => $Vx5bl5ubgnhj->getCCN(),
                      'file'      => $this->filename
                    );

                    if (empty($Vqmu1sajhgfn) &&
                        $V1nnncjv3xfc === false &&
                        $Vxja1abp34yqnterface === false) {
                        $this->functions[$Vgpjmw221p0b] = $Vvurliuircct;

                        $this->addFunctionToMap(
                            $Vgpjmw221p0b,
                            $Vvurliuircct['startLine'],
                            $Vvurliuircct['endLine']
                        );
                    } elseif (!empty($Vqmu1sajhgfn) && $Vqmu1sajhgfn[count($Vqmu1sajhgfn)-1] != 'anonymous class') {
                        $this->classes[$Vqmu1sajhgfn[count($Vqmu1sajhgfn)-1]]['methods'][$Vgpjmw221p0b] = $Vvurliuircct;

                        $this->addFunctionToMap(
                            $Vqmu1sajhgfn[count($Vqmu1sajhgfn)-1] . '::' . $Vgpjmw221p0b,
                            $Vvurliuircct['startLine'],
                            $Vvurliuircct['endLine']
                        );
                    } elseif ($V1nnncjv3xfc !== false) {
                        $this->traits[$V1nnncjv3xfc]['methods'][$Vgpjmw221p0b] = $Vvurliuircct;

                        $this->addFunctionToMap(
                            $V1nnncjv3xfc . '::' . $Vgpjmw221p0b,
                            $Vvurliuircct['startLine'],
                            $Vvurliuircct['endLine']
                        );
                    } else {
                        $this->interfaces[$Vxja1abp34yqnterface]['methods'][$Vgpjmw221p0b] = $Vvurliuircct;
                    }
                    break;

                case 'PHP_Token_CLOSE_CURLY':
                    if (!empty($Vqmu1sajhgfnEndLine) &&
                        $Vqmu1sajhgfnEndLine[count($Vqmu1sajhgfnEndLine)-1] == $Vx5bl5ubgnhj->getLine()) {
                        array_pop($Vqmu1sajhgfnEndLine);
                        array_pop($Vqmu1sajhgfn);
                    } elseif ($V1nnncjv3xfcEndLine !== false &&
                        $V1nnncjv3xfcEndLine == $Vx5bl5ubgnhj->getLine()) {
                        $V1nnncjv3xfc        = false;
                        $V1nnncjv3xfcEndLine = false;
                    } elseif ($Vxja1abp34yqnterfaceEndLine !== false &&
                        $Vxja1abp34yqnterfaceEndLine == $Vx5bl5ubgnhj->getLine()) {
                        $Vxja1abp34yqnterface        = false;
                        $Vxja1abp34yqnterfaceEndLine = false;
                    }
                    break;
            }
        }
    }

    
    public function getLinesOfCode()
    {
        return $this->linesOfCode;
    }

    
    public function rewind()
    {
        $this->position = 0;
    }

    
    public function valid()
    {
        return isset($this->tokens[$this->position]);
    }

    
    public function key()
    {
        return $this->position;
    }

    
    public function current()
    {
        return $this->tokens[$this->position];
    }

    
    public function next()
    {
        $this->position++;
    }

    
    public function offsetExists($V5peram4ncbv)
    {
        return isset($this->tokens[$V5peram4ncbv]);
    }

    
    public function offsetGet($V5peram4ncbv)
    {
        if (!$this->offsetExists($V5peram4ncbv)) {
            throw new OutOfBoundsException(
                sprintf(
                    'No token at position "%s"',
                    $V5peram4ncbv
                )
            );
        }

        return $this->tokens[$V5peram4ncbv];
    }

    
    public function offsetSet($V5peram4ncbv, $Vcptarsq5qe4)
    {
        $this->tokens[$V5peram4ncbv] = $Vcptarsq5qe4;
    }

    
    public function offsetUnset($V5peram4ncbv)
    {
        if (!$this->offsetExists($V5peram4ncbv)) {
            throw new OutOfBoundsException(
                sprintf(
                    'No token at position "%s"',
                    $V5peram4ncbv
                )
            );
        }

        unset($this->tokens[$V5peram4ncbv]);
    }

    
    public function seek($Vuqcfsch4lw0)
    {
        $this->position = $Vuqcfsch4lw0;

        if (!$this->valid()) {
            throw new OutOfBoundsException(
                sprintf(
                    'No token at position "%s"',
                    $this->position
                )
            );
        }
    }

    
    private function addFunctionToMap($Vgpjmw221p0b, $V1bug0kxll1v, $Vum0yin3pbz3)
    {
        for ($Vrwsmtja4f2j = $V1bug0kxll1v; $Vrwsmtja4f2j <= $Vum0yin3pbz3; $Vrwsmtja4f2j++) {
            $this->lineToFunctionMap[$Vrwsmtja4f2j] = $Vgpjmw221p0b;
        }
    }
}
