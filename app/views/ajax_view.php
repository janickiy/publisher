<?php

defined('publisher') || exit('publisher: access denied.');

if (core::session()->issetName('id') === false) {
    core::session()->set('id', Main::createToken());
    core::session()->commit();
}

switch (Core_Array::getGet('action'))
{
    case 'create_project':
        $name = trim(Core_Array::getRequest('name'));
        $name_project = $name . '_' . Main::getRandomCode (10);
        $structure = './projects/' . core::session()->get('id') . '/' . $name_project;

        if (!mkdir($structure, 0777, true)) {
            $row = ['result' => 'no'];
        } else {
            $row = ['result' => 'yes', 'structure' => $structure, 'name_project' => $name_project];
        }

        Main::showJSONContent($row);

        break;
}