<?php
session_start();
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>صفحة دخول الطلاب</title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" style="border-radius:50%;">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body dir="rtl">
  <?php
  $level2=$_SESSION['Std_name'];
$level=$_SESSION['Std_set'];
if(isset($_SESSION['Std_name']) && isset($_SESSION['Std_set'])){
  header("location:student.php");
}
?>
<div id="header"><a href="index.php" id="img"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" /></a></div><hr>
  <?php
  include "time.php";
  ?>
  <div id="qaab3">
   <div class="qaab3">
<form name="admin"  method="post" action="">
   <center> <table  class="admin_table_stu"> <tr>
      <td width="203">
 <h4 class="labe_en_st">اسم الطالب </h4></td>
      <td >
      <b class="mint-tips" data-title="ادخل اسم الطالب" id="textfield2"> <input type="text" name="username" id="textfield_en_st"  placeholder="اسم الطالب"/></b></td>
    </tr>
    <tr>
      <td><h4 class="labe_en_st">رقم الجلوس</h4></td>
      <td>
       <b class="mint-tips" data-title="ادخل رقم الجلوس" id="textfield2"><input type="text" name="number" id="textfield_en_st"   placeholder="رقم الجلوس" /></b></td>
 </tr>
 </table>
 </center>
  <center>
    <input type="submit" name="submit" id="submit_en_st" value="دخول"/>
</center>
</form>
    </div>
    </div>
    <div class="clearfix"></div>
<footer class="footer-copyright1_en_st">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
<p>
<?php
include"cont.php";
if($_SERVER['REQUEST_METHOD']== 'POST'){	$username=$_POST['username'];
$number=$_POST['number'];
if($username){
 if($number){
$sql=mysqli_query($connect,"SELECT * FROM `students` where `Std_set`='$number'");
$result=mysqli_fetch_array($sql);
$dbuser=$result['Std_name'];
$dbset = $result['Std_set'];
 if($dbset==$number){
 if($dbuser == $username){
    session_start();
$level=$result['Std_set'];
$_SESSION['Std_set']=$level;
$level2=$result['Std_name'];
$_SESSION['Std_name']=$level2;
echo'
<script language="javascript">
swal({
text: "تم تسجيل الدخول باسم '.$result['Std_name'].'.....مرحبا بك",
icon:"success",
html:true
})
.then((willDelete) => {
  if (willDelete) {
window.location.href="student.php";
}});
</script>';
}else{
 echo'
   <script language="javascript">
swal("اسم الطالب غير صحيح", {
  buttons: false,
  timer: 4000,
  icon:"error",
});
</script>';
}
}else{
echo'
   <script language="javascript">
swal("رقم  الجلوس غير صحيح", {
  buttons: false,
  timer: 4000,
  icon:"error",
});
</script>';
}
}else{
echo'
   <script language="javascript">
swal("الرجاء كتابة رقم تلجلوس", {
  buttons: false,
  timer: 4000,
  icon:"info",
});
</script>';
}
}else{
echo'
<script language="javascript">
swal("الرجاء كتابة اسم الطالب", {
  buttons: false,
  timer: 4000,
  icon:"info",
});
</script>';
}}
mysqli_close($connect);
?>
  </p>
  </body>
  </html>