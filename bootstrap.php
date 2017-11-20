<?php

//Error_Reporting(0); // set error reporting level
define("DEBUG", 0);

$cmspaths = array(
    'core' => 'sys/core',
    'engine' => 'sys/engine', // Engines AUTOLOAD folder
    'config' => 'config', // Config
    'templates' => 'templates', // templates
    'controllers' => 'app/controllers', // controllers
	'libs' => 'vendor', // libraries
    'models' => 'app/models',
    'views' => 'app/views',
	'extra' => 'app/snippets'
);

require_once SYS_ROOT . $cmspaths['config'] . '/config_db.php';
require_once SYS_ROOT . $cmspaths['core'] . '/core.php';
core::init($cmspaths);
core::$db = new DB($ConfigDB);
core::$session = new Session();

core::setTemplate("assets/");