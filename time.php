<html>
<head>
  <style>

  </style>
  <link href="style.css" rel="stylesheet" type="text/css">
  </head>
  <body>
<b> <a href="#">
<div id="clock" class="auto-style3">
<span dir="rtl">Loading...</span></div>

<script type="text/javascript">
 function refrClock()  {
  var d=new Date();
   var s=d.getSeconds();
    var m=d.getMinutes();
     var h=d.getHours();
      var day=d.getDay();
      var date=d.getDate();
       var month=d.getMonth();
        var year=d.getFullYear();
          var days=new Array("الاحد","الاثنين","الثلاثاء","الاربعاء","الخميس","الجمعة","السبت");
var months=new Array("يناير","فبراير","مارس","ابريل","مايو",
"يونيو","يوليو","اغسطس","سبتمبر","اكتوبر","نوفمبر","ديسمبر");

 var am_pm;  if (s<10) {s="0" + s}  if (m<10) {m="0" + m}  if (h>12) {h-=12;am_pm = "PM"}  else {am_pm="AM"}  if (h<10) {h="0" + h}  document.getElementById("clock").innerHTML=days[day] + " " + date + " من " + months[month] + " " + year + "   ||  الساعة الان " + h + ":" + m + ":" + s + " /" + am_pm;  setTimeout("refrClock()",1000);  }  refrClock();</script>
   </a></b></body></html>