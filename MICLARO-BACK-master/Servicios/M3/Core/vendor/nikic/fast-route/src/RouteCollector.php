<?php

namespace FastRoute;

class RouteCollector
{
    
    protected $V2bqntybzuup;

    
    protected $V11fppmts4vy;

    
    protected $Vosjj0j43lqu;

    
    public function __construct(RouteParser $V2bqntybzuup, DataGenerator $V11fppmts4vy)
    {
        $this->routeParser = $V2bqntybzuup;
        $this->dataGenerator = $V11fppmts4vy;
        $this->currentGroupPrefix = '';
    }

    
    public function addRoute($V5ea5ghz5clu, $Vkihybm3bccb, $Voc34ggbfvw5)
    {
        $Vkihybm3bccb = $this->currentGroupPrefix . $Vkihybm3bccb;
        $Vkihybm3bccbDatas = $this->routeParser->parse($Vkihybm3bccb);
        foreach ((array) $V5ea5ghz5clu as $Vtlfvdwskdge) {
            foreach ($Vkihybm3bccbDatas as $Vkihybm3bccbData) {
                $this->dataGenerator->addRoute($Vtlfvdwskdge, $Vkihybm3bccbData, $Voc34ggbfvw5);
            }
        }
    }

    
    public function addGroup($V2hf2uebv5m0, callable $Vbbxwjhhenxj)
    {
        $Vfovxhrlnkao = $this->currentGroupPrefix;
        $this->currentGroupPrefix = $Vfovxhrlnkao . $V2hf2uebv5m0;
        $Vbbxwjhhenxj($this);
        $this->currentGroupPrefix = $Vfovxhrlnkao;
    }

    
    public function get($Vkihybm3bccb, $Voc34ggbfvw5)
    {
        $this->addRoute('GET', $Vkihybm3bccb, $Voc34ggbfvw5);
    }

    
    public function post($Vkihybm3bccb, $Voc34ggbfvw5)
    {
        $this->addRoute('POST', $Vkihybm3bccb, $Voc34ggbfvw5);
    }

    
    public function put($Vkihybm3bccb, $Voc34ggbfvw5)
    {
        $this->addRoute('PUT', $Vkihybm3bccb, $Voc34ggbfvw5);
    }

    
    public function delete($Vkihybm3bccb, $Voc34ggbfvw5)
    {
        $this->addRoute('DELETE', $Vkihybm3bccb, $Voc34ggbfvw5);
    }

    
    public function patch($Vkihybm3bccb, $Voc34ggbfvw5)
    {
        $this->addRoute('PATCH', $Vkihybm3bccb, $Voc34ggbfvw5);
    }

    
    public function head($Vkihybm3bccb, $Voc34ggbfvw5)
    {
        $this->addRoute('HEAD', $Vkihybm3bccb, $Voc34ggbfvw5);
    }

    
    public function getData()
    {
        return $this->dataGenerator->getData();
    }
}
