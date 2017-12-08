
<!-- Keeping for reference, nothing uses this right now
===========================================================================
-->



<?php
    $group_id = 1;

	$db = mysqli_connect('localhost', 'root', 'password', 'planit');
	echo "<script src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js\"></script>";
	echo "<script src=\"/js/load_group_data.js\"></script>";
	echo "<script type=\"text/javascript\"></script>";


	if(mysqli_connect_errno()){
	    echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
	} 
	    
	    //just gets group names
    if ($_POST['newusername1']==$_POST['newusername2']){
        $newuser=htmlspecialchars($_POST['newusername1']);
        echo "name is: $newuser";
        $query = "SELECT * FROM users WHERE username = '$newuser';";
            //$row[0] = group names, $row[1] = event description, etc; gets groups mutliple time

        $resultset = mysqli_query($db,$query);
//        data_dump($resultset);
        if(!$resultset){
            echo "User not found.";
        } else{
            echo "User found!";
            
            echo "Here";
            $sql = "insert into `groups_join_users` (`group_id`,`username`) values ($group_id,'$newuser');";
            echo $sql;
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
            
        }

    } else{
        echo "Error, usernames don't match!";
    }
?>