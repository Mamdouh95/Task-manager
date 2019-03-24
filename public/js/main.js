/**
 * Created by Mamdouh on 23/03/2019.
 * Js Prototype Pattern
 */
(function ($) {

    function errorNotification(text = 'Error happened') {
        toastr.options.progressBar = true;
        toastr.options.closeButton = true;
        toastr.error(text, '')
    }

    function successNotification(text = 'Success') {
        toastr.options.progressBar = true;
        toastr.options.closeButton = true;
        toastr.success(text, '')
    }

    /**
     * @name Task
     * @description a prototype class to manage all events and js functions in Task project
     * @returns {void}
     */
    let Task = function () {
        this.init();
    };

    /**
     * @name init
     * @memberof Task
     * @description the init fun of Task class
     */
    Task.prototype.init = function () {
        this.eventListeners();
        this.ready();
    };

    /**
     * @name eventListeners
     * @memberof Task
     * @description the eventListeners fun of Task class
     */
    Task.prototype.eventListeners = function () {
        $(document).on('click', '#addTask', this.onAddTask);
    };

    /**
     * @name ready
     * @memberof Task
     * @description the ready fun of Task class
     */
    Task.prototype.ready = function () {
        // Ready Methods
    };

    /**
     * @name onAddtask
     * @memberof Task
     * @description the add project outputs controller of Task class
     */
    Task.prototype.onAddTask = function () {
        let path = $(this).attr('data-url');
        let formData = $('#addForm').serialize();
        $.ajax({
            url: path,
            method: "POST",
            data: formData,
        }).done(function (response) {
            successNotification(response.msg);
        }).fail(function (response) {
            if (response.status === 422) {
                const errors = JSON.parse(response.responseText).errors;
                errorNotification(errors[Object.keys(errors)[0]][0]);
            } else {
                errorNotification();
            }
        });
    };

    $.fn.TaskJs = function () {
        return new Task();
    };

    $(document).TaskJs();
}(jQuery));

