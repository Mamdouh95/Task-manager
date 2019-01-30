@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-2">
                            <img src="{{ asset(Auth::user()->avatar) }}" class="img-thumbnail"/>
                        </div>
                        <div class="col-md-10">
                            <div>Name: {{ Auth::user()->name }}</div>
                            @if (Auth::user()->email)
                                <div>Email: {{ Auth::user()->email }}</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
