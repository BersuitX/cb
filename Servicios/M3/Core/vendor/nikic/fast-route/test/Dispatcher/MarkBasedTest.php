<?php

namespace FastRoute\Dispatcher;

class MarkBasedTest extends DispatcherTest
{
    public function setUp()
    {
        preg_match('/(*MARK:A)a/', 'a', $Virbphhh55ue);
        if (!isset($Virbphhh55ue['MARK'])) {
            $this->markTestSkipped('PHP 5.6 required for MARK support');
        }
    }

    protected function getDispatcherClass()
    {
        return 'FastRoute\\Dispatcher\\MarkBased';
    }

    protected function getDataGeneratorClass()
    {
        return 'FastRoute\\DataGenerator\\MarkBased';
    }
}
