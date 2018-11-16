<?php



namespace Webmozart\Assert;

use ArrayAccess;
use BadMethodCallException;
use Closure;
use Countable;
use Exception;
use InvalidArgumentException;
use Throwable;
use Traversable;


class Assert
{
    public static function string($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_string($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a string. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function stringNotEmpty($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        static::string($Vcptarsq5qe4, $Vbl4yrmdan1y);
        static::notEq($Vcptarsq5qe4, '', $Vbl4yrmdan1y);
    }

    public static function integer($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_int($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an integer. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function integerish($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_numeric($Vcptarsq5qe4) || $Vcptarsq5qe4 != (int) $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an integerish value. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function float($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_float($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a float. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function numeric($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_numeric($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a numeric. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function natural($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_int($Vcptarsq5qe4) || $Vcptarsq5qe4 < 0) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a non-negative integer. Got %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function boolean($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_bool($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a boolean. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function scalar($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_scalar($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a scalar. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function object($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_object($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an object. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function resource($Vcptarsq5qe4, $V31qrja1w0r2 = null, $Vbl4yrmdan1y = '')
    {
        if (!is_resource($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a resource. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }

        if ($V31qrja1w0r2 && $V31qrja1w0r2 !== get_resource_type($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a resource of type %2$Vomn1oia4yqy. Got: %s',
                static::typeToString($Vcptarsq5qe4),
                $V31qrja1w0r2
            ));
        }
    }

    public static function isCallable($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_callable($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a callable. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function isArray($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_array($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an array. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function isTraversable($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        @trigger_error(
            sprintf(
                'The "%s" assertion is deprecated. You should stop using it, as it will soon be removed in 2.0 version. Use "isIterable" or "isInstanceOf" instead.',
                __METHOD__
            ),
            E_USER_DEPRECATED
        );

        if (!is_array($Vcptarsq5qe4) && !($Vcptarsq5qe4 instanceof Traversable)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a traversable. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function isArrayAccessible($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_array($Vcptarsq5qe4) && !($Vcptarsq5qe4 instanceof ArrayAccess)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an array accessible. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function isCountable($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_array($Vcptarsq5qe4) && !($Vcptarsq5qe4 instanceof Countable)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a countable. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function isIterable($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_array($Vcptarsq5qe4) && !($Vcptarsq5qe4 instanceof Traversable)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an iterable. Got: %s',
                static::typeToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function isInstanceOf($Vcptarsq5qe4, $Vqmu1sajhgfn, $Vbl4yrmdan1y = '')
    {
        if (!($Vcptarsq5qe4 instanceof $Vqmu1sajhgfn)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an instance of %2$Vomn1oia4yqy. Got: %s',
                static::typeToString($Vcptarsq5qe4),
                $Vqmu1sajhgfn
            ));
        }
    }

    public static function notInstanceOf($Vcptarsq5qe4, $Vqmu1sajhgfn, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe4 instanceof $Vqmu1sajhgfn) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an instance other than %2$Vomn1oia4yqy. Got: %s',
                static::typeToString($Vcptarsq5qe4),
                $Vqmu1sajhgfn
            ));
        }
    }

    public static function isInstanceOfAny($Vcptarsq5qe4, array $Vqmu1sajhgfnes, $Vbl4yrmdan1y = '')
    {
        foreach ($Vqmu1sajhgfnes as $Vqmu1sajhgfn) {
            if ($Vcptarsq5qe4 instanceof $Vqmu1sajhgfn) {
                return;
            }
        }

        static::reportInvalidArgument(sprintf(
            $Vbl4yrmdan1y ?: 'Expected an instance of any of %2$Vomn1oia4yqy. Got: %s',
            static::typeToString($Vcptarsq5qe4),
            implode(', ', array_map(array('static', 'valueToString'), $Vqmu1sajhgfnes))
        ));
    }

    public static function isEmpty($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!empty($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an empty value. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function notEmpty($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (empty($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a non-empty value. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function null($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (null !== $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected null. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function notNull($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (null === $Vcptarsq5qe4) {
            static::reportInvalidArgument(
                $Vbl4yrmdan1y ?: 'Expected a value other than null.'
            );
        }
    }

    public static function true($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (true !== $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to be true. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function false($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (false !== $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to be false. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function eq($Vcptarsq5qe4, $Vcptarsq5qe42, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe42 != $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value equal to %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vcptarsq5qe42)
            ));
        }
    }

    public static function notEq($Vcptarsq5qe4, $Vcptarsq5qe42, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe42 == $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a different value than %s.',
                static::valueToString($Vcptarsq5qe42)
            ));
        }
    }

    public static function same($Vcptarsq5qe4, $Vcptarsq5qe42, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe42 !== $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value identical to %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vcptarsq5qe42)
            ));
        }
    }

    public static function notSame($Vcptarsq5qe4, $Vcptarsq5qe42, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe42 === $Vcptarsq5qe4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value not identical to %s.',
                static::valueToString($Vcptarsq5qe42)
            ));
        }
    }

    public static function greaterThan($Vcptarsq5qe4, $Vc2m5xjqqwv4, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe4 <= $Vc2m5xjqqwv4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value greater than %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vc2m5xjqqwv4)
            ));
        }
    }

    public static function greaterThanEq($Vcptarsq5qe4, $Vc2m5xjqqwv4, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe4 < $Vc2m5xjqqwv4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value greater than or equal to %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vc2m5xjqqwv4)
            ));
        }
    }

    public static function lessThan($Vcptarsq5qe4, $Vc2m5xjqqwv4, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe4 >= $Vc2m5xjqqwv4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value less than %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vc2m5xjqqwv4)
            ));
        }
    }

    public static function lessThanEq($Vcptarsq5qe4, $Vc2m5xjqqwv4, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe4 > $Vc2m5xjqqwv4) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value less than or equal to %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vc2m5xjqqwv4)
            ));
        }
    }

    public static function range($Vcptarsq5qe4, $V3xof3zyg10m, $Vbulqadoj2ef, $Vbl4yrmdan1y = '')
    {
        if ($Vcptarsq5qe4 < $V3xof3zyg10m || $Vcptarsq5qe4 > $Vbulqadoj2ef) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value between %2$Vomn1oia4yqy and %3$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($V3xof3zyg10m),
                static::valueToString($Vbulqadoj2ef)
            ));
        }
    }

    public static function oneOf($Vcptarsq5qe4, array $Vcptarsq5qe4s, $Vbl4yrmdan1y = '')
    {
        if (!in_array($Vcptarsq5qe4, $Vcptarsq5qe4s, true)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected one of: %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                implode(', ', array_map(array('static', 'valueToString'), $Vcptarsq5qe4s))
            ));
        }
    }

    public static function contains($Vcptarsq5qe4, $Vomn1oia4yqyubString, $Vbl4yrmdan1y = '')
    {
        if (false === strpos($Vcptarsq5qe4, $Vomn1oia4yqyubString)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vomn1oia4yqyubString)
            ));
        }
    }

    public static function notContains($Vcptarsq5qe4, $Vomn1oia4yqyubString, $Vbl4yrmdan1y = '')
    {
        if (false !== strpos($Vcptarsq5qe4, $Vomn1oia4yqyubString)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: '%2$Vomn1oia4yqy was not expected to be contained in a value. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vomn1oia4yqyubString)
            ));
        }
    }

    public static function notWhitespaceOnly($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (preg_match('/^\s*$/', $Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a non-whitespace string. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function startsWith($Vcptarsq5qe4, $V2hf2uebv5m0, $Vbl4yrmdan1y = '')
    {
        if (0 !== strpos($Vcptarsq5qe4, $V2hf2uebv5m0)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to start with %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($V2hf2uebv5m0)
            ));
        }
    }

    public static function startsWithLetter($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        $Vwktyfaiy3w3 = isset($Vcptarsq5qe4[0]);

        if ($Vwktyfaiy3w3) {
            $Vbzxpjv3aqae = setlocale(LC_CTYPE, 0);
            setlocale(LC_CTYPE, 'C');
            $Vwktyfaiy3w3 = ctype_alpha($Vcptarsq5qe4[0]);
            setlocale(LC_CTYPE, $Vbzxpjv3aqae);
        }

        if (!$Vwktyfaiy3w3) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to start with a letter. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function endsWith($Vcptarsq5qe4, $Vomn1oia4yqyuffix, $Vbl4yrmdan1y = '')
    {
        if ($Vomn1oia4yqyuffix !== substr($Vcptarsq5qe4, -static::strlen($Vomn1oia4yqyuffix))) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to end with %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vomn1oia4yqyuffix)
            ));
        }
    }

    public static function regex($Vcptarsq5qe4, $Vp1x1qfledcv, $Vbl4yrmdan1y = '')
    {
        if (!preg_match($Vp1x1qfledcv, $Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'The value %s does not match the expected pattern.',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function alpha($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        $Vbzxpjv3aqae = setlocale(LC_CTYPE, 0);
        setlocale(LC_CTYPE, 'C');
        $Vwktyfaiy3w3 = !ctype_alpha($Vcptarsq5qe4);
        setlocale(LC_CTYPE, $Vbzxpjv3aqae);

        if ($Vwktyfaiy3w3) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain only letters. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function digits($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        $Vbzxpjv3aqae = setlocale(LC_CTYPE, 0);
        setlocale(LC_CTYPE, 'C');
        $Vwktyfaiy3w3 = !ctype_digit($Vcptarsq5qe4);
        setlocale(LC_CTYPE, $Vbzxpjv3aqae);

        if ($Vwktyfaiy3w3) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain digits only. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function alnum($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        $Vbzxpjv3aqae = setlocale(LC_CTYPE, 0);
        setlocale(LC_CTYPE, 'C');
        $Vwktyfaiy3w3 = !ctype_alnum($Vcptarsq5qe4);
        setlocale(LC_CTYPE, $Vbzxpjv3aqae);

        if ($Vwktyfaiy3w3) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain letters and digits only. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function lower($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        $Vbzxpjv3aqae = setlocale(LC_CTYPE, 0);
        setlocale(LC_CTYPE, 'C');
        $Vwktyfaiy3w3 = !ctype_lower($Vcptarsq5qe4);
        setlocale(LC_CTYPE, $Vbzxpjv3aqae);

        if ($Vwktyfaiy3w3) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain lowercase characters only. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function upper($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        $Vbzxpjv3aqae = setlocale(LC_CTYPE, 0);
        setlocale(LC_CTYPE, 'C');
        $Vwktyfaiy3w3 = !ctype_upper($Vcptarsq5qe4);
        setlocale(LC_CTYPE, $Vbzxpjv3aqae);

        if ($Vwktyfaiy3w3) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain uppercase characters only. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function length($Vcptarsq5qe4, $Vxbsqvaghf5p, $Vbl4yrmdan1y = '')
    {
        if ($Vxbsqvaghf5p !== static::strlen($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain %2$Vomn1oia4yqy characters. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                $Vxbsqvaghf5p
            ));
        }
    }

    public static function minLength($Vcptarsq5qe4, $V3xof3zyg10m, $Vbl4yrmdan1y = '')
    {
        if (static::strlen($Vcptarsq5qe4) < $V3xof3zyg10m) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain at least %2$Vomn1oia4yqy characters. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                $V3xof3zyg10m
            ));
        }
    }

    public static function maxLength($Vcptarsq5qe4, $Vbulqadoj2ef, $Vbl4yrmdan1y = '')
    {
        if (static::strlen($Vcptarsq5qe4) > $Vbulqadoj2ef) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain at most %2$Vomn1oia4yqy characters. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                $Vbulqadoj2ef
            ));
        }
    }

    public static function lengthBetween($Vcptarsq5qe4, $V3xof3zyg10m, $Vbulqadoj2ef, $Vbl4yrmdan1y = '')
    {
        $Vxbsqvaghf5p = static::strlen($Vcptarsq5qe4);

        if ($Vxbsqvaghf5p < $V3xof3zyg10m || $Vxbsqvaghf5p > $Vbulqadoj2ef) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a value to contain between %2$Vomn1oia4yqy and %3$Vomn1oia4yqy characters. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                $V3xof3zyg10m,
                $Vbulqadoj2ef
            ));
        }
    }

    public static function fileExists($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        static::string($Vcptarsq5qe4);

        if (!file_exists($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'The file %s does not exist.',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function file($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        static::fileExists($Vcptarsq5qe4, $Vbl4yrmdan1y);

        if (!is_file($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'The path %s is not a file.',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function directory($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        static::fileExists($Vcptarsq5qe4, $Vbl4yrmdan1y);

        if (!is_dir($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'The path %s is no directory.',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function readable($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_readable($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'The path %s is not readable.',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function writable($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!is_writable($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'The path %s is not writable.',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function classExists($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        if (!class_exists($Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an existing class name. Got: %s',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function subclassOf($Vcptarsq5qe4, $Vqmu1sajhgfn, $Vbl4yrmdan1y = '')
    {
        if (!is_subclass_of($Vcptarsq5qe4, $Vqmu1sajhgfn)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected a sub-class of %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vqmu1sajhgfn)
            ));
        }
    }

    public static function implementsInterface($Vcptarsq5qe4, $Vblpzgjj4s3y, $Vbl4yrmdan1y = '')
    {
        if (!in_array($Vblpzgjj4s3y, class_implements($Vcptarsq5qe4))) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an implementation of %2$Vomn1oia4yqy. Got: %s',
                static::valueToString($Vcptarsq5qe4),
                static::valueToString($Vblpzgjj4s3y)
            ));
        }
    }

    public static function propertyExists($Vqmu1sajhgfnOrObject, $Vjxlqobactuh, $Vbl4yrmdan1y = '')
    {
        if (!property_exists($Vqmu1sajhgfnOrObject, $Vjxlqobactuh)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected the property %s to exist.',
                static::valueToString($Vjxlqobactuh)
            ));
        }
    }

    public static function propertyNotExists($Vqmu1sajhgfnOrObject, $Vjxlqobactuh, $Vbl4yrmdan1y = '')
    {
        if (property_exists($Vqmu1sajhgfnOrObject, $Vjxlqobactuh)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected the property %s to not exist.',
                static::valueToString($Vjxlqobactuh)
            ));
        }
    }

    public static function methodExists($Vqmu1sajhgfnOrObject, $Vtlfvdwskdge, $Vbl4yrmdan1y = '')
    {
        if (!method_exists($Vqmu1sajhgfnOrObject, $Vtlfvdwskdge)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected the method %s to exist.',
                static::valueToString($Vtlfvdwskdge)
            ));
        }
    }

    public static function methodNotExists($Vqmu1sajhgfnOrObject, $Vtlfvdwskdge, $Vbl4yrmdan1y = '')
    {
        if (method_exists($Vqmu1sajhgfnOrObject, $Vtlfvdwskdge)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected the method %s to not exist.',
                static::valueToString($Vtlfvdwskdge)
            ));
        }
    }

    public static function keyExists($Vvs0hc5bhqj3, $Vlpbz5aloxqt, $Vbl4yrmdan1y = '')
    {
        if (!array_key_exists($Vlpbz5aloxqt, $Vvs0hc5bhqj3)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected the key %s to exist.',
                static::valueToString($Vlpbz5aloxqt)
            ));
        }
    }

    public static function keyNotExists($Vvs0hc5bhqj3, $Vlpbz5aloxqt, $Vbl4yrmdan1y = '')
    {
        if (array_key_exists($Vlpbz5aloxqt, $Vvs0hc5bhqj3)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected the key %s to not exist.',
                static::valueToString($Vlpbz5aloxqt)
            ));
        }
    }

    public static function count($Vvs0hc5bhqj3, $Vjndaa5l5fzc, $Vbl4yrmdan1y = '')
    {
        static::eq(
            count($Vvs0hc5bhqj3),
            $Vjndaa5l5fzc,
            $Vbl4yrmdan1y ?: sprintf('Expected an array to contain %d elements. Got: %d.', $Vjndaa5l5fzc, count($Vvs0hc5bhqj3))
        );
    }

    public static function minCount($Vvs0hc5bhqj3, $V3xof3zyg10m, $Vbl4yrmdan1y = '')
    {
        if (count($Vvs0hc5bhqj3) < $V3xof3zyg10m) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an array to contain at least %2$Vzhkd1voupse elements. Got: %d',
                count($Vvs0hc5bhqj3),
                $V3xof3zyg10m
            ));
        }
    }

    public static function maxCount($Vvs0hc5bhqj3, $Vbulqadoj2ef, $Vbl4yrmdan1y = '')
    {
        if (count($Vvs0hc5bhqj3) > $Vbulqadoj2ef) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an array to contain at most %2$Vzhkd1voupse elements. Got: %d',
                count($Vvs0hc5bhqj3),
                $Vbulqadoj2ef
            ));
        }
    }

    public static function countBetween($Vvs0hc5bhqj3, $V3xof3zyg10m, $Vbulqadoj2ef, $Vbl4yrmdan1y = '')
    {
        $Vdbkece3gnp5 = count($Vvs0hc5bhqj3);

        if ($Vdbkece3gnp5 < $V3xof3zyg10m || $Vdbkece3gnp5 > $Vbulqadoj2ef) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Expected an array to contain between %2$Vzhkd1voupse and %3$Vzhkd1voupse elements. Got: %d',
                $Vdbkece3gnp5,
                $V3xof3zyg10m,
                $Vbulqadoj2ef
            ));
        }
    }

    public static function uuid($Vcptarsq5qe4, $Vbl4yrmdan1y = '')
    {
        $Vcptarsq5qe4 = str_replace(array('urn:', 'uuid:', '{', '}'), '', $Vcptarsq5qe4);

        
        
        if ('00000000-0000-0000-0000-000000000000' === $Vcptarsq5qe4) {
            return;
        }

        if (!preg_match('/^[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}$/', $Vcptarsq5qe4)) {
            static::reportInvalidArgument(sprintf(
                $Vbl4yrmdan1y ?: 'Value %s is not a valid UUID.',
                static::valueToString($Vcptarsq5qe4)
            ));
        }
    }

    public static function throws(Closure $Vdx01sl1ynbt, $Vqmu1sajhgfn = 'Exception', $Vbl4yrmdan1y = '')
    {
        static::string($Vqmu1sajhgfn);

        $Vs4nw03sqcam = 'none';

        try {
            $Vdx01sl1ynbt();
        } catch (Exception $Vpt32vvhspnv) {
            $Vs4nw03sqcam = get_class($Vpt32vvhspnv);
            if ($Vpt32vvhspnv instanceof $Vqmu1sajhgfn) {
                return;
            }
        } catch (Throwable $Vpt32vvhspnv) {
            $Vs4nw03sqcam = get_class($Vpt32vvhspnv);
            if ($Vpt32vvhspnv instanceof $Vqmu1sajhgfn) {
                return;
            }
        }

        static::reportInvalidArgument($Vbl4yrmdan1y ?: sprintf(
            'Expected to throw "%s", got "%s"',
            $Vqmu1sajhgfn,
            $Vs4nw03sqcam
        ));
    }

    public static function __callStatic($Vgpjmw221p0b, $Vj23lbel2xn0)
    {
        if ('nullOr' === substr($Vgpjmw221p0b, 0, 6)) {
            if (null !== $Vj23lbel2xn0[0]) {
                $Vtlfvdwskdge = lcfirst(substr($Vgpjmw221p0b, 6));
                call_user_func_array(array('static', $Vtlfvdwskdge), $Vj23lbel2xn0);
            }

            return;
        }

        if ('all' === substr($Vgpjmw221p0b, 0, 3)) {
            static::isIterable($Vj23lbel2xn0[0]);

            $Vtlfvdwskdge = lcfirst(substr($Vgpjmw221p0b, 3));
            $Veox3iprl5oz = $Vj23lbel2xn0;

            foreach ($Vj23lbel2xn0[0] as $Vpt32vvhspnvntry) {
                $Veox3iprl5oz[0] = $Vpt32vvhspnvntry;

                call_user_func_array(array('static', $Vtlfvdwskdge), $Veox3iprl5oz);
            }

            return;
        }

        throw new BadMethodCallException('No such method: '.$Vgpjmw221p0b);
    }

    protected static function valueToString($Vcptarsq5qe4)
    {
        if (null === $Vcptarsq5qe4) {
            return 'null';
        }

        if (true === $Vcptarsq5qe4) {
            return 'true';
        }

        if (false === $Vcptarsq5qe4) {
            return 'false';
        }

        if (is_array($Vcptarsq5qe4)) {
            return 'array';
        }

        if (is_object($Vcptarsq5qe4)) {
            return get_class($Vcptarsq5qe4);
        }

        if (is_resource($Vcptarsq5qe4)) {
            return 'resource';
        }

        if (is_string($Vcptarsq5qe4)) {
            return '"'.$Vcptarsq5qe4.'"';
        }

        return (string) $Vcptarsq5qe4;
    }

    protected static function typeToString($Vcptarsq5qe4)
    {
        return is_object($Vcptarsq5qe4) ? get_class($Vcptarsq5qe4) : gettype($Vcptarsq5qe4);
    }

    protected static function strlen($Vcptarsq5qe4)
    {
        if (!function_exists('mb_detect_encoding')) {
            return strlen($Vcptarsq5qe4);
        }

        if (false === $Vpt32vvhspnvncoding = mb_detect_encoding($Vcptarsq5qe4)) {
            return strlen($Vcptarsq5qe4);
        }

        return mb_strwidth($Vcptarsq5qe4, $Vpt32vvhspnvncoding);
    }

    protected static function reportInvalidArgument($Vbl4yrmdan1y)
    {
        throw new InvalidArgumentException($Vbl4yrmdan1y);
    }

    private function __construct()
    {
    }
}
