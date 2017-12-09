<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        //Include the header content
        include('../templates/headercontent.php');
        include('../php/session.php');
        include('../templates/navbar.php');
        include('../php/load_calendar.php'); 
        //echo $rangeObj->start;
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
                <br>
                <div>
                    <button class="btn btn-block btn-primary" type="button" data-toggle="modal" data-target="#taskModal">Add Event</button>
                    <!--Start event Modal-->
                    <div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalLabel">Create New Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!--Start form for new event-->
                                    <form action="../php/new_eventHandler.php" method="post">
                                        <label for="eventType"><b>Type</b></label>
                                        <input type="text" class="form-control" placeholder="&quot;class/work/etc&quot;" name="eventType" required>
                                        <label for="description"><b>Description</b></label>
                                        <input type="text" class="form-control" placeholder="&quot;MATH 1234&quot;" name="description" required>
                                        <label for="startDate"><b>Start Date</b></label>
                                        <input id="startDate" type="date" class="form-control" name="startDate" required>
                                        <label for="repeats>"><b>Select days event repeats</b></label>
                                        
                                        <br>
                                        
                                        <label class="checks">Sun</label><input type="checkbox" name="repeatDates[]" value="0" />
                                        <label class="checks">Mon </label><input type="checkbox" name="repeatDates[]" value="1" />
                                        <label class="checks">Tue</label><input type="checkbox" name="repeatDates[]" value="2" />
                                        <label class="checks">Wed</label><input type="checkbox" name="repeatDates[]" value="3" />
                                        <label class="checks">Thur</label><input type="checkbox" name="repeatDates[]" value="4" />
                                        <label class="checks">Fri</label><input type="checkbox" name="repeatDates[]" value="5" />
                                        <label class="checks">Sat</label><input type="checkbox" name="repeatDates[]" value="6" />

                                        <br>
                                        
                                        <label for="endDate"><b>End Date</b></label>
                                        <input id="endDate" type="date" class="form-control" name="endDate" required>
                                        <label for="startTime"><b>Start Time</b></label>
                                        <input type="time" class="form-control" name="startTime" required>
                                        <label for="endTime"><b>End Time</b></label>
                                        <input type="time" class="form-control" name="endTime" required>
                                        <label for="optionalLocation"><b>Location</b></label>
                                        <input type="text" class="form-control" placeholder="&quot;Humanities Building&quot;" name="optionalLocation" required>
                                        
                                        <!-- Error message for JS form check -->
                                        <p id="inputError" class="text-center error-msg"></p>

                                        <button disabled id="submitButton" class="btn btn-primary btn-lg btn-block disabled" type="submit" name="createTask">Add Event</button>
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
                    include('../php/taskHandler.php');
                ?>
            </div>
            <script src="../js/task_deleteHandler_calendar.js"></script>
            <script src="../js/task_deleter.js"></script>
        </div>
    </div>
    <?php
        include('../templates/footerScripts.php');
    ?>
</body>

<!-- Add items to the calendar -->
<script>
    $(document).ready(function() {

        var arrays = <?php echo $queryJSON; ?>;
        var eventsArr = [];
        var currentEvent;
        for (var i = 0; i < arrays.length; i++) {
            var startArr = arrays[i][4].split(" ");
            var endArr = arrays[i][5].split(" ");

            //Generate the dow array from the string
            var dowArr = arrays[i][7].split(" ").map(Number);

            //Generate the ranges array
            var rangeArr = [{
                start: moment(startArr[0], "YYYY-MM-DD"),
                end: moment(endArr[0], "YYYY-MM-DD")
            }];

            //Create the actual object
            currentEvent = {
                title: arrays[i][2],
                id: arrays[i][0],
                start: startArr[1],
                end: endArr[1],
                dow: dowArr,
                ranges: rangeArr
            }
            //Add the event to the list
            eventsArr.push(currentEvent);
        }

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
            //The generated events list
            events: eventsArr
        });

    });
</script>
<!-- end item addition section -->

</html>
