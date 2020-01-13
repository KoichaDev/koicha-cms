<?php 
    include_once "./includes/config.php";
    

    $query = "SELECT * FROM themes WHERE theme_value = 1";
    $result = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($result)) {
        $theme_id = $row['theme_id'];
        $theme_name = $row['theme_name'];
        $theme_value = $row['theme_value'];
    }

    switch($theme_name) {
        case 'Sbootstrap': 
            include "sbootstrap.php";
        break;
        case 'Koicha': 
            //die(include "sbootstrap.php");
            include "admin/themes/koicha/index.php";
        break;
        default: 
            echo 'Nolpe!';
    break;
    }

?>
