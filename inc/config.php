<?php 
    include "./../admin/inc/settings_function.php";

    ob_start();

    define("HOST", 'localhost');
    define("USERNAME", "root");
    define("PASSWORD", '');
    define("DB_NAME", 'koicha');

    $connection = mysqli_connect(HOST, USERNAME, PASSWORD, DB_NAME);

    if(!$connection) {
        die('Something went wrong: ' . mysqli_error());
    } 
    mysqli_set_charset($connection, 'utf8');

    
    // Site name
    define("SITENAME", config_value('config_id', 1));

    // Description of your site
    define("DESCRIPTION", config_value('config_id', 2));

    function config_value($column, $id) {
        global $connection;
        $query = "SELECT * FROM settings WHERE $column = $id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['config_value'];
    }
    
    function closeDB($dbConnection) {
        mysqli_close($dbConnection);
    }
?>