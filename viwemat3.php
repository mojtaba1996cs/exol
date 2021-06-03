<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>مواد المستوي الثاني </title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg">
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
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" /></div><hr>
   <div id="y_ad"><div id="y2_ad">&nbsp;مواد المستوي الثاني&nbsp;</div>
&nbsp;|<a href="viwemat.php"><div id="y2_ad">&nbsp;&nbsp; رجوع  &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id="post_mat">
      <br>
<form  name ="add"  action="" method="post">
      <a href="#"><div id="h_mat">&nbsp;مواد الفصل الثالث  &nbsp;&nbsp;</div></a>
<?php
include"cont.php";
  $a=0;
  $b=0;
  $c=0;
  $d=0;
$sql = "SELECT * FROM  material where Class='الفصل الثالث' and Specialty='IT'";
$result = $connect-> query($sql);

$sql2 = "SELECT * FROM  material  where Class='الفصل الرابع' and Specialty='IT'";
$result2 = $connect->query($sql2);

 $sql3= "SELECT * FROM  material where Class='الفصل الثالث' and Specialty='CS'";
$result3= $connect-> query($sql3);

 $sql4 = "SELECT * FROM  material  where Class='الفصل الرابع' and Specialty='CS'";
$result4 = $connect-> query($sql4);
echo"<br><center><a href='#'><div id='t_mat'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تخصص تقنية معلومات  &nbsp;&nbsp;</div></a></center>";
if($result-> num_rows > 0){
echo"<table class='table_mat'><tr class='tr_mat'><th style='width:64px' id='id_mat' class='th_mat'>#</th>
<th style='width:150px' id='mat' class='th_mat'>اسم المادة</th><th style='width:150px' id='name_mat' class='th_mat'> استاذ المادة </th>
<th style='width:50px' id='spe_mat' class='th_mat'>التخصص </th>
<th style='width:100px' id='time_mat' class='th_mat'>زمن امتحان المادة</th>";
while($rows = $result->fetch_array()){
echo'<tr class="tr_mat">
<td style="width:60px" id="id_mat" class="td_mat">'.++$a.'</td>
<td style="width:150px" id="mat" class="td_mat">'.$rows["Ms_name"].'</td>
<td style="width:150px" id="name_mat" class="td_mat">'.$rows["Tea_name"].'</td>
<td style="width:50px" id="spe_mat" class="td_mat">'.$rows["Specialty"].'</td>
<td style="width:100px" id="time_mat" class="td_mat">'.$rows["Time_test"].'</td>';
}
echo"</table><hr id='hr_mat'>";

}else{
echo'<center><div id="h2_mat">'. 'لاتوجد مادة  '.'</div></center>';
echo "<hr id='hr_mat'>";
}
echo"<center><a href='#'><div id='t_mat'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب  &nbsp;&nbsp;</div></a></center>";
if($result3-> num_rows > 0){
echo"<table class='table_mat'><tr class='tr_mat'><th style='width:64px' id='id_mat' class='th_mat'>#</th>
<th style='width:150px' id='mat' class='th_mat'>اسم المادة</th><th style='width:150px' id='name_mat' class='th_mat'> استاذ المادة </th>
<th style='width:50px' id='spe_mat' class='th_mat'>التخصص </th>
<th style='width:100px' id='time_mat' class='th_mat'>زمن امتحان المادة</th>";
while($rows3= $result3->fetch_array()){
echo'<tr class="tr_mat">
<td style="width:60px" id="id_mat" class="td_mat">'.++$b.'</td>
<td style="width:150px" id="mat" class="td_mat">'.$rows3["Ms_name"].'</td>
<td style="width:150px" id="name_mat" class="td_mat">'.$rows3["Tea_name"].'</td>
<td style="width:50px" id="spe_mat" class="td_mat">'.$rows3["Specialty"].'</td>
<td style="width:100px" id="time_mat" class="td_mat">'.$rows3["Time_test"].'</td>';
}
echo"</table>";

}else{
echo'<center><div id="h2_mat">'. 'لاتوجد مادة  '.'</div></center>';
}
echo "<br><hr id='hr2_mat'><div id='div_mat'></div><hr id='hr2_mat'>";
echo" <a href='#'><div id='h_mat'>&nbsp; مواد الفصل الرابع  &nbsp;&nbsp;</div></a>";
echo"<br><center><a href='#'><div id='t_mat'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تخصص تقنية معلومات  &nbsp;&nbsp;</div></a></center>";
if($result2-> num_rows > 0){
echo"<table class='table_mat'><tr class='tr_mat'><th style='width:64px' id='id_mat' class='th_mat'>#</th>
<th style='width:150px' id='mat' class='th_mat'>اسم المادة</th><th style='width:150px' id='name_mat' class='th_mat'> استاذ المادة </th>
<th style='width:50px' id='spe_mat' class='th_mat'>التخصص </th>
<th style='width:100px' id='time_mat' class='th_mat'>زمن امتحان المادة</th>";
while($rows2 = $result2->fetch_array()){
echo'<tr class="tr_mat">
<td style="width:60px" id="id_mat" class="td_mat">'.++$c.'</td>
<td style="width:150px" id="mat" class="td_mat">'.$rows2["Ms_name"].'</td>
<td style="width:150px" id="name_mat" class="td_mat">'.$rows2["Tea_name"].'</td>
<td style="width:50px" id="spe_mat" class="td_mat">'.$rows2["Specialty"].'</td>
<td style="width:100px" id="time_mat" class="td_mat">'.$rows2["Time_test"].'</td>';
}
echo"</table><hr id='hr_mat'>";

}else{
echo'<center><div id="h2_mat">'. 'لاتوجد مادة  '.'</div></center>';
echo "<hr id='hr_mat'>";
}

