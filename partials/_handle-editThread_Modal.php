<?php
//
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   // For inserting edited thread post into the Database

   require '_dbconnect.php';

  $thread_id = $_POST['editThread_id'];
  $thread_title = mysqli_real_escape_string($conn,$_POST['editThread_title']);
  $thread_desc = mysqli_real_escape_string($conn,$_POST['editThread_desc']);
  $thread_source = $_POST['thread_source'];

  $sql = "UPDATE `threads` set `thread_title`='$thread_title' , `thread_desc` = '$thread_desc' , `thread_edited_status` = 1 where `thread_id`= $thread_id ;";

  $result = mysqli_query($conn,$sql);

  if(!$result)
  {
    echo"Error : " . mysqli_error($conn);
    exit;
  }
  
  session_start();
  $_SESSION['editThreadSuccess'] = true;
  header("location:".$thread_source);

}


?>