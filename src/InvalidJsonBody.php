<?php

namespace Walnut\Lib\HttpMapper;

use JsonException;

/**
 * @package Walnut\Lib\Http\Controller
 */
final class InvalidJsonBody extends \RuntimeException {
	public function __construct(JsonException $ex) {
		parent::__construct($ex->getMessage(), $ex->getCode(), $ex->getPrevious());
	}
}