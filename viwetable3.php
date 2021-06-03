<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>جدول امتحان المواد الخاص بك </title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body  dir="rtl">
  <?php
  $id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($id) && !isset($id2))
          {
header("Location:admin3.php");
          }
if($_SESSION['T_level']=="Teacher"){
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
  </div><hr>
 <div id="y_ad"><div id="y2_ad">&nbsp;جدول امتحان المواد الخاصة بك &nbsp;</div>
  &nbsp;|<a href="Teacher_admin.php"><div id="y2">&nbsp;رجوع &nbsp;</div></a>
 &nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id="post_ad">

<?php
include"cont.php";
$a=0;
$r=(time()+7*3600-(60*60*24*365));
$fschyear=date("Y",$r);
$schyear=date("Y")."/".$fschyear;
$sql2=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`='$id' and `T_level`='$id2'  ");
$result2=mysqli_fetch_array($sql2);
$name=$result2['T_name'];
$date2=date("Y-m-d", time()+7*3600);
$sql = "SELECT * FROM  tests where `T_name`='$name' and `case_test`='0' and `schyear`='$schyear' ORDER BY Tes_DATE ASC";
$result = $connect-> query($sql);
echo"<div id='viw'>
  جدول امتحان المواد الخاصة بك للعام الدراسي $schyear
  </div>";
if($result-> num_rows > 0){
echo"<table class='table_mat'><tr class='tr_mat'><th style='width:64px' id='id_mat' class='th_mat'>#</th>
<th style='width:150px' id='mat' class='th_mat'>اسم المادة</th><th style='width:150px' id='name_mat' class='th_mat'>تاريخ الامتحان </th>
<th style='width:100px' id='spe_mat' class='th_mat'>التخصص</th>
<th style='width:100px' id='time_mat' class='th_mat'>الفصل الدراسي</th>
<th style='width:100px' id='spe_mat' class='th_mat'>زمن امتحان المادة</th>
<th style='width:50px' id='time_mat' class='th_mat'>حاله الامتحان </th>";
while($rows = $result->fetch_array()){
$Specialty=$rows["Specialty"];
if($Specialty=="CS"){
  $specialty="علوم حاسوب";
}else{
  $specialty="تقنية معلومات";
}
echo'<tr class="tr_mat">
<td style="width:60px" id="id_mat" class="td_mat">'.++$a.'</td>
<td style="width:150px" id="mat" class="td_mat">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="name_mat" class="td_mat">'.$rows["Tes_DATE"].'</td>
<td style="width:100px" id="spe_mat" class="td_mat">'.$specialty.'</td>
<td style="width:100px" id="time_mat" class="td_mat">'.$rows["Class"].'</td>
<td style="width:100px" id="spe_mat" class="td_mat">'.$rows["Time_test"].'</td>
<td style="width:100px" id="spe_mat" class="td_mat">'.$ttt.'</td></tr>';
}
echo"</table>";

}else{
echo'<center><div id="h2_mat">'. 'لاتوجد مادة  '.'</div></center>';
}
  ?>
</div>
<aside id="aside_ad">
<section id="section_ad">
<a href="addtest.php"><div id="block_ad"><center><img src="img/addqu2.png" width="90" height="78" id="img2"><h4 id="h4_po1"> &nbsp;&nbsp;اضافة اسئلة&nbsp;</h4></center></div></a>
<a  href="viwetable3.php"><div id="block_ad"><center><img src="img/vita.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp; عرض جدول الامتحانات &nbsp;</h4></center></div></a>
<a href="viwearc.php"><div id="block_ad"><center><img src="img/Data.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp;احصائيات </h4></center></div></a>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout4.php">
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
elseif($_SESSION['T_level']=="reg")
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
  ?>
  </body></html>