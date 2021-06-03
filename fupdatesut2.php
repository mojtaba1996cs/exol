<?php
session_start();
ob_start();
?>
<html>
<head>
  <title>نقل الطلاب الي المستوي التالي</title>
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
$id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass'])||
   !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
include"cont.php";
$sql= mysqli_query($connect,"SELECT *  FROM `".$db_name."`.`students` where `Std_status`='1' and `Std_class`='الفصل الرابع' ");
$result=mysqli_fetch_array($sql);
if($result > 0){
    $Std_status="1";
  $Std_level="المستوي الثالث";
$Std_class="الفصل الخامس";
$result2 = mysqli_query($connect,"UPDATE `".$db_name."`.`students` SET  `Std_class` = '$Std_class',`Std_level`='$Std_level' WHERE `students`.`Std_status` ='1' and `Std_class`='الفصل الرابع' ");

if ($result2){
	echo'<script language="javascript">

    swal("تم نقل الطلاب الي  '.$Std_level.'",{
   icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
    window.location.href="viwesut4.php";
    }
    });
    </script>';
   } else {
  echo'<script language="javascript">
  swal("فشل النقل.. اعاد المحاوله",{
 icon:"error",
})
.then((willDelete) => {
  if (willDelete) { window.location.href="viwesut3.php";

  }
  })</script>';

}
}
else
  echo'<script language="javascript">
  swal("لايمكن نقل كل الطلاب لوجود طالب في الفصل الثالث"
,{
icon:"info",
})
.then((willDelete) => {
  if (willDelete) {
  window.location.href="viwesut3.php";
  }
  });
  </script>';
 mysqli_close($connect);
?>
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