<?php

namespace Walnut\Lib\HttpMapper;

interface ResponseRenderer {
	/**
	 * @param string $templateName
	 * @param mixed $viewModel
	 * @return string
	 */
	public function render(string $templateName, mixed $viewModel = null): string;
}
