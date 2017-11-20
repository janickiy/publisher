<?php

defined('publisher') || exit('publisher: access denied.');


core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "index.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Цены');
$tpl->assign('TITLE', 'Цены');


$tpl->display();