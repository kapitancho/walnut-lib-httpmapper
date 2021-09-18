<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMatch;

use Attribute;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class HttpPut extends RouteMatch {
	public function __construct(string $path = null, int $priority = 0) {
		parent::__construct($path, ['PUT'], $priority);
	}
}