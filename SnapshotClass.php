<?php


namespace SebastianBergmann\GlobalState\TestFixture;

use DomDocument;
use ArrayObject;


class SnapshotClass
{
    private static $Ve5tcsso230g = 'snapshot';
    private static $Veu4emafikgi;
    private static $Vfjpwdfvhyhq;
    private static $Vvned0uepun1;
    private static $Voeril3mghvs;
    private static $Vbduzasjp2m2;
    private static $Vzl5jvbss14j;

    public static function init()
    {
        self::$Veu4emafikgi = new DomDocument();
        self::$Vfjpwdfvhyhq = function () {};
        self::$Vvned0uepun1 = new ArrayObject(array(1, 2, 3));
        self::$Voeril3mghvs = new SnapshotDomDocument();
        self::$Vbduzasjp2m2 = fopen('php://memory', 'r');
        self::$Vzl5jvbss14j = new \stdClass();
    }
}
