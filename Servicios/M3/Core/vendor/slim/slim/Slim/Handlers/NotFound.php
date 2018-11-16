<?php

namespace Slim\Handlers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Body;
use UnexpectedValueException;


class NotFound extends AbstractHandler
{
    
    public function __invoke(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3)
    {
        if ($Vyvmmv0t5uw2->getMethod() === 'OPTIONS') {
            $Vu0gcqqdlst1 = 'text/plain';
            $Vvaiuwffullu = $this->renderPlainNotFoundOutput();
        } else {
            $Vu0gcqqdlst1 = $this->determineContentType($Vyvmmv0t5uw2);
            switch ($Vu0gcqqdlst1) {
                case 'application/json':
                    $Vvaiuwffullu = $this->renderJsonNotFoundOutput();
                    break;

                case 'text/xml':
                case 'application/xml':
                    $Vvaiuwffullu = $this->renderXmlNotFoundOutput();
                    break;

                case 'text/html':
                    $Vvaiuwffullu = $this->renderHtmlNotFoundOutput($Vyvmmv0t5uw2);
                    break;

                default:
                    throw new UnexpectedValueException('Cannot render unknown content type ' . $Vu0gcqqdlst1);
            }
        }

        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $V5brf34vsiqi->write($Vvaiuwffullu);

        return $Vvcjkdrakwx3->withStatus(404)
                        ->withHeader('Content-Type', $Vu0gcqqdlst1)
                        ->withBody($V5brf34vsiqi);
    }

    
    protected function renderPlainNotFoundOutput()
    {
        return 'Not found';
    }

    
    protected function renderJsonNotFoundOutput()
    {
        return '{"message":"Not found"}';
    }

    
    protected function renderXmlNotFoundOutput()
    {
        return '<root><message>Not found</message></root>';
    }

    
    protected function renderHtmlNotFoundOutput(ServerRequestInterface $Vyvmmv0t5uw2)
    {
        $V13cx1z4q0wg = (string)($Vyvmmv0t5uw2->getUri()->withPath('')->withQuery('')->withFragment(''));
        return <<<END
<html>
    <head>
        <title>Page Not Found</title>
        <style>
            body{
                margin:0;
                padding:30px;
                font:12px/1.5 Helvetica,Arial,Verdana,sans-serif;
            }
            h1{
                margin:0;
                font-size:48px;
                font-weight:normal;
                line-height:48px;
            }
            strong{
                display:inline-block;
                width:65px;
            }
        </style>
    </head>
    <body>
        <h1>Page Not Found</h1>
        <p>
            The page you are looking for could not be found. Check the address bar
            to ensure your URL is spelled correctly. If all else fails, you can
            visit our home page at the link below.
        </p>
        <a href='$V13cx1z4q0wg'>Visit the Home Page</a>
    </body>
</html>
END;
    }
}
