<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 11:42 AM
 */
if (isset($_POST['username'])){
    include_once "sqlhelper.php";
    $username = addslashes($_POST['username']);
    $password = addslashes($_POST['password']);
    $mysql = new sqlhelper();
    $sql = "SELECT password,avatar FROM user where username = '$username'";
    $res = $mysql->execute_dql($sql);
    $row = $res->fetch_row();
    if ($row[0]==$password){
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['avatar'] = $row[1];
        header("Location: index.php");
    }else{
        echo "<script>alert('登陆失败');</script>";

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
