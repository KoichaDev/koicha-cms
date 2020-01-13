<div class="mb-5">
    <h3>Tags</h3>
    <div class="tagcloud">
        <?php
            $query = "SELECT * FROM categories";
            $result = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($result)) {
                $tags = $row['cat_title'];
                ?>
                <a href="#" class="tag-cloud-link"><?php echo $tags; ?></a>
                <?php
            }
        ?>
    </div><!-- Tag cloud -->
</div><!-- mb-5 -->