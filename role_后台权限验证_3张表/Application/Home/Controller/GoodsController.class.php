<?php
/**
 * 用户欢迎
 */
namespace Home\Controller;
use Home\Controller\CommonController;
class GoodsController extends CommonController {

    function index() {
        $model  =new \Think\Model();
        $sql = "select * from __DEMO_USER__";
        $row = $model->query($sql);
        dump($row);
        echo '<hr>index';
    }

    function add() {
        echo 'add';
    }

}

?>