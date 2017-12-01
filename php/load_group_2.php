<?php
	$connection = mysqli_connect('localhost:3306', 'root', 'password', 'planit');
	echo "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>";
	echo "<script src=\"/js/load_group_data.js\"></script>";
	echo "<script type=\"text/javascript\"></script>";


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
	//$group_names = mysqli_fetch_array($resultset, MYSQLI_NUM);
	echo "<div class=\"row\">";
		echo "<div class=\"col-xs-6\"><font size=\"7\">*GROUPNAME* Calendar</font></div>";


		echo "<div class=\"col-xs-6\" id=\"groups\"><button class=\"btn btn-success special-btn dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> Groups </button>";

		echo "<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\" id=\"groupSelect\">";
		echo "<a class=\"dropdown-item\" href=\"/index.php\">All groups</a>";
		while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) 
		{
		    
		    echo "<a class=\"dropdown-item\" href=\"/js/load_group_2.php\">$row[0]</a>";
		    
		}
		echo "</div></div></div>"; //ends row, button, dropdown items divs

		//load calendar for all groups first
		$resultset = mysqli_query($connection,$tasks_query);
		if(!$resultset){
		    echo ":( Something went wrong.<br><br>";
		} 

		echo "<div class=\"row\">";
			echo "<div class=\"col-sm-8\">";
			echo "<div class=\"calendarspacing\">";
			echo "<div class=\"totallyacalendar table-responsive\" align=\"center\">";
				//load_group functions
				// Start table
				echo "<table class = \"table\">";
				echo "<th>Group</th>";
				echo "<th>Type</th>";
				echo "<th>Description</th>";
				echo "<th>Location</th>";
				echo "<th>Start</th>";
				echo "<th>End</th>";
				// Get data
				while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) 
				{
				    echo "<tr>";
				    echo "<td>$row[0]</td>";
				    echo "<td>$row[2]</td>";
				    echo "<td>$row[1]</td>";
				    echo "<td>$row[3]</td>";
				    echo "<td>$row[4]</td>";
				    echo "<td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\"
				value=\"delete\"/></td>";
				    echo "</tr>";
				    
				    
				}
				// End table    
				echo "</table>";  
			echo "</div> </div> </div>";

			echo "<div class=\"col-sm-4\"> <table class=\"table\"> <thead>  <tr>  <th>Group Tasks</th>  </tr>  </thead>";
				echo "<tbody>";
					echo "<tr> <td>Do the project</td> </tr>";
					echo "<tr>  <td>Make it not incomplete</td>  </tr>";
					echo "<tr>  <td>Meetings etc</td>  </tr>";
					echo "<tr>  <td>Group things</td>  </tr>";
				echo "</tbody>";
				echo "</table> <br>";

			echo "<table class=\"table\"> ";
				echo "<thead>  <tr>  <th>Completed Tasks</th>  </tr>  </thead>";
				echo "<tbody>";
					echo "<tr><td>I did the project</td></tr>";
					echo "<tr><td>I made it not incomplete</td></tr>";
					echo "<tr><td>Firetruck</td></tr>";
					echo "<tr><td>Rocks</td></tr>";
				echo "</tbody>";
			echo "</table>";

			echo "</div>";

		echo " </div>";
?>