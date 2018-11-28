<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class WeatherControllerTest extends TestCase
{

    protected $di;
    protected $controller;



    /**
     * Prepare before each test.
     */
    protected function setUp()
    {
        global $di;

        // Setup di
        $this->di = new DIFactoryConfig();
        $this->di->loadServices(ANAX_INSTALL_PATH . "/config/di");
        $this->di->loadServices(ANAX_INSTALL_PATH . "/test/config/di");

        // View helpers uses the global $di so it needs its value
        $di = $this->di;

        // Setup the controller
        $this->controller = new WeatherController();
        $this->controller->setDI($this->di);
        // $this->controller->initialize();
    }

    /**
     * Test the route "index".
     */
    public function testIndexActionGet()
    {
        $res = $this->controller->indexActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);

        // $this->assertEquals('some value', var_dump($res), '$b is not equal to "some value", instead it is instead: ' . var_dump($res));
    }

    // test the index post
    public function testWeatherActionGet()
    {

        //test ip v4
        $request = $this->di->get("request");
        $request->setGet("ip", "37.123.148.64");
        $res = $this->controller->weatherActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);

        // test ipv6
        $request->setGet("ip", "2001:0db8:85a3:0000:0000:8a2e:0370:7334");
        $res = $this->controller->weatherActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);

        //test city
        $request->setGet("ip", "stockholm");
        $res = $this->controller->weatherActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
    }

    // test the location post
    public function testWeatherOldActionGet()
    {
        // test ipv4
        $request = $this->di->get("request");
        $request->setGet("ip", "37.123.148.64");
        $res = $this->controller->weatherOldActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);

        // test ipv6
        $request->setGet("ip", "2001:0db8:85a3:0000:0000:8a2e:0370:7334");
        $res = $this->controller->weatherOldActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);

        //test city
        $request->setGet("ip", "stockholm");
        $res = $this->controller->weatherOldActionGet();
        $this->assertInstanceOf("\Anax\Response\Response", $res);
        // $this->assertEquals('some value', var_dump($res), '$b is not equal to "some value", instead it is instead: ' . var_dump($res));
    }
}
