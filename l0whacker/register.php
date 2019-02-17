<form method="post">

<table>

<tr>
	<td>
	 用户名
	</td>

	<td> 
	 <input type="text" name="username" />
	</td>
</tr>

<tr>
	<td>
	 密码
	</td>
	<td>
  	 <input type="password" name="password"/>
	</td>
</tr>
<tr>
<td>

<input type="submit" value="注册">
</td>
</tr>

</table>

</form>

<?php
if(isset($_POST['username'])) {
    ob_start();
    session_start();
    if ((!isset($_POST['username'])) || (!isset($_POST['password']))) {
        header("Location:login.php");
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $con = mysqli_connect("mysql", "root", "root");

    if (!$con) {
        die('数据库连接失败:' . mysql_error());
    }

    mysqli_select_db($con, "secshop");


    $sql = "insert into user (username,password) VALUES ('{$username}','{$password}')";

    $a = mysqli_query($con, $sql);
    header("Location:login.php");
}


?>