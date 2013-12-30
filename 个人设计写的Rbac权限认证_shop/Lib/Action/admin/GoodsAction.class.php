<?php

//后台商品控制器
import("@.components.AdminAction");
class GoodsAction extends AdminAction{

    //商品列表
    function showlist1(){
        //查询数据信息
        $goods_model = D('Goods');
        //通过select（）方法查询数据
        //返回二维数组
        //select(记录主键值)
        //select("13,26,33");
        //$info = $goods_model -> select();  全部记录信息
        //$info = $goods_model -> select(19);  //根据主键值查询指定记录
        //$info = $goods_model -> select("13,26,33");  //根据主键值查询若干条记录
        
        //find()方法返回一个一维数组数据
        //每次只返回一条记录信息
        //$info = $goods_model -> find(19);
        //$info = $goods_model -> find("29,32,45,19");
        //show_bug($info);
        
        //限制字段查询field("字段,字段...");
        $info = $goods_model -> select();  //全部字段、全部记录信息
        $info = $goods_model->field("goods_name,goods_number,goods_create_time")->select();
        
        //显示查询条数limit([偏移量，]长度)
        $info = $goods_model -> limit(5)->select();
        $info = $goods_model -> limit(5,5)->select();
        
        //排序查询order("price asc/desc")
        $info = $goods_model -> order('goods_price desc')->select();
        $info = $goods_model -> order('goods_price desc')->limit(5)->select();
        //model对象调用本身不存在的方法order()
        //实际会执行魔术方法__call()自动调用
        
        //下边的连贯操作，多个条件彼此没有顺序要求，最后都被传递给options属性
        //options属性最后会把sql语句根据条件给拼装好
        $info = $goods_model ->limit(5)->field('goods_name,goods_price')-> order('goods_price desc')->select();
        
        //设置where条件 where()
        $info = $goods_model->where('goods_price > 5000')->select();
        $info = $goods_model ->table('sw_goods')->select();
        $info = $goods_model -> group("goods_category_id")->select();
        
        
        $this -> assign('info',$info);
        $this -> display();
    }
    
    function showlist2(){
        $goods_model = D("Goods");
        //查询名字为"三星BC01"商品信息
        //$info = $goods_model -> getByGoods_name('三星BC01');
        //$info = $goods_model -> getByGoods_price('5999');
        //show_bug($info);
        //$info = $goods_model -> having("goods_name like '诺%'")->select();
        
        //执行原生sql语句
        $sql = "select * from sw_goods a join sw_category b on a.goods_category_id=b.cat_id";
        $info = $goods_model->query($sql);
        
        $this -> assign('info', $info);
        $this -> display();
    }
    
    function showlist(){
        $goods_model = D("Goods");
        //1 引入分页类
        import("@.components.Page");
        
        //2 计算当前记录总数目
        $total = $goods_model -> count();
        $per = 5;
        
        //3. 实例化分页类对象
        $page = new Page($total,$per);
        
        //4. 制作一条sql语句获得每页信息
        $sql = "select * from sw_goods ".$page->limit;
        $info = $goods_model -> query($sql);
        
        //5. 获得页面列表
        $page_list = $page->fpage(array(3,4,5,6,7,8));
        
        $this -> assign('info',$info);
        $this -> assign('page_list',$page_list);
        $this -> display();
    }
    //添加商品
    function add1(){
        $goods_model = D("Goods");
        //实现数据添加
        //数组下标 与 数据库表 字段 一致
        /*
        $d = array(
            'goods_name'=>'htc230',
            'goods_price'=>'3999',
            'goods_number'=>45,
            'goods_weight'=>103
        );
        $rst = $goods_model -> add($d);
        */
        
        //AR方式实现数据添加
        //对象调用不存在的属性需要调用魔术方法__set();
        /*
        $goods_model -> goods_name = "iphone6";
        $goods_model -> goods_price = "5700";
        $goods_model -> goods_number = 31;
        $goods_model -> goods_weight = 110;
         * 
         */
        //以上4个信息最后被$this->data收集
        $rst = $goods_model -> add();
        
        show_bug($rst);  //被添加记录本身的id值
        
        $this -> display();
    }
    
    function add(){
        $goods_model = D("Goods");
        //判断是否提交表单
        if(!empty($_POST)){
            //数据添加
            //foreach($_POST as $k => $v){
            //    $goods_model -> $k = $v;
            //}
            $goods_model -> create();  //tp框架本身收集表单数据方法
            
            $rst = $goods_model -> add();
            if($rst){
                $this -> success('添加成功',__URL__."/showlist");
            }
        } else {
            $this -> display();
        }
    }

    //修改商品
    function upd1(){
        $goods_model = D("Goods");
        //修改数据
        $d = array(
            'goods_name'=>'小米手机',
            'goods_price'=>3200
        );
        $rst = $goods_model->where('goods_id>50') -> save($d);
        //在实际生产中，是不允许一次性修改全部记录信息
        show_bug($rst);
        
//        $goods_model -> goods_name = "xxx";
//        $goods_model -> goods_price = "xxx";
//        $goods_model -> save();
        
        $this -> display();
    }
    
    //以下方法被访问必须传递参数
    //http://网址/index.php/控制器/方法/goods_id/102/goods_price/305
    //url地址参数名字要求与方法参数一致
    function upd($goods_id,$goods_price=506){
        //把被修改的商品信息查询出来，传递给模板显示
        $goods_model = D("Goods");
        
        if(!empty($_POST)){
            //接收修改的表单数据
            $goods_model -> create(); //收集表单信息
            $rst = $goods_model -> save();
            if($rst){
                //$this -> success(提示信息，跳转地址);
                $this -> success('修改成功',__URL__."/showlist");
            }
        } else {
            $info = $goods_model -> getByGoods_id($goods_id);

            $this -> assign('info',$info);
            $this -> display();
        }
    }
    
    function s1(){
        //缓存设置
        //缓存时间默认是永久的，可以设置
        S("username","linken");
        S("age",25);
        S("address","北京".time(),10); //过期自动删除
        S("goods_info",array('one'=>'apple','two'=>'htc','three'=>'nokia'));
        echo "ok ,success";
    }
    function s2(){
        //读取缓存信息
        echo S('username')."<br />";
        echo S('age')."<br />";
        echo S('address')."<br />";
        print_r(S("goods_info"));
    }
    function s3(){
        //删除缓存
        S("age",null);
    }
    
    function showlista(){
        echo D("Goods")->getInfo();
    }
    
}