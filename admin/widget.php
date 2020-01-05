<?php 

    include "./includes/admin_header.php"; 
    include "./includes/widgets/widget_functions.php"; 
?>
<body>

    <div id="wrapper">

       <?php include_once "./includes/admin_navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Widget Settings
                        </h1>
                    </div>
                    <?php                  

                    if(isset($_POST['submit'])) {
                        $activate_login_widget = $_POST['login_widget'];
                        update_login_widget(1, $activate_login_widget);
                             
                    }
                    ?>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="login-widget">Login Widget</label>
                            </div>
                            <div class="col-md-6">
                                <?php 
                                //echo $login_widget;
                                    if($login_widget == "1") {
                                        ?> <input type="checkbox" name="login_widget"  id="login-widget" value="<?php echo $login_widget; ?>" checked> <?php
                                    } else {
                                        ?>
                                        <input type="checkbox" name="login_widget" id="login-widget" value="1">
                                        <?php
                                    }
                                ?>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                              <input type="submit" name="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>                    
                    </form>
                    </div>  
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <?php include_once "./includes/admin_footer.php"; ?>