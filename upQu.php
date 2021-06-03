<?php
session_start();
ob_start();
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
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل سؤال </title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
#submit{
background-color:#18a70c;
box-shadow:5px 5px 10px 7px rgba(0,0,0,0.3);
border-radius:15px;
width:100px;
height:50px;
margin:-10px 80px 0px 0px;
font-size:26px;
color:#9d0a0a;
}
#textfield{
border-radius:1000px;
width: 382px;
border-color: #0fea47;
height:45px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
border:2px solid #b1b5b2;
}
#textfield2{
border-radius: 10px;
width: 374px;
border-color: #0fea47;
height:80px;
text-align:center;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
border:2px solid #b1b5b2;
}
#textfield3{
border-radius: 1000px;
width: 774px;
border-color: #0fea47;
height:45px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
border:2px solid #b1b5b2;
}
#textfield:focus{
outline:0px;
border:2px solid #37f58c;
}
#textfield2:focus{
outline:0px;
border:2px solid #37f58c;
}
#textfield3:focus{
outline:0px;
border:2px solid #37f58c;
}
h1{
color:#9d0a0a;
}
h4{
color:#9d0a0a;
}
#block{
background-color:#128409;
margin: 8px 0px;
height: 60px;
padding: 5px;
border-radius: 10px;
box-shadow:5px 5px 5px 5px rgba(0,0,0,0.3);
}
.footer-copyright1{
border-radius: 7px 7px 7px 7px;
padding: 10px;
border: 2px solid #000;
width: 100%;
height: 22px;
margin: 7px 0px 0px 0px ;
}
#viwe{
background-color:#128409;
margin: 8px 0px;
height: 100px;
padding: 16px;
width:290px;
margin:12px 5px 0px 0px ;
border-radius: 10px;
box-shadow:5px 5px 5px 5px rgba(0,0,0,0.3);
text-align:center;
overflow-x:scroll;
overflow-y:scroll;
}
.qaab6{
top:0;
bottom: 0;
margin:40px 40px 0px 0px ;
left:0;
right: 0;
height:800px;
width:90%;
background-color:#256d06;
border-radius: 10px;
box-shadow:5px 5px 10px 7px #256d06;
font-size: 23px;
padding-left:10px;
font-weight: bold;
font-family: 'Rokkitt', serif;
overflow-y:scroll ;
overflow-x:scroll;
border: 2px solid #fff;
background-image:url(img/rr.webp);
background-repeat: no-repeat;
background-size:100% 901px;
visibility:visible;
color:#8b0808;
}
#post{
background-image:url(img/ss.jpg);
background-repeat:no-repeat;
background-size:100% 1500px;
width:100%;
height:1300px;
overflow-y:scroll ;
overflow-x:scroll;
border-radius: 10px;
box-shadow:5px 5px 10px 7px #fff;
margin-top:7px;
}
#save{
background-color:#0c9a0f;
margin:10px 100px 0px 0px;
width:190px;
height:50px;
overflow-y:scroll;
border-radius:10px;
font-size:27px;
}

