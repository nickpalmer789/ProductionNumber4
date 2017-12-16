<?php
    

function load_tasks(&$connection) {
    $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}'";
    $resultset = mysqli_query($connection,$query);
    if(!$resultset){
        echo ":( Something went wrong.<br><br>";
    }   
    //TODO Add functionality to show time of deadline 

    // Start table
    echo "<table class = \"table\">";
    echo "<tr>";
    echo "<th>Name</th>";
    echo "<th>Description</th>";
    echo "<th>ETA</th>";
    echo "<th>Deadline</th>";
    echo "<th>End</th>"; 
    echo "</tr>";
    while ($row = mysqli_fetch_array($resultset, MYSQLI_NUM)) {
        if($row[6] == 0){
            echo "<tr>";
            echo "<td>$row[2]</td>";
            echo "<td>$row[4]</td>";
            echo "<td>$row[5]</td>";
            $dateString = explode(" ", $row[3]);
            echo "<td>$dateString[0]</td>";
            echo "<td><input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Done!\"/></td>";
            echo "</tr>";
        }
    }

    //End Table
    echo "</table>";
}


?>
