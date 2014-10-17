<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<style type="text/css">
<!--
#username,#password,#password2{ width:200px;}
-->
</style>
</head>
<body>
<?php
include("link.php");
$sql = "SELECT * FROM user";
$query = mysql_query($sql);
$num = mysql_num_rows($query);
$flag=0;
if(@isset($_POST['submit']))
{
	if($_POST['password']==$_POST['password2'])
	{
		while (@$row=mysql_fetch_array($query))
		{
			if($row['username']!=$_POST['username'])
			{
				$flag++;
				if($flag==$num)
					{
					$mysql= "insert into user (id,username,password) values('','$_POST[username]','$_POST[password]')";
					mysql_query($mysql);
					echo "<script language=\"javascript\"> alert('注册成功'); </script>";
					echo"<script language=\"javascript\">location.href='index.php';</script>";break;
				}
			}
			else
			{
				echo "<script language=\"javascript\"> alert('该用户已存在！'); </script>";
			}
		}
	}
	else
	{
		echo "<script language=\"javascript\"> alert('两次密码不一致，请重新输入！'); </script>";
	}
}
?>
<form action="" method="post" name="register">
	<span>学&nbsp;&nbsp;&nbsp;&nbsp;号：</span><input type="text" maxlength="14" name="sid" id="sid" /><br />
	<span>用&nbsp;户&nbsp;名：</span><input type="text" maxlength="18" name="username" id="username" /><br />
	<span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input type="password" maxlength="18" name="password" id="password" /><br />
	<span>确认密码：</span><input type="password" maxlength="18" name="password2" id="password2" /><br />
	<span>E-mail：</span><input type="text" maxlength="30" name="email" id="email" /><br />
	<input type="submit" name="submit" value="提交" /><input type="reset" value="重置" /><input type="button" value="已有账号，去登陆" onclick="return login();" />
</form>
<script language="javascript">
function login()
{
	location.href='index.php';
}
</script>
</body>
</html>
