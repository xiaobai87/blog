<?php
header("Content-Type:text/html; charset=UTF-8");
class Input{
    function post($key){
        if(isset($_POST[$key])){
            $val=$_POST[$key];
			return $val;
        }
    }
    function get($key){
        if(isset($_GET[$key])){
            $val=$_GET[$key];
            return $val;
        }
    }
    function session($key){
        if(isset($_SESSION[$key])){
            $val=$_SESSION[$key];
            return $val;
        }
    }
}
?>