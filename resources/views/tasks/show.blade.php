@extends('layouts.app')

@section('content')

@if (Auth::check())
<div class="col-sm-9 mx-auto">
    <h1 class="mb-3">{{ Auth::user()->name }}`s Task詳細</h1>

    <table class="table table-bordered">
        <tr>
            <th>Task</th>
            <td>{{ $task->content }}</td>
        </tr>
        <tr>
            <th>Status</th>
            <td>{{ $task->status }}</td>
        </tr>
    </table>

    <div class="row">
        <div class="col-sm-6">
            {!! link_to_route('tasks.edit', 'Edit', ['id' => $task->id], ['class' => 'btn btn-block btn-outline-secondary']) !!}
        </div>
        <div class="col-sm-6">
            {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-block btn-danger']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>

@endif

@endsection
