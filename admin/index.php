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
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                               
                <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-file-text fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        
                                    <?php
                                        // Query for post - We want to check numbers of post 
                                        $query = "SELECT * FROM post";
                                        $post_result = mysqli_query($connection, $query);
                                        $post_counts = mysqli_num_rows($post_result);
                                    ?>
                                        
                                    <div class='huge'><?php echo $post_counts; ?></div>
                                            <div>Posts</div>
                                    </div>
                                    </div>
                                </div>
                                <a href="posts.php">
                                    <div class="panel-footer">
                                    <a href="posts.php?source=view_all_posts.php">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php 
                                            $query = "SELECT * FROM comments ";
                                            $comments_result = mysqli_query($connection, $query);
                                            $comments_counts = mysqli_num_rows($comments_result);
                                        ?>
                                        <div class='huge'><?php echo $comments_counts; ?></div>
                                        <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                    <a href="posts.php?source=view_all_comments">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                        <?php 
                                            $query = "SELECT * FROM users";
                                            $user_result = mysqli_query($connection, $query);
                                            $count_users = mysqli_num_rows($user_result);
                                        ?>
                                        <div class='huge'><?php echo $count_users; ?></div>
                                            <div> Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                    <a href="users.php">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    </a>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php 
                                                $query = "SELECT * FROM categories ";
                                                $categories_result = mysqli_query($connection, $query);
                                                $counts_categories = mysqli_num_rows($categories_result);    
                                            ?>
                                            <div class='huge'><?php echo $counts_categories; ?></div>
                                            <div>Categories</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="categories.php">
                                    <div class="panel-footer">
                                        <a href="categories.php">
                                            <span class="pull-left">View Details</span>
                                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        </a>   
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                     <!-- /.row --> 
                        <div class="row">
                            <script type="text/javascript">
                            google.charts.load('current', {'packages':['bar']});
                            google.charts.setOnLoadCallback(drawChart);

                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                ['', 'Count'],

                                <?php 
                                    $elemental_text = ['Active Posts', 'Categories', 'Users', 'Comments'];
                                    $elemental_count = [$post_counts, $counts_categories, $count_users, $comments_counts];

                                    for($i = 0; $i < 4; $i++) {
                                        echo "['{$elemental_text[$i]}'" . "," . "{$elemental_count[$i]}],";
                                    }

                                ?>
                                // The array below is an example of static of how it will display on the graph
                                // The code above, the php mimicks the array of the static code when echoing
                                //['Posts', 1000],
                                ]);

                                var options  = {
                                chart: {
                                    title: '',
                                    subtitle: '',
                                }
                                };

                                var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                                chart.draw(data, google.charts.Bar.convertOptions(options));
                            }
                            </script>
                        <div id="columnchart_material" style="width: auto; height: 500px;"></div>
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