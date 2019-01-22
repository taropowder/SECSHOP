<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 11:38 AM
 */
session_start();
?>

<html>
<head>

</head>
<body>
<ul>
    <?php
    if (isset($_SESSION['username'])) {
        $avatar = $_SESSION['avatar'];
        echo "<img src='upload/$avatar' width='200px'/>";
        echo ">退出</a></li>
    \"";
    } else {
        echo ">注册</a></li>\"";
    }
    ?>


</ul>
<h1>欢迎来到secshop</h1>
<a href="deploy.php">从这里上传你的zip</a>
</body>
</html>
