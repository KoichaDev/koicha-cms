
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
                if(isset($_GET['p_id'])) {
                    $post_id = $_GET['p_id'];

                // This query will update increment by 1 each time someone views a post through the unique id of the post
                  $view_query = "UPDATE post 
                               SET post_views_count = post_views_count + 1 
                               WHERE post_id = ?";
                $stmt = mysqli_prepare($connection, $view_query);
                mysqli_stmt_bind_param($stmt, "i", $post_id);
                if(!mysqli_stmt_execute($stmt)) {
                    die('View Query went wrong ' . mysqli_error($connection));
                }
                
                $query = "SELECT * FROM post WHERE post_id = ?";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "i", $post_id); 
                mysqli_stmt_execute($stmt);
                $postResult = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($postResult)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_img = $row['post_image'];
                    $post_content = $row['post_content'];

                    ?>

                <!-- First Blog Post -->
                <h1>
                    <?php echo $post_title; ?>
                </h1>
                <p class="lead">
                    <small>By <a href="index.php"><?php echo $post_author; ?></a></small>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="./img/<?php echo $post_img; ?>" alt="">
                <hr>
                <p><?php echo $post_content; ?></p>
                <hr>                
                <?php
                }
            } else {
                header("Location: index.php");
            }
                ?>
                <!-- Blog Comments -->
                <?php include "./inc/comments.php"; ?>
                </div>
                    <!-- Blog Sidebar Widgets Column -->
                <?php include_once './inc/sidebar.php'; ?>
        </div>
<?php include_once './inc/footer.php'; ?>
