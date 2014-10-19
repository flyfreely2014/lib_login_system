<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除</title>
</head>
<body>
<?php
	include('link.php');
	session_start();
	if ($_SESSION['user']!='郭子成')
	{
		echo "<script language=\"javascript\">";
		echo "alert('非管理员禁止操作！');";
		echo "location.href='index.php';";
		echo "</javascript>";
	}
	else
	{
		$id=$_POST['chk[]'];
		$sql= "DELETE FROM user WHERE id=$id;";
		mysql_query($sql);
		echo "<script language=\"javascript\">alert('删除成功！'); location.href('userlist.php');</script>";
	}
?>
</body>
</html>