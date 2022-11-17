<?php

/* Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/8/22
 * Name: config.class.php
 * Description: 
 */


//error reporting level: 0 to turn off all error reporting; E_ALL to report all
error_reporting(E_ALL);

//local time zone
date_default_timezone_set('America/New_York');

//base url of the application
define("BASE_URL", "http://localhost/FP");

//define default path for car images
define("CAR_IMG", "www/img/cars/");

