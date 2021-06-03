<?php
session_start();
ob_start();
 $id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
?>
<!DOCTYPE html>
<html dir="rtl">
<head>
<title>حذف استاذ</title>
<link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="gg.js"></script>
<style>
body{
width:500px;
margin:auto;
}
label{
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
if(!isset($_SESSION['T_pass'])&&
  !isset($_SESSION['T_level']))
          {
header("Location:admin.php");
          }
if($_SESSION['T_level']=="العميد"){
$d=$_GET['name'];
$id=$_GET['id'];
  try
{
  $db = new PDO('mysql:host=localhost;dbname=exol;charset=utf8', 'root', '');
}
catch(PDOException $e)
{
  die('خطأ : ' . $e->getMessage());
}
$id = isset($_GET['id']) ? (int)$_GET['id'] :
exit('لا يمكنك القيام بهذه العملية');
$query=$db->prepare('SELECT * FROM teachers WHERE T_id = :id ');
 $query->bindValue(':id', $id, PDO::PARAM_INT);
 $query->execute();
$chats = $query->fetch();
$name = htmlspecialchars($chats['T_name']);

//echo $name;

if($d=="check"){
  $query=$db->prepare('DELETE FROM teachers WHERE T_id = :id ');
 $query->bindValue(':id', $id, PDO::PARAM_INT);
 $query->execute();
 $query->CloseCursor();
    if ($query){
echo'<script>
 swal("تم الحذف بنجاح",{
 buttons: false,
  timer: 4000,
 icon:"success",
 });window.location.href="dorup.php";</script>';
}
else{
echo'<script>

swal("لم الحذف",{
buttons: false,
  timer: 4000,
 icon:"error",
})
;window.location.href="dorup.php";</script>';
}
}
  echo '<script>
 swal("هل تريد بالفعل حذف الاستاذ '.$name.'؟", {
icon:"warning",
buttons: {
    cancel: true,
    cancel :"لا",
    confirm: "نعم",
  },
})
.then((willDelete) => {
  if (willDelete) {
window.location.href="DELETE.php?name=check&id='.$id.'";
  }else{
window.location.href="dorup.php";
  }
});
</script>';
    ?>

<?php
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
  ?>
    </body>
  </html>