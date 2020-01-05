<?php include_once "./includes/admin_header.php"; ?>
<body>

    <div id="wrapper">

       <?php include_once "./includes/admin_navigation.php"; ?>

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
                        <?php insertCategories(); ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="cat-title">Add Category</label>
                                    <input type="text" name="cat_title" id="cat-title" class="form-control">
                                </div> 
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-primary" value="Add Category">
                                </div> 
                            </form>
                           
                            <div class="form-group">
                                <?php 
                                /// Update and edit 
                                if(isset($_GET['edit'])) {
                                    $cat_id = $_GET['edit'];
                                    include_once "./includes/update_categories.php";
                                }
                                ?>
                            </div> 
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
                                            <?php findAllCatgories(); ?>

                                            <?php deleteCategories(); ?>
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

    <?php include_once "./includes/admin_footer.php"; ?>