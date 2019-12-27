<table class="table table-bordered table-hover" style="text-align: center;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Comments</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            // Finds all the categories query
            $query = "SELECT * FROM post";
            $postResult = mysqli_query($connection, $query);    
            while($row = mysqli_fetch_assoc($postResult)) {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_title = $row['post_title'];
                $post_category_id = $row['post_category_id'];
                $post_status = $row['post_status'];
                $post_image = $row['post_image'];
                $post_tags = $row['post_tags'];
                $post_comments_count = $row['post_comment_count'];
                $post_date = $row['post_date'];
                
                echo "<tr>";
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";
                
                $query = "SELECT * FROM categories WHERE cat_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "i", $post_category_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                    echo "<td>$cat_title</td>";
                }



                echo "<td>$post_status</td>";
                echo "<td><img src='./../img/$post_image' alt='image' width='100'></td>";
                echo "<td>$post_tags</td>";
                echo "<td>$post_comments_count</td>";
                echo "<td>$post_date</td>";
                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";

                echo "</tr>";
            }
        ?>
    </tbody>
</table>
<?php 
    if(isset($_GET['delete'])) {
        $post_id = $_GET['delete'];
        $query = "DELETE FROM post WHERE post_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $post_id);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED ' . mysqli_error($connection));
        }
        // Will refresh the posts.php when delete right away
        header("Location: posts.php");
    }
?>
