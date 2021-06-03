<?php
session_start();
ob_start();
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
if(!isset($_SESSION['Std_name'])&&!isset($_SESSION['Std_set']))
          {
header("Location:en_student.php");
          }
$session=($_GET['session']);
$case_stu=($_GET['casesut']);
include "cont.php";
?>
<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>نتيجة الامتحان</title>
<link rel="shortcut icon" href="img/rr3.jpg">
 <script src="gg.js"></script>
    <link href="grey.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<style>
.footer-copyright1{
border-radius: 7px 7px 7px 7px;
padding: 10px;
border: 2px solid #000;
width: 85%;
height: 22px;
margin: 19px 73px 0px 0px ;
}
th{
border:2px solid #087e0d ;
background-color:rgba(179, 70, 70, 1) ;
width:460px;
height:34px;
margin:0px -8px;
}
td{
border:2px solid #d4113a ;
background-color: rgba(255, 255, 255, 0.15);
font-size: 16px;
height:20px;
text-align:center;
}
tr{
border:2px solid #d4113a;
background-color: rgba(255, 255, 255, 0.15);
font-size: 16px;
height:20px;
}
table{
border:1px;
border-collapse:collapse;
width: 101%;
height:100px;
background: rgba(0, 0, 0, 0);
}
#en_test2{
background-color:#3c8408;
width:402px;
padding:3px;
height:60px;
margin:53px 10px 0px 0px;
text-align:center;
border-radius:15px 15px 15px 15px;
overflow:auto;
font-size:35px;
color:#de0101;
text-align:center;
display:inline-block;
}
#dit2{
background-color:#ddd;
border:1px solid #555;
border-radius:15px;
margin:0px 10px;
padding:5px;
margin:4px;
}
#dit3{
background-color:#ddd;
border:1px solid #555;
border-radius:15px;
padding:5px;
margin:5px;
}

  </style>
