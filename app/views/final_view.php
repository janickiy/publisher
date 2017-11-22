<?php

defined('publisher') || exit('publisher: access denied.');

core::session()->start();

if (core::session()->issetName('id') === false) {
    core::session()->set('id', Main::createToken());
    core::session()->commit();
}

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "final.tpl");

include_once core::pathTo('extra', 'menu.php');

$tpl->assign('TITLE_PAGE', 'Результаты');
$tpl->assign('TITLE', 'Результаты');
$found_files = [];
$found_files = $data->search_file('./projects', 'bundel.xml');

if (Core_Array::getGet('project')) {
    $tpl->assign('PROJECT', Core_Array::getGet('project'));
} else {
    foreach ($found_files as $file){
        $xml = simplexml_load_file($file);
        $items = json_decode(json_encode($xml), TRUE);
        $rowProject = $tpl->fetch('project_row');
        $rowProject->assign('NAME', $items['name']);
        $tpl->assign('project_row', $rowProject);
    }
}




$tpl->display();