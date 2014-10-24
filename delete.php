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
		$id=$_POST['chk'];
		foreach($id as $ide)
		{
			$exec="DELETE FROM user WHERE id='$ide'";
			$result=mysql_query($exec);
			if((mysql_affected_rows()==0) or (mysql_affected_rows==-1))
			{
    			echo "<script>alert('删除出错或已删除！');</script>";
    			echo "<script>location.href='userlist.php';</script>";
    		}
			else
			{
    			echo "<script>alert('学生信息已经删除！');</script>";
    			echo "<script>location.href='userlist.php';</script>";
    		}
    	}
	}
?>
</body>
</html>