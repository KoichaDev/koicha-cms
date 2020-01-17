<?php 
    if(isset($_POST['create_user'])) {
        $user_firstname = $_POST['first_name'];
        $user_lastname = $_POST['last_name'];
        $username = $_POST['username'];
        $user_password = $_POST['user_password'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];

        $hash_created = password_hash($user_password, PASSWORD_BCRYPT);
        
        
        // PHP In built function. We have to use temporarily post image to display on the web what file it is
        // $post_image will upload to the final destination
        move_uploaded_file($user_image_temp, "../img/$user_image"); 
        // now() is a function for SQL to get the current date time today
        $query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_img, user_role, user_date_created) 
                  VALUES(?, ?, ?, ?, ?, ?, ?, now())";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "sssssss", $username, $hash_created, $user_firstname, $user_lastname, $user_email, $user_image, $user_role);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED .' . mysqli_error($connection));
        }

        echo "User created: " . " " . "<a href='users.php'>View Users</a>";
    }

?>

<!-- enctype is to sending different form data, because of multipart/form-data -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" name="first_name" id="first-name" class="form-control">
    </div>
    <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" name="last_name" id="last-name" class="form-control">
    </div>
    <div class="form-group">
        <label for="user-role">Select Role</label>
        <select name="user_role" class="form-control form-control-lg" id="user-role">
            <option value="subscriber">Select Options</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Profile Image</label>
        <input type="file" name="image" id="post_image">
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control">
    </div>
    <div class="form-group">
        <label for="user-email">Email</label>
        <input type="text" name="user_email" id="user-email" class="form-control">
    </div>
    <div class="form-group">
        <label for="user-password">Password</label>
        <input type="password" name="user_password" id="user-password" class="form-control">
    </div>
    <input type="submit" name="create_user" class="btn btn-primary" value="Add User">
    <input type="reset" class="btn btn-danger">
</form>