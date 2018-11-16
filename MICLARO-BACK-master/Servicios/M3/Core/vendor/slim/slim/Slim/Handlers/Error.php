<?php

namespace Slim\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Body;
use UnexpectedValueException;


class Error extends AbstractError
{
    
    public function __invoke(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3, \Exception $Vzzme31ixifp)
    {
        $Vu0gcqqdlst1 = $this->determineContentType($Vyvmmv0t5uw2);
        switch ($Vu0gcqqdlst1) {
            case 'application/json':
                $Vvaiuwffullu = $this->renderJsonErrorMessage($Vzzme31ixifp);
                break;

            case 'text/xml':
            case 'application/xml':
                $Vvaiuwffullu = $this->renderXmlErrorMessage($Vzzme31ixifp);
                break;

            case 'text/html':
                $Vvaiuwffullu = $this->renderHtmlErrorMessage($Vzzme31ixifp);
                break;

            default:
                throw new UnexpectedValueException('Cannot render unknown content type ' . $Vu0gcqqdlst1);
        }

        $this->writeToErrorLog($Vzzme31ixifp);

        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $V5brf34vsiqi->write($Vvaiuwffullu);

        return $Vvcjkdrakwx3
                ->withStatus(500)
                ->withHeader('Content-type', $Vu0gcqqdlst1)
                ->withBody($V5brf34vsiqi);
    }

    
    protected function renderHtmlErrorMessage(\Exception $Vzzme31ixifp)
    {
        $V3eablqu0h51 = 'Slim Application Error';

        if ($this->displayErrorDetails) {
            $Vw0wzciz3vwe = '<p>The application could not run because of the following error:</p>';
            $Vw0wzciz3vwe .= '<h2>Details</h2>';
            $Vw0wzciz3vwe .= $this->renderHtmlException($Vzzme31ixifp);

            while ($Vzzme31ixifp = $Vzzme31ixifp->getPrevious()) {
                $Vw0wzciz3vwe .= '<h2>Previous exception</h2>';
                $Vw0wzciz3vwe .= $this->renderHtmlExceptionOrError($Vzzme31ixifp);
            }
        } else {
            $Vw0wzciz3vwe = '<p>A website error has occurred. Sorry for the temporary inconvenience.</p>';
        }

        $Vvaiuwffullu = sprintf(
            "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>" .
            "<title>%s</title><style>body{margin:0;padding:30px;font:12px/1.5 Helvetica,Arial,Verdana," .
            "sans-serif;}h1{margin:0;font-size:48px;font-weight:normal;line-height:48px;}strong{" .
            "display:inline-block;width:65px;}</style></head><body><h1>%s</h1>%s</body></html>",
            $V3eablqu0h51,
            $V3eablqu0h51,
            $Vw0wzciz3vwe
        );

        return $Vvaiuwffullu;
    }

    
    protected function renderHtmlException(\Exception $Vzzme31ixifp)
    {
        return $this->renderHtmlExceptionOrError($Vzzme31ixifp);
    }

    
    protected function renderHtmlExceptionOrError($Vzzme31ixifp)
    {
        if (!$Vzzme31ixifp instanceof \Exception && !$Vzzme31ixifp instanceof \Error) {
            throw new \RuntimeException("Unexpected type. Expected Exception or Error.");
        }

        $Vw0wzciz3vwe = sprintf('<div><strong>Type:</strong> %s</div>', get_class($Vzzme31ixifp));

        if (($V5kll1klco0v = $Vzzme31ixifp->getCode())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>Code:</strong> %s</div>', $V5kll1klco0v);
        }

        if (($Vbl4yrmdan1y = $Vzzme31ixifp->getMessage())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>Message:</strong> %s</div>', htmlentities($Vbl4yrmdan1y));
        }

        if (($Vpu3xl4uhgg5 = $Vzzme31ixifp->getFile())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>File:</strong> %s</div>', $Vpu3xl4uhgg5);
        }

        if (($Vrwsmtja4f2j = $Vzzme31ixifp->getLine())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>Line:</strong> %s</div>', $Vrwsmtja4f2j);
        }

        if (($V1babchxe11h = $Vzzme31ixifp->getTraceAsString())) {
            $Vw0wzciz3vwe .= '<h2>Trace</h2>';
            $Vw0wzciz3vwe .= sprintf('<pre>%s</pre>', htmlentities($V1babchxe11h));
        }

        return $Vw0wzciz3vwe;
    }

    
    protected function renderJsonErrorMessage(\Exception $Vzzme31ixifp)
    {
        $Vpsm42ro4mkq = [
            'message' => 'Slim Application Error',
        ];

        if ($this->displayErrorDetails) {
            $Vpsm42ro4mkq['exception'] = [];

            do {
                $Vpsm42ro4mkq['exception'][] = [
                    'type' => get_class($Vzzme31ixifp),
                    'code' => $Vzzme31ixifp->getCode(),
                    'message' => $Vzzme31ixifp->getMessage(),
                    'file' => $Vzzme31ixifp->getFile(),
                    'line' => $Vzzme31ixifp->getLine(),
                    'trace' => explode("\n", $Vzzme31ixifp->getTraceAsString()),
                ];
            } while ($Vzzme31ixifp = $Vzzme31ixifp->getPrevious());
        }

        return json_encode($Vpsm42ro4mkq, JSON_PRETTY_PRINT);
    }

    
    protected function renderXmlErrorMessage(\Exception $Vzzme31ixifp)
    {
        $V0ytcao1avzu = "<error>\n  <message>Slim Application Error</message>\n";
        if ($this->displayErrorDetails) {
            do {
                $V0ytcao1avzu .= "  <exception>\n";
                $V0ytcao1avzu .= "    <type>" . get_class($Vzzme31ixifp) . "</type>\n";
                $V0ytcao1avzu .= "    <code>" . $Vzzme31ixifp->getCode() . "</code>\n";
                $V0ytcao1avzu .= "    <message>" . $this->createCdataSection($Vzzme31ixifp->getMessage()) . "</message>\n";
                $V0ytcao1avzu .= "    <file>" . $Vzzme31ixifp->getFile() . "</file>\n";
                $V0ytcao1avzu .= "    <line>" . $Vzzme31ixifp->getLine() . "</line>\n";
                $V0ytcao1avzu .= "    <trace>" . $this->createCdataSection($Vzzme31ixifp->getTraceAsString()) . "</trace>\n";
                $V0ytcao1avzu .= "  </exception>\n";
            } while ($Vzzme31ixifp = $Vzzme31ixifp->getPrevious());
        }
        $V0ytcao1avzu .= "</error>";

        return $V0ytcao1avzu;
    }

    
    private function createCdataSection($Vjdkyvjsoqdn)
    {
        return sprintf('<![CDATA[%s]]>', str_replace(']]>', ']]]]><![CDATA[>', $Vjdkyvjsoqdn));
    }
}
