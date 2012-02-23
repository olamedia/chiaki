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

interface IAction {
	public function setCallable();
	public function setArguments();
	public function invoke();
	public function __invoke();
}
