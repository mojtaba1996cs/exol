<?php
session_start();
ob_start();
?>
<html>
<head>
  <title>ايقاف طالب</title>
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
?>
<?php
include"cont.php";
$id=intval($_GET['id']);
$sql= mysqli_query($connect,"SELECT *  FROM `".$db_name."`.`students` where `Std_id`='$id' ");
$result= mysqli_fetch_array($sql);
  $Std_status="1";
  $id2=$id;
  $name=$result['Std_name'];
$result = mysqli_query($connect,"UPDATE `".$db_name."`.`students` SET  `Std_status` = '$Std_status' WHERE `students`.`Std_id` ='$id2' ");
if ($result){
	echo'<script language="javascript">
    swal("تم تنشيط الطالب  '.$name.'",{
    icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
window.location.href="viwesut3.php";
   }
    });
    </script>';
   } else {
  echo'<script language="javascript">
  swal("فشل التنشيط.. اعاد المحاوله",{
  icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
  window.location.href="viwesut3.php";

  }
  });
  </script>';
}
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