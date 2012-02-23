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

namespace Chiaki\Route;

use Chiaki\Request\IRequest;

interface IRoute{
	public function resolve(IRequest $request);
	public function run();
}
