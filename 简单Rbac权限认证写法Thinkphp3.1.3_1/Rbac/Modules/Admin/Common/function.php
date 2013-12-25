<?php 
/**
 * 递归重组节点信息为多维数组
 * $nodeArr : 要处理的节点数组
 * $access  : 权限ID(节点ID)
 * $pid     : 父级ID
*/
function node_merge($nodeArr,$access=null,$pid=0){
	$arr = array();
	foreach($nodeArr as $v){
        if(is_array($access)){
            if(in_array($v['id'], $access)){
                $v['access'] = 1;
            }else{
                $v['access'] = 0;
            }
        }
		if($v['pid'] == $pid){
			$v['child'] = node_merge($nodeArr,$access,$v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}

/**
 * 重组成一唯数组
 */
function unLimitedForLevel($cateArr,$html=' -- ',$pid=0,$level=0){
    static $arr = array();
    foreach($cateArr as $v){
        if($v['pid']==$pid){
            $v['level'] = $level+1;
            $v['html'] = str_repeat($html,$level);
            $arr[] = $v;
            unLimitedForLevel($cateArr,$html,$v['id'],$level+1);
        }
    }
    return $arr;
}

function p(array $arr){
    dump($arr, true, null, false); 
}


?>