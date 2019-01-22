<?php
/**
 * Created by PhpStorm.
 * User: yang.yu01
 * Date: 2018/11/19
 * Time: 11:48 AM
 */
include_once "sqlhelper.php";
$mysql = new sqlhelper();
$sql = "SELECT id,name,num FROM goods";
$res = $mysql->execute_dql($sql);
?>
<table>
    <thead>
    <tr>
        <td>
            ID
        </td>
        <td>
            名称
        </td>
        <td>
            数量
        </td>
        <td>
            购买
        </td>
    </tr>
    </thead>
    <?php
    while ($row = $res->fetch_row()){
        echo "<tr>";
        echo "<td>$row[0]</td>";
        echo "<td>$row[1]</td>";
        echo "<td>$row[2]</td>";
        echo "<td> <a href='buy.php?id=$row[0]'>购买</a> </td>";
        echo "</tr>";
    }
    ?>
</table>
