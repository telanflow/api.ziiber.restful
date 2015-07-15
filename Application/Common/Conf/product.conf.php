<?php
/**
 * 线上服务器配置文件
 * @author Ziiber <ziiber@foxmail.com>
 * @copyright 2015.07.15
 * @version 1.0.0
 */

$product = array(
	# 数据库配置
    'DB_HOST'   => '127.0.0.1', // 服务器地址(Host)
    'DB_NAME'   => 'music',                            // 数据库名(DB Name)
    'DB_USER'   => 'root',                             // 用户名(Username)
    'DB_PWD'    => '87bf8f6397cc800d',                           // 密码(Password)
    'DB_PORT'   => '3306',                                       // 端口(Port)
    'DB_PREFIX' => 'music_',                                      // 数据库表前缀

    # 路由配置
    'URL_ROUTER_ON'   => true 							// 开启路由
    'URL_ROUTE_RULES' => array(
	    'baidu/:' => array('Api/Index/query', 'status=1'),
	)
);