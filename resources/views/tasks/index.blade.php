@extends('layouts.app')

@section('content')
    <div class="container">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
            Add new Task
        </button>

        <div class="row justify-content-center mt-3">
            {{-- To do Cards --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-light">
                        TODO
                    </div>
                    <div class="card-body">
                        <ul class="list-group connected-sortable droppable-area1 min-50" id="{{ \App\Task::TODO }}">
                            @foreach($tasks['todos'] as $task)
                                @include('tasks.card', compact('task'))
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- In Progress Cards --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-info">
                        In Progress
                    </div>
                    <div class="card-body">
                        <ul class="list-group connected-sortable droppable-area2 min-50" id="{{ \App\Task::IN_PROGRESS }}">
                            @foreach($tasks['in_progress'] as $task)
                                @include('tasks.card', compact('task'))
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Under Review Cards --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-warning">
                        Under review
                    </div>
                    <div class="card-body">
                        <ul class="list-group connected-sortable droppable-area3 min-50" id="{{ \App\Task::REVIEW }}">
                            @foreach($tasks['review'] as $task)
                                @include('tasks.card', compact('task'))
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- Done Cards --}}
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-success">
                        Done
                    </div>
                    <div class="card-body">
                        <ul class="list-group connected-sortable droppable-area4 min-50" id="{{ \App\Task::DONE }}">
                            @foreach($tasks['done'] as $task)
                                @include('tasks.card', compact('task'))
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('tasks.add_modal', compact('squad'))
    @include('tasks.view_modal')
@endsection
