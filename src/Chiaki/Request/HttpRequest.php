<?php

namespace Chiaki\Request;

use Chiaki\Uri\IHttpUri;

/*
 * This file is part of the chiaki package.
 * Copyright (c) 2012 olamedia <olamedia@gmail.com>
 *
 * This source code is release under the MIT License.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
class HttpRequest implements IHttpRequest {
	/**
	 * @var string
	 */
	protected $_method = null;
	/**
	 * @var IHttpUri
	 */
	protected $_uri = null;
	/**
	 * @return IHttpUri
	 */
	public function getUri() {
		return $this->_uri;
	}

	public function getMethod() {
		return $this->_method;
	}

	/**
	 * Returns short HTTP request representation
	 * GET http://example.com/path/to?query#fragment
	 *
	 * @return string
	 */
	public function toString() {
		return $this->_method.' '.$this->_uri;
	}

	public function __toString() {
		return $this->toString();
	}
}
