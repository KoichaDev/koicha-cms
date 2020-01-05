<?php 
    

    function config_update($column, $id, $value) {
        global $connection;

        $query = "SELECT * FROM settings WHERE $column = $id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        
        $query = "UPDATE settings SET config_value = ? WHERE config_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "si", $value, $id);
        if(!mysqli_stmt_execute($stmt)) {
            die('Updated the config value went wrong ' . mysqli_error($connection));
        }
        header('Location: settings.php');
        return $row['config_value'];
    }

    function get_value($id) {
        global $connection;
        $query = "SELECT * FROM settings WHERE config_id = $id";
        $result = mysqli_query($connection, $query);
        $row = mysqli_fetch_assoc($result);
        return $row['config_value'];
    }
?>