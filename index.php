<?php

// 应用目录为当前目录

define('APP_PATH', __DIR__ .'/');

// 定义一个常量

define('__STATIC__', '/static/');

// 开启调试模式

define('APP_DEBUG', true);

// 加载框架文件

require('fastphp/Fastphp.php');

// 加载配置文件

require('config/config.php');

// 实例化框架类

(new Fastphp($arr))->run();
