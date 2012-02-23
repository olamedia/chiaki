<?php

/*
 * This file is part of the chiaki package.
 * Copyright (c) 2012 olamedia <olamedia@gmail.com>
 *
 * This source code is release under the MIT License.
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Chiaki\Router;

use Chiaki\Request\IHttpRequest;
use Chiaki\Uri\IHttpUri;

/**
 * Router for HTTP request.
 */
interface IHttpRouter extends IRouter{
	public function setBaseUri(IHttpUri $uri);
	/**
	 * @abstract
	 * @param \Chiaki\Request\IHttpRequest $request
	 * @return \Chiaki\Action\IAction
	 */
	public function resolve(IHttpRequest $request);
}
