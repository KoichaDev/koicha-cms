
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
                ?>
                <!-- Blog Comments -->
                <?php include "./inc/comments.php"; ?>
                </div>
                    <!-- Blog Sidebar Widgets Column -->
                <?php include_once './inc/sidebar.php'; ?>
        </div>
<?php include_once './inc/footer.php'; ?>
