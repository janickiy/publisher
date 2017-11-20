<?php

defined('CP') || exit('CarPrices: access denied.');

class View
{
    public function generate($template_view, $data = null)
    {
        include core::pathTo('views', $template_view);
    }
}
