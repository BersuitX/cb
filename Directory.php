<?php



class PHP_CodeCoverage_Report_HTML_Renderer_Directory extends PHP_CodeCoverage_Report_HTML_Renderer
{
    
    public function render(PHP_CodeCoverage_Report_Node_Directory $Vpbrymo1kvdk, $Vpu3xl4uhgg5)
    {
        $Vlqygqxkgo25 = new Text_Template($this->templatePath . 'directory.html', '{{', '}}');

        $this->setCommonTemplateVariables($Vlqygqxkgo25, $Vpbrymo1kvdk);

        $Vdgaj5zam5hd = $this->renderItem($Vpbrymo1kvdk, true);

        foreach ($Vpbrymo1kvdk->getDirectories() as $Virsew13xpli) {
            $Vdgaj5zam5hd .= $this->renderItem($Virsew13xpli);
        }

        foreach ($Vpbrymo1kvdk->getFiles() as $Virsew13xpli) {
            $Vdgaj5zam5hd .= $this->renderItem($Virsew13xpli);
        }

        $Vlqygqxkgo25->setVar(
            array(
                'id'    => $Vpbrymo1kvdk->getId(),
                'items' => $Vdgaj5zam5hd
            )
        );

        $Vlqygqxkgo25->renderTo($Vpu3xl4uhgg5);
    }

    
    protected function renderItem(PHP_CodeCoverage_Report_Node $Virsew13xpli, $Vw5ngdduuqqo = false)
    {
        $Vqhzkfsafzrc = array(
            'numClasses'                   => $Virsew13xpli->getNumClassesAndTraits(),
            'numTestedClasses'             => $Virsew13xpli->getNumTestedClassesAndTraits(),
            'numMethods'                   => $Virsew13xpli->getNumMethods(),
            'numTestedMethods'             => $Virsew13xpli->getNumTestedMethods(),
            'linesExecutedPercent'         => $Virsew13xpli->getLineExecutedPercent(false),
            'linesExecutedPercentAsString' => $Virsew13xpli->getLineExecutedPercent(),
            'numExecutedLines'             => $Virsew13xpli->getNumExecutedLines(),
            'numExecutableLines'           => $Virsew13xpli->getNumExecutableLines(),
            'testedMethodsPercent'         => $Virsew13xpli->getTestedMethodsPercent(false),
            'testedMethodsPercentAsString' => $Virsew13xpli->getTestedMethodsPercent(),
            'testedClassesPercent'         => $Virsew13xpli->getTestedClassesAndTraitsPercent(false),
            'testedClassesPercentAsString' => $Virsew13xpli->getTestedClassesAndTraitsPercent()
        );

        if ($Vw5ngdduuqqo) {
            $Vqhzkfsafzrc['name'] = 'Total';
        } else {
            if ($Virsew13xpli instanceof PHP_CodeCoverage_Report_Node_Directory) {
                $Vqhzkfsafzrc['name'] = sprintf(
                    '<a href="%s/index.html">%s</a>',
                    $Virsew13xpli->getName(),
                    $Virsew13xpli->getName()
                );

                $Vqhzkfsafzrc['icon'] = '<span class="glyphicon glyphicon-folder-open"></span> ';
            } else {
                $Vqhzkfsafzrc['name'] = sprintf(
                    '<a href="%s.html">%s</a>',
                    $Virsew13xpli->getName(),
                    $Virsew13xpli->getName()
                );

                $Vqhzkfsafzrc['icon'] = '<span class="glyphicon glyphicon-file"></span> ';
            }
        }

        return $this->renderItemTemplate(
            new Text_Template($this->templatePath . 'directory_item.html', '{{', '}}'),
            $Vqhzkfsafzrc
        );
    }
}
