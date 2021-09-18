<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMapper;

use Attribute;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\RequestMapper;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class FromFormParams implements RequestMapper {

	/**
	 * @param ServerRequestInterface $request
	 * @param string $argName
	 * @param array $requestMatchArgs
	 * @return array
	 */
	public function mapValue(ServerRequestInterface $request, string $argName, array $requestMatchArgs): array {
		return (array)$request->getParsedBody();
	}

}