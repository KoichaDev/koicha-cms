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
    include_once "./includes/function.php"; 
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

    <!-- Toaster CSS  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha256-ENFZrbVzylNbgnXx0n3I1g//2WeO47XxoPe0vkp3NC8=" crossorigin="anonymous" />


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Tiny WYWSIWYG -->
    <script src="https://cdn.tiny.cloud/1/n0g8jh52vlyzv163ahyutpg7xeafbvkoc63ceoqt59c8m7de/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'textarea'});</script>
    <script src="./js/tiny.js" defer></script>

    <!-- Pusher  -->
    <script src="https://js.pusher.com/5.0/pusher.min.js" defer></script>

    <!-- Toaster -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous" defer></script>

   
    <!-- Google's Material column charts API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <!-- Custom JavaScript Files -->
    <script src="./js/posts.js" defer></script>
    <script src="./js/users.js" defer></script>
    <script src="./js/modal.js" defer></script>
    <script src="./../js/pusher.js" defer></script>

</head>