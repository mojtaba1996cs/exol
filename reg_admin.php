<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> لوحة تحكم المسجل  </title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body  dir="rtl">
  <?php

 $id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
//echo $id;
ob_end_flush();
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
  </div><hr>
<div id="y_ad"><b id="y2_ad">&nbsp;الصفحة الرئيسية&nbsp;</b>
 &nbsp;|<a href="po2.php" id="y2_ad"><b> &nbsp;ملفي الشخصي &nbsp;</b></a>
 &nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id="post_ad">
  <div id="ff">
<img width="150" height="150" style="margin: 11px 300px  -22px;" src="img/rr3.jpg" id="img"><br><br>
<h2 style="margin:10px 120px;  color:#807a7a;
text-align: center;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;"> كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا </h2>
<h2 style="margin:-10px 100px; color:#807a7a;
text-align: center;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;">تم الدخول بنجاح مرحبا بك في لوحة التحكم الخاصة بك </h2>
    </div>
</div>
<aside id='aside_ad'>
<section id='section_ad'>
<a  href="addsut.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp;  اضافة طالب  &nbsp;</h4></center></div></a>
<a href="addmaterial.php"><div id="block_ad">
 <center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_po1'> &nbsp;&nbsp;اضافة مادة&nbsp;</h4></center></div></a>
<a href="addtable.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp;اضافة  امتحان </h4></center></div></a>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout.php">
<div id="out_ad"><div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تسجيل الخروج</div>
<div style="display:inline-block;"><img src="img/P.png" height="30" width="40" style="margin:-13px 0px;"></div></div></a>
</section>
</aside>
<div class="clearfix"></div>
<footer class="footer-copyright1_ad">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
</body>
</html>
<?php
} elseif($_SESSION['T_level']=="العميد"){
   echo'<script>
 swal("غير مصرح لك بالدخول الي هذه الصفحة", {
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="admin.php";
 }
 });
 </script>';
}
else
{
  echo'<script>
 swal("غير مصرح لك بالدخول الي هذه الصفحة", {
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="admin3.php";
 }
 });
 </script>';
}
  ?>