<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    
   require '_dbconnect.php';

   $thread_id = $_POST['deleteThread_id'];


   // Fetch the cat_id beacause after deleting this thread we have to go to threadlist page where the cat_id must be there in the top address bar!!!

  $sql = "SELECT `thread_cat_id` from `threads` where `thread_id` = $thread_id";

  $result = mysqli_query($conn,$sql);

  if(!$result)
  {
    echo"Error : " . mysqli_error($conn);
  }

  $row = mysqli_fetch_assoc($result);

  $thread_cat_id = $row['thread_cat_id'];


 
 // Delete the thread post from the DB

 $sql = "DELETE from `threads` where `thread_id` = $thread_id";
 
 $result = mysqli_query($conn,$sql);

 if(!$result)
 {
    echo "Error : " . mysqli_error($conn);
    exit;
 }



 // Delete the comments associated with this thread

 $sql = "DELETE from `comments` where `thread_id` = $thread_id ";

 $result = mysqli_query($conn,$sql);

 if(!$result)
 {
    echo"Error : " . $mysqli_error($conn);
 }


 // Go back to threadlist page

 session_start();
 $_SESSION['deleteThreadSuccess'] = true;
 header("location:/Online_forum/threadlist.php?catid=".$thread_cat_id);


}
























?>