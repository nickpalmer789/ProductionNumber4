$(document).ready(function() {

    $('.button').click(function() {
        var clickBtnName = $(this).attr('name');
        var ajaxurl = 'http://localhost:8000/php/task_deleteHandler.php';
        var data = {'id': clickBtnName};
        $.post(ajaxurl, data, function(response) {
            window.location.href="http://localhost:8000/content/dashboard.php";
        });
    });

});
