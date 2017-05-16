<?php
session_start();
include("../core/core.php");
$session_mid=$input->session('mid');
if(!$session_mid){
    header("location:login.php");
}
$sql="SELECT * FROM `member` WHERE mid='{$session_mid}'";
$row=$db->query($sql)->fetch_assoc();
?>
</body>
</html>