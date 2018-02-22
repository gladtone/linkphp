<?php

// +----------------------------------------------------------------------
// | LinkPHP [ Link All Thing ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://linkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: Latham <liujun2199@vip.qq.com>
// +----------------------------------------------------------------------
// |               路由解释器
// +----------------------------------------------------------------------

namespace linkphp\boot;

use linkphp\boot\router\Init;
use linkphp\boot\router\Dispatch;
use linkphp\boot\router\config\GetConfig;
use linkphp\boot\interfaces\RunInterface;

class Router implements RunInterface
{

    /**
     * 路由解析启动
     */
    public function initialize()
    {
        $config = GetConfig::get();
        Init::init($config);
        static::_initPlatformPathConst($config);
        Dispatch::init($config);
    }

    /**
     * 声明当前平台路径常量
     */
    static private function _initPlatformPathConst($config)
    {
        /**
         * 定义控制器路径常量
         */
        define('CURRENT_CONTROLLER_PATH',$config['__APP__'] . 'controller/' . PLATFORM);
        /**
         * 定义模型路径常量
         */
        define('CURRENT_MODEL_PATH', $config['__APP__'] . 'model/' . PLATFORM);
        /**
         * 定义视图路径常量
         */
        define('CURRENT_VIEW_PATH', $config['__APP__'] . 'view/' . PLATFORM);

    }
}