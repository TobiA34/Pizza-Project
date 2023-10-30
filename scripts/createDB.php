<?php

//Add database name
$dbname = '';

// Creating a connection
//Add username, password
$conn = mysqli_connect('localhost', '', '');

if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}
// Creating a database named newDB
$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully with the name newDB";
} else {
    echo "Error creating database: " . $conn->error;
}

//--------------------------------------------------------------------


// connect to our database:
mysqli_select_db($conn, $dbname);

/////////////////////////////////////////
////////////// USERS TABLE //////////////
/////////////////////////////////////////

// if there's an old version of our table, then drop it:

// Username, password and database name
$conn = new mysqli('localhost', 'test1', 'pokemoN12', $dbname);

$sql = "DROP TABLE IF EXISTS users";

// no data returned, we just test for true(success)/false(failure):
if (mysqli_query($conn, $sql)) {
    echo "Dropped existing table: users<br>";
} else {
    die("Error checking for existing table: " . mysqli_error($conn));
}

// checking connection
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql code to create table
$sql = "CREATE TABLE users(
        id INT(8)  PRIMARY KEY AUTO_INCREMENT NOT NULL, 
        firstname VARCHAR(30) NOT NULL,
        username VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        `password` VARCHAR(255),
         telephone VARCHAR(50),
         `image` VARCHAR(100)
        )";

if ($conn->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


/////////////////////////////////////////
////////////// Pizzas TABLE //////////////
/////////////////////////////////////////
$sql = "DROP TABLE IF EXISTS pizzas";

 if (mysqli_query($conn, $sql)) {
    echo "Dropped existing table: users<br>";
} else {
    die("Error checking for existing table: " . mysqli_error($conn));
}

 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 $sql = "CREATE TABLE pizzas(
        id INT(8)  PRIMARY KEY AUTO_INCREMENT NOT NULL, 
        title VARCHAR(30) NOT NULL,
        toppings VARCHAR(30) NOT NULL,
        imgFile VARCHAR(30),
        user_fk INT(8) NOT NULL )";

        if ($conn->query($sql) === TRUE) {
            echo "Table pizzas created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }

// we're finished, close the connection:
mysqli_close($conn);
?>
