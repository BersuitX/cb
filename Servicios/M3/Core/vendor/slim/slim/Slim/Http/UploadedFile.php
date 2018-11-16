<?php

namespace Slim\Http;

use RuntimeException;
use InvalidArgumentException;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UploadedFileInterface;


class UploadedFile implements UploadedFileInterface
{
    
    public $Vpu3xl4uhgg5;
    
    protected $Vgpjmw221p0b;
    
    protected $V31qrja1w0r2;
    
    protected $V5mlu1ykrbu5;
    
    protected $Vpsm42ro4mkq = UPLOAD_ERR_OK;
    
    protected $Vhr1zwoleb03 = false;
    
    protected $V4mgjtqyeyio;
    
    protected $Vmrsijwwxzax = false;

    
    public static function createFromEnvironment(Environment $Vfjvvb2twfm1)
    {
        if (is_array($Vfjvvb2twfm1['slim.files']) && $Vfjvvb2twfm1->has('slim.files')) {
            return $Vfjvvb2twfm1['slim.files'];
        } elseif (isset($_FILES)) {
            return static::parseUploadedFiles($_FILES);
        }

        return [];
    }

    
    private static function parseUploadedFiles(array $Vawhjzmdy4yk)
    {
        $V0luatne1svb = [];
        foreach ($Vawhjzmdy4yk as $Vcjkaixyuh2s => $Va1r2b2vh4p1) {
            if (!isset($Va1r2b2vh4p1['error'])) {
                if (is_array($Va1r2b2vh4p1)) {
                    $V0luatne1svb[$Vcjkaixyuh2s] = static::parseUploadedFiles($Va1r2b2vh4p1);
                }
                continue;
            }

            $V0luatne1svb[$Vcjkaixyuh2s] = [];
            if (!is_array($Va1r2b2vh4p1['error'])) {
                $V0luatne1svb[$Vcjkaixyuh2s] = new static(
                    $Va1r2b2vh4p1['tmp_name'],
                    isset($Va1r2b2vh4p1['name']) ? $Va1r2b2vh4p1['name'] : null,
                    isset($Va1r2b2vh4p1['type']) ? $Va1r2b2vh4p1['type'] : null,
                    isset($Va1r2b2vh4p1['size']) ? $Va1r2b2vh4p1['size'] : null,
                    $Va1r2b2vh4p1['error'],
                    true
                );
            } else {
                $V4c1iejxdtlf = [];
                foreach ($Va1r2b2vh4p1['error'] as $Vpu3xl4uhgg5Idx => $Vpsm42ro4mkq) {
                    
                    $V4c1iejxdtlf[$Vpu3xl4uhgg5Idx]['name'] = $Va1r2b2vh4p1['name'][$Vpu3xl4uhgg5Idx];
                    $V4c1iejxdtlf[$Vpu3xl4uhgg5Idx]['type'] = $Va1r2b2vh4p1['type'][$Vpu3xl4uhgg5Idx];
                    $V4c1iejxdtlf[$Vpu3xl4uhgg5Idx]['tmp_name'] = $Va1r2b2vh4p1['tmp_name'][$Vpu3xl4uhgg5Idx];
                    $V4c1iejxdtlf[$Vpu3xl4uhgg5Idx]['error'] = $Va1r2b2vh4p1['error'][$Vpu3xl4uhgg5Idx];
                    $V4c1iejxdtlf[$Vpu3xl4uhgg5Idx]['size'] = $Va1r2b2vh4p1['size'][$Vpu3xl4uhgg5Idx];

                    $V0luatne1svb[$Vcjkaixyuh2s] = static::parseUploadedFiles($V4c1iejxdtlf);
                }
            }
        }

        return $V0luatne1svb;
    }

    
    public function __construct($Vpu3xl4uhgg5, $Vgpjmw221p0b = null, $V31qrja1w0r2 = null, $V5mlu1ykrbu5 = null, $Vpsm42ro4mkq = UPLOAD_ERR_OK, $Vhr1zwoleb03 = false)
    {
        $this->file = $Vpu3xl4uhgg5;
        $this->name = $Vgpjmw221p0b;
        $this->type = $V31qrja1w0r2;
        $this->size = $V5mlu1ykrbu5;
        $this->error = $Vpsm42ro4mkq;
        $this->sapi = $Vhr1zwoleb03;
    }

    
    public function getStream()
    {
        if ($this->moved) {
            throw new \RuntimeException(sprintf('Uploaded file %1s has already been moved', $this->name));
        }
        if ($this->stream === null) {
            $this->stream = new Stream(fopen($this->file, 'r'));
        }

        return $this->stream;
    }

    
    public function moveTo($Vcl5ky4x4bi4)
    {
        if ($this->moved) {
            throw new RuntimeException('Uploaded file already moved');
        }

        $V5fe4zersfox = strpos($Vcl5ky4x4bi4, '://') > 0;
        if (!$V5fe4zersfox && !is_writable(dirname($Vcl5ky4x4bi4))) {
            throw new InvalidArgumentException('Upload target path is not writable');
        }

        if ($V5fe4zersfox) {
            if (!copy($this->file, $Vcl5ky4x4bi4)) {
                throw new RuntimeException(sprintf('Error moving uploaded file %1s to %2s', $this->name, $Vcl5ky4x4bi4));
            }
            if (!unlink($this->file)) {
                throw new RuntimeException(sprintf('Error removing uploaded file %1s', $this->name));
            }
        } elseif ($this->sapi) {
            if (!is_uploaded_file($this->file)) {
                throw new RuntimeException(sprintf('%1s is not a valid uploaded file', $this->file));
            }

            if (!move_uploaded_file($this->file, $Vcl5ky4x4bi4)) {
                throw new RuntimeException(sprintf('Error moving uploaded file %1s to %2s', $this->name, $Vcl5ky4x4bi4));
            }
        } else {
            if (!rename($this->file, $Vcl5ky4x4bi4)) {
                throw new RuntimeException(sprintf('Error moving uploaded file %1s to %2s', $this->name, $Vcl5ky4x4bi4));
            }
        }

        $this->moved = true;
    }

    
    public function getError()
    {
        return $this->error;
    }

    
    public function getClientFilename()
    {
        return $this->name;
    }

    
    public function getClientMediaType()
    {
        return $this->type;
    }

    
    public function getSize()
    {
        return $this->size;
    }
}
