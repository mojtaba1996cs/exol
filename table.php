<form  name ="add"  action="" method="post"  class="qaab8">
<?php
  $r=(time()+7*3600-(60*60*24*365));
    $fschyear=date("Y",$r);
    $schyear=date("Y")."/".$fschyear;
include"cont.php";
$sql = "SELECT * FROM  tests where Class='الفصل الاول' and  Specialty='IT' and schyear='".$schyear."'";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الاول' and  Specialty='CS' and schyear='".$schyear."'";
$result2 = $connect-> query($sql2);
echo "<br>";
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><b style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الاول  &nbsp;&nbsp;</b></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
  ?>


<?php
  $sql = "SELECT * FROM  tests where Class='الفصل الثاني' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الثاني' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الثاني  &nbsp;&nbsp;</div></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
  ?>

<?php
  $sql = "SELECT * FROM  tests where Class='الفصل الثالث' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الثالث' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الثالث  &nbsp;&nbsp;</div></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
  ?>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل الرابع' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الرابع' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الرابع  &nbsp;&nbsp;</div></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
  ?>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل الخامس' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل ابخامس' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الخامس  &nbsp;&nbsp;</div></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
  ?>

<?php
$sql = "SELECT * FROM  tests where Class='الفصل السادس' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل السادس' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><div style="background-color:#128409;border-radius:15px 0px 0px 15px;padding:2px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل السادس  &nbsp;&nbsp;</div></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div style="background-color:#128409;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
  ?>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل السابع' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل السابع' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><div id="h">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل السابع  &nbsp;&nbsp;</div></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div id="h2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div id="h2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
  ?>
<?php
$sql = "SELECT * FROM  tests where Class='الفصل الثامن' and  Specialty='IT' ";
$result = $connect-> query($sql);
  $sql2 = "SELECT * FROM  tests where Class='الفصل الثامن' and  Specialty='CS'";
$result2 = $connect-> query($sql2);
if($result-> num_rows > 0 || $result2 -> num_rows >0){
echo'<a href="#"><div id="h">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; جدول الفصل الثامن  &nbsp;&nbsp;</div></a>';
    echo'<div id="viwe">';
 if($result-> num_rows > 0){
echo '<a href="#"><div id="h2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص تقنية معلومات     &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";

while($rows = $result->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
  ?>
<?php
if($result2-> num_rows > 0){
  echo '<a href="#"><div id="h2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; تخصص علوم حاسوب    &nbsp;&nbsp;</div></a>';
echo"<a href='#'><table><tr><th style='width:50px' id='date'>تاريخ الامتحان  </th>
<th style='width:50px' id='name'>اسم المادة</th>
<th style='width:50px' id='time'> زمن الامتحان </th>";
while($rows2 = $result2->fetch_array()){
echo
'<tr>
<td style="width:150px" id="date">'.$rows2["Tes_DATE"].'</td>
<td style="width:150px" id="name">'.$rows2["Tes_name"].'</td>
<td style="width:150px" id="time">'.$rows2["time3"].'</td></tr>';
}
echo"</table></a><br>";
}else{

}
 }
  echo "</div>";
 ?>
</form>
<footer class="footer-copyright1">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>