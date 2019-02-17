<form method="post">

<table>

<tr>
	<td>
	 原密码
	</td>

	<td> 
	 <input type="text" name="old" />
	</td>
</tr>

<tr>
	<td>
	 新密码
	</td>
	<td>
  	 <input type="password" name="new"/>
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

if((isset($_POST['old']))||(isset($_POST['new']))) {
    $old = $_POST['old'] ;
    $new = $_POST['new'] ;
    /** @var TYPE_NAME $conn */
    $conn = mysqli_connect("mysql", "root", "root", 'secshop');
    var_dump($conn);
    if    (!$conn)
    {
        die('数据库连接失败' . mysqli_connect_error());
    }

    /** @var TYPE_NAME $sql */
    $sql = "update  user set password='{$new}' where password='{$old}'";
    $ret = mysqli_query($conn, $sql);
    if ($new != '' && $old != '') {
        if ($ret) {
            echo "更改成功";
            header("Location:secshop/login.php");
        } else {
            die ("存入数据库失败" . mysqli_error());//如果上述用户名密码判定不错，则update进数据库中
            mysqli_close($conn);
        }
    }
}
?>



