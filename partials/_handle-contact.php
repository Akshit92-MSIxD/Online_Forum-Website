 
<?php

 if($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    require '_dbconnect.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];


    $insert = "INSERT into `contacts`(`name`,`email`,`phone`,`subject`,`timestamp`) values('$name','$email','$phone','$subject',current_timestamp()) ;";

    $result = mysqli_query($conn,$insert);

    if($result)
    {
        header("location: /online_forum/contact.php?contactSuccess=true");
    }



 }





?>