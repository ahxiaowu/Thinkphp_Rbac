<?php

return array(
    //数据库配置信息
    'DB_TYPE' => 'mysql', // 数据库类型
    'DB_HOST' => 'localhost', // 服务器地址
    'DB_NAME' => 'rbac', // 数据库名
    'DB_USER' => 'root', // 用户名
    'DB_PWD' => 'admin', // 密码
    'DB_PORT' => 3306, // 端口
    'DB_PREFIX' => 'tp_', // 数据库表前缀
    
    //URL伪静态后缀设置
    'URL_HTML_SUFFIX' => '',
    
    //分组操作
    'APP_GROUP_MODE' => 1,
    'APP_GROUP_PATH' => 'Modules',
    'APP_GROUP_LIST' => 'Index,Admin',
    'DEFAULT_GROUP'  => 'Index',
);
?>