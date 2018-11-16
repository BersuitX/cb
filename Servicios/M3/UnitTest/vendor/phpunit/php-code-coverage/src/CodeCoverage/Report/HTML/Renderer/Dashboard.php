<?php



class PHP_CodeCoverage_Report_HTML_Renderer_Dashboard extends PHP_CodeCoverage_Report_HTML_Renderer
{
    
    public function render(PHP_CodeCoverage_Report_Node_Directory $Vpbrymo1kvdk, $Vpu3xl4uhgg5)
    {
        $Vcoznk2huoff  = $Vpbrymo1kvdk->getClassesAndTraits();
        $Vlqygqxkgo25 = new Text_Template(
            $this->templatePath . 'dashboard.html',
            '{{',
            '}}'
        );

        $this->setCommonTemplateVariables($Vlqygqxkgo25, $Vpbrymo1kvdk);

        $Vsmngkyfx0xx             = $Vpbrymo1kvdk->getId() . '/';
        $V2d5uz3ftkin           = $this->complexity($Vcoznk2huoff, $Vsmngkyfx0xx);
        $Vqoqs4jqguun = $this->coverageDistribution($Vcoznk2huoff);
        $V4bh2yez4ozg = $this->insufficientCoverage($Vcoznk2huoff, $Vsmngkyfx0xx);
        $Vlznxd2cnegq         = $this->projectRisks($Vcoznk2huoff, $Vsmngkyfx0xx);

        $Vlqygqxkgo25->setVar(
            array(
                'insufficient_coverage_classes' => $V4bh2yez4ozg['class'],
                'insufficient_coverage_methods' => $V4bh2yez4ozg['method'],
                'project_risks_classes'         => $Vlznxd2cnegq['class'],
                'project_risks_methods'         => $Vlznxd2cnegq['method'],
                'complexity_class'              => $V2d5uz3ftkin['class'],
                'complexity_method'             => $V2d5uz3ftkin['method'],
                'class_coverage_distribution'   => $Vqoqs4jqguun['class'],
                'method_coverage_distribution'  => $Vqoqs4jqguun['method']
            )
        );

        $Vlqygqxkgo25->renderTo($Vpu3xl4uhgg5);
    }

    
    protected function complexity(array $Vcoznk2huoff, $Vsmngkyfx0xx)
    {
        $Vv0hyvhlkjqr = array('class' => array(), 'method' => array());

        foreach ($Vcoznk2huoff as $Vh0iae5cev4i => $Vqmu1sajhgfn) {
            foreach ($Vqmu1sajhgfn['methods'] as $Vc1exo5hbki5 => $Vtlfvdwskdge) {
                if ($Vh0iae5cev4i != '*') {
                    $Vc1exo5hbki5 = $Vh0iae5cev4i . '::' . $Vc1exo5hbki5;
                }

                $Vv0hyvhlkjqr['method'][] = array(
                    $Vtlfvdwskdge['coverage'],
                    $Vtlfvdwskdge['ccn'],
                    sprintf(
                        '<a href="%s">%s</a>',
                        str_replace($Vsmngkyfx0xx, '', $Vtlfvdwskdge['link']),
                        $Vc1exo5hbki5
                    )
                );
            }

            $Vv0hyvhlkjqr['class'][] = array(
                $Vqmu1sajhgfn['coverage'],
                $Vqmu1sajhgfn['ccn'],
                sprintf(
                    '<a href="%s">%s</a>',
                    str_replace($Vsmngkyfx0xx, '', $Vqmu1sajhgfn['link']),
                    $Vh0iae5cev4i
                )
            );
        }

        return array(
            'class'  => json_encode($Vv0hyvhlkjqr['class']),
            'method' => json_encode($Vv0hyvhlkjqr['method'])
        );
    }

    
    protected function coverageDistribution(array $Vcoznk2huoff)
    {
        $Vv0hyvhlkjqr = array(
            'class' => array(
                '0%'      => 0,
                '0-10%'   => 0,
                '10-20%'  => 0,
                '20-30%'  => 0,
                '30-40%'  => 0,
                '40-50%'  => 0,
                '50-60%'  => 0,
                '60-70%'  => 0,
                '70-80%'  => 0,
                '80-90%'  => 0,
                '90-100%' => 0,
                '100%'    => 0
            ),
            'method' => array(
                '0%'      => 0,
                '0-10%'   => 0,
                '10-20%'  => 0,
                '20-30%'  => 0,
                '30-40%'  => 0,
                '40-50%'  => 0,
                '50-60%'  => 0,
                '60-70%'  => 0,
                '70-80%'  => 0,
                '80-90%'  => 0,
                '90-100%' => 0,
                '100%'    => 0
            )
        );

        foreach ($Vcoznk2huoff as $Vqmu1sajhgfn) {
            foreach ($Vqmu1sajhgfn['methods'] as $Vc1exo5hbki5 => $Vtlfvdwskdge) {
                if ($Vtlfvdwskdge['coverage'] == 0) {
                    $Vv0hyvhlkjqr['method']['0%']++;
                } elseif ($Vtlfvdwskdge['coverage'] == 100) {
                    $Vv0hyvhlkjqr['method']['100%']++;
                } else {
                    $Vlpbz5aloxqt = floor($Vtlfvdwskdge['coverage'] / 10) * 10;
                    $Vlpbz5aloxqt = $Vlpbz5aloxqt . '-' . ($Vlpbz5aloxqt + 10) . '%';
                    $Vv0hyvhlkjqr['method'][$Vlpbz5aloxqt]++;
                }
            }

            if ($Vqmu1sajhgfn['coverage'] == 0) {
                $Vv0hyvhlkjqr['class']['0%']++;
            } elseif ($Vqmu1sajhgfn['coverage'] == 100) {
                $Vv0hyvhlkjqr['class']['100%']++;
            } else {
                $Vlpbz5aloxqt = floor($Vqmu1sajhgfn['coverage'] / 10) * 10;
                $Vlpbz5aloxqt = $Vlpbz5aloxqt . '-' . ($Vlpbz5aloxqt + 10) . '%';
                $Vv0hyvhlkjqr['class'][$Vlpbz5aloxqt]++;
            }
        }

        return array(
            'class'  => json_encode(array_values($Vv0hyvhlkjqr['class'])),
            'method' => json_encode(array_values($Vv0hyvhlkjqr['method']))
        );
    }

    
    protected function insufficientCoverage(array $Vcoznk2huoff, $Vsmngkyfx0xx)
    {
        $Vkugdq2th3qi = array();
        $V4c4ftut0yx1 = array();
        $Vv0hyvhlkjqr             = array('class' => '', 'method' => '');

        foreach ($Vcoznk2huoff as $Vh0iae5cev4i => $Vqmu1sajhgfn) {
            foreach ($Vqmu1sajhgfn['methods'] as $Vc1exo5hbki5 => $Vtlfvdwskdge) {
                if ($Vtlfvdwskdge['coverage'] < $this->highLowerBound) {
                    if ($Vh0iae5cev4i != '*') {
                        $Vlpbz5aloxqt = $Vh0iae5cev4i . '::' . $Vc1exo5hbki5;
                    } else {
                        $Vlpbz5aloxqt = $Vc1exo5hbki5;
                    }

                    $V4c4ftut0yx1[$Vlpbz5aloxqt] = $Vtlfvdwskdge['coverage'];
                }
            }

            if ($Vqmu1sajhgfn['coverage'] < $this->highLowerBound) {
                $Vkugdq2th3qi[$Vh0iae5cev4i] = $Vqmu1sajhgfn['coverage'];
            }
        }

        asort($Vkugdq2th3qi);
        asort($V4c4ftut0yx1);

        foreach ($Vkugdq2th3qi as $Vh0iae5cev4i => $Vbt1bqdir3su) {
            $Vv0hyvhlkjqr['class'] .= sprintf(
                '       <tr><td><a href="%s">%s</a></td><td class="text-right">%d%%</td></tr>' . "\n",
                str_replace($Vsmngkyfx0xx, '', $Vcoznk2huoff[$Vh0iae5cev4i]['link']),
                $Vh0iae5cev4i,
                $Vbt1bqdir3su
            );
        }

        foreach ($V4c4ftut0yx1 as $Vc1exo5hbki5 => $Vbt1bqdir3su) {
            list($Vqmu1sajhgfn, $Vtlfvdwskdge) = explode('::', $Vc1exo5hbki5);

            $Vv0hyvhlkjqr['method'] .= sprintf(
                '       <tr><td><a href="%s"><abbr title="%s">%s</abbr></a></td><td class="text-right">%d%%</td></tr>' . "\n",
                str_replace($Vsmngkyfx0xx, '', $Vcoznk2huoff[$Vqmu1sajhgfn]['methods'][$Vtlfvdwskdge]['link']),
                $Vc1exo5hbki5,
                $Vtlfvdwskdge,
                $Vbt1bqdir3su
            );
        }

        return $Vv0hyvhlkjqr;
    }

    
    protected function projectRisks(array $Vcoznk2huoff, $Vsmngkyfx0xx)
    {
        $Vqmu1sajhgfnRisks  = array();
        $VtlfvdwskdgeRisks = array();
        $Vv0hyvhlkjqr      = array('class' => '', 'method' => '');

        foreach ($Vcoznk2huoff as $Vh0iae5cev4i => $Vqmu1sajhgfn) {
            foreach ($Vqmu1sajhgfn['methods'] as $Vc1exo5hbki5 => $Vtlfvdwskdge) {
                if ($Vtlfvdwskdge['coverage'] < $this->highLowerBound &&
                    $Vtlfvdwskdge['ccn'] > 1) {
                    if ($Vh0iae5cev4i != '*') {
                        $Vlpbz5aloxqt = $Vh0iae5cev4i . '::' . $Vc1exo5hbki5;
                    } else {
                        $Vlpbz5aloxqt = $Vc1exo5hbki5;
                    }

                    $VtlfvdwskdgeRisks[$Vlpbz5aloxqt] = $Vtlfvdwskdge['crap'];
                }
            }

            if ($Vqmu1sajhgfn['coverage'] < $this->highLowerBound &&
                $Vqmu1sajhgfn['ccn'] > count($Vqmu1sajhgfn['methods'])) {
                $Vqmu1sajhgfnRisks[$Vh0iae5cev4i] = $Vqmu1sajhgfn['crap'];
            }
        }

        arsort($Vqmu1sajhgfnRisks);
        arsort($VtlfvdwskdgeRisks);

        foreach ($Vqmu1sajhgfnRisks as $Vh0iae5cev4i => $V1lej2e3dbqt) {
            $Vv0hyvhlkjqr['class'] .= sprintf(
                '       <tr><td><a href="%s">%s</a></td><td class="text-right">%d</td></tr>' . "\n",
                str_replace($Vsmngkyfx0xx, '', $Vcoznk2huoff[$Vh0iae5cev4i]['link']),
                $Vh0iae5cev4i,
                $V1lej2e3dbqt
            );
        }

        foreach ($VtlfvdwskdgeRisks as $Vc1exo5hbki5 => $V1lej2e3dbqt) {
            list($Vqmu1sajhgfn, $Vtlfvdwskdge) = explode('::', $Vc1exo5hbki5);

            $Vv0hyvhlkjqr['method'] .= sprintf(
                '       <tr><td><a href="%s"><abbr title="%s">%s</abbr></a></td><td class="text-right">%d</td></tr>' . "\n",
                str_replace($Vsmngkyfx0xx, '', $Vcoznk2huoff[$Vqmu1sajhgfn]['methods'][$Vtlfvdwskdge]['link']),
                $Vc1exo5hbki5,
                $Vtlfvdwskdge,
                $V1lej2e3dbqt
            );
        }

        return $Vv0hyvhlkjqr;
    }

    protected function getActiveBreadcrumb(PHP_CodeCoverage_Report_Node $Vpbrymo1kvdk)
    {
        return sprintf(
            '        <li><a href="index.html">%s</a></li>' . "\n" .
            '        <li class="active">(Dashboard)</li>' . "\n",
            $Vpbrymo1kvdk->getName()
        );
    }
}