#save2{
background-color:#0c9a0f;
margin:10px 0px 0px 0px;
width:300px;
border-radius:100px;
padding: 16px;
margin:1px 54px 0px 0px ;
text-align:center;
border-color:#000;
}
#save3{
background-color:#0c9a0f;
margin:10px 0px 0px 0px;
width:80px;
border-radius:10px;
padding: 2px;
margin:1px 0px 0px 0px ;
text-align:center;
border-color:#000;
}
#end{
background-color:#fff;
margin:10px 560px 0px 0px;
width:300px;
overflow-y:scroll;
padding:3px;
border-radius:10px;
}
#label:after{
content:"*";
color:red;
}
#label2:after{
content:"*";
color:red;
}
#label{
background-color:#37f58c;
height:83px;
text-align:center;
border-radius:10px;
}
#label2{
background-color:#37f58c;
}
#label3{
background-color:#37f58c;
}
#fiel{
background-color:#048807;
border-color:#000;
}
#save4{
margin:10px 60px 0px 0px;
border-radius:10px;
background-color:#0c9a0f;
width:160px;
height:50px;
overflow-y:scroll;
border-radius:10px;
font-size:27px;
}
#filed{
width:655px
}
#Qu{
background-color:#37f58c;
height:66px;
border-radius:10px;
}
#save2{
margin:10px 0px 0px 0px;
border-radius:10px;
background-color:#0c9a0f;
width:360px;
height:50px;
overflow-y:scroll;
border-radius:10px;
font-size:27px;
}
#img{
border-radius:50%;
margin:8px 6px 0px 0px;
}
#y2{
display:inline-block;
background-color:#128409;
border-radius:15px 0px 0px 15px;
padding:2px;
margin-bottom:-10px;
height:25px;
margin-bottom:-10px;
border:1px solid #8eee87;
font-weight: bold;
font-family: 'Rokkitt', serif;
}
#y2:hover{
background-color:#f5f574;
border:1px solid #a8ac41;
color:#9d0a0a;
}
#y{
display:inline-block;
background-color:#4a9e4a;
width:955px;
border-radius:10px;
padding:2px;
border-radius:15px 0px 0px 15px;
}
#legend{
background-color:#e5b311;
border-radius:15px 0px 0px 15px;
padding:2px;
}
</style>
</head>
<body  dir="rtl">
<?php
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
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
 </div><hr>
   <div id="y_qu"><div id="y2_qu">&nbsp;&nbsp;&nbsp; تعديل سؤال  &nbsp;&nbsp;</div>
 &nbsp;|&nbsp;&nbsp;<?php echo '<a href="viweQu.php?id_test='.$id_test.'&name_test='.$name_test.'&id_Qu='.$id_Qu.'"><div id="y2_qu">&nbsp;&nbsp;&nbsp;رجوع &nbsp;&nbsp;&nbsp;</div></a>';?>
