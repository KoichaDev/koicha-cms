<?php 
    if(isset($_POST['create_comment'])) {
        $post_id = $_GET['p_id'];
        $comment_author = $_POST['comment_author'];
        $comment_email = $_POST['comment_email'];
        $comment_content = $_POST['comment_content'];
        $comment_status = "Unapproved";

        $query = "INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) 
                  VALUES (?, ?, ?, ?, ?, now())";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "issss", $post_id, $comment_author, $comment_email, $comment_content, $comment_status);
        if(!mysqli_stmt_execute($stmt)) {
            die('QUERY FAILED' . mysqli_error($connection));
        }

        $query = "UPDATE post 
                  SET post_comment_count = post_comment_count + 1
                  WHERE post_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "i", $post_id);
        if(!mysqli_stmt_execute($stmt)) {
            die("QUERY FAILED " . mysqli_error());
        }

    }
?>

<!-- Comments Form -->
<div class="well">
    <h4>Leave a Comment:</h4>
    <form action="" role="form" method="POST">
        <div class="form-group">
        <label for="comment_author">Author</label>
            <input type="text" class="form-control" id="comment_author" name="comment_author" required>
        </div>
        <div class="form-group">
            <label for="comment_email">Email</label>
            <input type="email" class="form-control" id="comment_email" name="comment_email" required>
        </div>
        <div class="form-group">
            <label for="comment_content">Your Comment</label>
            <textarea id="comment_content" class="form-control"  name="comment_content" cols="30" rows="10" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
    </form>
</div>

<hr>

<!-- Posted Comments -->

<!-- Comment -->

<?php 
    $query = "SELECT * FROM comments 
              WHERE comment_post_id = ? 
              AND comment_status = 'approved' 
              ORDER BY comment_id DESC ";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "i", $post_id);
    if(!mysqli_stmt_execute($stmt)) {
        die("QUERY FAILED" . mysqli_error($connection));
    } 
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)) {
        $comment_date = $row['comment_date'];
        $comment_content = $row['comment_content'];
        $comment_author = $row['comment_author'];
    ?>
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a> 
        <div class="media-body">
            <h4 class="media-heading"><?php echo $comment_author; ?>
                <small><?php echo $comment_date; ?></small>
            </h4>
            <?php echo $comment_content; ?>
        </div>
        <hr>
    </div>
    <?php
    }
?>

