<?php

namespace Walnut\Lib\HttpMapper\Attribute\ResponseMapper;

use Attribute;
use Psr\Http\Message\ResponseInterface;
use Walnut\Lib\HttpMapper\{ResponseBuilder, ResponseMapper, ResponseRenderer, ViewRenderer};

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class TextResponse implements ResponseMapper {

	public function __construct(public readonly int $statusCode = 200) {}

	/**
	 * @param mixed $value
	 * @param ResponseBuilder $responseBuilder
	 * @param ResponseRenderer $responseRenderer
	 * @return ResponseInterface
	 */
	public function mapValue(
		mixed $value,
		ResponseBuilder $responseBuilder,
		ResponseRenderer $responseRenderer,
		ViewRenderer $viewRenderer
	): ResponseInterface {
		return $responseBuilder->textResponse($value, $this->statusCode);
	}

}