<?php 
    include "./inc/admin_header.php"; 
    include "./inc/admin_navigation.php";


    function config_update($column, $id, $value) {
        global $connection;

        $query = "SELECT * FROM config WHERE $column = $id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        
        $query = "UPDATE config SET config_value = ? WHERE config_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "si", $value, $id);
        if(!mysqli_stmt_execute($stmt)) {
            die('Updated the config value went wrong ' . mysqli_error($connection));
        }
        header('Location: settings.php');
        return $row['config_value'];
    }

    if(isset($_POST['submit'])) {
        $site_title = $_POST['site_title'];
        $site_desc = $_POST['site_description'];

        config_update('config_id', 1, $site_title);
        config_update('config_id', 2, $site_desc);

    }

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
                            <input type="text" name="site_title" class="form-group col-sm-6" id="site-title" placeholder="Your site title">
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                  <div class="row">
                        <div class="col-md-2">
                            <label for="site-description">Site Description</label>
                        </div>
                        <div class="col-md-6">
                            <input type="text" name="site_description" class="form-group col-sm-6" id="site-description" placeholder="Description of your site">
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