<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>المواد الخاص بي </title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body  dir="rtl">
  <?php
  $id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
$name=$_SESSION['T_name'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
if($_SESSION['T_level']=="Teacher"){
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
 </div><hr>
   <div id="y_ad"><div id='y2_ad'>&nbsp;&nbsp;قائمة المواد الخاصة بك &nbsp;&nbsp;</div>
 &nbsp;|<a href="Teacher_admin.php"><div id="y2_ad">&nbsp;&nbsp; رجوع&nbsp;&nbsp;</div></a>
 &nbsp;|<div id="y2_ad">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id="post_ad">
<div class="qaab5-addtest">
<?php
include"cont.php";                                 $sql2=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`='$id' and `T_level`='$id2' ");
$result2=mysqli_fetch_array($sql2);
$name=$result2['T_name'];
$date2=date("Y-m-d", time()+7*3600);
$sql = "SELECT * FROM  tests where `T_name`='$name' and `case_test`='0' and `Tes_DATE`  > '".$date2."'";
$result = $connect-> query($sql);
$t=0;
  if($result-> num_rows > 0){
 echo "<br>";
echo "<div id='viwe3_adte'>مواد تم وضعها في جدول الامتحانات</div>";
    while($rows = $result->fetch_array()){
     $Tes_name=$rows['Tes_name'];
      $id_test=$rows['Tes_id'];
      $Specialty=$rows['Specialty'];
      $date=$rows['Tes_DATE'];
   echo '<div id="t2_adte"><div id="t_adte">'.++$t.' </div>';
     echo'<div class="mint-tips_adte" data-title="تم وضع هذه المادة في جدول الامتحانات ">';
     echo  $Tes_name.' - تخصص '.$Specialty;
     echo '&nbsp;<a id="h_adte" href="Qu.php?id='.$id_test.' &date='.$date.'&name_test='.$Tes_name.'&y=r">انشاء اسئله</a>';
 echo'</div></div>';
   }}else{

  }
$id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
$name=$_SESSION['T_name']; 
$r=(time()+7*3600-(60*60*24*365));
    $fschyear=date("Y",$r);
    $schyear=date("Y")."/".$fschyear;
include"cont.php";
$sql=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`='$id' and `T_level`='$id2' ");
$result=mysqli_fetch_array($sql);
$name=$result['T_name'];
$date4=date("Y-m-d ",time()+7*3600);
    $sql2 = "SELECT * FROM  tests where `T_name`='$name' and `case_test`='0' and  `Tes_DATE` <= '".$date4."' and  `schyear`='$schyear'";
   $result2 = $connect-> query($sql2);
  if($result2-> num_rows > 0){
    echo "<br>";
   echo "<div id='viwe3_adte'>مواد تم امتحانها يجب ارشفتها</div>";
    while($rows2 = $result2->fetch_array()){
     $Tes_name2=$rows2['Tes_name'];
      $id_test2=$rows2['Tes_id'];
      $Specialty2=$rows2['Specialty'];
      $date3=$rows2['Tes_DATE'];
  echo'<center><div id="viwe_adte">';
echo'<div id="y_adte">'.$Tes_name2.' - تخصص '.$Specialty2.'</div>';
echo "<br>";
echo '<form name="ar" action="addtest.php?id_test='.$id_test2.'&tname='.$Tes_name2.'&taname='.$name.'" method="post">';
     echo "تم امتحان هذه المادة ";
  echo'<input type="submit" id="ar_adte" name="submit" value="ارشفة الامتحان">';
     echo "</form>";
     echo'</div></center>';
  }}
 include"cont.php";
$sql2 = "SELECT * FROM  material where `Tea_name`='$name' and `case`='0' ";
$result2 = $connect-> query($sql2);
  if($result2-> num_rows > 0){
  echo "<div id='viwe3_adte'>مواد لم يتم وضعها في جدول الامتحانات</div>";

while($rows2 = $result2->fetch_array()){
    $Tes_name2=$rows2['Ms_name'];
     $Specialty2=$rows2['Specialty'];
  echo '<div id="t2_adte"><div id="t_adte">'.++$t.' </div>';
   echo'<div class="mint-tips_adte" data-title="لم يتم وضع هذه المادة في جدول الامتحان">';
echo  $Tes_name2.' -تخصص '.$Specialty2;
echo'</div></div>';
 echo "<br>";
  }}
  mysqli_close($connect);
  ob_end_flush();
?>
<br>
</div>
</div>
<aside id="aside_ad">
<section id="section_ad">
<a href="Teacher_admin.php"><div id="block_ad"><center><img src="img/H.png" width="90" height="78" id="img2"><h4 id="h4_po1"> &nbsp;&nbsp;الرئيسية&nbsp;</h4></center></div></a>
<a  href="viwetable3.php"><div id="block_ad"><center><img src="img/vita.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp;&nbsp; عرض جدول الامتحانات &nbsp;</h4></center></div></a>
<a href="viwearc.php"><div id="block_ad"><center><img src="img/Data.png" width="90" height="78" id="img2"><h4 id="h4_po1">&nbsp; احصائيات &nbsp;</h4></center></div></a>
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
  ?>
<?php
include "cont.php";
 if($_POST['submit']){
$id_test2=($_GET['id_test']);
$Tes_name3=($_GET['tname']);
 $name2=($_GET['taname']);
 $sql3=mysqli_query($connect,"SELECT * FROM  material where `Tea_name`='".$name2."' and `Ms_name` ='".$Tes_name3."' ");
  $result5=mysqli_fetch_array($sql3);
   $id_test3=$result5['Ms_id'];
     $case=1;
     $case2=0;
 $result3= mysqli_query($connect,"UPDATE `".$db_name."`.`tests` SET  `case_test` = '$case' WHERE `tests`.`Tes_id`='$id_test2' ");
$result4= mysqli_query($connect,"UPDATE `".$db_name."`.`material` SET  `case` = '$case2' WHERE `material`.`Ms_id` ='$id_test3'  ");
if($result4){
echo'<script language="javascript"> window.location.href="addtest.php";</script>';
}
}
?>
  </body>
  </html>