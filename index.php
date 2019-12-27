
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
                $query = "SELECT * FROM post ORDER BY post_date DESC"; 
                $postResult = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($postResult)) {
                    $post_id = $row['post_id'];
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
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                    <img class="img-responsive" src="./img/<?php echo $post_img; ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>                
                <?php
                }
                ?>
                </div>
                    <!-- Blog Sidebar Widgets Column -->
                <?php include_once './inc/sidebar.php'; ?>
        </div>
<?php include_once './inc/footer.php'; ?>
