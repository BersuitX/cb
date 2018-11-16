<?php


namespace phpDocumentor\Reflection;

use phpDocumentor\Reflection\DocBlock\Tags\Example;


class ExampleFinder
{
    
    private $Vpndnaql0snz = '';

    
    private $Vmjwzbnproid = array();

    
    public function find(Example $Vqbt55but2ei)
    {
        $Va3qqb0vgkhy = $Vqbt55but2ei->getFilePath();

        $Vpu3xl4uhgg5 = $this->getExampleFileContents($Va3qqb0vgkhy);
        if (!$Vpu3xl4uhgg5) {
            return "** File not found : {$Va3qqb0vgkhy} **";
        }

        return implode('', array_slice($Vpu3xl4uhgg5, $Vqbt55but2ei->getStartingLine() - 1, $Vqbt55but2ei->getLineCount()));
    }

    
    public function setSourceDirectory($Vghfube41qyl = '')
    {
        $this->sourceDirectory = $Vghfube41qyl;
    }

    
    public function getSourceDirectory()
    {
        return $this->sourceDirectory;
    }

    
    public function setExampleDirectories(array $Vyzstc3ohmps)
    {
        $this->exampleDirectories = $Vyzstc3ohmps;
    }

    
    public function getExampleDirectories()
    {
        return $this->exampleDirectories;
    }

    
    private function getExampleFileContents($Va3qqb0vgkhy)
    {
        $Vmgkqtzbypww = null;

        foreach ($this->exampleDirectories as $Vghfube41qyl) {
            $Vqbt55but2eiFileFromConfig = $this->constructExamplePath($Vghfube41qyl, $Va3qqb0vgkhy);
            if (is_readable($Vqbt55but2eiFileFromConfig)) {
                $Vmgkqtzbypww = $Vqbt55but2eiFileFromConfig;
                break;
            }
        }

        if (!$Vmgkqtzbypww) {
            if (is_readable($this->getExamplePathFromSource($Va3qqb0vgkhy))) {
                $Vmgkqtzbypww = $this->getExamplePathFromSource($Va3qqb0vgkhy);
            } elseif (is_readable($this->getExamplePathFromExampleDirectory($Va3qqb0vgkhy))) {
                $Vmgkqtzbypww = $this->getExamplePathFromExampleDirectory($Va3qqb0vgkhy);
            } elseif (is_readable($Va3qqb0vgkhy)) {
                $Vmgkqtzbypww = $Va3qqb0vgkhy;
            }
        }

        return $Vmgkqtzbypww && is_readable($Vmgkqtzbypww) ? file($Vmgkqtzbypww) : null;
    }

    
    private function getExamplePathFromExampleDirectory($Vpu3xl4uhgg5)
    {
        return getcwd() . DIRECTORY_SEPARATOR . 'examples' . DIRECTORY_SEPARATOR . $Vpu3xl4uhgg5;
    }

    
    private function constructExamplePath($Vghfube41qyl, $Vpu3xl4uhgg5)
    {
        return rtrim($Vghfube41qyl, '\\/') . DIRECTORY_SEPARATOR . $Vpu3xl4uhgg5;
    }

    
    private function getExamplePathFromSource($Vpu3xl4uhgg5)
    {
        return sprintf(
            '%s%s%s',
            trim($this->getSourceDirectory(), '\\/'),
            DIRECTORY_SEPARATOR,
            trim($Vpu3xl4uhgg5, '"')
        );
    }
}
