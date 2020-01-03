<?php include_once "./inc/admin_header.php"; ?>
<?php 
    if(!is_admin($_SESSION['username'])) {
        header('Location: index.php');
    }
?>
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
                        <?php 
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = "";
                            }
                            switch($source) {
                                case 'add_user'; include "./inc/add_user.php"; break;
                                case 'edit_user'; include "./inc/edit_user.php"; break;
                                default: include "./inc/view_all_users.php"; break;
                            }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>

    <?php include_once "./inc/admin_footer.php"; ?>