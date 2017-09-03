<?php

namespace learn;

class App
{

    //控制器
    protected static $controller;

    //方法
    protected static $action;

    //检查路由是否存在
    private static $checkConfig;


    /**
     *[run 执行应用程序]
     * @author  Wongzx <[842687571@qq.com]>
     * @copyright Copyright (c)
     * @return    [type]        [description]
     */
    public static function run()//Request $request = null
    {
//        is_null($request) && $request = Request::instance();

        self::route();
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != DS) {
            $path = $_SERVER['REQUEST_URI'];
            $pathArr = explode('/', trim($path, '/'));
            if (isset($pathArr[0])) {
                self::$controller = $pathArr[0];
            }
            if (isset($pathArr[1])) {
                self::$action = $pathArr[1];
            } else {
                self::$action = 'index';
            }
        } else {
            self::$controller = 'index';
            self::$action = 'index';
        }
    }


    /**
     *[route 设置应用的路由检测机制]
     * @author  Wongzx <[842687571@qq.com]>
     * @copyright Copyright (c)
     * @return    [type]        [description]
     */
    private static function route()
    {
        Config::getConfigFile();
        self::addApplication();
    }

    /**
     *[checkHttp 检查应用模块]
     * @author  Wongzx <[842687571@qq.com]>
     * @copyright Copyright (c)
     * @return    [type]        [description]
     */
    private static function addApplication()
    {
        $http = Config::get('default_application');
        if (!empty($http)) {
            if (!is_dir(APP_PATH . '/' . $http)) {
                $path = APP_PATH . $http;
                mkdir($path, 0777, true);
            }
        } else {
            $path = APP_PATH . '/Http';
            mkdir($path, 0777, true);
        }
    }
}