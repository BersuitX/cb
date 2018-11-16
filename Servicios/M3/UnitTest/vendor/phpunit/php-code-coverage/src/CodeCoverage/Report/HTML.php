<?php



class PHP_CodeCoverage_Report_HTML
{
    
    private $V403quq1uv0k;

    
    private $Vi5uqhlkbfzi;

    
    private $Vyc5yn3k1k30;

    
    private $Vodoqtdf4fw1;

    
    public function __construct($Vyc5yn3k1k30 = 50, $Vodoqtdf4fw1 = 90, $Vi5uqhlkbfzi = '')
    {
        $this->generator      = $Vi5uqhlkbfzi;
        $this->highLowerBound = $Vodoqtdf4fw1;
        $this->lowUpperBound  = $Vyc5yn3k1k30;

        $this->templatePath = sprintf(
            '%s%sHTML%sRenderer%sTemplate%s',
            dirname(__FILE__),
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR,
            DIRECTORY_SEPARATOR
        );
    }

    
    public function process(PHP_CodeCoverage $Vbt1bqdir3su, $Vec3c2fwpbib)
    {
        $Vec3c2fwpbib = $this->getDirectory($Vec3c2fwpbib);
        $Vem32crslzoa = $Vbt1bqdir3su->getReport();
        unset($Vbt1bqdir3su);

        if (!isset($_SERVER['REQUEST_TIME'])) {
            $_SERVER['REQUEST_TIME'] = time();
        }

        $V44ektrjtftz = date('D M j G:i:s T Y', $_SERVER['REQUEST_TIME']);

        $Vrciadyrugyw = new PHP_CodeCoverage_Report_HTML_Renderer_Dashboard(
            $this->templatePath,
            $this->generator,
            $V44ektrjtftz,
            $this->lowUpperBound,
            $this->highLowerBound
        );

        $Vghfube41qyl = new PHP_CodeCoverage_Report_HTML_Renderer_Directory(
            $this->templatePath,
            $this->generator,
            $V44ektrjtftz,
            $this->lowUpperBound,
            $this->highLowerBound
        );

        $Vpu3xl4uhgg5 = new PHP_CodeCoverage_Report_HTML_Renderer_File(
            $this->templatePath,
            $this->generator,
            $V44ektrjtftz,
            $this->lowUpperBound,
            $this->highLowerBound
        );

        $Vghfube41qyl->render($Vem32crslzoa, $Vec3c2fwpbib . 'index.html');
        $Vrciadyrugyw->render($Vem32crslzoa, $Vec3c2fwpbib . 'dashboard.html');

        foreach ($Vem32crslzoa as $Vpbrymo1kvdk) {
            $V4mdxaz2cfcr = $Vpbrymo1kvdk->getId();

            if ($Vpbrymo1kvdk instanceof PHP_CodeCoverage_Report_Node_Directory) {
                if (!file_exists($Vec3c2fwpbib . $V4mdxaz2cfcr)) {
                    mkdir($Vec3c2fwpbib . $V4mdxaz2cfcr, 0777, true);
                }

                $Vghfube41qyl->render($Vpbrymo1kvdk, $Vec3c2fwpbib . $V4mdxaz2cfcr . '/index.html');
                $Vrciadyrugyw->render($Vpbrymo1kvdk, $Vec3c2fwpbib . $V4mdxaz2cfcr . '/dashboard.html');
            } else {
                $Vb3iift025ov = dirname($Vec3c2fwpbib . $V4mdxaz2cfcr);

                if (!file_exists($Vb3iift025ov)) {
                    mkdir($Vb3iift025ov, 0777, true);
                }

                $Vpu3xl4uhgg5->render($Vpbrymo1kvdk, $Vec3c2fwpbib . $V4mdxaz2cfcr . '.html');
            }
        }

        $this->copyFiles($Vec3c2fwpbib);
    }

    
    private function copyFiles($Vec3c2fwpbib)
    {
        $Vb3iift025ov = $this->getDirectory($Vec3c2fwpbib . 'css');
        copy($this->templatePath . 'css/bootstrap.min.css', $Vb3iift025ov . 'bootstrap.min.css');
        copy($this->templatePath . 'css/nv.d3.min.css', $Vb3iift025ov . 'nv.d3.min.css');
        copy($this->templatePath . 'css/style.css', $Vb3iift025ov . 'style.css');

        $Vb3iift025ov = $this->getDirectory($Vec3c2fwpbib . 'fonts');
        copy($this->templatePath . 'fonts/glyphicons-halflings-regular.eot', $Vb3iift025ov . 'glyphicons-halflings-regular.eot');
        copy($this->templatePath . 'fonts/glyphicons-halflings-regular.svg', $Vb3iift025ov . 'glyphicons-halflings-regular.svg');
        copy($this->templatePath . 'fonts/glyphicons-halflings-regular.ttf', $Vb3iift025ov . 'glyphicons-halflings-regular.ttf');
        copy($this->templatePath . 'fonts/glyphicons-halflings-regular.woff', $Vb3iift025ov . 'glyphicons-halflings-regular.woff');
        copy($this->templatePath . 'fonts/glyphicons-halflings-regular.woff2', $Vb3iift025ov . 'glyphicons-halflings-regular.woff2');

        $Vb3iift025ov = $this->getDirectory($Vec3c2fwpbib . 'js');
        copy($this->templatePath . 'js/bootstrap.min.js', $Vb3iift025ov . 'bootstrap.min.js');
        copy($this->templatePath . 'js/d3.min.js', $Vb3iift025ov . 'd3.min.js');
        copy($this->templatePath . 'js/holder.min.js', $Vb3iift025ov . 'holder.min.js');
        copy($this->templatePath . 'js/html5shiv.min.js', $Vb3iift025ov . 'html5shiv.min.js');
        copy($this->templatePath . 'js/jquery.min.js', $Vb3iift025ov . 'jquery.min.js');
        copy($this->templatePath . 'js/nv.d3.min.js', $Vb3iift025ov . 'nv.d3.min.js');
        copy($this->templatePath . 'js/respond.min.js', $Vb3iift025ov . 'respond.min.js');
    }

    
    private function getDirectory($Vghfube41qyl)
    {
        if (substr($Vghfube41qyl, -1, 1) != DIRECTORY_SEPARATOR) {
            $Vghfube41qyl .= DIRECTORY_SEPARATOR;
        }

        if (is_dir($Vghfube41qyl)) {
            return $Vghfube41qyl;
        }

        if (@mkdir($Vghfube41qyl, 0777, true)) {
            return $Vghfube41qyl;
        }

        throw new PHP_CodeCoverage_Exception(
            sprintf(
                'Directory "%s" does not exist.',
                $Vghfube41qyl
            )
        );
    }
}
