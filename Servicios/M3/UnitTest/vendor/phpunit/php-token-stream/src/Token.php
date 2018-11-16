<?php



abstract class PHP_Token
{
    
    protected $Vlakcyq2pqgp;

    
    protected $Vrwsmtja4f2j;

    
    protected $Veoixhj3ick2;

    
    protected $V4mdxaz2cfcr;

    
    public function __construct($Vlakcyq2pqgp, $Vrwsmtja4f2j, PHP_Token_Stream $Veoixhj3ick2, $V4mdxaz2cfcr)
    {
        $this->text        = $Vlakcyq2pqgp;
        $this->line        = $Vrwsmtja4f2j;
        $this->tokenStream = $Veoixhj3ick2;
        $this->id          = $V4mdxaz2cfcr;
    }

    
    public function __toString()
    {
        return $this->text;
    }

    
    public function getLine()
    {
        return $this->line;
    }
}

abstract class PHP_TokenWithScope extends PHP_Token
{
    
    protected $V3nnx0sap205;

    
    public function getDocblock()
    {
        $Vthon1suqmsr            = $this->tokenStream->tokens();
        $Vqazt2sm4s01 = $Vthon1suqmsr[$this->id]->getLine();
        $Vqmyjhkzwnpg    = $Vqazt2sm4s01 - 1;

        for ($Vxja1abp34yq = $this->id - 1; $Vxja1abp34yq; $Vxja1abp34yq--) {
            if (!isset($Vthon1suqmsr[$Vxja1abp34yq])) {
                return;
            }

            if ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_FUNCTION ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_CLASS ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_TRAIT) {
                
                
                break;
            }

            $Vrwsmtja4f2j = $Vthon1suqmsr[$Vxja1abp34yq]->getLine();

            if ($Vrwsmtja4f2j == $Vqazt2sm4s01 ||
                ($Vrwsmtja4f2j == $Vqmyjhkzwnpg &&
                 $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_WHITESPACE)) {
                continue;
            }

            if ($Vrwsmtja4f2j < $Vqazt2sm4s01 &&
                !$Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_DOC_COMMENT) {
                break;
            }

            return (string)$Vthon1suqmsr[$Vxja1abp34yq];
        }
    }

    
    public function getEndTokenId()
    {
        $Vee3lowjh3ev  = 0;
        $Vxja1abp34yq      = $this->id;
        $Vthon1suqmsr = $this->tokenStream->tokens();

        while ($this->endTokenId === null && isset($Vthon1suqmsr[$Vxja1abp34yq])) {
            if ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_OPEN_CURLY ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_CURLY_OPEN) {
                $Vee3lowjh3ev++;
            } elseif ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_CLOSE_CURLY) {
                $Vee3lowjh3ev--;

                if ($Vee3lowjh3ev === 0) {
                    $this->endTokenId = $Vxja1abp34yq;
                }
            } elseif (($this instanceof PHP_Token_FUNCTION ||
                $this instanceof PHP_Token_NAMESPACE) &&
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_SEMICOLON) {
                if ($Vee3lowjh3ev === 0) {
                    $this->endTokenId = $Vxja1abp34yq;
                }
            }

            $Vxja1abp34yq++;
        }

        if ($this->endTokenId === null) {
            $this->endTokenId = $this->id;
        }

        return $this->endTokenId;
    }

    
    public function getEndLine()
    {
        return $this->tokenStream[$this->getEndTokenId()]->getLine();
    }
}

abstract class PHP_TokenWithScopeAndVisibility extends PHP_TokenWithScope
{
    
