<?php
define('PATH',dirname(__FILE__));
include(PATH.'/classInput.php');
include(PATH.'/db.php');
$input=new input();
$db=new db();


//系统配置
	$sql="SELECT * FROM `setting`";
	$res=$db->query($sql);
	$rows=array();
	while($row=$res->fetch_assoc()){
		$rows[$row['key']]=$row['value'];
	}
?>