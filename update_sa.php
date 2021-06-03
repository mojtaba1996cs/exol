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
$id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin.php");
          }
 $id3=intval($_GET['id']);
if($_SESSION['T_level']=="العميد"){
if(empty($_POST['level'])){
      echo'<script language="javascript">
 swal("الرجاء اختيار المستوي الوظيفي ",{
 icon:"info",
 })
  .then((will) => {
 if (will) {
 window.location.href="update.php?id='.$id3.'";
 }
 });
 </script>';
}else{
include"cont.php";

$sql= mysqli_query($connect,"SELECT *  FROM `".$db_name."`.`teachers` where `T_id`='$id3' ");
$result= mysqli_fetch_array($sql);
if($_POST["submit"]){
$uid =$_POST["id"];
$username =$_POST["username"];
$password =$_POST["password"];
$level =$_POST["level"];
$result = mysqli_query($connect,"UPDATE `".$db_name."`.`teachers` SET  `T_name` = '$username',
`T_pass` = '$password',
 `T_level` = '$level' WHERE `teachers`.`T_id` ='$uid' ");
if ($result){
	echo'<script language="javascript">
    swal("تم التعديل بنجاح",{
     icon:"success",
    })
  .then((will) => {
 if (will) {
 window.location.href="dorup.php";
 }
 });

    </script>';
   } else {
  echo'<script language="javascript">
  swal("لم التعديل",{
     icon:"error",
    })
      .then((will) => {
 if (will) {
 window.location.href="dorup.php";
 }
 });
   </script>';
}}
 mysqli_close($connect);
?>
<?php
}} elseif($_SESSION['T_level']=="reg"){
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
else
{
   echo'<script>
 swal("غير مصرح لك بالدخول الي هذه الصفحة", {
 icon:"info",
 })
 .then((will) => {
 if (will){
 window.location.href="admin3.php";
 }
 });
 </script>';
}
  ?>
    </body></html>