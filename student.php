<?php
session_start();
ob_start();
error_reporting (1);
$session= md5(rand());
$time=time();
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
if(!isset($_SESSION['Std_name']) && !isset($_SESSION['Std_set']))
{
header("Location:en_student.php");
}
include "cont.php";
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>الصفحة الرئيسية للطالب </title>
  <link rel="shortcut icon" href="img/rr3.jpg" id="img">
  <script src="gg.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
<style>
body{
background-color:#faf5b5;
}
h1{
color:#9d0a0a;
}
h4{
border-radius:10px;
 }
h3{
background-color:#79f085;
border-radius:10px;
}
h3:hover{
background-color:#79f56f;
color:#000;
}
#img2{
border-right:10px;
margin-top:12px;
}
th{
border:2px solid #087e0d ;
background-color:rgba(179, 70, 70, 1) ;
width:460px;
height:34px;
margin:0px -8px;
}
</style>
</head>
<body  dir="rtl">
<?php
$sql1= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_set`='$id2' ");
$result1=mysqli_fetch_array($sql1);
$class=$result1['Std_class'];
$Specialty=$result1['Std_specialty'];
$date=date("Y-m-d",time()+7*3600);
$std_set=$result1['Std_set'];
$std_name=$result1['Std_name'];
$sql2= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `tests` where `Class`='$class' and `Specialty`='$Specialty' and `Tes_DATE`='$date' ");
$result2=mysqli_fetch_array($sql2);
$id_test=$result2['Tes_id'];
$time2=$result2['time3'];
$Time_test=$result2['Time_test'];
 $time3=date("H:i",time()+300);  $time6=time()+0*3600;
$time5=(strtotime($time2))+1800;
$test_name=$result2['Tes_name'];
$sql6=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='mul' and deg_qu=1");
  $deg2=mysqli_num_rows($sql6);
$sql7=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='one' and deg_qu=1");
  $deg3=mysqli_num_rows($sql7);
$sql8=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='eoc' and deg_qu=1");               $deg4=mysqli_num_rows($sql8);
$sql10=mysqli_query($connect,"SELECT * from `questions` where `test_id`='$test_id' and deg_qu=1");
$result10=mysqli_num_rows($sql10);
$sql11=mysqli_query($connect,"SELECT * from `answer` where `test_id`='$id_test' and `Set`='$std_set'");
$result11=mysqli_num_rows($sql11);
$sql12=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `answer` where `test_id`='$id_test' and `Set`='$std_set' and ans_case=1");
  $result12=mysqli_fetch_array($sql12);
     $deg_sut=$result12['deg_qu'];
$sql13=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `questions` where `test_id`='$id_test'");
  $result13=mysqli_fetch_array($sql13);
     $deg_sut2=$result13['deg_qu'];
$deg_ansb=round($deg_sut/$deg_sut2*100);
if($deg_ansb >= 80){
       $tk="A";
     }elseif($deg_ansb >= 70){
       $tk="B";
     }elseif($deg_ansb >= 60){
       $tk="C";
     }elseif($deg_ansb >= 50){
       $tk="D";
     }else{
       $tk="F";
     }
  if($deg_ansb >= 80){
       $tk2="4";
     }elseif($deg_ansb >= 70){
       $tk2="3";
     }elseif($deg_ansb >= 60){
       $tk2="2";
     }elseif($deg_ansb >= 50){
       $tk2="1";
     }else{
       $tk2="0";
     }
  $deg_sut3=$tk2*$Time_test;
    $r=(time()+0*3600-(60*60*24*365));
    $fschyear=date("Y",$r);
    $schyear=date("Y")."/".$fschyear;
if($_POST["end"]){
 $sql1=mysqli_query($connect,"INSERT INTO`".$db_name."`.`degree` (
`id` ,
`test_id` ,
`test_name` ,
`Std_set`,
`Std_name`,
`Std_deg`,
`Std_Tak`,
`schyear`,
`class`
)
VALUES (
null , '$id_test','$test_name' ,'$id2','$std_name','$deg_sut3','$tk','$schyear','$class')"
);
  }
     if($_POST["submit"]){
     $session=$_POST['session'];
     $test_id=$_POST['id_test'];
       if($result11 === $result10){
       if($time5 > $time6){
       if($time3 >= $time2){
       if($id_test == $test_id){
     $UP= mysqli_query($connect,"UPDATE `".$db_name."`.`students` SET  `Std_session` = '$session' WHERE `students`.`Std_set` ='$id2' ");
     if($UP){
       if($deg3 == $deg2){
      echo'<script language="javascript">
window.location.href="sut_test.php?session='.$session.'&page=1&nameQu=الاول";</script>';
       }
       elseif($deg3 >= $deg2){
         echo'<script language="javascript">
window.location.href="en_test.php?session='.$session.'&page=1&nameQu=الاول";</script>';
       }elseif($deg2 >= $deg3){
  echo'<script language="javascript">
window.location.href="sut_test.php?session='.$session.'&page=1&nameQu=الاول";</script>'; }else{
echo'<script language="javascript">
window.location.href="sut_test2.php?session='.$session.'&page=1&nameQu=الاول";</script>';
}
     }else{
       echo "لم يتم التعديل";
  }}else{
       echo'<script language="javascript">
swal("رقم الامتحان  غير صحيح", {
  buttons: false,
  timer: 3000,
  icon:"error",
});
</script>';
       }}else{
       echo'
<script language="javascript">
swal("لم يحن موعد الامتحان بعد امتحانك الساعة '.$time2.'  يسمح لك بدخول الامتحان قبل بدا الامتحان بخمس دقائق",{
buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
       }}else{
       echo'
<script language="javascript">
swal("تم مرور نصف ساعة او اكثر علي بدا الامتحان لايمكن الدخول لهذا الامتحان..",{
buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
     }}
       else{
 echo'
<script language="javascript">
swal("عذرا لايمكنك الخضوع لهذا الامتحان مجدداا لقد حصلت علي '.$deg_ansb.'% في هذا الامتحان ",{
buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
       }}
?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
 </div><hr>
  <div id="y_st"><span id="y2_st">
    &nbsp;الصفحة الرئيسية&nbsp;
    </span>&nbsp;|<a href="stu_po.php"><div id="y2_st"> &nbsp;&nbsp; ملفك الشخصي  &nbsp;&nbsp;</div></a>
 &nbsp;|<div id="y2_st">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
<?php
  include "cont.php";
$sql= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_set`='$id2' and `Std_status`=1");
$result=mysqli_fetch_array($sql);
$class=$result['Std_class'];
$Specialty=$result['Std_specialty'];
 $date=date("Y-m-d",time()+7*3600);
  $std_set=$result['Std_set'];
