<?php
/**
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
require dirname(__DIR__) . '/vendor/cakephp/cakephp/src/basics.php';
require dirname(__DIR__) . '/vendor/autoload.php';

use Cake\Cache\Cache;
define('APP', sys_get_temp_dir());
define('ROOT', dirname(__DIR__));
Cake\Core\Configure::write('App', [
    'namespace' => 'App'
]);
Cache::config([
    '_cake_core_' => [
    'engine' => 'File',
    'prefix' => 'cake_core_',
    'serialize' => true
    ],
    '_cake_model_' => [
    'engine' => 'File',
    'prefix' => 'cake_model_',
    'serialize' => true
    ]
]);
