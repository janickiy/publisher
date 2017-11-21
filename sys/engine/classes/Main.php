<?php

defined('publisher') || exit('publisher: access denied.');

class Main
{
    /**
     * @return array|false|string
     */
    public static function getIP()
    {
        if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
            $ip = getenv("HTTP_CLIENT_IP");
        elseif (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        elseif (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
            $ip = getenv("REMOTE_ADDR");
        elseif (!empty($_SERVER['REMOTE_ADDR']) && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
            $ip = $_SERVER['REMOTE_ADDR'];
        else
            $ip = "unknown";

        return ($ip);
    }

    /**
     * @return string
     */
    public function createToken() {
        return md5(rand(0, PHP_INT_MAX));
    }

    /**
     * @param $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if (preg_match("/^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,6})$/i", $email))
            return false;
        else
            return true;
    }

    /**
     * @param $url
     * @return bool
     */
    public static function checkUrl($url)
    {
        if (!preg_match("/^(?:https?\:\/\/)?[-0-9a-z_\.]+\.([a-z]{2,6})$/i", $url)){
            return false;
        } else {
            return true;
        }
    }

    /**
     * @return string
     */
    public static function root() {
        if (dirname($_SERVER['SCRIPT_NAME']) == '/' | dirname($_SERVER['SCRIPT_NAME']) == '\\')
            return '/';
        else
            return dirname($_SERVER['SCRIPT_NAME']) . '/';
    }

    /**
     * @param $type
     * @return string
     */
    public static function getRandomCode ($maxcount = 8)
    {
        $rand37 = "0123456789";
        $str_len = strlen($rand37) - 1;
        srand((double)microtime()*1000000);
        $RandCode = "";
        for($count = 0; $count < $maxcount; $count++)
            $RandCode .= substr($rand37, rand(1, $str_len), 1);

        return $RandCode;
    }

    /**
     * @param $content
     */
    public static function showJSONContent($content) {
        header('Cache-Control: no-store, no-cache, must-revalidate');
        header('Content-Type: application/json');
        echo $content;
        exit();
    }

    /**
     * @param $s
     * @return mixed|string
     */
    public static function translit($s) {
        $s = (string) $s;
        $s = strip_tags($s);
        $s = str_replace(["\n", "\r"], " ", $s);
        $s = preg_replace("/\s+/", ' ', $s);
        $s = trim($s);
        $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s);
        $s = strtr($s, ['а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'']);
        $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s);
        $s = str_replace(" ", "-", $s);
        return $s;
    }
}