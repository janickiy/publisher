<?php

defined('publisher') || exit('publisher: access denied.');

class Controller_add_pic extends Controller
{
	function __construct()
	{
		$this->model = new Model_add_pic();
		$this->view = new View();
	}

	public function action_index()
	{	
		$this->view->generate('add_pic_view.php',$this->model);
	}
}