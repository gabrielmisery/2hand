<?php
/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 2017/4/26
 * Time: 20:01
 */

?>

<!DOCTYPE html>
<html>
<head>
    <title>Freight Shipping Form Flat Responsive Widget Template :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Freight Shipping Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Meta tag Keywords -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery-2.2.3.min.js"></script>
</head>
<body>
<!-- banner -->
<div class="video">
    <div class="center-container">
        <div class="w3ls-agileinfo">

            <h1> 商品信息填写 </h1>
        </div>
        <div class="bg-agile">
            <h3>文字信息</h3>
            <div class="login-form">
                <form action="uploadPro.php" method="post" enctype="multipart/form-data"">
                    <input type="text"  name="name" id="name" placeholder="商品名称" required="" />
                    <div class="left-w3-agile">
                        <select class="form-control" id="type" name="type" required="">
                            <option>选择商品种类</option>
                            <option>Argentina</option>
                            <option>Georgia</option>
                            <option> Dominica</option>
                            <option>Lithuania</option>
                            <option> Monaco</option>
                        </select>
                    </div>
                    <input type="text"  name="price" id="price" placeholder="商品价格（元）" required=""  onkeyup="value=value.replace(/[^\d]/g,'') "/>
                    <input type="text"  name="place" id="place" placeholder="交易地点" required="" />
                    <input type="text"  name="info"  id="info" placeholder="商品描述" required="" />
                    <input type="text"  name="mobile" id="mobile" placeholder="手机号码"  required="" onkeyup="value=value.replace(/[^\d]/g,'') "/>
                    <h3>图片信息</h3>
                    <div style="color: #fff">
                        <input type="file" name="file[]" id="doc" multiple="multiple" style="width:150px;" onchange="javascript:setImagePreviews();" accept="image/*">(请一次性选择所有要上传的图片)
                        <div id="dd" style="margin-top:10px;"></div>
                    </div>
                    <input type="submit" value="确认上架">
                </form>
            </div>
        </div>
    </div>
</div>
<script src="js/jquery.vide.min.js"></script>
<script type="text/javascript" src="pace-1.0.0.js"></script>
<script type="text/javascript">

    function setImagePreviews(avalue) {

        var docObj = document.getElementById("doc");

        var dd = document.getElementById("dd");

        dd.innerHTML = "";

        var fileList = docObj.files;

        for (var i = 0; i < fileList.length; i++) {

            dd.innerHTML += "<div style='float:left' > <img id='img" + i + "'  /> </div>";

            var imgObjPreview = document.getElementById("img"+i);

            if (docObj.files && docObj.files[i]) {

                //火狐下，直接设img属性

                imgObjPreview.style.display = 'block';

                imgObjPreview.style.width = '180px';

                imgObjPreview.style.height = '180px';

                //imgObjPreview.src = docObj.files[0].getAsDataURL();

                //火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式

                imgObjPreview.src = window.URL.createObjectURL(docObj.files[i]);

            }

            else {

                //IE下，使用滤镜

                docObj.select();

                var imgSrc = document.selection.createRange().text;

                alert(imgSrc)

                var localImagId = document.getElementById("img" + i);

                //必须设置初始大小

                localImagId.style.width = "150px";

                localImagId.style.height = "180px";

                //图片异常的捕捉，防止用户修改后缀来伪造图片

                try {

                    localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";

                    localImagId.filters.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;

                }

                catch (e) {

                    alert("您上传的图片格式不正确，请重新选择!");

                    return false;

                }

                imgObjPreview.style.display = 'none';

                document.selection.empty();

            }

        }

        return true;

    }

</script>

</body>
</html>
