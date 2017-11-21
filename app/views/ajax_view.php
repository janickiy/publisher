<?php

defined('publisher') || exit('publisher: access denied.');

core::session()->start();

if (core::session()->issetName('id') === false) {
    core::session()->set('id', Main::createToken());
    core::session()->commit();
}

switch (Core_Array::getGet('action'))
{
    case 'create_project':
        $name = trim(Core_Array::getRequest('name'));
        $name_project = Main::translit($name) . '_' . Main::getRandomCode (10);
        $structure = './projects/' . core::session()->get('id') . '/' . $name_project;

        if (!mkdir($structure, 0777, true)) {
            $row = ['result' => 'no'];
        } else {
            $row = ['result' => 'yes', 'structure' => $structure, 'name_project' => $name_project];
        }

        Main::showJSONContent(json_encode($row));

        break;

    case 'add_pic':

        $name_project = Core_Array::getRequest('project');

        if ($name_project) {
            $config["generate_image_file"]			= true;
            $config["generate_thumbnails"]			= true;
            $config["image_max_size"] 				= 2000;
            $config["thumbnail_size"]  				= 200;
            $config["thumbnail_prefix"]				= "thumb_";
            $config["destination_folder"]			= './projects/' . core::session()->get('id') . '/' . $name_project;
            $config["thumbnail_destination_folder"]	= './projects/' . core::session()->get('id') . '/' . $name_project;
            $config["upload_url"] 					= '/projects/' . core::session()->get('id') . '/' . $name_project;
            $config["quality"] 						= 100;
            $config["random_file_name"]				= true;

            if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
                exit;
            }

            $config["file_data"] = $_FILES["__files"];
            core::requireEx('libs', "ImageResize.php");

            $im = new ImageResize($config);

            try{
                $responses = $im->resize(); //initiate image resize

                echo '<div class="title" style="margin: 20px 0 20px;">Загрузка изображений:</div>';
                echo '<ul class="downloading">';

                foreach($responses["images"] as $response) {
                    echo '<li>Загружено <span>' . $response . '</span></li>';
                }

                echo '</ul>';
                echo '<div class="success">Ура! Получилось!</div>';
            } catch (Exception $e) {
                echo '<div class="error">';
                echo $e->getMessage();
                echo '</div>';
            }
        }

        break;
}