<?php
session_start();
ob_start();
$pass=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
$id_Qu=($_GET['id_Qu']);//رقم السؤال
$id_test=($_GET['id_test']);
$name_test=($_GET['name_test']);//اسم الامتحان
include "cont.php";
  $sql=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`='$pass' and `T_level`='$level' ");
$result=mysqli_fetch_array($sql);
$name_T=$result['T_name'];
$sql2=mysqli_query($connect,"SELECT * FROM `tests` where `Tes_id`='$id_test'");
  $result2=mysqli_fetch_array($sql2);
$T_name=$result2['T_name'];
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تفاضيل السؤال</title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body  dir="rtl">
 <?php
if($T_name != $name_T){
  echo'<script>
 swal("انت لست استاذ هذا الامتحان", {
 icon:"info",
 buttons: false,
 timer: 4000,
 });window.location.href="admin3.php";
 </script>';
}else{
if(!isset($id_test)){
    echo'<script language="javascript">
 swal("ليس لديك امتحان لكي تتضع له اسئلة .. ",{
 icon:"info",
 buttons: false,
 timer: 4000,
 });window.location.href="addtest.php";</script>';
}
elseif($_SESSION['T_level']=="Teacher"){
  ?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div>
<hr>
   <div id="y_qu2"><div id="y2_qu2">&nbsp;&nbsp;&nbsp; تفاضيل السؤال &nbsp;&nbsp;</div>
&nbsp;|<?php echo '<a href="Qu.php?id='.$id_test.'&name_test='.$name_test.'"><div id="y2_qu2">&nbsp;&nbsp;رجوع &nbsp;&nbsp;</div></a>';?>
&nbsp;|<div id="y2_qu2">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id='post_vqu'>
<br> <div class="qaab6_vqu">
      <?php
  include"cont.php";
$sql4=mysqli_query($connect,"SELECT * FROM    questions  where  Qu_id='$id_Qu'");
  $result4=mysqli_fetch_array($sql4);
    $type=$result4['type_Qu'];
   if($type==="one"){
echo'<center><table id="table_vqu"><tr id="tr_vqu"><th style="width:1px" id="th_vqu">السؤال</th><td id="td_vqu">'.$result4["Qu"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابةالاولي</th><td id="td_vqu">'.$result4["ans1"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الثانية</th><td id="td_vqu">'.$result4["ans2"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الثالثة</th><td id="td_vqu">'.$result4["ans3"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الرابعة</th><td id="td_vqu">'.$result4["ans4"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الصحيحة</th><td id="td_vqu">'.$result4["Bestans"].'</td></tr>
<tr id="tr2_vqu"><td colspan="2" id="td2_vqu"><center><a href="upQu.php?id_Qu='.$id_Qu.'&id_test='.$id_test.'&name_test='.$name_test.'&case=1"><input type="button"  value="تعديل السؤال" id="up_vqu"></a>
<a href="deleQu.php?id_Qu='.$id_Qu.'&id_test='.$id_test.'&name_test='.$name_test.'"><input type="button"  value="حذف السؤال" id="del_vqu"></a></td></center></tr>
</table></center>';
   }elseif($type==="mul"){
     echo'<center><table id="table_vqu"><tr id="tr_vqu"><th style="width:1px" id="th_vqu">السؤال</th><td id="td_vqu">'.$result4["Qu"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابةالاولي</th><td id="td_vqu">'.$result4["ans1"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الثانية</th><td id="td_vqu">'.$result4["ans2"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الثالثة</th><td id="td_vqu">'.$result4["ans3"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الرابعة</th><td id="td_vqu">'.$result4["ans4"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu"> الاجابة الصحيحة الاولي</th><td id="td_vqu">';
if(empty($result4["Bestans"])){
echo '- - - - - - - - - - - - - ';
}else{
echo $result4["Bestans"];
}
echo '</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الصحيحة الثانية</th><td id="td_vqu">';
if(empty($result4["Bestans2"])){
echo '- - - - - - - - - - - - ';
}else{
echo $result4["Bestans2"];
}
echo'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الصحيحة الثالثة</th><td id="td_vqu">';
if(empty($result4["Bestans3"])){
echo '- - - - - - - - - - - - - ';
}else{
echo $result4["Bestans3"];
}
echo'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الصحيحة الرابعة</th><td id="td_vqu">';
if(empty($result4["Bestans4"])){
echo '- - - - - - - - - - - - ';
}else{
echo $result4["Bestans4"];
}
echo'</td></tr>
<tr id="tr2_vqu"><td colspan="2" id="td2_vqu"><center><a href="upQu.php?id_Qu='.$id_Qu.'&id_test='.$id_test.'&name_test='.$name_test.'&case=1"><input type="button"  value="تعديل السؤال" id="up_vqu"></a>
<a href="deleQu.php?id_Qu='.$id_Qu.'&id_test='.$id_test.'&name_test='.$name_test.'"><input type="button"  value="حذف السؤال" id="del_vqu"></a></td></center></tr>
</table></center>';
   }else{
     echo'<center><table id="table_vqu"><tr id="tr_vqu"><th style="width:1px" id="th_vqu">السؤال</th><td id="td_vqu">'.$result4["Qu"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابةالاولي</th><td id="td_vqu">'.$result4["ans1"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الثانية</th><td id="td_vqu">'.$result4["ans2"].'</td></tr>
<tr id="tr_vqu"><th style="width:150px" id="th_vqu">الاجابة الصحيحة</th><td id="td_vqu">'.$result4["Bestans"].'</td></tr>
<tr id="tr2_vqu"><td colspan="2" id="td_vqu"><center><a href="upQu.php?id_Qu='.$id_Qu.'&id_test='.$id_test.'&name_test='.$name_test.'&case=1"><input type="button"  value="تعديل السؤال" id="up_vqu"></a>
<a href="deleQu.php?id_Qu='.$id_Qu.'&id_test='.$id_test.'&name_test='.$name_test.'"><input type="button"  value="حذف السؤال" id="del_vqu"></a></td></center></tr>
</table></center>';
   }
  mysqli_close($connect);
  ob_end_flush();

  ?>
&nbsp;&nbsp;</div></div>
<?php

}elseif($_SESSION['T_level']=="العميد"){
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
 window.location.href="admin2.php";
 }
 });
 </script>';
}
}
  ?>
  </body>
  </html>