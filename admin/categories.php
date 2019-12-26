<?php include_once "./inc/header.php"; ?>
<body>

    <div id="wrapper">

       <?php include_once "./inc/navigation.php"; ?>

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

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <?php include_once "./inc/footer.php"; ?>