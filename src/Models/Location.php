<?php

namespace Chai17\Models;

class Location
{

    public function getLocation($ipNumber, $ipstack, $mapquest)
    {
        $validateIP = new ValidateIP;
        $getJson = new Curl;
        $test = $validateIP->validate($ipNumber);
        if ($test[0]) {
            $location = $getJson->cUrl($ipstack["url"]. $ipNumber. '?access_key='. $ipstack["key"]);
            $location = json_decode($location, true);
            $latitude = $location["latitude"];
            $longitude = $location["longitude"];
            $location = array("city"=> $location["city"], "latitude"=> $latitude, "longitude"=> $longitude);
        } else {
            $search = array('å','ä','ö');
            $replace = array('a','a','o');
            $ipNumber = str_replace($search, $replace, $ipNumber);
            $location = $getJson->cUrl($mapquest["url"]. $mapquest["key"]. $mapquest["extra"]. $ipNumber);
            $location = json_decode($location, true);
            $latitude = $location["results"][0]["locations"][0]["latLng"]["lat"];
            $longitude = $location["results"][0]["locations"][0]["latLng"]["lng"];
            $city = $location["results"][0]["locations"][0]["adminArea5"] ?? "Ingen ort";
            $location = array("city"=> $city, "latitude"=> $latitude, "longitude"=> $longitude);
        }
        return $location;
    }
}
