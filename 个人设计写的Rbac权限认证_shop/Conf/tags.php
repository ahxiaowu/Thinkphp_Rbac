<?php

return array(
    'app_begin'     =>  array(
        //以下行为会一次执行，自动加载机制会引入对应的文件
        'ReadHtmlCache','CheckLang' // 读取静态缓存
    ),
);