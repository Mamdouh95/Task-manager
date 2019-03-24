/**
 * Created by Mamdouh on 23/03/2019.
 * Js Prototype Pattern
 */
(function ($) {

    /**
     * Flash Error
     * @param text
     */
    function errorNotification(text = 'Error happened') {
        toastr.options.progressBar = true;
        toastr.options.closeButton = true;
        toastr.error(text, '')
    }

    /**
     * Flash Success
     * @param text
     */
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
        $(document).on('click', '.task-item', this.onViewTask);
    };

    /**
     * @name ready
     * @memberof Task
     * @description the ready fun of Task class
     */
    Task.prototype.ready = function () {
        this.draggableAndSortable();
    };

    /**
     * @name onAddtask
     * @memberof Task
     * @description Add new Task
     */
    Task.prototype.onAddTask = function () {
        let path = $(this).attr('data-url');
        let formData = $('#addForm').serialize();
        $.ajax({
            url: path,
            method: "POST",
            data: formData,
        }).done(function (response) {
            $('#addModal').modal('hide');
            $('#todo').prepend(response.card);
            $('#addForm').trigger("reset");
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

    /**
     * @name onViewtask
     * @memberof Task
     * @description View Task
     */
    Task.prototype.onViewTask = function () {
        let path = $(this).attr('data-view');
        $.ajax({
            url: path,
        }).done(function (response) {
            console.log(response);
            $('.view-title').html(response.title);
            $('.view-description').html(response.description);
            $('.view-priority').html(response.priority);
        }).fail(function () {
            errorNotification();
        });
    };

    /**
     * @name draggableAndSortable
     * @memberof Task
     * @description Dragging Cards and sorting them.
     */
    Task.prototype.draggableAndSortable = function (event) {
        let path = $('input[name=drag-route]').val();
        // Move Card
        $( ".droppable-area1, .droppable-area2, .droppable-area3, .droppable-area4" ).sortable({
            connectWith: ".connected-sortable",
            stack: '.connected-sortable ul',
            update: function (event, ui) {
                if (this === ui.item.parent()[0]) {
                    let target = event.target;
                    let path = $(ui.item).attr('data-url');
                    let data = {'_token' : $('[name=csrf-token]').attr('content'), 'status' : $(target).attr('id')};
                    $.ajax({
                        url: path,
                        method: 'put',
                        data: data,
                    });
                }
            }
        }).disableSelection();
    };

    $.fn.TaskJs = function () {
        return new Task();
    };

    $(document).TaskJs();
}(jQuery));

