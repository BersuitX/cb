<?php


namespace Tebru;

use Exception;
use LogicException;
use OutOfBoundsException;


function assert($Vydteguilzuv, Exception $Vzzme31ixifp = null)
{
    if ($Vydteguilzuv) {
        return null;
    }

    if (null === $Vzzme31ixifp) {
        $Vzzme31ixifp = new LogicException('Failed asserting condition');
    }

    throw $Vzzme31ixifp;
}


function assertThat($Vydteguilzuv, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 2);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting condition';
    }

    assert($Vydteguilzuv, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertEqual($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 3);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting that "%s" equals "%s"';
        $Vz0ci4nefghc = [$Vs4nw03sqcam, $Vwcb1oykhumm];
    }

    return assert($Vwcb1oykhumm == $Vs4nw03sqcam, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertNotEqual($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 3);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting that "%s" does not equal "%s"';
        $Vz0ci4nefghc = [$Vs4nw03sqcam, $Vwcb1oykhumm];
    }

    return assert($Vwcb1oykhumm != $Vs4nw03sqcam, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertSame($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 3);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting that "%s" is the same as "%s"';
        $Vz0ci4nefghc = [$Vs4nw03sqcam, $Vwcb1oykhumm];
    }

    return assert($Vwcb1oykhumm === $Vs4nw03sqcam, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertNotSame($Vwcb1oykhumm, $Vs4nw03sqcam, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 3);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting that "%s" is not the same as "%s"';
        $Vz0ci4nefghc = [$Vs4nw03sqcam, $Vwcb1oykhumm];
    }

    return assert($Vwcb1oykhumm !== $Vs4nw03sqcam, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertTrue($Vcptarsq5qe4, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 2);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting true';
    }

    return assert(true === $Vcptarsq5qe4, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertFalse($Vcptarsq5qe4, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 2);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting false';
    }

    return assert(false === $Vcptarsq5qe4, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertNull($Vcptarsq5qe4, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 2);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting null';
    }

    return assert(null === $Vcptarsq5qe4, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertNotNull($Vcptarsq5qe4, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 2);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting not null';
    }

    return assert(null !== $Vcptarsq5qe4, new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertArrayKeyExists($Vlpbz5aloxqt, array $Vgk2e5lvvnrn, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 3);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting that key "%s" exists in the array';
        $Vz0ci4nefghc = [$Vlpbz5aloxqt];
    }

    return assert(array_key_exists($Vlpbz5aloxqt, $Vgk2e5lvvnrn), new OutOfBoundsException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertArrayKeyNotExists($Vlpbz5aloxqt, array $Vgk2e5lvvnrn, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 3);

    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting that key "%s" does not exist in the array';
        $Vz0ci4nefghc = [$Vlpbz5aloxqt];
    }

    return assert(!array_key_exists($Vlpbz5aloxqt, $Vgk2e5lvvnrn), new LogicException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}


function assertCount($Vwcb1oykhumm, $Vxaxwucnyuvr, $Vbl4yrmdan1y = null, $Vrbpt4c3l5r1 = null)
{
    $Vz0ci4nefghc = array_slice(func_get_args(), 3);

    $Vbr4gr5n0q5o = count($Vxaxwucnyuvr);
    if (null === $Vbl4yrmdan1y) {
        $Vbl4yrmdan1y = 'Failed asserting that "%d" elements exist, found "%d"';
        $Vz0ci4nefghc = [$Vwcb1oykhumm, $Vbr4gr5n0q5o];
    }

    return assert($Vwcb1oykhumm === $Vbr4gr5n0q5o, new \LengthException(vsprintf($Vbl4yrmdan1y, $Vz0ci4nefghc)));
}
