<?php
/**
 * Config file for api.
 */
return [
    "services" => [
        "darksky" => [
            "shared" => true,
            "callback" => function () {
                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("darksky.php");

                return $config;
            }
        ],
        "mapquest" => [
            "shared" => true,
            "callback" => function () {
                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("mapquest.php");

                return $config;
            }
        ],
        "ipstack" => [
            "shared" => true,
            "callback" => function () {
                // Load the configuration files
                $cfg = $this->get("configuration");
                $config = $cfg->load("ipstack.php");

                return $config;
            }
        ]
    ]
];
