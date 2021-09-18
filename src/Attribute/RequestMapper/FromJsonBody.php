<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMapper;

use Attribute;
use JsonException;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\RequestMapper;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class FromJsonBody implements RequestMapper {

	/**
	 * @param ServerRequestInterface $request
	 * @param string $argName
	 * @param array $requestMatchArgs
	 * @return array|object|int|string|float|bool|null
	 * @throws JsonException
	 */
	public function mapValue(
		ServerRequestInterface $request,
		string $argName,
		array $requestMatchArgs
	): array|object|int|string|float|bool|null {
		/**
		 * @var array|object|int|string|float|bool|null
		 */
		return json_decode(
			$request->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR
		);
	}

}