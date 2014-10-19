<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户列表</title>
</head>
<?php
include ("link.php");
?>
</head>
<body>
<table id="tb" border="1" width="500" align="center">
<tr><td>学号</td><td>用户名</td><td>邮箱</td><td>注册时间</td></tr>
<?php
    session_start();
    if ($_SESSION['user']!='郭子成')
    {
        echo "<script language=\"javascript\">alert('非法访问！请登录！');</script>";
        echo "<script language=\"javascript\">location.href='index.php';</script>";
    }
    else
    {
    $page = 1;
    $pagesize = 10;    //每页显示到数量
    //计算一共有多少记录，用于计算页数
    $rs = mysql_query("select count(*) from user");
    $row = @ mysql_fetch_array($rs);
    $numrows = $row[0];
    //计算页数
    $pages = intval($numrows / $pagesize);
    if ($numrows % $pagesize)
    {
        $pages++;
    }
    //设置页数
    if (isset($_GET['page']))
    {
        $page = intval($_GET['page']);
    }
    else
    {
        $page = 1;        //其他情况，都指向第一页
    }
    //计算记录的偏移量
    $offset = $pagesize * ($page - 1);

    //读取指定记录
    $rs = mysql_query("select * from user order by id limit $offset,$pagesize");

    //把数据用表格显示出来
    if ($row = @mysql_fetch_array($rs))
    {
        $i = 0;
        do{
            $i++;
        ?>
		<tr>
        <td><?php echo $row['sid']; ?></td><td><?php echo $row['username']; ?></td>
        <td><?php echo $row['Email']; ?></td><td><?php echo $row['regtime']; ?></td>
        </tr>
        <?php
            }
            //循环显示数据
            while ($row = mysql_fetch_array($rs));
            echo "</table>";
        ?>
        <a href="javascript: document.deleteform.submit();">删除</a>
<?php
    }
    echo "<div align='center'> 共".$pages."页(".$page."/".$pages.")";
    for ($i = 1;$i < $page;$i++)
    {
        echo "<a href='userlist.php?page=".$i."'>[".$i."]</a>";
    }
    echo "[".$page."]";
    for ($i = $page + 1;$i <= $pages;$i++)
    {
        echo "<a href='userlist.php?page=".$i."'>[".$i."]</a>";
    }
    echo "</div>";
    }
?>
</table>
<span><a href="logout.php">退出</a></span>
</body>
</html>
