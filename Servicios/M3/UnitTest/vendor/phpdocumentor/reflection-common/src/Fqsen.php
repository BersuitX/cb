<?php


namespace phpDocumentor\Reflection;


final class Fqsen
{
    
    private $Vdipqmegdb34;

    
    private $Vgpjmw221p0b;

    
    public function __construct($Vdipqmegdb34)
    {
        $Virbphhh55ue = array();
        $Vv0hyvhlkjqr = preg_match(
            '/^\\\\([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff\\\\]*)?(?:[:]{2}\\$?([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*))?(?:\\(\\))?$/',
                $Vdipqmegdb34,
                $Virbphhh55ue
        );

        if ($Vv0hyvhlkjqr === 0) {
            throw new \InvalidArgumentException(
                sprintf('"%s" is not a valid Fqsen.', $Vdipqmegdb34)
            );
        }

        $this->fqsen = $Vdipqmegdb34;

        if (isset($Virbphhh55ue[2])) {
            $this->name = $Virbphhh55ue[2];
        } else {
            $Virbphhh55ue = explode('\\', $Vdipqmegdb34);
            $this->name = trim(end($Virbphhh55ue), '()');
        }
    }

    
    public function __toString()
    {
        return $this->fqsen;
    }

    
    public function getName()
    {
        return $this->name;
    }
}
