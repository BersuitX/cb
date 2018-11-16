<?php



namespace Symfony\Component\Yaml;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Exception\DumpException;
use Symfony\Component\Yaml\Tag\TaggedValue;


class Inline
{
    const REGEX_QUOTED_STRING = '(?:"([^"\\\\]*+(?:\\\\.[^"\\\\]*+)*+)"|\'([^\']*+(?:\'\'[^\']*+)*+)\')';

    public static $Vueseakjpz51 = -1;
    public static $Vh3zmzu42fku;

    private static $Vid1pd4wh1ez = false;
    private static $Vygw2amixf4t = false;
    private static $Vvytj5xqcn1e = false;
    private static $V4wtraspjvax = false;

    
    public static function initialize($Vrycsn2lkvcj, $Vueseakjpz51 = null, $Vh3zmzu42fku = null)
    {
        self::$Vid1pd4wh1ez = (bool) (Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE & $Vrycsn2lkvcj);
        self::$Vygw2amixf4t = (bool) (Yaml::PARSE_OBJECT & $Vrycsn2lkvcj);
        self::$Vvytj5xqcn1e = (bool) (Yaml::PARSE_OBJECT_FOR_MAP & $Vrycsn2lkvcj);
        self::$V4wtraspjvax = (bool) (Yaml::PARSE_CONSTANT & $Vrycsn2lkvcj);
        self::$Vh3zmzu42fku = $Vh3zmzu42fku;

        if (null !== $Vueseakjpz51) {
            self::$Vueseakjpz51 = $Vueseakjpz51;
        }
    }

    
    public static function parse($Vcptarsq5qe4, $Vrycsn2lkvcj = 0, $Vjgrjdc3fza1 = array())
    {
        if (is_bool($Vrycsn2lkvcj)) {
            @trigger_error('Passing a boolean flag to toggle exception handling is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE flag instead.', E_USER_DEPRECATED);

            if ($Vrycsn2lkvcj) {
                $Vrycsn2lkvcj = Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE;
            } else {
                $Vrycsn2lkvcj = 0;
            }
        }

        if (func_num_args() >= 3 && !is_array($Vjgrjdc3fza1)) {
            @trigger_error('Passing a boolean flag to toggle object support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::PARSE_OBJECT flag instead.', E_USER_DEPRECATED);

            if ($Vjgrjdc3fza1) {
                $Vrycsn2lkvcj |= Yaml::PARSE_OBJECT;
            }

            if (func_num_args() >= 4) {
                @trigger_error('Passing a boolean flag to toggle object for map support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::PARSE_OBJECT_FOR_MAP flag instead.', E_USER_DEPRECATED);

                if (func_get_arg(3)) {
                    $Vrycsn2lkvcj |= Yaml::PARSE_OBJECT_FOR_MAP;
                }
            }

            if (func_num_args() >= 5) {
                $Vjgrjdc3fza1 = func_get_arg(4);
            } else {
                $Vjgrjdc3fza1 = array();
            }
        }

        self::initialize($Vrycsn2lkvcj);

        $Vcptarsq5qe4 = trim($Vcptarsq5qe4);

        if ('' === $Vcptarsq5qe4) {
            return '';
        }

        if (2  & (int) ini_get('mbstring.func_overload')) {
            $Vu3ow2itb2uy = mb_internal_encoding();
            mb_internal_encoding('ASCII');
        }

        $Vxja1abp34yq = 0;
        $Vl2ijnnhdtam = self::parseTag($Vcptarsq5qe4, $Vxja1abp34yq, $Vrycsn2lkvcj);
        switch ($Vcptarsq5qe4[$Vxja1abp34yq]) {
            case '[':
                $Vv0hyvhlkjqr = self::parseSequence($Vcptarsq5qe4, $Vrycsn2lkvcj, $Vxja1abp34yq, $Vjgrjdc3fza1);
                ++$Vxja1abp34yq;
                break;
            case '{':
                $Vv0hyvhlkjqr = self::parseMapping($Vcptarsq5qe4, $Vrycsn2lkvcj, $Vxja1abp34yq, $Vjgrjdc3fza1);
                ++$Vxja1abp34yq;
                break;
            default:
                $Vv0hyvhlkjqr = self::parseScalar($Vcptarsq5qe4, $Vrycsn2lkvcj, null, $Vxja1abp34yq, null === $Vl2ijnnhdtam, $Vjgrjdc3fza1);
        }

        if (null !== $Vl2ijnnhdtam) {
            return new TaggedValue($Vl2ijnnhdtam, $Vv0hyvhlkjqr);
        }

        
        if (preg_replace('/\s+#.*$/A', '', substr($Vcptarsq5qe4, $Vxja1abp34yq))) {
            throw new ParseException(sprintf('Unexpected characters near "%s".', substr($Vcptarsq5qe4, $Vxja1abp34yq)), self::$Vueseakjpz51 + 1, $Vcptarsq5qe4, self::$Vh3zmzu42fku);
        }

        if (isset($Vu3ow2itb2uy)) {
            mb_internal_encoding($Vu3ow2itb2uy);
        }

        return $Vv0hyvhlkjqr;
    }

    
    public static function dump($Vcptarsq5qe4, $Vrycsn2lkvcj = 0)
    {
        if (is_bool($Vrycsn2lkvcj)) {
            @trigger_error('Passing a boolean flag to toggle exception handling is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE flag instead.', E_USER_DEPRECATED);

            if ($Vrycsn2lkvcj) {
                $Vrycsn2lkvcj = Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE;
            } else {
                $Vrycsn2lkvcj = 0;
            }
        }

        if (func_num_args() >= 3) {
            @trigger_error('Passing a boolean flag to toggle object support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::DUMP_OBJECT flag instead.', E_USER_DEPRECATED);

            if (func_get_arg(2)) {
                $Vrycsn2lkvcj |= Yaml::DUMP_OBJECT;
            }
        }

        switch (true) {
            case is_resource($Vcptarsq5qe4):
                if (Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE & $Vrycsn2lkvcj) {
                    throw new DumpException(sprintf('Unable to dump PHP resources in a YAML file ("%s").', get_resource_type($Vcptarsq5qe4)));
                }

                return 'null';
            case $Vcptarsq5qe4 instanceof \DateTimeInterface:
                return $Vcptarsq5qe4->format('c');
            case is_object($Vcptarsq5qe4):
                if ($Vcptarsq5qe4 instanceof TaggedValue) {
                    return '!'.$Vcptarsq5qe4->getTag().' '.self::dump($Vcptarsq5qe4->getValue(), $Vrycsn2lkvcj);
                }

                if (Yaml::DUMP_OBJECT & $Vrycsn2lkvcj) {
                    return '!php/object '.self::dump(serialize($Vcptarsq5qe4));
                }

                if (Yaml::DUMP_OBJECT_AS_MAP & $Vrycsn2lkvcj && ($Vcptarsq5qe4 instanceof \stdClass || $Vcptarsq5qe4 instanceof \ArrayObject)) {
                    return self::dumpArray($Vcptarsq5qe4, $Vrycsn2lkvcj & ~Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE);
                }

                if (Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE & $Vrycsn2lkvcj) {
                    throw new DumpException('Object support when dumping a YAML file has been disabled.');
                }

                return 'null';
            case is_array($Vcptarsq5qe4):
                return self::dumpArray($Vcptarsq5qe4, $Vrycsn2lkvcj);
            case null === $Vcptarsq5qe4:
                return 'null';
            case true === $Vcptarsq5qe4:
                return 'true';
            case false === $Vcptarsq5qe4:
                return 'false';
            case ctype_digit($Vcptarsq5qe4):
                return is_string($Vcptarsq5qe4) ? "'$Vcptarsq5qe4'" : (int) $Vcptarsq5qe4;
            case is_numeric($Vcptarsq5qe4):
                $Vbzxpjv3aqae = setlocale(LC_NUMERIC, 0);
                if (false !== $Vbzxpjv3aqae) {
                    setlocale(LC_NUMERIC, 'C');
                }
                if (is_float($Vcptarsq5qe4)) {
                    $Vohdxnsmy3zx = (string) $Vcptarsq5qe4;
                    if (is_infinite($Vcptarsq5qe4)) {
                        $Vohdxnsmy3zx = str_ireplace('INF', '.Inf', $Vohdxnsmy3zx);
                    } elseif (floor($Vcptarsq5qe4) == $Vcptarsq5qe4 && $Vohdxnsmy3zx == $Vcptarsq5qe4) {
                        
                        $Vohdxnsmy3zx = '!!float '.$Vohdxnsmy3zx;
                    }
                } else {
                    $Vohdxnsmy3zx = is_string($Vcptarsq5qe4) ? "'$Vcptarsq5qe4'" : (string) $Vcptarsq5qe4;
                }
                if (false !== $Vbzxpjv3aqae) {
                    setlocale(LC_NUMERIC, $Vbzxpjv3aqae);
                }

                return $Vohdxnsmy3zx;
            case '' == $Vcptarsq5qe4:
                return "''";
            case self::isBinaryString($Vcptarsq5qe4):
                return '!!binary '.base64_encode($Vcptarsq5qe4);
            case Escaper::requiresDoubleQuoting($Vcptarsq5qe4):
                return Escaper::escapeWithDoubleQuotes($Vcptarsq5qe4);
            case Escaper::requiresSingleQuoting($Vcptarsq5qe4):
            case Parser::preg_match('{^[0-9]+[_0-9]*$}', $Vcptarsq5qe4):
            case Parser::preg_match(self::getHexRegex(), $Vcptarsq5qe4):
            case Parser::preg_match(self::getTimestampRegex(), $Vcptarsq5qe4):
                return Escaper::escapeWithSingleQuotes($Vcptarsq5qe4);
            default:
                return $Vcptarsq5qe4;
        }
    }

    
    public static function isHash($Vcptarsq5qe4)
    {
        if ($Vcptarsq5qe4 instanceof \stdClass || $Vcptarsq5qe4 instanceof \ArrayObject) {
            return true;
        }

        $Vwz1qppqu31l = 0;

        foreach ($Vcptarsq5qe4 as $Vlpbz5aloxqt => $Vesnpsejyhuw) {
            if ($Vlpbz5aloxqt !== $Vwz1qppqu31l++) {
                return true;
            }
        }

        return false;
    }

    
    private static function dumpArray($Vcptarsq5qe4, $Vrycsn2lkvcj)
    {
        
        if (($Vcptarsq5qe4 || Yaml::DUMP_EMPTY_ARRAY_AS_SEQUENCE & $Vrycsn2lkvcj) && !self::isHash($Vcptarsq5qe4)) {
            $Vvaiuwffullu = array();
            foreach ($Vcptarsq5qe4 as $Vesnpsejyhuw) {
                $Vvaiuwffullu[] = self::dump($Vesnpsejyhuw, $Vrycsn2lkvcj);
            }

            return sprintf('[%s]', implode(', ', $Vvaiuwffullu));
        }

        
        $Vvaiuwffullu = array();
        foreach ($Vcptarsq5qe4 as $Vlpbz5aloxqt => $Vesnpsejyhuw) {
            $Vvaiuwffullu[] = sprintf('%s: %s', self::dump($Vlpbz5aloxqt, $Vrycsn2lkvcj), self::dump($Vesnpsejyhuw, $Vrycsn2lkvcj));
        }

        return sprintf('{ %s }', implode(', ', $Vvaiuwffullu));
    }

    
    public static function parseScalar($Vl2utb0g3j2a, $Vrycsn2lkvcj = 0, $Vau4rsk2dfl5 = null, &$Vxja1abp34yq = 0, $Vgtfmkib2bsv = true, $Vjgrjdc3fza1 = array(), $Vwppwvejtxm0 = false)
    {
        if (in_array($Vl2utb0g3j2a[$Vxja1abp34yq], array('"', "'"))) {
            
            $Vvaiuwffullu = self::parseQuotedScalar($Vl2utb0g3j2a, $Vxja1abp34yq);

            if (null !== $Vau4rsk2dfl5) {
                $Vvurliuircct = ltrim(substr($Vl2utb0g3j2a, $Vxja1abp34yq), ' ');
                if ('' === $Vvurliuircct) {
                    throw new ParseException(sprintf('Unexpected end of line, expected one of "%s".', implode($Vau4rsk2dfl5)), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                }
                if (!in_array($Vvurliuircct[0], $Vau4rsk2dfl5)) {
                    throw new ParseException(sprintf('Unexpected characters (%s).', substr($Vl2utb0g3j2a, $Vxja1abp34yq)), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                }
            }
        } else {
            
            if (!$Vau4rsk2dfl5) {
                $Vvaiuwffullu = substr($Vl2utb0g3j2a, $Vxja1abp34yq);
                $Vxja1abp34yq += strlen($Vvaiuwffullu);

                
                if (Parser::preg_match('/[ \t]+#/', $Vvaiuwffullu, $Vwetg4hewdr4, PREG_OFFSET_CAPTURE)) {
                    $Vvaiuwffullu = substr($Vvaiuwffullu, 0, $Vwetg4hewdr4[0][1]);
                }
            } elseif (Parser::preg_match('/^(.'.($Vwppwvejtxm0 ? '+' : '*').'?)('.implode('|', $Vau4rsk2dfl5).')/', substr($Vl2utb0g3j2a, $Vxja1abp34yq), $Vwetg4hewdr4)) {
                $Vvaiuwffullu = $Vwetg4hewdr4[1];
                $Vxja1abp34yq += strlen($Vvaiuwffullu);
            } else {
                throw new ParseException(sprintf('Malformed inline YAML string: %s.', $Vl2utb0g3j2a), self::$Vueseakjpz51 + 1, null, self::$Vh3zmzu42fku);
            }

            
            if ($Vvaiuwffullu && ('@' === $Vvaiuwffullu[0] || '`' === $Vvaiuwffullu[0] || '|' === $Vvaiuwffullu[0] || '>' === $Vvaiuwffullu[0])) {
                throw new ParseException(sprintf('The reserved indicator "%s" cannot start a plain scalar; you need to quote the scalar.', $Vvaiuwffullu[0]), self::$Vueseakjpz51 + 1, $Vvaiuwffullu, self::$Vh3zmzu42fku);
            }

            if ($Vvaiuwffullu && '%' === $Vvaiuwffullu[0]) {
                @trigger_error(self::getDeprecationMessage(sprintf('Not quoting the scalar "%s" starting with the "%%" indicator character is deprecated since Symfony 3.1 and will throw a ParseException in 4.0.', $Vvaiuwffullu)), E_USER_DEPRECATED);
            }

            if ($Vgtfmkib2bsv) {
                $Vvaiuwffullu = self::evaluateScalar($Vvaiuwffullu, $Vrycsn2lkvcj, $Vjgrjdc3fza1);
            }
        }

        return $Vvaiuwffullu;
    }

    
    private static function parseQuotedScalar($Vl2utb0g3j2a, &$Vxja1abp34yq)
    {
        if (!Parser::preg_match('/'.self::REGEX_QUOTED_STRING.'/Au', substr($Vl2utb0g3j2a, $Vxja1abp34yq), $Vwetg4hewdr4)) {
            throw new ParseException(sprintf('Malformed inline YAML string: %s.', substr($Vl2utb0g3j2a, $Vxja1abp34yq)), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
        }

        $Vvaiuwffullu = substr($Vwetg4hewdr4[0], 1, strlen($Vwetg4hewdr4[0]) - 2);

        $V4h3hbc3fara = new Unescaper();
        if ('"' == $Vl2utb0g3j2a[$Vxja1abp34yq]) {
            $Vvaiuwffullu = $V4h3hbc3fara->unescapeDoubleQuotedString($Vvaiuwffullu);
        } else {
            $Vvaiuwffullu = $V4h3hbc3fara->unescapeSingleQuotedString($Vvaiuwffullu);
        }

        $Vxja1abp34yq += strlen($Vwetg4hewdr4[0]);

        return $Vvaiuwffullu;
    }

    
    private static function parseSequence($Vwriy5cbzmd2, $Vrycsn2lkvcj, &$Vxja1abp34yq = 0, $Vjgrjdc3fza1 = array())
    {
        $Vvaiuwffullu = array();
        $Vr2qvsfpjonn = strlen($Vwriy5cbzmd2);
        ++$Vxja1abp34yq;

        
        while ($Vxja1abp34yq < $Vr2qvsfpjonn) {
            if (']' === $Vwriy5cbzmd2[$Vxja1abp34yq]) {
                return $Vvaiuwffullu;
            }
            if (',' === $Vwriy5cbzmd2[$Vxja1abp34yq] || ' ' === $Vwriy5cbzmd2[$Vxja1abp34yq]) {
                ++$Vxja1abp34yq;

                continue;
            }

            $Vl2ijnnhdtam = self::parseTag($Vwriy5cbzmd2, $Vxja1abp34yq, $Vrycsn2lkvcj);
            switch ($Vwriy5cbzmd2[$Vxja1abp34yq]) {
                case '[':
                    
                    $Vcptarsq5qe4 = self::parseSequence($Vwriy5cbzmd2, $Vrycsn2lkvcj, $Vxja1abp34yq, $Vjgrjdc3fza1);
                    break;
                case '{':
                    
                    $Vcptarsq5qe4 = self::parseMapping($Vwriy5cbzmd2, $Vrycsn2lkvcj, $Vxja1abp34yq, $Vjgrjdc3fza1);
                    break;
                default:
                    $Vxja1abp34yqsQuoted = in_array($Vwriy5cbzmd2[$Vxja1abp34yq], array('"', "'"));
                    $Vcptarsq5qe4 = self::parseScalar($Vwriy5cbzmd2, $Vrycsn2lkvcj, array(',', ']'), $Vxja1abp34yq, null === $Vl2ijnnhdtam, $Vjgrjdc3fza1);

                    
                    if (is_string($Vcptarsq5qe4) && !$Vxja1abp34yqsQuoted && false !== strpos($Vcptarsq5qe4, ': ')) {
                        
                        try {
                            $Vc5b0ouiyxjh = 0;
                            $Vcptarsq5qe4 = self::parseMapping('{'.$Vcptarsq5qe4.'}', $Vrycsn2lkvcj, $Vc5b0ouiyxjh, $Vjgrjdc3fza1);
                        } catch (\InvalidArgumentException $Vpt32vvhspnv) {
                            
                        }
                    }

                    --$Vxja1abp34yq;
            }

            if (null !== $Vl2ijnnhdtam) {
                $Vcptarsq5qe4 = new TaggedValue($Vl2ijnnhdtam, $Vcptarsq5qe4);
            }

            $Vvaiuwffullu[] = $Vcptarsq5qe4;

            ++$Vxja1abp34yq;
        }

        throw new ParseException(sprintf('Malformed inline YAML string: %s.', $Vwriy5cbzmd2), self::$Vueseakjpz51 + 1, null, self::$Vh3zmzu42fku);
    }

    
    private static function parseMapping($V143w035xcus, $Vrycsn2lkvcj, &$Vxja1abp34yq = 0, $Vjgrjdc3fza1 = array())
    {
        $Vvaiuwffullu = array();
        $Vr2qvsfpjonn = strlen($V143w035xcus);
        ++$Vxja1abp34yq;
        $V1k3fcnqe00i = false;

        
        while ($Vxja1abp34yq < $Vr2qvsfpjonn) {
            switch ($V143w035xcus[$Vxja1abp34yq]) {
                case ' ':
                case ',':
                    ++$Vxja1abp34yq;
                    continue 2;
                case '}':
                    if (self::$Vvytj5xqcn1e) {
                        return (object) $Vvaiuwffullu;
                    }

                    return $Vvaiuwffullu;
            }

            
            $Vxja1abp34yqsKeyQuoted = in_array($V143w035xcus[$Vxja1abp34yq], array('"', "'"), true);
            $Vlpbz5aloxqt = self::parseScalar($V143w035xcus, $Vrycsn2lkvcj, array(':', ' '), $Vxja1abp34yq, false, array(), true);

            if (':' !== $Vlpbz5aloxqt && false === $Vxja1abp34yq = strpos($V143w035xcus, ':', $Vxja1abp34yq)) {
                break;
            }

            if (':' === $Vlpbz5aloxqt) {
                @trigger_error(self::getDeprecationMessage('Omitting the key of a mapping is deprecated and will throw a ParseException in 4.0.'), E_USER_DEPRECATED);
            }

            if (!$Vxja1abp34yqsKeyQuoted) {
                $Vgtfmkib2bsvdKey = self::evaluateScalar($Vlpbz5aloxqt, $Vrycsn2lkvcj, $Vjgrjdc3fza1);

                if ('' !== $Vlpbz5aloxqt && $Vgtfmkib2bsvdKey !== $Vlpbz5aloxqt && !is_string($Vgtfmkib2bsvdKey) && !is_int($Vgtfmkib2bsvdKey)) {
                    @trigger_error(self::getDeprecationMessage('Implicit casting of incompatible mapping keys to strings is deprecated since Symfony 3.3 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0. Quote your evaluable mapping keys instead.'), E_USER_DEPRECATED);
                }
            }

            if (':' !== $Vlpbz5aloxqt && !$Vxja1abp34yqsKeyQuoted && (!isset($V143w035xcus[$Vxja1abp34yq + 1]) || !in_array($V143w035xcus[$Vxja1abp34yq + 1], array(' ', ',', '[', ']', '{', '}'), true))) {
                @trigger_error(self::getDeprecationMessage('Using a colon after an unquoted mapping key that is not followed by an indication character (i.e. " ", ",", "[", "]", "{", "}") is deprecated since Symfony 3.2 and will throw a ParseException in 4.0.'), E_USER_DEPRECATED);
            }

            if ('<<' === $Vlpbz5aloxqt) {
                $V1k3fcnqe00i = true;
            }

            while ($Vxja1abp34yq < $Vr2qvsfpjonn) {
                if (':' === $V143w035xcus[$Vxja1abp34yq] || ' ' === $V143w035xcus[$Vxja1abp34yq]) {
                    ++$Vxja1abp34yq;

                    continue;
                }

                $Vl2ijnnhdtam = self::parseTag($V143w035xcus, $Vxja1abp34yq, $Vrycsn2lkvcj);
                switch ($V143w035xcus[$Vxja1abp34yq]) {
                    case '[':
                        
                        $Vcptarsq5qe4 = self::parseSequence($V143w035xcus, $Vrycsn2lkvcj, $Vxja1abp34yq, $Vjgrjdc3fza1);
                        
                        
                        
                        
                        if ('<<' === $Vlpbz5aloxqt) {
                            foreach ($Vcptarsq5qe4 as $V3wxokzjddvo) {
                                $Vvaiuwffullu += $V3wxokzjddvo;
                            }
                        } elseif ($V1k3fcnqe00i || !isset($Vvaiuwffullu[$Vlpbz5aloxqt])) {
                            if (null !== $Vl2ijnnhdtam) {
                                $Vvaiuwffullu[$Vlpbz5aloxqt] = new TaggedValue($Vl2ijnnhdtam, $Vcptarsq5qe4);
                            } else {
                                $Vvaiuwffullu[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
                            }
                        } elseif (isset($Vvaiuwffullu[$Vlpbz5aloxqt])) {
                            @trigger_error(self::getDeprecationMessage(sprintf('Duplicate key "%s" detected whilst parsing YAML. Silent handling of duplicate mapping keys in YAML is deprecated since Symfony 3.2 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.', $Vlpbz5aloxqt)), E_USER_DEPRECATED);
                        }
                        break;
                    case '{':
                        
                        $Vcptarsq5qe4 = self::parseMapping($V143w035xcus, $Vrycsn2lkvcj, $Vxja1abp34yq, $Vjgrjdc3fza1);
                        
                        
                        
                        
                        if ('<<' === $Vlpbz5aloxqt) {
                            $Vvaiuwffullu += $Vcptarsq5qe4;
                        } elseif ($V1k3fcnqe00i || !isset($Vvaiuwffullu[$Vlpbz5aloxqt])) {
                            if (null !== $Vl2ijnnhdtam) {
                                $Vvaiuwffullu[$Vlpbz5aloxqt] = new TaggedValue($Vl2ijnnhdtam, $Vcptarsq5qe4);
                            } else {
                                $Vvaiuwffullu[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
                            }
                        } elseif (isset($Vvaiuwffullu[$Vlpbz5aloxqt])) {
                            @trigger_error(self::getDeprecationMessage(sprintf('Duplicate key "%s" detected whilst parsing YAML. Silent handling of duplicate mapping keys in YAML is deprecated since Symfony 3.2 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.', $Vlpbz5aloxqt)), E_USER_DEPRECATED);
                        }
                        break;
                    default:
                        $Vcptarsq5qe4 = self::parseScalar($V143w035xcus, $Vrycsn2lkvcj, array(',', '}'), $Vxja1abp34yq, null === $Vl2ijnnhdtam, $Vjgrjdc3fza1);
                        
                        
                        
                        
                        if ('<<' === $Vlpbz5aloxqt) {
                            $Vvaiuwffullu += $Vcptarsq5qe4;
                        } elseif ($V1k3fcnqe00i || !isset($Vvaiuwffullu[$Vlpbz5aloxqt])) {
                            if (null !== $Vl2ijnnhdtam) {
                                $Vvaiuwffullu[$Vlpbz5aloxqt] = new TaggedValue($Vl2ijnnhdtam, $Vcptarsq5qe4);
                            } else {
                                $Vvaiuwffullu[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
                            }
                        } elseif (isset($Vvaiuwffullu[$Vlpbz5aloxqt])) {
                            @trigger_error(self::getDeprecationMessage(sprintf('Duplicate key "%s" detected whilst parsing YAML. Silent handling of duplicate mapping keys in YAML is deprecated since Symfony 3.2 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.', $Vlpbz5aloxqt)), E_USER_DEPRECATED);
                        }
                        --$Vxja1abp34yq;
                }
                ++$Vxja1abp34yq;

                continue 2;
            }
        }

        throw new ParseException(sprintf('Malformed inline YAML string: %s.', $V143w035xcus), self::$Vueseakjpz51 + 1, null, self::$Vh3zmzu42fku);
    }

    
    private static function evaluateScalar($Vl2utb0g3j2a, $Vrycsn2lkvcj, $Vjgrjdc3fza1 = array())
    {
        $Vl2utb0g3j2a = trim($Vl2utb0g3j2a);
        $Vl2utb0g3j2aLower = strtolower($Vl2utb0g3j2a);

        if (0 === strpos($Vl2utb0g3j2a, '*')) {
            if (false !== $Vc5b0ouiyxjh = strpos($Vl2utb0g3j2a, '#')) {
                $Vcptarsq5qe4 = substr($Vl2utb0g3j2a, 1, $Vc5b0ouiyxjh - 2);
            } else {
                $Vcptarsq5qe4 = substr($Vl2utb0g3j2a, 1);
            }

            
            if (false === $Vcptarsq5qe4 || '' === $Vcptarsq5qe4) {
                throw new ParseException('A reference must contain at least one character.', self::$Vueseakjpz51 + 1, $Vcptarsq5qe4, self::$Vh3zmzu42fku);
            }

            if (!array_key_exists($Vcptarsq5qe4, $Vjgrjdc3fza1)) {
                throw new ParseException(sprintf('Reference "%s" does not exist.', $Vcptarsq5qe4), self::$Vueseakjpz51 + 1, $Vcptarsq5qe4, self::$Vh3zmzu42fku);
            }

            return $Vjgrjdc3fza1[$Vcptarsq5qe4];
        }

        switch (true) {
            case 'null' === $Vl2utb0g3j2aLower:
            case '' === $Vl2utb0g3j2a:
            case '~' === $Vl2utb0g3j2a:
                return;
            case 'true' === $Vl2utb0g3j2aLower:
                return true;
            case 'false' === $Vl2utb0g3j2aLower:
                return false;
            case '!' === $Vl2utb0g3j2a[0]:
                switch (true) {
                    case 0 === strpos($Vl2utb0g3j2a, '!str'):
                        @trigger_error(self::getDeprecationMessage('Support for the !str tag is deprecated since Symfony 3.4. Use the !!str tag instead.'), E_USER_DEPRECATED);

                        return (string) substr($Vl2utb0g3j2a, 5);
                    case 0 === strpos($Vl2utb0g3j2a, '!!str '):
                        return (string) substr($Vl2utb0g3j2a, 6);
                    case 0 === strpos($Vl2utb0g3j2a, '! '):
                        @trigger_error(self::getDeprecationMessage('Using the non-specific tag "!" is deprecated since Symfony 3.4 as its behavior will change in 4.0. It will force non-evaluating your values in 4.0. Use plain integers or !!float instead.'), E_USER_DEPRECATED);

                        return (int) self::parseScalar(substr($Vl2utb0g3j2a, 2), $Vrycsn2lkvcj);
                    case 0 === strpos($Vl2utb0g3j2a, '!php/object:'):
                        if (self::$Vygw2amixf4t) {
                            @trigger_error(self::getDeprecationMessage('The !php/object: tag to indicate dumped PHP objects is deprecated since Symfony 3.4 and will be removed in 4.0. Use the !php/object (without the colon) tag instead.'), E_USER_DEPRECATED);

                            return unserialize(substr($Vl2utb0g3j2a, 12));
                        }

                        if (self::$Vid1pd4wh1ez) {
                            throw new ParseException('Object support when parsing a YAML file has been disabled.', self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                        }

                        return;
                    case 0 === strpos($Vl2utb0g3j2a, '!!php/object:'):
                        if (self::$Vygw2amixf4t) {
                            @trigger_error(self::getDeprecationMessage('The !!php/object: tag to indicate dumped PHP objects is deprecated since Symfony 3.1 and will be removed in 4.0. Use the !php/object (without the colon) tag instead.'), E_USER_DEPRECATED);

                            return unserialize(substr($Vl2utb0g3j2a, 13));
                        }

                        if (self::$Vid1pd4wh1ez) {
                            throw new ParseException('Object support when parsing a YAML file has been disabled.', self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                        }

                        return;
                    case 0 === strpos($Vl2utb0g3j2a, '!php/object'):
                        if (self::$Vygw2amixf4t) {
                            return unserialize(self::parseScalar(substr($Vl2utb0g3j2a, 12)));
                        }

                        if (self::$Vid1pd4wh1ez) {
                            throw new ParseException('Object support when parsing a YAML file has been disabled.', self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                        }

                        return;
                    case 0 === strpos($Vl2utb0g3j2a, '!php/const:'):
                        if (self::$V4wtraspjvax) {
                            @trigger_error(self::getDeprecationMessage('The !php/const: tag to indicate dumped PHP constants is deprecated since Symfony 3.4 and will be removed in 4.0. Use the !php/const (without the colon) tag instead.'), E_USER_DEPRECATED);

                            if (defined($V43ory1xqr50 = substr($Vl2utb0g3j2a, 11))) {
                                return constant($V43ory1xqr50);
                            }

                            throw new ParseException(sprintf('The constant "%s" is not defined.', $V43ory1xqr50), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                        }
                        if (self::$Vid1pd4wh1ez) {
                            throw new ParseException(sprintf('The string "%s" could not be parsed as a constant. Have you forgotten to pass the "Yaml::PARSE_CONSTANT" flag to the parser?', $Vl2utb0g3j2a), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                        }

                        return;
                    case 0 === strpos($Vl2utb0g3j2a, '!php/const'):
                        if (self::$V4wtraspjvax) {
                            $Vxja1abp34yq = 0;
                            if (defined($V43ory1xqr50 = self::parseScalar(substr($Vl2utb0g3j2a, 11), 0, null, $Vxja1abp34yq, false))) {
                                return constant($V43ory1xqr50);
                            }

                            throw new ParseException(sprintf('The constant "%s" is not defined.', $V43ory1xqr50), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                        }
                        if (self::$Vid1pd4wh1ez) {
                            throw new ParseException(sprintf('The string "%s" could not be parsed as a constant. Have you forgotten to pass the "Yaml::PARSE_CONSTANT" flag to the parser?', $Vl2utb0g3j2a), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
                        }

                        return;
                    case 0 === strpos($Vl2utb0g3j2a, '!!float '):
                        return (float) substr($Vl2utb0g3j2a, 8);
                    case 0 === strpos($Vl2utb0g3j2a, '!!binary '):
                        return self::evaluateBinaryScalar(substr($Vl2utb0g3j2a, 9));
                    default:
                        @trigger_error(self::getDeprecationMessage(sprintf('Using the unquoted scalar value "%s" is deprecated since Symfony 3.3 and will be considered as a tagged value in 4.0. You must quote it.', $Vl2utb0g3j2a)), E_USER_DEPRECATED);
                }

            
            
            case '+' === $Vl2utb0g3j2a[0] || '-' === $Vl2utb0g3j2a[0] || '.' === $Vl2utb0g3j2a[0] || is_numeric($Vl2utb0g3j2a[0]):
                switch (true) {
                    case Parser::preg_match('{^[+-]?[0-9][0-9_]*$}', $Vl2utb0g3j2a):
                        $Vl2utb0g3j2a = str_replace('_', '', (string) $Vl2utb0g3j2a);
                        
                        
                    case ctype_digit($Vl2utb0g3j2a):
                        $V0tqxrkqznqp = $Vl2utb0g3j2a;
                        $Vjjhgpqjuoni = (int) $Vl2utb0g3j2a;

                        return '0' == $Vl2utb0g3j2a[0] ? octdec($Vl2utb0g3j2a) : (((string) $V0tqxrkqznqp == (string) $Vjjhgpqjuoni) ? $Vjjhgpqjuoni : $V0tqxrkqznqp);
                    case '-' === $Vl2utb0g3j2a[0] && ctype_digit(substr($Vl2utb0g3j2a, 1)):
                        $V0tqxrkqznqp = $Vl2utb0g3j2a;
                        $Vjjhgpqjuoni = (int) $Vl2utb0g3j2a;

                        return '0' == $Vl2utb0g3j2a[1] ? octdec($Vl2utb0g3j2a) : (((string) $V0tqxrkqznqp === (string) $Vjjhgpqjuoni) ? $Vjjhgpqjuoni : $V0tqxrkqznqp);
                    case is_numeric($Vl2utb0g3j2a):
                    case Parser::preg_match(self::getHexRegex(), $Vl2utb0g3j2a):
                        $Vl2utb0g3j2a = str_replace('_', '', $Vl2utb0g3j2a);

                        return '0x' === $Vl2utb0g3j2a[0].$Vl2utb0g3j2a[1] ? hexdec($Vl2utb0g3j2a) : (float) $Vl2utb0g3j2a;
                    case '.inf' === $Vl2utb0g3j2aLower:
                    case '.nan' === $Vl2utb0g3j2aLower:
                        return -log(0);
                    case '-.inf' === $Vl2utb0g3j2aLower:
                        return log(0);
                    case Parser::preg_match('/^(-|\+)?[0-9][0-9,]*(\.[0-9_]+)?$/', $Vl2utb0g3j2a):
                    case Parser::preg_match('/^(-|\+)?[0-9][0-9_]*(\.[0-9_]+)?$/', $Vl2utb0g3j2a):
                        if (false !== strpos($Vl2utb0g3j2a, ',')) {
                            @trigger_error(self::getDeprecationMessage('Using the comma as a group separator for floats is deprecated since Symfony 3.2 and will be removed in 4.0.'), E_USER_DEPRECATED);
                        }

                        return (float) str_replace(array(',', '_'), '', $Vl2utb0g3j2a);
                    case Parser::preg_match(self::getTimestampRegex(), $Vl2utb0g3j2a):
                        if (Yaml::PARSE_DATETIME & $Vrycsn2lkvcj) {
                            
                            return new \DateTime($Vl2utb0g3j2a, new \DateTimeZone('UTC'));
                        }

                        $Vpajkasmiivb = date_default_timezone_get();
                        date_default_timezone_set('UTC');
                        $Vlbwbnl10iav = strtotime($Vl2utb0g3j2a);
                        date_default_timezone_set($Vpajkasmiivb);

                        return $Vlbwbnl10iav;
                }
        }

        return (string) $Vl2utb0g3j2a;
    }

    
    private static function parseTag($Vcptarsq5qe4, &$Vxja1abp34yq, $Vrycsn2lkvcj)
    {
        if ('!' !== $Vcptarsq5qe4[$Vxja1abp34yq]) {
            return;
        }

        $Vl2ijnnhdtamLength = strcspn($Vcptarsq5qe4, " \t\n", $Vxja1abp34yq + 1);
        $Vl2ijnnhdtam = substr($Vcptarsq5qe4, $Vxja1abp34yq + 1, $Vl2ijnnhdtamLength);

        $Vyiooncczpsi = $Vxja1abp34yq + $Vl2ijnnhdtamLength + 1;
        $Vyiooncczpsi += strspn($Vcptarsq5qe4, ' ', $Vyiooncczpsi);

        
        if ((!isset($Vcptarsq5qe4[$Vyiooncczpsi]) || !in_array($Vcptarsq5qe4[$Vyiooncczpsi], array('[', '{'), true)) && 'tagged' !== $Vl2ijnnhdtam) {
            
            return;
        }

        
        if ($Vl2ijnnhdtam && '!' === $Vl2ijnnhdtam[0]) {
            throw new ParseException(sprintf('The built-in tag "!%s" is not implemented.', $Vl2ijnnhdtam), self::$Vueseakjpz51 + 1, $Vcptarsq5qe4, self::$Vh3zmzu42fku);
        }

        if (Yaml::PARSE_CUSTOM_TAGS & $Vrycsn2lkvcj) {
            $Vxja1abp34yq = $Vyiooncczpsi;

            return $Vl2ijnnhdtam;
        }

        throw new ParseException(sprintf('Tags support is not enabled. Enable the `Yaml::PARSE_CUSTOM_TAGS` flag to use "!%s".', $Vl2ijnnhdtam), self::$Vueseakjpz51 + 1, $Vcptarsq5qe4, self::$Vh3zmzu42fku);
    }

    
    public static function evaluateBinaryScalar($Vl2utb0g3j2a)
    {
        $Vf3esngdymrk = self::parseScalar(preg_replace('/\s/', '', $Vl2utb0g3j2a));

        if (0 !== (strlen($Vf3esngdymrk) % 4)) {
            throw new ParseException(sprintf('The normalized base64 encoded data (data without whitespace characters) length must be a multiple of four (%d bytes given).', strlen($Vf3esngdymrk)), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
        }

        if (!Parser::preg_match('#^[A-Z0-9+/]+={0,2}$#i', $Vf3esngdymrk)) {
            throw new ParseException(sprintf('The base64 encoded data (%s) contains invalid characters.', $Vf3esngdymrk), self::$Vueseakjpz51 + 1, $Vl2utb0g3j2a, self::$Vh3zmzu42fku);
        }

        return base64_decode($Vf3esngdymrk, true);
    }

    private static function isBinaryString($Vcptarsq5qe4)
    {
        return !preg_match('//u', $Vcptarsq5qe4) || preg_match('/[^\x00\x07-\x0d\x1B\x20-\xff]/', $Vcptarsq5qe4);
    }

    
    private static function getTimestampRegex()
    {
        return <<<EOF
        ~^
        (?P<year>[0-9][0-9][0-9][0-9])
        -(?P<month>[0-9][0-9]?)
        -(?P<day>[0-9][0-9]?)
        (?:(?:[Tt]|[ \t]+)
        (?P<hour>[0-9][0-9]?)
        :(?P<minute>[0-9][0-9])
        :(?P<second>[0-9][0-9])
        (?:\.(?P<fraction>[0-9]*))?
        (?:[ \t]*(?P<tz>Z|(?P<tz_sign>[-+])(?P<tz_hour>[0-9][0-9]?)
        (?::(?P<tz_minute>[0-9][0-9]))?))?)?
        $~x
EOF;
    }

    
    private static function getHexRegex()
    {
        return '~^0x[0-9a-f_]++$~i';
    }

    private static function getDeprecationMessage($Vbl4yrmdan1y)
    {
        $Vbl4yrmdan1y = rtrim($Vbl4yrmdan1y, '.');

        if (null !== self::$Vh3zmzu42fku) {
            $Vbl4yrmdan1y .= ' in '.self::$Vh3zmzu42fku;
        }

        if (-1 !== self::$Vueseakjpz51) {
            $Vbl4yrmdan1y .= ' on line '.(self::$Vueseakjpz51 + 1);
        }

        return $Vbl4yrmdan1y.'.';
    }
}
