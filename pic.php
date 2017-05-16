<?php
/**
 * Created by PhpStorm.
 * User: Sherlock
 * Date: 2017/4/26
 * Time: 20:59
 */



for($i=0;$i<count($_FILES["file"]["name"]);$i++){
//    echo count($_FILES["file"]["name"]);
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
            }
        }
    }
    else
    {
        echo "Invalid file";
    }

}


?>