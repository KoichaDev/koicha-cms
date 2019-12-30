<?php 
    if(isset($_POST['check_box_array'])) {
        foreach($_POST['check_box_array'] as $check_box_values_id) {

            $select_post_status = $_POST['select_options'];

            switch($select_post_status) {
                case 'published': 
                    $query = "UPDATE post SET post_status = ? WHERE post_id = ? ";
                    $stmt = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($stmt, "si", $select_post_status, $check_box_values_id);
                    if(!mysqli_stmt_execute($stmt)) {
                        die('Something went wrong' . mysqli_error($connection));
                    }
                break;
                case 'draft':
                    $query = "UPDATE post SET post_status = ? WHERE post_id = ? ";
                    $stmt = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($stmt, "si", $select_post_status, $check_box_values_id);
                    if(!mysqli_stmt_execute($stmt)) {
                        die('Something went wrong' . mysqli_error($connection));
                    } 
                break;
                case 'delete': 
                    $query = "DELETE FROM post WHERE post_id = ?";
                    $stmt = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($stmt, "i", $check_box_values_id);
                    if(!mysqli_stmt_execute($stmt)) {
                        die('Something went wrong' . mysqli_error($connection));
                    }
                break;
            }
        }   
    }

?>

<form action="" method="POST">
    <div id="bulk-option-container" class="col-xs-4" style="padding: 0;">
        <select name="select_options" class="form-control form-control-sm" id="select-all-check-boxes">
            <option value="">Select Option</option>
            <option value="published">Published</option>
            <option value="draft">Draft</option>
            <option value="delete">Delete</option>
        </select>
    </div>
    <div class="col-xs-4">
       <input type="submit" name="submit" class="btn btn-sm btn-success" value="Apply"></<input>
        <a href="posts.php?source=add_post">Add New</a>
    </div>
    
    <table class="table table-bordered table-hover responsive" style="text-align: center;">
        <thead>
            <tr>
                <th><input type="checkbox" name="" id="select-all-boxes"></th>
                <th>ID</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comments</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>
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
                    ?>
                    <td><input type="checkbox" name="check_box_array[]" class="form-check" id="select-a-check-box" value="<?php echo $post_id; ?>"></td>

                    <?php
                    echo "<td>$post_id</td>";
                    echo "<td>$post_author</td>";
                    echo "<td><a href='./../post.php?p_id={$post_id}'>$post_title</a></td>";

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
</form>

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
