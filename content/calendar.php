<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      //Include the header content
      include('../templates/headercontent.php')
    ?>
<?php
        include('../php/session.php');
        include('../templates/navbar.php');
    
    $connection = mysqli_connect('localhost', 'root', 'password', 'planit');

    if(mysqli_connect_errno()){
        echo "<h4>Failed to connect to MySQL:</h4>".mysqli_connect_error();
    } 

    $query = "SELECT * FROM tasks WHERE username = '{$_SESSION['login_user']}' ";
	$res = mysqli_query($connection, $query);
    $string = ""; $hello = "string is now: "; 
    while ($row = mysqli_fetch_array($res, MYSQLI_NUM))
    {
        if($row[6] == 0)
        {
            $string .= '{ id: \'';
            $string .= $row[0];
            $string .= '\', resourceId: \'f\', start: \'';
            $string .= $row[3];
            #row[1] is username
            $string .= '\', end: \'';
            $string .= $row[3];
            $string .= '\', title: \'';
            #echo $row[2];
            #echo $row[3];
        
            $string .= $row[2];

            $string .= '\', color: \'red';
            $string .= '\' },';
        }
        else
        {
            $string .= '{ id: \'';
            $string .= $row[0];
            $string .= '\', resourceId: \'f\', start: \'';
            $string .= $row[3];
            #row[1] is username
            $string .= '\', end: \'';
            $string .= $row[3];
            $string .= '\', title: \'';
            $string .= $row[2];

            $string .= '\', color: \'green';
            $string .= '\' },';
        }

    }
    $string = rtrim($string, ',');
    ?>    
</head>

<body>

        <div class="container-fluid">
            <h1 align="left">
                <font size="7">My Calendar</font>
            </h1>

            <div class="row">
                <div class="col-sm-8" align="center">
                    <div id="calendar">
                       <!-- Full calendar js uses this spot -->
                    </div>
                </div>
                <div class="col-sm-4" align="center">
                    <?php
                        include('../php/taskHandler.php');
                    ?>
                </div>
                 <script src="../js/task_deleteHandler_calendar.js"></script>
            </div>
            <?php
                include('../templates/footerCopy.php');
            ?>
        </div>
        <?php
            include('../templates/footerScripts.php');
        ?>
</body>
    <script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: '2017-11-12',
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
                <?php
                 echo $string;   
                ?>
			]
		});
		
	});

</script>

</html>
