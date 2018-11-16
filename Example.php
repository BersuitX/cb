<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Tag;


final class Example extends BaseTag
{
    
    private $V4xniuhxoyvj = '';

    
    private $Vftx05xf2u5e = false;

    
    public function getContent()
    {
        if (null === $this->description) {
            $V4xniuhxoyvj = '"' . $this->filePath . '"';
            if ($this->isURI) {
                $V4xniuhxoyvj = $this->isUriRelative($this->filePath)
                    ? str_replace('%2F', '/', rawurlencode($this->filePath))
                    :$this->filePath;
            }

            $this->description = $V4xniuhxoyvj . ' ' . parent::getContent();
        }

        return $this->description;
    }

    
    public static function create($V5brf34vsiqi)
    {
        
        if (! preg_match('/^(?:\"([^\"]+)\"|(\S+))(?:\s+(.*))?$/sux', $V5brf34vsiqi, $Virbphhh55ue)) {
            return null;
        }

        $V4xniuhxoyvj = null;
        $Vbqeqiwk32jj  = null;
        if ('' !== $Virbphhh55ue[1]) {
            $V4xniuhxoyvj = $Virbphhh55ue[1];
        } else {
            $Vbqeqiwk32jj = $Virbphhh55ue[2];
        }

        $Vdnkuvqgrzur = 1;
        $V5ch20ovzidr    = null;
        $Vg24o3v4hbzv  = null;

        
        if (preg_match('/^([1-9]\d*)\s*(?:((?1))\s+)?(.*)$/sux', $Virbphhh55ue[3], $Virbphhh55ue)) {
            $Vdnkuvqgrzur = (int)$Virbphhh55ue[1];
            if (isset($Virbphhh55ue[2]) && $Virbphhh55ue[2] !== '') {
                $V5ch20ovzidr = (int)$Virbphhh55ue[2];
            }
            $Vg24o3v4hbzv = $Virbphhh55ue[3];
        }

        return new static($V4xniuhxoyvj, $Vbqeqiwk32jj, $Vdnkuvqgrzur, $V5ch20ovzidr, $Vg24o3v4hbzv);
    }

    
    public function getFilePath()
    {
        return $this->filePath;
    }

    
    public function setFilePath($V4xniuhxoyvj)
    {
        $this->isURI = false;
        $this->filePath = trim($V4xniuhxoyvj);

        $this->description = null;
        return $this;
    }

    
    public function setFileURI($Vbraexi5phsi)
    {
        $this->isURI   = true;
        $this->description = null;

        $this->filePath = $this->isUriRelative($Vbraexi5phsi)
            ? rawurldecode(str_replace(array('/', '\\'), '%2F', $Vbraexi5phsi))
            : $this->filePath = $Vbraexi5phsi;

        return $this;
    }

    
    public function __toString()
    {
        return $this->filePath . ($this->description ? ' ' . $this->description->render() : '');
    }

    
    private function isUriRelative($Vbraexi5phsi)
    {
        return false === strpos($Vbraexi5phsi, ':');
    }
}
