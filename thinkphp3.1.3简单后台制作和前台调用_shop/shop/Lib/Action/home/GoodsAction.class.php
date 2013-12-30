<?php
/**
 * 商品控制器
 */
class GoodsAction extends Action{
	//展示商品列表
	function showlist(){
		$this->display();
	}
	
	//查看商品详细信息
	function detail(){
		$this->display();
	}
	
	
}