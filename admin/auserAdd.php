<?php
header("Content-Type:text/html; charset=UTF-8");
include("navIncHead.php");


//接收auser页传过来的ID，默认赋值给value;没有则新建个空数组
$aid=$input->get('aid');
$auser=[
    'auser'=>'',
    'apass'=>'',
];
if($aid){
    $sql="SELECT * FROM `admin` WHERE aid='{$aid}'";
    $auser=$db->query($sql)->fetch_assoc();
}
//注释
//处理
if($input->get('do')=='add'){
    $auser=$input->post('auser');
    $apass=$input->post('apass');
    if(empty($auser) || empty($apass)){
        die("用户名或者密码不能为空");
    }
    //检测用户名是否重复
    $sql="SELECT * FROM `admin` WHERE auser='{$auser}' and aid<>'{$aid}'";
    $is=$db->query($sql)->fetch_assoc();
    if($is){
        die( "用户名不能重复");
    }
    //判断添加修改
    if($aid<1){
        $sql="INSERT INTO `admin` (`auser`, `apass`) VALUES ('{$auser}', '{$apass}')";
    }else{
        $sql="UPDATE `admin` set auser='{$auser}', apass='{$apass}' where aid='{$aid}'";
    }
    $is=$db->query($sql);
    if($is){
        echo "添加成功";
        header("location:auser.php");
    }else{
        die ('操作成功');
    }
}

?>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
    <h1>添加管理员 <small  class="pull-right"><a href="auser.php">返回</a></small></h1>
    </div>
    <form class="form-horizontal" method="post" action="auserAdd.php?do=add&aid=<?php echo $aid; ?>">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="auser" id="auser" placeholder="请输入用户名"
            value="<?php echo $auser['auser'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
            <input type="password" class="form-control" name="apass" id="apass" 
            placeholder="请输入密码" value="<?php echo $auser['apass'] ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </div>
    </form>
</div>


