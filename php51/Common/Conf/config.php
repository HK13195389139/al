<?php
return array(//'配置项'=>'配置值'
	'SHOW_PAGE_TRACE' => true,
	//不允许访问的模块
	'MODULE_DENY_LIST' => array('Commom','Runtime'),
	//允许的访问的模块
	'MODULE_ALLOW_LIST'=>array('Admin','Home'),
	//默认访问的模块，控制器，方法
	'DEFAULT_MODULE'=>'Admin',
	'DEFAULT_CONTROLLER'=>'Index',
	'DEFAULT_ACTION'=>'index',
	'URL_MODEL' =>2,

	  'LOAD_EXT_FILE'=>'myfile',
    'TMPL_PARSE_STRTNG'=>array(
    
        ),


	'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'al',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '131953',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_PARAMS'          	=>  array(), // 数据库连接参数
    'DB_DEBUG'  			=>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_FIELDS_CACHE'       =>  true, 
	// 启用字段缓存
    'URL_HTML_SUFFIX' =>'html', 
    //
	
	//'配置项'=>'配置值'
);