<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMapper;

use Attribute;
use stdClass;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\InvalidCompositeValue;
use Walnut\Lib\HttpMapper\InvalidJsonBody;
use Walnut\Lib\HttpMapper\RequestMapper;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class CompositeDataSource implements RequestMapper {

	/**
	 * @param RequestMapper $mainDataSource
	 * @param RequestMapper[] $additionalDataSources
	 */
	public function __construct(
		private readonly RequestMapper $mainDataSource,
		private readonly array $additionalDataSources
	) {}

	/**
	 * @param ServerRequestInterface $request
	 * @param string $argName
	 * @param array $requestMatchArgs
	 * @return array|object
	 * @throws InvalidCompositeValue
	 */
	public function mapValue(
		ServerRequestInterface $request,
		string $argName,
		array $requestMatchArgs
	): array|object {
		$result = $this->mainDataSource->mapValue($request, $argName, $requestMatchArgs);
		if (is_array($result)) {
			foreach($this->additionalDataSources as $key => $dataSource) {
				$result[$key] = $dataSource->mapValue($request, $argName, $requestMatchArgs);
			}
		} elseif ($result instanceof stdClass) {
			foreach($this->additionalDataSources as $key => $dataSource) {
				$result->$key = $dataSource->mapValue($request, $argName, $requestMatchArgs);
			}
		} else {
			throw new InvalidCompositeValue;
		}
		return $result;
	}

}