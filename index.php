<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>欢迎登录--图书馆登录系统</title>
<style type="text/css">
*
{
	margin: 0;
	padding: 0;
}
#login
{
	margin: 200px auto;
	height: 80px;
	width: 215px;
}
.button
{
	float: left;
	margin-left: 25px;
	margin-top: 15px;
}
</style>
</head>
<body>
<?php
	include('link.php');
	session_start();
	$user = $_POST['username'];
	$password = $_POST['password'];
	$sql = "select * from user ";
	$query = mysql_query($sql);
	$num = mysql_num_rows($query);
	$flag=0;
	if (@$_POST['submit'])
	{
			while (@$row=mysql_fetch_array($query))
			{
				if(($row['username']==$user)&&($row['password']==$password))
				{
					$_SESSION['user']=$user;
					echo"<script language=\"javascript\"> alert('欢迎登录，$_SESSION[user]'); </script>";
					if($user=='郭子成')
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
?>
<form action="" method="post" name="login" id="login" onsubmit="return check();">
	<span>用户名：</span><input type="text" id="username" name="username" maxlength="16" /><br />
	<span>密&nbsp;&nbsp;码：</span><input type="password" id="password" name="password" maxlength="16" /><br />
	<input type="submit" class="button" value="登录" name="submit" /><input type="reset" class="button" name="reset" value="重置" /><input type="button" class="button" name="register" value="注册" onclick="return jump();" />
</form>
<script language="javascript">
function jump()
{
	location.href='register.php';
}
function check()
{
	if (login.username.value=="")
	{
		alert('请输入用户名');
		return false;
	}
	if (login.password.value=="")
	{
		alert('请输入密码');
		return false;
	}
}
</script>
</body>
</html>