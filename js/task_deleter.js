$(document).ready(function() {

    $('.del').click(function() {
        var clickBtnName = $(this).attr('name');
        var ajaxurl = '/php/task_deleter.php';
        var data = {'id': clickBtnName};
        $.post(ajaxurl, data, function(response) {
            window.location.href="/content/calendar.php";
        });
    });

});
