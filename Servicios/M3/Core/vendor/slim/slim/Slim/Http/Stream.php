<?php

namespace Slim\Http;

use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use RuntimeException;


class Stream implements StreamInterface
{
    
    const FSTAT_MODE_S_IFIFO = 0010000;

    
    protected static $Vapscr4otgxw = [
        'readable' => ['r', 'r+', 'w+', 'a+', 'x+', 'c+'],
        'writable' => ['r+', 'w', 'w+', 'a', 'a+', 'x', 'x+', 'c', 'c+'],
    ];

    
    protected $V4mgjtqyeyio;

    
    protected $Vasuyddszirs;

    
    protected $Vucr2iogqwmi;

    
    protected $Vmoissjlxjye;

    
    protected $Vzytck3kzb1s;

    
    protected $V5mlu1ykrbu5;

    
    protected $Vt0nvynpbruc;

    
    public function __construct($V4mgjtqyeyio)
    {
        $this->attach($V4mgjtqyeyio);
    }

    
    public function getMetadata($Vlpbz5aloxqt = null)
    {
        $this->meta = stream_get_meta_data($this->stream);
        if (is_null($Vlpbz5aloxqt) === true) {
            return $this->meta;
        }

        return isset($this->meta[$Vlpbz5aloxqt]) ? $this->meta[$Vlpbz5aloxqt] : null;
    }

    
    protected function isAttached()
    {
        return is_resource($this->stream);
    }

    
    protected function attach($V24qbuhati0y)
    {
        if (is_resource($V24qbuhati0y) === false) {
            throw new InvalidArgumentException(__METHOD__ . ' argument must be a valid PHP resource');
        }

        if ($this->isAttached() === true) {
            $this->detach();
        }

        $this->stream = $V24qbuhati0y;
    }

    
    public function detach()
    {
        $V5wqsu2hvw4b = $this->stream;
        $this->stream = null;
        $this->meta = null;
        $this->readable = null;
        $this->writable = null;
        $this->seekable = null;
        $this->size = null;
        $this->isPipe = null;

        return $V5wqsu2hvw4b;
    }

    
    public function __toString()
    {
        if (!$this->isAttached()) {
            return '';
        }

        try {
            $this->rewind();
            return $this->getContents();
        } catch (RuntimeException $Vpt32vvhspnv) {
            return '';
        }
    }

    
    public function close()
    {
        if ($this->isAttached() === true) {
            if ($this->isPipe()) {
                pclose($this->stream);
            } else {
                fclose($this->stream);
            }
        }

        $this->detach();
    }

    
    public function getSize()
    {
        if (!$this->size && $this->isAttached() === true) {
            $Vyb3p3me1y3d = fstat($this->stream);
            $this->size = isset($Vyb3p3me1y3d['size']) && !$this->isPipe() ? $Vyb3p3me1y3d['size'] : null;
        }

        return $this->size;
    }

    
    public function tell()
    {
        if (!$this->isAttached() || ($Vuqcfsch4lw0 = ftell($this->stream)) === false || $this->isPipe()) {
            throw new RuntimeException('Could not get the position of the pointer in stream');
        }

        return $Vuqcfsch4lw0;
    }

    
    public function eof()
    {
        return $this->isAttached() ? feof($this->stream) : true;
    }

    
    public function isReadable()
    {
        if ($this->readable === null) {
            if ($this->isPipe()) {
                $this->readable = true;
            } else {
                $this->readable = false;
                if ($this->isAttached()) {
                    $Vasuyddszirs = $this->getMetadata();
                    foreach (self::$Vapscr4otgxw['readable'] as $V4ci5ldaqb4a) {
                        if (strpos($Vasuyddszirs['mode'], $V4ci5ldaqb4a) === 0) {
                            $this->readable = true;
                            break;
                        }
                    }
                }
            }
        }

        return $this->readable;
    }

    
    public function isWritable()
    {
        if ($this->writable === null) {
            $this->writable = false;
            if ($this->isAttached()) {
                $Vasuyddszirs = $this->getMetadata();
                foreach (self::$Vapscr4otgxw['writable'] as $V4ci5ldaqb4a) {
                    if (strpos($Vasuyddszirs['mode'], $V4ci5ldaqb4a) === 0) {
                        $this->writable = true;
                        break;
                    }
                }
            }
        }

        return $this->writable;
    }

    
    public function isSeekable()
    {
        if ($this->seekable === null) {
            $this->seekable = false;
            if ($this->isAttached()) {
                $Vasuyddszirs = $this->getMetadata();
                $this->seekable = !$this->isPipe() && $Vasuyddszirs['seekable'];
            }
        }

        return $this->seekable;
    }

    
    public function seek($V5peram4ncbv, $V0hp5tomtvke = SEEK_SET)
    {
        
        if (!$this->isSeekable() || fseek($this->stream, $V5peram4ncbv, $V0hp5tomtvke) === -1) {
            throw new RuntimeException('Could not seek in stream');
        }
    }

    
    public function rewind()
    {
        if (!$this->isSeekable() || rewind($this->stream) === false) {
            throw new RuntimeException('Could not rewind stream');
        }
    }

    
    public function read($Vxbsqvaghf5p)
    {
        if (!$this->isReadable() || ($Vqhzkfsafzrc = fread($this->stream, $Vxbsqvaghf5p)) === false) {
            throw new RuntimeException('Could not read from stream');
        }

        return $Vqhzkfsafzrc;
    }

    
    public function write($Ve5tcsso230g)
    {
        if (!$this->isWritable() || ($V1yo5as0u1wi = fwrite($this->stream, $Ve5tcsso230g)) === false) {
            throw new RuntimeException('Could not write to stream');
        }

        
        $this->size = null;

        return $V1yo5as0u1wi;
    }

    
    public function getContents()
    {
        if (!$this->isReadable() || ($Vpbbnofmevow = stream_get_contents($this->stream)) === false) {
            throw new RuntimeException('Could not get contents of stream');
        }

        return $Vpbbnofmevow;
    }

    
    public function isPipe()
    {
        if ($this->isPipe === null) {
            $this->isPipe = false;
            if ($this->isAttached()) {
                $V4ci5ldaqb4a = fstat($this->stream)['mode'];
                $this->isPipe = ($V4ci5ldaqb4a & self::FSTAT_MODE_S_IFIFO) !== 0;
            }
        }

        return $this->isPipe;
    }
}
