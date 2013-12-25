<?php
class UserRelationModel extends RelationModel{
	# 定义主表的名称
	protected $tableName = 'user';
	
	# 定义关联关系
	protected $_link = array(
		'role'=>array(
			'mapping_type'  => MANY_TO_MANY,
			'foreign_key'   => 'user_id',       # 主表外键ID
			'relation_key'   => 'role_id',      # 关联表外键ID
			'relation_table' => 'tp_role_user',
			'mapping_fields'=>'id,name,status,remark'
		)
	);








}
?>