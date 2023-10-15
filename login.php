<?php
include 'config.php';
session_start();

if (isset($_POST['submit'])) {
   $hallticket = mysqli_real_escape_string($conn, $_POST['hallticket']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE hallticket = '$hallticket' AND password = '$pass'") or die('query failed');

   if (mysqli_num_rows($select) > 0) {
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location: home.php');
   } else {
      $message[] = 'Incorrect hallticket or password!';
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>
   <link rel="icon" href="images/logo st marys.png" type="image">


   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<nav>
    <ul class="menu">
        <li class="logo"><a href="#">
        <a href="index.php"><img src="images/logo st marys.png" alt=""></a>
            <h1>St.Mary's Engineering College</h1></a></li>
        <li class="item"><a href="#home1">Home</a></li>
        <li class="item"><a href="#about">About</a></li>
        <li class="item"><a href="#placements">Placements</a></li>
        <li class="item"><a href="#facilities">Facilities</a></li>
        <li class="item"><a href="#courses">Course</a></li>
        <li class="item"><a href="#footer">Contact</a></li>
          </li>
       
    </ul>
</nav>
<div class="form-container">

   <form action="" method="post" enctype="multipart/form-data">
      <h3>login now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="hallticket" name="hallticket" placeholder="enter hallticket" class="box" required>
      <input type="password" name="password" placeholder="enter password" class="box" required>
      <input type="submit" name="submit" value="login now" class="btn">
      <p>don't have an account? <a href="register.php">regiser now</a></p>
   </form>

</div>
<!-- footer -->

<div class="footer" id="footer">
      <div class="footer-row">
        <img src="images/logo.png">
        <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
          <div id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
              var setting = {"query":"St. Mary's Engineering College EEE Block, Deshmuki Village, Deshmukhi, Hyderabad, Telangana 501512, India","width":287,"height":274,"satellite":false,"zoom":15,"placeId":"ChIJ__8vTUcLyzsRCbN2j2klmj4","cid":"0x3e9a25698f76b309","coords":[17.3311368,78.7257884],"lang":"en","queryString":"St. Mary's Engineering College EEE Block, Deshmuki Village, Deshmukhi, Hyderabad, Telangana 501512, India","centerCoord":[17.3311368,78.7257884],"id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"1007893"};
              var d = document;
              var s = d.createElement('script');
              s.src = 'https://1map.com/js/script-for-user.js?embed_id=1007893';
              s.async = true;
              s.onload = function (e) {
                window.OneMap.initMap(setting)
              };
              var to = d.getElementsByTagName('script')[0];
              to.parentNode.insertBefore(s, to);
            })();</script><a href="https://1map.com/map-embed">1 Map</a></div>

        <div class="footer-col">          
          <h4>Info</h4>
          <ul class="links">
            <li><a href="#about-us">About Us</a></li>
            <li><a href="#affiliations">Affiliations</a></li>
            <li><a href="#home">Founder's Desk</a></li>
            <li><a href="#alumni">Alumni</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#courses">Courses</a></li>
          </ul>
          </div>
        <div class="footer-col">
          <h4>Courses</h4>
          <ul class="links">
            <li><a href="#btech-cse">B.Tech CSE</a></li>
                <li><a href="#btech-aiml">B.Tech AIML</a></li>
                <li><a href="#btech-data-science">B.Tech Data Science</a></li>
                <li><a href="#bpharmacy">B.Pharmacy</a></li>
                <li><a href="#diploma-cse">Diploma CSE</a></li>
                <li><a href="#diploma-es">Diploma ES</a></li>
                <li><a href="#Cyber Security">Cyber Security</a></li>

          </ul>
        </div>
        <div class="footer-col">
          <h4>Facilities</h4>
          <ul class="links">
            <li><a href="#bank-details">Bank Details</a></li>
            <li><a href="#smart-classrooms">Smart Classrooms</a></li>
            <li><a href="#placements">Placements</a></li>
            <li><a href="#student-activities">Student Activities</a></li>
            <li><a href="#downloads">Downloads</a></li>
          </ul>
        </div>  
        <div class="contact">
          Email:
                    <a href="https://mail.google.com/mail/u/0/#inbox?compose=DmwnWsTKzQmVTHpKXSVjxwkDQDzKCMTZqTknVBPLSRfvBMLwTfKWKgBtSRbvBGnJWpJLJJbBzpqV" target="_blank">enquiry@stmarysgroup.com.</a>
                    <p> Phone: +91 90104 55590 / 91 / 92 / 93 / 94 / 95</p>
                    For Admissions: 91548 44272
          <div class="icons">
           <a href="https://www.instagram.com/smgoi.in/" target="_blank"><i class="fa-brands fa-facebook-f" ></i></a>
           <a href="https://www.instagram.com/smgoi.in/" target="_blank"><i class="fa-brands fa-twitter"></i></a>
           <a href="https://www.instagram.com/smgoi.in/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
          </div>
        </div>
      </div>
      <p class="copyirght">@2021 - St. Mary's Engineering College, Hyderabad. All rights reserved. Web Design by St. Mary's Student Nikki

</div>


</body>
</html>