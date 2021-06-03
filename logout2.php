<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html dir="rtl">

  <head>
    <title>تسجيل خروج</title>
      <link rel="shortcut icon" href="img/krare.jpg">
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
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
$d=$_GET['id'];
if($d==="check"){
if($id && $id2){
unset($id);
unset($id2);
session_destroy();
    echo'<script language="javascript">
 swal("تم تسجيل الخروج ",{
 buttons: false,
  timer: 4000,
 icon:"success",
 })
 window.location.href="en_student.php";</script>';
}
else{
echo'<script language="javascript">
swal("الرجاء تسجيل الدخول اولا",{
 buttons: false,
  timer: 4000,
 icon:"info",
});
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
window.location.href="logout2.php?id=check";
  }else{
window.location.href="student.php";
  }
});
</script>';
    ?>
 </body>
</html>