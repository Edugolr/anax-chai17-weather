<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Chai17\Models;

class WeatherController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexActionGet() : object
    {
        $title = "Weather";
        $page = $this->di->get("page");
        $session = $this->di->get("session");
        $api = $this->di->get("ipstack");
        $ipstack = $api["config"];
        $getipInfo = new Models\Curl;
        $extra =  "&fields=ip";
        $userIp =  $getipInfo->cUrl($ipstack["url"]. "check". '?access_key='. $ipstack["key"]. $extra);
        $apiResult = json_decode($userIp, true);

        $session->set("userIp", $apiResult["ip"]);

        $page->add("weather/index", [
            "ip" => $session->get("userIp"),
            "res" => null,
        ]);

        return $page->render([
            "title" => $title,
        ]);
    }

    public function weatherActionGet()
    {
        $title = "Weather";
        $ipstack = $this->di->get("ipstack");
        $mapquest = $this->di->get("mapquest");
        $darksky = $this->di->get("darksky");
        $getJson = new Models\Curl;
        $map = new Models\Map;
        $locationHandler = new Models\Location;

        $request = $this->di->get("request");
        $page = $this->di->get("page");
        $ipNumber = $request->getGet("ip");
        $location = $locationHandler->getLocation($ipNumber, $ipstack["config"], $mapquest["config"]);

        $mapDiv = $map->getMap($location["latitude"], $location["longitude"]);
        $weatherJson = $getJson->cUrl($darksky["config"]["url"]. $darksky["config"]["key"]. "/". $location["latitude"]. ",". $location["longitude"]. "?lang=sv&units=auto");

        $weather = json_decode($weatherJson, true);
        $page->add("weather/weather", ["location" => $location, "mapDiv" => $mapDiv, "weather" => $weather]);

        return $page->render(["title" => $title,]);
    }

    public function weatherOldActionGet()
    {
        $title = "Weather Old";
        $ipstack = $this->di->get("ipstack");
        $mapquest = $this->di->get("mapquest");
        $darksky = $this->di->get("darksky");

        $getJson = new Models\Curl;
        $map = new Models\Map;
        $locationHandler = new Models\Location;

        $request = $this->di->get("request");
        $page = $this->di->get("page");
        $ipNumber = $request->getGet("ip");
        $location = $locationHandler->getLocation($ipNumber, $ipstack["config"], $mapquest["config"]);

        $url = [];
        for ($i=0; $i < 31; $i++) {
            $time  = time() - ($i * 24 * 60 * 60);
            array_push($url, $darksky["config"]["url"]. $darksky["config"]["key"]. "/". $location["latitude"]. ",". $location["longitude"]. ",". $time. "?lang=sv&units=auto");
        }

        $mapDiv = $map->getMap($location["latitude"], $location["longitude"]);
        $weatherJson = $getJson->cUrlMulti($url);
        $weather = [];
        $count = count($weatherJson);
        for ($i=0; $i < $count; $i++) {
            array_push($weather, json_decode($weatherJson[$i], true));
        }

        $page->add("weather/weatherOld", ["location" => $location, "mapDiv" => $mapDiv, "weather" => $weather]);

        return $page->render(["title" => $title,]);
    }
}
