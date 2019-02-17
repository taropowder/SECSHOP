<form method="post" enctype="multipart/form-data">
<input type="file" name="avatar">
<input type="submit">
</form>
<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location:secshop/index.php");
    exit();
}

$conn = mysqli_connect('mysql','root','root','secshop');
if(!$conn)
{
    die('数据库连接失败:'.mysqli_error());
}

$path = '/secshop'. $_FILES['avatar']['name'];
$FileName="{$_SESSION['username']}.jpg";
$FileUrl="{$_SESSION['username']}.jpg";
$query1="update  user set avatar = '$FileName' WHERE username = '{$_SESSION['username']}'";

$result1=$conn->query($query1);
copy($_FILES["avatar"]["tmp_name"],"upload/{$_FILES["avatar"]["name"]}");





?>
