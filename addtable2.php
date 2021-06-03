<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اضافة جدول امتحان  </title>
  <script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<?php
 $id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
  $spe=($_GET['sp']);
  if($spe=="CS"){
    ?>
  <body  dir="rtl">
  <div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
   </div><hr>
  <div id="y_ad"><div id="y2_ad">&nbsp;اضافة جدول لتخصص علوم حاسوب&nbsp;</div>
&nbsp;|<a href="addtable.php"><div id="y2_ad">&nbsp;&nbsp;رجوع&nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <?php
    include"cont.php";
    $p="CS";
    $r=(time()+0*3600-(60*60*24*365));
    $fschyear=date("Y",$r);
    $schyear=date("Y")."/".$fschyear;
  $sql = "SELECT * FROM  material where `Specialty`='$p' and `case`='0'";
  $result = $connect-> query ($sql);
  $rows=$result-> fetch_array();
  $name_T=$rows['Tea_name'];
   $Specialty=$rows['Specialty'];
  echo '<div id="post_ad">
<form  name ="add"  action="addtable_sa.php?Specialty='.$Specialty.'&p=CS&name_T='.$name_T.'" method="post"  class="qaab5">
<center>
<table cellpadding="0">
<input type="hidden" name="id">

<input type="hidden" name="schyear" value="'.$schyear.'">

  <tr>
  <td width="203"><h4 class="labe_adus"><center>اسم الامتحان  </center></h4></td>
 <td>
  <b class="mint-tips" data-title="اختار اسم الامتحان"> <select name="name" id="select">';
 $sql2 = "SELECT DISTINCT Class FROM  material where `Specialty`='$p' and `case`='0'";
  $result2 = $connect-> query ($sql2);
while($table = $result2->fetch_array()){
$lavel=$table['Class'];
echo '<optgroup label="مواد '.$lavel.'">';
$sql = "SELECT * FROM  material where `Specialty`='$p' and `case`='0' and Class='$lavel' ";
$result = $connect-> query ($sql);
		if ($result-> num_rows >= 0 ){
			while ($tableRow = $result->fetch_array()) {
              $name=$tableRow['Ms_name'];

              $name2=explode(",",$name);
				echo '<option value="' . $name2[0]. '"';
				echo '>' .$name2[0]. '</option>';
			}
		}}
		echo'</select></b>
   </td></tr>
 <br> <tr>
    <td><h4 class="labe_adus"><center>تاريخ الامتحان</center></h4>
    </td><td>

  <b  class="mint-tips" data-title="اختار تاريخ الامتحان"><input type="date" name="date" id="textfield_adta"></b></td></tr>
    <tr>
    <td><h4 class="labe_adus"><center>زمن الامتحان</center></h4>
    </td><td>
<b  class="mint-tips" data-title="اختار زمن الامتحان"><input type="time" name="time" id="textfield_adta"></b></td></tr>
</table>
</center>
<center>
   <input name="submit" id="submit_adta" type="submit" value="اضافة">
  </center>
</form></div>';
    ?>
  <aside id='aside_ad'>
<section id='section_ad'>
<a  href="reg_admin.php"><div id="block_ad"><center>
 <img src="img/H.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp; الرئيسية  &nbsp;</h4></center></div></a>
<a  href="addsut.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp;  اضافة طالب  &nbsp;</h4></center></div></a>
<a href="addmaterial.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_po1'>&nbsp;&nbsp;اضافة  مادة </h4></center></div></a>
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
<?php
  }else{
    ?>
  <body dir="rtl">
  <div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
   </div><hr>
 <div id="y_ad"><div id="y2_ad">&nbsp;اضافة جدول لتخصص تقنية معلومات&nbsp;</div>
&nbsp;|<a href="addtable.php"><div id="y2_ad">&nbsp;&nbsp;رجوع&nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<?php
    include"cont.php";
  $sql2 = "SELECT * FROM  material where `Specialty`='IT' and `case`='0'";
  $result2 = $connect-> query ($sql2);
  $rows2=$result2-> fetch_array();
   $Specialty2=$rows2['Specialty'];
    $name5=$rows2['Ms_name'];
        $r=(time()+7*3600-(60*60*24*365));
    $fschyear=date("Y",$r);
    $schyear=date("Y")."/".$fschyear;
  echo '<div id="post_ad">
<form  name ="addd"  action="addtable_sa.php?Specialty='.$Specialty2.'&p=IT" method="post"  class="qaab5">
<center>
<table cellpadding="0">
<input type="hidden" name="id">
<input type="hidden" name="schyear" value="'.$schyear.'">
 <br><tr>
  <td width="203"><h4 class="labe_adus"><center>اسم الامتحان  </center></h4></td>
 <td>
 <b  class="mint-tips" data-title="اختار اسم الامتحان"><select name="name" id="select" >';
    $sql2 = "SELECT DISTINCT Class FROM  material where `Specialty`='IT' and `case`='0'";
  $result2 = $connect-> query ($sql2);
while($table = $result2->fetch_array()){
$lavel=$table['Class'];
echo '<optgroup label="مواد '.$lavel.'">';
$sql = "SELECT * FROM  material where `Specialty`='IT' and `case`='0' and Class='$lavel' ";
$result = $connect-> query ($sql);
		if ($result-> num_rows >= 0 ){
			while ($tableRow = $result->fetch_array()) {
              $name=$tableRow['Ms_name'];
              $name2=explode(",",$name);
				echo '<option value="' . $name2[0]. '"';
				echo '>' .$name2[0]. '</option>';
			}
		}}

  echo'	</select></b>
   </td></tr>
  <tr>
    <td><h4 class="labe_adus"><center>تاريخ الامتحان</center></h4>
    </td><td>
<b  class="mint-tips" data-title="اختار تاريخ الامتحان"><input type="date" name="date" id="textfield_adta"></b></td></tr>
    <tr>
    <td><h4 class="labe_adus"><center>زمن الامتحان</center></h4>
    </td><td>
<b class="mint-tips" data-title="اختار زمن الامتحان"><input type="time" name="time" id="textfield_adta"></b></td></tr>
</table>
</center>
<center>
   <input name="submit" id="submit_adta" type="submit" value="اضافة">
  </center></form></div>';
    ?>
<aside id="aside_ad">
<section id="section_ad">
<a  href="reg_admin.php"><div id="block_ad"><center>
 <img src="img/H.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp; الرئيسية  &nbsp;</h4></center></div></a>
<a  href="addsut.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp;  اضافة طالب  &nbsp;</h4></center></div></a>
<a href="addmaterial.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp;اضافة  مادة </h4></center></div></a>
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
<?php
} }elseif($_SESSION['T_level']=="العميد"){
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