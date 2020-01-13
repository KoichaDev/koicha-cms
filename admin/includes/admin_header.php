<?php
    // This will output the buffering. We need to use it for redirecting users, or pieces of coding or application
    // This function is buffering our request in the headers of the script, so when we are done with the script. 
    // It will send everything at the same time
    ob_start(); 
    session_start();

    // Checking if the person who logs in is a admin or a subscriber
    // IF the user is not admin, then it will be forced to redirect to the homepage site only
    if(!isset($_SESSION['user_role'])) {
        header("Location: ../index.php");
    } else {
        if($_SESSION['user_role'] !== 'admin') { 
            header("Location: ../index.php");
        }
    }
?> 
 
<?php 
    include_once "./../includes/config.php";
    include_once "./includes/category_functions.php"; 
    include "./includes/settings_function.php";
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo SITENAME; ?> | <?php echo DESCRIPTION; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Font Awesome Bootstrap CDN-->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <!-- Main Quill library -->
    <script src="//cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <!-- Theme included stylesheets -->
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link href="//cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

    <!-- Google's Material column charts API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <!-- Custom JavaScript Files -->
    <script src="./js/posts.js" defer></script>
    <script src="./js/users.js" defer></script>
    <script src="./js/modal.js" defer></script>
    <script src="js/quill.js" defer></script>

</head>