<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_header.php'; ?>

    <!-- fetch the search results from the database -->

    <?php

    $search = $_GET['search'];

    $sql = "ALTER table `threads` add FULLTEXT(`thread_title`,`thread_desc`);";  // query which will enable fetching threads match with search keyword

    $result = mysqli_query($conn,$sql);

    $sql = "SELECT * from `threads` where match(`thread_title`,`thread_desc`) against ('".$search."')"; // will fetch only those threads that contains the matched search keyword

    $result = mysqli_query($conn,$sql);

    $num = mysqli_num_rows($result);


    ?>




    <div class="container my-3 border border-light" style="background-color : rgb(240, 245, 242);">

        <h1 class="py-3"> Search results for "<?php echo$_GET['search'];?>"</h1>

        <div class="d-flex my-3  border-bottom border-light flex-wrap">

            <!-- Display search results fetched from threads table  -->

            <?php 
            
                    if($num>=1)
                    {

                            while($row = mysqli_fetch_assoc($result))
                            {
                                $thread_title = $row['thread_title'];
                                $thread_desc = $row['thread_desc'];
                                $thread_id = $row['thread_id'];
                                
                                echo'<div class="flex-grow-1 ms-3">

                                        <h5 class="my-0 mt-1"><a href="thread.php?thread_id='.$thread_id.'" class="text-black text-decoration-none">'.$thread_title.'</a></h5>

                                        <p class="mt-1"><a href="thread.php?thread_id='.$thread_id.'" class="text-black text-decoration-none">'.$thread_desc.'</a></p>
    
                                    </div>
                                    
                                    <div class="flex-grow-1 ms-3 text-end fst-italic text-secondary">
                                        <p style="font-size:13px;">Wed 19th Jul,2023 12:14 PM</p>
                                    </div>  ';
                            }

                            echo'</div>';
                            
                    }
                    else
                    {
                        echo'

                    <div class="container mt-1">
                        
                        <p class="display-4 text-secondary">No Results found!!!</p> 
                        <p class="text-secondary">Suggestions:</p>
                        <ul style="margin-left:1.3em;margin-bottom:2em">
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li><li>Try more general keywords.</li>
                            <li>Try fewer keywords.</li>
                        </ul>
                    
                    </div> 
                   
                        ';
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




















</body>

</html>