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
                            <form action="">
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
                                <?php 
                                    $query = "SELECT * FROM categories";
                                    $catResult = mysqli_query($connection, $query);    
                                ?>

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
                                                while($row = mysqli_fetch_assoc($catResult)) {
                                                    $cat_id = $row['cat_id'];
                                                    $cat_title = $row['cat_title'];
                                                    echo "<tr>";
                                                    echo "<td>$cat_id</td>";
                                                    echo "<td>$cat_title</td>";
                                                }
                                                echo "</tr>";
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