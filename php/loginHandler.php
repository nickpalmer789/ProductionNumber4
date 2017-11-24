<?php
   
$db = mysqli_connect("localhost:3306","root","password","planit");  
            
if($db === false) 
{
//Print an error if the database can't be reached
//TODO Add better error printing to form
    echo "<p>Cannot connect to the database!</p>";
} 
else 
{
    session_start();        
    if($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $username = mysqli_real_escape_string($db,$_POST['username']);
        $password = mysqli_real_escape_string($db,$_POST['password']);
    
        $verifyQuery = "SELECT username FROM users WHERE username = '$username' AND hashed_password = '$password'";
        $result = mysqli_query($db, $verifyQuery);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        //Check how many users there are with the given username
        $count = mysqli_num_rows($result);
        
        if($count == 1) 
        {
            //Log the user in and redirect them to the dashboard
            $_SESSION["login_user"] = $username;
            $_SESSION["logged_in"] = TRUE;
            header("location: /content/dashboard.php");
        } 
        
    else 
    {
    //Incorrect username or password. Print an error
    //TODO Add better error printing to form
    echo "<p> Incorrect username or password!</p>";
        header("location: /content/login.php");
    }
        
    }
}

?>
