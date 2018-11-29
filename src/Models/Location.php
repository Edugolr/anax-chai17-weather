<?php

namespace Chai17\Models;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;
use Chai17\Models;

class Location implements ContainerInjectableInterface
{

    use ContainerInjectableTrait;

    $location = [];

    public function setLocation($ipNumber)
    {
        $location = $this->location;
        $api = $this->di->get("ipstack");
        $ipstack = $api["config"];
        $api = $this->di->get("mapquest");
        $mapquest = $api["config"];
        $validateIP = new Models\ValidateIP;
        $test = $validateIP->validate($ipNumber);
        if ($test[0]) {
            $location = $getJson->cUrl($ipstack["url"]. $ipNumber. '?access_key='. $ipstack["key"]);
            $location = json_decode($location, true);
            $latitude = $location["latitude"];
            $longitude = $location["longitude"];
            $location = [$location["city"], $latitude, $longitude];
        } else {
            $search = array('å','ä','ö');
            $replace = array('a','a','o');
            $ipNumber = str_replace($search, $replace, $ipNumber);
            $location = $getJson->cUrl($mapquest["url"]. $mapquest["key"]. $mapquest["extra"]. $ipNumber);
            $location = json_decode($location, true);
            $latitude = $location["results"][0]["locations"][0]["latLng"]["lat"];
            $longitude = $location["results"][0]["locations"][0]["latLng"]["lng"];
            $city = $location["results"][0]["locations"][0]["adminArea5"] ?? "Ingen ort";
            $location = [$city, $latitude, $longitude];
        }

        $this->location = $location;

    }

    public function getLocation()
    {
        return $this->location;
    }
}
