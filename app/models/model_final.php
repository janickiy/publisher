<?php

defined('publisher') || exit('publisher: access denied.');

class Model_final extends Model
{

    /**
     * @param $folderName
     * @param $fileName
     * @return array\
     */
    public function search_file($folderName, $fileName){
        global $found_files;
        $dir = opendir($folderName);
        while (($file = readdir($dir)) !== false) {
            if ($file != "." && $file != "..") {
                if (is_file($folderName . "/" . $file)) {
                    if ($file == $fileName) $found_files[] = $folderName . "/" . $file;
                }
                if (is_dir($folderName . "/" . $file)) $found_files[] = $this->search_file($folderName . "/" . $file, $fileName);
            }
        }
        closedir($dir);

        return $found_files;
    }


}