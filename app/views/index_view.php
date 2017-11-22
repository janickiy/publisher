<?php

defined('publisher') || exit('publisher: access denied.');


core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "index.tpl");

include_once core::pathTo('extra', 'menu.php');

$tpl->assign('TITLE_PAGE', 'Создание проекта');
$tpl->assign('TITLE', 'Создание проекта');

core::session()->start();

if (core::session()->issetName('id') === false) {
    core::session()->set('id', Main::createToken());
    core::session()->commit();
}

$tpl->display();