<?php

defined('publisher') || exit('publisher: access denied.');

$tpl->assign('ACCOUNT_LOGIN', $autInfo['login']);
$tpl->assign('ACCOUNT_ROLE', $autInfo['role']);