@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            @if (count($tasks) > 0)
                @include('tasks.index', ['tasks' => $tasks])
            @endif
        </div>
    </div>
@endsection