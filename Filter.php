<?php



class PHP_CodeCoverage_Filter
{
    
    private $Vrpj5i4uumx2 = array();

    
    private $Vkdaesoxntb3 = array();

    
    public function addDirectoryToBlacklist($Vghfube41qyl, $V52q32upexbe = '.php', $V2hf2uebv5m0 = '')
    {
        $Vxvtuduzlxzp = new File_Iterator_Facade;
        $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray($Vghfube41qyl, $V52q32upexbe, $V2hf2uebv5m0);

        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $this->addFileToBlacklist($Vpu3xl4uhgg5);
        }
    }

    
    public function addFileToBlacklist($Vpu3xl4uhgg5name)
    {
        $this->blacklistedFiles[realpath($Vpu3xl4uhgg5name)] = true;
    }

    
    public function addFilesToBlacklist(array $V5s0rodgwwbv)
    {
        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $this->addFileToBlacklist($Vpu3xl4uhgg5);
        }
    }

    
    public function removeDirectoryFromBlacklist($Vghfube41qyl, $V52q32upexbe = '.php', $V2hf2uebv5m0 = '')
    {
        $Vxvtuduzlxzp = new File_Iterator_Facade;
        $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray($Vghfube41qyl, $V52q32upexbe, $V2hf2uebv5m0);

        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $this->removeFileFromBlacklist($Vpu3xl4uhgg5);
        }
    }

    
    public function removeFileFromBlacklist($Vpu3xl4uhgg5name)
    {
        $Vpu3xl4uhgg5name = realpath($Vpu3xl4uhgg5name);

        if (isset($this->blacklistedFiles[$Vpu3xl4uhgg5name])) {
            unset($this->blacklistedFiles[$Vpu3xl4uhgg5name]);
        }
    }

    
    public function addDirectoryToWhitelist($Vghfube41qyl, $V52q32upexbe = '.php', $V2hf2uebv5m0 = '')
    {
        $Vxvtuduzlxzp = new File_Iterator_Facade;
        $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray($Vghfube41qyl, $V52q32upexbe, $V2hf2uebv5m0);

        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $this->addFileToWhitelist($Vpu3xl4uhgg5);
        }
    }

    
    public function addFileToWhitelist($Vpu3xl4uhgg5name)
    {
        $this->whitelistedFiles[realpath($Vpu3xl4uhgg5name)] = true;
    }

    
    public function addFilesToWhitelist(array $V5s0rodgwwbv)
    {
        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $this->addFileToWhitelist($Vpu3xl4uhgg5);
        }
    }

    
    public function removeDirectoryFromWhitelist($Vghfube41qyl, $V52q32upexbe = '.php', $V2hf2uebv5m0 = '')
    {
        $Vxvtuduzlxzp = new File_Iterator_Facade;
        $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray($Vghfube41qyl, $V52q32upexbe, $V2hf2uebv5m0);

        foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
            $this->removeFileFromWhitelist($Vpu3xl4uhgg5);
        }
    }

    
    public function removeFileFromWhitelist($Vpu3xl4uhgg5name)
    {
        $Vpu3xl4uhgg5name = realpath($Vpu3xl4uhgg5name);

        if (isset($this->whitelistedFiles[$Vpu3xl4uhgg5name])) {
            unset($this->whitelistedFiles[$Vpu3xl4uhgg5name]);
        }
    }

    
    public function isFile($Vpu3xl4uhgg5name)
    {
        if ($Vpu3xl4uhgg5name == '-' ||
            strpos($Vpu3xl4uhgg5name, 'vfs://') === 0 ||
            strpos($Vpu3xl4uhgg5name, 'xdebug://debug-eval') !== false ||
            strpos($Vpu3xl4uhgg5name, 'eval()\'d code') !== false ||
            strpos($Vpu3xl4uhgg5name, 'runtime-created function') !== false ||
            strpos($Vpu3xl4uhgg5name, 'runkit created function') !== false ||
            strpos($Vpu3xl4uhgg5name, 'assert code') !== false ||
            strpos($Vpu3xl4uhgg5name, 'regexp code') !== false) {
            return false;
        }

        return file_exists($Vpu3xl4uhgg5name);
    }

    
    public function isFiltered($Vpu3xl4uhgg5name)
    {
        if (!$this->isFile($Vpu3xl4uhgg5name)) {
            return true;
        }

        $Vpu3xl4uhgg5name = realpath($Vpu3xl4uhgg5name);

        if (!empty($this->whitelistedFiles)) {
            return !isset($this->whitelistedFiles[$Vpu3xl4uhgg5name]);
        }

        return isset($this->blacklistedFiles[$Vpu3xl4uhgg5name]);
    }

    
    public function getBlacklist()
    {
        return array_keys($this->blacklistedFiles);
    }

    
    public function getWhitelist()
    {
        return array_keys($this->whitelistedFiles);
    }

    
    public function hasWhitelist()
    {
        return !empty($this->whitelistedFiles);
    }

    
    public function getBlacklistedFiles()
    {
        return $this->blacklistedFiles;
    }

    
    public function setBlacklistedFiles($Vrpj5i4uumx2)
    {
        $this->blacklistedFiles = $Vrpj5i4uumx2;
    }

    
    public function getWhitelistedFiles()
    {
        return $this->whitelistedFiles;
    }

    
    public function setWhitelistedFiles($Vkdaesoxntb3)
    {
        $this->whitelistedFiles = $Vkdaesoxntb3;
    }
}
