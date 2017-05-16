<?php
/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 2017/4/26
 * Time: 20:23
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
$pro_name = $_POST["name"];
$pro_info = $_POST["info"];
$pro_price = $_POST["price"];
$pro_dest = $_POST["place"];
$pro_phone = $_POST["mobile"];
$pro_class = $_POST["type"];
$pro_img = " ";


for($i=0;$i<count($_FILES["file"]["name"]);$i++){
    echo count($_FILES["file"]["name"]);
    if($_FILES["file"]["size"][$i] < 2000000)
    {
        if ($_FILES["file"]["error"][$i] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br />";
        }
        else
        {
            echo "Upload: " . $_FILES["file"]["name"][$i] . "<br />";
            echo "Type: " . $_FILES["file"]["type"][$i] . "<br />";
            echo "Size: " . ($_FILES["file"]["size"][$i] / 1024) . " Kb<br />";
            echo "Temp file: " . $_FILES["file"]["tmp_name"][$i] . "<br />";

            if (file_exists("productImage/" . $_FILES["file"]["name"][$i]))
            {
                echo $_FILES["file"]["name"][$i] . " already exists. ";
            }
            else
            {
                move_uploaded_file($_FILES["file"]["tmp_name"][$i],
                    "productImage/" . $_FILES["file"]["name"][$i]);
                echo "Stored in: " . "productImage/" . $_FILES["file"]["name"][$i];
                $pro_img = $pro_img."+productImage/" . $_FILES["file"]["name"][$i];
            }
        }
    }
    else
    {
        echo "Invalid file";
    }

}
echo $pro_img;

$query = "insert into product VALUES (NULL ,'1','$pro_name','$pro_info',$pro_price,'$pro_class','$pro_dest',NOW(),'$pro_img','$pro_phone',1)";
//echo $query;
$result = $mysqli->query($query);
if($result === false){//执行失败
    echo $mysqli->error;
    echo $mysqli->errno;
}
else{
    echo "上架成功！";
}
$mysqli->close();


?>