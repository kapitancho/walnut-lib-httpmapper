<?php

namespace Walnut\Lib\HttpMapper;

use Psr\Http\Message\ResponseInterface;

/**
 * @package Walnut\Lib\Http\Controller
 */
interface ResponseMapper {
	/**
	 * @param mixed $value
	 * @param ResponseBuilder $responseBuilder
	 * @param ResponseRenderer $templateRenderer
	 * @return ResponseInterface
	 */
	public function mapValue(
		mixed $value,
		ResponseBuilder $responseBuilder,
		ResponseRenderer $responseRenderer,
		ViewRenderer $viewRenderer
	): ResponseInterface;
}