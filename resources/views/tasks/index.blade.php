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
                    @foreach($tasks['todos'] as $task)
                        @include('tasks.card', compact('task'))
                    @endforeach
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
                    @foreach($tasks['in_progress'] as $task)
                        @include('tasks.card', compact('task'))
                    @endforeach
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
                    @foreach($tasks['review'] as $task)
                        @include('tasks.card', compact('task'))
                    @endforeach
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
                    @foreach($tasks['done'] as $task)
                        @include('tasks.card', compact('task'))
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@include('tasks.add_modal', compact('squad'))
@endsection
