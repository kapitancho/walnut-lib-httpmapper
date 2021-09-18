<?php

namespace Walnut\Lib\HttpMapper\Attribute\RequestMatch;

use Attribute;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class HttpDelete extends RouteMatch {
	public function __construct(string $path = null, int $priority = 0) {
		parent::__construct($path, ['DELETE'], $priority);
	}
}