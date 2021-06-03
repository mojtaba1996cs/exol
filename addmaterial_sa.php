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
ob_end_flush();
if (empty($_POST['name'])
  ||empty($_POST['specialty'])
  ||empty($_POST['class'])
  ||empty($_POST['time'])
  ||empty($_POST['Teacher'])){
  echo'<script>
 swal("يرجي ملء كافة الحقول", {
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="addmaterial2.php";
 }
 });
 </script>';
	} else {
include"cont.php";
$T_name=$_POST['Teacher'];
$sql2=mysqli_query($connect,"SELECT * FROM `teachers` where `T_name`='$T_name'");
$result2=mysqli_fetch_array($sql2);
$T_id=$result2['T_id'];
global $connect;
if($_POST["submit"]){
$username = $_POST['name'];
$class=$_POST['class'];
$specialty=$_POST['specialty'];
$time=$_POST['time'];
$sql=mysqli_query($connect,"INSERT INTO`".$db_name."`.`material` (
`Ms_id` ,
`Ms_name` ,
`Class` ,
`Tea_name`,
`Tea_id`,
`Specialty`,
`Time_test`,
`case`
)
VALUES (
null , '$username','$class' ,'$T_name','$T_id','$specialty','$time','0')"
);
if($sql){
	echo'<script language="javascript">
    swal("'.$specialty.' تم اضافة  مادة باسم '.$username.' ..  تخصص ",{
    icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
    window.location.href="addmaterial2.php?class='.$class.'&spe='.$specialty.'";
    }
    });
    </script>';

}
else
echo'<script language="javascript">
swal("فشلت الاضافة ... ",{
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
window.location.href="addmaterial.php";
}
});
</script>';
	}}
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