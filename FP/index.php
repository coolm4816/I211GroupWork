
<?php

/*
 * Author: Matt Cool, Steven Casada, Jawon Winbush
 * Date: 11/16/22
 * Name: index.php
 * Description: index file, retrieve the action and invoke the proper method
 */

//load application settings
require_once ("application/config.php");

//load autoloader
require_once ("vendor/autoload.php");

//load the dispatcher that dissects a request URL
new Dispatcher();