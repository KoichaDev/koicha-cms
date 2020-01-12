<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php"; 
?> 
    <div class="space" style="height: 3.25rem;"></div>

    <div class="container d-md-flex align-items-stretch">
        <!-- Page Content  -->
        <div id="content" class="row ">
            <!-- Blog Entries Column -->
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
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];
                    $post_status = $row['post_status'];

                    if($post_status === "published") { 
                ?>
                <div class="col-sm-12 col-md-11 col-lg-11 col-xl-11">
                 <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background: none; font-weight: bold;">
                        <li class="breadcrumb-item ml-n3"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $post_title; ?></li>
                    </ol>
                </nav> <!-- nav breadcrumb -->    
                <h1 class="ml-n1"><?php echo $post_title; ?></h1>
                <p class="lead">
                    <small>By <a href="index.php"><?php echo $post_author; ?></a></small>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                    <img src="img/<?php echo $post_image; ?>"  class="card-img-top" alt="...">
                <p><?php echo $post_content; ?></p>
                </div>
                <?php
                     }
                }
            } else {
                header("Location: index.php");
            } ?>
        </div><!-- content -->
        <?php include_once "includes/widgets/sidebar.php" ?>
    </div><!-- container -->  

<?php include_once "includes/footer.php"; ?>