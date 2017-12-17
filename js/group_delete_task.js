$(document).ready(function() {

    $('.del').click(function() {
        var clickBtnName = $(this).attr('name');
        var ajaxurl = '/php/group_delete_task.php';
        var data = {'id': clickBtnName};
        $.post(ajaxurl, data, function(response) {
            location.reload();
        });
    });

});
