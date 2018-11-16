<?php


namespace SebastianBergmann;


class Version
{
    private $V2bpoh5hagzp;
    private $Vrxuozfs0cqg;
    private $Vzqixmthnyoe;

    
    public function __construct($Vrxuozfs0cqg, $V2bpoh5hagzp)
    {
        $this->release = $Vrxuozfs0cqg;
        $this->path    = $V2bpoh5hagzp;
    }

    
    public function getVersion()
    {
        if ($this->version === null) {
            if (count(explode('.', $this->release)) == 3) {
                $this->version = $this->release;
            } else {
                $this->version = $this->release . '-dev';
            }

            $V5ppsozpetsl = $this->getGitInformation($this->path);

            if ($V5ppsozpetsl) {
                if (count(explode('.', $this->release)) == 3) {
                    $this->version = $V5ppsozpetsl;
                } else {
                    $V5ppsozpetsl = explode('-', $V5ppsozpetsl);

                    $this->version = $this->release . '-' . end($V5ppsozpetsl);
                }
            }
        }

        return $this->version;
    }

    
    private function getGitInformation($V2bpoh5hagzp)
    {
        if (!is_dir($V2bpoh5hagzp . DIRECTORY_SEPARATOR . '.git')) {
            return false;
        }

        $Vb3iift025ov = getcwd();
        chdir($V2bpoh5hagzp);
        $V1ingc2qa5yq = 1;
        $Vv0hyvhlkjqr     = @exec('git describe --tags 2>&1', $Vvaiuwffullu, $V1ingc2qa5yq);
        chdir($Vb3iift025ov);

        if ($V1ingc2qa5yq !== 0) {
            return false;
        }

        return $Vv0hyvhlkjqr;
    }
}
