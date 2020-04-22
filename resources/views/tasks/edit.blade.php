@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-6 mx-auto">

        <h1 class="mb-4">#{{ $task->id }} Task編集</h1>
        {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}

        <div class="form-group row">
            {!! Form::label('content', 'Task :', ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('content', null, ['class' => 'form-control']) !!}
            </div>
        </div>
        
        <div class="form-group row">
            {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 col-form-label']) !!}
            <div class="col-sm-10">
                {!! Form::text('status', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        {!! Form::submit('更新', ['class' => 'btn btn-block btn-primary']) !!}

        {!! Form::close() !!}
    </div>
</div>

@endsection
