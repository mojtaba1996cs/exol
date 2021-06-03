<?php
session_start();
ob_start();
  $id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
$time1=$_SESSION['time'];
if(!isset($_SESSION['Std_name']) && !isset($_SESSION['Std_set']))
          {
header("Location:en_student.php");
          }
$session=($_GET['session']);
$name_Qu=($_GET['nameQu']);
$v=($_GET['v']);
include "cont.php";
$sql= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `students` where `Std_set`='$id2' ");
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
$date2=date("Y-m-d", time()+0*3600);
$sql3= mysqli_query($connect,"SELECT  * FROM `".$db_name."`. `tests` where `Class`='$class' and `Specialty`='$Specialty' and `Tes_DATE`='$date2'  ");
$result3=mysqli_fetch_array($sql3);
$id_test=$result3['Tes_id'];
$test_name=$result3['Tes_name'];
$T_name=$result3['T_name'];
$time=$result3['Time_test'];
$time2=$result3['time3'];
$time3=(strtotime($time2))+$time*3600;
$time3=date("H:i:s",$time3);
?>
<html dir="rtl">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

   <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>سكربت العد التنازلي</title>
  <script type="text/javascript" src="js3/ss_load.js"></script>
   <link href="css2/ss_countdown.css" rel="stylesheet" type="text/css" media="screen">
    </head>
    <body>
        <div class="ss-countdown-container">
	        <h1>الوقت المتبقي لانهاء الامتحان</h1>
	        <div class="ss-clock-container">
<div class="ss-clock-days-container">
	                <div class="ss-bg-layer"><canvas class="ss-days-canvas" width="216" height="216"></canvas><div class="ss-text"><p class="ss-value">0</p><p class="ss-days-text">أيام</p></div></div>
	            </div>

	            <div class="ss-clock-hours-container">
	                <div class="ss-bg-layer"><canvas class="ss-hours-canvas" width="216" height="216"></canvas><div class="ss-text"><p class="ss-value">0</p><p class="ss-hours-text">ساعات</p></div></div>
	            </div>

	            <div class="ss-clock-minutes-container">
	                <div class="ss-bg-layer"><canvas class="ss-minutes-canvas" width="216" height="216"></canvas><div class="ss-text"><p class="ss-value">0</p><p class="ss-minutes-text">دقائق</p></div></div>
	            </div>

	            <div class="ss-clock-seconds-container">
	                <div class="ss-bg-layer"><canvas class="ss-seconds-canvas" width="216" height="216"></canvas><div class="ss-text"><p class="ss-value">0</p><p class="ss-seconds-text">ثواني</p></div></div>
	            </div>
          </div>
        </div>
      <script>
      var ssCountdownDefaultOptions = ssCountdownDefaultOptions || {};

ssCountdownDefaultOptions.secondsColor 	= 	"#11c8ea";
ssCountdownDefaultOptions.minutesColor 	= 	"#ff5153";
ssCountdownDefaultOptions.hoursColor 	= 	"#23d0a2";
ssCountdownDefaultOptions.daysColor 	= 	"#f9b401";

/*
 * IMPORTANT NOTES:
 * The parameters below must be in the correct format, including length of them.
 * */

/*Date Format: YYYY-MM-DD*/
ssCountdownDefaultOptions.date = "<?php echo $date2; ?>";

/*Time Format: hh:mm:ss*/
ssCountdownDefaultOptions.time 	= "<?php echo $time3; ?>";

/*Timezone Format: GMT+HH:MM
 * Example:
 * GMT+00:00
 * GMT+08:00
 * GMT-08:30
*/
ssCountdownDefaultOptions.timezone 		= 	"GMT+02:00";
      </script>
    </body>
</html>