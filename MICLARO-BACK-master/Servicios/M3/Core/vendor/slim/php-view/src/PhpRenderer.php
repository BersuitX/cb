<?php

namespace Slim\Views;

use \InvalidArgumentException;
use Psr\Http\Message\ResponseInterface;


class PhpRenderer
{
    
    protected $V403quq1uv0k;

    
    protected $Vfwhzdv2bggu;

    
    public function __construct($V403quq1uv0k = "", $Vfwhzdv2bggu = [])
    {
        $this->templatePath = rtrim($V403quq1uv0k, '/\\') . '/';
        $this->attributes = $Vfwhzdv2bggu;
    }

    
    public function render(ResponseInterface $Vvcjkdrakwx3, $Vlqygqxkgo25, array $Vqhzkfsafzrc = [])
    {
        $Vvaiuwffullu = $this->fetch($Vlqygqxkgo25, $Vqhzkfsafzrc);

        $Vvcjkdrakwx3->getBody()->write($Vvaiuwffullu);

        return $Vvcjkdrakwx3;
    }

    
    public function getAttributes()
    {
        return $this->attributes;
    }

    
    public function setAttributes(array $Vfwhzdv2bggu)
    {
        $this->attributes = $Vfwhzdv2bggu;
    }

    
    public function addAttribute($Vlpbz5aloxqt, $Vcptarsq5qe4) {
        $this->attributes[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
    }

    
    public function getAttribute($Vlpbz5aloxqt) {
        if (!isset($this->attributes[$Vlpbz5aloxqt])) {
            return false;
        }

        return $this->attributes[$Vlpbz5aloxqt];
    }

    
    public function getTemplatePath()
    {
        return $this->templatePath;
    }

    
    public function setTemplatePath($V403quq1uv0k)
    {
        $this->templatePath = rtrim($V403quq1uv0k, '/\\') . '/';
    }

    
    public function fetch($Vlqygqxkgo25, array $Vqhzkfsafzrc = []) {
        if (isset($Vqhzkfsafzrc['template'])) {
            throw new \InvalidArgumentException("Duplicate template key found");
        }

        if (!is_file($this->templatePath . $Vlqygqxkgo25)) {
            throw new \RuntimeException("View cannot render `$Vlqygqxkgo25` because the template does not exist");
        }


        
        $Vqhzkfsafzrc = array_merge($this->attributes, $Vqhzkfsafzrc);

        try {
            ob_start();
            $this->protectedIncludeScope($this->templatePath . $Vlqygqxkgo25, $Vqhzkfsafzrc);
            $Vvaiuwffullu = ob_get_clean();
        } catch(\Throwable $Vpt32vvhspnv) { 
            ob_end_clean();
            throw $Vpt32vvhspnv;
        } catch(\Exception $Vpt32vvhspnv) { 
            ob_end_clean();
            throw $Vpt32vvhspnv;
        }

        return $Vvaiuwffullu;
    }

    
    protected function protectedIncludeScope ($Vlqygqxkgo25, array $Vqhzkfsafzrc) {
        extract($Vqhzkfsafzrc);
        include $Vlqygqxkgo25;
    }
}
