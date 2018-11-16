<?php



class PHP_CodeCoverage_Report_Text
{
    protected $Vyc5yn3k1k30;
    protected $Vodoqtdf4fw1;
    protected $Vlmf1gk2mkoe;
    protected $Vi4xwft3elnk;

    protected $V2oedabekkrb = array(
        'green'  => "\x1b[30;42m",
        'yellow' => "\x1b[30;43m",
        'red'    => "\x1b[37;41m",
        'header' => "\x1b[1;37;40m",
        'reset'  => "\x1b[0m",
        'eol'    => "\x1b[2K",
    );

    public function __construct($Vyc5yn3k1k30, $Vodoqtdf4fw1, $Vlmf1gk2mkoe, $Vi4xwft3elnk)
    {
        $this->lowUpperBound      = $Vyc5yn3k1k30;
        $this->highLowerBound     = $Vodoqtdf4fw1;
        $this->showUncoveredFiles = $Vlmf1gk2mkoe;
        $this->showOnlySummary    = $Vi4xwft3elnk;
    }

    
    public function process(PHP_CodeCoverage $Vbt1bqdir3su, $Vu3txdzoybp2 = false)
    {
        $Vvaiuwffullu = PHP_EOL . PHP_EOL;
        $Vem32crslzoa = $Vbt1bqdir3su->getReport();
        unset($Vbt1bqdir3su);

        $V2oedabekkrb = array(
            'header'  => '',
            'classes' => '',
            'methods' => '',
            'lines'   => '',
            'reset'   => '',
            'eol'     => ''
        );

        if ($Vu3txdzoybp2) {
            $V2oedabekkrb['classes'] = $this->getCoverageColor(
                $Vem32crslzoa->getNumTestedClassesAndTraits(),
                $Vem32crslzoa->getNumClassesAndTraits()
            );
            $V2oedabekkrb['methods'] = $this->getCoverageColor(
                $Vem32crslzoa->getNumTestedMethods(),
                $Vem32crslzoa->getNumMethods()
            );
            $V2oedabekkrb['lines']   = $this->getCoverageColor(
                $Vem32crslzoa->getNumExecutedLines(),
                $Vem32crslzoa->getNumExecutableLines()
            );
            $V2oedabekkrb['reset']   = $this->colors['reset'];
            $V2oedabekkrb['header']  = $this->colors['header'];
            $V2oedabekkrb['eol']     = $this->colors['eol'];
        }

        $Vcoznk2huoff = sprintf(
            '  Classes: %6s (%d/%d)',
            PHP_CodeCoverage_Util::percent(
                $Vem32crslzoa->getNumTestedClassesAndTraits(),
                $Vem32crslzoa->getNumClassesAndTraits(),
                true
            ),
            $Vem32crslzoa->getNumTestedClassesAndTraits(),
            $Vem32crslzoa->getNumClassesAndTraits()
        );

        $V0yfl5ulns0o = sprintf(
            '  Methods: %6s (%d/%d)',
            PHP_CodeCoverage_Util::percent(
                $Vem32crslzoa->getNumTestedMethods(),
                $Vem32crslzoa->getNumMethods(),
                true
            ),
            $Vem32crslzoa->getNumTestedMethods(),
            $Vem32crslzoa->getNumMethods()
        );

        $Vbkt5laoakgf = sprintf(
            '  Lines:   %6s (%d/%d)',
            PHP_CodeCoverage_Util::percent(
                $Vem32crslzoa->getNumExecutedLines(),
                $Vem32crslzoa->getNumExecutableLines(),
                true
            ),
            $Vem32crslzoa->getNumExecutedLines(),
            $Vem32crslzoa->getNumExecutableLines()
        );

        $Vtdkwthjlchl = max(array_map('strlen', array($Vcoznk2huoff, $V0yfl5ulns0o, $Vbkt5laoakgf)));

        if ($this->showOnlySummary) {
            $V3eablqu0h51   = 'Code Coverage Report Summary:';
            $Vtdkwthjlchl = max($Vtdkwthjlchl, strlen($V3eablqu0h51));

            $Vvaiuwffullu .= $this->format($V2oedabekkrb['header'], $Vtdkwthjlchl, $V3eablqu0h51);
        } else {
            $V44ektrjtftz  = date('  Y-m-d H:i:s', $_SERVER['REQUEST_TIME']);
            $V3eablqu0h51 = 'Code Coverage Report:';

            $Vvaiuwffullu .= $this->format($V2oedabekkrb['header'], $Vtdkwthjlchl, $V3eablqu0h51);
            $Vvaiuwffullu .= $this->format($V2oedabekkrb['header'], $Vtdkwthjlchl, $V44ektrjtftz);
            $Vvaiuwffullu .= $this->format($V2oedabekkrb['header'], $Vtdkwthjlchl, '');
            $Vvaiuwffullu .= $this->format($V2oedabekkrb['header'], $Vtdkwthjlchl, ' Summary:');
        }

        $Vvaiuwffullu .= $this->format($V2oedabekkrb['classes'], $Vtdkwthjlchl, $Vcoznk2huoff);
        $Vvaiuwffullu .= $this->format($V2oedabekkrb['methods'], $Vtdkwthjlchl, $V0yfl5ulns0o);
        $Vvaiuwffullu .= $this->format($V2oedabekkrb['lines'], $Vtdkwthjlchl, $Vbkt5laoakgf);

        if ($this->showOnlySummary) {
            return $Vvaiuwffullu . PHP_EOL;
        }

        $Varz4zmxaq21 = array();

        foreach ($Vem32crslzoa as $Virsew13xpli) {
            if (!$Virsew13xpli instanceof PHP_CodeCoverage_Report_Node_File) {
                continue;
            }

            $Vcoznk2huoff  = $Virsew13xpli->getClassesAndTraits();

            foreach ($Vcoznk2huoff as $Vh0iae5cev4i => $Vqmu1sajhgfn) {
                $Vqmu1sajhgfnStatements        = 0;
                $Vkugg5eb525v = 0;
                $Vsj4al4d1ukx         = 0;
                $Vqmu1sajhgfnMethods           = 0;

                foreach ($Vqmu1sajhgfn['methods'] as $Vtlfvdwskdge) {
                    if ($Vtlfvdwskdge['executableLines'] == 0) {
                        continue;
                    }

                    $Vqmu1sajhgfnMethods++;
                    $Vqmu1sajhgfnStatements        += $Vtlfvdwskdge['executableLines'];
                    $Vkugg5eb525v += $Vtlfvdwskdge['executedLines'];
                    if ($Vtlfvdwskdge['coverage'] == 100) {
                        $Vsj4al4d1ukx++;
                    }
                }

                if (!empty($Vqmu1sajhgfn['package']['namespace'])) {
                    $Vi4q0wxavk53 = '\\' . $Vqmu1sajhgfn['package']['namespace'] . '::';
                } elseif (!empty($Vqmu1sajhgfn['package']['fullPackage'])) {
                    $Vi4q0wxavk53 = '@' . $Vqmu1sajhgfn['package']['fullPackage'] . '::';
                } else {
                    $Vi4q0wxavk53 = '';
                }

                $Varz4zmxaq21[$Vi4q0wxavk53 . $Vh0iae5cev4i] = array(
                    'namespace'         => $Vi4q0wxavk53,
                    'className '        => $Vh0iae5cev4i,
                    'methodsCovered'    => $Vsj4al4d1ukx,
                    'methodCount'       => $Vqmu1sajhgfnMethods,
                    'statementsCovered' => $Vkugg5eb525v,
                    'statementCount'    => $Vqmu1sajhgfnStatements,
                );
            }
        }

        ksort($Varz4zmxaq21);

        $VtlfvdwskdgeColor = '';
        $Vbkt5laoakgfColor  = '';
        $Vgavhkrh5xrm  = '';

        foreach ($Varz4zmxaq21 as $V5oxxwzfs2hu => $Vqmu1sajhgfnInfo) {
            if ($Vqmu1sajhgfnInfo['statementsCovered'] != 0 ||
                $this->showUncoveredFiles) {
                if ($Vu3txdzoybp2) {
                    $VtlfvdwskdgeColor = $this->getCoverageColor($Vqmu1sajhgfnInfo['methodsCovered'], $Vqmu1sajhgfnInfo['methodCount']);
                    $Vbkt5laoakgfColor  = $this->getCoverageColor($Vqmu1sajhgfnInfo['statementsCovered'], $Vqmu1sajhgfnInfo['statementCount']);
                    $Vgavhkrh5xrm  = $V2oedabekkrb['reset'];
                }

                $Vvaiuwffullu .= PHP_EOL . $V5oxxwzfs2hu . PHP_EOL
                    . '  ' . $VtlfvdwskdgeColor . 'Methods: ' . $this->printCoverageCounts($Vqmu1sajhgfnInfo['methodsCovered'], $Vqmu1sajhgfnInfo['methodCount'], 2) . $Vgavhkrh5xrm . ' '
                    . '  ' . $Vbkt5laoakgfColor  . 'Lines: ' . $this->printCoverageCounts($Vqmu1sajhgfnInfo['statementsCovered'], $Vqmu1sajhgfnInfo['statementCount'], 3) . $Vgavhkrh5xrm
                ;
            }
        }

        return $Vvaiuwffullu . PHP_EOL;
    }

