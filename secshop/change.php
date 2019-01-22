<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 11:50 AM
 */
session_start();
if (isset($_POST['old'])){
    $old = addslashes($_POST['old']);
    $new = addslashes($_POST['new']);
    include_once "sqlhelper.php";
    if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $mysql = new sqlhelper();
        $sql = "SELECT password,avatar FROM user where username = '$username'";
        $res = $mysql->execute_dql($sql);
        $row = $res->fetch_row();
        if ($old == $row[0]){
            $sql = "UPDATE user SET password = '$new' WHERE username = '$username' ";
            $res = $mysql->execute_dml($sql);
            if ($res){
                echo "<script>alert('修改成功');window.location='index.php';</script>";
            }
        }
    }
}
?>

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
    </table>
    <input type="submit" value="注册">
</form>
