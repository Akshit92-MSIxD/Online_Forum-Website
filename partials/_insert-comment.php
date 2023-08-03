<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $comment = mysqli_real_escape_string($conn,$_POST["ccontent"]);
    $comment = str_replace("<" , "&lt;" , $comment); // to prevent from XSS attack(inserting <script>...</script>)
    $comment = str_replace(">" , "&gt;" , $comment);
    date_default_timezone_set('Asia/Kolkata'); 
    $comment_post_time = date("D jS M,Y h:i A");

    $comment_creator = $_SESSION['loggedin_email'];

    $sql = "INSERT into `comments`(`comment_content`,`thread_id`,`comment_creator`,`timestamp`) values('$comment','$thread_id','$comment_creator',' $comment_post_time');";

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        echo '
        <div class="alert alert-success" role="alert" >
         <strong>Success!!!</strong> Your comment is now added successfully!!!
      </div>';
    }
}

?>