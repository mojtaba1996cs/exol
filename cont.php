<?php
$localhost="localhost";
$db_user="root";
$db_password="";
$db_name="exol";
$connect= mysqli_connect($localhost,$db_user,$db_password,$db_name) or die(" لم يتم الاتصال بالسيفر") ;
mysqli_query($connect,"SET NAMES UTF8");

?>