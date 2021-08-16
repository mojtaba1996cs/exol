<?php
$localhost="ec2-23-21-4-7.compute-1.amazonaws.com";
$db_user="tgdlxganzwyejj";
$db_password="f1c2b5167de7084240b8387d3ed47d95ef4f955b0e6658cf74a86da7c7fdbb37";
$db_name="d9ako1f2v1fv9p";
$connect= mysqli_connect($localhost,$db_user,$db_password,$db_name) or die(" لم يتم الاتصال بالسيفر") ;
mysqli_query($connect,"SET NAMES UTF8");

?>
