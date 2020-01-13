<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php"; 
?> 
    <div class="space" style="height: 3.25rem;"></div>

    <?php
        $query = "SELECT * FROM categories ";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)) {
            $tag_category = $row['cat_id'];
        };
    ?>

    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <h1 class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-5 mx-auto"> 
                    🔖 Blog for <span style="color: #528859;"><?php echo $_GET['tag']; ?></span>  Tag 🔖
                </h1>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 p-4 p-3 ">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: none; font-weight: bold;">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="blog.php">Blog</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['tag']; ?></li>
                </ol>
            </nav> <!-- nav breadcrumb -->
            </div><!-- col -->
            </div>
        </div>
    </div>

    <div class="container d-md-flex align-items-stretch">
        <!-- Page Content  -->
        <div id="content" class="row p-4 pt-5 mt-n5">
            <?php 
                if(isset($_GET['categories'])) {
                    $post_category_id = $_GET['categories'];
                }
                $query = "SELECT * FROM post WHERE post_category_id = ? ";
                $stmt = mysqli_prepare($connection, $query);
                mysqli_stmt_bind_param($stmt, "i", $post_category_id);
                mysqli_stmt_execute($stmt); 
                $postResult = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($postResult)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 300);
                    ?>          

                    <div class="col-md-12 col-lg-12 col-xl-6 py-3">
                        <div class="card">
                        <img src="img/<?php echo $post_image; ?>"  class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $post_title; ?></h5>
                            <p class="card-text"><?php echo $post_content; ?></p>
                            <a href="post.php?p_id=<?php echo $post_id; ?>" class="mt-auto btn btn-lg btn-block btn-outline-primary">Read More</a>
                        </div><!-- card-body -->
                        </div><!-- card -->
                    </div> <!-- card-deck -->
                <?php
                }
                ?>
                </div>
                <?php include_once "includes/widgets/sidebar.php" ?>
        </div><!-- content -->
    </div><!-- container -->  

<?php include_once "includes/footer.php"; ?>