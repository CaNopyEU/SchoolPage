<?php 
$connect_error = 'Sorry neda sa pripojit';
$conn = mysql_connect("localhost", "root", "") or die($connect_error);
mysql_select_db("bcdb") or die ($connect_error);
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
mysql_query("SET character_set_results=utf8");
?>