<div class="mb-5 py-5">
    <h3>🏷️ CodeTags 🏷️</h3>
    <div class="tagcloud py-3">
        <?php
            $query = "SELECT * FROM categories";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)) {
                $cat_id = $row['cat_id'];
                $tags = $row['cat_title'];
                ?>
                <a href="categories.php?categories=<?php echo $cat_id; ?>&tag=<?php echo $tags; ?>" class="tag-cloud-link"><?php echo $tags; ?></a>
                <?php
            }
        ?>
    </div><!-- Tag cloud -->
</div><!-- mb-5 -->