<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:secshop/index.php");
    exit();
}

$id=(int)$_GET['id'];
if ($id<=0)
{
    header("Location:secshop/list.php");
    exit();
}

$con = @new mysqli('mysql','root','root','secshop');
if ($con->connect_error)exit("数据库连接失败");
$result=$con->query("SELECT num FROM goods WHERE id={$id}");
if($result==False)exit('数据库发生错误');
if(!($row=$result->fetch_assoc()))
{
    header("Location:secshop/list.php");
    exit();
}
$number=$row['num']-1;
if($number<0)exit('商品已售空');

if(!(($con->query("UPDATE goods SET num={$number} WHERE id={$id};"))==TRUE))exit('数据库发生错误');
header("Location:secshop/list.php");

?>
</body>
</html>