    public function getVisibility()
    {
        $Vthon1suqmsr = $this->tokenStream->tokens();

        for ($Vxja1abp34yq = $this->id - 2; $Vxja1abp34yq > $this->id - 7; $Vxja1abp34yq -= 2) {
            if (isset($Vthon1suqmsr[$Vxja1abp34yq]) &&
               ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_PRIVATE ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_PROTECTED ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_PUBLIC)) {
                return strtolower(
                    str_replace('PHP_Token_', '', get_class($Vthon1suqmsr[$Vxja1abp34yq]))
                );
            }
            if (isset($Vthon1suqmsr[$Vxja1abp34yq]) &&
              !($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_STATIC ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_FINAL ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_ABSTRACT)) {
                
                break;
            }
        }
    }

    
    public function getKeywords()
    {
        $Vsd4kqshdumn = array();
        $Vthon1suqmsr   = $this->tokenStream->tokens();

        for ($Vxja1abp34yq = $this->id - 2; $Vxja1abp34yq > $this->id - 7; $Vxja1abp34yq -= 2) {
            if (isset($Vthon1suqmsr[$Vxja1abp34yq]) &&
               ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_PRIVATE ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_PROTECTED ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_PUBLIC)) {
                continue;
            }

            if (isset($Vthon1suqmsr[$Vxja1abp34yq]) &&
               ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_STATIC ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_FINAL ||
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_ABSTRACT)) {
                $Vsd4kqshdumn[] = strtolower(
                    str_replace('PHP_Token_', '', get_class($Vthon1suqmsr[$Vxja1abp34yq]))
                );
            }
        }

        return implode(',', $Vsd4kqshdumn);
    }
}

abstract class PHP_Token_Includes extends PHP_Token
{
    
    protected $Vgpjmw221p0b;

    
    protected $V31qrja1w0r2;

    
    public function getName()
    {
        if ($this->name === null) {
            $this->process();
        }

        return $this->name;
    }

    
    public function getType()
    {
        if ($this->type === null) {
            $this->process();
        }

        return $this->type;
    }

    private function process()
    {
        $Vthon1suqmsr = $this->tokenStream->tokens();

        if ($Vthon1suqmsr[$this->id+2] instanceof PHP_Token_CONSTANT_ENCAPSED_STRING) {
            $this->name = trim($Vthon1suqmsr[$this->id+2], "'\"");
            $this->type = strtolower(
                str_replace('PHP_Token_', '', get_class($Vthon1suqmsr[$this->id]))
            );
        }
    }
}


class PHP_Token_FUNCTION extends PHP_TokenWithScopeAndVisibility
{
    
    protected $Vj23lbel2xn0;

    
    protected $V1k1x3e3yr54;

    
    protected $Vgpjmw221p0b;

    
    protected $Vrfbtwulwl1z;

    
    public function getArguments()
    {
        if ($this->arguments !== null) {
            return $this->arguments;
        }

        $this->arguments = array();
        $Vthon1suqmsr          = $this->tokenStream->tokens();
        $V31qrja1w0r2Declaration = null;

        
        $Vxja1abp34yq = $this->id + 2;

        while (!$Vthon1suqmsr[$Vxja1abp34yq-1] instanceof PHP_Token_OPEN_BRACKET) {
            $Vxja1abp34yq++;
        }

        while (!$Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_CLOSE_BRACKET) {
            if ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_STRING) {
                $V31qrja1w0r2Declaration = (string)$Vthon1suqmsr[$Vxja1abp34yq];
            } elseif ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_VARIABLE) {
                $this->arguments[(string)$Vthon1suqmsr[$Vxja1abp34yq]] = $V31qrja1w0r2Declaration;
                $V31qrja1w0r2Declaration                      = null;
            }

