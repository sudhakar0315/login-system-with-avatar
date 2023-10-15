<?php

include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $hallticket = mysqli_real_escape_string($conn, $_POST['hallticket']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/' . $image;
    $course = mysqli_real_escape_string($conn, $_POST['course']); // Added course field
    $section = mysqli_real_escape_string($conn, $_POST['section']); // Added section field

    $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE hallticket = '$hallticket' AND password = '$pass'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'User already exists';
    } else {
        if ($pass != $cpass) {
            $message[] = 'Confirm password not matched!';
        } elseif ($image_size > 2000000) {
            $message[] = 'Image size is too large!';
        } else {
            $insert = mysqli_query($conn, "INSERT INTO `user_form` (name, email, hallticket, course, section, password, image) VALUES ('$name', '$email', '$hallticket', '$course', '$section', '$pass', '$image')") or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Registered successfully!';
                header('location:login.php');
            } else {
                $message[] = 'Registration failed!';
            }
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
   <title>register</title>
   <link rel="icon" href="images/logo st marys.png" type="image">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<nav>
    <ul class="menu">
        <li class="logo"><a href="#">
            <img src="images/logo st marys.png" alt="">
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
      <h3>Register Now</h3>
      <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
      <input type="text" name="name" placeholder="Enter username" class="box" required>
      <input type="email" name="email" placeholder="Enter email" class="box" required>
      <input type="text" name="hallticket" placeholder="Enter hallticket" class="box" required>
      
      <!-- Select element for "course" with predefined options -->
<select name="course" class="box" required>
   <option value="">--COURSE--</option>
   <option value="AIML">AIML</option>
   <option value="CSE">CSE</option>
   <option value="DS">DS</option>
   <option value="CYBER SECURITY">CYBER SECURITY</option>
   <option value="DEPLOMA">DEPLOMA</option>
</select>

<!-- Select element for "section" with predefined options -->
<select name="section" class="box" required>
   <option value="">--SECTION--</option>
   <option value="A">A</option>
   <option value="B">B</option>
   <option value="C">C</option>
</select>

      
      <input type="password" name="password" placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
      <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
      <input type="submit" name="submit" value="Register Now" class="btn">
      <p>Already have an account? <a href="login.php">Login Now</a></p>
   </form>
</div>


</body>
</html>