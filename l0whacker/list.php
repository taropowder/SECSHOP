<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location:secshop/index.php");
    exit();
}
?>

<?php
$con = @new mysqli('mysql','root','root','secshop');
if ($con->connect_error)exit("数据库连接失败");
$result=$con->query("SELECT * FROM goods;");
if ($result==False)exit('数据库发生错误');
if(!($row=$result->fetch_assoc()))exit('无商品');
echo "<table>
				<thead>
    				<tr>
        				<td>ID</td>
        				<td>名称</td>
        				<td>数量</td>
						<td>购买</td>
    				</tr>
    			</thead>";
do
{
    echo "
    		<tr>
				<td>{$row['id']}</td>
    			<td>{$row['name']}</td>
    			<td>{$row['num']}</td>
    			<td>
    				<a href=\"./buy.php?id={$row['id']}\">购买</a>
    			</td>
    		</tr>
    	";
}while ($row=$result->fetch_assoc());
echo "</table>";
?>
