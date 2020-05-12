@extends('layouts.app')

@section('content')
<div class="col-sm-9 mx-auto">
    <h1 class="mb-3">タスク一覧</h1>

    @if (count($tasks) > 0)
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Task</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
            <tr>
               @if (Auth::id() == $user->id)
                <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
                @else
                <td>{{ $task->id }}</td>
                @endif
                <td>{{ $task->content }}</td>
                <td>{{ $task->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif

    @if (Auth::id() == $user->id)
    {!! link_to_route('tasks.create', '新規タスク追加', [], ['class' => 'btn btn-block btn-primary']) !!}
    @endif

</div>

@endsection
