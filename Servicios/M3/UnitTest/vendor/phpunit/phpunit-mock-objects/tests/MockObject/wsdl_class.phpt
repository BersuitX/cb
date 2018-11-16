--TEST--
PHPUnit_Framework_MockObject_Generator::generateClassFromWsdl('GoogleSearch.wsdl', 'GoogleSearch')
--SKIPIF--
<?php
if (!extension_loaded('soap')) echo 'skip: SOAP extension is required';
?>
--FILE--
<?php
require __DIR__ . '/../../vendor/autoload.php';

$Vi5uqhlkbfzi = new PHPUnit_Framework_MockObject_Generator;

print $Vi5uqhlkbfzi->generateClassFromWsdl(
  dirname(dirname(__FILE__)) . '/_fixture/GoogleSearch.wsdl',
  'GoogleSearch'
);
?>
--EXPECTF--
class GoogleSearch extends \SoapClient
{
    public function __construct($Vjybktgv3mnp, array $V4a4guv4okog)
    {
        parent::__construct('%s/GoogleSearch.wsdl', $V4a4guv4okog);
    }

    public function doGoogleSearch($Vlpbz5aloxqt, $Vfigsgaojuez, $Vtpoxs3gutsc, $Vwa5uaddmhk2, $Vgpt4we0cx0b, $Vana03tdxcc0, $Vdvg2yho20yn, $Vywnsp0mo2pw, $Vuytaaa0rg55, $Vr2qll3lphe5)
    {
    }

    public function doGetCachedPage($Vlpbz5aloxqt, $Vnwlngxwnesf)
    {
    }

    public function doSpellingSuggestion($Vlpbz5aloxqt, $Volnmltcacu2)
    {
    }
}
