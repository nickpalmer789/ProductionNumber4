<?php
include('../session.php');

    echo "Updating visibility..";
    $newuserv = htmlspecialchars($_POST['username_visible']);
    $newfriendv = htmlspecialchars($_POST['friend_visible']);
    $newpublicv = htmlspecialchars($_POST['public_visible']);

$db = mysqli_connect("localhost:3306","root","password","planit");  
            
if($db === false) 
{
//Print an error if the database can't be reached
//TODO Add better error printing to form
    echo "<p>Cannot connect to the database!</p>";
} 
else{
    $sql = "UPDATE user_settings SET username_viewable = '$newuserv' WHERE username = '{$_SESSION['login_user']}';";
    #echo $sql;
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
        #$_SESSION['login_user'] = $name;
    } else {
        echo "Error updating record: " . $db->error;
    }
    
    $sql = "UPDATE user_settings SET friend_visible = '$newfriendv' WHERE username = '{$_SESSION['login_user']}';";
    #echo $sql;
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
        #$_SESSION['login_user'] = $name;
    } else {
        echo "Error updating record: " . $db->error;
    }
    
    $sql = "UPDATE user_settings SET public_visible = '$newpublicv' WHERE username = '{$_SESSION['login_user']}';";
    #echo $sql;
    if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
        #$_SESSION['login_user'] = $name;
    } else {
        echo "Error updating record: " . $db->error;
    }
    
    header("location: /content/settings.php#c3");
    
    
    
    

}
?>
