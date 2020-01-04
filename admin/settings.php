<?php 
    include "./inc/admin_header.php"; 
    include "./inc/admin_navigation.php";

    if(isset($_POST['submit'])) {
        $site_title = $_POST['site_title'];
        $site_desc = $_POST['site_description'];

        config_update('config_id', 1, $site_title);
        config_update('config_id', 2, $site_desc);
    }

    $title = get_value(1);
    $description = get_value(2);
    $post_per_pagination = get_value(3)


    


?>

    <div id="wrapper">
       <?php include_once "./inc/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            General Settings
                        </h1>                              
                    </div>
                </div>
                <form action="" method="POST">
                     <div class="row">
                        <div class="col-md-2">
                            <label for="site-title">Site Title</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="site_title" class="form-group col-sm-6" id="site-title" placeholder="Your site title" value="<?php echo SITENAME; ?>">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="site-description">Site Description</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="site_description" class="form-group col-sm-6" id="site-description" placeholder="Description of your site" value="<?php echo $description; ?>">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <label for="post-per-pagination">Post Per Pagination</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="post_per_pagination" class="form-group col-sm-6" id="post-per-pagination" placeholder="Description of your site" value="<?php echo $post_per_pagination; ?>">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12">
                                <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </div>    
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    

<?php include_once "./inc/admin_footer.php"; ?>