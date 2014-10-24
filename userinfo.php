<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户信息</title>
<style type="text/css">
*
{
    margin: 0;
    padding: 0;
}
table
{
    margin: 100px auto;
}
tr
{
    height: 30px;
}
td
{
    text-align: center;
}
</style>
</head>
<?php
include ("link.php");
session_start();
$user = $_SESSION['user'];
if (empty($user))
{
    echo "<script language=\"javascript\">alert('非法访问！请登录！');location.href='index.php';</script>";
}
else
{
$sql= "SELECT * FROM user WHERE username='$user'";
$query=mysql_query($sql);
$info=@mysql_fetch_array($query);
?>
<body>
<table id="tb" border="1" width="400">
<th colspan="4">您好，欢迎进入XX大学图书馆系统</th>
<tr><td>姓名</td><td><?php echo $info['username']; ?></td><td>学号</td><td><?php echo $info['sid']; ?></td></tr>
<tr><td>邮箱</td><td><?php echo $info['Email']; ?></td><td>密码</td><td><a href="change.php">修改密码</a></td></tr>
<tr><td colspan="4"><span><a href="logout.php">退出</a></span></td></tr>
</table>
</body>
<?php
}
?>
</html>