</head>
<body  dir="rtl">
<div class="qaab_deg">
<?php
  $sql= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_session`='$session' ");
$result=mysqli_fetch_array($sql);
$class=$result['Std_class'];
$Specialty=$result['Std_specialty'];
$std_id=$result['Std_set'];
$session2=$result['Std_session'];
$std_name=$result['Std_name'];
$sql2= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_set`='$id2' ");
$result2=mysqli_fetch_array($sql2);
$class2=$result2['Std_class'];
$Specialty2=$result2['Std_specialty'];
$date2=date("Y-m-d" ,time()+6*3600);
if($session =! $session2){
  echo '<script language="javascript">
swal("غير مصرح لك بدخول هذا الامتحان", {
  buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
}else{
  if($Specialty == $Specialty2){
 if($class == $class2){
   if($id2==$std_id){
$sql2= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `tests` where `Class`='$class' and `Specialty`='$Specialty' and `Tes_DATE`='$date2'  ");
$result2=mysqli_fetch_array($sql2);
$id_test=$result2['Tes_id'];
 $T_name=$result2['T_name'];
$test_name=$result2['Tes_name'];
$time=$result2['Time_test'];
if($Specialty=="CS"){
  $specialty="علوم حاسوب";
}else{
  $specialty="تقنية معلومات";
}
    include"cont.php";
   $sql3=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `answer` where `test_id`='$id_test' and `Set`='$std_id' and ans_case=1");
   $sql6=mysqli_query($connect,"SELECT * from `answer` where `test_id`='$id_test' and `Set`='$std_id'");
    $result3=mysqli_fetch_array($sql3);
     $deg_sut=$result3['deg_qu'];
    $result6=mysqli_num_rows($sql6);
        $sql4=mysqli_query($connect,"SELECT SUM(deg_qu) as deg_qu  from `questions` where `test_id`='$id_test'");
     $sql5=mysqli_query($connect,"SELECT * from `questions` where `test_id`='$id_test' and deg_qu=1");
    $result4=mysqli_fetch_array($sql4);
     $deg_sut2=$result4['deg_qu'];
$result5=mysqli_num_rows($sql5);
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

     echo'<div id="header2_deg">';
   echo '<form name="t" action="student.php" method="POST">';
if($case_stu =="comp"){
if($result6 == $result5){
  $x=$deg_sut/$deg_sut2*100;
  $error=$deg_sut2-$deg_sut;
     $sql8= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`answer` where `test_id`='$id_test' and  Std_name='$id'");
  echo '<table><tr><th>اسم الامتحان</th><th>النسبة التي حصلتا عليها</th><th>التقدير</th></tr>';
 echo '<tr><td>'.$test_name.'</td><td>%'.$x.'</td><td>'.$tk.'</td></tr></table>';
 echo '<details id="details">
 <summary id="summary_deg">تفاضيل الامتحان </summary>';
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
 <div id="qu_deg">سؤال رقم '.++$d.' &nbsp;&nbsp;&nbsp;&nbsp; الدرجة '.$ans_case.'من 1 </div>
 <div id="dit3">
 <u><B>'.$type2.':</B></u>
 <br>
<div id="ans_deg"> '.$qu.':</div>
 <br>';
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
     echo 'اضغظ هنا للخروج من الامتحان⇐<input type="submit" name="end" value="انتهاء الامتحان" id="en_test2" >';
  echo '<br>';
  echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
}else{
  echo "<center>الرجاء الاجابة علي جميع الاسئله </center>";
}}elseif($case_stu =="nocomp"){
  $x=$deg_sut/$deg_sut2*100;
  $error=$deg_sut2-$deg_sut;
     $sql8= mysqli_query($connect,"SELECT * FROM `".$db_name."`.`answer` where `test_id`='$id_test' and  Std_name='$id'");
  $msg=($_GET['msg']);
  echo '<script>
  swal("'.$msg.'",{
          icon:"info",
});
</script>';
echo '<table><tr><th>اسم الامتحان</th><th>الدرجة التي حصلتا عليها</th><th>التقدير</th></tr>';
 echo '<tr><td>'.$test_name.'</td><td>'.$x.'%</td><td>'.$tk.'</td></tr></table>';
 echo '<details id="details">
        <summary id="summary_deg">تفاضيل الامتحان </summary>';
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
  if($type=="mul"){
    $type2="اختر الاجابات الصحيحة ";
  }elseif($type=="one"){
    $type2="اختر الاجابة الصحيحة";
  }else{
   $type2="اختر صح اما خطا";
  }
echo'<div id="dit2">
 <div id="qu_deg">سؤال رقم '.++$d.' &nbsp;&nbsp;&nbsp;&nbsp; الدرجة '.$deg_qu.'من 1 </div>
 <div id="dit3">
 <u><B>'.$type2.':</B></u>
 <br>
<div id="ans_deg"> '.$qu.':</div>
 <br>';
if($type=="eoc"){
    if($Bestans == $ans_Std){
     echo '<div id="ans3">'.$ans1.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
      echo '<div id="ans2">'.$ans2.' </div>';
  }elseif($Bestans != $ans_Std){
    echo '<div id="ans4">'.$ans1.'&nbsp;&nbsp; (اجابة خطا) </div>';
     echo '<div id="ans3">'.$ans2.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
  }}
  if($type=="one"){
    if($Bestans== $ans_Std){
      if($Bestans == $ans1){

    if(!empty($ans1)){
      echo '<div id="ans3">'.$ans1.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
                     }
     if(!empty($ans2)){
       echo '<div id="ans2">'.$ans2.' </div>';
     }
     if(!empty($ans3)) {
       echo '<div id="ans2">'.$ans3.' </div>';
     }
     if(!empty($ans4)){
       echo '<div id="ans2">'.$ans4.' </div>';
                      }
  }elseif($Bestans== $ans2){
   if(!empty($ans1)){
   echo '<div id="ans2">'.$ans1.' </div>';
   }
    if(!empty($ans2)){
      echo '<div id="ans3">'.$ans2.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
                     }
    if(!empty($ans3)){
      echo '<div id="ans2">'.$ans3.' </div>';
                     }
      if(!empty($ans4)){
     echo '<div id="ans2">'.$ans4.' </div>';
      }
  }elseif($Bestans==$ans3){
     if(!empty($ans1)) {
     echo '<div id="ans2">'.$ans1.' </div>';
     }
    if(!empty($ans2)) {
      echo '<div id="ans2">'.$ans2.' </div>';
      }
  if(!empty($ans3)) {
    echo '<div id="ans3">'.$ans3.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
  }
    if(!empty($ans4)) {
      echo '<div id="ans2">'.$ans4.' </div>';
    }
      }elseif($Bestans==$ans4){
      if(!empty($ans1)){
      echo '<div id="ans2">'.$ans1.' </div>';
      }
      if(!empty($ans2)){
      echo '<div id="ans2">'.$ans2.' </div>';
      }
     if(!empty($ans3)){
      echo '<div id="ans2">'.$ans3.' </div>';
     }
     if(!empty($ans4)){
     echo '<div id="ans3">'.$ans4.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
      }}

}elseif($Bestans != $ans_Std){
      if($Bestans == $ans1 && $ans_Std ==$ans2){
   if(!empty($ans1)){
   echo '<div id="ans3">'.$ans1.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans4">'.$ans2.'&nbsp;&nbsp; (اجابة خطا) </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans2">'.$ans3.' </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans2">'.$ans4.' </div>';
     }
   }elseif($Bestans == $ans1 && $ans_Std ==$ans3){
     if(!empty($ans1)){
   echo '<div id="ans3">'.$ans1.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans2">'.$ans2.' </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans4">'.$ans3.'&nbsp;&nbsp; (اجابة خطا) </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans2">'.$ans4.' </div>';
     }
   }elseif($Bestans == $ans1 && $ans_Std ==$ans4){
     if(!empty($ans1)){
   echo '<div id="ans3">'.$ans1.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans2">'.$ans2.' </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans2">'.$ans3.' </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans4">'.$ans4.'&nbsp;&nbsp; (اجابة خطا) </div>';
     }
  }elseif($Bestans== $ans2 && $ans_Std==$ans1){
        if(!empty($ans1)){
   echo '<div id="ans4">'.$ans1.'&nbsp;&nbsp; (اجابة خطا) </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans3">'.$ans2.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans2">'.$ans3.' </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans2">'.$ans4.' </div>';
     }
      }elseif($Bestans== $ans2 && $ans_Std==$ans3){
      if(!empty($ans1)){
   echo '<div id="ans2">'.$ans1.' </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans3">'.$ans2.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans4">'.$ans3.'&nbsp;&nbsp; (اجابة خطا) </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans2">'.$ans4.' </div>';
     }
    }elseif($Bestans== $ans2 && $ans_Std==$ans4){
        if(!empty($ans1)){
   echo '<div id="ans2">'.$ans1.' </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans3">'.$ans2.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans2">'.$ans3.' </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans4">'.$ans4.'&nbsp;&nbsp; (اجابة خطا) </div>';
     }
     }elseif($Bestans==$ans3 && $ans_Std==$ans2){
       if(!empty($ans1)){
   echo '<div id="ans2">'.$ans1.' </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans4">'.$ans2.'&nbsp;&nbsp; (اجابة خطا) </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans3">'.$ans3.' &nbsp;&nbsp; (اجابة صحيحة)</div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans2">'.$ans4.' </div>';
     }
      }elseif($Bestans==$ans3 && $ans_Std==$ans1){
        if(!empty($ans1)){
   echo '<div id="ans4">'.$ans1.'&nbsp;&nbsp; (اجابة خطا) </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans2">'.$ans2.' </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans3">'.$ans3.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans2">'.$ans4.' </div>';
     }
      }elseif($Bestans==$ans3 && $ans_Std==$ans4){
      if(!empty($ans1)){
   echo '<div id="ans2">'.$ans1.' </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans2">'.$ans2.' </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans3">'.$ans3.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans4">'.$ans4.' &nbsp;&nbsp; (اجابة خطا)</div>';
     }
     }elseif($Bestans==$ans4 && $ans_Std=$ans1){
        if(!empty($ans1)){
   echo '<div id="ans4">'.$ans1.'&nbsp;&nbsp; (اجابة خطا) </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans2">'.$ans2.' </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans2">'.$ans3.' </div>';
    }
     if(!empty($ans4)){
       echo '<div id="ans3">'.$ans4.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
     }
      }elseif($Bestans==$ans4 && $ans_Std=$ans2){

      if(!empty($ans1)){
   echo '<div id="ans2">'.$ans1.' </div>';
   }
     if(!empty($ans2)){
     echo '<div id="ans4">'.$ans2.'&nbsp;&nbsp; (اجابة خطا) </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans2">'.$ans3.' </div>';
    }
     if(!empty($ans4)){
     echo '<div id="ans3">'.$ans4.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
     }
     }elseif($Bestans==$ans4 && $ans_Std=$ans3){
     if(!empty($ans1)){
     echo'<div id="ans2">'.$ans1.' </div>';
      }
     if(!empty($ans2)){
     echo '<div id="ans2">'.$ans2.' </div>';
     }
    if(!empty($ans3)){
    echo '<div id="ans4">'.$ans3.'&nbsp;&nbsp; (اجابة خطا) </div>';
      }
     if(!empty($ans4)){
     echo '<div id="ans3">'.$ans4.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
     }
    }
    }
  }elseif($type=="mul"){
    if($deg_qu=="1"){
      if(!empty($ans_Std)){
     echo '<div id="ans3">'.$ans1.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
 }else{
   echo '<div id="ans2">'.$ans1.' </div>';
      }
    if(!empty($ans_Std1)){
 echo '<div id="ans3">'.$ans2.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
    }else{
   echo '<div id="ans2">'.$ans2.' </div>';
    }
    if(!empty($ans_Std2)){
     echo '<div id="ans3">'.$ans3.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
    }else{
 echo '<div id="ans2">'.$ans3.' </div>';

    }
    if(!empty($ans_Std3)){
     echo '<div id="ans3">'.$ans4.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
    }else{
 echo '<div id="ans2">'.$ans4.' </div>';
    }
  }else{
      if($Bestans == $ans_Std){
      if(!empty($ans1)){
     echo '<div id="ans3">'.$ans1.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
 }
    }else{
 echo '<div id="ans4">'.$ans1.'&nbsp;&nbsp; (اجابة خطا) </div>';

    }
    if($Bestans2 == $ans_Std1){
      if(!empty($ans2)){
     echo '<div id="ans3">'.$ans2.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
 }
    }else{
 echo '<div id="ans4">'.$ans2.'&nbsp;&nbsp; (اجابة خطا) </div>';

    }
    if($Bestans3 == $ans_Std2){
      if(!empty($ans3)){
     echo '<div id="ans3">'.$ans3.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
 }
    }else{
 echo '<div id="ans4">'.$ans3.'&nbsp;&nbsp; (اجابة خطا) </div>';

    }
    if($Bestans4 == $ans_Std3){
      if(!empty($ans4)){
     echo '<div id="ans3">'.$ans4.'&nbsp;&nbsp; (اجابة صحيحة) </div>';
 }
    }else{
 echo '<div id="ans4">'.$ans4.'&nbsp;&nbsp; (اجابة خطا) </div>';

    }
    }}
echo'</div>
 </div>';
}
       echo'</details>';
     echo '<hr>';
     echo 'اضغظ هنا للخروج من الامتحان⇐<input type="submit" name="end" value="انتهاء الامتحان" id="en_test2" >';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
}
echo '</form></div>';
?>
<br>  </div>
  <?php

}else{
   echo '<script language="javascript">
swal("هذا الصفحة لا تتبع ليك ", {
  buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
   }
 }else{
   echo '<script language="javascript">
swal("انت لست في هذا الفصل", {
  buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
 }}else{
  echo '<script language="javascript">
swal("انت لست في هذا التخصص .. هذا الامتحان يتبع للتخصص اخر", {
  buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
  }}
?>
</body></html>