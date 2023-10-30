<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <title>Pizza</title>
</head>

<body>
    <?php include('templates/header.php'); ?>

    <H1 class="text-center mt-5 mb-5">Account</H1>

    <div class="row">
        <div class="col-sm-6 mx-auto">
            <div class="card m-5 text-center rounded w-80 ">
                <div class="card-body">

                 <?php 
                    echo "
                       User_id: {$_SESSION['user_id']} <br>
                       Username: {$_SESSION['username']} <br>
                       First name:   {$_SESSION['firstName']}  <br>
                       Last name:   {$_SESSION['lastName']}  <br>
                       Email: {$_SESSION['email']} <br>
                       Telephone: {$_SESSION['telephone']}";
                 ?>
                             
                     </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('templates/footer.php'); ?>


</body>

</html>