<?php
session_start();
ob_start();
$session= md5(rand());
$time=time();
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
if(!isset($_SESSION['Std_name']) && !isset($_SESSION['Std_set']))
{
header("Location:en_student.php");
}
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ملفك الشخصي</title>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
body{
background-color:#faf5b5;
}
#img2{
border-right:10px;
margin-top:12px;
}
.th{
border:1px solid #000;
background-color:#fff;
width:40%;
height:50px;
margin:0px -8px;
}
td{
border: solid 1px #a5a1a1;
width:50%;
text-align:center;
height:50px;
}
tr{
border: solid 1px #c9c9c9;
}
table{
border-collapse:collapse;
width:90%;
background-color:#fff;
margin:-15px 12px 0px 8px;
font-weight:bold;
font-size:20px;
}
table tr:nth-child(2n + 1) {
background-color: rgba(144, 144, 144, 0.35);
}
table .th:nth-child(2n + 1) {
background:linear-gradient(rgba(179, 70, 70,0.60),#fff);
}

</style>
</head>
<body  dir="rtl">
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
</div><hr>
<div id="y_st"><div id="y2_st">&nbsp;&nbsp;بياناتك الشخصية&nbsp;&nbsp; </div>
&nbsp;|<a href="student.php"><div id="y2_st">&nbsp;&nbsp;رجوع&nbsp;&nbsp;</div></a>
&nbsp;|<div id="y2_st">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<div id="post_st">
<form  name ="add" action="#" method="post" class="qaab4">
<div id="po_st">
<img src="img/ad2.png" width="55%" height="180"/></div>
<?php
include"cont.php";
$sql= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`students` where `Std_set`='$id2' ");
$result= mysqli_fetch_array($sql);
echo'<center><table ><tr><th style="width:1px" id="id" class="th">الرقم الشخصي</th><td id="id">'.$result["Std_id"].'</td></tr>
<tr><th style="width:400px" id="name" class="th">اسم الطالب</th><td id="name_st">'.$result["Std_name"].'</td></tr><tr><th style="width:400px" id="set" class="th">رقم الجلوس</th><td id="set">'.$result["Std_set"].'</td></tr><tr><th style="width:300px" id="level" class="th">المستوي الدراسي</th><td id="level">'.$result["Std_level"].'</td></tr>
<tr><th style="width:300px" id="class" class="th">الفصل الدراسي</th><td id="class">'.$result["Std_class"].'</td>
</tr></table></center><br>';
  mysqli_close($connect);
  ob_end_flush();
?>
</form>
</div>
<aside>
<section>
<a  href="sut_viwetest.php"><div id="block_st">
<center><img src="img/Vi.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;عرض جدول الامتحانات&nbsp;</h4></div></a>
<a href="sut_viwemat.php"><div id="block_st">
<center><img src="img/M.png" width="120" height="90" id="img2"></center><h4>&nbsp;&nbsp;عرض المواد الخاصة بك</h4></div></a>
<a  href="sut_viwetest.php"><div id="block_st">
<center><img src="img/Po.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;عرض الملف الاكاديمي&nbsp;</h4></div></a>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout2.php">
<div id="out_st"><div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تسجيل الخروج</div>
<div style="display:inline-block;"><img src="img/P.png" height="30" width="40" style="margin:-13px 0px;"></div></div></a>
</section>
</aside>
<div class="clearfix"></div>
<footer class="footer-copyright1_st">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy;</center>
</footer>
</body>
</html>