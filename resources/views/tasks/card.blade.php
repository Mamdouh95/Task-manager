@if($task)
    <li class="draggable-item list-group-item mb-1 task-item" data-url="{{ route('task.move', compact('task')) }}" data-view="{{ route('task.view', compact('task')) }}">
        <a style="cursor: pointer" data-toggle="modal" data-target="#viewModal">{{ $task->title }}</a>
    </li>
@endif