<?php
// Obtain a connection object by connecting to the db
$connection = mysqli_connect('localhost', 'root', 'password', 'planit');

if(mysqli_connect_errno()){
    echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
} 

    
    
$query = "SELECT * FROM calendar WHERE username = '{$_SESSION['login_user']}'";
$resultset = mysqli_query($connection,$query);
if(!$resultset){
    echo ":( Something went wrong.<br><br>";
}   
    
// Start table
echo "<table class = \"table\">";
echo "<th>Type</th>";
echo "<th>Description</th>";
echo "<th>Location</th>";
echo "<th>Start</th>";
echo "<th>End</th>";
    
// Get data
while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) 
{
    echo "<tr>";
    echo "<td>$row[3]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[6]</td>";
    echo "<td>$row[4]</td>";
    echo "<td>$row[5]</td>";
    echo "<td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\"
value=\"delete\"/></td>";
    echo "</tr>";
    
    
}
// End table    
echo "</table>";    
?>