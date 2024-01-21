<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMapper;

use Attribute;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\RequestMapper;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class FromForm implements RequestMapper {

	public function __construct(
		private readonly ?string $formVar = null,
		private readonly string|array $defaultValue = ''
	) {}

	/**
	 * @param ServerRequestInterface $request
	 * @param string $argName
	 * @param array $requestMatchArgs
	 * @return string
	 */
	public function mapValue(ServerRequestInterface $request, string $argName, array $requestMatchArgs): string|array {
		$result = (((array)$request->getParsedBody())[$this->formVar ?? $argName] ?? $this->defaultValue);
		if (!is_array($result)) {
			$result = (string)$result;
		}
		return $result;
	}

}