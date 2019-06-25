<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 12:27 PM
 */
if (isset($_GET['id'])){
    include_once "sqlhelper.php";
    $mysql = new sqlhelper();
    $id = addslashes($_GET['id']);
    $sql = "UPDATE goods SET num = num - 1 WHERE id = $id";
    $res = $mysql->execute_dml($sql);
    if ($res){
        header("Location: list.php");
    }
}