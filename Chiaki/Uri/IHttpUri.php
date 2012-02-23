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

namespace Chiaki\Uri;

interface IHttpUri extends IUri{
    public function getAuthority();
    public function getUsername();
    public function getPassword();
    public function getHostname();
    public function getPort();
    public function getPath();
    public function getSegment($index);
    /**
     * @abstract
     * @return array Array of segments
     */
    public function getSegments();
    public function getQueryString();
    public function getFragment();
}
