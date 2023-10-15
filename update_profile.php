<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['update_profile'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `user_form` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn, md5($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn, md5($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn, md5($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `user_form` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_size = $_FILES['update_image']['size'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
      if($update_image_size > 2000000){
         $message[] = 'image is too large';
      }else{
         $image_update_query = mysqli_query($conn, "UPDATE `user_form` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
         $message[] = 'image updated succssfully!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>
   <link rel="icon" href="images/logo st marys.png" type="image">


   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<nav>
    <ul class="menu">
        <li class="logo"><a href="#">
            <a href="home.php"><img src="images/logo st marys.png" alt=""></a>
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
<div class="update-profile">

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
      <div class="flex">
         <div class="inputBox">
            <span>username :</span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box">
            <span>your email :</span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password :</span>
            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
            <span>new password :</span>
            <input type="password" name="new_pass" placeholder="enter new password" class="box">
            <span>confirm password :</span>
            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
         </div>
      </div>
      <input type="submit" value="update profile" name="update_profile" class="btn">
      <a href="home.php" class="delete-btn">go back</a>
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