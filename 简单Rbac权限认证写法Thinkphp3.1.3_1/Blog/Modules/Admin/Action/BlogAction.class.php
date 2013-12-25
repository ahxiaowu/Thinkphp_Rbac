<?php
class BlogAction extends Action{
    // 博文列表
    function index(){
        $this->blog = M('blog')->where(array('del'=>0))->select();
        $this->display();
    }
    
    // 添加博文
    function addblog(){
        import('Class.Cate',APP_PATH);
        $cateArr = M('cate')->select();
        $this->attr = M('attr')->select();
        $this->cateArr = Cate::oneLimitCate($cateArr);
        $this->display();
    }
    
    function saveblog(){
        $data = array(
            'title'=>$_POST['title'],
            'content'=>$_POST['content'],
            'pubtime'=>time(),
            'cid'=>intval($_POST['cid']),
            'click'=>intval($_POST['click'])
        );

        if($bid = M('blog')->add($data)){
            $sql = "insert into ".C('DB_PREFIX')."blog_attr (bid,aid) values ";
            if(isset($_POST['aid'])){
                foreach($_POST['aid'] as $v){
                    $sql .= "($bid,$v),";
                }
                $sql = rtrim($sql,',');
                if(M('blog_attr')->execute($sql)){
                    $this->success('添加博文成功!!',U(GROUP_NAME.'/Blog/index'));
                }else{
                    $this->error('添加博文失败!!');
                }
            }
        }else{
            $this->error('添加博文失败!');
        }



    }
    
}