<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/12/1
 * Time: 10:53 PM
 */
session_start();
if (isset($_FILES['deploy'])) {
    if ($_FILES['deploy']["error"] > 0) {
        echo "ERROR ";
        exit();
    } else {
        $test = "zip";
        $endwith = substr($_FILES["deploy"]["name"], -strlen($test));
        if ($endwith == $test) {
            $time = time();
            $url='http://'.$_SERVER['SERVER_NAME'];
            system("mkdir $time");
            move_uploaded_file($_FILES["deploy"]["tmp_name"],
                "$time/" . $time . ".zip");
            system("unzip $time/$time.zip -d $time/");
            echo "YOUR URL IS <h1><a href='$time/' target='_blank'>$url/$time</a></h1>";
        } else {
            echo "只允许上传zip文件，请上传zip,你上传的是$endwith";
            exit();
        }


        move_uploaded_file($_FILES["deploy"]["tmp_name"],
            "upload/" . $_FILES["deploy"]["name"]);
    }

}
?>
DIR
<br>
|-- xx.zip<br>
|&nbsp;&nbsp;|-- index.php<br>
|&nbsp;&nbsp;|-- upload<br>
|&nbsp;&nbsp;&nbsp;&nbsp;|-- default.jpg<br>
|&nbsp;&nbsp;|-- buy.php<br>
|&nbsp;&nbsp;|-- change.php<br>
|&nbsp;&nbsp;|-- list.php<br>
|&nbsp;&nbsp;|-- login.php<br>
|&nbsp;&nbsp;|-- logout.php<br>
|&nbsp;&nbsp;|-- register.php<br>
|&nbsp;&nbsp;`-- avatar.php<br>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="deploy">
    <input type="submit">
</form>