<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link href="css/about.css" rel="stylesheet" type="text/css">

</head>

<body>
  
    <?php require 'partials/_dbconnect.php'; ?>
    <?php require 'partials/_header.php'; ?>
 
    
    <div class="wrapper">
        <div class="testimonial">
            <article>
                <h1>About me</h1>
                <img src="./images/MyProfile.jpg" >

                <blockquote>
                  -- iDiscuss is a online forum website where you can post your queries , answer other persons questions , search for related queries based on different categories listed in this project  :&#41
                     
               </blockquote>
              
                <blockquote>
                 -- My name is Akshit Rawat and I am a final year student at Graphic Era Hill University,Dehradun.As far as my skillsets are concerned I have a good understanding of HTML,CSS,Javascript,PHP,Bootstrap and MYSQL.
                </blockquote>
                
                <h5>Akshit Rawat</h5>

                <a href="https://www.linkedin.com/in/akshit-rawat-175141159/" class="bi bi-linkedin" style="font-size:48px;color:dodgerblue;"></a>
                <a href="https://github.com/Akshit92-MSIxD" class="bi bi-github mx-2" style="font-size:48px;color:white;"></a>
                <a href="mailto:akshitrawat.amank@gmail.com" class="bi bi-google" style="font-size:48px;color:red;"></a>
            
        

            </article>
        </div>
    </div>
     



    <?php require 'partials/_footer.php'; ?>

    
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