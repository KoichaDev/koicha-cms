<?php include_once "./includes/admin_header.php"; ?>
<body>
    <div id="wrapper">
        <?php include_once "./includes/admin_navigation.php"; ?>

        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                //echo getcwd(); 
               // print_r(scandir("themes"));                

                ?>
                <h3>Themes</h3>
                <div class="row">
                    <form action="" method="POST">
<?php
    

    if(isset($_GET['id'])) {
        $get_theme_id = $_GET['id'];
        $query = "UPDATE themes SET theme_value = 0 WHERE theme_value = 1 ";
        $result = mysqli_query($connection, $query);

        $query = "UPDATE themes SET theme_value = 1 WHERE theme_id = $get_theme_id";
        $result = mysqli_query($connection, $query);       
    }

    $query = "SELECT * FROM themes";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $theme_id = $row['theme_id'];
        $theme_name = $row['theme_name'];
        $theme_image = $row['theme_image'];
        $theme_value = $row['theme_value'];
                    ?>
                        <div class="col-md-3">
                            <img src="../img/blog-home.png" class="img-thumbnail" alt="" srcset="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <?php 
                                                if($theme_value == 1) { ?>
                                                    <div class="col-xs-8 col-sm-6">
                                                        <h5><span style="color: red;">ACTIVE:</span> <?php echo $theme_name; ?></h5>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-6"></div>
                                                    <?php
                                                } else { ?>
                                                    <div class="col-xs-8 col-sm-6">
                                                        <h5><?php echo $theme_name; ?></h5>
                                                    </div>
                                                    <div class="col-xs-4 col-sm-6">
                                                        <a href="themes.php?id=<?php echo $theme_id; ?>" class="btn btn-success col-md-offset-8" style="border-radius: 0px;">Submit</a>
                                                    </div>
                                                <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
    }    
    ?>
                    </div><!-- Row -->
                </form>
            </div><!-- container-fluid -->
        </div> <!-- Wrapper -->
<?php include_once "./includes/admin_footer.php"; ?>