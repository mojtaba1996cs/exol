<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل بيانات المسجل </title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
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
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
   </div><hr>
  <div id="y_ad"><div id="y2_ad">&nbsp;تعديل  بياناتي&nbsp;</div>
&nbsp;|<a href="po2.php"><div id="y2_ad">&nbsp;&nbsp; رجوع&nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_ad">
&nbsp;  <?php include "time2.php";?>&nbsp;
    </div></div>
<?php
include"cont.php";
$sql= mysqli_query($connect,"SELECT *  FROM `".$db_name."`.`teachers` where `T_level`='$id2' ");
$result= mysqli_fetch_array($sql);
 mysqli_close($connect);
    $id=$result['T_id'];
    $name=$result['T_name'];
  $passoword=$result['T_pass'];
  $d=$_SESSION['T_level'];
  $d2="مسجل";
  $d=$d2;
 ?>
 <div id="post_ad">
<form  name ="add"  action="myupdate2_sa.php" method="post"  class="qaab4-up">
<center>
<table>
<input type="hidden" name="id" value="<?php echo $id;?>" >
  <br><br><br>
<tr>
  <td width="203"><h4 class="labe1_myup"><center>اسم المستخدم</center></h4></td>
  <td><b  class="mint-tips" data-title="اكتب اسم المستخدم الجديد" id="textfield2"><input type="text" name="username" id="textfield_myup" value='<?php echo $name; ?>'></b></td>
  </tr>
  <tr>
  <td><h4 class="labe1_myup"><center>كلمة المرور</center></h4></td>
  <td><b  class="mint-tips" data-title="اكتب كلمة المرور الجديدة" id="textfield2"><input type="text" name="password" id="textfield_myup" value='<?php echo $passoword;?>'></b></td>
</tr>
</table>
</center>
<center>
   <input id="submit_myup" type="submit" name="submit" value="تعديل">
</center>
  </form>
</div>
<aside id="aside_ad">
<section id="section_ad">
<a  href="addsut.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_myup">&nbsp;&nbsp;  اضافة طالب  &nbsp;</h4></center></div></a>
<a href="addmaterial.php"><div id="block_ad">
 <center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_myup"> &nbsp;&nbsp;اضافة مادة&nbsp;</h4></center></div></a>
<a href="addtable.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_myup">&nbsp;&nbsp;اضافة  امتحان </h4></center></div></a>
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