<?php 
    // This function will check if the URL exist, so it can get the correct navigation bar link
    function redirect_navBarURL($section_url) {
        if($_SERVER['REQUEST_URI'] !== '/koicha-cms/admin/themes/koicha/index.php') {
            return '/' . $section_url;
        } 
    }
?>