 <?php

    session_start();

    if (isset($_POST['logout'])) {
        session_destroy();
        header('location: login.php');
    }


    ?>



 <head>
     <title>Document</title>
     <!-- Latest compiled and minified CSS -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <!-- Bootstrap CSS -->
     <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
     <link rel="stylesheet" href="index.css">

 </head>

 <body>

     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <a class="navbar-brand" href="#">Tobi Pizza</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
                 <?php if (!isset($_SESSION['user_id'])) :  ?>

                     <ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="register.php">Register</a>
                         </li>

                     </ul>

                     <ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="login.php">Login</a>
                         </li>

                     </ul>
                 <?php else :  ?>
                     <ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="pizza.php">Create Pizza <span class="sr-only"></span></a>
                         </li>
                     </ul>

                     <ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="pizza_list.php">View Pizzas <span class="sr-only"></span></a>
                         </li>
                     </ul>

                     <ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="menu.php">Menu <span class="sr-only"></span></a>
                         </li>
                     </ul>


                     <ul class="navbar-nav">
                         <li class="nav-item active">
                             <a class="nav-link" href="account.php">Account </a>
                         </li>
                     </ul>


                     <ul class="navbar-nav">
                         <form action="" method="post">
                             <li><input type="submit" name="logout" value="logout" class="btn btn-outline-secondary   " href=""></li>
                         </form>
                     </ul>

                 <?php endif; ?>
             </ul>

         </div>
     </nav>