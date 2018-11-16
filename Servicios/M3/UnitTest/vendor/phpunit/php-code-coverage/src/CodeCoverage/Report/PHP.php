<?php



class PHP_CodeCoverage_Report_PHP
{
    
    public function process(PHP_CodeCoverage $Vbt1bqdir3su, $Vec3c2fwpbib = null)
    {
        $Vgpt4we0cx0b = $Vbt1bqdir3su->filter();

        $Vvaiuwffullu = sprintf(
            '<?php
$Vbt1bqdir3su = new PHP_CodeCoverage;
$Vbt1bqdir3su->setData(%s);
$Vbt1bqdir3su->setTests(%s);

$Vgpt4we0cx0b = $Vbt1bqdir3su->filter();
$Vgpt4we0cx0b->setBlacklistedFiles(%s);
$Vgpt4we0cx0b->setWhitelistedFiles(%s);

return $Vbt1bqdir3su;',
            var_export($Vbt1bqdir3su->getData(true), 1),
            var_export($Vbt1bqdir3su->getTests(), 1),
            var_export($Vgpt4we0cx0b->getBlacklistedFiles(), 1),
            var_export($Vgpt4we0cx0b->getWhitelistedFiles(), 1)
        );

        if ($Vec3c2fwpbib !== null) {
            return file_put_contents($Vec3c2fwpbib, $Vvaiuwffullu);
        } else {
            return $Vvaiuwffullu;
        }
    }
}
