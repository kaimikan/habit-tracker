<?php
$habit_id = $_REQUEST['id'];

$mysqli = new mysqli('localhost', 'root', '', 'habit_tracker');

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM habits WHERE id = $habit_id";
$result = mysqli_query($mysqli, $sql) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);
?>	

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Habit Creation</title>
    <script src="menu.js"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <fieldset>
        <legend>Habit Edit Form</legend>
        <?php
        $status = "";
        if(isset($_POST['new']) && $_POST['new']==1)
        {
            $habit_id = $_REQUEST['id'];
            $update="UPDATE `habits` SET `name` = '".$_REQUEST['name']."',`description` = '".$_REQUEST['description']."', `start_date` = '".$_REQUEST['start_date']."', `end_date` = '".$_REQUEST['end_date']."', `is_everyday` = '".isset($_POST['everyday'])."', `min_times` = '".$_REQUEST['min_reps']."', `max_times` = '".$_REQUEST['max_reps']."', `build_up_amount` = '".$_REQUEST['rep_build_up']."', `bounty` = '".$_REQUEST['bounty']."' WHERE `id` = '".$habit_id."'";

            mysqli_query($mysqli, $update) or die(mysqli_error());
            $status = "Habit Updated Successfully. </br></br>";
            echo '<p style="color:#FF0000;">'.$status.'</p>';
        }
        else 
        {
        ?>
        <form name="form_habit" class="habit-form" method="post" action="">

            <input type="hidden" name="new" value="1" />
            <p>
                <label for="id_name">Name:</label>
                <input type="text" name="name" id="id_name" value="<?php echo $row['name']; ?>">
            </p>
            <p>
                <label for="id_description">Description:</label>
                <textarea name="description" id="id_description"><?php echo $row['description']; ?></textarea>
            </p>
            <p>
                <label for="id_start_date">Start Date:</label>
                <input type="date" name="start_date" id="id_start_date" value="<?php echo $row['start_date']; ?>">
            </p>    
            <p>
                <label for="id_end_date">End Date:</label>
                <input type="date" name="end_date" id="id_end_date" value="<?php echo $row['end_date']; ?>">
            </p>
            <p>
                <label for="id_everyday" id="everyday-label">Everyday:</label>
                <?php 
                    if ($row['is_everyday'] == 0)
                        echo '<input type="checkbox" name="everyday" id="id_everyday">';
                    else 
                        echo '<input type="checkbox" name="everyday" id="id_everyday" checked>'; 
                ?>
            </p>
            <!-- min/max/built_up/bounty to be done with javascript and appearing/disappearing fields -->
            <p>

                <label for="id_min_reps">Min Reps (0 = disabled):</label>
                <input type="number" name="min_reps" id="id_min_reps" min="0" max="31" value="<?php echo $row['min_times']; ?>">
            </p>
            <p>

                <label for="id_max_reps">Max Reps (0 = disabled):</label>
                <input type="number" name="max_reps" id="id_max_reps" min="0" max="31" value="<?php echo $row['max_times']; ?>">
            </p>
            <p>

                <label for="id_rep_build_up">Rep Build Up:</label>
                <input type="number" name="rep_build_up" id="id_rep_build_up" value="<?php echo $row['build_up_amount']; ?>">
            </p>
            <p>

                <label for="id_bounty">Bounty:</label>
                <input type="number" name="bounty" id="id_bounty" value="<?php echo $row['bounty']; ?>">
            </p>
            <p>&nbsp;</p>
            <p>
                <input type="submit" name="update" id="id_update" value="Update">
            </p>
        </form>
        <?php } ?>
    </fieldset>
</body>
</html>