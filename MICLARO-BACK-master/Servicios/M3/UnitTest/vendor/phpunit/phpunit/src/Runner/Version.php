<?php


use SebastianBergmann\Version;


class PHPUnit_Runner_Version
{
    private static $V4ftuqijfaib;
    private static $Vzqixmthnyoe;

    
    public static function id()
    {
        if (self::$V4ftuqijfaib !== null) {
            return self::$V4ftuqijfaib;
        }

        if (self::$Vzqixmthnyoe === null) {
            $Vzqixmthnyoe       = new Version('4.8.36', dirname(dirname(__DIR__)));
            self::$Vzqixmthnyoe = $Vzqixmthnyoe->getVersion();
        }

        return self::$Vzqixmthnyoe;
    }

    
    public static function series()
    {
        if (strpos(self::id(), '-')) {
            $Vvurliuircct     = explode('-', self::id());
            $Vzqixmthnyoe = $Vvurliuircct[0];
        } else {
            $Vzqixmthnyoe = self::id();
        }

        return implode('.', array_slice(explode('.', $Vzqixmthnyoe), 0, 2));
    }

    
    public static function getVersionString()
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }

    
    public static function getReleaseChannel()
    {
        if (strpos(self::$V4ftuqijfaib, '-') !== false) {
            return '-nightly';
        }

        return '';
    }
}
