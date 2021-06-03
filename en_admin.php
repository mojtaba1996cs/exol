<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>دخول المسؤول</title>
    <link rel="shortcut icon" href="img/rr3.jpg" id="img">
<link href="style.css" rel="stylesheet" type="text/css">
  <script src="gg.js"></script>
</head>
<body dir="rtl">
<div id="header"><a href="index.php" id='img'><img src="img/rr3.jpg" width="185" height="185" alt="جامعة دنقلا" id="img" /></a>
</div><hr>
<?php
  include "time.php";
  ?>
<div id="qaab22">
<div class="qaab2">
<div name="ff" id="admin_form7">
 <center> <table  class="admin_table">
 <center>  <h1 id="h_en_ad">حدد المستوي الوظيفي الخاص بك  </h1></center>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> <button id="submit_en_ad" onclick="sweetAlert()">العميد</button></td></tr>
   <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td> <input type="button" name="col2" id="submit_en_ad" value="المسجل" onclick="plus2()"></td></tr>
   <tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr><tr><td></td></tr>
  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="button" name="col3" id="submit_en_ad" value="استاذ" onclick="plus3()"></td></tr>
    </table>
  </center>
    </div>
      <script>
  function sweetAlert(){
   swal("الرجاء كتابة اسم المستخدم وكلمة المرور للدخول ",{
     icon:"info",
     buttons: false,
   });
    if (timer=3000){
      window.location.href="admin.php";
                  }
  }
  function plus2(){
  swal("الرجاء كتابة اسم المستخدم وكلمة المرور للدخول ",{
     icon:"info",
     buttons: false,
      timer: 4000,
   });window.location.href="admin2.php";
    }

   function plus3(){
  swal("الرجاء كتابة اسم المستخدم وكلمة المرور للدخول ",{
     icon:"info",
     buttons: false,
      timer: 4000,
   });window.location.href="admin3.php";
    }
</script>
    </div>
    </div>
  <div class="clearfix"></div>
<footer class="footer-copyright1_en_ad">
<center> جميع الحقوق محفوظة لدي كلية علوم الحاسوب والتنمية البشرية جامعة دنقلا 2019-2020 &copy; </center>
    </footer>
  </body>
  </html>