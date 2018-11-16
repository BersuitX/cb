<?php



namespace Symfony\Component\Yaml\Exception;


class ParseException extends RuntimeException
{
    private $V0jj3ge0efnl;
    private $Vx0mzc54x2wd;
    private $Vp5favkrohf3;
    private $Vrlxkc3ok1r3;

    
    public function __construct($Vbl4yrmdan1y, $Vx0mzc54x2wd = -1, $Vp5favkrohf3 = null, $V0jj3ge0efnl = null, \Exception $Vvnhp4yqbunj = null)
    {
        $this->parsedFile = $V0jj3ge0efnl;
        $this->parsedLine = $Vx0mzc54x2wd;
        $this->snippet = $Vp5favkrohf3;
        $this->rawMessage = $Vbl4yrmdan1y;

        $this->updateRepr();

        parent::__construct($this->message, 0, $Vvnhp4yqbunj);
    }

    
    public function getSnippet()
    {
        return $this->snippet;
    }

    
    public function setSnippet($Vp5favkrohf3)
    {
        $this->snippet = $Vp5favkrohf3;

        $this->updateRepr();
    }

    
    public function getParsedFile()
    {
        return $this->parsedFile;
    }

    
    public function setParsedFile($V0jj3ge0efnl)
    {
        $this->parsedFile = $V0jj3ge0efnl;

        $this->updateRepr();
    }

    
    public function getParsedLine()
    {
        return $this->parsedLine;
    }

    
    public function setParsedLine($Vx0mzc54x2wd)
    {
        $this->parsedLine = $Vx0mzc54x2wd;

        $this->updateRepr();
    }

    private function updateRepr()
    {
        $this->message = $this->rawMessage;

        $Vigy0aoctekk = false;
        if ('.' === substr($this->message, -1)) {
            $this->message = substr($this->message, 0, -1);
            $Vigy0aoctekk = true;
        }

        if (null !== $this->parsedFile) {
            $this->message .= sprintf(' in %s', json_encode($this->parsedFile, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
        }

        if ($this->parsedLine >= 0) {
            $this->message .= sprintf(' at line %d', $this->parsedLine);
        }

        if ($this->snippet) {
            $this->message .= sprintf(' (near "%s")', $this->snippet);
        }

        if ($Vigy0aoctekk) {
            $this->message .= '.';
        }
    }
}
