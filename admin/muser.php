<?php
header("Content-Type:text/html; charset=UTF-8");
include("navIncHead.php");

$sql="select * from `member`";
$db_result=$db->query($sql);
$rows=array();
while($row=$db_result->fetch_assoc()){
    $rows[]=$row;
}




//删除
if($input->get('do')=='del'){
    $mid=$input->get('mid');
    if($mid==$session_mid || $mid==1){
        die ('不能删除自己');
    }
    $sql="delete from `member` where mid={$mid}";
    $db_del=$db->query($sql);
    if($db_del){
        header("location:muser.php");
    }else{
        die ('删除失败');
    }
}

?>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
    <h1>管理员管理 <small  class="pull-right"><a href="muserAdd.php">添加管理员</a></small></h1>
    </div>
    <table class="table table-striped">
        <tr>
            <th>ID</th><th>用户名</th><th>操作</th>
        </tr>
        <?php foreach ($rows as $key):?>
        <tr>
            <td><?php echo $key['mid'] ?></td>
            <td><?php echo $key['muser'] ?></td>
            <td><a href="muserAdd.php?do=change&mid=<?php echo $key['mid'] ?>">修改</a><a href="muser.php?do=del&mid=<?php echo $key['mid'] ?>">删除</a></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>


