<?php

namespace Walnut\Lib\HttpMapper;

interface ViewRenderer {
	/**
	 * @param mixed $view
	 * @return string
	 */
	public function render(object $view): string;
}
