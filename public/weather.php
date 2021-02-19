<?php /** public/weather.php */
require('../vendor/autoload.php');
$config = require('../config/config.local.php');
$service = new DMz\WeatherReport($config['weather']);
echo $service->getReport();
