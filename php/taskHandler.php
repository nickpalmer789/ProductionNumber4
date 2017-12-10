<?php
    $connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

	$query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
    echo "
    <p> My Tasks </p>
    <table class=\"table\">
        <thead>
            <tr>
                <th>Task</th>
                <th>Date/time due</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
    ";
            while ($row = mysqli_fetch_array($res, MYSQLI_NUM)){
                if($row[6] == 0){
                    echo "<tr>";
                    echo "<td>";
                    echo $row[2];
                    echo "</td>";
                    echo "<td>";
                    echo $row[3];
                    echo "</td>";
                    echo "<td>";
                    echo "<input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Done!\"/>";
                    echo "</td>";
                    echo "</tr>";
                }
            }

    echo "	
        </tbody>
    </table>

    <br>
    ";
    mysqli_data_seek($res, 0);
    echo "
    <p> Completed Tasks </p>
    <table class=\"table\">
        <thead>
            <tr>
                <th>Task</th>
                <th> </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
    ";  
            $alldone = True;
            while ($row = mysqli_fetch_array($res, MYSQLI_NUM)){
                if($row[6] != 0){
                    $alldone = False;
                    echo "<tr>";
                    echo "<td>";
                    echo $row[2];
                    echo "</td>";
                    echo "<td>";
                    echo "<input type=\"submit\" class=\"del\" name=\"".$row[0]."\" value=\"Delete\"/>";
                    echo "</td>";
                    echo "<td>";
                    echo "<input type=\"submit\" class=\"button\" name=\"".$row[0]."\" value=\"Not Done\"/>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
                if($alldone){
                    echo "<tr>";
                    echo "<td>";
                    echo "None, you've done NOTHING";
                    echo "</td>";
                    echo "</tr>";
                }
    echo "
        </tbody>
    </table>
    ";
?>