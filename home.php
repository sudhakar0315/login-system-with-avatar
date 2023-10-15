<?php
include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
   header('location: login.php');
}

// Fetch all user details from the database.
$select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
if (mysqli_num_rows($select) > 0) {
   $userDetails = mysqli_fetch_assoc($select);
} else {
   // Handle the case where user details are not found.
}
if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="icon" href="images/logo st marys.png" type="image">


    <!-- custom css file link  -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/style.css">


      <link rel="stylesheet" href="navbar.css">
    <script>
   
    $(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
        } else {
            $(".item").addClass("active");
        }
    });
});
    </script>
</head>
<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">
                <img src="images/logo st marys.png" alt="">
                <h1>St.Mary's Engineering College</h1></a></li>
                
            <li class="item"><a href="index.php">Home</a></li>
            <li class="item"><a href="index.php">About</a></li>
            <li class="item"><a href="index.php">Facilities</a></li>
            <li class="item"><a href="index.php">Placements</a></li>
            <li class="item"><a href="#">Course</a></li>
            <li class="item"><a href="#">Contact</a></li>

            </li>
            
            <li class="toggle"><span class="bars"></span></li>
        </ul>
    </nav>
   
<div class="container">

   <div class="profile">
   
   <h3>User Profile</h3>
<?php
if (isset($userDetails)) {
   echo '<div class="profile-details">';
   echo '<img src="uploaded_img/' . $userDetails['image'] . '" alt="User Profile Image">';
   echo '<div class="profile-detail">';
   echo '<p>Name: ' . $userDetails['name'] . '</p>';
   echo '<p>Email: ' . $userDetails['email'] . '</p>';
   echo '<p>Hallticket: ' . $userDetails['hallticket'] . '</p>';
   echo '<p>Course: ' . $userDetails['course'] . '</p>';
   echo '<p>Section: ' . $userDetails['section'] . '</p>';
   // Add more details as needed.
   echo '</div>';
} else {
   echo '<p>User details not found.</p>';
}
?>
      <a href="update_profile.php" class="btn">update profile</a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class="delete-btn">logout</a>
      <p>new <a href="login.php">login</a> or <a href="register.php">register</a></p>
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