<!DOCTYPE html>
<html lang="en">

<head>
    <?php
      //Include the header content
      include('../templates/headercontent.php')
    ?>

</head>

<body>
    <?php
      //Include the navbar content
        include('../templates/navbar.php');
        include('../php/session.php');
    ?>
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
				{
					title: 'All Day Event',
					start: '2017-11-01',
				},
				{
					title: 'Long Event',
					start: '2017-11-07',
					end: '2017-11-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-11-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-11-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-11-11',
					end: '2017-11-13'
				},
				{
					title: 'Meeting',
					start: '2017-11-12T10:30:00',
					end: '2017-11-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-11-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-11-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-11-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-11-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-11-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-11-28'
				}
			]
		});
		
	});

</script>

</html>
