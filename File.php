<?php



if (!defined('T_TRAIT')) {
    define('T_TRAIT', 1001);
}

if (!defined('T_INSTEADOF')) {
    define('T_INSTEADOF', 1002);
}

if (!defined('T_CALLABLE')) {
    define('T_CALLABLE', 1003);
}

if (!defined('T_FINALLY')) {
    define('T_FINALLY', 1004);
}

if (!defined('T_YIELD')) {
    define('T_YIELD', 1005);
}



class PHP_CodeCoverage_Report_HTML_Renderer_File extends PHP_CodeCoverage_Report_HTML_Renderer
{
    
    private $Vd5ebpasdltt;

    
    public function __construct($V403quq1uv0k, $Vi5uqhlkbfzi, $V44ektrjtftz, $Vyc5yn3k1k30, $Vodoqtdf4fw1)
    {
        parent::__construct(
            $V403quq1uv0k,
            $Vi5uqhlkbfzi,
            $V44ektrjtftz,
            $Vyc5yn3k1k30,
            $Vodoqtdf4fw1
        );

        $this->htmlspecialcharsFlags = ENT_COMPAT;

        if (PHP_VERSION_ID >= 50400 && defined('ENT_SUBSTITUTE')) {
            $this->htmlspecialcharsFlags = $this->htmlspecialcharsFlags | ENT_HTML401 | ENT_SUBSTITUTE;
        }
    }

    
    public function render(PHP_CodeCoverage_Report_Node_File $Vpbrymo1kvdk, $Vpu3xl4uhgg5)
    {
        $Vlqygqxkgo25 = new Text_Template($this->templatePath . 'file.html', '{{', '}}');

        $Vlqygqxkgo25->setVar(
            array(
                'items' => $this->renderItems($Vpbrymo1kvdk),
                'lines' => $this->renderSource($Vpbrymo1kvdk)
            )
        );

        $this->setCommonTemplateVariables($Vlqygqxkgo25, $Vpbrymo1kvdk);

        $Vlqygqxkgo25->renderTo($Vpu3xl4uhgg5);
    }

    
    protected function renderItems(PHP_CodeCoverage_Report_Node_File $Vpbrymo1kvdk)
    {
        $Vlqygqxkgo25 = new Text_Template($this->templatePath . 'file_item.html', '{{', '}}');

        $Vsmg3hacqbj2 = new Text_Template(
            $this->templatePath . 'method_item.html',
            '{{',
            '}}'
        );

        $Vdgaj5zam5hd = $this->renderItemTemplate(
            $Vlqygqxkgo25,
            array(
                'name'                         => 'Total',
                'numClasses'                   => $Vpbrymo1kvdk->getNumClassesAndTraits(),
                'numTestedClasses'             => $Vpbrymo1kvdk->getNumTestedClassesAndTraits(),
                'numMethods'                   => $Vpbrymo1kvdk->getNumMethods(),
                'numTestedMethods'             => $Vpbrymo1kvdk->getNumTestedMethods(),
                'linesExecutedPercent'         => $Vpbrymo1kvdk->getLineExecutedPercent(false),
                'linesExecutedPercentAsString' => $Vpbrymo1kvdk->getLineExecutedPercent(),
                'numExecutedLines'             => $Vpbrymo1kvdk->getNumExecutedLines(),
                'numExecutableLines'           => $Vpbrymo1kvdk->getNumExecutableLines(),
                'testedMethodsPercent'         => $Vpbrymo1kvdk->getTestedMethodsPercent(false),
                'testedMethodsPercentAsString' => $Vpbrymo1kvdk->getTestedMethodsPercent(),
                'testedClassesPercent'         => $Vpbrymo1kvdk->getTestedClassesAndTraitsPercent(false),
                'testedClassesPercentAsString' => $Vpbrymo1kvdk->getTestedClassesAndTraitsPercent(),
                'crap'                         => '<abbr title="Change Risk Anti-Patterns (CRAP) Index">CRAP</abbr>'
            )
        );

        $Vdgaj5zam5hd .= $this->renderFunctionItems(
            $Vpbrymo1kvdk->getFunctions(),
            $Vsmg3hacqbj2
        );

        $Vdgaj5zam5hd .= $this->renderTraitOrClassItems(
            $Vpbrymo1kvdk->getTraits(),
            $Vlqygqxkgo25,
            $Vsmg3hacqbj2
        );

        $Vdgaj5zam5hd .= $this->renderTraitOrClassItems(
            $Vpbrymo1kvdk->getClasses(),
            $Vlqygqxkgo25,
            $Vsmg3hacqbj2
        );

        return $Vdgaj5zam5hd;
    }

    
    protected function renderTraitOrClassItems(array $Vdgaj5zam5hd, Text_Template $Vlqygqxkgo25, Text_Template $Vsmg3hacqbj2)
    {
        if (empty($Vdgaj5zam5hd)) {
            return '';
        }

        $Vd3322ljwbqh = '';

        foreach ($Vdgaj5zam5hd as $Vgpjmw221p0b => $Virsew13xpli) {
            $Vvt54wtopojd       = count($Virsew13xpli['methods']);
            $Vjd4caseyb3f = 0;

            foreach ($Virsew13xpli['methods'] as $Vtlfvdwskdge) {
                if ($Vtlfvdwskdge['executedLines'] == $Vtlfvdwskdge['executableLines']) {
                    $Vjd4caseyb3f++;
                }
            }

            $Vd3322ljwbqh .= $this->renderItemTemplate(
                $Vlqygqxkgo25,
                array(
                    'name'                         => $Vgpjmw221p0b,
                    'numClasses'                   => 1,
                    'numTestedClasses'             => $Vjd4caseyb3f == $Vvt54wtopojd ? 1 : 0,
                    'numMethods'                   => $Vvt54wtopojd,
                    'numTestedMethods'             => $Vjd4caseyb3f,
                    'linesExecutedPercent'         => PHP_CodeCoverage_Util::percent(
                        $Virsew13xpli['executedLines'],
                        $Virsew13xpli['executableLines'],
                        false
                    ),
                    'linesExecutedPercentAsString' => PHP_CodeCoverage_Util::percent(
                        $Virsew13xpli['executedLines'],
                        $Virsew13xpli['executableLines'],
                        true
                    ),
                    'numExecutedLines'             => $Virsew13xpli['executedLines'],
                    'numExecutableLines'           => $Virsew13xpli['executableLines'],
                    'testedMethodsPercent'         => PHP_CodeCoverage_Util::percent(
                        $Vjd4caseyb3f,
                        $Vvt54wtopojd,
                        false
                    ),
                    'testedMethodsPercentAsString' => PHP_CodeCoverage_Util::percent(
                        $Vjd4caseyb3f,
                        $Vvt54wtopojd,
                        true
                    ),
                    'testedClassesPercent'         => PHP_CodeCoverage_Util::percent(
                        $Vjd4caseyb3f == $Vvt54wtopojd ? 1 : 0,
                        1,
                        false
                    ),
                    'testedClassesPercentAsString' => PHP_CodeCoverage_Util::percent(
                        $Vjd4caseyb3f == $Vvt54wtopojd ? 1 : 0,
                        1,
                        true
                    ),
                    'crap'                         => $Virsew13xpli['crap']
                )
            );

            foreach ($Virsew13xpli['methods'] as $Vtlfvdwskdge) {
                $Vd3322ljwbqh .= $this->renderFunctionOrMethodItem(
                    $Vsmg3hacqbj2,
                    $Vtlfvdwskdge,
                    '&nbsp;'
                );
            }
        }

        return $Vd3322ljwbqh;
    }

    
    protected function renderFunctionItems(array $V1smq0dxjwv1, Text_Template $Vlqygqxkgo25)
    {
        if (empty($V1smq0dxjwv1)) {
            return '';
        }

        $Vd3322ljwbqh = '';

        foreach ($V1smq0dxjwv1 as $Vi5khqarjczp) {
            $Vd3322ljwbqh .= $this->renderFunctionOrMethodItem(
                $Vlqygqxkgo25,
                $Vi5khqarjczp
            );
        }

        return $Vd3322ljwbqh;
    }

    
    protected function renderFunctionOrMethodItem(Text_Template $Vlqygqxkgo25, array $Virsew13xpli, $Vrdvd0lwwb1c = '')
    {
        $Vtz5beaiz0gc = $Virsew13xpli['executedLines'] == $Virsew13xpli['executableLines'] ? 1 : 0;

        return $this->renderItemTemplate(
            $Vlqygqxkgo25,
            array(
                'name'                         => sprintf(
                    '%s<a href="#%d"><abbr title="%s">%s</abbr></a>',
                    $Vrdvd0lwwb1c,
                    $Virsew13xpli['startLine'],
                    htmlspecialchars($Virsew13xpli['signature']),
                    isset($Virsew13xpli['functionName']) ? $Virsew13xpli['functionName'] : $Virsew13xpli['methodName']
                ),
                'numMethods'                   => 1,
                'numTestedMethods'             => $Vtz5beaiz0gc,
                'linesExecutedPercent'         => PHP_CodeCoverage_Util::percent(
                    $Virsew13xpli['executedLines'],
                    $Virsew13xpli['executableLines'],
                    false
                ),
                'linesExecutedPercentAsString' => PHP_CodeCoverage_Util::percent(
                    $Virsew13xpli['executedLines'],
                    $Virsew13xpli['executableLines'],
                    true
                ),
                'numExecutedLines'             => $Virsew13xpli['executedLines'],
                'numExecutableLines'           => $Virsew13xpli['executableLines'],
                'testedMethodsPercent'         => PHP_CodeCoverage_Util::percent(
                    $Vtz5beaiz0gc,
                    1,
                    false
                ),
                'testedMethodsPercentAsString' => PHP_CodeCoverage_Util::percent(
                    $Vtz5beaiz0gc,
                    1,
                    true
                ),
                'crap'                         => $Virsew13xpli['crap']
            )
        );
    }

    
    protected function renderSource(PHP_CodeCoverage_Report_Node_File $Vpbrymo1kvdk)
    {
        $Vquvjmjj3pih = $Vpbrymo1kvdk->getCoverageData();
        $Vkjxtxkqa4lw     = $Vpbrymo1kvdk->getTestData();
        $Vti03urtyvqm    = $this->loadFile($Vpbrymo1kvdk->getPath());
        $Vbkt5laoakgf        = '';
        $Vxja1abp34yq            = 1;

        foreach ($Vti03urtyvqm as $Vrwsmtja4f2j) {
            $Vlm2ng0lng1u        = '';
            $V012wzk21ovz = '';
            $Va0cm1w2zb5j   = '';

            if (array_key_exists($Vxja1abp34yq, $Vquvjmjj3pih)) {
                $Vpufahej1ssm = count($Vquvjmjj3pih[$Vxja1abp34yq]);

                if ($Vquvjmjj3pih[$Vxja1abp34yq] === null) {
                    $Vlm2ng0lng1u = ' class="warning"';
                } elseif ($Vpufahej1ssm == 0) {
                    $Vlm2ng0lng1u = ' class="danger"';
                } else {
                    $Vrwsmtja4f2jCss        = 'covered-by-large-tests';
                    $V012wzk21ovz = '<ul>';

                    if ($Vpufahej1ssm > 1) {
                        $Va0cm1w2zb5j = $Vpufahej1ssm . ' tests cover line ' . $Vxja1abp34yq;
                    } else {
                        $Va0cm1w2zb5j = '1 test covers line ' . $Vxja1abp34yq;
                    }

                    foreach ($Vquvjmjj3pih[$Vxja1abp34yq] as $Vpswbntjg3pr) {
                        if ($Vrwsmtja4f2jCss == 'covered-by-large-tests' && $Vkjxtxkqa4lw[$Vpswbntjg3pr]['size'] == 'medium') {
                            $Vrwsmtja4f2jCss = 'covered-by-medium-tests';
                        } elseif ($Vkjxtxkqa4lw[$Vpswbntjg3pr]['size'] == 'small') {
                            $Vrwsmtja4f2jCss = 'covered-by-small-tests';
                        }

                        switch ($Vkjxtxkqa4lw[$Vpswbntjg3pr]['status']) {
                            case 0:
                                switch ($Vkjxtxkqa4lw[$Vpswbntjg3pr]['size']) {
                                    case 'small':
                                        $Vpswbntjg3prCSS = ' class="covered-by-small-tests"';
                                        break;

                                    case 'medium':
                                        $Vpswbntjg3prCSS = ' class="covered-by-medium-tests"';
                                        break;

                                    default:
                                        $Vpswbntjg3prCSS = ' class="covered-by-large-tests"';
                                        break;
                                }
                                break;

                            case 1:
                            case 2:
                                $Vpswbntjg3prCSS = ' class="warning"';
                                break;

                            case 3:
                                $Vpswbntjg3prCSS = ' class="danger"';
                                break;

                            case 4:
                                $Vpswbntjg3prCSS = ' class="danger"';
                                break;

                            default:
                                $Vpswbntjg3prCSS = '';
                        }

                        $V012wzk21ovz .= sprintf(
                            '<li%s>%s</li>',
                            $Vpswbntjg3prCSS,
                            htmlspecialchars($Vpswbntjg3pr)
                        );
                    }

                    $V012wzk21ovz .= '</ul>';
                    $Vlm2ng0lng1u         = ' class="' . $Vrwsmtja4f2jCss . ' popin"';
                }
            }

            if (!empty($Va0cm1w2zb5j)) {
                $Vus5uhn5yx4h = sprintf(
                    ' data-title="%s" data-content="%s" data-placement="bottom" data-html="true"',
                    $Va0cm1w2zb5j,
                    htmlspecialchars($V012wzk21ovz)
                );
            } else {
                $Vus5uhn5yx4h = '';
            }

            $Vbkt5laoakgf .= sprintf(
                '     <tr%s%s><td><div align="right"><a name="%d"></a><a href="#%d">%d</a></div></td><td class="codeLine">%s</td></tr>' . "\n",
                $Vlm2ng0lng1u,
                $Vus5uhn5yx4h,
                $Vxja1abp34yq,
                $Vxja1abp34yq,
                $Vxja1abp34yq,
                $Vrwsmtja4f2j
            );

            $Vxja1abp34yq++;
        }

        return $Vbkt5laoakgf;
    }

    
    protected function loadFile($Vpu3xl4uhgg5)
    {
        $Vd3322ljwbqh              = file_get_contents($Vpu3xl4uhgg5);
        $Vthon1suqmsr              = token_get_all($Vd3322ljwbqh);
        $Vv0hyvhlkjqr              = array('');
        $Vxja1abp34yq                   = 0;
        $V11j1ir00ni1          = false;
        $Vpu3xl4uhgg5EndsWithNewLine = substr($Vd3322ljwbqh, -1) == "\n";

        unset($Vd3322ljwbqh);

        foreach ($Vthon1suqmsr as $V5kfw3q1o1vh => $Vx5bl5ubgnhj) {
            if (is_string($Vx5bl5ubgnhj)) {
                if ($Vx5bl5ubgnhj === '"' && $Vthon1suqmsr[$V5kfw3q1o1vh - 1] !== '\\') {
                    $Vv0hyvhlkjqr[$Vxja1abp34yq] .= sprintf(
                        '<span class="string">%s</span>',
                        htmlspecialchars($Vx5bl5ubgnhj)
                    );

                    $V11j1ir00ni1 = !$V11j1ir00ni1;
                } else {
                    $Vv0hyvhlkjqr[$Vxja1abp34yq] .= sprintf(
                        '<span class="keyword">%s</span>',
                        htmlspecialchars($Vx5bl5ubgnhj)
                    );
                }

                continue;
            }

            list($Vx5bl5ubgnhj, $Vcptarsq5qe4) = $Vx5bl5ubgnhj;

            $Vcptarsq5qe4 = str_replace(
                array("\t", ' '),
                array('&nbsp;&nbsp;&nbsp;&nbsp;', '&nbsp;'),
                htmlspecialchars($Vcptarsq5qe4, $this->htmlspecialcharsFlags)
            );

            if ($Vcptarsq5qe4 === "\n") {
                $Vv0hyvhlkjqr[++$Vxja1abp34yq] = '';
            } else {
                $Vbkt5laoakgf = explode("\n", $Vcptarsq5qe4);

                foreach ($Vbkt5laoakgf as $V5kfw3q1o1vhj => $Vrwsmtja4f2j) {
                    $Vrwsmtja4f2j = trim($Vrwsmtja4f2j);

                    if ($Vrwsmtja4f2j !== '') {
                        if ($V11j1ir00ni1) {
                            $Vvjw45euydzj = 'string';
                        } else {
                            switch ($Vx5bl5ubgnhj) {
                                case T_INLINE_HTML:
                                    $Vvjw45euydzj = 'html';
                                    break;

                                case T_COMMENT:
                                case T_DOC_COMMENT:
                                    $Vvjw45euydzj = 'comment';
                                    break;

                                case T_ABSTRACT:
                                case T_ARRAY:
                                case T_AS:
                                case T_BREAK:
                                case T_CALLABLE:
                                case T_CASE:
                                case T_CATCH:
                                case T_CLASS:
                                case T_CLONE:
                                case T_CONTINUE:
                                case T_DEFAULT:
                                case T_ECHO:
                                case T_ELSE:
                                case T_ELSEIF:
                                case T_EMPTY:
                                case T_ENDDECLARE:
                                case T_ENDFOR:
                                case T_ENDFOREACH:
                                case T_ENDIF:
                                case T_ENDSWITCH:
                                case T_ENDWHILE:
                                case T_EXIT:
                                case T_EXTENDS:
                                case T_FINAL:
                                case T_FINALLY:
                                case T_FOREACH:
                                case T_FUNCTION:
                                case T_GLOBAL:
                                case T_IF:
                                case T_IMPLEMENTS:
                                case T_INCLUDE:
                                case T_INCLUDE_ONCE:
                                case T_INSTANCEOF:
                                case T_INSTEADOF:
                                case T_INTERFACE:
                                case T_ISSET:
                                case T_LOGICAL_AND:
                                case T_LOGICAL_OR:
                                case T_LOGICAL_XOR:
                                case T_NAMESPACE:
                                case T_NEW:
                                case T_PRIVATE:
                                case T_PROTECTED:
                                case T_PUBLIC:
                                case T_REQUIRE:
                                case T_REQUIRE_ONCE:
                                case T_RETURN:
                                case T_STATIC:
                                case T_THROW:
                                case T_TRAIT:
                                case T_TRY:
                                case T_UNSET:
                                case T_USE:
                                case T_VAR:
                                case T_WHILE:
                                case T_YIELD:
                                    $Vvjw45euydzj = 'keyword';
                                    break;

                                default:
                                    $Vvjw45euydzj = 'default';
                            }
                        }

                        $Vv0hyvhlkjqr[$Vxja1abp34yq] .= sprintf(
                            '<span class="%s">%s</span>',
                            $Vvjw45euydzj,
                            $Vrwsmtja4f2j
                        );
                    }

                    if (isset($Vbkt5laoakgf[$V5kfw3q1o1vhj + 1])) {
                        $Vv0hyvhlkjqr[++$Vxja1abp34yq] = '';
                    }
                }
            }
        }

        if ($Vpu3xl4uhgg5EndsWithNewLine) {
            unset($Vv0hyvhlkjqr[count($Vv0hyvhlkjqr)-1]);
        }

        return $Vv0hyvhlkjqr;
    }
}
