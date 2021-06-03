<?php
session_start();
ob_start();
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
if(!isset($_SESSION['Std_name']) && !isset($_SESSION['Std_set']))
          {
header("Location:en_student.php");
          }
?>
<html>
 <head>
  <title>حفظ اجابة الطالب</title>
   <script src="gg.js"></script>
     <style>
    body{
background-image:url(img/ss.jpg);
background-repeat:no-repeat;
background-size:100% 1500px;
      }
  </style>
  </head>
  <body>
<?php
$session=($_GET['session']);
$name_Qu=($_GET['nameQu']);
$page=($_GET['page']);
$page2=$page+1;
if ( empty($_POST['ans1'])
  and empty($_POST['ans2'])
 and  empty($_POST['ans3'])
  and empty($_POST['ans4'])){
	echo'<script language="javascript">
    swal( "يرجى اختيار اجابة واحدة علي الاقل ",{
  buttons: false,
  timer: 3000,
  icon:"info",
    });window.location.href="sut_test.php?session='.$session.'&page='.$page.'&nameQu='.$name_Qu.'";</script>';
	} else {
include "cont.php";
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
$date2=date("Y-m-d");
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
$test_name=$result2['Tes_name'];
$time=$result2['Time_test'];
  ?>
<?php
     $Qu=($_GET['Qu']);
     $type=($_GET['type']);
     if($type=="mul"){
    if($_POST["submit2"]){
$ans1=$_POST['ans1'];
      echo "<br>";
 $ans2=$_POST['ans2'];
      echo "<br>";
 $ans3=$_POST['ans3'];
      echo "<br>";
  $ans4=$_POST['ans4'];
echo "<br>";
$sql6=mysqli_query($connect,"INSERT INTO`".$db_name."`.`answer` (
`ans_id` ,
`Que_id` ,
`Std_name` ,
`ans_Std`,
`ans_Std1`,
`ans_Std2`,
`ans_Std3`,
`Set`
)
VALUES (
null , '$Qu','$std_name' ,'$ans1','$ans2','$ans3','$ans4','$std_id')"
);
      $session=($_GET['session']);
      $page=($_GET['page']);
$page2=$page+1;
include "cont.php";
 $statement = "`".$db_name."`.`questions` where `test_id`='$id_test' and `type_Qu`='$type' and  deg_qu=1";
 $query =mysqli_query($connect,"SELECT COUNT(*) as `Qu_id` FROM {$statement}");
    	$row = mysqli_fetch_array($query);
    	$total = $row['Qu_id'];
 $sql7=mysqli_query($connect,"SELECT * FROM    `questions`  where  Qu='$Qu'");
    $result5=mysqli_fetch_array($sql7);
    $std_ans5=$result5['Bestans'];
      echo"<br>";
     $std_ans2=$result5['Bestans2'];
      echo "<br>";
   $std_ans3=$result5['Bestans3'];
   $std_ans4=$result5['Bestans4'];
    $deg_qu=$result5['deg_qu'];
    $test_id=$result5['test_id'];
      $t=$result5['t'];
   $sql8=mysqli_query($connect,"SELECT * FROM    `answer`  where  Que_id='$Qu' and  `Set`='$std_id'");
    $result6=mysqli_fetch_array($sql8);
    echo "<br>";
if($std_ans5==$ans1){
     $deg1="1";
   }else{
     $deg1="0-.25";
  }
      if($std_ans2==$ans2){
     $deg2="1";
   }else{
     $deg2="0-.25";
   }
if($std_ans3==$ans3){
     $deg3="1";
   }else{
     $deg3="0-.25";
   }

if($std_ans4==$ans4){
     $deg4="1";
   }else{
     $deg4="0-.25";
   }
   $a=$deg1*$deg_qu;
      echo "<br>";
    $b=$deg2*$deg_qu;
      echo "<br>";
   $c=$deg3*$deg_qu;
      echo "<br>";
 $d=$deg4*$deg_qu;
      echo "<br>";
   $deg_qu2=$a+$b+$c+$d;
echo "<br>";
 $deg_qu3=$deg_qu2/4;
   $case= mysqli_query($connect,"UPDATE `".$db_name."`.`answer` SET `test_id`='$test_id' ,`ans_case` =1 , `deg_qu`='$deg_qu3' WHERE `answer`.`Que_id` ='$Qu' and `Set`='$std_id'");
if($case){
 if($total == $page){
   echo'<script language="javascript">
    window.location.href="sut_test.php?session='.$session.'&page='.$page.'&nameQu='.$name_Qu.'";</script>';
 }else{
    echo'<script language="javascript">
    window.location.href="sut_test.php?session='.$session.'&page='.$page2.'&nameQu='.$name_Qu.'";</script>';
 }
}else{
  echo "لم يتم حفظ الاجابة الصحيحة";
}
}}
?>
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
}

?>