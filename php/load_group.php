<?php
// Obtain a connection object by connecting to the db
$connection = mysqli_connect('localhost', 'root', 'password', 'planit');

if(mysqli_connect_errno()){
    echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
} 

    
    
$query = "SELECT group_name, group_calendar.description, group_calendar.item_name, group_calendar.start_time, group_calendar.end_time FROM users JOIN groups_join_users ON users.username = groups_join_users.username JOIN groups ON groups_join_users.group_id = groups.group_id JOIN group_calendar ON groups.group_id = group_calendar.group_id WHERE users.username = '{$_SESSION['login_user']}'";

$resultset = mysqli_query($connection,$query);
if(!$resultset){
    echo ":( Something went wrong.<br><br>";
}   
    
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
echo "<table>";    
?>