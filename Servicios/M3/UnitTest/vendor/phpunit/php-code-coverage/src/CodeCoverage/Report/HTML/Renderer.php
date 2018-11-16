<?php


use SebastianBergmann\Environment\Runtime;


abstract class PHP_CodeCoverage_Report_HTML_Renderer
{
    
    protected $V403quq1uv0k;

    
    protected $Vi5uqhlkbfzi;

    
    protected $V44ektrjtftz;

    
    protected $Vyc5yn3k1k30;

    
    protected $Vodoqtdf4fw1;

    
    protected $Vzqixmthnyoe;

    
    public function __construct($V403quq1uv0k, $Vi5uqhlkbfzi, $V44ektrjtftz, $Vyc5yn3k1k30, $Vodoqtdf4fw1)
    {
        $Vzqixmthnyoe = new SebastianBergmann\Version('2.2.4', dirname(dirname(dirname(dirname(__DIR__)))));

        $this->templatePath   = $V403quq1uv0k;
        $this->generator      = $Vi5uqhlkbfzi;
        $this->date           = $V44ektrjtftz;
        $this->lowUpperBound  = $Vyc5yn3k1k30;
        $this->highLowerBound = $Vodoqtdf4fw1;
        $this->version        = $Vzqixmthnyoe->getVersion();
    }

    
    protected function renderItemTemplate(Text_Template $Vlqygqxkgo25, array $Vqhzkfsafzrc)
    {
        $Vqfo3cchoqto  = '&nbsp;/&nbsp;';

        if (isset($Vqhzkfsafzrc['numClasses']) && $Vqhzkfsafzrc['numClasses'] > 0) {
            $Vws4e2oayc4o = $this->getColorLevel($Vqhzkfsafzrc['testedClassesPercent']);

            $V5buykrlnnht = $Vqhzkfsafzrc['numTestedClasses'] . $Vqfo3cchoqto .
                $Vqhzkfsafzrc['numClasses'];

            $Vhtrtikkerie = $this->getCoverageBar(
                $Vqhzkfsafzrc['testedClassesPercent']
            );
        } else {
            $Vws4e2oayc4o  = 'success';
            $V5buykrlnnht = '0' . $Vqfo3cchoqto . '0';
            $Vhtrtikkerie    = $this->getCoverageBar(100);
        }

        if ($Vqhzkfsafzrc['numMethods'] > 0) {
            $Vxyx2cegiqok = $this->getColorLevel($Vqhzkfsafzrc['testedMethodsPercent']);

            $Vqrcxprpsq0x = $Vqhzkfsafzrc['numTestedMethods'] . $Vqfo3cchoqto .
                $Vqhzkfsafzrc['numMethods'];

            $Vgppkfrzxvjj = $this->getCoverageBar(
                $Vqhzkfsafzrc['testedMethodsPercent']
            );
        } else {
            $Vxyx2cegiqok                         = 'success';
            $Vqrcxprpsq0x                        = '0' . $Vqfo3cchoqto . '0';
            $Vgppkfrzxvjj                           = $this->getCoverageBar(100);
            $Vqhzkfsafzrc['testedMethodsPercentAsString'] = '100.00%';
        }

        if ($Vqhzkfsafzrc['numExecutableLines'] > 0) {
            $Vw5gyvznhehj = $this->getColorLevel($Vqhzkfsafzrc['linesExecutedPercent']);

            $Vyvyqteppg3a = $Vqhzkfsafzrc['numExecutedLines'] . $Vqfo3cchoqto .
                $Vqhzkfsafzrc['numExecutableLines'];

            $V0r25lkx3nrk = $this->getCoverageBar(
                $Vqhzkfsafzrc['linesExecutedPercent']
            );
        } else {
            $Vw5gyvznhehj                           = 'success';
            $Vyvyqteppg3a                          = '0' . $Vqfo3cchoqto . '0';
            $V0r25lkx3nrk                             = $this->getCoverageBar(100);
            $Vqhzkfsafzrc['linesExecutedPercentAsString'] = '100.00%';
        }

        $Vlqygqxkgo25->setVar(
            array(
                'icon'                   => isset($Vqhzkfsafzrc['icon']) ? $Vqhzkfsafzrc['icon'] : '',
                'crap'                   => isset($Vqhzkfsafzrc['crap']) ? $Vqhzkfsafzrc['crap'] : '',
                'name'                   => $Vqhzkfsafzrc['name'],
                'lines_bar'              => $V0r25lkx3nrk,
                'lines_executed_percent' => $Vqhzkfsafzrc['linesExecutedPercentAsString'],
                'lines_level'            => $Vw5gyvznhehj,
                'lines_number'           => $Vyvyqteppg3a,
                'methods_bar'            => $Vgppkfrzxvjj,
                'methods_tested_percent' => $Vqhzkfsafzrc['testedMethodsPercentAsString'],
                'methods_level'          => $Vxyx2cegiqok,
                'methods_number'         => $Vqrcxprpsq0x,
                'classes_bar'            => $Vhtrtikkerie,
                'classes_tested_percent' => isset($Vqhzkfsafzrc['testedClassesPercentAsString']) ? $Vqhzkfsafzrc['testedClassesPercentAsString'] : '',
                'classes_level'          => $Vws4e2oayc4o,
                'classes_number'         => $V5buykrlnnht
            )
        );

        return $Vlqygqxkgo25->render();
    }

    
    protected function setCommonTemplateVariables(Text_Template $Vlqygqxkgo25, PHP_CodeCoverage_Report_Node $Vpbrymo1kvdk)
    {
        $Vrdnxfa4exum = new Runtime;

        $Vlqygqxkgo25->setVar(
            array(
                'id'               => $Vpbrymo1kvdk->getId(),
                'full_path'        => $Vpbrymo1kvdk->getPath(),
                'path_to_root'     => $this->getPathToRoot($Vpbrymo1kvdk),
                'breadcrumbs'      => $this->getBreadcrumbs($Vpbrymo1kvdk),
                'date'             => $this->date,
                'version'          => $this->version,
                'runtime_name'     => $Vrdnxfa4exum->getName(),
                'runtime_version'  => $Vrdnxfa4exum->getVersion(),
                'runtime_link'     => $Vrdnxfa4exum->getVendorUrl(),
                'generator'        => $this->generator,
                'low_upper_bound'  => $this->lowUpperBound,
                'high_lower_bound' => $this->highLowerBound
            )
        );
    }

