<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
  
    <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_header.php'; ?>
    <!-- Slider starts here -->

    <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators " >
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner ">
    <div class="carousel-item active">
      <img src="images/slider-1.jpg" class="d-block img-fluid" style="width : 100vw;height : 55vh" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/slider-2.jpg" class="d-block img-fluid" style="width : 100vw;height : 55vh" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/slider-3.jpg" class="d-block img-fluid" style="width : 100vw;height : 55vh" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>



    
    <!-- Show Categories -->

    <div class="container my-4">
        <h2 class="text-center my-4">iDiscuss - Browse Categories : </h2>

        <div class="row"> 

          <?php
        

           $sql = " SELECT * from `category`";

           $result = mysqli_query($conn,$sql);

           $num = mysqli_num_rows($result);

           if($num>0)
           {
             // Fetch all the categories using loop and display in form of cards 

            while($row = mysqli_fetch_assoc($result))
            {
              $catname = $row['category_name'];
              $id = $row['category_id'];
              $desc = substr($row['category_description'],0,90);

            echo'<div class="col-md-4 my-2">

                <div class="card" style="width: 18rem;">
                    <img src="images/card-'.$id.'.jpg" class="card-img-top" style="height: 10rem;"  alt="...">
                    <div class="card-body">
                        <h5 class="card-title"> <a class="text-dark" href="threadlist.php?catid=' . $id . '">' . $catname . '</a> </h5>
                        <p class="card-text"> ' .  $desc . '...</p>
                        <a  class="btn btn-success" href="threadlist.php?catid=' . $id .'">View Thread</a>
                    </div>
                </div>

            </div>';
            }
           }

            ?>

        </div>

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
    
        setTimeout(()=>{  $(".alert").alert('close');} , 4000);
    
    </script>

</body>

</html>