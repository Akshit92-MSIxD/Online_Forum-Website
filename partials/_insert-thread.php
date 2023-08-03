<?php 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $add_title = mysqli_real_escape_string($conn,$_POST["title"]);
    $add_desc = mysqli_real_escape_string($conn,$_POST["desc"]);
    $thread_creator = $_SESSION['loggedin_email'];
    date_default_timezone_set('Asia/Kolkata'); 
    $thread_post_time = date("D jS M,Y h:i A");
    
    $add_thread_cat_id = $catid; // In threadlist.php we have fetched $catid =  $_GET["catid"] || $_POST["catid"] 

    $sql = "INSERT into `threads`(`thread_title`,`thread_desc`,`thread_cat_id`,`thread_creator`,`timestamp`) values('$add_title','$add_desc','$add_thread_cat_id','$thread_creator','$thread_post_time');";

    $result = mysqli_query($conn,$sql);

    if($result)
    {
        echo '
        <div class="alert alert-success" role="alert" >
         <strong>Success!!!</strong> Your thread is now added successfully!!!
      </div>';
    }
}

?>