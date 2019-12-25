<?php 
    define("HOST", 'localhost');
    define("USERNAME", "root");
    define("PASSWORD", '');
    define("DB_NAME", 'koicha');

    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

    if($connection) {
        echo 'Database connected!';
    } else {
        echo 'Something went wrong: ' . mysqli_error();
    }
?>