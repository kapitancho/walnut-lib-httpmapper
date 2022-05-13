<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMapper;

use Attribute;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\RequestMapper;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class FromCookie implements RequestMapper {

	public function __construct(private readonly string $cookieName, private readonly string $defaultValue = '') {}

	/**
	 * @param ServerRequestInterface $request
	 * @param string $argName
	 * @param array $requestMatchArgs
	 * @return string
	 */
	public function mapValue(ServerRequestInterface $request, string $argName, array $requestMatchArgs): string {
		return (string)($request->getCookieParams()[$this->cookieName] ?? $this->defaultValue);
	}

}