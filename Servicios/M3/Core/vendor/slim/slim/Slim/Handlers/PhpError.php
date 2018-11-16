<?php

namespace Slim\Handlers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Body;
use UnexpectedValueException;


class PhpError extends AbstractError
{
    
    public function __invoke(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3, \Throwable $Vpsm42ro4mkq)
    {
        $Vu0gcqqdlst1 = $this->determineContentType($Vyvmmv0t5uw2);
        switch ($Vu0gcqqdlst1) {
            case 'application/json':
                $Vvaiuwffullu = $this->renderJsonErrorMessage($Vpsm42ro4mkq);
                break;

            case 'text/xml':
            case 'application/xml':
                $Vvaiuwffullu = $this->renderXmlErrorMessage($Vpsm42ro4mkq);
                break;

            case 'text/html':
                $Vvaiuwffullu = $this->renderHtmlErrorMessage($Vpsm42ro4mkq);
                break;
            default:
                throw new UnexpectedValueException('Cannot render unknown content type ' . $Vu0gcqqdlst1);
        }

        $this->writeToErrorLog($Vpsm42ro4mkq);

        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $V5brf34vsiqi->write($Vvaiuwffullu);

        return $Vvcjkdrakwx3
                ->withStatus(500)
                ->withHeader('Content-type', $Vu0gcqqdlst1)
                ->withBody($V5brf34vsiqi);
    }

    
    protected function renderHtmlErrorMessage(\Throwable $Vpsm42ro4mkq)
    {
        $V3eablqu0h51 = 'Slim Application Error';

        if ($this->displayErrorDetails) {
            $Vw0wzciz3vwe = '<p>The application could not run because of the following error:</p>';
            $Vw0wzciz3vwe .= '<h2>Details</h2>';
            $Vw0wzciz3vwe .= $this->renderHtmlError($Vpsm42ro4mkq);

            while ($Vpsm42ro4mkq = $Vpsm42ro4mkq->getPrevious()) {
                $Vw0wzciz3vwe .= '<h2>Previous error</h2>';
                $Vw0wzciz3vwe .= $this->renderHtmlError($Vpsm42ro4mkq);
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

    
    protected function renderHtmlError(\Throwable $Vpsm42ro4mkq)
    {
        $Vw0wzciz3vwe = sprintf('<div><strong>Type:</strong> %s</div>', get_class($Vpsm42ro4mkq));

        if (($V5kll1klco0v = $Vpsm42ro4mkq->getCode())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>Code:</strong> %s</div>', $V5kll1klco0v);
        }

        if (($Vbl4yrmdan1y = $Vpsm42ro4mkq->getMessage())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>Message:</strong> %s</div>', htmlentities($Vbl4yrmdan1y));
        }

        if (($Vpu3xl4uhgg5 = $Vpsm42ro4mkq->getFile())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>File:</strong> %s</div>', $Vpu3xl4uhgg5);
        }

        if (($Vrwsmtja4f2j = $Vpsm42ro4mkq->getLine())) {
            $Vw0wzciz3vwe .= sprintf('<div><strong>Line:</strong> %s</div>', $Vrwsmtja4f2j);
        }

        if (($V1babchxe11h = $Vpsm42ro4mkq->getTraceAsString())) {
            $Vw0wzciz3vwe .= '<h2>Trace</h2>';
            $Vw0wzciz3vwe .= sprintf('<pre>%s</pre>', htmlentities($V1babchxe11h));
        }

        return $Vw0wzciz3vwe;
    }

    
    protected function renderJsonErrorMessage(\Throwable $Vpsm42ro4mkq)
    {
        $Vvkwvjdx1mcb = [
            'message' => 'Slim Application Error',
        ];

        if ($this->displayErrorDetails) {
            $Vvkwvjdx1mcb['error'] = [];

            do {
                $Vvkwvjdx1mcb['error'][] = [
                    'type' => get_class($Vpsm42ro4mkq),
                    'code' => $Vpsm42ro4mkq->getCode(),
                    'message' => $Vpsm42ro4mkq->getMessage(),
                    'file' => $Vpsm42ro4mkq->getFile(),
                    'line' => $Vpsm42ro4mkq->getLine(),
                    'trace' => explode("\n", $Vpsm42ro4mkq->getTraceAsString()),
                ];
            } while ($Vpsm42ro4mkq = $Vpsm42ro4mkq->getPrevious());
        }

        return json_encode($Vvkwvjdx1mcb, JSON_PRETTY_PRINT);
    }

    
    protected function renderXmlErrorMessage(\Throwable $Vpsm42ro4mkq)
    {
        $V0ytcao1avzu = "<error>\n  <message>Slim Application Error</message>\n";
        if ($this->displayErrorDetails) {
            do {
                $V0ytcao1avzu .= "  <error>\n";
                $V0ytcao1avzu .= "    <type>" . get_class($Vpsm42ro4mkq) . "</type>\n";
                $V0ytcao1avzu .= "    <code>" . $Vpsm42ro4mkq->getCode() . "</code>\n";
                $V0ytcao1avzu .= "    <message>" . $this->createCdataSection($Vpsm42ro4mkq->getMessage()) . "</message>\n";
                $V0ytcao1avzu .= "    <file>" . $Vpsm42ro4mkq->getFile() . "</file>\n";
                $V0ytcao1avzu .= "    <line>" . $Vpsm42ro4mkq->getLine() . "</line>\n";
                $V0ytcao1avzu .= "    <trace>" . $this->createCdataSection($Vpsm42ro4mkq->getTraceAsString()) . "</trace>\n";
                $V0ytcao1avzu .= "  </error>\n";
            } while ($Vpsm42ro4mkq = $Vpsm42ro4mkq->getPrevious());
        }
        $V0ytcao1avzu .= "</error>";

        return $V0ytcao1avzu;
    }

    
    private function createCdataSection($Vjdkyvjsoqdn)
    {
        return sprintf('<![CDATA[%s]]>', str_replace(']]>', ']]]]><![CDATA[>', $Vjdkyvjsoqdn));
    }
}
