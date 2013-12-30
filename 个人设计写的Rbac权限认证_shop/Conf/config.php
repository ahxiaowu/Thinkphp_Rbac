<?php
return array(
	//'配置项'=>'配置值'
    //可以设置路由的模式，但是并没有实际影响
    //通过函数U()可以体现差别
    //'URL_MODEL'             => 0,
    
    // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
     'APP_GROUP_LIST'        => 'home,admin', 
    //默认访问前台
     'DEFAULT_GROUP'         => 'home',  // 默认分组
    
    //数据库配置
    'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'shop',          // 数据库名
    'DB_USER'               => 'root',      // 用户名
    'DB_PWD'                => '111111',          // 密码
    'DB_PORT'               => '',        // 端口
    'DB_PREFIX'             => 'sw_',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    => false,       // 是否进行字段类型检查
    //
    //处于性能考虑，把数据表字段放入缓存里边，
    //这样下次访问就避免执行sql语句重复执行重新获取
    //开发调试模式APP_DEBUG=true,下边缓存无效
    //生产模式APP_DEBUG=false,缓存有效
    'DB_FIELDS_CACHE'       => true,        // 启用字段缓存
    
    //修改模板引擎为smarty
    'TMPL_ENGINE_TYPE'		=>  'Smarty',     // 默认模板引擎 
    
    //在页面底部显示日志信息
     'SHOW_PAGE_TRACE'   => true,   // 显示页面Trace信息
    
    //修改smarty的具体参数信息
    'TMPL_ENGINE_CONFIG' => array(
        //左右标记
       // 'left_delimiter'=>"<{",
       // 'right_delimiter'=>"}>",
    ),
    
    //配置多语言参数
    'LANG_SWITCH_ON'        => true,   // 默认关闭语言包功能
    'LANG_AUTO_DETECT'      => true,   // 自动侦测语言 开启多语言功能后有效
    'LANG_LIST'             => 'zh-cn,zh-tw,en-us', // 允许切换的语言列表 用逗号分隔
    'VAR_LANGUAGE'          => 'hl',		// 默认语言切换变量
    
//        'SHOW_RUN_TIME'		=> true,   // 运行时间显示
//        'SHOW_ADV_TIME'		=> true,   // 显示详细的运行时间
//        'SHOW_DB_TIMES'		=> true,   // 显示数据库查询和写入次数
//        'SHOW_CACHE_TIMES'	=> false,   // 显示缓存操作次数
//        'SHOW_USE_MEM'		=> true,   // 显示内存开销
//        'SHOW_LOAD_FILE'    => true,   // 显示加载文件数
//        'SHOW_FUN_TIMES'    => false ,  // 显示函数调用次数
);
?>