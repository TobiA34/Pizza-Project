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

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="./index.css">
      
 </head>

 <body>

     <nav class="navbar navbar-expand-lg navbar-light bg-light ">
         <div class="container-fluid">
             <a class="navbar-brand" href="#">Tobi Pizzeria</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse " id="navbarSupportedContent">
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


                    <div>
                        
                    </div>
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


                     <ul class="navbar-nav mx-auto">
                         <form action="" method="post">
                             <li><input type="submit" name="logout" value="logout" class="btn btn-outline-secondary   " href=""></li>
                         </form>
                     </ul>

                 <?php endif; ?>
             </div>
         </div>
     </nav>

    