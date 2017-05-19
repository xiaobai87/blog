<?php
	var_dump($_FILES);
	
	$key='articlefile';
	$upfiles = '../upfiles/';
	if(isset($_FILES[$key])){
		$file=$_FILES[$key];
		if($file['error']==0){
			$is=move_uploaded_file($file['tmp_name'], $upfiles.$file['name']);
			if(!$is){
				die '失败';
			}
			$json
		}

	}
?>