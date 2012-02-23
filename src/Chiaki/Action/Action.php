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

namespace Chiaki\Action;

class Action implements IAction{
	protected $_callable = null;
	public function __construct($callable = null){
		$this->_callable = $callable;
	}

	public function setCallable() {
		// TODO: Implement setCallable() method.
	}

	public function setArguments() {
		// TODO: Implement setArguments() method.
	}

	public function invoke() {
		// TODO: Implement invoke() method.
	}

	public function __invoke() {
		// TODO: Implement __invoke() method.
	}
}
