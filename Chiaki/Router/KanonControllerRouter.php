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
use Chiaki\Controller\IController;
use Chiaki\Uri\IHttpUri;

class KanonControllerRouter implements IHttpRouter, IControllerRouter{
	protected $_controller;
	protected $_baseUri;
	public function __construct(IController $controller){
		$this->_controller = $controller;
	}
	/**
	 * @param \Chiaki\Controller\IController $controller
	 * @return KanonControllerRouter
	 */
	public function setController(IController $controller){
		$this->_controller = $controller;
		return $this;
	}
	/**
	 * @param \Chiaki\Request\IHttpRequest $request
	 * @return \Chiaki\Action\IAction
	 */
	public function resolve(IHttpRequest $request) {
		$segment = $request->getUri()->getRelativeSegment($this->_baseUri, 0);
		
	}

	public function setBaseUri(IHttpUri $uri) {
		$this->_baseUri = $uri;
		return $this;
	}
}
