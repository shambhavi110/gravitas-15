<?php
session_start();
if((isset($_SESSION["regno"]))&&(isset($_REQUEST['numb'])))
{
	require 'sql_con.php';
	echo "<Input type='text' id='search_extreg' name='search_extreg' autocomple='off' onkeyup='search_extreg(this.value)' placeholder='Search reg number..'><br>";
	
	$q = "SELECT * FROM `external_registration` WHERE `paid_status` = '1' ";
	$r = mysqli_query($mysqli,$q);
	
	echo "<DIV ID='table'><TABLE class='striped'><TR><TH>Name</TH><TH>Regno</TH><TH>Event Name</TH><TH>Team Size</TH></TR>";
	while($t=mysqli_fetch_array($r))
	{
	$regno = $t[1];
	$event_id = $t[2];
	$team = $t[3];
	$paid = $t[7];
	$q1 = "SELECT * FROM `events` WHERE `id` = $event_id";
	$r1 = mysqli_query($mysqli,$q1);
	$t1=mysqli_fetch_array($r1);
	$event_name = $t1[1];
	$q2 = "SELECT * FROM `external_participants` WHERE `regno` ='$regno'";
	$r2 = mysqli_query($mysqli,$q2);
	$t2 = mysqli_fetch_array($r2);
	$name = $t2[2];
	echo "<TR><TD>$name</TD><TD>$regno</TD><TD>$event_name</TD><TD>$team</TD>";
}
echo"</TABLE></DIV>";
echo "<button id='download_extreg' name='download_extreg' onclick='excel_extreg()'>Download</button>";
}
else if((isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))||((!isset($_SESSION['regno']))&&(!isset($_REQUEST['numb']))))
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:index.php");
	}
	else
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		echo "<div>Ah4*!bb dhS8!) Nh5@n</div>";
		exit();
	}
?>