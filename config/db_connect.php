<?php

//Add database details here
$conn = mysqli_connect('', '', '', '');

 
if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
?>