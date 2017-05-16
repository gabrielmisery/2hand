<?php
/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 2017/4/25
 * Time: 19:35
 */
?>

<!DOCTYPE html>
<html>
<head>
    <title>北交二手之登陆注册</title>
    <meta charset="utf-8">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/check.js"></script>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<div class="detail">
    <ul id="myTab" class="nav nav-tabs">
        <li class="active">
            <a href="#load" data-toggle="tab">
                登录
            </a>
        </li>
        <li><a href="#register" data-toggle="tab">注册</a></li>
        <li><a href="#rule" data-toggle="tab">使用者协议</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade in active" id="load">
            <div class="item">
                <form style="margin-left: 20%;margin-top: 10%">
                    <h3><span class="label label-primary">用户名</span><input type="text" name="users" id="users"></h3>
                    <h3><span class="label label-primary" style="margin-right: 25px;">密码</span><input type="password" name="pwdss" id="pwdss"><button type="button" class="btn btn-link">忘记密码？</button></h3>
                    <h3><span class="label label-primary">验证码</span><input type="text" name="codes" id="codes" style="width: 100px;margin-right: 20px;"><img src="#" style="width:80px;"></h3>
                    <button type="button" class="btn btn-danger" style="margin-left: 60px;margin-left: 200px;" onclick="loginCheck()">登录</button>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="register">
            <form style="margin-left: 20%;margin-top: 10%" name="register" action="register.php" method="post">
                <h3><div class="fix"><span class="label label-primary" style="margin-right: 30px;">用户名</span></div><input type="text" name="user" id="user" placeholder="请输入用户名" required="required"  onblur="checkuser()"><span id="result_uname" class="result_uname"></span></h3>
                <h3><div class="fix"><span class="label label-primary">输入密码</span></div><input type="password" name="pwd1" id="pwd1" placeholder="请输入密码" onblur="checkPass()"></h3>
                <h3><div class="fix"><span class="label label-primary">确认密码</span></div><input type="password" name="pwd2" id="pwd2" placeholder="请确认输入密码" onblur="checkPass()"><span class="result_pass" id="result_pass"></span></h3>
                <h3><div class="fix"><span class="label label-primary" style="margin-right: 45px;">邮箱</span></div><input type="text" name="email" id="email" placeholder="请输入有效邮箱" onblur="doEmailCheck()"><span class="result_email" id="result_email"></span></h3>
                <h3><div class="fix"><span class="label label-primary" style="margin-right: 26px;">验证码</span></div><input type="text" name="code1" id="code1" style="width: 100px;margin-right: 20px; " onblur="checkCode()"><button type="button" class="btn btn-link" onclick="sendEmail()" ">发送验证码</button>
                    <span class="result_code" id="result_code"></span></h3>
                <div class="checkbox"><label><input type="checkbox"><a>我同意本平台使用者协议</a></label></div>
                <button type="button" class="btn btn-danger" style="margin-left: 60px;margin-left: 200px;" onclick="check()">注册</button>
            </form>
        </div>
        <div class="tab-pane fade" id="rule">
            <p></p>
        </div>
    </div>
</div>

</body>
</html>
