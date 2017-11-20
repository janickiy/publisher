<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_ajax extends Controller
{
	function __construct()
	{
		$this->model = new Model_ajax();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('ajax_view.php',$this->model);
	}
}