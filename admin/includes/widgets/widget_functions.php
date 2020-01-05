<?php 
    // Query for database 
    $query = "SELECT * FROM widget";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $login_widget = $row['widget_value'];

    // Function for updating the login widget
    function update_login_widget($id, $value) {
        global $connection;
        $query = "UPDATE widget SET widget_value = ? WHERE widget_id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, "ii", $value, $id);
        if(!mysqli_stmt_execute($stmt)) {
            die('Query of the widget went wrong' . mysqli_error($connection));
        }    
        header("Location: widget.php");     
    }
   
?>