echo"<center><a href='#'><div id='t_mat'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب  &nbsp;&nbsp;</div></a></center>";
if($result4-> num_rows > 0){
echo"<table class='table_mat'><tr class='tr_mat'><th style='width:64px' id='id_mat' class='th_mat'>#</th>
<th style='width:150px' id='mat' class='th_mat'>اسم المادة</th><th style='width:150px' id='name_mat' class='th_mat'> استاذ المادة </th>
<th style='width:50px' id='spe_mat' class='th_mat'>التخصص </th>
<th style='width:100px' id='time_mat' class='th_mat'>زمن امتحان المادة</th>";
while($rows4 = $result4->fetch_array()){
echo'<tr class="tr_mat">
<td style="width:60px" id="id_mat" class="td_mat">'.++$d.'</td>
<td style="width:150px" id="mat" class="td_mat">'.$rows4["Ms_name"].'</td>
<td style="width:150px" id="name_mat" class="td_mat">'.$rows4["Tea_name"].'</td>
<td style="width:50px" id="spe_mat" class="td_mat">'.$rows4["Specialty"].'</td>
<td style="width:100px" id="time_mat" class="td_mat">'.$rows4["Time_test"].'</td>';
}
echo"</table>";

}else{
echo'<center><div id="h2_mat">'. 'لاتوجد مادة  '.'</div></center><br>';
}
  $connect->close();
  ob_end_flush();
  echo "<br><br>";
  ?>
</form>
    </div>
  <aside id="aside_ad">
<section id="section_ad">
<a  href="reg_admin.php"><div id="block_ad"><center>
 <img src="img/H.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp; الرئيسية  &nbsp;</h4></center></div></a>
<a  href="addsut.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp;  اضافة طالب  &nbsp;</h4></center></div></a>
<a href="addtable.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp;اضافة  امتحان </h4></center></div></a>
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
<center> جميع الحقوق محفوظة لدي كلية التقنية جامعة كرري2019-2020 &copy; </center>
    </footer>
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
  </body>
  </html>