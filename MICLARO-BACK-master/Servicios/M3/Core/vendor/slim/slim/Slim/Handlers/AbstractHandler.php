<?php

namespace Slim\Handlers;

use Psr\Http\Message\ServerRequestInterface;


abstract class AbstractHandler
{
    
    protected $V0ltsxz0llkj = [
        'application/json',
        'application/xml',
        'text/xml',
        'text/html',
    ];

    
    protected function determineContentType(ServerRequestInterface $Vyvmmv0t5uw2)
    {
        $Vzguvbdkpnck = $Vyvmmv0t5uw2->getHeaderLine('Accept');
        $Vrk4ap3aujw4 = array_intersect(explode(',', $Vzguvbdkpnck), $this->knownContentTypes);

        if (count($Vrk4ap3aujw4)) {
            return current($Vrk4ap3aujw4);
        }

        
        if (preg_match('/\+(json|xml)/', $Vzguvbdkpnck, $Virbphhh55ue)) {
            $Vf30dhwqp0jq = 'application/' . $Virbphhh55ue[1];
            if (in_array($Vf30dhwqp0jq, $this->knownContentTypes)) {
                return $Vf30dhwqp0jq;
            }
        }

        return 'text/html';
    }
}
