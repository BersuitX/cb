<?php


use SebastianBergmann\Diff\Differ;


class PHPUnit_Framework_Constraint_StringMatches extends PHPUnit_Framework_Constraint_PCREMatch
{
    
    protected $Ve5tcsso230g;

    
    public function __construct($Ve5tcsso230g)
    {
        parent::__construct($Ve5tcsso230g);

        $this->pattern = $this->createPatternFromFormat(
            preg_replace('/\r\n/', "\n", $Ve5tcsso230g)
        );

        $this->string = $Ve5tcsso230g;
    }

    protected function failureDescription($Vddxcctrvo5d)
    {
        return 'format description matches text';
    }

    protected function additionalFailureDescription($Vddxcctrvo5d)
    {
        $V2435fgfpotg = preg_split('(\r\n|\r|\n)', $this->string);
        $Vusanxtmh52m   = preg_split('(\r\n|\r|\n)', $Vddxcctrvo5d);

        foreach ($V2435fgfpotg as $Vojnsu0ourck => $Vrwsmtja4f2j) {
            if (isset($Vusanxtmh52m[$Vojnsu0ourck]) && $Vrwsmtja4f2j !== $Vusanxtmh52m[$Vojnsu0ourck]) {
                $Vrwsmtja4f2j = $this->createPatternFromFormat($Vrwsmtja4f2j);

                if (preg_match($Vrwsmtja4f2j, $Vusanxtmh52m[$Vojnsu0ourck]) > 0) {
                    $V2435fgfpotg[$Vojnsu0ourck] = $Vusanxtmh52m[$Vojnsu0ourck];
                }
            }
        }

        $this->string = implode("\n", $V2435fgfpotg);
        $Vddxcctrvo5d        = implode("\n", $Vusanxtmh52m);

        $Vyxeqxkac2bx = new Differ("--- Expected\n+++ Actual\n");

        return $Vyxeqxkac2bx->diff($this->string, $Vddxcctrvo5d);
    }

    protected function createPatternFromFormat($Ve5tcsso230g)
    {
        $Ve5tcsso230g = str_replace(
            array(
            '%e',
            '%s',
            '%S',
            '%a',
            '%A',
            '%w',
            '%i',
            '%d',
            '%x',
            '%f',
            '%c'
            ),
            array(
            '\\' . DIRECTORY_SEPARATOR,
            '[^\r\n]+',
            '[^\r\n]*',
            '.+',
            '.*',
            '\s*',
            '[+-]?\d+',
            '\d+',
            '[0-9a-fA-F]+',
            '[+-]?\.?\d+\.?\d*(?:[Ee][+-]?\d+)?',
            '.'
            ),
            preg_quote($Ve5tcsso230g, '/')
        );

        return '/^' . $Ve5tcsso230g . '$/s';
    }
}
