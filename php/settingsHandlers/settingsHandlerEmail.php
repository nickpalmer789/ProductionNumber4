<?php
$db = mysqli_connect("localhost:3306","root","password","planit");  
            
if($db === false) 
{
//Print an error if the database can't be reached
//TODO Add better error printing to form
    echo "<p>Cannot connect to the database!</p>";
} 
else{
    if(htmlspecialchars($_POST['newemail1'])=="" and htmlspecialchars($_POST['newemail2'])==""){
        echo "We aren't updating email!";
    }else{
        if ($_POST['newemail1']==$_POST['newemail2']){
            $name=htmlspecialchars($_POST['newphone1']);
            echo $name;
            $sql = "UPDATE users SET email = '$name' WHERE username = '{$_SESSION['login_user']}';";
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
            #header("location: /content/settings.php");
        }else{
            echo "new emails don't match!";
        }
    }
    
}
?>


