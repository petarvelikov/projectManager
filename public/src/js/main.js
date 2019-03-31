$( document ).ready(function() {

    // Confirm delete project button message
    $('.btn-delete-project').on('click', function () {
        var confirmDeleteDialog = confirm("Наистина ли желаете да изтриете този проект, заедно с всичките му задачи?");
        if (confirmDeleteDialog) {
            return true;
        } else {
            return false;
        }
    });


    // Ajax
    $('.btn-incomplete').on('click', function () {
        var taskId = $(this).attr('data-task-id');

        $.ajax({
            method: "POST",
            url: "/tasks/{task}",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                "task-id": taskId,
                "action": 'incomplete'
            }
        });

        setTimeout(function () {
            location.reload(true);
        }, 250);
    });

    $('.btn-complete').on('click', function () {
        var taskId = $(this).attr('data-task-id');

        $.ajax({
            method: "POST",
            url: "/tasks/{task}",
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
            data: {
                "task-id": taskId,
                "action": 'complete'
            }
        });

        setTimeout(function () {
            location.reload(true);
        }, 250);
    });

});