    protected function getBreadcrumbs(PHP_CodeCoverage_Report_Node $Vpbrymo1kvdk)
    {
        $Vvayhuczjstq = '';
        $V2bpoh5hagzp        = $Vpbrymo1kvdk->getPathAsArray();
        $V2bpoh5hagzpToRoot  = array();
        $Vbulqadoj2ef         = count($V2bpoh5hagzp);

        if ($Vpbrymo1kvdk instanceof PHP_CodeCoverage_Report_Node_File) {
            $Vbulqadoj2ef--;
        }

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vbulqadoj2ef; $Vxja1abp34yq++) {
            $V2bpoh5hagzpToRoot[] = str_repeat('../', $Vxja1abp34yq);
        }

        foreach ($V2bpoh5hagzp as $Vgujlwtlyjlu) {
            if ($Vgujlwtlyjlu !== $Vpbrymo1kvdk) {
                $Vvayhuczjstq .= $this->getInactiveBreadcrumb(
                    $Vgujlwtlyjlu,
                    array_pop($V2bpoh5hagzpToRoot)
                );
            } else {
                $Vvayhuczjstq .= $this->getActiveBreadcrumb($Vgujlwtlyjlu);
            }
        }

        return $Vvayhuczjstq;
    }

    protected function getActiveBreadcrumb(PHP_CodeCoverage_Report_Node $Vpbrymo1kvdk)
    {
        $Vd3322ljwbqh = sprintf(
            '        <li class="active">%s</li>' . "\n",
            $Vpbrymo1kvdk->getName()
        );

        if ($Vpbrymo1kvdk instanceof PHP_CodeCoverage_Report_Node_Directory) {
            $Vd3322ljwbqh .= '        <li>(<a href="dashboard.html">Dashboard</a>)</li>' . "\n";
        }

        return $Vd3322ljwbqh;
    }

    protected function getInactiveBreadcrumb(PHP_CodeCoverage_Report_Node $Vpbrymo1kvdk, $V2bpoh5hagzpToRoot)
    {
        return sprintf(
            '        <li><a href="%sindex.html">%s</a></li>' . "\n",
            $V2bpoh5hagzpToRoot,
            $Vpbrymo1kvdk->getName()
        );
    }

    protected function getPathToRoot(PHP_CodeCoverage_Report_Node $Vpbrymo1kvdk)
    {
        $Vxja1abp34yqd    = $Vpbrymo1kvdk->getId();
        $Vbtxvotv0jpn = substr_count($Vxja1abp34yqd, '/');

        if ($Vxja1abp34yqd != 'index' &&
            $Vpbrymo1kvdk instanceof PHP_CodeCoverage_Report_Node_Directory) {
            $Vbtxvotv0jpn++;
        }

        return str_repeat('../', $Vbtxvotv0jpn);
    }

    protected function getCoverageBar($V40kyls3eakg)
    {
        $Vg54ngp40axi = $this->getColorLevel($V40kyls3eakg);

        $Vlqygqxkgo25 = new Text_Template(
            $this->templatePath . 'coverage_bar.html',
            '{{',
            '}}'
        );

        $Vlqygqxkgo25->setVar(array('level' => $Vg54ngp40axi, 'percent' => sprintf('%.2F', $V40kyls3eakg)));

        return $Vlqygqxkgo25->render();
    }

    
    protected function getColorLevel($V40kyls3eakg)
    {
        if ($V40kyls3eakg <= $this->lowUpperBound) {
            return 'danger';
        } elseif ($V40kyls3eakg > $this->lowUpperBound &&
            $V40kyls3eakg <  $this->highLowerBound) {
            return 'warning';
        } else {
            return 'success';
        }
    }
}