    protected function getCoverageColor($Vqmenngsqooy, $Vjwbnpkh5scx)
    {
        $Vbt1bqdir3su = PHP_CodeCoverage_Util::percent(
            $Vqmenngsqooy,
            $Vjwbnpkh5scx
        );

        if ($Vbt1bqdir3su >= $this->highLowerBound) {
            return $this->colors['green'];
        } elseif ($Vbt1bqdir3su > $this->lowUpperBound) {
            return $this->colors['yellow'];
        }

        return $this->colors['red'];
    }

    protected function printCoverageCounts($Vqmenngsqooy, $Vjwbnpkh5scx, $Vvsc3xabyxrd)
    {
        $Vlobivxuxali = '%' . $Vvsc3xabyxrd . 's';

        return PHP_CodeCoverage_Util::percent(
            $Vqmenngsqooy,
            $Vjwbnpkh5scx,
            true,
            true
        ) .
        ' (' . sprintf($Vlobivxuxali, $Vqmenngsqooy) . '/' .
        sprintf($Vlobivxuxali, $Vjwbnpkh5scx) . ')';
    }

    private function format($Vyyqs1bnedkd, $Vtdkwthjlchl, $Ve5tcsso230g)
    {
        $Vpdd05gj1isn = $Vyyqs1bnedkd ? $this->colors['reset'] : '';

        return $Vyyqs1bnedkd . str_pad($Ve5tcsso230g, $Vtdkwthjlchl) . $Vpdd05gj1isn . PHP_EOL;
    }
}
