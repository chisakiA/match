@extends('layouts.app')

@section('content')

@if(!empty($users))
    @foreach($users as $user)
      <a href="/profile_users/{{ $user->id }}" class="alert-link">{{ $user->name }}</a><br />
    @endforeach
  @endif