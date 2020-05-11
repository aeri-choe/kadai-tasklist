@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-8">
            @if (Auth::id() == $user->id)
               
               <h1>{{ $user->id }}</h1>
               
                {!! link_to_route('tasks.create', '新規タスク追加', [], ['class' => 'btn btn-block btn-primary']) !!}
                
            @endif
            @if (count($tasks) > 0)
                @include('tasks.index', ['tasks' => $tasks])
            @endif
        </div>
    </div>
@endsection