<?php

defined('publisher') || exit('publisher: access denied.');

class Exception403 extends Exception
{
    /**
     * Exception403 constructor.
     * @param string $message
     */
	public function __construct($message)
	{
		parent::__construct($message);
	}
}