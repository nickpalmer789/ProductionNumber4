<!DOCTYPE html>
<html>

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/settings.css">
	<?php
            //Include the header content
            include('../templates/headercontent.php')
	?>
	<script type="text/javascript">
	$(document).ready(function() {
	  $("show_change_username").click(function() {
	    $('#change_username').toggle();
	      return false;
	    });
	});
	</script>
    
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
            $string .= '\', end: \'2017-11-07T02:00:00\', ';
            $string .= 'title: \'';
            #echo $row[2];
            #echo $row[3];
        }
            $string .= $row[2];
            $string .= '\' },';

    }
    $string = rtrim($string, ',');
    echo $string;
    ?>    
    
    <meta charset='utf-8' />
<link href='../fullcalendar-scheduler-1.9.0/lib/fullcalendar.min.css' rel='stylesheet' />
<link href='../fullcalendar-scheduler-1.9.0/lib/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<link href='../fullcalendar-scheduler-1.9.0/scheduler.min.css' rel='stylesheet' />
<script src='../fullcalendar-scheduler-1.9.0/lib/moment.min.js'></script>
<script src='../fullcalendar-scheduler-1.9.0/lib/jquery.min.js'></script>
<script src='../fullcalendar-scheduler-1.9.0/lib/fullcalendar.min.js'></script>
<script src='../fullcalendar-scheduler-1.9.0/scheduler.min.js'></script>
<script>

	$(function() { // document ready

		$('#calendar').fullCalendar({
			now: '2017-11-07',
			editable: true, // enable draggable events
			aspectRatio: 1.8,
			scrollTime: '00:00', // undo default 6am scrollTime
			header: {
				left: 'today prev,next',
				center: 'title',
				right: 'timelineDay,timelineThreeDays,agendaWeek,month,listWeek'
			},
			defaultView: 'timelineDay',
			views: {
				timelineThreeDays: {
					type: 'timeline',
					duration: { days: 3 }
				}
			},
			resourceLabelText: 'Rooms',
			resources: [
				{ id: 'a', title: 'Auditorium A' },
				{ id: 'b', title: 'Auditorium B', eventColor: 'green' },
				{ id: 'c', title: 'Auditorium C', eventColor: 'orange' },
				{ id: 'd', title: 'Auditorium D', children: [
					{ id: 'd1', title: 'Room D1' },
					{ id: 'd2', title: 'Room D2' }
				] },
				{ id: 'e', title: 'Auditorium E' },
				{ id: 'f', title: 'Auditorium F', eventColor: 'red' },
				{ id: 'g', title: 'Auditorium G' },
				{ id: 'h', title: 'Auditorium H' },
				{ id: 'i', title: 'Auditorium I' },
				{ id: 'j', title: 'Auditorium J' },
				{ id: 'k', title: 'Auditorium K' },
				{ id: 'l', title: 'Auditorium L' },
				{ id: 'm', title: 'Auditorium M' },
				{ id: 'n', title: 'Auditorium N' },
				{ id: 'o', title: 'Auditorium O' },
				{ id: 'p', title: 'Auditorium P' },
				{ id: 'q', title: 'Auditorium Q' },
				{ id: 'r', title: 'Auditorium R' },
				{ id: 's', title: 'Auditorium S' },
				{ id: 't', title: 'Auditorium T' },
				{ id: 'u', title: 'Auditorium U' },
				{ id: 'v', title: 'Auditorium V' },
				{ id: 'w', title: 'Auditorium W' },
				{ id: 'x', title: 'Auditorium X' },
				{ id: 'y', title: 'Auditorium Y' },
				{ id: 'z', title: 'Auditorium Z' }
			],
			events: [
				<?php
                 echo $string;   
                ?>
                ]
		});
	
	});

</script>
<style>

	body {
		margin: 0;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 50px auto;
	}

</style>
    
</head>
<body>
    	<div id='calendar'></div>
</body>
</html>

    