<?php

defined('publisher') || exit('publisher: access denied.');

class Controller_page404 extends Controller
{
	function action_index()
	{
		$this->view->generate('page404_view.php');
	}
}