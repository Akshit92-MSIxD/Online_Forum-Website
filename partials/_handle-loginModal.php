<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
     require '_dbconnect.php';

     $email = $_POST['loginEmail']; 
     $password = $_POST['loginPassword'];


     // Check whether this account exits in the users table or not

     $check_query = "SELECT * from `users` where `email` = '$email';";

     $result = mysqli_query($conn,$check_query);

    $num = mysqli_num_rows($result);



    if($num==1)
    {

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password']))
        {
            session_start();
                                                      
            $_SESSION['loggedin'] = true;
            $_SESSION['loggedin_email'] = $email;
            // header("location: /online_forum/index.php?loginSuccess=true");
            $_SESSION['loginSuccess'] = true;       // Better alternative because the page keeps on showing alerts on every refresh!!!

        }
        else{
            // header("location: /online_forum/index.php?loginPasswordError=true");
            session_start();
            $_SESSION['loginPasswordError'] = true;
        }

    }
    else
    {
        // header("location: /online_forum/index.php?loginEmailError=true");
        session_start();
        $_SESSION['loginEmailError'] = true;
    }


     $destination = $_POST['source'];
    header("location:".$destination);
 

}

?>