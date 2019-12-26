<?php include_once "./inc/admin_header.php"; ?>
<body>

    <div id="wrapper">

       <?php include_once "./inc/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">

                        <?php 
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
                        ?>

                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" name="cat_title" id="cat-title" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                                </div> 
                            </form>
                        </div>
                         <div class="col-xs-6">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <?php 
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
                                                }
                                                echo "</tr>";
                                            ?>

                                            <?php 
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
                                            ?>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <?php include_once "./inc/admin_footer.php"; ?>