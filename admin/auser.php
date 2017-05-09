<?php
header("Content-Type:text/html; charset=UTF-8");
include("navIncHead.php");

$sql="SELECT * FROM `admin`";
$db_result=$db->query($sql);
$rows=array();
while($row=$db_result->fetch_assoc()){
    $rows[]=$row;
}
////



//删除
if($input->get('do')=='del'){
    $aid=$input->get('aid');
    if($aid==$session_aid){
        die ('不能删除自己');
    }
    $sql2="DELETE FROM `admin` WHERE aid={$aid}";
    $db_del=$db->query($sql2);
    if($db_del){
        header("location:auser.php");
    }else{
        die ('删除失败');
    }
}

?>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
    <h1>管理员管理 <small  class="pull-right"><a href="auserAdd.php">添加管理员</a></small></h1>
    </div>
    <table class="table table-striped">
        <tr>
            <th>ID</th><th>用户名</th><th>操作</th>
        </tr>
        <?php foreach ($rows as $key):?>
        <tr>
            <td><?php echo $key['aid'] ?></td>
            <td><?php echo $key['auser'] ?></td>
            <td><a href="auserAdd.php?do=change&aid=<?php echo $key['aid'] ?>">修改</a><a href="auser.php?do=del&aid=<?php echo $key['aid'] ?>">删除</a></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>


