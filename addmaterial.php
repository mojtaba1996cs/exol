<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اضافة مادة </title>
  <script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body  dir="rtl">
 <div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
   </div><hr>
 <div id="y_ad">
   <div id='y2_ad'>&nbsp;اضافة مادة&nbsp;</div>
   &nbsp;|<a href="reg_admin.php"><div id="y2_ad">&nbsp;&nbsp;رجوع&nbsp;&nbsp;</div></a>
&nbsp;|<a href="viwemat.php"><div id="y2_ad">&nbsp;عرض المواد &nbsp;</div></a>
&nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<?php
$id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
include"cont.php";
  $sql= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الاول' and `Specialty`='IT' ");
$cou=mysqli_num_rows($sql);
$sql2= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الاول' and `Specialty`='CS' ");
$cou2=mysqli_num_rows($sql2);
$sql3= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الثاني ' and `Specialty`='IT' ");
$cou3=mysqli_num_rows($sql3);

$sql4= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الثاني' and `Specialty`='CS' ");
$cou4=mysqli_num_rows($sql4);

$sql5= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الثالث' and `Specialty`='IT' ");
$cou5=mysqli_num_rows($sql5);

$sql6= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الثالث' and `Specialty`='CS' ");
$cou6=mysqli_num_rows($sql6);

$sql7= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الرابع' and `Specialty`='IT' ");
$cou7=mysqli_num_rows($sql7);

$sql8= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الرابع' and `Specialty`='CS' ");
  $cou8=mysqli_num_rows($sql8);

 $sql9= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الخامس' and `Specialty`='IT' ");
 $cou9=mysqli_num_rows($sql9);

 $sql10= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الخامس' and `Specialty`='CS' ");
 $cou10=mysqli_num_rows($sql10);

 $sql11= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل السادس' and `Specialty`='IT' ");
 $cou11=mysqli_num_rows($sql11);

 $sql12= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل السادس' and `Specialty`='CS' ");
 $cou12=mysqli_num_rows($sql12);

   $sql13= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل السابع' and `Specialty`='IT' ");
 $cou13=mysqli_num_rows($sql13);

 $sql14= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل السابع' and `Specialty`='CS' ");
  $cou14=mysqli_num_rows($sql14);

 $sql15= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الثامن' and `Specialty`='IT' ");
  $cou15=mysqli_num_rows($sql15);
 $sql16= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `material` where `Class`='الفصل الثامن' and `Specialty`='CS' ");
  $cou16=mysqli_num_rows($sql16);
?>

  <div id="post_ad">
<form  name ="add"  action="" method="post"  class="qaab5">
 <hr>
<center><div id="v">&nbsp; اضافة مادة جديد للفصل الدراسي الاول&nbsp;&nbsp;</div>
<div class="viwe9"><a href="addmaterial2.php?class=الفصل الاول&spe=CS"><div id="viwe9">تخصص علوم حاسوب
  <b style="color:blue";>عدد –(<?php echo $cou2;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل الاول&spe=IT"><div id="viwe9">تخصص تقنية معلومات
    <b style="color:blue";>عدد –(<?php echo $cou;?>)–المواد
 </b> </div></a></div>
<hr>
  <div id="v">&nbsp; اضافة مادة جديد للفصل الدراسي الثاني&nbsp;&nbsp;</div>
<div class="viwe2"><a href="addmaterial2.php?class=الفصل الثاني&spe=CS"><div id="viwe2">تخصص علوم حاسوب
    <b style="color:blue";>عدد –(<?php echo $cou4;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل الثاني&spe=IT"><div id="viwe2">تخصص تقنية معلومات
   <b style="color:blue";>عدد –(<?php echo $cou3;?>)–المواد
 </b> </div></a></div><hr>
<div id="v">&nbsp;اضافة مادة جديد للفصل الدراسي الثالث&nbsp;&nbsp;</div>
<div class="viwe3"><a href="addmaterial2.php?class=الفصل الثالث&spe=CS"><div id="viwe3">تخصص علوم حاسوب
    <b style="color:blue";>عدد –(<?php echo $cou6;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل الثالث&spe=IT"><div id="viwe3">تخصص تقنية معلومات   <b style="color:blue";>عدد –(<?php echo $cou5;?>)–المواد
 </b> </div></a></div><hr>
<div id="v">&nbsp;اضافة مادة جديد للفصل الدراسي الرابع&nbsp;&nbsp;</div>
<div class="viwe4"><a href="addmaterial2.php?class=الفصل الرابع&spe=CS"><div id="viwe4">تخصص علوم حاسوب
    <b style="color:blue";>عدد –(<?php echo $cou8;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل الرابع&spe=IT"><div id="viwe4">تخصص تقنية معلومات
    <b style="color:blue";>عدد –(<?php echo $cou7;?>)–المواد
 </b> </div></a></div><hr>
<div id="v">&nbsp; اضافة مادة جديد للفصل الدراسي الخامس&nbsp;&nbsp;</div>
<div class="viwe5"><a href="addmaterial2.php?class=الفصل الخامس&spe=CS"><div id="viwe5">تخصص علوم حاسوب
    <b style="color:blue";>عدد –(<?php echo $cou10;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل الخامس&spe=IT"><div id="viwe5">تخصص تقنية معلومات
   <b style="color:blue";>عدد –(<?php echo $cou9;?>)–المواد
 </b> </div></a></div><hr>
 <div id="v">&nbsp;اضافة مادة جديد للفصل الدراسي السادس&nbsp;&nbsp;</div>
<div class="viwe6"><a href="addmaterial2.php?class=الفصل السادس&spe=CS"><div id="viwe6">تخصص علوم حاسوب   <b style="color:blue";>عدد –(<?php echo $cou12;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل السادس&spe=IT"><div id="viwe6">تخصص تقنية معلومات
    <b style="color:blue";>عدد –(<?php echo $cou11;?>)–المواد
 </b> </div></a></div><hr>
<div id="v">&nbsp;اضافة مادة جديد للفصل الدراسي السابع&nbsp;&nbsp;</div>
<div class="viwe7"><a href="addmaterial2.php?class=الفصل السابع&spe=CS"><div id="viwe7">تخصص علوم حاسوب   <b style="color:blue";>عدد –(<?php echo $cou14;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل السابع&spe=IT"><div id="viwe7">تخصص تقنية معلومات
    <b style="color:blue";>عدد –(<?php echo $cou13;?>)–المواد
 </b> </div></a></div><hr>
  <div id="v">&nbsp; اضافة مادة جديد للفصل الدراسي الثامن&nbsp;&nbsp;</div>
<div class="viwe8"><a href="addmaterial2.php?class=الفصل الثامن&spe=CS"><div id="viwe8">تخصص علوم حاسوب   <b style="color:blue";>عدد –(<?php echo $cou16;?>)–المواد
 </b> </div></a>
<a href="addmaterial2.php?class=الفصل الثامن&spe=IT"><div id="viwe8">تخصص تقنية معلومات
   <b style="color:blue";>عدد –(<?php echo $cou15;?>)–المواد
 </b> </div></a></div><hr>
  </center>
</form>
    </div>
<aside id='aside_ad'>
<section id='section_ad'>
<a  href="reg_admin.php"><div id="block_ad"><center>
 <img src="img/H.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp; الرئيسية  &nbsp;</h4></center></div></a>
<a  href="addsut.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp;  اضافة طالب  &nbsp;</h4></center></div></a>
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