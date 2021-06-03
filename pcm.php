<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> لوحة تحكم العميد</title>
  <script src="dist/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
  <link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
  <script src="gg.js"></script>
</head>
<body  dir="rtl">
<?php
$id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin.php");
          }
if($_SESSION['T_level']=="العميد"){
//$name=$_GET['name'];
ob_end_flush();
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div><hr>
  <div id="y_ad"><div id="y2_ad">&nbsp;الصفحة الرئيسية&nbsp;</div>
  &nbsp;|<a href="po.php"><div id="y2_ad">&nbsp;ملفي الشخصي &nbsp;</div></a>
 &nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id="post_ad">
  <div id="ff_ad">
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
<aside id="aside_ad">
<section id="section_ad">
<a href="adduser.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2">
  <h4 id="h4_ad"> &nbsp;&nbsp;اضافة استاذ&nbsp;</h4></center></div></a>
<a href="dorup.php"><div id="block_ad"><center>
 <img src="img/Dviwe.png" width="90" height="78" id="img2"><h4 id="h4_ad">&nbsp;&nbsp;عرض بيانات الاساتذة</h4></center></div></a>

 <a href="ah.php"><div id="block_ad"><center>
 <img src="img/Data.png" width="90" height="78" id="img2"><h4 id="h4_ad">&nbsp;&nbsp;احصائيات</h4></center></div></a>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout3.php">
<div id="out_ad"><div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تسجيل الخروج</div>
<div style="display:inline-block;"><img src="img/P.png" height="30" width="40" style="margin:-13px 0px;"></div></div></a>
</section>
</aside>
<div class="clearfix"></div>
<footer class="footer-copyright1_ad">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
<?php
} elseif($_SESSION['T_level']=="reg"){
    echo'<script>
 swal("غير مصرح لك بالدخول الي هذه الصفحة", {
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="admin2.php";
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
 if (will){
 window.location.href="admin3.php";
 }
 });
 </script>';
}
  ?>
</body>
</html>