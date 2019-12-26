<?php 
    define("HOST", 'localhost');
    define("USERNAME", "root");
    define("PASSWORD", '');
    define("DB_NAME", 'koicha');

    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

    if(!$connection) {
        die('Something went wrong: ' . mysqli_error());
    } 
    mysqli_set_charset($connection, 'utf8');

    function closeDB($dbConnection) {
        mysqli_close($dbConnection);
    }
?>