@extends('layouts.app') @section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザ編集</div>
        <div class="card-body">
          <!-- 重要な箇所ここから -->
          <form action="/profile_edit" method="post" enctype="multipart/form-data">
            @csrf 

            @if ($user->image_path === null)
               <img class="rounded-circle" src="{{ asset('default.png') }}" alt="プロフィール画像" width="100" height="100">
            @else
               <img class="rounded-circle" src="{{ Storage::url($user->image_path) }}" alt="プロフィール画像" width="100" height="100">
            @endif

            <label for="profile" class="btn">
              <input id="image_path" type="file"  name="image_path" onchange="previewImage(this);">
            </label>

            <button type="submit" class="btn btn-danger">
              変更
            </button>


                <input type="hidden" name="id" value="{{ $user->id }}" />
                <p>名前</p>
                <input type="text" name="name" value="{{ $user->name }}" />
                <p>性別</p>
                <input type="text" name="gender" value="{{ $user->gender }}" /><br />
                <p>年齢</p>
                <input type="text" name="age" value="{{ $user->age }}" /><br />
                <p>プロフィール</p>
                <textarea name="prof" cols="30" rows="5" value="{{ $user->prof }}" >{{ $user->prof }}</textarea><br />
                <input class="btn btn-danger" type="submit" value="更新" />
          </form>

          <!-- 重要な箇所ここまで -->
        </div>
      </div>
    </div>
  </div>
</div>
@endsection