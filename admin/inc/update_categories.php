<form action="" method="POST">
        <label for="cat-title">Edit Category</label>
        <?php   

            // Getting from the super global variable of $_GET['edit]. This will return the result of the id number from the categories
            // echo $_GET['edit'] if you wish to see 
            if(isset($_GET['edit'])) {
                $cat_id = $_GET['edit'];
                $query = "SELECT * FROM categories WHERE cat_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "i", $cat_id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result)) {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                }
                ?>

                 <div class="form-group">
                    <input type="text" name="cat_title" class="form-control" value="<?php if(isset($cat_title)) { echo $cat_title; } ?>">
                </div>
                <?php
            }
            
            // Using the super global to post the "update category" 
            if(isset($_POST['update_category'])) {
                $update_cat_title = $_POST['cat_title'];
                // Update category
                $query = "UPDATE categories SET cat_title = '{$update_cat_title}' WHERE cat_id = {$cat_id} ";
                $update_query = mysqli_query($connection, $query);
                if(!$update_query) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
            } 
        ?>
   
    <div class="form-group">
        <input type="submit" name="update_category" class="btn btn-primary" value="Update Category">
    </div> 
</form>