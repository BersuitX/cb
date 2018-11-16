<?php

namespace FastRoute\DataGenerator;

use FastRoute\BadRouteException;
use FastRoute\DataGenerator;
use FastRoute\Route;

abstract class RegexBasedAbstract implements DataGenerator
{
    
    protected $Vruutz04eii2 = [];

    
    protected $Vtlppik34jul = [];

    
    abstract protected function getApproxChunkSize();

    
    abstract protected function processChunk($Vyd5mz3mqz24);

    public function addRoute($V5ea5ghz5clu, $V4mfe2ojz2lb, $Voc34ggbfvw5)
    {
        if ($this->isStaticRoute($V4mfe2ojz2lb)) {
            $this->addStaticRoute($V5ea5ghz5clu, $V4mfe2ojz2lb, $Voc34ggbfvw5);
        } else {
            $this->addVariableRoute($V5ea5ghz5clu, $V4mfe2ojz2lb, $Voc34ggbfvw5);
        }
    }

    
    public function getData()
    {
        if (empty($this->methodToRegexToRoutesMap)) {
            return [$this->staticRoutes, []];
        }

        return [$this->staticRoutes, $this->generateVariableRouteData()];
    }

    
    private function generateVariableRouteData()
    {
        $Vqhzkfsafzrc = [];
        foreach ($this->methodToRegexToRoutesMap as $Vtlfvdwskdge => $Vyd5mz3mqz24) {
            $V21cuqotws0d = $this->computeChunkSize(count($Vyd5mz3mqz24));
            $Vhafyjzhwhdi = array_chunk($Vyd5mz3mqz24, $V21cuqotws0d, true);
            $Vqhzkfsafzrc[$Vtlfvdwskdge] = array_map([$this, 'processChunk'], $Vhafyjzhwhdi);
        }
        return $Vqhzkfsafzrc;
    }

    
    private function computeChunkSize($Vdbkece3gnp5)
    {
        $Vi5fzwecezur = max(1, round($Vdbkece3gnp5 / $this->getApproxChunkSize()));
        return (int) ceil($Vdbkece3gnp5 / $Vi5fzwecezur);
    }

    
    private function isStaticRoute($V4mfe2ojz2lb)
    {
        return count($V4mfe2ojz2lb) === 1 && is_string($V4mfe2ojz2lb[0]);
    }

    private function addStaticRoute($V5ea5ghz5clu, $V4mfe2ojz2lb, $Voc34ggbfvw5)
    {
        $Vfm53orlabch = $V4mfe2ojz2lb[0];

        if (isset($this->staticRoutes[$V5ea5ghz5clu][$Vfm53orlabch])) {
            throw new BadRouteException(sprintf(
                'Cannot register two routes matching "%s" for method "%s"',
                $Vfm53orlabch, $V5ea5ghz5clu
            ));
        }

        if (isset($this->methodToRegexToRoutesMap[$V5ea5ghz5clu])) {
            foreach ($this->methodToRegexToRoutesMap[$V5ea5ghz5clu] as $Vkihybm3bccb) {
                if ($Vkihybm3bccb->matches($Vfm53orlabch)) {
                    throw new BadRouteException(sprintf(
                        'Static route "%s" is shadowed by previously defined variable route "%s" for method "%s"',
                        $Vfm53orlabch, $Vkihybm3bccb->regex, $V5ea5ghz5clu
                    ));
                }
            }
        }

        $this->staticRoutes[$V5ea5ghz5clu][$Vfm53orlabch] = $Voc34ggbfvw5;
    }

    private function addVariableRoute($V5ea5ghz5clu, $V4mfe2ojz2lb, $Voc34ggbfvw5)
    {
        list($Vkkdxriwdugo, $Vjmsfzk0x0dh) = $this->buildRegexForRoute($V4mfe2ojz2lb);

        if (isset($this->methodToRegexToRoutesMap[$V5ea5ghz5clu][$Vkkdxriwdugo])) {
            throw new BadRouteException(sprintf(
                'Cannot register two routes matching "%s" for method "%s"',
                $Vkkdxriwdugo, $V5ea5ghz5clu
            ));
        }

        $this->methodToRegexToRoutesMap[$V5ea5ghz5clu][$Vkkdxriwdugo] = new Route(
            $V5ea5ghz5clu, $Voc34ggbfvw5, $Vkkdxriwdugo, $Vjmsfzk0x0dh
        );
    }

    
    private function buildRegexForRoute($V4mfe2ojz2lb)
    {
        $Vkkdxriwdugo = '';
        $Vjmsfzk0x0dh = [];
        foreach ($V4mfe2ojz2lb as $Vrohh3rksufh) {
            if (is_string($Vrohh3rksufh)) {
                $Vkkdxriwdugo .= preg_quote($Vrohh3rksufh, '~');
                continue;
            }

            list($Vlg2r5tyiaz1, $VkkdxriwdugoPart) = $Vrohh3rksufh;

            if (isset($Vjmsfzk0x0dh[$Vlg2r5tyiaz1])) {
                throw new BadRouteException(sprintf(
                    'Cannot use the same placeholder "%s" twice', $Vlg2r5tyiaz1
                ));
            }

            if ($this->regexHasCapturingGroups($VkkdxriwdugoPart)) {
                throw new BadRouteException(sprintf(
                    'Regex "%s" for parameter "%s" contains a capturing group',
                    $VkkdxriwdugoPart, $Vlg2r5tyiaz1
                ));
            }

            $Vjmsfzk0x0dh[$Vlg2r5tyiaz1] = $Vlg2r5tyiaz1;
            $Vkkdxriwdugo .= '(' . $VkkdxriwdugoPart . ')';
        }

        return [$Vkkdxriwdugo, $Vjmsfzk0x0dh];
    }

    
    private function regexHasCapturingGroups($Vkkdxriwdugo)
    {
        if (false === strpos($Vkkdxriwdugo, '(')) {
            
            return false;
        }

        
        return (bool) preg_match(
            '~
                (?:
                    \(\?\(
                  | \[ [^\]\\\\]* (?: \\\\ . [^\]\\\\]* )* \]
                  | \\\\ .
                ) (*SKIP)(*FAIL) |
                \(
                (?!
                    \? (?! <(?![!=]) | P< | \' )
                  | \*
                )
            ~x',
            $Vkkdxriwdugo
        );
    }
}
