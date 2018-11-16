<?php



namespace Prophecy\Util;

use Prophecy\Call\Call;


class StringUtil
{
    
    public function stringify($Vcptarsq5qe4, $V3ykoj0oexsi = true)
    {
        if (is_array($Vcptarsq5qe4)) {
            if (range(0, count($Vcptarsq5qe4) - 1) === array_keys($Vcptarsq5qe4)) {
                return '['.implode(', ', array_map(array($this, __FUNCTION__), $Vcptarsq5qe4)).']';
            }

            $Vxndtezjz1ip = array($this, __FUNCTION__);

            return '['.implode(', ', array_map(function ($Virsew13xpli, $Vlpbz5aloxqt) use ($Vxndtezjz1ip) {
                return (is_integer($Vlpbz5aloxqt) ? $Vlpbz5aloxqt : '"'.$Vlpbz5aloxqt.'"').
                    ' => '.call_user_func($Vxndtezjz1ip, $Virsew13xpli);
            }, $Vcptarsq5qe4, array_keys($Vcptarsq5qe4))).']';
        }
        if (is_resource($Vcptarsq5qe4)) {
            return get_resource_type($Vcptarsq5qe4).':'.$Vcptarsq5qe4;
        }
        if (is_object($Vcptarsq5qe4)) {
            return $V3ykoj0oexsi ? ExportUtil::export($Vcptarsq5qe4) : sprintf('%s:%s', get_class($Vcptarsq5qe4), spl_object_hash($Vcptarsq5qe4));
        }
        if (true === $Vcptarsq5qe4 || false === $Vcptarsq5qe4) {
            return $Vcptarsq5qe4 ? 'true' : 'false';
        }
        if (is_string($Vcptarsq5qe4)) {
            $Vsmyfjixp1oz = sprintf('"%s"', str_replace("\n", '\\n', $Vcptarsq5qe4));

            if (50 <= strlen($Vsmyfjixp1oz)) {
                return substr($Vsmyfjixp1oz, 0, 50).'"...';
            }

            return $Vsmyfjixp1oz;
        }
        if (null === $Vcptarsq5qe4) {
            return 'null';
        }

        return (string) $Vcptarsq5qe4;
    }

    
    public function stringifyCalls(array $Vqk0kzw04abh)
    {
        $Vyazjz33u3mr = $this;

        return implode(PHP_EOL, array_map(function (Call $V2if5e0ncexa) use ($Vyazjz33u3mr) {
            return sprintf('  - %s(%s) @ %s',
                $V2if5e0ncexa->getMethodName(),
                implode(', ', array_map(array($Vyazjz33u3mr, 'stringify'), $V2if5e0ncexa->getArguments())),
                str_replace(GETCWD().DIRECTORY_SEPARATOR, '', $V2if5e0ncexa->getCallPlace())
            );
        }, $Vqk0kzw04abh));
    }
}
