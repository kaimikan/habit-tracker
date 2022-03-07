<?php

$mysqli = new mysqli('localhost', 'root', '', 'habit_tracker');

// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error (' . 
    $mysqli->connect_errno . ') '. 
    $mysqli->connect_error);
}
  
// SQL query to select data from database
$sql = "SELECT * FROM habits ORDER BY id DESC ";
$result = $mysqli->query($sql);
$mysqli->close(); 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Habit Tracker</title>
 	<script src="menu.js"></script>
 	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<p>Home page of habit tracker displaying all current habits</p>
	<table id="habits-table">
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Is Everyday</th>
                <th>Min Times</th>
                <th>Max Times</th>
                <th>Repetition Prize</th>
                <th>Bounty</th>
                <th>Delete</th>
                <th>Edit</th>
            </tr>
        	<form name="form_habit" method="post" action="delete_habit.php">
	<?php   // LOOP TILL END OF DATA 
		while($rows=$result->fetch_assoc())
		{
	?>
			<tr>
			<!--FETCHING DATA FROM EACH 
			ROW OF EVERY COLUMN-->
			<td><?php echo $rows['name'];?></td>
			<td><?php echo $rows['description'];?></td>
			<td><?php echo $rows['start_date'];?></td>
			<td><?php echo $rows['end_date'];?></td>
			<td><?php if ($rows['is_everyday'] == 0) echo 'no'; else echo 'yes';?></td>
			<td><?php echo $rows['min_times'];?></td>
			<td><?php echo $rows['max_times'];?></td>
			<td><?php echo $rows['build_up_amount'].' $';?></td>
			<td><?php echo $rows['bounty'].' $';?></td>
			<td><input type="submit" value="Delete" name="delete_id[<?php echo $rows['id'];?>]"></td>
			<td><button name="edit" href="edit_habit.php?id=<?php echo $rows['id']; ?>"> Edit </button>
			</tr>
	<?php
		}
	?>
			</form>
	</table>
</body>
</html>