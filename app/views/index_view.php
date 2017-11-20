<?php

defined('CP') || exit('CarPrices: access denied.');

Auth::authorization();
$autInfo = Auth::getAutInfo(Auth::getAutId());

if (Main::CheckAccess($autInfo['role'], 'admin,manager')) throw new Exception403('У вас нет разрешения для просмотра этого раздела');

core::requireEx('libs', "html_template/SeparateTemplate.php");
$tpl = SeparateTemplate::instance()->loadSourceFromFile(core::getTemplate() .  "index.tpl");

include_once core::pathTo('extra', 'top.php');
include_once core::pathTo('extra', 'menu.php');
$tpl->assign('TITLE_PAGE', 'Цены');
$tpl->assign('TITLE', 'Цены');

$city = isset($_COOKIE["city"]) && $_COOKIE["city"] ? $_COOKIE["city"] : 1;
$search = urldecode(Core_Array::getRequest('search'));
$tpl->assign('ACTION', $_SERVER['REQUEST_URI']);
$tpl->assign('CITY', $city);
$tpl->assign('SEARCH', $search);

foreach ($data->getShops($city) as $row) {
    $rowShop = $tpl->fetch('shops_header_row');
    $rowShop->assign('NAME', $row['name']);
    $rowShop->assign('URL', $row['url']);
    $tpl->assign('shops_header_row', $rowShop);
}

$search = Core_Array::getRequest('search');

foreach ($data->getModels($search) as $row) {
    $rowCar = $tpl->fetch('cars_row');
    $rowCar->assign('CAR', $row['car']);
    $rowCar->assign('MODEL', $row['model']);

    foreach ($data->getShops($city) as $row_shop) {
        $priceInfo = $data->getPriceInfo($row_shop['id'],$row['model_id']);
        $rowShop = $rowCar->fetch('shops_row');
        $rowShop->assign('PRICE', $priceInfo['price']);
        $rowShop->assign('URL', $priceInfo['url']);
        $rowShop->assign('STATUS', $priceInfo['status']);
        $rowShop->assign('ID', $priceInfo['id']);

        $rowCar->assign('shops_row', $rowShop);
    }

    $tpl->assign('cars_row', $rowCar);
}

$tpl->display();