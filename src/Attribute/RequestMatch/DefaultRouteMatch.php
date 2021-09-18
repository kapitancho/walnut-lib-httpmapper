<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMatch;

use Attribute;
use Psr\Http\Message\ServerRequestInterface;
use Walnut\Lib\HttpMapper\RequestMatch;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class DefaultRouteMatch implements RequestMatch {
	/**
	 * @param ServerRequestInterface $request
	 * @return string[]|null
	 */
	public function matches(ServerRequestInterface $request): ?array {
		return [];
	}

	public function getMatchPriority(): int {
		return PHP_INT_MIN;
	}
}