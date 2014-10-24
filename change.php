<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改密码</title>
<style>
*
{
	margin: 0;
	padding: 0;
}
#change
{
	margin: 200px auto;
	height: 100px;
	width: 250px;
}
.button,a
{
	float: left;
	margin-left: 10px;
	margin-top: 15px;
}
</style>
<?php
include('link.php');
session_start();
$user=$_SESSION['user'];
$submit=$_POST['submit'];
$old=$_POST['old'];
$new1=$_POST['new_one'];
$new2=$_POST['new_two'];
$sql="SELECT * FROM `user` WHERE username='$_SESSION[user]'";
$query=mysql_query($sql);
if (empty($user))
{
	echo "<script language=\"javascript\">alert('非法操作，请登录！');location.href='index.php';</script>";
}
else
{
	if (@isset($_POST['submit']))
	{
		while ($row=mysql_fetch_array($query))
		{
			if ($old==$row['password'])
			{
					$sql2="UPDATE ignore user SET password='$new1' WHERE username='$user'";
					mysql_query($sql2);
					echo "<script language=\"javascript\">alert('修改成功！');location.href='userinfo.php';</script>";
			}
			else
			{
				echo "<script language=\"javascript\">alert('请输入正确的原密码');</script>";
			}
		}
	}
}
?>
</head>
<body>
<form method="post" action="" name="change" id="change" onsubmit="return check();">
<span>原&nbsp;&nbsp;密&nbsp;&nbsp;码：</span><input type="password" name="old" /><br />
<span>新&nbsp;&nbsp;密&nbsp;&nbsp;码：</span><input type="password" name="new_one" /><br />
<span>确认新密码：</span><input type="password" name="new_two" /><br />
<input type="submit" class="button" name="submit" value="确认修改" /><input type="reset" class="button" name="reset" value="重置" /><a href="userinfo.php">放弃修改，返回</a>
</form>
<script language="javascript">
function check()
{
	if (change.old.value=="")
	{
		alert('请输入原密码！');
		return false;
	}
	if ((change.new_one.value!=change.new_two.value)||(change.new_one.value=="")||(change.new_two.value==""))
	{
		alert('请输入两次新密码');
		return false;
	}
}
</script>
</body>
</html>