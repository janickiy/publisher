<?php

defined('CP') || exit('CarPrices: access denied.');

class Controller_index extends Controller
{
	function __construct()
	{
		$this->model = new Model_index();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('index_view.php',$this->model);
	}
}