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
include "cont.php";
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>عرض المواد الخاصة بك </title>
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
th{
border:1px solid #000;
background:linear-gradient(rgba(179, 70, 70,0.60),#fff);
width:460px;
height:34px;
margin:0px -8px;
}
td{
border: solid 1px #a5a1a1;
height:26px;
text-align:center;
height:50px;
}
tr{
border: solid 1px #c9c9c9;
height:26px;
}
table tr:nth-child(2n + 1) {
background-color: rgba(144, 144, 144, 0.35);
}
</style>
</head>
<body  dir="rtl">
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
 </div><hr>
 <div id="y_st"><div id="y2_st"> &nbsp;&nbsp; المواد الخاصة بك &nbsp;&nbsp;</div>
 &nbsp;|<a href="student.php"><div id="y2_st"> &nbsp;&nbsp; رجوع &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_st">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id="post_st">
<?php
include "cont.php";
$sql= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_set`='$id2' and `Std_status`=1");
if($sql-> num_rows > 0){
$result=mysqli_fetch_array($sql);
$class=$result['Std_class'];
$Specialty=$result['Std_specialty'];
$sql4 = "SELECT * FROM  material  where Class='$class' and Specialty='$Specialty'";
$result4 = $connect->query($sql4);
if($result4-> num_rows > 0){
echo"<table id='table_vima'><tr><th style='width:60px' id='id'>#</th>
<th style='width:150px' id='name'>اسم المادة</th><th style='width:150px' id='Tea'> استاذ المادة </th>
<th style='width:150px' id='time'>زمن امتحان المادة</th>";
while($rows = $result4->fetch_array()){

echo
'<tr>
<td style="width:60px" id="id">'.++$a.'</td>
<td style="width:150px" id="name">'.$rows["Ms_name"].'</td>
<td style="width:150px" id="Tea">'.$rows["Tea_name"].'</td>
<td style="width:100px" id="time">'.$rows["Time_test"].'</td>';
}
echo"</table>";

}else{
  echo "<br>";
echo "<div id='t'><table><tr><td>لا توجد لديك مادة</tr></td></table></div>";
}}else{
 echo "<br>";
echo "<div id='t'><table><tr><td>انت لديك ملاحق</tr></td></table></div>";
}
?>
</div>
<aside>
<section>
<a  href="student.php"><div id="block_st">
<center><img src="img/H3.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp; الصفحة الرئيسية &nbsp;</h4></div></a>
<a  href="sut_viwetest.php"><div id="block_st">
<center><img src="img/Vi.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;<b>عرض جدول الامتحانات</b>&nbsp;</h4></div></a>
<a  href="Acadfile.php"><div id="block_st">
<center><img src="img/Po.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;عرض الملف الاكاديمي&nbsp;</h4></div></a>
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