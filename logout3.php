<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html dir="rtl">

  <head>
    <title>تسجيل خروج</title>
    <script src="gg.js"></script>
      <link rel="shortcut icon" href="img/krare.jpg">
 <link href="style.css" rel="stylesheet" type="text/css" media="screen">
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
$password=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin.php");
          }
if($_SESSION['T_level']=="العميد"){
?>
<?php
$d=$_GET['id'];
if($d==="check"){
if($password && $level){
unset($password);
unset($level);
session_destroy();
  if(empty($password) && empty($level)){
    echo'<script language="javascript">
 swal("تم تسجيل الخروج ",{
 buttons: false,
  timer: 4000,
 icon:"success",
 })
 window.location.href="admin.php";</script>';
}else{
    echo'<script language="javascript">
 swal("لم يتم حذف الجلسه",{
 buttons: false,
  timer: 4000,
 icon:"success",
 })
 window.location.href="pcm.php";</script>';
}
}else{
echo'<script language="javascript">
swal("الرجاء تسجيل الدخول اولا",{
 buttons: false,
  timer: 4000,
 icon:"info",
})window.location.href="admin.php";
</script>';
}}

echo '<script>
 swal("هل تريد تسجيل الخروج ؟", {
icon:"warning",
buttons: {
    cancel: true,
    cancel :"لا",
    confirm: "نعم",
  },
})
.then((willDelete) => {
  if (willDelete) {
window.location.href="logout3.php?id=check";
  }else{
window.location.href="pcm.php";
  }
});
</script>';
} elseif($_SESSION['T_level']=="reg"){
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
ob_end_flush();
?>
    </body>
  </html>