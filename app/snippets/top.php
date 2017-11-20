<?php

defined('CP') || exit('CarPrices: access denied.');

$tpl->assign('ACCOUNT_LOGIN', $autInfo['login']);
$tpl->assign('ACCOUNT_ROLE', $autInfo['role']);