<?php
session_start();
ob_start();
?>
<html>
 <head>
       <title>تعديل بياناتي</title>
 <link rel="shortcut icon" href="img/rr3.jpg">
 <link href="style.css" rel="stylesheet" type="text/css" media="screen">
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
if(!isset($_SESSION['T_pass'])&&
   !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
if($_SESSION['T_level']=="Teacher"){
?>
<?php
include"cont.php";
$sql= mysqli_query($connect,"SELECT *  FROM `".$db_name."`.`teachers` where `T_pass`='$id' and T_level='$id2' ");
$result= mysqli_fetch_array($sql);
if($_POST["submit"]){
$uid =$_POST["id"];
$username =$_POST["username"];
$password =$_POST["password"];
$level =$_POST["level"];
$result = mysqli_query($connect,"UPDATE `".$db_name."`.`teachers` SET  `T_name` = '$username',
`T_pass` = '$password' WHERE `teachers`.`T_level` ='$id2' and T_pass='$id' ");
if ($result){
 $_SESSION['T_pass']=$password;
   echo '<script>
 swal("تم التعديل بنجاح", {
icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="po3.php";
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
   window.location.href="myupdate3.php";
  }
});
</script>';
}}
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
 window.location.href="admin2.php";
 }
 });
 </script>';
}
  ?>
    </body>
  </html>