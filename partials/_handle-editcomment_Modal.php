
<?php
//
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
   // For inserting edited comment into the Database

   require '_dbconnect.php';

  $comment_id = $_POST['editcomment_id'];
  $comment = mysqli_real_escape_string($conn,$_POST['editcomment']);
  $comment_source = $_POST['comment_source'];


  $sql = "UPDATE `comments` set `comment_content`='$comment' , `comment_edited_status`= 1 where `comment_id`= $comment_id ;";

  $result = mysqli_query($conn,$sql);

  if(!$result)
  {
    echo"Error : " . mysqli_error($conn);
    exit;
  }
  
  session_start();
  $_SESSION['editCommentSuccess'] = true;
  header("location:".$comment_source);

}


?>