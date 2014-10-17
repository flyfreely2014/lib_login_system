<?php
$link = @ mysql_connect("localhost", "root", "") or die("数据库链接错误");
mysql_select_db("lib", $link);
mysql_query("set names 'utf8'");
?>
