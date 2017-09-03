<?php

define('LEARN_VERSION', '5.0.10');//版本号
define('LEARN', realpath('/'));//当前框架所在的目录
//define('CORE', CASSIDY . '/core');
define('DS', DIRECTORY_SEPARATOR);// /
defined('CORE') or define('CORE', __DIR__ . DS);//项目核心文件
define('EXT', '.php');//文件后缀
define('LIB_PATH', CORE . 'library' . DS);
define('CORE_PATH', LIB_PATH . 'learn' . DS);
define('COMMON', LEARN . 'common');//加载common文件
defined('APP_PATH') or define('APP_PATH', dirname($_SERVER['SCRIPT_FILENAME']) . DS);
define('IS_CLI', PHP_SAPI == 'cli' ? true : false);

define('DEBUG', true);
if (DEBUG) {
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

require __DIR__ . COMMON . '/common/function' . EXT;

require CORE_PATH . 'Loader' . EXT;

require __DIR__ . '/../vendor/autoload' . EXT;
//启动自动加载类
\learn\Loader::register();

// 执行应用
\learn\App::run();

