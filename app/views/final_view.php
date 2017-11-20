<?php

defined('publisher') || exit('publisher: access denied.');


core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "final.tpl");

include_once core::pathTo('extra', 'menu.php');

if (core::session()->issetName('id') === false) {
    core::session()->set('id', Main::createToken());
    core::session()->commit();
}

$tpl->assign('TITLE_PAGE', 'Результаты');
$tpl->assign('TITLE', 'Результаты');


$tpl->display();