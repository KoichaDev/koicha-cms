
<!-- Header  -->
<?php include "./inc/header.php";?>
<!-- Navigation Bar -->
<?php include "./inc/navbar.php"; ?>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">    
            <?php 
                $query = "SELECT * FROM settings WHERE config_id = 3";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_assoc($result);

                // Here we can set a fixed value how many results we want to get to show per pagination
                $display_posts_per_page = $row['config_value'];

                // We want to get the page value from the URL Parameter 
                if(isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    // If there is not page, then it will be zero
                    // basically our index.php, and we don't get any errors
                    $page = "";
                }

                // If we are on the page is 0, basically, that's index.php OR the page is on the pagination number 1
                if($page === "" || $page == 1) {
                    // Then we want to set the variable as 0
                    $page_1 = 0;
                } else {
                    // Example if we are on the page 2 has value 2 and then 2 * $display_posts_per_page = e.g.10
                    // Then we take 10 - 5, then it's 5. The number 5 is the page results we will get
                    $page_1 = ($page * $display_posts_per_page) - $display_posts_per_page;
                }

                $count_post_query = "SELECT * FROM post";
                $find_post_count_result = mysqli_query($connection, $count_post_query);
                $count = mysqli_num_rows($find_post_count_result);

                // We use the count to find the amount of rows that exist on the database
                // After that, we use the count and divide a fixed number. 
                // This number will give us amount of post that will be displayed per pagination
                $count = ceil($count / $display_posts_per_page);

                $query = "SELECT * FROM post ORDER BY post_id DESC LIMIT $page_1, $display_posts_per_page"; 
                $postResult = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($postResult)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_img = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 300);
                    $post_status = $row['post_status'];

                    // Will display the posts if the post status is "published"
                    if($post_status === "published") {
                    ?>



                <!-- First Blog Post -->
                <h1>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h1>
                <p class="lead">
                    by <small><a href="index.php"><?php echo $post_author; ?></a></small>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-responsive" src="./img/<?php echo $post_img; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php
                    }
                }
                ?>
                <hr>                
                <!-- Pagination -->
                <ul class="pager">
                    <?php 
                        for($i = 1; $i <= $count; $i++) {
                            
                            if($i === (int) $page) {
                                echo "<li><a class='active-link' href='index.php?page={$i}'>{$i}</a></li>";
                            } else {
                                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                            }
                        }
                    
                    ?>
                </ul>
                </div>
                    <!-- Blog Sidebar Widgets Column -->
                <?php include_once './inc/sidebar.php'; ?>
        </div>
<?php include_once './inc/footer.php'; ?>
