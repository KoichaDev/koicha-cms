<?php 

    if($_SERVER['REQUEST_URI'] == '/koicha-cms/index.php') {
        include_once "includes/config.php"; 
        include_once "help_functions.php";
    } else {
        include_once "../../../includes/config.php"; 
        include_once "help_functions.php";
    }

    // This will output the buffering. We need to use it for redirecting users, or pieces of coding or application
    // This function is buffering our request in the headers of the script, so when we are done with the script. 
    // It will send everything at the same time
    ob_start(); 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?php echo SITENAME; ?> | <?php echo DESCRIPTION; ?></title>

        <!-- Customized CSS -->
        <link rel="stylesheet" href="/admin/themes/koicha/css/style.css">
     
        <!-- SideBar CSS  -->        
        <link rel="stylesheet" href="/admin/themes/koicha/css/sidebar.css">

        <!-- Media Query CSS -->
        <link rel="stylesheet" href="/admin/themes/koicha/css/media.css">
        
        <!-- Animation CSS -->
        <link rel="stylesheet" href="/admin/themes/koicha/css/animation.css">

        <!-- Google Fonts API -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
        
        <!-- Font Awesome API -->
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        <!-- Bootstrap CSS version 4.4.1 -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
       
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

        <!-- App JavaScript -->
        <script src="/admin/themes/koicha/js/app.js" defer></script>
        
        <!-- darkmode.js -->
        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.4/lib/darkmode-js.min.js"></script>
</head>