            $Vxja1abp34yq++;
        }

        return $this->arguments;
    }

    
    public function getName()
    {
        if ($this->name !== null) {
            return $this->name;
        }

        $Vthon1suqmsr = $this->tokenStream->tokens();

        for ($Vxja1abp34yq = $this->id + 1; $Vxja1abp34yq < count($Vthon1suqmsr); $Vxja1abp34yq++) {
            if ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_STRING) {
                $this->name = (string)$Vthon1suqmsr[$Vxja1abp34yq];
                break;
            } elseif ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_AMPERSAND &&
                     $Vthon1suqmsr[$Vxja1abp34yq+1] instanceof PHP_Token_STRING) {
                $this->name = (string)$Vthon1suqmsr[$Vxja1abp34yq+1];
                break;
            } elseif ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_OPEN_BRACKET) {
                $this->name = 'anonymous function';
                break;
            }
        }

        if ($this->name != 'anonymous function') {
            for ($Vxja1abp34yq = $this->id; $Vxja1abp34yq; --$Vxja1abp34yq) {
                if ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_NAMESPACE) {
                    $this->name = $Vthon1suqmsr[$Vxja1abp34yq]->getName() . '\\' . $this->name;
                    break;
                }

                if ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_INTERFACE) {
                    break;
                }
            }
        }

        return $this->name;
    }

    
    public function getCCN()
    {
        if ($this->ccn !== null) {
            return $this->ccn;
        }

        $this->ccn = 1;
        $Vppalz5j4b4w       = $this->getEndTokenId();
        $Vthon1suqmsr    = $this->tokenStream->tokens();

        for ($Vxja1abp34yq = $this->id; $Vxja1abp34yq <= $Vppalz5j4b4w; $Vxja1abp34yq++) {
            switch (get_class($Vthon1suqmsr[$Vxja1abp34yq])) {
                case 'PHP_Token_IF':
                case 'PHP_Token_ELSEIF':
                case 'PHP_Token_FOR':
                case 'PHP_Token_FOREACH':
                case 'PHP_Token_WHILE':
                case 'PHP_Token_CASE':
                case 'PHP_Token_CATCH':
                case 'PHP_Token_BOOLEAN_AND':
                case 'PHP_Token_LOGICAL_AND':
                case 'PHP_Token_BOOLEAN_OR':
                case 'PHP_Token_LOGICAL_OR':
                case 'PHP_Token_QUESTION_MARK':
                    $this->ccn++;
                    break;
            }
        }

        return $this->ccn;
    }

    
    public function getSignature()
    {
        if ($this->signature !== null) {
            return $this->signature;
        }

        if ($this->getName() == 'anonymous function') {
            $this->signature = 'anonymous function';
            $Vxja1abp34yq               = $this->id + 1;
        } else {
            $this->signature = '';
            $Vxja1abp34yq               = $this->id + 2;
        }

        $Vthon1suqmsr = $this->tokenStream->tokens();

        while (isset($Vthon1suqmsr[$Vxja1abp34yq]) &&
               !$Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_OPEN_CURLY &&
               !$Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_SEMICOLON) {
            $this->signature .= $Vthon1suqmsr[$Vxja1abp34yq++];
        }

        $this->signature = trim($this->signature);

        return $this->signature;
    }
}

class PHP_Token_INTERFACE extends PHP_TokenWithScopeAndVisibility
{
    
