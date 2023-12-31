<?php

include('config/db_connect.php');
// write to get all pizza 
$sql = 'SELECT * FROM pizzas';

//make query & get result
$result = mysqli_query($conn, $sql);


// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

if (isset($_POST['upload'])) {

    $image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];
    $pizza_id = $_POST['pizzaID'];


    if ($image != '') {

        $update_filename = $_FILES['image']['name'];

        $allowed_extension = array('png', 'jpg', 'jpeg', 'gif');
        $file_extension = pathinfo($update_filename, PATHINFO_EXTENSION);
        $filename = time() . '.' . $file_extension;
        if (!in_array($file_extension, $allowed_extension)) {
            echo "you are allowed extension only with png, jpg, jpeg, gif";
        }
        $update_filename = $filename;
    } else {
        $update_filename = $old_image;
    }

    $sql = "UPDATE pizzas SET imgFile = '$filename' WHERE id = '$pizza_id'";

    $query_run = mysqli_query($conn, $sql);

    if ($query_run) {
        if ($image != '') {
            move_uploaded_file($_FILES['image']['tmp_name'], 'image/' . $filename);
            if (file_exists('image/' . $old_image)) {
                unlink('image/' . $old_image);
            }
        }
        echo "Image uploaded successfully";
        header('Location: pizza_list.php?id=' . $pizza_id);
    } else {
        echo "Image not uploaded successfully";
        header('Location: pizza_list.php?id=' . $pizza_id);
    }
}


?>


<!DOCTYPE html>
<html>
<?php include('templates/header.php') ?>
<div class="container container-fluid mt-5">
    <h1 class="text-center">Orders</h1>
    <div class="row m-2">
        <?php foreach ($pizzas as $pizza) : ?>
            <div class=" col-6 col-sm-4  mx-auto m-4" style="width:100%;">
                <div class="card text-center rounded  mx-auto" style="width:100%;">
                    <div class="card-body w-100  rounded" id="pizza-order-card">
                        <p>
                        <ul class="list-unstyled">
                            <img class="img-fluid rounded rounded-9 " src="image/<?php echo $pizza['imgFile'] ?>" style="height:300px; width:300px;">
                            <p class="mt-3 mb-3"><?php echo htmlspecialchars($pizza['title']) ?></p>
                            <p class="mt-4"> This pizza was made with <?php echo "This pizza was mad with {$pizza['toppings']} ." ?>
                            </p>

                        </ul>
                        </p>
                    </div>

                    <div class="container mt-3 mb-3">

                        <button type="button" class="btn button1" data-toggle="modal" data-target="#moreInfo<?php echo $pizza['id']; ?>">More info</button>
                    </div>

                    <form action="pizza_list.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="image" class="form-control w-100 mx-auto l-3 pr-3">
                        <input type="hidden" name="old_image" value="<?php echo $pizza['imgFile'] ?>">
                        <input type="hidden" name="pizzaID" value="<?php echo $pizza['id'] ?>" />
                        <input type="submit" name="upload" value="upload">
                    </form>
                    <br>
                    <br>

                    <!-- The Modal -->
                    <div id="moreInfo<?php echo $pizza['id']; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="card-body mx-auto text-center ">
                                    <h4><?php echo htmlspecialchars($pizza['title']) ?></h4>
                                    <p>Created by <?php echo htmlspecialchars($_SESSION['firstName']) ?></p>
                                    <p>Date:<?php echo date($pizza['created_At']) ?></p>
                                    <p>Toppings:<?php echo htmlspecialchars($pizza['toppings']) ?></p>

                                    <!-- Delete Form -->
                                    <form action="details.php" method="post">
                                        <input type="hidden" name="id_to_delete" value="<?php echo $_SESSION['pizza_id'] = $pizza['id'] ?>">
                                        <input type="submit" name="delete" value="Delete" class="btn btn-danger w-75 mx-auto mt-2 mb-2">
                                    </form>
                                    <!-- Update Form -->
                                    <a type="submit" name="more-info" href="update_pizza.php?id=<?php echo $pizza['id'] ?>" value="more info" class="btn btn-primary w-75 mx-auto mt-2 mb-2">Update</a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<br>
<br>
<br>
</div>
<?php include('templates/footer.php') ?>

</html>