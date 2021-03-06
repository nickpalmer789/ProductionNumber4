<!DOCTYPE html>
<html lang="en">

<head>
    <?php
            include('../templates/headercontent.php');
            //include('../php/session.php');
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/randomcolor/0.5.2/randomColor.min.js"></script>
</head>

<body>
    <?php
        include('../templates/navbar.php');

        $group = $_GET['group_name'];            
    ?>
        <div class="container-fluid">
            <h1 align="left">
                <font size="7">Group calendar for
                    <?= $group ?>
                </font>
            </h1>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle group-btn" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Select Group
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                        build_group_dropdown($connection);
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8" align="center">
                    <div id="calendar">
                        <!-- Full calendar js uses this spot -->
                    </div>
                    <br>
                    <div>
                        <button id="new_task_button" class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#taskModal">Add Group Task</button>
                        
                        <!--Start Group Event Modal-->
                        <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalLabel">Create New Group Task</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--Start form for new task-->
                                        <form action="" method="post">
                                            <label for="taskName"><b>Task Name</b></label>
                                            <input type="text" class="form-control" placeholder="Enter Task Name" name="taskName" required>

                                            <label for="description"><b>Description</b></label>
                                            <input type="text" class="form-control" placeholder="Enter Task Description" id="describe" name="description" required>

                                            <label for="deadlineDate"><b>Deadline Date</b></label>
                                            <input type="date" class="form-control" name="deadlineDate" required>

                                            <label for="deadlineTime"><b>Deadline Time</b></label>
                                            <input type="time" step="1" class="form-control" name="deadlineTime" required>

                                            <label for="eta"><b>ETA</b></label>
                                            <input type="text" class="form-control" name="eta" required>
                                            
                                            <label for="loc"><b>Location (Optional)</b></label>
                                            <input type="text" class="form-control" name="loc" required>

                                            <button class="btn btn-primary btn-lg btn-block" type="submit" name="createTask">Create Task</button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End event Modal-->
                        
                        <!-- Form checking for new entries -->
                        <script>
                            //Form checker
                            $(document).ready(function() {
                                //Function to check the form and enable the submit button if it is valid
                                var checkEventForm = function() {
                                    var emptyInputs = false;

                                    //Loop over inputs on the page
                                    $('form > input').each(function() {
                                        var thisName = $(this).attr("name");

                                        //Check whether required fields are empty
                                        if (thisName == "repeatDates[]" || thisName == "username" || thisName == "password") {
                                            //Skip this input
                                            return true;
                                        } else if ($(this).val() == "") {
                                            emptyInputs = true;
                                        }
                                    });

                                    //Check if a checkbox is checked
                                    var checked = $("input:checkbox").is(":checked");

                                    //Check if the events start on the same day
                                    var sameDay = false;
                                    var startDay = $("#startDate").val();
                                    var endDay = $("#endDate").val();
                                    if (startDay == endDay && startDay != "" && endDay != "") {
                                        sameDay = true
                                    }

                                    //Check if start is before end
                                    var dateOrder = true;
                                    if (startDay != "" && endDay != "" && Date.parse(startDay) > Date.parse(endDay)) {
                                        dateOrder = false;
                                    }

                                    if (emptyInputs || !checked || sameDay) {
                                        if (!dateOrder) {
                                            $("#inputError").text("Starting date must be before ending date!");
                                        } else if (sameDay) {
                                            $("#inputError").text("Events cannot start on the same day!");
                                        } else {
                                            $("#inputError").text("");
                                        }
                                        $('#submitButton').attr('disabled', 'disabled');
                                    } else {
                                        $('#submitButton').removeClass('disabled');
                                        $('#submitButton').removeAttr('disabled');
                                    }
                                }


                                $('form > input').change(function() {
                                    checkEventForm();
                                });
                                $('input:checkbox').click(function() {
                                    checkEventForm();
                                });
                            });

                        </script>
                    </div>
                </div>
                <div class="col-sm-4" align="center">
                    <?php
                        if (isset($_POST["createTask"])) {  
                            add_group_task($connection, $group);
                        }
                    
                        load_group_tasks($connection,$group);   
                    ?>
                </div>
                <script src="../js/group_complete_task.js"></script>
                <script src="../js/group_delete_task.js"></script>
            </div>
            <?php
            include('../templates/footerCopy.php');
          ?>
        </div>
        <!-- Event information modal -->
        <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <!-- Elements in this div are populated upon clicking on a fullCalendar event-->
                    <div class="modal-header">
                        <h5 class="modal-title" id="eventTitle"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6 id="eventTitleBody">Title: </h6>
                        <h6 id="eventStartTime">Start time: </h6>
                        <h6 id="eventEndTime">End time: </h6>
                    </div>
                </div>
            </div>
        </div>
        <!-- End event information modal-->
        <?php
            include('../templates/footerScripts.php');
        ?>
