<?php

defined('publisher') || exit('publisher: access denied.');

class ExceptionSQL extends Exception
{
	protected $sql_error;
	protected $sql_query;

    /**
     * ExceptionSQL constructor.
     * @param string $sql_error
     * @param int $sql_query
     * @param Throwable $message
     */
	public function __construct($sql_error, $sql_query, $message)
	{
		$this->sql_error = $sql_error;
		$this->sql_query = $sql_query;

		parent::__construct($message);
	}

	public function getSQLError()
	{
		return $this->sql_error;
	}

	public function getSQLQuery()
	{
		return $this->sql_query;
	}
}