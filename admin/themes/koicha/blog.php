<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php"; 
?> 
  <div class="container">
    <div class="row">
      <h2 class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-5">Blog for Web Developer</h2>
    </div>
  </div>
       
  <div class="container d-md-flex align-items-stretch">
    <!-- Page Content  -->
    <div id="content" class="row p-4 pt-5 ">
        <?php
        $query = "SELECT * FROM post";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)) {
          $post_title = $row['post_title'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'], 0, 250);
          $post_status = $row['post_status'];
          // Checking if the post is published status or not
          if($post_status === "published") {
          ?>

          <div class="col-md-12 col-lg-12 col-xl-6 card-deck py-3">
            <div class="card">
              <img src="img/<?php echo $post_image; ?>" class="card-img-top" alt="...">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo $post_title; ?></h5>
                <p class="card-text"><?php echo $post_content; ?></p>
                <a href="#" class="mt-auto btn btn-lg btn-block btn-outline-primary">Read More</a>
              </div><!-- card-body -->
            </div><!-- card -->
          </div> <!-- card-deck -->
          <?php
        }
      }
      ?>
      </div><!-- content -->
    <?php include_once "includes/widgets/sidebar.php" ?>
  </div><!-- container -->
<?php include_once "includes/footer.php"; ?>