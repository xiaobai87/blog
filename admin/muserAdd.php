<?php
header("Content-Type:text/html; charset=UTF-8");
include("navIncHead.php");


//接收auser页传过来的ID，默认赋值给value;没有则新建空数组
$mid=$input->get('mid');
$muser=[
    'muser'=>'',
    'mpass'=>'',
];
if($mid){
    $sql="select * from `member` where mid='{$mid}'";
    $muser=$db->query($sql)->fetch_assoc();
}
//注释
//处理
if($input->get('do')=='add'){
    $muser=$input->post('muser');
    $mpass=$input->post('mpass');
    if(empty($muser) || empty($mpass)){
        die("用户名或者密码不能为空");
    }
    //检测用户名是否重复
    $sql="select * from `member` where muser='{$muser}' and mid<>'{$mid}'";
    $is=$db->query($sql)->fetch_assoc();
    if($is){
        die( "用户名不能重复");
    }
    //判断添加修改
    if($mid<1){
        $sql="insert into `member` (`muser`, `mpass`) values ('{$muser}', '{$mpass}')";
    }else{
        $sql="update `member` set muser='{$muser}', mpass='{$mpass}' where mid='{$mid}'";
    }
    $is=$db->query($sql);
    if($is){
        echo "操作成功";
        header("location:muser.php");
    }
}

?>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
    <h1>添加管理员 <small  class="pull-right"><a href="muser.php">返回</a></small></h1>
    </div>
    <form class="form-horizontal" method="post" action="muserAdd.php?do=add&mid=<?php echo $mid; ?>">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="muser" id="muser" placeholder="请输入用户名"
            value="<?php echo $muser['muser'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" name="mpass" id="mpass" 
            placeholder="请输入密码" value="<?php echo $muser['mpass'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </div>
    </form>
</div>


