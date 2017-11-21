<?php

defined('publisher') || exit('publisher: access denied.');


core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "add_pic.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Загрузка изображений');
$tpl->assign('TITLE', 'Загрузка изображений');


$tpl->assign('PROJECT_NAME', Core_Array::getGet('project'));






$tpl->display();