<?php

defined('CP') || exit('CarPrices: access denied.');

$tpl->assign('BASE_URL', $_SERVER['SERVER_NAME'] . Main::root());
$tpl->assign('ACTIVE_MENU', Core_Array::getGet('t'));