    protected $Vxja1abp34yqnterfaces;

    
    public function getName()
    {
        return (string)$this->tokenStream[$this->id + 2];
    }

    
    public function hasParent()
    {
        return $this->tokenStream[$this->id + 4] instanceof PHP_Token_EXTENDS;
    }

    
    public function getPackage()
    {
        $Vh0iae5cev4i  = $this->getName();
        $Vcvn1sexkvds = $this->getDocblock();

        $Vv0hyvhlkjqr = array(
            'namespace'   => '',
            'fullPackage' => '',
            'category'    => '',
            'package'     => '',
            'subpackage'  => ''
        );

        for ($Vxja1abp34yq = $this->id; $Vxja1abp34yq; --$Vxja1abp34yq) {
            if ($this->tokenStream[$Vxja1abp34yq] instanceof PHP_Token_NAMESPACE) {
                $Vv0hyvhlkjqr['namespace'] = $this->tokenStream[$Vxja1abp34yq]->getName();
                break;
            }
        }

        if (preg_match('/@category[\s]+([\.\w]+)/', $Vcvn1sexkvds, $Virbphhh55ue)) {
            $Vv0hyvhlkjqr['category'] = $Virbphhh55ue[1];
        }

        if (preg_match('/@package[\s]+([\.\w]+)/', $Vcvn1sexkvds, $Virbphhh55ue)) {
            $Vv0hyvhlkjqr['package']     = $Virbphhh55ue[1];
            $Vv0hyvhlkjqr['fullPackage'] = $Virbphhh55ue[1];
        }

        if (preg_match('/@subpackage[\s]+([\.\w]+)/', $Vcvn1sexkvds, $Virbphhh55ue)) {
            $Vv0hyvhlkjqr['subpackage']   = $Virbphhh55ue[1];
            $Vv0hyvhlkjqr['fullPackage'] .= '.' . $Virbphhh55ue[1];
        }

        if (empty($Vv0hyvhlkjqr['fullPackage'])) {
            $Vv0hyvhlkjqr['fullPackage'] = $this->arrayToName(
                explode('_', str_replace('\\', '_', $Vh0iae5cev4i)),
                '.'
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    protected function arrayToName(array $Vbkdgagqgicd, $V1zsec4j4x2i = '\\')
    {
        $Vv0hyvhlkjqr = '';

        if (count($Vbkdgagqgicd) > 1) {
            array_pop($Vbkdgagqgicd);

            $Vv0hyvhlkjqr = join($V1zsec4j4x2i, $Vbkdgagqgicd);
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function getParent()
    {
        if (!$this->hasParent()) {
            return false;
        }

        $Vxja1abp34yq         = $this->id + 6;
        $Vthon1suqmsr    = $this->tokenStream->tokens();
        $Vh0iae5cev4i = (string)$Vthon1suqmsr[$Vxja1abp34yq];

        while (isset($Vthon1suqmsr[$Vxja1abp34yq+1]) &&
               !$Vthon1suqmsr[$Vxja1abp34yq+1] instanceof PHP_Token_WHITESPACE) {
            $Vh0iae5cev4i .= (string)$Vthon1suqmsr[++$Vxja1abp34yq];
        }

        return $Vh0iae5cev4i;
    }

    
    public function hasInterfaces()
    {
        return (isset($this->tokenStream[$this->id + 4]) &&
                $this->tokenStream[$this->id + 4] instanceof PHP_Token_IMPLEMENTS) ||
               (isset($this->tokenStream[$this->id + 8]) &&
                $this->tokenStream[$this->id + 8] instanceof PHP_Token_IMPLEMENTS);
    }

    
    public function getInterfaces()
    {
        if ($this->interfaces !== null) {
            return $this->interfaces;
        }

        if (!$this->hasInterfaces()) {
            return ($this->interfaces = false);
        }

        if ($this->tokenStream[$this->id + 4] instanceof PHP_Token_IMPLEMENTS) {
            $Vxja1abp34yq = $this->id + 3;
        } else {
            $Vxja1abp34yq = $this->id + 7;
        }

        $Vthon1suqmsr = $this->tokenStream->tokens();

        while (!$Vthon1suqmsr[$Vxja1abp34yq+1] instanceof PHP_Token_OPEN_CURLY) {
            $Vxja1abp34yq++;

            if ($Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_STRING) {
                $this->interfaces[] = (string)$Vthon1suqmsr[$Vxja1abp34yq];
            }
        }

        return $this->interfaces;
    }
}

class PHP_Token_ABSTRACT extends PHP_Token {}
class PHP_Token_AMPERSAND extends PHP_Token {}
class PHP_Token_AND_EQUAL extends PHP_Token {}
class PHP_Token_ARRAY extends PHP_Token {}
class PHP_Token_ARRAY_CAST extends PHP_Token {}
class PHP_Token_AS extends PHP_Token {}
class PHP_Token_AT extends PHP_Token {}
class PHP_Token_BACKTICK extends PHP_Token {}
class PHP_Token_BAD_CHARACTER extends PHP_Token {}
class PHP_Token_BOOLEAN_AND extends PHP_Token {}
class PHP_Token_BOOLEAN_OR extends PHP_Token {}
class PHP_Token_BOOL_CAST extends PHP_Token {}
class PHP_Token_BREAK extends PHP_Token {}
class PHP_Token_CARET extends PHP_Token {}
class PHP_Token_CASE extends PHP_Token {}
class PHP_Token_CATCH extends PHP_Token {}
class PHP_Token_CHARACTER extends PHP_Token {}

class PHP_Token_CLASS extends PHP_Token_INTERFACE
{
    
    public function getName()
    {
        $Vb0oekl1ql4r = $this->tokenStream[$this->id + 1];

        if ($Vb0oekl1ql4r instanceof PHP_Token_WHITESPACE) {
            $Vb0oekl1ql4r = $this->tokenStream[$this->id + 2];
        }

        if ($Vb0oekl1ql4r instanceof PHP_Token_STRING) {
            return (string) $Vb0oekl1ql4r;
        }

        if ($Vb0oekl1ql4r instanceof PHP_Token_OPEN_CURLY ||
            $Vb0oekl1ql4r instanceof PHP_Token_EXTENDS ||
            $Vb0oekl1ql4r instanceof PHP_Token_IMPLEMENTS) {
            return 'anonymous class';
        }
    }
}

class PHP_Token_CLASS_C extends PHP_Token {}
class PHP_Token_CLASS_NAME_CONSTANT extends PHP_Token {}
class PHP_Token_CLONE extends PHP_Token {}
class PHP_Token_CLOSE_BRACKET extends PHP_Token {}
class PHP_Token_CLOSE_CURLY extends PHP_Token {}
class PHP_Token_CLOSE_SQUARE extends PHP_Token {}
class PHP_Token_CLOSE_TAG extends PHP_Token {}
class PHP_Token_COLON extends PHP_Token {}
class PHP_Token_COMMA extends PHP_Token {}
class PHP_Token_COMMENT extends PHP_Token {}
class PHP_Token_CONCAT_EQUAL extends PHP_Token {}
class PHP_Token_CONST extends PHP_Token {}
class PHP_Token_CONSTANT_ENCAPSED_STRING extends PHP_Token {}
class PHP_Token_CONTINUE extends PHP_Token {}
class PHP_Token_CURLY_OPEN extends PHP_Token {}
class PHP_Token_DEC extends PHP_Token {}
class PHP_Token_DECLARE extends PHP_Token {}
class PHP_Token_DEFAULT extends PHP_Token {}
class PHP_Token_DIV extends PHP_Token {}
class PHP_Token_DIV_EQUAL extends PHP_Token {}
class PHP_Token_DNUMBER extends PHP_Token {}
class PHP_Token_DO extends PHP_Token {}
class PHP_Token_DOC_COMMENT extends PHP_Token {}
class PHP_Token_DOLLAR extends PHP_Token {}
class PHP_Token_DOLLAR_OPEN_CURLY_BRACES extends PHP_Token {}
class PHP_Token_DOT extends PHP_Token {}
class PHP_Token_DOUBLE_ARROW extends PHP_Token {}
class PHP_Token_DOUBLE_CAST extends PHP_Token {}
class PHP_Token_DOUBLE_COLON extends PHP_Token {}
class PHP_Token_DOUBLE_QUOTES extends PHP_Token {}
class PHP_Token_ECHO extends PHP_Token {}
class PHP_Token_ELSE extends PHP_Token {}
class PHP_Token_ELSEIF extends PHP_Token {}
class PHP_Token_EMPTY extends PHP_Token {}
class PHP_Token_ENCAPSED_AND_WHITESPACE extends PHP_Token {}
class PHP_Token_ENDDECLARE extends PHP_Token {}
class PHP_Token_ENDFOR extends PHP_Token {}
class PHP_Token_ENDFOREACH extends PHP_Token {}
class PHP_Token_ENDIF extends PHP_Token {}
class PHP_Token_ENDSWITCH extends PHP_Token {}
class PHP_Token_ENDWHILE extends PHP_Token {}
class PHP_Token_END_HEREDOC extends PHP_Token {}
class PHP_Token_EQUAL extends PHP_Token {}
class PHP_Token_EVAL extends PHP_Token {}
class PHP_Token_EXCLAMATION_MARK extends PHP_Token {}
class PHP_Token_EXIT extends PHP_Token {}
class PHP_Token_EXTENDS extends PHP_Token {}
class PHP_Token_FILE extends PHP_Token {}
class PHP_Token_FINAL extends PHP_Token {}
class PHP_Token_FOR extends PHP_Token {}
class PHP_Token_FOREACH extends PHP_Token {}
class PHP_Token_FUNC_C extends PHP_Token {}
class PHP_Token_GLOBAL extends PHP_Token {}
class PHP_Token_GT extends PHP_Token {}
class PHP_Token_IF extends PHP_Token {}
class PHP_Token_IMPLEMENTS extends PHP_Token {}
class PHP_Token_INC extends PHP_Token {}
class PHP_Token_INCLUDE extends PHP_Token_Includes {}
class PHP_Token_INCLUDE_ONCE extends PHP_Token_Includes {}
class PHP_Token_INLINE_HTML extends PHP_Token {}
class PHP_Token_INSTANCEOF extends PHP_Token {}
class PHP_Token_INT_CAST extends PHP_Token {}
class PHP_Token_ISSET extends PHP_Token {}
class PHP_Token_IS_EQUAL extends PHP_Token {}
class PHP_Token_IS_GREATER_OR_EQUAL extends PHP_Token {}
class PHP_Token_IS_IDENTICAL extends PHP_Token {}
class PHP_Token_IS_NOT_EQUAL extends PHP_Token {}
class PHP_Token_IS_NOT_IDENTICAL extends PHP_Token {}
class PHP_Token_IS_SMALLER_OR_EQUAL extends PHP_Token {}
class PHP_Token_LINE extends PHP_Token {}
class PHP_Token_LIST extends PHP_Token {}
class PHP_Token_LNUMBER extends PHP_Token {}
class PHP_Token_LOGICAL_AND extends PHP_Token {}
class PHP_Token_LOGICAL_OR extends PHP_Token {}
class PHP_Token_LOGICAL_XOR extends PHP_Token {}
class PHP_Token_LT extends PHP_Token {}
class PHP_Token_METHOD_C extends PHP_Token {}
class PHP_Token_MINUS extends PHP_Token {}
class PHP_Token_MINUS_EQUAL extends PHP_Token {}
class PHP_Token_MOD_EQUAL extends PHP_Token {}
class PHP_Token_MULT extends PHP_Token {}
class PHP_Token_MUL_EQUAL extends PHP_Token {}
class PHP_Token_NEW extends PHP_Token {}
class PHP_Token_NUM_STRING extends PHP_Token {}
class PHP_Token_OBJECT_CAST extends PHP_Token {}
class PHP_Token_OBJECT_OPERATOR extends PHP_Token {}
class PHP_Token_OPEN_BRACKET extends PHP_Token {}
class PHP_Token_OPEN_CURLY extends PHP_Token {}
class PHP_Token_OPEN_SQUARE extends PHP_Token {}
class PHP_Token_OPEN_TAG extends PHP_Token {}
class PHP_Token_OPEN_TAG_WITH_ECHO extends PHP_Token {}
class PHP_Token_OR_EQUAL extends PHP_Token {}
class PHP_Token_PAAMAYIM_NEKUDOTAYIM extends PHP_Token {}
class PHP_Token_PERCENT extends PHP_Token {}
class PHP_Token_PIPE extends PHP_Token {}
class PHP_Token_PLUS extends PHP_Token {}
class PHP_Token_PLUS_EQUAL extends PHP_Token {}
class PHP_Token_PRINT extends PHP_Token {}
class PHP_Token_PRIVATE extends PHP_Token {}
class PHP_Token_PROTECTED extends PHP_Token {}
class PHP_Token_PUBLIC extends PHP_Token {}
class PHP_Token_QUESTION_MARK extends PHP_Token {}
class PHP_Token_REQUIRE extends PHP_Token_Includes {}
class PHP_Token_REQUIRE_ONCE extends PHP_Token_Includes {}
class PHP_Token_RETURN extends PHP_Token {}
class PHP_Token_SEMICOLON extends PHP_Token {}
class PHP_Token_SL extends PHP_Token {}
class PHP_Token_SL_EQUAL extends PHP_Token {}
class PHP_Token_SR extends PHP_Token {}
class PHP_Token_SR_EQUAL extends PHP_Token {}
class PHP_Token_START_HEREDOC extends PHP_Token {}
class PHP_Token_STATIC extends PHP_Token {}
class PHP_Token_STRING extends PHP_Token {}
class PHP_Token_STRING_CAST extends PHP_Token {}
class PHP_Token_STRING_VARNAME extends PHP_Token {}
class PHP_Token_SWITCH extends PHP_Token {}
class PHP_Token_THROW extends PHP_Token {}
class PHP_Token_TILDE extends PHP_Token {}
class PHP_Token_TRY extends PHP_Token {}
class PHP_Token_UNSET extends PHP_Token {}
class PHP_Token_UNSET_CAST extends PHP_Token {}
class PHP_Token_USE extends PHP_Token {}
class PHP_Token_USE_FUNCTION extends PHP_Token {}
class PHP_Token_VAR extends PHP_Token {}
class PHP_Token_VARIABLE extends PHP_Token {}
class PHP_Token_WHILE extends PHP_Token {}
class PHP_Token_WHITESPACE extends PHP_Token {}
class PHP_Token_XOR_EQUAL extends PHP_Token {}


class PHP_Token_HALT_COMPILER extends PHP_Token {}


class PHP_Token_DIR extends PHP_Token {}
class PHP_Token_GOTO extends PHP_Token {}

class PHP_Token_NAMESPACE extends PHP_TokenWithScope
{
    
    public function getName()
    {
        $Vthon1suqmsr    = $this->tokenStream->tokens();
        $Vgpjmw221p0bspace = (string)$Vthon1suqmsr[$this->id+2];

        for ($Vxja1abp34yq = $this->id + 3;; $Vxja1abp34yq += 2) {
            if (isset($Vthon1suqmsr[$Vxja1abp34yq]) &&
                $Vthon1suqmsr[$Vxja1abp34yq] instanceof PHP_Token_NS_SEPARATOR) {
                $Vgpjmw221p0bspace .= '\\' . $Vthon1suqmsr[$Vxja1abp34yq+1];
            } else {
                break;
            }
        }

        return $Vgpjmw221p0bspace;
    }
}

class PHP_Token_NS_C extends PHP_Token {}
class PHP_Token_NS_SEPARATOR extends PHP_Token {}


class PHP_Token_CALLABLE extends PHP_Token {}
class PHP_Token_INSTEADOF extends PHP_Token {}
class PHP_Token_TRAIT extends PHP_Token_INTERFACE {}
class PHP_Token_TRAIT_C extends PHP_Token {}


class PHP_Token_FINALLY extends PHP_Token {}
class PHP_Token_YIELD extends PHP_Token {}


class PHP_Token_ELLIPSIS extends PHP_Token {}
class PHP_Token_POW extends PHP_Token {}
class PHP_Token_POW_EQUAL extends PHP_Token {}


class PHP_Token_COALESCE extends PHP_Token {}
class PHP_Token_SPACESHIP extends PHP_Token {}
class PHP_Token_YIELD_FROM extends PHP_Token {}


class PHP_Token_ASYNC extends PHP_Token {}
class PHP_Token_AWAIT extends PHP_Token {}
class PHP_Token_COMPILER_HALT_OFFSET extends PHP_Token {}
class PHP_Token_ENUM extends PHP_Token {}
class PHP_Token_EQUALS extends PHP_Token {}
class PHP_Token_IN extends PHP_Token {}
class PHP_Token_JOIN extends PHP_Token {}
class PHP_Token_LAMBDA_ARROW extends PHP_Token {}
class PHP_Token_LAMBDA_CP extends PHP_Token {}
class PHP_Token_LAMBDA_OP extends PHP_Token {}
class PHP_Token_ONUMBER extends PHP_Token {}
class PHP_Token_NULLSAFE_OBJECT_OPERATOR extends PHP_Token {}
class PHP_Token_SHAPE extends PHP_Token {}
class PHP_Token_SUPER extends PHP_Token {}
class PHP_Token_TYPE extends PHP_Token {}
class PHP_Token_TYPELIST_GT extends PHP_Token {}
class PHP_Token_TYPELIST_LT extends PHP_Token {}
class PHP_Token_WHERE extends PHP_Token {}
class PHP_Token_XHP_ATTRIBUTE extends PHP_Token {}
class PHP_Token_XHP_CATEGORY extends PHP_Token {}
class PHP_Token_XHP_CATEGORY_LABEL extends PHP_Token {}
class PHP_Token_XHP_CHILDREN extends PHP_Token {}
class PHP_Token_XHP_LABEL extends PHP_Token {}
class PHP_Token_XHP_REQUIRED extends PHP_Token {}
class PHP_Token_XHP_TAG_GT extends PHP_Token {}
class PHP_Token_XHP_TAG_LT extends PHP_Token {}
class PHP_Token_XHP_TEXT extends PHP_Token {}
