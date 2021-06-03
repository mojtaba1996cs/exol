<?php
session_start();
ob_start();
$x=$_GET['x'];
$y=$_GET['y'];
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>بحث عن طالب </title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
<script>
 function rul(str){
if (str==""){
document.getElementById("sl").innerHTML="";
}else
{
if (window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
{
document.getElementById("sl").innerHTML=xmlhttp.responseText;
}
}
var select=document.getElementById("sch2");
var typ=select.options[select.selectedIndex].value;
var r=document.getElementById("x");
var x=r.options[r.selectedIndex].value;
var url = "vres.php?options="+typ+"&queryString="+str+"&res="+x;
escape(url);
xmlhttp.open("GET",url,true);
xmlhttp.send();
}
}
</script>
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
   <div id="y_vist"><div id="y2_vist">&nbsp;&nbsp;&nbsp;بحث عن طالب  &nbsp;&nbsp;</div>
&nbsp;|<a href="<?php echo $y;?>"><div id="y2_vist">&nbsp;&nbsp;رجوع  &nbsp;&nbsp;</div></a> &nbsp;|<div id="y2_vist">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id="post_res">
    <br>
  <center><form name="search" method="post">
 <div id="box-search">
  <b style='background-color:#ccfec8;border-radius:15px;width:350px;' id="r_res"><input type="text" placeholder="بحث عن طالب" id="sch_res"  value="" name="search" onkeyup="rul(this.value)"><select id="sch2_res" name="options"  >
  <optgroup label="طريقة البحث"></optgroup>
  <option value="name">بحث عن طريق الاسم </option>
  <option value="set">بحث عن طريق رقم الجلوس</option>
  </select>
   <select id="x" hidden>
     <option value="<?php echo $x ;?>"></option>
    </select></b></div>
  <div id="sl"></div>
<br><br><br><br>
    </form>
    </center>
    </div>
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