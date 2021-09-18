<?php

namespace Walnut\Lib\HttpMapper\Attribute\ResponseMapper;

use Attribute;
use Psr\Http\Message\ResponseInterface;
use Walnut\Lib\HttpMapper\{ResponseBuilder, ResponseMapper, ResponseRenderer};

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class CookieResponse implements ResponseMapper {

	/**
	 * CookieResponse constructor.
	 * @param string $cookieName
	 */
	public function __construct(private /*readonly*/ string $cookieName) {}

	/**
	 * @param mixed $value
	 * @param ResponseBuilder $responseBuilder
	 * @param ResponseRenderer $responseRenderer
	 * @return ResponseInterface
	 */
	public function mapValue(
		mixed $value,
		ResponseBuilder $responseBuilder,
		ResponseRenderer $responseRenderer
	): ResponseInterface {
		return $responseBuilder->emptyResponse()
			->withHeader('Set-Cookie', "$this->cookieName=$value");
	}

}