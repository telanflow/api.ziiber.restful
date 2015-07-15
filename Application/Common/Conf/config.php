<?php
/**
 * 系统主配置文件，用于加载不同环境下的配置与系统的公用基础配置
 * @author Ziiber <ziiber@foxmail.com>
 * @copyright 2015
 * @version 1.0.0
 */

# 预定义使用配置
define('PRODUCT_CONFIG', FALSE);  // 生产环境设置
define('DEVELOP_CONFIG', TRUE);  // 开发环境设置

# 预定义文件所在的目录
define('CONF_PATH', dirname(__FILE__));

# 加载空配置
$config = array();

# 加载默认配置
# 默认配置必须加载，是系统最基础的配置内容
if(file_exists(CONF_PATH . 'default.conf.php')){
    include_once 'default.conf.php';
    $config = array_merge($config, $default);
}

# 加载正式环境配置
# 生产环境中的配置内容，用于项目的正式运行
# 如果需要加载生产环境，则只能将 PRODUCT_CONFIG 设置为true，否则可能产生同名覆盖
if(file_exists(CONF_PATH . 'product.conf.php') and PRODUCT_CONFIG){
    include_once 'product.conf.php';
    $config = array_merge($config, $product);
}

# 加载开发环境配置
# 用于开发状态或本地开发配置实用，用于项目的开发阶段，改动可能较大
# 如果要加载开发环境，则只需要将 DEVELOP_CONFIG 设置为true即可
if(file_exists(CONF_PATH . 'develop.conf.php') and DEVELOP_CONFIG){
    include_once 'develop.conf.php';
    $config = array_merge($config, $develop);
}

return $config;