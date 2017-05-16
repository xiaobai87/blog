<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台管理</title>
    <link href="../dist/css/bootstrap.css" rel="stylesheet"/>
    <script src="../dist/js/jquery-3.2.1.min.js"></script>
    <script src="../dist/js/bootstrap.js"></script>
</head>
<?php include('chk.php'); ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">后台管理</a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="#">系统设置 </a></li>
        <li><a href="#">博客管理</a></li>
        <li><a href="muser.php">管理员管理</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row['muser'] ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">退出</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
