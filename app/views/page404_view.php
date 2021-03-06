<?php

defined('publisher') || exit('publisher: access denied.');

//include template
core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "page404.tpl");

$tpl->assign('TITLE_PAGE',core::getLanguage('title_page', 'page404'));
$tpl->assign('TITLE',core::getLanguage('title', 'page404'));


include_once core::pathTo('extra', 'menu.php');


$tpl->display();