<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMapper;

use Attribute;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\RequestMapper;

/**
 * @template T of string|float|int|bool|array|object|null
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class RawValue implements RequestMapper {
	/**
	 * @param T $value
	 */
	public function __construct(private readonly string|float|int|bool|null|array|object $value) {}

	/**
	 * @param ServerRequestInterface $request
	 * @param string $argName
	 * @param array $requestMatchArgs
	 * @return T
	 */
	public function mapValue(ServerRequestInterface $request, string $argName, array $requestMatchArgs): string|float|int|bool|array|object|null {
		return $this->value;
	}

}