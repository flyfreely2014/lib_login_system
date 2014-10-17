<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录--图书馆登录系统</title>
</head>
<body>
<?php
	include('link.php');
	session_start();
	$user = @$_POST['username'];
	$password = @$_POST['password'];
	$sql = "select * from user ";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	$flag=0;
	if (@$_POST['submit'])
	{
		if(empty($_POST['username'])||empty($_POST['password']))
		{
			echo "<script language=\"javascript\"> alert('信息不能为空！'); </script>";
		}
		else
		{
			while (@$row=mysql_fetch_array($query))
			{
				if(($row['username']==$user)&&($row['password']==$password))
				{
					$_SESSION['user']=$user;
					echo"<script language=\"javascript\"> alert('欢迎登录，$_SESSION[user]'); </script>";
					if($user=='admin')
					{
						echo"<script language=\"javascript\">location.href='userlist.php';</script>";
					}
					else
					{
						echo"<script language=\"javascript\">location.href='userinfo.php';</script>";
					}
				}
				else
				{
					if($row['username']!=$user)
					{
						$flag++;
						if($flag==$num)
						{
						echo "<script language=\"javascript\"> alert('用户名错误！'); </script>";
						}
					}
			   		elseif(($row['username']==$user)&&($row['password']!=$password))
			   		{
					echo "<script language=\"javascript\"> alert('密码错误'); </script>";
					break;
					}
				}
			}
  		}
  	}
?>
<form action="" method="post" name="login">
	<span>用户名：</span><input type="text" name="username" maxlength="16" /><br />
	<span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input type="password" name="password" maxlength="16" /><br />
	<input type="submit" value="登录" name="submit" /><input type="reset" name="reset" value="重置" />
	<input type="button" name="register" value="注册" onclick="return jump();" />
</form>
<script language="javascript">
function jump()
{
	location.href='register.php';
}
</script>
</body>
</html>