
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

                if(isset($_POST['submit'])) {
                    $search = "%{$_POST['search']}%";
                    // LIKE are like wildcard
                    $query = "SELECT * FROM post WHERE post_tags LIKE ?";
                    $stmt = mysqli_prepare($connection, $query);
                    mysqli_stmt_bind_param($stmt, "s", $search);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);

                    if(!$result) {
                        die('Query went wrong: ' . mysqli_error());
                    } 
                    $count = mysqli_num_rows($result);
                    if($count == 0) {
                        echo '<h1>NO RESULT</h1>';
                    } else {
                        
                        while($row = mysqli_fetch_assoc($result)) {
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_img = $row['post_image'];
                            $post_content = $row['post_content'];

                            ?>

                            <h1 class="page-header">
                                Page Heading 
                                <small>Secondary Text</small>
                            </h1>

                            <!-- First Blog Post -->
                            <h2>
                                <a href="#"><?php echo $post_title; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo $post_author; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                            <hr>
                            <img class="img-responsive" src="./img/<?php echo $post_img; ?>" alt="">
                            <hr>
                            <p><?php echo $post_content; ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                            <hr>                
                        <?php
                        }
                    }
                } 
                ?>
                </div>
                    <!-- Blog Sidebar Widgets Column -->
                <?php include_once './inc/sidebar.php'; ?>
        </div>
<?php include_once './inc/footer.php'; ?>
