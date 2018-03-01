<?php

namespace CakeWeb;

class HttpStatusCode
{
	/**
	 * 1xx Informational
	 */

	/**
	 * 2xx Success
	 */
	const OK = 200;
	const CREATED = 201;

	/**
	 * 3xx Redirection
	 */

	/**
	 * 4xx Client Error
	 */
	const BAD_REQUEST = 400;
	const FORBIDDEN = 403;
	const NOT_FOUND = 404;
	const CONFLICT = 409;

	/**
	 * 5xx Server Error
	 */
	const INTERNAL_SERVER_ERROR = 500;

	private function __construct()
	{

	}

	public static function set($status)
	{
		Registry::set(__CLASS__, self::getCode($status));
	}

	public static function get($default = self::OK): int
	{
		return Registry::get(__CLASS__, self::getCode($default));
	}

	private static function getCode($status): int
	{
		return defined("self::{$status}")
			? constant("self::{$status}")
			: $status;
	}
}