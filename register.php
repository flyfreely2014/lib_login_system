<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册</title>
<style type="text/css">
*
{
	margin: 0;
	padding: 0;
}
.input
{
	width:200px;
}
.button
{
	margin-left: 25px;
}
form
{
	margin: 200px auto;
	height: 125px;
	width: 290px;
}
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
					$mysql= "insert into user (id,sid,username,password,Email,regtime) values('','$_POST[sid]','$_POST[username]','$_POST[password]','$_POST[Email]',now())";
					mysql_query($mysql);
					echo "<script language=\"javascript\"> alert('注册成功'); </script>";
					echo"<script language=\"javascript\">location.href='index.php';</script>";break;
				}
			}
			else
			{
				echo "<script language=\"javascript\"> alert('该用户已存在！'); return false; </script>";
			}
		}
	}
	else
	{
		echo "<script language=\"javascript\"> alert('两次密码不一致，请重新输入！'); return false; </script>";
	}
}
?>
<form action="" method="post" name="register" onsubmit="return check();">
	<span>学&nbsp;&nbsp;&nbsp;&nbsp;号：</span><input class="input" type="text" maxlength="14" name="sid" id="sid" onKeyDown="fncKeyStop(event)" onpaste="return false" oncontextmenu="return false;" /><br />
	<span>用&nbsp;户&nbsp;名：</span><input class="input" type="text" maxlength="18" name="username" id="username" onKeyDown="fncKeyStop(event)" onpaste="return false" oncontextmenu="return false;"/><br />
	<span>密&nbsp;&nbsp;&nbsp;&nbsp;码：</span><input class="input" type="password" maxlength="18" name="password" id="password" onKeyDown="fncKeyStop(event)" onpaste="return false" oncontextmenu="return false;" /><br />
	<span>确认密码：</span><input type="password" class="input" maxlength="18" name="password2" id="password2" onKeyDown="fncKeyStop(event)" onpaste="return false" oncontextmenu="return false;" /><br />
	<span>E&nbsp;-&nbsp;mail：</span><input type="text" class="input" maxlength="30" name="Email" id="Email" onKeyDown="fncKeyStop(event)" onpaste="return false" oncontextmenu="return false;" /><br />
	<input type="submit" class="button" name="submit" value="提交" /><input type="reset" class="button" value="重置" /><a href="index.php">已有账号，去登陆</a>
</form>
<script language="javascript">
function login()
{
	location.href='index.php';
}
function check()
{
	/*if (^\d{14}$.test(register.sid.value)==false)
	{
		alert('请输入14位纯数字学号，忘记请咨询管理员！');
		return false;
	}
	if (/^[\u4e00-\u9fa5]+$/i.test(register.username.value)==false)
	{
		alert('用户名为学生姓名，必须为汉字');
		return false;
	}
	if (^[a-zA-Z]\w{0,15}.test(register.password.value)==false)
	{
		alert('密码必须由字母或数字或下划线构成');
		return false;
	}*/
	if ((register.sid.value=="")||(register.username.value=="")||(register.password.value=="")||(register.password2.value=="")||(register.Email.value==""))
	{
		alert('输入不能为空！');
		return false;
	}
}
</script>
</body>
</html>