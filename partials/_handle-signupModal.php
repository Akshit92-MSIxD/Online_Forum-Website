<?php

  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signupEmail']) )
  {

   require '_dbconnect.php';
    
    $name = $_POST['name'];
    $email = $_POST['signupEmail'];
    $signupPassword = $_POST['signupPassword'];
    $cpassword = $_POST['cpassword'];

    // Check if email already exits in users table or not
   
     $exists = false;

     $existQuery = "SELECT * from `users` where `email` = '$email' ";

     $result = mysqli_query($conn,$existQuery);

     $num = mysqli_num_rows($result);

     if($num==1)
     {
        $exists = true;
     }

     if(($signupPassword == $cpassword) && !$exists)
     {
          $hash = password_hash($signupPassword,PASSWORD_DEFAULT);

          $insert_query = "INSERT into `users`(`user_name`,`email`,`password`,`timestamp`) values('$name','$email','$hash',current_timestamp());";

          $result = mysqli_query($conn,$insert_query);

         //   header("location: /online_forum/index.php?signupSuccess=true");
         session_start();
         $_SESSION['signupSuccess'] = true;
     }
     else if($exists)
     {
      // header("location: /online_forum/index.php?signupEmailExistsError=true");
      session_start();
      $_SESSION['signupEmailExistsError'] = true;
     }
     else{
      // header("location: /online_forum/index.php?signupPasswordError=true");
      session_start();
      $_SESSION['signupPasswordError'] = true;
     }

 
     $destination = $_POST['source'];
     header("location:".$destination);


  }

?>