&nbsp;|&nbsp;&nbsp;<div id="y2_qu">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<?php
if($case==1){
  ?>
  <div id='post_qu'>
    <div class="qaab6_qu">
      <?php
include"cont.php";
$sql4=mysqli_query($connect,"SELECT * FROM    questions  where  Qu_id='$id_Qu'");
$result4=mysqli_fetch_array($sql4);
$type2=$result4['type_Qu'];
$Qu=$result4['Qu'];
$ans1=$result4['ans1'];
$ans2=$result4['ans2'];
$ans3=$result4['ans3'];
$ans4=$result4['ans4'];   $bestans=$result4['Bestans'];
$deg=$result4['deg_qu'];
$type2=$result4['type_Qu'];
if($type2=="one"){
$type3="سؤال لاختيار اجابة واحدة فقط";
}elseif($type2=="mul"){
$type3="سؤال لاختيار اكثر من اجابة واحدة";
}elseif($type2=="eoc"){
$type3="سؤال لاختيار الصواب والخطا";
}
?>
<form  name ="add" action="" method="post" id="dd" enctype="application/x-www-form-urlencoded-2">
<table><input type="hidden" name="id_Qu" value="<?php echo $id_Qu ; ?>">
<tr>
 <td style="width:140px;"><div id="label_qu">&nbsp;السؤال</div></td><td colspan="2"><textarea name="Qu" id="textfield2_qu" cols="44" rows="32" required><?php echo $Qu;?></textarea></td></tr>
  <tr><td><div id="label2_qu">&nbsp;نوع السؤال&nbsp;</div></td><td><select name="type" id="textfield_qu" size="8" >
<?php echo '<option value="'.$type2.'" selected>  '.$type3.'</option>';
 echo '<optgroup label="تغيير نوع السؤال"></optgroup>';
?>
   <option value="one">سؤال لاختيار اجابة واحدة فقط</option>
    <option value="mul">سؤال لاختيار اكثر من اجابة</option>
    <option value="eoc">سؤال لاختيار الصواب والخطا</option></select></td></tr>
<tr><td colspan="4"><fieldset id="fieldset_qu"><legend id="legend_qu">&nbsp;&nbsp;خيارات السؤال
&nbsp;&nbsp;</legend><div id="label2_qu">&nbsp;
الخيار1&nbsp;</div><input type="text" name="A" id="textfield3_qu" required value="<?php echo $ans1; ?>"><div id="label2_qu">&nbsp;
الخيار2&nbsp;</div><input type="text" name="B" id="textfield3_qu" required value="<?php echo $ans2; ?>">
<div id="label3_qu">&nbsp;
الخيار3&nbsp;</div><input type="text" name="C" id="textfield3_qu" value="<?php echo $ans3;?>">
<div id="label3_qu">&nbsp; الخيار4&nbsp;</div><input type="text" name="D" id="textfield3_qu" value="<?php echo $ans4; ?>">
</fieldset></td> </tr></table>
<hr>
<input  id="save5_qu" type="submit" name="submit" value="تعديل">
    <hr>
  </form>&nbsp;&nbsp;&nbsp;</div>&nbsp;&nbsp;&nbsp;</div>
<?php
 include"cont.php";
if($_POST["submit"]){
$id_Qu=$_POST['id_Qu'];
$Qu=$_POST['Qu'];
$deg=$_POST['deg'];
$a=$_POST['A'];
$b=$_POST['B'];
$C=$_POST['C'];
$d=$_POST['D'];
$type=$_POST['type'];
 $sql= mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `Qu` = '$Qu' ,`ans1`='$a' , `ans2`='$b' ,  `ans3`='$C' ,`ans4`='$d' ,`deg_qu`='$deg',`type_Qu`='$type' WHERE `questions`.`Qu_id` ='$id_Qu' ");
if($sql){
  echo'<center><script language="javascript">
  swal("تم التعديل بنجاح.. ",{
 icon:"success",
 buttons: false,
 timer:2000,
 });window.location.href="upQu.php?id_test='.$id_test.'&Qu='.$Qu.'&type='.$type.'&case=2&name_test='.$name_test.'";</script></center>';
}else{
  echo '<script>
  swal("لم يتم التعديل .. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}}elseif($case==2){
if($type=="one"){
    ?>
    <div id='post_qu'><div class="qaab6_qu"><div class="qaab6-Qu2"><form  name ="add" action="" method="post" id="dd" enctype="multipart/form-data">
<?php
    include"cont.php";
   $Qu=($_GET['Qu']);
 $sql4=mysqli_query($connect,"SELECT * FROM    questions  where Qu='$Qu'");
  $result4=mysqli_fetch_array($sql4);
  $a=$result4['ans1'];
  $b=$result4['ans2'];
  $c=$result4['ans3'];
  $d=$result4['ans4'];
  $Qu=$result4['Qu'];
echo "<div id='Qu_qu2'><hr>السؤال:$Qu<hr></div>";
echo "<center><table id='filed_qu2'><tr><td colspan='4'><fieldset id='filed_qu2'><legend id='legend2_qu2'><h3>&nbsp;&nbsp;اختار الاجابة   الصحيحة &nbsp;&nbsp;</h3></legend>";
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
     echo"</fieldset></td></tr></table>";
 if($_POST["up2"]){
 $best=$_POST['ans'];
 $best2=0;
 $best3=0;
 $best4=0;
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
 $result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `Bestans` = '$best' ,`image`='$file'  WHERE `questions`.`Qu` ='$Qu' ");
if ($result){
    echo'<script language="javascript">
swal("تم  تعيين الاجابة الصحيحة.. ",{
 icon:"info",
 buttons: false,
 timer:2000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id_test.'&date='.$date.'";</script>';
}else{
  echo '<script>
  swal("لم يتم تعيين الاجابة الصحيحة.. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}
?>
</form></div>&nbsp;&nbsp;&nbsp;</div>&nbsp;&nbsp;</div>
<?php
}elseif($type=="mul") {
  ?>
<div id='post_qu'><div class="qaab6_qu"><div class="qaab6-Qu2"><form  name ="add" action="" method="post" id="dd" enctype="multipart/form-data">
 <?php
   include"cont.php";
   $Qu=($_GET['Qu']);
 $sql4=mysqli_query($connect,"SELECT * FROM    questions  where Qu='$Qu'");
  $result4=mysqli_fetch_array($sql4);
   $a=$result4['ans1'];
  $b=$result4['ans2'];
  $c=$result4['ans3'];
  $d=$result4['ans4'];
  $Qu=$result4['Qu'];
   echo "<div id='Qu_qu2'><hr>السؤال:$Qu<hr></div>";
   echo "<center><table id='filed_qu2'><tr><td colspan='4'><fieldset id='filed_qu2'><legend id='legend2_qu2'><h3>&nbsp;&nbsp;اختار الاجابات  الصحيحة &nbsp;&nbsp;&nbsp;</h3></legend>";
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
echo"</fieldset></td></tr></table>";
 if($_POST["up"]){
 $best=$_POST['type'];
 $best2=$_POST['type2'];
 $best3=$_POST['type3'];
 $best4=$_POST['type4'];
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
 $result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `Bestans` = '$best' ,`Bestans2`='$best2' , `Bestans3`='$best3' ,  `Bestans4`='$best4',`image`='$file'  WHERE `questions`.`Qu` ='$Qu' ");
if ($result){
echo'<script language="javascript">
swal("تم  تعيين الاجابة الصحيحة.. ",{
 icon:"info",
 buttons: false,
 timer:2000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id_test.'&date='.$date.'";</script>';
}else{
 echo '<script>
  swal("لم يتم تعيين الاجابة الصحيحة.. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}
?>
</form></div>&nbsp;&nbsp;&nbsp;</div>&nbsp;&nbsp;</div>
<?php
}else{
?>
<div id='post_qu'><div class="qaab6_qu"><div class="qaab6-Qu2"><form  name ="add" action="" method="post" id="dd" enctype="multipart/form-data">
<?php
    include"cont.php";
   $Qu=($_GET['Qu']);
 $sql4=mysqli_query($connect,"SELECT * FROM    questions  where Qu='$Qu'");
  $result4=mysqli_fetch_array($sql4);
  $a=$result4['ans1'];
  $b=$result4['ans2'];
  $c=$result4['ans3'];
  $d=$result4['ans4'];
  $Qu=$result4['Qu'];
echo "<div id='Qu_qu2'><hr>السؤال:$Qu<hr></div>";
   echo "<center><table id='filed_qu2'><tr><td colspan='4'><fieldset id='filed_qu2'><legend id='legend2_qu2'><h3>&nbsp;&nbsp;    اختر صواب او خطا  &nbsp;&nbsp;&nbsp;</h3></legend>";
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
echo"</fieldset></td></tr></table>";
 if($_POST["up3"]){
 $best=$_POST['ans'];
 $best2=0;
 $best3=0;
 $best4=0;
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
 $result = mysqli_query($connect,"UPDATE `".$db_name."`.`questions` SET  `Bestans` = '$best' ,`image`='$file'  WHERE `questions`.`Qu` ='$Qu' ");
if ($result){
echo'<script language="javascript">
swal("تم تعيين الاجابة الصحيحة.. ",{
 icon:"info",
 buttons: false,
 timer:2000,
 });window.location.href="Qu.php?name_test='.$name_test.'&id='.$id_test.'&date='.$date.'";</script>';

}else{
echo '<script>
  swal("لم يتم تعيين الاجابة الصحيحة.. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}}
?>
</form></div>&nbsp;&nbsp;&nbsp;</div>&nbsp;&nbsp;</div>
<?php
}else{

}
?>
<?php
}
elseif($_SESSION['T_level']=="العميد"){
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