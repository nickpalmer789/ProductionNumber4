<?php
    include('../session.php');

    echo "Updating color..";
    $newcolor = htmlspecialchars($_POST['color']);
    echo $newcolor;

    $db = mysqli_connect("localhost:3306","root","password","planit");  
                
    if($db === false) {
    //Print an error if the database can't be reached
    //TODO Add better error printing to form
        echo "<p>Cannot connect to the database!</p>";
    } else {
        $sql = "UPDATE user_settings SET default_avatar_color = '$newcolor' WHERE username = '{$_SESSION['login_user']}';";
        if ($db->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
        
        header("location: /content/settings.php#c4");
        
    }
?>
