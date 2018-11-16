<?php


namespace phpDocumentor\Reflection;

use phpDocumentor\Reflection\DocBlock\Tag;
use Webmozart\Assert\Assert;

final class DocBlock
{
    
    private $Vyojblqfce2p = '';

    
    private $Vg24o3v4hbzv = null;

    
    private $Vi1vla5oesiw = array();

    
    private $Vylnw34ljlp1 = null;

    
    private $Vh4ebtit0a3l = null;

    
    private $Vbxb31l1xo3u = false;

    
    private $Vrjgdurhuxs5 = false;

    
    public function __construct(
        $Vyojblqfce2p = '',
        DocBlock\Description $Vg24o3v4hbzv = null,
        array $Vi1vla5oesiw = [],
        Types\Context $Vylnw34ljlp1 = null,
        Location $Vh4ebtit0a3l = null,
        $Vbxb31l1xo3u = false,
        $Vrjgdurhuxs5 = false
    )
    {
        Assert::string($Vyojblqfce2p);
        Assert::boolean($Vbxb31l1xo3u);
        Assert::boolean($Vrjgdurhuxs5);
        Assert::allIsInstanceOf($Vi1vla5oesiw, Tag::class);

        $this->summary = $Vyojblqfce2p;
        $this->description = $Vg24o3v4hbzv ?: new DocBlock\Description('');
        foreach ($Vi1vla5oesiw as $Vl2ijnnhdtam) {
            $this->addTag($Vl2ijnnhdtam);
        }

        $this->context = $Vylnw34ljlp1;
        $this->location = $Vh4ebtit0a3l;

        $this->isTemplateEnd = $Vrjgdurhuxs5;
        $this->isTemplateStart = $Vbxb31l1xo3u;
    }

    
    public function getSummary()
    {
        return $this->summary;
    }

    
    public function getDescription()
    {
        return $this->description;
    }

    
    public function getContext()
    {
        return $this->context;
    }

    
    public function getLocation()
    {
        return $this->location;
    }

    
    public function isTemplateStart()
    {
        return $this->isTemplateStart;
    }

    
    public function isTemplateEnd()
    {
        return $this->isTemplateEnd;
    }

    
    public function getTags()
    {
        return $this->tags;
    }

    
    public function getTagsByName($Vgpjmw221p0b)
    {
        Assert::string($Vgpjmw221p0b);

        $Vv0hyvhlkjqr = array();

        
        foreach ($this->getTags() as $Vl2ijnnhdtam) {
            if ($Vl2ijnnhdtam->getName() != $Vgpjmw221p0b) {
                continue;
            }

            $Vv0hyvhlkjqr[] = $Vl2ijnnhdtam;
        }

        return $Vv0hyvhlkjqr;
    }

    
    public function hasTag($Vgpjmw221p0b)
    {
        Assert::string($Vgpjmw221p0b);

        
        foreach ($this->getTags() as $Vl2ijnnhdtam) {
            if ($Vl2ijnnhdtam->getName() == $Vgpjmw221p0b) {
                return true;
            }
        }

        return false;
    }

    
    private function addTag(Tag $Vl2ijnnhdtam)
    {
        $this->tags[] = $Vl2ijnnhdtam;
    }
}
