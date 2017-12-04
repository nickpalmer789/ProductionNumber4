$(document).ready(function() {

    $('.button').click(function() {
        var clickBtnName = $(this).attr('name');
        var ajaxurl = '/php/task_deleteHandler_calendar.php';
        var data = {'id': clickBtnName};
        $.post(ajaxurl, data, function(response) {
            window.location.href="/content/calendar.php";
        });
    });

});
