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
if($_SESSION['T_level']=="العميد"){
if (empty($_POST['username']) || empty($_POST['password'])|| empty($_POST['level'])){
        echo'<script>
 swal("يرجي ملء كافة الحقول", {
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="adduser.php";
 }
 });
 </script>';
	} else {
include"cont.php";
global $connect;
if($_POST["submit"]){
$username = $_POST['username'];
$password = $_POST['password'];
$sql2= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`teachers` where `T_pass`='$password' ");
$sql3= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`teachers` where `T_name`='$username' ");
 $date=mysqli_fetch_array($sql2);
  $date2=mysqli_fetch_array($sql3);
 $name=$date2['T_name'];
   $pass=$date['T_pass'];
$level = $_POST['level'];
if($name == $username){
  echo '<script>
 swal("اسم المستخدم موجود","الرجاء اختيار اسم مستخدم اخر",{
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="adduser.php";
  }
  });
</script>';
}
elseif($pass == $password){
  echo '<script>
 swal("كلمة المرور موجودة","الرجاء اختيار كلمة مرور اخري", {
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="adduser.php";
  }
  });
  </script>';
}else{
$sql=mysqli_query($connect,"INSERT INTO`".$db_name."`.`teachers` (
`T_id` ,
`T_name` ,
`T_pass` ,
`T_level`
)
VALUES (
null , '$username','$password' ,'$level')"
);

if($sql){
   echo '<script>
 swal("تم اضافة استاذ جديد باسم '.$username.'", {
icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="adduser.php";
  }
});
</script>';
}
else
  echo '<script>
 swal("...هناك خطا","!لم تتم اضافة ", {
icon:"error",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="adduser.php";
  }
});
</script>';
	}}?>
<?php
} }elseif($_SESSION['T_level']=="reg"){
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
    </body>
  </html>