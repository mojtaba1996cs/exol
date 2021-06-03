<?php
session_start();
ob_start();
$id=$_SESSION['Std_name'];
$id2=$_SESSION['Std_set'];
if(!isset($_SESSION['Std_name']) &&!isset($_SESSION['Std_set']))
          {
header("Location:en_student.php");
          }
$session=($_GET['session']);
$name_Qu=($_GET['nameQu']);
include "cont.php";
?>

<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ورقة الاسئله السؤال <?php echo $name_Qu;?></title>
    <link rel="shortcut icon" href="img/rr3.jpg">
<link href="style.css" rel="stylesheet" type="text/css">
  <link href="grey.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js2/jquery.cookie.js"></script>
  <script src="gg.js"></script>
<style>
.container{
display:inline-block;
position: relative;
margin: 0px;
height: auto;
width: 600px;
padding: 40px;
}
h2 {
color: #000;
}
.container ul{
list-style: inline-block;
margin: 0;
padding: 0;
}
ul li{
color: #AAAAAA;
display:inline-block;
position: relative;
width: 48%;
height:90px;
padding:0px;
border-bottom:5px solid #988c8c;
}
ul li input[type=radio]{
position: absolute;
visibility: hidden;
}
ul li label{
display:inline-block;
position: relative;
font-weight: 300;
font-size: 1.10em;
padding: 25px 25px 25px 80px;
margin: 8px -15px;
height: 30px;
z-index: 9;
cursor: pointer;
-webkit-transition: all 0.25s linear;
color:#8f0d0d;
}
ul li:hover label{
color: #000;
}
ul li .check2{
display: inline-block;
position: absolute;
border: 5px solid #f87878;
border-radius:100%;
height: 25px;
width: 25px;
top: 30px;
left: 20px;
z-index: 5;
float:right;
/*  visibility: hidden;*/
transition: border .50s linear;
-webkit-transition: border .60s linear;
}
input[type=radio]:checked ~ .check2::before{
}
ul li .check{
display: inline-block;
position: absolute;
border: 5px solid #f87878;
border-radius:100%;
height: 25px;
width: 25px;
top: 30px;
left: 20px;
z-index: 5;
float:right;
/*  visibility: hidden;*/
transition: border .50s linear;
-webkit-transition: border .60s linear;
}
input[type=radio]:checked ~ .check::before{
}
ul li:hover .check2 {
border: 5px solid #FFFFFF;
}
ul li .check2::before {
display: inline-block;
position: absolute;
content: '';
border-radius:100%;
height: 15px;
width: 15px;
top: 5px;
left: 5px;
margin: auto;
transition: background 0.25s linear;
-webkit-transition: background 0.25s linear;
}
ul li .check::before {
display: inline-block;
position: absolute;
content: '';
border-radius:100%;
height: 15px;
width: 15px;
top: 5px;
left: 5px;
margin: auto;
transition: background 0.25s linear;
-webkit-transition: background 0.25s linear;
}
input[type=radio]:checked ~ .check2{
border: 2px solid #06a85f;
background-image:url("img/cr2.png");
background-size:100%;
visibility:visible;
}
input[type=radio]:checked ~ .check{
border: 2px solid #06a85f;
background-image:url("img/crr.png");
background-size:100%;
visibility:visible;
}
input[type=radio]:checked ~ label{
color: #deb6b6;
}
#submit{
background-color:#18a70c;
box-shadow:5px 5px 10px 7px rgba(0,0,0,0.3);
border-radius:15px;
width:100px;
height:50px;
margin:-10px 80px 0px 0px;
font-size:26px;
color:#9d0a0a;
}
#textfield{
border-radius: 5px;
width: 274px;
background-color:#e8efe4;
height:29px;
border:5px double #9a0808;
border-left-style:none;
border-right-style:none;
border-top-style:none;
margin:-56px 0px 0px 0px;
}
#block{
background-color:#128409;
margin: 8px 0px;
height: 60px;
padding: 5px;
border-radius: 10px;
box-shadow:5px 5px 5px 5px rgba(0,0,0,0.3);
}
.footer-copyright1{
border-radius: 7px 7px 7px 7px;
padding: 10px;
border: 2px solid #000;
width: 98%;
height: 22px;
margin: 19px 0px 0px 0px ;
}
#viwe{
background-color:#128409;
margin: 8px 0px;
height: 100px;
padding: 16px;
width:290px;
margin:12px 5px 0px 0px ;
border-radius: 10px;
box-shadow:5px 5px 5px 5px rgba(0,0,0,0.3);
text-align:center;
overflow-x:scroll;
overflow-y:scroll;
}
.exam{
padding:9px;
margin:40px 4px 0px 0px;
width:97%;
background-color:#e8efe4;
border-radius: 10px;
box-shadow:5px 5px 10px 7px #256d06;
font-size: 23px;
padding-left:10px;
font-weight: bold;
font-family: 'Rokkitt', serif;
overflow-y:scroll ;
overflow-x:scroll;
border: 2px solid #fff;
background-repeat: no-repeat;
background-size:100% 901px;
visibility:visible;
color:#8b0808;
}
.exam2{
padding:9px;
margin:10px 4px 0px 0px;
width:97%;
background-color:#e8efe4;
border-radius: 10px;
box-shadow:5px 5px 10px 7px #256d06;
font-size: 23px;
padding-left:10px;
font-weight: bold;
font-family: 'Rokkitt', serif;
overflow-y:scroll ;
overflow-x:scroll;
border: 2px solid #fff;
background-repeat: no-repeat;
background-size:100% 901px;
visibility:visible;
color:#8b0808;
}
#save{
background-color:#bc1d0e;
margin:20px 670px 0px 0px;
width:190px;
height:60px;
overflow-y:scroll;
border-radius:10px;
font-size:28px;
outline:4px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
border:2px solid #b1b5b2;
}
#save2{
background-color:#0c9a0f;
margin:10px 30px 0px 0px;
width:250px;
height:60px;
overflow-y:scroll;
border-radius:10px;
display:inline-block;
font-size:27px;
padding:16px;
outline:4px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
border:2px solid #b1b5b2;
}
#save3{
background-color:#0c9a0f;
margin:20px 550px 0px 0px;
width:250px;
height:60px;
overflow-y:scroll;
border-radius:10px;
font-size:27px;
padding:12px;
display:inline-block;
outline:4px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
border:2px solid #b1b5b2;
}
#save4{
background-color:#0c9a0f;
margin:20px 300px 0px 0px;
width:250px;
height:60px;
overflow-y:scroll;
border-radius:10px;
font-size:27px;
padding:12px;
display:inline-block;
outline:4px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
border:2px solid #b1b5b2;
}
#header2{
margin:19px 20px 0px 0px;
width:95%;
height:50px;
background-color:#e9f6f0;
border-radius: 10px;
box-shadow:5px 5px 5px 5px rgba(0,0,0,0.3);
color:#333;
font-size: 23px;
padding-left:10px;
font-weight: bold;
font-family: 'Rokkitt', serif;
overflow-y:scroll ;
overflow-x:scroll;
background-repeat:no-repeat;
background-size:100% 200px;
border:5px double #000;
}
#input{
display:inline;
}
#n{
font-size:25px;
}
#Qu{
font-size:35px;
}
#Qu2{
background-color:#ddd;
width:800px;
font-size:35px;
padding:5px;
border:1px solid #555;
border-radius:15px;
}
#Qu3{
background-color:#ddd;
width:800px;
font-size:35px;
padding:18px;
border:1px solid #555;
border-radius:15px;
}
.ul2{
background-color:#ddd;
width:800px;
border:1px solid #555;
border-radius:15px;
height:180px;
margin:-40px 55px;
}
.ul{
background-color:#ddd;
width:800px;
border:1px solid #555;
border-radius:15px;
height:300px;
margin:-40px 55px;
}
#h{
width: 200px;
background-color:#e8efe4;
height:39px;
border:5px double #9a0808;
border-left-style:none;
border-right-style:none;
border-top-style:none;
}
#radio{
color:red;
background-color:red;
border-color:red;
font-size:50px;
color:#000;
}
.records {
width:99%;
margin: 10px 0px;
padding:5px ;
border:1px solid #B6B6B6;
text-align:center;
}
.record {
color: #474747;
margin: 10px -2px;
padding: 3px;
background:#E6E6E6;
border: 1px solid #B6B6B6;
cursor: pointer;
letter-spacing: 2px;
}
.record:hover {
background:#D3D2D2;
}
.round {
-moz-border-radius:8px;
-khtml-border-radius: 8px;
-webkit-border-radius: 8px;
border-radius:8px;
}
#ans{
color:#000;
font-size:30px;
}
#nameT{
margin:32px 650px 0px 0px;
}
.col{
background-color:#c4bfbf;
overflow-x:scroll;
border-radius:5px 5px 5px 5px #f5f5f5;
}
#img{
border-radius:50%;
margin:8px 6px 0px 0px;
}
#ta{
border-radius:20px;
background-color:#fff;
border:2px solid #ede151;
padding:10px;
height:100px;
}
#ta2{
color:#000;
display:inline-block;
font-size:39px;
}
</style>
</head>
<body  dir="rtl">
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
$date2=date("Y-m-d",time()+7*3600);
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
  ?>
