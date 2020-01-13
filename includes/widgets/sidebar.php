<nav id="sidebar" style="border-left: transparent;">
    <div class="container-fluid">
        <h3 class="py-3">📰 Recent Post 📰</h3>
        <?php 
            $query = "SELECT * FROM post ORDER BY post_id ASC";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)) {
            $post_title = $row['post_title'];
            $post_image = $row['post_image'];
            $post_status = $row['post_status'];
            // Checking if the post is published status or not
            if($post_status === "published") {
            ?>
            <hr>
                <div class="row">
                     <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                        <figure class="media-thumbnails" >
                            <img width="240" height="160" src="img/<?php echo $post_image; ?>" class="img-fluid wp-post-image" alt="" />                                
                        </figure>
                    </div> <!-- col -->
                    <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                    <h6 class="mb-1">
                        <a href="" title=""><?php echo $post_title; ?></a>
                    </h6>
                    </div>
                </div><!-- row -->
            <?php
                }
            }
            include_once "includes/widgets/tags.php";
            ?>            
        </div><!-- p-4 pt-5 -->
    </div>
</nav>