<?php
session_start();
ob_start();
?>
<html>
 <head>
   <script src="gg.js"></script>
   <style>

   body{
background-image:url(img/ss.jpg);
background-repeat:no-repeat;
background-size:100% 1500px;
      }
   </style>
  </head>
  <body>
    <?php
$pass=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
$id_Qu=($_GET['id_Qu']);//رقم السؤال
$id_test=($_GET['id_test']);
$name_test=($_GET['name_test']);//اسم الامتحان
$type=($_GET['type']);
$y=($_GET['y']);
include "cont.php";
  $sql=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`='$pass' and `T_level`='$level' ");
$result=mysqli_fetch_array($sql);
$name_T=$result['T_name'];
$sql2=mysqli_query($connect,"SELECT * FROM `tests` where `Tes_id`='$id_test'");
  $result2=mysqli_fetch_array($sql2);
$T_name=$result2['T_name'];
 $date=$result2['Tes_DATE'];
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
  if($y==='r'){
    include"cont.php";
 echo '<form action="ahtyar.php" method="post" id="form"> <input type="hidden" name="check" value="ok">';
  if(!isset($_POST['check']))
{
$id_Qu=($_GET['id_Qu']);
  $result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `deg_qu` =0  WHERE `questions`.`Qu_id` ='$id_Qu' ");
    $msg="تم الغاء السؤال ";
if ($result){

    echo'<script language="javascript">
 swal("...'.$msg.' ",{
 icon:"success",
 buttons: false,
 timer: 3000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id_test.'&date='.$date.'";</script>';
}else{
  $msg="لم يتم الغاء السؤال  ";
 echo'<script language="javascript">
 swal(" ...'.$msg.' ",{
 icon:"error",
 buttons: false,
 timer: 3000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id_test.'&date='.$date.'";</script>';
}}
  }else{
  include"cont.php";
 echo '<form action="ahtyar.php" method="post" id="form"> <input type="hidden" name="check" value="ok">';
  if(!isset($_POST['check']))
{
$id_Qu=($_GET['id_Qu']);
  $result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `deg_qu` =1  WHERE `questions`.`Qu_id` ='$id_Qu' ");
    $msg="تم وضع السؤال في الامتحان";
if ($result){

    echo'<script language="javascript">
 swal("...'.$msg.' ",{
 icon:"success",
 buttons: false,
 timer: 3000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id_test.'&date='.$date.'";</script>';
}else{
  $msg="لم يتم وضع السؤال في الامتحان";
 echo'<script language="javascript">
 swal("...'.$msg.' ",{
 icon:"error",
 buttons: false,
 timer: 4000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id_test.'&date='.$date.'";</script>';
}}
?>
<?php
 }}elseif($_SESSION['T_level']=="العميد"){
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