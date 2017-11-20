<?php

defined('CP') || exit('CarPrices: access denied.');

class Exception404 extends Exception
{
    /**
     * Exception404 constructor.
     * @param string $message
     */
	public function __construct($message)
	{
		parent::__construct($message);
	}
}