<?php 
    if(isset($_POST['create_post'])) {
        $post_title = $_POST['title'];
        $post_author = $_POST['author'];
        $post_category_id = $_POST['post_category'];
        $post_status = $_POST['post_status'];

        $post_image = $_FILES['image']['name'];
        $post_image_temp = $_FILES['image']['tmp_name'];
        
        $post_tags = $_POST['post_tags'];
        $post_content = $_POST['post_content'];
        $post_date = date('d-m-y');
        
        // PHP In built function. We have to use temporarily post image to display on the web what file it is
        // $post_image will upload to the final destination
        move_uploaded_file($post_image_temp, "../img/$post_image"); 
        // now() is a function for SQL to get the current date time today
        $query = "INSERT INTO post(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) 
                  VALUES(?, ?, ?, now(), ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "issssis", $post_category_id, $post_title, $post_author, $post_image, $post_content, $post_tags, $post_status);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED .' . mysqli_error($connection));
        }

        $query = "SELECT * FROM post"; 
        $post_result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($post_result)) {
            $post_id = $row['post_id'];
        }

        echo "<p class='bg-success'>Post Added. <a href='../post.php?p_id={$post_id}'>View post</a></p>";
    }

?>

<!-- enctype is to sending different form data, because of multipart/form-data -->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" name="title" id="title" class="form-control">
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
        <input type="text" name="post_category_id" id="post_category" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" name="author" id="title" class="form-control">
    </div>
    <?php 
        $query = "SELECT * FROM post";
        $post_result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($post_result)) {
            $post_status = $row['post_status'];
        }
    ?>
    <div class="form-group">
        <label for="post-status">Post Status</label>
        <select name="post_status" id="post-status">
        <?php 
            if($post_status === "") {
                    echo "<option value='draft'>Draft</option>";
                }
        ?>
            <option value='<?php echo $post_status; ?>'><?php echo ucfirst($post_status); ?></option>
            <?php 
                

                if($post_status === 'published') {
                    echo "<option value='draft'>Draft</option>";
                } else {
                    echo "<option value='published'>Published</option>";
                }                
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" id="post_image">
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" name="post_tags" id="post_tags" class="form-control">
    </div>
    <div class="form-group">
        <label for="codesample">Post Content</label>
        <textarea name="post_content" class="form-control" id="codesample" cols="30" rows="50"></textarea>
    </div>
    <input type="submit" name="create_post" class="btn btn-primary" value="Publish Post">
</form>