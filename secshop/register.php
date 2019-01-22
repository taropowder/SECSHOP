<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 11:44 AM
 */
if (isset($_POST['username'])){
    include_once "sqlhelper.php";
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $mysql = new sqlhelper();
    $sql = "INSERT INTO user (username, password) VALUES ('$username','$password')";
    $res = $mysql->execute_dml($sql);
    if ($res){
        echo "<script>alert('注册成功');window.location='login.php';</script>";
    }else{
        echo "<script>alert('注册失败');</script>";

    }
}
?>
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
</table>
    <input type="submit" value="注册">
</form>
