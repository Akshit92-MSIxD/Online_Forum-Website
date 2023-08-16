<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_header.php'; ?>
      

    <!-- Fetch the particular thread/question and display it in jumbotron -->

    <?php
    
      $thread_id = null;
     
      if(isset($_GET['thread_id']))
      {
        $thread_id = $_GET['thread_id'];
      }

        $sql = " SELECT * from `threads` where `thread_id` = $thread_id";

        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($result);

        $thread_title = $row['thread_title'];
        $thread_desc = $row['thread_desc'];
        $thread_creator = $row['thread_creator'];
        $thread_time = $row['timestamp'];
        $thread_edited_status = $row['thread_edited_status'];

        // fetching thread creator user_name from its gmail id
        $sql = "SELECT `user_name` from `users` where `email` = '$thread_creator'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $user_name = $row['user_name'];

    ?>


    <!-- Particular thread/Question Jumbotron container -->

    <div class="container my-3 p-4 border border-secondary" style="background-color : rgb(224, 232, 223);">
        <div class="jumbotron">
            <h1 class="display-6"><?php echo $thread_title; ?></h1>
            <p class="lead"> <?php echo $thread_desc; ?></p>
            <hr class="my-4">
            <p class="lead fst-italic fw-normal text-secondary mb-0" style="font-size:15px;">
                 posted by : <?php 
                 if($thread_edited_status == 1)
                 {
                    if( isset($_SESSION['loggedin_email']) && $thread_creator == $_SESSION['loggedin_email'])
                    {
                        echo $user_name . '  &#8226;  <span class="fw-lighter">You <i>(edited)</i></span>';  
                    }
                    else{
                        echo $user_name . '<span class="fw-lighter"> <i> (edited)</i></span>';
                    }
                }
                else
                {
                    if( isset($_SESSION['loggedin_email']) && $thread_creator == $_SESSION['loggedin_email'])
                    {
                        echo $user_name . '  &#8226;  <span class="fw-lighter">You </span>';  
                    }
                    else{
                        echo $user_name;
                    }
                }
                 ?> 
            </p>
            <p style="font-size:13px;"  class="text-end fst-italic text-secondary"><?php echo $thread_time; ?></p>


            <!--  Showing Edit and Delete button if this thread is of loggedin user!!! -->
            <?php
            if( isset($_SESSION['loggedin_email']) && $thread_creator == $_SESSION['loggedin_email'])
            {
                echo '<button class="btn btn-secondary ml-0 mr-2 mb-2 btn-sm" data-bs-toggle="modal" id="editThread_btn" name="editThread_btn" data-bs-target="#editThread_Modal">Edit</button>';
                echo '<button class="btn btn-secondary btn-sm mx-2 mb-2 "  id="deleteThread_btn"  name="deleteThread_btn"  data-bs-toggle="modal"  data-bs-target="#deleteThread_Modal">Delete</button>';
            }

            ?>
            
        </div>
    </div>



      <!-- Show post comment info based on login status -->

    <?php

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"])
    {

    echo' 

    <!-- Form for writing the comment -->

    <div class="container my-5 border border-light p-4" style="background-color : rgb(240, 245, 242);">

       <h2 class="py2 my-3">Post a Comment : </h2>

        <form action="'.$_SERVER['REQUEST_URI'].'" method="post" class="my-2">
    
            <div class="form-group my-4">
                <label for="ccontent">Type your comment : </label>
                <textarea class="form-control" id="ccontent" rows="3" name="ccontent" required></textarea>
            </div>

            <button type="submit" class="btn btn-success ml-2">Post</button>
        </form>';

        require "partials/_insert-comment.php";

    echo'</div>';
    }

    else
    {
        echo'
        <div class="container border border-light my-4" style="background-color : rgb(240, 245, 242);">
        <h2 class="py-2 my-4">Post a Comment : </h2>
        <p class="lead">You are not loggedin!!! Please login to be able to post a comment.</p>
       </div>';
    }

    ?>



    <!-- Answers/Solutions/Comments posted by community -->
 
   <div class="container my-3 border border-light" style="background-color : rgb(240, 245, 242);">
        <h2 class="py-3 px-2 mb-4">Discussions :  </h2>


        <!-- Fetch particular comment from commnents table based on thread id -->

        <?php
      
       $sql = "SELECT * from `comments` where `thread_id`= $thread_id ";

       $result = mysqli_query($conn,$sql);

       $num = mysqli_num_rows($result);

       if($num>0)
       {
         
                while($row = mysqli_fetch_assoc($result))
                {
                    $comment_id = $row['comment_id'];
                    $comment = $row['comment_content'];
                    $comment_creator = $row['comment_creator'];
                    $comment_time = $row['timestamp'];
                    $comment_edited_status = $row['comment_edited_status'];

                    // fetching comment creator user_name from its gmail id
                        $sql = "SELECT `user_name` from `users` where `email` = '$comment_creator'";
                        $res = mysqli_query($conn,$sql);
                        $r = mysqli_fetch_assoc($res);
                        $user_name = $r['user_name'];

                    echo'<div class="d-flex pl-3 mb-3 border-bottom border-light">
                        <div class="flex-shrink-0">
                            <img src="images/profile_img.png" alt="..." width = "50">
                        </div>';

                        if($comment_edited_status == 1)
                        {

                            if( isset($_SESSION['loggedin_email']) && $comment_creator == $_SESSION['loggedin_email'])
                            {
                                echo' <div class="flex-grow-1 ms-3" style="width : 60%">
                                <p class="fw-bold my-0">'.$user_name.' <span class="fw-lighter text-secondary"> &#8226; You <i>(edited)</i></span></p>' ;
                                
                            }
                            else{
                                echo' <div class="flex-grow-1 ms-3" style="width : 60%">
                                <p class="fw-bold my-0">'.$user_name.' <i class=" fw-lighter text-secondary">(edited)</i></p>' ;
                            }
                        }
                        else
                        {
                            if( isset($_SESSION['loggedin_email']) && $comment_creator == $_SESSION['loggedin_email'])
                            {
                                echo' <div class="flex-grow-1 ms-3" style="width : 60%">
                                <p class="fw-bold my-0">'.$user_name.' <span class="fw-lighter text-secondary"> &#8226; You </span></p>' ;
                                
                            }
                            else{
                                echo' <div class="flex-grow-1 ms-3" style="width : 60%">
                                <p class="fw-bold my-0">'.$user_name.'</p>' ;
                            }

                        }

                          echo' <pre class="mt-1 mb-2 text-dark" style="white-space: pre-wrap;font-family : system-ui; font-size : 16px;">' . $comment . '</pre>';
 
                           // Showing Edit and Delete button if this comment is of loggedin user!!!
                          if( isset($_SESSION['loggedin_email']) && $comment_creator == $_SESSION['loggedin_email'])
                          {
                              echo '<button class="btn btn-secondary ml-0 mr-2 mb-2 btn-sm editComment_btn" data-bs-toggle="modal" id="'.$comment_id.'"data-bs-target="#editcomment_Modal">Edit</button>';
                              echo '<button class="btn btn-secondary btn-sm mx-2 mb-2 deleteComment_btn" data-bs-toggle="modal"  data-bs-target="#deletecomment_Modal">Delete</button>';
                          }

                        echo '</div>
                    <div class="flex-grow-1 ms-3"><p style="font-size:11px;" class="text-end fst-italic text-secondary">'.$comment_time.'</p></div>

                        </div>';

                }

       }

       else{
             echo'<div class="container mt-3">
             <div class="mt-4 p-5 bg-light rounded">
               <h4>No Comments found!!!</h4> 
               <p>Be the first person to write a comment.</p> 
             </div>
           </div> ';
       }
        
       ?>

    </div>

    <?php require 'partials/_editThread_Modal.php'; ?>
    <?php require 'partials/_deleteThread_Modal.php'; ?>
    <?php require 'partials/_editcomment_Modal.php'; ?>
    <?php require 'partials/_deletecomment_Modal.php'; ?>
 




   


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


   
<!-- Edit Thread button functionality  -->

    <script>
        
