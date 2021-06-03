<?php
session_start();
ob_start();
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
if(!isset($_SESSION['Std_name']) && !isset($_SESSION['Std_set']))
          {
header("Location:en_student.php");
          }
$session=($_GET['session']);
$name_Qu=($_GET['nameQu']);
include "cont.php";
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
$session=($_GET['session']);
  $Qu=($_GET['Qu']);
  $type=($_GET['type']);
  $page=($_GET['page']);
  $page2=$page+1;
  if($type=="one"){
  if (empty($_POST['ans'])){
 echo '<script language="javascript">
swal("يرجي اختيار اجابة واحدة فقط", {
  buttons: false,
  timer: 3000,
  icon:"info",
}); window.location.href="en_test.php?session='.$session.'&page='.$page.'&nameQu='.$name_Qu.'";</script>';
	} else {
  if($_POST["submit"]){
  $ans1=$_POST['ans'];
$sql3=mysqli_query($connect,"INSERT INTO`".$db_name."`.`answer` (
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
include "cont.php";
 $sql4=mysqli_query($connect,"SELECT * FROM    `questions`  where  Qu='$Qu' and deg_qu=1");
    $result3=mysqli_fetch_array($sql4);
$std_ans1=$result3['Bestans'];
$deg_qu=$result3['deg_qu'];
$test_id=$result3['test_id'];
$sql5=mysqli_query($connect,"SELECT * FROM    `answer`  where  Que_id='$Qu' and  `Set`='$std_id'");
    $statement = "`".$db_name."`.`questions` where `test_id`='$id_test' and `type_Qu`='$type' and  deg_qu=1";
 $query =mysqli_query($connect,"SELECT COUNT(*) as `Qu_id` FROM {$statement}");
    	$row = mysqli_fetch_array($query);
    	$total = $row['Qu_id'];
    $result4=mysqli_fetch_array($sql5);
    echo "<br>";
   $ans1=$result4['ans_Std'];
   if($std_ans1==$ans1){
     $deg=1;
   }else{
     $deg=0;
   }
    $case = mysqli_query($connect,"UPDATE `".$db_name."`.`answer` SET `test_id`='$test_id' ,`ans_case` = '$deg' , `deg_qu`='$deg_qu' WHERE `answer`.`Que_id` ='$Qu' and `Set`='$std_id'");
if ($case){
   if($total == $page){
   echo'<script language="javascript">
    window.location.href="en_test.php?session='.$session.'&page='.$page.'&nameQu='.$name_Qu.'";</script>';
 }else{
echo'<script language="javascript">
    window.location.href="en_test.php?session='.$session.'&page='.$page2.'&nameQu='.$name_Qu.'";</script>';
   }
}else{
 echo '<script language="javascript">
swal("لم يتم حفظ الاجابة الصحيحة", {
  buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
}
}
  }  }elseif($type=="eoc"){
    $name_Qu=($_GET['nameQu']);
    $page=($_GET['page']);
    if (empty($_POST['ans'])){
	 echo '<script language="javascript">
swal("يرجي اختيار اجابة واحدة فقط", {
  buttons: false,
  timer: 3000,
  icon:"info",
}); window.location.href="sut_test2.php?session='.$session.'&page='.$page.'&nameQu='.$name_Qu.'";</script>';
	} else {
    if($_POST["submit2"]){
  $ans5=$_POST['ans'];
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
null , '$Qu','$std_name' ,'$ans5','$ans2','$ans3','$ans4','$std_id')"
);
 $sql7=mysqli_query($connect,"SELECT * FROM    `questions`  where  Qu='$Qu' and deg_qu=1");
    $result5=mysqli_fetch_array($sql7);
    $std_ans1=$result5['Bestans'];
    $deg_qu=$result5['deg_qu'];
    $test_id=$result5['test_id'];
   $sql8=mysqli_query($connect,"SELECT * FROM    `answer`  where  Que_id='$Qu' and  `Set`='$std_id'");
      $statement = "`".$db_name."`.`questions` where `test_id`='$id_test' and `type_Qu`='$type' and  deg_qu=1";
 $query =mysqli_query($connect,"SELECT COUNT(*) as `Qu_id` FROM {$statement}");
    	$row = mysqli_fetch_array($query);
    	$total = $row['Qu_id'];
    $result6=mysqli_fetch_array($sql8);
    echo "<br>";
   $ans1=$result6['ans_Std'];
   if($std_ans1==$ans5){
     $deg=1;
   }else{
     $deg=0;
   }
    $case2 = mysqli_query($connect,"UPDATE `".$db_name."`.`answer` SET `test_id`='$test_id' ,`ans_case` = '$deg' , `deg_qu`='$deg_qu' WHERE `answer`.`Que_id` ='$Qu' and `Set`='$std_id'");
if ($case2){
   if($total == $page){
   echo'<script language="javascript">
    window.location.href="sut_test2.php?session='.$session.'&page='.$page.'&nameQu='.$name_Qu.'";</script>';
 }else{
echo'<script language="javascript">
    window.location.href="sut_test2.php?session='.$session.'&page='.$page2.'&nameQu='.$name_Qu.'";</script>';
   }
}else{
 echo '<script language="javascript">
swal("لم يتم حفظ الاجابة الصحيحة", {
  buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
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