<?php

if(isset($_POST['name']))
{
	$con = mysqli_connect('localhost', 'root', '', 'habit_tracker');

	$name = $_POST['name'];
	$description = $_POST['description'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$is_everyday = isset($_POST['everyday']);	
	$min_times = $_POST['min_reps'];
	$max_times = $_POST['max_reps'];
	$build_up_amount = $_POST['rep_build_up'];
	$bounty = $_POST['bounty'];

	$sql = "INSERT INTO `habits`(`name`, `description`, `start_date`, `end_date`, `is_everyday`, `min_times`, `max_times`, `build_up_amount`, `bounty`) VALUES ('$name', '$description', '$start_date', '$end_date', '$is_everyday', '$min_times', '$max_times', '$build_up_amount', '$bounty')";

	$rs = mysqli_query($con, $sql);

	if($rs)
	{
		echo "Habit Insterted";
	}
}
else
{
	echo "Error";
	
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Habit Tracker</title>
    <script src="menu.js" active="creation"></script>
</head>

<body>
</body>
</html>