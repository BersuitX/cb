<?php



class PHP_CodeCoverage_Report_Clover
{
    
    public function process(PHP_CodeCoverage $Vbt1bqdir3su, $Vec3c2fwpbib = null, $Vgpjmw221p0b = null)
    {
        $V5k5sphw0j1x               = new DOMDocument('1.0', 'UTF-8');
        $V5k5sphw0j1x->formatOutput = true;

        $Va1hgik4yvde = $V5k5sphw0j1x->createElement('coverage');
        $Va1hgik4yvde->setAttribute('generated', (int) $_SERVER['REQUEST_TIME']);
        $V5k5sphw0j1x->appendChild($Va1hgik4yvde);

        $Vaw41yelquki = $V5k5sphw0j1x->createElement('project');
        $Vaw41yelquki->setAttribute('timestamp', (int) $_SERVER['REQUEST_TIME']);

        if (is_string($Vgpjmw221p0b)) {
            $Vaw41yelquki->setAttribute('name', $Vgpjmw221p0b);
        }

        $Va1hgik4yvde->appendChild($Vaw41yelquki);

        $Vxvcp0j5msnw = array();
        $Vem32crslzoa   = $Vbt1bqdir3su->getReport();
        unset($Vbt1bqdir3su);

        foreach ($Vem32crslzoa as $Virsew13xpli) {
            $Vgpjmw221p0bspace = 'global';

            if (!$Virsew13xpli instanceof PHP_CodeCoverage_Report_Node_File) {
                continue;
            }

            $Vfwgpwwbqr0m = $V5k5sphw0j1x->createElement('file');
            $Vfwgpwwbqr0m->setAttribute('name', $Virsew13xpli->getPath());

            $Vcoznk2huoff  = $Virsew13xpli->getClassesAndTraits();
            $Vbt1bqdir3su = $Virsew13xpli->getCoverageData();
            $Vbkt5laoakgf    = array();

            foreach ($Vcoznk2huoff as $Vh0iae5cev4i => $Vqmu1sajhgfn) {
                $Vqmu1sajhgfnStatements        = 0;
                $Vkugg5eb525v = 0;
                $Vsj4al4d1ukx         = 0;
                $Vqmu1sajhgfnMethods           = 0;

                foreach ($Vqmu1sajhgfn['methods'] as $Vc1exo5hbki5 => $Vtlfvdwskdge) {
                    if ($Vtlfvdwskdge['executableLines']  == 0) {
                        continue;
                    }

                    $Vqmu1sajhgfnMethods++;
                    $Vqmu1sajhgfnStatements        += $Vtlfvdwskdge['executableLines'];
                    $Vkugg5eb525v += $Vtlfvdwskdge['executedLines'];
                    if ($Vtlfvdwskdge['coverage'] == 100) {
                        $Vsj4al4d1ukx++;
                    }

                    $VtlfvdwskdgeCount = 0;
                    for ($Vxja1abp34yq  = $Vtlfvdwskdge['startLine'];
                         $Vxja1abp34yq <= $Vtlfvdwskdge['endLine'];
                         $Vxja1abp34yq++) {
                        if (isset($Vbt1bqdir3su[$Vxja1abp34yq]) && ($Vbt1bqdir3su[$Vxja1abp34yq] !== null)) {
                            $VtlfvdwskdgeCount = max($VtlfvdwskdgeCount, count($Vbt1bqdir3su[$Vxja1abp34yq]));
                        }
                    }

                    $Vbkt5laoakgf[$Vtlfvdwskdge['startLine']] = array(
                        'count' => $VtlfvdwskdgeCount,
                        'crap'  => $Vtlfvdwskdge['crap'],
                        'type'  => 'method',
                        'name'  => $Vc1exo5hbki5
                    );
                }

                if (!empty($Vqmu1sajhgfn['package']['namespace'])) {
                    $Vgpjmw221p0bspace = $Vqmu1sajhgfn['package']['namespace'];
                }

                $V4mdj40n5euz = $V5k5sphw0j1x->createElement('class');
                $V4mdj40n5euz->setAttribute('name', $Vh0iae5cev4i);
                $V4mdj40n5euz->setAttribute('namespace', $Vgpjmw221p0bspace);

                if (!empty($Vqmu1sajhgfn['package']['fullPackage'])) {
                    $V4mdj40n5euz->setAttribute(
                        'fullPackage',
                        $Vqmu1sajhgfn['package']['fullPackage']
                    );
                }

                if (!empty($Vqmu1sajhgfn['package']['category'])) {
                    $V4mdj40n5euz->setAttribute(
                        'category',
                        $Vqmu1sajhgfn['package']['category']
                    );
                }

                if (!empty($Vqmu1sajhgfn['package']['package'])) {
                    $V4mdj40n5euz->setAttribute(
                        'package',
                        $Vqmu1sajhgfn['package']['package']
                    );
                }

                if (!empty($Vqmu1sajhgfn['package']['subpackage'])) {
                    $V4mdj40n5euz->setAttribute(
                        'subpackage',
                        $Vqmu1sajhgfn['package']['subpackage']
                    );
                }

                $Vfwgpwwbqr0m->appendChild($V4mdj40n5euz);

                $Vkquluawx13o = $V5k5sphw0j1x->createElement('metrics');
                $Vkquluawx13o->setAttribute('methods', $Vqmu1sajhgfnMethods);
                $Vkquluawx13o->setAttribute('coveredmethods', $Vsj4al4d1ukx);
                $Vkquluawx13o->setAttribute('conditionals', 0);
                $Vkquluawx13o->setAttribute('coveredconditionals', 0);
                $Vkquluawx13o->setAttribute('statements', $Vqmu1sajhgfnStatements);
                $Vkquluawx13o->setAttribute(
                    'coveredstatements',
                    $Vkugg5eb525v
                );
                $Vkquluawx13o->setAttribute(
                    'elements',
                    $Vqmu1sajhgfnMethods +
                    $Vqmu1sajhgfnStatements
                    
                );
                $Vkquluawx13o->setAttribute(
                    'coveredelements',
                    $Vsj4al4d1ukx +
                    $Vkugg5eb525v
                    
                );
                $V4mdj40n5euz->appendChild($Vkquluawx13o);
            }

            foreach ($Vbt1bqdir3su as $Vrwsmtja4f2j => $Vqhzkfsafzrc) {
                if ($Vqhzkfsafzrc === null || isset($Vbkt5laoakgf[$Vrwsmtja4f2j])) {
                    continue;
                }

                $Vbkt5laoakgf[$Vrwsmtja4f2j] = array(
                    'count' => count($Vqhzkfsafzrc), 'type' => 'stmt'
                );
            }

            ksort($Vbkt5laoakgf);

            foreach ($Vbkt5laoakgf as $Vrwsmtja4f2j => $Vqhzkfsafzrc) {
                $V0oszfriduig = $V5k5sphw0j1x->createElement('line');
                $V0oszfriduig->setAttribute('num', $Vrwsmtja4f2j);
                $V0oszfriduig->setAttribute('type', $Vqhzkfsafzrc['type']);

                if (isset($Vqhzkfsafzrc['name'])) {
                    $V0oszfriduig->setAttribute('name', $Vqhzkfsafzrc['name']);
                }

                if (isset($Vqhzkfsafzrc['crap'])) {
                    $V0oszfriduig->setAttribute('crap', $Vqhzkfsafzrc['crap']);
                }

                $V0oszfriduig->setAttribute('count', $Vqhzkfsafzrc['count']);
                $Vfwgpwwbqr0m->appendChild($V0oszfriduig);
            }

            $Vbkt5laoakgfOfCode = $Virsew13xpli->getLinesOfCode();

            $Vkquluawx13o = $V5k5sphw0j1x->createElement('metrics');
            $Vkquluawx13o->setAttribute('loc', $Vbkt5laoakgfOfCode['loc']);
            $Vkquluawx13o->setAttribute('ncloc', $Vbkt5laoakgfOfCode['ncloc']);
            $Vkquluawx13o->setAttribute('classes', $Virsew13xpli->getNumClassesAndTraits());
            $Vkquluawx13o->setAttribute('methods', $Virsew13xpli->getNumMethods());
            $Vkquluawx13o->setAttribute(
                'coveredmethods',
                $Virsew13xpli->getNumTestedMethods()
            );
            $Vkquluawx13o->setAttribute('conditionals', 0);
            $Vkquluawx13o->setAttribute('coveredconditionals', 0);
            $Vkquluawx13o->setAttribute(
                'statements',
                $Virsew13xpli->getNumExecutableLines()
            );
            $Vkquluawx13o->setAttribute(
                'coveredstatements',
                $Virsew13xpli->getNumExecutedLines()
            );
            $Vkquluawx13o->setAttribute(
                'elements',
                $Virsew13xpli->getNumMethods() + $Virsew13xpli->getNumExecutableLines()
                
            );
            $Vkquluawx13o->setAttribute(
                'coveredelements',
                $Virsew13xpli->getNumTestedMethods() + $Virsew13xpli->getNumExecutedLines()
                
            );
            $Vfwgpwwbqr0m->appendChild($Vkquluawx13o);

            if ($Vgpjmw221p0bspace == 'global') {
                $Vaw41yelquki->appendChild($Vfwgpwwbqr0m);
            } else {
                if (!isset($Vxvcp0j5msnw[$Vgpjmw221p0bspace])) {
                    $Vxvcp0j5msnw[$Vgpjmw221p0bspace] = $V5k5sphw0j1x->createElement(
                        'package'
                    );

                    $Vxvcp0j5msnw[$Vgpjmw221p0bspace]->setAttribute('name', $Vgpjmw221p0bspace);
                    $Vaw41yelquki->appendChild($Vxvcp0j5msnw[$Vgpjmw221p0bspace]);
                }

                $Vxvcp0j5msnw[$Vgpjmw221p0bspace]->appendChild($Vfwgpwwbqr0m);
            }
        }

        $Vbkt5laoakgfOfCode = $Vem32crslzoa->getLinesOfCode();

        $Vkquluawx13o = $V5k5sphw0j1x->createElement('metrics');
        $Vkquluawx13o->setAttribute('files', count($Vem32crslzoa));
        $Vkquluawx13o->setAttribute('loc', $Vbkt5laoakgfOfCode['loc']);
        $Vkquluawx13o->setAttribute('ncloc', $Vbkt5laoakgfOfCode['ncloc']);
        $Vkquluawx13o->setAttribute(
            'classes',
            $Vem32crslzoa->getNumClassesAndTraits()
        );
        $Vkquluawx13o->setAttribute('methods', $Vem32crslzoa->getNumMethods());
        $Vkquluawx13o->setAttribute(
            'coveredmethods',
            $Vem32crslzoa->getNumTestedMethods()
        );
        $Vkquluawx13o->setAttribute('conditionals', 0);
        $Vkquluawx13o->setAttribute('coveredconditionals', 0);
        $Vkquluawx13o->setAttribute(
            'statements',
            $Vem32crslzoa->getNumExecutableLines()
        );
        $Vkquluawx13o->setAttribute(
            'coveredstatements',
            $Vem32crslzoa->getNumExecutedLines()
        );
        $Vkquluawx13o->setAttribute(
            'elements',
            $Vem32crslzoa->getNumMethods() + $Vem32crslzoa->getNumExecutableLines()
            
        );
        $Vkquluawx13o->setAttribute(
            'coveredelements',
            $Vem32crslzoa->getNumTestedMethods() + $Vem32crslzoa->getNumExecutedLines()
            
        );

        $Vaw41yelquki->appendChild($Vkquluawx13o);

        if ($Vec3c2fwpbib !== null) {
            if (!is_dir(dirname($Vec3c2fwpbib))) {
                mkdir(dirname($Vec3c2fwpbib), 0777, true);
            }

            return $V5k5sphw0j1x->save($Vec3c2fwpbib);
        } else {
            return $V5k5sphw0j1x->saveXML();
        }
    }
}
