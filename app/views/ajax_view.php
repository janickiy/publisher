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

        ############ Configuration ##############
        $config["generate_image_file"]			= true;
        $config["generate_thumbnails"]			= true;
        $config["image_max_size"] 				= 500; //Maximum image size (height and width)
        $config["thumbnail_size"]  				= 200; //Thumbnails will be cropped to 200x200 pixels
        $config["thumbnail_prefix"]				= "thumb_"; //Normal thumb Prefix
        $config["destination_folder"]			= './project/'; //upload directory ends with / (slash)
        $config["thumbnail_destination_folder"]	= './project/'; //upload directory ends with / (slash)
        $config["upload_url"] 					= "http://localhost/ajax-image-upload-progressbar/uploads/";
        $config["quality"] 						= 100; //jpeg quality
        $config["random_file_name"]				= true; //randomize each file name

        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
            exit;  //try detect AJAX request, simply exist if no Ajax
        }

        //specify uploaded file variable
        $config["file_data"] = $_FILES["__files"];

        //include sanwebe impage resize class

        core::requireEx('libs', "ImageResize.php");

        //create class instance
        $im = new ImageResize($config);

        try{
            $responses = $im->resize(); //initiate image resize

            echo '<h3>Thumbnails</h3>';
            //output thumbnails
            foreach($responses["thumbs"] as $response){
                echo '<img src="'. $config["upload_url"] . $response . '" class="thumbnails" title="' . $response . '" />';
            }

            /*
            echo '<h3>Images</h3>';
            foreach($responses["images"] as $response){
                echo '<img src="'.$config["upload_url"].$response.'" class="images" title="'.$response.'" />';
            }
            */
        } catch (Exception $e) {
            echo '<div class="error">';
            echo $e->getMessage();
            echo '</div>';
        }

        break;
}