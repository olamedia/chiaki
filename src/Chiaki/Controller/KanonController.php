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

namespace Chiaki\Controller;

use Chiaki\IoC\IContainer;

class KanonController implements IController{
	protected $_container = null;
	public function setContainer(IContainer $container) {
		$this->_container = $container;
		return $this;
	}
	/**
	 * @return \Chiaki\Router\IRouter
	 */
	public function getRouter() {
		return new \Chiaki\Router\KanonControllerRouter($this);
	}
}
