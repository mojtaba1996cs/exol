<?php
session_start();
ob_start();
$level2=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(isset($_SESSION['T_pass']) && isset($_SESSION['T_level'])){
  header("location:reg_admin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>صفحة دخول المسجل </title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body dir="rtl">

<div id="header"><a href="en_admin.php" id="img"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
</a> </div><hr>
    <?php
  include "time.php";
  ?>
  <div id="qaab3">
<div class="qaab3">
<form name="admin"  method="post" action="" id="form">
   <center> <table  class="admin_table">
 <tr>
<td width="203"><h4 class="labe_admin">اسم المسؤول</h4></td>
      <td>
<b class="mint-tips" data-title="ادخل اسم المسؤول" ><input type="text" name="username" id="textfield_admin"  placeholder="اسم المسؤول"/></b></td></tr><tr>
<td><h4 class="labe_admin" >كلمة المرور</h4></td>
<td>
     <b class="mint-tips" data-title="ادخل كلمة المرور"> <input type="password" name="password" id="textfield_admin"   placeholder="كلمة المرور" /></b></td>
    </tr>
  </table>
 </center>
  <center>
<input type="submit" name="submit" id="submit_admin" value="دخول"/>
  </center>
</form></div></div>
<div class="clearfix"></div>
<footer class="footer-copyright1_admin">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
  </footer>
<?php
include"cont.php";
if($_SERVER['REQUEST_METHOD']== 'POST'){
	$username=$_POST['username'];
	$password=$_POST['password'];
if($username){
 if($password){
$sql=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`=".$password." and T_level='reg'");
$result=mysqli_fetch_array($sql);

   $dbid = $result['T_id'];
   $dbuser = $result['T_name'];
   $dbpass = $result['T_pass'];
   $level=$result['T_level'];
   if($dbpass == $password){
 if($dbuser == $username){
    session_start();
  $level2=$result['T_pass'];
    $level=$result['T_level'];
    $_SESSION['T_level']=$level;
  $_SESSION['T_pass']=$level2;
   if($dbpass==$password && $dbuser==$username){
   echo '<script>
 swal("تم تسجيل الدخول بنجاح باسم '.$dbuser.'", {
icon:"success",
})
.then((willDelete) => {
  if (willDelete) {
   window.location.href="reg_admin.php";
  }
});
</script>';
}
else
{
echo'
<script language="javascript">
swal("هنالك خظا","اسم المسؤول وكلمة المرور غير متطابقين" {
  buttons: false,
  timer: 4000,
  icon:"warning",

});
</script>';
}
}
else
{
echo'
<script language="javascript">
swal("اسم المسؤول غير صحيح", {
  buttons: false,
  timer: 4000,
  icon:"error",
});


</script>';
}
}
else
{
  echo'
<script language="javascript">
swal("كلمة المرور  غير صحيحه", {
  buttons: false,
  timer: 4000,
  icon:"error",
});
</script>';
}
}
else
{
  echo'
<script language="javascript">
swal("الرجاء كتابة كلمة المرور", {
  buttons: false,
  timer: 4000,
  icon:"warning",
});
</script>';
}
}
else
{
  echo'
<script language="javascript">
swal("الرجاء كتابة اسم المسؤول", {
  buttons: false,
  timer: 4000,
  icon:"warning",
});
</script>';
}
}
mysqli_close($connect);
?>
  </body>
  </html>