<div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/>
 </div><hr>
<?php include "time.php"; ?>

    <?php
     $name_Qu=($_GET['nameQu']);
$d=($_GET['page']);
   $type="eoc";
  include"cont.php";
  include"function.php";
$sql7=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='$type' and deg_qu=1");               $deg3=mysqli_num_rows($sql7);
$sql6=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='mul' and deg_qu=1");               $deg2=mysqli_num_rows($sql6);
$sql8=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='one' and deg_qu=1");
$deg=mysqli_num_rows($sql8);
$sql3=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='one' and deg_qu=1");
$sql10=mysqli_query($connect,"SELECT * from questions where test_id='$id_test' and `type_Qu`='mul' and deg_qu=1");
  if($deg ==0 ||$deg2 ==0){
    echo '<div class="exam">';
echo '<center><table><tr><td><center>جامعة دنقلا</center></td></tr>
<tr><td><center>كلية علوم الحاسوب والتنمية البشرية</center></td></tr>
<tr><td><center>لجنة امتحانات الدور الاول _دورة '.$date=date("Y-M").'
</center></td></tr>
<tr><td><center>'.$class.'– بكالريوس '.$specialty.'
</center></td></tr></table></center>
<table id="input"><tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><td><b id="n">الاسم:</b></td><td><input type="text" name="std_name" id="textfield" value="'.$std_name.'" disabled ></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td><b id="n">رقم الجلوس:</b></td><td><input type="text" name="std_set" id="textfield" value='.$id2.' disabled></td></tr></table>
      <div id="header2">
    <table>
       <tr>
      <td></td><td></td><td>التاريخ:</td> <td>'.$date2.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
         <td>المادة:</td> <td>'.$test_name.'</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
         <td>الزمن:</td> <td>'.$time.'ساعات</td>
       </tr>
</table></div>
     <p id="h">اجب علي جميع الاسئلة </p>
 <div id="ta"> <div id="ta2"><img src="img/i.png" height="30" width="30"></div><div id="ta2">تعليمات:</div></div>';
    echo "<hr>";
  }else{
    echo '<div class="exam2">';
  }
