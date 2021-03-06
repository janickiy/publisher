<?php

defined('publisher') || exit('publisher: access denied.');

//include template
core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "page403.tpl");

$tpl->assign('TITLE_PAGE',core::getLanguage('title_page', 'page403'));
$tpl->assign('TITLE',core::getLanguage('title', 'page403'));

include_once core::pathTo('extra', 'menu.php');

$tpl->display();