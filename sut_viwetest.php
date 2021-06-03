<?php
session_start();
ob_start();
error_reporting (1);
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
<title>جدول الامتحانات الخاص بك</title>
  <link rel="shortcut icon" href="img/rr3.jpg" id="img">
  <script src="gg.js"></script>
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
  <link href="grey.css" rel="stylesheet" type="text/css">
  <script src="js/jquery-1.9.1.min.js"></script>
  <script src="js2/jquery.cookie.js"></script>
<style>
body{
background-color:#faf5b5;
}
summary{
outline-color:#989805;
  }
</style>
</head>
  <?php
  $d=$_GET['d'];
  $id_test=$_GET['id_test'];
  $test_name=$_GET['name_test'];
  if($d !="dit"){
$sql= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_set`='$id2' and `Std_status`=1");

$result=mysqli_fetch_array($sql);
$class=$result['Std_class'];
$Specialty=$result['Std_specialty'];
   $r=(time()+0*3600-(60*60*24*365));
    $fschyear=date("Y",$r);
    $schyear=date("Y")."/".$fschyear;
  $sql2= mysqli_query($connect,"SELECT
   * FROM `".$db_name."`. `tests` where  `Class`='$class' and `Specialty`='$Specialty' and schyear='$schyear' ORDER BY Tes_DATE ASC");
  $date2=date("Y-m-d",time()+0*3600);

    echo '<body  dir="rtl">
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
 </div><hr>';
       if($sql -> num_rows > 0){
   if($sql2 -> num_rows >0){

  echo '<div id="y_st"><div id="y2_st"> &nbsp;&nbsp; جدول الامتحانات الخاص بك  &nbsp;&nbsp;</div>
 &nbsp;|<a href="student.php"><div id="y2_st"> &nbsp;&nbsp; رجوع &nbsp;&nbsp;</div></a>
 &nbsp;|<div id="y2_st">&nbsp;'; include "time2.php";
 echo "&nbsp;</div></div>";?>
<?php
    echo '<div id="post_st">';
    echo "<br>";

  echo"&nbsp; &nbsp;<div id='n_vits'><div style='background-color:#808409;border-radius:15px 0px 0px 15px;padding:2px;margin:-60px 0px 0px 0px;' id='g_vits'> &nbsp;&nbsp;  جدول امتحانات ".$class." &nbsp;&nbsp;</div> &nbsp; &nbsp; &nbsp;";
  echo "<div style='background-color:#808409;border-radius:15px 0px 0px 15px;padding:2px;' id='y3_vits'> &nbsp;&nbsp; العام الدراسي ".$schyear." &nbsp;&nbsp;</div></div>";
   echo "<br><table id='table_suvi'>
<th id='th_suvi' class='date_suvi' style='width:100px'>
تاريخ الامتحان</th>
<th id='th_suvi' class='name_suvi'  style='width:150px'>
اسم الامتحان</th>
<th id='th_suvi' class='time_suvi'  style='width:70px'>
الساعة</th>
<th id='th_suvi' class='case_suvi'  style='width:400px'>
الحالة</th><th id='th_suvi' class='deg_suvi'  style='width:150px'>
الدرجة</th>";
while($result2=mysqli_fetch_array($sql2)){
  $test_name=$result2['Tes_name'];
  $date=$result2['Tes_DATE'];
  $time=$result2['time3'];
  $id_test=$result2['Tes_id'];
  echo "<tr id='tr_suvi'><td id='td_suvi' class='date_suvi'  style='width:200px'><b>".$date."</b></td>
 <td id='td_suvi' class='name_suvi'  style='width:350px'><b>".$test_name."</b></td><td id='td_suvi' class='time_suvi'  style='width:70px'><b>".$time."</b></td><td id='td_suvi' class='case_suvi'  style='width:400px'>";
if($date2 > $date){
echo '<div style="display:inline-block;">
<div style="display:inline-block;">تم امتحان هذه المادة </div><img src="img/rad.png" height="30" width="30" style="margin:-13px 0px;">
</div>';
}elseif($date2 == $date){
    $time2=$result2['time3'];
  $time3=date("H:i",time()+0*3600);
if($time2 > $time3){
$time4 =abs
( strtotime($time2) -
strtotime($time3));
  if($time4 > 3600){
echo '<div style="color:#8d8283;font-size:20px;"> باقي للامتحان <div class="timeAgo">
<span class="hours">00</span>:<span class="minuts">00</span>:<span class="sconds">00</span>
</div>/ ساعة </div>';
}elseif($time4 > 120 || $time4 < 3600){
 echo '<div style="color:#8d8283;font-size:20px;" باقي للامتحان<div class="timeAgo">
<span class="minuts">00</span>:<span class="sconds">00</span>
</div> / دقيقة </div>';
}elseif($time4 < 61 || $time4 > 0){
echo '<div style="color:#8d8283;font-size:20px;" باقي للامتحان<div class="timeAgo">
<span class="sconds">00</span>
</div> /ثواني</div>';
}elseif($time4 ==0){
echo '<div style="display:inline-block;">
<b style="display:inline-block;color:#8d8283">تم امتحان هذه المادة </b><img src="img/rad.png" height="30" width="30" style="margin:-13px 0px;">
</div>';
  }
}else{
echo '<div style="display:inline-block;">
<b style="display:inline-block;">تم امتحان هذه المادة </b><img src="img/rad.png" height="30" width="30" style="margin:-13px 0px;">
</div>';
}
}else{
$date3=abs
( strtotime($date) -
strtotime($date2));
$day = round(($date3) /(60*60*24) );
if($day=='1'){
echo "<div style='color:red;font-size:20px;'>باقي يوم واحد للامتحان</div>";
}elseif($day=='2'){
  echo "<div style='color:#0901f4;font-size:20px;'>باقي يومين للامتحان</div>";
}elseif($day > 2){
  echo " <div style='color:#399806;font-size:20px;'>باقي $day ايام للامتحان</div>";
}elseif($day > 10){
  echo " <div style='color:#555;font-size:20px;'>باقي $day يوم للامتحان</div>";
}
}
echo "</td><td class='deg_suvi'  style='width:150px'>";
$sql6=mysqli_query($connect,"SELECT * from `degree` where `test_id`='$id_test' and `Std_set`='$id2'");
$result6=mysqli_fetch_array($sql6);
$tk=$result6['Std_Tak'];
  $sql12=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `answer` where `test_id`='$id_test' and `Set`='$id2' and ans_case=1");
  $result12=mysqli_fetch_array($sql12);
     $deg_sut=$result12['deg_qu'];
$sql13=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `questions` where `test_id`='$id_test'");
  $result13=mysqli_fetch_array($sql13);
     $deg_sut2=$result13['deg_qu'];
$deg_ansb=round($deg_sut/$deg_sut2*100);
if($deg_ansb >= 80){
       $tk2="A/نجاح";
     }elseif($deg_ansb >= 70){
       $tk2="B/نجاح";
     }elseif($deg_ansb >= 60){
       $tk2="C/نجاح";
     }elseif($deg_ansb >= 50){
       $tk2="D/نجاح";
     }elseif($deg_ansb < 50){
       $tk2="F/رسوب";
     }else{
       $tk2="";
           }
if(!empty($tk)){
  echo $tk2;
echo'<a href="sut_viwetest.php?d=dit&id_test='.$id_test.'&name_test='.$test_name.'"><div style="color:#a010e7;"> تفاضيل </div></a>';
}else{
echo "<b >---</b>";
}
echo "</td></tr>";
}

     echo "</table>";
  }else{
  echo '<div id="y_st"><div id="y2_st"> &nbsp;&nbsp; جدول الامتحانات الخاص بك  &nbsp;&nbsp;</div>
 &nbsp;|<a href="student.php"><div id="y2_st"> &nbsp;&nbsp; رجوع &nbsp;&nbsp;</div></a>
 &nbsp;|<div id="y2_st">&nbsp;'; include "time2.php";
 echo "&nbsp;</div></div>";?>
<?php
    echo '<div id="post_st">';
    echo "<br>";
echo "<div id='t_suvi'><table><tr><td>لم يتم وضع موادك في جدول الامتحانات الي الان</tr></td></table></div>";
  }}else{
echo "<div id='t_suvi'><table><tr><td>انت لديك ملاحق</tr></td></table></div>";
 }
 echo '</div>
<aside>
<section>
<a  href="student.php"><div id="block_st">
<center><img src="img/H3.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;  الصفحة الرئيسية&nbsp;</h4></div></a>
<a href="sut_viwemat.php"><div id="block_st">
<center><img src="img/M.png" width="120" height="90" id="img2"></center><h4>&nbsp;&nbsp;عرض المواد الخاصة بك</h4></div></a>
<a  href="Acadfile.php"><div id="block_st">
<center><img src="img/Po.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;عرض الملف الاكاديمي&nbsp;</h4></div></a>';
    ?>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout2.php">
<div id="out_st"><div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تسجيل الخروج</div>
<div style="display:inline-block;"><img src="img/P.png" height="30" width="40" style="margin:-13px 0px;"></div></div></a>
  <?php
echo '</section>
</aside>
<div class="clearfix"></div>
<footer class="footer-copyright1">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
  </body>
  </html>';
  }else{
   echo '<body  dir="rtl">
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" />
 </div><hr>
<div id="y_st"><div id="y2_st"> &nbsp;&nbsp; تفاصيل الامتحان &nbsp;&nbsp;</div>
 &nbsp;|<a href="sut_viwetest.php"><div id="y2_st"> &nbsp;&nbsp; رجوع &nbsp;&nbsp;</div></a>
 &nbsp;|<div id="y2_st">&nbsp;'; include "time2.php";
 echo '&nbsp;</div></div>
<div id="post_st">';?>
   <?php
   $sql5=mysqli_query($connect,"SELECT * from `degree` where `test_id`='$id_test' and `Std_set`='$id2' and `test_name`='$test_name'  ");
 if($sql5 -> num_rows >0){
$sql3=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `answer` where `test_id`='$id_test' and `Set`='$id2' and ans_case=1");
 $result3=mysqli_fetch_array($sql3);
     $deg_sut=$result3['deg_qu'];
 $sql4=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `questions` where `test_id`='$id_test'");
  $result4=mysqli_fetch_array($sql4);
     $deg_sut2=$result4['deg_qu'];
    $deg_ansb=round($deg_sut/$deg_sut2*100);
    if($deg_ansb >= 80){
       $tk="A/نجاح";
     }elseif($deg_ansb >= 70){
       $tk="B/نجاح";
     }elseif($deg_ansb >= 60){
       $tk="C/نجاح";
     }elseif($deg_ansb >= 50){
       $tk="D/نجاح";
     }else{
       $tk="F/رسوب";
     }
     echo'<div id="header2_vits">';
  $x=$deg_sut/$deg_sut2*100;
  $error=$deg_sut2-$deg_sut;
   $sql8= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`answer` where `test_id`='$id_test' and  Std_name='$id'");
echo '<br><table id="table_suvi"><tr id="tr_suvi"><th id="th_suvi" class="name_suvi">اسم الامتحان</th><th id="th_suvi" class="deg_suvi">النسبة التي حصلتا عليها</th><th id="th_suvi" class="date_suvi">التقدير</th></tr>';
 echo '<tr id="tr_suvi"><td id="td_suvi" class="name_suvi">'.$test_name.'</td><td id="td_suvi" class="deg_suvi">%'.$x.'</td><td id="td" class="date_suvi">'.$tk.'</td></tr></table><br><hr>';
 echo '<details id="details">
 <summary>تفاضيل الامتحان </summary>';
 $d=0;
while($result8=mysqli_fetch_array($sql8)){
   $qu=$result8['Que_id'];
  $deg_qu=$result8['deg_qu'];
   $sql7= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`questions` where `test_id`='$id_test' and  deg_qu=1 and Qu='$qu'");
  $result7=mysqli_fetch_array($sql7);
  $Qu=$result7['Qu'];
  $type=$result7['type_Qu'];
  $ans1=$result7['ans1'];
  $ans2=$result7['ans2'];
  $ans3=$result7['ans3'];
  $ans4=$result7['ans4'];
  $Bestans=$result7['Bestans'];
  $Bestans2=$result7['Bestans2'];
  $Bestans3=$result7['Bestans3'];
  $Bestans4=$result7['Bestans4'];
  $ans_Std=$result8['ans_Std'];
  $ans_Std1=$result8['ans_Std1'];
  $ans_Std2=$result8['ans_Std2'];
  $ans_Std3=$result8['ans_Std3'];
  $ans_case=$result8['ans_case'];
  if($type=="mul"){
    $type2="اختر الاجابات الصحيحة ";
  }elseif($type=="one"){
    $type2="اختر الاجابة الصحيحة";
  }else{
   $type2="اختر صح اما خطا";
  }
echo'<div id="dit2">
 <div id="qu_deg">سؤال رقم '.++$d.' &nbsp;&nbsp;&nbsp;&nbsp; الدرجة &nbsp;'.$ans_case.'من 1 </div>
 <div id="dit3">
 <u><B>'.$type2.':</B></u>
 <br>
<div id="ans_deg"> '.$qu.':</div>';
if($type=="eoc"){
    if($Bestans == $ans_Std){
      echo "<ul>";
     echo '<li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
      echo '<li><div id="ans2">'.$ans2.' </div></li></ul>';
  }elseif($Bestans != $ans_Std){
      if($Bestans == $ans1){

    echo '<ul><li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
     echo '<li><div id="ans4">'.$ans2.'&nbsp;(اجابة خطا) </div></li></ul>';
  }else{
            echo '<li><div id="ans4">'.$ans1.'&nbsp;(اجابة خطا) </div></li>';
     echo '<li><div id="ans3">'.$ans2.'&nbsp;(اجابة صحيحة) </div></li></ul>';
      }}}
  if($type=="one"){
    if($Bestans== $ans_Std){
      echo "<ul>";
      if($Bestans == $ans1){
    if(!empty($ans1)){
      echo '<li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
                     }
     if(!empty($ans2)){
       echo '<li><div id="ans2">'.$ans2.' </div></li>';
     }
     if(!empty($ans3)) {
       echo '<li><div id="ans2">'.$ans3.' </div></li>';
     }
     if(!empty($ans4)){
       echo '<li><div id="ans2">'.$ans4.' </div></li>';
                      }
  }elseif($Bestans== $ans2){
   if(!empty($ans1)){
   echo '<li><div id="ans2">'.$ans1.' </div></li>';
   }
    if(!empty($ans2)){
      echo '<li><div id="ans3">'.$ans2.'&nbsp;(اجابة صحيحة) </div></li>';
                     }
    if(!empty($ans3)){
      echo '<li><div id="ans2">'.$ans3.' </div></li>';
                     }
      if(!empty($ans4)){
     echo '<li><div id="ans2">'.$ans4.' </div></li>';
      }
  }elseif($Bestans==$ans3){
     if(!empty($ans1)) {
     echo '<li><div id="ans2">'.$ans1.' </div></li>';
     }
    if(!empty($ans2)) {
      echo '<li><div id="ans2">'.$ans2.' </div></li>';
      }
  if(!empty($ans3)) {
    echo '<li><div id="ans3">'.$ans3.'&nbsp;&nbsp; (اجابة صحيحة) </div></li>';
  }
    if(!empty($ans4)) {
      echo '<li><div id="ans2">'.$ans4.' </div></li></ul>';
    }
      }elseif($Bestans==$ans4){
      if(!empty($ans1)){
      echo '<li><div id="ans2">'.$ans1.' </div></li>';
      }
      if(!empty($ans2)){
      echo '<li><div id="ans2">'.$ans2.' </div></li>';
      }
     if(!empty($ans3)){
      echo '<li><div id="ans2">'.$ans3.' </div></li>';
     }
     if(!empty($ans4)){
     echo '<li><div id="ans3">'.$ans4.'&nbsp;&nbsp; (اجابة صحيحة) </div></li></ul>';
      }}

}elseif($Bestans != $ans_Std){
      if($Bestans == $ans1 && $ans_Std ==$ans2){
   if(!empty($ans1)){
   echo '<ul><li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans4">'.$ans2.'&nbsp;(اجابة خطا) </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans2">'.$ans3.' </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans2">'.$ans4.' </div></li>';
     }
   }elseif($Bestans == $ans1 && $ans_Std ==$ans3){
     if(!empty($ans1)){
   echo '<li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans2">'.$ans2.' </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans4">'.$ans3.'&nbsp;(اجابة خطا) </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans2">'.$ans4.' </div></li>';
     }
   }elseif($Bestans == $ans1 && $ans_Std ==$ans4){
     if(!empty($ans1)){
   echo '<li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans2">'.$ans2.' </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans2">'.$ans3.' </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans4">'.$ans4.'&nbsp;(اجابة خطا) </div></li>';
     }
  }elseif($Bestans== $ans2 && $ans_Std==$ans1){
        if(!empty($ans1)){
   echo '<li><div id="ans4">'.$ans1.'&nbsp;(اجابة خطا) </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans3">'.$ans2.'&nbsp;(اجابة صحيحة) </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans2">'.$ans3.' </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans2">'.$ans4.' </div></li>';
     }
      }elseif($Bestans== $ans2 && $ans_Std==$ans3){
      if(!empty($ans1)){
   echo '<li><div id="ans2">'.$ans1.' </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans3">'.$ans2.'&nbsp;(اجابة صحيحة) </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans4">'.$ans3.'&nbsp;(اجابة خطا) </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans2">'.$ans4.' </div></li>';
     }
    }elseif($Bestans== $ans2 && $ans_Std==$ans4){
        if(!empty($ans1)){
   echo '<li><div id="ans2">'.$ans1.' </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans3">'.$ans2.'&nbsp;(اجابة صحيحة) </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans2">'.$ans3.' </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans4">'.$ans4.'&nbsp;(اجابة خطا) </div></li>';
     }
     }elseif($Bestans==$ans3 && $ans_Std==$ans2){
       if(!empty($ans1)){
   echo '<li><div id="ans2">'.$ans1.' </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans4">'.$ans2.'&nbsp;(اجابة خطا) </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans3">'.$ans3.' &nbsp;(اجابة صحيحة)</div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans2">'.$ans4.' </div></li>';
     }
      }elseif($Bestans==$ans3 && $ans_Std==$ans1){
        if(!empty($ans1)){
   echo '<li><div id="ans4">'.$ans1.'&nbsp;&nbsp; (اجابة خطا) </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans2">'.$ans2.' </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans3">'.$ans3.'&nbsp;(اجابة صحيحة) </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans2">'.$ans4.' </div></li>';
     }
      }elseif($Bestans==$ans3 && $ans_Std==$ans4){
      if(!empty($ans1)){
   echo '<li><div id="ans2">'.$ans1.' </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans2">'.$ans2.' </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans3">'.$ans3.'&nbsp;&nbsp; (اجابة صحيحة) </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans4">'.$ans4.' &nbsp;(اجابة خطا)</div></li>';
     }
     }elseif($Bestans==$ans4 && $ans_Std=$ans1){
        if(!empty($ans1)){
   echo '<li><div id="ans4">'.$ans1.'&nbsp;&nbsp; (اجابة خطا) </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans2">'.$ans2.' </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans2">'.$ans3.' </div></li>';
    }
     if(!empty($ans4)){
       echo '<li><div id="ans3">'.$ans4.'&nbsp;(اجابة صحيحة) </div></li>';
     }
      }elseif($Bestans==$ans4 && $ans_Std=$ans2){

      if(!empty($ans1)){
   echo '<li><div id="ans2">'.$ans1.' </div></li>';
   }
     if(!empty($ans2)){
     echo '<li><div id="ans4">'.$ans2.'&nbsp;(اجابة خطا) </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans2">'.$ans3.' </div></li>';
    }
     if(!empty($ans4)){
     echo '<li><div id="ans3">'.$ans4.'&nbsp;(اجابة صحيحة) </div></li>';
     }
     }elseif($Bestans==$ans4 && $ans_Std=$ans3){
     if(!empty($ans1)){
     echo'<li><div id="ans2">'.$ans1.' </div></li>';
      }
     if(!empty($ans2)){
     echo '<li><div id="ans2">'.$ans2.' </div></li>';
     }
    if(!empty($ans3)){
    echo '<li><div id="ans4">'.$ans3.'&nbsp;(اجابة خطا) </div></li>';
      }
     if(!empty($ans4)){
     echo '<li><div id="ans3">'.$ans4.'&nbsp;(اجابة صحيحة) </div></li></ul>';
     }
    }
    }
  }elseif($type=="mul"){
    if($deg_qu=="1"){
      echo "<ul>";
      if(!empty($ans_Std)){
     echo '<li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
 }else{
   echo '<li><div id="ans2">'.$ans1.' </div></li>';
      }
    if(!empty($ans_Std1)){
 echo '<li><div id="ans3">'.$ans2.'&nbsp;(اجابة صحيحة) </div></li>';
    }else{
   echo '<li><div id="ans2">'.$ans2.' </div></li>';
    }
    if(!empty($ans_Std2)){
     echo '<li><div id="ans3">'.$ans3.'&nbsp;(اجابة صحيحة) </div></li>';
    }else{
 echo '<li><div id="ans2">'.$ans3.' </div></li>';

    }
    if(!empty($ans_Std3)){
     echo '<li><div id="ans3">'.$ans4.'&nbsp;(اجابة صحيحة) </div></li>';
    }else{
 echo '<li><div id="ans2">'.$ans4.' </div></li></ul>';
    }
  }else{
      if($Bestans == $ans_Std){
      if(!empty($ans1)){
     echo '<ul><li><div id="ans3">'.$ans1.'&nbsp;(اجابة صحيحة) </div></li>';
 }
    }else{
 echo '<li><div id="ans4">'.$ans1.'&nbsp;(اجابة خطا) </div><li>';

    }
    if($Bestans2 == $ans_Std1){
      if(!empty($ans2)){
     echo '<li><div id="ans3">'.$ans2.'&nbsp;(اجابة صحيحة) </div></li>';
 }
    }else{
 echo '<li><div id="ans4">'.$ans2.'&nbsp;(اجابة خطا) </div></li>';
    }
    if($Bestans3 == $ans_Std2){
      if(!empty($ans3)){
     echo '<li><div id="ans3">'.$ans3.'&nbsp;(اجابة صحيحة) </div></li>';
 }
    }else{
 echo '<li><div id="ans4">'.$ans3.'&nbsp;(اجابة خطا) </div></li>';

    }
    if($Bestans4 == $ans_Std3){
      if(!empty($ans4)){
     echo '<li><div id="ans3">'.$ans4.'&nbsp;(اجابة صحيحة) </div></li>';
 }
    }else{
 echo '<li><div id="ans4">'.$ans4.'&nbsp;(اجابة خطا) </div></li></ul>';

    }
    }}
echo'</div>
 </div>';
}
echo '</details>';
     echo '<hr>';
    echo "<br>";
    echo "<br>";
    echo "<br>";
echo "</div>";

  }else{
 echo "<div id='t'><table><tr><td>لم تمتحن هذه المادة <a href='sut_viwetest.php'><div id='back'>رجوع </div></a></tr></td></table></div>";
 }
echo '</div>
<aside>
<section>
<a  href="student.php"><div id="block_st">
<center><img src="img/H3.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;  الصفحة الرئيسية&nbsp;</h4></div></a>
<a href="sut_viwemat.php"><div id="block_st">
<center><img src="img/M.png" width="120" height="90" id="img2"></center><h4>&nbsp;&nbsp;عرض المواد الخاصة بك</h4></div></a>
<a  href="Acadfile.php"><div id="block_st">
<center><img src="img/Po.png" width="120" height="90" id="img2"></center><h4> &nbsp;&nbsp;عرض الملف الاكاديمي&nbsp;</h4></div></a>';
    ?>
<a style="color: blue; font-size:18px;
font-weight: bold;
font-family: 'Lobster', cursive;
text-shadow: 1px 1px 1px #413659;margin:0px 0px -4px" href="logout2.php">
<div id="out_st"><div style="display:inline-block;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;تسجيل الخروج</div>
<div style="display:inline-block;"><img src="img/P.png" height="30" width="40" style="margin:-13px 0px;"></div></div></a>
  <?php
echo '</section>
</aside>
<div class="clearfix"></div>
<footer class="footer-copyright1_st">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
  </body>
  </html>';
  }
  ?>
  <script>
  $(document).ready(function(){
var time2= <?php
      echo isset($time4)?$time4:0; ?>;

        var time= $.cookie('totalMins5') || time2;
		var days,hours,minuts,sconds;
		function makeTime(){

			if(time < 0) return false;
			days = parseInt(time/(60*60*24));
			var temp = time%(60*60*24);
			hours = parseInt(temp/(60*60));
			temp = temp%(60*60);
			minuts = parseInt(temp/60);
			sconds = temp%60;
			days = str_pad(days,2);
			hours = str_pad(hours,2);
			minuts = str_pad(minuts,2);
			sconds = str_pad(sconds,2);
			$('.timeAgo .days').html(days);
			$('.timeAgo .hours').html(hours);
			$('.timeAgo .minuts').html(minuts);
			$('.timeAgo .sconds').html(sconds);


          if (time == 0) {
                clearInterval(countdownTimer);

                      } else {
                time--;
            }}
            var countdownTimer = setInterval(function(){
        makeTime()
        var date = new Date();
        date.setTime(date.getTime() + (sconds *60* 60 * 1000));
        if(time===0){
            $.removeCookie('totalMins5', { path: '/' });
        }
        else{
            $.cookie('totalMins5',time, { expires: date, path: '/' });
        }
    }, 1000);


		function str_pad(input, len){
			input += '';
			var dif = len-input.length;
			var out = '';
			if(dif > 0){
				for(i=0;i<dif;++i){
					out += '0';
				}
				return out+input;
			}
			return input;
		}

	});
  </script>