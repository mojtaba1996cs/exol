<?php
session_start();
ob_start();
$pass=$_SESSION['T_pass'];
$level=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin3.php");
          }
$msg=($_GET['msg']);
$id=($_GET['id']);//رقم الامتحان
$name_test=($_GET['name_test']);//اسم الامتحان
$date=($_GET['date']);//تاربخ 	الامتحان
$date2=date('y-m-d');
  include "cont.php";
  $sql=mysqli_query($connect,"SELECT * FROM `teachers` where `T_pass`='$pass' and `T_level`='$level' ");
$result=mysqli_fetch_array($sql);
$name_T=$result['T_name'];
$sql2=mysqli_query($connect,"SELECT * FROM `tests` where `Tes_name`='$name_test' and Tes_id='$id'");
  $result2=mysqli_fetch_array($sql2);
$T_name=$result2['T_name'];
$date3=$result2['Tes_DATE'];
$Specialty=$result2['Specialty'];
if($Specialty=='IT'){
  $specialty="تقنية معلومات";
  $Specialty=$specialty;
}else
{
  $specialty="علوم حاسوب";
  $Specialty=$specialty;
}
$Time_test=$result2['Time_test'];
$class=$result2['Class'];
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>اسئلة الامتحان</title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.9.1.min.js"></script><script src="js2/jquery.cookie.js"></script>
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
if(!isset($id)){
    echo'<script language="javascript">
 swal("ليس لديك امتحان لكي تتضع له اسئلة .. ",{
 icon:"info",
 buttons: false,
 timer: 4000,
 });window.location.href="addtest.php";</script>';
}
elseif($_SESSION['T_level']=="Teacher"){
?>
   <?php
$sql4=mysqli_query($connect,"SELECT * FROM    questions  where  test_id='$id'");
  $result4=mysqli_num_rows($sql4);
$sql6=mysqli_query($connect,"SELECT * FROM    questions  where  test_name='$name_test' and Specialty='$Specialty'");
  $result6=mysqli_num_rows($sql6);
 if($result6 >99){
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div><hr>
  <div id="y_qu"><div id="y2_qu">&nbsp;&nbsp;اضافة سؤال&nbsp;&nbsp;</div>
&nbsp;|<a href="addtest.php"><div id="y2_qu">&nbsp;&nbsp;رجوع &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_qu">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id='post_qu'>
    <div class="qaab6_qu">
<?php
    echo "<fieldset><legend id='legend_qu'>معلومات الامتحان</legend>
<table id='fiel_qu'><tr><td>اسم الامتحان:$name_test||التخصص:$Specialty||الفصل الدراسي:$class </td></tr>
 <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;ساعات الامتحان:$Time_test ساعات||تاريخ الامتحان:$date3</td></tr></table>
  </fieldset>";
    echo "<hr>";
 echo "<fieldset><legend id='legend_qu'>بنك الاسئلة</legend>";
  include"cont.php";
  $sql7=mysqli_query($connect,"SELECT * FROM    questions  where  test_name='$name_test' and Specialty='$Specialty'");
    $id_Que=0;
 if($sql7-> num_rows > 0){
echo"<table class='table_qu'><tr class='tr_qu'>
<th style='width:20px' id='th_qu'> رقم السؤال </th>
<th style='width:250px' id='th_qu'>السؤال</th>
<th style='width:150px' id='th_qu'>عرض السؤال </th>
<th style='width:150px' id='th_qu'>وضع السؤال في الامتحان </th></tr>";
while($rows2= $sql7->fetch_array()){
  $Qu=$rows2["Qu"];
  $id_Qu=$rows2['Qu_id'];
echo
'<tr class="tr_qu">
<td style="width:20px" class="td_qu">'.++$id_Que.'</td>
<td style="width:3550px" class="td_qu">'.$rows2["Qu"].'</td>
<td style="width:450px" class="td_qu">'.
'&nbsp;&nbsp;&nbsp;<a href="viweQu.php?id_Qu='.$id_Qu.'&id_test='.$id.'&name_test='.$name_test.'"><center><input type="button" id="save3_qu" value="عرض السؤال"></a></center></td>
<td style="width:450px" class="td_qu">&nbsp;&nbsp;&nbsp;';
$sql222=mysqli_query($connect,"SELECT * FROM    questions  where  test_id='$id' and deg_qu=1 and Qu_id='$id_Qu' ");
  if($sql222-> num_rows > 0){
 echo '<a href="ahtyar.php?id_Qu='.$id_Qu.'&id_test='.$id.'&name_test='.$name_test.'&y=r"><center><input type="button" id="save3_qu" value="الغاء السؤال"></a>';
}else{
echo '<a href="ahtyar.php?id_Qu='.$id_Qu.'&id_test='.$id.'&name_test='.$name_test.'"><center><input type="button" id="save3_qu" value="اختيار السؤال"></a>';
}
echo'</center></td></tr>';
}
echo"</table>";
}else{
echo'<center><div style="color:green;font-size:30px;">'.'لايوجد سؤال '.'</div></center>';
 }
 echo "</fieldset>";
    echo "<div id='end_qu'><a href='addtest.php'>تم الوصول الي الحد الاقصي من عدد الاسئلة لهذا الامتحان </a></div>";
}else{
 $y=($_GET['y']);
      if($y==='r'){
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div><hr>
     <div id="y_qu"><div id="y2_qu">&nbsp;&nbsp;اضافة سؤال&nbsp;&nbsp;</div>
&nbsp;|<a href="addtest.php"><div id="y2_qu">&nbsp;&nbsp;رجوع &nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_qu">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id='post_qu'>
    <div class="qaab6_qu">
  <div id="no1_qu"> <form  name ="add" action="" method="post" id="dd_qu" enctype="application/x-www-form-urlencoded-2">
<table>
<tr><td colspan="4"><hr></td></tr>
 <tr><td colspan="2"><div style="background-color: #128409;border-radius:15px 0px 0px 15px;padding:2px;width:200px;">&nbsp;&nbsp;<?php echo "رقم السؤال:".++$result6." ";?> &nbsp;&nbsp;</div></td><td colspan="2"><div style="background-color: #128409;border-radius:15px 0px 0px 15px;padding:2px;">&nbsp;&nbsp;<?php echo "اسم المادة:".$name_test." ";?> &nbsp;&nbsp;</div></td></tr>
<tr><td colspan="4"><hr></td></tr>
<tr>
 <td style="width:140px;"><div id='label_qu'>&nbsp;السؤال</div></td><td colspan="2"><textarea name="Qu" id="textfield2_qu" cols="44" rows="32" required></textarea></td></tr>
  <tr><td><div id="label2_qu">&nbsp;نوع السؤال&nbsp;</div></td><td><select name="type" id="textfield_qu" size="8"><option value="one">سؤال لاختبار اجابة واحدة</option><option value="mul">سؤال لاختيار اكثر من اجابة </option>
<option value="eoc">سؤال لاختيار الصواب والخطا</option>
</select></td><td><input type="hidden" name="deg" id="textfield_qu" min="4" max="20" value="0" ></td></tr>
<tr><td colspan='4'><fieldset id="fieldset_qu"><legend id="legend_qu">&nbsp;&nbsp;خيارات السؤال
&nbsp;&nbsp;</legend><div id="label2_qu">&nbsp;
الخيار1&nbsp;</div><input type="text" name="A" id="textfield3_qu" required><div id="label2_qu">&nbsp;
الخيار2&nbsp;</div><input type="text" name="B" id="textfield3_qu" required>
<div id="label3_qu">&nbsp;
الخيار3&nbsp;</div><input type="text" name="C" id="textfield3_qu">
<div id="label3_qu">&nbsp; الخيار4&nbsp;</div><input type="text" name="D" id="textfield3_qu">
</fieldset></td> </tr></table>
<hr>
  <?php

   echo '<input   onclick="if(document.getElementById("no1") .style.display=="") {document.getElementById("no1") .style.display="none"}else{document.getElementById("no1").style.display=""}" id="save_qu" type="submit" name="submit" value="حفظ">';
echo "<hr>";
echo"<div id='details_qu'><details ><summary>
<a href='Qu.php?id=".$id."&date=".$date."&name_test=".$name_test."' style='outline:0px;'>عرض بنك الاسئله الخاصة بالمادة </a></summary>";
echo '</details></div>';
}else{
        ?>
    <div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div><hr>
   <div id="y_qu"><div id="y2_qu">&nbsp;&nbsp;&nbsp; بنك الاسئله   &nbsp;&nbsp;</div>
&nbsp;|&nbsp;<div id="y2_qu"><?php echo"<a href='Qu.php?id=".$id."&date=".$date."&name_test=".$name_test."&y=r' style='outline:0px;'>&nbsp;&nbsp;&nbsp;رجوع &nbsp;&nbsp;&nbsp;</a>";?>
     </div>&nbsp;&nbsp;|&nbsp;&nbsp;<div id="y2_qu"><?php include "time2.php"; ?>&nbsp;</div></div>
  <div id='post_qu'>
    <div class="qaab6_qu">
      <?php
echo "<hr>";
?>
    <hr>
    <?php
    include"cont.php";
  $sql7=mysqli_query($connect,"SELECT * FROM    questions  where test_name='$name_test' and Specialty='$Specialty'");
    $id_Que=0;
      $id=($_GET['id']);
 if($sql7-> num_rows > 0){

echo"<table class='table_qu'><tr class='tr_qu'>
<th style='width:20px' id='th_qu'> رقم السؤال </th>
<th style='width:250px' id='th_qu'>السؤال</th>
<th style='width:150px' id='th_qu'>عرض </th>
<th style='width:150px' id='th_qu'>وضع السؤال في الامتحان</th>
</tr>";
while($rows2=$sql7->fetch_array()){
  $Qu=$rows2["Qu"];
  $id_Qu=$rows2['Qu_id'];
echo '<tr class="tr_qu">
<td style="width:20px" class="td_qu">'.++$id_Que.'</td>
<td style="width:3550px" class="td_qu">'.$rows2["Qu"].'</td>
<td style="width:450px" class="td_qu">'.
'&nbsp;&nbsp;&nbsp;<a href="viweQu.php?id_Qu='.$id_Qu.'&id_test='.$id.'&name_test='.$name_test.'"><center><input type="button" id="save3_qu" value="عرض السؤال"></a></center></td>
<td style="width:450px" class="td_qu">';
echo'&nbsp;&nbsp;&nbsp';
  include"cont.php";
$sql8=mysqli_query($connect,"SELECT * FROM    questions  where  test_id='$id' and deg_qu=1 and Qu_id='$id_Qu' ");
$sql9=mysqli_query($connect,"SELECT * FROM    questions  where  test_id='$id' and deg_qu=1 ");
  $x=mysqli_num_rows($sql9);
if($sql8-> num_rows > 0){
 echo '<a href="ahtyar.php?id_Qu='.$id_Qu.'&id_test='.$id.'&name_test='.$name_test.'&y=r"><center><input type="button" id="save3_qu" value="الغاء السؤال"></a>';
}else{
echo '<a href="ahtyar.php?id_Qu='.$id_Qu.'&id_test='.$id.'&name_test='.$name_test.'"><center><input type="button" id="save3_qu" value="اختيار السؤال"></a>';
}
echo'</center></td></tr>';
}
echo"</table>";
}else{
echo'<center><div style="color:#8f8f8f;font-size:30px;">'. 'لايوجد سؤال '.'</div></center>';
 }
 echo "</fieldset>";
     }}
 $sql9=mysqli_query($connect,"SELECT * FROM    questions  where  test_id='$id' and deg_qu=1 ");
  $x=mysqli_num_rows($sql9);
    ?>
    <hr>
   <table><tr><td><div id='save2_qu'> عدد الاسئلة التي تم وضعها في بنك الاسئله:<?php echo $result4;?> </div></td><td><div id='save2_qu'>عدد الاسئله التي تم وضعها في الامتحان:<?php echo $x;?></div></td></tr></table>
    <hr>
   <?php
 $type=$_POST['type'];
if($type=="eoc"){
if($_POST["submit"]){
include"cont.php";
$Qu=$_POST['Qu'];
$deg=$_POST['deg'];
$type=$_POST['type'];
$a="صح";
$b="خطا";
$sql2=mysqli_query($connect,"INSERT INTO`".$db_name."`.`questions` (
`Qu_id`,
`test_id`,
`test_name`,
`Specialty`,
`Qu`,
`ans1`,
`ans2`,
`type_Qu`
)
VALUES (
null , '$id','$name_test','$Specialty','$Qu' ,'$a','$b','$type')"
);
if($sql2){
  echo'<script language="javascript">
 swal("تم اضافة السؤال بنجاح.. ",{
 icon:"success",
 buttons: false,
 timer:2000,
 });window.location.href="Qu2.php?name_test='.$name_test.'&id='.$id.'&date='.$date.'&Qu='.$Qu.'&type='.$type.'";</script>';

}else{
echo '<script>
  swal("لم تتم الاضافة.. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}}else{
  if($_POST["submit"]){
$Qu=$_POST['Qu'];
$deg=$_POST['deg'];
$a=$_POST['A'];
$b=$_POST['B'];
$C=$_POST['C'];
$d=$_POST['D'];
$type=$_POST['type'];
$sql=mysqli_query($connect,"INSERT INTO`".$db_name."`.`questions` (
`Qu_id`,
`test_id`,
`test_name`,
`Specialty`,
`Qu`,
`ans1`,
`ans2`,
`ans3`,
`ans4`,
`type_Qu`
)
VALUES (
null , '$id','$name_test','$Specialty','$Qu' ,'$a','$b','$C','$d','$type')"
);
if($sql){
  echo'<script>
 swal("تم اضافة السؤال بنجاح.. ",{
 icon:"success",
 buttons: false,
 timer:2000,
 });window.location.href="Qu2.php?name_test='.$name_test.'&id='.$id.'&date='.$date.'&Qu='.$Qu.'&type='.$type.'";</script>';

}else{
echo '<script>
  swal("لم تتم الاضافة .. ",{
 icon:"error",
 buttons: false,
 timer:2000,
 }); </script>';
}}
  ?>
    </div>
    <br><br></div>
<?php
}} elseif($_SESSION['T_level']=="العميد"){
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
}
  ?>
</form><br><br></div></div></div></div></div></body></html>