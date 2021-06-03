<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <script src="gg.js"></script>
<title>اضافة طالب </title>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
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
//echo $id;
ob_end_flush();
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
   </div><hr>
<div id="y_ad">
<div id="y2_ad">&nbsp;اضافة طالب&nbsp;</div>
&nbsp;|<a href="reg_admin.php"><div id="y2_ad">&nbsp;&nbsp;رجوع&nbsp;&nbsp;</div></a>
&nbsp;|<a href="viwesut.php"><div id="y2_ad">&nbsp; عرض بيانات الطلاب&nbsp;</div></a>&nbsp;|<div id="y2_ad">
 &nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id="post_ad">
<form  name ="add"  action="addsut_sa.php" method="post"  class="qaab5">
<center>
<table>
<input type="hidden" name="id">
  <br>
  <tr>
  <td width="203"><h4 class="labe_adus"><center>اسم الطالب </center></h4></td>
  <td><b class="mint-tips" data-title="ادخل اسم الطالب " ><input type="text" name="username" type="text" id="textfield_adus" placeholder="ادخل اسم الطالب"></b></td>
</tr>
  <tr>
    <td><h4 class="labe_adus"><center>تخصص الطالب</center></h4>
    </td>
    <td><b class="mint-tips" data-title="اختار تخصص الطالب" ><select name="specialty" id="textfield_adus">
      <option value="CS">علوم حاسوب</option>
      <option value="IT">تقنية معلومات</option>
      </select>
    </b></td></tr>
  <tr>
    <td><h4 class="labe_adus"><center>دفعة الطالب</center></h4>
    </td><td>
    <b class="mint-tips" data-title="ادخل دفعة الطالب"><input type="number" name="dv" id="textfield_adus" placeholder="ادخل دفعة الطالب "></b></td></tr>
</table>
</center>
<center>
   <input name="submit" id="submit_adus" type="submit" value="اضافة">
</center>
</form>
    </div>
<aside id='aside_ad'>
<section id='section_ad'>
<a  href="reg_admin.php"><div id="block_ad"><center> <img src="img/H.png" width="90" height="78"id="img2"><h4 id='h4_po1'>&nbsp;&nbsp; الرئيسية  &nbsp;</h4></center></div></a>
<a href="addmaterial.php"><div id="block_ad">
 <center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_po1'> &nbsp;&nbsp;اضافة مادة&nbsp;</h4></center></div></a>
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