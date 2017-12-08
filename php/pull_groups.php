
<!-- Not sure what this does, might work with group_calendar_handler
=========================================================
-->


<?php
// Obtain a connection object by connecting to the db
$connection = mysqli_connect('localhost', 'root', 'password', 'planit');


if(mysqli_connect_errno()){
    echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
} 

    
    
$query = "SELECT group_name FROM (SELECT group_id FROM groups_join_users WHERE username = '{$_SESSION['login_user']}') as current_user_groups JOIN groups ON current_user_groups.group_id = groups.group_id;";

$resultset = mysqli_query($connection,$query);
if(!$resultset){
    echo ":( Something went wrong.<br><br>";
}   
    
    
// Get data
echo "<button class=\"btn btn-success special-btn dropdown-toggle\" type=\"button\" id=\"dropdownMenuButton\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> Groups </button>";
echo "<div class=\"dropdown-menu\" aria-labelledby=\"dropdownMenuButton\">";
while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) 
{
    
    echo "<a class=\"dropdown-item\" href=\"/index.php\">$row[0]</a>";
    
}
echo "</div>";

   
?>