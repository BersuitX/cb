<?php



abstract class PHPUnit_Framework_Assert
{
    
    private static $Vdbkece3gnp5 = 0;

    
    public static function assertArrayHasKey($Vlpbz5aloxqt, $Vvs0hc5bhqj3, $Vbl4yrmdan1y = '')
    {
        if (!(is_integer($Vlpbz5aloxqt) || is_string($Vlpbz5aloxqt))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'integer or string'
            );
        }

        if (!(is_array($Vvs0hc5bhqj3) || $Vvs0hc5bhqj3 instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or ArrayAccess'
            );
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_ArrayHasKey($Vlpbz5aloxqt);

        self::assertThat($Vvs0hc5bhqj3, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertArraySubset($Vjgrhnkfwhsi, $Vvs0hc5bhqj3, $V2xeprdxa0ou = false, $Vbl4yrmdan1y = '')
    {
        if (!(is_array($Vjgrhnkfwhsi) || $Vjgrhnkfwhsi instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'array or ArrayAccess'
            );
        }

        if (!(is_array($Vvs0hc5bhqj3) || $Vvs0hc5bhqj3 instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or ArrayAccess'
            );
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_ArraySubset($Vjgrhnkfwhsi, $V2xeprdxa0ou);

        self::assertThat($Vvs0hc5bhqj3, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertArrayNotHasKey($Vlpbz5aloxqt, $Vvs0hc5bhqj3, $Vbl4yrmdan1y = '')
    {
        if (!(is_integer($Vlpbz5aloxqt) || is_string($Vlpbz5aloxqt))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'integer or string'
            );
        }

        if (!(is_array($Vvs0hc5bhqj3) || $Vvs0hc5bhqj3 instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or ArrayAccess'
            );
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ArrayHasKey($Vlpbz5aloxqt)
        );

        self::assertThat($Vvs0hc5bhqj3, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertContains($Vhpxdhkhdqe4, $Vd0bkorb0gks, $Vbl4yrmdan1y = '', $V2tcbx0tpkh3 = false, $Vxtveoqpekh0 = true, $Vt3lircrduno = false)
    {
        if (is_array($Vd0bkorb0gks) ||
            is_object($Vd0bkorb0gks) && $Vd0bkorb0gks instanceof Traversable) {
            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_TraversableContains(
                $Vhpxdhkhdqe4,
                $Vxtveoqpekh0,
                $Vt3lircrduno
            );
        } elseif (is_string($Vd0bkorb0gks)) {
            if (!is_string($Vhpxdhkhdqe4)) {
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
                    1,
                    'string'
                );
            }

            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_StringContains(
                $Vhpxdhkhdqe4,
                $V2tcbx0tpkh3
            );
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array, traversable or string'
            );
        }

        self::assertThat($Vd0bkorb0gks, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeContains($Vhpxdhkhdqe4, $Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $Vbl4yrmdan1y = '', $V2tcbx0tpkh3 = false, $Vxtveoqpekh0 = true, $Vt3lircrduno = false)
    {
        self::assertContains(
            $Vhpxdhkhdqe4,
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $Vbl4yrmdan1y,
            $V2tcbx0tpkh3,
            $Vxtveoqpekh0,
            $Vt3lircrduno
        );
    }

    
    public static function assertNotContains($Vhpxdhkhdqe4, $Vd0bkorb0gks, $Vbl4yrmdan1y = '', $V2tcbx0tpkh3 = false, $Vxtveoqpekh0 = true, $Vt3lircrduno = false)
    {
        if (is_array($Vd0bkorb0gks) ||
            is_object($Vd0bkorb0gks) && $Vd0bkorb0gks instanceof Traversable) {
            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_TraversableContains(
                    $Vhpxdhkhdqe4,
                    $Vxtveoqpekh0,
                    $Vt3lircrduno
                )
            );
        } elseif (is_string($Vd0bkorb0gks)) {
            if (!is_string($Vhpxdhkhdqe4)) {
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
                    1,
                    'string'
                );
            }

            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_StringContains(
                    $Vhpxdhkhdqe4,
                    $V2tcbx0tpkh3
                )
            );
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array, traversable or string'
            );
        }

        self::assertThat($Vd0bkorb0gks, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeNotContains($Vhpxdhkhdqe4, $Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $Vbl4yrmdan1y = '', $V2tcbx0tpkh3 = false, $Vxtveoqpekh0 = true, $Vt3lircrduno = false)
    {
        self::assertNotContains(
            $Vhpxdhkhdqe4,
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $Vbl4yrmdan1y,
            $V2tcbx0tpkh3,
            $Vxtveoqpekh0,
            $Vt3lircrduno
        );
    }

    
    public static function assertContainsOnly($V31qrja1w0r2, $Vd0bkorb0gks, $V252yl31d1cg = null, $Vbl4yrmdan1y = '')
    {
        if (!(is_array($Vd0bkorb0gks) ||
            is_object($Vd0bkorb0gks) && $Vd0bkorb0gks instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or traversable'
            );
        }

        if ($V252yl31d1cg == null) {
            $V252yl31d1cg = PHPUnit_Util_Type::isType($V31qrja1w0r2);
        }

        self::assertThat(
            $Vd0bkorb0gks,
            new PHPUnit_Framework_Constraint_TraversableContainsOnly(
                $V31qrja1w0r2,
                $V252yl31d1cg
            ),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertContainsOnlyInstancesOf($V3ngkdmbo02c, $Vd0bkorb0gks, $Vbl4yrmdan1y = '')
    {
        if (!(is_array($Vd0bkorb0gks) ||
            is_object($Vd0bkorb0gks) && $Vd0bkorb0gks instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or traversable'
            );
        }

        self::assertThat(
            $Vd0bkorb0gks,
            new PHPUnit_Framework_Constraint_TraversableContainsOnly(
                $V3ngkdmbo02c,
                false
            ),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertAttributeContainsOnly($V31qrja1w0r2, $Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $V252yl31d1cg = null, $Vbl4yrmdan1y = '')
    {
        self::assertContainsOnly(
            $V31qrja1w0r2,
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $V252yl31d1cg,
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertNotContainsOnly($V31qrja1w0r2, $Vd0bkorb0gks, $V252yl31d1cg = null, $Vbl4yrmdan1y = '')
    {
        if (!(is_array($Vd0bkorb0gks) ||
            is_object($Vd0bkorb0gks) && $Vd0bkorb0gks instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or traversable'
            );
        }

        if ($V252yl31d1cg == null) {
            $V252yl31d1cg = PHPUnit_Util_Type::isType($V31qrja1w0r2);
        }

        self::assertThat(
            $Vd0bkorb0gks,
            new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_TraversableContainsOnly(
                    $V31qrja1w0r2,
                    $V252yl31d1cg
                )
            ),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertAttributeNotContainsOnly($V31qrja1w0r2, $Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $V252yl31d1cg = null, $Vbl4yrmdan1y = '')
    {
        self::assertNotContainsOnly(
            $V31qrja1w0r2,
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $V252yl31d1cg,
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertCount($V3touerk1rgc, $Vd0bkorb0gks, $Vbl4yrmdan1y = '')
    {
        if (!is_int($V3touerk1rgc)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

        if (!$Vd0bkorb0gks instanceof Countable &&
            !$Vd0bkorb0gks instanceof Traversable &&
            !is_array($Vd0bkorb0gks)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        self::assertThat(
            $Vd0bkorb0gks,
            new PHPUnit_Framework_Constraint_Count($V3touerk1rgc),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertAttributeCount($V3touerk1rgc, $Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertCount(
            $V3touerk1rgc,
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertNotCount($V3touerk1rgc, $Vd0bkorb0gks, $Vbl4yrmdan1y = '')
    {
        if (!is_int($V3touerk1rgc)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

        if (!$Vd0bkorb0gks instanceof Countable &&
            !$Vd0bkorb0gks instanceof Traversable &&
            !is_array($Vd0bkorb0gks)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_Count($V3touerk1rgc)
        );

        self::assertThat($Vd0bkorb0gks, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeNotCount($V3touerk1rgc, $Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertNotCount(
            $V3touerk1rgc,
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vxo5kvys4l4m = 0.0, $Vcv5mgbh5qwg = 10, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsEqual(
            $Vwcb1oykhumm,
            $Vxo5kvys4l4m,
            $Vcv5mgbh5qwg,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );

        self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeEquals($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '', $Vxo5kvys4l4m = 0.0, $Vcv5mgbh5qwg = 10, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        self::assertEquals(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y,
            $Vxo5kvys4l4m,
            $Vcv5mgbh5qwg,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );
    }

    
    public static function assertNotEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vxo5kvys4l4m = 0.0, $Vcv5mgbh5qwg = 10, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsEqual(
                $Vwcb1oykhumm,
                $Vxo5kvys4l4m,
                $Vcv5mgbh5qwg,
                $Vgxxhufhstfx,
                $V2tcbx0tpkh3
            )
        );

        self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeNotEquals($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '', $Vxo5kvys4l4m = 0.0, $Vcv5mgbh5qwg = 10, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        self::assertNotEquals(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y,
            $Vxo5kvys4l4m,
            $Vcv5mgbh5qwg,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );
    }

    
    public static function assertEmpty($Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vs4nw03sqcam, self::isEmpty(), $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeEmpty($Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertEmpty(
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertNotEmpty($Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vs4nw03sqcam, self::logicalNot(self::isEmpty()), $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeNotEmpty($Vd0bkorb0gksAttributeName, $Vd0bkorb0gksClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertNotEmpty(
            self::readAttribute($Vd0bkorb0gksClassOrObject, $Vd0bkorb0gksAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertGreaterThan($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vs4nw03sqcam, self::greaterThan($Vwcb1oykhumm), $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeGreaterThan($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertGreaterThan(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertGreaterThanOrEqual($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat(
            $Vs4nw03sqcam,
            self::greaterThanOrEqual($Vwcb1oykhumm),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertAttributeGreaterThanOrEqual($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertGreaterThanOrEqual(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertLessThan($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vs4nw03sqcam, self::lessThan($Vwcb1oykhumm), $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeLessThan($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertLessThan(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertLessThanOrEqual($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vs4nw03sqcam, self::lessThanOrEqual($Vwcb1oykhumm), $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeLessThanOrEqual($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertLessThanOrEqual(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertFileEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        self::assertFileExists($Vwcb1oykhumm, $Vbl4yrmdan1y);
        self::assertFileExists($Vs4nw03sqcam, $Vbl4yrmdan1y);

        self::assertEquals(
            file_get_contents($Vwcb1oykhumm),
            file_get_contents($Vs4nw03sqcam),
            $Vbl4yrmdan1y,
            0,
            10,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );
    }

    
    public static function assertFileNotEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        self::assertFileExists($Vwcb1oykhumm, $Vbl4yrmdan1y);
        self::assertFileExists($Vs4nw03sqcam, $Vbl4yrmdan1y);

        self::assertNotEquals(
            file_get_contents($Vwcb1oykhumm),
            file_get_contents($Vs4nw03sqcam),
            $Vbl4yrmdan1y,
            0,
            10,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );
    }

    
    public static function assertStringEqualsFile($Vwcb1oykhummFile, $Vs4nw03sqcamString, $Vbl4yrmdan1y = '', $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        self::assertFileExists($Vwcb1oykhummFile, $Vbl4yrmdan1y);

        self::assertEquals(
            file_get_contents($Vwcb1oykhummFile),
            $Vs4nw03sqcamString,
            $Vbl4yrmdan1y,
            0,
            10,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );
    }

    
    public static function assertStringNotEqualsFile($Vwcb1oykhummFile, $Vs4nw03sqcamString, $Vbl4yrmdan1y = '', $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        self::assertFileExists($Vwcb1oykhummFile, $Vbl4yrmdan1y);

        self::assertNotEquals(
            file_get_contents($Vwcb1oykhummFile),
            $Vs4nw03sqcamString,
            $Vbl4yrmdan1y,
            0,
            10,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );
    }

    
    public static function assertFileExists($Va3qqb0vgkhy, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Va3qqb0vgkhy)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_FileExists;

        self::assertThat($Va3qqb0vgkhy, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertFileNotExists($Va3qqb0vgkhy, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Va3qqb0vgkhy)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_FileExists
        );

        self::assertThat($Va3qqb0vgkhy, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertTrue($Vydteguilzuv, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vydteguilzuv, self::isTrue(), $Vbl4yrmdan1y);
    }

    
    public static function assertNotTrue($Vydteguilzuv, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vydteguilzuv, self::logicalNot(self::isTrue()), $Vbl4yrmdan1y);
    }

    
    public static function assertFalse($Vydteguilzuv, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vydteguilzuv, self::isFalse(), $Vbl4yrmdan1y);
    }

    
    public static function assertNotFalse($Vydteguilzuv, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vydteguilzuv, self::logicalNot(self::isFalse()), $Vbl4yrmdan1y);
    }

    
    public static function assertNotNull($Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vs4nw03sqcam, self::logicalNot(self::isNull()), $Vbl4yrmdan1y);
    }

    
    public static function assertNull($Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        self::assertThat($Vs4nw03sqcam, self::isNull(), $Vbl4yrmdan1y);
    }

    
    public static function assertClassHasAttribute($Vwdqynfrh4s0, $Vh0iae5cev4i, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($Vh0iae5cev4i) || !class_exists($Vh0iae5cev4i)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $Vh0iae5cev4i);
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_ClassHasAttribute(
            $Vwdqynfrh4s0
        );

        self::assertThat($Vh0iae5cev4i, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertClassNotHasAttribute($Vwdqynfrh4s0, $Vh0iae5cev4i, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($Vh0iae5cev4i) || !class_exists($Vh0iae5cev4i)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $Vh0iae5cev4i);
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ClassHasAttribute($Vwdqynfrh4s0)
        );

        self::assertThat($Vh0iae5cev4i, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertClassHasStaticAttribute($Vwdqynfrh4s0, $Vh0iae5cev4i, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($Vh0iae5cev4i) || !class_exists($Vh0iae5cev4i)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $Vh0iae5cev4i);
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
            $Vwdqynfrh4s0
        );

        self::assertThat($Vh0iae5cev4i, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertClassNotHasStaticAttribute($Vwdqynfrh4s0, $Vh0iae5cev4i, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($Vh0iae5cev4i) || !class_exists($Vh0iae5cev4i)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $Vh0iae5cev4i);
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
                $Vwdqynfrh4s0
            )
        );

        self::assertThat($Vh0iae5cev4i, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertObjectHasAttribute($Vwdqynfrh4s0, $Vbj3pw2f5egf, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_object($Vbj3pw2f5egf)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'object');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_ObjectHasAttribute(
            $Vwdqynfrh4s0
        );

        self::assertThat($Vbj3pw2f5egf, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertObjectNotHasAttribute($Vwdqynfrh4s0, $Vbj3pw2f5egf, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_object($Vbj3pw2f5egf)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'object');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ObjectHasAttribute($Vwdqynfrh4s0)
        );

        self::assertThat($Vbj3pw2f5egf, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertSame($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (is_bool($Vwcb1oykhumm) && is_bool($Vs4nw03sqcam)) {
            self::assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
        } else {
            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsIdentical(
                $Vwcb1oykhumm
            );

            self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
        }
    }

    
    public static function assertAttributeSame($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertSame(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertNotSame($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (is_bool($Vwcb1oykhumm) && is_bool($Vs4nw03sqcam)) {
            self::assertNotEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
        } else {
            $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_IsIdentical($Vwcb1oykhumm)
            );

            self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
        }
    }

    
    public static function assertAttributeNotSame($Vwcb1oykhumm, $Vs4nw03sqcamAttributeName, $Vs4nw03sqcamClassOrObject, $Vbl4yrmdan1y = '')
    {
        self::assertNotSame(
            $Vwcb1oykhumm,
            self::readAttribute($Vs4nw03sqcamClassOrObject, $Vs4nw03sqcamAttributeName),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertInstanceOf($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (!(is_string($Vwcb1oykhumm) && (class_exists($Vwcb1oykhumm) || interface_exists($Vwcb1oykhumm)))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsInstanceOf(
            $Vwcb1oykhumm
        );

        self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeInstanceOf($Vwcb1oykhumm, $Vwdqynfrh4s0, $Vv5tonsb2daz, $Vbl4yrmdan1y = '')
    {
        self::assertInstanceOf(
            $Vwcb1oykhumm,
            self::readAttribute($Vv5tonsb2daz, $Vwdqynfrh4s0),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertNotInstanceOf($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (!(is_string($Vwcb1oykhumm) && (class_exists($Vwcb1oykhumm) || interface_exists($Vwcb1oykhumm)))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsInstanceOf($Vwcb1oykhumm)
        );

        self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeNotInstanceOf($Vwcb1oykhumm, $Vwdqynfrh4s0, $Vv5tonsb2daz, $Vbl4yrmdan1y = '')
    {
        self::assertNotInstanceOf(
            $Vwcb1oykhumm,
            self::readAttribute($Vv5tonsb2daz, $Vwdqynfrh4s0),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertInternalType($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwcb1oykhumm)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_IsType(
            $Vwcb1oykhumm
        );

        self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeInternalType($Vwcb1oykhumm, $Vwdqynfrh4s0, $Vv5tonsb2daz, $Vbl4yrmdan1y = '')
    {
        self::assertInternalType(
            $Vwcb1oykhumm,
            self::readAttribute($Vv5tonsb2daz, $Vwdqynfrh4s0),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertNotInternalType($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vwcb1oykhumm)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsType($Vwcb1oykhumm)
        );

        self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertAttributeNotInternalType($Vwcb1oykhumm, $Vwdqynfrh4s0, $Vv5tonsb2daz, $Vbl4yrmdan1y = '')
    {
        self::assertNotInternalType(
            $Vwcb1oykhumm,
            self::readAttribute($Vv5tonsb2daz, $Vwdqynfrh4s0),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertRegExp($Vp1x1qfledcv, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vp1x1qfledcv)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_PCREMatch($Vp1x1qfledcv);

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertNotRegExp($Vp1x1qfledcv, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vp1x1qfledcv)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_PCREMatch($Vp1x1qfledcv)
        );

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertSameSize($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (!$Vwcb1oykhumm instanceof Countable &&
            !$Vwcb1oykhumm instanceof Traversable &&
            !is_array($Vwcb1oykhumm)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'countable or traversable');
        }

        if (!$Vs4nw03sqcam instanceof Countable &&
            !$Vs4nw03sqcam instanceof Traversable &&
            !is_array($Vs4nw03sqcam)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        self::assertThat(
            $Vs4nw03sqcam,
            new PHPUnit_Framework_Constraint_SameSize($Vwcb1oykhumm),
            $Vbl4yrmdan1y
        );
    }

    
    public static function assertNotSameSize($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = '')
    {
        if (!$Vwcb1oykhumm instanceof Countable &&
            !$Vwcb1oykhumm instanceof Traversable &&
            !is_array($Vwcb1oykhumm)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'countable or traversable');
        }

        if (!$Vs4nw03sqcam instanceof Countable &&
            !$Vs4nw03sqcam instanceof Traversable &&
            !is_array($Vs4nw03sqcam)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_SameSize($Vwcb1oykhumm)
        );

        self::assertThat($Vs4nw03sqcam, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringMatchesFormat($Vlobivxuxali, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vlobivxuxali)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_StringMatches($Vlobivxuxali);

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringNotMatchesFormat($Vlobivxuxali, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vlobivxuxali)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringMatches($Vlobivxuxali)
        );

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringMatchesFormatFile($VlobivxuxaliFile, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        self::assertFileExists($VlobivxuxaliFile, $Vbl4yrmdan1y);

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_StringMatches(
            file_get_contents($VlobivxuxaliFile)
        );

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringNotMatchesFormatFile($VlobivxuxaliFile, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        self::assertFileExists($VlobivxuxaliFile, $Vbl4yrmdan1y);

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringMatches(
                file_get_contents($VlobivxuxaliFile)
            )
        );

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringStartsWith($V2hf2uebv5m0, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($V2hf2uebv5m0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_StringStartsWith(
            $V2hf2uebv5m0
        );

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringStartsNotWith($V2hf2uebv5m0, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($V2hf2uebv5m0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringStartsWith($V2hf2uebv5m0)
        );

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringEndsWith($V52q32upexbe, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($V52q32upexbe)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_StringEndsWith($V52q32upexbe);

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertStringEndsNotWith($V52q32upexbe, $Ve5tcsso230g, $Vbl4yrmdan1y = '')
    {
        if (!is_string($V52q32upexbe)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($Ve5tcsso230g)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringEndsWith($V52q32upexbe)
        );

        self::assertThat($Ve5tcsso230g, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertXmlFileEqualsXmlFile($Vwcb1oykhummFile, $Vs4nw03sqcamFile, $Vbl4yrmdan1y = '')
    {
        $Vwcb1oykhumm = PHPUnit_Util_XML::loadFile($Vwcb1oykhummFile);
        $Vs4nw03sqcam   = PHPUnit_Util_XML::loadFile($Vs4nw03sqcamFile);

        self::assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertXmlFileNotEqualsXmlFile($Vwcb1oykhummFile, $Vs4nw03sqcamFile, $Vbl4yrmdan1y = '')
    {
        $Vwcb1oykhumm = PHPUnit_Util_XML::loadFile($Vwcb1oykhummFile);
        $Vs4nw03sqcam   = PHPUnit_Util_XML::loadFile($Vs4nw03sqcamFile);

        self::assertNotEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertXmlStringEqualsXmlFile($Vwcb1oykhummFile, $Vs4nw03sqcamXml, $Vbl4yrmdan1y = '')
    {
        $Vwcb1oykhumm = PHPUnit_Util_XML::loadFile($Vwcb1oykhummFile);
        $Vs4nw03sqcam   = PHPUnit_Util_XML::load($Vs4nw03sqcamXml);

        self::assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertXmlStringNotEqualsXmlFile($Vwcb1oykhummFile, $Vs4nw03sqcamXml, $Vbl4yrmdan1y = '')
    {
        $Vwcb1oykhumm = PHPUnit_Util_XML::loadFile($Vwcb1oykhummFile);
        $Vs4nw03sqcam   = PHPUnit_Util_XML::load($Vs4nw03sqcamXml);

        self::assertNotEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertXmlStringEqualsXmlString($Vwcb1oykhummXml, $Vs4nw03sqcamXml, $Vbl4yrmdan1y = '')
    {
        $Vwcb1oykhumm = PHPUnit_Util_XML::load($Vwcb1oykhummXml);
        $Vs4nw03sqcam   = PHPUnit_Util_XML::load($Vs4nw03sqcamXml);

        self::assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertXmlStringNotEqualsXmlString($Vwcb1oykhummXml, $Vs4nw03sqcamXml, $Vbl4yrmdan1y = '')
    {
        $Vwcb1oykhumm = PHPUnit_Util_XML::load($Vwcb1oykhummXml);
        $Vs4nw03sqcam   = PHPUnit_Util_XML::load($Vs4nw03sqcamXml);

        self::assertNotEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertEqualXMLStructure(DOMElement $Vwcb1oykhummElement, DOMElement $Vs4nw03sqcamElement, $Vt3bm5rodknb = false, $Vbl4yrmdan1y = '')
    {
        $Vvurliuircct             = new DOMDocument;
        $Vwcb1oykhummElement = $Vvurliuircct->importNode($Vwcb1oykhummElement, true);

        $Vvurliuircct           = new DOMDocument;
        $Vs4nw03sqcamElement = $Vvurliuircct->importNode($Vs4nw03sqcamElement, true);

        unset($Vvurliuircct);

        self::assertEquals(
            $Vwcb1oykhummElement->tagName,
            $Vs4nw03sqcamElement->tagName,
            $Vbl4yrmdan1y
        );

        if ($Vt3bm5rodknb) {
            self::assertEquals(
                $Vwcb1oykhummElement->attributes->length,
                $Vs4nw03sqcamElement->attributes->length,
                sprintf(
                    '%s%sNumber of attributes on node "%s" does not match',
                    $Vbl4yrmdan1y,
                    !empty($Vbl4yrmdan1y) ? "\n" : '',
                    $Vwcb1oykhummElement->tagName
                )
            );

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vwcb1oykhummElement->attributes->length; $Vxja1abp34yq++) {
                $Vwcb1oykhummAttribute = $Vwcb1oykhummElement->attributes->item($Vxja1abp34yq);
                $Vs4nw03sqcamAttribute   = $Vs4nw03sqcamElement->attributes->getNamedItem(
                    $Vwcb1oykhummAttribute->name
                );

                if (!$Vs4nw03sqcamAttribute) {
                    self::fail(
                        sprintf(
                            '%s%sCould not find attribute "%s" on node "%s"',
                            $Vbl4yrmdan1y,
                            !empty($Vbl4yrmdan1y) ? "\n" : '',
                            $Vwcb1oykhummAttribute->name,
                            $Vwcb1oykhummElement->tagName
                        )
                    );
                }
            }
        }

        PHPUnit_Util_XML::removeCharacterDataNodes($Vwcb1oykhummElement);
        PHPUnit_Util_XML::removeCharacterDataNodes($Vs4nw03sqcamElement);

        self::assertEquals(
            $Vwcb1oykhummElement->childNodes->length,
            $Vs4nw03sqcamElement->childNodes->length,
            sprintf(
                '%s%sNumber of child nodes of "%s" differs',
                $Vbl4yrmdan1y,
                !empty($Vbl4yrmdan1y) ? "\n" : '',
                $Vwcb1oykhummElement->tagName
            )
        );

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vwcb1oykhummElement->childNodes->length; $Vxja1abp34yq++) {
            self::assertEqualXMLStructure(
                $Vwcb1oykhummElement->childNodes->item($Vxja1abp34yq),
                $Vs4nw03sqcamElement->childNodes->item($Vxja1abp34yq),
                $Vt3bm5rodknb,
                $Vbl4yrmdan1y
            );
        }
    }

    
    public static function assertSelectCount($V1hhloxwgmev, $Vdbkece3gnp5, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vxja1abp34yqsHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        self::assertSelectEquals(
            $V1hhloxwgmev,
            true,
            $Vdbkece3gnp5,
            $Vs4nw03sqcam,
            $Vbl4yrmdan1y,
            $Vxja1abp34yqsHtml
        );
    }

    
    public static function assertSelectRegExp($V1hhloxwgmev, $Vp1x1qfledcv, $Vdbkece3gnp5, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vxja1abp34yqsHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        self::assertSelectEquals(
            $V1hhloxwgmev,
            "regexp:$Vp1x1qfledcv",
            $Vdbkece3gnp5,
            $Vs4nw03sqcam,
            $Vbl4yrmdan1y,
            $Vxja1abp34yqsHtml
        );
    }

    
    public static function assertSelectEquals($V1hhloxwgmev, $Vjdkyvjsoqdn, $Vdbkece3gnp5, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vxja1abp34yqsHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $Vi1vla5oesiw = PHPUnit_Util_XML::cssSelect(
            $V1hhloxwgmev,
            $Vjdkyvjsoqdn,
            $Vs4nw03sqcam,
            $Vxja1abp34yqsHtml
        );

        
        if (is_numeric($Vdbkece3gnp5)) {
            $Vdbkece3gnp5ed = $Vi1vla5oesiw ? count($Vi1vla5oesiw) : 0;
            self::assertEquals($Vdbkece3gnp5, $Vdbkece3gnp5ed, $Vbl4yrmdan1y);
        } 
        elseif (is_bool($Vdbkece3gnp5)) {
            $Vo5xq4yetjpn = count($Vi1vla5oesiw) > 0 && $Vi1vla5oesiw[0] instanceof DOMNode;

            if ($Vdbkece3gnp5) {
                self::assertTrue($Vo5xq4yetjpn, $Vbl4yrmdan1y);
            } else {
                self::assertFalse($Vo5xq4yetjpn, $Vbl4yrmdan1y);
            }
        } 
        elseif (is_array($Vdbkece3gnp5) &&
                (isset($Vdbkece3gnp5['>']) || isset($Vdbkece3gnp5['<']) ||
                isset($Vdbkece3gnp5['>=']) || isset($Vdbkece3gnp5['<=']))) {
            $Vdbkece3gnp5ed = $Vi1vla5oesiw ? count($Vi1vla5oesiw) : 0;

            if (isset($Vdbkece3gnp5['>'])) {
                self::assertTrue($Vdbkece3gnp5ed > $Vdbkece3gnp5['>'], $Vbl4yrmdan1y);
            }

            if (isset($Vdbkece3gnp5['>='])) {
                self::assertTrue($Vdbkece3gnp5ed >= $Vdbkece3gnp5['>='], $Vbl4yrmdan1y);
            }

            if (isset($Vdbkece3gnp5['<'])) {
                self::assertTrue($Vdbkece3gnp5ed < $Vdbkece3gnp5['<'], $Vbl4yrmdan1y);
            }

            if (isset($Vdbkece3gnp5['<='])) {
                self::assertTrue($Vdbkece3gnp5ed <= $Vdbkece3gnp5['<='], $Vbl4yrmdan1y);
            }
        } else {
            throw new PHPUnit_Framework_Exception;
        }
    }

    
    public static function assertTag($V22uxeddyuqg, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vxja1abp34yqsHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $Veu4emafikgi     = PHPUnit_Util_XML::load($Vs4nw03sqcam, $Vxja1abp34yqsHtml);
        $Vi1vla5oesiw    = PHPUnit_Util_XML::findNodes($Veu4emafikgi, $V22uxeddyuqg, $Vxja1abp34yqsHtml);
        $Vpvytx3cjkno = count($Vi1vla5oesiw) > 0 && $Vi1vla5oesiw[0] instanceof DOMNode;

        self::assertTrue($Vpvytx3cjkno, $Vbl4yrmdan1y);
    }

    
    public static function assertNotTag($V22uxeddyuqg, $Vs4nw03sqcam, $Vbl4yrmdan1y = '', $Vxja1abp34yqsHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $Veu4emafikgi     = PHPUnit_Util_XML::load($Vs4nw03sqcam, $Vxja1abp34yqsHtml);
        $Vi1vla5oesiw    = PHPUnit_Util_XML::findNodes($Veu4emafikgi, $V22uxeddyuqg, $Vxja1abp34yqsHtml);
        $Vpvytx3cjkno = count($Vi1vla5oesiw) > 0 && $Vi1vla5oesiw[0] instanceof DOMNode;

        self::assertFalse($Vpvytx3cjkno, $Vbl4yrmdan1y);
    }

    
    public static function assertThat($Vcptarsq5qe4, PHPUnit_Framework_Constraint $Veup52kdjcwg, $Vbl4yrmdan1y = '')
    {
        self::$Vdbkece3gnp5 += count($Veup52kdjcwg);

        $Veup52kdjcwg->evaluate($Vcptarsq5qe4, $Vbl4yrmdan1y);
    }

    
    public static function assertJson($Vs4nw03sqcamJson, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vs4nw03sqcamJson)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        self::assertThat($Vs4nw03sqcamJson, self::isJson(), $Vbl4yrmdan1y);
    }

    
    public static function assertJsonStringEqualsJsonString($Vwcb1oykhummJson, $Vs4nw03sqcamJson, $Vbl4yrmdan1y = '')
    {
        self::assertJson($Vwcb1oykhummJson, $Vbl4yrmdan1y);
        self::assertJson($Vs4nw03sqcamJson, $Vbl4yrmdan1y);

        $Vwcb1oykhumm = json_decode($Vwcb1oykhummJson);
        $Vs4nw03sqcam   = json_decode($Vs4nw03sqcamJson);

        self::assertEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertJsonStringNotEqualsJsonString($Vwcb1oykhummJson, $Vs4nw03sqcamJson, $Vbl4yrmdan1y = '')
    {
        self::assertJson($Vwcb1oykhummJson, $Vbl4yrmdan1y);
        self::assertJson($Vs4nw03sqcamJson, $Vbl4yrmdan1y);

        $Vwcb1oykhumm = json_decode($Vwcb1oykhummJson);
        $Vs4nw03sqcam   = json_decode($Vs4nw03sqcamJson);

        self::assertNotEquals($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y);
    }

    
    public static function assertJsonStringEqualsJsonFile($Vwcb1oykhummFile, $Vs4nw03sqcamJson, $Vbl4yrmdan1y = '')
    {
        self::assertFileExists($Vwcb1oykhummFile, $Vbl4yrmdan1y);
        $Vwcb1oykhummJson = file_get_contents($Vwcb1oykhummFile);

        self::assertJson($Vwcb1oykhummJson, $Vbl4yrmdan1y);
        self::assertJson($Vs4nw03sqcamJson, $Vbl4yrmdan1y);

        
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_JsonMatches(
            $Vwcb1oykhummJson
        );

        self::assertThat($Vs4nw03sqcamJson, $Veup52kdjcwg, $Vbl4yrmdan1y);
    }

    
    public static function assertJsonStringNotEqualsJsonFile($Vwcb1oykhummFile, $Vs4nw03sqcamJson, $Vbl4yrmdan1y = '')
    {
        self::assertFileExists($Vwcb1oykhummFile, $Vbl4yrmdan1y);
        $Vwcb1oykhummJson = file_get_contents($Vwcb1oykhummFile);

        self::assertJson($Vwcb1oykhummJson, $Vbl4yrmdan1y);
        self::assertJson($Vs4nw03sqcamJson, $Vbl4yrmdan1y);

        
        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_JsonMatches(
            $Vwcb1oykhummJson
        );

        self::assertThat($Vs4nw03sqcamJson, new PHPUnit_Framework_Constraint_Not($Veup52kdjcwg), $Vbl4yrmdan1y);
    }

    
    public static function assertJsonFileNotEqualsJsonFile($Vwcb1oykhummFile, $Vs4nw03sqcamFile, $Vbl4yrmdan1y = '')
    {
        self::assertFileExists($Vwcb1oykhummFile, $Vbl4yrmdan1y);
        self::assertFileExists($Vs4nw03sqcamFile, $Vbl4yrmdan1y);

        $Vs4nw03sqcamJson   = file_get_contents($Vs4nw03sqcamFile);
        $Vwcb1oykhummJson = file_get_contents($Vwcb1oykhummFile);

        self::assertJson($Vwcb1oykhummJson, $Vbl4yrmdan1y);
        self::assertJson($Vs4nw03sqcamJson, $Vbl4yrmdan1y);

        
        $Veup52kdjcwgExpected = new PHPUnit_Framework_Constraint_JsonMatches(
            $Vwcb1oykhummJson
        );

        $Veup52kdjcwgActual = new PHPUnit_Framework_Constraint_JsonMatches($Vs4nw03sqcamJson);

        self::assertThat($Vwcb1oykhummJson, new PHPUnit_Framework_Constraint_Not($Veup52kdjcwgActual), $Vbl4yrmdan1y);
        self::assertThat($Vs4nw03sqcamJson, new PHPUnit_Framework_Constraint_Not($Veup52kdjcwgExpected), $Vbl4yrmdan1y);
    }

    
    public static function assertJsonFileEqualsJsonFile($Vwcb1oykhummFile, $Vs4nw03sqcamFile, $Vbl4yrmdan1y = '')
    {
        self::assertFileExists($Vwcb1oykhummFile, $Vbl4yrmdan1y);
        self::assertFileExists($Vs4nw03sqcamFile, $Vbl4yrmdan1y);

        $Vs4nw03sqcamJson   = file_get_contents($Vs4nw03sqcamFile);
        $Vwcb1oykhummJson = file_get_contents($Vwcb1oykhummFile);

        self::assertJson($Vwcb1oykhummJson, $Vbl4yrmdan1y);
        self::assertJson($Vs4nw03sqcamJson, $Vbl4yrmdan1y);

        
        $Veup52kdjcwgExpected = new PHPUnit_Framework_Constraint_JsonMatches(
            $Vwcb1oykhummJson
        );

        $Veup52kdjcwgActual = new PHPUnit_Framework_Constraint_JsonMatches($Vs4nw03sqcamJson);

        self::assertThat($Vwcb1oykhummJson, $Veup52kdjcwgActual, $Vbl4yrmdan1y);
        self::assertThat($Vs4nw03sqcamJson, $Veup52kdjcwgExpected, $Vbl4yrmdan1y);
    }

    
    public static function logicalAnd()
    {
        $Veup52kdjcwgs = func_get_args();

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_And;
        $Veup52kdjcwg->setConstraints($Veup52kdjcwgs);

        return $Veup52kdjcwg;
    }

    
    public static function logicalOr()
    {
        $Veup52kdjcwgs = func_get_args();

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Or;
        $Veup52kdjcwg->setConstraints($Veup52kdjcwgs);

        return $Veup52kdjcwg;
    }

    
    public static function logicalNot(PHPUnit_Framework_Constraint $Veup52kdjcwg)
    {
        return new PHPUnit_Framework_Constraint_Not($Veup52kdjcwg);
    }

    
    public static function logicalXor()
    {
        $Veup52kdjcwgs = func_get_args();

        $Veup52kdjcwg = new PHPUnit_Framework_Constraint_Xor;
        $Veup52kdjcwg->setConstraints($Veup52kdjcwgs);

        return $Veup52kdjcwg;
    }

    
    public static function anything()
    {
        return new PHPUnit_Framework_Constraint_IsAnything;
    }

    
    public static function isTrue()
    {
        return new PHPUnit_Framework_Constraint_IsTrue;
    }

    
    public static function callback($Vbbxwjhhenxj)
    {
        return new PHPUnit_Framework_Constraint_Callback($Vbbxwjhhenxj);
    }

    
    public static function isFalse()
    {
        return new PHPUnit_Framework_Constraint_IsFalse;
    }

    
    public static function isJson()
    {
        return new PHPUnit_Framework_Constraint_IsJson;
    }

    
    public static function isNull()
    {
        return new PHPUnit_Framework_Constraint_IsNull;
    }

    
    public static function attribute(PHPUnit_Framework_Constraint $Veup52kdjcwg, $Vwdqynfrh4s0)
    {
        return new PHPUnit_Framework_Constraint_Attribute(
            $Veup52kdjcwg,
            $Vwdqynfrh4s0
        );
    }

    
    public static function contains($Vcptarsq5qe4, $Vxtveoqpekh0 = true, $Vt3lircrduno = false)
    {
        return new PHPUnit_Framework_Constraint_TraversableContains($Vcptarsq5qe4, $Vxtveoqpekh0, $Vt3lircrduno);
    }

    
    public static function containsOnly($V31qrja1w0r2)
    {
        return new PHPUnit_Framework_Constraint_TraversableContainsOnly($V31qrja1w0r2);
    }

    
    public static function containsOnlyInstancesOf($V3ngkdmbo02c)
    {
        return new PHPUnit_Framework_Constraint_TraversableContainsOnly($V3ngkdmbo02c, false);
    }

    
    public static function arrayHasKey($Vlpbz5aloxqt)
    {
        return new PHPUnit_Framework_Constraint_ArrayHasKey($Vlpbz5aloxqt);
    }

    
    public static function equalTo($Vcptarsq5qe4, $Vxo5kvys4l4m = 0.0, $Vcv5mgbh5qwg = 10, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        return new PHPUnit_Framework_Constraint_IsEqual(
            $Vcptarsq5qe4,
            $Vxo5kvys4l4m,
            $Vcv5mgbh5qwg,
            $Vgxxhufhstfx,
            $V2tcbx0tpkh3
        );
    }

    
    public static function attributeEqualTo($Vwdqynfrh4s0, $Vcptarsq5qe4, $Vxo5kvys4l4m = 0.0, $Vcv5mgbh5qwg = 10, $Vgxxhufhstfx = false, $V2tcbx0tpkh3 = false)
    {
        return self::attribute(
            self::equalTo(
                $Vcptarsq5qe4,
                $Vxo5kvys4l4m,
                $Vcv5mgbh5qwg,
                $Vgxxhufhstfx,
                $V2tcbx0tpkh3
            ),
            $Vwdqynfrh4s0
        );
    }

    
    public static function isEmpty()
    {
        return new PHPUnit_Framework_Constraint_IsEmpty;
    }

    
    public static function fileExists()
    {
        return new PHPUnit_Framework_Constraint_FileExists;
    }

    
    public static function greaterThan($Vcptarsq5qe4)
    {
        return new PHPUnit_Framework_Constraint_GreaterThan($Vcptarsq5qe4);
    }

    
    public static function greaterThanOrEqual($Vcptarsq5qe4)
    {
        return self::logicalOr(
            new PHPUnit_Framework_Constraint_IsEqual($Vcptarsq5qe4),
            new PHPUnit_Framework_Constraint_GreaterThan($Vcptarsq5qe4)
        );
    }

    
    public static function classHasAttribute($Vwdqynfrh4s0)
    {
        return new PHPUnit_Framework_Constraint_ClassHasAttribute(
            $Vwdqynfrh4s0
        );
    }

    
    public static function classHasStaticAttribute($Vwdqynfrh4s0)
    {
        return new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
            $Vwdqynfrh4s0
        );
    }

    
    public static function objectHasAttribute($Vwdqynfrh4s0)
    {
        return new PHPUnit_Framework_Constraint_ObjectHasAttribute(
            $Vwdqynfrh4s0
        );
    }

    
    public static function identicalTo($Vcptarsq5qe4)
    {
        return new PHPUnit_Framework_Constraint_IsIdentical($Vcptarsq5qe4);
    }

    
    public static function isInstanceOf($Vh0iae5cev4i)
    {
        return new PHPUnit_Framework_Constraint_IsInstanceOf($Vh0iae5cev4i);
    }

    
    public static function isType($V31qrja1w0r2)
    {
        return new PHPUnit_Framework_Constraint_IsType($V31qrja1w0r2);
    }

    
    public static function lessThan($Vcptarsq5qe4)
    {
        return new PHPUnit_Framework_Constraint_LessThan($Vcptarsq5qe4);
    }

    
    public static function lessThanOrEqual($Vcptarsq5qe4)
    {
        return self::logicalOr(
            new PHPUnit_Framework_Constraint_IsEqual($Vcptarsq5qe4),
            new PHPUnit_Framework_Constraint_LessThan($Vcptarsq5qe4)
        );
    }

    
    public static function matchesRegularExpression($Vp1x1qfledcv)
    {
        return new PHPUnit_Framework_Constraint_PCREMatch($Vp1x1qfledcv);
    }

    
    public static function matches($Ve5tcsso230g)
    {
        return new PHPUnit_Framework_Constraint_StringMatches($Ve5tcsso230g);
    }

    
    public static function stringStartsWith($V2hf2uebv5m0)
    {
        return new PHPUnit_Framework_Constraint_StringStartsWith($V2hf2uebv5m0);
    }

    
    public static function stringContains($Ve5tcsso230g, $Vh0wypeklq43 = true)
    {
        return new PHPUnit_Framework_Constraint_StringContains($Ve5tcsso230g, $Vh0wypeklq43);
    }

    
    public static function stringEndsWith($V52q32upexbe)
    {
        return new PHPUnit_Framework_Constraint_StringEndsWith($V52q32upexbe);
    }

    
    public static function countOf($Vdbkece3gnp5)
    {
        return new PHPUnit_Framework_Constraint_Count($Vdbkece3gnp5);
    }
    
    public static function fail($Vbl4yrmdan1y = '')
    {
        throw new PHPUnit_Framework_AssertionFailedError($Vbl4yrmdan1y);
    }

    
    public static function readAttribute($Vv5tonsb2daz, $Vwdqynfrh4s0)
    {
        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
        }

        if (is_string($Vv5tonsb2daz)) {
            if (!class_exists($Vv5tonsb2daz)) {
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
                    1,
                    'class name'
                );
            }

            return self::getStaticAttribute(
                $Vv5tonsb2daz,
                $Vwdqynfrh4s0
            );
        } elseif (is_object($Vv5tonsb2daz)) {
            return self::getObjectAttribute(
                $Vv5tonsb2daz,
                $Vwdqynfrh4s0
            );
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'class name or object'
            );
        }
    }

    
    public static function getStaticAttribute($Vh0iae5cev4i, $Vwdqynfrh4s0)
    {
        if (!is_string($Vh0iae5cev4i)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!class_exists($Vh0iae5cev4i)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class name');
        }

        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
        }

        $Vqmu1sajhgfn = new ReflectionClass($Vh0iae5cev4i);

        while ($Vqmu1sajhgfn) {
            $Vfwhzdv2bggu = $Vqmu1sajhgfn->getStaticProperties();

            if (array_key_exists($Vwdqynfrh4s0, $Vfwhzdv2bggu)) {
                return $Vfwhzdv2bggu[$Vwdqynfrh4s0];
            }

            $Vqmu1sajhgfn = $Vqmu1sajhgfn->getParentClass();
        }

        throw new PHPUnit_Framework_Exception(
            sprintf(
                'Attribute "%s" not found in class.',
                $Vwdqynfrh4s0
            )
        );
    }

    
    public static function getObjectAttribute($Vbj3pw2f5egf, $Vwdqynfrh4s0)
    {
        if (!is_object($Vbj3pw2f5egf)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'object');
        }

        if (!is_string($Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $Vwdqynfrh4s0)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
        }

        try {
            $Vxw4jdz2m4w0 = new ReflectionProperty($Vbj3pw2f5egf, $Vwdqynfrh4s0);
        } catch (ReflectionException $Vpt32vvhspnv) {
            $Vf4nbpoij40n = new ReflectionObject($Vbj3pw2f5egf);

            while ($Vf4nbpoij40n = $Vf4nbpoij40n->getParentClass()) {
                try {
                    $Vxw4jdz2m4w0 = $Vf4nbpoij40n->getProperty($Vwdqynfrh4s0);
                    break;
                } catch (ReflectionException $Vpt32vvhspnv) {
                }
            }
        }

        if (isset($Vxw4jdz2m4w0)) {
            if (!$Vxw4jdz2m4w0 || $Vxw4jdz2m4w0->isPublic()) {
                return $Vbj3pw2f5egf->$Vwdqynfrh4s0;
            }

            $Vxw4jdz2m4w0->setAccessible(true);
            $Vcptarsq5qe4 = $Vxw4jdz2m4w0->getValue($Vbj3pw2f5egf);
            $Vxw4jdz2m4w0->setAccessible(false);

            return $Vcptarsq5qe4;
        }

        throw new PHPUnit_Framework_Exception(
            sprintf(
                'Attribute "%s" not found in object.',
                $Vwdqynfrh4s0
            )
        );
    }

    
    public static function markTestIncomplete($Vbl4yrmdan1y = '')
    {
        throw new PHPUnit_Framework_IncompleteTestError($Vbl4yrmdan1y);
    }

    
    public static function markTestSkipped($Vbl4yrmdan1y = '')
    {
        throw new PHPUnit_Framework_SkippedTestError($Vbl4yrmdan1y);
    }

    
    public static function getCount()
    {
        return self::$Vdbkece3gnp5;
    }

    
    public static function resetCount()
    {
        self::$Vdbkece3gnp5 = 0;
    }
}
