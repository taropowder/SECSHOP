<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 11:46 AM
 */
session_start();
if (isset($_FILES['avatar'])){
        if ($_FILES['avatar']["error"] > 0) {
            echo "ERROR ";
            exit();
        } else {
            if (file_exists("avatar/" . $_FILES["avatar"]["name"])) {
                echo "<script>alert('{$_FILES['avatar']['name']},已经存在了');window.location.href='avatart.php';</script>";
                exit();
            } else {
                move_uploaded_file($_FILES["avatar"]["tmp_name"],
                    "upload/" . $_FILES["avatar"]["name"]);
            }
        }
    $avatar = $_FILES['avatar']["name"];
    $username = $_SESSION['username'];
    include_once 'sqlhelper.php';
    $mysqli = new sqlhelper();
    $sql = "UPDATE user SET avatar = '$avatar' where username = '$username'";
    $res = $mysqli->execute_dml($sql);
    if ($res){
        $_SESSION['avatar'] = $avatar;
        echo "<script>alert('增加成功');window.location.href='index.php';</script>";
    }
    }


?>

<form method="post" enctype="multipart/form-data">
<input type="file" name="avatar">
    <input type="submit">
</form>