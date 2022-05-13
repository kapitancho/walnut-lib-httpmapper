<?php

namespace Walnut\Lib\HttpMapper\Attribute;

use Attribute;

/**
 * @package Walnut\Lib\Http\Controller
 */
#[Attribute]
final class ErrorHandler {
	/**
	 * @param class-string $className
	 */
	public function __construct(public readonly string $className) {}
}