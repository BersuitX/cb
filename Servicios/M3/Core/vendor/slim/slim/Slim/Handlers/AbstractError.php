<?php

namespace Slim\Handlers;


abstract class AbstractError extends AbstractHandler
{
    
    protected $Vew2nw3wf0a0;

    
    public function __construct($Vew2nw3wf0a0 = false)
    {
        $this->displayErrorDetails = (bool) $Vew2nw3wf0a0;
    }

    
    protected function writeToErrorLog($V0rt1zzfeske)
    {
        if ($this->displayErrorDetails) {
            return;
        }

        $Vbl4yrmdan1y = 'Slim Application Error:' . PHP_EOL;
        $Vbl4yrmdan1y .= $this->renderThrowableAsText($V0rt1zzfeske);
        while ($V0rt1zzfeske = $V0rt1zzfeske->getPrevious()) {
            $Vbl4yrmdan1y .= PHP_EOL . 'Previous error:' . PHP_EOL;
            $Vbl4yrmdan1y .= $this->renderThrowableAsText($V0rt1zzfeske);
        }

        $Vbl4yrmdan1y .= PHP_EOL . 'View in rendered output by enabling the "displayErrorDetails" setting.' . PHP_EOL;

        $this->logError($Vbl4yrmdan1y);
    }

    
    protected function renderThrowableAsText($V0rt1zzfeske)
    {
        $Vlakcyq2pqgp = sprintf('Type: %s' . PHP_EOL, get_class($V0rt1zzfeske));

        if ($V5kll1klco0v = $V0rt1zzfeske->getCode()) {
            $Vlakcyq2pqgp .= sprintf('Code: %s' . PHP_EOL, $V5kll1klco0v);
        }

        if ($Vbl4yrmdan1y = $V0rt1zzfeske->getMessage()) {
            $Vlakcyq2pqgp .= sprintf('Message: %s' . PHP_EOL, htmlentities($Vbl4yrmdan1y));
        }

        if ($Vpu3xl4uhgg5 = $V0rt1zzfeske->getFile()) {
            $Vlakcyq2pqgp .= sprintf('File: %s' . PHP_EOL, $Vpu3xl4uhgg5);
        }

        if ($Vrwsmtja4f2j = $V0rt1zzfeske->getLine()) {
            $Vlakcyq2pqgp .= sprintf('Line: %s' . PHP_EOL, $Vrwsmtja4f2j);
        }

        if ($V1babchxe11h = $V0rt1zzfeske->getTraceAsString()) {
            $Vlakcyq2pqgp .= sprintf('Trace: %s', $V1babchxe11h);
        }

        return $Vlakcyq2pqgp;
    }

    
    protected function logError($Vbl4yrmdan1y)
    {
        error_log($Vbl4yrmdan1y);
    }
}
