<?php
session_start();
ob_start();
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اسئلة الامتحان</title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body  dir="rtl">
  <?php
  $id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
}
$name_test=($_GET['name_test']);//اسم المادة
$Qu=($_GET['Qu']);//اسم السؤال
$id4=($_GET['id']);//رقم الامتحان
$type=($_GET['type']);//نوع السؤال
$date=($_GET['date']);//تاربخ الامتحان
if($_SESSION['T_level']=="Teacher"){
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div><hr>
   <div id="y_qu2"><div id="y2_qu2">&nbsp;&nbsp;&nbsp; اسئلة الامتحان  &nbsp;&nbsp;</div>
&nbsp;|<a href="addtest.php"><div id="y2_qu2">&nbsp;&nbsp;رجوع &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_qu2">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id="post_qu2">
    <div class="qaab6-Qu2">
  <?php
 if($type==="one"){
    ?>
      <div id="no1_qu2"> <form  name ="add" action="" method="post" id="dd" enctype="multipart/form-data">
<?php
    include"cont.php";
 $sql4=mysqli_query($connect,"SELECT * FROM    questions  where Qu='$Qu'");
  $result4=mysqli_fetch_array($sql4);
  $a=$result4['ans1'];
  $b=$result4['ans2'];
  $c=$result4['ans3'];
  $d=$result4['ans4'];
  $Qu=$result4['Qu'];
echo "<div id='Qu_qu2'><hr>السؤال:$Qu<hr></div>";
   echo "<center><table id='filed_qu2'><tr><td colspan='4'><fieldset id='filed_qu2'><legend id='legend2_qu2'><h3>&nbsp;&nbsp;اختار الاجابة   الصحيحة &nbsp;&nbsp;&nbsp</h3></legend>";
    echo'<div class="ul_qu2"><ul dir="rtl">';
 if(!empty($a)){
 echo'<li id="li_qu2">
    <input type="radio" value="'.$a.'"  id="option5" name="ans">
    <label for="option5" id="label_qu2"><b>'.$a.'</b></label>

    <div class="check_qu2" dir="rtl"></div>
  </li> ';
}else{

 }
  if(!empty($b)){
  echo '<li id="li_qu2">
    <input type="radio" value="'.$b.'"  id="option2" name="ans">
    <label for="option2" id="label_qu2"><b>'.$b.'</b></label>

    <div class="check_qu2"><div class="inside"></div></div>
  </li> ';
}else{

  }
if(!empty($c)){
 echo '<li id="li_qu2">
    <input type="radio" value="'.$c.'"  id="option3" name="ans">
    <label for="option3" id="label_qu2"><b>'.$c.'</b></label>
    <div class="check_qu2"><div class="inside"></div></div></li> ';
  }else{
}
 if(!empty($d)){
 echo'<li id="li_qu2"> <input type="radio" value="'.$d.'"  id="option4" name="ans">
    <label for="option4" id="label_qu2"><b>'.$d.'</b></label>

    <div class="check_qu2"><div class="inside"></div></div></li> ';
         }else{
    }
echo '</ul></div><hr>';
      echo "<center><table><tr><td>ارفاق وسائط متعدد للسؤال</td><td><input type='file' name='file'  id='save2_qu2'></td></tr></table></center><hr>";
echo "<br>";
echo "<center><input type='submit' name='up2' value='حفظ' id='save_qu2'></center>";
   echo"</fieldset></td></tr></table></center>";

 if($_POST["up2"]){
 $best=$_POST['ans'];
   if($_FILES['file']['tmp_name']!= "")
{
$file=$_FILES['file']['name'];
$F1=$_FILES['file']['tmp_name'];
   }
move_uploaded_file($F1,"img/imgQu/".$file);
if(!empty($file)){
$instr = fopen($F1, 'rb');
$s=fread($instr,1024);
$image = addslashes($s);
$image= addcslashes ($s,"\0");
}
 $result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `Bestans` = '$best' , `image`='$file' WHERE `questions`.`Qu` ='$Qu' ");
if ($result){
    echo'<center><script language="javascript">
swal("تم تعيين الاجابة الصحيحة .. ",{
 icon:"info",
 buttons: false,
 timer: 2000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id4.'&date='.$date.'&y=r";</script></center>';

}else{
 echo '<script>
  swal("لم يتم تعيين الاجابة الصحيحة.. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}}elseif($type==="mul"){
   echo '<div id="no1_qu2"> <form  name ="add2" action="" method="post" id="dd" enctype="multipart/form-data">';
   include"cont.php";
 $sql4=mysqli_query($connect,"SELECT * FROM    questions  where Qu='$Qu'");
  $result4=mysqli_fetch_array($sql4);
   $a=$result4['ans1'];
  $b=$result4['ans2'];
  $c=$result4['ans3'];
  $d=$result4['ans4'];
  $Qu=$result4['Qu'];
   echo "<div id='Qu_qu2'><hr>السؤال:$Qu<hr></div>";
   echo "<center><table id='filed_qu2'><tr><td colspan='4'><fieldset id='filed_qu2'><legend id='legend2_qu2'><h3>&nbsp;&nbsp; اختار الاجابات  الصحيحة &nbsp;&nbsp;&nbsp;</h3></legend>";
echo'<div class="ul_qu2"><ul dir="rtl">';
    if(!empty($a)){
 echo'<li id="li_qu2">
    <input type="checkbox" value="'.$a.'"  id="option5" name="type">
    <label for="option5" id="label_qu2"><div>'.$a.'</div></label>

    <div class="check_qu2" dir="rtl"></div>
  </li> ';
}else{

 }
  if(!empty($b)){
  echo '<li id="li_qu2">
    <input type="checkbox" value="'.$b.'"  id="option2" name="type2">
    <label for="option2" id="label_qu2"><div>'.$b.'</div></label>

    <div class="check_qu2"><div class="inside"></div></div>
  </li> ';
}else{

  }
if(!empty($c)){
 echo '<li id="li_qu2">
    <input type="checkbox" value="'.$c.'"  id="option3" name="type3">
    <label for="option3" id="label_qu2"><div>'.$c.'</div></label>
    <div class="check_qu2"><div class="inside"></div></div></li> ';
  }else{
}
 if(!empty($d)){
 echo'<li id="li_qu2"> <input type="checkbox" value="'.$d.'"  id="option4" name="type4">
    <label for="option4" id="label_qu2"><div>'.$d.'</div></label>

    <div class="check_qu2"><div class="inside"></div></div></li> ';
         }else{

    }
echo '</li></ul></div><hr>';
  echo "<center><table><tr><td>ارفاق وسائط متعدد للسؤال</td><td><input type='file' name='file'  id='save2_qu2'></td></tr></table></center><hr>";
echo "<br>";
echo "<center><input type='submit' name='up' value='حفظ' id='save_qu2'></center>";
     echo"</fieldset></td></tr></table></center>";
 if($_POST["up"]){
   if($_FILES['file']['tmp_name']!= "")
{
$file=$_FILES['file']['name'];
$F1=$_FILES['file']['tmp_name'];
   }
move_uploaded_file($F1, "img/imgQu/".$file);
if(!empty($file)){
$instr = fopen($F1, 'rb');
$s=fread($instr,1024);
$image = addslashes($s);
$image= addcslashes ($s,"\0");
}else{}
 $best=$_POST['type'];
 $best2=$_POST['type2'];
 $best3=$_POST['type3'];
 $best4=$_POST['type4'];
 if(isset($best)){
   $t1=1;
 }else{
   $t1=0;
 }
   if(isset($best2))
   {
     $t2=1;
   }else{
     $t2=0;
   }
   if(isset($best3))
   {
     $t3=1;
   }else{
     $t3=0;
   }
   if(isset($best4))
   {
     $t4=1;
   }else{
     $t4=0;
   }
  $t5=$t1+$t2+$t3+$t4;
$result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `Bestans` = '$best' ,`Bestans2`='$best2' , `Bestans3`='$best3' ,  `Bestans4`='$best4' ,`t`='$t5',`image`='$file' WHERE `questions`.`Qu` ='$Qu' ");
if ($result){
    echo'<center><script language="javascript">
swal("تم تعيين الاجابة الصحيحة .. ",{
 icon:"info",
 buttons: false,
 timer: 2000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id4.'&date='.$date.'&y=r";</script></center>';

}else{
echo '<script>
  swal("لم يتم تعيين الاجابة الصحيحة.. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}
?>
</form></div>&nbsp;</div>&nbsp;&nbsp;</div>
<?php
  }else{
   echo '<div id="no1_qu2"> <form  name ="add3" action="" method="post" id="dd" enctype="multipart/form-data">';
   include"cont.php";
 $sql4=mysqli_query($connect,"SELECT * FROM    questions  where Qu='$Qu'");
  $result4=mysqli_fetch_array($sql4);
  $a=$result4['ans1'];
  $b=$result4['ans2'];
  $Qu=$result4['Qu'];
echo "<div id='Qu_qu2'><hr>السؤال:$Qu<hr></div>";
   echo "<center><table id='filed_qu2'><tr><td colspan='4'><fieldset id='filed_qu2'><legend id='legend2_qu2'><h3>&nbsp;&nbsp; اختر صواب او خطا
       &nbsp;&nbsp;&nbsp;</h3></legend>";
echo'<div class="ul_qu2"><ul dir="rtl">';
 if(!empty($a)){
 echo'<li id="li_qu2">
    <input type="radio" value="'.$a.'"  id="option5" name="ans">
    <label for="option5" id="label_qu2"><b>'.$a.'</b></label>

    <div class="check_qu2" dir="rtl"></div>
  </li> ';
}else{

 }
  if(!empty($b)){
  echo '<li id="li_qu2">
    <input type="radio" value="'.$b.'"  id="option2" name="ans">
    <label for="option2" id="label_qu2"><b>'.$b.'</b></label>

    <div class="check_qu2"><div class="inside"></div></div>
  </li> ';
}else{

  }
   echo '</li></ul></div><hr>';
echo "<center><table><tr><td>ارفاق وسائط متعدد للسؤال</td><td><input type='file' name='file'  id='save2_qu2'></td></tr></table></center><hr>";
echo "<br>";
echo "<center><input type='submit' name='up3' value='حفظ' id='save_qu2'></center>";
   echo"</fieldset></td></tr></table></center>";
 if($_POST["up3"]){
 $best=$_POST['ans'];
   if($_FILES['file']['tmp_name']!= "")
{
$file=$_FILES['file']['name'];
$F1=$_FILES['file']['tmp_name'];
   }
move_uploaded_file($F1, "img/imgQu/".$file);
if(!empty($file)){
$instr = fopen($F1, 'rb');
$s=fread($instr,1024);
$image = addslashes($s);
$image= addcslashes ($s,"\0");
}
 $result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `Bestans` = '$best', `image`='$file'  WHERE `questions`.`Qu` ='$Qu' ");
if ($result){
    echo'<center><script language="javascript">
 swal("تم تعيين الاجابة الصحيحة .. ",{
 icon:"info",
 buttons: false,
 timer: 2000,
 });
window.location.href="Qu.php?name_test='.$name_test.'&id='.$id4.'&date='.$date.'&y=r";</script></center>';

}else{
  echo '<script>
  swal("لم يتم تعيين الاجابة الصحيحة.. ",{
 icon:"error",
 buttons: false,
 timer: 2000,
 }); </script>';
}}}}elseif($_SESSION['T_level']=="العميد"){
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