<?php



namespace Symfony\Component\Yaml;

use Symfony\Component\Yaml\Exception\ParseException;
use Symfony\Component\Yaml\Tag\TaggedValue;


class Parser
{
    const TAG_PATTERN = '(?P<tag>![\w!.\/:-]+)';
    const BLOCK_SCALAR_HEADER_PATTERN = '(?P<separator>\||>)(?P<modifiers>\+|\-|\d+|\+\d+|\-\d+|\d+\+|\d+\-)?(?P<comments> +#.*)?';

    private $Va3qqb0vgkhy;
    private $V5peram4ncbv = 0;
    private $V34ftswccrv1;
    private $Vbkt5laoakgf = array();
    private $Vhlddik5s51f = -1;
    private $Vzlg20lj4war = '';
    private $V1gpfdoo3xhr = array();
    private $Vt0egbbrtnud = array();
    private $Vqk53iaxuu20 = array();

    public function __construct()
    {
        if (func_num_args() > 0) {
            @trigger_error(sprintf('The constructor arguments $V5peram4ncbv, $V34ftswccrv1, $Vt0egbbrtnud of %s are deprecated and will be removed in 4.0', self::class), E_USER_DEPRECATED);

            $this->offset = func_get_arg(0);
            if (func_num_args() > 1) {
                $this->totalNumberOfLines = func_get_arg(1);
            }
            if (func_num_args() > 2) {
                $this->skippedLineNumbers = func_get_arg(2);
            }
        }
    }

    
    public function parseFile($Va3qqb0vgkhy, $Vrycsn2lkvcj = 0)
    {
        if (!is_file($Va3qqb0vgkhy)) {
            throw new ParseException(sprintf('File "%s" does not exist.', $Va3qqb0vgkhy));
        }

        if (!is_readable($Va3qqb0vgkhy)) {
            throw new ParseException(sprintf('File "%s" cannot be read.', $Va3qqb0vgkhy));
        }

        $this->filename = $Va3qqb0vgkhy;

        try {
            return $this->parse(file_get_contents($Va3qqb0vgkhy), $Vrycsn2lkvcj);
        } finally {
            $this->filename = null;
        }
    }

    
    public function parse($Vcptarsq5qe4, $Vrycsn2lkvcj = 0)
    {
        if (is_bool($Vrycsn2lkvcj)) {
            @trigger_error('Passing a boolean flag to toggle exception handling is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE flag instead.', E_USER_DEPRECATED);

            if ($Vrycsn2lkvcj) {
                $Vrycsn2lkvcj = Yaml::PARSE_EXCEPTION_ON_INVALID_TYPE;
            } else {
                $Vrycsn2lkvcj = 0;
            }
        }

        if (func_num_args() >= 3) {
            @trigger_error('Passing a boolean flag to toggle object support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::PARSE_OBJECT flag instead.', E_USER_DEPRECATED);

            if (func_get_arg(2)) {
                $Vrycsn2lkvcj |= Yaml::PARSE_OBJECT;
            }
        }

        if (func_num_args() >= 4) {
            @trigger_error('Passing a boolean flag to toggle object for map support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::PARSE_OBJECT_FOR_MAP flag instead.', E_USER_DEPRECATED);

            if (func_get_arg(3)) {
                $Vrycsn2lkvcj |= Yaml::PARSE_OBJECT_FOR_MAP;
            }
        }

        if (Yaml::PARSE_KEYS_AS_STRINGS & $Vrycsn2lkvcj) {
            @trigger_error('Using the Yaml::PARSE_KEYS_AS_STRINGS flag is deprecated since Symfony 3.4 as it will be removed in 4.0. Quote your keys when they are evaluable instead.', E_USER_DEPRECATED);
        }

        if (false === preg_match('//u', $Vcptarsq5qe4)) {
            throw new ParseException('The YAML value does not appear to be valid UTF-8.', -1, null, $this->filename);
        }

        $this->refs = array();

        $Vu3ow2itb2uy = null;
        $Vpt32vvhspnv = null;
        $Vqhzkfsafzrc = null;

        if (2  & (int) ini_get('mbstring.func_overload')) {
            $Vu3ow2itb2uy = mb_internal_encoding();
            mb_internal_encoding('UTF-8');
        }

        try {
            $Vqhzkfsafzrc = $this->doParse($Vcptarsq5qe4, $Vrycsn2lkvcj);
        } catch (\Exception $Vpt32vvhspnv) {
        } catch (\Throwable $Vpt32vvhspnv) {
        }

        if (null !== $Vu3ow2itb2uy) {
            mb_internal_encoding($Vu3ow2itb2uy);
        }

        $this->lines = array();
        $this->currentLine = '';
        $this->refs = array();
        $this->skippedLineNumbers = array();
        $this->locallySkippedLineNumbers = array();

        if (null !== $Vpt32vvhspnv) {
            throw $Vpt32vvhspnv;
        }

        return $Vqhzkfsafzrc;
    }

    private function doParse($Vcptarsq5qe4, $Vrycsn2lkvcj)
    {
        $this->currentLineNb = -1;
        $this->currentLine = '';
        $Vcptarsq5qe4 = $this->cleanup($Vcptarsq5qe4);
        $this->lines = explode("\n", $Vcptarsq5qe4);
        $this->locallySkippedLineNumbers = array();

        if (null === $this->totalNumberOfLines) {
            $this->totalNumberOfLines = count($this->lines);
        }

        if (!$this->moveToNextLine()) {
            return null;
        }

        $Vqhzkfsafzrc = array();
        $Vylnw34ljlp1 = null;
        $V1k3fcnqe00i = false;

        while ($this->isCurrentLineEmpty()) {
            if (!$this->moveToNextLine()) {
                return null;
            }
        }

        
        if (null !== ($Vl2ijnnhdtam = $this->getLineTag($this->currentLine, $Vrycsn2lkvcj, false)) && !$this->moveToNextLine()) {
            return new TaggedValue($Vl2ijnnhdtam, '');
        }

        do {
            if ($this->isCurrentLineEmpty()) {
                continue;
            }

            
            if ("\t" === $this->currentLine[0]) {
                throw new ParseException('A YAML file cannot contain tabs as indentation.', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
            }

            Inline::initialize($Vrycsn2lkvcj, $this->getRealCurrentLineNb(), $this->filename);

            $V3thvqtdbatd = $Vceutrgbs1si = false;
            if (self::preg_match('#^\-((?P<leadspaces>\s+)(?P<value>.+))?$#u', rtrim($this->currentLine), $Vcptarsq5qe4s)) {
                if ($Vylnw34ljlp1 && 'mapping' == $Vylnw34ljlp1) {
                    throw new ParseException('You cannot define a sequence item when in a mapping', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
                }
                $Vylnw34ljlp1 = 'sequence';

                if (isset($Vcptarsq5qe4s['value']) && self::preg_match('#^&(?P<ref>[^ ]+) *(?P<value>.*)#u', $Vcptarsq5qe4s['value'], $Virbphhh55ue)) {
                    $V3thvqtdbatd = $Virbphhh55ue['ref'];
                    $Vcptarsq5qe4s['value'] = $Virbphhh55ue['value'];
                }

                if (isset($Vcptarsq5qe4s['value'][1]) && '?' === $Vcptarsq5qe4s['value'][0] && ' ' === $Vcptarsq5qe4s['value'][1]) {
                    @trigger_error($this->getDeprecationMessage('Starting an unquoted string with a question mark followed by a space is deprecated since Symfony 3.3 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.'), E_USER_DEPRECATED);
                }

                
                if (!isset($Vcptarsq5qe4s['value']) || '' == trim($Vcptarsq5qe4s['value'], ' ') || 0 === strpos(ltrim($Vcptarsq5qe4s['value'], ' '), '#')) {
                    $Vqhzkfsafzrc[] = $this->parseBlock($this->getRealCurrentLineNb() + 1, $this->getNextEmbedBlock(null, true), $Vrycsn2lkvcj);
                } elseif (null !== $V4nykj5zjgss = $this->getLineTag(ltrim($Vcptarsq5qe4s['value'], ' '), $Vrycsn2lkvcj)) {
                    $Vqhzkfsafzrc[] = new TaggedValue(
                        $V4nykj5zjgss,
                        $this->parseBlock($this->getRealCurrentLineNb() + 1, $this->getNextEmbedBlock(null, true), $Vrycsn2lkvcj)
                    );
                } else {
                    if (isset($Vcptarsq5qe4s['leadspaces'])
                        && self::preg_match('#^(?P<key>'.Inline::REGEX_QUOTED_STRING.'|[^ \'"\{\[].*?) *\:(\s+(?P<value>.+?))?\s*$#u', $this->trimTag($Vcptarsq5qe4s['value']), $Virbphhh55ue)
                    ) {
                        
                        $Vee3lowjh3ev = $Vcptarsq5qe4s['value'];
                        if ($this->isNextLineIndented()) {
                            $Vee3lowjh3ev .= "\n".$this->getNextEmbedBlock($this->getCurrentLineIndentation() + strlen($Vcptarsq5qe4s['leadspaces']) + 1);
                        }

                        $Vqhzkfsafzrc[] = $this->parseBlock($this->getRealCurrentLineNb(), $Vee3lowjh3ev, $Vrycsn2lkvcj);
                    } else {
                        $Vqhzkfsafzrc[] = $this->parseValue($Vcptarsq5qe4s['value'], $Vrycsn2lkvcj, $Vylnw34ljlp1);
                    }
                }
                if ($V3thvqtdbatd) {
                    $this->refs[$V3thvqtdbatd] = end($Vqhzkfsafzrc);
                }
            } elseif (
                self::preg_match('#^(?P<key>(?:![^\s]++\s++)?(?:'.Inline::REGEX_QUOTED_STRING.'|(?:!?!php/const:)?[^ \'"\[\{!].*?)) *\:(\s++(?P<value>.+))?$#u', rtrim($this->currentLine), $Vcptarsq5qe4s)
                && (false === strpos($Vcptarsq5qe4s['key'], ' #') || in_array($Vcptarsq5qe4s['key'][0], array('"', "'")))
            ) {
                if ($Vylnw34ljlp1 && 'sequence' == $Vylnw34ljlp1) {
                    throw new ParseException('You cannot define a mapping item when in a sequence', $this->currentLineNb + 1, $this->currentLine, $this->filename);
                }
                $Vylnw34ljlp1 = 'mapping';

                try {
                    $Vxja1abp34yq = 0;
                    $Vpt32vvhspnvvaluateKey = !(Yaml::PARSE_KEYS_AS_STRINGS & $Vrycsn2lkvcj);

                    
                    if (isset($Vcptarsq5qe4s['key'][0]) && '!' === $Vcptarsq5qe4s['key'][0] && Yaml::PARSE_CONSTANT & $Vrycsn2lkvcj) {
                        $Vpt32vvhspnvvaluateKey = true;
                    }

                    $Vlpbz5aloxqt = Inline::parseScalar($Vcptarsq5qe4s['key'], 0, null, $Vxja1abp34yq, $Vpt32vvhspnvvaluateKey);
                } catch (ParseException $Vpt32vvhspnv) {
                    $Vpt32vvhspnv->setParsedLine($this->getRealCurrentLineNb() + 1);
                    $Vpt32vvhspnv->setSnippet($this->currentLine);

                    throw $Vpt32vvhspnv;
                }

                if (!is_string($Vlpbz5aloxqt) && !is_int($Vlpbz5aloxqt)) {
                    $Vlpbz5aloxqtType = is_numeric($Vlpbz5aloxqt) ? 'numeric key' : 'non-string key';
                    @trigger_error($this->getDeprecationMessage(sprintf('Implicit casting of %s to string is deprecated since Symfony 3.3 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0. Quote your evaluable mapping keys instead.', $Vlpbz5aloxqtType)), E_USER_DEPRECATED);
                }

                
                if (is_float($Vlpbz5aloxqt)) {
                    $Vlpbz5aloxqt = (string) $Vlpbz5aloxqt;
                }

                if ('<<' === $Vlpbz5aloxqt && (!isset($Vcptarsq5qe4s['value']) || !self::preg_match('#^&(?P<ref>[^ ]+)#u', $Vcptarsq5qe4s['value'], $V1c5amfmdxhw))) {
                    $Vceutrgbs1si = true;
                    $V1k3fcnqe00i = true;
                    if (isset($Vcptarsq5qe4s['value'][0]) && '*' === $Vcptarsq5qe4s['value'][0]) {
                        $Vuffehul5noe = substr(rtrim($Vcptarsq5qe4s['value']), 1);
                        if (!array_key_exists($Vuffehul5noe, $this->refs)) {
                            throw new ParseException(sprintf('Reference "%s" does not exist.', $Vuffehul5noe), $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
                        }

                        $Vxcb3ql50zau = $this->refs[$Vuffehul5noe];

                        if (Yaml::PARSE_OBJECT_FOR_MAP & $Vrycsn2lkvcj && $Vxcb3ql50zau instanceof \stdClass) {
                            $Vxcb3ql50zau = (array) $Vxcb3ql50zau;
                        }

                        if (!is_array($Vxcb3ql50zau)) {
                            throw new ParseException('YAML merge keys used with a scalar value instead of an array.', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
                        }

                        $Vqhzkfsafzrc += $Vxcb3ql50zau; 
                    } else {
                        if (isset($Vcptarsq5qe4s['value']) && '' !== $Vcptarsq5qe4s['value']) {
                            $Vcptarsq5qe4 = $Vcptarsq5qe4s['value'];
                        } else {
                            $Vcptarsq5qe4 = $this->getNextEmbedBlock();
                        }
                        $V0luatne1svb = $this->parseBlock($this->getRealCurrentLineNb() + 1, $Vcptarsq5qe4, $Vrycsn2lkvcj);

                        if (Yaml::PARSE_OBJECT_FOR_MAP & $Vrycsn2lkvcj && $V0luatne1svb instanceof \stdClass) {
                            $V0luatne1svb = (array) $V0luatne1svb;
                        }

                        if (!is_array($V0luatne1svb)) {
                            throw new ParseException('YAML merge keys used with a scalar value instead of an array.', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
                        }

                        if (isset($V0luatne1svb[0])) {
                            
                            
                            
                            foreach ($V0luatne1svb as $V0luatne1svbItem) {
                                if (Yaml::PARSE_OBJECT_FOR_MAP & $Vrycsn2lkvcj && $V0luatne1svbItem instanceof \stdClass) {
                                    $V0luatne1svbItem = (array) $V0luatne1svbItem;
                                }

                                if (!is_array($V0luatne1svbItem)) {
                                    throw new ParseException('Merge items must be arrays.', $this->getRealCurrentLineNb() + 1, $V0luatne1svbItem, $this->filename);
                                }

                                $Vqhzkfsafzrc += $V0luatne1svbItem; 
                            }
                        } else {
                            
                            
                            $Vqhzkfsafzrc += $V0luatne1svb; 
                        }
                    }
                } elseif ('<<' !== $Vlpbz5aloxqt && isset($Vcptarsq5qe4s['value']) && self::preg_match('#^&(?P<ref>[^ ]++) *+(?P<value>.*)#u', $Vcptarsq5qe4s['value'], $Virbphhh55ue)) {
                    $V3thvqtdbatd = $Virbphhh55ue['ref'];
                    $Vcptarsq5qe4s['value'] = $Virbphhh55ue['value'];
                }

                $V4nykj5zjgss = null;
                if ($Vceutrgbs1si) {
                    
                } elseif (!isset($Vcptarsq5qe4s['value']) || '' === $Vcptarsq5qe4s['value'] || 0 === strpos($Vcptarsq5qe4s['value'], '#') || (null !== $V4nykj5zjgss = $this->getLineTag($Vcptarsq5qe4s['value'], $Vrycsn2lkvcj)) || '<<' === $Vlpbz5aloxqt) {
                    
                    
                    if (!$this->isNextLineIndented() && !$this->isNextLineUnIndentedCollection()) {
                        
                        
                        if ($V1k3fcnqe00i || !isset($Vqhzkfsafzrc[$Vlpbz5aloxqt])) {
                            if (null !== $V4nykj5zjgss) {
                                $Vqhzkfsafzrc[$Vlpbz5aloxqt] = new TaggedValue($V4nykj5zjgss, '');
                            } else {
                                $Vqhzkfsafzrc[$Vlpbz5aloxqt] = null;
                            }
                        } else {
                            @trigger_error($this->getDeprecationMessage(sprintf('Duplicate key "%s" detected whilst parsing YAML. Silent handling of duplicate mapping keys in YAML is deprecated since Symfony 3.2 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.', $Vlpbz5aloxqt)), E_USER_DEPRECATED);
                        }
                    } else {
                        $Vcptarsq5qe4 = $this->parseBlock($this->getRealCurrentLineNb() + 1, $this->getNextEmbedBlock(), $Vrycsn2lkvcj);
                        if ('<<' === $Vlpbz5aloxqt) {
                            $this->refs[$V1c5amfmdxhw['ref']] = $Vcptarsq5qe4;

                            if (Yaml::PARSE_OBJECT_FOR_MAP & $Vrycsn2lkvcj && $Vcptarsq5qe4 instanceof \stdClass) {
                                $Vcptarsq5qe4 = (array) $Vcptarsq5qe4;
                            }

                            $Vqhzkfsafzrc += $Vcptarsq5qe4;
                        } elseif ($V1k3fcnqe00i || !isset($Vqhzkfsafzrc[$Vlpbz5aloxqt])) {
                            
                            
                            if (null !== $V4nykj5zjgss) {
                                $Vqhzkfsafzrc[$Vlpbz5aloxqt] = new TaggedValue($V4nykj5zjgss, $Vcptarsq5qe4);
                            } else {
                                $Vqhzkfsafzrc[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
                            }
                        } else {
                            @trigger_error($this->getDeprecationMessage(sprintf('Duplicate key "%s" detected whilst parsing YAML. Silent handling of duplicate mapping keys in YAML is deprecated since Symfony 3.2 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.', $Vlpbz5aloxqt)), E_USER_DEPRECATED);
                        }
                    }
                } else {
                    $Vcptarsq5qe4 = $this->parseValue(rtrim($Vcptarsq5qe4s['value']), $Vrycsn2lkvcj, $Vylnw34ljlp1);
                    
                    
                    if ($V1k3fcnqe00i || !isset($Vqhzkfsafzrc[$Vlpbz5aloxqt])) {
                        $Vqhzkfsafzrc[$Vlpbz5aloxqt] = $Vcptarsq5qe4;
                    } else {
                        @trigger_error($this->getDeprecationMessage(sprintf('Duplicate key "%s" detected whilst parsing YAML. Silent handling of duplicate mapping keys in YAML is deprecated since Symfony 3.2 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.', $Vlpbz5aloxqt)), E_USER_DEPRECATED);
                    }
                }
                if ($V3thvqtdbatd) {
                    $this->refs[$V3thvqtdbatd] = $Vqhzkfsafzrc[$Vlpbz5aloxqt];
                }
            } else {
                
                if ('---' === $this->currentLine) {
                    throw new ParseException('Multiple documents are not supported.', $this->currentLineNb + 1, $this->currentLine, $this->filename);
                }

                if ($Vom4zfzwlnq4 = (isset($this->currentLine[1]) && '?' === $this->currentLine[0] && ' ' === $this->currentLine[1])) {
                    @trigger_error($this->getDeprecationMessage('Starting an unquoted string with a question mark followed by a space is deprecated since Symfony 3.3 and will throw \Symfony\Component\Yaml\Exception\ParseException in 4.0.'), E_USER_DEPRECATED);
                }

                
                if (is_string($Vcptarsq5qe4) && $this->lines[0] === trim($Vcptarsq5qe4)) {
                    try {
                        $Vcptarsq5qe4 = Inline::parse($this->lines[0], $Vrycsn2lkvcj, $this->refs);
                    } catch (ParseException $Vpt32vvhspnv) {
                        $Vpt32vvhspnv->setParsedLine($this->getRealCurrentLineNb() + 1);
                        $Vpt32vvhspnv->setSnippet($this->currentLine);

                        throw $Vpt32vvhspnv;
                    }

                    return $Vcptarsq5qe4;
                }

                
                if (0 === $this->currentLineNb) {
                    $Vfggqrq1qam1 = false;
                    $V11edslhzpob = false;
                    $Vcptarsq5qe4 = '';

                    foreach ($this->lines as $Vrwsmtja4f2j) {
                        
                        if (0 === $this->offset && !$Vom4zfzwlnq4 && isset($Vrwsmtja4f2j[0]) && ' ' === $Vrwsmtja4f2j[0]) {
                            throw new ParseException('Unable to parse.', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
                        }
                        if ('' === trim($Vrwsmtja4f2j)) {
                            $Vcptarsq5qe4 .= "\n";
                        } elseif (!$Vfggqrq1qam1 && !$V11edslhzpob) {
                            $Vcptarsq5qe4 .= ' ';
                        }

                        if ('' !== trim($Vrwsmtja4f2j) && '\\' === substr($Vrwsmtja4f2j, -1)) {
                            $Vcptarsq5qe4 .= ltrim(substr($Vrwsmtja4f2j, 0, -1));
                        } elseif ('' !== trim($Vrwsmtja4f2j)) {
                            $Vcptarsq5qe4 .= trim($Vrwsmtja4f2j);
                        }

                        if ('' === trim($Vrwsmtja4f2j)) {
                            $Vfggqrq1qam1 = true;
                            $V11edslhzpob = false;
                        } elseif ('\\' === substr($Vrwsmtja4f2j, -1)) {
                            $Vfggqrq1qam1 = false;
                            $V11edslhzpob = true;
                        } else {
                            $Vfggqrq1qam1 = false;
                            $V11edslhzpob = false;
                        }
                    }

                    try {
                        return Inline::parse(trim($Vcptarsq5qe4));
                    } catch (ParseException $Vpt32vvhspnv) {
                        
                    }
                }

                throw new ParseException('Unable to parse.', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
            }
        } while ($this->moveToNextLine());

        if (null !== $Vl2ijnnhdtam) {
            $Vqhzkfsafzrc = new TaggedValue($Vl2ijnnhdtam, $Vqhzkfsafzrc);
        }

        if (Yaml::PARSE_OBJECT_FOR_MAP & $Vrycsn2lkvcj && !is_object($Vqhzkfsafzrc) && 'mapping' === $Vylnw34ljlp1) {
            $Vbj3pw2f5egf = new \stdClass();

            foreach ($Vqhzkfsafzrc as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
                $Vbj3pw2f5egf->$Vlpbz5aloxqt = $Vcptarsq5qe4;
            }

            $Vqhzkfsafzrc = $Vbj3pw2f5egf;
        }

        return empty($Vqhzkfsafzrc) ? null : $Vqhzkfsafzrc;
    }

    private function parseBlock($V5peram4ncbv, $Vklvvq0m52jf, $Vrycsn2lkvcj)
    {
        $Vt0egbbrtnud = $this->skippedLineNumbers;

        foreach ($this->locallySkippedLineNumbers as $Vrwsmtja4f2jNumber) {
            if ($Vrwsmtja4f2jNumber < $V5peram4ncbv) {
                continue;
            }

            $Vt0egbbrtnud[] = $Vrwsmtja4f2jNumber;
        }

        $V5zzh1da1wpy = new self();
        $V5zzh1da1wpy->offset = $V5peram4ncbv;
        $V5zzh1da1wpy->totalNumberOfLines = $this->totalNumberOfLines;
        $V5zzh1da1wpy->skippedLineNumbers = $Vt0egbbrtnud;
        $V5zzh1da1wpy->refs = &$this->refs;

        return $V5zzh1da1wpy->doParse($Vklvvq0m52jf, $Vrycsn2lkvcj);
    }

    
    public function getRealCurrentLineNb()
    {
        $Vzladvz5an4w = $this->currentLineNb + $this->offset;

        foreach ($this->skippedLineNumbers as $V1tbpustshw0) {
            if ($V1tbpustshw0 > $Vzladvz5an4w) {
                break;
            }

            ++$Vzladvz5an4w;
        }

        return $Vzladvz5an4w;
    }

    
    private function getCurrentLineIndentation()
    {
        return strlen($this->currentLine) - strlen(ltrim($this->currentLine, ' '));
    }

    
    private function getNextEmbedBlock($Vxja1abp34yqndentation = null, $Vxja1abp34yqnSequence = false)
    {
        $Vf1lh0getzij = $this->getCurrentLineIndentation();
        $Vee3lowjh3evScalarIndentations = array();

        if ($this->isBlockScalarHeader()) {
            $Vee3lowjh3evScalarIndentations[] = $Vf1lh0getzij;
        }

        if (!$this->moveToNextLine()) {
            return;
        }

        if (null === $Vxja1abp34yqndentation) {
            $Vwrfrlyw3abk = null;
            $Vrhdesyiykfo = 0;

            do {
                $Vdeb4x5b3obr = false;

                
                if ($this->isCurrentLineEmpty() || $this->isCurrentLineComment()) {
                    $Vdeb4x5b3obr = !$this->moveToNextLine();

                    if (!$Vdeb4x5b3obr) {
                        ++$Vrhdesyiykfo;
                    }
                } else {
                    $Vwrfrlyw3abk = $this->getCurrentLineIndentation();
                }
            } while (!$Vdeb4x5b3obr && null === $Vwrfrlyw3abk);

            for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vrhdesyiykfo; ++$Vxja1abp34yq) {
                $this->moveToPreviousLine();
            }

            $Vhxgoyns1acg = $this->isStringUnIndentedCollectionItem();

            if (!$this->isCurrentLineEmpty() && 0 === $Vwrfrlyw3abk && !$Vhxgoyns1acg) {
                throw new ParseException('Indentation problem.', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
            }
        } else {
            $Vwrfrlyw3abk = $Vxja1abp34yqndentation;
        }

        $Vqhzkfsafzrc = array();
        if ($this->getCurrentLineIndentation() >= $Vwrfrlyw3abk) {
            $Vqhzkfsafzrc[] = substr($this->currentLine, $Vwrfrlyw3abk);
        } elseif ($this->isCurrentLineEmpty() || $this->isCurrentLineComment()) {
            $Vqhzkfsafzrc[] = $this->currentLine;
        } else {
            $this->moveToPreviousLine();

            return;
        }

        if ($Vxja1abp34yqnSequence && $Vf1lh0getzij === $Vwrfrlyw3abk && isset($Vqhzkfsafzrc[0][0]) && '-' === $Vqhzkfsafzrc[0][0]) {
            
            
            $this->moveToPreviousLine();

            return;
        }

        $Vxja1abp34yqsItUnindentedCollection = $this->isStringUnIndentedCollectionItem();

        if (empty($Vee3lowjh3evScalarIndentations) && $this->isBlockScalarHeader()) {
            $Vee3lowjh3evScalarIndentations[] = $this->getCurrentLineIndentation();
        }

        $Vt3o4bttacj5 = $this->getCurrentLineIndentation();

        while ($this->moveToNextLine()) {
            $Vxja1abp34yqndent = $this->getCurrentLineIndentation();

            
            if (!empty($Vee3lowjh3evScalarIndentations) && $Vxja1abp34yqndent < $Vt3o4bttacj5 && '' !== trim($this->currentLine)) {
                foreach ($Vee3lowjh3evScalarIndentations as $Vlpbz5aloxqt => $Vee3lowjh3evScalarIndentation) {
                    if ($Vee3lowjh3evScalarIndentation >= $Vxja1abp34yqndent) {
                        unset($Vee3lowjh3evScalarIndentations[$Vlpbz5aloxqt]);
                    }
                }
            }

            if (empty($Vee3lowjh3evScalarIndentations) && !$this->isCurrentLineComment() && $this->isBlockScalarHeader()) {
                $Vee3lowjh3evScalarIndentations[] = $Vxja1abp34yqndent;
            }

            $Vt3o4bttacj5 = $Vxja1abp34yqndent;

            if ($Vxja1abp34yqsItUnindentedCollection && !$this->isCurrentLineEmpty() && !$this->isStringUnIndentedCollectionItem() && $Vwrfrlyw3abk === $Vxja1abp34yqndent) {
                $this->moveToPreviousLine();
                break;
            }

            if ($this->isCurrentLineBlank()) {
                $Vqhzkfsafzrc[] = substr($this->currentLine, $Vwrfrlyw3abk);
                continue;
            }

            if ($Vxja1abp34yqndent >= $Vwrfrlyw3abk) {
                $Vqhzkfsafzrc[] = substr($this->currentLine, $Vwrfrlyw3abk);
            } elseif ($this->isCurrentLineComment()) {
                $Vqhzkfsafzrc[] = $this->currentLine;
            } elseif (0 == $Vxja1abp34yqndent) {
                $this->moveToPreviousLine();

                break;
            } else {
                throw new ParseException('Indentation problem.', $this->getRealCurrentLineNb() + 1, $this->currentLine, $this->filename);
            }
        }

        return implode("\n", $Vqhzkfsafzrc);
    }

    
    private function moveToNextLine()
    {
        if ($this->currentLineNb >= count($this->lines) - 1) {
            return false;
        }

        $this->currentLine = $this->lines[++$this->currentLineNb];

        return true;
    }

    
    private function moveToPreviousLine()
    {
        if ($this->currentLineNb < 1) {
            return false;
        }

        $this->currentLine = $this->lines[--$this->currentLineNb];

        return true;
    }

    
    private function parseValue($Vcptarsq5qe4, $Vrycsn2lkvcj, $Vylnw34ljlp1)
    {
        if (0 === strpos($Vcptarsq5qe4, '*')) {
            if (false !== $Vc5b0ouiyxjh = strpos($Vcptarsq5qe4, '#')) {
                $Vcptarsq5qe4 = substr($Vcptarsq5qe4, 1, $Vc5b0ouiyxjh - 2);
            } else {
                $Vcptarsq5qe4 = substr($Vcptarsq5qe4, 1);
            }

            if (!array_key_exists($Vcptarsq5qe4, $this->refs)) {
                throw new ParseException(sprintf('Reference "%s" does not exist.', $Vcptarsq5qe4), $this->currentLineNb + 1, $this->currentLine, $this->filename);
            }

            return $this->refs[$Vcptarsq5qe4];
        }

        if (self::preg_match('/^(?:'.self::TAG_PATTERN.' +)?'.self::BLOCK_SCALAR_HEADER_PATTERN.'$/', $Vcptarsq5qe4, $Virbphhh55ue)) {
            $Vnjh3u1nwvg3 = isset($Virbphhh55ue['modifiers']) ? $Virbphhh55ue['modifiers'] : '';

            $Vqhzkfsafzrc = $this->parseBlockScalar($Virbphhh55ue['separator'], preg_replace('#\d+#', '', $Vnjh3u1nwvg3), (int) abs($Vnjh3u1nwvg3));

            if ('' !== $Virbphhh55ue['tag']) {
                if ('!!binary' === $Virbphhh55ue['tag']) {
                    return Inline::evaluateBinaryScalar($Vqhzkfsafzrc);
                } elseif ('tagged' === $Virbphhh55ue['tag']) {
                    return new TaggedValue(substr($Virbphhh55ue['tag'], 1), $Vqhzkfsafzrc);
                } elseif ('!' !== $Virbphhh55ue['tag']) {
                    @trigger_error($this->getDeprecationMessage(sprintf('Using the custom tag "%s" for the value "%s" is deprecated since Symfony 3.3. It will be replaced by an instance of %s in 4.0.', $Virbphhh55ue['tag'], $Vqhzkfsafzrc, TaggedValue::class)), E_USER_DEPRECATED);
                }
            }

            return $Vqhzkfsafzrc;
        }

        try {
            $Vfggycxpwa5h = '' !== $Vcptarsq5qe4 && ('"' === $Vcptarsq5qe4[0] || "'" === $Vcptarsq5qe4[0]) ? $Vcptarsq5qe4[0] : null;

            
            if (null !== $Vfggycxpwa5h && self::preg_match('/^'.$Vfggycxpwa5h.'.*'.$Vfggycxpwa5h.'(\s*#.*)?$/', $Vcptarsq5qe4)) {
                return Inline::parse($Vcptarsq5qe4, $Vrycsn2lkvcj, $this->refs);
            }

            $Vbkt5laoakgf = array();

            while ($this->moveToNextLine()) {
                
                if (null === $Vfggycxpwa5h && 0 === $this->getCurrentLineIndentation()) {
                    $this->moveToPreviousLine();

                    break;
                }

                $Vbkt5laoakgf[] = trim($this->currentLine);

                
                if ('' !== $this->currentLine && substr($this->currentLine, -1) === $Vfggycxpwa5h) {
                    break;
                }
            }

            for ($Vxja1abp34yq = 0, $Vbkt5laoakgfCount = count($Vbkt5laoakgf), $Vd05tg3vamlb = false; $Vxja1abp34yq < $Vbkt5laoakgfCount; ++$Vxja1abp34yq) {
                if ('' === $Vbkt5laoakgf[$Vxja1abp34yq]) {
                    $Vcptarsq5qe4 .= "\n";
                    $Vd05tg3vamlb = true;
                } elseif ($Vd05tg3vamlb) {
                    $Vcptarsq5qe4 .= $Vbkt5laoakgf[$Vxja1abp34yq];
                    $Vd05tg3vamlb = false;
                } else {
                    $Vcptarsq5qe4 .= ' '.$Vbkt5laoakgf[$Vxja1abp34yq];
                    $Vd05tg3vamlb = false;
                }
            }

            Inline::$V0luatne1svbLineNumber = $this->getRealCurrentLineNb();

            $V0luatne1svbValue = Inline::parse($Vcptarsq5qe4, $Vrycsn2lkvcj, $this->refs);

            if ('mapping' === $Vylnw34ljlp1 && is_string($V0luatne1svbValue) && '"' !== $Vcptarsq5qe4[0] && "'" !== $Vcptarsq5qe4[0] && '[' !== $Vcptarsq5qe4[0] && '{' !== $Vcptarsq5qe4[0] && '!' !== $Vcptarsq5qe4[0] && false !== strpos($V0luatne1svbValue, ': ')) {
                throw new ParseException('A colon cannot be used in an unquoted mapping value.', $this->getRealCurrentLineNb() + 1, $Vcptarsq5qe4, $this->filename);
            }

            return $V0luatne1svbValue;
        } catch (ParseException $Vpt32vvhspnv) {
            $Vpt32vvhspnv->setParsedLine($this->getRealCurrentLineNb() + 1);
            $Vpt32vvhspnv->setSnippet($this->currentLine);

            throw $Vpt32vvhspnv;
        }
    }

    
    private function parseBlockScalar($Vslnign1ze5t, $V1wz2hjdybij = '', $Vxja1abp34yqndentation = 0)
    {
        $Vysju4xjkhzv = $this->moveToNextLine();
        if (!$Vysju4xjkhzv) {
            return '';
        }

        $Vxja1abp34yqsCurrentLineBlank = $this->isCurrentLineBlank();
        $Vee3lowjh3evLines = array();

        
        while ($Vysju4xjkhzv && $Vxja1abp34yqsCurrentLineBlank) {
            
            if ($Vysju4xjkhzv = $this->moveToNextLine()) {
                $Vee3lowjh3evLines[] = '';
                $Vxja1abp34yqsCurrentLineBlank = $this->isCurrentLineBlank();
            }
        }

        
        if (0 === $Vxja1abp34yqndentation) {
            if (self::preg_match('/^ +/', $this->currentLine, $Virbphhh55ue)) {
                $Vxja1abp34yqndentation = strlen($Virbphhh55ue[0]);
            }
        }

        if ($Vxja1abp34yqndentation > 0) {
            $Vp1x1qfledcv = sprintf('/^ {%d}(.*)$/', $Vxja1abp34yqndentation);

            while (
                $Vysju4xjkhzv && (
                    $Vxja1abp34yqsCurrentLineBlank ||
                    self::preg_match($Vp1x1qfledcv, $this->currentLine, $Virbphhh55ue)
                )
            ) {
                if ($Vxja1abp34yqsCurrentLineBlank && strlen($this->currentLine) > $Vxja1abp34yqndentation) {
                    $Vee3lowjh3evLines[] = substr($this->currentLine, $Vxja1abp34yqndentation);
                } elseif ($Vxja1abp34yqsCurrentLineBlank) {
                    $Vee3lowjh3evLines[] = '';
                } else {
                    $Vee3lowjh3evLines[] = $Virbphhh55ue[1];
                }

                
                if ($Vysju4xjkhzv = $this->moveToNextLine()) {
                    $Vxja1abp34yqsCurrentLineBlank = $this->isCurrentLineBlank();
                }
            }
        } elseif ($Vysju4xjkhzv) {
            $Vee3lowjh3evLines[] = '';
        }

        if ($Vysju4xjkhzv) {
            $Vee3lowjh3evLines[] = '';
            $this->moveToPreviousLine();
        } elseif (!$Vysju4xjkhzv && !$this->isCurrentLineLastLineInDocument()) {
            $Vee3lowjh3evLines[] = '';
        }

        
        if ('>' === $Vslnign1ze5t) {
            $Vlakcyq2pqgp = '';
            $Vdzt5xnmr23i = false;
            $Vd05tg3vamlb = false;

            for ($Vxja1abp34yq = 0, $Vee3lowjh3evLinesCount = count($Vee3lowjh3evLines); $Vxja1abp34yq < $Vee3lowjh3evLinesCount; ++$Vxja1abp34yq) {
                if ('' === $Vee3lowjh3evLines[$Vxja1abp34yq]) {
                    $Vlakcyq2pqgp .= "\n";
                    $Vdzt5xnmr23i = false;
                    $Vd05tg3vamlb = true;
                } elseif (' ' === $Vee3lowjh3evLines[$Vxja1abp34yq][0]) {
                    $Vlakcyq2pqgp .= "\n".$Vee3lowjh3evLines[$Vxja1abp34yq];
                    $Vdzt5xnmr23i = true;
                    $Vd05tg3vamlb = false;
                } elseif ($Vdzt5xnmr23i) {
                    $Vlakcyq2pqgp .= "\n".$Vee3lowjh3evLines[$Vxja1abp34yq];
                    $Vdzt5xnmr23i = false;
                    $Vd05tg3vamlb = false;
                } elseif ($Vd05tg3vamlb || 0 === $Vxja1abp34yq) {
                    $Vlakcyq2pqgp .= $Vee3lowjh3evLines[$Vxja1abp34yq];
                    $Vdzt5xnmr23i = false;
                    $Vd05tg3vamlb = false;
                } else {
                    $Vlakcyq2pqgp .= ' '.$Vee3lowjh3evLines[$Vxja1abp34yq];
                    $Vdzt5xnmr23i = false;
                    $Vd05tg3vamlb = false;
                }
            }
        } else {
            $Vlakcyq2pqgp = implode("\n", $Vee3lowjh3evLines);
        }

        
        if ('' === $V1wz2hjdybij) {
            $Vlakcyq2pqgp = preg_replace('/\n+$/', "\n", $Vlakcyq2pqgp);
        } elseif ('-' === $V1wz2hjdybij) {
            $Vlakcyq2pqgp = preg_replace('/\n+$/', '', $Vlakcyq2pqgp);
        }

        return $Vlakcyq2pqgp;
    }

    
    private function isNextLineIndented()
    {
        $Vdsujpwov152 = $this->getCurrentLineIndentation();
        $Vrhdesyiykfo = 0;

        do {
            $Vdeb4x5b3obr = !$this->moveToNextLine();

            if (!$Vdeb4x5b3obr) {
                ++$Vrhdesyiykfo;
            }
        } while (!$Vdeb4x5b3obr && ($this->isCurrentLineEmpty() || $this->isCurrentLineComment()));

        if ($Vdeb4x5b3obr) {
            return false;
        }

        $Vlgck4bmjqgq = $this->getCurrentLineIndentation() > $Vdsujpwov152;

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vrhdesyiykfo; ++$Vxja1abp34yq) {
            $this->moveToPreviousLine();
        }

        return $Vlgck4bmjqgq;
    }

    
    private function isCurrentLineEmpty()
    {
        return $this->isCurrentLineBlank() || $this->isCurrentLineComment();
    }

    
    private function isCurrentLineBlank()
    {
        return '' == trim($this->currentLine, ' ');
    }

    
    private function isCurrentLineComment()
    {
        
        $Vmfpvwfmw411 = ltrim($this->currentLine, ' ');

        return '' !== $Vmfpvwfmw411 && '#' === $Vmfpvwfmw411[0];
    }

    private function isCurrentLineLastLineInDocument()
    {
        return ($this->offset + $this->currentLineNb) >= ($this->totalNumberOfLines - 1);
    }

    
    private function cleanup($Vcptarsq5qe4)
    {
        $Vcptarsq5qe4 = str_replace(array("\r\n", "\r"), "\n", $Vcptarsq5qe4);

        
        $Vdbkece3gnp5 = 0;
        $Vcptarsq5qe4 = preg_replace('#^\%YAML[: ][\d\.]+.*\n#u', '', $Vcptarsq5qe4, -1, $Vdbkece3gnp5);
        $this->offset += $Vdbkece3gnp5;

        
        $Vorgi3exy2gj = preg_replace('#^(\#.*?\n)+#s', '', $Vcptarsq5qe4, -1, $Vdbkece3gnp5);
        if (1 === $Vdbkece3gnp5) {
            
            $this->offset += substr_count($Vcptarsq5qe4, "\n") - substr_count($Vorgi3exy2gj, "\n");
            $Vcptarsq5qe4 = $Vorgi3exy2gj;
        }

        
        $Vorgi3exy2gj = preg_replace('#^\-\-\-.*?\n#s', '', $Vcptarsq5qe4, -1, $Vdbkece3gnp5);
        if (1 === $Vdbkece3gnp5) {
            
            $this->offset += substr_count($Vcptarsq5qe4, "\n") - substr_count($Vorgi3exy2gj, "\n");
            $Vcptarsq5qe4 = $Vorgi3exy2gj;

            
            $Vcptarsq5qe4 = preg_replace('#\.\.\.\s*$#', '', $Vcptarsq5qe4);
        }

        return $Vcptarsq5qe4;
    }

    
    private function isNextLineUnIndentedCollection()
    {
        $Vdsujpwov152 = $this->getCurrentLineIndentation();
        $Vrhdesyiykfo = 0;

        do {
            $Vdeb4x5b3obr = !$this->moveToNextLine();

            if (!$Vdeb4x5b3obr) {
                ++$Vrhdesyiykfo;
            }
        } while (!$Vdeb4x5b3obr && ($this->isCurrentLineEmpty() || $this->isCurrentLineComment()));

        if ($Vdeb4x5b3obr) {
            return false;
        }

        $Vlgck4bmjqgq = $this->getCurrentLineIndentation() === $Vdsujpwov152 && $this->isStringUnIndentedCollectionItem();

        for ($Vxja1abp34yq = 0; $Vxja1abp34yq < $Vrhdesyiykfo; ++$Vxja1abp34yq) {
            $this->moveToPreviousLine();
        }

        return $Vlgck4bmjqgq;
    }

    
    private function isStringUnIndentedCollectionItem()
    {
        return '-' === rtrim($this->currentLine) || 0 === strpos($this->currentLine, '- ');
    }

    
    private function isBlockScalarHeader()
    {
        return (bool) self::preg_match('~'.self::BLOCK_SCALAR_HEADER_PATTERN.'$~', $this->currentLine);
    }

    
    public static function preg_match($Vp1x1qfledcv, $Vkjvds2sfywy, &$Virbphhh55ue = null, $Vrycsn2lkvcj = 0, $V5peram4ncbv = 0)
    {
        if (false === $Vlgck4bmjqgq = preg_match($Vp1x1qfledcv, $Vkjvds2sfywy, $Virbphhh55ue, $Vrycsn2lkvcj, $V5peram4ncbv)) {
            switch (preg_last_error()) {
                case PREG_INTERNAL_ERROR:
                    $Vpt32vvhspnvrror = 'Internal PCRE error.';
                    break;
                case PREG_BACKTRACK_LIMIT_ERROR:
                    $Vpt32vvhspnvrror = 'pcre.backtrack_limit reached.';
                    break;
                case PREG_RECURSION_LIMIT_ERROR:
                    $Vpt32vvhspnvrror = 'pcre.recursion_limit reached.';
                    break;
                case PREG_BAD_UTF8_ERROR:
                    $Vpt32vvhspnvrror = 'Malformed UTF-8 data.';
                    break;
                case PREG_BAD_UTF8_OFFSET_ERROR:
                    $Vpt32vvhspnvrror = 'Offset doesn\'t correspond to the begin of a valid UTF-8 code point.';
                    break;
                default:
                    $Vpt32vvhspnvrror = 'Error.';
            }

            throw new ParseException($Vpt32vvhspnvrror);
        }

        return $Vlgck4bmjqgq;
    }

    
    private function trimTag($Vcptarsq5qe4)
    {
        if ('!' === $Vcptarsq5qe4[0]) {
            return ltrim(substr($Vcptarsq5qe4, 1, strcspn($Vcptarsq5qe4, " \r\n", 1)), ' ');
        }

        return $Vcptarsq5qe4;
    }

    private function getLineTag($Vcptarsq5qe4, $Vrycsn2lkvcj, $Vvxluii0coiv = true)
    {
        if ('' === $Vcptarsq5qe4 || '!' !== $Vcptarsq5qe4[0] || 1 !== self::preg_match('/^'.self::TAG_PATTERN.' *( +#.*)?$/', $Vcptarsq5qe4, $Virbphhh55ue)) {
            return;
        }

        if ($Vvxluii0coiv && !$this->isNextLineIndented()) {
            return;
        }

        $Vl2ijnnhdtam = substr($Virbphhh55ue['tag'], 1);

        
        if ($Vl2ijnnhdtam && '!' === $Vl2ijnnhdtam[0]) {
            throw new ParseException(sprintf('The built-in tag "!%s" is not implemented.', $Vl2ijnnhdtam), $this->getRealCurrentLineNb() + 1, $Vcptarsq5qe4, $this->filename);
        }

        if (Yaml::PARSE_CUSTOM_TAGS & $Vrycsn2lkvcj) {
            return $Vl2ijnnhdtam;
        }

        throw new ParseException(sprintf('Tags support is not enabled. You must use the flag `Yaml::PARSE_CUSTOM_TAGS` to use "%s".', $Virbphhh55ue['tag']), $this->getRealCurrentLineNb() + 1, $Vcptarsq5qe4, $this->filename);
    }

    private function getDeprecationMessage($Vbl4yrmdan1y)
    {
        $Vbl4yrmdan1y = rtrim($Vbl4yrmdan1y, '.');

        if (null !== $this->filename) {
            $Vbl4yrmdan1y .= ' in '.$this->filename;
        }

        $Vbl4yrmdan1y .= ' on line '.($this->getRealCurrentLineNb() + 1);

        return $Vbl4yrmdan1y.'.';
    }
}
