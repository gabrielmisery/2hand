<?php
///**
// * Created by PhpStorm.
// * User: Sherlock
// * Date: 2016/8/7
// * Time: 11:24
// */
//$db_host = 'localhost';
//$db_name = 'hand_shop';
//$db_user = 'root';
//$db_pwd = '1234';
//
////面向对象方式
//$mysqli = new mysqli($db_host, $db_user, $db_pwd, $db_name);
////面向对象的昂视屏蔽了连接产生的错误，需要通过函数来判断
//if(mysqli_connect_error()){
//    echo mysqli_connect_error();
//}
////关闭连接
//$sql="select * from user";
//$result = $mysqli->query($sql);
//
//if($result === false){//执行失败
//    echo $mysqli->error;
//    echo $mysqli->errno;
//}
//$data = mysqli_fetch_array($result,MYSQLI_NUM);
//echo $data["1"];
//
//$result->free();
//$mysqli->close();
//
//?>

<?PHP
//引入PHPMailer的核心文件 使用require_once包含避免出现PHPMailer类重复定义的警告

require_once('class.phpmailer.php');
require 'PHPMailerAutoload.php';
require_once("class.smtp.php");

$number = $_POST['number'];

if($number==1){
    sendMail();
}elseif($number==2){
    checkCode();
}

function checkCode(){
    session_start();
    $code = $_POST['code'];
    if(isset($_SESSION['code'])){
        $numbers = $_SESSION['code'];
    }
    if($code==$numbers) {
        die(json_encode(array('success' => 1)));
    }else{
        die(json_encode(array('success'=>0)));
    }
}


function sendMail(){
    $mail  = new PHPMailer();

    $mail->CharSet    ="UTF-8";                 //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置为 UTF-8
    $mail->isSMTP();                            // 设定使用SMTP服务
    $mail->SMTPAuth   = true;                   // 启用 SMTP 验证功能
    $mail->SMTPSecure = "ssl";                  // SMTP 安全协议
    $mail->Host       = "smtp.163.com";       // SMTP 服务器
    $mail->Port       = 465;                    // SMTP服务器的端口号
    $mail->Username   = "18401606040@163.com";  // SMTP服务器用户名
    $mail->Password   = "jizhenyan123";        // SMTP服务器密码
    $mail->setFrom("18401606040@163.com",'交大二手市场');
// 设置邮件回复人地址和名称
    $mail->Subject    = '交大二手市场注册验证码';                     // 设置邮件标题
//$mail->AltBody    = "为了查看该邮件，请切换到支持 HTML 的邮件客户端";
// 可选项，向下兼容考虑
    $text = "您的验证码是：";
    $num = rand(1000,9999);
    session_start();
    $_SESSION['code']=$num;

    $mail->msgHTML($text.$num);
//$mail->AddAttachment("images/phpmailer.gif"); // 附件
    $add = $_POST["add"];
    $name = $_POST["name"];
    $mail->addAddress($add,$name);
//$mail->addAddress('1051898583@qq.com','misery');
    if(!$mail->send()) {
        die(json_encode(array('success'=>0)));
    } else {
        die(json_encode(array('success'=>1)));
    }
}

?>
