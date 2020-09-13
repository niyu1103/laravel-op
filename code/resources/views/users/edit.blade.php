@extends('app')

@section('title', 'マイページ更新')

@section('content')
  @include('nav')
  <div class="container">
      @include('error_card_list')
    <div class="col-md-offset-2 mb-4 edit-profile-wrapper">
      <div class="row">
        <div class="col-md-8 mx-auto">
          <div class="profile-form-wrap">
             <form method="POST" action="{{ route('users.update',  ['user' => $user]) }}" enctype="multipart/form-data">

              @csrf

            <div id="file-preview">
              <div class="form-group">
                <label for="profile_photo">プロフィール写真</label><br>
                @if ($user->profile_photo)
                <p>
                  <img
                    src="{{ asset('storage/images/' . $user->profile_photo) }}"
                    alt="avatar"
                  />
                </p>
                @endif
                <file-preview name="profile_photo" src="{{ $user->profile_photo }}"></file-preview>
              </div>

            </div>

              <div class="form-group">
                <label for="name">名前</label>
                <input class="form-control" type="text" value="{{ old('name',$user->name) }}" name="name" />
              </div>

              {{-- <div class="form-group">
                <label for="email">メールアドレス</label>
                <input class="form-control" type="email" value="{{ old('email',$user->email) }}" name="email" />
              </div>

              <div class="form-group">
                <label for="password">パスワード</label>
                <input class="form-control" type="password" value="{{ old('password',$user->password) }}" name="password" />
              </div>

              <div class="form-group">
                <label for="password_confirmation">パスワードの確認</label>
                <input class="form-control" type="password" name="password_confirmation" />
              </div> --}}

              <div class="form-group">
                <label for="body">自己紹介</label>
                <textarea name="body" class="form-control" rows="16" >{{ $user->body ?? old('body') }}</textarea>
              </div>

               <div class="form-group">
                <label for="url">URL</label>
                <input autofocus="autofocus" class="form-control" type="text" value="{{ old('url',$user->url) }}" name="url" />
              </div>

             <button type="submit" class="btn btn-primary">更新する</button>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
