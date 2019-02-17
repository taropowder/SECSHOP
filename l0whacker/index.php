<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

</head>

<body>
    <?php
	session_start();

	if (!isset ($_SESSION['username']))
	{
		echo'
		<h1>SecShop</h1><br>
		<ul>
			<li><a href="login.php">登陆</a><br></li>
			<li><a href="register.php">注册</a></li>
		</ul>
		</body>
		</html>';
		exit();
	}
	else {
        $con = @new mysqli('mysql', 'root', 'root', 'secshop');
        if ($con->connect_error) exit("数据库连接失败");
        $sql = "SELECT id FROM user WHERE username='{$_SESSION['username']}'";
        $result = $con->query($sql);

        if (($result == False) || (!($row = $result->fetch_assoc()))) exit('数据库发生错误');
        echo '
    <h1>欢迎来到secshop</h1>
    <ul>
        <img src="default.jpg"width = "600" height = "320"/>
        <li><a href="avatar.php">上传头像</a></li>
        <li><a href="change.php">修改密码</a></li>
        <li><a href="list.php">安全利器商店</a></li>
        <li><a href="logout.php">退出</a></li>
    </ul>';
       } ?>
