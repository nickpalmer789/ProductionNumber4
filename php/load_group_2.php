<?php
	$connection = mysqli_connect('localhost:3306', 'root', 'password', 'planit');


	if(mysqli_connect_errno()){
	    echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
	} 

	    
	    //just gets group names
	$query = "SELECT group_name FROM (SELECT group_id FROM groups_join_users WHERE username = '{$_SESSION['login_user']}') as current_user_groups JOIN groups ON current_user_groups.group_id = groups.group_id;";
		//$row[0] = group names, $row[1] = event description, etc; gets groups mutliple times
	$tasks_query = "SELECT group_name, group_calendar.description, group_calendar.item_name, group_calendar.start_time, group_calendar.end_time FROM users JOIN groups_join_users ON users.username = groups_join_users.username JOIN groups ON groups_join_users.group_id = groups.group_id JOIN group_calendar ON groups.group_id = group_calendar.group_id WHERE users.username = '{$_SESSION['login_user']}';";



	$resultset = mysqli_query($connection,$query);
	if(!$resultset){
	    echo ":( Something went wrong.<br><br>";
	}   
	
	    //change this later
	$group_names = mysqli_fetch_array($resultset, MYSQLI_NUM);
	echo "<div class=\"col-xs-6\"><font size=\"7\">$group_names[0] Calendar</font></div>";


	echo "<div class=\"col-xs-6\" id=\"groups\"><button class=\"btn btn-success special-btn dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> Groups </button>";

	echo "<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">";
	while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) 
	{
	    
	    echo "<a class=\"dropdown-item\" href=\"/index.php\">$row[0]</a>";
	    
	}
	echo "</div></div>";

	$resultset = mysqli_query($connection,$tasks_query);
	if(!$resultset){
	    echo ":( Something went wrong.<br><br>";
	} 

?>