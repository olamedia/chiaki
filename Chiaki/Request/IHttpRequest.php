<?php

namespace Chiaki\Request;

/*
 * This file is part of the chiaki package.
 * Copyright (c) 2012 olamedia <olamedia@gmail.com>
 *
 * This source code is release under the MIT License.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
interface IHttpRequest extends IRequest {
	public function getUri();
	public function getMethod();
	/**
	 * Returns short HTTP request representation
	 * GET http://example.com/path/to?query#fragment
	 *
	 * @abstract
	 * @return string
	 */
	public function toString();
	public function __toString();
}
