<?php
session_start();
ob_start();
?>
<html>
 <head>
  <title>اضافة طالب</title>
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
//echo $id;
ob_end_flush();
?>
<?php
if (empty($_POST['username'])
  ||empty($_POST['specialty'])
  ||empty($_POST['dv'])){
        echo'<script>
 swal("يرجي ملء كافة الحقول", {
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="addsut.php";
 }
 });
 </script>';
	} else {
include"cont.php";
global $connect;
$specialty=$_POST['specialty'];
  if($specialty=="CS"){
  $id= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_specialty`='$specialty' ");
$id2=mysqli_num_rows($id);
$id3=++$id2;
if($_POST["submit"]){
$username = $_POST['username'];
$class ="الفصل الاول";
$level ="المستوي الاول";
$dv=$_POST['dv'];
$set="$dv"."-"."$id3"."$specialty";
$sql=mysqli_query($connect,"INSERT INTO`".$db_name."`.`students` (
`Std_id` ,
`Std_name` ,
`Std_level` ,
`Std_class`,
`Std_dv`,
`Std_set`,
`Std_specialty`,
`Std_status`
)
VALUES (
null , '$username','$level' ,'$class','$dv','$set','$specialty','1')"
);
if($sql){
	echo'<script language="javascript"> swal(" تم اضافة طالب جديد باسم '.$username.'",{
  icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
 window.location.href="addsut.php";
 }
 });
  </script>';
}
else
echo'<script language="javascript">
swal("...هناك خطا","!لم تتم اضافة ", {
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="addsut.php";
  }
});
</script>';
	}}else{
  $specialty=="IT";
    $id= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_specialty`='$specialty' ");
$id2=mysqli_num_rows($id);
$id3=++$id2;
if($_POST["submit"]){
$username = $_POST['username'];
$class ="الفصل الاول";
$level ="المستوي الاول";
$dv=$_POST['dv'];
$set="$dv"."-"."$id3"."$specialty";
$sql=mysqli_query($connect,"INSERT INTO`".$db_name."`.`students` (
`Std_id` ,
`Std_name` ,
`Std_level` ,
`Std_class`,
`Std_dv`,
`Std_set`,
`Std_specialty`,
`Std_status`
)
VALUES (
null , '$username','$level' ,'$class','$dv','$set','$specialty','1')"
);
if($sql){
echo'<script language="javascript"> swal(" تم اضافة طالب جديد باسم '.$username.'",{
  icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
 window.location.href="addsut.php";
 }
 });
  </script>';
}
else
echo'<script language="javascript">
swal("...هناك خطا","!لم تتم اضافة ", {
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="addsut.php";
  }
});
</script>';
}}}
	?>
<?php
}elseif($_SESSION['T_level']=="العميد"){
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