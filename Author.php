<?php


namespace phpDocumentor\Reflection\DocBlock\Tags;

use Webmozart\Assert\Assert;


final class Author extends BaseTag implements Factory\StaticMethod
{
    
    protected $Vgpjmw221p0b = 'author';

    
    private $Vo024e4t3lp0 = '';

    
    private $Vscjxakz2mzx = '';

    
    public function __construct($Vo024e4t3lp0, $Vscjxakz2mzx)
    {
        Assert::string($Vo024e4t3lp0);
        Assert::string($Vscjxakz2mzx);
        if ($Vscjxakz2mzx && !filter_var($Vscjxakz2mzx, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('The author tag does not have a valid e-mail address');
        }

        $this->authorName  = $Vo024e4t3lp0;
        $this->authorEmail = $Vscjxakz2mzx;
    }

    
    public function getAuthorName()
    {
        return $this->authorName;
    }

    
    public function getEmail()
    {
        return $this->authorEmail;
    }

    
    public function __toString()
    {
        return $this->authorName . (strlen($this->authorEmail) ? ' <' . $this->authorEmail . '>' : '');
    }

    
    public static function create($V5brf34vsiqi)
    {
        Assert::string($V5brf34vsiqi);

        $Vewipdwdlgmq = preg_match('/^([^\<]*)(?:\<([^\>]*)\>)?$/u', $V5brf34vsiqi, $Virbphhh55ue);
        if (!$Vewipdwdlgmq) {
            return null;
        }

        $Vo024e4t3lp0 = trim($Virbphhh55ue[1]);
        $Vq3o2j0uq0if = isset($Virbphhh55ue[2]) ? trim($Virbphhh55ue[2]) : '';

        return new static($Vo024e4t3lp0, $Vq3o2j0uq0if);
    }
}
