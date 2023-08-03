<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Threadlist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    
</head>

<body>

    <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_header.php'; ?>
    


    <!-- Fetch the particular category info from DB based on topic selected -->
    <?php 
    
     $catid = NULL;

      if(isset($_GET['catid']))
      {
      $catid = $_GET['catid'];
      }  

    $sql = "SELECT * from `category` where `category_id` = $catid ";

    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_assoc($result);
    $catname = $row['category_name'];
    $catdesc = $row['category_description'];

    ?>


    <!-- Category Jumbotron container -->

    <div class="container my-3 p-4 border border-secondary" style="background-color : rgb(224, 232, 223);">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to <?php echo $catname; ?> forums</h1>
            <p class="lead"> <?php echo $catdesc; ?></p>
            <hr class="my-4">
            <p>This is peer to peer forums for sharing knowledge with each other</p>
            <p class="lead">
                <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
            </p>
        </div>
    </div>



     <!-- Show info based on login status -->

    <?php

     if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])
     {
      
     echo' 
    <!-- Form for asking the question -->

    <div class="container my-5 border border-light p-4" style="background-color : rgb(240, 245, 242);">

       <h2 class="py-2 my-3">Write your Problem : </h2>

        <form action="threadlist.php?catid='.$catid.'" method="post" class="my-2">
            <div class="form-group">
                <label for="title">Problem Title</label>
                <input type="text" class="form-control" id="title" aria-describedby="titleHelp" name="title" required>
                <small id="titleHelp" class="form-text text-muted">keep your title as crisp and short as
                    possible.</small>
            </div>
            <div class="form-group my-4">
                <label for="desc">Elaborate your problem</label>
                <textarea class="form-control" id="desc" rows="3" name="desc" required></textarea>
            </div>

            <button type="submit" class="btn btn-success ml-2">Submit</button>
        </form>';

        require "partials/_insert-thread.php";

     echo'</div>';

     }

     else{
               
                echo'
                <div class="container border border-light my-4" style="background-color : rgb(240, 245, 242);">
                <h2 class="py-2 my-4">Write your Problem : </h2>
                <p class="lead">You are not loggedin!!! Please login to be able to write your problem.</p>
             </div>';
     }

     ?>

   


    <!-- Media object for asking questions and display user profile icon!!! -->

    <div class="container my-3 border border-light"  style="background-color : rgb(240, 245, 242);">
        <h2 class="py-3 px-2 mt-3 mb-4">Browse Questions : </h2>


        <!-- Fetch particular thread/question from threads table based on particular category info -->

        <?php
      
       $sql = "SELECT * from `threads` where `thread_cat_id`= $catid ";

       $result = mysqli_query($conn,$sql);

       $num = mysqli_num_rows($result);

       if($num>0)
       {
         
                while($row = mysqli_fetch_assoc($result))
                {
                    $thread_id = $row['thread_id'];
                    $thread_title = $row['thread_title'];
                    $thread_creator = $row['thread_creator'];
                    $thread_time = $row['timestamp'];
                    $thread_edited_status = $row['thread_edited_status'];

                    // fetching thread creator user_name from its gmail id
                        $sql = "SELECT `user_name` from `users` where `email` = '$thread_creator'";
                        $res = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($res);
                        $user_name = $r['user_name'];

                    echo'<div class="d-flex my-3  border-bottom border-light flex-wrap">
                        <div class="flex-shrink-0">
                            <img src="images/profile_img.png" alt="..." width = "50">
                        </div>

                        <div class="flex-grow-1 ms-3">';

                    if($thread_edited_status == 1)
                    {
                        if( isset($_SESSION['loggedin_email']) && $thread_creator == $_SESSION['loggedin_email'])
                        {                                                                                                                                                    
                        
                           echo'<p class="fw-bold my-0"><a href="thread.php?thread_id=' . $thread_id .'" class="text-black text-decoration-none">' . $user_name .'</a> <span class="fw-lighter text-secondary"> &#8226; You  <i>(edited)</i></span> </p>' ;
                        }
                        else{
                            
                            echo' <p class="fw-bold my-0"><a href="thread.php?thread_id=' . $thread_id .'" class="text-black text-decoration-none">' . $user_name .'</a> <span class=" fst-italic fw-lighter text-secondary">(edited)</span></p>';
                        } 
                    }
                    else
                    {
                        if( isset($_SESSION['loggedin_email']) && $thread_creator == $_SESSION['loggedin_email'])
                        {
                        
                           echo'<p class="fw-bold my-0"><a href="thread.php?thread_id=' . $thread_id .'" class="text-black text-decoration-none">' . $user_name .'</a> <span class="fw-lighter text-secondary"> &#8226; You </span> </p>' ;
                        }
                        else{
                            
                            echo' <p class="fw-bold my-0"><a href="thread.php?thread_id=' . $thread_id .'" class="text-black text-decoration-none">' . $user_name .'</a></p>';
                        } 
                    }

                        echo' <p class="mt-1"><a href="thread.php?thread_id=' . $thread_id .'" class="text-black text-decoration-none">' . $thread_title .'</a></p>';
            
                      echo'  </div> 
                      <div class="flex-grow-1 ms-3 text-end fst-italic text-secondary"><p style="font-size:13px;">'.$thread_time.'</p></div>
                      </div>';

                }

       }

       else{
             echo'<div class="container">
               <p class="display-6 text-secondary">No questions found!!!</p> 
               <p  class="text-secondary">Be the first person to ask a question.</p> 
           </div>';
       }
        
       ?>

    </div>





    <?php require 'partials/_footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js"
        integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

<script>
    
    setTimeout(()=>{  $(".alert").alert('close');} , 3000);

</script>

</body>

</html>