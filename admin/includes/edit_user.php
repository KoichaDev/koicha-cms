<?php 
    if(isset($_GET['p_id'])) {
        $user_id = $_GET['p_id'];
    }

    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)) {
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_role = $row['user_role'];
        $user_password = $row['user_password'];
    }

    // Checking if there is no image, then make sure it WILL display the image!
    if(empty($post_image)) {
        $query = "SELECT * FROM users WHERE user_id = ? ";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        $get_image = mysqli_stmt_get_result($stmt);
        while($row = mysqli_fetch_assoc($get_image)) {
            $profile_image = $row['user_img'];
        }
    }

    

    if(isset($_POST['update_user'])) {
        
        $user_firstname = $_POST['first_name'];
        $user_lastname = $_POST['last_name'];
        $username = $_POST['username'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];
        $user_password = $_POST['user_password'];
        
        $user_image = $_FILES['image']['name'];
        $user_image_temp = $_FILES['image']['tmp_name'];

        $hash_created = password_hash($user_password, PASSWORD_ARGON2ID);

        // Checking if there is no image, then make sure it WILL display the image!
        if(empty($post_image)) {
            $query = "SELECT * FROM users WHERE user_id = ? ";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            $get_image = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($get_image)) {
                $profile_image = $row['user_img'];
            }
        }
        

        // now() is a function for SQL to get the current date time today
        $query = "UPDATE users SET 
                user_id = ?, 
                username = ?, 
                user_password = ?, 
                user_firstname = ?, 
                user_lastname = ?, 
                user_email = ?, 
                user_img = ?, 
                user_role = ?, 
                user_date_created = now()
                WHERE user_id = ?"; 
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "isssssssi", $user_id, $username, $hash_created, $user_firstname, $user_lastname, $user_email, $user_image, $user_role, $user_id);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED .' . mysqli_error($connection));
        }
    }
        
?>

<!-- enctype is to sending different form data, because of multipart/form-data -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" name="first_name" id="first-name" class="form-control" value="<?php echo $user_firstname; ?>">
    </div>
    <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" name="last_name" id="last-name" class="form-control" value="<?php echo $user_lastname; ?>">
    </div>
    <div class="form-group">
        <label for="user-role">Select Role</label>
        <select name="user_role" class="form-control form-control-lg" id="user-role">">
            <?php 
                if($user_role == "subscriber") {?>
                    <option value="<?php echo $user_role; ?>"><?php echo ucfirst($user_role); ?></option>
                    <option value="admin">Admin</option>
                <?php
                } else {
                    ?>
                    <option value="<?php echo $user_role; ?>"><?php echo ucfirst($user_role); ?></option>
                    <option value="subscriber">subscriber</option>
                    <?php
                }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="profile-image">Current Profile Image</label>
        <br>
        <img width='50' src="../img/<?php echo $profile_image; ?>" alt ="profile image">
        <input type="file" name="image" id="profile-image">
    </div> 
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?php echo $username; ?>">
    </div>
    <div class="form-group">
        <label for="user-email">Email</label>
        <input type="text" name="user_email" id="user-email" class="form-control" value="<?php echo $user_email; ?>">
    </div>
    <div class="form-group">
        <label for="user-password">Password</label>
        <input type="password" name="user_password" id="user-password" class="form-control" placeholder="Change password here">
    </div>
    <input type="submit" name="update_user" class="btn btn-primary" value="Update User">
</form>