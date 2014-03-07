<?php
/*
  +----------------------------------------------------------------------+
  | pthreads                                                             |
  +----------------------------------------------------------------------+
  | Copyright (c) Joe Watkins 2012 - 2014                                |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.01 of the PHP license,      |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_01.txt                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Author: Joe Watkins <joe.watkins@live.co.uk>                         |
  +----------------------------------------------------------------------+
 */
namespace pthreads {
	
	class PromiseManager extends \Pool {
		
		public function __construct($size = 4, $worker = PromiseWorker::class, $ctor = []) {
			parent::__construct(
				$size, $worker, $ctor);
		}

		public function manage(Promise $promise, Fulfillable $fulfill) {
			return new Promise(
				[$this, $promise->getWorker()], $fulfill);
		}
	}
}
