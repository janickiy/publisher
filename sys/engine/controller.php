<?php

defined('publisher') || exit('publisher: access denied.');

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
    }

    function action_index()
    {}
}
