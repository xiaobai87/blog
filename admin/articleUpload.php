<?php
	$key='articlefile';
	$upfiles = '../upfiles/';
	if(isset($_FILES[$key])){
		$file=$_FILES[$key];
		if($file['error']==0){
			$urlname="http://127.0.0.1/blog/upfiles/".$file['name'];
			$is=move_uploaded_file($file['tmp_name'], $upfiles.$file['name']);
			if(!$is){
				die('ddd');
			}
			$json=array(
				"success"=> true,
				"msg"=> "",
				"file_path"=> $urlname
			);
			echo json_encode($json);
		}

	}
?>