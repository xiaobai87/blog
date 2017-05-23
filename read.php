<?php
header("Content-Type:text/html; charset=UTF-8");

include("/core/core.php");

$reads=$input->get('pid');
$sql="select * from `article` WHERE pid='{$reads}'";
$readss=$db->query($sql)->fetch_assoc();


?>

<!DOCTYPE html>

<html lang="zh-cn">
<head>
	<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="renderer" content="webkit"/>
	<title>M博客-采用原生PHP开发</title>
	<link href="/blog/dist/css/bootstrap.css" rel="stylesheet"/>
	<script src="/blog/dist/js/jquery-3.2.1.min.js"></script>
	<script src="/blog/dist/js/bootstrap.js"></script>
</head>

<body>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
			  <h1><?php echo $rows['title'] ?></h1>
			  <p><?php echo $rows['info'] ?></p>
			  <p><a class="btn btn-primary btn-lg" href="/blog" role="button">首页</a></p>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
			  <div class="panel-heading"><a href="read.php?pid=<?php echo $readss['pid'] ?>"><?php echo $readss['ptit'] ?></a></div>
			  <div class="panel-body">
				<?php echo $readss['pcontent'] ?>
			  </div>
			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-default">
			  <div class="panel-heading">作者简介</div>
			  <div class="panel-body">
				<p>五年前端经验，今年首次进入后端领域，首选Php作为切入口，不选Nodejs，Java是因为配置太麻烦，喜欢快速开发项目！</p>
			  </div>
			</div>
			<div class="panel panel-default">
			  <div class="panel-heading">博客介绍</div>
			  <div class="panel-body">
				本博客主要采用原生PHP开发，不足之处请多谅解！<br/>
				1：管理员功能<br/>
				2：文章管理<br/>
				3：系统配置<br/>
			  </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>


