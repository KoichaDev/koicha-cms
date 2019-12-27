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
                        <?php 
                            if(isset($_GET['source'])) {
                                $source = $_GET['source'];
                            } else {
                                $source = "";
                            }
                            switch($source) {
                                case 'add_post'; include "./inc/add_post.php"; break;
                                case 'edit_post'; include "./inc/edit_post.php"; break;
                                case '200'; echo "Nice 200"; break;
                                default: include "./inc/view_all_posts.php"; break;
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