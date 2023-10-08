<link rel="stylesheet" href="css\app.css">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>

@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">

        
      
                <form action="{{ route('user.show', $user) }}" method="POST">

                @if ($user->image_path === null)
                        <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="100" height="100">
                @else
                        <img class="rounded-circle" src="{{ Storage::url($user->image_path) }}" alt="プロフィール画像" width="100" height="100">
                @endif
                    @if(auth()->user())
                        @if(!$like_status) <!--ユーザーがいいねしていない場合-->
                            @csrf
                                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                                <input type="hidden" name="from_user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="status" value="1">
                                <button class="fa-sharp fa-regular fa-heart js-like-toggle" type="submit">いいね</button>
                        
                        @else       <!--ユーザーがいいねしている場合-->
                            @csrf
                                <input type="hidden" name="to_user_id" value="{{ $user->id }}">
                                <input type="hidden" name="from_user_id" value="{{ Auth::id() }}">
                                <input type="hidden" name="status" value="1">
                                <button class="fa-sharp fa-solid fa-heart js-like-toggle" style="color:red" type="submit">いいね済</button>

                        @endif
                @endif
    </form>
                            
                <table>
                    <tr>
                        <th></th>
                        <th>名前</th>
                        <td>{{ $user->name }}</td>
                        <th>性別</th>
                        <td>{{ $user->gender }}</td>
                        <th>年齢</th>
                        <td>{{ $user->age }}</td>
                        <th>プロフィール</th>
                        <td>{{ $user->prof }}</td>
                        <th></th>
                    </tr>
                    </table>
                    <tbody>
                        <tr>
                            
                                <div>
                                    @if(!empty($user->thumbnail))
                                    <img src="/storage/user/{{ $user->thumbnail }}" class="thumbnail">
                                    @endif
                                </div>

                                
                        </tr>
                </table>
            
            

                </table>

                            

              
                <a href="{{ route('timeline') }}" class="alert-link">戻る</a><br/>
            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script>
$(function () {
var like = $('.js-like-toggle');
var likeUserId;

like.on('mouseover', function () {
    
    $('button').css('background-color','pink',
    'style-color','red',
    );

});

like.on('mouseout', function () {
    $('button').css('background-color','white');
  })



});
  </script>
  @endpush