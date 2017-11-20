<?php

defined('publisher') || exit('publisher: access denied.');

class Controller_final extends Controller
{
	function __construct()
	{
		$this->model = new Model_final();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('final_view.php',$this->model);
	}
}