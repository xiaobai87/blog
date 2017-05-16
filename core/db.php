<?php
/*
插入数据
INSERT INTO `msg` (`username`, `cont`, `time`) VALUES ('1', '2', '3');
更新数据
UPDATE `msg` set username='wwwww' WHERE id=2
删除数据
DELETE FROM `msg` WHERE id=13
查询数据
SELECT * FROM `msg` WHERE id>10 ORDER BY id DESC
*/
header("Content-Type:text/html; charset=UTF-8");
date_default_timezone_set('Asia/Shanghai');
// 设置编码，防止中文乱码

class db{
    function __construct(){
        $this->mysqli = new mysqli('localhost', 'root', '','blog');
        if ($this->mysqli->connect_error) {
            echo "连接失败: " . $this->db->connect_error;
            exit;
        }
		$this->query("SET NAMES UTF8");
    }
    function query($key){
        return $this->mysqli->query($key);
        
    }
}
?>
