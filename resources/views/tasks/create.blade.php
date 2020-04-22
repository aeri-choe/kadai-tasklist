@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-sm-6 mx-auto">
      
       <h1 class="mb-4">タスク追加</h1>
        {!! Form::model($task, ['route' => 'tasks.store']) !!}
        
                <div class="form-group row">
                    {!! Form::label('content', 'TASK :', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}</div>
                </div>
                
                <div class="form-group row">
                    {!! Form::label('status', 'Status:', ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}</div>
                </div>
        
                {!! Form::submit('追加', ['class' => 'btn btn-block btn-primary']) !!}
        
            {!! Form::close() !!}
    </div>
</div>

@endsection
