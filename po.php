<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ملف الشخصي</title>
    <link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
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
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
   </div><hr>
   <div id="y_ad"><div id="y2_ad">&nbsp;&nbsp; بياناتي الشخصية  &nbsp;&nbsp;</div>
  &nbsp;|<a href="pcm.php"><div id="y2_ad">&nbsp;&nbsp;رجوع&nbsp;&nbsp;</div></a>
 &nbsp;|<a href="myupdate.php"><div id=y2_ad>&nbsp;&nbsp;  تعديل بياناتي &nbsp;</div></a>
&nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>

  <div id="post_ad">
<form  name ="add" action="#" method="post" class="qaab4-po">
 <p style="margin: 0px  0px 30px 0px;"><center> <img src="img/pad.jpg" width="55%" height="208"/></center></p>
<?php
include"cont.php";
$sql= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`teachers` where `T_level`='$id2' ");
$result= mysqli_fetch_array($sql);
echo'<center><table id="table_po1"><tr id="tr_po1"><th style="width:1px" id="id_po1" class="th_po1">الرقم الشخصي</th><td id="id_po1" class="th_po1">'.$result["T_id"].'</td></tr>
<tr><th style="width:400px" id="name_po1" class="th_po1">اسم المستخدم</th><td id="name_po1" class="th_po1">'.$result["T_name"].'</td></tr><tr><th style="width:400px" id="pass_po1" class="th_po1">كلمة المرور</th><td id="pass_po1" class="th_po1">'.$result["T_pass"].'</td></tr><tr><th style="width:300px" id="level_po1" class="th_po1">المستوي الوظيفي</th><td id="level_po1" class="th_po1">'.$result["T_level"].'</td></tr></table></center>';
  mysqli_close($connect);
  ob_end_flush();
?>
  </form>
    </div>
  <aside id='aside_ad'>
<section id='section_ad'>
<a href="adduser.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2">
  <h4 id='h4_po1'> &nbsp;&nbsp;اضافة استاذ&nbsp;</h4></center></div></a>
<a href="dorup.php"><div id="block_ad"><center>
 <img src="img/Dviwe.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp;عرض بيانات الاساتذة</h4></center></div></a>

 <a href="ah.php"><div id="block_ad"><center>
 <img src="img/Data.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp;احصائيات</h4></center></div></a>
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