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

<input type="submit" value="登录">
    <a href="register.php">注册</a>
</td>
</tr>

</table>

</form>

<?php
ob_start();
session_start();
if(isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $conn = mysqli_connect("mysql", "root", "root", 'secshop');
    if (!$conn) {
        die('数据库连接失败:' . mysql_error());
    }
//准备SQL语句
    $sql_select = "SELECT username,password FROM user WHERE   username ='$_POST[username]'and password = '$_POST[password]'";
    var_dump($sql_select);
//执行SQL语句
    $ret = mysqli_query($conn, $sql_select);

    $row = mysqli_fetch_array($ret);
    var_dump($row);
//判断用户名或密码是否正确
    if ($password != '' && $username != '') {
        if($username==$row['username']&&$password==$row['password']) {

            $_SESSION['username']=$row['username'];
            header("Location:secshop/index.php");
            mysqli_close($conn);
        }
    }

}

?>