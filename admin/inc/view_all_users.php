<table class="table table-bordered table-hover" style="text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date Created</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // Finds all the categories query
            $query = "SELECT * FROM users";
            $userResult = mysqli_query($connection, $query);    
            while($row = mysqli_fetch_assoc($userResult)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_img = $row['user_img'];
                $user_role = $row['user_role'];
                $user_date_created = $row['user_date_created'];
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$username</td>";
                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";      
                echo "<td>$user_role</td>";
                echo "<td>$user_date_created</td>";
                ?>                
                <?php
                echo "<td><a href='users.php?source=view_all_users&change_to_admin={$user_id}'>Admin</a></td>";
                echo "<td><a href='users.php?source=view_all_users&change_to_sub={$user_id}'>Subscriber</a></td>";
                echo "<td><a href='users.php?source=edit_user&p_id={$user_id}'>Edit</a></td>";
                echo "<td><a href='users.php?source=view_all_users&delete={$user_id}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<?php 
    // Query to unapprove
    if(isset($_GET['change_to_admin'])) {
        // Query to delete

        $user_admin = $_GET['change_to_admin'];
        $query = "UPDATE users SET user_role = 'admin' WHERE user_id = ? ";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $user_admin);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED ' . mysqli_error($connection));
        }

        // Will refresh the posts.php when delete right away
        header("Location: users.php?");
    }

    // Query to unapprove
    if(isset($_GET['change_to_sub'])) {
        // Query to delete

        $user_subscribe = $_GET['change_to_sub'];
        $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = ? ";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $user_subscribe);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED ' . mysqli_error($connection));
        }

        // Will refresh the posts.php when delete right away
        header("Location: users.php?");
    }

    if(isset($_GET['delete'])) {
        // Query to delete
        $user_id = $_GET['delete'];
        $query = "DELETE FROM users WHERE user_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED ' . mysqli_error($connection));
        }
        // Will refresh the posts.php when delete right away
        header("Location: users.php?");
    }
?>
