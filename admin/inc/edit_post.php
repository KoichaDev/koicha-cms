<?php 

    if(isset($_GET['p_id'])) {
        $post_id = $_GET['p_id'];
    }
    // Query for displaying all of the post. We want to use the data post 
    $query = "SELECT * FROM post WHERE post_id = $post_id ";
    $id_result = mysqli_query($connection, $query);    
    while($row = mysqli_fetch_assoc($id_result)) {
        $post_id = $row['post_id'];
        $post_author = $row['post_author'];
        $post_title = $row['post_title'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comments_count = $row['post_comment_count'];
        $post_date = $row['post_date'];
    }

    // Updating the post 
    if(isset($_POST['update_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        
        // PHP In built function. We have to use temporarily post image to display on the web what file it is
        // $post_image will upload to the final destination
        move_uploaded_file($post_image_temp, "../img/$post_image"); 

        // Checking if there is no image, then make sure it WILL display the image!
        if(empty($post_image)) {
            $query = "SELECT * FROM post WHERE post_id = ? ";
            $stmt = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($stmt, "i", $post_id);
            mysqli_stmt_execute($stmt);
            $get_image = mysqli_stmt_get_result($stmt);
            while($row = mysqli_fetch_assoc($get_image)) {
                $post_image = $row['post_image'];
            }
        }

        // now() is a function for SQL to get the current date time today
        $query = "UPDATE post SET 
                  post_category_id = ?, 
                  post_title = ?, 
                  post_author = ?, 
                  post_date = now(), 
                  post_image = ?, 
                  post_content = ?, 
                  post_tags = ?, 
                  post_comment_count = ?, 
                  post_status = ?
                  WHERE post_id = ?"; 
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "isssssisi", $post_category_id, $post_title, $post_author, $post_image, $post_content, $post_tags, $post_comment_count, $post_status, $post_id);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED .' . mysqli_error($connection));
        }
    }

?>

<!-- enctype is to sending different form data, because of multipart/form-data -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" id="title" class="form-control" value="<?php echo $post_title; ?>">
    </div>
    <div class="form-group">
        <label for="post_category">Category Title</label>
        <select name="post_category" class="form-control form-control-lg" id="post_category">
        <?php 
            $query = "SELECT * FROM categories";
            $result = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($result)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo "<option value='$cat_id'>$cat_title</option>";
            }
        ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_category">Post Category ID</label>
        <input type="text" name="post_category_id" id="post_category" class="form-control" value="<?php echo $post_category_id; ?>">
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" name="author" id="title" class="form-control" value="<?php echo $post_author; ?>">
    </div>
    <div class="form-group">
        <label for="post-status">Post Status</label>
        <select name="post_status" id="post-status">
            <option value='<?php echo $post_status; ?>'><?php echo $post_status; ?></option>
            <?php 
                if($post_status === 'Published') {
                    echo "<option value='draft'>Draft</option>";
                } else {
                    echo "<option value='published'>Published</option>";
                }                
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post-image">Post Image</label>
        <img width='100' src="../img/<?php echo $post_image; ?>" alt ="Image">
        <input type="file" name="image" id="post-image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" id="post_tags" class="form-control" value="<?php echo $post_tags; ?>">
    </div>
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea type="text" name="post_content" id="post_content" class="form-control" cols="30" rows="30"><?php echo $post_content; ?></textarea>
    </div>
    <input type="submit" name="update_post" class="btn btn-primary" value="Update Post">
</form>