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
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="index.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
     <script src="script.js"></script>

 </head>

 <body>
     <nav class="navbar navbar-expand-lg navbar-light ">
         <a class="navbar-brand" href="index.php">Tobi Pizzeria</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>

         <div class="collapse navbar-collapse">

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
                         <a class="flex-sm-fill text-sm-center nav-link active" href="pizza_list.php">Your Pizza Order <span class="sr-only">(current)</span></a>
                     </li>
                 </ul>

                 <ul class="navbar-nav">
                     <li class="nav-item active">
                         <a class="nav-link" href="pizza.php">Create Pizza <span class="sr-only">(current)</span></a>
                     </li>
                 </ul>

                 <ul class="navbar-nav">
                     <li class="nav-item active">
                         <a class="nav-link" href="menu.php">menu <span class="sr-only">(current)</span></a>
                     </li>
                 </ul>


                 <ul class="navbar-nav">
                     <li class="nav-item active">
                         <a class="nav-link" href="account.php">account <span class="sr-only">(current)</span></a>
                     </li>
                 </ul>


                 <ul class="navbar-nav">
                     <form action="" method="post">
                         <li><input type="submit" name="logout" value="logout" class="btn btn-outline-secondary d-lg-inline-block mb-3 mb-md-0 ml-5" href=""></li>
                     </form>
                 </ul>

             <?php endif; ?>

         </div>
     </nav>