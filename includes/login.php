<?php 
    include_once "./config.php";

    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        //$user_email = $_REQUEST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if(!$result) {
            die('QUERY Failed!' . mysqli_error($connection));
        } 
        
        while($row = mysqli_fetch_assoc($result)) {
            $db_id = $row['user_id'];
            $db_username = $row['username'];
            $db_password = $row['user_password'];
            $db_firstname = $row['user_firstname'];
            $db_lastname = $row['user_lastname'];
            $db_role = $row['user_role'];
        }   
        
        if(password_verify($password, $db_password)) {
            session_start(); // Telling the server to prepare the session for us
            // We want to access the 'username' from the database and match client session we did on the query
            // $db_username;
            $_SESSION['username'] = $db_username;
            $_SESSION['firstname'] = $db_firstname;
            $_SESSION['lastname'] = $db_lastname;
            $_SESSION['user_role'] = $db_role;

            header("Location: ./../../admin/index.php");
        } else {
            header("Location: ../index.php");
        }
    }
?>