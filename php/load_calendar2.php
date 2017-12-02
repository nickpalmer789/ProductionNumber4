<?php
$connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

    $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
    $tasks = ""; 
    while ($row = mysqli_fetch_array($res, MYSQLI_NUM))
    {
        if($row[6] == 0)
        {
            $tasks .= '{ start: \'';
            $tasks .= $row[3];
            #row[1] is username
            $tasks .= '\', end: \'';
            $tasks .= $row[3];
            $tasks .= '\', title: \'';
            $tasks .= $row[2];
            $tasks .= ' - ';
            $tasks .= $row[4];
            $tasks .= '\', color: \'bisque';
            $tasks .= '\' },';
        }

    }
    $tasks = rtrim($tasks, ',');

    $query = "SELECT * FROM calendar WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
    $calendar = "";
    while ($row = mysqli_fetch_array($res, MYSQLI_NUM))
    {
        
        $start = explode(" ", $row[4]);
        $end = explode(" ", $row[5]);
        /*$calendar .= '{ id: \'';
        $calendar .= $row[0];
        $calendar .= '\', start: \'';
        $calendar .= $start[1];
        #row[1] is username
        $calendar .= '\', end: \'';
        $calendar .= $end[1];
        $calendar .= '\', dow: \'';
        $calendar .= implode(" ",str_split($row[7]));
        $calendar .= '\', ranges: [{ ';
        $calendar .= ' start: ';
        $calendar .= 'moment($start[0], \'YYYY-MM-DD\')';
        $calendar .= ', end: ';
        $calendar .= 'moment($end[0], \'YYYY-MM-DD\')';
        $calendar .= ', }]  \'';
        $calendar .= '\', title: \'';     
        $calendar .= $row[3];
        $calendar .= ' - ';
        $calendar .= $row[2];
        $calendar .= '\' },';

        */
        $myObj->title = $row[3];
        $myObj->id = $row[0];
        $myObj->start = $start[1];
        $myObj->end = $end[1];
        $myObj->dow = explode(" ", $row[7]);

        $rangeArray = array();
        ?>
        <script>
        var p1 = moment( <?php $start[1] ?>, 'YYYY-MM-DD');
        </script>
        <?php
        echo "<script>document.writeln(p1);</script>";
        //$rangeObj->start = <script>document.writeln(p1);</script>;

    }

    $calendar = rtrim($calendar, ',');


    
?>