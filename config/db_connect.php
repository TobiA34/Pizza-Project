<?php
$conn = mysqli_connect('localhost', 'test1', 'pokemoN12', 'tobi_pizza');

if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
?>