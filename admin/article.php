<?php
header("Content-Type:text/html; charset=UTF-8");
include("navIncHead.php");

$sql="select * from `article` limit 0,10";
$db_result=$db->query($sql);

$rows=array();
while($row=$db_result->fetch_assoc()){
    $rows[]=$row;
}




//删除
if($input->get('do')=='del'){
    $pid=$input->get('pid');
    $sql="delete from `article` where pid={$pid}";
    $db_del=$db->query($sql);
    if($db_del){
        header("location:article.php");
    }else{
        die ('删除失败');
    }
}

?>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
    <h1>文章管理 <small  class="pull-right"><a href="articleAdd.php">添加文章</a></small></h1>
    </div>
    <table class="table table-striped">
        <tr>
            <th>ID</th><th>标题</th><th>作者</th><th>发表时间</th><th>更新时间</th><th>操作</th>
        </tr>
        <?php foreach ($rows as $key):?>
        <tr>
            <td><?php echo $key['pid'] ?></td>
            <td><?php echo $key['ptit'] ?></td>
			<td><?php echo $key['pauthor'] ?></td>
			<td><?php echo date('Y-m-d H:i:s',$key['pintime']) ?></td>
			<td><?php echo date('Y-m-d H:i:s',$key['puptime']) ?></td>
            <td><a href="articleAdd.php?do=change&pid=<?php echo $key['pid'] ?>">修改</a><a href="article.php?do=del&pid=<?php echo $key['pid'] ?>">删除</a></td>
        </tr>
        <?php endforeach;?>
    </table>
	<nav aria-label="Page navigation">
	  <ul class="pagination">
	  	<?php 
		for($i=1;$i<=10;$i++){
			echo "<li><a href=\"article.php?page={$i}\">{$i}</a></li>";
		}
		?>
	  </ul>
	</nav>
</div>


