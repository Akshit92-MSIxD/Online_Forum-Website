<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
     
  <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_header.php'; ?>

    <div class="container border border-secondary my-4 p-5"  style="background-color : rgb(240, 245, 242);">

    <h1 class="my-4 text-center" >Contact Me</h1>

   <form action="partials/_handle-contact.php" method = "post">

  <div class="form-group my-4">
    <label for="name" style="margin-bottom : 5px;">Name: </label><br>
    <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Enter your name" required>
  </div>

  <div class="form-group my-4">
    <label for="email" style="margin-bottom : 5px;"> Email: </label>
    <input type="email" class="form-control" id="email"  name="email" aria-describedby="emailHelp" placeholder="Enter your email">
  </div>

  <div class="form-group my-4">
    <label for="phone" style="margin-bottom : 5px;"> Phone Number:</label>
    <input type="tel" class="form-control" id="phone"  name="phone" aria-describedby="emailHelp" placeholder="Enter your phone number">
  </div>

  <div class="form-group my-4">
    <label for="subject" style="margin-bottom : 5px;">Subject:</label>
    <textarea class="form-control" id="subject" name="subject" rows="3" placeholder="Write your message"></textarea>
  </div>

  <button type="submit" class="btn btn-success">Send</button>

  <?php

if(isset($_GET['contactSuccess']) && $_GET['contactSuccess'])
  echo '
        <div class="alert alert-success" role="alert" >
         <strong>Success!!!</strong> Your details have been submitted successfully. Wait for the reply!!!
      </div>';
  ?>

</form>

</div> 
    
    <?php require 'partials/_footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <script>
    
    setTimeout(()=>{  $(".alert").alert('close');} , 4000);

   </script>
   
  </body>
</html>