<?php
	include ("session.php");
	$username = $_SESSION["login_user"];
	$groupname = $_REQUEST['name'];
	$query_group_id = "SELECT group_id FROM groups WHERE groupname = '$groupname';";
	$group_id = mysqli_query($db, $query_group_id);
	$row = mysqli_fetch_array($group_id, MYSQLI_NUM);
	$delete_group = "DELETE FROM groups_join_users WHERE username = '$username' AND group_id = '$row[0]';";
?>