$sql4= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `tests` where `Class`='$class' and `Specialty`='$Specialty' and `Tes_DATE`='$date' ");
$result4=mysqli_fetch_array($sql4);
$id_test=$result4['Tes_id'];
$time2=$result4['time'];
  ?>
<div id="post_st">
  <?php
  if($sql -> num_rows > 0){
  ?>
<div id="block2_st"><b>اسم الطالب:<?php echo $id;?>// رقم الجلوس:<b dir="ltr"><?php echo $std_set;?></b></b></div>
  <?php
   if($sql2-> num_rows > 0){
     ?>
  <center>
  <form name="st" action="" method="post" class="qaab7_st">
      <textarea name="session" hidden><?php echo $session;?></textarea>
      <textarea name="time" hidden><?php echo $time;?></textarea>
      <table class="admin_table_stu_st"><tr id="r_st"><td id="ii"><h3><center>ادخل رقم الامتحان</center></h3></td><td id="ii"><input type="number" name="id_test" id="textfield_st"  required></td></tr></table>
         <input type="hidden" name="class" value="<?php echo $class; ?>">
   <input type="submit" value="دخول الامتحان»»»" id="en_test2_st" name="submit">
<?php
   }else{
$sql3= mysqli_query($connect,"SELECT
   * FROM `".$db_name."`. `tests` where  `Class`='$class' and `Specialty`='$Specialty' and  Tes_DATE > '$date' ORDER BY Tes_DATE ASC");
$result3=mysqli_fetch_array($sql3);
  $test_name=$result3['Tes_name'];
  $date2=$result3['Tes_DATE'];
  $time1=$result3['time'];
     $x=1;
$x="الاولي";
$sql4= mysqli_query($connect,"SELECT * FROM `".$db_name."`. `tests` where `Class`='$class' and `Specialty`='$Specialty' and  Tes_DATE='$date2'");
if($sql4 -> num_rows>0){
   echo "<center><div id='en_test_st'>";
   echo "<b>ليس لديك امتحان اليوم<br> الامتحان القادم بتاريخ ".$date2."<br>";
    echo "<table id='table_st'><th id='th_st'>الجلسة</th><th id='th_st'>الامتحان</th><th id='th_st'>الساعة</th>";
   while($result4=mysqli_fetch_array($sql4)){
  $test_name2=$result4['Tes_name'];
  $date4=$result4['Tes_DATE'];
 $time7=$result4['time3'];
 echo "<tr id='tr_st'><td id='td_st'><b style='color:#edbf01;font-size=22px;'>".$x."</b></td>
 <td id='td_st'><b style='color:#edbf01;font-size:20px;'>".$test_name2."</b></td><td id='td_st'><b style='color:#edbf01;font-size:20px;'>".$time7."</b></td></tr>";
  if($x){
    $x="الثانية";
  }
     $x++;
   }
     echo "</table>";
     echo"</div></center>";
          }else{
  echo "<div id='t_st'><table id='table2_st'><tr id='tr2_st'><td id='td2_st'>لم يتم وضع موادك في جدول الامتحانات الي الان</tr></td></table></div>";
          }
  }}else{
echo "<div id='t_st'><table id='table2_st'><tr id='tr2_st'><td id='td2_st'>انت لديك ملاحق</tr></td></table></div>";
}
  ?>
 </form></center></div>
<aside>
<section>

<a  href="sut_viwetest.php"><div id="block_st">
<center><img src="img/Vi.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;<b>عرض جدول الامتحانات</b>&nbsp;</h4></div></a>
<a href="sut_viwemat.php"><div id="block_st">
<center><img src="img/M.png" width="120" height="90" id="img2"></center><h4>&nbsp;&nbsp;<b>عرض المواد الخاصة بك</b></h4></div></a>
<a  href="Acadfile.php"><div id="block_st">
<center><img src="img/Po.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;<b>عرض الملف الاكاديمي</b>&nbsp;</h4></div></a>
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
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
</body>
</html>