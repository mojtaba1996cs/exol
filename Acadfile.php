<?php
session_start();
ob_start();
error_reporting (1);
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
if(!isset($_SESSION['Std_name']) && !isset($_SESSION['Std_set']))
{
header("Location:en_student.php");
}
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>عرض الملف الاكاديمي </title>
  <link rel="shortcut icon" href="img/rr3.jpg" id="img">
  <script src="gg.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
  <link href="grey.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js2/jquery.cookie.js"></script>
<style>
body{
background-color:#faf5b5;
}
#img2{
border-right:10px;
margin-top:12px;
}
</style>
  </head>
<body  dir="rtl">
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعةu دنقلا" id="img" />
 </div><hr>
  <div id="y_st"><div id="y2_st"> &nbsp;&nbsp; ملفك الاكاديمي&nbsp;&nbsp;</div>
 &nbsp;|<a href="student.php"><div id="y2_st"> &nbsp;&nbsp; رجوع &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_st">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id="post_st">
  <?php
include "cont.php";
$sql= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_set`='$id2' and `Std_status`=1");
$result=mysqli_fetch_array($sql);
$class=$result['Std_class'];
$Specialty=$result['Std_specialty'];
$sql2= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `degree` where  class='$class' and  Std_set='$id2'");
  $day=date("Y-m-d");
  $sql5= mysqli_query($connect,"SELECT  SUM(Time_test)as Time_test FROM `".$db_name."`. `tests` where  class='$class' and Tes_DATE <= '$day' and Specialty='$Specialty'");
  $result5=mysqli_fetch_array($sql5);
 $time=$result5['Time_test'];
  $sql4=mysqli_query($connect,"SELECT SUM(Std_deg) as Std_deg  from `degree` where `class`='$class' and `Std_set`='$id2'");
 $result4=mysqli_fetch_array($sql4);
 $tk2=$result4['Std_deg'];
  $mo=round($tk2/$time,2);
echo "<br><table id='table'><th id='th' class='name'>الاسم</th><th id='th' class='set'>رقم الجلوس</th>";
while($result2=mysqli_fetch_array($sql2)){
  $material=$result2['test_name'];
echo "<th id='th' class='mat'>".$material."</th>";
}
echo "<th id='th' class='mo'>المعدل</th><th id='th' class='mok'>المعدل التراكمي</th>";
$sql2= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `degree` where  Class='$class' and  Std_set='$id2'");
  echo "<tr id='tr'><td id='td' class='name'>$id</td><td id='td' class='set'>$id2</td>";
while($result2=mysqli_fetch_array($sql2)){
    $material=$result2['test_name'];
$sql3= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `degree` where  test_name='$material' and  Std_set='$id2' ");

while($result3=mysqli_fetch_array($sql3)){
  $tk=$result3['Std_Tak'];

echo "<td id='td' class='mat'>".$tk."</td>";
}}
echo "<td id='td' class='mo'>".$mo."</td><td id='td' class='mok'></td>";
 echo "</table>";
  ?>
</div>
<aside>
<section>
<a  href="student.php"><div id="block_st">
<center><img src="img/H3.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp; الصفحة الرئيسية&nbsp;</h4></div></a>
<a  href="sut_viwetest.php"><div id="block_st">
<center><img src="img/Vi.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;<b>عرض جدول الامتحانات</b>&nbsp;</h4></div></a>
<a href="sut_viwemat.php"><div id="block_st">
<center><img src="img/M.png" width="120" height="90" id="img2"></center><h4>&nbsp;&nbsp;عرض المواد الخاصة بك</h4></div></a>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout2.php">
<div id="out_st"><div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تسجيل الخروج</div>
<div style="display:inline-block;"><img src="img/P.png" height="30" width="40" style="margin:-13px 0px;"></div></div></a>
</section>
</aside>
<div class="clearfix"></div>
<footer class="footer-copyright1_st">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
  </body>
  </html>