var editThread_btn = document.querySelector("#editThread_btn"); // only one editThread_button in a page (will be shown if loggedin user has write it!!!)

var non_edited_thread_title;  // we are storing  this to implement disable or enable functionality on update thread button
var non_edited_thread_desc;   // we are storing  this to implement disable or enable functionality on update thread button
var is_edited_title = null;   // ............................
var is_edited_desc = null;    // .............................

      if(editThread_btn != null)
      {
       
       editThread_btn.addEventListener('click' , (e)=>{   // e indicates the event occured at a particular target(element)!!!
        
       update_thread_btn.disabled = true;
       is_edited_title = false; 
       is_edited_desc = false;

       let div = editThread_btn.parentNode;

       let thread_title = div.querySelector("h1").innerText // In jumbotron  thread title is inside <h1>...</h1>

       non_edited_thread_title = thread_title;

       let thread_desc = div.querySelector(".lead").innerText //  In jumbotron  thread title is inside <p class="lead">...</p>

        non_edited_thread_desc = thread_desc;
       
       editThread_title.value = thread_title;

       editThread_desc.value = thread_desc;

       editThread_id.value =  <?php echo $thread_id;?> ;  // we have already fetch thread above :)



       });

       // target the editThread_Title and editThread_desc field of modal and apply oninput event on both fields
 

       let editThread_title_field = document.querySelector("#editThread_title");
       let editThread_desc_field = document.querySelector("#editThread_desc");

     

       editThread_title_field.addEventListener('input',()=>{

         if(is_edited_desc == true) // if editThread_desc field is edited then we dont care if title field is edited or not ==> update thread button must be enabled
         {
         return;
         }

        var current_thread_title_content = editThread_title.value;

        if(current_thread_title_content != non_edited_thread_title)
        {
          update_thread_btn.disabled = false;
          is_edited_title = true;
        }
        else
        {
         update_thread_btn.disabled = true;
         is_edited_title = false;
        }


       });


       editThread_desc_field.addEventListener('input',()=>{

         if(is_edited_title == true) // if editThread_title field is edited then we dont care if desc field is edited or not ==> update thread button must be enabled
         {
             return;
         }

        var current_thread_desc_content = editThread_desc.value;

        if(current_thread_desc_content != non_edited_thread_desc)
        {
          update_thread_btn.disabled = false;
          is_edited_desc = true;
        }
        else
        {
         update_thread_btn.disabled = true;
         is_edited_desc = false;
        }


       });
       
           
     }
    </script>
 



   <!-- Delete Thread button functionality -->

    <script>

        var deleteThread_btn = document.getElementById('deleteThread_btn');
        
        if(deleteThread_btn != null)
        {
            deleteThread_btn.addEventListener('click',()=>{
                deleteThread_id.value = <?php echo $thread_id ?>;
            })
          ;
        }

       
        
        
   </script>


     <!-- Edit Comment button functionality -->

     <script>
       
         var editComment_btns = document.getElementsByClassName("editComment_btn"); // Html collection edit btns
         var non_edited_comment; // we are storing  this to implement disable or enable functionality on update comment button

         if(editComment_btns != null)
         {

         var editComment_btn_arr = Array.from(editComment_btns); // Array of edit btns


          editComment_btn_arr.forEach((editComment_btn)=>{

                editComment_btn.addEventListener('click' , (e)=>{   // e indicates the event occured at a particular target(element)!!!

                update_comment_btn.disabled = true;  // every time the editComment-Modal is showed up update_comment_btn must be showm as disabled!!! It will only be shown as enabled if we change the comment content in the modal and that changed comment content must not be same as non edited comment content!!!

                let target_editComment_btn = e.target; // use of e is not necessary here we can use editComment_btn also in place of e.target

                let div = target_editComment_btn.parentNode;

                let target_comment = div.querySelector("pre").innerText;

                non_edited_comment = target_comment;
                
                editcomment.value = target_comment;

                editcomment_id.value = target_editComment_btn.id;

                });

          });

          // target the editcomment field of modal and apply oninput event on it 

          var editcomment_field = document.querySelector('#editcomment');

          editcomment_field.addEventListener('input',()=>{   // 'onput' event will be called the moment comment-content in editcomment field changes

                 var current_comment_content = editcomment_field.value;

                 if(current_comment_content!=non_edited_comment)
                 {
                        update_comment_btn.disabled = false;
                 }
                 else
                 {
                    update_comment_btn.disabled = true;
                 }
               

          });
        }
          
     </script>

   

      <!-- Delete Commment button functionality -->

      <script>
       
     var deleteComment_btns = document.getElementsByClassName("deleteComment_btn");

     if(deleteComment_btns != null)
     {

     let  deleteComment_btn_arr = Array.from(deleteComment_btns);

     deleteComment_btn_arr.forEach((deleteComment_btn)=>{

             deleteComment_btn.addEventListener('click',(e)=>{

              let target_delete_btn = e.target;

              let div = target_delete_btn.parentNode;

              deletecomment_id.value  = div.querySelector(".editComment_btn").id;  

              console.log("Hiiiii");

             });
     });
    }



      </script>


</body>

</html>