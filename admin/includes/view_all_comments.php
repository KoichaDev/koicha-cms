<table class="table table-bordered table-hover" style="text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Email</th>
            <th>Status</th>
            <th>In response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // Finds all the categories query
            $query = "SELECT * FROM comments";
            $postResult = mysqli_query($connection, $query);    
            while($row = mysqli_fetch_assoc($postResult)) {
                $comment_id = $row['comment_id'];
                $comment_post_id = $row['comment_post_id'];
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_email = $row['comment_email'];
                $comment_status = $row['comment_status'];
                $comment_date = $row['comment_date'];
                
                echo "<tr>";
                echo "<td>$comment_id</td>";
                echo "<td>$comment_author</td>";
                echo "<td>$comment_content</td>";
                
                
                
                /* $query = "SELECT * FROM categories WHERE cat_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "i", $post_category_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<td>$cat_title</td>";
                } */
                echo "<td>$comment_email</td>";
                echo "<td>$comment_status</td>";
                
                $query = "SELECT * FROM post WHERE post_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "i", $comment_post_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                while($row = mysqli_fetch_assoc($result)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    echo "<td><a href='./../post.php?p_id=$post_id'>$post_title</a></td>";
                }               
                echo "<td>$comment_date</td>";
                echo "<td><a href='posts.php?source=view_all_comments&approve={$comment_id}'>Approve</a></td>";
                echo "<td><a href='posts.php?source=view_all_comments&unapprove={$comment_id}'>Unapprove</a></td>";
                echo "<td><a href='posts.php?source=view_all_comments&delete={$comment_id}'>Delete</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<?php 
    // Query to unapprove
    if(isset($_GET['approve'])) {
        // Query to delete

        $comment_approve = $_GET['approve'];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = ? ";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $comment_approve);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED ' . mysqli_error($connection));
        }

        // Will refresh the posts.php when delete right away
        header("Location: posts.php?source=view_all_comments");
    }

    // Query to unapprove
    if(isset($_GET['unapprove'])) {
        // Query to delete

        $comment_unapprove = $_GET['unapprove'];
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = ? ";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $comment_unapprove);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED ' . mysqli_error($connection));
        }

        // Will refresh the posts.php when delete right away
        header("Location: posts.php?source=view_all_comments");
    }

    if(isset($_GET['delete'])) {
        // Query to delete
        $comment_id = $_GET['delete'];
        echo $comment_id;
        $query = "DELETE FROM comments WHERE comment_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $comment_id);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED ' . mysqli_error($connection));
        }
        // Will refresh the posts.php when delete right away
        header("Location: posts.php?source=view_all_comments");
    }
?>