$page = (int) (!isset($_GET["page"]) ? 1: $_GET["page"]);
    $session=  (!isset($_GET["session"]) ? $session: $_GET["session"]);
    	$limit =1;
  $startpoint = ($page * $limit) - $limit;
$statement = "`".$db_name."`.`questions` where `test_id`='$id_test' and `type_Qu`='$type' and deg_qu=1 ";
  $sql4= mysqli_query($connect,"SELECT * FROM {$statement}  LIMIT {$startpoint} , {$limit} " );
      if($sql4-> num_rows >0){
 echo'<table><tr><td id="Qu">السؤال '.$name_Qu.':ضع علامة<u>✓</u>امام الاجابة الصحيحة وعلامة<i><u>×</u></i>اما الاجابة الخطا</td></tr></table><hr>';
$result9=mysqli_fetch_array($sql4);
$Qu=$result9['Qu'];
$ans1=$result9['ans1'];
$ans2=$result9['ans2'];
echo'<form name="test" action="answer.php?session='.$session.'&Qu='.$Qu.'&type='.$type.'&d='.$d.'&nameQu='.$name_Qu.'&page='.$page.'" method="post">';
echo'<div class="container"><div id="Qu3"><table><tr><td>'.$d.'/'.$Qu.'</b></td></tr><tr><td></td></tr></table></div></div>';
 echo'<div class="ul2"><ul dir="ltr">
  <li>
    <input type="radio" value="'.$ans1.'"  id="u-option" name="ans">
    <label for="u-option">'.$ans1.'</label>

    <div class="check" dir="ltr"></div>
  </li>

  <li>
    <input type="radio" value="'.$ans2.'"  id="m-option" name="ans">
    <label for="m-option">'.$ans2.'</label>

    <div class="check2"><div class="inside"></div></div>
  </li>
  </ul>
  </div>';
 $sql9=mysqli_query($connect,"SELECT * FROM    `answer`  where  Que_id='$Qu' and  `Set`='$std_id'");
  echo"<br>";
 if($sql9-> num_rows >0){
  echo "<div id='save3'><table><tr><td><a href='#'>تم حفظ الاجابة</a></td><td></td></tr></table></div>";
 }else{
  echo "<div><input type='submit' name='submit2' value='حفظ الاجابة' id='save'></div>";
 }
echo "<hr>";

 echo "<div class='records round'>";
echo pagination
 ($statement,$limit,$page,$session,$name_Qu);
   echo "<br>";
echo "</div>";
   echo "<hr>";
 }else{
   echo "";
 }
