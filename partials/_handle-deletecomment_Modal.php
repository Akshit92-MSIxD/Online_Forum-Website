<?php
//
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   // For deleting comment from the Database

   require '_dbconnect.php';

  $comment_id = $_POST['deletecomment_id'];
  $comment_source = $_POST['comment_source'];

  $sql = " DELETE from `comments` where `comment_id` = $comment_id;";

  $result = mysqli_query($conn,$sql);

  if(!$result)
  {
    echo"Error : " . mysqli_error($conn);
    exit;
  }
  
  session_start();
  $_SESSION['deleteCommentSuccess'] = true;
  header("location:".$comment_source);

}







?>