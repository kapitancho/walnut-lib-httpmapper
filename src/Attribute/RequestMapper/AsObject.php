<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMapper;

use Attribute;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\RequestMapper;

#[Attribute]
final class AsObject implements RequestMapper {
	public function __construct(private readonly RequestMapper $requestMapper) {}

	/**
	 * @param ServerRequestInterface $request
	 * @param string $argName
	 * @param array $requestMatchArgs
	 * @return int
	 */
	public function mapValue(ServerRequestInterface $request, string $argName, array $requestMatchArgs): object {
		return (object)$this->requestMapper->mapValue($request, $argName, $requestMatchArgs);
	}

}