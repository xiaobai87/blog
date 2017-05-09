<?php
session_start();
header("Content-Type:text/html; charset=UTF-8");
include('../core/core.php');
if($input->get('do')=='chk'){
    $auser=$input->post('auser');
    $apass=$input->post('apass');
    $sql="SELECT * FROM `admin` WHERE auser='{$auser}' and apass='{$apass}'";
    $mysqli_result=$db->query($sql);
    $row=$mysqli_result->fetch_assoc();
    if(is_array($row)){
        echo "登录成功";
        $_SESSION['aid']=$row['aid'];
        header("Location:./home.php");
    }else{
        die('账号或密码错误');
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="../dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">管理员登录</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="post" action="login.php?do=chk">
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">用户名</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="auser" id="auser" placeholder="请输入用户名">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
                                <div class="col-sm-10">
                                <input type="password" class="form-control" name="apass" id="apass" placeholder="请输入密码">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary">登录</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer">2017版权所有</div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>