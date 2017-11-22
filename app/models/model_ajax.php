<?php

defined('publisher') || exit('publisher: access denied.');

class Model_ajax extends Model
{
    /**
     * @param $name
     * @param $path
     * @param $page
     * @param array $content
     * @return bool
     */
    public function createHtmlPage($name, $path, $page, $content = [])
    {
        $html = "<!DOCTYPE html>\r\n";
        $html .= "<html>\r\n";
        $html .= "<head>\r\n";
        $html .= "<meta http-equiv=\"content-type\" content=\"text/html; charset=utf-8\" />";
        $html .= "<title>" . $content['title'] . "</title>\r\n";
        $html .= "<meta name=\"keywords\" content=\"" . $content['keywords'] . "\">\r\n";
        $html .= "<meta name=\"description\" content=\"" . $content['description'] . "\">\r\n";
        $html .= "</head>\r\n";
        if ($name)
            $html .= "<body style=\"background-image: url(" . $name . "); background-repeat: no-repeat;\"\r\n";
        else
            $html .= "<body>\r\n";
        $html .= $content['html'];
        $html .= "</body>\r\n";
        $html .= "</html>\r\n";

        $file = fopen($path . $page,"w");

        if (!$file) {
            return false;
        } else {
            fputs($file, $html);
            fclose($file);
            return true;
        }
    }

    /**
     * @param $html_pages
     * @param $bundel_name
     * @param $file
     */
    public function createBundle($html_pages, $bundel_name, $file)
    {
        $xml = new DomDocument('1.0','utf-8');
        $items = $xml->appendChild($xml->createElement('items'));
        $name = $items->appendChild($xml->createElement('name'));
        $name->appendChild($xml->createTextNode($bundel_name));
        $pages = $items->appendChild($xml->createElement('pages'));

        foreach ($html_pages as $item) {

            $page = $pages->appendChild($xml->createElement('page'));
            $page->appendChild($xml->createTextNode($item['page']));
            $title = $pages->appendChild($xml->createElement('title'));
            $title->appendChild($xml->createTextNode($item['content']['title']));
        }

        $xml->formatOutput = true;
        $xml->save($file);
    }


}
