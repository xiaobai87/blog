<?php
header("Content-Type:text/html; charset=UTF-8");
include("navIncHead.php");







if($input->get('do')=='edit'){
	$up=$_POST;
	foreach($up as $item=>$value){
		$sql="update setting set value='{$value}' where item='{$item}'";
		$res=$db->query($sql);
		if($res){
			
			header("location:setting.php");
		}
	}


}
?>

<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
    <h1>系统设置</h1>
    </div>
    <form class="form-horizontal" method="post" action="setting.php?do=edit">
		<?php foreach ($rows as $item=>$value):?>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label"><?php echo $item; ?></label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="<?php echo $item;?>" value="<?php echo $value; ?>">
            </div>
        </div>
		<?php endforeach;?>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </div>
    </form>
</div>



