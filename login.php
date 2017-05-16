<?php
/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 2017/4/26
 * Time: 15:33
 */
$db_host = 'localhost';
$db_name = 'hand_shop';
$db_user = 'root';
$db_pwd = '1234';

//面向对象方式
$mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
if(mysqli_connect_error()){
    echo mysqli_connect_error();
}
$user_name = $_POST["user"];
$user_password = $_POST["password"];

$query = "select user_password from user WHERE user_name = '$user_name'";
//echo $query;
$result = $mysqli->query($query);
$ans = $result->fetch_array();

if($user_password == $ans[0]){         //验证密码正确性
    die(json_encode(array('success'=>1)));
} else{
    die(json_encode(array('success'=>0)));
}

?>