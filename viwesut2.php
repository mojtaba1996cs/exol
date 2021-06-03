<?php
session_start();
ob_start();

?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>طلاب المستوي الاول </title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
</head>
<body  dir="rtl">
<?php
$id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin2.php");
          }
if($_SESSION['T_level']=="reg"){
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/></div><hr>
   <div id="y_vist"><div id="y2_vist">&nbsp;&nbsp;&nbsp;طلاب المستوي الاول &nbsp;&nbsp;</div>
&nbsp;|<a href="viwesut.php"><div id="y2_vist">&nbsp;&nbsp;رجوع  &nbsp;&nbsp;</div></a>
 &nbsp;|<a href="res.php?x=المستوي الاول&y=viwesut2.php"><div id="y2_vist">&nbsp;&nbsp;&nbsp;بحث عن طالب&nbsp;&nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_vist">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>

<form  name ="add"  action="" method="post">
<?php
include"cont.php";
include"function2.php";
$page = (int) (!isset($_GET["page"]) ? 1: $_GET["page"]);
$limit =10;
$startpoint = ($page * $limit) - $limit;
 $statement = "`".$db_name."`.`students` where Std_level='المستوي الاول' and Std_status=1";
  $sql= mysqli_query($connect,"SELECT * FROM {$statement}  LIMIT {$startpoint},$limit" );
  $sql2 = "SELECT * FROM  students where Std_level='المستوي الاول' and Std_status=0 ";
$result2 = $connect-> query($sql2);
echo '<br><div id="post_vist">';
if($sql-> num_rows > 0){
$t=0;
$t2=0;
echo"<table class='table_vist'><tr id='tr_vist'><th style='width:60px' id='id' class='th_vist'>#</th>
<th style='width:350px' id='name' class='th_vist'>اسم الطالب</th><th style='width:150px' id='level' class='th_vist'>مستوي الطالب </th><th style='width:150px' id='class' class='th_vist'>الفصل الدراسي</th>
<th style='width:90px' id='spe' class='th_vist'>تخصص الطالب </th>
<th style='width:90px' id='set' class='th_vist'>رقم الجلوس</th>
<th style='width:250px' id='am' class='th_vist'>عمليات</th>";
while($rows = $sql->fetch_array()){
  $Std_id=$rows["Std_id"];
  $Std_name=$rows["Std_name"];
  $Std_set=$rows["Std_set"];
echo'<tr id="tr_vist">
<td style="width:60px" id="id" class="td_vist">'.++$t.'</td>
<td style="width:350px" id="name" class="td_vist">'.$rows["Std_name"].'</td>
<td style="width:150px" id="level" class="td_vist">'.$rows["Std_level"].'</td>
<td style="width:150px" id="class" class="td_vist">'.$rows["Std_class"].'</td>
<td style="width:90px" id="spe" class="td_vist">'.$rows["Std_specialty"].'</td>
<td style="width:90px" dir="ltr" id="set" class="td_vist">'.$Std_set.'</td>
<td style="width:250px" id="am" class="td_vist">'.
'&nbsp;&nbsp;&nbsp;<a href="stop1.php?id='.$Std_id.'&name='.$Std_name.'&std_set='.$Std_set.'"><center><input type="button" id="stop" value="توقف"></center></a></td></tr>';
}
echo"</table>";
  echo'<div class="footer-copyright2_vist">
   <div id="button_vist"> <input type="button" id="on" value=" نقل  الكل  الي الفصل التالي" onclick="removeclass()"></div>';
   echo '<div id="page_vist">';
 echo pagination
 ($statement,$limit,$page);
   echo "</div>";
echo'<div id="button2_vist"><input type="button" id="on2" value=" نقل  الكل  الي المستوي التالي" onclick="removelevel()"></div>
  </div>';
  }else{
  echo "<div id='t_vist'><table id='table2_vist'><tr id='tr2_vist'><td id='td2_vist'>لايوجد طلاب في هذا المستوي</tr></td></table></div>";
}
echo"<br><hr><br>";
echo"<div id='tt_vist'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; طلاب لديهم ملاحق  &nbsp;&nbsp;</div>";
  if($result2-> num_rows > 0){
echo"<table class='table_vist'><tr id='tr_vist'><th style='width:60px' id='id' class='th_vist'>#</th>
<th style='width:350px' id='name' class='th_vist'>اسم الطالب</th><th style='width:150px' id='level' class='th_vist'>مستوي الطالب </th><th style='width:150px' id='class' class='th_vist'>الفصل الدراسي</th>
<th style='width:90px' id='spe' class='th_vist'>تخصص الطالب </th>
<th style='width:90px' id='set' class='th_vist'>رقم الجلوس</th>
<th style='width:250px' id='am' class='th_vist'>عمليات</th>";
while($rows2 = $result2->fetch_array()){
    $Std_id=$rows2["Std_id"];
  $Std_name=$rows2["Std_name"];
  $Std_set=$rows2["Std_set"];
echo
'<tr id="tr_vist">
<td style="width:60px" id="id" class="td_vist">'.++$t2.'</td>
<td style="width:350px" id="name" class="td_vist">'.$rows2["Std_name"].'</td>
<td style="width:150px" id="level" class="td_vist">'.$rows2["Std_level"].'</td>
<td style="width:150px" id="class" class="td_vist">'.$rows2["Std_class"].'</td>
<td style="width:90px" id="spe" class="td_vist">'.$rows2["Std_specialty"].'</td>
<td style="width:90px" dir="ltr" id="set" class="td_vist">'.$Std_set.'</td>
<td style="width:250px" id="am" class="td_vist">'.
'&nbsp;&nbsp;&nbsp;<a href="cont1.php?id='.$Std_id.'&name='.$Std_name.'"><center><input type="button" id="atv" value="تنشيط"></center></a></td></tr>';
}
echo"</table>";
echo '<p></p>';
echo '<p></p>';
echo '<br>';
echo '<br>';
echo '<br>';
}else{
    echo "<br>";
    echo "<div id='t_vist'><table id='table2_vist'><tr id='tr2_vist'><td id='td2_vist'>لايوجد طلاب  لديهم ملحق</tr></td></table></div>";
  echo '<br>';
}
    echo '<script>

  function removeclass(){
  window.location.href="updatesut.php";
    }
function removelevel(){
  window.location.href="updatesut2.php";
    }
</script>';
  ?>

</form>
<?php
echo "</div>";
 }elseif($_SESSION['T_level']=="العميد"){
   echo'<script>
 swal("غير مصرح لك بالدخول الي هذه الصفحة",{
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
 swal("غير مصرح لك بالدخول الي هذه الصفحة",{
 icon:"info",
 })
 .then((will) => {
 if (will) {
 window.location.href="admin3.php";
 }
 });
 </script>';
}
  ?>
  </body>
  </html>