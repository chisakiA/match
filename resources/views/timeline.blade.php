@extends('layouts.app')
<script src="{{ mix('js/app.js') }}"></script>
@section('content')
<div class="container">
        {!! Form::open(['route' => 'timeline', 'method' => 'POST']) !!}
            {{ csrf_field() }}
            <div class="row mb-4">
                
                
                {{ Form::text('body', null, ['class' => 'form-control col-9 mr-auto']) }}
                {{ Form::submit('投稿', ['class' => 'btn btn-light col-2']) }}

            </div>
            @if ($errors->has('post'))
                <p class="alert alert-danger">{{ $errors->first('body') }}</p>
            @endif
        {!! Form::close() !!}

        @foreach ($posts as $body)
            <div class="mb-1">
                <strong><a href="{{ route('user.show',$body->user_id) }}" class="alert-link">{{ $body->name }}</a></strong> {{ $body->created_at }}
            </di00v>
            <div class="pl-3">
                {{ $body->body }}
            </div>
            <hr>
        @endforeach
    </div>
@endsection