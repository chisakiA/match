@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('マッチングしたユーザー') }}</div>

                <div class="card-body">
                    <div class="row">
                        @foreach ($users as $key => $user)
                            <div class="col-12 mb-3">
                            @if ($user->image_path === null)
                                    <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="100" height="100">
                                @else
                                    <img class="rounded-circle" src="{{ Storage::url($user->image_path) }}" alt="プロフィール画像" width="100" height="100">
                                @endif
                                <a href="{{ route('user.room', $user->id) }}" class="ml-3" style="font-size:16px;">
                                    {{ $user->name }}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection