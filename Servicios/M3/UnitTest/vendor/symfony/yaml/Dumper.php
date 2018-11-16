<?php



namespace Symfony\Component\Yaml;


class Dumper
{
    
    protected $Vgnmq54cpxoo;

    
    public function __construct($Vgnmq54cpxoo = 4)
    {
        if ($Vgnmq54cpxoo < 1) {
            throw new \InvalidArgumentException('The indentation must be greater than zero.');
        }

        $this->indentation = $Vgnmq54cpxoo;
    }

    
    public function setIndentation($V4ld3lgz1zfy)
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since Symfony 3.1 and will be removed in 4.0. Pass the indentation to the constructor instead.', E_USER_DEPRECATED);

        $this->indentation = (int) $V4ld3lgz1zfy;
    }

    
    public function dump($Vioma0xlpppc, $Vpggj2bp4nlr = 0, $Vrdvd0lwwb1c = 0, $Vrycsn2lkvcj = 0)
    {
        if (is_bool($Vrycsn2lkvcj)) {
            @trigger_error('Passing a boolean flag to toggle exception handling is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE flag instead.', E_USER_DEPRECATED);

            if ($Vrycsn2lkvcj) {
                $Vrycsn2lkvcj = Yaml::DUMP_EXCEPTION_ON_INVALID_TYPE;
            } else {
                $Vrycsn2lkvcj = 0;
            }
        }

        if (func_num_args() >= 5) {
            @trigger_error('Passing a boolean flag to toggle object support is deprecated since Symfony 3.1 and will be removed in 4.0. Use the Yaml::DUMP_OBJECT flag instead.', E_USER_DEPRECATED);

            if (func_get_arg(4)) {
                $Vrycsn2lkvcj |= Yaml::DUMP_OBJECT;
            }
        }

        $Vvaiuwffullu = '';
        $V2hf2uebv5m0 = $Vrdvd0lwwb1c ? str_repeat(' ', $Vrdvd0lwwb1c) : '';
        $Vkfnyfmogksu = true;

        if (Yaml::DUMP_OBJECT_AS_MAP & $Vrycsn2lkvcj && ($Vioma0xlpppc instanceof \ArrayObject || $Vioma0xlpppc instanceof \stdClass)) {
            $Vkfnyfmogksu = empty((array) $Vioma0xlpppc);
        }

        if ($Vpggj2bp4nlr <= 0 || (!is_array($Vioma0xlpppc) && $Vkfnyfmogksu) || empty($Vioma0xlpppc)) {
            $Vvaiuwffullu .= $V2hf2uebv5m0.Inline::dump($Vioma0xlpppc, $Vrycsn2lkvcj);
        } else {
            $Vbevyx0dmxjg = Inline::isHash($Vioma0xlpppc);

            foreach ($Vioma0xlpppc as $Vlpbz5aloxqt => $Vcptarsq5qe4) {
                if ($Vpggj2bp4nlr >= 1 && Yaml::DUMP_MULTI_LINE_LITERAL_BLOCK & $Vrycsn2lkvcj && is_string($Vcptarsq5qe4) && false !== strpos($Vcptarsq5qe4, "\n") && false === strpos($Vcptarsq5qe4, "\r\n")) {
                    
                    
                    $Vj2wl5asakye = (' ' === substr($Vcptarsq5qe4, 0, 1)) ? (string) $this->indentation : '';
                    $Vvaiuwffullu .= sprintf("%s%s%s |%s\n", $V2hf2uebv5m0, $Vbevyx0dmxjg ? Inline::dump($Vlpbz5aloxqt, $Vrycsn2lkvcj).':' : '-', '', $Vj2wl5asakye);

                    foreach (preg_split('/\n|\r\n/', $Vcptarsq5qe4) as $Vk0apvw1awpz) {
                        $Vvaiuwffullu .= sprintf("%s%s%s\n", $V2hf2uebv5m0, str_repeat(' ', $this->indentation), $Vk0apvw1awpz);
                    }

                    continue;
                }

                $Vkfnyfmogksu = true;

                if (Yaml::DUMP_OBJECT_AS_MAP & $Vrycsn2lkvcj && ($Vcptarsq5qe4 instanceof \ArrayObject || $Vcptarsq5qe4 instanceof \stdClass)) {
                    $Vkfnyfmogksu = empty((array) $Vcptarsq5qe4);
                }

                $Vjvxel5prpjj = $Vpggj2bp4nlr - 1 <= 0 || !is_array($Vcptarsq5qe4) && $Vkfnyfmogksu || empty($Vcptarsq5qe4);

                $Vvaiuwffullu .= sprintf('%s%s%s%s',
                    $V2hf2uebv5m0,
                    $Vbevyx0dmxjg ? Inline::dump($Vlpbz5aloxqt, $Vrycsn2lkvcj).':' : '-',
                    $Vjvxel5prpjj ? ' ' : "\n",
                    $this->dump($Vcptarsq5qe4, $Vpggj2bp4nlr - 1, $Vjvxel5prpjj ? 0 : $Vrdvd0lwwb1c + $this->indentation, $Vrycsn2lkvcj)
                ).($Vjvxel5prpjj ? "\n" : '');
            }
        }

        return $Vvaiuwffullu;
    }
}
