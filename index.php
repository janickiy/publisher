<?php

error_reporting(1);
define("DEBUG", true);
define('publisher', TRUE);
define('SYS_ROOT', dirname(__FILE__) . DIRECTORY_SEPARATOR);

require_once SYS_ROOT . "bootstrap.php";
require_once core::pathTo('core', 'route.php');

Route::start();
