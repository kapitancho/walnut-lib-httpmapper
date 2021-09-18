<?php

namespace Walnut\Lib\HttpMapper;

use Psr\Http\Message\ServerRequestInterface;

/**
 * @package Walnut\Lib\Http\Controller
 */
interface RequestMatch {
	/**
	 * @param ServerRequestInterface $request
	 * @return string[]|null
	 */
	public function matches(ServerRequestInterface $request): ?array;

	/**
	 * @return int
	 */
	public function getMatchPriority(): int;
}