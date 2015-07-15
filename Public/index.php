<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用入口文件

/**
 * Music Api
 * @author ziiber <ziiber@foxmail.com>
 * @time(2015.07.15)
 */

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

# 定义加载开始时间
define('START_TIME', microtime(TRUE));
try {
    if (isset($_REQUEST['PHPSESSID']))
        session_id($_REQUEST['PHPSESSID']);
} catch (Exception $e) {}

define('LOCAL_PATH', dirname(dirname(__FILE__)));
# 定义应用目录
define('APP_PATH', LOCAL_PATH . '/Application/');
# 定义缓存目录
define('RUNTIME_PATH', LOCAL_PATH . '/Runtime/');
# 调试模式开关
define('APP_DEBUG', true);
# 用于目录安全
define('DIR_SECURE_FILENAME', 'index.html');
define('DIR_SECURE_CONTENT', 'deney Access!');
# 定义框架目录
define('THINK_PATH', LOCAL_PATH . '/ThinkPHP/');
# 载入框架入口文件
require_once THINK_PATH . 'ThinkPHP.php';