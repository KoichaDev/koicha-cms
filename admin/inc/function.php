<?php 

    function findAllCatgories() {
        global $connection;
         // Finds all the categories query
        $query = "SELECT * FROM categories";
        $catResult = mysqli_query($connection, $query);    
        while($row = mysqli_fetch_assoc($catResult)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
            echo "<tr>";
            echo "<td>$cat_id</td>";
            echo "<td>$cat_title</td>";
            echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
            echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        }
        echo "</tr>";
    }

    function insertCategories() {
        global $connection;
        if(isset($_POST['submit'])) {
            $cat_title = $_POST['cat_title'];
            if($cat_title == "" || empty($cat_title)) {
                echo "<p>This field should not be empty!</p>";
            } else {
                $query = "INSERT INTO categories (cat_title) VALUES (?)";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "s", $cat_title);
                if(!mysqli_stmt_execute($stmt)) {
                    die('QUERY FAILED' . mysqli_prepare($connection));
                }    
            }
        }
    }

    function deleteCategories() {
        global $connection;
        // It will find the delete URL parameter, which is "/categories.php?delete='whatever_id'" above
        if(isset($_GET['delete'])) {
            $delete_cat_id = $_GET['delete'];
            $query = "DELETE FROM categories WHERE cat_id = ?";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $delete_cat_id);
            if(!mysqli_stmt_execute($stmt)) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            // This is going to refresh the page after we delete a category. 
            // Otherwise, we have to delete and refresh the website to see the result
            header("Location: categories.php");
        }
    }

    // Function to check if the user role is an admin or not
    function is_admin($username) {
        global $connection;
        $query = "SELECT user_role FROM users WHERE username = ? ";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);
        if(!mysqli_stmt_execute($stmt)) {
            die('Username query went wrong ' . mysqli_error($connection));
        }
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if($row['user_role'] === 'admin') {
            return true;
        } else {
            return false;
        }
    }

?>