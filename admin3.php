<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>صفحة دخول الاساتذة</title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body dir="rtl">
 <?php
$level2=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(isset($_SESSION['T_pass']) && isset($_SESSION['T_level'])){
header("location:Teacher_admin.php");
}
?>
<div id="header"><a href='en_admin.php' id="img"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/></a></div><hr>
     <?php
  include "time.php";
  ?>
  <div id="qaab3">
  <div class="qaab3">
<form name="admin"  method="post" action="">
   <center> <table  class="admin_table">
 <tr>
      <td width="203"><h4 class="labe_admin">اسم المسؤول</h4></td>
      <td>
    <b  class="mint-tips" data-title="ادخل اسم المسؤول">  <input type="text" name="username" id="textfield_admin"  placeholder="اسم المسؤول"/></b></td>
    </tr>
    <tr>
    <td><h4 class="labe_admin">كلمة المرور</h4></td>
      <td>
    <b class="mint-tips" data-title="ادخل كلمة المرور">  <input type="password" name="password" id="textfield_admin"   placeholder="كلمة المرور"/></b></td>
    </tr>
  </table>
 </center>
  <center>
    <input type="submit" name="submit" id="submit_admin" value="دخول"/>
  </center>
</form>
    </div>
    </div>
    <div class="clearfix"></div>
<footer class="footer-copyright1_admin">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
  </footer>
<?php
include"cont.php";
if($_SERVER['REQUEST_METHOD']== 'POST'){	$username=$_POST['username'];
$password=$_POST['password'];
if($username){
 if($password){
$sql=mysqli_query($connect,"SELECT * FROM `teachers` where T_level='Teacher' and T_name='".$username."'");
$result=mysqli_fetch_array($sql);
$dbid = $result['T_id'];
 $dbuser = $result['T_name'];
 $dbpass = $result['T_pass'];
$level=$result['T_level'];
if($dbuser == $username){
if($dbpass == $password){

    session_start();
  $level2=$result['T_pass'];
    $level=$result['T_level'];
  $_SESSION['T_level']=$level;
  $_SESSION['T_pass']=$level2;
    echo '<script>
 swal("تم تسجيل الدخول بنجاح باسم '.$dbuser.'", {
icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="Teacher_admin.php?name='.$username.'";
  }
});
</script>';
}
else{
echo'
<script language="javascript">
swal("كلمة المرور غير صحيحة", {
  buttons: false,
  timer: 4000,
  icon:"error",
});


</script>';
}
}else{
echo'
<script language="javascript">
swal("اسم المسؤول غير صحيح", {
  buttons: false,
  timer: 4000,
  icon:"error",
});
</script>';
}}else{
 echo'
<script language="javascript">
swal("الرجاء كتابة كلمة المرور", {
  buttons: false,
  timer: 4000,
  icon:"warning",
});
</script>';
}}
else{
echo'
<script language="javascript">
swal("الرجاء كتابة اسم المسؤول", {
  buttons: false,
  timer: 4000,
  icon:"warning",
});
</script>';
}}
mysqli_close($connect);
?>
  </body></html>