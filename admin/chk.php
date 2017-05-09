<?php
session_start();
include("../core/core.php");
$session_aid=$input->session('aid');
if(!$session_aid){
    header("location:login.php");
}
$sql="SELECT * FROM `admin` WHERE aid='{$session_aid}'";
$row=$db->query($sql)->fetch_assoc();
?>
</body>
</html>