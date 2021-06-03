<?php
session_start();
ob_start();
include"cont.php";
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>تعديل بيانات استاذ</title>
  <script src="gg.js"></script>
    <link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body  dir="rtl">
<?php
$id=$_SESSION['T_pass'];
$id2=$_SESSION['T_level'];
if(!isset($_SESSION['T_pass']) && !isset($_SESSION['T_level']))
          {
header("Location:admin.php");
          }
if($_SESSION['T_level']=="العميد"){
$id=intval($_GET['id']);
$sql= mysqli_query($connect,"SELECT *  FROM `".$db_name."`.`teachers` where `T_id`='$id' ");
$result= mysqli_fetch_array($sql);
     $id=$result['T_id'];
    $name=$result['T_name'];
    $level=$result['T_level'];
  $passoword=$result['T_pass'];
$sql2 = "SELECT DISTINCT T_level FROM teachers  where `T_level`=!'$level'";
 $result2= mysqli_fetch_array($sql2);
  $level3=$result2['T_level'];
if($level==="reg"){
  $level2="مسجل";
}
elseif($level==="Teacher")
{
 $level2="استاذ";
}
 mysqli_close($connect);
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
   </div><hr><div id="y_ad"><div id="y2_ad">&nbsp;تعديل  بيانات الاستاذ <?php echo $name;?>&nbsp;</div>
 &nbsp;|<a href="dorup.php"><div id="y2_ad">&nbsp;&nbsp;رجوع&nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_ad">
  &nbsp;<?php include "time2.php"; ?>&nbsp;
  </div></div>
<?php

 ?>
 <div id="post_ad">
<form  name ="add"  action="update_sa.php?id=<?php echo $id;?>" method="post"  class="qaab5">
<center>
<table>
<input type="hidden" name="id" value="<?php echo $id;?>" ><br>
<tr>
  <td width="203"><h4 class="labe1_up"><center>اسم الموظف</center></h4></td>
  <td><b class="mint-tips" data-title="اكتب اسم الموظف الجديد" ><input type="text" name="username" id="textfield_up" value="<?php echo $name ;?>"  required></b></td>
  </tr>
  <tr>
  <td><h4 class="labe1_up"><center>كلمة المرور</center></h4></td>
  <td><b class="mint-tips" data-title="اكتب كلمة المرور الجديدة" ><input type="text" name="password" id="textfield_up" value="<?php echo $passoword; ?>" required></b></td>
  </tr>
  <tr>
      <td><h4 class="labe1_up"><center>المستوي الوظيفي</center></h4></td>
      <td>
    <b class="mint-tips" data-title="اختار المستوي الوظيفي الجديد" >  <select name="level" id="textfield_up" size="2">
      <option value="<?php echo $level; ?>" selected><?php echo $level2; ?></option>
      <optgroup label="تغيير المستوي الاداري"></optgroup>
        <option value="reg">المسجل</option>
		 <option value="Teacher">استاذ</option>
		 </select>

	  </b></td>
	  </tr>
	  </table>
</center>
<center>
   <input id="submit_up" type="submit" name="submit" value="تعديل">
</center>
  </form>
</div>
<aside id='aside_ad'>
<section id='section_ad'>
<a href="pcm.php"><div id="block_ad"><center>
 <img src="img/H.png" width="90" height="78" id="img2" >
  <h4 id='h4_ad'> &nbsp;&nbsp;الرئيسية&nbsp;</h4></center></div></a>
<a href="adduser.php"><div id="block_ad"><center>
 <img src="img/add.png" width="90" height="78" id="img2"><h4 id='h4_ad'>&nbsp;&nbsp; اضافة استاذ </h4></center></div></a>

 <a href="ah.php"><div id="block_ad"><center>
 <img src="img/Data.png" width="90" height="78" id="img2"><h4 id='h4_ad'>&nbsp;&nbsp;احصائيات</h4></center></div></a>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout3.php">
<div id="out_ad"><div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تسجيل الخروج</div>
<div style="display:inline-block;"><img src="img/P.png" height="30" width="40" style="margin:-13px 0px;"></div></div></a>
</section>
</aside>
<div class="clearfix"></div>
<footer class="footer-copyright1_ad">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
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