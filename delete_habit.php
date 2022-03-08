<?php
if(isset($_POST['delete_id']) && is_array($_POST['delete_id'])){
    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */ 
    $con = mysqli_connect('localhost', 'root', '', 'habit_tracker');

    // Check connection
    if($con === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    foreach($_POST['delete_id'] as $id_to_delete => $useless_value){
        // Attempt delete query execution
        $sql = "DELETE FROM habits WHERE id=$id_to_delete";
        if(mysqli_query($con, $sql)){
            echo "Record was deleted successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
        }
    }
 
    // Close connection
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Habit Tracker</title>
    <script src="menu.js" active="-"></script>
</head>

<body>
</body>
</html>