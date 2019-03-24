@if($task)
    {{-- Task Card --}}
    <div class="card mb-2">
        <div class="card-header">
            {{ $task->title }}
        </div>
        <div class="card-body">
            {{ $task->description }}
        </div>
    </div>
@endif