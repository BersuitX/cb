<?php



interface PHP_CodeCoverage_Driver
{
    
    const LINE_EXECUTED = 1;

    
    const LINE_NOT_EXECUTED = -1;

    
    const LINE_NOT_EXECUTABLE = -2;

    
    public function start();

    
    public function stop();
}
