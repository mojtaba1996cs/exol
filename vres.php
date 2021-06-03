<html>
  <head>
 <style>
#search_res_for{
background-color:#ccabab;
padding:6px;
height:100px;
border-radius:0px 15px 15px 0px;
   }
#res{
background-color:#ccabab;
padding:6px;
height:100px;
border-radius:15px 0px 0px 15px;
}
#y{
background-color:#555;
padding:6px;
height:100px;
width:-1px;
}
#ul{
color: #AAAAAA;
display:block;
position: relative;
width: 90%;
height:90px;
border-bottom:5px solid #988c8c;
   }
#text{
background-color:#ddd;
font-size:35px;
padding:5px;
border:1px solid #555;
border-radius:15px;
}
#text:hover{
background-color:#9b9494;
font-size:35px;
padding:5px;
border:1px solid #555;
border-radius:15px;
}
 </style>
  </head>
<body dir="rtl">
<?php
$x=$_GET['res'];
if($x=="المستوي الاول"){
$y="viwesut2.php";
if (isset($_GET['queryString']))
{
  $string = '';
  $text = $_GET['queryString'];

  if(isset($_GET['options']))
  {
    if ($_GET['options'] == "name")
    {
      $select = "Std_name";
    }
    else
    {
      $select = "Std_set";
    }
   include"cont.php";
      $result = mysqli_query($connect,"SELECT * FROM students WHERE $select LIKE '%" .$text. "%' and Std_level='".$x."'");

    if($result -> num_rows < 1)
    {
      $string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>لاتوجد نتائج للبحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</span></center>";
      $string .=  "<br><br>";
    }
    else
    {

      $string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>كلمة البحث</span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</b></span></center>";
      $string .= "<br><br>";

      while($row = mysqli_fetch_array($result))
      {
        $name = $row['Std_name'];
        $path = "vres.php?id=".$row['Std_id']."&res=viwe&z=$y&x=$x";
        $string .= "<ul id=\"ul\">";
        $string .= "<a href=\"$path\" target=\"_blank\" id=\"res_link\"><li id=\"text\"> $name </li></a>";
        $string .= "</ul>";
      }
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$string&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  $t=$result->num_rows;
    $string2 .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>عدد نتائج البحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$t."</span></center>";
   echo   $string2 .= "<br>";
  }
}
}elseif($x=="المستوي الثاني"){
$y="viwesut3.php";
if (isset($_GET['queryString']))
{
  $string = '';
  $text = $_GET['queryString'];

  if(isset($_GET['options']))
  {
    if ($_GET['options'] == "name")
    {
      $select = "Std_name";
    }
    else
    {
      $select = "Std_set";
    }
   include"cont.php";
      $result = mysqli_query($connect,"SELECT * FROM students WHERE $select LIKE '%" .$text. "%' and Std_level='".$x."'");

    if($result -> num_rows < 1)
    {
$string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>لاتوجد نتائج للبحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</span></center>";
      $string .=  "<br><br>";
    }
    else
    {

      $string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>كلمة البحث</span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</b></span></center>";
      $string .= "<br><br>";

      while($row = mysqli_fetch_array($result))
      {
        $name = $row['Std_name'];
        $path = "vres.php?id=".$row['Std_id']."&res=viwe&z=$y&x=$x";
        $string .= "<ul id=\"ul\">";
        $string .= "<a href=\"$path\" target=\"_blank\" id=\"res_link\"><li id=\"text\"> $name </li></a>";
        $string .= "</ul>";
      }
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$string&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
      $t=$result->num_rows;
    $string2 .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>عدد نتائج البحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$t."</span></center>";
   echo   $string2 .= "<br>";
  }
}
}elseif($x=="المستوي الثالث"){
$y="viwesut4.php";
if (isset($_GET['queryString']))
{
  $string = '';
  $text = $_GET['queryString'];

  if(isset($_GET['options']))
  {
    if ($_GET['options'] == "name")
    {
      $select = "Std_name";
    }
    else
    {
      $select = "Std_set";
    }
   include"cont.php";
      $result = mysqli_query($connect,"SELECT * FROM students WHERE $select LIKE '%" .$text. "%' and Std_level='".$x."'");

    if($result -> num_rows < 1)
    {
$string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>لاتوجد نتائج للبحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</span></center>";
      $string .=  "<br><br>";
    }
    else
    {

      $string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>كلمة البحث</span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</b></span></center>";
      $string .= "<br><br>";

      while($row = mysqli_fetch_array($result))
      {
        $name = $row['Std_name'];
        $path = "vres.php?id=".$row['Std_id']."&res=viwe&z=$y&x=$x";
        $string .= "<ul id=\"ul\">";
        $string .= "<a href=\"$path\" target=\"_blank\" id=\"res_link\"><li id=\"text\"> $name </li></a>";
        $string .= "</ul>";
      }
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$string&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  $t=$result->num_rows;
    $string2 .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>عدد نتائج البحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$t."</span></center>";
   echo   $string2 .= "<br>";
  }
}
}elseif($x=="المستوي الرابع"){
$y="viwesut5.php";
if (isset($_GET['queryString']))
{
  $string = '';
  $text = $_GET['queryString'];

  if(isset($_GET['options']))
  {
    if ($_GET['options'] == "name")
    {
      $select = "Std_name";
    }
    else
    {
      $select = "Std_set";
    }
   include"cont.php";
      $result = mysqli_query($connect,"SELECT * FROM students WHERE $select LIKE '%" .$text. "%' and Std_level='".$x."'");

    if($result -> num_rows < 1)
    {
$string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>لاتوجد نتائج للبحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</span></center>";
      $string .=  "<br><br>";
    }else{
$string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>كلمة البحث</span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</b></span></center>";
      $string .= "<br><br>";

      while($row = mysqli_fetch_array($result))
      {
        $name = $row['Std_name'];
        $path = "vres.php?id=".$row['Std_id']."&res=viwe&z=$y&x=$x";
        $string .= "<ul id=\"ul\">";
        $string .= "<a href=\"$path\" id=\"res_link\"><li id=\"text\"> $name </li></a>";
        $string .= "</ul>";
      }
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$string&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  $t=$result->num_rows;
    $string2 .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>عدد نتائج البحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$t."</span></center>";
   echo   $string2 .= "<br>";
  }
}
  ?>
  </body>
  </html>
  <?php
}elseif($x=="all"){
$y="viwesut.php";
if (isset($_GET['queryString']))
{
  $string = '';
  $text = $_GET['queryString'];

  if(isset($_GET['options']))
  {
    if ($_GET['options'] == "name")
    {
      $select = "Std_name";
    }
    else
    {
      $select = "Std_set";
    }
   include"cont.php";
      $result = mysqli_query($connect,"SELECT * FROM students WHERE $select LIKE '%" .$text. "%' ");

    if($result -> num_rows < 1)
    {
$string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>لاتوجد نتائج للبحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</span></center>";
      $string .=  "<br><br>";
    }else{
$string .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>كلمة البحث</span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$text."</b></span></center>";
      $string .= "<br><br>";

      while($row = mysqli_fetch_array($result))
      {
        $name = $row['Std_name'];
        $path = "vres.php?id=".$row['Std_id']."&res=viwe&z=$y&x=$x";
        $string .= "<ul id=\"ul\">";
        $string .= "<a href=\"$path\" id=\"res_link\"><li id=\"text\"> $name </li></a>";
        $string .= "</ul>";
      }
    }
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$string&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  $t=$result->num_rows;
    $string2 .= "<center><span id=\"search_res_for\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>عدد نتائج البحث</b></span>"."<span id=\"y\">:</span>"."<span id=\"res\">".$t."</span></center>";
   echo   $string2 .= "<br>";
  }
}
}else{
$z=$_GET['z'];
$x=$_GET['x'];
  ?>

<!DOCTYPE  html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> عرض نتيحة البحث عن طالب</title>
<script src="gg.js"></script>
<link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css" media="screen">
  <style>
#img2{
border-right:10px;
margin-top:8px;
  }
#img{
border-radius:50%;
margin:8px 6px 0px 0px;
}
#sch{
border-radius:15px;
width:200px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
background:#ccfec8;
border:1px solid #ccfec8;
margin-top:60px;
  }
#sch2{
width:150px;
font-family: 'Droid Arabic Naskh', serif;
text-shadow: 1px 1px 1px #413659;
background:#0f8c05;
border:1px solid #ccfec8;
border-radius:15px;
}
#r{
border:2px solid #2e8110;
margin-top:30px;
}
#r:hover{
border:2px solid #0ba16e;
}
#post{
width:100%;
overflow:auto;
background-image: url(img/ss.jpg);
background-repeat: no-repeat;
background-size:100% 1320px;
padding:0px;
height:1320px;
margin:20px 2px 0px 0px;
background-color:#348636;
border-radius:15px;
}
#sl{
background-color:#ddd;
overflow:auto;
margin-top:10px;
border-radius:5px;
width:70%;
}
#box-search{
background-color:#b8a8a8;
overflow:auto;
margin-top:10px;
border-radius:5px;
width:50%;
height:150px;
}
th{
border:1px solid #000;
background:linear-gradient(rgba(179, 70, 70,0.60),#fff);
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
#id{
color:#8e81e5;
}
#name{
color:#12ea0e;
}
#level{
color:#eab321;
}
#set{
color:#d98fc5;
}
#class{
color:#e27870;
}
#spe{
color:#0e9d95;
}
#am{
color:#bdb2b2;
}
tr{
border: solid 1px #c9c9c9;
height:60px;
}
table{
border-collapse:collapse;
width:97%;
background-color:#fff;
font-size:20px;
font-weight:bold;
margin-right:14px;
border-radius:15px;
}
table tr:nth-child(2n + 1) {
background-color: rgba(144, 144, 144, 0.35);
}
#y2{
display:inline-block;
background-color:#128409;
border-radius:15px 0px 0px 15px;
padding:2px;
height:25px;
margin-bottom:-10px;
border:1px solid #8eee87;
font-weight: bold;
font-family: 'Rokkitt', serif;
}
#y2:hover{
background-color:#f5f574;
border:1px solid #a8ac41;
color:#9d0a0a;
}
#y3{
display:inline-block;
background-color:#4a9e4a;
width:955px;
margin-right:3px;
border-radius:10px;
padding:2px;
border-radius:15px 0px 0px 15px;
}
</style>
  </head>
  <body>
  <div id="header"><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img"/></div><hr>
   <div id="y3"><div id="y2">&nbsp;&nbsp;&nbsp;نتيجة البحث طالب&nbsp;&nbsp;</div>
 &nbsp;|<a href="res.php?y=<?php echo $z;?>&x=<?php echo $x;?>"><div id="y2">&nbsp;&nbsp;رجوع  &nbsp;&nbsp;</div></a> &nbsp;|<div id="y2">&nbsp;<?php include "time2.php"; ?>&nbsp;</div></div>
  <div id="post">
