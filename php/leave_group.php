<?php
	session_start();
	$db = mysqli_connect("localhost","root","password","planit");

 	if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 


	// $username = $_SESSION["login_user"];
	$group_id = $_REQUEST['name'];

	$query = "DELETE FROM groups_join_users WHERE username = '{$_SESSION['login_user']}' AND group_id = ".$group_id.";";

	$result = mysqli_query($db, $query);

	if (!$result){
		echo("<p>Error completing query!</p>");
	}
	
	include("../content/manage_groups.php");
?>
