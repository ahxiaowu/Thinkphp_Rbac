--用户表
CREATE TABLE IF NOT EXISTS `sw_manager` (
  `mg_id` int NOT NULL AUTO_INCREMENT,
  `mg_name` varchar(20) NOT NULL comment '名称',
  `mg_pwd` varchar(32) NOT NULL comment '密码',
  `mg_time` int unsigned NOT NULL comment '时间',
  `mg_role_id` tinyint(1) unsigned not null default 0 comment '角色id',
  PRIMARY KEY (`mg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--权限表
CREATE TABLE IF NOT EXISTS `sw_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL comment '名称',
  `auth_pid` smallint(6) unsigned NOT NULL comment '父id',
  `auth_c` varchar(32) not null default '' comment '模块',
  `auth_a` varchar(32) not null default '' comment '操作方法',
  `auth_path` varchar(32) NOT NULL comment '全路径',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--角色表
CREATE TABLE IF NOT EXISTS `sw_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL comment '角色名称',
  `role_auth_ids` varchar(128) not null default '' comment '权限ids,1,2,5',
  `role_auth_ac` text comment '模块-操作',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

`role_auth_ac`=”Company-show,Cat-mag,Product-list”

角色：
    董事长
    总监
    高级经理
    经理
    项目经理
    业务主管
	客服
	技术支持
	美工
    员工
    

CREATE TABLE IF NOT EXISTS `sw_auth` (
  `auth_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(20) NOT NULL comment '名称',
  `auth_pid` smallint(6) unsigned NOT NULL comment '父id',
  `auth_c` varchar(32) not null default '' comment '模块',
  `auth_a` varchar(32) not null default '' comment '操作方法',
  `auth_path` varchar(32) NOT NULL comment '全路径父级全路径与本身id做连接，如果没有父级，全路径就是本身id值，用于排序',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into sw_auth values (null,'商品管理',0,'','','1');
insert into sw_auth values (null,'商品列表',1,'Goods','showlist','1-2');
insert into sw_auth values (null,'添加商品',1,'Goods','add','1-3');
insert into sw_auth values (null,'用户评论',1,'User','pinglun','1-4');
insert into sw_auth values (null,'订单管理',0,'','','5');
insert into sw_auth values (null,'订单列表',5,'Order','showlist','5-6');
insert into sw_auth values (null,'订单查询',5,'Order','view','5-7');
insert into sw_auth values (null,'文章管理',0,'','','8');
insert into sw_auth values (null,'文章列表',8,'Article','showlist','8-9');
insert into sw_auth values (null,'权限管理',0,'','','10');
insert into sw_auth values (null,'管理员列表',10,'Manager','showlist','10-11');
insert into sw_auth values (null,'角色管理',10,'Role','showlist','10-12');
insert into sw_auth values (null,'权限管理',10,'Auth','showlist','10-13');

CREATE TABLE IF NOT EXISTS `sw_role` (
  `role_id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL comment '角色名称',
  `role_auth_ids` varchar(128) not null default '' comment '权限ids,1,2,5',
  `role_auth_ac` text comment '模块-操作',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into sw_role values (null,'经理','5,6,7','Order-showlist,Order-view');
insert into sw_role values (null,'员工','1,2,3,4','Goods-showlist,Goods-add,User-pinglun');

alter table sw_manager add mg_time int UNSIGNED not null comment '时间';
alter table sw_manager add mg_role_id tinyint UNSIGNED not null default 0 comment '角色id';
    
