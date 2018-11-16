<?php



class PHPUnit_Extensions_PhptTestSuite extends PHPUnit_Framework_TestSuite
{
    
    public function __construct($Vghfube41qyl)
    {
        if (is_string($Vghfube41qyl) && is_dir($Vghfube41qyl)) {
            $this->setName($Vghfube41qyl);

            $Vxvtuduzlxzp = new File_Iterator_Facade;
            $V5s0rodgwwbv  = $Vxvtuduzlxzp->getFilesAsArray($Vghfube41qyl, '.phpt');

            foreach ($V5s0rodgwwbv as $Vpu3xl4uhgg5) {
                $this->addTestFile($Vpu3xl4uhgg5);
            }
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'directory name');
        }
    }
}
