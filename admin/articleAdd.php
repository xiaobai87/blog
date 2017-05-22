<?php
header("Content-Type:text/html; charset=UTF-8");
include("navIncHead.php");


//接收auser页传过来的ID，默认赋值给value;没有则新建空数组
$pid=$input->get('pid');
$puser=[
    'ptit'=>'',
    'pcontent'=>'',
	'pauthor'=>'',
];
if($pid){
    $sql="select * from `article` where pid='{$pid}'";
    $puser=$db->query($sql)->fetch_assoc();
}
//注释
//处理
if($input->get('do')=='add'){
    $ptit=$input->post('ptit');
    $pauthor=$input->post('pauthor');
	$pcontent=$input->post('pcontent');
    if(empty($ptit) ||empty($pauthor)){
        die("数据不能为空");
    }
    //检测用户名是否重复
    $sql="select * from `article` where ptit='{$ptit}' and pid<>'{$pid}'";
    $is=$db->query($sql)->fetch_assoc();
    if($is){
        die( "标题不能重复");
    }
    //判断添加修改
	$pintime=time();
    if($pid<1){
		
        $sql="insert into article (`ptit`, `pauthor`, `pcontent`,`pintime`,`puptime`) values ('{$ptit}', '{$pauthor}','{$pcontent}','{$pintime}',0)";
    }else{
        $sql="update article set ptit='{$ptit}', pauthor='{$pauthor}' , pcontent='{$pcontent}',puptime='{$pintime}' where pid='{$pid}'";
    }
	echo $sql;
    $is=$db->query($sql);
    if($is){
        echo "操作成功";
        header("location:article.php");
    }
}

?>
<link rel="stylesheet" type="text/css" href="../dist/simditor/styles/simditor.css" />

<script type="text/javascript" src="../dist/simditor/scripts/jquery.min.js"></script>
<script type="text/javascript" src="../dist/simditor/scripts/module.js"></script>
<script type="text/javascript" src="../dist/simditor/scripts/hotkeys.js"></script>
<script type="text/javascript" src="../dist/simditor/scripts/uploader.js"></script>
<script type="text/javascript" src="../dist/simditor/scripts/simditor.js"></script>
<div class="col-md-8 col-md-offset-2">
    <div class="page-header">
    <h1>添加文章 <small  class="pull-right"><a href="article.php">返回</a></small></h1>
    </div>
    <form class="form-horizontal" method="post" action="articleAdd.php?do=add&pid=<?php echo $pid;?>">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">标题</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="ptit" id="ptit" placeholder="请输入标题"
            value="<?php echo $puser['ptit'] ?>">
            </div>
        </div>
       <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">作者</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="pauthor" id="pauthor" placeholder="请输入作者名称"
            value="<?php echo $puser['pauthor'] ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">正文</label>
            <div class="col-sm-10">
            <textarea class="form-control" name="pcontent" id="editor" 
            placeholder="请输入正文"><?php echo $puser['pcontent'] ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">添加</button>
            </div>
        </div>
    </form>
</div>

<script>
   $(function(){ 
    var editor = new Simditor( {  
        textarea : $('#editor'),
		defaultImage : '../upfiles/image.jpg', 		
        upload : {  
            url : 'articleUpload.php', 
            fileKey: 'articlefile',
			leaveConfirm: '正在上传文件'
        }   
    });  
   })  
</script>


