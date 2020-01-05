<?php 
    // Importing the library to use the pusher
    require 'vendor/autoload.php';

    // Importing the environment file
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

    // Files included
    include "./includes/header.php";
    include "./includes/navbar.php"; 



    $options = array(
        'cluster' => 'eu',
        'useTLS' => true
    );

    /**
     * Parameter of the Pusher credentials of the instance
     * 1. Key
     * 2. secret
     * 3, app-key
     * 4. option (cluster)
     */
    $pusher = new Pusher\Pusher(
    getenv('APP_KEY'),
    getenv('APP_SECRET'),
    getenv('APP_ID'),
    $options
  );
    
    if(isset($_POST['submit'])) {
        // Trim will strip out anything with whitespace
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        if(empty($username) || empty($email)) {
            echo "The field can't be empty!";
        } else {

        $hash_created = password_hash($password, PASSWORD_ARGON2ID);
       
        $query = "INSERT INTO users(username, user_password, user_email, user_role, user_date_created) 
                  VALUES(?, ? ,?, 'subscriber', now());";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "sss", $username, $hash_created, $email);
        if(!mysqli_stmt_execute($stmt)) {
            // Checking if the username exist first
            if(mysqli_error($connection)) {
                die('This username already exist!');
            } else { // If the username doesn't exist, then it will check the email
                die('This email already exist!');
            }
        }
        // notification is the channel
        $pusher -> trigger('notifications', 'new_user', $username);
        header("Location: index.php");
        }
    }

?>  

    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group password-msg">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Passwords must be at least 8 characters long">                           
                        </div>
                        <label for="strength-bar">Password Strength</label>
                        <div class="form-group">
                            <label class="progress-bar" for="strength-bar">asd</label>
                             <div class="progress">
                                <div class="progress-bar bg-warning" id="strength-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <input type="submit" name="submit" id="register" class="btn btn-success btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include_once './includes/footer.php'; ?>