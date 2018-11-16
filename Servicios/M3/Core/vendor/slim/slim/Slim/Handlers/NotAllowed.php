<?php

namespace Slim\Handlers;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Body;
use UnexpectedValueException;


class NotAllowed extends AbstractHandler
{
    
    public function __invoke(ServerRequestInterface $Vyvmmv0t5uw2, ResponseInterface $Vvcjkdrakwx3, array $V0yfl5ulns0o)
    {
        if ($Vyvmmv0t5uw2->getMethod() === 'OPTIONS') {
            $Vmtvkqxvklrv = 200;
            $Vu0gcqqdlst1 = 'text/plain';
            $Vvaiuwffullu = $this->renderPlainOptionsMessage($V0yfl5ulns0o);
        } else {
            $Vmtvkqxvklrv = 405;
            $Vu0gcqqdlst1 = $this->determineContentType($Vyvmmv0t5uw2);
            switch ($Vu0gcqqdlst1) {
                case 'application/json':
                    $Vvaiuwffullu = $this->renderJsonNotAllowedMessage($V0yfl5ulns0o);
                    break;

                case 'text/xml':
                case 'application/xml':
                    $Vvaiuwffullu = $this->renderXmlNotAllowedMessage($V0yfl5ulns0o);
                    break;

                case 'text/html':
                    $Vvaiuwffullu = $this->renderHtmlNotAllowedMessage($V0yfl5ulns0o);
                    break;
                default:
                    throw new UnexpectedValueException('Cannot render unknown content type ' . $Vu0gcqqdlst1);
            }
        }

        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $V5brf34vsiqi->write($Vvaiuwffullu);
        $Vric5szfmag0 = implode(', ', $V0yfl5ulns0o);

        return $Vvcjkdrakwx3
                ->withStatus($Vmtvkqxvklrv)
                ->withHeader('Content-type', $Vu0gcqqdlst1)
                ->withHeader('Allow', $Vric5szfmag0)
                ->withBody($V5brf34vsiqi);
    }

    
    protected function renderPlainOptionsMessage($V0yfl5ulns0o)
    {
        $Vric5szfmag0 = implode(', ', $V0yfl5ulns0o);

        return 'Allowed methods: ' . $Vric5szfmag0;
    }

    
    protected function renderJsonNotAllowedMessage($V0yfl5ulns0o)
    {
        $Vric5szfmag0 = implode(', ', $V0yfl5ulns0o);

        return '{"message":"Method not allowed. Must be one of: ' . $Vric5szfmag0 . '"}';
    }

    
    protected function renderXmlNotAllowedMessage($V0yfl5ulns0o)
    {
        $Vric5szfmag0 = implode(', ', $V0yfl5ulns0o);

        return "<root><message>Method not allowed. Must be one of: $Vric5szfmag0</message></root>";
    }

    
    protected function renderHtmlNotAllowedMessage($V0yfl5ulns0o)
    {
        $Vric5szfmag0 = implode(', ', $V0yfl5ulns0o);
        $Vvaiuwffullu = <<<END
<html>
    <head>
        <title>Method not allowed</title>
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
        </style>
    </head>
    <body>
        <h1>Method not allowed</h1>
        <p>Method not allowed. Must be one of: <strong>$Vric5szfmag0</strong></p>
    </body>
</html>
END;

        return $Vvaiuwffullu;
    }
}
