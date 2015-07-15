<?php
/**
 * 系统主配置文件，用于加载不同环境下的配置与系统的公用基础配置
 * @author Ziiber <ziiber@foxmail.com>
 * @copyright 2015
 * @version 1.0.0
 */

$default = array(
    # 网站名称
    'WEB_NAME' => 'Musci Api',

    # 调试配置
    'SHOW_PAGE_TRACE' => FALSE,

    # SESSION设置
    'SESSION_AUTO_START' => true,    // 是否自动开启Session
    'SESSION_OPTIONS'    => array(), // session 配置数组 支持type name id path expire domain 等参数
    'SESSION_TYPE'       => '',      // session hander类型 默认无需设置 除非扩展了session hander驱动
    'SESSION_PREFIX'     => '',      // session 前缀

    # Cookie设置
    'COOKIE_EXPIRE' => 0,   // Cookie有效期
    'COOKIE_DOMAIN' => '',  // Cookie有效域名
    'COOKIE_PATH'   => '/', // Cookie路径
    'COOKIE_PREFIX' => '',  // Cookie前缀 避免冲突

    # 应用设定
    'APP_FILE_CASE'         => false,   // 是否检查文件的大小写 对Windows平台有效
    'APP_SUB_DOMAIN_DEPLOY' => false,   // 是否开启子域名部署
    'APP_SUB_DOMAIN_RULES'  => array(), // 子域名部署规则
    'APP_DOMAIN_SUFFIX'     => '',      // 域名后缀 如果是com.cn net.cn 之类的后缀必须设置
    'ACTION_SUFFIX'         => '',      // 操作方法后缀
    'MULTI_MODULE'          => true,    // 是否允许多模块 如果为false 则必须设置 DEFAULT_MODULE
    'MODULE_DENY_LIST'      => array('Common', 'Runtime'),
    'CONTROLLER_LEVEL'      => 1,

    # 默认设定
    'DEFAULT_M_LAYER'       => 'Model',            // 默认的模型层名称(M)
    'DEFAULT_C_LAYER'       => 'Controller',       // 默认的控制器层名称(C)
    'DEFAULT_V_LAYER'       => 'View',             // 默认的视图层名称(V)
    'DEFAULT_LANG'          => 'zh-cn',            // 默认语言
    'DEFAULT_THEME'         => '',                 // 默认模板主题名称
    'DEFAULT_MODULE'        => 'Home',             // 默认模块(Module)
    'DEFAULT_CONTROLLER'    => 'Index',            // 默认控制器名称(Controller)
    'DEFAULT_ACTION'        => 'index',            // 默认操作名称(Action)
    'DEFAULT_CHARSET'       => 'utf-8',            // 默认输出编码(En-code)
    'DEFAULT_TIMEZONE'      => 'PRC',              // 默认时区(Time Zone)
    'DEFAULT_AJAX_RETURN'   => 'JSON',             // 默认AJAX 数据返回格式,可选JSON XML
    'DEFAULT_JSONP_HANDLER' => 'jsonpReturn',      // 默认JSONP格式返回的处理方法
    'DEFAULT_FILTER'        => 'htmlspecialchars', // 默认参数过滤方法 用于I函数

    # 数据库设置
    'DB_TYPE'             => 'mysql',                             // 数据库类型
    'DB_HOST'             => '',                                  // 服务器地址(Host)
    'DB_NAME'             => '',                                  // 数据库名(DB Name)
    'DB_USER'             => '',                                  // 用户名(Username)
    'DB_PWD'              => '',                                  // 密码(Password)
    'DB_PORT'             => '',                                  // 端口(Port)
    'DB_PREFIX'           => '',                                  // 数据库表前缀
    'DB_FIELDTYPE_CHECK'  => false,                               // 是否进行字段类型检查
    'DB_FIELDS_CACHE'     => true,                                // 启用字段缓存
    'DB_CHARSET'          => 'utf8',                              // 数据库编码默认采用utf8
    'DB_DEPLOY_TYPE'      => 0,                                   // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'DB_RW_SEPARATE'      => false,                               // 数据库读写是否分离 主从式有效
    'DB_MASTER_NUM'       => 1,                                   // 读写分离后 主服务器数量
    'DB_SLAVE_NO'         => '',                                  // 指定从服务器序号
    'DB_SQL_BUILD_CACHE'  => false,                               // 数据库查询的SQL创建缓存
    'DB_SQL_BUILD_QUEUE'  => 'file',                              // SQL缓存队列的缓存方式 支持 file xcache和apc
    'DB_SQL_BUILD_LENGTH' => 20,                                  // SQL缓存的队列长度
    'DB_SQL_LOG'          => false,                               // SQL执行日志记录
    'DB_BIND_PARAM'       => false,                               // 数据库写入数据自动参数绑定

    # 数据缓存设置
    'DATA_CACHE_TIME'     => 0,          // 数据缓存有效期 0表示永久缓存
    'DATA_CACHE_COMPRESS' => false,      // 数据缓存是否压缩缓存
    'DATA_CACHE_CHECK'    => false,      // 数据缓存是否校验缓存
    'DATA_CACHE_PREFIX'   => '',         // 缓存前缀
    'DATA_CACHE_TYPE'     => 'File',     // 数据缓存类型,支持:File|Db|Apc|Memcache|Shmop|Sqlite|Xcache|Apachenote|Eaccelerator
    'DATA_CACHE_PATH'     => TEMP_PATH,  // 缓存路径设置 (仅对File方式缓存有效)
    'DATA_CACHE_SUBDIR'   => false,      // 使用子目录缓存 (自动根据缓存标识的哈希创建子目录)
    'DATA_PATH_LEVEL'     => 1,          // 子目录缓存级别

    # 错误设置
    'ERROR_MESSAGE'    => '页面错误！请稍后再试～', // 错误显示信息,非调试模式有效
    'ERROR_PAGE'       => '',                       // 错误定向页面
    'SHOW_ERROR_MSG'   => false,                    // 显示错误信息
    'TRACE_EXCEPTION'  => false,                    // TRACE错误信息是否抛异常 针对trace方法
    'TRACE_MAX_RECORD' => 100,                      // 每个级别的错误信息 最大记录数

    # 日志设置
    'LOG_RECORD'           => false,                  // 默认不记录日志
    'LOG_TYPE'             => 'File',                 // 日志记录类型 默认为文件方式
    'LOG_LEVEL'            => 'EMERG,ALERT,CRIT,ERR', // 允许记录的日志级别
    'LOG_FILE_SIZE'        => 2097152,                // 日志文件大小限制
    'LOG_EXCEPTION_RECORD' => false,                  // 是否记录异常信息日志

    # 模板引擎设置
    'TMPL_CONTENT_TYPE'    => 'text/html',                            // 默认模板输出类型
    'TMPL_ACTION_ERROR'    => THINK_PATH . 'Tpl/dispatch_jump.tpl',   // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'  => THINK_PATH . 'Tpl/dispatch_jump.tpl',   // 默认成功跳转对应的模板文件
    'TMPL_EXCEPTION_FILE'  => THINK_PATH . 'Tpl/think_exception.tpl', // 异常页面的模板文件
    'TMPL_DETECT_THEME'    => false,                                  // 自动侦测模板主题
    'TMPL_TEMPLATE_SUFFIX' => '.html',                                // 默认模板文件后缀
    'TMPL_FILE_DEPR'       => '/',                                    // 模板文件CONTROLLER_NAME与ACTION_NAME之间的分割符
    'TMPL_PARSE_STRING'    => array(
        '__PUBLIC__'       => '',                                     // 模板使用public文件夹位置
        '__UPLOAD__'       => '/Uploads/',                            // 用户上传文件保存位置
    ),

    # URL设置
    'URL_PATHINFO_DEPR'    => '/',               // PATHINFO模式下，各参数之间的分割符号
    'URL_CASE_INSENSITIVE' => true,              // 默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_REQUEST_URI'      => 'REQUEST_URI',     // 获取当前页面地址的系统变量 默认为REQUEST_URI
    'URL_MODEL'            => 2,                 // URL访问模式,可选参数0(普通) 1(PATHINFO) 2(REWRITE) 3(兼容)
    'URL_HTML_SUFFIX'      => 'html',            // URL伪静态后缀设置
    'URL_DENY_SUFFIX'      => 'ico|png|gif|jpg', // URL禁止访问的后缀设置
    'URL_PARAMS_BIND'      => true,              // URL变量绑定到Action方法参数
    'URL_PARAMS_BIND_TYPE' => 0,                 // URL变量绑定的类型 0-按变量名 1-变量顺序
    'URL_404_REDIRECT'     => '',                // 404 跳转页面 部署模式有效
    'URL_ROUTER_ON'        => false,             // 是否开启URL路由
    'URL_ROUTE_RULES'      => array(),           // 默认路由规则 针对模块
    'URL_MAP_RULES'        => array(),           // URL映射定义规则
    'URL_PATHINFO_FETCH'   => 'ORIG_PATH_INFO,REDIRECT_PATH_INFO,REDIRECT_URL', // 用于兼容判断PATH_INFO 参数的SERVER替代变量列表
);