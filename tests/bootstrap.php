<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__DIR__));
define('TMP', ROOT . DS . 'tmp' . DS);
define('LOGS', TMP . 'logs' . DS);
define('CACHE', TMP . 'cache' . DS);
define('APP', sys_get_temp_dir());
define('APP_DIR', 'src');
define('CAKE_CORE_INCLUDE_PATH', ROOT . '/vendor/cakephp/cakephp');
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
define('CAKE', CORE_PATH . APP_DIR . DS);
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);
define('CONFIG', dirname(__FILE__) . DS . 'config' . DS);
require ROOT . '/vendor/cakephp/cakephp/src/basics.php';
require ROOT . '/vendor/autoload.php';
Cake\Core\Configure::write('App', [
	'namespace' => 'App',
	'encoding' => 'UTF-8'
]);
Cake\Core\Configure::write('debug', true);
mb_internal_encoding('UTF-8');

// Cake\Datasource\ConnectionManager::config('test', [
// 	'className' => 'Cake\Database\Connection',
// 	'driver' => getenv('db_class'),
// 	'dsn' => getenv('db_dsn'),
// 	'database' => getenv('db_database'),
// 	'login' => getenv('db_login'),
// 	'password' => getenv('db_password'),
// 	'timezone' => 'UTC',
// 	'quoteIdentifiers' => true,
// 	'cacheMetadata' => true,
// ]);
