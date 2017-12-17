<?php
    $fh = fopen('data.sql', 'w') or die("cannot open file");
    $con = mysqli_connect("localhost","root","password","planit");

    
    // Pull users 
    $result = mysqli_query($con,"SELECT * FROM users");   
    
    fwrite($fh, "insert into `users` (`username`, `first_name`,`last_name`,`phone_number`, `email`,`hashed_password`,`cryptosalt`,`description`) values\n");

    $col = mysqli_num_fields($result);    
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    {     
        fwrite($fh,"(");
    
        for ($i = 0; $i < $col; $i++)
        {
            if($i != 6)
            {                
                fwrite($fh, "'");
                fwrite($fh, addslashes($row[$i]));
                fwrite($fh, "'");
            }
            else
            {
                fwrite($fh, $row[$i]);
            }
            
            if ($i < $col - 1) 
            {
                fwrite($fh, ", ");
            }
        }
        fwrite($fh,"),");
        fwrite($fh, "\n");
               
    }          
    
    // This disgusting mess removes the last comma to put a semi colon
    ftruncate($fh, fstat($fh)['size']-2);
    fseek($fh, fstat($fh)['size']);
    fwrite($fh, ";");
    fwrite($fh, "\n");
    fwrite($fh, "\n");


    // Pull calendar 
    $result = mysqli_query($con,"SELECT username, description, item_name, start_time, end_time, optional_location, repeats FROM calendar");   
    
    fwrite($fh, "insert into `calendar` (`username`, `description`,`item_name`,`start_time`, `end_time`,`optional_location`,`repeats`) values\n");
    $col = mysqli_num_fields($result);  
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    {     
        fwrite($fh,"(");
        
        for ($i = 0; $i < $col; $i++)
        {            
            if ($i == $col - 1)
            {
                fwrite($fh, $row[$i]);
            }
            else
            {
                fwrite($fh, "'");
                fwrite($fh, addslashes($row[$i]));
                fwrite($fh, "'");          
            }

            if ($i < $col - 1) 
            {
                fwrite($fh, ", ");
            }
        }
        fwrite($fh,"),");
        fwrite($fh, "\n");
               
    }  
    
    // This disgusting mess removes the last comma to put a semi colon
    ftruncate($fh, fstat($fh)['size']-2);
    fseek($fh, fstat($fh)['size']);
    fwrite($fh, ";");
    fwrite($fh, "\n");
    fwrite($fh, "\n");

    // Pull user_settings 
    $result = mysqli_query($con,"SELECT * FROM user_settings");   
    
    fwrite($fh, "insert into `user_settings` (`username`,`friend_visible`,`public_visible`,`default_avatar_color`,`username_viewable`,`public_email`,`public_phonenumber`) values\n");

    $col = mysqli_num_fields($result);
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    {     
        fwrite($fh,"(");
        
        for ($i = 0; $i < $col; $i++)
        {
            if($i == 0 || $i == 3)
            {
                fwrite($fh, "'");
                fwrite($fh, addslashes($row[$i]));
                fwrite($fh, "'");              
            }
            else
            {
                fwrite($fh, $row[$i]);
            }
            if ($i < $col - 1) 
            {
                fwrite($fh, ", ");
            }
        }
        
        fwrite($fh,"),");                
        fwrite($fh, "\n");
               
    }  
    
    // This disgusting mess removes the last comma to put a semi colon
    ftruncate($fh, fstat($fh)['size']-2);
    fseek($fh, fstat($fh)['size']);
    fwrite($fh, ";");
    fwrite($fh, "\n");
    fwrite($fh, "\n");


    // Pull groups 
    $result = mysqli_query($con,"SELECT group_name FROM groups");   
    
    fwrite($fh, "insert into `groups` (`group_name`) values\n");
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    {     
        fwrite($fh,"(");
        
      
        fwrite($fh, "'");
        fwrite($fh, addslashes($row[0]));
        fwrite($fh, "'");              
          
        
        fwrite($fh,"),");                
        fwrite($fh, "\n");
               
    }  
    
    // This disgusting mess removes the last comma to put a semi colon
    ftruncate($fh, fstat($fh)['size']-2);
    fseek($fh, fstat($fh)['size']);
    fwrite($fh, ";");
    fwrite($fh, "\n");
    fwrite($fh, "\n");


    // Pull groups_join_users 
    $result = mysqli_query($con,"SELECT * FROM groups_join_users");   
    
    fwrite($fh, "insert into `groups_join_users` (`group_id`,`username`) values\n");

    $col = mysqli_num_fields($result);
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    {     
        fwrite($fh,"(");
        
        for ($i = 0; $i < $col; $i++)
        {
            if($i != 0)
            {
                fwrite($fh, "'");
                fwrite($fh, addslashes($row[$i]));
                fwrite($fh, "'");              
            }
            else
            {
                fwrite($fh, $row[$i]);
            }
            
            if ($i < $col - 1) 
            {
                fwrite($fh, ", ");
            }
        }
        
        fwrite($fh,"),");                
        fwrite($fh, "\n");
               
    }  
    
    // This disgusting mess removes the last comma to put a semi colon
    ftruncate($fh, fstat($fh)['size']-2);
    fseek($fh, fstat($fh)['size']);
    fwrite($fh, ";");
    fwrite($fh, "\n");
    fwrite($fh, "\n");



    // Pull tasks
    $result = mysqli_query($con,"SELECT username, task_name, deadline, description, ETA, complete FROM tasks");   
    
    fwrite($fh, "insert into `tasks` (`username`,`task_name`,`deadline`,`description`,`ETA`,`complete`) values\n");

    $col = mysqli_num_fields($result);
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    {     
        fwrite($fh,"(");
        
        for ($i = 0; $i < $col; $i++)
        {
            if ($i != $col -1)
            {
                fwrite($fh, "'");
                fwrite($fh, addslashes($row[$i]));
                fwrite($fh, "'");  
            }
            else
            {
                fwrite($fh, $row[$i]);
            }
                      

            if ($i < $col - 1) 
            {
                fwrite($fh, ", ");
            }
        }
        
        fwrite($fh,"),");                
        fwrite($fh, "\n");
               
    }  
    
    // This disgusting mess removes the last comma to put a semi colon
    ftruncate($fh, fstat($fh)['size']-2);
    fseek($fh, fstat($fh)['size']);
    fwrite($fh, ";");
    fwrite($fh, "\n");
    fwrite($fh, "\n");

    // Pull group_tasks
    $result = mysqli_query($con,"SELECT group_id, task_name, deadline, description, optional_location, ETA, complete FROM group_tasks");   
    
    fwrite($fh, "insert into `group_tasks` (`group_id`,`task_name`, `deadline`,`description`, `optional_location`,`ETA`,`complete`) values\n");

    $col = mysqli_num_fields($result);
    while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) 
    {     
        fwrite($fh,"(");
        
        for ($i = 0; $i < $col; $i++)
        {
            if ($i != 0) 
            {
                fwrite($fh, "'");
                fwrite($fh, addslashes($row[$i]));
                fwrite($fh, "'");            
            }
            else
            {
                fwrite($fh, $row[$i]);
            }
            
            if ($i < $col - 1) 
            {
                fwrite($fh, ", ");
            }
        }
        
        fwrite($fh,"),");                
        fwrite($fh, "\n");
               
    }  
    
    // This disgusting mess removes the last comma to put a semi colon
    ftruncate($fh, fstat($fh)['size']-2);
    fseek($fh, fstat($fh)['size']);
    fwrite($fh, ";");
    fwrite($fh, "\n");
    fwrite($fh, "\n");

    // all done close file
    echo "Data loaded, closing file";
    fclose($fh);
?>

