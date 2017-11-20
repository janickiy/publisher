<?php

defined('publisher') || exit('publisher: access denied.');

//include template
core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "page500.tpl");

$tpl->assign('TITLE_PAGE',core::getLanguage('title_page', 'page500'));
$tpl->assign('TITLE',core::getLanguage('title', 'page500'));

include_once core::pathTo('extra', 'top.php');

//menu
include_once core::pathTo('extra', 'menu.php');

//footer
include_once core::pathTo('extra', 'footer.php');

// display content
$tpl->display();