<?php
/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 2017/4/25
 * Time: 23:36
 */

$db_host = 'localhost';
$db_name = 'hand_shop';
$db_user = 'root';
$db_pwd = '1234';

//面向对象方式
$mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
//面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
if(mysqli_connect_error()){
    echo mysqli_connect_error();
}
$user_name = $_POST["user"];
$user_email = $_POST["email"];
$user_password = $_POST["pwd1"];

$query = "insert into user VALUES (NULL ,'$user_name','$user_email','$user_password')";
//echo $query;
$result = $mysqli->query($query);
if($result === false){//执行失败
    echo $mysqli->error;
    echo $mysqli->errno;
}
else{
    echo "注册成功！";
}
$mysqli->close();

?>