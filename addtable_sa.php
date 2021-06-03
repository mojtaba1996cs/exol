<?php
session_start();
ob_start();
?>
<html>
<head>
  <title>اضافة مادة </title>
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
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
error_reporting (1);
  $Specialty=($_GET['Specialty']);
  $p=($_GET['p']);
   /*$sql2= mysqli_query($connect,"UPDATE `".$db_name."`.`material` SET  `case` =1 WHERE `material`.`Specialty` ='$Specialty' and `Tes_name`='$Ms_name' ");*/
ob_end_flush();
if (empty($_POST['name'])
  ||empty($_POST['date'])
  ||empty($_POST['time'])){
	echo'<script language="javascript">
    swal("يرجي ملء كافة الحقول", {
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="addtable2.php?sp='.$p.'";
 }
 });
 </script>';
	} else {
include"cont.php";
$Ms_name=$_POST['name'];
$sql2=mysqli_query($connect,"SELECT * FROM `material` where `Ms_name`='$Ms_name' and Specialty='$p'");
$result2=mysqli_fetch_array($sql2);
$Class=$result2['Class'];
$T_name=$result2['Tea_name'];
$Time_test=$result2['Time_test'];
global $connect;
if($_POST["submit"]){
$date = $_POST['date'];
$time2=$_POST['time'];
$time=time($date,$time2)+0*3600;
$e=$time+1800;
$schyear=$_POST['schyear'];
$sql3=mysqli_query($connect,"SELECT * FROM `tests` where `Tes_name`='$Ms_name' and `Class`='$Class' and `Specialty`='$Specialty'  and `schyear`='$schyear' ");
if($sql3-> num_rows >0){
 /* $sql4= mysqli_query($connect,"UPDATE `".$db_name."`.`tests` SET  `Tes_DATE`='$date' , `time`='$time' , `time2`='$e' ,`time3`='$time2' , `case_test` ='0' , `schyear`='$schyear' WHERE `tests`.`Specialty` ='$Specialty' and `Tes_name`='$Ms_name' and `Class`='$Class' ");*/
 echo'<script language="javascript">
    swal("تم اضافة هذا الامتحان من قبل",{
   icon:"info",
})
.then((willDelete) => {
  if (willDelete) {
  window.location.href="addtable2.php?sp='.$p.'";}
  });
  </script>';
}else{
$sql=mysqli_query($connect,"INSERT INTO`".$db_name."`.`tests` (
`Tes_id` ,
`Tes_name` ,
`Tes_DATE` ,
`Class`,
`Specialty`,
`T_name`,
`Time_test`,
`time`,
`time2`,
`time3`,
`case_test`,
`schyear`
)
VALUES (
null , '$Ms_name','$date' ,'$Class','$Specialty','$T_name','$Time_test','$time','$e','$time2','0','$schyear')"
);
  include"cont.php";
   $sql2= mysqli_query($connect,"UPDATE `".$db_name."`.`material` SET  `case` ='1' WHERE `material`.`Specialty` ='$Specialty' and `Ms_name`='$Ms_name' ");
  if($sql2){
  	echo'<script language="javascript">
    swal("'.$Specialty.' تم اضافة امتحان '.$Class.'– تخصص",{
   icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
  window.location.href="addtable2.php?sp='.$p.'";}
  });
  </script>';
}
else
echo'<script language="javascript">
alert("لم تتم الاضافة ... ",{
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
window.location.href="addtable2.php?sp='.$p.'";}
});
</script>';
	}}}
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