</body>

<!-- Add items to the calendar -->
<script>
    $(document).ready(function() {
        var queryArr = <?php echo group_handler($connection, $group); ?>;

        var eventsArr = [];
        var currentEvent;

        var userMap = new Map();

        for (var i = 0; i < queryArr.length; i++) {
            var startArr = queryArr[i][5].split(" ");
            var endArr = queryArr[i][6].split(" ");

            //Generate the dow array from the string
            var dowArr = queryArr[i][8].split(" ").map(Number);
            console.log(startArr[0]);
            //Generate the ranges array
            var rangeArr = [{
                start: moment(startArr[0], "YYYY-MM-DD"),
                end: moment(endArr[0], "YYYY-MM-DD")
            }];

            //Generate a color for the event
            var currentColor = "";
            var userColorValue = userMap.get(queryArr[i][0]);
            if (typeof userColorValue === 'undefined') {
                //Generate a new color for the user
                currentColor = randomColor();
                userMap.set(queryArr[i][0], currentColor);
            } else {
                currentColor = userColorValue;
            }

            //Create the actual object
            currentEvent = {
                title: queryArr[i][0] + "->" + queryArr[i][3],
                id: queryArr[i][1],
                start: startArr[1],
                end: endArr[1],
                dow: dowArr,
                backgroundColor: currentColor,
                ranges: rangeArr
            }
            //Add the event to the list
            eventsArr.push(currentEvent);
        }


        //Add tasks (like 1 time things) to the calendar
        var arrays = <?php echo show_group_tasks($connection, $group); ?>;
        var dowArr = [];
        var currentTask;
        for (var i = 0; i < arrays.length; i++) {
            if (arrays[i][7] == 0) {
                //create a 30 min block of time
                var endTime = moment.utc(arrays[i][3]).add(30, 'm').format("HH:mm:ss");

                //split date and time
                var deadlineArr = arrays[i][3].split(" ");

                //create arbitrary next day to allow the repeat function to grab the event
                //FIX, TODO, FIND, whatever, this need to change if the renderer changes
                //to include the last day like it should
                var rangeArr = [{
                    start: moment(deadlineArr[0], "YYYY-MM-DD"),
                    end: moment(deadlineArr[0], "YYYY-MM-DD").add(1, 'd').toDate()
                }];

                //Create the actual object, as long as task is not complete

                currentTask = {
                    title: arrays[i][2] + " - " + arrays[i][4],
                    id: arrays[i][0],
                    start: deadlineArr[1],
                    end: endTime,
                    ranges: rangeArr,
                    backgroundColor: "bisque"
                }
                //Add the task to the array
                eventsArr.push(currentTask);
            }


        }


        console.log(eventsArr);
        //Render the events on the calendar
        $('#calendar').fullCalendar({
            defaultDate: moment(),
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,list'
            },
            defaultView: 'agendaWeek',
            eventRender: function(event, element, view) {
                //Check which dates should be rendered
                return (event.ranges.filter(function(range) {
                    //Return true if the event should be rendered at the current date
                    return (event.start.isBefore(range.end) && event.end.isAfter(range.start));

                }).length) > 0;
            },
            //Create a function that triggers when an event is clicked
            eventClick: function(calEvent, jsEvent, view) {
                //Fill the text in the event information modal
                $("#eventTitle").text(calEvent.title);
                $("#eventTitleBody").text("Title: " + calEvent.title);
                $("#eventStartTime").text("Start: " + calEvent.start.format("h:mm:ss"));
                $("#eventEndTime").text("End: " + calEvent.end.format("h:mm:ss"));
                //Show the modal programatically
                $("#eventModal").modal("show");
            },
            //The generated events list
            events: eventsArr
        });

    });

</script>
<!-- end item addition section -->

</html>
