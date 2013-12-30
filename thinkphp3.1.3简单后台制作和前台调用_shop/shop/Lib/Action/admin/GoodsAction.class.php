<?php

/**
 * 后台商品控制器
 */
class GoodsAction extends Action {

	//商品列表
	function index() {
		//引入分页类
		import('@.components.Page');
		$goodsModel = D('Goods');

		//1.计算当前记录总数目
		$total = $goodsModel->count();
		$pageSize = 5;

		$page = new Page($total,$pageSize);

		$info = $goodsModel->limit($page->limit)->select();

		$this->pageStr = $page->fpage();
		$this->info = $info;
		$this->display();
	}

	//添加商品
	function add() {
		$goodsModel = D('Goods');
		
		//表单提交
		if(!empty($_POST)){
			# 方法一
			#$id = $goodsModel->add($_POST);
			
			# 方法二
			/*
			foreach ($_POST as $k=>$v){
				$goodsModel->$k = $v;
			}
			$goodsModel->add();
			*/
			
			# 方法三
			$goodsModel->create();
			$goodsModel->add();
		}
		
		$this->display();
	}

	//修改商品
	//这种方式安全
	function edit($goods_id,$goods_price=100) {
		echo $goods_id;
		//$goods_price 如果不传值就默认为100
		$this->display();
	}

}