<?php
include"cont.php";
  $id=intval($_GET['id']);
  $sql = "SELECT * FROM  students WHERE Std_id='$id'";
$result= $connect-> query($sql);
  echo"<table>";
$rows = $result->fetch_assoc();
$x= $rows["Std_specialty"];
  $class=$rows["Std_class"];
  $set=$rows["Std_set"];
    $day=date("Y-m-d");
  $sql5= mysqli_query($connect,"SELECT  SUM(Time_test)as Time_test FROM `".$db_name."`. `tests` where  class='$class' and Tes_DATE <= '$day' and Specialty='$x'");
   $result5=mysqli_fetch_array($sql5);
 $time=$result5['Time_test'];
  $sql4=mysqli_query($connect,"SELECT SUM(Std_deg) as Std_deg  from `degree` where `class`='$class' and `Std_set`='$set'");
 $result4=mysqli_fetch_array($sql4);
 $tk2=$result4['Std_deg'];
  $mo=round($tk2/$time,2);
if($x=="CS"){
  $x="علوم حاسوب";
}else{
  $x="تقنية معلومات";
}
$y= $rows["Std_status"];
if($y==1){
  $y="ليس لديه ملحق";
}else{
  $y="لديه ملحق";
}
echo'<tr><td colspan="2"><center><b>معلومات عن الطالب </b></center></td></tr><tr><th id="name">اسم الطالب</th><td id="name">'.$rows["Std_name"].'</td></tr>
<tr><th id="set">رقم الجلوس</th><td id="set">'.$rows["Std_set"].'</td></tr><tr><th id="level">المستوي</th><td id="level">'.
$rows["Std_level"].'</td></tr>
<tr><th id="spe">التخصص</th><td id="spe">'.$x.'</td></tr>
<tr><th id="class">الفصل الدراسي</th><td id="class">'.$rows["Std_class"].'</td></tr>
<tr><th id="id">حالة الطالب</th><td id="id">'.$y.'</td></tr>
<tr><td colspan="2"><center><b>معلومات اخري</b></center></td></tr><tr><th id="am">معدل اخر فصل دراسي</th><td id="am">';
  if($mo >= 1){
    echo $mo ;
  }else{
    echo "<b>---</b>";
  }
echo '</td></tr>';
echo"</table>";
}
?>
    </div>
</body>
  </html>