$(document).ready(function() {
    
    var workTime = 1500;
    var breakTime = 300;
    var currentTime = workTime;
    var working = true;
    var pause = true;


    //Sound for timer ring 
    //May be blocked if you are going through a proxy server
    var audioElement = document.createElement('audio');
    audioElement.setAttribute('src', 'http://reneroth.org/projects/codepen/pomodoro_ring.mp3');
    
    //Display the initial amount of time 
    displayTime();

    //Update the time every 1000ms
    setInterval(function() {
        checkTime();
    }, 1000);

    //Checks whether the time is up or not
    function checkTime() {
        if(pause) {
            return;
        }

        if(currentTime >= 1) {
            //Subtract one from the time and update the display
            currentTime--;
            displayTime();
        } else if(working && currentTime == 0) {
            //Play the buzzer and switch to break time
            audioElement.play();
            switchBreakTime();
        } else {
            //Play the buzzer and switch to work time
            switchWorkTime();
        }
    }
    
    //Displays the current time based on the number of seconds left
    function displayTime() {
        //Calculate the number of minutes and seconds left
        var min = Math.floor(currentTime / 60);
        var sec = Math.floor(currentTime % 60);

        //Add a 0 to the front of seconds when appropriate
        if(sec < 10) {
            sec = "0" + sec;
        }

        $("#timer-text").text(min + ":" + sec);
    }
    
    //Switch to break time
    function switchBreakTime() {
        if(!working) {
            return;
        }
        $("#timeIndicator").text("Currently on Break Time");
        $("#toggleWork").text("Switch to Work Time");
        working = !working;
        currentTime = breakTime;
        displayTime();
    }
    
    //Switch to work time
    function switchWorkTime() {
        if(working) {
            return;
        }

        $("#timeIndicator").text("Currently on Work Time");
        $("#toggleWork").text("Switch to Break Time");
        working = !working;
        currentTime = workTime;
        displayTime();
    }

    //Link the update timer button to functions
    $("#updateBtn").on("click", function() {
        working = false;
        workTime = $("#workTime").val() * 60;
        breakTime = $("#breakTime").val() * 60;
        switchWorkTime();
    });

    //Restart the timer
    $("#restartBtn").on("click", function() {
        if(working) {
            working = false;
            switchWorkTime();
        } else {
            working = true;
            switchBreakTime();
        }
    });
    
    //Toggle the timer pause
    $("#pauseBtn").on("click", function() {
        pause = !pause;

        if(pause) {
            $("#pauseBtn").text("Start Timer");
        } else {
            $("#pauseBtn").text("Pause Timer");
        }
    });
    
    //Toggle break time and work time
    $("#toggleWork").on("click", function() {
        if(working) {
            switchBreakTime();
            $("#toggleWork").text("Switch To Work Time");
        } else {
            switchWorkTime();
            $("#toggleWork").text("Switch To Break Time");
        }
    });
    
});
