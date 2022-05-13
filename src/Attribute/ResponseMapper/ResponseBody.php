<?php

namespace Walnut\Lib\HttpMapper\Attribute\ResponseMapper;

use Attribute;
use Psr\Http\Message\ResponseInterface;
use Walnut\Lib\HttpMapper\{ResponseBuilder, ResponseMapper, ResponseRenderer, ViewRenderer};

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class ResponseBody implements ResponseMapper {
	public const CONTENT_TYPE_HTML = 'text/html';

	/**
	 * CookieResponse constructor.
	 * @param string $contentType
	 */
	public function __construct(
		private readonly string $contentType = self::CONTENT_TYPE_HTML
	) {}


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
		return $responseBuilder->textResponse((string)$value)->withHeader(
			ResponseBuilder::CONTENT_TYPE_HEADER, $this->contentType
		);
	}
}