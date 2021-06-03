<?php
session_start();
ob_start();
?>
<html>
<head>
  <title>تعديل بياناتي</title>
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
$id=$_SESSION['T_passw'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass'])||
   !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
include"cont.php";
$sql= mysqli_query($connect,"SELECT *  FROM `".$db_name."`.`teachers` where `T_id`='$id' ");
$result= mysqli_fetch_array($sql);
if($_POST["submit"]){
$uid =$_POST["id"];
$username =$_POST["username"];
$password =$_POST["password"];
$level =$_POST["level"];
$result = mysqli_query($connect,"UPDATE `".$db_name."`.`teachers` SET  `T_name` = '$username',
`T_pass` = '$password' WHERE `teachers`.`T_level` ='$id2' ");
if ($result){
echo '<script>
 swal("تم التعديل بنجاح", {
icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="po2.php";
  }
});
</script>';
   } else {
echo '<script>
 swal("لم يتم التعديل", {
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="myupdate2.php";
  }
});
</script>';
}}
 mysqli_close($connect);
?>
<?php
}
elseif($_SESSION['T_level']=="العميد"){
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