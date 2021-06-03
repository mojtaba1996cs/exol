<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>عرض بيانات الاساتذة</title>
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
header("Location:admin.php");
          }
if($_SESSION['T_level']=="العميد"){
//echo $id;
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/></div><hr>
 <div id="y_ad">
<div id="y2_ad">&nbsp;حذف وتعديل بيانات الاساتذة&nbsp;</div>
&nbsp;|<a href="pcm.php"><div id="y2_ad">&nbsp;&nbsp; رجوع &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id="post_ad2">
<form  name ="add"  action="dorup.php" method="post">
<?php
include"cont.php";
$sql = "SELECT * FROM  teachers where T_level in ('reg','Teacher')";
$result = $connect-> query($sql);
    $t=0;
if($result-> num_rows > 0){
echo"<table id='table_ad'><tr class='tr_ad'><th style='width:60px'id='id_ad' class='th_ad'>#</th>
<th style='width:250px' id='name_ad' class='th_ad'>اسم الاستاذ</th><th style='width:150px' id='pass_ad' class='th_ad'>كلمة المرور</th><th style='width:150px' id='level_ad' class='th_ad'>المستوي الوظيفي</th><th style='width:250px' id='am_ad' class='th_ad'>عمليات</th>";
while($rows = $result->fetch_array()){
  $T_id=$rows["T_id"];
  $T_name=$rows["T_name"];
  $T_level=$rows['T_level'];
  if($T_level == "reg"){
    $T_level="مسجل";
  }elseif($T_level == "Teacher"){
    $T_level="استاذ";
  }else{
  }
echo
'<tr class="tr_ad">
<td style="width:60px" id="id_ad" class="td_ad">'.++$t.'</td>
<td style="width:250px" id="name_ad" class="td_ad">'.$rows["T_name"].'</td>
<td style="width:150px" id="pass_ad" class="td_ad">'.$rows["T_pass"].'</td>
<td style="width:150px" id="level_ad" class="td_ad">'.$T_level.'</td>
<td style="width:450px" id="am_ad" class="td_ad">'.
'&nbsp;&nbsp;&nbsp;<a  href="DELETE.php?id='.$T_id.'/ name='.$T_name.'"><input type="button" id="del_ad" value="حذف"></a>
<a href="update.php?id='.$rows["T_id"].' "><input type="button" id="up_ad" value="تعديل"></a></td>';
}
echo"</table><br>";

}else{
echo'<center><div style=color:green;font-size:30px;>'. 'لايوجد استاذ'.'</div></center>';
  $connect->close();
  ob_end_flush();
}
  ?>
</form>
</div>
<aside id="aside_ad">
<section id="section_ad">
<a href="pcm.php"><div id="block_ad"><center>
 <img src="img/H.png" width="90" height="78" id="img2">
  <h4 id="h4_ad"> &nbsp;&nbsp;الرئيسية &nbsp;</h4></center></div></a>
<a href="adduser.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_ad">&nbsp;&nbsp;اضافة استاذ </h4></center></div></a>

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
else{
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