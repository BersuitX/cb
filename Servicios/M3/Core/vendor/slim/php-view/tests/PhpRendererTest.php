<?php
use Slim\Http\Body;
use Slim\Http\Headers;
use Slim\Http\Response;


class PhpRendererTest extends PHPUnit_Framework_TestCase
{

    public function testRenderer() {
        $Vegz3ehkfimr = new \Slim\Views\PhpRenderer("tests/");

        $V5y2wgq24k1v = new Headers();
        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $Vvcjkdrakwx3 = new Response(200, $V5y2wgq24k1v, $V5brf34vsiqi);

        $Vqxmtrhfyjii = $Vegz3ehkfimr->render($Vvcjkdrakwx3, "testTemplate.php", array("hello" => "Hi"));

        $Vqxmtrhfyjii->getBody()->rewind();

        $Vuvamk1vhxxdhis->assertEquals("Hi", $Vqxmtrhfyjii->getBody()->getContents());
    }

    public function testRenderConstructor() {
        $Vegz3ehkfimr = new \Slim\Views\PhpRenderer("tests");

        $V5y2wgq24k1v = new Headers();
        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $Vvcjkdrakwx3 = new Response(200, $V5y2wgq24k1v, $V5brf34vsiqi);

        $Vqxmtrhfyjii = $Vegz3ehkfimr->render($Vvcjkdrakwx3, "testTemplate.php", array("hello" => "Hi"));

        $Vqxmtrhfyjii->getBody()->rewind();

        $Vuvamk1vhxxdhis->assertEquals("Hi", $Vqxmtrhfyjii->getBody()->getContents());
    }

    public function testAttributeMerging() {

        $Vegz3ehkfimr = new \Slim\Views\PhpRenderer("tests/", [
            "hello" => "Hello"
        ]);

        $V5y2wgq24k1v = new Headers();
        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $Vvcjkdrakwx3 = new Response(200, $V5y2wgq24k1v, $V5brf34vsiqi);

        $Vqxmtrhfyjii = $Vegz3ehkfimr->render($Vvcjkdrakwx3, "testTemplate.php", [
            "hello" => "Hi"
        ]);
        $Vqxmtrhfyjii->getBody()->rewind();
        $Vuvamk1vhxxdhis->assertEquals("Hi", $Vqxmtrhfyjii->getBody()->getContents());
    }

    public function testExceptionInTemplate() {
        $Vegz3ehkfimr = new \Slim\Views\PhpRenderer("tests/");

        $V5y2wgq24k1v = new Headers();
        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $Vvcjkdrakwx3 = new Response(200, $V5y2wgq24k1v, $V5brf34vsiqi);

        try {
            $Vqxmtrhfyjii = $Vegz3ehkfimr->render($Vvcjkdrakwx3, "testException.php");
        } catch (Throwable $Vuvamk1vhxxd) { 
            
            $Vqxmtrhfyjii = $Vegz3ehkfimr->render($Vvcjkdrakwx3, "testTemplate.php", [
                "hello" => "Hi"
            ]);
        } catch (Exception $Vpt32vvhspnv) { 
            
            $Vqxmtrhfyjii = $Vegz3ehkfimr->render($Vvcjkdrakwx3, "testTemplate.php", [
                "hello" => "Hi"
            ]);
        }

        $Vqxmtrhfyjii->getBody()->rewind();

        $Vuvamk1vhxxdhis->assertEquals("Hi", $Vqxmtrhfyjii->getBody()->getContents());
    }

    
    public function testExceptionForTemplateInData() {

        $Vegz3ehkfimr = new \Slim\Views\PhpRenderer("tests/");

        $V5y2wgq24k1v = new Headers();
        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $Vvcjkdrakwx3 = new Response(200, $V5y2wgq24k1v, $V5brf34vsiqi);

        $Vegz3ehkfimr->render($Vvcjkdrakwx3, "testTemplate.php", [
            "template" => "Hi"
        ]);
    }

    
    public function testTemplateNotFound() {

        $Vegz3ehkfimr = new \Slim\Views\PhpRenderer("tests/");

        $V5y2wgq24k1v = new Headers();
        $V5brf34vsiqi = new Body(fopen('php://temp', 'r+'));
        $Vvcjkdrakwx3 = new Response(200, $V5y2wgq24k1v, $V5brf34vsiqi);

        $Vegz3ehkfimr->render($Vvcjkdrakwx3, "adfadftestTemplate.php", []);
    }
}
