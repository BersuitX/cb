<?php

namespace FastRoute\RouteParser;

use PHPUnit\Framework\TestCase;

class StdTest extends TestCase
{
    
    public function testParse($Vb1bed5aqip0, $Vewreqvuumwf)
    {
        $V5zzh1da1wpy = new Std();
        $Vivhd433mhef = $V5zzh1da1wpy->parse($Vb1bed5aqip0);
        $this->assertSame($Vewreqvuumwf, $Vivhd433mhef);
    }

    
    public function testParseError($Vb1bed5aqip0, $V021yktm215s)
    {
        $V5zzh1da1wpy = new Std();
        $this->setExpectedException('FastRoute\\BadRouteException', $V021yktm215s);
        $V5zzh1da1wpy->parse($Vb1bed5aqip0);
    }

    public function provideTestParse()
    {
        return [
            [
                '/test',
                [
                    ['/test'],
                ]
            ],
            [
                '/test/{param}',
                [
                    ['/test/', ['param', '[^/]+']],
                ]
            ],
            [
                '/te{ param }st',
                [
                    ['/te', ['param', '[^/]+'], 'st']
                ]
            ],
            [
                '/test/{param1}/test2/{param2}',
                [
                    ['/test/', ['param1', '[^/]+'], '/test2/', ['param2', '[^/]+']]
                ]
            ],
            [
                '/test/{param:\d+}',
                [
                    ['/test/', ['param', '\d+']]
                ]
            ],
            [
                '/test/{ param : \d{1,9} }',
                [
                    ['/test/', ['param', '\d{1,9}']]
                ]
            ],
            [
                '/test[opt]',
                [
                    ['/test'],
                    ['/testopt'],
                ]
            ],
            [
                '/test[/{param}]',
                [
                    ['/test'],
                    ['/test/', ['param', '[^/]+']],
                ]
            ],
            [
                '/{param}[opt]',
                [
                    ['/', ['param', '[^/]+']],
                    ['/', ['param', '[^/]+'], 'opt']
                ]
            ],
            [
                '/test[/{name}[/{id:[0-9]+}]]',
                [
                    ['/test'],
                    ['/test/', ['name', '[^/]+']],
                    ['/test/', ['name', '[^/]+'], '/', ['id', '[0-9]+']],
                ]
            ],
            [
                '',
                [
                    [''],
                ]
            ],
            [
                '[test]',
                [
                    [''],
                    ['test'],
                ]
            ],
            [
                '/{foo-bar}',
                [
                    ['/', ['foo-bar', '[^/]+']]
                ]
            ],
            [
                '/{_foo:.*}',
                [
                    ['/', ['_foo', '.*']]
                ]
            ],
        ];
    }

    public function provideTestParseError()
    {
        return [
            [
                '/test[opt',
                "Number of opening '[' and closing ']' does not match"
            ],
            [
                '/test[opt[opt2]',
                "Number of opening '[' and closing ']' does not match"
            ],
            [
                '/testopt]',
                "Number of opening '[' and closing ']' does not match"
            ],
            [
                '/test[]',
                'Empty optional part'
            ],
            [
                '/test[[opt]]',
                'Empty optional part'
            ],
            [
                '[[test]]',
                'Empty optional part'
            ],
            [
                '/test[/opt]/required',
                'Optional segments can only occur at the end of a route'
            ],
        ];
    }
}
