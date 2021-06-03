<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<title>حذف سؤال</title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/krare.jpg">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
    <style>
      body
      {
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
      h1
      {
        color:red;
      }
      h3
      {
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
    background-color:#44781b;
    font-size: 28px;
    width:133px;
    height:46px;
    right: 0;
    color:white;
    border:none;
    }
      #close2{
        background-color:#128107;
        font-size:40px;
        border:none;
        width:140px;
        height:66px;
        color:#fff;
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
    <script type="text/javascript">

    </script>
  </head>
  <body>
  <?php
$pass=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
$id_Qu=($_GET['id_Qu']);//رقم السؤال
$id_test=($_GET['id_test']);
$name_test=($_GET['name_test']);//اسم الامتحان
$case=($_GET['case']);
$type=($_GET['type']);
include "cont.php";
  $sql=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`='$pass' and `T_level`='$level' ");
$result=mysqli_fetch_array($sql);
$name_T=$result['T_name'];
$sql2=mysqli_query($connect,"SELECT * FROM `tests` where `Tes_id`='$id_test'");
  $result2=mysqli_fetch_array($sql2);
$T_name=$result2['T_name'];
if($T_name != $name_T){
echo'<script>
 swal("انت لست استاذ هذا الامتحان", {
 icon:"info",
 buttons: false,
 timer: 4000,
 });window.location.href="admin3.php";
 </script>';
}else{
if(!isset($id_test)){
 echo'<script language="javascript">
 swal("ليس لديك امتحان لكي تتضع له اسئلة .. ",{
 icon:"info",
 buttons: false,
 timer: 4000,
 });window.location.href="addtest.php";</script>';
}
elseif($_SESSION['T_level']=="Teacher"){
$d=$_GET['name'];
$id_Qu=$_GET['id'];
  try
{
  $db = new PDO('mysql:host=localhost;dbname=exol;charset=utf8', 'root', '');
}
catch(PDOException $e)
{
die('خطأ : ' . $e->getMessage());
}
$id_Qu = isset($_GET['id_Qu']) ? (int)$_GET['id_Qu'] :
exit('لا يمكنك القيام بهذه العملية');
if($d=="check"){
$name_test=($_GET['name_test']);
$query=$db->prepare('DELETE FROM questions WHERE Qu_id= :Qu_id ');
 $query->bindValue(':Qu_id', $id_Qu, PDO::PARAM_INT);
 $query->execute();
 $query->CloseCursor();

if ($query){
echo'<script>
 swal("تم الحذف بنجاح",{
 buttons: false,
  timer: 4000,
 icon:"success",

 });window.location.href="Qu.php?id='.$id_test.'&name_test='.$name_test.'";</script>';
}
else{
echo'<script>
swal("لم الحذف",{
buttons: false,
  timer: 4000,
 icon:"error",
});window.location.href="Qu.php?id='.$id_test.'&name_test='.$name_test.'";</script>';
}
}
  echo '<script>
 swal("هل تريد بالفعل حذف السؤال ؟", {
icon:"warning",
buttons: {
    cancel: true,
    cancel :"لا",
    confirm: "نعم",
  },
})
.then((willDelete) => {
  if (willDelete) {
window.location.href="deleQu.php?id_Qu='.$id_Qu.'&id_test='.$id_test.'&name_test='.$name_test.'&name=check";
  }else{
window.location.href="Qu.php?id='.$id_test.'&name_test='.$name_test.'";
  }
});
</script>';
  ?>
<?php
}elseif($_SESSION['T_level']=="العميد"){
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
}}
  ?>
    </body></html>