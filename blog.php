<?php 
    include_once "includes/header.php";
    include_once "includes/navbar.php"; 
?> 
  <div class="space" style="height: 3.25rem;"></div>

  <div class="container">
    <div class="row">
      <h1 class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-5 mx-auto">📚Blog for Web Developer📚</h1>
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-4 p-3 ">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb" style="background: none; font-weight: bold;">
            <li class="breadcrumb-item"><a href="index.php">&nbsp;&nbsp;&nbsp;Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
       </nav> <!-- nav breadcrumb -->
      </div><!-- col -->
    </div><!-- row -->
  </div><!-- container -->
       
  <div class="container d-md-flex align-items-stretch">
    <!-- Page Content  -->
    <div id="content" class="row p-4 pt-5 mt-n5">
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

        $query = "SELECT * FROM post ORDER BY post_id ASC LIMIT $page_1, $display_posts_per_page";
        $result = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($result)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_content = substr($row['post_content'], 0, 250);
          $post_status = $row['post_status'];
          // Checking if the post is published status or not
          if($post_status === "published") {
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
      }
      ?>
      </div><!-- content -->
    <?php include_once "includes/widgets/sidebar.php" ?>
  </div><!-- container -->
  
  <!-- Pagination -->
<div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
           <nav aria-label="Page">
            <ul class="pagination justify-content-center">
                <?php 
                    for($i = 1; $i <= $count; $i++) {   
                      if($i === (int) $page) {
                          echo "<li class='page-item active'><a class='page-link' href='blog.php?page={$i}'>{$i}</a></li>";
                      } else {
                          echo "<li class='page-item'><a class='page-link' href='blog.php?page={$i}'>{$i}</a></li>";
                      }
                    }
                
                ?>
              </li>
            </ul>
          </nav>
      </div>
    </div><!-- row -->
  </div><!-- container -->
<?php include_once "includes/footer.php"; ?>