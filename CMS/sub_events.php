<?php
session_start();
if(isset($_SESSION["regno"]))
{
	require 'sql_con.php';
	$name = $_POST["name"];
	$tseats = $_POST["tseats"];
	$tseats_ext = $_POST["tseats_ext"];
	$price = $_POST["price"];
	$team = $_POST["size"];
	$min = $_POST["min"];
	$max = $_POST["max"];
	$cat = $_POST["cat"];
	$q = "INSERT INTO `events` (`id`, `name`, `price`, `total_seats`, `filled_seats`, `total_ext`, `filled_ext`,`team`, `min`, `max`, `type`) VALUES (NULL, '$name', '$price', '$tseats', '0', '$tseats_ext','0','$team', '$min', '$max', '$cat');";
	if(mysqli_query($mysqli,$q))
		echo "Yahooo!! Event successfully Added!";
	else
		echo "Oh Snap!! Some Tech error in adding event!";
}
else
{
	require 'logout.php';
}
	