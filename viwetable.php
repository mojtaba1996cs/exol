<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> عرض جدول الامتحانات  </title>
    <link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
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
table{
border-collapse:collapse;
width: 97%;
height:100px;
background-color:#fff;
margin:0px 14px 0px 0px;
font-size:20px;
font-weight:bold;
border-radius:29px;
text-align:center;
}
table tr:nth-child(2n + 1) {
background-color: rgba(144, 144, 144, 0.35);
}
</style>
</head>
<body  dir="rtl" >
  <?php
  $id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
ob_end_flush();
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
   </div><hr>
    <div id="y"><div id="y2">&nbsp;&nbsp;عرض جدول الامتحانات   &nbsp;&nbsp;</div>
 &nbsp;|<a href="addtable.php"><div id="y2">&nbsp;&nbsp;رجوع  &nbsp;&nbsp;</div></a>
 &nbsp;|<div id="y2">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<?php
  $r=(time()+7*3600-(60*60*24*365));
    $fschyear=date("Y",$r);
    $schyear=date("Y")."/".$fschyear;
include"cont.php";
$sql = "SELECT * FROM  tests where Class='الفصل الاول' and  Specialty='IT' and schyear='".$schyear."'";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الاول' and  Specialty='CS' and schyear='".$schyear."'";
$result2 = $connect-> query($sql2);
echo "<form id='qaab9'>";
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الاول  &nbsp;&nbsp;</div>';
  ?>
   <div id="viwe">
     <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{
}}
?>
</div>
<?php
  $sql = "SELECT * FROM  tests where Class='الفصل الثاني' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الثاني' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الثاني  &nbsp;&nbsp;</div>';
  ?>
    <div id="viwe">
    <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{
}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{
}}
  ?>
  </div>
<?php
  $sql = "SELECT * FROM  tests where Class='الفصل الثالث' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الثالث' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الثالث  &nbsp;&nbsp;</div>';
  ?>
    <div id="viwe">
      <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{
}}
  ?>
  </div>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل الرابع' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الرابع' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الرابع  &nbsp;&nbsp;</div>';
  ?>
    <div id="viwe">
      <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
 }
  ?>
  </div>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل الخامس' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل ابخامس' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الخامس  &nbsp;&nbsp;</div>';
  ?>
    <div id="viwe">
      <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
 }
  ?>
  </div>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل السادس' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل السادس' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل السادس  &nbsp;&nbsp;</div>';
  ?>
    <div id="viwe">
      <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
 }
  ?>
  </div>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل السابع' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل السابع' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل السابع  &nbsp;&nbsp;</div>';
  ?>
    <div id="viwe">
  <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
 }
  ?>
  </div>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل الثامن' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الثامن' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;width:250px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الثامن  &nbsp;&nbsp;</div>';
  ?>
   <div id="viwe">
     <?php
 if($result-> num_rows > 0){
echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<div id="vita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div>';
echo"<table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table><br>";
}else{

}
 }
  ?>
     </div>
  <?php
  echo "</form>";
 ?>
<footer class="footer-copyright1">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
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