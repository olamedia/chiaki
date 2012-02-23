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
use Chiaki\Action\Action;
use Chiaki\Action\ActionList;

class KanonControllerRouter implements IHttpRouter, IControllerRouter{
	protected $_controller;
	protected $_baseUri;
	protected $_customActionMethods = array('customAction', '_action');
	protected $_actionPrefix = array('action');
	protected $_initPrefix = array('init');
	protected $_showPrefix = array('show');
	protected $_actionIndex = array('action', 'customIndex');
	protected $_initIndex = array('init', '_initIndex');
	protected $_showIndex = array('show', 'index');
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
		$action = \ucfirst($segment);
		if (\strlen($action)){
			$actionMethods = array();
			foreach ($this->_actionPrefix as $prefix){
				$actionMethods[] = $prefix.$action;
			}
			$initMethods = array();
			foreach ($this->_initPrefix as $prefix){
				$initMethods[] = $prefix.$action;
			}
			$showMethods = array();
			foreach ($this->_showPrefix as $prefix){
				$showMethods[] = $prefix.$action;
			}
		}else{
			$actionMethods = $this->_actionIndex;
			$initMethods = $this->_initIndex;
			$showMethods = $this->_showIndex;
		}
		foreach ($actionMethods as $actionMethod){
			if (\method_exists($this->_controller, $actionMethod)){
				return $this->_constructAction($this->_controller, $actionMethod);
			}
		}
		$actionList = new ActionList();
		foreach ($initMethods as $initMethod){
			if (\method_exists($this->_controller, $initMethod)){
				$actionList->addAction($this->_constructAction($this->_controller, $initMethod));
			}
		}
		foreach ($showMethods as $showMethod){
			if (\method_exists($this->_controller, $showMethod)){
				$actionList->addAction($this->_constructAction($this->_controller, $showMethod));
			}
		}
		if (!$actionList->isEmpty()){
			return $actionList;
		}
		foreach ($this->_customActionMethods as $methodName){
			if (\method_exists($this->_controller, $methodName)){
				return $this->_constructCustomAction($this->_controller, $methodName, $segment);
			}
		}
		return null;
	}

	public function setBaseUri(IHttpUri $uri) {
		$this->_baseUri = $uri;
		return $this;
	}

	protected function _constructAction(IController $controller, $methodName){
		$action = new Action(array($controller, $methodName));
		return $action;
	}

	protected function _constructCustomAction(IController $controller, $methodName, $segment){
		$action = new Action(array($controller, $methodName));
		$args = array($segment);
		$action->setArguments($args);
		return $action;
	}

}
