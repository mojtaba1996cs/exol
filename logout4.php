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
width:500px;
margin:auto;
}
label
{
display:inline-block;
width:60px;
font-weight:bold;
vertical-align:top;
}
h1{
color:red;
}
h3{
color:blue;
}
.qaab8{
position: absolute ;
top:0;
bottom: 0;
margin: auto;
left:0;
right: 0;
height: 340px;
width: 900px;
background-color:#03eb11;
border-radius: 10px;
box-shadow:5px 5px 10px 7px rgba(0,0,0,0.3);
color:#333;
font-size: 23px;
padding-left:10px;
font-weight: bold;
font-family: 'Rokkitt', serif;
overflow-y:scroll ;
visibility:visible;
overflow-x:scroll;
}
#close{
right: 0;
color:#040404;
border-radius:50%;
background-color:#03eb11;
}
#close2{
font-size:50px;
border:none;
width:190px;
height:96px;
color:#000000;
  display:inline-block;
}
#close2:hover{
background-color:#000000;
color:#9bf0a0;
border-radius:30px;
}
#close3{
font-size:50px;
border:none;
width:190px;
height:96px;
color:#2b45f5;
display:inline-block;
}
#close3:hover{
background-color:#000000;
color:#9bf0a0;
border-radius:30px;
}
#close:hover{
background-color:#000;
}
body{
background-image:url(img/ss.jpg);
background-repeat:no-repeat;
background-size:100% 1500px;
}
#form{
display:inline-block;
}
</style>
  </head>
  <body>
    <?php
$password=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
if($_SESSION['T_level']=="Teacher"){
?>
<?php
$d=$_GET['id'];
if($d==="check"){
if($password && $level){
session_destroy();
    echo'<script language="javascript">
 swal("تم تسجيل الخروج ",{
 buttons: false,
  timer: 4000,
 icon:"success",
 })
 window.location.href="admin3.php";</script>';
}
else{
echo'<script language="javascript">
swal("الرجاء تسجيل الدخول اولا",{
 buttons: false,
  timer: 4000,
 icon:"info",
})window.location.href="admin3.php";
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
window.location.href="logout4.php?id=check";
  }else{
window.location.href="Teacher_admin.php";
  }
});
</script>';
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