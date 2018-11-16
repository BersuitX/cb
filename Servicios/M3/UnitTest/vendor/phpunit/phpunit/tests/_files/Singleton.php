<?php
class Singleton
{
    private static $Vlz0g5hlit0j = null;

    protected function __construct()
    {
    }

    final private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$Vlz0g5hlit0j === null) {
            self::$Vlz0g5hlit0j = new self;
        }

        return self::$Vlz0g5hlit0j;
    }
}
