<?php
session_start();
ob_start();
$pass=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اسئلة الامتحان</title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body  dir="rtl">
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div><hr>
  <div id="y_qu"><div id="y2_qu">&nbsp;&nbsp;اضافة سؤال&nbsp;&nbsp;</div>
&nbsp;|<a href="addtest.php"><div id="y2_qu">&nbsp;&nbsp;رجوع &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_qu">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id='post_qu'>

      </div>
</body>
</html>