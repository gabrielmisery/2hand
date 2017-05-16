<?php
/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 2017/4/26
 * Time: 0:19
 */

$num = $_POST['num'];
if($num == 1){
    checkName();
}else{
    checkEmail();
}

function checkName(){
    $db_host = 'localhost';
    $db_name = 'hand_shop';
    $db_user = 'root';
    $db_pwd = '1234';

    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
//面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if(mysqli_connect_error()) {
        echo mysqli_connect_error();
    }
    $name = $_POST['name'];
    $sql = "select * from user where user_name = '$name'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();
    if(empty($row))//开始判断是够为空
    {
        die(json_encode(array('success'=>1)));
    }
    else
    {
        die(json_encode(array('success'=>0)));
    }
}

function checkEmail(){
    $db_host = 'localhost';
    $db_name = 'hand_shop';
    $db_user = 'root';
    $db_pwd = '1234';

    $mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
//面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
    if(mysqli_connect_error()) {
        echo mysqli_connect_error();
    }
    $name = $_POST['name'];
    $sql = "select * from user where user_email = '$name'";
    $result = $mysqli->query($sql);
    $row = $result->fetch_array();
    if(empty($row))//开始判断是够为空
    {
        die(json_encode(array('success'=>1)));
    }
    else
    {
        die(json_encode(array('success'=>0)));
    }
}

?>