echo '<center style="font-size:30px;">تم بحمدلله☻</center>';
echo '<div id="nameT">استاذ المادة:'.$T_name.'</div>';
  echo '<hr>';
echo'<hr>';
 if($sql10-> num_rows >0 && $sql3-> num_rows >0){
     if($deg > $deg2){
  echo "<table><tr><td><a href='sut_test.php?session=".$session."&page=1&nameQu=الثاني' id='save2'>««الصفحة السابقة</a></td><td><a href='deg.php?session=".$session."&casesut=comp' id='save4'> معرف النتيجة </a></td></tr></table>";
     }else{
       echo "<table><tr><td><a href='en_test.php?session=".$session."&page=1&nameQu=الثاني' id='save2'>««الصفحة السابقة</a></td><td><a href='deg.php?session=".$session."&casesut=comp' id='save4'>معرفة النتيجة</a></td></tr></table>";
     }
       echo "<hr>";
       include "index2.php";
       echo '<br>';
       echo "<hr>";
echo "<div><center>3</center></div>";
     } elseif($sql3-> num_rows >0 && $sql10 -> num_rows <=0){
       echo "<table><tr><td><a href='en_test.php?session=".$session."&page=1&nameQu=الاول' id='save2'>««الصفحة السابقة</a></td><td><a href='deg.php?session=".$session."&casesut=comp' id='save4'>معرفة النتيجة</a></td></tr></table>";
     echo "<hr>";
echo "<div><center>2</center></div>";
     }elseif($sql10-> num_rows >0 && $sql3 -> num_rows <=0){
       echo "<table><tr><td><a href='sut_test.php?session=".$session."&page=1&nameQu=الاول' id='save2'>««الصفحة السابقة</a></td><td><a href='deg.php?session=".$session."&casesut=comp' id='save4'>معرفة النتيجة</a></td></tr></table>";
     echo "<hr>";
     include "index2.php";
     echo '<br>';
     echo "<hr>";
echo "<div><center>2</center></div>";
     }else{

          echo "<table><tr><td><a href='deg.php?session=".$session."&casesut=comp' id='save3'>معرفة النتيجة</a></td></tr></table>";
   echo "<hr>";
   include "index2.php";
   echo '<br>';
   echo "<hr>";
echo "<div><center>1</center></div>";

 }
   echo "</div>";
  ?>

<script>
/*  $(document).ready(function(){
		var time2= <?php// echo isset($timeAgo)?$timeAgo:0; ?>;
        var time3= <?php// echo isset($timeAcg)?$timeAcg:0; ?>;
        var session="deg.php?session=<?php// echo $session ;?>&casesut=nocomp";
        var time= $.cookie('totalMins') || time2;
    var tt= $.cookie('totalMins2') || time3;
var msg = "زمن الامنتحان انتهاء سيتم تحويك الي صفحة النتيجة.. اضغظ موافق للدخول الي صفحة النتيجة";
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
                if (msg) {
        swal(msg ,{
          icon:"info",
})
.then((willDelete) => {
  if (willDelete) {
 window.location.href=session;
  }});
                }
                      } else {
                time--;
            }
        if (time == tt) {
                swal('تم مرور نص الزمن' ,{
          icon:"info",
});
            }
        }
            var countdownTimer = setInterval(function(){
        makeTime()
        var date = new Date();
        date.setTime(date.getTime() + (minuts * 60 * 1000));
        if(time===0){
            $.removeCookie('totalMins', { path: '/' });
        }
        else{
            $.cookie('totalMins',time, { expires: date, path: '/' });
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

	});*/
</script>

 <div class="clearfix"></div>
 <footer class="footer-copyright1">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
  </body>
  </html>
  <?php
}else{
     echo '<script language="javascript">
swal("هذا الصفحة لا تتبع ليك ", {
  buttons: false,
  timer: 3000,
  icon:"info",
});
</script>';
   }}else{
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