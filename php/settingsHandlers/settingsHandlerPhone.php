<?php
$db = mysqli_connect("localhost:3306","root","password","planit");  
            
if($db === false) 
{
//Print an error if the database can't be reached
//TODO Add better error printing to form
    echo "<p>Cannot connect to the database!</p>";
} 
else{
    if(htmlspecialchars($_POST['newphone1'])=="" and htmlspecialchars($_POST['newphone2'])==""){
        echo "We aren't updating phone!";
    }else{
        if ($_POST['newphone1']==$_POST['newphone2']){
            $name=htmlspecialchars($_POST['newphone1']);
            echo $name;
            $sql = "UPDATE users SET phone_number = '$name' WHERE username = '{$_SESSION['login_user']}';";
            if ($db->query($sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $db->error;
            }
            #header("location: /content/settings.php");
        }else{
            echo "new phone numbers don't match!";
        }
    }
    
}
?>


