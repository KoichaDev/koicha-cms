<?php include_once "includes/config.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo SITENAME; ?> | <?php echo DESCRIPTION; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/util.css">
	
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
<?php 

	if(isset($_POST['submit'])) {
		$username = $_POST['username'];
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

            header("Location: admin/index.php");
        } else {
            header("Location: index.php");
        }
	}

	
?>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form action="" method="POST" class="login100-form validate-form flex-sb flex-w" >
					<span class="login100-form-title p-b-32">
					</span>
					<span class="txt1 p-b-11">
						Username
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate = "Username is required">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100"></span>
					</div>
					
					<span class="txt1 p-b-11">
						Password
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate = "Password is required">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="password" >
						<span class="focus-input100"></span>
					</div>
					
					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<input type="submit" name="submit" class="login100-form-btn" value="Login">
					</div>

				</form>
			</div>
		</div>
	</div>
	

	


</body>
</html>